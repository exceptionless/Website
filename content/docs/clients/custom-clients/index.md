---
title: Custom Exceptionless Clients
key: Custom-Clients
---

Exceptionless provides a [.NET Client](../dotnet/index.md) and a [JavaScript Client](../javascript/index.md) to make things convenient. However, we recognize that developer write code in all sorts of languages beyond .NET and JS. It is possible to use Exceptionless with any programming language. In fact, our API makes it really simple. However, to get the full power of Exceptionless's [real-time configuration](../../project-settings.md) capabilities, you may want to wrap the Exceptionless API in a custom client in the language of your choice. 

This guide will not focus on any particular programming language, but will instead focus on the concepts necessary to successfully implement your custom client. Building a client in Exceptionless requires three main things: 

1. Authentication 
2. Understanding of the data models
3. Usage of the correct API endpoints

As a bonus, at the end of this document, we'll discuss how you might configure the real-time capabilities enabled by Exceptionless.

### Authentication

One of the key things to understand when creating a custom client (or when using the Exceptionless API) is the security implications of the API token generated and used. Exceptionless has two types of API tokens: 

* User-scoped
* Client/Project-scoped

Think of a user-scoped key as the master key for that particular user. It allows for EVERYTHING. This includes password resets, deleting organizations, deleting users, and more. This is not the type of key you want to generate with your custom client. You also don't want to manually generate and use these types of keys within your client. 

Instead, you should use a client-scoped key. A client-scoped key only has access to very specific endpoints and provides a significantly increased level of security compared to using a user-scoped key. 

In the Exceptionless UI, you can create a project API key by going to a project's settings page. To do so, click on the project dropdown in the top-menu, hover over the project's name, and then click the gear icon. On the settings page, you'll see an API Keys tab. Click that and you can generate a new client-scoped key. 

![Generate API Key in UI](../../img/apiKeyGeneration.png)

This is the key that will need to be passed into the configuration settings of your custom client. 

### Understanding the Data Models

When providing data to the Exceptionless server, there are specific data models dependent on the information you're trying to provide. We'll cover those models here. 

**User Info**

**Event Models**

There are three types of events in Exceptionless: 

* Exceptions/Errors
* Logs
* General events

Let's take a look at the models for each of these types, starting with the most complex to the least. 

**Errors**

Error events have some very specific data structures. They need to include a `type` property of `error`, a `date` property formatted as an ISOString, and a custom error property. This property is generally prefixed with an `@` symbol and should reference the error type. Let's take a look at the JSON structure of an error event: 

```json
{ 
  "type": "error", 
  "date":"2030-01-01T12:00:00.0000000-05:00", 
  "@simple_error": { 
    "message": "Simple Exception", 
    "type": "System.Exception", 
    "stack_trace": " at Client.Tests.ExceptionlessClientTests.CanSubmitSimpleException() in ExceptionlessClientTests.cs:line 77" 
  } 
}
```

Note that the error property should be an object containing infomation about the actual error. This should include string values for `message`, `type`, and `stack_trace`.

