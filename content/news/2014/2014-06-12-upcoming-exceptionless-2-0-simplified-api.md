---
id: 9027
title: "More from the Upcoming Exceptionless 2.0: Simplified API"
date: 2014-06-12
tags: [ "api"]
---
![Exceptionless 2.0 API Simplified](/assets/img/news/v2-api.png)Since [going open source](/fork-us-exceptionless-goes-open-source/ "Fork Us! Exceptionless Goes Open Source"), we've wanted to simplify the API and make it easier to work with.

We're taking the time to do it now, and it's going to be **awesome!**

Exceptionless 2.0, [coming soon](/exceptionless-2-in-the-making/ "Exceptionless 2.0 – In the Making"), will have a new, manageable API with tons of great documentation and examples. Take a look at the preliminary documentation at the below link, and make sure to give us any feedback you might have.<!--more-->

## API Simplified

* <a href="https://api.exceptionless.io/docs/index.html" target="_blank">New REST API documentation and samples site.<br /> </a>Take a look and let us know what you think![![Exceptionless API Documentation](/assets/img/news/Screen-shot-2014-06-11-at-5.20.44-PM-300x225.png)](/assets/Screen-shot-2014-06-11-at-5.20.44-PM.png)<a style="color: #4183c4;" href="https://api.exceptionless.io/docs/index.html"><br /> </a>
* Event POSTs take the raw data and use a plugin system to interpret that data and translate them into events.
    * This allows us to take literally any data and turn it into events in the system.
    * The POST data is captured as a raw bytes and added immediately added to a queue for processing.
    * Plugins can easily be created to support new data formats like system logs.
* This simplified API will make creating libraries for other platforms dead simple.
* The API lives in a separate project and can be hosted on high-performance systems like the new Helios IIS host.
* Makes it easy for us to migrate the UI to a SPA app.
* Now uses OAuth 2.0 in addition to supporting API tokens.
* Highly consistent REST API modeled after GitHub and Stripe.
* It's so simple you can just use CURL as a client.

We hope you're as excited as we are to have this new, improved, more complete, and more usable documentation. Stay tuned for more details on the upcoming Exceptionless 2.0, and don't forget to leave a comment letting us know what you think.
