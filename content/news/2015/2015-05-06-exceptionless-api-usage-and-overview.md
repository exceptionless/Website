---
id: 13087
title: Exceptionless API Usage and Overview
date: 2015-05-06
---
[![Exceptionless API](/assets/img/news/Screenshot-2015-05-06-16.26.42-300x220.png)](/assets/Screenshot-2015-05-06-16.26.42.png)So you've been using Exceptionless for a while, but you wish you had a different dashboard, or maybe you'd like to integrate event data into one of your apps. No problem, **just use the API!**

Through our adventures while building Exceptionless, we've kept open source, automation, and ease of use in mind. With that, we think our API, which utilizes <a title="Swagger API Framework" href="http://swagger.io/" target="_blank">Swagger</a> and <a title="Swashbuckle" href="https://github.com/domaindrivendev/Swashbuckle" target="_blank">Swashbuckle</a> to automatically generate, update, and display documentation (which means it works automatically on self-hosted environments), is a great resource for our users that want to get their hands dirty and use Exceptionless data to roll their own tools, dashboards, etc.

Lets take a closer look at the API, how to use it, and some quick examples of what can be done.<!--more-->

## Start Using the Exceptionless API

### Accessing the API

To access the Exceptionless API, visit <a title="Exceptionless API" href="https://api.exceptionless.io" target="_blank">https://api.exceptionless.io</a> and click on the "API Documentation" link to be taken to the API documentation.

### Get Your User Scoped Token

Tokens are used to access the api and have roles (scopes). When you authenticate via the login controller action, you are getting a token that impersonates your user so it has the same roles as your user account (e.g., client and user).

#### <span style="text-decoration: underline;"><a title="Exceptionless API Auth" href="https://api.exceptionless.io/docs/index#!/Auth/Auth_Login" target="_blank">Go to Auth controller action</a></span> and enter your login credentials.

You can enter JSON into the model field, or you an click the yellow box on the right to pre-populate the field with acceptable JSON fields. Just replace the values that you want to specify and remove the fields you don't need, like invite token.<figure id="attachment_13097" class="thumbnail wp-caption aligncenter" style="width: 300px">

[![Exceptionless API Get User Scoped Token](/assets/img/news/01get-user-scope-token1-300x218.png)](/assets/01get-user-scope-token1.png)<figcaption class="caption wp-caption-text">Enter account credentials to get user scoped token.</figcaption></figure>

Click “Try it out!” and generate your token. Take note of the response messages section above the button, as it details the possible codes that would be returned in the event of an error (e.g. 401 if the user name or email address was incorrect).<figure id="attachment_13101" class="thumbnail wp-caption aligncenter" style="width: 300px">

[![Retrieve Exceptionless User Scoped Token](/assets/img/news/01get-user-scope-token2-300x105.png)](/assets/01get-user-scope-token2.png)<figcaption class="caption wp-caption-text">Copy your user scoped token that you just generated.</figcaption></figure>

You can see from the response that it returned our token from the request url above. Take your generated token and put it in the “api_key” field at the top of the page and click “Explore.” This authorizes you via bearer authentication, authenticates you to the rest api, and allows you to call controller actions.<figure id="attachment_13102" class="thumbnail wp-caption aligncenter" style="width: 300px">

[![Add Exceptionless User Scoped Token ](/assets/img/news/02add-token-refresh-page-300x50.png)](/assets/02add-token-refresh-page.png)<figcaption class="caption wp-caption-text">Add your token in the api_key field at top of page and click "Explore"</figcaption></figure>

### Get a New Token

Now, we’ll get a new token for the project we want to work on and assign it a user role (scope) of “user.” We want to get a new user scoped token because we want to do more than just post events (client scoped tokens only allow you to post events), we want to retrieve them. Creating a new token also allows us to revoke the token later.

First, get your project ID from the Exceptionless Dashboard. It can be found in the URL of that project’s dashboard.<figure id="attachment_13104" class="thumbnail wp-caption aligncenter" style="width: 300px">

[![Get Exceptionless Project ID](/assets/img/news/03get-project-ID-300x141.png)](/assets/03get-project-ID.png)<figcaption class="caption wp-caption-text">Get Project ID</figcaption></figure>

Now, we’ll navigate to <a title="Exceptionless Create Token" href="https://api.exceptionless.io/docs/index#!/Token/Token_PostByProject" target="_blank">Tokens > POST /api/v2/projects/{projectId}/tokens</a>, enter our Project ID, and set up our token to include the user scope and a quick note.<figure id="attachment_13105" class="thumbnail wp-caption aligncenter" style="width: 300px">

[![Create Exceptionless Token](/assets/img/news/04get-new-token1-300x220.png)](/assets/04get-new-token1.png)<figcaption class="caption wp-caption-text">Enter project ID and create a new token with scope "user."</figcaption></figure>

Next, we'll click "Try it out!" and generate our new token id.<figure id="attachment_13106" class="thumbnail wp-caption aligncenter" style="width: 300px">

[![Get new Exceptionless Token ID](/assets/img/news/04get-new-token2-300x146.png)](/assets/04get-new-token2.png)<figcaption class="caption wp-caption-text">Copy your new token id and paste it into the api_key field at the top of the page and click "Explore" again.</figcaption></figure>

Now, once again, copy this new token and place it in the “api_key” field at the top of the page and click “Explore.” Now everything we do will be authenticated to this new user token you’ve just created.

### Posting an Event

Now, lets post an event with a reference ID that we’ll use for a few other examples.

First, navigate to <a title="Exceptionless API Post Event" href="https://api.exceptionless.io/docs/index#!/Event/Event_PostAsync" target="_blank">Event > POST /api/v{version}/events</a><figure id="attachment_13108" class="thumbnail wp-caption aligncenter" style="width: 300px">

