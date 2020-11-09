---
title: JavaScript Example
order: 6
---
We have put together an example for the JavaScript client that you can use to get an idea of how everything works. It is [available on the GitHub Repo](https://github.com/exceptionless/Exceptionless.JavaScript/tree/master/example). You can clone the repository and run the code as is or you can use the below example as a starting point. 

Here's the full code with script tags in an `html` file: 

``` html
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <title>Exceptionless Test</title>
</head>
  <body>
    <button onclick='throwError()'>Throw Exception</button>
    <button onclick='logEvent()'>Log Event</button>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/exceptionless@1.6.3/dist/exceptionless.min.js"></script>
    <script type="text/javascript" src="math.js"></script>
    <script type="text/javascript" src="index.js"></script>
    <script type="text/javascript">
      var client = exceptionless.ExceptionlessClient.default;
      client.config.useDebugLogger();
      client.config.useLocalStorage();
      // client.config.serverUrl = 'http://localhost:50000'; // For self-hosted solutions
      client.config.updateSettingsWhenIdleInterval = 15000;
      client.config.setUserIdentity('12345678', 'Blake');
      client.config.useSessions();

      // set some default data
      client.config.defaultData['SampleUser'] = {
        id:1,
        name: 'Blake',
        password: '123456',
        passwordResetToken: 'a reset token',
        myPasswordValue: '123456',
        myPassword: '123456',
        customValue: 'Password',
        value: {
          Password: '123456'
        }
      };

      client.config.defaultTags.push('Example', 'JavaScript');

      function throwError() {
        try {
          throw new Error("This is broken")
        } catch(e) {
          client.submitException(e);
        }
      }

      function logEvent() {
        client.submitLog('Logging made easy');
      }
    </script> 
  </body>
</html>
```

---  

[Next > ExpressJS Example](express-example) {.text-right}