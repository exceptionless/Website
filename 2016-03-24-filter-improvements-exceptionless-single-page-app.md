---
id: 14240
postTitle: Filter Improvements to the Exceptionless Single Page App
date: 2016-03-24T20:41:13-06:00
author: Exceptionless
layout: blog_post.liquid
tags: ["posts"]
---
<img loading="lazy" class="alignright size-full wp-image-14249" src="/assets/user-experience-search-filter-changes.png" alt="SPA filter search solutions" width="260" height="260" data-id="14249" srcset="/assets/user-experience-search-filter-changes.png 260w, /assets/user-experience-search-filter-changes-150x150.png 150w" sizes="(max-width: 260px) 100vw, 260px" />It's been a while since we introduced filtering and searching when we launched Exceptionless V2.0, so we decided recently that we wanted to take the feedback we've received and do a round of improvements to it.

You may have already noticed the changes, but if not then the next time you log in you will see that the top bar has changed, giving you much quicker access to filtering and more upfront information.<!--more-->

## Filter Changes to the Desktop View

For the primary desktop view, we removed the magnifying glass icon in the top bar and simply filled the rest the bar with the filter (search) input box. This eliminates a click to get to the filtering system, and keeps it front and center at all times.

One **important note** here is that if you want to show events that have been marked as fixed or hidden, you have to explicitly specify those filters, whereas previously those options were check boxes. So, you can use `hidden:false` or `hidden:true`, and `fixed:true` or `fixed:false` to view those events. Naturally, the default is false for both, showing events that have not been hidden or fixed. This means that in order to see both hidden and un-hidden events, you would need to use `hidden:false OR hidden:true`. Likewise, for fixed, you would need to use `fixed:true OR fixed:false`.

You'll notice that the date/time filter has changed as well. Instead of an icon, we now display the current time frame being viewed, once again saving you a click and keeping things in front of you.

As always, the filter still applies to the chosen time frame only.

### Before

<a href="/assets/old1.png" rel="attachment wp-att-14241"><img loading="lazy" class="aligncenter wp-image-14241 size-full" src="/assets/old1.png" alt="old1" width="594" height="251" data-id="14241" srcset="/assets/old1.png 594w, /assets/old1-300x127.png 300w" sizes="(max-width: 594px) 100vw, 594px" /></a>

<a href="/assets/old2.png" rel="attachment wp-att-14242"><img loading="lazy" class="aligncenter wp-image-14242 size-full" src="/assets/old2.png" alt="old2" width="249" height="291" data-id="14242" /></a>

### After

<a href="/assets/new7.png" rel="attachment wp-att-14243"><img loading="lazy" class="aligncenter wp-image-14243 size-full" src="/assets/new7.png" alt="new7" width="631" height="59" data-id="14243" srcset="/assets/new7.png 631w, /assets/new7-300x28.png 300w" sizes="(max-width: 631px) 100vw, 631px" /></a>

<a href="/assets/old3.png" rel="attachment wp-att-14244"><img loading="lazy" class="aligncenter size-full wp-image-14244" src="/assets/old3.png" alt="old3" width="463" height="272" data-id="14244" srcset="/assets/old3.png 463w, /assets/old3-300x176.png 300w" sizes="(max-width: 463px) 100vw, 463px" /></a>

## Mobile Changes & Functionality

We also changed the user interface for smaller screens.

Instead of the icons at the top of the screen, the time frame selector is now a major menu item in the mobile menu and displays the current selection with the filter/search field directly below it.

This setup should allow users to filter and find the events they seek much quicker on mobile.

### Before

<a href="/assets/new2.png" rel="attachment wp-att-14245"><img loading="lazy" class="aligncenter size-full wp-image-14245" src="/assets/new2.png" alt="new2" width="594" height="406" data-id="14245" srcset="/assets/new2.png 594w, /assets/new2-300x205.png 300w" sizes="(max-width: 594px) 100vw, 594px" /></a>



### After

<a href="/assets/new3.png" rel="attachment wp-att-14247"><img loading="lazy" class="aligncenter size-full wp-image-14247" src="/assets/new3.png" alt="new3" width="623" height="447" data-id="14247" srcset="/assets/new3.png 623w, /assets/new3-300x215.png 300w" sizes="(max-width: 623px) 100vw, 623px" /></a>

## Pretty Cool, Yeah?

We think it's a pretty nice improvement. We got feedback from several users and think making everything visible at the top level of the user interface is an important change that saves time and keeps you informed.

If you've got any additional feedback, please don't hesitate to let us know. We are always looking for ways to improve, and we use Exceptionless every day too, so we are always interested in saving ourselves time and making things easier on our end!
