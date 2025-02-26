<?php

defined( 'ABSPATH' ) || exit;

if( !function_exists('swp_myplugins_smart_tracking') ){
function swp_myplugins_smart_tracking()			
	{
	?>	
<form action="options.php" method="post"  class="smart-woo-forms">	
 <?php 
 
  settings_fields( 'swp_myplugins_smart_tracking_options' );
  do_settings_sections( 'swp_myplugins_track_smart_tracking' ); 
 
 ?> 
<input type="submit" name="submit_form" class="button button-primary smart-woo-button" value="<?php esc_attr_e( ' SUBMIT ' ); ?>" />

</form>

<?php 
}
}	



add_action( 'wp_head','swp_head_tracking_code' );
	
	if(!function_exists('swp_head_tracking_code') ){		
	function swp_head_tracking_code()

	{     
            $options = get_option( 'swp_myplugins_smart_tracking_options' );
			echo $options['headtracking']; 
	}
	}
add_action( 'wp_body_open','swp_body_tracking_code' );
	
	if(!function_exists('swp_body_tracking_code') ){		
	function swp_body_tracking_code()

	{     
            $options = get_option( 'swp_myplugins_smart_tracking_options' );
			echo $options['bodytracking']; 
	}
	}

add_action( 'wp_footer','swp_abody_tracking_code' );
	
	if(!function_exists('swp_abody_tracking_code') ){		
	function swp_abody_tracking_code()

	{     
            $options = get_option( 'swp_myplugins_smart_tracking_options' );
			echo $options['abodytracking']; 
	}
	}	
	function swp_myplugins_smart_tracking_settings() {
	register_setting( 'swp_myplugins_smart_tracking_options', 'swp_myplugins_smart_tracking_options', '' );

    add_settings_section( 'smart_tracking_settings', '', 'swp_myplugins_smart_tracking_text', 'swp_myplugins_track_smart_tracking' );

    add_settings_field( 'swp_myplugins_smart_head_tracking_setting', '', 'swp_myplugins_smart_head_tracking_setting', 'swp_myplugins_track_smart_tracking', 'smart_tracking_settings' );
   
}
add_action( 'admin_init', 'swp_myplugins_smart_tracking_settings' );

function swp_myplugins_smart_tracking_text() {
    echo '<h2 class="smart_woo_mainheading">Smart Tracking Code</h2>
<p class="smart_woo_intropara">Code Fields (Tracking etc.)</p>
';
}

function swp_myplugins_smart_head_tracking_setting() {
    $options = get_option( 'swp_myplugins_smart_tracking_options' );

	?>
	<div id="welcome-panel" class="welcome-panels mar">
		  
			<div class="welcome-panel-content">

	<div class="welcome-panel-column-container">
	
	<h2 class="slabels">Space before head close tag</h2><p>(Only accepts javascript code wrapped with script tags)</p>
		<textarea  id="headeditor"  cols="100" rows="5" name='swp_myplugins_smart_tracking_options[headtracking]'><?php echo $options['headtracking'];   ?></textarea>
		
				
	</div></div></div>
	<div id="welcome-panel" class="welcome-panels mar">
		  
			<div class="welcome-panel-content">

	<div class="welcome-panel-column-container">
				
	<h2 class="slabels">Space after body close tag</h2><p>(Only accepts javascript code wrapped with script tags)</p>
	
		<textarea  id="bodyeditor"  cols="100" rows="5" name='swp_myplugins_smart_tracking_options[bodytracking]'><?php echo $options['bodytracking'];   ?></textarea>	
		
		</div></div></div>
	<div id="welcome-panel" class="welcome-panels mar">
		  
			<div class="welcome-panel-content">

	<div class="welcome-panel-column-container">
		<h2 class="slabels">Space after body close tag</h2><p>(Only accepts javascript code wrapped with script tags)</p>
	
		<textarea id="abodyeditor" cols="100" rows="5"  name='swp_myplugins_smart_tracking_options[abodytracking]'><?php echo $options['abodytracking'];   ?></textarea>					

	</div></div></div>


<?php
}