You can explore and test error events on our [API documentation site here](https://api.exceptionless.io/docs/index.html). Events can be sent to Exceptionless via a `GET` or a `POST` request. 

`GET` - `/api/v2/events/submit` 

If you use the `GET` request, you will need to pass in your event information as query string parameters. This might look like: 

`/events/submit?access_token=YOUR_API_KEY&type=error&date%3D2030-01-01T12%3A00%3A00.0000000-05%3A00%26%40simple_error%3D%7Bmessage%3ASimple%20Exception%2C%20type%3ASystem.Exception%2C%20stack_trace%3A%20%20at%20Client.Tests.ExceptionlessClientTests.CanSubmitSimpleException%28%29%20in%20ExceptionlessClientTests.cs%3Aline%2077`

Notice that you must url encode your properties for this to work. 

If you would like to use the more traditional `POST` request, you will use the following endpoint: 

`POST` - `/api/v2/events` 

You'll send the JSON event into in the body of the request. 

**Logs**

When submitting a log, you need to provide specific information about the log event. The model for a log event includes a `type` property of `log`, a `meassage` property that includes the message string for the log, and a `date` property in ISOString format. Optionally, you can pass in user info in a `@user` object property that includes properties specific to the user. 

Here's a basic JSON example of a log event: 

```json
{ 
  "type": "log", 
  "message": "Exceptionless is amazing!", 
  "date":"2030-01-01T12:00:00.0000000-05:00", 
  "@user":{ 
    "identity":"123456789", 
    "name": "Test User" 
  } 
}
```

You can explore and test log events on our [API documentation site here](https://api.exceptionless.io/docs/index.html). Events can be sent to Exceptionless via a `GET` or a `POST` request. 

`GET` - `/api/v2/events/submit` 

If you use the `GET` request, you will need to pass in your event information as query string parameters. This might look like: 

`/events/submit?access_token=YOUR_API_KEY&type=log&message=Hello World&source=server01&geo=32.85,-96.9613&randomproperty=true`

If you would like to use the more traditional `POST` request, you will use the following endpoint: 

`POST` - `/api/v2/events` 

You'll send the JSON event into in the body of the request. 

**General Events**

General events don't fit neatly into any one category. They can be used for a variety of things. They look similar to log events but they are not governed by log level settings in your application or in Exceptionless. 

A simple general event has one required property: `message`. Here's a JSON example of a general event: 

```json
{ 
  "message": "Exceptionless is amazing!" 
}
```

You can explore and test general events on our [API documentation site here](https://api.exceptionless.io/docs/index.html). Events can be sent to Exceptionless via a `GET` or a `POST` request. 

`GET` - `/api/v2/events/submit` 

If you use the `GET` request, you will need to pass in your event information as query string parameters. This might look like: 

`/events/submit?access_token=YOUR_API_KEY&message=Exceptionless!`

If you would like to use the more traditional `POST` request, you will use the following endpoint: 

`POST` - `/api/v2/events` 

You'll send the JSON event into in the body of the request. 


Let's take these one at a time.

### Access User's Project Configuration Settings

In the Exceptionless UI (and programmatically through the API), a user can update their project configuration settings. These configuration settings allow the user to define log levels and exclusions among other things. 

However, those settings will only be matched and caught once a request gets to the server unless an Exceptionless smart client is implemented. The smart client will read the settings in periodically and proactively prevent requests from being sent if they don't conform to the user's settings. For example, the client can read in the settings and see that the minimum log level set by the user is WARN and will prevent logs from being sent to the server if they are at some lower level like INFO.

The way a smart client can access this settings depends on how you want to implement your client. Every event request to the Exceptionless server will result in a response with headers set that include the project configuration settings. You can also poll the Exceptionless API to receive the configuration settings for a project or organization.

**Reading From the Response Header**

If you choose to read from the response headers, you'll need to know what header to look for. Exceptionless send back the configuration settings in an `x-exceptionless-configversion` header. 

**Polling the API**  

If you choose to poll the API, just know that Exceptionless's hosted infrastructure has rate-limiting in place, so make sure your polling frequency is spaced out reasonably. We recommend every five minutes or more.

To poll for the configuration settings of a particular project, you would make use of the the project configuration endpoint: 

`GET - /api/v2/projects/{id}/config`

To get the global organization configuration settings across projects, you can make a request to a similar endpoint: 

`GET - /api/v2/projects/config`  

When you have received the configuration settings, it is recommended that you cache them somewhere or store them in memory to make quick use of them when processing requests before sending them to Exceptionless. This leads us into the next topic.

### Filtering Requests Based on Settings

The configuration values you receive for a project should look something like this: 

```
{
  "version":17,
  "settings":{
    "@@UserAgentBotPatterns":"*bot*,*crawler*,*spider*,*aolbuild*,*teoma*,*yahoo*",
    "@@log:*":"warn",
    "@@log:":"warn",
    "@@DataExclusions":"*Password*, *Bearer*,"
  }
}
```

It's important that your smart client knows what it's looking for in order to filter requests sent to the Exceptionless server. Taking a look at the above configuration settings, we know we need to watch for log events where the log is below the warn level. If we find that, we need to ignore it and not send it to the server. We also know that if we have ANY event that includes password data or a Bearer token, we should strip that info from the request. 

An important note on the log level configuration settings: `@@log:*` applies to logs event that are sent to Exceptionless without a source specified, and `@@log:` applied to log events with a specific source.

Now that you know what you're looking out for, your smart client will need to parse events before sending them to make sure they are stripped of excluded data or to make sure they are not sent at all if they are log events lower than the levels set. This guide, again, is not focused on any specific programmin language, so we do not have example code on stripping these value and preventing requests, but generally any sort of string parsing will do the trick.

### Convenience Wrapper  

Everything mentioned up until this point can be implemented with direct GET, POST, and PUT operations against the Exceptionless API. A smart client should have convenience wrappers around the API that expose methods for handling events. Examples of this can be seen in the [Exceptionless .NET client](./../dotnet/index.md) and the [Exceptionless JS client](./../javascript/index.md).

A good smart client will not only reduce the code a developer has to write, but it will also provide helpful hints as to the data that should be provided. Where possible, avoid objects as parameters that are fed into a method as the data to be included in the object is not always easy to idenitify. A better approach may be to pass in individual properties into the method like this: 

`submitEvent(source, eventData, location)`

When you build your smart client, a method like the above example would provide the developer hints on what specific data should be passed in (i.e. source, eventData, and location). That is a simple, psuedo example to get the point across. This, of course, is not a requirement, but it's generally a good practice. 

It is entirely up to you how many of the Exceptionless API endpoints you wrap in convenience methods. Ideally, you will wrap the ones most used by your application and if you are building this client for others, you'll wrap as many as you expect your audience to need. 

### Wrapping Up 

Unlike a simple SDK, a smart client for Exceptionless provides robust functionality that can actually save bandwidth. By preventing events that should never go to the server, you save on network requests and optimize your app's experience. By abiding by the configurations a user sets in their Exceptionless configuration settings, your client becomes more user-focused. 

We can't way to see what you build.


