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
};