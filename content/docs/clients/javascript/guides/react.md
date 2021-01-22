---
title: React
order: 1
parent: JS Guides
---

Exceptionless can be configured in just about any JavaScript environment, but this section is dedicated to set up and use within the React framework. 

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

With that set up, you can use the Exceptionless default client anywhere in your app in a number of ways. You can [use hooks](../../../../news/2021/2021-01-19-how-to-use-react-hooks-to-monitor-events-in-your-app.md), you can use [Redux](https://redux.js.org/), you can pass Exceptionless down through a higher-order component. 

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

### Creating an Exceptionless Provider  

Exceptionless doesn't have a React Provider element out of the box, but setting one up is relatively easy. This is a simple example of how to do so. 

First, create a `context.js` file like this: 

```javascript
import React, { createContext, useReducer } from 'react';

export default (reducer, actions, initialState) => {
  const Context = createContext();

  const Provider = (props) => {
    const { children } = props;
    const [state, dispatch] = useReducer(reducer, initialState);

    const boundActions = {};
    
    for(let key in actions) {
      boundActions[key] = actions[key](dispatch);
    }

    const valueProps = {
      state, 
      ...boundActions
    }
    return <Context.Provider value={valueProps}>{children}</Context.Provider>;
  }

  return { Context, Provider };
}
```

This is just setting up a Provider element that we can wrap around any other components in the application. 

Next, create a `store.js` file like this: 

```javascript
import context from './context';
import { ExceptionlessClient } from 'exceptionless/dist/exceptionless';
const defaultClient = ExceptionlessClient.default;
defaultClient.config.apiKey = 'YOUR API KEY';

const initialState = {
  client: defaultClient
}

export const reducer = (state, action) => {
  switch(action.type) {
    default: 
      return {
        ...state
      }
  }
}

export const { Context, Provider } = context(
  reducer,
  initialState
);
```

This is a very simplified reducer/store example. Normally, you would have action creators and payloads that update state. Since we're only covering the Exceptionless client in here, there is no need for state updates. 

What this does for us though is creates an extendible Provider component that can wrap other components in the app. To use it, you may want to simply wrap the `App.js` component in your application like so: 

```javascript
import { useContext } from 'react';
import { Provider, Context } from "./store";

const App = () => {
  const { state } = useContext(Context);
  const { client } = state;
  return (
    <Provider>
      <>
      Your App.js code or components
      </>
    </Provider>
  )
} 

export default App;
```

Now in any components you ultimately write that are nested within your App.js file, you will have access to the Exceptionless client and can manage errors and events. 

---  

[Next > Vue](vue.md) {.text-right}