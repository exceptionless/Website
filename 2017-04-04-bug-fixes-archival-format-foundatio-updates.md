---
id: 15384
postTitle: Weekly Update &#8211; Bug Fixes, Archival Format Changes, and Foundatio Updates
date: 2017-04-04T11:45:30-06:00
author: Exceptionless
layout: blog_post.liquid
tags: ["posts"]
---

This week we've got some cool stuff in our weekly update! Along with the below, you can now follow along over on the new [YouTube Exceptionless Weekly Updates playlist](https://www.youtube.com/playlist?list=PLGHP7IVwFs_81fZTMgF7Dm5e0Ax4YvW_V), so make sure to check it out and [subscribe](https://www.youtube.com/user/exceptionless?sub_confirmation=1)!<!--more-->

## Let's Get Down To Business

### Updates to Exceptionless

* We fixed an issue where you couldn't run Exceptionless on AWS because you couldn't install plugins on their ElasticSearch service. _[#280](https://github.com/exceptionless/Exceptionless/issues/280)_

* The archival format has also been change from `projected\year\month\day` to `year\month\day\hour\projectid`. This allows you to quickly restore or download all events in a time period without enumerating all backed up projects.

### Foundatio Updates

* In Foundatio, we fixed an issue where Redis Queues could deadlock, causing them to stop processing. This was being caused from topic messages locking the calling thread.

### Updates to Foundatio Repositories

* GetById and GetByIds now take an Id Type which allows us to specify routing information and much more. We have an implicit conversion that handles existing signatures.

<h2 style="text-align: center;">
  <a href="https://youtu.be/osuMyj6eW98?list=PLGHP7IVwFs_81fZTMgF7Dm5e0Ax4YvW_V">WATCH NOW</a>
</h2>

<p style="text-align: center;">
  <a href="/category/live-coding/">Watch more Live Code Demos</a>
</p>
