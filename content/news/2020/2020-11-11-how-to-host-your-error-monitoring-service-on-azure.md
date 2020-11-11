---
title: How To Host Your Error Monitoring Service on Azure
date: 2020-11-11
draft: true
---
    
We [previously wrote about](https://exceptionless.com/news/2020/2020-09-30-how-to-self-host-your-error-monitoring-service/) how to run a self-hosted instance of Exceptionless locally. Today, we are going to explore how to deploy a self-hosted instance to Azure. First, let's remind you what Exceptionless is and how it's different from other error monitoring services. 

## What is Exceptionless  

Exceptionless is a cloud-based error monitoring service that focuses on real-time data injestion and configuration. Exceptionless sets itself apart from the competition through its real-time pipeline and how it combines events to make them actionable through a process called stacking. 

Unlike most error monitoring services, Exceptionless is dedicated to the open-source community and the entire code base is available on Github to inspect, contribute to, or fork. And, of course, Exceptionless can be self-hosted. 

That last bit is what we'll be focusing on today. 

## Getting Started  

To start, you'll need to sign up for a Microsoft Azure account if you don't have one already. 