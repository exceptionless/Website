# Copilot Instructions for Exceptionless Marketing Site

## Overview
This project is a static marketing, blog, and documentation site for Exceptionless, built with [Eleventy (11ty)](https://www.11ty.dev/) and custom Node.js scripts. Content is primarily managed in markdown and Nunjucks files under the `content/` directory. The build system is highly customized with plugins and data transforms.

## Key Architecture & Patterns
- **Content Structure:**
  - All site content lives in `content/` (pages, docs, news, assets, layouts, includes, data).
  - News/blog posts are in `content/news/{year}/` as markdown files with YAML front matter.
  - Docs are in `content/docs/`.
  - Data files (site metadata, computed data) are in `content/_data/`.
- **Build System:**
  - Uses Eleventy with extensive plugins (syntax highlight, navigation, RSS, image transforms, embed, etc.).
  - Custom markdown-it configuration for advanced markdown features and link handling.
  - Draft posts (with `draft: true` in front matter) are excluded from production builds.
  - Custom script `m2json.js` generates JSON indexes for docs.
- **Custom Scripts:**
  - `new_post.js` automates creation of new blog/news posts with correct front matter and file naming.
- **Output:**
  - Built site is output to `_site/`.

## Developer Workflows
- **Install dependencies:**
  - `npm install`
- **Development server:**
  - `npm run dev` or `npm start` (runs Eleventy with live reload)
- **Production build:**
  - `npm run build`
- **Create new post:**
  - `npm run new-post "Post Title"` (generates a draft markdown file in the correct location)
- **Debugging:**
  - `npm run debug` or `npm run debugstart` for verbose Eleventy logs
- **Benchmarking:**
  - `npm run benchmark`

## Project-Specific Conventions
- **Markdown front matter:** All content files require YAML front matter. News posts must include at least `title`, `date`, and `draft` fields.
- **Drafts:** Any file with `draft: true` is excluded from collections and output unless in dev mode.
- **Navigation:** Navigation structure is computed via `eleventyComputed.js` in `content/_data/`.
- **Image handling:** Images are optimized and output in multiple formats (avif, webp, etc.) via Eleventy plugins.
- **Custom filters/shortcodes:** See `eleventy.config.js` for custom Nunjucks/markdown filters and shortcodes (e.g., `currentBuildDate`).
- **Data merging:** Deep merge is enabled for data files.

## Integration Points
- **External plugins:** See `package.json` for Eleventy and markdown-it plugins.
- **Site metadata:** Managed in `content/_data/site.json`.
- **Custom doc indexing:** `m2json.js` parses markdown docs to JSON for search/indexing.

## Examples
- To add a new blog post: `npm run new-post "My Post Title"` (creates `content/news/{year}/YYYY-MM-DD-my-post-title.md`)
- To add a new doc: Place a markdown file in `content/docs/` with appropriate front matter.

## Key Files & Directories
- `eleventy.config.js` — Eleventy build configuration and plugin setup
- `content/` — All site content
- `content/_data/` — Site and computed data
- `content/news/` — Blog/news posts
- `content/docs/` — Documentation
- `new_post.js` — Script to generate new posts
- `m2json.js` — Script to index docs as JSON
- `package.json` — Scripts, dependencies, and plugin list

---
If you are unsure about a workflow or pattern, check the README or the scripts in the project root. When automating content or build changes, always follow the conventions in `eleventy.config.js` and `content/_data/eleventyComputed.js`.
