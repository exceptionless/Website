---
title: Getting Events
order: 4
---

## Get Event by Reference ID

If we want to get the event we just created by it’s reference_id, we can navigate to `Event` > `GET /api/v2/events/by-ref/{referenceId}`, enter that reference ID, and get back the details of the event.

![Get By Reference ID](../img/06-get-by-reference-ID2.png)

## Get Event via Search Filter

Another example of getting an event may include using the reference ID or another search filter we just created and getting all by a reference filter. You can use any search filter in the filter parameter.

To do so, navigate to `Event` > `GET /api/v2/events` and use the reference term to filter events by the reference ID.

![Get By Filter](../img/07-get-all-filter-reference.png)

![Get By Filter 2](../img/07-get-all-filter-reference2.png)