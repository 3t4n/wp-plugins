<?php
/*
 Plugin Name: Activator plugin
 Plugin URI: www.ddd.com
 Description: This plugin will let you use jquery and other scripts in your pager,posts
 Author: Csernatoni Iosif
 Version: 1.0
 Author URI: www.ddd.com
 */
//including the admin interface
require_once 'shortgen.php';
//function used to store in a static array data, I use this to not use globals
function act_var_store($my_var_name=NULL,$my_var=NULL,$action="read"){
	static $vars=array();
	if ($action == "write"){
		$vars[$my_var_name] = $my_var;
	} else {
	return $vars[$my_var_name];
	}
}


//the shortcode is created here
function my_shortcode_handler($atts, $content=NULL) {
	act_var_store("counter",1, "write");
	shortcode_atts(array("name"=> "my-script", "url" =>"my-script.js","dependencies" =>"jquery"), $atts);
    act_var_store("name",$atts['name'], "write");
    act_var_store("url",$atts['url'], "write");
    act_var_store("dependencies",$atts['dependencies'], "write");  
        // actual shortcode handling here
		
}
add_shortcode('scriptact', 'my_shortcode_handler');

//is called the function witch includes the scripts


function print_my_script() {
        if ( ! act_var_store("counter") )
                return;
           wp_register_script(act_var_store("name"), plugins_url(act_var_store("url") , __FILE__), array(act_var_store("dependencies")),"1.0", true);

        wp_print_scripts(act_var_store("name",$atts['name']));
}
add_action('wp_footer', 'print_my_script');