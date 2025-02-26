<?php
// This registers the ability to have options for your plugin. 
// The options will be stored in rg_settings.
// You can also get these options using... $bst_options = get_option('bst_settings');
function bst_register_settings() {
	register_setting('bst_settings_group', 'bst_settings', 'bst_validation');
}
add_action('admin_init', 'bst_register_settings');

function bst_validation( $input ) {

    // Create our array for storing the validated options
    $output = array();
	global $defaults;

    foreach( $input as $key => $value ) {

      // Check to see if the current option has a value. If so, process it.
      if ( isset( $input[$key] ) ) {
		
		if ( $input[$key] === "" || empty($input[$key]) ) {
			$output[$key] = $defaults[$key];
		} else {
			$output[$key] = strip_tags( stripslashes( $input[ $key ] ) );
			$output[$key] = htmlspecialchars($output[$key]);
		}

      } // end if
    } // end foreach
  
  // Return the array processing any additional functions filtered by this action
  return apply_filters( 'bst_validation', $output, $input );
}
?>