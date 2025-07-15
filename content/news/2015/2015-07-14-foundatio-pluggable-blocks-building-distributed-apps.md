---
id: 13427
title: Introducing Foundatio - Pluggable Foundation Blocks for Building Distributed Apps
date: 2015-07-14
tags: [ "open source"]
---
![Exceptionless Foundatio App Building Blocks](/assets/img/news/foundatio-article-featured-image.png)In the process of developing Exceptionless, we realized there was a lack of good, simple, open source solutions for caching, queues, locks, messaging, jobs, file storage, and metrics when building scaleable applications.

We tried an open source Redis cache client for caching, but it went commercial (expensive) and there wasn't any in-memory implementations. For the message bus, we looked at <a href="http://particular.net/nservicebus" target="_blank">NServiceBus</a> (good product, high cost, not open source friendly) and <a href="http://masstransit-project.com/" target="_blank">MassTransit</a> (local setup a pain, Azure support lacking), but were left disappointed. For storage, we simply could not find a solution that was decoupled and supported in memory, file storage, or Azure Blog Storage.

So, naturally, we built our own!

Meet <a href="https://github.com/FoundatioFx/Foundatio" target="_blank">Foundatio</a> - your key to painless, scalable development and testing for your app! Let's take a look at some examples, below.

<div class="signup center">
  <a class="btn btn-large btn-primary" href="https://github.com/FoundatioFx/Foundatio" target="_blank">Try Foundatio Today</a>
</div>

<!--more-->

## Using Foundatio

To start using Foundatio for your project, simply <a href="https://www.nuget.org/packages?q=Foundatio" target="_blank">get the appropriate package from NuGet</a>.

Below are small examples of what is possible with Foundatio caching, queues, locks, messaging, jobs, file storage, and metrics. We hope you find these explanations and samples useful, but please let us know if you have any questions or comments.

### Caching

Foundatio provides four cache implementations, all derived from the <a href="https://github.com/FoundatioFx/Foundatio/blob/master/src/Foundatio/Caching/ICacheClient.cs" target="_blank">`ICacheClient` interface</a>, that save you expensive operations when creating or getting data by allowing you to store and access the data super fast.

These implementations include <a href="https://github.com/FoundatioFx/Foundatio/blob/master/src/Foundatio/Caching/InMemoryCacheClient.cs" target="_blank">InMemoryCacheClient</a>, <a href="https://github.com/FoundatioFx/Foundatio/blob/master/src/Foundatio/Caching/HybridCacheClient.cs" target="_blank">HybridCacheClient</a>, <a href="https://github.com/FoundatioFx/Foundatio.Redis/blob/master/src/Foundatio.Redis/Cache/RedisCacheClient.cs" target="_blank">RedisCacheClient</a>, and <a href="https://github.com/FoundatioFx/Foundatio.Redis/blob/master/src/Foundatio.Redis/Cache/RedisHybridCacheClient.cs" target="_blank">RedisHybridCacheClient</a>. Learn more about each in the <a href="https://github.com/FoundatioFx/Foundatio#caching" target="_blank">Foundatio Readme Caching section</a>.

For Exceptionless, we use RedisHybridCacheClient to cache users, organizations, and projects, which has a huge performance boost since we don't have to serialize the item if it's in local memory cache.

#### Foundatio Caching Sample

```cs
using Foundatio.Caching;

ICacheClient cache = new InMemoryCacheClient();
cache.Set("test", 1);
var value = cache.Get<int>("test");
```

### Queues

Foundatio includes three queue implementations, each derived from the <a href="https://github.com/FoundatioFx/Foundatio/blob/master/src/Foundatio/Queues/IQueue.cs" target="_blank">`IQueue` interface</a>, for First In, First Out (FIFO) message delivery. These include <a href="https://github.com/FoundatioFx/Foundatio/blob/master/src/Foundatio/Queues/InMemoryQueue.cs" target="_blank">InMemoryQueue</a>, <a href="https://github.com/FoundatioFx/Foundatio.Redis/blob/master/src/Foundatio.Redis/Queues/RedisQueue.cs" target="_blank">RedisQueue</a>, and <a href="https://github.com/FoundatioFx/Foundatio.AzureServiceBus/blob/master/src/Foundatio.AzureServiceBus/Queues/AzureServiceBusQueue.cs" target="_blank">ServiceBusQueue</a>. Read more in the <a href="https://github.com/FoundatioFx/Foundatio#queues" target="_blank">queues section of the readme</a>.

