---
title: Configuration
---
The following sections will walk you through configuring Exceptionless to fit your specific requirements. The sections below assume that you already have an Exceptionless Api Key. You can find your Exceptionless Api Key by clicking on your project in the project list. Next, click on the `Api Keys` tab to see your projects Api Keys.

- [Config File](#config-file)
- [Attribute](#attribute)
    - [Code](#code)
    - [Environment Variable / Application Settings](#environment-variable--application-settings)
  - [Exceptionless Portable Class Library (PCL) Configuration](#exceptionless-portable-class-library-pcl-configuration)
  - [General Data Protection Regulation](#general-data-protection-regulation)
    - [Configuration File](#configuration-file)
    - [Code](#code-1)
    - [Code](#code-2)
  - [Versioning](#versioning)
  - [WCF Configuration](#wcf-configuration)
  - [Offline storage](#offline-storage)
    - [Configuration File](#configuration-file-1)
    - [Code](#code-3)
  - [Disabling Exceptionless During Testing](#disabling-exceptionless-during-testing)
    - [Configuration File](#configuration-file-2)
    - [Attribute](#attribute-1)
  - [Custom Config Settings](#custom-config-settings)
    - [Configuration file](#configuration-file-3)
    - [Attribute](#attribute-2)
  - [Adding Static Extended Data Values with Every Report](#adding-static-extended-data-values-with-every-report)
    - [Configuration file](#configuration-file-4)
    - [Code](#code-4)
  - [Adding Custom Tags with Every Report](#adding-custom-tags-with-every-report)
    - [Configuration File](#configuration-file-5)
    - [Code](#code-5)
  - [Enabling Trace Message Collection](#enabling-trace-message-collection)
    - [Configuration File](#configuration-file-6)
    - [Attribute](#attribute-3)
  - [Self Hosted Options](#self-hosted-options)
    - [Configuration file](#configuration-file-7)
    - [Attribute](#attribute-4)

### ExceptionlessClient Configuration

The examples below will show you the various ways (configuration file, attributes or code) the ExceptionlessClient may be configured. Please note that the package (Ex. `Exceptionless.WebApi`) you are using will contain a detailed read me with the best way to configure the ExceptionlessClient for your specific platform.

## Config File

Exceptionless can be configured using a config section in your web.config or app.config depending on what kind of project you have. Installing the correct NuGet package should automatically add the necessary configuration elements. It should look like this:

```xml
<?xml version="1.0" encoding="utf-8"?>
<configuration>
  <configSections>
    <section name="exceptionless" type="Exceptionless.ExceptionlessSection, Exceptionless" />
  </configSections>
  <!-- attribute names are cases sensitive -->
  <exceptionless apiKey="API_KEY_HERE" />
  ...
  <system.webServer>
    <modules>
      <remove name="ExceptionlessModule" />
      <add name="ExceptionlessModule" type="Exceptionless.Mvc.ExceptionlessModule, Exceptionless.Mvc" />
    </modules>
    ...
  </system.webServer>
</configuration>
```

## Attribute

You can also configure Exceptionless using attributes like this:

```csharp
using Exceptionless.Configuration;
[assembly: Exceptionless("YOUR_API_KEY")]
```

The Exceptionless assembly attribute will only be picked up if it’s defined in the entry or calling assembly. If you have placed the above attribute in different location you’ll need to call the method below during startup.

```csharp
using Exceptionless;
ExceptionlessClient.Default.Configuration.ReadFromAttributes(typeof(MyClass).Assembly)
```

#### Code

```csharp
using Exceptionless;

var client = new ExceptionlessClient(c => {
    c.ApiKey = "YOUR_API_KEY";
    c.SetVersion(version);
});

// You can also set the api directly on the default instance.
ExceptionlessClient.Default.Configuration.ApiKey = "YOUR_API_KEY"
```

#### Environment Variable / Application Settings

You can also add a Environment Variable or Application setting with the key name `Exceptionless:ApiKey` and your `YOUR_API_KEY` as the value.

### Exceptionless Portable Class Library (PCL) Configuration

If you are using only the `Exceptionless` package and the PCL `Profile 151`, you’ll need to configure exceptionless via attribute config or code. If you choose the attribute method, you’ll need to read the configuration on startup.

```csharp
using Exceptionless;
ExceptionlessClient.Default.Configuration.ReadFromAttributes(typeof(MyClass).Assembly)
```

You will also need to wire up to any error handlers as the `Exceptionless` PCL package doesn’t know what platform you are running on.

It’s also worth noting that when using the `Exceptionless` PCL package you will the very basic feature set:

1. Basic stacking of exceptions. PCL libraries don’t have access to an errors stack frames so they can’t be broken down.
1. Basic `ISubmissionClient` that doesn’t support proxies.
1. No Environmental Information will be sent.
For these reasons if you are on a known platform then use the platform specific package to save you time configuring while giving you more contextual information.

### General Data Protection Regulation
By default the Exceptionless Client will report all available metadata which could include potential PII data. There are various ways to limit the scope of PII data collection. For example, one could use [Data Exclusions](https://github.com/exceptionless/Exceptionless/wiki/Security#data-exclusions) to remove sensitive values but it only applies to specific collection points such as `Cookie Keys`, `Form Data Keys`, `Query String Keys` and `Extra Exception properties`. Additional data may need to be removed for the GDPR like the collection of user names and IP Addresses. Shown below is several examples of how you can configure the client to remove this additional metadata.

You have the option of finely tuning what is collected via individual setting options or you can disable the collection of all PII data by setting the `IncludePrivateInformation` to `false`.

#### Configuration File

```xml
<exceptionless apiKey="YOUR_API_KEY" includePrivateInformation="false" />
```

#### Code

```csharp
ExceptionlessClient.Default.Configuration.IncludePrivateInformation = false;
```

If you wish to have a finer grained approach which allows you to use Data Exclusions while removing specific meta data collection you can do so via code. Please note if the below doesn't meet your needs you can always [write a plugin](https://github.com/exceptionless/Exceptionless.Net/wiki/Adding-Plugins).

#### Code

```csharp
// Include the username if available (E.G., Environment.UserName or IIdentity.Name)
ExceptionlessClient.Default.Configuration.IncludeUserName = false;
// Include the MachineName in MachineInfo.
ExceptionlessClient.Default.Configuration.IncludeMachineName = false;
// Include Ip Addresses in MachineInfo and RequestInfo.
ExceptionlessClient.Default.Configuration.IncludeIpAddress = false;
// Include Cookies, please note that DataExclusions are applied to all Cookie keys when enabled.
ExceptionlessClient.Default.Configuration.IncludeCookies = false;
// Include Form/POST Data, please note that DataExclusions are only applied to Form data keys when enabled.
ExceptionlessClient.Default.Configuration.IncludePostData = false;
// Include Query String information, please note that DataExclusions are applied to all Query String keys when enabled.
ExceptionlessClient.Default.Configuration.IncludeQueryString = false;
```

### Versioning

By specifying an application version you can [enable additional functionality](https://github.com/exceptionless/Exceptionless/wiki/Versioning). By default, an application version will try to be resolved from assembly attributes.  However, it's a good practice to specify an application version if possible using the code below.

```csharp
using Exceptionless;
ExceptionlessClient.Default.Configuration.SetVersion("1.2.3");
```

### WCF Configuration

You can also configure exceptionless to capture all WCF exceptions following the steps below.

1. Install the [Exceptionless.Web NuGet package](http://www.nuget.org/packages/Exceptionless.Web/).
2. Configure your Api Key (see the previous section).
3. Add the ExceptionlessWcfHandleErrorAttribute to your WCF Classes.

```csharp
using Exceptionless.Web;
[ExceptionlessWcfHandleErrorAttribute]
```

### Offline storage

Events can also be persisted to disk for offline scenarios or to ensure no events are lost between application restarts. When selecting a folder path, make sure that the identity the application is running under has full permissions to that folder.

Please note that this adds a bit of overhead as events need to be serialized to disk on submission and is not recommended for high throughput logging scenarios.

#### Configuration File

```xml
<!-- Use Folder Storage -->
<exceptionless apiKey="YOUR_API_KEY" storagePath="PATH OR FOLDER NAME" />
```

#### Code

```csharp
// Use folder storage
ExceptionlessClient.Default.Configuration.UseFolderStorage("PATH OR FOLDER NAME");
// Use isolated storage
ExceptionlessClient.Default.Configuration.UseIsolatedStorage();
```

### Disabling Exceptionless During Testing
You can disable Exceptionless from reporting events during testing using the `Enabled` setting.
#### Configuration File

```xml
<exceptionless apiKey="YOUR_API_KEY" enabled="false" />
```

#### Attribute

```csharp
using Exceptionless.Configuration;
[assembly: Exceptionless("YOUR_API_KEY", Enabled=false)]
```

### Custom Config Settings

Exceptionless allows you to add custom config values to your Exceptionless clients that can be set through the client config section, attributes or remotely on the project settings. These config values can be accessed and used within your app to control things like wether or not to send custom data with your reports. For example, you could have a `IncludeOrderData` flag in your config that you use to control wether or not you add a custom order object to your Exceptionless report data. You can even remotely turn the setting on or off from your project settings. Here is an example of doing that:

#### Configuration file

```csharp
<exceptionless apiKey="YOUR_API_KEY">
  <settings>
    <add name="IncludeOrderData" value="true" />
  </settings>
</exceptionless>
```

#### Attribute

```csharp
using Exceptionless.Configuration;
[assembly: ExceptionlessSetting("IncludeOrderData", "true")]
```

Then in your app, you can check the setting and determine if you should include the order data or not:

```csharp
using Exceptionless;

try {
  ...
} catch (Exception ex) {
  var report = ex.ToExceptionless();
  if (ExceptionlessClient.Default.Configuration.Settings["IncludeOrderData"] == "true")
      report.AddObject(order);
  report.Submit();
}
```

### Adding Static Extended Data Values with Every Report

You can have the Exceptionless client automatically add extended data values to every report that it submits like this:

#### Configuration file

```csharp
<exceptionless apiKey="YOUR_API_KEY">
    <data>
      <add name="Data1" value="Exceptionless"/>
      <add name="Data2" value="10"/>
      <add name="Data3" value="true"/>
      <add name="Data4" value="{ 'Property1': 'Exceptionless', 'Property2: 10, 'Property3': true }"/>
    </data>
</exceptionless>
```

#### Code

```csharp
using Exceptionless;
ExceptionlessClient.Default.Configuration.DefaultData["Data1"] = "Exceptionless";
```

### Adding Custom Tags with Every Report

You can have the Exceptionless client automatically add specific tags to every report that it submits like this:

#### Configuration File

```csharp
<exceptionless apiKey="YOUR_API_KEY" tags="Tag1,Tag2" />
```

#### Code

```csharp
using Exceptionless;
ExceptionlessClient.Default.Configuration.DefaultTags.Add("Tag1");
```

### Enabling Trace Message Collection

One config setting built into Exceptionless can be used to include the last X trace log messages with your event reports. You can enable this setting by specifying a `TraceLogLimit` setting with a value greater than 0. This value is the maxiumum number of trace messages that will be submitted with the event report.

#### Configuration File

```csharp
<exceptionless apiKey="YOUR_API_KEY">
  <settings>
    <add name="TraceLogLimit" value="10" />
  </settings>
</exceptionless>
```

#### Attribute

```csharp
using Exceptionless.Configuration;
[assembly: ExceptionlessSetting("TraceLogLimit", "10")]
```

### Self Hosted Options

The Exceptionless client can also be configured to send data to your self hosted instance. This is configured by setting the `serverUrl` setting to point to your Exceptionless instance. 

#### Configuration file

```csharp
<exceptionless apiKey="YOUR_API_KEY" serverUrl="http://localhost" />
```

#### Attribute

```csharp
using Exceptionless.Configuration;
[assembly: Exceptionless("YOUR_API_KEY", ServerUrl = "http://localhost")]
```
