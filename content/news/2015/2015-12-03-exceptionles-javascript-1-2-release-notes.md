---
id: 13851
title: Exceptionless.JavaScript 1.2 Release Notes
date: 2015-12-03
tags: [ "javascript"]
---
<img loading="lazy" class="alignright wp-image-13683 size-medium" style="margin-left: 15px;" src="/assets/blog-header-image-post2b-300x106.png" alt="Exceptionless JavaScript Client" width="300" height="106" data-id="13683" srcset="/assets/blog-header-image-post2b-300x106.png 300w, /assets/blog-header-image-post2b.png 708w" sizes="(max-width: 300px) 100vw, 300px" />We've got a quick release for the Exceptionless JavaScript Client that includes a few new additions to what it supports and a quick bug fix or two.

Shout out to <a href="https://github.com/frankebersoll" target="_blank">@frankebersoll</a> for his help!

**Please download and update to the** <a href="https://github.com/exceptionless/Exceptionless.JavaScript/releases/tag/v1.2.0" target="_blank">source code here</a>, and view the full <a href="https://github.com/exceptionless/Exceptionless.JavaScript/compare/v1.1.1...v1.2.0" target="_blank">change log here</a>.<!--more-->

## JavaScript Client v1.2 Notes

**Errors**
@frankebersoll added support for deduplicating JavaScript erros. Thanks!

**Data Collection
** Frank's back at it, adding support for collecting extra exception data that was already in the .NET client like module info, custom exception properties, and everything else that was already displayed in the UI when using the .NET client.

**Node** **Info
** Support for collecting Node module info has also been added (thanks again, @frankebersoll).

**Bug Fix &#8211; Invalid States**
An issue where Data Exclusions could cause events to be submitted in an invalid state has been fixed.

### As always, let us know if you have any questions or feedback!
