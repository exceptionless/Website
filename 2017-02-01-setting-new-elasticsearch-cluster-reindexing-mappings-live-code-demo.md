---
id: 15248
postTitle: 'Setting Up New Elasticsearch Cluster, Reindexing &#038; Mappings &#8211; Live Code Demo'
date: 2017-02-01T12:56:26-06:00
author: Exceptionless
layout: blog_post.liquid
tags: ["posts"]
---
[<img loading="lazy" class="aligncenter size-large wp-image-15250" src="https://exceptionless.com/assets/170116-live-code-demo-1024x538.jpg" alt="" width="940" height="494" data-id="15250" srcset="https://exceptionless.com/assets/170116-live-code-demo-1024x538.jpg 1024w, https://exceptionless.com/assets/170116-live-code-demo-300x158.jpg 300w, https://exceptionless.com/assets/170116-live-code-demo-768x403.jpg 768w, https://exceptionless.com/assets/170116-live-code-demo.jpg 1200w" sizes="(max-width: 940px) 100vw, 940px" />](https://www.liveedu.tv/niemyjski/videos/k4JO7-exceptionless-weekly-demo-1-16-17)

## Getting Ready for Exceptionless 4.0!

<!--more-->

In this live code review, we go over some of the recent changes and processes to get ready for Exceptionless 4.0, which include implementing a new Elasticsearch cluster, reindexing into it using the Elastic Arm templates, and updating existing events mapping.

The <a href="https://github.com/elastic/azure-marketplace" target="_blank">Elastic Arm templates</a> automate the setup of an Elasticsearch with a few clicks, which is awesome.

Then, we had to <a href="https://www.elastic.co/guide/en/elasticsearch/reference/1.7/indices-put-mapping.html" target="_blank">update our existing events mapping</a> to have a last updated field and is deleted flag so we can do <a href="https://www.elastic.co/guide/en/elasticsearch/reference/5.1/docs-reindex.html" target="_blank">incremental reindex passes</a>.

<h2 style="text-align: center;">
  <a href="https://www.liveedu.tv/niemyjski/videos/k4JO7-exceptionless-weekly-demo-1-16-17">WATCH NOW</a>
</h2>

<p style="text-align: center;">
  <a href="https://exceptionless.com/category/live-coding/">Watch more Live Code Demos</a>
</p>
