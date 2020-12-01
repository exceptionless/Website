---
id: 12695
title: Exceptionless 2.0 Live Preview! Do You Want to Build a Sandbox?
date: 2015-02-11
---
![exceptionless-sandbox](/assets/img/news/exceptionless-sandbox.png)Oh boy! We're ready for you guys to beat on Exceptionless 2.0 in a sandbox environment!

We've made you wait, and everyone has done so quite patiently, but now it's officially time to check out V2.0 for yourself.

We're super excited, but we also <span style="color: #ff0000;">**need your help!**</span> At this point, we are asking for any and all <span style="color: #ff0000;">**feedback** </span>to help us tweak and refine and get things launched. Check out the details and instructions below, and make sure to send us thoughts, critiques, praise, and (of course) bug reports via <a title="Exceptionless GitHub Issues" href="https://github.com/exceptionless/Exceptionless/issues/new" target="_blank">GitHub Issues</a>.<!--more-->

## You Can Be.Exceptionless<figure id="attachment_12699" class="thumbnail wp-caption alignright" style="width: 300px">

![Exceptionless 2.0 Dashboard Preview](/assets/img/news/sandbox-preview-300x183.jpg)<figcaption class="caption wp-caption-text">Exceptionless 2.0 Dashboard Preview</figcaption></figure>

**Simply...**

  1. Go to <a title="Exceptionless 2.0 Sandbox" href="https://be.exceptionless.io" target="_blank">https://be.exceptionless.io</a>
  2. Log in with your **existing** Exceptionless account
    _Some very recent accounts may not allow you to log in. If this is the case, please create new account for testing purposes._</p>
      1. View your current data in the new system - play around with it!
      2. (Optional, but Encouraged) Upgrade your client and start sending events to Exceptionless 2.0!
        <span style="color: #800000;">**Notice:** <em>All new data sent to this sandbox preview will be lost when the final version of Exceptionless 2.0 goes live. You will have a gap in historical data. Also, existing clients (1.x) will still work against the 2.0 API when we go live.</em></span></p>
          1. Open the NuGet Package Manager dialog.
          2. Click on the Updates tab.
          3. Select "Include Prerelease" from the dropdown.
          4. Select the Exceptionless NuGet packages and click the Update button.
          5. **You should be good to go!
** If you need more info, view our <a title="Upgrading Exceptionless" href="http://localhost:8080/docs/self-hosting/upgrading-self-hosted-instance/" target="_blank">upgrading documentation</a> or contact us via in-app support.
  3. Provide feedback via <a title="Exceptionless Github Issues" href="https://github.com/exceptionless/Exceptionless/issues/new" target="_blank">GitHub Issues</a>. (good, bad, or ugly - we want it all)
  4. Be Exceptionless!

### Documentation

* <a title="Exceptionless 2.0 Upgrade Instructions" href="http://docs.exceptionless.com/contents/upgrading/" target="_blank">How to Upgrade 1.x client to 2.0</a>
* <a title="Search Terms" href="http://docs.exceptionless.com/contents/search/" target="_blank">Search Terms</a>
* <a title="Exceptionless API Documentation" href="https://api.exceptionless.io/docs/index" target="_blank">Fully Documented API</a>

### Notes

<span style="color: #800000;"><em>All events submitted to the 2.0 system may be reset at any time and will be reset before we go live (sandboxed). New events that are submitted, and any changes that happen in the 2.0 preview, will not be available in the 1.x system and will be lost once 2.0 goes live. Existing clients (1.x) will still work against the 2.0 API when we go live.</em></span>

## What Exceptionless 2.0 Offers

We have covered many of these new features in previous update posts, but there are a few new additions and tweaks we've thrown in since then, along with links to previous discussions.

* **Searching / Filtering**
    We've implemented Elasticsearch and you can search/filter ALL the things! Read more <a title="Exceptionless 2.0 Elasticsearch" href="/making-move-elastic-search-exceptionless-2-0/" target="_blank">here</a> and watch a quick demo video <a title="Exceptionless Search Filters" href="/filter-your-exceptions-video-demo/" target="_blank">here</a>.

* **Cross Organization Views**
    You now have the ability to view all events across all organizations, a single organization, or a project.

* **PCL Support**
    We've built in client support for <a title="Exceptionless.Portable" href="https://www.nuget.org/packages/exceptionless.portable" target="_blank">portable class libraries</a>!

* ****New Clients!
**** Including: <a title="Exceptionless.Portable" href="https://www.nuget.org/packages/exceptionless.portable" target="_blank">Exceptionless.Portable</a> for console apps and <a title="Exceptionless NLOG Client" href="http://www.nuget.org/packages/exceptionless.nlog" target="_blank">Exceptionless.NLog</a>, an nlog target that reports to Exceptionless

* **Fully Documented API**
    For all your API needs, check out the <a title="Exceptionless API Documentation" href="https://api.exceptionless.io/docs/index" target="_blank">API Documentation</a>
* **Bulk Actions
** Select multiple events or instances of events and do with them as you please! <a title="Exceptionless 2.0 Bulk Actions" href="/bulk-actions-sneak-peak-exceptionless-2-0-video/" target="_blank">Watch the preview demo.</a>

* **Faster than Ever!
** Exceptionless 2.0 is a single page app (SPA) and is lightning fast. <a title="Exceptionless 2.0 AngularJS" href="/angularjs-exceptionless-2-0/" target="_blank">We're using AngularJS</a> and we're stoked to give our users a super quick experience!

* **And more...
** Check out more new features, including source links, in our <a title="Exceptionless 2.0 Overview" href="/upcoming-exceptionless-version-2-0-overview-review/" target="_blank">Exceptionless 2.0 Overview article</a>. Includes details on: Event Based Reporting System, Simplified API, The Pluggable System, Client Rewrite, New Message Bus & Queuing, and Job System Enhancement.

## Help Us Make Exceptionless 2.0 Even Better

We've asked a few times already in this post, but we have to ask, once again, for your <a href="https://github.com/exceptionless/Exceptionless/issues/new" target="_blank">feedback </a>on the V2.0 platform. Our users define Exceptionless, and to make it the absolute best we can, we rely on **you** to let us know what's good, what's bad, and what we shouldn't have even wasted the bytes on. So please, give it a go and use <a href="https://github.com/exceptionless/Exceptionless/issues/new" target="_blank">GitHub Issues</a> to give us your thoughts. We appreciate it more than you know. Thanks!


