<?php

class WRSS_Links {

	/**
	 * Setup class
	 */
	public function setup() {
		add_filter( 'plugin_action_links_wp-remote-site-search/wp-remote-site-search.php', array( $this, 'insert_links' ) );
	}

	/**
	 * Add to links
	 *
	 * @param array $links
	 *
	 * @return array
	 */
	
}
