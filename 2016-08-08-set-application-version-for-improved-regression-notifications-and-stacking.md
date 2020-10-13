---
id: 14636
postTitle: Set Application Version for Improved Regression Notifications and Stacking
date: 2016-08-08T12:48:39-06:00
author: Exceptionless
layout: blog_post.liquid
tags: ["posts"]
---
[<img loading="lazy" class="alignright size-medium wp-image-14641" src="http://exceptionless.com/assets/versioning-300x163.png" alt="versioning" width="300" height="163" data-id="14641" srcset="/assets/versioning-300x163.png 300w, /assets/versioning.png 634w" sizes="(max-width: 300px) 100vw, 300px" />](http://exceptionless.com/assets/versioning.png)Do you get annoyed and overwhelmed by event and error notifications?

You probably have more than one version of your application running, and often **older versions of your app may still be triggering events** that have been fixed in newer versions.

**Those events and notifications aren&#8217;t very ****helpful**, so we implemented a versioning system that allows you to set an application version on all events!

After setting an application version, **when you mark an event fixed and give it a version number, it will only regress if it occurs again in a newer version of your app.**

That means there is **less noise for you to wade through, and you can focus on new issues** in your application without seeing old or non-relevant events constantly.<!--more-->

## How to Set an Application Version

Setting an application version in Exceptionless is easy. By default, we attempt to resolve one automatically based on assembly attributes, but we recommend specifying one yourself for improved reliability and accuracy using the following examples.

### .NET Version Specification Example

<pre class="brush: csharp; title: ; notranslate" title="">using Exceptionless;
ExceptionlessClient.Default.Configuration.SetVersion("1.2.3");</pre>

### JavaScript/Node.JS Version Specification Example

<pre class="brush: jscript; title: ; notranslate" title="">exceptionless.ExceptionlessClient.default.config.setVersion("1.2.3");</pre>

## Fixed!

Great! Now, when you mark an error stack as fixed and enter the version that you fixed it in, that event stack will have a `Fixed In [Version]` tag and will only regress if it occurs again in a later version of your app. If it does regress, the stack then gets the `REGRESSED` tag.<figure id="attachment_14647" class="thumbnail wp-caption aligncenter" style="width: 300px">

[<img loading="lazy" class="wp-image-14647 size-medium" src="http://exceptionless.com/assets/fixed-300x105.jpg" width="300" height="105" data-id="14644" srcset="/assets/fixed-300x105.jpg 300w, /assets/fixed-768x268.jpg 768w, /assets/fixed.jpg 832w" sizes="(max-width: 300px) 100vw, 300px" />](http://exceptionless.com/assets/fixed.jpg)<figcaption class="caption wp-caption-text">Fixed</figcaption></figure> <figure id="attachment_14645" class="thumbnail wp-caption aligncenter" style="width: 300px">[<img loading="lazy" class="size-medium wp-image-14645" src="http://exceptionless.com/assets/regressed-300x91.jpg" alt="Regressed" width="300" height="91" data-id="14645" srcset="/assets/regressed-300x91.jpg 300w, /assets/regressed-768x233.jpg 768w, /assets/regressed.jpg 910w" sizes="(max-width: 300px) 100vw, 300px" />](http://exceptionless.com/assets/regressed.jpg)<figcaption class="caption wp-caption-text">Regressed</figcaption></figure> 

If you would like to view fixed events, you can always use the `*` wildcard or `fixed:true` in search.

**We hope you find this feature useful**, and as always don&#8217;t hesitate to leave us feedback over on [GitHub](https://github.com/exceptionless/Exceptionless/issues) or by commenting below.
