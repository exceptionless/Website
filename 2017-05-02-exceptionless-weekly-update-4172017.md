---
id: 15531
postTitle: Exceptionless Weekly Update 4/17/2017
date: 2017-05-02T07:28:28-06:00
author: Exceptionless
layout: blog_post.liquid
tags: ["posts", ".NET", "client", "email", "javascript"]
---
<div class="videoWrapper" style="margin-bottom: 20px;">
</div>

Nothing too crazy going on in this week&#8217;s update. A few tweaks to Exceptionless, Exceptionless.NET, and Exceptionless.JavaScript. Check out the details below, and don&#8217;t forget to let us know how we&#8217;re doing!<!--more-->

## Weekly Code & Development Update &#8211; 4/17/2017

### Exceptionless Core Updates

This week we released the Exceptionless 4.0.2 minor release with a few fixes and tweaks. Check out the [Exceptionless 4.0.2 release details](https://github.com/exceptionless/Exceptionless/releases/tag/v4.0.2) over on GitHub. Self hosters are the only ones that will need to worry about upgrading.

We also made some good strides in reducing the amount of IO work the event post queues have to do. Woohoo!

Lastly, for Exceptionless core, we merged in MailKit and continued improving email notifications.

## Exceptionless.NET Client Update

The only really notable thing we did for the .NET client is fix the ProcessQueue method, making sure it blocks until the queue has been processed.

## Exceptionless.JavaScript Client Update

For our JavaScript client, we want to work on supporting universal apps, but first we have to upgrade to the latest version of TypeScript, so we did some work this week toward that.

<h2 style="text-align: center;">
  <a href="https://youtu.be/NH1sDXUnsBI?list=PLGHP7IVwFs_81fZTMgF7Dm5e0Ax4YvW_V">WATCH NOW</a>
</h2>

<p style="text-align: center;">
  <a href="/category/weekly-updates/">Watch more Live Code Demos</a>
</p>
