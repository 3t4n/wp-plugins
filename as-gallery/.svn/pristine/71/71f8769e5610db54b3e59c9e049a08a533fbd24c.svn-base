<?php
if (!function_exists('as_gallery_script')) {
	function as_gallery_script(){

	wp_enqueue_style( 'as_gallery_main_css', as_gallery_url.'css/as_main.css', __FILE__ );

	wp_register_script( 'as_gallery_lightbox', as_gallery_url.'js/lightbox.js', 1.0, false );
	wp_enqueue_script('jquery');
	wp_enqueue_script('as_gallery_lightbox');


	}
add_action('wp_enqueue_scripts','as_gallery_script');
}


if (!function_exists('as_active_gallery')) {
	function as_active_gallery(){
@$as_gl_opt = get_option('as_gl_sv_opt');
@$as_gl_left_upload 	= $as_gl_opt['as_gl_left_upload'];
@$as_gl_right_upload 	= $as_gl_opt['as_gl_right_upload'];
@$as_gl_colse_icon 		= $as_gl_opt['as_gl_colse_icon'];
@$as_gl_bg_overlay_color = $as_gl_opt['as_gl_bg_overlay_color'];
@$as_gl_bg_overlay_opacity = $as_gl_opt['as_gl_bg_overlay_opacity'];
@$as_gl_speed = $as_gl_opt['as_gl_speed'];
		?>
<script type="text/javascript">
jQuery(document).ready(function($) {

		$('#as_allery_main_li a').simpleLightbox({


<?php

if(empty($as_gl_speed ) === false){
	?>

  		animationSpeed: '<?php echo $as_gl_speed; ?>',
  
	<?php
}

if(empty($as_gl_right_upload ) === false){
	?>

  		righticon: '',
  
	<?php
}



if(empty($as_gl_colse_icon ) === false){
	?>

		closeText: true,
  
	<?php
}



if(empty($as_gl_left_upload ) === false){
	?>

  lefticon: '',

	<?php
}

?>
additionalHtml:		false


			
			
		});
});
</script>

		<?php
	}
	add_action('wp_footer', 'as_active_gallery');
}


if (!function_exists('as_gallery_admin_js')) {
	function as_gallery_admin_js(){

if (current_user_can( 'manage_options' ) === true) {


	wp_register_script( 'as_gallery_mainjs', as_gallery_url.'js/as_admin_js.js', 'jquery', 1.0, true );
	wp_enqueue_script('jquery');
	wp_enqueue_script('as_gallery_mainjs');


	wp_enqueue_media();
	wp_enqueue_style( 'as_gallery_maincss', as_gallery_url.'css/as_admin_css.css' );
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script('wp-color-picker');
}


	}
	add_action('admin_enqueue_scripts','as_gallery_admin_js');

}

if (!function_exists('as_gl_get_opt_css')) {
	function as_gl_get_opt_css(){
		@$as_gl_opt = get_option('as_gl_sv_opt');
		@$as_gl_left_upload 	= $as_gl_opt['as_gl_left_upload'];
		@$as_gl_right_upload 	= $as_gl_opt['as_gl_right_upload'];
		@$as_gl_colse_icon 		= $as_gl_opt['as_gl_colse_icon'];
		@$as_gl_bg_overlay_color = $as_gl_opt['as_gl_bg_overlay_color'];
		@$as_gl_bg_overlay_opacity = $as_gl_opt['as_gl_bg_overlay_opacity'];
		@$as_gl_title_color = $as_gl_opt['as_gl_title_color'];
		@$as_gl_title_opacity = $as_gl_opt['as_gl_title_opacity'];
		@$as_gl_title_text_color = $as_gl_opt['as_gl_title_text_color'];
		@$as_gl_Gallery_border = $as_gl_opt['as_gl_Gallery_border'];
		@$as_gl_Gallery_border_hov_col = $as_gl_opt['as_gl_Gallery_border_hov_col'];
		@$as_gl_shadow_code = $as_gl_opt['as_gl_shadow_code'];
?>	



	
	<style>


<?php

if(empty($as_gl_colse_icon ) === false){
?>

	.sl-wrapper .sl-close, .sl-wrapper .sl-close:hover, .sl-wrapper .sl-close:focus {
	background-repeat: no-repeat;
	background-position: center center;
	-webkit-background-size: 100%;
	background-size: 100%;
	background-image: url('<?php echo $as_gl_colse_icon; ?>');
	outline: none;
	}

<?php
}

?>


.sl-wrapper .sl-navigation button.sl-next {

<?php

if(empty($as_gl_right_upload ) === false){
	?>

  background-image: url('<?php echo $as_gl_right_upload; ?>');
  
	<?php
}

?>


}


.sl-wrapper .sl-navigation button.sl-prev {

<?php

if(empty($as_gl_left_upload ) === false){
	?>

  background-image: url('<?php echo $as_gl_left_upload; ?>');

	<?php
}

?>


}

.sl-overlay {
<?php

if(empty($as_gl_bg_overlay_color ) === false){
	?>

  background: <?php echo $as_gl_bg_overlay_color; ?>;

	<?php
}

if(empty($as_gl_bg_overlay_opacity) === true){
	echo 'opacity: 0.8;';
}else if($as_gl_bg_overlay_opacity == 10){
	echo 'opacity: 1;';
}else{
	echo 'opacity: 0.'.$as_gl_bg_overlay_opacity.';';
}


?>

}

.sl-wrapper .sl-image .sl-caption{
<?php

if(empty($as_gl_title_opacity) === true){

	echo 'opacity: 0.8;';

}else if($as_gl_title_opacity == 10) {

	echo 'opacity: 1;';

}else{

	echo 'opacity: 0.'.$as_gl_title_opacity.';';

}


if(empty($as_gl_title_color ) === false){
	?>

  background: <?php echo $as_gl_title_color; ?>;

	<?php
}

if(empty($as_gl_title_text_color ) === false){
	?>

  color: <?php echo $as_gl_title_text_color; ?>;

	<?php
}

?>



}

#as_allery_main #as_allery_main_li{
<?php

if(empty($as_gl_Gallery_border ) === false){
	?>

  background-color: <?php echo $as_gl_Gallery_border; ?>;

	<?php
}



if(empty($as_gl_shadow_code) === false){
 echo $as_gl_shadow_code;
}
?>

}

#as_allery_main #as_allery_main_li:hover{

<?php

if(empty($as_gl_Gallery_border_hov_col ) === false){
	?>

  background-color: <?php echo $as_gl_Gallery_border_hov_col; ?>;

	<?php
}

?>


}



	</style>

		<?php
	}
	add_action('wp_head', 'as_gl_get_opt_css');
}

