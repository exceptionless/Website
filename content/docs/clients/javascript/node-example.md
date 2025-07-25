---
title: Node.js Example
# order: 7
# parent: JS
---
Here is a very simple example using a Node.js script.

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
