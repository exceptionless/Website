const pluginRss = require("@11ty/eleventy-plugin-rss");
const slugify = require('slugify');
const embedEverything = require("eleventy-plugin-embed-everything");

module.exports = function(eleventyConfig) {
  eleventyConfig.addPlugin(pluginRss);
  eleventyConfig.addPlugin(embedEverything);

  eleventyConfig.addPassthroughCopy("content/assets");
  eleventyConfig.addPassthroughCopy("content/favicon.ico");
  eleventyConfig.addPassthroughCopy("content/**/*.jpg");
  eleventyConfig.addPassthroughCopy("content/**/*.png");
  eleventyConfig.addPassthroughCopy("content/**/*.gif");

  eleventyConfig.setDataDeepMerge(true);

  eleventyConfig.addFilter("slug", function(value) {
    return slugify(value, {
      replacement: '-',
      remove: /[*+~.()'"!:@]/g,
      lower: true,
      strict: true
    });
  });

  eleventyConfig.addNunjucksFilter("json", function(value) {
    debugger;
    if (!value)
      return '';

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
    templateFormats: ['html', 'md', 'njk'],

    markdownTemplateEngine: 'njk',
    htmlTemplateEngine: 'njk',
    dataTemplateEngine: 'njk',
    dir: {
      output: '_site',
      input: 'content',
      includes: '_includes',
      layouts: '_layouts'
    },
  };
};