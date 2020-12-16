---
title: Console Apps Example
order: 4
---

Let's take a look at how you might use Exceptionless within a DotNet Console App. Let's build a very simple Console App as an example. You can use `dotnet new console` or you can create the project however you feel comfortable starting. Once the project is started, let's open up the `Program.cs` file and make some changes. 

Start by adding the Exceptionless namespace like this: `using Exceptionless;`

Next, remove everything from within the `Main` method. We'll explore four different ways to send events by simply adding the functionality into the `Main` method. If you'd like to jump to a specific example, click the subject below: 

* [Submit Log](#submit-log) 
* [Submit Error](#submit-error) 
* [Unhandled Exception](#unhandled-exception) 
* [Default Client](#default-client)

---

## Submit Log

First, let's take a look at how you might send a log event to Exceptionless: 

```csharp
static void Main(string[] args)
{
    // create a new Exceptionless client instance
    var client = new ExceptionlessClient("YOUR API KEY");

    // submit a log event to the server
    client.SubmitLog("Hello World!");

    // NOTE: required in console apps that immediately exit since event submission normally happens on a timer in a background thread.
    client.ProcessQueue();
}
```

Here, we are creating an instance of the Exceptionless .NET client and then we're submitting a simple log to our Exceptionless account. As noted in the code snippet, you must also include the `client.ProcessQueue();` call at the end when working with Console Apps. Without that, your Console App will exit before the log is sent. You can see this in action by running `dotnet run`. You'll need to go to your Exceptionless dashboard to see the event.

---

## Submit Error

Cool, so that was a log. Let's see what it's like sending an error. Remove the code we had in the `Main` method and replace it with this: 

```csharp
static void Main(string[] args)
{
    // create a new Exceptionless client instance
    var client = new ExceptionlessClient("YOUR API KEY");

    try {
        throw new Exception("MyApp error");
    } catch (Exception ex) {
        // submit the exception to the Exceptionless server
        client.SubmitException(ex);
    }

    // NOTE: required in console apps that immediately exit since event submission normally happens on a timer in a background thread.
    client.ProcessQueue();
}
```

In this example, we are manually forcing an error. You can catch errors however you'd like in a real app and follow a similar pattern. Once the Exceptionless client is instantiated, we immediately throw an error. That error, of course, falls into the catch block where we submit it to Exceptionless with `client.SubmitException();`.

Again, you'll want to make sure you include `client.ProcessQueue();` at the end to ensure the error is sent before your app exits. Execute `dotnet run` to see this work.

---

## Unhandled Exception

Now, what if you want to catch errors that you didn't handle? We can do this by attaching the Exceptionless client to our app and reading in various configuration settings. Let's replace the code in the `Main` method with this:

```csharp
static void Main(string[] args)
{
    // create a new Exceptionless client instance
    var client = new ExceptionlessClient("YOUR API KEY");

    // reads additional configuration settings, configures various plugins and wires up to platform specific exception handlers.
    // also automatically calls ProcessQueue on process exit
    client.Startup();

    throw new Exception("MyApp unhandled error");
}
```

We still instantiate our Exceptionless client, but then we do one more thing. We connect it to our app with `client.Startup`. As noted, this allows Exceptionless to read configuration settings and plugins. It also allows us to automatically process the error before exit. This is important for unhandled errors because you don't know when they are going to happen and haven't handle them in a way that you can manually process the queue. 

To test this, execute `dotnet run` and check your Exceptionless dashboard.

---

## Default Client

Finally, let's wite up a default Exceptionless client and see how we might submit events using that. Replace the code in the `Main` method with this: 

```csharp
static void Main() 
{
    // configure the default instance
    ExceptionlessClient.Default.Startup("Your API Key");

    try {
        throw new Exception("MyApp ToExceptionless error");
    } catch (Exception ex) {
        // use ToExceptionless extension method. Uses ExceptionlessClient.Default and requires it to be configured.
        ex.ToExceptionless().Submit();
        // don't forget to call Submit.
    }
}
```

In this example, we are leveraging the default Exceptionless client configuration which is nice because for then don't have to instantiate the client. This is done automatically with this line: `ExceptionlessClient.Default.Startup("Your API Key");`. With this, we can simply send the error to Exceptionless in our catch block. 

--- 

[Next > Supported Platforms](supported-platforms.md) {.text-right}