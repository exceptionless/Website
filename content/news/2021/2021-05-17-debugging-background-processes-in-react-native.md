---
title: Debugging Background Processes In React Native
date: 2021-05-17
draft: true
---

When building mobile apps, you will very likely reach a point where you need to make use of background tasks. These tasks, as the name suggests, run in the background when your app is not in use. They even run when the phone is locked and not in use. But, they are finicky and entirely reliant on operating system algorithmic decisions. 

I was recently building an app in React Native because it needed to run on iOS and Android devices. The app was designed to be entirely offline first and used in areas with limited network connectivity. The idea was that when there was a solid network connection, the background process would run and it would sync up all the offline activities that had taken place with a remote database. 

Here's the problem: Background tasks on iOS and Android run at unpredictable times. You can set a minimum frequency for which these tasks should run, but it does not mean they will run at the frequency you selected. It just means they will not run any more frequently. Expo (a framework for making React Native apps easier) says this in their BackgroundFetch documentation about iOS: 

> Inexact interval in seconds between subsequent repeats of the background fetch alarm. The final interval may differ from the specified one to minimize wakeups and battery usage.

Android has less of a restriction in place and a bit more predictability. However, the frequency will never be an exact science. 

One way to get around this problem is to enable location services. With location services running in the background, you can tap into the "always on" functionality of tracking a user's location to ensure a background task runs specifically when you want it to run. But that is a pretty bad experience if your application doesn't actually need location services. It's also increases the liklihood of your app getting rejected from the respective stores when it goes up for review. 

So, if we need background tasks but we can't know for sure when they will run, how can we debug the process or even verify that it's working in the first place? This is where an event monitoring service like Exceptionless comes in handy. Let's take a look at how we would implement this in a background task process in React Native. 

### Getting Started  

For this project, you'll need Nodejs and NPM installed. You'll also need a code editor. We're going to use Expo to make our lives easier, but the tutorial should translate pretty easily to a bare React Native app. 

The first thing you'll need to do is install the expo-cli. It's as simmple as running this command: 

```
npm install --global expo-cli
```

Once that's installed, you can initialize a new expo project like so: 

```
expo init my-project
```