---
id: 14200
title: Simple App Deployment with Azure Continuous Deployment and GitHub
date: 2016-03-16
---
<img loading="lazy" class="alignright size-full wp-image-14224" src="/assets/cloud-icon.png" alt="simple app deployment" width="260" height="260" data-id="14224" srcset="/assets/cloud-icon.png 260w, /assets/cloud-icon-150x150.png 150w" sizes="(max-width: 260px) 100vw, 260px" />We’ve learned a lot about simple app deployment since we first started Exceptionless. We initially went with what everyone else was doing (Octopus Deploy), but over time we thought we could greatly simplify and automate it, letting us focus on what matters, improving the product!

Through a lot of testing and iterations of our deployment process, we think we finally nailed it.

As such, we’d like to share with the community how we use Microsoft Azure Continuous Deployment and GitHub for **awesomely simple deployments. **And, how you can too. See the details of implementing this deploy workflow later in the article, below.<!--more-->

## Exceptionless Deployment History

### In the Beginning

When we first started Exceptionless, we deployed it as a monolithic application, meaning the server and UI were one piece, or app. We used Octopus Deploy to deploy to a single IIS machine, which involved setting up a website and server for the Octopus Deploy service and configuring build agents, on each server we deployed to, that could deploy build artifacts.

### The Move to Azure

After a year or so of managing Exceptionless on colocation boxes in a Dallas data center, we realized that **we didn’t want to manage hardware anymore** and we could scale easier on a managed service like Azure. So, we moved to Azure, where we had to set up a VM just to manage deployments with Octopus Deploy. There were also issues that we ran into with deploying to Azure WebSitThis was annoying, since every time we wanted to do a release we had to log in and tell the system to deploy to production.

We knew there had to be a better way.

### Two Steps Forward&#8230;

Soon, we decided to split the UI and Server apps so we could deploy and work on them independently. This also meant they could scale independently and one change to either wouldn’t cause the whole site to go down when deploying. Splitting the two helped a lot, but it **added more work** as we now had to manage two Octopus Deploy projects. So, we started looking at the <a href="https://azure.microsoft.com/en-us/documentation/articles/web-sites-publish-source-control/" target="_blank">Continuous Deployment in Azure</a>.

### Aha! Eureka! Solution Time!

We researched further and found out that if we used <a href="https://github.com/nvie/gitflow" target="_blank">Git Flow</a> as a development workflow, we could ditch Octopus Deploy completely, remove that dependency, and just use Git push to manage our deployments.

With Git Flow, you do all your work in feature branches and the **master branch is always stable**. This allows us to set up GitHub deployment on the master and deploy to Azure automatically, with no work required! So anytime we push to the GitHub master branch, it automatically deploys to production on Azure. That simple!

#### Here is the BASIC workflow:

  1. We create a new feature branch, then work on that branch until it is completed and tested. Testing is done on the website that is currently pointed to the feature branch, which is separate from production.
  2. When we commit to any branch, our continuous integration (CI) server picks up the changes via a GitHub webhook, pulls them down, then builds the project.
  3. We then take all of the build artifacts and push them to a second GitHub repository using the same branch that the code was pushed to (for example, the master branch). This allows you to see exactly what artifacts change between releases (stateless too) and different branches.
  4. Those changes are then automatically pushed via Azure Git Deploy.
  5. Profit!

**This is very slick!** Since we push artifacts to the same branch they were built onto a build repository. We can then set up different environments that get auto deployed when we push to that branch. For example: When we are working on a feature, we commit to our branch. We can then set up a new website in Azure that pulls from the build server’s Git artifacts branch for that feature. This allows us to test and automate environments!

## Detailed Continuous Deployment Setup

Here are the details on our solution for simple app deployment using GitHub and Azure.

### 1. Use AppVeyor to build the app.

<a href="https://github.com/exceptionless/Exceptionless/blob/master/appveyor.yml" target="_blank">Here's our code.</a>

### 2. Store build artifacts in a separate GitHub artifacts repository.

This works really well because you can see the entire history of your build artifacts and browse their contents. Plus, GitHub hosts it for free!

We found that we could <a href="https://github.com/exceptionless/Exceptionless/blob/master/Libraries/Push-Artifacts.ps1#L71" target="_blank">format the commit message with a specific format</a> that GitHub could understand and parse into different links. We can click on the &#8220;Commit:&#8221; part of the message to link to the actual commit that is building to see exactly has changed.

