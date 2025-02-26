<?php
/**
 * @package Insert Title
 * @version 1.2
 */
/*
Plugin Name: Insert Title
Plugin URI: https://ultimatetech.org/
Description: This plugin simply Insert post's or page's title in content area. If you are really sick of copying and pasting title in content again and again, then simply use this plugin because it comes with Shortcode button. Click on button from editor to insert the title of the page.
Author: Harman Singh Hira
Version: 1.2
Author URI: http://hsinghhira.me
*/

function ut_insert_title( ){
   return get_the_title();
}
add_shortcode( 'ut_pt', 'ut_insert_title' );

function ut_hsh_plugin_scripts($plugin_array)
{
    //enqueue TinyMCE plugin script with its ID.
    $plugin_array["ut_btn_cmd"] =  plugins_url('data',__FILE__) . '/index.js';
    return $plugin_array;
}

add_filter("mce_external_plugins", "ut_hsh_plugin_scripts");

function ut_hsh_register_buttons_editor($buttons)
{
    //register buttons with their id.
    array_push($buttons, "green");
    return $buttons;
}

add_filter("mce_buttons", "ut_hsh_register_buttons_editor");

function ut_hsh_shortcode_button_script() 
{
    if(wp_script_is("quicktags"))
    {
        ?>
            <script type="text/javascript">
                
                //this function is used to retrieve the selected text from the text editor
                function getSel()
                {
                    var txtarea = document.getElementById("content");
                    var start = txtarea.selectionStart;
                    var finish = txtarea.selectionEnd;
                    return txtarea.value.substring(start, finish);
                }

                QTags.addButton( 
                    "code_shortcode", 
                    "Insert Title", 
                    callback
                );

                function callback()
                {
                    var selected_text = getSel();
                    QTags.insertContent("[ut_pt]");
                }
            </script>
        <?php
    }
}

add_action("admin_print_footer_scripts", "ut_hsh_shortcode_button_script");

function ut_remove_footer_admin () {

echo '<span id="footer-thankyou">Fueled by <a href="http://www.wordpress.org" target="_blank">WordPress</a> | Developed with 💓 by <a href="http://www.hsinghhira.me" target="_blank"> Harman Singh Hira</a> @ <a href="http://www.ultimatetech.org" target="_blank">Ultimate Tech</a> | You can <a target="_blank" href="https://www.paypal.me/DSHira">buy me a Burger</a> 🍔</span>';

}

add_filter('admin_footer_text', 'ut_remove_footer_admin');



function ut_hsh_plugin_action_links( $links ) {
	$links = array_merge( array(
		'<b><a target="_blank" href="https://www.paypal.me/DSHira">' . __( '🍔 Buy me Burger :)', 'textdomain' ) . '</a></b>'
	), $links );
	return $links;
}
add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'ut_hsh_plugin_action_links' );