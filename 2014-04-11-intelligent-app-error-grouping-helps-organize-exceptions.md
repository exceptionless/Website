---
id: 4818
postTitle: Intelligent App Error Grouping Helps Organize Your Exceptions
date: 2014-04-11T16:09:46-06:00
author: Exceptionless
layout: blog_post.liquid
tags: ["posts", "dashboard"]
---
<img loading="lazy" class="alignright size-full wp-image-4831" alt="Exception Grouping Totals" src="http://exceptionless.com/assets/thumbnail.png" width="164" height="120" data-id="4831" />Having a tool like Exceptionless to report and log your software&#8217;s errors is great, but many of our clients experience thousands of instances of each error over various lengths of time, which can become overwhelming quickly.

We couldn&#8217;t just leave them with a huge list of individual error occurrences to drudge through, so we went through several different potential options until we devised the best way to group them.<!--more-->

## Grouping Errors Intelligently

### What&#8217;s there to group by?

  1. The details we provide on each error give us countless ways to group them. While some wouldn&#8217;t make sense, we considered everything.

  * Date
  * Type
  * Message
  * Platform
  * Location
  * Browser information
  * User information
  * Environment information
  * Request details
  * and more&#8230;

### Drill down fast

Since we use Exceptionless to report and track down our own bugs, it was easy to put ourselves in our own shoes and think about what would allow us to drill down and fix errors quickly.

With that mindset, we decided that there were two important error details that should be used for grouping.

  1. **Where the error occurred**  
    We felt that, first and foremost, we wanted to know where the error was occurring. Even though there is a possibility it might be occurring in multiple locations, we felt that each location represented its own importance in our grouping scheme.
  2. **Type of error**  
    The type of error is also very important, and we felt that when you combine type with location, you get a set of errors that holds enough significant explicit data to be recognized as a group.

## What Grouping Allows Us to Do

When we group app errors by location and type, it allows us to report error instance counts, first occurrences, frequency of occurrence, and most recent occurrence on the dashboard.<figure id="attachment_4823" class="thumbnail wp-caption alignleft" style="width: 150px">

[<img loading="lazy" class="size-thumbnail wp-image-4823 " alt="Grouping Error Dashboard" src="http://exceptionless.com/assets/dashboard-home-150x150.png" width="150" height="150" data-id="4823" />](http://exceptionless.com/assets/dashboard-home.png)<figcaption class="caption wp-caption-text">Exceptionless Dashboard</figcaption></figure> <figure id="attachment_4825" class="thumbnail wp-caption alignleft" style="width: 150px">[<img loading="lazy" class="size-thumbnail wp-image-4825 " alt="Error Group Details" src="http://exceptionless.com/assets/group-details-150x150.png" width="150" height="150" data-id="4825" />](http://exceptionless.com/assets/group-details.png)<figcaption class="caption wp-caption-text">Error Group Details</figcaption></figure> 

<div style="clear: both;">
</div>

This seemingly basic grouping forms the basis for the different Exceptionless dashboard tabs and pages, thus becoming a major cornerstone for the platform. Click into a group, and you see the title, exception type, and location, along with a graph of occurrences and the most recent occurrences.

From there, you can drill down into each occurrence and scrutinize all of the [error&#8217;s details](http://exceptionless.com/whats-included-exceptionless-detailed-error-reports/ "Error Report Details").

That&#8217;s how we do it! Any questions? Let us know.
