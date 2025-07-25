---
title: .NET Client
key: .NET
---
Exceptionless provides a simple-to-use .NET client for your convenience. To get started, you'll need to install the client. There are a variety of ways to install, but for brevity we'll focus on the dotnet cli. If you don't have that installed, [follow the guide here](https://docs.microsoft.com/en-us/dotnet/core/sdk).

Exceptionless provides packages for specific platform (listed toward the bottom of this page), but to get started quickly, you can install the root version of Exceptionless like so:

`dotnet add package Exceptionless`

If you want to install a specific version, you can pass in the `--version` flag like this:

`dotnet add package Exceptionless --version 4.5.0`

For more specific packages for your particular target platform, we have provided the following packages:

## [Exceptionless.Mvc](https://www.nuget.org/packages/Exceptionless.Mvc/)

Exceptionless client for ASP.NET MVC 3+ applications.

## [Exceptionless.WebApi](https://www.nuget.org/packages/Exceptionless.WebApi/)

Exceptionless client for ASP.NET Web API applications.

## [Exceptionless.Web](https://www.nuget.org/packages/Exceptionless.Web/)

Exceptionless client for ASP.NET WebForms applications.

## [Exceptionless.AspNetCore](https://www.nuget.org/packages/Exceptionless.AspNetCore/)

Exceptionless client for ASP.NET Core applications.

## [Exceptionless.Nancy](https://www.nuget.org/packages/Exceptionless.Nancy/)

Exceptionless client for [Nancy](http://nancyfx.org/) applications.

## [Exceptionless.Wpf](https://www.nuget.org/packages/Exceptionless.Wpf/)

Exceptionless client for WPF applications.

## [Exceptionless.Windows](https://www.nuget.org/packages/Exceptionless.Windows/)

Exceptionless client for Windows Forms applications.

## [Exceptionless.NLog](https://www.nuget.org/packages/Exceptionless.NLog/)

NLog target that sends log entries to Exceptionless.

## [Exceptionless.Log4net](https://www.nuget.org/packages/Exceptionless.Log4net/)

Log4net appender that sends log entries to Exceptionless.

## [Serilog.Sinks.ExceptionLess](https://www.nuget.org/packages/Serilog.Sinks.ExceptionLess/)

Serilog sink that sends log entries to Exceptionless.

<!-- Got it installed? Great, let's get started.

## Topics

* [Configuration](configuration.md)
* [Client Configuration Values](client-configuration-values.md)
* [Sending Events](sending-events.md)
* [Supported Platforms](supported-platforms.md)
* [Settings](settings.md)
* [Plugins](plugins.md)
* [Private Information](private-information.md)
* [Troubleshooting](troubleshooting.md)
* [Upgrading](upgrading.md)

## Related Topics

* [Reference Ids](../../references-ids.md)
* [User Sessions](../../user-sessions.md)
* [Manual Stacking](../../manual-stacking.md) -->

---

[Next > Platform Guides](guides/index.md) {.text-right}
