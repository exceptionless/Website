---
title: JavaScript Client
key: JS
---

The Exceptionless JavaScript client SDK makes it easy to report errors, log details, track feature usage and more. Be sure you have an Exceptionless account ([you can sign up here](/)) or that you are self-hosting a running instance of Exceptionless.

---

If you are looking for framework-specific guides, you can jump right to them below.

* React
* Vue
* Svelte

---

To get started, you'll need to install the Exceptionless client. There are two main ways to do this: npm and CDN.

#### npm

To install with npm, run: `npm install @exceptionless/node --save`

```js
import { Exceptionless } from "@exceptionless/node";

await Exceptionless.startup(c => {
  c.apiKey: 'API_KEY_HERE'
});
```

#### CDN

To install via a script tag referencing Exceptionless over a CDN, add the following before your closing `<body>` tag:

```html
<script type="module">
  import { Exceptionless } from "https://unpkg.com/@exceptionless/browser";

  await Exceptionless.startup(c => {
    c.apiKey: 'API_KEY_HERE'
  });
</script>
```html

---

[Next > Configuration](client-configuration.md) {.text-right}
