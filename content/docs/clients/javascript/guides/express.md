---
title: Express
order: 3
parent: JS Guides
---

Perhaps the most popular NodeJS server-side framework, Express is used in thousands of projects. Exceptionless provides dedicated NodeJS support, and configuring your Exceptionless client in Express is easy. 

### Install 

To install exceptionless, you can use npm or yarn: 

npm - `npm install exceptionless`

yarn - `yarn add exceptionless`

### Initializing the Client 

With Exceptionless, you can initialize a default client which provides a singleton instance, or you can initialize a custom client. We'll go over the way to initialize each. 

**Default Client**  
```javascript
const { ExceptionlessClient } = require('exceptionless/dist/exceptionless');
const client = ExceptionlessClient.default;
client.config.apiKey = 'YOUR API KEY';
``` 

With that set up, you can use the Exceptionless default client anywhere in your app in a number of ways. You can [use hooks](../../../../news/2021/2021-01-19-how-to-use-react-hooks-to-monitor-events-in-your-app.md), you can use [Redux](https://redux.js.org/), you can pass Exceptionless down through a higher-order component. 

**Custom Client** 

There are a variety of reasons you might want to instantiate a custom Exceptionless client. The custom client, for one, gives you more configuration options. Let's take a look at how to set it up. 

```javascript
const { ExceptionlessClient } = require('exceptionless/dist/exceptionless');
const config = {
  apiKey: "YOUR API KEY", 
  serverUrl: "YOUR SELF HOSTED URL",
  ...
};
const client = new ExceptionlessClient(config);
```

### Simple Example

In this example, we're just making use of the Exceptionless client in a file that handles one of our API routes. 

```js
const express = require("express");
const router = express.Router();
const { isAuthenticated } = require("./middleware");
const { ExceptionlessClient } = require("exceptionless/dist/exceptionless.node");
const config = {
  apiKey: "YOUR API KEY", 
  serverUrl: "YOUR SELF HOSTED URL", // Optional, leave blank if using hosted Exceptionless
  ...
};
const client = new ExceptionlessClient(config);

router.get("/:userId", isAuthenticated(client), async (req, res) => {
    try {
        const user = await fetchUserById(req.params.userId);        
        return res.status(200).json(user);
    } catch (error) { 
        client.createException(error).submit();   
        return res.status(500).send(error);
    }
});

module.exports = router;
```

You'll notice, we have an `isAuthenticated` middleware function that we are passing our client into. This is just one way to give middleware access to the Exceptionless client. In the next example, you'll see a global way of doing all of this. 

In the route itself, we have a try/catch and we use our client to submit an exception if an error is triggered. 

### Global Example  

In the entry file for your Express app, which is normally `server.js` or `app.js`, we can declare our Exceptionless client the same way as above. Then, we can make use of the built-in Express 

```js
const express = require("express");
const PORT = 5000;
const { ExceptionlessClient } = require("exceptionless/dist/exceptionless.node");
const config = {
  apiKey: "YOUR API KEY"
};
const client = new ExceptionlessClient(config);

const app = express();

app.get("/", (req, res, next) => {
  res.status(200).send(missingVariable);
});

app.use((error, req, res, next) => {
  client.createException(error).submit();
  return res.status(500).json({ error: error.toString() });
});

app.listen(PORT, async () => {       
  console.log(`App listening on port ${PORT}`);
});
```

In this example, it's important that your `app.use` handler for errors comes after your routes. This makes it so that uncaught errors will automatically be sent to Exceptionless and an error response will be sent back to the user. 