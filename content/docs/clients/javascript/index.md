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

To get started, you'll need to install the Exceptionless client. There are three main ways to do this: Yarn, npm, and CDN. 

**Yarn**

To install with Yarn, run: `yarn add exceptionless` 

**npm**  

To install with npm, run: `npm install exceptionless`

**CDN**  

To install via a script tag referencing Exceptionless over a CDN, add the following before your closing `<body>` tag: 

`<script src="https://cdn.jsdelivr.net/npm/exceptionless@1.6.4/dist/exceptionless.min.js"></script>`

### Quick Start

Once Exceptionless is installed, you can configure the client and start using it. Here's a basic configuration example to get you started: 

```javascript
import { ExceptionlessClient } from "exceptionless/dist/exceptionless";
const config = {
  apiKey: "YOUR EXCEPTIONLESS API KEY"
}
const client = new ExceptionlessClient(config);


```

---  

[Next > Configuration](client-configuration.md) {.text-right}