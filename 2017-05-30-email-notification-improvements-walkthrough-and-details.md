---
id: 15586
postTitle: Email Notification Improvements &#8211; Walkthrough and Details
date: 2017-05-30T09:48:11-06:00
author: Exceptionless
layout: blog_post.liquid
tags: ["posts", "email", "nodejs", "notifications", "zurb"]
---
<img loading="lazy" class="aligncenter size-large wp-image-15587" style="margin-bottom: 20px;" src="/assets/email-improvements-header-1024x538.jpg" alt="exceptionless email notifications" width="940" height="494" data-id="15587" srcset="/assets/email-improvements-header-1024x538.jpg 1024w, /assets/email-improvements-header-300x158.jpg 300w, /assets/email-improvements-header-768x403.jpg 768w, /assets/email-improvements-header.jpg 1200w" sizes="(max-width: 940px) 100vw, 940px" />

Recently, we made several improvements to our email notifications, adding additional details, improving rendering, and more. Blake has mentioned it in a few of his [weekly update videos](/category/weekly-updates/), but today we wanted to walk you through it and add a few more details, with examples. Check it out!<!--more-->

## Exceptionless Email Notification Implementation

We decided to use [Zurb's Foundation for Emails](https://github.com/zurb/foundation-emails) to help us create emails that look great on all email clients. The reason we went with Zurb is because it has clean markup that translates to good old (ugly) HTML that just works. It also works great with [Handlebars.Net](https://github.com/rexm/Handlebars.Net) which we use to render the email content.

An example of one of our event notification emails can be found [here](https://github.com/exceptionless/Exceptionless/blob/master/src/Exceptionless.EmailTemplates/src/pages/event-notice.html).

Then, we run a [Node.js build task](https://github.com/exceptionless/Exceptionless/tree/master/src/Exceptionless.EmailTemplates#build-commands) to transform the templates into some pretty [crazy html markup](https://github.com/exceptionless/Exceptionless/blob/master/src/Exceptionless.Core/Mail/Templates/event-notice.html) that works everywhere. The markup at that link contains the Handlebars.Net syntax.

These templates are stored as embedded resources so we can use them from any environment and render them out with ease! Here is a [code example](https://github.com/exceptionless/Exceptionless/blob/master/src/Exceptionless.Core/Mail/Mailer.cs#L260-L277) of how we perform that task.

We added [JSON-LD](https://json-ld.org/) support, to the emails to give us rich contextual actions, by starting with this [Google Developer tutorial](https://developers.google.com/gmail/markup/getting-started) and ended up with [the below implementation](https://github.com/exceptionless/Exceptionless/blob/master/src/Exceptionless.EmailTemplates/src/pages/event-notice.html#L75-L94). _It's worth noting that we had to go through their verification process for the actions to be enabled._

<pre class="brush: jscript; title: ; notranslate" title="">&lt;script type="application/ld+json"&gt;
{
 "@context": "http://schema.org",
 "@type": "EmailMessage",
 "description": "\{{Subject}}",
 "potentialAction": {
 "@type": "ViewAction",
 "target": "\{{BaseUrl}}/event/\{{EventId}}",
 "url": "\{{BaseUrl}}/event/\{{EventId}}",
 "name": "View Event Details"
 },
 "publisher": {
 "@type": "Organization",
 "name": "Exceptionless",
 "url": "https://exceptionless.com",
 "url/googlePlus": "https://plus.google.com/111513069275546127753",
 "logo": "https://be.exceptionless.io/img/exceptionless-48.png"
 }
}
&lt;/script&gt;
</pre>

We tested the emails in Outlook for Windows and Mac, Paper Cut, Gmail on Safari, and Apple Mail. Then, we used [Litmus](https://litmus.com) to test a wide range of clients before publishing and pushing everything live.

## Questions? Comments?

We hope our buildout here can help other developers, and we would love to hear your feedback, questions, or comments either here on the blog or over on [GitHub](https://github.com/exceptionless/Exceptionless/issues)!

Code on.


