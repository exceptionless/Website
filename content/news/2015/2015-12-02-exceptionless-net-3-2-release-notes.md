---
id: 13847
title: Exceptionless.NET 3.2 Release Notes
date: 2015-12-02
---
<img loading="lazy" class="alignright wp-image-2978" style="margin-left: 15px;" src="/assets/exceptionless-logoBLK.png" alt="Exceptionless Logo" width="360" height="90" data-id="2978" srcset="/assets/exceptionless-logoBLK.png 1000w, /assets/exceptionless-logoBLK-300x75.png 300w" sizes="(max-width: 360px) 100vw, 360px" />The .NET Exceptionless client has received **several improvements** and **some bug fixes** in version 3.2. Details below!

A special shout-out to <a href="https://github.com/airwareic" target="_blank">@airwareic</a>, <a href="https://github.com/srijken" target="_blank">@srijken</a>, <a href="https://github.com/xbelt" target="_blank">@xbelt</a>, and <a href="https://github.com/mgnslndh" target="_blank">@mgnslndh</a> for contributing and helping make this release happen. **You guys rock!**

**Please download and update to the latest** <a href="https://github.com/exceptionless/Exceptionless.Net/releases/tag/v3.2.0" target="_blank">source here</a>, and you can view the full <a href="/why/" target="_blank">change log here</a>.<!--more-->

## .NET Exceptionless Client v3.2.0 Release Details

### Additions & Improvements

**Read Configuration**
We added support for reading configuration from environmental variables and app settings

**Closing Applications
** Closing applications after submission is now easier due to the new `SubmittedEvent` event handler.

**Custom Persistence Settings
** The new `QueueMaxAttempts` and `QueueMaxAge` configuration settings allow custom persistence settings and are intended to improve offline support. Thanks @airwareic!

**Data Exclusions Improvements**
We've made huge improvements to Data Exclusions, which now check default data and extra exception properties.

**New Overloads
** Thanks @xbelt for creating overloads for `CreateLog` and `SubmitLog` to accept the `LogLevel` enum!

**Custom Themes**
@mgnslndh updated the styling of the `CrashReportDialog` to play nice with custom themes. Thanks!

**Dependencies
** All dependencies (Nancy, NLog, etc) have been updated.

**Deprecated!
** The `EnableSSL` property has been marked Obsolete because it is no longer used. `ServerURL` is now being looked at for this.

### Fixes

**Startup()
** `Startup()` was overriding configured dependencies - Fixed!

**Empty Errors
** We fixed a bug where you could have empty errors submitted with no stack trace info.

**API Keys**

* Previously set valid API keys were being overwritten with default API keys, so we fixed it.
* We also fixed an issue where `ApiKey` couldn't be changed after the client was initialized.

**Reference IDs**
An issue with submitting generated reference IDs was resolved, thanks to @srijken

**Updating WebAPI Package
** @srijken also fixed another issue where updating the WebApi package would remove the Exceptionless Module. Thanks again!

**NLog**
Nlog wasn't working with .NET 4.0. This has been resolved.

**IsolatedStorage**
There was a problem that caused IsolatedStorage to not be able to be used. Fixed!

**Min Log Level**
NLog and log4net have been updated to allow setting the min log level.

## What Say You?

As always, we're listening to your feedback, comments, suggestions, and rants!

* [User Interface Feedback](https://github.com/exceptionless/Exceptionless.UI/issues/new)
* [.NET Client Feedback](https://github.com/exceptionless/Exceptionless.Net/issues/new)
* [JavaScript Client Feedback](https://github.com/exceptionless/Exceptionless.JavaScript/issues/new)
* [Exceptionless Feedback](https://github.com/exceptionless/exceptionless/issues/new)
