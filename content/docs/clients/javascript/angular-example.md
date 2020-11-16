---
title: Angular Example
order: 7
---
Exceptionless will automatically capture any unhandled errors that are thrown. However, angular errors are sent through an [`$exceptionHandler` service](https://docs.angularjs.org/api/ng/service/$exceptionHandler). To fully integrate with angular we need to add an [Exceptionless integration for Angular](https://github.com/exceptionless/Exceptionless.JavaScript/blob/master/dist/integrations/angular.js)! Doing so will cause Exceptionless to start collecting unhandled Angular errors, 404s, and $log messages quickly.

1. Add the Exceptionless and Angular integrations scripts to you page.
```html
<script src="bower_components/exceptionless/dist/exceptionless.js"></script>
<script src="bower_components/exceptionless/dist/integrations/angular.js"></script>
```
2. Finally, import the `exceptionless` Angular module and inside of your app's configure message set the api key and any other settings. 
```js
var app = angular.module('myApp', ['exceptionless']);

app.config(function($ExceptionlessClient) {
  $ExceptionlessClient.config.apiKey = 'YOUR_API_KEY';
  $ExceptionlessClient.config.setUserIdentity('12345678', 'Blake');
  $ExceptionlessClient.config.useSessions();
  $ExceptionlessClient.config.defaultTags.push('Example', 'JavaScript', 'Angular');
});
```

## Sample Angular App

We have built a quick [Angular sample app](https://github.com/exceptionless/Exceptionless.JavaScript/blob/master/example/angular/) you can play around with.

**Run the sample app by following the steps below:**

1. Install [Node.js](https://nodejs.org/) (_this is only required to run the http server_)
2. [Clone or download our repository from GitHub](https://github.com/exceptionless/Exceptionless.JavaScript).
3. Navigate to the example\angular folder via the command line (e.g., cd example\angular)
4. Open app.constants.js in your favorite text editor and set the [apiKey and server url](https://github.com/exceptionless/Exceptionless.JavaScript/blob/master/example/angular/app/app.constants.js#L6-L7). If you are not running a local Exceptionless server, please comment out [this line](https://github.com/exceptionless/Exceptionless.JavaScript/blob/master/example/angular/app/app.js#L12).
5. Run `npm start`.
6. Navigate to <http://localhost:8000> in your browser to view the angular app.
7. To create an error, click any of the links to load the partial views.

### Troubleshooting

We recommend enabling debug logging by calling `$ExceptionlessClient.config.useDebugLogger();`. This will output messages to the console regarding what the client is doing. Please contact us by creating an issue on GitHub if you need assistance or have any feedback for the project.

---  

[Next > RequireJS Example](require-js-example) {.text-right}