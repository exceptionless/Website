---
title: Set Default Log Levels
date: 2020-10-26
draft: false
---

## New Default Log Level Settings

New UI updates and default log level selections are here!

We recognize that every application is different. Every developer is different. Being able to easily customize the data captured through Exceptionless is an important part of our mission. This is why in v7.0.5, we have updated the user interface to support default log level selections.

![Log Level Settings](log_level.png)

As you can see in the image above, the current example default is "Warn." You can override that default on the Stacks page any time you'd like. But if you want to customize that default log level from the start and have it apply across the board, you can do so on your settings page.

![Set Default Log Level on the Settings Page](setting.png)

## Why Do Log Levels Matter

Logging is key to understanding problems in your application, but it can also act as a historical record useful for post-mortems and general analysis. However, not all logs are important or necessary. And even if they are, you may want to filter them out in certain scenarios.

Enter log levels.

Log levels control what types of messages are logged. The general definition of log levels, and what we use at Exceptionless is:

TRACE  
DEBUG  
INFO  
WARN  
ERROR
FATAL  
OFF  

By setting your log levels, you are essentially saying you'd like to see information grouped into the buckets defined by the log level. For example, if you'd only like to log the most severe issues, you might select a log level of FATAL.

We want to help you with this flow by automatically accepting or ignoring errors and messages that don't match the log levels you've defined in Exceptionless. We think this will help you better manage your exceptions, reporting, and overall development flow. We can't wait to hear your feedback. If there's any questions, suggestions, or general feedback, we'd love to hear from you. You can reply here or open an issue on Github.
