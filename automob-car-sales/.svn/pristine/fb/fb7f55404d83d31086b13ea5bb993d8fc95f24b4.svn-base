
<?php 
	global $wp_meta_boxes;
	$metaboxes  = $wp_meta_boxes[AUTOMOB_CPT_CAR]['normal']['default'];?>
<ul id="am-post-tab" post-id="<?php if (isset($_GET['post'])){ echo (int)$_GET['post'];}else{ echo 0;};?>" class="tab">
<?php foreach ($metaboxes as $metabox): ?>
	<li><a href="#" class="tablinks" onclick="openCity(event, '<?=$metabox['id']?>-container')"><?=$metabox['title']?></a></li>
<?php endforeach; ?>
</ul>

<?php foreach ($metaboxes as $metabox): ?>
	<div id="<?=$metabox['id']?>-container" for="<?=$metabox['id']?>" class="tabcontent am-admin-tabcontent">
	</div>
<?php endforeach; ?>