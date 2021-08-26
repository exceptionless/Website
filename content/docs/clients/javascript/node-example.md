---
title: Node.js Example
# order: 7
# parent: JS
---
When working with Node.js in a non-server environment means you have to think about queue processing a little more than in any other environment. If your Node.js app crashes or exits before the Exceptionless event queue can be cleared, you'll miss events. So, here is a simple guide to ensure you capture all events. 

```js
import { Exceptionless } from "@exceptionless/node";

await Exceptionless.startup("YOUR API KEY");

const forceError = async () => {
  try {
    throw new Error("Whoops, I did it again.")
  } catch(e) {
    await Exceptionless.submitException(e);
  }
}
```
---

[Next > Express Example](express-example.md) {.text-right }
