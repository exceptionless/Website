---
id: 6873
postTitle: Web Application Errors and the 80-20 Rule
date: 2014-05-04T18:03:38-06:00
author: Exceptionless
layout: blog_post.liquid
tags: ["posts"]
---
[<img loading="lazy" class="alignright  wp-image-146" style="margin-left: 20px; margin-right: 20px;" alt="Most Frequent Errors" src="http://exceptionless.com/assets/most-frequent-300x262.png" width="192" height="168" data-id="146" srcset="https://exceptionless.com/assets/most-frequent-300x262.png 300w, https://exceptionless.com/assets/most-frequent.png 715w" sizes="(max-width: 192px) 100vw, 192px" />](http://exceptionless.com/assets/most-frequent.png)You know the 80-20 rule. The one marketers, managers, bigwigs, writers, speakers, and everyone else references to tell you what to focus on or why the widgets aren&#8217;t selling like they should.

Well, as painful as it might be to hear the rule applied to yet another scenario, we&#8217;re here today to let you know that 80-20 can be applied, in many cases, to your code&#8217;s exceptions as well. <!--more-->

## 20% of Errors Cause 80% of Exception Instances

That&#8217;s not so bad, is it?

All we&#8217;re trying to point out is that when you start tracking and organizing the errors in your code, inevitably you&#8217;ll start to realize that a small percentage of bugs are causing the majority of your total errors.

### What we did about it

We realized this ourselves, so we built the &#8220;Most Frequent Errors&#8221; report right into the Exceptionless dashboard.

When you log into your account, you immediately see which errors are causing the largest number of exceptions, how many instances of each there is, when the first occurrence was, and when the last occurrence was.

From there, you can click in, view there error&#8217;s details, and hopefully find a quick resolution to the problem.

## Most Frequent <> Most Important

While it&#8217;s great to chip away at the most frequent errors, it&#8217;s worth pointing out that most frequent doesn&#8217;t always mean most important, so be sure to focus on bottom line, customer facing, and major functionality issues first!

## Have You Observed the 80-20 in the Wild?

In your coding adventures, have you found the 80-20 rule to apply to your exceptions? Was it something you found quickly, or did you track down numerous instances of the same error before realizing it?

&nbsp;
