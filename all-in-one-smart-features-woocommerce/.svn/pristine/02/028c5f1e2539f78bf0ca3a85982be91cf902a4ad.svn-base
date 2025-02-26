<?php

defined( 'ABSPATH' ) || exit;

if( !function_exists('swp_myplugins_smart_woo_trust_image') ){
function swp_myplugins_smart_woo_trust_image()			
	{
	?>	
<form action="options.php" method="post"  class="smart-woo-forms">	
 <?php 
 
  settings_fields( 'swp_myplugins_smart_woo_options' );
  do_settings_sections( 'swp_myplugins_smart_woo' ); 
 
 ?> 
<input type="submit" name="submit_form" class="button button-primary smart-woo-button" value="<?php esc_attr_e( 'Save' ); ?>" />

</form>

<?php 
}
}	



add_action( 'woocommerce_after_add_to_cart_button','swp_add_wplr_trusted_images' );
	
	if(!function_exists('swp_add_wplr_trusted_images') ){		
	function swp_add_wplr_trusted_images()

	{     
            $options = get_option( 'swp_myplugins_smart_woo_options' );
			$value =  $options['trust_image'] ;
		if($value == 1){

		echo '<div class="wpl_cls"><img src="'.plugin_dir_url( dirname( __FILE__ ) ).'/uploads/trustimage1.png'.'"  /></div>';


		}	
    ;
		if($value == 2){	

		echo '<div class="wpl_cls"><img src="'.plugin_dir_url( dirname( __FILE__ ) ).'/uploads/trustimage2.png'.'"  /></div>';	
		
		}	
		if($value == 3){	

		echo '<div class="wpl_cls"><img src="'.plugin_dir_url( dirname( __FILE__ ) ).'/uploads/trustimage3.png'.'"  /></div>';	
		
		}		

	}	
	}
	
	
	function swp_myplugins_smart_woo_settings() {
	register_setting( 'swp_myplugins_smart_woo_options', 'swp_myplugins_smart_woo_options', '' );

    add_settings_section( 'trust_image_settings', '', 'swp_myplugins_smart_woo_text', 'swp_myplugins_smart_woo' );

    add_settings_field( 'swp_myplugins_smart_woo_setting_trust_image', 'Select Image', 'swp_myplugins_smart_woo_setting_trust_image', 'swp_myplugins_smart_woo', 'trust_image_settings' );
   
}
add_action( 'admin_init', 'swp_myplugins_smart_woo_settings' );

function swp_myplugins_smart_woo_text() {
    echo '<h2 class="smart_woo_mainheading">Smart Woo Trustable Image</h2>
<p class="smart_woo_intropara">Choose the images below and it will be shown on the product page. This help in increasing brand trust among buyers.</p>
';
}

function swp_myplugins_smart_woo_setting_trust_image() {
    $options = get_option( 'swp_myplugins_smart_woo_options' );

	?>
	<div id="welcome-panel" class="welcome-panels">
		  
			<div class="welcome-panel-content">

	<div class="welcome-panel-column-container">
	<!--<div class="welcome-panel-columns">
	<div class="colf">
		<input type="radio"  name='swp_myplugins_smart_woo_options[trust_image]' <?php if($options['trust_image'] == 1){echo 'checked="checked"';} ?> value="1"/></div><div class="coll"><img class="trust-img" src="<?php echo esc_url(plugin_dir_url( dirname( __FILE__ ) ).'/uploads/trustimage1.png');?> "  />	</div>			
					
			</div>-->
			<div class="welcome-panel-columns">
				<div class="colf">
		<input type="radio"  name='swp_myplugins_smart_woo_options[trust_image]'  <?php if($options['trust_image'] == 2){echo 'checked="checked"';} ?> value="2"/></div><div class="coll"><img class="trust-img" src="<?php echo esc_url(plugin_dir_url( dirname( __FILE__ ) ).'/uploads/trustimage2.png');?> "  /></div>		
		
	</div>
	<div class="welcome-panel-columns welcome-panel-last">
		<div class="colf">
		<input type="radio"  name='swp_myplugins_smart_woo_options[trust_image]' <?php if( $options['trust_image'] == 3){echo 'checked="checked"';} ?> value="3"/></div><div class="coll"><img class="trust-img" src="<?php echo esc_url(plugin_dir_url( dirname( __FILE__ ) ).'/uploads/trustimage3.png');?> "  /></div>		
		
	</div>
	
	</div>
				
	</div>
</div>
<?php
}
