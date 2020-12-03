---
title: Configuration
order: 1
---

- [ExceptionlessClient Configuration](#exceptionlessclient-configuration)
  - [Configuring With Code](#configuring-with-code)
  - [Configuring With Attributes](#configuring-with-attributes)
  - [Configuring With Environment Variables](#configuring-with-environment-variables)
  - [Using Web.config](#using-webconfig)
- [Versioning](#versioning)
- [Offline storage](#offline-storage)
  - [Configuration File](#configuration-file)
  - [Code](#code)
- [Disabling Exceptionless](#disabling-exceptionless)
  - [Configuration File](#configuration-file-1)
  - [Attribute](#attribute)
- [Self Hosted Options](#self-hosted-options)
  - [Configuration file](#configuration-file-2)
  - [Attribute](#attribute-1)

## ExceptionlessClient Configuration

The examples below show the various ways (configuration file, attributes or code) that Exceptionless can be configured in your application.

### Configuring With Code

```csharp
using Exceptionless;

var client = new ExceptionlessClient(c => {
    c.ApiKey = "YOUR_API_KEY";
    c.SetVersion(version);
});

// You can also set the api key directly on the default instance.
ExceptionlessClient.Default.Configuration.ApiKey = "YOUR_API_KEY"
```

### Configuring With Attributes

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

### Configuring With Environment Variables

You can also add an Environment variable or application setting with the key name `Exceptionless:ApiKey` and your `YOUR_API_KEY` as the value.

### Using Web.config

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

## Versioning

By specifying an application version you can [enable additional functionality](/docs/versioning/). By default, an application version will try to be resolved from assembly attributes.  However, it's a good practice to specify an application version if possible using the code below.

```csharp
using Exceptionless;
ExceptionlessClient.Default.Configuration.SetVersion("1.2.3");
```

## Offline storage

Events can also be persisted to disk for offline scenarios or to ensure no events are lost between application restarts. When selecting a folder path, make sure that the identity the application is running under has full permissions to that folder.

Please note that this adds a bit of overhead as events need to be serialized to disk on submission and is not recommended for high throughput logging scenarios.

### Configuration File

```xml
<!-- Use Folder Storage -->
<exceptionless apiKey="YOUR_API_KEY" storagePath="PATH OR FOLDER NAME" />
```

### Code

```csharp
// Use folder storage
ExceptionlessClient.Default.Configuration.UseFolderStorage("PATH OR FOLDER NAME");
// Use isolated storage
ExceptionlessClient.Default.Configuration.UseIsolatedStorage();
```

## Disabling Exceptionless

You can disable Exceptionless from reporting events during testing using the `Enabled` setting.

### Configuration File

```xml
<exceptionless apiKey="YOUR_API_KEY" enabled="false" />
```

### Attribute

```csharp
using Exceptionless.Configuration;
[assembly: Exceptionless("YOUR_API_KEY", Enabled=false)]
```

## Self Hosted Options

The Exceptionless client can also be configured to send data to your [self hosted instance](../../self-hosting/index.md). This is configured by setting the `serverUrl` setting to point to your Exceptionless instance.

### Configuration file

```csharp
<exceptionless apiKey="YOUR_API_KEY" serverUrl="http://localhost" />
```

### Attribute

```csharp
using Exceptionless.Configuration;
[assembly: Exceptionless("YOUR_API_KEY", ServerUrl = "http://localhost")]
```

---
[Next > Client Configuration Values](client-configuration-values.md) {.text-right}