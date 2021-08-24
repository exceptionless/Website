---
title: JavaScript Client
key: JS
---

The Exceptionless JavaScript client SDK makes it easy to report errors, log details, track feature usage and more. Be sure you have an Exceptionless account ([you can sign up here](/)) or that you are self-hosting a running instance of Exceptionless.

---

Full guides can be found below:

* [Browser (no framework)](guides/javascript-example.md)
* [React](./guides/react-example.md)
* [Node](./guides/node-example.md)
* [Express](./guides/express-example.md)

---

This quickstart focuses on the vanilla JavaScript implementation of Exceptionless. 

## npm

To install with npm, run: `npm install @exceptionless/browser`

Next, you just need to call startup during your apps startup to automatically capture unhandled errors.

```js
import { Exceptionless } from "@exceptionless/browser";
// Or import { Exceptionless } from "https://unpkg.com/@exceptionless/browser";

await Exceptionless.startup((c) => {
  c.apiKey = "API_KEY_HERE";  
});

try {
  throw new Error("test");
} catch (error) {
  await Exceptionless.submitException(error);
}
```

## CDN

To install via a script tag referencing Exceptionless over a CDN, add the following before your closing `<body>` tag and call startup like so:

```html
<script type="module">
  import { Exceptionless } from "https://unpkg.com/@exceptionless/browser";
  await Exceptionless.startup((c) => {
    c.apiKey = "API_KEY_HERE";    
  });

  try {
    throw new Error("test");
  } catch (error) {
    await Exceptionless.submitException(error);
  }
</script>
```
---

[Next > Configuration](client-configuration.md) {.text-right}
