<?php
/**
 * Awebsome! Online Registered Users Widget
 * 
 * @package awebsome_oruw
 * @author Raul Illana <r@awebsome.com>
 */
/*
	Plugin Name: Awebsome! Online Registered Users Widget
	Plugin URI: http://plugins.awebsome.com
	Description: Adds a new Widget in your Dashboard and your Theme to show a list of online/offline registered users by some display options.
	Version: 2.0.1
	Author: Raul Illana <r@awebsome.com>
	Author URI: http://raulillana.com
	License: GPLv2
*/
add_action('widgets_init', create_function('', 'register_widget("Awebsome_ORUW");'));

if( !class_exists('Awebsome_ORUW') ):
/**
 * @package awebsome_oruw
 * @since 1.0
 */
class Awebsome_ORUW extends WP_Widget
{
	/**
	 * Register widget with WordPress
	 * Register and enqueue widget styles
	 * Register dashboard widget
	 * Register login and logout actions
	 * 
	 * @uses wp_register_style
	 * @uses is_active_widget
	 * @uses add_action
	 * @uses is_admin
	 * 
	 * @since 2.0
	 */
	public function __construct()
	{
		parent::__construct('awebsome_oruw', 'A! Online Registered Users', array('description' => __('Shows your online/offline registered users.', 'aws-oruw')));
		
		// frontend styles
		wp_register_style('aws_oruw', plugins_url('css/frontend.css', __FILE__));
		if( is_active_widget(false, false, $this->id_base) ) add_action('wp_enqueue_scripts', array(&$this, 'enqueue_styles_scripts'));
		
		// backend styles
		wp_register_style('aws_oruw_adm', plugins_url('css/backend.css', __FILE__));
		if( is_admin() && is_active_widget(false, false, $this->id_base) ) add_action('admin_enqueue_scripts', array(&$this, 'enqueue_admin_styles_scripts'));
		
		// backend widget
		add_action('wp_dashboard_setup', array(&$this, 'add_dashboard_widget'));
		
		// login and logout actions
		add_action('wp_login',  array(&$this, 'set_user_logged_in'));
		add_action('wp_logout', array(&$this, 'set_user_logged_out'));
	}
	
