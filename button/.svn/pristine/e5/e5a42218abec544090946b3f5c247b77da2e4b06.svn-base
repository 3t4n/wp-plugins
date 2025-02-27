<?php 
$id 				= $post->ID;
$custom_data 		= json_decode(get_post_meta( $id,'button_custom_setting_'.$id, true));
if(!(isset($custom_data->button_layout) && isset($id))){	
	$custom_data = json_decode(button_default_settings());	
} 
?>
<h2 class="set-seprator" style="margin-top: 0!important;"><?php esc_html_e('Select Your Button Style', 'button'); ?></h2>
<h4><?php esc_html_e('Single Button', 'button'); ?></h4>
<div class="buton_layout_container">

	<?php $nonce = wp_create_nonce( 'button-setting-nonce' );  ?>

	<input type="hidden" name="_mywpnonce" value="<?php echo esc_attr($nonce)?>">

	<input type="radio" name="button_layout" id="simple_button" data-wdbutton="buttons" value="simple_button" <?php echo esc_attr(($custom_data->button_layout =='simple_button'))?'checked':''; ?>>
	<label for="simple_button">
		<img src="<?php echo esc_url( BUTTON_URL.'assets/images/layouts/layout-1.png'); ?>">
		<h2 align="center" class="h2"><?php esc_html_e( 'Simple Button', 'button' ); ?></h2>
		<a target="_blank" href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/'); ?>"><?php esc_html_e( 'Demo', 'button' ); ?></a>
	</label>
	
	<label for="2d_transitions">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/button-pro'); ?>"><span><?php esc_html_e( 'Premium', 'button' ); ?></span></a></div>
		<img src="<?php echo esc_url(BUTTON_URL.'/assets/images/layouts/2d-transition-layout.png');?>">
		<h2 align="center" class="h2"><?php  esc_html_e( '2D Transitions', 'button' ); ?></h2>
		<a target="_blank" href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/2d-transitions/'); ?>"><?php esc_html_e( 'Demo', 'button' ); ?></a>
	</label>

	<label for="border_transitions">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/button-pro'); ?>"><span><?php esc_html_e( 'Premium', 'button' ); ?></span></a></div>
		<img src="<?php echo esc_url(BUTTON_URL.'/assets/images/layouts/border-transitions.png');?>">
		<h2 align="center" class="h2"><?php esc_html_e( 'Border Transitions', 'button' ); ?></h2>
		<a target="_blank" href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/border-transitions/'); ?>"><?php esc_html_e( 'Demo', 'button' ); ?></a>
	</label>
	
	<label for="curl">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/button-pro'); ?>"><span><?php esc_html_e( 'Premium', 'button' ); ?></span></a></div>
		<img src="<?php echo esc_url(BUTTON_URL.'/assets/images/layouts/curl-layout.png');?>">
		<h2 align="center" class="h2"><?php esc_html_e( 'Curl', 'button' ); ?></h2>
		<a target="_blank" href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/curl/'); ?>"><?php esc_html_e( 'Demo', 'button' ); ?></a>
	</label>
	
	<label for="speech_bubbles">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/button-pro'); ?>"><span><?php esc_html_e( 'Premium', 'button' ); ?></span></a></div>
		<img src="<?php echo esc_url(BUTTON_URL.'/assets/images/layouts/speech-bouble-layout.png');?>">
		<h2 align="center" class="h2"><?php esc_html_e( 'Speech Bubble', 'button' ); ?></h2>
		<a target="_blank" href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/speech-bubble/'); ?>"><?php esc_html_e( 'Demo', 'button' ); ?></a>
	</label>

	<label for="background_transitions">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/button-pro'); ?>"><span><?php esc_html_e( 'Premium', 'button' ); ?></span></a></div>
		<img src="<?php echo esc_url(BUTTON_URL.'/assets/images/layouts/background-transition-layout.png');?>">
		<h2 align="center" class="h2"><?php esc_html_e( 'BG Transition', 'button' ); ?></h2>
		<a target="_blank" href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/bg-transition/'); ?>"><?php esc_html_e( 'Demo', 'button' ); ?></a>
	</label>

	<label for="icons">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/button-pro'); ?>"><span><?php esc_html_e( 'Premium', 'button' ); ?></span></a></div>
		<img src="<?php echo esc_url(BUTTON_URL.'/assets/images/layouts/icon-simple.png');?>">
		<h2 align="center" class="h2"><?php esc_html_e( 'Icon Button', 'button' ); ?></h2>
		<a target="_blank" href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/icon-button/'); ?>"><?php esc_html_e( 'Demo', 'button' ); ?></a>
	</label>	
	
	<label for="icon_with_text">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/button-pro'); ?>"><span><?php esc_html_e( 'Premium', 'button' ); ?></span></a></div>
		<img src="<?php echo esc_url(BUTTON_URL.'/assets/images/layouts/icon-with-text.png');?>">
		<h2 align="center" class="h2"><?php esc_html_e( 'Icon With Text', 'button' ); ?></h2>
		<a target="_blank" href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/icon-with-text/'); ?>"><?php esc_html_e( 'Demo', 'button' ); ?></a>
	</label>
	
	<label for="hexagons">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/button-pro'); ?>"><span><?php esc_html_e( 'Premium', 'button' ); ?></span></a></div>
		<img src="<?php echo esc_url(BUTTON_URL.'/assets/images/layouts/hexagons-layout.png');?>">
		<h2 align="center" class="h2"><?php esc_html_e( 'Hexagon', 'button' ); ?></h2>
		<a target="_blank" href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/hexagon/'); ?>"><?php esc_html_e( 'Demo', 'button' ); ?></a>
	</label>

	<label for="dropdown">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/button-pro'); ?>"><span><?php esc_html_e( 'Premium', 'button' ); ?></span></a></div>
		<img src="<?php echo esc_url(BUTTON_URL.'/assets/images/layouts/drop-down.png');?>">
		<h2 align="center" class="h2"><?php esc_html_e( 'Drop-down', 'button' ); ?></h2>
		<a target="_blank" href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/drop-down/'); ?>"><?php esc_html_e( 'Demo', 'button' ); ?>	</a>
	</label>
	