<a href="/assets/github-build-history-artifacts.jpg" rel="attachment wp-att-14204"><img loading="lazy" class="aligncenter size-large wp-image-14204" src="/assets/github-build-history-artifacts-1024x380.jpg" alt="github build history artifacts" width="940" height="349" data-id="14204" srcset="/assets/github-build-history-artifacts-1024x380.jpg 1024w, /assets/github-build-history-artifacts-300x111.jpg 300w, /assets/github-build-history-artifacts-768x285.jpg 768w, /assets/github-build-history-artifacts.jpg 1402w" sizes="(max-width: 940px) 100vw, 940px" /></a>

We can then click on the build to see what artifacts changed.

<a href="/assets/gitHube-build-history-details.jpg" rel="attachment wp-att-14205"><img loading="lazy" class="aligncenter size-large wp-image-14205" src="/assets/gitHube-build-history-details-1024x193.jpg" alt="gitHub build history details" width="940" height="177" data-id="14205" srcset="/assets/gitHube-build-history-details-1024x193.jpg 1024w, /assets/gitHube-build-history-details-300x57.jpg 300w, /assets/gitHube-build-history-details-768x145.jpg 768w, /assets/gitHube-build-history-details.jpg 1494w" sizes="(max-width: 940px) 100vw, 940px" /></a>

Another great thing about using Git to store your artifacts is that you can easily clone the artifacts to your local machine to see the exact files that are being used in a specific environment.

The artifacts repository has branches to match the branches of our code repo so we have separate build artifacts for each branch. This also means that we can just merge the feature into master when we are done and that will cause the production website that is pointed to our master repository to automatically get updated. So, it’s as simple as merge your branch to master to promote a build to production.

<a href="/assets/merge-branch-master-promote-build-production.jpg" rel="attachment wp-att-14206"><img loading="lazy" class="aligncenter size-full wp-image-14206" src="/assets/merge-branch-master-promote-build-production.jpg" alt="merge-branch-master promote build production" width="624" height="430" data-id="14206" srcset="/assets/merge-branch-master-promote-build-production.jpg 624w, /assets/merge-branch-master-promote-build-production-300x207.jpg 300w" sizes="(max-width: 624px) 100vw, 624px" /></a>

