<?php

/* Herzog Dupont for YOOtheme Pro Copyright (C) 2016-2023 YOOtheme GmbH, 2019-2023 Thomas Weidlich GNU GPL v3 */

if ($props['image'] || $props['title'] || $props['meta'] || $props['content'] || $props['link']) : ?>
<div>

    <?php if ($props['image']) : ?>
    <img src="<?php echo $props['image'] ?>" alt="<?php echo $props['image_alt'] ?>">
    <?php endif ?>

    <?php if ($props['title']) : ?>
    <<?php echo $props['title_element'] ?>><?php echo $props['title'] ?></<?php echo $props['title_element'] ?>>
    <?php endif ?>

    <?php if ($props['meta']) : ?>
    <p><?php echo $props['meta'] ?></p>
    <?php endif ?>

    <?php if ($props['content']) : ?>
    <div><?php echo $props['content'] ?></div>
    <?php endif ?>

    <?php if ($props['link_text']) : ?>
    <p><?php echo $props['link_text'] ?></p>
    <?php endif ?>

</div>
<?php endif ?>

<?php if ($props['image_back'] || $props['title_back'] || $props['meta_back'] || $props['content_back'] || $props['link_back']) : ?>
<div>

    <?php if ($props['image_back']) : ?>
    <img src="<?php echo $props['image_back'] ?>" alt="<?php echo $props['image_back_alt'] ?>">
    <?php endif ?>

    <?php if ($props['title_back']) : ?>
    <<?php echo $props['title_back_element'] ?>><?php echo $props['title_back'] ?></<?php echo $props['title_back_element'] ?>>
    <?php endif ?>

    <?php if ($props['meta_back']) : ?>
    <p><?php echo $props['meta_back'] ?></p>
    <?php endif ?>

    <?php if ($props['content_back']) : ?>
    <div><?php echo $props['content_back'] ?></div>
    <?php endif ?>

    <?php if ($props['link_back']) : ?>
    <p><a href="<?php echo $props['link_back'] ?>"><?php echo $props['link_back_text'] ?></a></p>
    <?php endif ?>

</div>
<?php endif ?>
