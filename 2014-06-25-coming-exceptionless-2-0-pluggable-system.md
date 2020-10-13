---
id: 9074
postTitle: Coming in Exceptionless 2.0 &#8211; A Pluggable System
date: 2014-06-25T09:30:52-06:00
author: Exceptionless
layout: blog_post.liquid
tags: ["posts"]
---
<img loading="lazy" style="margin-bottom:20px;" class="aligncenter size-full wp-image-9075" src="/assets/pluggable-system.jpg" alt="Pluggable System" width="708" height="250" data-id="9075" srcset="/assets/pluggable-system.jpg 708w, /assets/pluggable-system-300x105.jpg 300w" sizes="(max-width: 708px) 100vw, 708px" />

In the last Exceptionless 2.0 article, we announced the upcoming <a title="More from the Upcoming Exceptionless 2.0: Simplified API" href="/upcoming-exceptionless-2-0-simplified-api/" target="_blank">simplified API</a>. Today, we want to introduce another major piece of V2.0 &#8211; the **pluggable system**.

Plugins will allow customization and translation throughout the Exceptionless platform, including integration with third-party services and more. Read on for more details about pluggable details such as event parsing, event pipeline, and formatting.<!--more-->

## <a class="anchor" style="color: #4183c4;" href="https://github.com/exceptionless/Exceptionless/wiki/Exceptionless-2.0-Overview#event-parsing-source" name="user-content-event-parsing-source"></a>Event Parsing

<ul class="task-list">
  <li>
    Has access to the raw POST data as well as the content type and submission client info.
  </li>
  <li>
    Used to translate that raw data into events.
  </li>
  <li>
    Can easily create new plugins to support new data formats like system logs.
  </li>
  <li>
    Can be used to support other JSON formats like adding support for clients made for other systems.
  </li>
</ul>

[Source](https://github.com/exceptionless/Exceptionless/blob/master/Source/Core/Plugins/EventParser/IEventParserPlugin.cs)

## <a class="anchor" style="color: #4183c4;" href="https://github.com/exceptionless/Exceptionless/wiki/Exceptionless-2.0-Overview#event-pipeline-source" name="user-content-event-pipeline-source"></a>Event Pipeline

<ul class="task-list">
  <li>
    Can be used to add new functionality to the system.
  </li>
  <li>
    Gets called on startup, when an event is starting to be processed and when an event is done being processed.
  </li>
  <li>
    Has access to settings from both the org and project level.
  </li>
  <li>
    Can be used to create integrations for 3rd party services like HipChat, Trello, GitHub, Slack, etc.
  </li>
</ul>

[Source](https://github.com/exceptionless/Exceptionless/blob/master/Source/Core/Plugins/EventPipeline/IEventPlugin.cs)

## <a class="anchor" style="color: #4183c4;" href="https://github.com/exceptionless/Exceptionless/wiki/Exceptionless-2.0-Overview#formatting-source" name="user-content-formatting-source"></a>Formatting

<ul class="task-list">
  <li>
    Used to control how events are displayed in the system.
  </li>
  <li>
    Controls the summary view of an event.
  </li>
  <li>
    Controls the stack title.
  </li>
  <li>
    Controls what notification emails look like.
  </li>
  <li>
    Controls which view is used to display the details of an event.
  </li>
</ul>

[Source](https://github.com/exceptionless/Exceptionless/blob/master/Source/Core/Plugins/Formatting/IFormattingPlugin.cs)
We believe building a pluggable exception reporting system and allowing third-party service and app access will create one of the most flexible, usable, and friendly solutions on the market.

### Coming Soon

We're anxious to get Exceptionless 2.0 wrapped up, but we do not have an ETA currently. We are working hard and making good progress, so keep an eye out for more sneak peeks, feature announcements, and progress reports!

As always, please let us know if you have any feedback or questions.
