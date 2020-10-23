---
title: Upgrading
---

Please read this guide when upgrading from any version of Exceptionless. Upgrading is meant to be an easy process. **Most users will just have to upgrade the NuGet package.**

If you run into any issues after upgrading the NuGet packages please take a look at the sections below.

1. Ensure you have the latest version of the [NuGet Package manager installed](https://dist.nuget.org/index.html).
  * If you are using Visual Studio 2012/2013 version **2.12+ is required**.
  * If you are using Visual Studio 2015 than version **3.5+ is required**. 
2. Open the NuGet Package Manager dialog.
3. Click on the `Updates` tab.
4. Select the Exceptionless platform specific NuGet package (Ex. `Exceptionless.Web`) and click the `Update` button.
5. For more information please see the [official NuGet documentation](https://docs.nuget.org/consume/Package-Manager-Dialog).

## Index

* [Upgrading from 3.x](#upgrading-from-exceptionless-3x)
* [Upgrading from 2.x](#upgrading-from-exceptionless-2x)
* [Upgrading from 1.x](#upgrading-from-exceptionless-1x)

## Upgrading from Exceptionless 3.x

Please read this guide when upgrading from Exceptionless 3.x. The Exceptionless latest client has a few breaking changes from 3.x client that users should be aware of when upgrading. Please follow the guide below **after upgrading your NuGet packages from version 3.x to the latest version**.

* The `Exceptionless.Portable` package and `Exceptionless.Extras` assembly was merged into the `Exceptionless` package.
  * The `ExceptionlessClient.Default.Register()` method has been removed as the functionality was merged into `ExceptionlessClient.Default.Startup()` method.
  * As a result the ConfigurationSection type was moved into the exceptionless assembly `Exceptionless`. The NuGet package will automatically handle updating app.config and web.config configuration sections with the new assembly full name.

## Upgrading from Exceptionless 2.x

Please read this guide when upgrading from Exceptionless 2.x. The Exceptionless latest client has a few breaking changes from 2.x client that users should be aware of when upgrading. Please follow the guide below **after upgrading your NuGet packages from version 2.x to the latest version**.

The following changes affect a very small portion of users.

Renamed Enrichments to Plugins. The following changes will need to be made if you were using enrichments:

* `IEventEnrichment` has been renamed to `IEventPlugin`
* `IEventPlugin.Enrich(context, event)` signature has been changed to `IEventPlugin.Run(context)`. The event has been moved to the context
* `client.Configuration.AddEnrichment<IEventEnrichment>();` has been renamed to `client.Configuration.AddPlugin<IEventPlugin>();`
* `EventPluginContext.Data` property has been renamed to `EventPluginContext.ContextData`
* `EventSubmittingEventArgs.EnrichmentContextData` property has been renamed to `EventSubmittingEventArgs.PluginContextData`

## Upgrading from Exceptionless 1.x

Please read this guide when upgrading from Exceptionless 1.x. The Exceptionless latest client has a few breaking changes from 1.x client that users should be aware of when upgrading. Please follow the guide below after upgrading your NuGet packages from version 1.x to the latest version.

## Signed Packages

If you require a strong named NuGet package please remove the existing NuGet package and install the signed NuGet version. Example: Remove `Exceptionless` NuGet package and install the `Exceptionless.Signed` NuGet package.

## ExceptionlessClient API Changes

`ExceptionlessClient.Current.GetLastErrorId()` has been renamed to `ExceptionlessClient.Default.GetLastReferenceId()`. _NOTE: To have a reference id automatically generated, you must call `ExceptionlessClient.Default.Configuration.UseReferenceIds()`_

The following changes affect a very small portion of users.

1. `client.Create(Exception)` has been renamed to `client.CreateEvent()`.
2. `client.CreateError(Exception)` has been renamed to `client.CreateException(Exception)`. _NOTE: This now submits the exception._
3. `client.SubmitError(Error)` has been renamed to `client.SubmitEvent(Event)`.
4. `client.SubmitError(Exception)` and `client.Submit(Exception)` has been renamed to `client.SubmitException(Exception)`.
5. `client.ProcessUnhandledException(Exception)` has been renamed to `client.SubmitUnhandledException(Exception)`.
6. `client.SubmitPatch(string id, object patch)` has been removed.
7. `client.SuspendProcessing()` has been moved to `client.Configuration.Resolver.GetEventQueue().SuspendProcessing()`.
8. `client.UpdateConfiguration()` has been moved to `Exceptionless.Configuration.SettingsManager.UpdateSettings(client.Configuration)`.

#### Properties

`ExceptionlessClient.Current` has been deprecated and replaced with `ExceptionlessClient.Default`.

##### Advanced

The following changes affect a very small portion of users.

1. `ErrorBuilder` has been renamed to `EventBuilder`.
1. `client.Tags` has been moved to `client.Configuration.DefaultTags`.
1. `IExceptionlessPlugin` has been replaced with `IEventPlugin`. _NOTE: Plugins can be registered via `client.Configuration.AddPlugin<IEventPlugin>();`_
1. `client.Configuration["MySetting"]` has been moved to `client.Configuration.Settings["MySetting"]`.

#### Events

1event EventHandler<UnhandledExceptionReportingEventArgs> UnhandledExceptionReporting1 has been removed and replaced with 1event EventHandler<EventSubmittingEventArgs> SubmittingEvent1. You’ll need to wire up to 1SubmittingEvent1 and check the 1IsUnhandledError1 property.

##### Advanced
The following changes affect a very small portion of users.

1. `event EventHandler<SendErrorCompletedEventArgs> SendErrorCompleted` has been removed. To get notified of when an event has been submitted you must implement a custom `ISubmissionClient` and register it with the dependency resolver (Ex. `client.Configuration.Resolver.Register<ISubmissionClient, SubmissionClient>()` ).
1. `event EventHandler<RequestSendingEventArgs> RequestSending` has been removed. To override how an event is sent you must implement a custom `ISubmissionClient` and register it with the dependency resolver (Ex. `client.Configuration.Resolver.Register<ISubmissionClient, SubmissionClient>()` ).
##### Overview
```csharp
ExceptionlessClient.Default.SubmittingEvent += OnSubmittingEvent;
...
private static void OnSubmittingEvent(object sender, EventSubmittingEventArgs e) {
  if (!e.IsUnhandledError)
    return;

  if (e.Event.Message == "Important Exception")
    e.Event.Tags.Add("Important");
}
```
### Attribute Configuration Changes
1. `QueuePath` has been renamed to `StoragePath`
1. `ExceptionlessAttribute(string serverUrl, string apiKey, ...)` signature has been changed to `ExceptionlessAttribute(string apiKey)`
1. The `ExceptionlessAttribute` attribute must be in the entry or calling assembly or it won’t be picked up. To have it be picked up from a different location, you need to pass in the assembly as shown below.
### Overview
```csharp
[assembly: Exceptionless("YOUR_API_KEY_HERE", ServerUrl = "...", StoragePath = "|DataDirectory|\Queue")]
...
// You must specify the assembly where the attribute is defined only if it's not defined in the entry or calling assembly.
ExceptionlessClient.Default.Configuration.ReadFromAttributes(typeof(Program).Assembly);
```
### XML Configuration Changes
**These changes will be automatically upgraded by our NuGet installer.**

1. `queuePath` has been renamed to `storagePath`
1. `extendedData` has been renamed to `data`.
1. The `exceptionless` configuration section has been moved into the `Exceptionless` assembly. _NOTE: Xml configuration is not available if you are only using the PCL client._

#### Overview
```csharp
<configSections>
  <section name="exceptionless" type="Exceptionless.ExceptionlessSection, Exceptionless"/>
</configSections>

<exceptionless apiKey="YOUR_API_KEY_HERE" storagePath="|DataDirectory|\Queue">
  <data>
    <add name="SimpleValueFromConfig" value="Exceptionless"/>
  </data>
</exceptionless>
```

### Collector API End Point Changes
The api end point the client reports to has been changed from `https://collector.exceptionless.com` to `https://collector.exceptionless.io`. Please note that `https://collector.exceptionless.com` will continue to work.