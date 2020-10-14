---
id: 13674
title: Find Software Bugs with the Exceptionless JavaScript Client in Minutes
date: 2015-09-02
tags: [ "javascript"]
---
<img loading="lazy" class="aligncenter wp-image-13683 size-full" src="/assets/blog-header-image-post2b.png" alt="Exceptionless JavaScript Client" width="708" height="250" data-id="13679" srcset="/assets/blog-header-image-post2b.png 708w, /assets/blog-header-image-post2b-300x106.png 300w" sizes="(max-width: 708px) 100vw, 708px" />
If you missed our <a href="/javascript-node-js-client-version-1-release-candidate/" target="_blank">JavaScript Client announcement</a>, this is a great chance to see just how **quick and easy** the client is to install and use! You can be finding those hard to track down bugs, errors, and exceptions, as well as tracking other events and log messages, in literally minutes.

We've made it super easy to get up and running, as you'll see below. Take a look and let us know what you think!

## Report & Log Errors & Events in 1:37

<!--more-->

<div class="videoWrapper">
</div>

<div class="signup center" style="margin-top: 30px;">
  <a class="btn btn-large btn-primary" href="https://github.com/exceptionless/Exceptionless.JavaScript" target="_blank">Try It Today</a>
</div>

## The Text Version

A simple **step-by-step guide** to getting the Exceptionless JavaScript Client demo up and running on your local machine.

The only **pre-requisite** is an <a href="https://be.exceptionless.io/signup" target="_blank">Exceptionless account</a>, or you can <a href="/self-hosting-exceptionless-free-and-fast/" target="_blank">host the entire platform yourself</a>. **Open source**, baby!

  1. Download and extract the <a href="https://github.com/exceptionless/Exceptionless.JavaScript" target="_blank">Exceptionless JavaScript Client</a> from GitHub
  2. Log in to your <a href="https://be.exceptionless.io/" target="_blank">Exceptionless Dashboard</a> and get your project's API key (Admin > Projects > _Select Project_ > API Keys)
    * If you don't have a project, you'll need to create one by going to Admin > Projects > Add New Project
  3. Open the extracted folder on your local machine and go to the "example" folder, then edit index.html.
  4. Replace the API key in the exceptionless.js script tag with your own, and comment out the line with serverURL in it (not needed for demo).
  5. Open index.html in your browser and open your browser's developer tools console so we can see the events fire.
    * We've added quick-fire buttons to this page that automatically generate events for you to play around with for the purpose of this demo.
  6. Click on one, generate 100 random events for instance, and you'll see the events queue up in the console. After a few seconds, you should see a queue processing notification telling you it's done processing.
  7. Go back to your Exceptionless project dashboard, and you will see the events hit the system in real time.
    * Make sure you are viewing the appropriate project and time period in your dashboard, otherwise you might not see the new events come in.

### It's That Easy!

As you can see, the JavaScript client is super easy, super fast, and super flexible, for use in almost any project you might have.

We hope you'll give it a shot, and we also hope you'll let us know what you think by contacting us via an in-app message, <a href="https://github.com/exceptionless/Exceptionless.JavaScript/issues" target="_blank">submitting an issue on GitHub</a>, or <a href="/contact/" target="_blank">through the website</a>.

_Here's to becoming Exceptionless!_
