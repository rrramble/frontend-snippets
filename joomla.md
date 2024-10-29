# Snippets for Joomla CMS

## Add a favicon

```php
<?php

// A modern way with PNG-images
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

// Fallback of an old-style FAVICON.ICO file for Internet Explorer version 9.0 and less
$this->addHeadLink(
  HTMLHelper::_(
    'image', 'images/favicon.ico', '', [], false, 1
  ),
  'icon', 'rel', ['type' => 'image/vnd.microsoft.icon']
);
```

## Determine if current page is the main page (front page)

```php
<?php

$app = JFactory::getApplication();
$menu = $app->getMenu();
$langTag = JFactory::getLanguage()->getTag();

if ($menu->getActive() === $menu->getDefault($langTag)) {
	// Do something
}
```

[Source](https://docs.joomla.org/How_to_determine_if_the_user_is_viewing_the_front_page)
