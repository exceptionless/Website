---
id: 12885
postTitle: Sending Log Messages to Exceptionless
date: 2015-03-31T10:47:58-06:00
author: Exceptionless
layout: blog_post.liquid
tags: ["posts"]
---
<img loading="lazy" class="alignright wp-image-12886 size-full" style="margin-left: 15px;" src="http://exceptionless.com/assets/log-messages.png" alt="Exceptionless Log Message Events" width="199" height="200" data-id="12886" srcset="/assets/log-messages.png 199w, /assets/log-messages-150x150.png 150w" sizes="(max-width: 199px) 100vw, 199px" />We&#8217;re all about exceptions, but sometimes, as developers, we run into bugs that don&#8217;t throw them but still cause major havoc in the system. There are also times we just need to record an event with a custom message to help track down bottlenecks, etc.

That&#8217;s where Exceptionless meets log messages.

In Exceptionless 2.0, you can now send custom log messages to a Log Messages dashboard where they can be tracked and view just like exceptions and other events.

Lets take a closer look&#8230;<!--more-->

## How to Submit a Log Message to Exceptionless

### Using the Client

For this example, we are assuming that you have already created an account and installed and <a title="Configure Exceptionless" href="http://docs.exceptionless.com/contents/configuration/" target="_blank">configured</a> the Exceptionless 2.0 client. If you are still using the 1.x client, you will need to <a title="Upgrade Exceptionless Client" href="http://docs.exceptionless.com/contents/upgrading/" target="_blank">upgrade</a> to send us log messages. Please contact support via an in-app support message or our <a title="Contact Exceptionless" href="http://exceptionless.com/contact/" target="_blank">contact page</a> if you have any questions or need assistance in this area.

#### Let&#8217;s submit a log message

<pre>using Exceptionless;
ExceptionlessClient.Default.SubmitLog("Application starting up");</pre>

That&#8217;s your basic log message.

#### **Getting fancier**, you can also specify the log source and log level.

In the below example, &#8220;_typeof(MainWindow)__.FullName_&#8221; specifies the log source, and &#8220;_Info_&#8221; specifies the log level. If no log source is specified, the log messages will be stacked under a global log stack.

We recommend specifying one of the following log levels, all of which add a visual indicator to each log message (see below screenshot).

  * Trace
  * Debug
  * Info
  * Warn
  * Error

<pre>ExceptionlessClient.Default.SubmitLog(typeof(MainWindow).FullName, "Info log example", "Info");
</pre>

Here&#8217;s a screenshot of what the visual indicators for the different types of log levels look like.

