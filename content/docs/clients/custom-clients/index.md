---
title: Custom Smart Clients
key: Smart-Clients
---

Exceptionless provides a [.NET Client](../dotnet/index.md) and a [JavaScript Client](../javascript/index.md) to make things convenient. However, we recognize that developer write code in all sorts of languages beyond .NET and JS. It is possible to use Exceptionless with any programming language. In fact, our API makes it really simple. However, to get the full power of Exceptionless's [real-time configuration](../../project-settings.md) capabilities, you may want to wrap the Exceptionless API in a custom smart client in the language of your choice. 

This guide will not focus on any particular programming language, but will instead focus on the concepts necessary to successfully implement your smart client. Building a smart client in Exceptionless requires three main things: 

1. Access to the user's project configuration settings 
2. The ability to filter requests sent to the server based on the settings mentioned above
3. Convenience wrapper supporting all or most of the API endpoints
4. Ability to customize the configuration of the client

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


