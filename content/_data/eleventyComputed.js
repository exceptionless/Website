module.exports = {
  eleventyNavigation: {
    key: (data) => {
      const urlParts = data.page.url.split("/");

      const pathDirs = urlParts.slice(1, urlParts.length - 1);
      const path = pathDirs.join("/");
      return data.key || path;
    },
    title: (data) => data.title,
    parent: (data) => {
      const urlParts = data.page.url.split("/");

      const parentDirs = urlParts.slice(1, urlParts.length - 2);
      const parent = parentDirs.join("/");

      return data.parent || parent;
    },
    order: (data) => data.order,
  },
  eleventyComputed: {
    /**
     * Adds support for drafts.
     * If a page has `draft: true` in its YAML frontmatter then this snippet
     * will set its permalink to false and exclude it from collections.
     *
     * For dev builds we will always render the page.
     */
     permalink: data => {
      if (data.draft) {
        return false;
      }

      return data.permalink;
    },
    eleventyExcludeFromCollections: data => {
      if (data.draft) {
        return true;
      }

      return false;
    }
  }
};