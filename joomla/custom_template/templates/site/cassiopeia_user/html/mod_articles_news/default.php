<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;

if (!$list) {
    return;
}

// $itemTag = 'div';
$itemTag = 'article';

?>
<div class="mod-articlesnews newsflash">
    <?php foreach ($list as $item) : ?>
        <<?= $itemTag; ?> class="mod-articlesnews__item" itemscope itemtype="https://schema.org/Article" aria-live="assertive" aria-relevant="additions text" aria-atomic="true">
            <?php require ModuleHelper::getLayoutPath('mod_articles_news', '_item'); ?>
        </<?= $itemTag; ?>>
    <?php endforeach; ?>
</div>
