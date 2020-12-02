const pluginRss = require("@11ty/eleventy-plugin-rss");
const slugify = require("slugify");
const embedEverything = require("eleventy-plugin-embed-everything");
const syntaxHighlight = require("@11ty/eleventy-plugin-syntaxhighlight");
const pluginSEO = require("eleventy-plugin-seo");
const siteConfig = require("./content/_data/site.json");
const eleventyNavigationPlugin = require("@11ty/eleventy-navigation");
const path = require('path');
const sitemap = require("@quasibit/eleventy-plugin-sitemap");

module.exports = function (eleventyConfig) {
  if(!process.env.ELEVENTY_PRODUCTION) {
		eleventyConfig.setQuietMode(true);
	}

	eleventyConfig.setBrowserSyncConfig({
		ui: false,
		ghostMode: false
  });
  
  eleventyConfig.addPlugin(pluginRss);
  eleventyConfig.addPlugin(embedEverything);
  eleventyConfig.addPlugin(syntaxHighlight);
  eleventyConfig.addPlugin(pluginSEO, siteConfig);
  eleventyConfig.addPlugin(eleventyNavigationPlugin);
  eleventyConfig.addPlugin(sitemap, {
    sitemap: {
      hostname: "https://exceptionless.com",
    },
  });

  eleventyConfig.addPassthroughCopy("content/assets");
  eleventyConfig.addPassthroughCopy("content/favicon.ico");
  eleventyConfig.addPassthroughCopy("content/**/*.jpg");
  eleventyConfig.addPassthroughCopy("content/**/*.png");
  eleventyConfig.addPassthroughCopy("content/**/*.gif");
  eleventyConfig.addPassthroughCopy("content/_redirects");

  eleventyConfig.setDataDeepMerge(true);

  // ------------------------------------------------------------------------
  // Markdown plugins
  // ------------------------------------------------------------------------

  const markdownIt = require('markdown-it');

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

  const markdownItFootnote = require('markdown-it-footnote');

  const markdownItAnchor = require('markdown-it-anchor');

  const markdownItAnchorOptions = {
    permalink: true,
    permalinkClass: 'deeplink',
    permalinkSymbol: '&#35;',
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

  const markdownItAttributes = require('markdown-it-attrs');

  const markdownItSpan = require('markdown-it-bracketed-spans');

  const markdownItAlerts = require('markdown-it-alerts');

  const markdownItAbbr = require('markdown-it-abbr');

  const markdownItReplaceLink = require('markdown-it-replace-link');

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

  return {
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
};
