---
id: 3035
title: Exceptionless 1.3 Released
date: 2014-02-13
tags: [ "new release"]
---
Exceptionless 1.3 brings with it both server and client changes, including [open sourcing the project](/fork-us-exceptionless-goes-open-source/ "Exceptionless Goes Open Source!") (which we're super excited about!), some minor updates, and a few bug fixes. Check out the changelog items below, and let us know if you have any questions.<!--more-->

## Server

<div>
  <ul>
    <li>
      Open sourced the server under the <a href="http://www.gnu.org/licenses/agpl-3.0.html" target="_blank">GNU Affero General Public License, Version 3.0</a>!
    </li>
    <li>
      Extended data key names are now shown with friendly formatted name.
    </li>
    <li>
      Summary notification emails that were not sent out and are older than two days will be ignored by the email job. This will help prevent users from being spammed in some circumstances.
    </li>
    <li>
      Fixed a major application start up performance bug that had to do with dependency injection.
    </li>
    <li>
      Fixed a bug that was causing the key-up event to be cancelled on every page that had a chart. This affected modals from working properly in some scenarios.
    </li>
    <li>
      The following improvements were made specifically to make local development and internal deployments easier. <ul>
        <li>
          Added the ability to add or remove a user from the admin role.
        </li>
        <li>
          When you are running exceptionless in development mode and you are the first user to signup for an account; a new sample project with a sample api key will be created.
        </li>
        <li>
          When billing is not configured, all new organizations will be placed in an unlimited plan.
        </li>
      </ul>
    </li>
  </ul>
</div>

## Client

<div>
  <ul>
    <li>
      Open sourced the client under the <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache License, Version 2.0</a>!
    </li>
    <li>
      Symbols are now available on <a href="http://www.symbolsource.org/" target="_blank">http://www.symbolsource.org/</a>. Documentation on configuring visual studio can be found <a href="http://www.symbolsource.org/Public/Home/VisualStudio" target="_blank">here</a>.
    </li>
    <li>
      Adding binding redirects to the right version.
    </li>
    <li>
      Data Exclusions now <a href="/docs/security/" target="_blank">support wildcards</a>.
    </li>
  </ul>
</div>
