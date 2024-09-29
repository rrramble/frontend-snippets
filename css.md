# CSS snippets

## Visually hidden

Sources and examples:
- [The anatomy of visually-hidden](https://www.tpgi.com/the-anatomy-of-visually-hidden/) by James Edwards of November, 2022
- [Inclusively hidden by Scott O'Hara](https://www.scottohara.me/blog/2017/04/14/inclusively-hidden.html) of April, 2017
- [Usage examples](https://blog.logrocket.com/design-accessibility-css-visually-hidden-class/)

```css
.visually-hidden:not(:focus):not(:active) {
  border: 0;
  clip: rect(0 0 0 0);
  clip-path: inset(50%);
  height: 1px;
  left: 0;
  margin: 0;
  overflow: hidden;
  padding: 0;
  position: absolute;
  top: 0;
  width: 1px;
  white-space: nowrap;
}
```


## Colorize SVG-image inserted as data:image

1. Define CSS-variable with SVG-image

In SVG:
- backslash `\` symbol should be at the end of every SVG line
- hash `#` symbol must be changed to `%23`
- single quotes `'` symbols must be used outside SVG to escape double quotes `"` symbols inside SVG

```css
--icon: url('data:image/svg+xml;utf8:\
    <svg \
        fill="%23000000" width="800px" height="800px" viewBox="0 0 192 192" \
        xmlns="http://www.w3.org/2000/svg"> \
        <path d="M 0 169 H 192 V 23 H 0 V 170 Z" fill-rule="evenodd" /> \
    </svg> \
');
```

2. Use CSS `mask` property in `::before/after` pseudoelement
```css
.image-container::before {
        background-color: CanvasText; /* Useful in auto switching of light/dark modes */
        content: '';
        display: block;
        height: 100%;
        mask-image: var(--icon);
        mask-position: center center;
        mask-repeat: no-repeat;
        mask-size: 100% auto;
        mask-clip: view-box;
        position: absolute;
        width: 100%;
    }
```

3. Add `position: relative` in the element
```css
.image-container {
    position: relative;
}
```

## Set up Light/Dark modes

### Step 1. Use `CSS system colors` in `<body>`
```css
body {
    background-color: Canvas;
    color: CanvasText;
    color-scheme: light dark;

    /* use other CSS system colors for other objects */
}
```

That's all if you use only [CSS system colors](https://developer.mozilla.org/en-US/docs/Web/CSS/system-color)!

### Step 2. If you use colors outside `CSS system colors` list

2.1. Use [`color: light-dark()`](https://developer.mozilla.org/en-US/docs/Web/CSS/color_value/light-dark) in browsers updated after May, 2024. See [light-dark() function on Can I Use site](https://caniuse.com/?search=light-dark())
```css
.article {
    border-color: light-dark(lightgreen, darkgreen);
}
```

2.2. Use [`@media (prefers-color-scheme)`](https://developer.mozilla.org/en-US/docs/Web/CSS/@media/prefers-color-scheme) if you would like to support browsers, updated before May, 2024.
   
```css
/* For default light mode */
.article {
    border-color: lightgreen;
}

/* For dark mode */
@media (prefers-color-scheme: dark) {
    .article {
        border-color: darkgreen;
    }
}
```

## Print styles

Article of Manuel Matuzovic about [CSS print styles](https://www.matuzo.at/blog/i-totally-forgot-about-print-style-sheets/)(https://habr.com/ru/companies/ruvds/articles/317776/)

```css
@media print {
    *,
    *::before,
    *::after {
        color: black !important;
        background-color: transparent !important;
    }
}
```

Alternatively you can insert print styles in HTML `<head>` tag:

```css
<head>
    <link media="print" href="print.css" />
```

Some other rules:

```css
@media print {
    section {
      break-after: always;
      break-before: always;
    }

    ul {
      break-inside: avoid;
    }

    p {
      /* Print at least 2 lines on the current page and 4 lines on the next page */
      orphans: 2;
      widows: 4;
    }

    /* Display targets of links */
    a[href^="http"]:not([href*="codepen.io"]):after {
        content: " (" attr(href) ")";
    }
    
    /* Display expansions of abbreviations */
    abbr[title]:after {
      content: " (" attr(title) ")";
    }

    @page {
        margin: 1cm; /* Paper margins */
    }
}
```
