<?php
/**
 * @package AnythigforHire
 * @version 1.0
 */
/*
Plugin Name: Anything for Hire
Plugin URI: anythingforhire.com
Description: Anything For Hire widget to be added on a wordpress site, so your website visitors can make use of our powerful free booking system and as a partner you can benefit from more leads from your website visitors.
Author: Anything for Hire
Version: 1.0
*/?>
<?php
// create custom plugin settings menu

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_action('admin_menu', 'afh_plugin_create_menu');
//add_action('wp_footer', 'afh_load_snippet');

function afh_plugin_create_menu() {

	//create new top-level menu
	add_menu_page('Anything for Hire', 'AFH Settings', 'administrator', __FILE__, 'afh_plugin_settings_page' , plugins_url('/favicon.png', __FILE__) );

	//call register settings function
	add_action( 'admin_init', 'register_afh_plugin_settings' );
	//add_action( 'wp_footer', 'anything_for_hire_load_snippet' );
	
}
function afh_load_snippet() {
//exit();
		
			echo("<script type='text/javascript' data-cfasync='false'>(function (a, b, c) {
        var f = new Date();
        var d = b.head ? b.head : b.body;
        var e = document.createElement('script');
        localStorage.setItem('afhid', '".get_option('afhpartnerid')."');
        localStorage.setItem('widget-location', '".get_option('widget-location')."');
        e.src = '//anythingforhire.com/assets/script/' + c;
        d.appendChild(e);
    })(window, document, 'widgetscript.js');</script>");
		
	}

function register_afh_plugin_settings() {
	//register our settings
	register_setting( 'afh-plugin-settings-group', 'afhpartnerid' );
	register_setting( 'afh-plugin-settings-group', 'widget-location' );
	
	
}

$partnerid = get_option('afhpartnerid');
$widgetlocation = get_option('widget-location');
if ($widgetlocation != '')
{
	add_action('wp_footer', 'afh_load_snippet');
}

function afh_plugin_settings_page() {
?>
<div class="wrap">
<img src="<?php echo plugins_url('/logo.png', __FILE__);?>"alt="Anything for Hire logo"/>
<h1>Anything for Hire Quote Widget</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'afh-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'afh-plugin-settings-group' ); ?>
    <p>Please enter your partner id received from Anything for Hire Partner Center</p>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Partner ID</th>
        <td><input type="text" name="afhpartnerid" value="<?php echo esc_attr( get_option('afhpartnerid') ); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Widget Location
        </th>
        <td><select name="widget-location">
	        <option value="left" <?php if (get_option('widget-location') == 'left') echo 'selected';?>>Left</option>
	        <option value="right" <?php if (get_option('widget-location') == 'right') echo 'selected';?>>Right</option>
	        <option value="bottom-left" <?php if (get_option('widget-location') == 'bottom-left') echo 'selected';?>>Bottom Left</option>
	        <option value="bottom-right" <?php if (get_option('widget-location') == 'bottom-right') echo 'selected';?>>Bottom Right</option>
        </select></td>
        </tr>
         
        
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>