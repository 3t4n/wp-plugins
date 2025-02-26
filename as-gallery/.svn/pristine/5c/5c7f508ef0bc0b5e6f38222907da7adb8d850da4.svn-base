<?php

if (!function_exists('as_gl_settings_section')) {
	function as_gl_settings_section(){
		add_settings_section( 
			'as-gl-options', 
			'Gallery lightbox options', 
			'as_gl_show_description', 
			'edit.php?post_type=asgallery' );

		add_settings_field( 
			'as_gl_left_upload', 
			'Gallery lightbox left icon', 
			'as_gl_left_image', 
			'edit.php?post_type=asgallery', 
			'as-gl-options' );

		add_settings_field( 
			'as_gl_right_upload', 
			'Gallery lightbox right icon', 
			'as_gl_right_image', 
			'edit.php?post_type=asgallery', 
			'as-gl-options' );


		add_settings_field( 
			'as_gl_colse_icon', 
			'Gallery lightbox close icon', 
			'as_gl_close_icon_func', 
			'edit.php?post_type=asgallery', 
			'as-gl-options' );

		add_settings_field( 
			'as_gl_bg_overlay_color', 
			'Gallery lightbox background overlay color', 
			'as_gl_close_background_overlay_color_func', 
			'edit.php?post_type=asgallery', 
			'as-gl-options' );

		add_settings_field( 
			'as_gl_bg_overlay_opacity', 
			'Gallery lightbox background overlay opacity', 
			'as_gl_close_background_overlay_opacity_func', 
			'edit.php?post_type=asgallery', 
			'as-gl-options' );

		add_settings_field( 
			'as_gl_speed', 
			'Gallery lightbox speed', 
			'as_gl_close_speed_func', 
			'edit.php?post_type=asgallery', 
			'as-gl-options' );


		add_settings_field( 
			'as_gl_title_color', 
			'Gallery lightbox title background color', 
			'as_gl_title_bg_func', 
			'edit.php?post_type=asgallery', 
			'as-gl-options' );


		add_settings_field( 
			'as_gl_title_opacity', 
			'Gallery lightbox title background opacity', 
			'as_gl_title_bg_opacity_func', 
			'edit.php?post_type=asgallery', 
			'as-gl-options' );


		add_settings_field( 
			'as_gl_title_text_color', 
			'Gallery lightbox title text color', 
			'as_gl_title_text_color_func', 
			'edit.php?post_type=asgallery', 
			'as-gl-options' );


		add_settings_section( 
			'as_Gallery_settings', 
			'Gallery options', 
			'as_gl_show_description', 
			'edit.php?post_type=asgallery' );


		add_settings_field( 
			'as_gl_Gallery_border', 
			'Gallery border color', 
			'as_gl_Gallery_border_color_func', 
			'edit.php?post_type=asgallery', 
			'as_Gallery_settings' );


		add_settings_field( 
			'as_gl_Gallery_border_hov_col', 
			'Gallery border hover color', 
			'as_gl_Gallery_border_hover_func', 
			'edit.php?post_type=asgallery', 
			'as_Gallery_settings' );

		add_settings_field( 
			'as_gl_shadow_code', 
			'Gallery box shadow', 
			'as_gl_shadow_func', 
			'edit.php?post_type=asgallery', 
			'as_Gallery_settings' );



		register_setting( 
			'as-gl-options', 
			'as_gl_sv_opt' );

		register_setting( 
			'as_Gallery_settings', 
			'as_gl_sv_opt' );
	}
	add_action('admin_init', 'as_gl_settings_section');
}



if (!function_exists('as_gl_shadow_func')) {
	function as_gl_shadow_func(){
		$as_gl_css_code = (array)get_option('as_gl_sv_opt');
		@$as_gl_shadow_code = $as_gl_css_code['as_gl_shadow_code'];
		?>
		<textarea name="as_gl_sv_opt[as_gl_shadow_code]" cols="60" rows="6"><?php echo (empty($as_gl_shadow_code) === false) ? $as_gl_shadow_code : null ; ?></textarea>
		<p>Paste box shadow css code here <a href="http://www.cssmatic.com/box-shadow" target="_blank">Get code</a></p>

		<?php
	}
}



