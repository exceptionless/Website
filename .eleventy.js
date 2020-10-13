const pluginRss = require("@11ty/eleventy-plugin-rss");

module.exports = function(eleventyConfig) {
  eleventyConfig.addPlugin(pluginRss);
  eleventyConfig.addPassthroughCopy("assets");
  eleventyConfig.addPassthroughCopy("cyclone-slider-pro");
  eleventyConfig.addPassthroughCopy("wp-includes");
};