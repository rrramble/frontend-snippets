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

1. Inserted an SVG-image:

In SVG:
- '#' symbol must be changed to '%23'
- single quotes must be used to escape double quotes
- backslash '\' symbol should be at the end of every line

```css
.image {
  background-image: url('data:image/svg+xml;utf8:\
    <svg \
        fill="%23000000" width="800px" height="800px" viewBox="0 0 192 192" \
        xmlns="http://www.w3.org/2000/svg" \
    > \
        <path \
            d="M 0 169 H 192 V 23 H 0 V 170 Z" \
            fill-rule="evenodd" \
        /> \
    </svg> \
  );
}
```