<a href="https://github.com/exceptionless/Exceptionless/blob/master/src/Exceptionless.Web/Controllers/EventController.cs#L1142-L1151" target="_blank">We use queues</a>, along with Foundatio Storage (below) to queue events for Exceptionless. Using both allows us to keep payloads small and limit system load.

#### Foundatio Queue Example

```cs
using Foundatio.Queues;

IQueue queue = new InMemoryQueue();

queue.Enqueue(new SimpleWorkItem {
Data = "Hello"
});

var workItem = queue.Dequeue(TimeSpan.Zero);
```

### Locks

To ensure any resource is only accessed by one consumer at any one time, use one of the two Foundatio Locks implementations, each derived from the <a href="https://github.com/FoundatioFx/Foundatio/blob/master/src/Foundatio/Lock/ILockProvider.cs" target="_blank">`ILockProvider` interface</a>. These implementations include <a href="https://github.com/FoundatioFx/Foundatio/blob/master/src/Foundatio/Lock/CacheLockProvider.cs" target="_blank">CacheLockProvider</a> and <a href="https://github.com/FoundatioFx/Foundatio/blob/master/src/Foundatio/Lock/ThrottlingLockProvider.cs" target="_blank">ThrottlingLockProvider</a>. These providers take an `ICacheClient`, ensuring code locks across machines. <a href="https://github.com/FoundatioFx/Foundatio#locks" target="_blank">Read more on the repo</a>.

We use locks to only run single instances of jobs (below), and more.

#### Foundatio Locks Sample

```cs
using Foundatio.Lock;

ILockProvider locker = new CacheLockProvider(new InMemoryCacheClient());

using (locker) {
  locker.ReleaseLock("test");

  using (locker.AcquireLock("test", acquireTimeout: TimeSpan.FromSeconds(1))) {
    // ...
  }
}
```

### Messaging

Derived from the <a href="https://github.com/FoundatioFx/Foundatio/blob/master/src/Foundatio/Messaging/IMessageBus.cs" target="_blank">`IMessageBus` interface</a>, our three message bus implementations let you publish and subscribe to messages within your application. Use the <a href="https://github.com/FoundatioFx/Foundatio/blob/master/src/Foundatio/Messaging/InMemoryMessageBus.cs" target="_blank">InMemoryMessageBus</a>, <a href="https://github.com/FoundatioFx/Foundatio.Redis/blob/master/src/Foundatio.Redis/Messaging/RedisMessageBus.cs" target="_blank">RedisMessageBus</a>,or <a href="https://github.com/FoundatioFx/Foundatio.AzureServiceBus/blob/master/src/Foundatio.AzureServiceBus/Messaging/AzureServiceBusMessageBus.cs" target="_blank">ServiceBusMessageBus</a> implementations based on your needs. <a href="https://github.com/FoundatioFx/Foundatio#messaging" target="_blank">Read more about each implementation on GitHub</a>.

<a href="https://github.com/exceptionless/Exceptionless/blob/master/src/Exceptionless.Web/Hubs/MessageBusBroker.cs" target="_blank">Exceptionless utilizes the message bus</a> extensively to pass messages such as events being created, stacks being changed, etc, throughout the system.

#### Foundatio Messaging Example

```cs
using Foundatio.Messaging;

IMessageBus messageBus = new InMemoryMessageBus();

using (messageBus) {
  messageBus.Subscribe<SimpleMessageA>(msg => {
    // Got message
  });

  messageBus.Publish(new SimpleMessageA {
      Data = "Hello"
  });
}
```

### Jobs

Run jobs by calling `Run()` or passing it to the <a href="https://github.com/FoundatioFx/Foundatio/blob/master/src/Foundatio/Jobs/JobRunner.cs" target="_blank">`JobRunner` class</a>, which allows you to easily run jobs as Azure Web Jobs. All jobs are required to derive from the <a href="https://github.com/FoundatioFx/Foundatio/blob/master/src/Foundatio/Jobs/JobBase.cs" target="_blank">`JobBase` class</a>.

