---
title: Vue
order: 2
parent: JS Guides
---

Vue is one of the more popular JavaScript frameworks out there, and Exceptionless has your back if you're working with it. Getting started is simple. 

### Install 

To install exceptionless, you can use npm or yarn: 

npm - `npm install exceptionless`

yarn - `yarn add exceptionless`

### Initializing the Client 

With Exceptionless, you can initialize a default client which provides a singleton instance, or you can initialize a custom client. We'll go over the way to initialize each. 

**Default Client**  
```javascript
import { ExceptionlessClient } from 'exceptionless/dist/exceptionless';
const client = ExceptionlessClient.default;
client.config.apiKey = 'YOUR API KEY';
``` 

With that set up, you can use the Exceptionless default client anywhere in your app in a number of ways. You can pull it into a template file or you can create global state store to pass the client around the app.

**Custom Client** 

There are a variety of reasons you might want to instantiate a custom Exceptionless client. The custom client, for one, gives you more configuration options. Let's take a look at how to set it up. 

```javascript
import { ExceptionlessClient } from 'exceptionless/dist/exceptionless';
const config = {
  apiKey: "YOUR API KEY", 
  serverUrl: "YOUR SELF HOSTED URL",
  ...
};
const client = new ExceptionlessClient(config);
```

You can see an additional parameter passed into the configuration object as an example. To see all the available options, take a look at our [configuration values here](../client-configuration-values.md).

Just like with the default client, you can now pass this custom client throughout your app. If needed, you can also instantiate a new custom client anywhere in your application. 

## Using Exceptionless Through Global State 

If you'd like to pass the Exceptionless client around your app using global state, there are a few methods you can implement. This example is a simple example of creating a global state store that can be accessed anywhere. 

Start by creating a `store.js` file that looks like this: 

```javascript
import { reactive, toRefs } from "vue";
import { ExceptionlessClient } from "exceptionless/dist/exceptionless";
const defaultClient = ExceptionlessClient.default;
defaultClient.config.apiKey = "XUlBBdgFxAlmCsAZHDFTIacXpzYuZDuqDzzFYMlR";

const state = reactive({
    client: defaultClient
});

export default function useMonitoring() {
    return {
        ...toRefs(state),
    }
}
```

Again, this is a very simple example that literally uses global state just for the Exceptionless client. You'd likely use it for more than that. 

Now, to make use of our global state, just import it anywhere in your app like this: 

```javascript

```



