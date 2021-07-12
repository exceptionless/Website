---
title: Angular Example
# order: 7
# parent: JS
---
Exceptionless will automatically capture any unhandled errors that are thrown.
However, angular errors are sent through an
[`$exceptionHandler` service](https://docs.angularjs.org/api/ng/service/$exceptionHandler).
To fully integrate with angular we need to install the angularjs integration.
Doing so will cause Exceptionless to start collecting unhandled Angular errors,
404s, and $log messages quickly.

1. Install the package by running `npm install @exceptionless/angularjs --save`.
2. Add the Exceptionless and Angular integrations scripts to you page.

    ```html
    <script type="module" src="node_modules/@exceptionless/angularjs/dist/index.bundle.js"></script>
    ```

3. Finally, import the `exceptionless` Angular module and inside of your app's configure message set the api key and any other settings.

    ```js
    const app = angular.module('myApp', ['exceptionless']);

    app.config(($ExceptionlessClient) => {
      $ExceptionlessClient.config.apiKey = 'YOUR_API_KEY';
      $ExceptionlessClient.config.setUserIdentity('12345678', 'Blake');
      $ExceptionlessClient.config.defaultTags.push('Example', 'JavaScript', 'Angular');
    });
    ```

### Troubleshooting

We recommend enabling debug logging by calling `$ExceptionlessClient.config.useDebugLogger();`. This will output messages to the console regarding what the client is doing. Please contact us by creating an issue on GitHub if you need assistance or have any feedback for the project.

---

[Next > React Example](react-example.md) {.text-right }
