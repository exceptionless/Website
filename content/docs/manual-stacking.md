---
title: Manual Stacking
order: 3
---
We try to group events into intuitive stacks, but sometimes you might want to create your own for organization, reporting, troubleshooting, etc. A good example use case might be when you are introducing a new feature. The errors or events you send to Exceptionless may ultimately look like or be the same as events linked to other features in your applications. However, you might want to see the events triggered by use of this new feature stacked together. 

How might we do this? You can use the `SetManualStackingKey` method to facilitate this need.

## Creating Custom Stacks

In the below examples, we use `SetManualStackingKey` and are naming the custom stack "MyCustomStackingKey".

## C# Example

```csharp
try {
    throw new ApplicationException("Unable to create order from quote.");
} catch (Exception ex) {
    ex.ToExceptionless().SetManualStackingKey("MyCustomStackingKey").Submit();
}
```

Or, you can set the stacking directly on an event (e.g., inside a plugin).

```csharp
event.SetManualStackingKey("MyCustomStackingKey");
```

## JavaScript Example

```javascript
var client = exceptionless.ExceptionlessClient.default;
// Node.Js
// var client = require('exceptionless').ExceptionlessClient.default;

try {
  throw new Error('Unable to create order from quote.');
} catch (error) {
  client.createException(error).setManualStackingKey('MyCustomStackingKey').submit();
}
```

---

[Next > Filtering & Searching](filtering-and-searching) {.text-right}