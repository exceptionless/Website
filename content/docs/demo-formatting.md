---
title: TEMP - Markdown Formatting Demo
order: 1
---
Shows all the different markdown formatting options available for writing docs and blog posts

General markdown-it formatting: <https://markdown-it.github.io/>

- [Footnote](#footnote)
- [anchor links](#anchor-links)
- [attrs {.text-center}](#attrs-text-center)
- [bracketed spans](#bracketed-spans)
- [alerts](#alerts)
- [abbreviations](#abbreviations)
- [tables](#tables)

## Footnote

<https://github.com/markdown-it/markdown-it-footnote>

Here is a footnote reference,[^1] and another.[^longnote]

[^1]: Here is the footnote.

[^longnote]: Here's one with multiple blocks.

    Subsequent paragraphs are indented to show that they
belong to the previous footnote.

## anchor links

<https://github.com/valeriangalliat/markdown-it-anchor>

[Link to footnote section](#footnote)

## attrs {.text-center}

<https://github.com/arve0/markdown-it-attrs>

paragraph {.text-center}

## bracketed spans

<https://github.com/mb21/markdown-it-bracketed-spans>

paragraph with [a warning span]{.text-warning}

## alerts

<https://github.com/nunof07/markdown-it-alerts>

::: success
Hello world! [Link](#).
:::

## abbreviations

<https://github.com/markdown-it/markdown-it-abbr>

*[HTML]: Hyper Text Markup Language
*[W3C]:  World Wide Web Consortium
The HTML specification
is maintained by the W3C.

## tables

| Feature                        | Exceptionless | Application Insights | Elmah | Raygun |
| :----------------------------- | :-----------: | :------------------: | :---: | :----: |
| Open Source                    | X             |                      | X     |
| Free Self Hosting              | X             |                      | X     |
| Detailed error reports         | X             | X                    |       | X      |
