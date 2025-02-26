<?php
/*
 * Images shortcode
 */

function mstoic_shortcodes_submit_button($data) {

	$inputs = array('input-class', 'input-id', 'input-name');
	foreach($inputs as $input) {
		if (empty($data[$input])) {
			$data[$input] = '';
		}
	}

	?>

	<div class="section">
		<p class="clear-float">
			<span>
				<input class="get-shortcode button button-primary button-large align-right <?php echo $data['input-class']; ?>"
				       id="<?php echo $data['input-id']; ?>"
				       type="button"
				       value="<?php echo $data['input-name']; ?>"
				       data-shortcode="<?php echo $data['input-id']; ?>" />
			</span>
		</p>
	</div>

	<?php

}

function mstoic_shortcodes_input_box_half($data) {

	$inputs = array('div-id', 'input-id', 'option-title', 'option-desc', 'type');
	foreach($inputs as $input) {
		if (empty($data[$input])) {
			$data[$input] = '';
		}
	}
	if ($data['type']=='') {
		$data['type'] = 'text';
	}

	?>

	<div class="section section-details shortcodeData" id="<?php echo $data['div-id']; ?>">
		<span class="option"><?php echo $data['option-title']; ?>
			<span class="desc"><?php echo $data['option-desc']; ?></span>
		</span>
		<input type="<?php echo $data['type']; ?>" id="<?php echo $data['input-id']; ?>" name="<?php echo $data['input-id']; ?>">
	</div>

	<?php
}

function mstoic_shortcodes_p($text) {
	?>
	<div class="section section-details">
		<p><?php echo $text; ?></p>
	</div>
	<?php
}

function mstoic_shortcodes_h3($text) {
	?>
	<div class="section title section-details">
		<h3><?php echo $text; ?></h3>
	</div>
	<?php
}

function mstoic_shortcodes_checkbox($id, $checked, $value, $description) {
	if ($checked == 1) {
		$checked = ' checked';
	} else {
		$checked = '';
	}
	?>

	<div class="section section-details shortcodeData">

		<?php if ($description!=='') { ?>
			<span class="option"><?php echo $description; ?></span>
		<?php } ?>

		<label class="option-detail" for="<?php echo $id; ?>">
			<input <?php echo $checked; ?> id="<?php echo $id; ?>" type="checkbox" />
			<span><?php echo $value; ?></span>
		</label>

	</div><!-- .section-details -->

	<?php
}

function mstoic_shortcodes_print_images($id = '', $count = 0) {

	if ($_POST && isset($_POST['mstoicImgCount'])) { // AJAX Request + Button Click
		$buttonClick = TRUE;
	} else {
		$buttonClick = FALSE;
	}

	if ($buttonClick) {
		$count = $_POST['mstoicImgCount'];
		$id = $_POST['id'];
	}

	ob_start();

	if ( ! $buttonClick ) {
		mstoic_shortcodes_h3( 'What The Shortcode Does?' );
		echo mstoic_shortcodes_p( 'The shortcode displays images with optional heading and sub-heading.' );
		mstoic_shortcodes_h3( 'Square/Round Images?' );

		$id          = 'ms-round-images';
		$checked     = 0;
		$value       = 'Square images will look best when rounded.';
		$description = 'Check this box if you want to round the images.';
		echo mstoic_shortcodes_checkbox( $id, $checked, $value, $description );
	}
	?>

	<?php if ( ! $buttonClick ) { ?>
		<form name="myform" novalidate>
	<?php } ?>

	<?php for ($i=1; $i<=$count; $i++) { ?>

		<?php mstoic_shortcodes_h3('Enter Image Details'); ?>

		<div class="ms-image-upload ms-outer-padding" id="<?php echo $id . '-' . $i; ?>">

			<p>
				<label>Heading</label>
				<input class="ms-img-heading" id="image_heading" type="text" size="36" name="image_heading" value="" />
			</p>
			<p>
				<label>Sub-heading</label>
				<input class="ms-img-sub-heading" id="image_sub_heading" type="text" size="36" name="image_sub_heading" value="" />
			</p>
			<p>
				<label>Image (Type/Paste the image URL or Upload the Image)</label>
				<span><input class="ms-img-upload-field" id="upload_image" type="text" size="36" name="upload_image" value="" /></span>
				<span><input class="ms-img-upload-button ms-button button button-primary button-large" id="upload_image_button" type="button" value="Upload Image" /></span>
			</p>

		</div><!-- .ms-image-upload -->

	<?php } ?>

	<?php if ( ! $buttonClick ) { ?>
		</form>
	<?php } ?>

	<?php if (!$buttonClick) { ?>

		<?php mstoic_shortcodes_h3('Select Your Action'); ?>

		<div class="section section-details shortcodeData">
			<p class="ms-live-preview-container">
				<input
					data-shortcode="get_images"
					class="ms-live-preview button button-secondary button-large"
					type="button"
					value="Live Preview" />
			</p>
		</div><!-- .section -->

		<p class="clear-float ms-outer-padding">
			<span><input data-img-id="<?php echo $id; ?>" data-img-count="<?php echo $count; ?>" class="add-more-images button button-primary button-large align-left" id="more_images" type="button" value="Add More Images" /></span>
			<span><input data-img-id="<?php echo $id; ?>" class="ms-get-shortcode get-shortcode button button-primary button-large align-right" data-shortcode="get_images" id="get_images" type="button" value="Get Shortcode" /></span>
		</p>

	<?php } ?>

	<?php

	echo ob_get_clean();

	if ($buttonClick) { // AJAX Request + Button Click
		exit();
	}

}
add_action( 'wp_ajax_mstoic_shortcodes_print_images', 'mstoic_shortcodes_print_images' );
add_action( 'wp_ajax_nopriv_mstoic_shortcodes_print_images', 'mstoic_shortcodes_print_images' );

