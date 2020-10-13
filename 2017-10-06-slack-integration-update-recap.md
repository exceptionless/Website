---
id: 15916
postTitle: Slack Integration Update &#038; Recap
date: 2017-10-06T13:00:13-06:00
author: Exceptionless
layout: blog_post.liquid
tags: ["posts"]
---
<img loading="lazy" style="margin-bottom:20px;" class="aligncenter size-large wp-image-15919" src="/ft-img-1024x538.jpg" alt="Exceptionless Slack Integration" width="940" height="494" data-id="15919" srcset="/assets/slack-integration/, /assets/slack-integration-ft-img-300x158.jpg 300w,/-ft-img-768x403.jpg 768w, /assets/slack-integratio/"(max-width: 940px) 100vw, 940px" />/

Since we first introduced Slack integration with the goal of further improving notifications in Exceptionless, we&#8217;ve come back around with updates, a few bug fixes, and wanted to give everyone a quick all-in-one overview of the feature!

Thanks to everyone that has provided feedback, bug reports, and suggestions. If _you_ have any, don&#8217;t hesitate to [submit an issue over on GitHub](https://github.com/exceptionless/Exceptionless/issues). We&#8217;re always looking to improve and would love your input!<!--more-->

Along the way, we have run into **incoming webhook issues**, some **usability/setup workflow updates** that needed to be made to make the process more usable, and, among other things, **incorrectly created action URLs** that weren&#8217;t being handled correctly with rate limiting.

We&#8217;ll cover **setting up Slack integration with Exceptionless** below, but you can also review the [original post](/exceptionless-slack-integration/) and [weekly update video](https://youtu.be/U9GbYqWK1ik), the [first bug fix update](/slack-integration-updates-bug-fixes-weekly-update-5222017/) and [video](https://youtu.be/WtHj9e4M9zU), and the most recent [Slack integration improvement update](/improvements-exceptionless-slack-integration/) and [video](https://youtu.be/k4CMOk5lpVw).

## Setting up Slack Notifications for Exceptionless

First, go into your project&#8217;s settings in the Exceptionless app and click on the Integrations tab.

[<img loading="lazy" class="aligncenter wp-image-15626 size-full" src="/k-setup.png" alt="" width="811" height="595" data-id="15626" srcset="/assets/exceptionless-sla//exceptionless-slack-setup-300x220.png 300w/ack-setup-768x563.png 768w" sizes="(max-width: 811p/ts/exceptionless-slack-setup.png)/

Then, click on &#8220;Add Slack Notifications&#8221; and log in to your slack team.

Once logged in, you will need to select the channel you want Exceptionless Notifications to post to and click Authorize.

Once authorized, you can then configure the different notification settings by going back to the Exceptionless app and into the project&#8217;s integrations tab again.

[<img loading="lazy" class="aligncenter size-full wp-image-15628" src="/k-settings.png" alt="" width="620" height="399" data-id="15628" srcset="/assets/exceptionless-sla/ets/exceptionless-slack-settings-300x193.png 3/0px) 100vw, 620px" />](/assets/exceptionless-slack-settings.png)/

Once integrated and configured, notifications will look something like the below screenshot, with the message, type of event, stack trace, links to actions, etc.

[<img loading="lazy" class="aligncenter size-full wp-image-15629" src="/k-example.jpg" alt="Exceptionless Slack notification" width="533" height="920" data-id="15629" srcset="/assets/exceptionless-sla/ts/exceptionless-slack-example-174x300.jpg 17/px) 100vw, 533px" />](/assets/exceptionless-slack-example.jpg)/

We&#8217;re excited to keep improving notifications, and would love for you guys to continue testing and providing feedback! What else would you like to see happening with notifications? What are we doing right, and wrong?

Integrations with other chat & productivity tools like Hipchat and Microsoft Teams are on our list, as well, so if you use these please ping us and let us know so we can gauge interest!

Until next time, code on my friends.