[![Exceptionless API Post Event](/assets/img/news/05post-event1-300x204.png)](/assets/05post-event1.png)<figcaption class="caption wp-caption-text">Navigate to Event > POST /api/v{version}/events</figcaption></figure>

You’ll see a few basic examples of events and some explanation of the resource in this panel. Make sure to give it a read. For this example, we’ll use a simple log event, with a brief message, and add a reference ID to it. _Note that you must also enter the current API version in the “version” field._

When we click “Try it out!” and get a 202 response code, we know we’ve created an event.<figure id="attachment_13110" class="thumbnail wp-caption aligncenter" style="width: 300px">

[![Exceptionless API Created Event](/assets/05post-event2-e1430946143322-300x92.png)](/assets/05post-event2-e1430946143322.png)<figcaption class="caption wp-caption-text">Successful Event Creation</figcaption></figure>

### Get Event by Reference ID

If we want to get the event we just created by it’s reference_id, we can navigate to <a title="Get Exceptionless Event by ID" href="https://api.exceptionless.io/docs/index#!/Event/Event_GetByReferenceId" target="_blank">Event > GET /api/v2/events/by-ref/{referenceId}</a>, enter that reference ID, and get back the details of the event.<figure id="attachment_13115" class="thumbnail wp-caption aligncenter" style="width: 300px">

[![Get Exceptionless Event by ReferenceID](/assets/img/news/06-get-by-reference-ID2-300x271.png)](/assets/06-get-by-reference-ID2.png)<figcaption class="caption wp-caption-text">Navigate to Event > GET /api/v2/events/by-ref/{referenceId} and enter reference ID</figcaption></figure>

### Getting the Event via a Search Filter

Another example of getting an event may include using the reference ID or another search filter we just created and getting all by a reference filter. You can use any <a title="Exceptionless Search Filter Documentation" href="http://docs.exceptionless.com/contents/search/" target="_blank">search filter</a> in the filter parameter.

To do so, navigate to <a title="Exceptionless API Get All" href="https://api.exceptionless.io/docs/index#!/Event/Event_Get" target="_blank">Event > GET /api/v2/events</a> and use the reference term to filter events by the reference ID.<figure id="attachment_13116" class="thumbnail wp-caption aligncenter" style="width: 300px">

[![Exceptionless API Get All Filter Search](/assets/img/news/07-get-all-filter-reference-300x168.png)](/assets/07-get-all-filter-reference.png)<figcaption class="caption wp-caption-text">Navigate to Event > GET /api/v2/events and user the filter field to search for the reference ID</figcaption></figure>

Results<figure id="attachment_13117" class="thumbnail wp-caption aligncenter" style="width: 300px">

[![Exceptionless API Get Al Filter Search Results](/assets/img/news/07-get-all-filter-reference2-300x183.png)](/assets/07-get-all-filter-reference2.png)<figcaption class="caption wp-caption-text">Get All results</figcaption></figure>

### Get Organizations and Projects

Naturally, we can get all the organizations or projects associated with the current authorized token, as well.

#### Organizations

Navigate to <a title="Exceptionless API Get Organizations" href="https://api.exceptionless.io/docs/index#!/Organization/Organization_Get" target="_blank">Organization > GET /api/v2/organizations</a> and click “Try it out!”<figure id="attachment_13118" class="thumbnail wp-caption alignleft" style="width: 300px">

[![Exceptionless API Get Organization Results](/assets/08get-organizations2-300x202.png)](/assets/08get-organizations2.png)<figcaption class="caption wp-caption-text">Get Organizations Results</figcaption></figure>

<h4 style="clear: both;">
  Projects
</h4>

Navigate to <a title="Exceptionless API Get Projects" href="https://api.exceptionless.io/docs/index#!/Project/Project_Get" target="_blank">Project > GET /api/v2/projects</a> and click “Try it out!”<figure id="attachment_13121" class="thumbnail wp-caption alignleft" style="width: 300px">

[![Exceptionless API Get Projects Results](/assets/09get-projects2-300x204.png)](/assets/09get-projects2.png)<figcaption class="caption wp-caption-text">Get Projects Results</figcaption></figure>

<h2 style="clear: both;">
  How to Authenticate to the API
</h2>

### 1. Bearer Authentication

The api documentation uses bearer authentication to authenticate to the API. You can do this in your apps too by specifying a bearer authorization header with your token as shown below.<figure id="attachment_13125" class="thumbnail wp-caption aligncenter" style="width: 300px">

[![Exceptionless Bearer Authentication](/assets/img/news/10-bearer-auth-key-300x164.png)](/assets/10-bearer-auth-key.png)<figcaption class="caption wp-caption-text">Bearer Authentication Example</figcaption></figure>

### 2. Authenticate via the Query String

Everything we’ve shown you today can be easily and cleanly accessed via a URL query string and your access token.

For example, if we want to view our organizations, we simply navigate to https://api.exceptionless.io/api/v2/organizations, add the query string “?access_token={token}” and press enter to get the data.<figure id="attachment_13126" class="thumbnail wp-caption aligncenter" style="width: 300px">

[![Exceptionless Query String API Authentication](/assets/img/news/11-url-query-string-version-300x145.png)](/assets/11-url-query-string-version.png)<figcaption class="caption wp-caption-text">Query String API Authentication</figcaption></figure>

## Let Us Know What You Think!

We've tried to make the API as easy and intuitive to use as possible, but we're always open to feedback and comments, so please let us know what could be better, easier, faster, etc.

And, of course, if you have any questions about the API, please leave a comment here, send us an in-app support message, or simply submit the website [contact form](/contact/ "Contact Exceptionless").
