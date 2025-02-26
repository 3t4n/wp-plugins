<?php

/*
Plugin Name: Avactis Shopping Cart Widget
Plugin URI: http://www.avactis.com/
Description: Avactis Shopping Cart Widget for Wordpress. Using this plugin you can integrate Avactis Shopping cart to your Wordpress blog.  1) Click the "Activate" link to the left of this description 2) Go to your <a href="plugins.php?page=avactis_options_page">Avactis configuration</a> page, and set the path to your online store.
Author: Pentasoft Corp.
Author URI: http://www.avactis.com/
Version: 1.5
*/

// Activation
register_activation_hook( __FILE__, 'avactis_activate' );

	function avactis_activate() {

       	$avactis_active = get_option("avactis_active");
        
        if(empty($avactis_active)) {
            add_option('avactis_path', '', '', 'yes'); // Path to avactis
            add_option('avactis_width', '760', '', 'yes');     // Width for avactis
            add_option('avactis_height', '600', '', 'yes'); 
            add_option('avactis_active', 'Y', '', 'yes');  
        } else {
           	update_option('avactis_active', 'Y');
        }
        
	}

// IFRAME
add_shortcode('Avactis shopping cart', 'shortcode_func');

function shortcode_func(){

    $avactis_path = get_avactis_path();
    if($avactis_path == '')
        return "Please define to Avactis path";
    
    $src = $avactis_path.'?asc_wp_req=true&wp_ret_url='.encodeURIComponent('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    $result = '<script type="text/javascript" src="wp-includes/js/jquery/jquery.js"></script>' .
              '<script type="text/javascript" src="wp-includes/js/jquery/jquery.postmessage.js"></script>' .
              '<iframe id="avactis_iframe" src="'.$src.'" width="'.get_avactis_width().'"  height="'.get_avactis_height().'"  scrolling="auto" frameborder="0"> </iframe>';

    $result .= "<script type='text/javascript'>
    jQuery(function(){
        var src ='".$src."';
        var if_height = 0;
        var iframe = jQuery('#avactis_iframe');
        var domain = src.match(/^(.+):\/\/(.+?)\/(.*)$/);
        if(domain && domain[1] && domain[2])
            domain = domain[1] + '://' + domain[2];
        else
            domain = '';


    });
    </script>";
              
    return $result;
}

function encodeURIComponent($str) {
    $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
    return strtr(rawurlencode($str), $revert);
}

// Service functions
if(is_version_27()) {
    add_action('admin_init', 'avactis_settings_init');
}

function avactis_settings_init() {
	register_setting('avactis_options_page', 'avactis_path');
	register_setting('avactis_options_page', 'avactis_width');
        register_setting('avactis_options_page', 'avactis_height');
}

function is_version_27(){
    global $wp_version;
    if(isset($wp_version) && version_compare($wp_version, '2.7', '>='))
        return true;
    else
        return false;
}

function get_avactis_path() {
    $avactis_path = get_option('avactis_path');
        if (empty($avactis_path)) {
            $avactis_path = '';
        }
    return $avactis_path;
}

function get_avactis_width() {
    $avactis_width = get_option('avactis_width');
        if (empty($avactis_width)) {
            $avactis_width = 760;
        }
    return $avactis_width;
}

function get_avactis_height() {
    $avactis_height = get_option('avactis_height');
        if (empty($avactis_height)) {
            $avactis_height = 600;
        }
    return $avactis_height;
}

// Options
add_action('admin_menu', 'avactis_options_add_page');

function avactis_options_add_page() {
	add_submenu_page('plugins.php', 'Avactis Configuration', 'Avactis Configuration', 'manage_options', 'avactis_options_page', 'avactis_options');
}

function avactis_plugin_action_links($links, $file) {
    
   	if ( $file == plugin_basename( dirname(__FILE__).'/avactis-shopping-cart.php' ) ) {
    	$links[] = '<a href="plugins.php?page=avactis_options_page">'.__('Settings').'</a>';
	}
    
	return $links;
}

add_filter( 'plugin_action_links', 'avactis_plugin_action_links', 10, 2);


function avactis_options() {

	?>
        <div class="wrap">
        <h2>Avactis configuration</h2>
        <form method="post" action="options.php">
                <?php
                if(is_version_27()) {
                    settings_fields('avactis_options_page'); 
                } else {
                    wp_nonce_field('update-options');
                    echo '<input type="hidden" name="action" value="update" />';
                    echo '<input type="hidden" name="page_options" value="avactis_path,avactis_width,avactis_height" />';
                }
                $avactis_path = get_avactis_path();
                $avactis_width = get_avactis_width();
                $avactis_height = get_avactis_height();
                ?>

                <table class="form-table">
                
                <tr valign="top">
                <th scope="row">Path To Avactis Shopping Cart:</th>
                <td><input type="text" name="avactis_path" size="80" value="<?php echo $avactis_path; ?>" /></td>
                </tr>

                <tr valign="top">
                <th scope="row">Width Of Avactis Shopping Cart:</th>
                <td><input type="text" name="avactis_width" size="80" value="<?php echo $avactis_width; ?>" /></td>
                </tr>
                
                <tr valign="top">
                <th scope="row">Height Of Avactis Shopping Cart:</th>
                <td><input type="text" name="avactis_height" size="80" value="<?php echo $avactis_height; ?>" /></td>
                </tr>
    
                </table>
                
                <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /> 
                 <a class="button-primary" href="mailto:support@avactis.com">Feedback</a>
                </p>
              
                			
                <h3>Avactis Shopping Cart instructions</h3>
                <p>To install the avactis Shopping Cart Widget you need:</p>
                
                        <ul style="padding-left:30px;list-style-type:disc;">
                        <li>Еnter the path to your online store in the "Path To Avactis Shopping Cart"</li>
                        <li>Add the tag (shortcode) " [Avactis shopping cart] " to the page where you want your online store</li>
                        <li>Then you can adjust the width and height of the IFRAME which is responsible for display your store. The optimal width is 760px and height is 600px.</li>
                        </ul>
                        
                <p>If you have any questions, feel free to contact our <a href="http://www.avactis.com/contact-avactis-support/">Support Team</a>. Your message will be send via secure HTTPS connection, we will respond to your enquiry or request within 12-48 hours.</p>
                
        </form>
        </div>
					
		<?php
		
}

?>
