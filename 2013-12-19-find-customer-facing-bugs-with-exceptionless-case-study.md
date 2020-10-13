---
id: 427
postTitle: Find Customer Facing Bugs with Exceptionless &#8211; Case Study
date: 2013-12-19T00:10:29-06:00
author: Exceptionless
layout: blog_post.liquid
tags: ["posts", ".NET", "asp.net", "Case Study"]
---
## The Power of .NET Error Reporting

<img loading="lazy" class="alignright size-full wp-image-438" style="margin-left: 10px;" alt="ApexCCTV Logo" src="/assets/header-logoNew.png" width="182" height="96" data-id="438" /> One of our long time customers, ApexCCTV, recently described how Exceptionless' .NET error reporting allowed them to find and squash a bug that was causing their website to be completely unusable by some customers.

Because of the e-commerce development environment being used, this issue would not have been brought to their attention without the implementation of Exceptionless, making this a prime example of how powerful the tool is and what it can mean for all types of .NET web applications.<!--more-->

### What customers were experiencing

> &#8220;After a site upgrade, **every page** of the site was crashing if the customer had been previously logged in.&#8221; &#8211; ApexCCTV

So, if a user had selected the &#8220;keep me logged in&#8221; box the last time they logged in, prior to the update, nothing was working for them.

### The cause

When a customer logs in, a secure cookie for that user is created behind the scenes. The code update had changed the format of the cookie, but not the name, so when a user visited the site with the old cookie, the authentication was breaking. This was throwing errors and crashing the site for the customer, but because the development team clears cookies regularly, and no one had reported any issues, the exceptions were flying under the radar.

### The fix

Exceptionless logged and reported the error, and the fix was easy &#8211; simply change the cookie name so that users were forced to get a fresh cookie the next time they visited the site. Bam, done! Users could then happly log in and buy <a title="Security Cameras" href="http://www.apexcctv.com" target="_blank">security cameras</a> without any issues.

There could be, and a lot of the times are, errors like this in any .NET project, and using a real-time exception reporting tool like Exceptionless can really be an asset, saving time, money, and customers.
