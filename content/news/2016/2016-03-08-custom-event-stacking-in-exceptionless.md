---
id: 14163
title: Custom Event Stacking in Exceptionless
date: 2016-03-08
---
<img loading="lazy" class="alignright size-full wp-image-14180" src="/assets/custom-event-stacking-graphicl.png" alt="custom event stacking with exceptionless" width="260" height="260" data-id="14180" srcset="/assets/custom-event-stacking-graphicl.png 260w, /assets/custom-event-stacking-graphicl-150x150.png 150w" sizes="(max-width: 260px) 100vw, 260px" />Sometimes you just need things to be your way.

We get it... your morning coffee, folded towels, and how events stack (group) in your event reporting application should be controllable and customizable.

Well, thanks to a great suggestion by <a href="https://github.com/adamzolotarev" target="_blank">@adamzolotarev</a>, now they are! Well, the events, at least.<!--more-->

## Why Custom Event Stacking?

We do our best to group your events into relevant and smartly-named stacks, but there are cases where you may want to specifically name a stack and attribute certain events to it for organization, reporting, troubleshooting, or other reasons.

To facilitate this need, we created `SetManualStackingKey`, which both .NET and JavaScript client users can set.

## How Do I Create Custom Event Stacks?

Adding your own custom stacking to events in Exceptionless is super easy. Below are examples for both .NET and JavaScript.

In these examples, we are using `setManualStackingKey` and naming the custom stack "MyCustomStackingKey".

So, any events you use the below for will be a part of the custom stack, and all other events, exceptiones, logs, feature usages, etc will still be stacked automatically, like normal, by the app.

### .NET Custom Event Stack Example

<pre class="brush: csharp; title: ; notranslate" title="">try {
    throw new ApplicationException("Unable to create order from quote.");
} catch (Exception ex) {
    ex.ToExceptionless().SetManualStackingKey("MyCustomStackingKey").Submit();
}
</pre>

Alternatively, you can set the stacking directly on an event (e.g., inside a plugin).

<pre class="brush: csharp; title: ; notranslate" title="">event.SetManualStackingKey("MyCustomStackingKey");</pre>

### JavaScript Custom Event Stack Example

<pre class="brush: jscript; title: ; notranslate" title="">var client = exceptionless.ExceptionlessClient.default;
// Node.Js
// var client = require('exceptionless').ExceptionlessClient.default;

try {
  throw new Error('Unable to create order from quote.');
} catch (error) {
  client.createException(error).setManualStackingKey('MyCustomStackingKey').submit();
}</pre>

## How Do We Stack Up?

We're always interested in what you think of Exceptionless' features and functionality, so let us know if you find custom stacking useful, need help implementing it, or just want to chat over on <a href="https://github.com/exceptionless" target="_blank">GitHub</a>.

Thanks for reading!
