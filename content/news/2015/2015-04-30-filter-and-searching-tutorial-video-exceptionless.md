---
id: 13046
title: Filter and Searching Tutorial Video &#8211; Exceptionless
date: 2015-04-30
---
<img loading="lazy" class="alignright wp-image-13067 size-full" style="margin-left: 20px;" src="/assets/filter-search.png" alt="Exceptionless Search Filtering" width="260" height="260" data-id="13054" srcset="/assets/filter-search.png 260w, /assets/filter-search-150x150.png 150w" sizes="(max-width: 260px) 100vw, 260px" />One of the most requested features from the beginning of Exceptionless 1.0 was a filtering and searching system. When we started developing Exceptionless 2.0, we knew it was one of the major features we wanted to include.

We couldn't just throw in a string search and hope for the best. We had to build it in a way that let users perform basic and advanced filtering, easily, with fast and streamlined results.

**Enter Exceptionless filtering and searching.** You can filter by organization, project, multiple time frame selectors, and specific event variables (with modifiers).

Watch the video below for a quick test drive, and read further down the page for more details and links!<!--more-->

## Exceptionless Filtering and Search Demo Video


## Filter by Organization & Project

[<img loading="lazy" class="alignright size-medium wp-image-13047" style="margin-left: 20px;" src="/assets/filter-by-project-organization-300x208.png" alt="Exceptionless Organizations and Projects" width="300" height="208" data-id="13047" srcset="/assets/filter-by-project-organization-300x208.png 300w, /assets/filter-by-project-organization.png 593w" sizes="(max-width: 300px) 100vw, 300px" />](/_site/assets/filter-by-project-organization.png)By default, the dashboard loads up with all projects selected.

To show only data from a specific organization or project within an organization, simply click on the &#8220;All Projects&#8221; drop down in the top left of the dashboard and select your organization or project.

Whatever view you are in will then be transformed to display only data from that organization/project.

To change it back to all projects, simply select the drop down again and click on &#8220;All Projects.&#8221;

## Filter by Time Frame

[<img loading="lazy" class="alignright size-medium wp-image-13048" style="margin-left: 20px;" src="/assets/filter-by-timeframe-300x205.png" alt="Exceptionles Time Frame Filters" width="300" height="205" data-id="13048" srcset="/assets/filter-by-timeframe-300x205.png 300w, /assets/filter-by-timeframe.png 675w" sizes="(max-width: 300px) 100vw, 300px" />](/_site/assets/filter-by-timeframe.png)Exceptionless offers multiple preset time frame options, as well as the ability to customize the time frame down to the second.

To select your time frame of choice, click on the calendar icon next to the project drop down on the top navigation bar of your dashboard.

Once there, you can select &#8220;Last Hour,&#8221; &#8220;Last 24 Hours,&#8221; &#8220;Last Week,&#8221; &#8220;Last 30 Days,&#8221; &#8220;All Time,&#8221; or &#8220;Custom.&#8221;

Most of these options are pretty self explanatory, but if you click on &#8220;Custom,&#8221; a popup will appear that lets you select the start and end date, as well as start and end hours, minutes, and seconds of those dates.

Another way to control the data time frame is to simply select a period of time on the history graph itself by clicking, dragging, and releasing. This will automatically update the custom time frame points and refresh the data to match that period.

## Filter and Search by Specific Criteria

[<img loading="lazy" class="alignright wp-image-13063 size-medium" style="margin-left: 20px;" src="/assets/filter-by-search-filter-criteria-300x203.png" alt="Exceptionless Search Filter Feature" width="300" height="203" data-id="13049" srcset="/assets/filter-by-search-filter-criteria-300x203.png 300w, /assets/filter-by-search-filter-criteria.png 774w" sizes="(max-width: 300px) 100vw, 300px" />](/_site/assets/filter-by-search-filter-criteria.png)Being able to search your errors and events by specific criteria is, perhaps, the largest improvement for version 2.0.

By selecting the magnifying glass icon next to the calendar icon in the top navigation, you can enter <a title="Exceptionless Search Filter Documentation" href="http://docs.exceptionless.com/contents/search/" target="_blank">search criteria</a> and select whether you want the results to include fixed and/or hidden events/errors.

You can filter by tag, ID, organization, project, stack, type, value, IP, architecture, user, and much much more. Some searches, such as ID, require a prefix (&#8220;id:&#8221;) on the search, but others, such as error.message, can be entered as strings (&#8220;A NullReferenceException occurred&#8221;). View a complete list of searchable terms, examples, and FAQs on our <a title="Exceptionless Search Documentation" href="http://docs.exceptionless.com/contents/search/" target="_blank">Searching Documentation Page</a>.

## We're Always Improving &#8211; What Could be Better?

Please let us know what you think of the filtering and searching abilities by commenting here on the blog, sending us an in-app support message, or filling out our [contact form](/contact/ "Exceptionless Contact Form"). We're always looking for feedback, and genuinely want to know what you think!
