const pluginRss = require("@11ty/eleventy-plugin-rss");
const slugify = require("slugify");
const embedEverything = require("eleventy-plugin-embed-everything");
const syntaxHighlight = require("@11ty/eleventy-plugin-syntaxhighlight");
const pluginSEO = require("eleventy-plugin-seo");
const siteConfig = require("./content/_data/site.json");
const eleventyNavigationPlugin = require("@11ty/eleventy-navigation");

module.exports = function (eleventyConfig) {
  eleventyConfig.addPlugin(pluginRss);
  eleventyConfig.addPlugin(embedEverything);
  eleventyConfig.addPlugin(syntaxHighlight);
  eleventyConfig.addPlugin(pluginSEO, siteConfig);

  eleventyConfig.addPassthroughCopy("content/assets");
  eleventyConfig.addPassthroughCopy("content/favicon.ico");
  eleventyConfig.addPassthroughCopy("content/**/*.jpg");
  eleventyConfig.addPassthroughCopy("content/**/*.png");
  eleventyConfig.addPassthroughCopy("content/**/*.gif");
  eleventyConfig.addPassthroughCopy("routes.json");

  eleventyConfig.setDataDeepMerge(true);

  const markdownIt = require("markdown-it");

  // create a new markdown-it instance with the plugin
  const markdownItAnchor = require("markdown-it-anchor");
  const markdownLib = markdownIt({ html: false }).use(markdownItAnchor);

  // replace the default markdown-it instance
  eleventyConfig.setLibrary("md", markdownLib);

  eleventyConfig.addFilter("slug", function (value) {
    return slugify(value, {
      replacement: "-",
      remove: /[*+~()'"!:@]/g,
      lower: true,
      strict: true,
    });
  });

  eleventyConfig.addNunjucksFilter("json", function (value) {
    debugger;
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

    return JSON.stringify(obj, getCircularReplacer(), 4);
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
