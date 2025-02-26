<?php
/*
Plugin Name: ABT Exit Disclosures
Plugin URI:  ...
Description: Provides a message to the user when being directed outside of the site. Example [abt-exit-disclosure link= target=] Target is optional and will be default to _self if left blank.
Version: 1.0.0
Author:  Will Haley, ABT
Author URI: http://atlanticbt.com
*/
 
add_shortcode( 'abt-exit-disclosure', 'abt_exit_disclosure' );

function abt_exit_disclosure( $attrs ) {
	if ( isset( $attrs['link'] ) ) {
		$link = $attrs['link'];
	} else {
		$link = '#';
	}
	
	if ( isset( $attrs['target'] ) ) {
		$target = $attrs['target'];
	} else {
		$target = '_self';
	}

	$html = array();
	$html[] = '<div class="disclosure-message">';
	$html[] = '	<div class="message">';
	$html[] = get_option('abt_exit_disclosure_message');
	$html[] = '	</div>';
	$html[] = '	<div class="link">';
	$html[] = '		<a href="' . $link . '" target="' . $target . '">Continue</a>';
	$html[] = '	</div>';
	$html[] = '</div>';	
	return implode("\n", $html);	
}

add_action('admin_menu', 'abt_exit_disclosure_admin_menu');

function abt_exit_disclosure_admin_menu() {
	
  add_options_page( 
  	'Exit Disclosure Message', 
  	'Exit Message', 
  	'manage_options',
  	'abt_exit_disclosure_message',
  	'abt_exit_disclosure_admin_settings'
  	);
}

function abt_exit_disclosure_admin_settings() {
	
	if ( isset( $_POST['abt_exit_disclosure_message'] ) ) {
		
		update_option('abt_exit_disclosure_message', $_POST['abt_exit_disclosure_message']);
	}
	
	$options = get_option('abt_exit_disclosure_message');
?>
<form action="options-general.php?page=abt_exit_disclosure_message" method="post">
<div>
[abt-exit-disclosure link= target=] Target is optional and will be default to _self if left blank.
</div>
<?php
	settings_fields('abt_exit_disclosure_message');
	wp_editor($options, 'abt_exit_disclosure_message');
?>
	<input class="primary" type="submit" value="submit" />
</form>
<?php
}