---
title: How To Monitor Frontend Error and Backend Errors With Next.js and Exceptionless
date: 2021-08-26
draft: true
---

One of Next.js's biggest selling points is that it lumps your frontend and backend code together. Run and compile it at the same time. Develop both ends at the same time. It streamlines things considerably. This is equally as true when talking about error handling. Because the code-base is unified, the error-handling is relatively unified as well. 

Today, we'll take a look at how to use [Exceptionless](https://exceptionless.com), an open-source event monitoring service, to handle errors in our Next.js frontend and backend code. To get started, you'll need the following: 

* Free account on [Exceptionless](https://exceptionless.com)
* Vercel CLI installed
* Node.js
* Text editor

Let's jump into it!

## Setting Up Your Next.js Project 

The first thing we need to do is create our project. Fire up your command line and create your new project by running the following: 

```
npm init next-app next-js-exceptionless && cd next-js-exceptionless
```

While we're here at the command line, let's install the newly updated JavaScript client for Exceptionless. 

```
npm install @exceptionless/node @exceptionless/react
```

Why are we installing the Node and React versions of Exceptionless? Well, because Next.js is a fullstack Node and React framework. We want to get the full featureset of Exceptionless in both environments. 

Let's set up our error handling by creating a single helper file and function. The helper file can be called `events.js`. This can be placed at the root of the project. Let's write the function like this: 

```js
export const handleEvent = async (exceptionlessClient, type, event) => {
  switch(type) {
    case 'error': 
      return await exceptionlessClient.submitException(event);
    case 'log': 
      return await exceptionlessClient.submitLog("app.logger", event.message, event.logLevel);
    case 'feature': 
      return await exceptionlessClient.submitFeatureUsage(event.featureName);
    case 'custom':
      return await exceptionlessClient.submitEvent({ message: event.message, type: event.type, source: event.source });
    default: 
      return await exceptionlessClient.submitException(event);
  }
}
```

This is a simple switch statement, but it covers most of our event handling use cases. We are passing in the Exceptionless client as an argument because depending on if the event is coming from Node or from the React side of the house, the client will be different. The methods on the client are the same though. 


