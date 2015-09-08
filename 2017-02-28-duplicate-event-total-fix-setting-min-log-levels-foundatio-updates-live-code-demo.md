---
id: 15350
postTitle: 'Duplicate Event Total Fix, Setting Min Log Levels, Foundatio Updates, and more &#8211; Live Code Demo'
date: 2017-02-28T11:31:55-06:00
author: Exceptionless
layout: blog_post.liquid
tags: ["posts"]
---
[<img loading="lazy" class="aligncenter size-large wp-image-15351" style="margin-bottom: 20px;" src="https://exceptionless.com/assets/170228-header-1024x538.jpg" alt="exceptionless duplicate event totals, min log levels, foundatio" width="940" height="494" data-id="15351" srcset="https://exceptionless.com/assets/170228-header-1024x538.jpg 1024w, https://exceptionless.com/assets/170228-header-300x158.jpg 300w, https://exceptionless.com/assets/170228-header-768x403.jpg 768w, https://exceptionless.com/assets/170228-header.jpg 1200w" sizes="(max-width: 940px) 100vw, 940px" />](https://www.liveedu.tv/niemyjski/2qyKy-exceptionless-weekly-demo-2-20-17/bGgd4-exceptionless-weekly-demo-2-13-17/)

Blake&#8217;s back at it this week, onward to something new after the Exceptionless 4.0 launch. Today we talk deduplicate event totals, setting minimum log levels, updates to Foundatio, and tracking down an event processor job issue!<!--more-->

  * We had previously reverted to earlier commits that showed the deduplicated event total separately from the event total, but since we are running on new indexes now, we are able to reliably **include the deduplicated total as the total number of events**. [_GitHub Issue #270_](https://github.com/exceptionless/Exceptionless/issues/270)

  * You can now set the min log level in configuration using: <pre class="brush: csharp; title: ; notranslate" title="">ExceptionlessClient.Default.SetDefaultMinLogLevel(LogLevel.Warn);</pre>
    
    _[Learn more](https://github.com/exceptionless/Exceptionless.Net/commit/bc29626a8c70fb23cb22983f8e55818b8f889cb2)_</li> </ul> 
    
      * The [Foundatio](https://github.com/exceptionless/Foundatio) updates we made include performance and handling improvements to the message bus. [Learn more about these improvements on GitHub](https://github.com/exceptionless/Foundatio/commit/c66ce6691614fca4ef423a34505a51ea0f2f354f). We also added IHybridCacheClient interface marker, giving you granular control over dependency injection. Now, you can inject either a cache client or a hybrid cache client much easier. _[Learn more.](https://github.com/exceptionless/Foundatio/commit/c0e30a08a80c4a29a47c83d8dda32316e4a9ed04)_
    
      * Lastly for this week, we are working on tracking down the root cause of an issue with the event processor job that is causing it to stop processing events. More on that soon!
    
    <h2 style="text-align: center;">
      <a href="https://www.liveedu.tv/niemyjski/2qyKy-exceptionless-weekly-demo-2-20-17/bGgd4-exceptionless-weekly-demo-2-13-17/">WATCH NOW</a>
    </h2>
    
    <p style="text-align: center;">
      <a href="https://exceptionless.com/category/live-coding/">Watch more Live Code Demos</a>
    </p>
