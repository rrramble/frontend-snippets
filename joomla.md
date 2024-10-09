# Snippets for Joomla CMS

## Add a favicon

```php
<?php

// A modern way
$this->addHeadLink(
  HTMLHelper::_(
    'image', 'images/favicon-32-32.png', '', [], false, 1
  ),
  'icon alternate', 'rel', ['type' => 'image/png', 'sizes' => '32x32']
);

$this->addHeadLink(
  HTMLHelper::_(
    'image', 'images/favicon-16-16.png', '', [], false, 1
  ),
  'icon', 'rel', ['type' => 'image/vnd.microsoft.icon', 'sizes' => '16x16']
);

// Fallback of an old-style FAVICON.ICO file
$this->addHeadLink(
  HTMLHelper::_(
    'image', 'images/favicon.ico', '', [], false, 1
  ),
  'icon', 'rel', ['type' => 'image/vnd.microsoft.icon']
);
```
