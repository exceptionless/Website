import { 
  IdAttributePlugin, 
  InputPathToUrlTransformPlugin, 
  HtmlBasePlugin 
} from "@11ty/eleventy";

import { feedPlugin } from "@11ty/eleventy-plugin-rss";
import pluginSyntaxHighlight from "@11ty/eleventy-plugin-syntaxhighlight";
import pluginNavigation from "@11ty/eleventy-navigation";
import { eleventyImageTransformPlugin } from "@11ty/eleventy-img";
import embedEverything from "eleventy-plugin-embed-everything";

import slugify from "slugify";
import path from "path";
import { glob } from "glob";

import markdownIt from "markdown-it";
import markdownItFootnote from "markdown-it-footnote";
import markdownItAnchor from "markdown-it-anchor";
import markdownItAttributes from "markdown-it-attrs";
import markdownItSpan from "markdown-it-bracketed-spans";
import markdownItAlerts from "markdown-it-alerts";
import markdownItAbbr from "markdown-it-abbr";
import markdownItReplaceLink from "markdown-it-replace-link";

// Import custom modules - these will need to be converted to ESM
import m2j from "./m2json.js";

/** @param {import("@11ty/eleventy").UserConfig} eleventyConfig */
export default async function(eleventyConfig) {
  // Drafts, see also _data/eleventyDataSchema.js
  eleventyConfig.addPreprocessor("drafts", "*", (data, content) => {
    if(data.draft && process.env.ELEVENTY_RUN_MODE === "build") {
      return false;
    }
  });

  if(!process.env.ELEVENTY_PRODUCTION) {
    eleventyConfig.setQuietMode(true);
  }

  // Copy the contents of the `public` folder to the output folder
  eleventyConfig.addPassthroughCopy("content/assets");
  eleventyConfig.addPassthroughCopy("content/favicon.ico");
  eleventyConfig.addPassthroughCopy("content/**/*.jpg");
  eleventyConfig.addPassthroughCopy("content/**/*.png");
  eleventyConfig.addPassthroughCopy("content/**/*.gif");
  eleventyConfig.addPassthroughCopy("content/_redirects");

  // Run Eleventy when these files change:
  eleventyConfig.addWatchTarget("content/assets/css/**/*.css");
  eleventyConfig.addWatchTarget("content/**/*.{svg,webp,png,jpg,jpeg,gif}");

  // Per-page bundles
  eleventyConfig.addBundle("css", {
    toFileDirectory: "dist",
    bundleHtmlContentFromSelector: "style",
  });

  eleventyConfig.addBundle("js", {
    toFileDirectory: "dist", 
    bundleHtmlContentFromSelector: "script",
  });

  // Official plugins
  eleventyConfig.addPlugin(pluginSyntaxHighlight, {
    preAttributes: { tabindex: 0 }
  });
  
  eleventyConfig.addPlugin(pluginNavigation);
  eleventyConfig.addPlugin(HtmlBasePlugin);
  eleventyConfig.addPlugin(InputPathToUrlTransformPlugin);

  eleventyConfig.addPlugin(feedPlugin, {
    type: "atom",
    outputPath: "/feed/feed.xml", 
    stylesheet: "pretty-atom-feed.xsl",
    templateData: {
      eleventyNavigation: {
        key: "Feed",
        order: 4
      }
    },
    collection: {
      name: "posts",
      limit: 10,
    },
    metadata: {
      language: "en",
      title: "Exceptionless Blog",
      subtitle: "Real-time exception reporting news and updates",
      base: "https://exceptionless.com/",
      author: {
        name: "Exceptionless Team"
      }
    }
  });

  // Image optimization
  eleventyConfig.addPlugin(eleventyImageTransformPlugin, {
    formats: ["avif", "webp", "auto"],
    failOnError: false,
    htmlOptions: {
      imgAttributes: {
        loading: "lazy",
        decoding: "async",
      }
    },
    sharpOptions: {
      animated: true,
    },
  });

  eleventyConfig.addPlugin(embedEverything);

  eleventyConfig.addPlugin(IdAttributePlugin, {
    // Use Eleventy's built-in `slugify` filter
    slugify: eleventyConfig.getFilter("slugify"),
    checkDuplicates: false,
  });

  eleventyConfig.setDataDeepMerge(true);

  // ------------------------------------------------------------------------
  // Markdown plugins
  // ------------------------------------------------------------------------

  const markdownItOptions = {
    html: true,
    breaks: true,
    linkify: false,
    replaceLink: function (link, env) {
      const doNothing = ['http://', 'https://', '/', '#', 'mailto:'];
      if (doNothing.some((protocol) => link.startsWith(protocol)))
        return link;
      
      let dir = path.dirname(env.page?.filePathStem ?? '');
      let fullPath = dir + '/' + link;
      
      fullPath = fullPath.replace(/index.md$/, '').replace(/.md$/, '/');
      
      return fullPath;
    }
  };

  const markdownItAnchorOptions = {
    permalink: markdownItAnchor.permalink.headerLink(),
    level: [2, 3, 4],
    slugify: function (s) {
      return slugify(s, {
        replacement: "-",
        remove: /[*+~()'"!:@]/g,
        lower: true,
        strict: true,
      });
    },
  };

  function getHeadingLevel(tagName) {
    if (tagName[0].toLowerCase() === 'h') {
      tagName = tagName.slice(1);
    }
    return parseInt(tagName, 10);
  }

  function markdownItHeadingLevel(md, options) {
    var firstLevel = options.firstLevel;

    if (typeof firstLevel === 'string') {
      firstLevel = getHeadingLevel(firstLevel);
    }

    if (!firstLevel || isNaN(firstLevel)) {
      return;
    }

    var levelOffset = firstLevel - 1;
    if (levelOffset < 1 || levelOffset > 6) {
      return;
    }

    md.core.ruler.push('adjust-heading-levels', function (state) {
      var tokens = state.tokens;
      for (var i = 0; i < tokens.length; i++) {
        if (tokens[i].type !== 'heading_close') {
          continue;
        }

        var headingOpen = tokens[i - 2];
        var headingClose = tokens[i];

        var currentLevel = getHeadingLevel(headingOpen.tag);
        var tagName = 'h' + Math.min(currentLevel + levelOffset, 6);

        headingOpen.tag = tagName;
        headingClose.tag = tagName;
      }
    });
  }

  const md = markdownIt(markdownItOptions)
    .disable('code')
    .use(markdownItHeadingLevel, { firstLevel: 2 })
    .use(markdownItFootnote)
    .use(markdownItAnchor, markdownItAnchorOptions)
    .use(markdownItAttributes)
    .use(markdownItSpan)
    .use(markdownItAbbr)
    .use(markdownItReplaceLink)
    .use(markdownItAlerts);

  md.renderer.rules.table_open = function(tokens, idx) {
    return '<table class="table">';
  };

  // Generate docs index JSON
  const options = {
    minify: false,
    width: 70,
    outfile: './content/assets/index.json',
    content: true
  };
  
  // Read all markdown files  
  const files = await glob('./content/docs/**/*.md');
  if (files.length > 0) {
    m2j.parse(files, options);
  }

  eleventyConfig.setLibrary('md', md);

  eleventyConfig.addFilter('markdownify', (markdownString) =>
    md.render(markdownString)
  );

  eleventyConfig.addFilter("slug", function (value) {
    return slugify(value, {
      replacement: "-",
      remove: /[*+~()'"!:@]/g,
      lower: true,
      strict: true,
    });
  });

  eleventyConfig.addNunjucksFilter("json", function (value) {
    if (!value) return "";

    const getCircularReplacer = () => {
      const seen = new WeakSet();
      return (key, value) => {
        if (typeof value === "object" && value !== null) {
          if (seen.has(value)) {
            return;
          }
          seen.add(value);
        }
        return value;
      };
    };

    return JSON.stringify(value, getCircularReplacer(), 4);
  });

  eleventyConfig.addShortcode("currentBuildDate", () => {
    return (new Date()).toISOString();
  });
}

export const config = {
  templateFormats: ["html", "md", "njk", "json"],
  markdownTemplateEngine: "njk",
  htmlTemplateEngine: "njk",
  dataTemplateEngine: "njk",
  dir: {
    output: "_site",
    data: "_data", 
    input: "content",
    includes: "_includes",
    layouts: "_layouts",
  },
};
