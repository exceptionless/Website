---
id: 15963
postTitle: Exceptionless.NET 4.1 Release &#8211; .NET Standard 2.0 &#038; Microsoft.Extensions.Logging Support, and more!
date: 2017-11-07T15:51:12-06:00
author: Exceptionless
layout: blog_post.liquid
tags: ["posts"]
---
<img loading="lazy" class="aligncenter size-large wp-image-15970" style="margin-bottom: 20px;" src="/assets/exceptionless-net-4-1-release-1024x538.jpg" alt="Exceptionless.NET 4.1 Release" width="940" height="494" data-id="15970" srcset="/assets/exceptionless-net-4-1-release-1024x538.jpg 1024w, /assets/exceptionless-net-4-1-release-300x158.jpg 300w, /assets/exceptionless-net-4-1-release-768x403.jpg 768w, /assets/exceptionless-net-4-1-release.jpg 1200w" sizes="(max-width: 940px) 100vw, 940px" />

[Exceptionless.NET](https://github.com/exceptionless/Exceptionless.Net) 4.1 is here and we wanted to make a quick blog post highlighting the new features, bug fixes, and of course upgrading.

In this release, we focused primarily on adding .NET Standard 2.0 support, along with ongoing performance enhancements and bug fixes.

More details, below:<!--more-->

## Exceptionless.NET 4.1 New Features

  1. We've added .NET Standard 2.0 support, which allows you to easily integrate with UWP applications now.
  2. Microsoft.Extensions.Logging support has also been added via the Exceptionless.Extensions.Logging client. Thank you [@moogle001](https://github.com/moogle001) for contributing to this feature!
  3. Thanks to [@jamierushton](https://github.com/jamierushton), we now allow `null` and `default` values to be serialized, which translates to greater insight into contextual data.
  4. We're now using [GitLink](https://github.com/GitTools/GitLink) to debug packages more easily.

## Version 4.1 Bug Fixes

* GetFiles has been replaced with the EnumerateFiles method to improve performance in FolderObjectStorage. Thanks [@edwardmeng](https://github.com/edwardmeng) for that contribution!
* @edwardmeng also helped us improve diangnostic logging by including timestamps and log level. Thanks again!

## Upgrading to Exceptionless.NET 4.1

If you are using our hosted service, you do not need to upgrade anything on your end. If you are self hosting Exceptionless and upgrading from version 2 or 3, you should just have to update your NuGet packages. See our [upgrade guide](https://github.com/exceptionless/Exceptionless.Net/wiki/Upgrading) for more information.

Check out the [official release notes](https://github.com/exceptionless/Exceptionless.Net/releases/tag/v4.1.0) here, or view the [full changelog](https://github.com/exceptionless/Exceptionless.Net/compare/v4.0.4...v4.1.0) if you are interested in a complete list of changes.

## How are we doing?

As always, we want to know what you think! If you have questions, concerns, or any feedback, please [submit an issue over on the GitHub repo](https://github.com/exceptionless/Exceptionless.Net/issues/new).


