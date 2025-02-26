<?php

if (!function_exists('as_gallery_shortcode')) {
	function as_gallery_shortcode($atts, $content){
		$as_woo_featured = extract(shortcode_atts( array(
					'id' => null
			), $atts) );

		ob_start();

$id = trim($id);

if (empty($id) === false) {
	if (is_numeric($id)) {
		$id = strip_tags($id);
		$as_get_gl = get_post( $id );
		if ($as_get_gl) {
			$as_gl_img = get_post_meta( $as_get_gl->ID, 'as_gl_image', true); 
			$as_gl_image_column = get_post_meta( $as_get_gl->ID, 'as_gl_image_column', true); 
			$as_gl_bor_size = get_post_meta( $as_get_gl->ID, 'as_gl_image_size', true); 
			$as_gl_image_column = (empty($as_gl_image_column) === false) ? $as_gl_image_column : 'as_gl_col_four' ;
			if ($as_gl_img) {
				echo '<ul id="as_allery_main">';



				foreach ($as_gl_img as $as_gl) {

if (empty($as_gl['id']) === false || empty($as_gl['image']) === false) {


$as_crop_image = wp_get_attachment_image_src( $as_gl['id'], 'as_front_image' );
						?>
<li id="as_allery_main_li" class="<?php echo $as_gl_image_column; ?>" <?php

if (empty($as_gl_image_column) === false) {
	if ($as_gl_bor_size !== 'default') {
		?>

		style="padding: <?php echo $as_gl_bor_size; ?>%;"

		<?php
	}
}

?> >

<a href="<?php echo @$as_gl['image']; ?>" class="big"><img src="<?php echo @$as_crop_image[0]; ?>" alt="<?php echo @$as_gl['alt']; ?>" title="<?php echo @$as_gl['title']; ?>" /></a>

</li>
						<?php
				}
				}



				echo '</ul>';

			}

		}
	}
}




		$asreturnval = ob_get_clean();
		return $asreturnval;
	}
	add_shortcode('as_gallery', 'as_gallery_shortcode');
}




