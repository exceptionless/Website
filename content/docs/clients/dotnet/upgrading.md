---
title: Upgrading
order: 9
---

- [Upgrading from Exceptionless 3.x](#upgrading-from-exceptionless-3x)
- [Upgrading from Exceptionless 2.x](#upgrading-from-exceptionless-2x)

## Upgrading from Exceptionless 3.x

- The `Exceptionless.Portable` package and `Exceptionless.Extras` assembly was merged into the `Exceptionless` package.
- The `ExceptionlessClient.Default.Register()` method has been removed as the functionality was merged into `ExceptionlessClient.Default.Startup()` method.

## Upgrading from Exceptionless 2.x

- `IEventEnrichment` has been renamed to `IEventPlugin`
- `IEventPlugin.Enrich(context, event)` signature has been changed to `IEventPlugin.Run(context)`. The event has been moved to the context
- `client.Configuration.AddEnrichment<IEventEnrichment>();` has been renamed to `client.Configuration.AddPlugin<IEventPlugin>();`
- `EventPluginContext.Data` property has been renamed to `EventPluginContext.ContextData`
- `EventSubmittingEventArgs.EnrichmentContextData` property has been renamed to `EventSubmittingEventArgs.PluginContextData`

---  

[Next > JavaScript Client](../javascript/index.md) {.text-right}