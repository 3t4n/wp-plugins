<?php

class FFW_Security_Widget {

	/**
	 * The id of this widget.
	 */
	const wid = 'ffw_security_widget';

	/**
	 *
	 * @var wpdb
	 */
	protected static $wpdb;

	/**
	 *
	 * @var string
	 */
	protected static $pluginSlug;

	/**
	 * Hook to wp_dashboard_setup to add the widget.
	 */
	public static function init() {
		global $wpdb;
		self::$wpdb = $wpdb;
		
		// Register widget settings...
		self::update_dashboard_widget_options(
				// The widget id\
				self::wid, 
				// Associative array of options & default values
				array(
					'example_number' => 42 
				), 
				// Add only (will not update existing options)
				true);
		
		// Register the widget...
		wp_add_dashboard_widget(
				// A unique slug/ID
				self::wid, 
				// Visible name for the widget
				__('FreshFastWebsite Security Widget', 'nouveau'), 
				// Callback for the main widget content
				array(
					'FFW_Security_Widget',
					'widget' 
				));
	}

	/**
	 * Load the widget code
	 */
	public static function widget() {
		$output = NULL;
		$ffwSecurityTools = new FFW_Security_Tools();
		
		// FIXME: show only for admin !!!!!!!!
		
		$output .= '<h4>File and directory permissions:</h4>';
		$output .= $ffwSecurityTools->showFilePermissionsInfo();
		
		$output .= '<br/><h4>Secure login and administration:</h4>';
		$output .= $ffwSecurityTools->showSecureLogin();
		
		$output .= '<br/><h4>Automatic WordPress updates:</h4>';
		$output .= $ffwSecurityTools->showAutomaticUpdates();
		
		$output .= '<br/><h4>Admin login and names:</h4>';
		
		$users = $ffwSecurityTools->getAdministratorUsers();
		
		$outputUsers = NULL;
		
		$imgBasicUrl = FFWSecurityPluginAdmin::getAdminPluginUrl('assets/img');
		$link = FFWSecurityPlugin::getPageLink(FFWSecurityPluginAdmin::PAGE_USERS);
		$anyBad = false;
		foreach($users as $user) {
			$isBad = ($user['is_bad_nicename'] || $user['is_bad_displayname']) ? true : false;
			if ($isBad) {
				$anyBad = true;
				$bads = array();
				if ($user['is_bad_nicename']) {
					$bads[] = 'Nicename';
				}
				if ($user['is_bad_displayname']) {
					$bads[] = 'Display Name';
				}
				$outputUsers .= '<span class="ffwsecurity-namewarning">
						<img src="' . $imgBasicUrl . '/wrong.png" alt="" style="vertical-align:middle"/>
						Login <strong>' . $user['user_login'] . '</strong> is the same as ';
				$outputUsers .= implode(' and ', $bads);
				$outputUsers .= ' <strong><a href="' . $link . '">Change&nbsp;it!</a></strong></span>';
			}
		}
		
		if (!$anyBad) {
			$outputUsers .= '<div><img src="' . $imgBasicUrl . '/ok.png" alt="" style="vertical-align:middle"/> All ok</div>';
		}
		$output .= $outputUsers;
		
		$output .= '<hr/><p><a href="' . FFWSecurityPlugin::getPageLink(FFWSecurityPluginAdmin::PAGE_MAIN) . '">Go to Security Settings &#187;</a>
		</p>';
		echo $output;
	}

	/**
	 * Gets the options for a widget of the specified name.
	 *
	 * @param string $widget_id
	 *        	Optional. If provided, will only get options for the specified widget.
	 * @return array An associative array containing the widget's options and values. False if no opts.
	 */
	public static function get_dashboard_widget_options($widget_id = '') {
		// Fetch ALL dashboard widget options from the db...
		$opts = get_option('dashboard_widget_options');
		
		// If no widget is specified, return everything
		if (empty($widget_id))
			return $opts;
			
			// If we request a widget and it exists, return it
		if (isset($opts[$widget_id]))
			return $opts[$widget_id];
			
			// Something went wrong...
		return false;
	}

	/**
	 * Gets one specific option for the specified widget.
	 *
	 * @param
	 *        	$widget_id
	 * @param
	 *        	$option
	 * @param null $default        	
	 *
	 * @return string
	 */
	public static function get_dashboard_widget_option($widget_id, $option, $default = NULL) {
		$opts = self::get_dashboard_widget_options($widget_id);
		
		// If widget opts dont exist, return false
		if (!$opts)
			return false;
			
			// Otherwise fetch the option or use default
		if (isset($opts[$option]) && !empty($opts[$option]))
			return $opts[$option];
		else
			return (isset($default)) ? $default : false;
	}

	/**
	 * Saves an array of options for a single dashboard widget to the database.
	 * Can also be used to define default values for a widget.
	 *
	 * @param string $widget_id
	 *        	The name of the widget being updated
	 * @param array $args
	 *        	An associative array of options being saved.
	 * @param bool $add_only
	 *        	If true, options will not be added if widget options already exist
	 */
	public static function update_dashboard_widget_options($widget_id, $args = array(), $add_only = false) {
		// Fetch ALL dashboard widget options from the db...
		$opts = get_option('dashboard_widget_options');
		
		// Get just our widget's options, or set empty array
		$w_opts = (isset($opts[$widget_id])) ? $opts[$widget_id] : array();
		
		if ($add_only) {
			// Flesh out any missing options (existing ones overwrite new ones)
			$opts[$widget_id] = array_merge($args, $w_opts);
		}
		else {
			// Merge new options with existing ones, and add it back to the widgets array
			$opts[$widget_id] = array_merge($w_opts, $args);
		}
		
		// Save the entire widgets array back to the db
		return update_option('dashboard_widget_options', $opts);
	}
}