	/**
	 * Front-end display of widget
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 * 
	 * @uses self::print_user_list {see @Awebsome_ORUW::print_user_list}
	 * 
	 * @since 1.0
	 */
	public function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['aws_oruw_title']);
		
		// only showing roles
		$onlys = array(
			'Super Administrator' => $instance['aws_oruw_osuadms'],
			'Administrator'       => $instance['aws_oruw_oadms'],
			'Editor'              => $instance['aws_oruw_oedits'],
			'Author'              => $instance['aws_oruw_oauths'],
			'Contributor'         => $instance['aws_oruw_oconts'],
			'Subscriber'          => $instance['aws_oruw_osubs']
		);
		
		// others filters
		$others = array(
			'gravatars'  => $instance['aws_oruw_gravatars'], // show gravatars
			'authlinks'  => $instance['aws_oruw_authlinks'], // user links to author pages
			'categorize' => $instance['aws_oruw_categorize'] // categorize list with user roles
		);
		
		// start printing the widget
		print $before_widget;
		if( $title ) print $before_title . $title . $after_title;
		
		// do the magic and end printing the widget
		self::print_user_list($onlys, $others);
		print $after_widget;
	}
	
	/**
	 * Back-end display of widget.
	 * 
	 * @uses self::print_user_list_for_dashboard {see @Awebsome_ORUW::print_user_list_for_dashboard}
	 * 
	 * @since 2.0
	 */
	public function dashboard_widget()
	{
		// only showing roles
		$onlys = array(
			'Super Administrator' => false,
			'Administrator'       => false,
			'Editor'              => false,
			'Author'              => false,
			'Contributor'         => false,
			'Subscriber'          => false
		);
		
		// others filters
		$others = array(
			'gravatars'  => true, // show gravatars
			'authlinks'  => true, // user links to author pages
			'categorize' => true // categorize list with user roles
		);
		
		self::print_user_list_for_dashboard($onlys, $others);
	}
	
	
	/**
	 * Sanitize widget form values as they are saved
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		// title
		$instance['aws_oruw_title'] = strip_tags($new_instance['aws_oruw_title']);
		
		// onlys
		$instance['aws_oruw_osuadms'] = (bool)$new_instance['aws_oruw_osuadms'];
		$instance['aws_oruw_oadms']   = (bool)$new_instance['aws_oruw_oadms'];
		$instance['aws_oruw_oedits']  = (bool)$new_instance['aws_oruw_oedits'];
		$instance['aws_oruw_oauths']  = (bool)$new_instance['aws_oruw_oauths'];
		$instance['aws_oruw_oconts']  = (bool)$new_instance['aws_oruw_oconts'];
		$instance['aws_oruw_osubs']   = (bool)$new_instance['aws_oruw_osubs'];
		
		// others
		$instance['aws_oruw_gravatars']  = (bool)$new_instance['aws_oruw_gravatars'];
		$instance['aws_oruw_authlinks']  = (bool)$new_instance['aws_oruw_authlinks'];
		$instance['aws_oruw_categorize'] = (bool)$new_instance['aws_oruw_categorize'];
		
		return $instance;
	}
	
	/**
	 * Back-end widget form
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form($instance)
	{
		
?>
<p>
	<label for="<?php print esc_attr($this->get_field_id('aws_oruw_title')) ?>"><?php _e('Title', 'aws-oruw') ?></label>
	<input id="<?php print esc_attr($this->get_field_id('aws_oruw_title')) ?>" name="<?php print esc_attr($this->get_field_name('aws_oruw_title')) ?>" value="<?php print $instance['aws_oruw_title'] ?>" class="widefat" type="text" />
</p>

<p class="aws-oruw aws-oruw-others">
	<input id="<?php print esc_attr($this->get_field_id('aws_oruw_gravatars')) ?>" name="<?php print esc_attr($this->get_field_name('aws_oruw_gravatars')) ?>"<?php checked($instance['aws_oruw_gravatars']) ?> class="checkbox" type="checkbox" />
	<label for="<?php print esc_attr($this->get_field_id('aws_oruw_gravatars')) ?>"><?php _e('Show gravatars', 'aws-oruw') ?></label>
	<br />
	
	<input id="<?php print esc_attr($this->get_field_id('aws_oruw_authlinks')) ?>" name="<?php print esc_attr($this->get_field_name('aws_oruw_authlinks')) ?>"<?php checked($instance['aws_oruw_authlinks']) ?> class="checkbox" type="checkbox" />
	<label for="<?php print esc_attr($this->get_field_id('aws_oruw_authlinks')) ?>"><?php _e('Link users to author pages', 'aws-oruw') ?></label>
	<br />
	
	<input id="<?php print esc_attr($this->get_field_id('aws_oruw_categorize')) ?>" name="<?php print esc_attr($this->get_field_name('aws_oruw_categorize')) ?>"<?php checked($instance['aws_oruw_categorize']) ?> class="checkbox" type="checkbox" />
	<label for="<?php print esc_attr($this->get_field_id('aws_oruw_categorize')) ?>"><?php _e('Categorize users in role lists', 'aws-oruw') ?></label>
</p>

<h4><?php _e('Only show selected roles userlists', 'aws-oruw') ?></h4>
<p class="aws-oruw aws-oruw-onlys">
	<input id="<?php print esc_attr($this->get_field_id('aws_oruw_osuadms')) ?>" name="<?php print esc_attr($this->get_field_name('aws_oruw_osuadms')) ?>"<?php checked($instance['aws_oruw_osuadms']) ?> class="checkbox" type="checkbox" />
	<label for="<?php print esc_attr($this->get_field_id('aws_oruw_osuadms')) ?>"><?php _e('Super Administrators', 'aws-oruw') ?></label>
	<br />
	
	<input id="<?php print esc_attr($this->get_field_id('aws_oruw_oadms')) ?>" name="<?php print esc_attr($this->get_field_name('aws_oruw_oadms')) ?>"<?php checked($instance['aws_oruw_oadms']) ?> class="checkbox" type="checkbox" />
	<label for="<?php print esc_attr($this->get_field_id('aws_oruw_oadms')) ?>"><?php _e('Administrators', 'aws-oruw') ?></label>
	<br />
	
	<input id="<?php print esc_attr($this->get_field_id('aws_oruw_oedits')) ?>" name="<?php print esc_attr($this->get_field_name('aws_oruw_oedits')) ?>"<?php checked($instance['aws_oruw_oedits']) ?> class="checkbox" type="checkbox" />
	<label for="<?php print esc_attr($this->get_field_id('aws_oruw_oedits')) ?>"><?php _e('Editors', 'aws-oruw') ?></label>
	<br />
	
	<input id="<?php print esc_attr($this->get_field_id('aws_oruw_oauths')) ?>" name="<?php print esc_attr($this->get_field_name('aws_oruw_oauths')) ?>"<?php checked($instance['aws_oruw_oauths']) ?> class="checkbox" type="checkbox" />
	<label for="<?php print esc_attr($this->get_field_id('aws_oruw_oauths')) ?>"><?php _e('Authors', 'aws-oruw') ?></label>
	<br />
	
	<input id="<?php print esc_attr($this->get_field_id('aws_oruw_oconts')) ?>" name="<?php print esc_attr($this->get_field_name('aws_oruw_oconts')) ?>"<?php checked($instance['aws_oruw_oconts']) ?> class="checkbox" type="checkbox" />
	<label for="<?php print esc_attr($this->get_field_id('aws_oruw_oconts')) ?>"><?php _e('Contributors', 'aws-oruw') ?></label>
	<br />
	
	<input id="<?php print esc_attr($this->get_field_id('aws_oruw_osubs')) ?>" name="<?php print esc_attr($this->get_field_name('aws_oruw_osubs')) ?>"<?php checked($instance['aws_oruw_osubs']) ?> class="checkbox" type="checkbox" />
	<label for="<?php print esc_attr($this->get_field_id('aws_oruw_osubs')) ?>"><?php _e('Subscribers', 'aws-oruw') ?></label>
</p>
<?php
		return $instance;
	}
	
	/**
	 * Prints a registered users lists and theyre online status
	 * 
	 * @uses in_array                 {see @in_array}
	 * @uses self::get_users_by_roles {see @Awebsome_ORUW::get_users_by_roles}
	 * @uses get_user_meta            For retrieving aws-oruw-loggedin value
	 * @uses get_author_posts_url     To get the author url post for each user
	 * @uses get_avatar               For retrieving user gravatar
	 * 
	 * @since 1.0
	 */
	function print_user_list($oroles, $others)
	{
		$roles      = array();
		$gravatars  = $others['gravatars'];
		$authlinks  = $others['authlinks'];
		$categorize = $others['categorize'];
		
		// if any 'show only' role selected, construct an array with the selected roles only
		if( in_array(true, $oroles, true) ) foreach( $oroles as $key => $rol ) ($rol == 1 ? $roles[] .= $key : '');
		// else construct an array with all the roles
		else foreach( $oroles as $key => $rol ) $roles[] .= $key;
		
		$roles_users = self::get_users_by_roles($roles);
		
		if( !empty($roles_users) )
		{
			if( !$categorize ) print '<ul class="aws-oruw uncat">';
			
			foreach( $roles_users as $rol => $users )
			{
				if( $categorize && !empty($users) ) print '<h4 class="aws-oruw-role">'. $rol .'s</h4><ul class="aws-oruw">';
				
				foreach( $users as $user )
				{
					$onoff         = get_user_meta($user->ID, 'aws-oruw-loggedin', true) ? 'online' : 'offline';
					$element_class = get_user_meta($user->ID, 'aws-oruw-loggedin', true) ? 'aws-oruw-on' : 'aws-oruw-off';
					$url           = get_author_posts_url($user->ID, $user->user_nicename);
					
					if( $gravatars )
					{
						if( $authlinks ) print '<li class="gravatar"><a href="'. $url .'" title="'. $user->display_name .'">'. get_avatar($user->ID, '48', '', $user->display_name) .'</a>';
						else print '<li class="gravatar">'. get_avatar($user->ID, '48', '', $user->display_name);
						
						if( $authlinks ) print '<p><a href="'. $url .'" title="'. $user->display_name .'">'. $user->display_name .'</a><br />is <span class="'. $onoff .'">'. $onoff .'</span></p></li>';
						else print '<p>'. $user->display_name .'<br />is <span class="'. $onoff .'">'. $onoff .'</span></p></li>';
					}
					else
					{
						print '<li class="'. $element_class .'">';
						
						if( $authlinks ) print '<p><a href="'. $url .'" title="'. $user->display_name .'">'. $user->display_name .'</a></p></li>';
						else print '<p>'. $user->display_name .'</p></li>';
					}
				}
				
				if( $categorize ) print '</ul>';
			}
			
			if( !$categorize ) print '</ul>';
		}
	}
	
	/**
	 * Prints a registered users lists and theyre online status for the dashboard widget
	 * 
	 * @uses in_array                 {see @in_array}
	 * @uses self::get_users_by_roles {see @Awebsome_ORUW::get_users_by_roles}
	 * @uses get_user_meta            For retrieving aws-oruw-loggedin value
	 * @uses get_author_posts_url     To get the author url post for each user
	 * @uses get_avatar               For retrieving user gravatar
	 * 
	 * @since 2.0
	 */
	function print_user_list_for_dashboard($oroles, $others)
	{
		$roles = array();
		
		// if any 'show only' role selected, construct an array with the selected roles only
		if( in_array(true, $oroles, true) ) foreach( $oroles as $key => $rol ) ($rol == 1 ? $roles[] .= $key : '');
		// else construct an array with all the roles
		else foreach( $oroles as $key => $rol ) $roles[] .= $key;
		
		$roles_users = self::get_users_by_roles($roles);
		
		print '<div class="wrap">';
		
		if( !empty($roles_users) )
		{
			foreach( $roles_users as $rol => $users )
			{
				if( !empty($users) ) print '<ul class="aws-oruw-wrap"><li><h4 class="aws-oruw-role">'. $rol .'s</h4><ul class="aws-oruw">';
				
				foreach( $users as $user )
				{
					$onoff         = get_user_meta($user->ID, 'aws-oruw-loggedin', true) ? 'online' : 'offline';
					$element_class = get_user_meta($user->ID, 'aws-oruw-loggedin', true) ? 'aws-oruw-on' : 'aws-oruw-off';
					$url           = get_author_posts_url($user->ID, $user->user_nicename);
					
					print '<li class="gravatar"><a href="'. $url .'" title="'. $user->display_name .'">'. get_avatar($user->ID, '48', '', $user->display_name) .'</a>';
					print '<p><a href="'. $url .'" title="'. $user->display_name .'">'. $user->display_name .'</a><br />is <span class="'. $onoff .'">'. $onoff .'</span></p></li>';
				}
				
				if( !empty($users) ) print '</ul></li></ul>';
			}
		}
		
		print '</div>';
	}
	
	/**
	 * Returns a $users objects array if they're in the $roles param array
	 * 
	 * @param array, string $roles
	 * 
	 * @uses is_array   {see @is_array}
	 * @uses explode    {see @explode}
	 * @uses array_walk {see @array_walk}
	 * @uses get_users  For retrieving
	 * 
	 * @return array    Roles and Users
	 * 
	 * @since 1.0
	 */
	function get_users_by_roles($roles)
	{  
		$total_users = array();
		
		// if $roles is not an array, convert it
		if( !is_array( $roles ) )
		{
			$roles = explode(',', $roles);
			array_walk($roles, 'trim');
		}
		
		// iterate roles
		foreach( $roles as $role )
		{
			// get users for this role
			$args_users = array('role' => $role);
			$role_users = get_users($args_users);
			
			// add them to the array
			$total_users[$role] = $role_users;
		}
			
		return $total_users;
	}
	
	/**
	 * Sets user status to logged in
	 * 
	 * @param string User login
	 * 
	 * @uses get_user_by      For retrieving user data
	 * @uses update_user_meta For updating loggedin state to ONLINE
	 * @uses add_user_meta    For adding loggedin state to ONLINE
	 * 
	 * @since 2.0
	 */
	function set_user_logged_in($user)
	{
		$u = get_user_by('login', $user);
		
		if( update_user_meta($u->ID, 'aws-oruw-loggedin', true) ) return $user;
		elseif( add_user_meta($u->ID, 'aws-oruw-loggedin', true) ) return $user;
		
		return $user;
	}
	
	/**
	 * Sets user status to logged in
	 * 
	 * @param string User login
	 * 
	 * @uses get_user_by      For retrieving user data
	 * @uses update_user_meta For updating loggedin state to OFFLINE
	 * @uses add_user_meta    For adding loggedin state to OFFLINE
	 * 
	 * @since 2.0
	 */
	function set_user_logged_out()
	{
		global $current_user;
		get_currentuserinfo();
		
		if( update_user_meta($current_user->ID, 'aws-oruw-loggedin', false) ) return $user;
		elseif( add_user_meta($current_user->ID, 'aws-oruw-loggedin', false) ) return $user;
		else return $user;
	}
	
	/**
	 * Frontend styles and scripts callback
	 * 
	 * @uses wp_enqueue_style To include the CSS file in the theme
	 * 
	 * @since 2.0
	 **/
	function enqueue_styles_scripts()
	{
		wp_enqueue_style('aws_oruw');
	}
	
	/**
	 * Backend styles and scripts callback
	 * 
	 * @uses wp_enqueue_style To include the CSS file in the admin
	 * 
	 * @since 2.0
	 **/
	function enqueue_admin_styles_scripts()
	{
		wp_enqueue_style('aws_oruw_adm');
	}
	
	/**
	 * Dashboard widget callback
	 * 
	 * @uses wp_add_dashboard_widget To include the dashboard widget
	 * 
	 * @since 2.0
	 **/
	function add_dashboard_widget()
	{
		wp_add_dashboard_widget('awebsome-oruw', 'A! Online Registered Users', array(&$this, 'dashboard_widget'));
	}
} // Awebsome_ORUW
endif;
?>