**One issue** with this approach is that the repo can get large because we are storing binary files that change on every build. We are looking into using [Git Large File Support](https://git-lfs.github.com/) to fix this issue.

### 3. Automate pushing of artifacts to a secondary GitHub repository.

For our .NET application, <a href="https://github.com/exceptionless/Exceptionless" target="_blank">Exceptionless</a>, we invoke a <a href="https://github.com/exceptionless/Exceptionless/blob/master/appveyor.yml#L46-L47" target="_blank">PowerShell script</a> on post build to clone and commit the changes to the <a href="https://github.com/exceptionless/Exceptionless/blob/master/Libraries/Push-Artifacts.ps1" target="_blank">Git artifacts repository</a>.

  1. Our first step is to <a href="https://github.com/exceptionless/Exceptionless/blob/master/Libraries/Push-Artifacts.ps1#L10-L11" target="_blank">clone the existing build artifacts repo to an artifacts directory</a>.
  2. Next, we <a href="https://github.com/exceptionless/Exceptionless/blob/master/Libraries/Push-Artifacts.ps1#L20-L28" target="_blank">change to the same branch that we are currently building, if it doesn’t exist we create it</a>.
  3. Then, we <a href="https://github.com/exceptionless/Exceptionless/blob/master/Libraries/Push-Artifacts.ps1#L35-L36" target="_blank">remove all existing files in the artifacts folder</a>. This ensures we don’t have any conflicts and we can see exactly what was added or removed.
  4. Next, we <a href="https://github.com/exceptionless/Exceptionless/blob/master/Libraries/Push-Artifacts.ps1#L38-L60" target="_blank">copy our build artifacts into the artifacts folder</a>. This allows us fine grained control over our artifacts.
  5. Next, we <a href="https://github.com/exceptionless/Exceptionless/blob/master/Libraries/Push-Artifacts.ps1#L62-L67" target="_blank">try to commit all artifacts to the artifacts repository</a>. If there were no changes between the last build, then we exit.
  6. Next, we <a href="https://github.com/exceptionless/Exceptionless/blob/master/Libraries/Push-Artifacts.ps1#L69-L78" target="_blank">push the artifacts to our GitHub artifacts repository</a>, which will then trigger Azure Continuous Deployment to pick up the changes.
  7. Finally, we <a href="https://github.com/exceptionless/Exceptionless/blob/master/Libraries/Push-Artifacts.ps1#L80-L87" target="_blank">create tag the artifacts repository</a> which points to the specific GitHub commit we are building in our main repository.

**For our static <a href="https://github.com/exceptionless/Exceptionless.UI" target="_blank">Angular JavaScript app (UI)</a>,** we invoke a <a href="https://github.com/exceptionless/Exceptionless.UI/blob/master/src/Gruntfile.js#L51" target="_blank">Grunt publish task</a> from our <a href="https://github.com/exceptionless/Exceptionless.UI/blob/master/appveyor.yml#L20" target="_blank">post build event</a>. The publish task called into a <a href="https://github.com/tschaub/grunt-gh-pages" target="_blank">gh-pages</a> <a href="https://github.com/exceptionless/Exceptionless.UI/blob/master/src/grunt/task-configs/gh-pages.js" target="_blank">task</a> that publishes our built dist folder to the GitHub artifacts repository automatically.

### 4. Point Azure Continuous Deployment to the Artifacts Repository

It will see when new artifact commits happen and automatically deploy the changes.

<a href="/assets/azure-sees-new-artifact-commit-and-deploys.jpg" rel="attachment wp-att-14207"><img loading="lazy" class="aligncenter size-large wp-image-14207" src="/assets/azure-sees-new-artifact-commit-and-deploys-1024x846.jpg" alt="azure sees new artifact commit and deploys" width="940" height="777" data-id="14207" srcset="/assets/azure-sees-new-artifact-commit-and-deploys-1024x846.jpg 1024w, /assets/azure-sees-new-artifact-commit-and-deploys-300x248.jpg 300w, /assets/azure-sees-new-artifact-commit-and-deploys-768x635.jpg 768w, /assets/azure-sees-new-artifact-commit-and-deploys.jpg 1118w" sizes="(max-width: 940px) 100vw, 940px" /></a>

Azure Continuous Deployment is another Git repository that we can easily view to see the history of deployments to each of our sites. It also allows us to easily roll back to previous versions.

### 5. Use Environment Variables to Override Config Settings Per Environment

Azure Websites makes this very easy.

<a href="/assets/override-config-settings-environment-variables.jpg" rel="attachment wp-att-14208"><img loading="lazy" class="aligncenter size-large wp-image-14208" src="/assets/override-config-settings-environment-variables-1024x497.jpg" alt="azure override config settings environment variables" width="940" height="456" data-id="14208" srcset="/assets/override-config-settings-environment-variables-1024x497.jpg 1024w, /assets/override-config-settings-environment-variables-300x146.jpg 300w, /assets/override-config-settings-environment-variables-768x373.jpg 768w, /assets/override-config-settings-environment-variables.jpg 1128w" sizes="(max-width: 940px) 100vw, 940px" /></a>

No production settings are stored in source control or artifacts repository.

For our ASP.NET application, our <a href="https://github.com/exceptionless/Exceptionless/blob/master/Source/Core/Settings.cs" target="_blank">settings class</a> will look up named settings in the following order:

  1. environment variables
  2. local config.json file
  3. app settings

It will then fall back to a <a href="https://github.com/exceptionless/Exceptionless/blob/master/Source/Core/Utility/SettingsBase.cs#L59" target="_blank">default value</a> if no explicit settings are found.

**Configuring our static Angular JavaScript app** is a bit more work since it can't look these settings up dynamically at runtime. So instead we add some code to our deployment process.

* Azure automatically runs a <a href="https://github.com/exceptionless/Exceptionless.UI/blob/master/deploy.sh" target="_blank">deploy.sh</a> file after getting the artifacts via git deploy. It’s sole job is to run a <a href="https://github.com/exceptionless/Exceptionless.UI/blob/master/src/app_data/jobs/triggered/config/run.js" target="_blank">node script</a> that rewrites our <a href="https://github.com/exceptionless/Exceptionless.UI/blob/master/src/app.config.js" target="_blank">app.config.js</a> settings with settings defined in environment variables.

## Conclusion

You can create multiple Azure websites (think environments) that use Continuous Deployment and point them to multiple artifact branches to support different environments!

**Pro Tip:** We created a <http://local-app.exceptionless.io> website for our spa website that’s pre-built and points to your localhost Exceptionless server. This allows us to do work on the server part without setting up or configuring a local instance of our spa app. Development made simple!

We won't lie, it took some work to get here, but **the good news is you can do this really easily too**. Please feel free to steal our deployment scripts and modify them for your projects. And let us know if you have questions along the way!
