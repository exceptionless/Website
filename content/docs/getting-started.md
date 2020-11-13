---
title: Getting Started
order: 1
---
Exceptionless provides you the tools to track errors, logs, and events while guiding you toward actionable solutions. To get started, you'll want to decide if you are self-hosting Exceptionless or using our hosted version. If you choose to use our hosted version, you can get started for free. 

## Hosted Option

1. [Create an account](https://be.exceptionless.io/signup)
2. When you signup, you will be prompted to create your first project.
3. [Configure your application](https://be.exceptionless.io/project/list) by clicking the Download & Configure Client action button on the project list page.
4. Select your project type and follow the instructions.
5. Your application will now automatically send all unhandled errors to the Exceptionless service.
6. You can also send handled errors, feature usage or log messages along with additional information ([see documentation for your specific client](clients/index.md)).

## Self-Hosted Option 

We have put together comprehensive documentation to help you get started with a self-hosted Exceptionless instance. You can [find that documentation here](self-hosting). 

## Quick Start  

Let's get you up and running. Once you've [signed up](https://be.exceptionless.io/signup) and [created a project](https://be.exceptionless.io/project/list), you can start receiving events. 

**Get Your Token**  

1. Get Your User Token

POST `POST /api/v2/auth/login`  

```
curl --location --request POST 'https://api.exceptionless.com/api/v2/auth/login' \
--header 'Content-Type: application/json' \
--data-raw '{
    "email": YOUR_EMAIL,
    "password": PASSWORD
}'
```

2. Get Your Project List 

GET `api/v2/projects`  

```
curl --location --request GET 'https://api.exceptionless.com/api/v2/projects' \
--header 'Authorization: Bearer YOUR_USER_SCOPED_TOKEN'
``` 

3. Create a Project Token 

POST `api/v2/projects/PROJECT_ID`  

```
curl --location --request POST 'https://api.exceptionless.com/api/v2/projects/YOUR_PROJECT_ID/tokens' \
--header 'Authorization: Bearer YOUR_USER_SCOPED_TOKEN' \
--header 'Content-Type: application/json' \
--data-raw '{
    "scopes": [
        "user"
    ]
}'
```

**Send a Message**  

POST `api/v2/events`  

```
curl --location --request POST 'https://api.exceptionless.com/api/v2/events' \
--header 'Authorization: Bearer YOUR_PROJECT_TOKEN' \
--header 'Content-Type: application/json' \
--data-raw '{ "message": "Exceptionless is amazing!" }'
```  

**Send a Log**  

POST `api/v2/events`  

```
curl --location --request POST 'https://api.exceptionless.com/api/v2/events' \
--header 'Authorization: Bearer YOUR_PROJECT_TOKEN' \
--header 'Content-Type: application/json' \
--data-raw '{ "type": "log", "message": "Exceptionless is amazing!", "date":"2030-01-01T12:00:00.0000000-05:00", "@user":{ "identity":"123456789", "name": "Test User" } }'
```

**Send an Error**  

POST `api/v2/events`  

```
curl --location --request POST 'https://api.exceptionless.com/api/v2/events' \
--header 'Authorization: Bearer YOUR_PROJECT_TOKEN' \
--header 'Content-Type: application/json' \
--data-raw '{ "type": "error", "date":"2030-01-01T12:00:00.0000000-05:00", "@simple_error": { "message": "Simple Exception", "type": "System.Exception", "stack_trace": " at Client.Tests.ExceptionlessClientTests.CanSubmitSimpleException() in ExceptionlessClientTests.cs:line 77" } }'
```

---

That's it! You're ready to go now. To dig further into the API, [check out our docs here](api). Or, if you'd prefer to use one of our clients, you can [get started with those here](clients). 

---

[Next > Project Settings](project-settings) {.text-right}
