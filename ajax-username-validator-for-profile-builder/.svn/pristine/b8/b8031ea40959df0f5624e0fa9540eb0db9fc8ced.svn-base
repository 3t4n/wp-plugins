<?php 
    /*
    Plugin Name: AJAX Username Validator for Profile Builder
    Plugin URI: http://zonneveldcloud.nl
    Description: Check if the username exist or not with AJAX and jQuery. Plugin works only with the Profile Builder plugin.
    Author: Zonneveld Cloud
    Version: 1.0.1
    Author URI: http://zonneveldcloud.nl
    */
?>

<?php

//include ajax
add_action( 'wp_head', 'add_ajax_library');

//START Ajax library toevoegen aan de front-end
function add_ajax_library() {
    $html = '<script type="text/javascript">';
    $html .= 'var ajaxurl = "' . admin_url( 'admin-ajax.php' ) . '"';
    $html .= '</script>';
    echo $html;
 
} 
//END Ajax library toevoegen aan de front-end

//START validator.js toevoegen na de jQuery, in de footer
function my_scripts_method() {
	wp_enqueue_script(
		'validator-script',
		plugins_url('/js/validator.js', __FILE__),
		array( 'jquery' ), false, true
	);
}

add_action('wp_enqueue_scripts', 'my_scripts_method');
//END validator.js toevoegen na de jQuery, in de footer

//START stylesheet toevoegen
add_action( 'wp_enqueue_scripts', 'add_stylesheets' );

function add_stylesheets() {
	wp_enqueue_style( 'prefix-style', plugins_url('css/style.css', __FILE__) );
}

//END stylesheet toevoegen

//START actie die door validator script wordt aangeroepen als AJAX request (zodra action = check_username)
add_action( 'wp_ajax_check_username', 'prefix_ajax_check_username' );

function prefix_ajax_check_username() {
	$username = $_POST["data"]["usernameToCheck"];
		
	if (username_exists($username)) {
		$available = 0;
	} else {
		$available = 1;
	} 
	
	echo $available;
	die(); //nodig omdat wordpress anders een 0 achter het resultaat plaatst om zelf alles te killen
}
//END actie die door validator script wordt aangeroepen als AJAX request (zodra action = check_username)

?>