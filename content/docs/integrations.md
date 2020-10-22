---
title: Integrations
order: 12
---
1. Go to Admin - Projects - Edit - Integrations - Add Web Hook
2. Enter a URL for your integration and an event for which it should fire.
3. When selected event types happen, a POST request will be submitted with either an event data or a stack data (depending on selected event types) in json format.

[Here's a sample of the data](https://github.com/exceptionless/Exceptionless/tree/master/tests/Exceptionless.Tests/Plugins/WebHookData) that will be posted.

Below is a sample MVC Controller implementation of how you could consume this data. Your implementation will obviously vary based on your development stack.

    [HttpPost]
    public void Integration()
    {
        Stream request = Request.InputStream;
        request.Seek(0, System.IO.SeekOrigin.Begin);
        string json = new StreamReader(request).ReadToEnd(); 
    }
    
