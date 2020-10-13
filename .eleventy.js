const pluginRss = require("@11ty/eleventy-plugin-rss");

module.exports = function(eleventyConfig) {
  eleventyConfig.addPlugin(pluginRss);
  eleventyConfig.addPassthroughCopy("content/assets");
  eleventyConfig.addPassthroughCopy("content/favicon.ico");

  eleventyConfig.setDataDeepMerge(true);

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