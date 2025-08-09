# Exceptionless Marketing Site

[![Build Status](https://github.com/exceptionless/Website/actions/workflows/build.yml/badge.svg)](https://github.com/exceptionless/Website/actions/workflows/build.yml)

This repository contains the Exceptionless marketing website, blog and documentation

## Getting Started

### Prerequisites

- Node.js LTS
- npm (comes with Node.js)

### Install dependencies

```bash
npm install
```

### Development server

Start Eleventy with live reload:

```bash
npm run dev
```

or

```bash
npm start
```

### Production build

Build the static site for production:

```bash
npm run build
```

### Directory structure

- `content/` — All site content (pages, docs, news, assets, layouts, includes, data)
- `content/news/{year}/` — Blog/news posts (markdown)
- `content/docs/` — Documentation (markdown)
- `content/_data/` — Site and computed data
- `_site/` — Build output
- `eleventy.config.js` — Eleventy build configuration
- `new_post.js` — Script to generate new posts
- `m2json.js` — Script to index docs as JSON

## Creating New Posts

You can manually create a new markdown file for your posts and ensure the front matter is correct, or you can run the following command from within the project directory:

```bash
node new_post.js -t "YOUR TITLE"
```

Or, using npm:

```bash
npm run new-post "This is a Test Post"
```

## Additional Information

- Draft posts (with `draft: true` in front matter) are excluded from production builds.
- See `.github/copilot-instructions.md` for AI agent and automation guidelines.
