---
title: Angular
order: 3
parent: JS Guides
---

Exceptionless can be configured in just about any JavaScript environment, but this section is dedicated to set up and use within the Angular framework. 

### Install 

To install exceptionless, you can use npm or yarn: 

npm - `npm install exceptionless`

yarn - `yarn add exceptionless`

### Initializing the Client 

With Exceptionless, you can initialize a default client which provides a singleton instance, or you can initialize a custom client. We'll go over the way to initialize each.

**Default Client**  
```javascript
import { ExceptionlessClient } from 'exceptionless';
const client = ExceptionlessClient.default;
client.config.apiKey = 'YOUR API KEY';
``` 

With that set up, you can use the Exceptionless default client anywhere in your app in a number of ways. You can [use hooks](../../../../news/2021/2021-01-19-how-to-use-react-hooks-to-monitor-events-in-your-app.md), you can use [Redux](https://redux.js.org/), you can pass Exceptionless down through a higher-order component. 

**Custom Client** 

There are a variety of reasons you might want to instantiate a custom Exceptionless client. The custom client, for one, gives you more configuration options. Let's take a look at how to set it up. 

```javascript
import { ExceptionlessClient } from 'exceptionless';
const config = {
  apiKey: "YOUR API KEY", 
  serverUrl: "YOUR SELF HOSTED URL",
  ...
};
const client = new ExceptionlessClient(config);
```

You can see an additional parameter passed into the configuration object as an example. To see all the available options, take a look at our [configuration values here](../client-configuration-values.md).

Just like with the default client, you can now pass this custom client throughout your app. If needed, you can also instantiate a new custom client anywhere in your application. 

### Using Exceptionless in an Angular Component 

To make use of Exceptionless within a component, you'll import the package like described above. Your set up will vary depending on your needs, but this is a quick example of using Exceptionless within the `app` component of a default Angular project. 

```js
import { Component } from '@angular/core';
import { ExceptionlessClient } from 'exceptionless';
const defaultClient = ExceptionlessClient.default;
defaultClient.config.apiKey = "YOUR API KEY";

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'my-app';
  public handleClick(event) {
    try {
      throw new Error("Whoops!");
    } catch (error) {
      defaultClient.submitException(error);
    }
  }
}
```

In the `app` component's html, clicking a button that calls `handleClick` will immediately throw an error and report it to Exceptionless. 

---  

[Next > Express](express.md) {.text-right}