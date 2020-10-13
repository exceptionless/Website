---
id: 1202
postTitle: An In-Depth Look at the Exceptionless Project Portal
date: 2014-01-15T01:02:31-06:00
author: Exceptionless
layout: blog_post.liquid
tags: ["posts", ".NET", "Case Study"]
---
We cover the basic features of the Exceptionless platform on our [feature tour page](http://exceptionless.com/tour/ "Exceptionless Feature Tour"), but we wanted to give everyone a deeper look into all the information available via the web-based, real-time .NET error reporting admin area.

Continue reading to learn more.<!--more-->

## The Dashboard

<img class="aligncenter size-full wp-image-1268" src="http://exceptionless.com/assets/graph.jpg" alt="Visual .NET Exception Graph" width="100%" data-id="1268" srcset="/assets/graph.jpg 700w, /assets/graph-300x122.jpg 300w" sizes="(max-width: 700px) 100vw, 700px" />  
The Exceptionless Dashboard features a quick overview of the exceptions for the currently selected project. It also updates in real-time, so you can watch exceptions roll in.

This is a great place to glimpse your exceptions by total, unique, new, or per hour. The most frequent and most recent exceptions are also displayed here, along with a graph representing your total and unique exceptions. You can go directly to an error&#8217;s details by clicking on it.

**At the top of the page, throughout the admin, you can:**

  * Change the project you are currently viewing
  * Go to that projects settings
  * Adjust the date range
  * Show/Hide hidden errors
  * Show/Hide fixed errors
  * Show/Hide &#8220;Not Found&#8221; errors<figure id="attachment_1340" class="thumbnail wp-caption alignleft" style="width: 150px">

[<img loading="lazy" class="size-thumbnail wp-image-1340" src="http://exceptionless.com/assets/dashboard-home-150x150.jpg" alt="Exceptionless Dashboard" width="150" height="150" data-id="1340" />](http://exceptionless.com/assets/dashboard-home.jpg)<figcaption class="caption wp-caption-text">Portal Admin Dashboard</figcaption></figure> <figure id="attachment_1209" class="thumbnail wp-caption alignleft" style="width: 150px">[<img loading="lazy" class="size-thumbnail wp-image-1209 " title="Exceptionless Date Range Selector" src="http://exceptionless.com/assets/date-range-150x150.jpg" alt="Exceptionless Date Range Selector" width="150" height="150" data-id="1209" srcset="/assets/date-range-150x150.jpg 150w, /assets/date-range-300x300.jpg 300w, /assets/date-range.jpg 350w" sizes="(max-width: 150px) 100vw, 150px" />](http://exceptionless.com/assets/date-range.jpg)<figcaption class="caption wp-caption-text">Show/Hide Errors & Select Date Range</figcaption></figure> 

<div style="clear: both;">
</div>

## View Most Recent, Most Frequent, and New Exceptions

On the left side of the dashboard, you can select to view your Most Recent, Most Frequent, or New (first time) .NET exceptions.<figure id="attachment_1221" class="thumbnail wp-caption alignleft" style="width: 150px">

[<img loading="lazy" class="size-thumbnail wp-image-1221" src="http://exceptionless.com/assets/most-recent-150x150.jpg" alt="Most Recent .NET Exceptions" width="150" height="150" data-id="1221" />](http://exceptionless.com/assets/most-recent.jpg)<figcaption class="caption wp-caption-text">Most Recent Errors</figcaption></figure> <figure id="attachment_1222" class="thumbnail wp-caption alignleft" style="width: 150px">[<img loading="lazy" class="size-thumbnail wp-image-1222" src="http://exceptionless.com/assets/most-frequent-150x150.jpg" alt="Most Frequent .NET Exceptions" width="150" height="150" data-id="1222" />](http://exceptionless.com/assets/most-frequent.jpg)<figcaption class="caption wp-caption-text">Most Frequent Errors</figcaption></figure> <figure id="attachment_1223" class="thumbnail wp-caption alignleft" style="width: 150px">[<img loading="lazy" class="size-thumbnail wp-image-1223" src="http://exceptionless.com/assets/new-150x150.jpg" alt="New .NET Exceptions" width="150" height="150" data-id="1223" />](http://exceptionless.com/assets/new.jpg)<figcaption class="caption wp-caption-text">New Errors</figcaption></figure> 

<div style="clear: both;">
</div>

### Most Recent

The most recent report lists your errors individually with the one that occurred last at the top. It also tells you exactly how long ago the error occurred. You can click into the exception to view details.

### Most Frequent and New Exceptions

Each of these reports lists the respective error type with a summary, the count, when the error first happened, and the last occurrence. Most frequent is ordered by count, and new is ordered by most recent.

## Lets Take a Look at Exception Details

### Error Stack Page<figure id="attachment_1226" class="thumbnail wp-caption alignleft" style="width: 150px">

[<img loading="lazy" class="size-thumbnail wp-image-1226" src="http://exceptionless.com/assets/error-stack-150x150.jpg" alt="Error Stack Dashboard" width="150" height="150" data-id="1226" />](http://exceptionless.com/assets/error-stack.jpg)<figcaption class="caption wp-caption-text">Error Stack Page</figcaption></figure> <figure id="attachment_1227" class="thumbnail wp-caption alignleft" style="width: 150px">[<img loading="lazy" class="size-thumbnail wp-image-1227" src="http://exceptionless.com/assets/exception-options-150x150.jpg" alt="Error Stack Options" width="150" height="150" data-id="1227" srcset="/assets/exception-options-150x150.jpg 150w, /assets/exception-options-300x300.jpg 300w, /assets/exception-options.jpg 375w" sizes="(max-width: 150px) 100vw, 150px" />](http://exceptionless.com/assets/exception-options.jpg)<figcaption class="caption wp-caption-text">Mark Fixed & Options</figcaption></figure> 

<div style="clear: both;">
</div>

If you click into any error, Exceptionless will show you the error stack, which includes the number of occurrences, when it first happened, and the latest re-occurrence. You can adjust the date range on this page, like the rest, and you also get a nice graph of that error&#8217;s occurrences over time. Each individual time the error triggered is listed below the graph, and you can click into each instance separately.

**Before we do that, though,** I&#8217;d like to point out another major feature of the error stack page..

Above and to the right of the graph are two buttons: &#8220;Mark Fixed&#8221; and &#8220;Options&#8221;. Mark fixed is exactly what it sounds like, and if you click on the &#8220;Options&#8221; button it drops down with the following choices:

  * Hide from reports
  * Promote to external
  * Add reference link
  * Disable notifications
  * Future occurrences are critical
  * Reset stats

### Individual Error Details

After you click into an individual error instance, you will see the following tabs.<figure id="attachment_1230" class="thumbnail wp-caption alignleft" style="width: 125px">

[<img loading="lazy" class="size-thumbnail wp-image-1230" src="http://exceptionless.com/assets/exception-details-overview-150x150.jpg" alt=".NET Error Overview" width="125" height="125" data-id="1230" />](http://exceptionless.com/assets/exception-details-overview.jpg)<figcaption class="caption wp-caption-text">Error Overview</figcaption></figure> <figure id="attachment_1231" class="thumbnail wp-caption alignleft" style="width: 125px">[<img loading="lazy" class="size-thumbnail wp-image-1231" src="http://exceptionless.com/assets/exception-details-exception-150x150.jpg" alt=".NET Exception Details" width="125" height="125" data-id="1231" />](http://exceptionless.com/assets/exception-details-exception.jpg)<figcaption class="caption wp-caption-text">Exception Details</figcaption></figure> <figure id="attachment_1232" class="thumbnail wp-caption alignleft" style="width: 125px">[<img loading="lazy" class="size-thumbnail wp-image-1232" src="http://exceptionless.com/assets/exception-details-request-150x150.jpg" alt=".NET Exception Request Details" width="125" height="125" data-id="1232" />](http://exceptionless.com/assets/exception-details-request.jpg)<figcaption class="caption wp-caption-text">Request Details</figcaption></figure> <figure id="attachment_1233" class="thumbnail wp-caption alignleft" style="width: 125px">[<img loading="lazy" class="size-thumbnail wp-image-1233" src="http://exceptionless.com/assets/exception-details-environment-150x150.jpg" alt=".NET Exception Environment Details" width="125" height="125" data-id="1233" />](http://exceptionless.com/assets/exception-details-environment.jpg)<figcaption class="caption wp-caption-text">Env. Details</figcaption></figure> 

<div style="clear: both;">
</div>

#### Error Overview

This page shows you a quick overview of the error, including the stack trace. It includes the date and time, type, message, platform, URL, and referrer. You can also go to the previous or next occurrence.

#### Exception

This tab displays a few overview details, then gives you a list of loaded modules related to the error.

#### Request

The request view gives you the request details, including date and time, http method, url, referrer, client IP, user agent, browser, browser OS, device, and whether or not it&#8217;s a known bot. You also get Post Data.

#### Environment

Because you needed **all** the data, the environment tab displays time and date, machine name, ip address, processor count, total, available, and process memory, OS name, OS version, architecture, runtime version, process ID, process name, and command line details. It also has client information, such as install date, version, platform, submission method, application starts, and errors submitted.

## What Else Can I Do from the Admin?

Naturally, you can manager your projects, organizations, and account, but we also have pretty handy feedback and support tools so you can let us know how we&#8217;re doing! Your feedback and comments are important and provide direction to the code.<figure id="attachment_1246" class="thumbnail wp-caption alignleft" style="width: 150px">

[<img loading="lazy" class="size-thumbnail wp-image-1246" src="http://exceptionless.com/assets/projects-150x150.jpg" alt="Exceptionless Project Dashboard" width="150" height="150" data-id="1246" />](http://exceptionless.com/assets/projects.jpg)<figcaption class="caption wp-caption-text">Manage Projects</figcaption></figure> <figure id="attachment_1247" class="thumbnail wp-caption alignleft" style="width: 150px">[<img loading="lazy" class="size-thumbnail wp-image-1247" src="http://exceptionless.com/assets/organizations-150x150.jpg" alt="Manage Exceptionless Organizations" width="150" height="150" data-id="1247" />](http://exceptionless.com/assets/organizations.jpg)<figcaption class="caption wp-caption-text">Organizations</figcaption></figure> <figure id="attachment_1248" class="thumbnail wp-caption alignleft" style="width: 150px">[<img loading="lazy" class="size-thumbnail wp-image-1248" src="http://exceptionless.com/assets/account-150x150.jpg" alt="Manage Exceptionless Account" width="150" height="150" data-id="1248" />](http://exceptionless.com/assets/account.jpg)<figcaption class="caption wp-caption-text">Manage Account</figcaption></figure> <figure id="attachment_1249" class="thumbnail wp-caption alignleft" style="width: 150px">[<img loading="lazy" class="size-thumbnail wp-image-1249" src="http://exceptionless.com/assets/feedback-150x150.jpg" alt="Exceptionless Feedback" width="150" height="150" data-id="1249" />](http://exceptionless.com/assets/feedback.jpg)<figcaption class="caption wp-caption-text">Give Feedback</figcaption></figure> <figure id="attachment_1250" class="thumbnail wp-caption alignleft" style="width: 150px">[<img loading="lazy" class="size-thumbnail wp-image-1250" src="http://exceptionless.com/assets/support-150x150.jpg" alt="Exceptionless Support" width="150" height="150" data-id="1250" />](http://exceptionless.com/assets/support.jpg)<figcaption class="caption wp-caption-text">Get Support</figcaption></figure> 

<div style="clear: both;">
</div>

In short, the tool offers extremely helpful insights into the world of your web application&#8217;s bugs. Whether internal or customer-facing, knowing when, where, and how many exceptions are being generated makes it easier for you to track them down and squash them. And when you&#8217;ve fixed it, regression notifications are there to let you know if it rears its ugly head again.

Still not convinced? Give it a try &#8211; [sign up today, for free](https://app.exceptionless.com/signup "Sign up for Exceptionless").

&nbsp;
