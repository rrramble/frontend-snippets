# CSS snippets

## Visually hidden

Sources:
- [The anatomy of visually-hidden](https://www.tpgi.com/the-anatomy-of-visually-hidden/) by James Edwards of November, 2022
- [Inclusively hidden by Scott O'Hara](https://www.scottohara.me/blog/2017/04/14/inclusively-hidden.html) of April, 2017.

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
