---
title: Troubleshooting
order: 5
---

If your events aren’t being sent to the server there are a few things that you can try to diagnose the issue.

## Update Your Client
Please make sure that you are using the latest version of the client.

## Ensure the Queue has Time to Process
If you are using Exceptionless in a scenario where an event is submitted and the process is immediately terminated, then you will need to make sure that the queue is processed before the application ends. Please note that the client will try to do this automatically.

Events are queued and sent in the background, if the application isn’t running then the events cannot be sent. You can manually force the queue to be processed by calling the following line of code before before the process ends:

### JavaScript
```javascript
exceptionless.ExceptionlessClient.default.config.queue.process();
```

### Node.js
```javascript
var client = require('exceptionless').ExceptionlessClient.default;
client.config.queue.process();
```

This will cause the event queue to be processed asynchronously and the events to be reported. If this doesn’t solve the issue then please enable client logging and send us the log file. You can also attempt to pass true to `process(true)` to try and process the queue synchronously. _Please note that sending synchronously depends on specific api's that may not be available, so it may not send synchronously._

## Enable Client Logging
The Exceptionless client can be configured to write diagnostic messages to the console to help diagnose any issues with the client.

### JavaScript
```javascript
exceptionless.ExceptionlessClient.default.config.useDebugLogger();
```

### Node.js
```javascript
var client = require('exceptionless').ExceptionlessClient.default;
client.config.useDebugLogger();
```

## Debugging Source Code
You can also debug the Exceptionless source code by using the unmagnified version and set breakpoints in your browsers developer tools.