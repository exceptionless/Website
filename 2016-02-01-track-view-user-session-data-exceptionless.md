---
id: 14045
postTitle: 'Track and View User Session Data &#8211; New Exceptionless Feature!'
date: 2016-02-01T12:11:15-06:00
author: Exceptionless
layout: blog_post.liquid
tags: ["posts"]
---
<img loading="lazy" class="aligncenter size-large wp-image-14055" src="http://exceptionless.com/assets/sessions-dashboard-header2-1024x411.png" alt="app user session logging" width="940" height="377" data-id="14055" srcset="https://exceptionless.com/assets/sessions-dashboard-header2-1024x411.png 1024w, https://exceptionless.com/assets/sessions-dashboard-header2-300x120.png 300w, https://exceptionless.com/assets/sessions-dashboard-header2-768x308.png 768w, https://exceptionless.com/assets/sessions-dashboard-header2.png 1824w" sizes="(max-width: 940px) 100vw, 940px" />

To many, this feature may be the missing piece&#8230; that connection you&#8217;ve always wanted to make between users, bugs, exceptions, app events, etc. I&#8217;m talking about, of course, **user session tracking!**

That&#8217;s right, you can now use Exceptionless to track users as they use your app, which of course will come in super handy when you want to know exactly what they did to stumble upon or cause an error or trigger an event.

Continue reading to learn more about sessions and how you can enable them for your apps.

<!--more-->

## Session Overview

First, you must have a paid (premium) Exceptionless plan to report on sessions if you are hosting with us. This is mainly because of the added resource requirements the feature puts on our infrastructure. We think it&#8217;s definitely worth it, though!

Sessions can be searched/filtered like all other events &#8211; they are just an event type like exceptions or logs.

## What&#8217;s in a User Session Event?

Each user session records how long they were active and what they did. For instance, the average user session on be.exceptionless.io the first week we monitored it using the feature was two hours.

With that, each user session event has a &#8220;Session Events&#8221; tab that displays all the relevant events that occurred during that session and allows you to see exactly what that user did. This is especially helpful, of course, if that session lead to an exception or noteworthy event in your app.

<p style="text-align: center;">
  <a href="http://exceptionless.com/assets/sessions-event-tab-user-footsteps.jpg" rel="attachment wp-att-14046"><img loading="lazy" class="aligncenter size-medium wp-image-14046" src="http://exceptionless.com/assets/sessions-event-tab-user-footsteps-300x142.jpg" alt="App User Session Reporting" width="300" height="142" data-id="14046" srcset="https://exceptionless.com/assets/sessions-event-tab-user-footsteps-300x142.jpg 300w, https://exceptionless.com/assets/sessions-event-tab-user-footsteps-768x364.jpg 768w, https://exceptionless.com/assets/sessions-event-tab-user-footsteps.jpg 815w" sizes="(max-width: 300px) 100vw, 300px" /></a>
</p>

<p style="text-align: left;">
  All unique data that remains constant throughout the user session is also stored in the event, such as browser and environment information.
</p>

<p style="text-align: left;">
  <a href="http://exceptionless.com/assets/sessions-unique-user-data.jpg" rel="attachment wp-att-14047"><img loading="lazy" class="aligncenter size-medium wp-image-14047" src="http://exceptionless.com/assets/sessions-unique-user-data-300x155.jpg" alt="app user session unique data" width="300" height="155" data-id="14047" srcset="https://exceptionless.com/assets/sessions-unique-user-data-300x155.jpg 300w, https://exceptionless.com/assets/sessions-unique-user-data-768x398.jpg 768w, https://exceptionless.com/assets/sessions-unique-user-data.jpg 801w" sizes="(max-width: 300px) 100vw, 300px" /></a>
</p>

<h2 style="text-align: left;">
  Sounds Good. How do I Set it Up?
</h2>

<img loading="lazy" class="alignright size-full wp-image-14057" style="margin-left: 15px;" src="http://exceptionless.com/assets/sessions-dashboard-nav.jpg" alt="sessions-dashboard-nav" width="199" height="162" data-id="14057" /> First, you&#8217;ll need to update to the latest client versions to enable sessions, then you&#8217;ll have to follow the below steps to begin tracking them. Once you&#8217;ve got that set up, visit the new Sessions section under the Reports option on your main dashboard, or navigate directly to https://be.exceptionless.io/session/dashboard. If you are **self hosting**, make sure you <a href="http://exceptionless.com/new-releases-for-all-the-codes-exceptionless-3-2/" target="_blank">update to Exceptionless 3.2</a> first.

