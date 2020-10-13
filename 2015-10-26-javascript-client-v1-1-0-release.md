---
id: 13715
postTitle: Exceptionless JavaScript Client V1.1.0 Release
date: 2015-10-26T13:05:59-06:00
author: Exceptionless
layout: blog_post.liquid
tags: ["posts"]
---
<img loading="lazy" class="alignright size-medium wp-image-13683" src="/assets/blog-header-image-post2b-300x106.png" alt="Exceptionless JavaScript Client" width="300" height="106" data-id="13683" srcset="/assets/blog-header-image-post2b-300x106.png 300w, /assets/blog-header-image-post2b.png 708w" sizes="(max-width: 300px) 100vw, 300px" />We've been hard at work on several things here at Exceptionless, including a minor version release of our [JavaScript Client](https://github.com/exceptionless/Exceptionless.JavaScript)!

Please see the details of this release below.

Also, we would like to give a shout out to [@frankerbersoll](https://github.com/frankebersoll), [@srijken](https://github.com/srijken) and the entire community for help squashing bugs, reporting issues, and providing general feedback. You guys rock.

## Exceptionless JavaScript Client V1.1.0 Release Notes

* Improved readme and wiki. [[issue thread](https://github.com/exceptionless/Exceptionless.JavaScript/pull/31)] // _Credit: [@frankebersoll](https://github.com/frankebersoll)_
* Bug Fix &#8211; Unhandled exceptiones in Node.js were not being capture. [[issue thread](https://github.com/exceptionless/Exceptionless.JavaScript/pull/30)] // _Credit: [@frankebersoll](https://github.com/frankebersoll)_
* Bug Fix &#8211; Data exclusions were not always working. [[issue thread](https://github.com/exceptionless/Exceptionless.JavaScript/pull/28)] // _Credit: [@srijken](https://github.com/srijken)_
* Bug Fix &#8211; Cancelled state wasn't properly passed through the SubmitEvent callback.
* Temporarily disabled capturing of ajax errors [[issue thread](https://github.com/exceptionless/Exceptionless.JavaScript/issues/26)]

You can [view the full change log](https://github.com/exceptionless/Exceptionless.JavaScript/compare/v1.0.1...v1.1.0) for a list of all changes in this release.

You can also [Download Exceptionless JavaScript Client V1.1.0](https://github.com/exceptionless/Exceptionless.JavaScript/releases/tag/v1.1.0) on the official release page.
