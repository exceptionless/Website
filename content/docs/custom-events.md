---
title: Custom Event Stacks
order: 11
---
We try to group events into intuitive stacks, but sometimes you might want to create your own for organization, reporting, troubleshooting, etc.

We created `SetManualStackingKey` to facilitate this need.

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
