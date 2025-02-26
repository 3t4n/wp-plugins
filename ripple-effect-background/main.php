<?php
/*
Plugin Name: Ripple Effect Background
Description: Add ripple effect to where ever you need.
Text Domain: ripple-effect-background-wp
Author: Younes Vatankhah
Author URI: https://github.com/younesvatan78/ripple-effect-background-wp
License: GPLv2
Version: 1.0.0

*/
defined( 'ABSPATH' ) or die( 'Unauthorized Access!' );

   
  


  function wp_ripple_effect_add_menu_page(){
    add_menu_page(
    __('Ripple Effect Background', 'ripple-effect-backgroud-wp'),
    __('Ripple Effect Background', 'ripple-effect-backgroud-wp'),
    'manage_options',
    'wp_ripple_effect_background',
    'wp_ripple_effect_render_menu_page',
    'dashicons-image-filter',
    99);
	}
add_action( 'admin_menu', 'wp_ripple_effect_add_menu_page' );

function wp_ripple_effect_admin_enqueue_scripts(){
    wp_enqueue_style('wp_ripple_effect_admin-css-style',plugins_url('includes/css/admin.css',__FILE__));
}
add_action('admin_enqueue_scripts','wp_ripple_effect_admin_enqueue_scripts');





function wp_ripple_effect_render_menu_page() {
	
	

	wp_enqueue_script( 'ripple_effect-admin-js', plugins_url( '/includes/js/admin.js',__FILE__ ));

	wp_enqueue_script('media-library',plugins_url('includes/js/media-library.js', __FILE__ ), array( 'jquery' ));
	 
	$nonce =  empty( $_POST['ripple_effect-nonce'] ) ? false : sanitize_text_field( $_POST['ripple_effect-nonce'] );
	$nonce_ok = wp_verify_nonce( $nonce, 'ripple-effect-dash' );
	
	
	$enable_front_page = get_option( 'ripple_effect-enable_front_page', false );
	$enable_blog_page = get_option( 'ripple_effect-enable_blog_page', false );
		
	if( $nonce_ok ) {
		
		$first_text = empty( $_POST['first_text'] ) ? false : wp_kses_post( stripslashes_deep( $_POST['first_text'] ) );

		$animated_text = empty( $_POST['animated_text'] ) ? false : wp_kses_post( stripslashes_deep( $_POST['animated_text'] ) );

		$second_text = empty( $_POST['second_text'] ) ? false : wp_kses_post( stripslashes_deep( $_POST['second_text'] ) );

		
		$img = empty( $_POST['ripple_effect']['select_img_ripple_effect'] )? false: $img = sanitize_text_field($_POST['ripple_effect']['select_img_ripple_effect']); 

		$btn1_label = empty( $_POST['ripple_effect']['btn1_label'] ) ? false: $btn1_label = sanitize_text_field( $_POST['ripple_effect']['btn1_label'] );

		$btn2_label = empty( $_POST['ripple_effect']['btn2_label'] ) ? false: $btn2_label = sanitize_text_field( $_POST['ripple_effect']['btn2_label'] );
		
		$btn1_link = empty( $_POST['ripple_effect']['btn1_link'] ) ? false: $btn1_link = esc_url( $_POST['ripple_effect']['btn1_link'] );

		$btn2_link = empty( $_POST['ripple_effect']['btn2_link'] ) ? false: $btn2_link = esc_url( $_POST['ripple_effect']['btn2_link'] );

		
		
		$enable_front_page = empty( $_POST['ripple_effect']['enable_front_page'] ) ? false : true;
		$enable_blog_page = empty( $_POST['ripple_effect']['enable_blog_page'] ) ? false : true;
		
		update_option( 'animated_text',$animated_text );
		update_option( 'first_text',$first_text );
		update_option( 'second_text',$second_text );
		update_option( 'select_img_ripple_effect',$img );		
		update_option( 'ripple_effect-enable_front_page', $enable_front_page );
		update_option( 'ripple_effect-enable_blog_page', $enable_blog_page );
		update_option( 'btn1_label',$btn1_label );
		update_option( 'btn1_link',$btn1_link );
		update_option( 'btn2_label',$btn2_label );
		update_option( 'btn2_link',$btn2_link );
		


	}
	
	if ( !empty( $_POST ) && !$nonce_ok ) {
		echo '<div class="ripple-effect-dash error"><p>Request failed, try login again please.</p></div>';
	}
	
?>

<form method='post' id='ripple_effect_admin_settings_form'>
	<?php wp_nonce_field( 'ripple-effect-dash', 'ripple_effect-nonce' ) ?>
	<div class='ripple-effect-dash'>
		<h1>Ripple effect background</h1>
		
		<p><button type='submit' class='button button-primary' style='min-width: 140px;'> Save</button></p>
	</div>
	<div class='ripple-effect-dash'>		
		<h2>Shortcode</h2>
		<div class='setting'>
				<input type='text' value='[ripple-effect-background]' onclick='this.select()' readonly >
		</div>
	</div>
	<div class='ripple-effect-dash'>
		<h2>Content</h2>
		<div class='setting'>
			<h3 style="font-size: 15px;">Backgound</h3>
			<?php
			$value = get_option( 'select_img_ripple_effect' ); ?>
				<input id="upload_image" type="hidden" size="36" name="ripple_effect[select_img_ripple_effect]"value="<?php echo $value; ?>" />

				<img id="imgClickAndChange" style="display:flex; max-height: 300px; max-width: 300px" src="<?php  	echo $value; ?>">

				<div style = "display: block">
					<input id="upload_image_button" style="margin : 20px 10px!important" class="button"      	type="button" value="Select" />

					<input id="remove_image_button"style="margin : 20px 10px!important" class="button" type="button" value="Remove" />
				</div>


				<div>
					<h2>Title</h2>
					<?php
					$first_text = stripslashes_deep(get_option('first_text'));
					wp_editor( $first_text, 'first_text' );?>
				</div>

				<div>
					<br>
					<h2>Animated text</h2>
					<i>If you want each text to animate and move separatly hit enter after each text :)</i>
					<?php
					$animated_text = stripslashes_deep(get_option('animated_text'));
					wp_editor( $animated_text, 'animated_text' );?>
				</div>


				<div>
					<br>
					<h2>Dicriptions for buttons</h2>
					<?php
					$second_text = stripslashes_deep(get_option('second_text'));
					wp_editor( $second_text, 'second_text' );?>
				</div>

				<div class="btn-box">
					<?php 
					$value2_label = get_option('btn2_label');
					$value2_link = get_option('btn2_link');?>

					<h3>دکمه یک</h3>
					<label class="label">Button label</label>
					<input type="text" name="ripple_effect[btn2_label]" value="<?php echo $value2_label; ?>">

					<label class="label">Link</label>
					<input type="url" name="ripple_effect[btn2_link]" value="<?php echo $value2_link; ?>">
					<?php
					$value1 = get_option('btn1_label');
					$value2 = get_option('btn1_link'); ?>

					<h3>دکمه دو</h3>
					<label class="label">Button label</label>
					<input type="text" name="ripple_effect[btn1_label]" value="<?php echo $value1; ?>">

					<label class="label">Link</label>
					<input type="url" name="ripple_effect[btn1_link]" value="<?php echo $value2; ?>">			
				</div>
		</div>
	</div>
