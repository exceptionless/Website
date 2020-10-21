---
title: JavaScript Example
tags: docs
anchor: js-example
eleventyNavigation:
  key: js-example
  parent: JavaScript Client
  title: JavaScript Example
---
## Exceptionless JavaScript Client Example / Sample

We have put together an example for the JavaScript client that you can use to get an idea of how everything works. It is [available on the GitHub Repo](https://github.com/exceptionless/Exceptionless.JavaScript/tree/master/example).

### To Get the Example Running…
1. Clone or download the [GitHub Repo](https://github.com/exceptionless/Exceptionless.JavaScript/tree/master/example)
1. Edit the HTML file in the root example folder and replace the [existing API Key](https://github.com/exceptionless/Exceptionless.JavaScript/blob/master/example/index.html#L8) with yours. Also, comment out the [serverUrl](https://github.com/exceptionless/Exceptionless.JavaScript/blob/master/example/index.html#L16).
1. Open the HTML file in your browser
1. Open the console so that you can see the debug messages that the example generates
1. Click the buttons on the page to submit an event

### Troubleshooting
Calling `client.config.useDebugLogger();` to enable debug logging is recommend and will output messages to the console regarding what the client is doing. Please contact us by creating an issue on GitHub if you need help or have any feedback regarding the JavaScript client.