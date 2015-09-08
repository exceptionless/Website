---
id: 15827
postTitle: 'JavaScript Client V1.5 Release Details &#038; Notes'
date: 2017-08-15T15:45:47-06:00
author: Exceptionless
layout: blog_post.liquid
tags: ["posts", "javascript", "react"]
---
##<img loading="lazy" class="aligncenter size-large wp-image-15828" src="https://exceptionless.com/assets/js-client-1.5-release-1024x538.jpg" alt="exceptionless.javascript 1.5" width="940" height="494" data-id="15828" srcset="https://exceptionless.com/assets/js-client-1.5-release-1024x538.jpg 1024w, https://exceptionless.com/assets/js-client-1.5-release-300x158.jpg 300w, https://exceptionless.com/assets/js-client-1.5-release-768x403.jpg 768w, https://exceptionless.com/assets/js-client-1.5-release.jpg 1200w" sizes="(max-width: 940px) 100vw, 940px" />  
Exceptionless.JavaScript v1.5 Release Notes

### Unversal App Support

The major update for 1.5 is that we have added support for universal apps (React Universal).

To view the exact changes required to get everything working and set up, [click here](https://github.com/niemyjski/react-redux-universal-hot-example/commit/7f7c01ca1b328f3389c3919a53376bccbbfe1f08).

### Other 1.5 Updates

<!--more-->

  * Added support for exceptions that are passed in and are just strings.
  * Updated TraceKit to the latest version, which adds support for parsing PhantomJS errors and greatly improves native stack traces.
  * Thanks [@caesay](https://github.com/caesay) for updating TypeScript to the latest version, as well!

### Bug Fixes

  * Fixed a bug where exceptionless would fail to load when used with webpack.
  * Fixed a bug where browser module info was not being populated.
  * Fixed a bug where ILog.trace was piped to the wrong console function which would error under IE (thanks [@srijken](https://github.com/srijken){.user-mention}!)
  * Fixed a few bugs with angular integration
  * Fixed a bug with submitLog not respecting log message and log level

For a full change log, select an applicable release on the [Exceptionless.JavaScript GitHub Release page](https://github.com/exceptionless/Exceptionless.JavaScript/releases).
