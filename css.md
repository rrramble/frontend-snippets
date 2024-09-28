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
- backslash `\` symbol should be at the end of every line
- hash `#` symbol must be changed to `%23`
- single quotes `'` symbols must be used outside SVG to escape double quotes `"` symbols inside SVG

```css
--icon: url('data:image/svg+xml;utf8:\
    <svg \
        fill="%23000000" width="800px" height="800px" viewBox="0 0 192 192" \
        xmlns="http://www.w3.org/2000/svg"> \
        <path d="M 0 169 H 192 V 23 H 0 V 170 Z" fill-rule="evenodd" /> \
    </svg> \
);
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

### 1. Use CSS system colors in `body`
```css
body {
    background-color: Canvas;
    color: CanvasText;
    color-scheme: light dark;
}
```

Info about other [CSS system colors](https://developer.mozilla.org/en-US/docs/Web/CSS/system-color)

### 2. For custom colors

2.1. Use [`color: light-dark()`](https://developer.mozilla.org/en-US/docs/Web/CSS/color_value/light-dark) for very modern browsers
```css
.article {
    border-color: light-dark(lightgreen, darkgreen);
}
```

2.2. Use [`@media (prefers-color-scheme)`](https://developer.mozilla.org/en-US/docs/Web/CSS/@media/prefers-color-scheme) unitl the `light-dark()` function become widely available
   
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