</form>

<?php 
}
	
	add_action('wp_enqueue_scripts','ripple_effect_scripts');
	add_shortcode( 'ripple-effect-background','ripple_effect_display');
	
	function ripple_effect_display( $atts,$content = null ) {
		
		
		$first_text = stripslashes_deep(get_option('first_text'));
		$animated_text = stripslashes_deep(get_option('animated_text'));
		$second_text = stripslashes_deep(get_option('second_text'));
		$btn1_label = stripslashes_deep(get_option('btn1_label'));
		$btn2_label = stripslashes_deep(get_option('btn2_label'));
		$btn1_link = stripslashes_deep(get_option('btn1_link'));
		$btn2_link = stripslashes_deep(get_option('btn2_link'));


		$img = sanitize_text_field(get_option('select_img_ripple_effect'));
		wp_enqueue_script( 'ripple-effect-main-js' );
		wp_enqueue_script( 'typed-js' );
		wp_enqueue_script( 'ripples' );
		wp_enqueue_script( 'jquery-ripple-effect' );
		
		$if = function ($condition, $true, $false) { return isset($condition) ? $true : $false; };
		
		
		if(!$first_text): $first_text_has_value = null; else: $first_text_has_value = $first_text; endif;

		if(!$animated_text): $animated_has_value = null; else: $animated_has_value = '<div class="text-right" id="typed-strings">'.$animated_text.'</div><h3><span id="typed"></span></h3>'; endif;

		if(!$second_text): $second_text_has_value = null; else: $second_text_has_value = $second_text; endif;

		if(!$btn1_label): $btn_one_has_value = null; else: $btn_one_has_value = '<a href="'.$btn1_link.'" class="btn-ripple-effect view-demo">'.$btn1_label.'</a>'; endif;

		if(!$btn2_label): $btn_two_has_value = null; else: $btn_two_has_value = '<a href="'.$btn2_link.'" class="btn-ripple-effect buy-now" data-scroll-nav="1">'.$btn2_label.'</a>'; endif;


		
		return '
		<section class="hero-area-fix" style="background: url('.$img.') no-repeat scroll center center;">
		<div class="hero-area" id="water">
			<div class="container">
				<div class="row-ripple-effect">
					<div class="hero-text">
						'.$first_text.'
						'.$animated_has_value.'
						<div style="direction:rtl;">'.$second_text.'</div>
						'.$btn_two_has_value.'
						'.$btn_one_has_value.'
					</div>
				</div>
			</div>
		</div>
	</section>
	';
	}
	

	


	function ripple_effect_scripts() {
		wp_enqueue_style( 'pg-style',plugins_url( 'includes/css/style.css', __FILE__ ), array());
		
		

		wp_enqueue_script('typed-js', plugins_url( 'includes/js/typed.min.js', __FILE__ ), array( 'jquery' ),'',true);


		wp_enqueue_script('ripples', plugins_url( 'includes/js/jquery.ripples-min.js', __FILE__ ), array( 'jquery' ),'',true);

		wp_enqueue_script('ripple-effect-main-js', plugins_url( 'includes/js/main.js', __FILE__ ), array( 'jquery' ),'',true);

		
	}
	





?>