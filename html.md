# HTML snippets

## Announce HTML changes in screen readers

In order to announce when something changes in HTML-code, use the following [`aria live region` roles](https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/ARIA_Live_Regions):

```html
<article
    aria-live="assertive" aria-relevant="additions text" aria-atomic="true">
</article>
```
