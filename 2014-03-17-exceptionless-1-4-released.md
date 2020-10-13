---
id: 3969
postTitle: Exceptionless 1.4 Released
date: 2014-03-17T13:46:46-06:00
author: Exceptionless
layout: blog_post.liquid
tags: ["posts", "open source"]
---
<img loading="lazy" class="alignright size-full wp-image-3971" style="margin-left: 20px; margin-right: 20px;" alt="Exceptionless Version 1.4" src="/assets/version1.4.png" width="175" height="88" data-id="3971" />Exceptionless 1.4 brings with it both server and client changes, a new client integration, some minor updates, and lots of bug fixes. Check out the changelog items below, and let us know if you have any questions.

We want to extend our thanks again to the developers that have worked on the project since we [went open source](/fork-us-exceptionless-goes-open-source/ "Exceptionless Goes Open Source") a few weeks ago. See their contributions below, along with links to their GitHub profiles.
<!--more-->

## Server

* The app will now be displayed in full screen mode on iOS devices (via Add to Home Screen).
* Added the ability to view the status page while in maintenance mode.
* Added the ability disable error processing on the error controller.
* Various usability improvements dealing with chart date-range selection.
* Added documentation link on the sidebar.
* Added checks to limit the number of max results returned from various API methods.
* Add new indexes to help performance and fix some inefficient queries.
* Changed the way we are filtering fixed and hidden errors to be more efficient.
* Updated all indexes to be created in the background if they don't already exist.
* Switched the JavaScriptEngineSwitcher to use JurassicJsEngine. Jurassic has no external dependencies on IE or Windows specific libraries.
* Fixed a race condition that would throw an exception when updating stats.
* Fixed a bug where the EnforceRetentionLimitsAction was returning all the query results and then paging them.
* The upgrade script now upgrades the database in a background thread.
* Fixed a bug where an error with no stack trace wouldn't be processed.
* Fixed a bug where the list loading indicators could spin non-stop.
* Fixed a bug where errors could be stored with the incorrect DateTimeOffset. This caused inconsistencies between charts and list data.
* Fixed a bug where the error stack's tags were not being synced with the error instances.
* Fixed a bug where the terms and privacy links could point to the wrong domain.
* Fixed a bug where a UriFormatException could be thrown when viewing an error occurrence. This could be caused by third party obfuscators that create a new pdb file.
* Updated the UpgradableJsonMediaTypeFormatter to handle errors gracefully.
* Fixed a bug where the EncodingDelegatingHandler could throw an exception when there was no request content.
* Fixed a bug that could <a href="https://jira.mongodb.org/browse/CSHARP-893" target="_blank">prevent an error from being processed</a>.

## Client

* Added support for <a title="NancyFX" href="http://nancyfx.org/" target="_blank">Nancy </a>(Contrib: <a title="Luis Rudge on GitHub" href="https://github.com/luisrudge" target="_blank">luisrudge</a>).
* Better support for low trust environments (Contrib: <a title="Obsbne on GitHub" href="https://github.com/obsbne" target="_blank">obsbne</a>).
* Fixed a bug where the MVC integration could interfere with custom error pages.
* Fixed a bug where a batch of errors wouldn't be sent if an error occurred while sending a previous error in the same batch.
* The client will now attempt to delete an already sent error when ProcessQueue is called.
* Fixed a bug where an exception would occur while deleting the manifest file that was saved by a different or elevated user.
