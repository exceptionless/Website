---
title: FAQ
order: 13
---
* [Will Exceptionless slow my application down?](#q%3A-will-exceptionless-slow-my-application-down%3F)
* [Why is my organization throttled?](#q%3A-why-is-my-organization-throttled%3F)
* [What happens if the organization plan limit is reached?](#q%3A-what-happens-if-the-organization-plan-limit-is-reached%3F)
* [What will happen if my application throws a bunch of exceptions in a very short amount of time?](#q%3A-what-will-happen-if-my-application-throws-a-bunch-of-exceptions-in-a-very-short-amount-of-time%3F)
* [Can I reset my event data?](#q%3A-can-i-reset-my-event-data%3F)
* [What happens if my internet connection goes down?](#q%3A-what-happens-if-my-internet-connection-goes-down%3F)
* [How can I disable event reporting during testing?](#q%3A-how-can-i-disable-event-reporting-during-testing%3F)
* [Is there a minimum version of .NET you need to be targeting to use the Exceptionless client.](#q%3A-is-there-a-minimum-version-of-net-you-need-to-be-targeting-to-use-the-exceptionless-client%3F)
* [Can I use Exceptionless under medium trust?](#q%3A-can-i-use-exceptionless-under-medium-trust%3F)

***

### Q: Will Exceptionless slow my application down?

A: Exceptionless queues all events submissions to an in memory queue and then processes them in a background thread. We do everything we can to make sure that we do not slow your app down or crash your app.

***

### Q: Why is my organization throttled?

A: Every plan has both a monthly limit as well as an hourly limit. The hourly limit resets every hour and is [calculated](https://github.com/exceptionless/Exceptionless/blob/master/src/Exceptionless.Core/Extensions/OrganizationExtensions.cs#L51-L65) based on the remaining event limit divided by the number of hours left in the month times 10. We do this to prevent your event limit from being reached in seconds or minutes, thus giving you a greater sample size. _The limit can be increased at any time by upgrading the plan which boosts the monthly limit as well as hourly limit._

***

### Q: What happens if the organization plan limit is reached?

A: When the organization is throttled (hourly limit) or the plan limit (monthly limit) is reached, the clients will automatically discard any submitted events for a short period of time (usually five minutes) and resume automatically. Your app will continue to work as expected this entire time. _The limit can be increased at any time by upgrading the plan which boosts the monthly limit as well as hourly limit._

***

### Q: What will happen if my application throws a bunch of exceptions in a very short amount of time?

A: Exceptionless will intelligently try to ensure that the right amount of data is sent in. First, the client will intelligently ensure that the same event occurrence isn’t submitted repeatedly. Lets assume you have ten of the exact events submitted over a period of a minute. The first one comes through as expected, the next 9 events will be rolled up into a single event with a counter and last occurred date and submitted at the end of the 60 seconds. This allows us to show you a total of how many times the event occurred. Finally, in some cases the server logic will step in to remove error occurrences that it feels are spam. For example: Your site might be scanned by a bot and throw a bunch of unique 404 errors. Our system will see all of these within a small window of time submitted by a specific IP address. Once it hits a configurable threshold of error occurrences within a specific amount of time, these error occurrences will be removed from the system.

***

### Q: Can I reset my event data?

A: You can reset your event data at the project level by going into the manage project page and clicking the Reset Project Data button. You can also delete all event data for a specific stack by going to the stack page, clicking the Options button and clicking Delete. _Please note that this will not reset any plan limits._

***

### Q: What happens if my internet connection goes down?

A: If persistent storage is configured, the Exceptionless client will queue all events submissions to disk and will retry them later.

***

### Q: How can I disable event reporting during testing?

A: Set the enabled attribute to false in the exceptionless config section.

***

### Q: Is there a minimum version of .NET you need to be targeting to use the Exceptionless client.

A: Yes, your application needs to be targeting .NET 4.5 or newer.

***

### Q: Can I use Exceptionless under medium trust?

A: Yes, you will need to set the requirePermission attribute to false in the exceptionless config section. This attribute allows the exceptionless client to read the exceptionless config settings. When you are running in medium trust, unhandled exceptions will not be caught. This means that you must submit exceptions to Exceptionless manually.