Around here, <a href="https://github.com/exceptionless/Exceptionless/tree/master/src/Exceptionless.Core/Jobs" target="_blank">we use the jobs feature</a> for processing events, sending mail messages, and more. Some jobs, such as our <a href="https://github.com/exceptionless/Exceptionless/blob/master/src/Exceptionless.Core/Jobs/DailySummaryJob.cs#L51-L53" target="_blank">DailySummaryJob</a>, which we only want to run once, also use locks (above) to only run one instance.

#### Foundatio Jobs Sample

```cs
using Foundatio.Jobs;

public class HelloWorldJob : JobBase {
  public int RunCount { get; set; }

  protected override Task<JobResult> RunInternalAsync(CancellationToken token) {
    RunCount++;

    return Task.FromResult(JobResult.Success);
  }
}

var job = new HelloWorldJob();
job.Run(); // job.RunCount = 1;
job.RunContinuous(iterationLimit: 2); // job.RunCount = 3;
job.RunContinuous(token: new CancellationTokenSource(TimeSpan.FromMilliseconds(10)).Token); // job.RunCount > 10;
```

`Job.exe -t "MyLib.HelloWorldJob,MyLib"`

### File Storage

Derived from the <a href="https://github.com/FoundatioFx/Foundatio/blob/master/src/Foundatio/Storage/IFileStorage.cs" target="_blank">`IFileStorage` interface</a>, we offer three file storage implementations, including <a href="https://github.com/FoundatioFx/Foundatio/blob/master/src/Foundatio/Storage/InMemoryFileStorage.cs" target="_blank">InMemoryFileStorage</a>, <a href="https://github.com/FoundatioFx/Foundatio/blob/master/src/Foundatio/Storage/FolderFileStorage.cs" target="_blank">FolderFileStorage</a>, and <a href="https://github.com/FoundatioFx/Foundatio.AzureStorage/blob/master/src/Foundatio.AzureStorage/Storage/AzureFileStorage.cs" target="_blank">AzureFileStorage</a>. Read more on each in the <a href="https://github.com/FoundatioFx/Foundatio#file-storage" target="_blank">ReadMe</a>. _Using all `IFileStorage` implementations as singletons is recommended._

File storage is used by Exceptionless in conjunction with queues (above), among other things.

#### Foundatio File Storage Example

```cs
using Foundatio.Storage;

IFileStorage storage = new InMemoryFileStorage();
storage.SaveFile("test.txt", "test");
string content = storage.GetFileContents("test.txt")
```

### Metrics

Our three metric implementations derive from the <a href="https://github.com/FoundatioFx/Foundatio/blob/master/src/Foundatio/Metrics/IMetricsClient.cs" target="_blank">`IMetricsClient` interface</a> and include <a href="https://github.com/FoundatioFx/Foundatio/blob/master/src/Foundatio/Metrics/InMemoryMetricsClient.cs" target="_blank">InMemoryMetricsClient</a>, <a href="https://github.com/FoundatioFx/Foundatio/blob/master/src/Foundatio/Metrics/StatsDMetricsClient.cs" target="_blank">StatsDMetricsClient</a>, and <a href="https://github.com/FoundatioFx/Foundatio/blob/master/src/Foundatio.MetricsNET/MetricsNETClient.cs" target="_blank">MetricsNETClient</a>. <a href="https://github.com/FoundatioFx/Foundatio#metrics" target="_blank">Get the details on the repo</a>. _Note that these implementations should be used as singletons._

Metrics are used throughout the Exceptionless system to provide insight into how the system is working and get external alerts if events are not processing or report how much load is on the current system.

#### Foundatio Metrics Sample

```cs
metrics.Counter("c1");
metrics.Gauge("g1", 2.534);
metrics.Timer("t1", 50788);
```

## Development

If you would like to contribute to Foundatio, clone the repo and open the Foundatio.slnx Visual Studio solution file to get started. Let us know if you have any questions or need any assistance.

## The Future of Foundatio

As with any development project, Foundatio is a work in progress and we will continue developing it, however it is extremely stable and used in production by various companies, including Exceptionless (obviously). The next major steps are **full Async support** (some implementations already have it), and **vnext support**.

Naturally, we want to know what you think and what we should work on next, so [please let us know](https://github.com/FoundatioFx/Foundatio/issues)!


