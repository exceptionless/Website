---
id: 12968
postTitle: An Exceptionless NuGet Package Tour
date: 2015-04-16T09:21:59-06:00
author: Exceptionless
layout: blog_post.liquid
tags: ["posts", ".NET"]
---
<img loading="lazy" class="alignright size-full wp-image-12970" style="margin-left: 20px;" src="http://exceptionless.com/assets/nugetlogo.png" alt="Exceptionless NuGet Packages" width="228" height="75" data-id="12970" />Giving back to the development community is important to us over here at Exceptionless. <a title="Exceptionless on GitHub" href="https://github.com/exceptionless" target="_blank">We love open source!</a>

As such, the Exceptionless <a title="Exceptionless NuGet Assembly Library" href="https://www.nuget.org/profiles/exceptionless?showAllPackages=True" target="_blank">NuGet assembly library</a>, with 31 assemblies and over 176,000 package downloads, is ever growing and expanding right along with our <a title="Exceptionless GitHub Repos" href="https://github.com/exceptionless" target="_blank">GitHub repos</a>.

We thought we would give everyone a quick tour, and at the same time perhaps provide a good resource and reference page.

Don&#8217;t forget, though &#8211; this page may be out-dated by the time you view it, so please <a title="Exceptionless NuGet Packages" href="https://www.nuget.org/profiles/exceptionless?showAllPackages=True" target="_blank">view our full library on NuGet</a>.<!--more-->

## Exceptionless NuGet Clients

Exceptionless, our primary <a title="Exceptionless GitHub Repo" href="https://github.com/exceptionless/Exceptionless.net" target="_blank">open source</a> application, provides real-time error, feature, and log reporting for ASP.NET, Web API, WebForms, WPF, Console, and MVC apps (and more, soon!).

Below you will find the NuGet assemblies for all the platforms we currently support.

<a title="Exceptionless.Portable NuGet Package" href="https://www.nuget.org/packages/Exceptionless.Portable/" target="_blank">Exceptionless.Portable</a>  
Exceptionless client for portable (PCL) applications. This is the base library all the other implementations build on top of. It contains all the basic functionality that powers the Exceptionless clients! This library can be used on many different platforms. It’s worth noting that this is a very basic client and as such you won’t get all the bells and whistles as described <a title="Exeptionless Configuration Documentation" href="http://docs.exceptionless.com/contents/configuration/" target="_blank">here</a> in the PCL configuration section. For those bells and whistles, see the Exceptionless package, below.  
Frameworks: .NET 4, .NET 4.5, SIlverlight 5, Windows 8, Windows Phone 8.1, Windows Phone Silverlight 8

<a title="Exceptionless NuGet Package" href="https://www.nuget.org/packages/Exceptionless/" target="_blank">Exceptionless<br /> </a>Exceptionless client for non visual (ie. Console and Services) applications.** **We recommend using this package if you are not using any other platform specific packages (E.G., Exceptionless.Mvc), as it provides all the bells and whistles that are missing in the portable package.  
Frameworks: .NET 4.0, .NET 4.5

<a title="Exceptionless.Mvc NuGet Package" href="https://www.nuget.org/packages/Exceptionless.Mvc/" target="_blank">Exceptionless.Mvc<br /> </a>Exceptionless client for ASP.NET MVC 3+ applications.  
Frameworks: .NET 4.0, .NET 4.5

<a title="Exceptionless.WebApi NuGet Package" href="https://www.nuget.org/packages/Exceptionless.WebApi/" target="_blank">Exceptionless.WebApi<br /> </a>Exceptionless client for ASP.NET Web API applications.  
Frameworks: .NET 4.0, .NET 4.5

<a title="Exceptionless.Web NuGet Package" href="https://www.nuget.org/packages/Exceptionless.Web/" target="_blank">Exceptionless.Web<br /> </a>Exceptionless client for ASP.NET WebForms applications.  
Frameworks: .NET 4.0, .NET 4.5

<a title="Exceptionless.Nancy NuGet Package" href="https://www.nuget.org/packages/Exceptionless.Nancy/" target="_blank">Exceptionless.Nancy<br /> </a>Exceptionless client for <a title="NancyFX" href="http://nancyfx.org/" target="_blank">Nancy</a> applications.  
Frameworks: .NET 4.0, .NET 4.5

<a title="Exceptionless.Wpf NuGet Package" href="https://www.nuget.org/packages/Exceptionless.Wpf/" target="_blank">Exceptionless.Wpf</a>  
Exceptionless client for WPF applications.  
Frameworks: .NET 4.0, .NET 4.5

<a title="Exceptionless.Windows NuGet Package" href="https://www.nuget.org/packages/Exceptionless.Windows/" target="_blank">Exceptionless.Windows<br /> </a>Exceptionless client for Windows Forms applications.  
Frameworks: .NET 4.0, .NET 4.5

<a title="Exceptionless.NLog NuGet Package" href="https://www.nuget.org/packages/Exceptionless.NLog/" target="_blank">Exceptionless.NLog<br /> </a>NLog target that sends log entries to Exceptionless.  
Frameworks: .NET 4.0, .NET 4.5

<a title="Exceptionless.Log4net NuGet Package" href="https://www.nuget.org/packages/Exceptionless.Log4net/" target="_blank">Exceptionless.Log4net<br /> </a>Log4net appender that sends log entries to Exceptionless.  
Frameworks: .NET 4.0, .NET 4.5

