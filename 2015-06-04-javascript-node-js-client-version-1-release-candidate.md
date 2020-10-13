---
id: 13280
postTitle: JavaScript &#038; Node.js Client Version 1 Release Candidate
date: 2015-06-04T08:51:28-06:00
author: Exceptionless
layout: blog_post.liquid
tags: ["posts", "javascript", "node.js"]
---
<img loading="lazy" class="aligncenter wp-image-13283 size-full" src="/_site/assets/javascript-release-candidate.jpg" alt="Exceptionless JavaScript Client" width="708" height="250" data-id="13281" srcset="/assets/javascript-release-candidate.jpg 708w, /assets/javascript-release-candidate-300x106.jpg 300w" sizes="(max-width: 708px) 100vw, 708px" />

If you've been following along the last few weeks, you know we've been working hard to get the new <a href="/javascript-client-available-for-preview-testing/" target="_blank">JavaScript Client</a> up to speed and ready for a version 1 release.

**We think we're there!**

Whether you're a <a href="/javascript-client-demo-exceptionless/" target="_blank">JavaScript</a> or <a href="/exceptionless-node-js-javascript-client-demo/" target="_blank">Node.js</a> user, you'll be able to enjoy the same full featured exception and event reporting platform that our primary .NET client offers, with fewer platform specific boundaries.<!--more-->

## Sure It's Ready?

We have been doing extensive testing over the course of the last month, which has allowed us to identify issues and inefficiencies throughout. Each of those has been addressed with several improvements and fixes, leaving us with a much faster, more stable client.

Many of the tweaks we made were related to IE9 and Node. Those issues have been resolved and things are working well now. In addition, we further increased performance by shrinking the library size fairly drastically.

Moving forward, we will just be working on bug fixes related to user-reported issues as usage picks up.

### Recent Bug Fixes, Issue Resolutions, & Improvements

* Ensured compatibility with module formats like <a href="http://wiki.ecmascript.org/doku.php?id=harmony:specification_drafts" target="_blank">es6</a> (<a href="https://github.com/systemjs/systemjs" target="_blank">SystemJS</a>/<a href="http://jspm.io/" target="_blank">jspm</a>) and <a href="http://requirejs.org/" target="_blank">RequireJS</a>
* Various IE9 and Node compatibility issues fixed
* Decreased library size to improve performance and efficiency
* Various other performance improvements
* Fixed Angular integration failures with Angular Router
* Fixed &#8211; Unable to integrate with Aurelia due to node being improperly detected
* Changed the implementation of the InMemoryStorage to do a get instead of a get and delete
* Unable to post events with the NodeSubmissionClient over http fixed
* Fixed &#8211; Unit tests are failing due to transpilation

## Start Using It!

We've already released a few blog posts (linked below) that detail how to get up and running, but please visit the <a href="https://github.com/exceptionless/Exceptionless.JavaScript" target="_blank">Exceptionless.JavaScript GitHub Repo</a> for the most up-to-date documentation.

**<a href="/javascript-client-demo-exceptionless/" target="_blank">JavaScript Users</a>** can find installation, configuration, usage details and examples <a href="/javascript-client-demo-exceptionless/" target="_blank">here</a>.

If you're a **<a href="/exceptionless-node-js-javascript-client-demo/" target="_blank">Node.js</a> user**, follow <a href="/exceptionless-node-js-javascript-client-demo/" target="_blank">this article</a> to get set up and running.

We've also got <a href="https://github.com/exceptionless/Exceptionless.JavaScript/tree/master/example" target="_blank"><strong>examples/samples on GitHub</strong></a> for JavaScript, Express, TypeScript, SystemJS, and RequireJS.

<div class="signup center">
  <a class="btn btn-large btn-primary" href="https://github.com/exceptionless/Exceptionless.JavaScript">Try It Today!</a>
</div>

## Let Us Know What You Think

We're suckers for feedback, so let us have it whether good, bad, or indifferent. Bugs, etc should be reported on the <a href="https://github.com/exceptionless/Exceptionless.JavaScript/issues" target="_blank">GitHub Issues</a> page, but feel free to shoot us an in-app message, email, etc and let us know what you think and if you had any issues getting everything working.
