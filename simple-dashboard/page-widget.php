<?php

//Fetch Posts and show
	function DashboardExtended_page(){
	// Add the widget to the dashboard
	  global $wpdb;
	  
	  $widget_options = DashboardExtended_Options_page();
	  $request = "SELECT $wpdb->posts.*, display_name as name FROM $wpdb->posts LEFT JOIN $wpdb->users ON $wpdb->posts.post_author=$wpdb->users.ID WHERE post_status IN ('publish','static') AND post_type ='page' ";
		$request .= "ORDER BY post_date DESC LIMIT ".$widget_options['items'];
		$posts = $wpdb->get_results($request);
	
		DashboardExtended_post_html($posts,$widget_options,'page');
	}
	
	
	function DashboardExtended_Options_page() {
		$defaults = array( 'items' => 5, 'showtime' => 1, 'showauthor' => 1);
		if ( ( !$options = get_option( 'DashboardExtended_page' ) ) || !is_array($options) )
			$options = array();
		return array_merge( $defaults, $options );
	}


	function DashboardExtended_Setup_page() {
		DashboardExtended_Setup('page');
	}