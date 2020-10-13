---
id: 12849
title: Logging Feature Usages with Exceptionless
date: 2015-03-25
---
<img loading="lazy" class="alignright size-full wp-image-12860" style="margin-left: 15px;" src="/assets/feature-usage.png" alt="Exceptionless Feature Usage" width="198" height="161" data-id="12860" />The ability to log feature usages is one of the many <a title="Exceptionless 2.0 Launch Article" href="/its-go-time-exceptionless-2-0-launched/" target="_blank" rel="noopener noreferrer">new&#8230; features&#8230; of Exceptionless 2.0</a>.

If you want to know when a button is being clicked, or what users are doing certain tasks, feature usage logging will help you track and visualize each occurrence.

What you learn from logging these types of feature usages might surprise you, and at the very least you'll know more about how users interact with your system.<!--more-->

## How to Submit a Feature Usage

### Using the client

For this example, we are assuming that you have already created an account and installed and <a title="Configure Exceptionless" href="https://github.com/exceptionless/Exceptionless.Net/wiki/Configuration" target="_blank" rel="noopener noreferrer">configured</a> the Exceptionless 2.0 client. If you are still using the 1.x client, you will need to <a title="Upgrade Exceptionless Client" href="https://github.com/exceptionless/Exceptionless.Net/wiki/Upgrading" target="_blank" rel="noopener noreferrer">upgrade</a> to send us feature usage events. Please contact support via an in-app support message or our <a title="Contact Exceptionless" href="/contact/" target="_blank" rel="noopener noreferrer">contact page</a> if you have any questions or need assistance in this area.

#### Example 1 &#8211; Signup

In the example below, we are going to submit a feature usage when any user signs up.

**To submit the feature occurrence, you just need to call our api as follows:**

<pre>using Exceptionless;
ExceptionlessClient.Default.SubmitFeatureUsage("Signup");</pre>

SubmitFeatureUsage creates a simple feature usage and submits it. To include more information, please use CreateFeatureUsage (example below).

#### More detailed examples

You can also submit additional information with a feature usage using our fluent api. This is nice when you want to add contextual information, contact information, or a tag.

#### Example 2 &#8211; Signup with tags

If, for instance, you wanted to indicate how a user signs up, you can add a tag to the feature usage occurrence. In the below example, we are tagging a feature usage that uses GitHub to sign up.

<pre>using Exceptionless;
ExceptionlessClient.Default.CreateFeatureUsage("Signup").AddTags("GitHub").Submit();</pre>

#### Example 3 &#8211; Who's Searching?

As another example, maybe we want to log a feature usage when users search, and then set their identity.

<pre>using Exceptionless;
ExceptionlessClient.Default.CreateFeatureUsage("Searching").SetUserIdentity("John Smith");</pre>

#### What else can I add to a submission?

There are a number of additional pieces of data you can use for your event. The below bullets include the current EventBuilder list, but we are always adding more that can be found on <a title="Exceptionless EventBuilder.cs" href="https://github.com/exceptionless/Exceptionless.Net/blob/master/src/Exceptionless/EventBuilder.cs" target="_blank" rel="noopener noreferrer">GitHub</a>. Also, view more examples here on our <a title="Send Exceptionless Events" href="https://github.com/exceptionless/Exceptionless.Net/wiki/Sending-Events" target="_blank" rel="noopener noreferrer">Sending Events</a> page.

* AddTags
* SetProperty
* AddObject
* MarkAsCritical
* SetUserIdentity
* SetUserDescription
* SetVersion
* SetSource
* SetSessionId
* SetReferenceId
* SetMessage
* SetGeo
* SetValue
* And more, depending on your client

### Using the REST API

You can also submit a feature usage by posting JSON to our API. See details in our <a title="Exceptionless JSON Post API Documentation" href="https://api.exceptionless.io/docs/index#!/Event/Event_Post" target="_blank" rel="noopener noreferrer">API Documentation</a>. If you need an API key for simply posting events, you can find it in your <a title="Exceptionless" href="https://be.exceptionless.io" target="_blank" rel="noopener noreferrer">project settings</a>. Otherwise, please refer to the <a title="Exceptionless Auth Login API Documentation" href="https://api.exceptionless.io/docs/index.html#!/Auth/Auth_Login" target="_blank" rel="noopener noreferrer">auth login documentation</a> to get a user scoped api key.

<pre>{
 "type": "usage",
 "source": "Signup"
 }</pre>

## The Dashboard

Feature usage logging makes it very easy to see how often a feature, such as logging into an account, is used over time. If usage of one type of login, for instances, is never used, there might be an issue or you could consider removing it (less code debt). Or, if one is used the majority of the time, maybe it should be first in the list. There are almost unlimited ways you can use feature usage data to improve user experience.

[<img loading="lazy" class="aligncenter wp-image-12854 size-large" src="/assets/feature-usage-dashboard-1024x603.png" alt="Exceptionless Feature Usage Dashboard" width="940" height="554" data-id="12854" srcset="/assets/feature-usage-dashboard-1024x603.png 1024w, /assets/feature-usage-dashboard-300x177.png 300w, /assets/feature-usage-dashboard.png 1111w" sizes="(max-width: 940px) 100vw, 940px" />](/assets/feature-usage-dashboard.png)

If we click on the stack for the signup feature, it shows the tag list of the providers that have been used to signup (GitHub and Google, in this instance).

[<img loading="lazy" class="aligncenter wp-image-12855 size-full" src="/assets/feature-usage-stack-tags.png" alt="Exceptionless Feature Usage Stack" width="901" height="498" data-id="12855" srcset="/assets/feature-usage-stack-tags.png 901w, /assets/feature-usage-stack-tags-300x166.png 300w" sizes="(max-width: 901px) 100vw, 901px" />](/assets/feature-usage-stack-tags.png)

You can even go further and filter by a tag to see exactly how people are logging into your system using the search filter. Example: &#8220;tag:GitHub&#8221;

[<img loading="lazy" class="aligncenter wp-image-12856 size-full" src="/assets/feature-usage-tag-github.png" alt="Exceptionless Feature Usage Filtering Searching" width="903" height="681" data-id="12856" srcset="/assets/feature-usage-tag-github.png 903w, /assets/feature-usage-tag-github-300x226.png 300w" sizes="(max-width: 903px) 100vw, 903px" />](/assets/feature-usage-tag-github.png)

Regarding the SetUserIdentity example above, we can see that user information being appended to a feature usage occurrence if we visit the &#8220;Search&#8221; feature and view an occurrence.

[<img loading="lazy" class="aligncenter wp-image-12858 size-full" src="/assets/feature-usage-searching-userID.png" alt="Exceptionless Feature Usage User Info" width="840" height="553" data-id="12858" srcset="/assets/feature-usage-searching-userID.png 840w, /assets/feature-usage-searching-userID-300x198.png 300w" sizes="(max-width: 840px) 100vw, 840px" />](/assets/feature-usage-searching-userID.png)

## Cool Stuff, Right?

We think so, and we hope you do too. Either way, we're always looking for feedback, so let us know what you think via the comments below, an in app support message, or via the [contact page](/contact/ "Contact Exceptionless").
