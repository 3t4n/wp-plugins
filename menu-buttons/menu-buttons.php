<?php
/* 
Plugin Name: Menu Buttons
Plugin URI: http://cyberbundle.com
Description: Add buttons to your menu.
Version: 1.0
Author: Mattias Jönsson
Author URI: http://cyberbundle.com
License: GPL2 
*/

/*
@Adds script with color picker.
*/
add_action( 'admin_enqueue_scripts', 'mb_enqueue_color_picker' );

function mb_enqueue_color_picker( $hook_suffix ) {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugins_url('js/mb-colorpicker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

/*
@Adds menu page in Apperance.
*/
add_action('admin_menu', 'mb_add_admin_page');
function mb_add_admin_page() {
	    add_submenu_page ( 'themes.php', 'Menu Buttons Page', 'Menu Buttons', 'manage_options', 'mb_settings', 'mb_css_settings_page');
}

/*
@Saves options.
*/
add_action( 'admin_init', 'mb_save_settings' );

function mb_save_settings() {
		register_setting( 'mb-settings-group', 'mb-button-id1' );
	    register_setting( 'mb-settings-group', 'mb-color1' );
		register_setting( 'mb-settings-group', 'mb-hover1' );
		register_setting( 'mb-settings-group', 'mb-text1' );
		register_setting( 'mb-settings-group', 'mb-button-id2' );
	    register_setting( 'mb-settings-group', 'mb-color2' );
		register_setting( 'mb-settings-group', 'mb-hover2' );
		register_setting( 'mb-settings-group', 'mb-text2' );
		register_setting( 'mb-settings-group', 'mb-width1' );
		register_setting( 'mb-settings-group', 'mb-width2' );
		register_setting( 'mb-settings-group', 'mb-height1' );
		register_setting( 'mb-settings-group', 'mb-height2' );
		register_setting( 'mb-settings-group', 'mb-radius1' );
		register_setting( 'mb-settings-group', 'mb-radius2' );		
}

/*
@Menu page.
*/
function mb_css_settings_page() {
?>
<div class="wrap">
<h2>Menu Buttons</h2>
<form method="post" action="options.php">
    <?php settings_fields( 'mb-settings-group' ); ?>
    <?php do_settings_sections( 'mb-settings-group' );?>
	<h4>Get started:</h4>
	<p>1. Go to 'Apperance'->'Menus' and choose the menu link that should have a button. <br/>
	2. Insert &lt;button id="menubutton"&gt; before the navigation label name and &lt;/button&gt; after the name in the 'Navigation Label' field. Example: &lt;button id="menubutton"&gt; Menu Link Name &lt;/button&gt;<br/>
	3. Insert the button id, which is 'menubutton' in the example above but could be anything, in the 'Button ID' field below and start styling your menu button.
	</p>
	<table class="form-table">
    	<tr valign="top">
        <th scope="row"><h3>Button 1:</h3></th>
        </tr>
			
		<tr valign="top">
        <th scope="row">Button ID:</th>
        <td><input type="text" name="mb-button-id1" size="30" value="<?php echo get_option('mb-button-id1'); ?>" /></td>
        </tr>
		
		<tr valign="top">
        <th scope="row">Button Color:</th>
		<td><input type="text" name="mb-color1" value="<?php echo get_option('mb-color1'); ?>" class="my-color-field" /></td>
		</tr>
		
		<tr valign="top">
        <th scope="row">Text Color:</th>
		<td><input type="text" name="mb-text1" value="<?php echo get_option('mb-text1'); ?>" class="my-color-field" /></td>
		</tr>
		
		<tr valign="top">
        <th scope="row">Hover Color:</th>
		<td><input type="text" name="mb-hover1" value="<?php echo get_option('mb-hover1'); ?>" class="my-color-field" /></td>
		</tr>
		
		<tr valign="top">
        <th scope="row">Width:</th>
        <td><input type="number" min="1" max="15" name="mb-width1" size="10" value="<?php echo get_option('mb-width1'); ?>" /> <p>Default: 8em</p></td>
        </tr>
		
		<tr valign="top">
        <th scope="row">Height:</th>
        <td><input type="number" min="1" max="5" name="mb-height1" size="10" value="<?php echo get_option('mb-height1'); ?>" /> <p>Default: 2.5em</p></td>
        </tr>
		
		<tr valign="top">
        <th scope="row">Border-radius:</th>
        <td><input type="number" min="1" max="5" name="mb-radius1" size="10" value="<?php echo get_option('mb-radius1'); ?>" /> <p>Default: None</p></td>
        </tr>			
		
		
		
		<tr valign="top">
        <th scope="row"><h3>Button 2:</h3></th>
        </tr>
			
		<tr valign="top">
        <th scope="row">Button ID:</th>
        <td><input type="text" name="mb-button-id2" size="30" value="<?php echo get_option('mb-button-id2'); ?>" /></td>
        </tr>
		
		<tr valign="top">
        <th scope="row">Button Color:</th>
		<td><input type="text" name="mb-color2" value="<?php echo get_option('mb-color2'); ?>" class="my-color-field" /></td>
		</tr>
		
		<tr valign="top">
        <th scope="row">Text Color:</th>
		<td><input type="text" name="mb-text2" value="<?php echo get_option('mb-text2'); ?>" class="my-color-field" /></td>
		</tr>
		
		<tr valign="top">
        <th scope="row">Hover Color:</th>
		<td><input type="text" name="mb-hover2" value="<?php echo get_option('mb-hover2'); ?>" class="my-color-field" /></td>
		</tr>
		
		<tr valign="top">
        <th scope="row">Width:</th>
        <td><input type="number" min="1" max="15" name="mb-width2" size="10" value="<?php echo get_option('mb-width2'); ?>" /> <p>Default: 8em</p></td>
        </tr>
		
		<tr valign="top">
        <th scope="row">Height:</th>
        <td><input type="number" min="1" max="5" name="mb-height2" size="10" value="<?php echo get_option('mb-height2'); ?>" /> <p>Default: 2.5em</p></td>
        </tr>
		
		<tr valign="top">
        <th scope="row">Border-radius:</th>
        <td><input type="number" min="1" max="5" name="mb-radius2" size="10" value="<?php echo get_option('mb-radius2'); ?>" /> <p>Default: None</p></td>
        </tr>	

    </table>
    <?php submit_button(); ?>
</form>
</div>
<?php }

/*
@Sends stylesheet to wp_head.
*/
add_action('wp_head','mb_add_button_css');

function mb_add_button_css(){
$mb_button1 = get_option('mb-button-id1');
$mb_width1 = get_option('mb-width1');
$mb_height1 = get_option('mb-height1');
$mb_radius1 = get_option('mb-radius1');
$mb_button2 = get_option('mb-button-id2');
$mb_width2 = get_option('mb-width2');
$mb_height2 = get_option('mb-height2');
$mb_radius2 = get_option('mb-radius2');

		
?>
       <style type="text/css">
           <?php
		   //Button 1 CSS
		   if (!empty($mb_button1)) {
		   
		   echo "#" . $mb_button1 ?>{
				
		   background: <?php echo get_option('mb-color1');?>;
		   
           <?php if (empty($mb_width1)) { ?>
		   width : 8em;
		   <?php } else { ?>
		   width : <?php echo $mb_width1;?>em; 
		   <?php }
		   
		   if (empty($mb_height1)) { ?>
		   height : 2.5em;
		   <?php } else { ?>
		   height : <?php echo $mb_height1;?>em;
		   <?php }
		   
		   if (empty($mb_radius1)) {
		   } else { ?>
		   border-radius : <?php echo $mb_radius1;?>em;
		   <?php } ?>

           color: <?php echo get_option('mb-text1');?>;
           border-color: white;
           }
		   <?php }
		   
		   //Button 1 Hover CSS
		   if (!empty($mb_button1)) {
		   echo "#" . $mb_button1?>:hover{
		   background: <?php echo get_option('mb-hover1');?>;
		   }
		   <?php }
		   
           //Button 2 CSS
		   if (!empty($mb_button2)) {
		   echo "#" . $mb_button2?>{
		   background: <?php echo get_option('mb-color2');?>;
		   
		   <?php if (empty($mb_width2)) { ?>
		   width : 8em;
		   <?php } else { ?>
		   width : <?php echo $mb_width2;?>em;
		   <?php }
		   
           if (empty($mb_height2)) { ?>
		   height : 2.5em;
		   <?php } else { ?>
		   height : <?php echo $mb_height2;?>em;
		   <?php }
		   
		   if (empty($mb_radius2)) {
		   } else { ?>
		   border-radius : <?php echo $mb_radius2;?>em;
		   <?php } ?>
		   
           color: <?php echo get_option('mb-text2');?>;
           border-color: white;
           }
		   <?php }
		   
		   //Button 1 Hover CSS
		   if (!empty($mb_button2)) {
		   echo "#" . $mb_button2?>:hover{
		   background: <?php echo get_option('mb-hover2');?>;
		   }
		   <?php } ?>
       </style>
<?php
}
?>