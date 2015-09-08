---
postTitle: Catching a Server-Side Browser Cookie Support Error &#8211; Case Study
date: 2014-01-24T19:14:14-06:00
author: Exceptionless
layout: blog_post.liquid
tags: ["posts", "Case Study"]
---
<img loading="lazy" class="alignright size-full wp-image-1959" style="margin-left:10px;" alt="Internet Explorer Cookies" src="http://exceptionless.com/assets/ie-cookies.jpg" width="250" height="220" data-id="1959" />As with every new release of software, things change. And, like we all expected, there wasn&#8217;t an exception to that rule when Microsoft introduced Internet Explorer 10 into the mix.

Everyone coding for the web had the normal things to worry about, of course, like design formatting, speed, and support, but one of our clients experienced something that would have taken a long time to catch if they hadn&#8217;t been using Exceptionless&#8217; **real-time error reporting**.<!--more-->

## Who Adopts New Versions of IE Right Away, Anyway?

Like many, the client&#8217;s web team doesn&#8217;t necessarily adopt the latest version of IE right away, much less use it as their main browser. Unfortunately, that leads to little immediate exposure to potential bugs.

Lets explore how this came back to bite them, and how Exceptionless helped them treat the wound quickly.

### A nasty customer-facing error

Users of the client&#8217;s eCommerce platform that were already using IE10 were able to view and use the website fine, until they logged in. At that point, everything broke. They couldn&#8217;t checkout, browse, or submit contact forms.

Because the team wasn&#8217;t using IE10 regularly yet for testing actual logged-in user transactions, **they were clueless**!

Luckily, Exceptionless reported the customers&#8217; errors and the team was able to take notice of the recurring bug within days, rather than weeks or months.

### Turns out&#8230; the problem was server-side!

After the error was reported in the Exceptionless Dashboard, the team was able to use the attached details to trace the root of the issue back to the server&#8217;s definitions of which browsers support modern cookie encryption.

All the server needed was a **routine update** that had not been performed! Bam &#8211; fixed.

### Another bug bites the dust

We love to hear stories like this. Something so simple, yet so easy to overlook and cause serious customer-facing problems!

Errors like this happen every day to hundreds, if not thousands, of small, medium, and large software teams across the world. We just want to help squash as many of them as we can!