<a title="Serilog.Sinks.Exceptionless NuGet Package" href="https://www.nuget.org/packages/Serilog.Sinks.ExceptionLess/" target="_blank">Serilog.Sinks.ExceptionLess<br /> </a>Serilog sink that sends log entries to Exceptionless.  
Frameworks: .NET 4.0, .NET 4.5  
<a title="Exceptionless sink for Serilog Source Code" href="https://github.com/serilog/serilog-sinks-exceptionless" target="_blank">View Source</a>

### Signed Assemblies

We also have signed versions of most assemblies on our <a title="Exceptionless NuGet Profile" href="https://www.nuget.org/profiles/exceptionless?showAllPackages=True" target="_blank">NuGet Profile</a>. See MSDN for additional info on signing assemblies (<a title="Strong-Named Signed Assemblies" href="https://msdn.microsoft.com/en-us/library/wd40t7ad%28v=vs.110%29.aspx" target="_blank">Strong-Named Assemblies</a>).

## Foundatio by Exceptionless

Foundatio (Requires .NET 4.5) is an open source library for building distributed applications that we built, use, and think you will find helpful. Foundatio provides in memory, redis, and azure implementations. This allows you to do development or testing using in-memory versions and switch them out for redis or azure implementations in production. This saves you time (setup and maintaining) and money (not paying for cloud resources) during development and testing! Foundatio source code can be found at <a title="Foiundatio Source Code on GitHub" href="https://github.com/exceptionless/Foundatio" target="_blank">https://github.com/exceptionless/Foundatio</a>.

Exceptionless was built using Foundatio and utilizes implementations for caching, queues, locks, messaging, jobs, file storage, and metrics.

<a title="Foundatio Exceptionless NuGet Package" href="https://www.nuget.org/packages/Foundatio/" target="_blank">Foundatio</a>  
Foundatio consists of pluggable foundation blocks for building distributed apps, including caching, queues, locks, messaging, jobs, file storage, and metrics.

<a title="Foundatio Redis Implementations NuGet Package" href="https://www.nuget.org/packages/Foundatio.Redis/" target="_blank">Foundatio Redis Implementations</a>  
Contains the redis implementations of caching, queues, locks, messaging, jobs, file storage.

<a title="Foundatio Azure ServiceBus Implementations NuGet Package" href="https://www.nuget.org/packages/Foundatio.AzureServiceBus/" target="_blank">Foundatio Azure ServiceBus Implementations</a>  
Contains the redis implementations of queues and messaging. The azure packages are split into different packages so you don&#8217;t have to take extra azure dependencies on things you don&#8217;t need.

<a title="Foundatio Azure Storage Implementations NuGet Package" href="https://www.nuget.org/packages/Foundatio.AzureStorage/" target="_blank">Foundatio Azure Storage Implementations</a>  
Contains the redis implementations of file storage. The azure packages are split into different packages so you don&#8217;t have to take extra azure dependencies on things you don&#8217;t need.

## Other

<a title="Exceptionless Lucene Query Parser NuGet Package" href="https://www.nuget.org/packages/Exceptionless.LuceneQueryParser/" target="_blank">Exceptionless LuceneQueryParser</a>  
Lucene Query Parser is a lucene style query parser that is extensible and allows additional syntax features. We use this in <a title="Exceptionless Source Code" href="https://github.com/exceptionless/Exceptionless" target="_blank">Exceptionless</a> to <a title="Exceptionless Query Source Code" href="https://github.com/exceptionless/Exceptionless/blob/master/Source/Core/Filter/QueryProcessorVisitor.cs" target="_blank">ensure the query is valid before executing it, check to see if you are trying to a basic or premium search query and much more</a>!  
Frameworks: .NET 4.5  
<a title="Exceptionless LuceneQueryParser Source on GitHub" href="https://github.com/exceptionless/Exceptionless.LuceneQueryParser" target="_blank">View Source</a>

<a title="Exceptionless Random Data NuGet Package" href="https://www.nuget.org/packages/Exceptionless.RandomData/" target="_blank">Exceptionless RandomData</a>  
RandomData is a utility class for easily generating random data, making the creation of good unit test data a breeze.  
Frameworks: .NET 4.0, .NET 4.5  
<a title="Exceptionless Random Data Source Code" href="https://github.com/exceptionless/Exceptionless.RandomData" target="_blank">View Source</a>

<a title="Exceptionless Date Time Extensions NuGet Package" href="https://www.nuget.org/packages/Exceptionless.DateTimeExtensions/" target="_blank">Exceptionless DateTimeExtensions</a>  
This package includes DateTimeRange, Business Day, and various DateTime, DateTimeOffset, and TimeSpan extension methods.  
Frameworks: .NET 4.0, .NET 4.5, Windows 8, Windows Phone 8.1  
<a title="Exceptionless DateTimeExtensions Source Code on GitHub" href="https://github.com/exceptionless/Exceptionless.DateTimeExtensions" target="_blank">View Source</a>

## We&#8217;ll Keep Building!

We don&#8217;t plan on stopping anytime soon, and will continue writing assemblies to make life easier for developers everywhere. Naturally, we could always use your help, so <a title="Exceptionless GitHub" href="https://github.com/exceptionless" target="_blank">fork us on GitHub</a> if you feel like chipping in. We always appreciate our contributors!

Otherwise, let us know what you think of Exceptionless, Foundatio, and all our other projects. Feedback is always welcomed and appreciated.