/**
 * Prints some HTML to add selected images.
 *
 * @return string           HTML content to display the images.
 */
function mstoic_shortcode_images($atts) {

	extract(shortcode_atts(array(
		'count' => '0',
		'round' => 'FALSE',
	), $atts));
	for ( $i = 1; $i <= $count; $i++ ) {
		extract(shortcode_atts(array(
			'image_' . $i => '',
			'image_heading_' . $i => '',
			'image_sub_heading_' . $i => '',
		), $atts));
	}

	ob_start();

	$my_count = 0;

	?>

	<?php for ( $i = 1; $i <= $count; $i++ ) { ?>

		<?php if ( ${'image_' . $i} == '') { continue; } else { $my_count++; } ?>

		<div class="image count">

			<img src="<?php echo esc_url( ${'image_' . $i} ); ?>" />

			<p class="img-heading"><?php echo ${'image_heading_' . $i}; ?></p>
			<p class="img-sub-heading"><?php echo ${'image_sub_heading_' . $i}; ?></p>

		</div><!-- .image -->

	<?php } ?>

	<?php

	$inner_data = ob_get_clean();

	$countID = ($my_count > 5) ? 5 : $my_count;

	?>

	<div class="mstoic-shortcodes-images mstoic-shortcodes total-count <?php echo ($round=='TRUE' ? 'round' : ''); ?> count-<?php echo intval($countID); ?> cf">

		<?php echo $inner_data; ?>

	</div><!-- .mstoic-shortcodes-images -->

	<?php

	return ob_get_clean();

}
add_shortcode( 'ms_images', 'mstoic_shortcode_images' );

function mstoic_shortcodes_ajax_images() {

	ob_start();

	$url     = wp_get_referer();

	$query_vars = parse_url($url, PHP_URL_QUERY);

	parse_str($query_vars, $query_vars_array);

	if (!empty($query_vars_array) && !empty($query_vars_array['post'])) {
		// We have the post ID. Proceed
	} else {
		echo '<p class="ms-error">Please save the post as a draft before using this shortcode. This is required because right now, there is no ID of the post to attach the image to.</p>';
		return;
	}

	$id = 'ms-images';
	$count = 5;

	?>

	<?php mstoic_shortcodes_print_images($id, $count); ?>

	<script type="text/javascript">
		jQuery(document).on( 'click', '#more_images', function() {

			jQuery.ajax({

				url: ajaxurl,
				data: {action: 'mstoic_shortcodes_print_images', mstoicImgCount: <?php echo $count; ?>, id: '<?php echo $id; ?>',},
				type: 'post'

			}).success(function (data) {

				jQuery('.mstoic-shortcodes-modal').find('.ms-image-upload').last().after(data);

			});

		});
	</script>

	<?php

	echo ob_get_clean();

	wp_die();

}
add_action( 'wp_ajax_ajax_images', 'mstoic_shortcodes_ajax_images');


/**
 * mstoic_shortcodes_is_edit_page
 * function to check if the current page is a post edit page
 *
 * @author Ohad Raz <admin@bainternet.info>
 *
 * @param  string  $new_edit what page to check for accepts new - new post page ,edit - edit post page, null for either
 * @return boolean
 */
function mstoic_shortcodes_is_edit_page($new_edit = null){

	global $pagenow;

	//make sure we are on the backend
	if (!is_admin()) {
		return false;
	}

	if ( $new_edit == "edit" ) {
		return in_array( $pagenow, array( 'post.php', ) );
	} elseif ( $new_edit == "new" ) { //check for new post page
		return in_array( $pagenow, array( 'post-new.php' ) );
	} else { //check for either new or edit
		return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
	}

}

// Add scripts to load in WP Dashboard
function mstoic_shortcodes_admin_scripts_edit_page() {

	wp_enqueue_media();

	wp_register_script('my-upload', plugins_url('mstoic-shortcodes').'/js/admin/image-upload.js', array('jquery'));

	wp_enqueue_script('my-upload');

}

// Add styles to load in WP Dashboard
function mstoic_shortcodes_admin_styles_edit_page() {
	// no styles added for edit page
}

// If edit page, add edit page styles and scripts
if (mstoic_shortcodes_is_edit_page()) {
	add_action( 'admin_print_scripts', 'mstoic_shortcodes_admin_scripts_edit_page' );
	add_action( 'admin_print_styles', 'mstoic_shortcodes_admin_styles_edit_page' );
}

?>