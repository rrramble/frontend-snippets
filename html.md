# HTML snippets

## Announce HTML changes in screen readers

In order to announce when something changes in HTML-code, use the following [`aria live region` roles](https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/ARIA_Live_Regions):

```html
<article
    aria-live="assertive" aria-relevant="additions text" aria-atomic="true">
</article>
```

## Favicons

1. In HTML-file, add the following code:
```html
<head>
    <link rel="icon" href="favicon-32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="favicon-16.png" sizes="16x16" type="image/png">
```
2. For Apple devices, place the following file in the root of a web-server:
`apple-touch-icon.png`. Resolution should be 180×180 pixels.

3. For Android devices, place the following manifest file; place `png` files mentioned in it:
```json
{
  "name": "My App",
  "icons": [{
    "src": "favicon-64.png",
    "sizes": "64x64"
  }, {
    "src": "favicon-128.png",
    "sizes": "128x128"
  }],
  "display": "fullscreen",
  "orientation": "landscape",
  "theme_color": "tomato",
  "background_color": "cornflowerblue"
}
```

And link it with a `<link>` tag in the `<head>` section:
```html
<link rel="manifest" href="MANIFEST-FILE.json">
```

References:
- [Web manifests](https://www.w3.org/TR/appmanifest/)
- [<link> HTML-tag](https://html.spec.whatwg.org/multipage/links.html#element-statedef-link-icon)
