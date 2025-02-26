<?php

/* Herzog Dupont for YOOtheme Pro Copyright (C) 2016-2023 YOOtheme GmbH, 2019-2023 Thomas Weidlich GNU GPL v3 */

if ($props['image']) : ?>
<img src="<?php echo $props['image'] ?>" alt="<?php echo $props['image_alt'] ?>">
<?php endif ?>

<?php if ($props['title']) : ?>
<<?php echo $element['title_element'] ?>><?php echo $props['title'] ?></<?php echo $element['title_element'] ?>>
<?php endif ?>

<?php if ($props['meta']) : ?>
<p><?php echo $props['meta'] ?></p>
<?php endif ?>

<?php if ($props['content']) : ?>
<div><?php echo $props['content'] ?></div>
<?php endif ?>

<?php if ($props['link']) : ?>
<p><a href="<?php echo $props['link'] ?>"><?php echo $props['link_text'] ?: $element['link_text'] ?></a></p>
<?php endif ?>