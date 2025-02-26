<?php

/* Herzog Dupont for YOOtheme Pro Copyright (C) 2016-2023 YOOtheme GmbH, 2021-2023 Thomas Weidlich GNU GPL v3 */
	
	$items = [];

	foreach (['image_1', 'image_2', 'image_3', 'video_1', 'video_2', 'video_3'] as $key) {
		if ($props[$key]) {
			$items[] = $props[$key];
		}
	}

?>

<?php if (count($items) > 1) : ?>
<ul>
<?php elseif (count($items) == 1) : ?>
<div>
<?php endif ?>

	<?php for($i = 0; $i<3; $i++) : ?>
	<?php if (count($items) > 1) : ?>
	<li>
	<?php endif ?>

		<?php $j = $i + 1; ?>
		<?php if ($props['image_' . $j]) : ?>
		<img src="<?php echo $props['image_' . $j] ?>" alt="<?php echo $props['image_' . $j . '_alt'] ?>">
		<?php elseif ($props['video_' . $j]) : ?>
		<?php if ($this->iframeVideo($props['video_' . $j], [], false)) : ?>
		<iframe src="<?php echo $props['video_' . $j] ?>"></iframe>
		<?php else : ?>
		<video src="<?php echo $props['video_' . $j] ?>"></video>
		<?php endif ?>
		<?php endif ?>

	<?php if (count($items) > 1) : ?>
	</li>
	<?php endif ?>
	<?php endfor ?>

<?php if (count($items) > 1) : ?>
</ul>
<?php elseif (count($items) == 1) : ?>
</div>
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