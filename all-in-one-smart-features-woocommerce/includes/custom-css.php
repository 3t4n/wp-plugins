<?php

defined( 'ABSPATH' ) || exit;

if( !function_exists('swp_myplugins_custom_css') ){
function swp_myplugins_custom_css()			
	{
	?>	
<form action="options.php" method="post"  class="smart-woo-forms">	
 <?php 
 
  settings_fields( 'swp_myplugins_custom_css_options' );
  do_settings_sections( 'swp_myplugins_css_custom_css' ); 
 
 ?> 
<input type="submit" name="submit_form" class="button button-primary smart-woo-button" value="<?php esc_attr_e( ' SUBMIT ' ); ?>" />

</form>

<?php 
}
}	



add_action( 'wp_head','swp_custom_css_code' );
	
	if(!function_exists('swp_custom_css_code') ){		
	function swp_custom_css_code()

	{      
            $options = get_option( 'swp_myplugins_custom_css_options' );
			echo "<style>".$options['customcss']."</style>"; 
	}
	}
	
	function swp_myplugins_custom_css_settings() {
	register_setting( 'swp_myplugins_custom_css_options', 'swp_myplugins_custom_css_options', '' );

    add_settings_section( 'custom_css_settings', '', 'swp_myplugins_custom_css_heading', 'swp_myplugins_css_custom_css' );
     add_settings_field( 'swp_myplugins_custom_css_setting', '', 'swp_myplugins_custom_css_setting', 'swp_myplugins_css_custom_css', 'custom_css_settings' );
   
   
}
add_action( 'admin_init', 'swp_myplugins_custom_css_settings' );

function swp_myplugins_custom_css_heading() {
    echo '<h2 class="smart_woo_mainheading">Custom Css</h2>
<p class="smart_woo_intropara">Enter your CSS code in the field below. Do not include any tags or HTML in the field. Custom CSS entered here will override the theme CSS. In some cases, the !important tag may be needed. Dont URL encode image or svg paths. Contents of this field will be auto encoded.</p>';
}

function swp_myplugins_custom_css_setting() {
    $options = get_option( 'swp_myplugins_custom_css_options' );

	?>
	<div id="welcome-panel" class="welcome-panels mar">
		  
			<div class="welcome-panel-content">

	<div class="welcome-panel-column-container">

		<textarea   id="customcsseditor" cols="100" rows="5" name='swp_myplugins_custom_css_options[customcss]'><?php echo $options['customcss'];   ?></textarea>
		
				
	</div></div></div>
	


<?php
}