### Turning On Session Tracking

For Exceptionless to track a user for your app, you need to send a user identity with each event. To do so, you need to set the default user identity via the following client methods:

#### C#

<pre class="brush: csharp; title: ; notranslate" title="">using Exceptionless;
ExceptionlessClient.Default.Configuration.SetUserIdentity("UNIQUE_ID_OR_EMAIL_ADDRESS", "Display Name");</pre>

&nbsp;

#### JavaScript

<pre class="brush: jscript; title: ; notranslate" title="">exceptionless.ExceptionlessClient.default.config.setUserIdentity('UNIQUE_ID_OR_EMAIL_ADDRESS', 'Display Name');</pre>

Once the user is set on the config object, it will be applied to all future events.

**Please Note:** In WinForms and WPF applications, a plugin will automatically set the default user to the `<strong>Environment.UserName</strong>` if the default user hasn&#8217;t been already set. Likewise, if you are in a web environment, we will set the default user to the request principal&#8217;s identity if the default user hasn&#8217;t already been set.

If you are using WinForms, WPF, or a Borwser App, you can enable sessions by calling the `EnableSessions` extension method.

#### C#

<pre class="brush: csharp; title: ; notranslate" title="">using Exceptionless;
ExceptionlessClient.Default.Configuration.UseSessions();</pre>

#### JavaScript

<pre class="brush: jscript; title: ; notranslate" title="">exceptionless.ExceptionlessClient.default.config.useSessions();</pre>

## How do Sessions get Created?

Sessions are created in two different ways. Either the client can send a session start event, or we can create it automatically on the server side when an event is processed.

We have a <a href="https://github.com/exceptionless/Exceptionless/blob/master/Source/Core/Plugins/EventProcessor/Default/70_AutoSessionPlugin.cs#L29" target="_blank">server-side plugin</a> that runs as part of our pipeline process for every event &#8211; its sole purpose is to manage sessions by using a hash on the user&#8217;s identity as a lookup for the session id.

If the session doesnt&#8217; exist or the current event is a session event type, a new session id will be created. If we receive a `sessionend` event, we close that session and update the end time on the `sessionstart` event.

We also have a `CloseInactiveSessionsJob` event that runs every few minutes to close sessions that haven&#8217;t been updated in a set period of time. This allows you to efficiently show who is online and offline during a time window.

## How do I Enable Near Real-Time Online/Offline Then?

We do this by default in our JavaScript, WinForms, and WPF clients when you call the `UseSessions()` method.

In the background, we send a `heartbeat` event every 30 seconds if no other events have been sent in the last 30 seconds.

You can **disable this heartbeat** from being sent by passing `false` as an argument to the `UseSessions()` method.

The WinForms and WPF clients will also send a `SessionEnd` event when the process exits.

## Can I Manually Send SessionStart, SessionEnd, and heartbeat Events?

Sure! You can send these events manually via our client API to start, update, or end a session. Please remember, though, that a user identity must be set.

### C#

<pre class="brush: csharp; title: ; notranslate" title="">using Exceptionless;
ExceptionlessClient.Default.SubmitSessionStart();
ExceptionlessClient.Default.SubmitSessionHeartbeat();
ExceptionlessClient.Default.SubmitSessionEnd();</pre>

<a href="https://github.com/exceptionless/Exceptionless.Net/blob/master/Source/Shared/Extensions/ClientExtensions.cs#L159-L205" target="_blank">Source</a>

### JavaScript

<pre class="brush: jscript; title: ; notranslate" title="">exceptionless.ExceptionlessClient.default.submitSessionStart();
exceptionless.ExceptionlessClient.default.submitSessionHeartbeat();
exceptionless.ExceptionlessClient.default.submitSessionEnd();</pre>

<a href="https://github.com/exceptionless/Exceptionless.JavaScript/blob/master/src/ExceptionlessClient.ts#L96-L118" target="_blank">Source</a>

## Tell Us What You Think

As always, please send us your feedback. You can post it here in the comments or <a href="https://github.com/exceptionless" target="_blank">submit a GitHub Issue</a> and we will get back to you as soon as possible! We&#8217;re always looking for contributors, as well, so don&#8217;t be afraid to jump in and be the hero the code needs. Contributors get Exceptionless perks!
