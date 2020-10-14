---
id: 3146
title: Installing Exceptionless from GitHub
date: 2014-02-25
tags: [ "community", "open source"]
---
Since we officially announced that Exceptionless was going open source last week, we wanted to provide everyone with a quick and easy video walkthrough of how to get up and running locally.

It's really quick, as you can see from the below video. Below the video is also a textual walkthrough. Please take a look and let us know if you have any questions.<!--more-->

Please note that before contributing to the Exceptionless project, you must read and sign the Exceptionless <a href="http://www.clahub.com/agreements/exceptionless/Exceptionless" title="Exceptionless Certified License Agreement" target="_blank">Contribution License Agreement</a>. Pull requests will not be accepted otherwise.

## GitHub Exceptionless Getting Started Video

<div class="videoWrapper">
</div>

## Text Guide

  1. Log in to github
  2. Install the <a href="https://windows.github.com/" title="GitHub Windows Client" target="_blank">GitHub Windows client</a>, if you want to use the GUI. If not, you can do the rest of the steps from command line.
  3. Fork the <a href="https://github.com/exceptionless/Exceptionless" title="Exceptionless on GitHub" target="_blank">Exceptionless repository</a>
  4. Clone the repo to your machine (Clone to Desktop)
  5. Open your local repository you just cloned
  6. Follow the "<a href="https://github.com/exceptionless/Exceptionless#getting-started" title="Exceptionless GitHub Getting Started" target="_blank">Getting Started</a>" section of github readme
* Start StartBackendServers.bat file to start redis and mongodb
* Open the Exceptionles solution in Visual Studio
* Right click solution and select select "set startup projects"
* Click on "Multiple startup projects"
    * Locate Exceptionless.app and Exceptionless.SampleConsole and change them to "Start"
    * Rebuild the solution to pull down the NuGet packages
    * Start Debugging
    * A console app and Internet explorer instance will start
    * Go to the browser and create a (sample) account. This will create a sample organization and project.
    * You will be redirected to the dashboard for the new project
    * Go back to the console app and hit 1. A new error will be generated and your Exceptionless dashboard should reflect the error in real-time.</ul>
    * Now, after you make any changes or updates, you will want to do a pull request.
    * To do so, commit working, tested changes to the project.
    * Then, sync the changes
    * Go back to github and click on the green compare, review, or create a pull request icon.
    * Review the updates and make sure the pull request includes the proper changes.
    * Click "Create a Pull Request"
    * Add any comments relevant to the pull request. Details are great!
    * Click "Send Pull Request"
    * The Exceptionless Team will review the request and merge it into the project, provide feedback, etc.</ol>
    Please let us know if you have any questions. Happy coding!