[<img loading="lazy" class="aligncenter wp-image-12887 size-full" src="http://exceptionless.com/assets/log-messages-log-level.png" alt="Exceptionless Log Message Preview" width="813" height="537" data-id="12887" srcset="/assets/log-messages-log-level.png 813w, /assets/log-messages-log-level-300x198.png 300w" sizes="(max-width: 813px) 100vw, 813px" />](http://exceptionless.com/assets/log-messages-log-level.png)

#### You can also add additional information using our fluent API.

This is helpful wen you want to add contextual information, contact information, or a tag.

In the below example, we will use the &#8220;_CreateLog_&#8221; method to add a tag to the log message.

<pre>using Exceptionless;
ExceptionlessClient.Default.CreateLog(typeof(MainWindow).FullName, "Info log example", "Info").AddTags("Wpf").Submit();
</pre>

There are a number of additional pieces of data you can use for your event. The below bullets include the current EventBuilder list, but we are always adding more that can be found on <a title="Exceptionless EventBuilder.cs" href="https://github.com/exceptionless/Exceptionless.Net/blob/master/Source/Shared/EventBuilder.cs" target="_blank">GitHub</a>. Also, view more examples here on our <a title="Send Exceptionless Events" href="http://docs.exceptionless.com/contents/sendingevents/" target="_blank">Sending Events</a> page.

  * AddTags
  * SetProperty
  * AddObject
  * MarkAsCritical
  * SetUserIdentity
  * SetUserDescription
  * SetVersion
  * SetSource
  * SetSessionId
  * SetReferenceId
  * SetMessage
  * SetGeo
  * SetValue
  * And more, depending on your client

### Using the REST API

You can also submit a log message with an HTTP post to our <a title="Exceptionless Events Endpoint" href="https://api.exceptionless.io/docs/index#!/Event/Event_Post" target="_blank">events endpoint</a>.

<pre>My log message
My second log message.</pre>

By default, any content that is submitted to the API post is a log message. The above example will be broken into two log messages because it automatically splits text content by the new line.

#### You can submit a log message via JSON, too.

See details in our <a title="Exceptionless JSON Post API Documentation" href="https://api.exceptionless.io/docs/index#!/Event/Event_Post" target="_blank">API Documentation</a>. If you need an API key for simply posting events, you can find it in your <a title="Exceptionless" href="https://be.exceptionless.io/" target="_blank">project settings</a>. Otherwise, please refer to the <a title="Exceptionless Auth Login API Documentation" href="https://api.exceptionless.io/docs/index#!/Auth/Auth_Login" target="_blank">auth login documentation</a> to get a user scoped api key.

Below is a JSON example of a log message, with source, message, and log level.

<pre>{
  "type": "log",
  "source": "WpfApplication3.MainWindow",
  "message": "Application started",
  "data": {
    "@level": "Info",
  }
}
</pre>

### Using NLog or Log4net Targets

We also have integrations with major logging frameworks. The benefits of using a logging framework is finer, more granular control over what is logged.

For example, you can log only warnings or errors project-wide, but then enable trace level messages for a specific class. <a title="Exceptionless NLog Log Message Implementation" href="https://github.com/exceptionless/Exceptionless/blob/master/Source/Api/NLog.config#L31-L34" target="_blank">We do this on our project</a> to keep our system from getting filled up with noise that doesn&#8217;t add any value unless there is an issue.

This also allows you to quickly change what you want to log to. Maybe you want to turn off logging to Exceptionless, or log to Exceptionless and to disk.

#### NLog or Log4net Usage

To use the <a title="Exceptionless NLog Nuget Package" href="https://www.nuget.org/packages/exceptionless.nlog" target="_blank">NLog </a>or <a title="Exceptionless Log4net Nuget Package" href="https://www.nuget.org/packages/exceptionless.log4net" target="_blank">Log4net</a> clients, you’ll just need to bring down the nuget package and follow the detailed readme. You can also take a look at our <a title="Exceptionless NLog Log4net Logging Sample" href="https://github.com/exceptionless/Exceptionless.Net/tree/master/Source/Samples/SampleConsole" target="_blank">sample app</a>, which uses both frameworks.

_<span style="color: #993300;"><strong>Note on performance: Use in-memory event storage for high volumes</strong></span>_

_There are some performance considerations you should be aware of when you are logging very high numbers of log events and using our client. We&#8217;ve spent a lot of time to ensure Exceptionless doesn&#8217;t degrade your applications performance. However, if you are logging thousands of messages a minute, you should use the in-memory event storage._

<pre>using Exceptionless;
ExceptionlessClient.Default.Configuration.UseInMemoryStorage();
</pre>

This tells the client not to serialize the log events to disk before sending and thus is much faster (the client doesn&#8217;t need to serialize the event to disk and read it from disk before sending). This comes at the expense that if the application dies, you will lose any unsent events that were in memory. When you use the NLog or Log4net targets and specify the API key as part of the target configuration, we will automatically create a second client instance that uses in-memory storage only for log messages. This way, any logged exceptions or feature usages still use disk storage, while log messages use in-memory storage, allowing maximum performance.

**Another Note: **We are also working on updating the <a title="Exceptionless Serilog Github Issue" href="https://github.com/serilog/serilog/issues/381" target="_blank">Serilog implementation</a>.

## Log Messages Dashboard

The Log Messages Dashboard makes it easy to see log occurrences. You can keep track of how active a component is, or how long code takes to execute using existing metrics.

For metrics, we have created an <a href="https://github.com/exceptionless/Foundatio" target="_blank">open source metrics library called Foundatio</a>. We use it for Exceptionless, and think you will find it extremely helpful as well. Check it out! We&#8217;ll be posting an article on Foundatio soon, so check back.

## [<img loading="lazy" class="aligncenter size-full wp-image-12889" src="http://exceptionless.com/assets/log-messages-dashboard.png" alt="log-messages-dashboard" width="796" height="867" data-id="12889" srcset="/assets/log-messages-dashboard.png 796w, /assets/log-messages-dashboard-275x300.png 275w" sizes="(max-width: 796px) 100vw, 796px" />](http://exceptionless.com/assets/log-messages-dashboard.png)  
How Are You Liking Exceptionless 2.0?

We think we&#8217;ve added some pretty cool features to Exceptionless 2.0, including logging, but you are the ultimate judge. What&#8217;s good? What&#8217;s bad? What&#8217;s missing? Let us know via a comment on the blog, social media, in-app, or however else you want to get in touch!

If you&#8217;re new to Exceptionless 2.0, make sure to [check out the launch article](http://exceptionless.com/its-go-time-exceptionless-2-0-launched/ "Exceptionless 2.0 Launched") for more details on the new features and enhancements.
