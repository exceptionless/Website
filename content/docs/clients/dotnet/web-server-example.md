---
title: Web Server Example
order: 5
---

Exceptionless runs great in all sorts of environments. Let's take a look at how you might set up Exceptionless to work with your .NET web server. 

To get started, be sure to include the Exceptionless namespace wherever you plan to use it. You can do that like this: `using Exceptionless;`

The simples example of using Exceptionless in your web server is to include a try/catch block that leverages Exceptionless in the catch. It might look something like this: 

```csharp
public ActionResult<IEnumerable<YourDto>> YourEndpointFunction()
{
    var client = new ExceptionlessClient("YOUR API KEY");
    try {
        var userId = user.fetchUser();
        return userId;
    } catch (Exception ex) {
        client.SubmitException(ex);
        return NotFound();
    }
}
```

Should the request to `fetchUser()` or whatever your method is happen to throw, the Exceptionless client will pick it up and send the exception to your dashboard. 

Of course, Exceptionless is more than just error handling. You can leverage any of the Exceptionless event methods [documented here](sending-events.md) through the client interface. 

Exceptionless can be configured as a generic host for your web server. In your `Startup.cs` file, you would include the following within the `ConfigureServices` method: 

```csharp
services.AddLogging(b => b
        .AddConfiguration(Configuration.GetSection("Logging"))
        .AddDebug()
        .AddConsole()
        .AddExceptionless());
services.AddHttpContextAccessor();
```

Then in your `Configure` method, you would add: 

```csharp
app.UseExceptionless(Configuration);
```

To get access to your Exceptionless configuration (which we'll explain next), you'll need to do create a `builder` variable in your `Startup` method and build the configuration like this: 

```csharp
var builder = new ConfigurationBuilder()
        .SetBasePath(env.ContentRootPath)
        .AddJsonFile("appsettings.json", optional: true, reloadOnChange: true)
        .AddEnvironmentVariables();
Configuration = builder.Build();
```

This gives your server application access to any configuration you've set in your `appsettings.json` file. And that's exactly where we will configure Exceptionless. So, go ahead and open that file and we can create some configuration for your Exceptionless client: 

```json
 "Exceptionless": {
    "ApiKey": "YOUR API KEY",
    "ServerUrl": "http://localhost:50000", // This is only required if you are self-hosting
    "DefaultData": { // This object indicates some metadata you'd like attached to every event sent to Exceptionless
        "JSON_OBJECT": "{ \"Name\": \"Alice\" }",
        "Boolean": true,
        "Number": 1,
        "Array": "1,2,3"
    },
    "DefaultTags": [ "SOME_TAG" ],
    "Settings": {
        "FeatureXYZEnabled": false 
    }  
},
```

With this configured, you can now call the Exceptionless client from anywhere in your server application without first defining the client. 

This is just one example of one platform Exceptionless supports. But Exceptionless supports a wide range of platforms. For a full list, see the [supported platforms page here](supported-platforms.md).

---

[Next > Supported Platforms](supported-platforms.md) {.text-right}
