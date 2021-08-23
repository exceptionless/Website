---
title: Node.js Example
# order: 7
# parent: JS
---
When working with Node.js in a non-server environment means you have to think about queue processing a little more than in any other environment. If your Node.js app crashes or exits before the Exceptionless event queue can be cleared, you'll miss events. So, here is a simple guide to ensure you capture all events. 

```js
import { Exceptionless } from "@exceptionless/node";

(async () => {
  try {
    await Exceptionless.startup((c) => {
      c.apiKey = "YOUR API KEY";
      c.defaultTags.push("Example", "Node");
    });
    throw new Error("Whoops, I did it again.")
  } catch(e) {
    await Exceptionless.submitException(e);
  }
})();
```

Exceptionless has some powerful tools to help catch unhandled errors, but with a non-server app, and specifically with an app where an unhandled error can cause the entire process to end, you need to try to handle everything. That is why in the above example, the startup function is wrapped in a try/catch. 

If you do want your app to exit immediately after an error, you can send the error as seen above, and then add the following before you exit: `await Exceptionless.processQueue()`
---

[Next > Express Example](express-example.md) {.text-right }
