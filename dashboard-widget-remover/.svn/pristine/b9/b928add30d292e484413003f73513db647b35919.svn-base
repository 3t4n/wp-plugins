<?php

/*
Plugin Name: Dashboard Widget Remover
Plugin URI: http://wordpress.org/extend/plugins/dashboard-widget-remover/
Description: Easily remove any/all of the default WordPress dashboard widgets for specific user role. Useful for multi-user blog.
Author: Zihad Tarafdar
Author URI: http://rhymix.wordpress.com
Version: 1.0
*/

/*
Copyright (C) 2010 Zihad Tarafdar, xihad76 AT gmail DOT com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

// disallow direct access to the plugin file
if (basename($_SERVER['PHP_SELF']) == basename (__FILE__)) {
die("Sorry,you can't access this page directly!");
}

// add options page to wordpress
function zt_dashboard_widget_menu() {
  add_options_page('Dashboard Widget','Dashboard Widget',10,__FILE__,'zt_dashboard_widget_options');
}

//register_settings 
add_action('admin_init','zt_dwidget_init');

function zt_dwidget_init(){
register_setting('zt_dashboard_widget_options','dwidget_options');

}

// option page for the plugin

function zt_dashboard_widget_options() {
?>
<div class="wrap">
<h2>Dashboard Widget Remover</h2>
<h3>check the option to remove respective dashboard widget from specific user role. </h3>
	<form method="post" action="options.php">
	<?php settings_fields('zt_dashboard_widget_options'); ?>
	<?php $options = get_option('dwidget_options');?>
<table class="form-table">
<?php $dwidget = array(
'Dashboard Right Now' => 'dright_now',
'Incoming Links' => 'dincoming_links',
'Plugins'=>'dplugins',
'Recent Comments'=> 'drecent_comments',
'Quick Press' => 'dquick_press',
'Recent Drafts' => 'drecent_drafts',
'WP dev Blog' => 'dprimary',
'Other WP News' => 'dsecondary'

);

foreach ($dwidget as $key=> $value){

?>
<tr>
				<th scope="row"><?php echo $key; ?></th>
				<td>
				<fieldset>
				<legend class="screen-reader-text"><span><?php echo $key; ?></span></legend>

					<label for="dwidget_options[<?php echo $value; ?>_administrator]">
					<input name="dwidget_options[<?php echo $value; ?>_administrator]" type="checkbox" id="<?php echo $value; ?>" value="1"
					<?php
					if (isset($options[''.$value.'_administrator'])) {
						checked('1', $options[''.$value.'_administrator']);
					}
					?>
					 />
					Administrator
					</label>

<label for="dwidget_options[<?php echo $value; ?>_editor]">
					<input name="dwidget_options[<?php echo $value; ?>_editor]" type="checkbox" id="<?php echo $value; ?>" value="1"
					<?php
					if (isset($options[''.$value.'_editor'])) {
						checked('1', $options[''.$value.'_editor']);
					}
					?>
					 />
					Editor
					</label>
<label for="dwidget_options[<?php echo $value; ?>_author]">
					<input name="dwidget_options[<?php echo $value; ?>_author]" type="checkbox" id="<?php echo $value; ?>" value="1"
					<?php
					if (isset($options[''.$value.'_author'])) {
						checked('1', $options[''.$value.'_author']);
					}
					?>
					 />
					Author
					</label>
					
<label for="dwidget_options[<?php echo $value; ?>_contributor]">
					<input name="dwidget_options[<?php echo $value; ?>_contributor]" type="checkbox" id="<?php echo $value; ?>" value="1"
					<?php
					if (isset($options[''.$value.'_contributor'])) {
						checked('1', $options[''.$value.'_contributor']);
					}
					?>
					 />
					Contributor

					</label>
<label for="dwidget_options[<?php echo $value; ?>_subscriber]">
					<input name="dwidget_options[<?php echo $value; ?>_subscriber]" type="checkbox" id="<?php echo $value; ?>" value="1"
					<?php
					if (isset($options[''.$value.'_subscriber'])) {
						checked('1', $options[''.$value.'_subscriber']);
					}
					?>
					 />
					Subscriber
					</label>					
				</fieldset></td>
			</tr>

<?php
}

?>

</table>


<p class="submit">
		<input type="submit" class="button-primary" value="<?php _e('Save  options') ?>" />
		</p>
</form>
</div>

<?php
}

//get the work done here


function zt_dashboard_widget_remover(){

    global $wp_meta_boxes;
    $options = get_option('dwidget_options');
    $current_role_user = zt_userrole();
    
    if ( isset($options['dright_now_'.$current_role_user]) && $options['dright_now_'.$current_role_user] == 1) {
      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    }
    
    if (isset($options['dincoming_links_'.$current_role_user]) && $options['dincoming_links_'.$current_role_user] == 1) {
      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    }
    
    if (isset($options['dplugins_'.$current_role_user]) && $options['dplugins_'.$current_role_user] == 1) {
      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    }
    
    if (isset($options['drecent_comments_'.$current_role_user]) && $options['drecent_comments_'.$current_role_user] == 1) {
      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    }
    
    if (isset($options['dquick_press_'.$current_role_user]) && $options['dquick_press_'.$current_role_user] == 1) {
      unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    }
    
    if (isset($options['drecent_drafts_'.$current_role_user]) && $options['drecent_drafts_'.$current_role_user] == 1) {
      unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
    }
    
    if (isset($options['dprimary_'.$current_role_user]) && $options['dprimary_'.$current_role_user] == 1 ) {
      unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    }
    
    if (isset($options['dsecondary_'.$current_role_user]) && $options['dsecondary_'.$current_role_user] == 1) {
      unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);  
    }
    


}


// return the user role of the logged in user

function zt_userrole() {
	
	global $current_user;

	$user_roles = $current_user->roles;
	$user_role = array_shift($user_roles);

	return $user_role;
}
	
	

//  action hooks

add_action('admin_menu','zt_dashboard_widget_menu');
add_action('wp_dashboard_setup','zt_dashboard_widget_remover');
?>
