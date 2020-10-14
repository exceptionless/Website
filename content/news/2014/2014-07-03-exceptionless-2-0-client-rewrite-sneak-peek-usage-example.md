---
id: 9098
title: Exceptionless 2.0 Client Rewrite Sneak Peek Usage Example
date: 2014-07-03
tags: [ "announcement"]
---
<img loading="lazy" class="aligncenter size-full wp-image-9099" src="/assets/img/news/new-client-header.jpg" alt="new-client-header" width="708" height="250" data-id="9099" srcset="/jpg 708w, /assets/new-client-header/(max-width: 708px) 100vw, 708px" />

As Exceptionless 2.0 continues to become a reality, we thought we would give everyone a little taste of what you will be able to do with the new, rewritten client. Continue reading for a glimpse at the primary features, along with a complete usage example for adding extra data to events.

After you check it out, let us know if you have questions or suggestions. We're listening!<!--more-->

## New Client Features

* The Exceptionless client has been completely rewritten to be highly simplified and extensible.
* Will work with Mono and Project K.
* The base client is <a title="Exceptionless.Portable PCL" href="https://www.nuget.org/packages/exceptionless.portable" target="_blank">PCL</a>, and we will have platform specific clients that add additional functionality for each platform.
* Adding extra data to events is extremely easy.

**<a title="Exceptionless 2.0 Client Source" href="https://github.com/exceptionless/Exceptionless.net" target="_blank">View Client Source</a>**

### Extended event data usage example

<img loading="lazy" class="aligncenter size-large wp-image-9100" src="/assets/img/news/ex-client-1024x420.png" alt="Exceptionless Code Example" width="940" height="385" data-id="9100" srcset="/.png 1024w, /assets/ex-client-300x123/nt.png 1167w" sizes="(max-width: 94/

**Lets break that example down**, line by line, shall we? Check out the <a title="Exceptionless 2.0 Client Source" href="https://github.com/exceptionless/Exceptionless/tree/master/Source/Clients" target="_blank">client source</a> if you want to take a look at the complete code.

**First, set your API key.**

<pre>var client = new ExceptionlessClient(config =&gt; {
config.ApiKey = "API_KEY_HERE";
</pre>

* * *

Then, send events to your own free Exceptionless server install.

<pre>config.ServerUrl = "https://exceptionless.myorg.com";
</pre>

* * *

Now, read config settings from attributes.

<pre>config.ReadFromAttributes();
</pre>

* * *

Read config settings from a config section in your app/web.config.

<pre>config.ReadFromConfigSection();
</pre>

* * *

Store all client data including the offline queue in the store folder, by default isolated storage is used.

<pre>config.UseFolderStorage("store");
</pre>

* * *

Exclude any form fields, cookies, query string parameters, and custom data properties containing "CreditCard".

<pre>config.AddDataExclusions("CreditCard");
</pre>

* * *

Add the "SomeTag" to all events.

<pre>config.DefaultTags.Add("SomeTag");
</pre>

* * *

Add the "MyObject" custom data object to every event.

<pre>config.DefaultData.Add("MyObject", new { MyProperty = "Value1" });
</pre>

* * *

Add a custom event enrichment that will add a tag called "MyTag" to every event.

<pre>config.AddEnrichment(ev =&gt; ev.Tags.Add("MyTag"));
</pre>

* * *

Register a custom log implementation that uses NLog.

<pre>config.Resolver.Register(new NLogExceptionlessLog());
</pre>

* * *

The Startup method is specific for each platform and wires up to all relevant unhandled exception events so that they will be automatically sent to the server.

<pre>client.Startup();
</pre>

* * *

Manually catch and report an error with a custom tag on it.

<pre>try {
throw new ApplicationException("Boom!");
} catch (Exception ex) {
ex.ToExceptionless().AddTags("MyTag").Submit();
}
</pre>

* * *

Let users add their email address and a description of the error.

<pre>client.UpdateUserEmailAndDescription(client.GetLastReferenceId(), "me@me.com", "It broke!");
</pre>

* * *

Create and submit a log message and add an extra "Order" object to the event.

<pre>client.CreateLog("Order", "New order created.")
.AddObject(new { Total = 14.95 }, name: "Order")
.Submit();
</pre>

* * *

Submit a feature usage event that will let you see how much certain features of your app are being used.

<pre>client.SubmitFeatureUsage("FeatureA");
</pre>

* * *

Submit a page not found event so you can keep track of your broken links and fix them.

<pre>client.SubmitNotFound("/badpage");
</pre>

* * *

Listen to all events being sent and cancel any errors that are "IgnoredType".

<pre>client.SubmittingEvent += (sender, args) =&gt;
args.Cancel = args.Event.IsError() && args.Event.GetError().Type.Contains("IgnoredType");
</pre>

* * *

Settings data is synced in real-time with the project settings in your Exceptionless project on the server.

<pre>client.Configuration.Settings.Changed += (sender, args) =&gt;
Trace.WriteLine(String.Format("Action: {0} Key: {1} Value: {2}", args.Action, args.Item.Key, args.Item.Value));
</pre>

* * *

You can use those settings to control behavior in your app.

<pre>if (client.Configuration.Settings.GetBoolean("IncludeMyCustomData", false))
Trace.WriteLine("Should include my custom data");
</pre>

## That's All There Is To It!

After checking out the above example, we hope you agree that we've drastically simplified and improved the process of adding data to events, allowing for much more flexibility.

As always, if you have any questions, comments, suggestions, or concerns, let us know!

### Read more about Exceptionless 2.0

* [Exceptionless 2.0 - In the Making](/exceptionless-2-in-the-making/ "Exceptionless 2.0 – In the Making")
* [Event Based Reporting System](/event-based-reporting-system-coming-version-2-0/ "Event Based Reporting System Coming in Version 2.0")
* [Simplified API](/upcoming-exceptionless-2-0-simplified-api/ "More from the Upcoming Exceptionless 2.0: Simplified API")
* [A Pluggable System](/coming-exceptionless-2-0-pluggable-system/ "Coming in Exceptionless 2.0 – A Pluggable System")


