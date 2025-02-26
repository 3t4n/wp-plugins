<?php

class FFWSecurityOptions {

	/**
	 * Options groups
	 */
	
	//
	const OPTIONS_GROUP = 'ffw_s';
	
	//
	const OPTIONS_GROUP_RSS = 'ffw_s_rss';
	
	//
	const OPTIONS_GROUP_DASHBOARD_WIDGETS = 'ffw_s_dashboard_widgets';
	
	//
	const OPTIONS_GROUP_OTHER = 'ffw_s_other';

	/**
	 * Options
	 */
	
	//
	const OPTIONS_REMOVE_GENERATOR_META_TAG = 'ffw_s_remove_generator_meta_tag';

	const OPTIONS_DISABLE_PASSWORD_RESET = 'ffw_s_disable_password_reset';

	const OPTIONS_REMOVE_RSD_LINK = 'ffw_s_remove_rsd_link';

	const OPTIONS_REMOVE_FEED_LINKS = 'ffw_s_remove_feed_links';

	const OPTIONS_REMOVE_WLWMANIFEST_LINK = 'ffw_s_remove_wlwmanifest_link';

	const OPTIONS_REMOVE_INDEX_REL_LINK = 'ffw_s_remove_index_rel_link';

	const OPTIONS_REMOVE_START_POST_REL_LINK = 'ffw_s_remove_start_post_rel_link';

	const OPTIONS_REMOVE_PARENT_POST_REL_LINK = 'ffw_s_remove_parent_post_rel_link';

	const OPTIONS_REMOVE_ADJANCED_POSTS_REL_LINK = 'ffw_s_remove_adjacent_posts_rel_link_wp_head';

	const OPTIONS_REMOVE_WP_SHORTLINK = 'ffw_s_remove_wp_shortlink_wp_head';
	
	//
	const OPTIONS_DISABLE_ATOM = 'disable_atom';

	const OPTIONS_DISABLE_RSS2 = 'disable_rss2';

	const OPTIONS_DISABLE_RSS = 'disable_rss';

	const OPTIONS_DISABLE_RDF = 'disable_rdf';
	
	//
	const OPTIONS_DISABLE_DASHBOARD_WPBLOG = 'disable_dashboard_wpblog';
	
	const OPTIONS_DISABLE_DASHBOARD_WPNEWS = 'disable_dashboard_wpnews';
	
	//
	const OPTIONS_DISABLE_HTML_COMMENTS = 'disable_html_comments';
	
	//
	
	// options with default values
	private static $optionsGroupNames = array(
		self::OPTIONS_GROUP => array(
			// removes Generator Meta Tag
			self::OPTIONS_REMOVE_GENERATOR_META_TAG => true,
			// disables password reset
			self::OPTIONS_DISABLE_PASSWORD_RESET => false,
			// remove rsd_link
			self::OPTIONS_REMOVE_RSD_LINK => true,
			self::OPTIONS_REMOVE_FEED_LINKS => false,
			self::OPTIONS_REMOVE_WLWMANIFEST_LINK => true,
			
			self::OPTIONS_REMOVE_INDEX_REL_LINK => false,
			self::OPTIONS_REMOVE_START_POST_REL_LINK => false,
			self::OPTIONS_REMOVE_PARENT_POST_REL_LINK => false,
			self::OPTIONS_REMOVE_ADJANCED_POSTS_REL_LINK => false,
			
			self::OPTIONS_REMOVE_WP_SHORTLINK => false 
		),
		self::OPTIONS_GROUP_RSS => array(
			
			self::OPTIONS_DISABLE_ATOM => false,
			self::OPTIONS_DISABLE_RSS2 => false,
			self::OPTIONS_DISABLE_RSS => false,
			self::OPTIONS_DISABLE_RDF => false 
		),
		self::OPTIONS_GROUP_DASHBOARD_WIDGETS => array(
			//disable dashboard widget WordPress.com Blog
			self::OPTIONS_DISABLE_DASHBOARD_WPBLOG => false,
			//disable dashboard Other WordPress News
			self::OPTIONS_DISABLE_DASHBOARD_WPNEWS => false,
			
		),
		self::OPTIONS_GROUP_OTHER => array(
			//disable HTML comments
			self::OPTIONS_DISABLE_HTML_COMMENTS => false,
		)			
	);

	private static $allOptions = false;