if (!function_exists('as_gl_Gallery_border_hover_func')) {
	function as_gl_Gallery_border_hover_func(){
		$as_gl_gl_hover = (array)get_option('as_gl_sv_opt');
		?>

		<input type="text" id="as_gl_main_hover_color" value="<?php echo @$as_gl_gl_hover['as_gl_Gallery_border_hov_col']; ?>" name="as_gl_sv_opt[as_gl_Gallery_border_hov_col]">

		<p>Set gallery border hover color</p>

		<?php	
	}
}

if (!function_exists('as_gl_Gallery_border_color_func')) {
	function as_gl_Gallery_border_color_func(){
		$as_gl_gl_main_border_color = (array)get_option('as_gl_sv_opt');
		?>

		<input type="text" id="as_gl_main_border_color" value="<?php echo @$as_gl_gl_main_border_color['as_gl_Gallery_border']; ?>" name="as_gl_sv_opt[as_gl_Gallery_border]">

		<p>Set gallery border color</p>

		<?php
	}
}


if (!function_exists('as_gl_title_text_color_func')) {
	function as_gl_title_text_color_func(){
		$as_bg_title_tx_color = (array)get_option('as_gl_sv_opt');
		?>

		<input type="text" id="as_gl_title_tx_color" value="<?php echo @$as_bg_title_tx_color['as_gl_title_text_color']; ?>" name="as_gl_sv_opt[as_gl_title_text_color]">

		<p>Set gallery lightbox title text color</p>

		<?php
	}
}


if (!function_exists('as_gl_title_bg_opacity_func')) {
	function as_gl_title_bg_opacity_func(){
		$as_bg_title_opacity = (array)get_option('as_gl_sv_opt');
		@$as_bg_title_op_val = $as_bg_title_opacity['as_gl_title_opacity'];
		if (empty($as_bg_title_op_val) === true) {
			$as_bg_title_op_val = 5;
		}
		?>

<input id="as_gl_title_bg_opacity" type="hidden" name="as_gl_sv_opt[as_gl_title_opacity]" value="<?php echo $as_bg_title_op_val; ?>" >
<p style="margin:25px 0 0 0;">Set gallery lightbox title background opacity</p>

		<?php
	}
}

if (!function_exists('as_gl_title_bg_func')) {
	function as_gl_title_bg_func(){
		$as_bg_title_color = (array)get_option('as_gl_sv_opt');
		?>

		<input type="text" id="as_gl_title_color" value="<?php echo @$as_bg_title_color['as_gl_title_color']; ?>" name="as_gl_sv_opt[as_gl_title_color]">

		<p>Set gallery lightbox title background color</p>

		<?php	
	}
}


if (!function_exists('as_gl_close_speed_func')) {
	function as_gl_close_speed_func(){
		$as_bg_speed = (array)get_option('as_gl_sv_opt');
		@$as_bg_speed_val = $as_bg_speed['as_gl_speed'];
		?>

<input id="as_gl_speed" type="hidden" name="as_gl_sv_opt[as_gl_speed]" value="<?php echo (empty($as_bg_speed_val) === false)? $as_bg_speed_val : 250 ; ?>" >
<p style="margin:25px 0 0 0;">Set gallery lightbox popup speed</p>

		<?php
	}
}

if (!function_exists('as_gl_close_background_overlay_opacity_func')) {
	function as_gl_close_background_overlay_opacity_func(){
		$as_bg_ov_op_val = (array)get_option('as_gl_sv_opt');
		@$as_bg_ov_op = $as_bg_ov_op_val['as_gl_bg_overlay_opacity'];
		$as_bg_ov_op = (empty($as_bg_ov_op) === true) ? '5' : $as_bg_ov_op ;
		?>

<input id="as_gl_bg_overlay_opacity" type="hidden" name="as_gl_sv_opt[as_gl_bg_overlay_opacity]" value="<?php echo $as_bg_ov_op; ?>" >
<p style="margin:25px 0 0 0;">Set gallery lightbox background overlay opacity</p>

		<?php
	}
}

