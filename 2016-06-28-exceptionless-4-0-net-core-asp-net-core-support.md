---
id: 14531
postTitle: Exceptionless.NET 4.0 &#8211; .NET Core and ASP.NET Core Support!
date: 2016-06-28T15:07:10-06:00
author: Exceptionless
layout: blog_post.liquid
tags: ["posts"]
---
That's right folks, with the release of Exceptionless.NET 4.0 you can now build .NET applications with Exceptionless on Linux, MacOS, and Windows!

We've added .NET Core, ASP.NET Core, and .NET Standard 1.2+ support.

We know many of you have been waiting for this, and it's been a long time coming, but we sat down, put in the hours, and made it happen for you guys!

[<img class="aligncenter wp-image-14540 size-full" style="margin-bottom: 20px;" src="/assets/Screen-Shot-2016-06-28-at-3.08.17-PM.png" alt="Exceptionless on Mac OSX" width="600" data-id="14540" srcset="/assets/Screen-Shot-2016-06-28-at-3.08.17-PM.png 885w, /assets/Screen-Shot-2016-06-28-at-3.08.17-PM-300x189.png 300w, /assets/Screen-Shot-2016-06-28-at-3.08.17-PM-768x484.png 768w" sizes="(max-width: 885px) 100vw, 885px" />](/assets/Screen-Shot-2016-06-28-at-3.08.17-PM.png)

<!--more-->The NuGet package now supports .NET Standard 1.2+, PCL Profile 151, and .NET 4.5.

**To make upgrading easy**, the `Exceptionless.Portable` NuGet package still exists and is dependent on the `Exceptionless` Package.

If .NET 4.0 is a requirement for your projects, you will need to continue using the Exceptionless.NET v3.5 NuGet Packages, which are not being deprecated.

As a matter of housekeeping, we removed the `ExceptionlessClient.Current` property, which was replaced with `ExceptionlessClient.Default` in v2.0.0, and the configuration `EnableSSL` properties (also depracated in v2).

## Upgrading

Updating the NuGet packages should be all you need to do if you are upgrading from Exceptionless.NET v2 or v3. Take a look at the [upgrade guide](https://github.com/exceptionless/Exceptionless.Net/wiki/Upgrading) if you have any questions.
