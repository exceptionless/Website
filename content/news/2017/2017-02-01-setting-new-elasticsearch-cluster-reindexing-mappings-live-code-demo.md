---
id: 15248
title: Setting Up New Elasticsearch Cluster, Reindexing & Mappings - Live Code Demo
date: 2017-02-01
---
[![](/assets/img/news/170116-live-code-demo-1024x538.jpg)](https://www.liveedu.tv/niemyjski/videos/k4JO7-exceptionless-weekly-demo-1-16-17)

## Getting Ready for Exceptionless 4.0!

<!--more-->

In this live code review, we go over some of the recent changes and processes to get ready for Exceptionless 4.0, which include implementing a new Elasticsearch cluster, reindexing into it using the Elastic Arm templates, and updating existing events mapping.

The <a href="https://github.com/elastic/azure-marketplace" target="_blank">Elastic Arm templates</a> automate the setup of an Elasticsearch with a few clicks, which is awesome.

Then, we had to <a href="https://www.elastic.co/guide/en/elasticsearch/reference/1.7/indices-put-mapping.html" target="_blank">update our existing events mapping</a> to have a last updated field and is deleted flag so we can do <a href="https://www.elastic.co/guide/en/elasticsearch/reference/5.1/docs-reindex.html" target="_blank">incremental reindex passes</a>.

<h2 style="text-align: center;">
  <a href="https://www.liveedu.tv/niemyjski/videos/k4JO7-exceptionless-weekly-demo-1-16-17">WATCH NOW</a>
</h2>

<p style="text-align: center;">
  <a href="/category/live-coding/">Watch more Live Code Demos</a>
</p>
