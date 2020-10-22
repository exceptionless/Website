---
title: Self Hosting Options
---
## Self Hosted Options using the Exceptionless JavaScript / Node.js Client

The Exceptionless client can also be configured to send data to your self hosted instance. This is configured by setting the `serverUrl` setting to point to your Exceptionless instance.

### JavaScript

You can set the `serverUrl` on the default ExceptionlessClient instance.

```javascript
exceptionless.ExceptionlessClient.default.config.serverUrl = 'http://localhost:50000';
```

### Node.js

You can set the `serverUrl` on the default ExceptionlessClient instance.

```javascript
var client = require('exceptionless.node').ExceptionlessClient.default;
client.config.serverUrl = 'http://localhost:50000';
```