	public static function getAllOptions() {
		
		//
		if (empty(self::$allOptions)) {
			$allOptions = array();
			// read options from database
			foreach(self::$optionsGroupNames as $optionKey => $optionsDefault) {
				
				// load options from database
				$options = get_option($optionKey);
				
				// if loaded db options are NULL than use default
				if (empty($options)) {
					$options = $optionsDefault;
				}
				
				if (is_array($options) && $options !== array()) {
					$options = array_merge($optionsDefault, $options);
					$allOptions = array_merge($allOptions, $options);
				}
			}
			
			self::$allOptions = $allOptions;
		}
		
		return self::$allOptions;
	}

	public static function saveOptions() {
		
		// A) self::OPTIONS_GROUP
		$optionsToSave = array();
		$optionsToSave[self::OPTIONS_DISABLE_PASSWORD_RESET] = !empty($_POST[self::OPTIONS_DISABLE_PASSWORD_RESET]) ? 1 : 0;
		
		$optionsToSave[self::OPTIONS_REMOVE_GENERATOR_META_TAG] = !empty($_POST[self::OPTIONS_REMOVE_GENERATOR_META_TAG]) ? 1 : 0;
		$optionsToSave[self::OPTIONS_REMOVE_RSD_LINK] = !empty($_POST[self::OPTIONS_REMOVE_RSD_LINK]) ? 1 : 0;
		$optionsToSave[self::OPTIONS_REMOVE_FEED_LINKS] = !empty($_POST[self::OPTIONS_REMOVE_FEED_LINKS]) ? 1 : 0;
		$optionsToSave[self::OPTIONS_REMOVE_WLWMANIFEST_LINK] = !empty($_POST[self::OPTIONS_REMOVE_WLWMANIFEST_LINK]) ? 1 : 0;
		$optionsToSave[self::OPTIONS_REMOVE_INDEX_REL_LINK] = !empty($_POST[self::OPTIONS_REMOVE_INDEX_REL_LINK]) ? 1 : 0;
		$optionsToSave[self::OPTIONS_REMOVE_START_POST_REL_LINK] = !empty($_POST[self::OPTIONS_REMOVE_START_POST_REL_LINK]) ? 1 : 0;
		$optionsToSave[self::OPTIONS_REMOVE_PARENT_POST_REL_LINK] = !empty($_POST[self::OPTIONS_REMOVE_PARENT_POST_REL_LINK]) ? 1 : 0;
		$optionsToSave[self::OPTIONS_REMOVE_ADJANCED_POSTS_REL_LINK] = !empty($_POST[self::OPTIONS_REMOVE_ADJANCED_POSTS_REL_LINK]) ? 1 : 0;
		$optionsToSave[self::OPTIONS_REMOVE_WP_SHORTLINK] = !empty($_POST[self::OPTIONS_REMOVE_WP_SHORTLINK]) ? 1 : 0;
		
		update_option(self::OPTIONS_GROUP, $optionsToSave);
		
		// B) self::OPTIONS_GROUP_RSS
		$optionsToSave = array();
		$optionsToSave[self::OPTIONS_DISABLE_ATOM] = !empty($_POST[self::OPTIONS_DISABLE_ATOM]) ? 1 : 0;
		$optionsToSave[self::OPTIONS_DISABLE_RSS2] = !empty($_POST[self::OPTIONS_DISABLE_RSS2]) ? 1 : 0;
		$optionsToSave[self::OPTIONS_DISABLE_RSS] = !empty($_POST[self::OPTIONS_DISABLE_RSS]) ? 1 : 0;
		$optionsToSave[self::OPTIONS_DISABLE_RDF] = !empty($_POST[self::OPTIONS_DISABLE_RDF]) ? 1 : 0;
		
		update_option(self::OPTIONS_GROUP_RSS, $optionsToSave);
		
		// C) self::OPTIONS_GROUP_DASHBOARD_WIDGETS
		$optionsToSave = array();
		$optionsToSave[self::OPTIONS_DISABLE_DASHBOARD_WPBLOG] = !empty($_POST[self::OPTIONS_DISABLE_DASHBOARD_WPBLOG]) ? 1 : 0;
		$optionsToSave[self::OPTIONS_DISABLE_DASHBOARD_WPNEWS] = !empty($_POST[self::OPTIONS_DISABLE_DASHBOARD_WPNEWS]) ? 1 : 0;
		
		update_option(self::OPTIONS_GROUP_DASHBOARD_WIDGETS, $optionsToSave);
		
		
		// D) self::OPTIONS_GROUP_OTHER
		$optionsToSave = array();
		$optionsToSave[self::OPTIONS_DISABLE_HTML_COMMENTS] = !empty($_POST[self::OPTIONS_DISABLE_HTML_COMMENTS]) ? 1 : 0;
		
		update_option(self::OPTIONS_GROUP_OTHER, $optionsToSave);
		
		
	}
}