if (!function_exists('as_gl_close_background_overlay_color_func')) {
	function as_gl_close_background_overlay_color_func(){
		$as_bg_ov_color_val = (array)get_option('as_gl_sv_opt');
		?>

		<input type="text" id="as_gl_bg_overlay_color" value="<?php echo @$as_bg_ov_color_val['as_gl_bg_overlay_color']; ?>" name="as_gl_sv_opt[as_gl_bg_overlay_color]">

		<p>Set gallery lightbox background overlay color</p>

		<?php	
	}
}







if (!function_exists('as_gl_close_icon_func')) {
	function as_gl_close_icon_func(){
	$as_close_val = (array)get_option('as_gl_sv_opt');
?>

	<input id="as_gl_close_icon" type="text" class="regular-text" name="as_gl_sv_opt[as_gl_colse_icon]" value="<?php echo @$as_close_val['as_gl_colse_icon']; ?>">
	<button id="as_gl_close_icon_upload" class="button">Upload</button>
	<a href="javascript:void(0)" class="button as_gl_remove" onclick="as_gl_remove('as_gl_close_icon')">Remove</a>
	<p>Upload gallery lightbox close icon</p>

<?php	
	}
}



if (!function_exists('as_gl_right_image')) {
	function as_gl_right_image(){
		$as_img_val = (array)get_option('as_gl_sv_opt');
		?>

			<input id="as_gl_right_icon" type="text" class="regular-text" name="as_gl_sv_opt[as_gl_right_upload]" value="<?php echo @$as_img_val['as_gl_right_upload']; ?>">
			<button id="as_gl_right_icon_upload" class="button">Upload</button>
			<a href="javascript:void(0)" class="button as_gl_remove" onclick="as_gl_remove('as_gl_right_icon')">Remove</a>
			<p>Upload gallery lightbox right icon</p>

		<?php
	}
}


if (!function_exists('as_gl_left_image')) {
	function as_gl_left_image(){
		$as_left_img_val = (array)get_option('as_gl_sv_opt');
		?>
			<input id="as_gl_left_icon" type="text" class="regular-text" name="as_gl_sv_opt[as_gl_left_upload]" value="<?php echo @$as_left_img_val['as_gl_left_upload']; ?>">
			<button id="as_gl_left_icon_upload" class="button">Upload</button>
			<a href="javascript:void(0)" class="button as_gl_remove" onclick="as_gl_remove('as_gl_left_icon')">Remove</a>
			<p>Upload gallery lightbox left icon</p>
		<?php
	}
}




if (!function_exists('as_gl_show_description')) {
	function as_gl_show_description(){
		return false;
	}
}

if (!function_exists('as_gm_sub_menu_pag')) {
	function as_gm_sub_menu_pag(){
    add_submenu_page( 
        'edit.php?post_type=asgallery',   //or 'options.php'
        'Gallery options',
        'Gallery options',
        'manage_options',
        'as-Gallery-options',
        'as_gl_option_callback'
    );

	}
	add_action('admin_menu', 'as_gm_sub_menu_pag');
}
if (!function_exists('as_test_functon')) {
	function as_gl_option_callback(){	
	?>

	<div class="wrap" style="position:relative;overflow: hidden;">

<?php require_once( as_gallery_path . '/inc/anu_ads.php' ); ?>

		<h1>Welcome to AS gallery Options</h1>
		<?php echo settings_errors(); ?>
		<form action="options.php" method="POST" id="as_gl_opt_wrap">
			<?php do_settings_sections('edit.php?post_type=asgallery'); ?>
			<?php settings_fields('as-gl-options'); ?>
			<?php settings_fields('as_Gallery_settings'); ?>
			<p class="submit">
				<input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">

				<input name="as_gl_reset" style="float:right;margin-right: 60px;" type="submit" class="button as_gl_remove" id="as_gl_resset" value="Reset">
			</p>
		</form>
	</div>
	<?php
	}
}