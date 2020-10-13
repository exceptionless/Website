---
id: 4171
title: Detailed Error Reports &#8211; What's Included?
date: 2014-03-26
---

When an error occurs in your app, you need to know the critical details, fast, so you can drill down and fix it. We get it &#8211; we're developers too &#8211; that's why we built Exceptionless.

The trick was organizing the data so it didn't overwhelm our users, while still providing all the important stuff so developers wouldn't have to spend extra time tracking down versions, requesting stack traces, or pulling teeth to get environment information.

Lets take a look at the **default** information included with every error. We say default because you can easily **add your own** information with custom objects.<!--more-->

## Each Error Occurrence

Every single error occurrence has the following tabs:

* Overview
* Exception
* Request
* Environment

On each of these, you can go to the previous or next occurrence for easy comparison.

Lets take a closer look at each tab.

### Error Overview

<a style="color: #005580; text-decoration: underline;" href="/assets/error-overview-tab.jpg"><img loading="lazy" class="alignright size-medium wp-image-4174" style="margin-left: 20px; margin-right: 20px;" alt="Exception Reporting Overview" src="/assets/error-overview-tab-248x300.jpg" width="248" height="300" data-id="4174" srcset="/assets/error-overview-tab-248x300.jpg 248w, /assets/error-overview-tab.jpg 709w" sizes="(max-width: 248px) 100vw, 248px" /></a>

The overview tab holds general information for that occurrence, including the variables below. Sometimes this is all you'll need to track down the bug. Sometimes you'll need to dig deeper.

* Occurred On
* Error Type
* Message
* Platform
* URL
* Referrer
* Browser
* Browser OS
* User Name
* Stack Trace

### Exception Tab

<a style="color: #005580; text-decoration: underline;" href="/assets/error-exception-tab.jpg"><img loading="lazy" class="size-medium wp-image-4175 alignright" style="margin-left: 20px; margin-right: 20px;" alt="Exceptionless Exception Details" src="/assets/error-exception-tab-228x300.jpg" width="228" height="300" data-id="4175" srcset="/assets/error-exception-tab-228x300.jpg 228w, /assets/error-exception-tab.jpg 707w" sizes="(max-width: 228px) 100vw, 228px" /></a>

<p style="text-align: left;">
  On the exception tab, we reference the timestamp, error type, message, and stack trace, while also providing you with all of the loaded modules, including versions.
</p>

<h3 style="clear: both;">
  Request Tab
</h3>

<a style="clear: both; color: #005580; text-decoration: underline;" href="/assets/error-request-tab.jpg"><img loading="lazy" class="alignright size-medium wp-image-4176" style="margin-left: 20px; margin-right: 20px;" alt="Exception Request Details" src="/assets/error-request-tab-225x300.jpg" width="225" height="300" data-id="4176" srcset="/assets/error-request-tab-225x300.jpg 225w, /assets/error-request-tab.jpg 705w" sizes="(max-width: 225px) 100vw, 225px" /></a>

Here we have tons of important request info:

* Occurred On
* HTTP Method
* URL
* Referrer
* Client IP
* User Agent
* Browser
* Browser OS
* Device
* Is Known Bot
* Cookie Values

<h3 style="clear: both;">
  Environment Tab
</h3>

[<img loading="lazy" class="alignright size-medium wp-image-4177" style="margin-left: 20px; margin-right: 20px;" alt="Exception Environment Details" src="/assets/error-environment-tab-198x300.jpg" width="198" height="300" data-id="4177" srcset="/assets/error-environment-tab-198x300.jpg 198w, /assets/error-environment-tab.jpg 635w" sizes="(max-width: 198px) 100vw, 198px" />](/assets/error-environment-tab.jpg)Environment isn't something that we always think about, but in some cases it can tell us a lot about the exception. We've got you covered!

* Occurred On
* Machine Name
* IP Address
* Processor Count
* Total Memory
* Available Memory
* Process Memory
* OS Name
* OS Version
* Architecture
* Runtime Version
* Process ID
* Process Name
* Command Line
* Client Information
    * Install Date
    * Version
    * Platform
    * Submission Method
    * Application Starts
    * Errors Submitted

## How Did We Do?

We have done our best to include all the important information in an organized, easy to read, intuitive interface. Think we're missing something? Think we can organize it differently? Let us know! We love feedback.
