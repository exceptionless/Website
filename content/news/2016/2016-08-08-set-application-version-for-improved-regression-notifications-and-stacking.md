---
id: 14636
title: Set Application Version for Improved Regression Notifications and Stacking
date: 2016-08-08
---
[![versioning](/assets/img/news/versioning-300x163.png)](/assets/versioning.png)Do you get annoyed and overwhelmed by event and error notifications?

You probably have more than one version of your application running, and often **older versions of your app may still be triggering events** that have been fixed in newer versions.

**Those events and notifications aren't very ****helpful**, so we implemented a versioning system that allows you to set an application version on all events!

After setting an application version, **when you mark an event fixed and give it a version number, it will only regress if it occurs again in a newer version of your app.**

That means there is **less noise for you to wade through, and you can focus on new issues** in your application without seeing old or non-relevant events constantly.<!--more-->

## How to Set an Application Version

Setting an application version in Exceptionless is easy. By default, we attempt to resolve one automatically based on assembly attributes, but we recommend specifying one yourself for improved reliability and accuracy using the following examples.

### .NET Version Specification Example

```cs
using Exceptionless;
ExceptionlessClient.Default.Configuration.SetVersion("1.2.3");
```

### JavaScript/Node.JS Version Specification Example

```js
exceptionless.ExceptionlessClient.default.config.setVersion("1.2.3");
```

## Fixed!

Great! Now, when you mark an error stack as fixed and enter the version that you fixed it in, that event stack will have a `Fixed In [Version]` tag and will only regress if it occurs again in a later version of your app. If it does regress, the stack then gets the `REGRESSED` tag.<figure id="attachment_14647" class="thumbnail wp-caption aligncenter" style="width: 300px">

[![Regressed](/assets/regressed-300x91.jpg)](/assets/regressed.jpg)<figcaption class="caption wp-caption-text">Regressed</figcaption></figure>

If you would like to view fixed events, you can always use the `*` wildcard or `fixed:true` in search.

**We hope you find this feature useful**, and as always don't hesitate to leave us feedback over on [GitHub](https://github.com/exceptionless/Exceptionless/issues) or by commenting below.
