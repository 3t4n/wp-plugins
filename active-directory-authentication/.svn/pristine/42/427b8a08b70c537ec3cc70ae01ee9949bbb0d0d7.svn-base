<?php
/*
Plugin Name: Active Directory Authentication
Version: 1.0.5
Plugin URI: http://soc.qc.edu/jonathan/wordpress-ad-auth
Description: Allows WordPress to authenticate users through Active Directory
Author: Jonathan Marc Bearak
Author URI: http://soc.qc.edu/jonathan
*/

/*
	This library is free software; you can redistribute it and/or
	modify it under the terms of the GNU Lesser General Public
	License as published by the Free Software Foundation; either
	version 2.1 of the License, or (at your option) any later version.
	
	This library is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
	Lesser General Public License for more details.
*/

if (! class_exists('ActiveDirectoryAuthenticationPlugin')) {
	if (! class_exists('adLDAP')) {
		require 'ad_ldap/adLDAP.php';
	}

	class ActiveDirectoryAuthenticationPlugin {
		var $authenticated = false;
		
		function ActiveDirectoryAuthenticationPlugin() {
			if (isset($_GET['activate']) and $_GET['activate'] == 'true') {
				add_action('init', array(&$this, 'initialize_options'));
			}
			add_action('admin_menu', array(&$this, 'add_options_page'));
			add_action('wp_authenticate', array(&$this, 'authenticate'), 10, 2);
			add_filter('check_password', array(&$this, 'override_password_check'), 10, 4);
			add_action('lost_password', array(&$this, 'disable_function'));
			add_action('retrieve_password', array(&$this, 'disable_function'));
			add_action('password_reset', array(&$this, 'disable_function'));
			add_action('check_passwords', array(&$this, 'generate_password'), 10, 3);
			add_filter('show_password_fields', array(&$this, 'disable_password_fields'));
		}


		/*************************************************************
		 * Plugin hooks
		 *************************************************************/

		/*
		 * Add options for this plugin to the database.
		 */
		function initialize_options() {
			if (current_user_can('manage_options')) {
				add_option('ActiveDirectory_authentication_auto_create_user', false, 'Should a new user be created automatically if not already in the WordPress database?');
				add_option('ActiveDirectory_authentication_account_suffix', '', 'Account Suffix (will be appended to all usernames created in WordPress, as well as used in the Active Directory authentication process');
				add_option('ActiveDirectory_authentication_auto_domain_controllers', '', 'Domain Controllers (separate with semicolons)');
				add_option('ActiveDirectory_authentication_auto_base_dn', '', 'Base DN');
				add_option('ActiveDirectory_authentication_role_equivalent_groups', '', 'Role Equivalent Groups');
				add_option('ActiveDirectory_authentication_default_email_domain', '', 'Default Email Domain');
			}
		}

		/*
		 * Add an options pane for this plugin.
		 */
		function add_options_page() {
			if (function_exists('add_options_page')) {
				add_options_page('Active Directory Authentication', 'Active Directory Authentication', 9, __FILE__, array(&$this, '_display_options_page'));
			}
		}

		function _get_user_role_equiv($ad_ldap, $ad_username)
		{
			$role_equiv_groups = get_option('ActiveDirectory_authentication_role_equivalent_groups');
			$role_equiv_groups = explode(';', $role_equiv_groups);
			$user_role = '';
			foreach ( $role_equiv_groups as $whatever 
							=> $role_group)
			{
					$role_group = explode('=', $role_group);
					if ( count($role_group) != 2 )
					{
						next;
					}
					$ad_group = $role_group[0];
					$corresponding_role = $role_group[1];
					if ( $ad_ldap->user_ingroup(
							$ad_username, $ad_group, true ) )
					{
						$user_role = $corresponding_role;
						break;
					}
			}
			return $user_role;
		}

		/*
		 * If the REMOTE_USER evironment is set, use it as the username.
		 * This assumes that you have externally authenticated the user.
		 */
		function authenticate($username, $password) {
			$adldap;
			$this->authenticated = false;
			$account_suffix = get_option('ActiveDirectory_authentication_account_suffix');
			$domain_controllers = explode(';',
					get_option('ActiveDirectory_authentication_domain_controllers')
									);
			$base_dn = get_option('ActiveDirectory_authentication_base_dn');
			$adldap = new adLDAP(array(
						"account_suffix" => $account_suffix,
						"base_dn" => $base_dn, 
						"domain_controllers" => $domain_controllers
						));
			if ( $adldap->authenticate($username, $password) )
			{	
				$this->authenticated = true;
			}

			if ( $this->authenticated == false )
			{
				$this->authenticated = false;
				return false;			

			}
			
			$ad_username = $username;
			$username .= $account_suffix;
			// Create new users automatically, if configured
			$user = get_userdatabylogin($username);
			if (! $user or $user->user_login != $username) {
				$user_role = $this->_get_user_role_equiv($adldap, $ad_username);
				if ((bool) get_option('ActiveDirectory_authentication_auto_create_user') 
						|| $user_role != '' ) {
						$userinfo = $adldap->user_info($ad_username, 
							array("sn", "givenname", "mail")
								);
						$userinfo = $userinfo[0];
						$email = $userinfo['mail'][0];
						$first_name = $userinfo['givenname'][0];
						$last_name = $userinfo['sn'][0];
						$this->_create_user($ad_username, $email, $first_name, $last_name, $user_role);
				}
				else {
					// Bail out to avoid showing the login form
						return new WP_Error('invalid_username', __('<strong>ERROR</strong>: This user exists in Active Directory, but has not been granted access to this installation of WordPress.'));
				}
			}
		}

		/*
		 * Skip the password check, since we've externally authenticated.
		 */
		function override_password_check($check, $password, $hash, $user_id) {
			if ( $this->authenticated == true ) 
			{
				return true;
			}
			else
			{
				return $check;
			}
		}

		/*
		 * Generate a password for the user. This plugin does not
		 * require the user to enter this value, but we want to set it
		 * to something nonobvious.
		 */
		function generate_password($username, $password1, $password2) {
			$password1 = $password2 = $this->_get_password();
		}

		/*
		 * Used to disable certain display elements, e.g. password
		 * fields on profile screen.
		 */
		function disable_password_fields($show_password_fields) {
			return false;
		}

		/*
		 * Used to disable certain login functions, e.g. retrieving a
		 * user's password.
		 */
		function disable_function() {
			die('Disabled');
		}


		/*************************************************************
		 * Functions
		 *************************************************************/

		/*
		 * Generate a random password.
		 */
		function _get_password($length = 10) {
			return substr(md5(uniqid(microtime())), 0, $length);
		}

		/*
		 * Create a new WordPress account for the specified username.
		 */
		function _create_user($username, $email, $first_name, $last_name, $role = '') {
			$password = $this->_get_password();
			$email_domain = get_option('ActiveDirectory_authentication_default_email_domain');
			
			if ( $email == '' ) 
			{
				$email = $username . '@' . $email_domain;
			}
			
			$username .= get_option('ActiveDirectory_authentication_account_suffix');
			
			require_once(ABSPATH . WPINC . DIRECTORY_SEPARATOR . 'registration.php');
			$error = wp_create_user($username, $password, $email);
			if ( is_wp_error($errors) )
				die($errors->get_error_message());
			$user_id = username_exists($username);
			if ( !$user_id ) {
				die("Error creating user!");
			} else {
				update_usermeta($user_id, 'first_name', $first_name);
				update_usermeta($user_id, 'last_name', $last_name);
				if ( $role != '' ) 
				{
					wp_update_user(array("ID" => $user_id, "role" => $role));
				}
			}
		}
		/*
		function _add_users_for_role_equivalent_groups($ad_username, $ad_password)
		{
			$authenticated = false;
			$account_suffix = get_option('ActiveDirectory_authentication_account_suffix');
			$domain_controllers = explode(';',
					get_option('ActiveDirectory_authentication_domain_controllers')
									);
			$base_dn = get_option('ActiveDirectory_authentication_base_dn');
			$adldap = new adLDAP(array(
						"account_suffix" => $account_suffix,
						"base_dn" => "DC=qc,DC=ads", 
						"domain_controllers" => $domain_controllers
						));
			if ( $adldap->authenticate($ad_username, $ad_password) )
			{	
				$authenticated = true;
			}
			
			if ( $authenticated == false )
			{
				return "Cannot log on to Active Directory system with the provided credentials.";
				echo $ad_username . $ad_password;
			}
			
			$users_added = "";
			
			$letters = array('a', 'b', 'c', 'd', 'e', 'f', 
						'g', 'h', 'i', 'j', 
						'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 
						't', 'u', 'v', 'w', 'x', 'y', 'z');
			$prefixes = array();
			foreach ( $letters as $l1 )
				foreach ( $letters as $l2 )
					$prefixes[] = $l1 . $l2;
			
			$users = array();
			foreach ( $prefixes as $prefix )
			{
				$users_new = array_merge($users, 
					$adldap->listUsersWithNames($prefix . "*"));
				$users = $users_new;
			}

			$role_equiv_groups = get_option('ActiveDirectory_authentication_role_equivalent_groups');
			$role_equiv_groups = explode(';', $role_equiv_groups);
			foreach ( $users as $check_username => $user )
			{
				$wp_user = get_userdatabylogin(
						$check_username . $account_suffix);
				if ( ! $wp_user or $wp_user->user_login != $check_username)
				{
					$user_role = $this->_get_user_role_equiv($adldap, $check_username);
	
					if ( $user_role != '' )
					{
						$userinfo = $adldap->user_info($check_username, 
								array("sn", "givenname", "mail")
									);
						$userinfo = $userinfo[0];
						$email = $userinfo['mail'][0];
						$first_name = $userinfo['givenname'][0];
						$last_name = $userinfo['sn'][0];
						$this->_create_user($check_username . $account_suffix,
										$email, $first_name, 
											$last_name, $user_role);
						
						$users_added .= "<br/>$check_username$account_suffix";
					}
				}
			}
			
			if ( $users_added != "" ) 
			{
				return "The following users were created: $users_added";
			}
			else
			{
				return "No users were added.  (This can occur if you do not have sufficient AD permissions, or you provided incorrect login information.)";
			}
		}
		*/
		
		/*
		 * Display the options for this plugin.
		 */
		function _display_options_page() {
			$account_suffix = get_option('ActiveDirectory_authentication_account_suffix');
			$domain_controllers = get_option('ActiveDirectory_authentication_domain_controllers');
			$base_dn = get_option('ActiveDirectory_authentication_base_dn');
			$role_equiv_groups = get_option('ActiveDirectory_authentication_role_equivalent_groups');
			$auto_create_user = (bool) get_option('ActiveDirectory_authentication_auto_create_user');
			$email_domain = get_option('ActiveDirectory_authentication_default_email_domain');
		/*
		if ( $_REQUEST['create_users_for_role_equivalent_groups'] == 'yes' )
		{
			$users_created_msg = 
				$this->_add_users_for_role_equivalent_groups($_REQUEST['ad_username'],
													$_REQUEST['ad_password']
												 );
			echo "<div>$users_created_msg</div>";
		}
		*/

?>


<div class="wrap">
  <h2>Active Directory Authentication Options</h2>
  <form action="options.php" method="post">
    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="ActiveDirectory_authentication_auto_create_user,ActiveDirectory_authentication_base_dn,ActiveDirectory_authentication_account_suffix,ActiveDirectory_authentication_domain_controllers,ActiveDirectory_authentication_role_equivalent_groups,ActiveDirectory_authentication_default_email_domain" />
    <?php if (function_exists('wp_nonce_field')): wp_nonce_field('update-options'); endif; ?>

    <table class="form-table">
      <tr valign="top">
        <th scope="row"><label for="ActiveDirectory_authentication_auto_create_user">Automatically create accounts for any and all users can authenticate to the directory server?</label></th>
        <td>
          <input type="checkbox" name="ActiveDirectory_authentication_auto_create_user" id="ActiveDirectory_authentication_auto_create_user"<?php if ($auto_create_user) echo ' checked="checked"' ?> value="1" /><br />
          Should a new user be created automatically if not already in the WordPress database?<br />
          Created users will obtain the role defined under &quot;New User Default Role&quot; on the <a href="options-general.php">General Options</a> page.
          <br/>
          This setting is separate from the Role Equivalent Groups option, below.
          <br/>
          <b>Users with role equivalent groups will be created even if this setting is turned off</b> (because if you didn't want this to happen, you would leave that option blank.)
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><label for="ActiveDirectory_authentication_default_email_domain">Default email domain</label></th>
        <td>
          <input type="text" name="ActiveDirectory_authentication_default_email_domain" id="ActiveDirectory_authentication_default_email_domain" value="<? echo $email_domain; ?>"><br />
		   If the Active Directory attribute 'mail' is blank, a user's email will be set to username@whatever-this-says
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><label for="ActiveDirectory_authentication_account_suffix">Account Suffix</label></th>
        <td>
          <input type="text" name="ActiveDirectory_authentication_account_suffix" id="ActiveDirectory_authentication_account_suffix"
          value="<? echo $account_suffix; ?>" /><br />
          Account Suffix (will be appended to all usernames created in WordPress, as well as used in the Active Directory authentication process; e.g., "@qc.cuny.edu".)
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><label for="ActiveDirectory_authentication_domain_controllers">Domain Controllers</label></th>
        <td>
          <input type="text" name="ActiveDirectory_authentication_domain_controllers" id="ActiveDirectory_authentication_domain_controllers"
          value="<? echo $domain_controllers; ?>" /><br />
          Domain Controllers (separate with semicolons, e.g. "admin-dc2.qc.ads;admin-dc1.qc.ads")
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><label for="ActiveDirectory_authentication_base_dn">Base DN</label></th>
        <td>
          <input type="text" name="ActiveDirectory_authentication_base_dn" id="ActiveDirectory_authentication_base_dn"
          value="<? echo $base_dn; ?>" /><br />
		  Base DN (e.g., "dc=qc,dc=ads)
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><label for="ActiveDirectory_authentication_role_equivalent_groups">Role Equivalent Groups</label></th>
        <td>
          <input type="text" name="ActiveDirectory_authentication_role_equivalent_groups" id="ActiveDirectory_authentication_role_equivalent_groups"
          value="<? echo $role_equiv_groups; ?>" /><br />
		  List of Active Directory groups which correspond to WordPress user roles.  <br/>
		  When a user is first created, his role will correspond to what is specified here.<br/>
		  Format: AD-Group=WordPress-Role;AD-Group=WordPress-Role;...<br/>
		  E.g., "Soc-Faculty=faculty" or "Faculty=faculty;Students=subscriber"<br/>
		  A user will be created based on the first math, from left to right, so you should obviously put the more powerful groups first.<br/>
		  NOTE: WordPress stores roles as lower case ( Faculty is stored as faculty ) 
		  <br/>ALSO NOTE: Active Directory groups are case-sensitive
		  <br/>
		  FURTHER NOTE: Group memberships cannot be checked across domains.  So if you have two domains, instr and qc, and qc is the domain specified above, if instr is linked to qc, I can authenticate instr users, but not check instr group memberships.
        </td>
      </tr>
    </table>
    <p class="submit">
      <input type="submit" name="Submit" value="Save Changes" />
    </p>
  </form>
  
  <?php /* 
  <br/>
  <br/>
   <h2>Instant User Creation for Role Equivalent Groups</h2>
   <form action="http://elf.soc.qc.cuny.edu/soc/wordpress/wp-admin/options-general.php?page=ad-auth/ad-auth.php" method="post">
    <input type="hidden" name="create_users_for_role_equivalent_groups" value="yes" />
    <?php if (function_exists('wp_nonce_field')): wp_nonce_field('update-options'); endif; ?>
    <table class="form-table">
      <tr valign="top">
        <th scope="row">
        <label for="ActiveDirectory_authentication_auto_create_user">
        	Active Directory Username:
        </label></th>
        <td>
          <input type="text" name="ad_username" 
          	id="ad_username" value="" 
          />
          <br/>
          You must specify an Active Directory username with 
          the privileges necessary to perform an ldap search query 
          and check user group memberships.
        </td>
      </tr>
      <tr valign="top">
        <th scope="row">
        <label for="ActiveDirectory_authentication_auto_create_user">
        	Active Directory Password:
        </label></th>
        <td>
          <input type="text" name="ad_password" 
          	id="ad_password" value="" 
          />
        </td>
      </tr>
     </table>

      <p class="submit">
        Once you press this button, WordPress accounts will be created for 
        all users who are members of groups with role equivalents, as 
        specified above, if they do not already have WordPress accounts.
        <br/>
      	<input type="submit" name="Submit" value="Create Users" />
      </p>
    </form>
    */ ?>
</div>
<?php
		}
	}
}

// Load the plugin hooks, etc.
$ActiveDirectory_authentication_plugin = new ActiveDirectoryAuthenticationPlugin();
?>
