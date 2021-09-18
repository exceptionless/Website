import { stringify } from "https://deno.land/x/lume/deps/yaml.ts";

export const url = "./config.yml";

export default (data, { url }) => {
  const config = {
    backend: {
      name: "github",
      repo: "exceptionless/Website",
      branch: "feature/lume-conversion",
      open_authoring: true,
    },
    publish_mode: "editorial_workflow",
    media_folder: "content/assets/img",
    display_url: url("/"),
    collections: [],
  };

  // Posts
  config.collections.push({
    label: "Posts",
    label_singular: "Post",
    name: "posts",
    description: "Here you can create or edit your posts",
    folder: "content/news",
    preview: false,
    create: true,
    nested: {
      depth: 100,
    },
    view_filters: [
      {
        label: "Drafts",
        field: "draft",
        pattern: true,
      },
    ],
    fields: [
      field("title"),
      field("description"),
      field("image", "image"),
      field("date", "datetime"),
      field("tags", "list"),
      field("draft", "boolean"),
      field("body", "markdown"),
    ],
  });

  // Docs
  config.collections.push({
    label: "Docs",
    label_singular: "Doc",
    name: "docs",
    description: "Here you can create or edit docs",
    folder: "content/docs",
    preview: false,
    create: true,
    view_filters: [
      {
        label: "Drafts",
        field: "draft",
        pattern: true,
      },
    ],
    fields: [
      field("title"),
      field("description"),
      field("image", "image"),
      field("date", "datetime"),
      field("tags", "list"),
      field("draft", "boolean"),
      field("body", "markdown"),
    ],
  });

  const pageFields = [
    field("title"),
    field("url", "string"),
    field("body", "markdown"),
    field("menu", "object", {
      fields: [
        field("visible", "boolean"),
        field("order", "number"),
      ],
    }),
    field("templateClass", "hidden"),
    field("layout", "hidden"),
  ];

  // Individual pages
  config.collections.push({
    label: "Pages",
    name: "pages",
    description: "Here you can edit your individual pages",
    preview: false,
    files: [
      {
        label: "About",
        name: "about",
        file: "/content/about.md",
        fields: pageFields,
      },
      {
        label: "404",
        name: "404",
        file: "/content/404.md",
        fields: pageFields,
      },
      {
        label: "Privacy Policy",
        name: "privacy",
        file: "/content/privacy.md",
        fields: pageFields,
      },
      {
        label: "Terms",
        name: "terms",
        file: "/content/terms.md",
        fields: pageFields,
      },
    ],
  });

  return stringify(config);
};

function field(label, widget = "string", extra = {}) {
  return { label, name: label.toLowerCase(), widget, ...extra };
}
