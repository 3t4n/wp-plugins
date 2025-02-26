<?php

/**
 * Hardening WordPress
 */
class FFWSecurityHardening
{
	
	// Set empty Generator
	function rm_generator_filter()
	{
		return '';
	}
	
	// Disables password reset
	function disable_password_reset()
	{
		return false;
	}
	
	// Return empty page
	function returnEmptyPage()
	{
		global $wp_query;
		status_header(404);
		$wp_query->set_404();
		include get_404_template();
		exit();
	}

	/**
	 * Removes HTML comments from page
	 *
	 * @param string $buffer        	
	 * @return mixed
	 */
	function removeHtmlCallback($buffer)
	{
		// any line beginning with "<!-- " (there is a space after dashes)
		$buffer = preg_replace('/<!--\s((?!<!--).)*-->/', '', $buffer);
		return $buffer;
	}

	/**
	 * Callback for FFWSecurityOptions::OPTIONS_DISABLE_HTML_COMMENTS
	 */
	function bufferStart()
	{
		ob_start(array(
			$this,
			'removeHtmlCallback' 
		));
	}

	/**
	 * Callback for FFWSecurityOptions::OPTIONS_DISABLE_HTML_COMMENTS
	 */
	function bufferEnd()
	{
		ob_end_flush();
	}

	public function makeHard()
	{
		$options = FFWSecurityOptions::getAllOptions();
		
		// Disable password reset
		if ($options[FFWSecurityOptions::OPTIONS_DISABLE_PASSWORD_RESET])
		{
			add_filter('allow_password_reset', array(
				$this,
				'disable_password_reset' 
			));
		}
		
		// Header Links and TAGs
		if ($options[FFWSecurityOptions::OPTIONS_REMOVE_GENERATOR_META_TAG])
		{
			// removes Generator Meta Tag
			remove_action('wp_head', 'wp_generator');
			
			// removes generator from RSS feeds and RSS comments
			add_filter('the_generator', array(
				$this,
				'rm_generator_filter' 
			));
		}
		
		if ($options[FFWSecurityOptions::OPTIONS_REMOVE_FEED_LINKS])
		{
			remove_action('wp_head', 'feed_links', 2);
			remove_action('wp_head', 'feed_links_extra', 3);
		}
		if ($options[FFWSecurityOptions::OPTIONS_REMOVE_RSD_LINK])
		{
			remove_action('wp_head', 'rsd_link');
		}
		if ($options[FFWSecurityOptions::OPTIONS_REMOVE_WLWMANIFEST_LINK])
		{
			remove_action('wp_head', 'wlwmanifest_link');
		}
		if ($options[FFWSecurityOptions::OPTIONS_REMOVE_INDEX_REL_LINK])
		{
			remove_action('wp_head', 'index_rel_link');
		}
		if ($options[FFWSecurityOptions::OPTIONS_REMOVE_START_POST_REL_LINK])
		{
			remove_action('wp_head', 'start_post_rel_link', 10, 0); // deprecated
		}
		if ($options[FFWSecurityOptions::OPTIONS_REMOVE_PARENT_POST_REL_LINK])
		{
			remove_action('wp_head', 'parent_post_rel_link');
		}
		if ($options[FFWSecurityOptions::OPTIONS_REMOVE_ADJANCED_POSTS_REL_LINK])
		{
			remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
		}
		if ($options[FFWSecurityOptions::OPTIONS_REMOVE_WP_SHORTLINK])
		{
			remove_action('wp_head', 'wp_shortlink_wp_head');
			remove_action('template_redirect', 'wp_shortlink_header', 11);
		}
		
		// RSS
		if ($options[FFWSecurityOptions::OPTIONS_DISABLE_ATOM])
		{
			add_action('do_feed_atom', array(
				$this,
				'returnEmptyPage' 
			), 1);
		}
		if ($options[FFWSecurityOptions::OPTIONS_DISABLE_RSS])
		{
			add_action('do_feed_rss', array(
				$this,
				'returnEmptyPage' 
			), 1);
		}
		if ($options[FFWSecurityOptions::OPTIONS_DISABLE_RSS2])
		{
			add_action('do_feed_rss2', array(
				$this,
				'returnEmptyPage' 
			), 1);
		}
		if ($options[FFWSecurityOptions::OPTIONS_DISABLE_RDF])
		{
			add_action('do_feed_rdf', array(
				$this,
				'returnEmptyPage' 
			), 1);
		}
		
		// OTHER
		if ($options[FFWSecurityOptions::OPTIONS_DISABLE_HTML_COMMENTS])
		{
			add_action('get_header', array(
				$this,
				'bufferStart' 
			), 1);
			add_action('wp_footer', array(
				$this,
				'bufferEnd' 
			), 1);
		}
		
		// FFWSecurityOptions::OPTIONS_GROUP_DASHBOARD_WIDGETS
		// Only when Dashboard or the administration panel is attempting to be displayed
		if (is_admin())
		{
			
			add_action('wp_dashboard_setup', function () use ($options)
			{
				if ($options[FFWSecurityOptions::OPTIONS_DISABLE_DASHBOARD_WPBLOG])
				{
					remove_meta_box('dashboard_primary', 'dashboard', 'side');
				}
				if ($options[FFWSecurityOptions::OPTIONS_DISABLE_DASHBOARD_WPNEWS])
				{
					remove_meta_box('dashboard_secondary', 'dashboard', 'side');
				}
			}, 1);
		}
	}
}