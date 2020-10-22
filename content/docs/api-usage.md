---
title: API Usage
order: 4
---
Our API utilizes Swagger and Swashbuckle to automatically generate, update, and display documentation (which means it works automatically on self-hosted environments), is a great resource for our users that want to get their hands dirty and use Exceptionless data to roll their own tools, dashboards, etc.

- [Accessing the API](#accessing-the-api)
- [Get Your User Scoped Token](#get-your-user-scoped-token)
- [Get a New Token](#get-a-new-token)
- [Posting an Event](#posting-an-event)
- [Get Event by Reference ID](#get-event-by-reference-id)
- [Get Event via Search Filter](#get-event-via-search-filter)
- [Get Organizations](#get-organizations)
- [Get Projects](#get-projects)
- [Bearer Authentication](#bearer-authentication)
- [Authenticate via Query String](#authenticate-via-query-string)

## Accessing the API

To access the Exceptionless API, visit <https://api.exceptionless.io> and click on the `API Documentation` link to be taken to the API documentation.

## Get Your User Scoped Token

Go to Auth controller login action and enter your login credentials.

Click `Try it out` and enter JSON into the model field, or click the yellow box on the right to pre-populate the field with acceptable JSON fields. Just replace the values you want to specify and remove the fields you don’t need, like invite token.

![Get User Scope Token](img/01get-user-scope-token1.png)

Click `Execute` to generate your token. Take note of the response messages section above the button, as it details the possible codes that would be returned in the event of an error (e.g. 401 if the user name or email address was incorrect).

![Get User Scope Token 2](img/01get-user-scope-token2.png)

Click the `Authorize` button at the top of the site. Then enter your newly generated token and put it in the `access_token` field at the top of the page and click `Authorize` and close the modal. This authorizes you via bearer authentication, authenticates you to the rest api, and allows you to call controller actions.

![Add Token](img/02add-token-refresh-page.png)

## Get a New Token

Now you have to get a new token for the project you want to work on and assign it a user role (scope) of “user.” We do this because we want to do more than just post events (client scoped tokens only allow you to post events), we want to retrieve them. Creating a new token also allows us to revoke the token later.

1 - Get your project ID from the Exceptionless Dashboard. It can be found in the URL of that project’s dashboard.

![Get Project](img/03get-project-ID.png)

2 - Navigate to `Tokens` > `POST /api/v2/projects/{projectId}/tokens`. Click `Try it out` and enter the Project ID, and set up token to include the user scope and a quick note.

![Get New Token](img/04get-new-token1.png)

3 - Click `Execute` and generate our new token id.

![Get New Token 2](img/04get-new-token2.png)

4 - Copy this new token and click the `Authorize` button at the top of the site. Then enter your newly generated token and put it in the `access_token` field at the top of the page and click `Authorize` and close the modal. This authorizes you via bearer authentication, authenticates you to the rest api, and allows you to call controller actions.

## Posting an Event

As an example, lets post an event with a reference ID that we’ll use for a few other examples.

1 - First, navigate to `Event` > `POST /api/v{version}/events`

![Post Event](img/05post-event1.png)

You’ll see a few basic examples of events and some explanation of the resource in this panel. Make sure to give it a read. For this example, we’ll use a simple log event, with a brief message, and add a reference ID to it. _Note that you must also enter the current API version in the “version” field._

2 - Click “Try it out!” If you get a 202 response code, you’ve created an event.

![Post Event](img/06-post-event1half.png)
![Post Event 2](img/05post-event2-e1430946143322.png)

Please note that you'll need to ensure you post all events to [https://collector.exceptionless.io](https://collector.exceptionless.io) as posting events to [https://api.exceptionless.io](https://api.exceptionless.io) may be disabled at a future date.

## Get Event by Reference ID

If we want to get the event we just created by it’s reference_id, we can navigate to `Event` > `GET /api/v2/events/by-ref/{referenceId}`, enter that reference ID, and get back the details of the event.

![Get By Reference ID](img/06-get-by-reference-ID2.png)

## Get Event via Search Filter

Another example of getting an event may include using the reference ID or another search filter we just created and getting all by a reference filter. You can use any search filter in the filter parameter.

To do so, navigate to `Event` > `GET /api/v2/events` and use the reference term to filter events by the reference ID.

![Get By Filter](img/07-get-all-filter-reference.png)

![Get By Filter 2](img/07-get-all-filter-reference2.png)

## Get Organizations

Naturally, we can get all the organizations or projects associated with the current authorized token, as well.

Navigate to `Organization` > `GET /api/v2/organizations` and click `Try it out`

![Get Organizations](img/08get-organizations1.png)
![Get Organizations 2](img/08get-organizations2.png)

## Get Projects

Navigate to `Project` > `GET /api/v2/projects` and click `Try it out`

![Get Projects](img/09get-projects1.png)
![Get Projects 2](img/09get-projects2.png)

## Bearer Authentication

The api documentation uses bearer authentication to authenticate to the API. You can do this in your apps too by specifying a bearer authorization header with your token as shown below.

![Bearer Auth](img/10-bearer-auth-key.png)

## Authenticate via Query String

Everything we’ve shown you today can be easily and cleanly accessed via a URL query string and your access token.

For example, if we want to view our organizations, we simply navigate to <https://api.exceptionless.io/api/v2/organizations>, add the query string `?access_token={token}` and press enter to get the data.

![Auth by Query String](img/11-url-query-string-version.png)