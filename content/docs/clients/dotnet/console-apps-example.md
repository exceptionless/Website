---
title: Console Apps Example
order: 4
---

Console Apps in .NET have a unique requirement when it comes to Exceptionless compared to other applications. Because a console application is designed to exit upon code execution and because Exceptionless is designed to process events asynchronously via a queue, an event sent through a console app to Exceptionless won't process unless you take one of two specific steps. 

First, let's get some configuration out of the way. To use Exceptionless, add the Exceptionless namespace like this: `using Exceptionless;` 

Once you've done that, be sure to define the Exceptionless client: 

`var client = new ExceptionlessClient("YOUR API KEY");`  

Now you can send events to Exceptionless like this: 

`client.SubmitLog("Hello World!");` 

Or you can capture exceptions like this: 

```csharp
try {
    throw new Exception("MyApp error");
} catch (Exception ex) {
    // submit the exception to the Exceptionless server
    client.SubmitException(ex);
}
```

However, in these examples you will have to force the Exceptionless queue to process these events before the application exits. You can do that up front or you can do it at the end of execution. 

To tell Exceptionless up front to process the events before the application exits, you can simple add `client.Startup();` after defining the Exceptionless client.

Alternatively, you can call `client.processQueue();` at the end of your code's execution to ensure the Exceptionless queue is process before the app exits. 

There's one additional configuration option that doesn't require defining the client first. If you use the Exceptionless default client, it takes care of of most things for you. Simply load up the Exceptionless default client by calling `Startup` with your API Key, and you're ready to go: 

`ExceptionlessClient.Default.Startup("Your API Key");`

When you go this route, you can send exceptions to Exceptionless just by calling a `ToExceptionless()` method on the default Exceptionless client. It looks like this: 

```csharp
// configure the default instance
ExceptionlessClient.Default.Startup("Your API Key");

try {
    throw new Exception("MyApp ToExceptionless error");
} catch (Exception ex) {
    // use ToExceptionless extension method. Uses ExceptionlessClient.Default and requires it to be configured.
    ex.ToExceptionless().Submit();
    // don't forget to call Submit.
}
```

--- 

[Next > Supported Platforms](supported-platforms.md) {.text-right}