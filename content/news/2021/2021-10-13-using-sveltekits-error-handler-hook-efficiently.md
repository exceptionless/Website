---
title: Using SvelteKit And Exceptionless To Catch Errors
date: 2021-10-07
draft: false
---

In our last post, we explored how to use Exceptionless alongside Svelte. Today, we're going to go a step further and leverage [SvelteKit's](https://kit.svelte.dev/) framework for SSR and filesystem routing alongside their error handler hook. The goal is to use this technology as efficiently as possible with Exceptionless as the final source of information. 

Before we dive in, let's explore SvelteKit and why you might want to use it. SvelteKit, is explained in their docs as:

> a framework for building extremely high-performance web apps.

But what does this mean? It means SvelteKit takes care of a lot of the things that can be tedious in setting up projects with great SEO. In this case, SvelteKit is leveraging server-side rendering to help with SEO and to allow for a single codebase for both your client and server code. 

> [SvelteKit] include[s] build optimizations, so that you load only the minimal required code; offline support; prefetching pages before the user initiates navigation; and configurable rendering that allows you to generate HTML on the server or in the browser at runtime or at build-time. SvelteKit does all the boring stuff for you so that you can get on with the creative part.

With that understood, let's get to coding. Here's what you'll need: 

1. Free account on Exceptionless ([sign up here](https://exceptionless.com))
2. API Key from Exceptionless
3. Node.js installed
4. Text editor

## Setting Up SvelteKit

Getting started with SvelteKit is incredibly easy. All you need to do is run this command: 

```
npm init svelte@next exceptionless-svelte-kit
```

You'll be prompted to answer some questions about your project. In our case, we can choose a skeleton project. I'll leave it up to you whether you choose Typescript or not. I'm going to choose to skip that for this post, though. 

Next, you'll want to install your dependencies: 

```
cd exceptionless-svelte-kit
npm install
```

Finally, you can install Exceptionless: 

```
npm i @exceptionless/browser
```

With everything installed, open the project in a code editor then start your app. You can start it with: 

```
npm run dev
```

## Global Error Handling

Before we go much further, let's talk about the [error handler hook](https://kit.svelte.dev/docs#hooks-handleerror) in SvelteKit. The first paragraph of the docs sums it up nicely: 

> If an error is thrown during rendering, this function will be called with the error and the request that caused it. This allows you to send data to an error tracking service, or to customise the formatting before printing the error to the console.

This feels a little bit like React's ErrorBoundary component, which [Exceptionless supports out of the box with its JavaScript client](./2021-09-09-announcing-the-new-exceptionless-javascript-client.md). By having an error handling hook like this through SvelteKit, we don't need to worry as much about catching every error and manually sending them to Exceptionless. Instead, we can catch what we can catch and then fallback on this hook. 

Let's get it set up!

Open up your SvelteKit project in your favorite text editor. We need to implement the global handle error hook. In SvelteKit's documentation, you'll need to start at the top of the [hooks page](https://kit.svelte.dev/docs#hooks) to understand what we should do, but I'll also highlight it here. 

In your `src` directory, create a `hooks.js` file. This is where we are going to modify the default hooks that are exported. According to SvelteKit's docs, handle, handleError, getSession, and externalFetch are the default exported hooks functions. We're going to modify the `handleError` function. 

All we need to do is declare that function and write our handler to override the default functionality. We want this function to take any uncaught errors and send them to our error handling service, Exceptionless. Let's set up the function and test it out first. 

In your `src/hooks.js` file, add this: 

```js
	/** @type {import('@sveltejs/kit').HandleError} */
	export async function handleError({ error, request }) {
    console.log("this is the error we would send: ", error);
  }
```

Now, to test this, we need to trigger an uncaught exception. Per the SvelteKit docs, this hook won't be called when the server responds with a valid response code. So simply navigating to the incorrect route won't work. Let's force an error in our `index.svelte` component. 

Open that file up, and at the top of the file, add this: 

```html
<script>
  const badVariable = () => {
    return fakeVariable;
  }

  badVariable();
</script>
```

Now, when you load the app on port 3000 or whatever port you specify, you should see our console.log message printed in the terminal window. This means the hook is working and we're ready to connect it to Exceptionless. 

Jump back into your `hooks.js` file, and let's import Exceptionless. At the top of the file, add this: 

```js
import { Exceptionless } from "@exceptionless/browser";
await Exceptionless.startup("YOUR API KEY");
```

If you don't have it, you can get your API Key by going to your [project list and clicking on your project name](https://be.exceptionless.io/project/list). 

Now, we just need to wire up the `handleError` hook to Exceptionless. In your `handleError` function, add this: 

```js
import { Exceptionless } from "@exceptionless/browser";
await Exceptionless.startup("YOUR API KEY");
  
/** @type {import('@sveltejs/kit').HandleError} */
export async function handleError({ error, request }) {
  await Exceptionless.submitException(error);
}
```

We'll leave our forced error so that we can test out sending this info to Exceptionless. Refresh the page, and the error will still throw. This time, though, it will be sent to Exceptionless with a full stack trace. 

Open up your Exceptionless dashboard, click on the Exceptions tab, and you should see something like this: 

[SCREENSHOT HERE]

If you click into the exception, you'll be able to see additional details. 

## Wrapping Up

Svelte is a great, true DOM, JavaScript framework. Combined with SvelteKit, you get server-side rendering, routing, and more. Exceptionless fits in anywhere, and it fits especailly well inside SvelteKit's built-in `handleError` hook. 

