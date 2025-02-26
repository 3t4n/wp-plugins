<ul id="as_main_image_section">
<input type="hidden" name="as_gl_nonce" value="<?php echo wp_create_nonce( 'as_gl_my_nonce' ); ?>" >
<?php


$as_get_gl_val = get_post_meta($post->ID, 'as_gl_image', true);
$as_gl_col = get_post_meta($post->ID, 'as_gl_image_column', true);
if ($as_get_gl_val) {
	$a1 = 0;
	foreach ($as_get_gl_val as $as_get_gl) {
		
		@$as_img = $as_get_gl['image'];
		@$title = $as_get_gl['title'];
		@$alt = $as_get_gl['alt'];
		@$asid = $as_get_gl['id'];

		if (empty($as_img) === false) {
			?>
			<li id="as_remove_<?php echo $a1; ?>" onclick="as_gl_remove_img(<?php echo $a1; ?>)">
				<span class="hover_overlay">
					
				</span>
<?php

$as_thamb_img = wp_get_attachment_image_src( $asid, 'thumbnail' );

?>



<img src="<?php echo $as_thamb_img[0]; ?>" alt="As Gallery">

<input value="<?php echo $as_img; ?>" type="hidden" name="as_gl_image[<?php echo $a1; ?>][image]" />
<input value="<?php echo $title; ?>" type="hidden" name="as_gl_image[<?php echo $a1; ?>][title]" />
<input value="<?php echo $alt; ?>" type="hidden" name="as_gl_image[<?php echo $a1; ?>][alt]" />
<input value="<?php echo $asid; ?>" type="hidden" name="as_gl_image[<?php echo $a1; ?>][id]" />


			</li>
		
		<?php
		$as_get_count = $a1;
		$a1++;
		}
	}
}

?>

	<li id="as_add_new_gallery"  as-data="<?php echo (empty($as_get_count) === false) ? $as_get_count : null ; ?>">
		<img src="<?php echo as_gallery_url.'img/click.jpg'; ?>" alt="As Gallery">
		<input value="0" type="hidden" name="as_gl_image[0][default]" />
	</li>
</ul>
