---
id: 13302
title: JavaScript / Node.js Client V1 Release Notes
date: 2015-06-09
tags: [ "node.js"]
---
<img loading="lazy" class="alignright size-medium wp-image-2978" style="margin-left: 20px;" src="/assets/img/news/exceptionless-logoBLK-300x75.png" alt="Exceptionless Logo" width="300" height="75" data-id="2978" srcset="/assets/exceptionless-logoBLK-300x75.png 300w, /assets/exceptionless-logoBLK.png 1000w" sizes="(max-width: 300px) 100vw, 300px" />Last week we announced the <a href="/javascript-node-js-client-version-1-release-candidate/" target="_blank">V1 release candidate</a> for the Exceptionless JavaScript/Node.js Client. This week we've got official release notes for you! Have a look.

## Release Notes

* Client supports **JavaScript and Node** (Works everywhere)
* Send your errors, logs or feature usages to your <a href="https://be.exceptionless.io/" target="_blank">Exceptionless dashboard</a>
* **Supports various module formats** such as <a href="http://wiki.ecmascript.org/doku.php?id=harmony:specification_drafts" target="_blank">es6</a> (<a href="https://github.com/systemjs/systemjs" target="_blank">SystemJS</a>/<a href="http://jspm.io/" target="_blank">jspm</a>), <a href="https://github.com/umdjs/umd" target="_blank">UMD</a>, <a href="http://requirejs.org/" target="_blank">RequireJS</a>, <a href="http://www.commonjs.org/" target="_blank">CommonJS</a>, or global
* We built the Exceptionless JavaScript/Nodes.js Client with the past and future browsers in mind. Everything is testable via components injected on startup (via dependency injection), which means you can **replace any component of the system to fit your specific needs**.
* Client is a **full feature parity of our .NET clients**, including:
    * Support for custom objects
    * Mark events as critical
    * Server side settings
    * Data exclusions
    * Plugins
    * and more...
* Includes first class integration for third party libraries like <a href="https://angularjs.org/" target="_blank">AngularJS</a> and <a href="http://expressjs.com/" target="_blank">Express</a>

<div class="signup center">
  <a class="btn btn-large btn-primary" href="https://github.com/exceptionless/Exceptionless.javascript">Start Using it Today</a>
</div>

## Usage, Examples, and more...

Everything you need to get up and running (including contributing/developing) can be found on the <a href="https://github.com/exceptionless/Exceptionless.JavaScript" target="_blank">Exceptionless.JavaScript GitHub repo</a>. Javascript, Express, TypeScript, SystemJS, and RequireJS examples <a href="https://github.com/exceptionless/Exceptionless.JavaScript/tree/master/example" target="_blank">can be found in the example folder</a>. As always, you can contact us via an in-app message for help, or <a href="https://github.com/exceptionless/Exceptionless.JavaScript/issues" target="_blank">submit an issue on GitHub</a> with bugs, feedback, etc. We're here to make sure you get things working properly so you can take full advantage of Exceptionless!