</div>

<!--------------button sets------------>

<h4><?php esc_html_e('Social Button Sets', 'button'); ?></h4>
<div class="buton_layout_container buton_sets_container">
	<label for="social_button_set_with_icon">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/button-pro'); ?>"><span><?php esc_html_e( 'Premium', 'button' ); ?></span></a></div>
		<img src="<?php echo esc_url(BUTTON_URL.'/assets/images/layouts/social-set-1.png');?>">		
		<a target="_blank" href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/social-button-sets/'); ?>"><?php esc_html_e( 'Demo', 'button' ); ?></a>
	</label>
	
	<label for="social_model_1">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/button-pro'); ?>"><span><?php esc_html_e( 'Premium', 'button' ); ?></span></a></div>
		<img src="<?php echo esc_url(BUTTON_URL.'/assets/images/layouts/social-set-2.png');?>">	
		<a target="_blank" href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/social-button-sets/'); ?>"><?php esc_html_e( 'Demo', 'button' ); ?></a>
	</label>

	<label for="social_model_2">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/button-pro'); ?>"><span><?php esc_html_e( 'Premium', 'button' ); ?></span></a></div>
		<img src="<?php echo esc_url(BUTTON_URL.'/assets/images/layouts/social-set-3.png');?>">	
		<a target="_blank" href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/social-button-sets/'); ?>"><?php esc_html_e( 'Demo', 'button' ); ?></a>
	</label>
	
	<label for="social_model_3">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/button-pro'); ?>"><span><?php esc_html_e( 'Premium', 'button' ); ?></span></a></div>
		<img src="<?php echo esc_url(BUTTON_URL.'/assets/images/layouts/social-set-4.png');?>">	
		<a target="_blank" href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/social-button-sets/'); ?>"><?php esc_html_e( 'Demo', 'button' ); ?></a>
	</label>

	<label for="social_model_4">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/button-pro'); ?>"><span><?php esc_html_e( 'Premium', 'button' ); ?></span></a></div>
		<img src="<?php echo esc_url(BUTTON_URL.'/assets/images/layouts/social-set-5.png');?>">		
		<a target="_blank" href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/social-button-sets/'); ?>"><?php esc_html_e( 'Demo', 'button' ); ?></a>
	</label>
	
	<label for="social_model_5">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/button-pro'); ?>"><span><?php esc_html_e( 'Premium', 'button' ); ?></span></a></div>
		<img src="<?php echo esc_url(BUTTON_URL.'/assets/images/layouts/social-set-6.png');?>">		
		<a target="_blank" href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/social-button-sets/'); ?>"><?php esc_html_e( 'Demo', 'button' ); ?></a>
	</label>
	
	<label for="social_model_6">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/button-pro'); ?>"><span><?php esc_html_e( 'Premium', 'button' ); ?></span></a></div>
		<img src="<?php echo esc_url(BUTTON_URL.'/assets/images/layouts/social-set-7.png');?>">			
		<a target="_blank" href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/social-button-sets/'); ?>"><?php esc_html_e( 'Demo', 'button' ); ?></a>
	</label>	
</div>