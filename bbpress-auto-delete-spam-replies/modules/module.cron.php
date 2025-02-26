<?php

	add_action( 'init', 'bbpress_autodelete_setup_processing_schedule' );
	function bbpress_autodelete_setup_processing_schedule() 
	{		
		if ( ! wp_next_scheduled( 'bbpress_autodelete_psuedo_cron' ) ) 
		{
			wp_schedule_event( time(), 'twicedaily', 'bbpress_autodelete_psuedo_cron');
		}
	}
	
	if (isset($_GET['bbpress-autodelete-force-run']))
	{
		add_action ('admin_init','bbpress_autodelete_psuedo_cron_callback');
	}
		
	add_action ('bbpress_autodelete_psuedo_cron','bbpress_autodelete_psuedo_cron_callback');
	function bbpress_autodelete_psuedo_cron_callback()
	{		
		global $wpdb;
		$hours = get_option('_bbp_delete_spam_hours_old',1);
	
		
		$result = $wpdb->get_results(
		"SELECT * 
		  FROM ".$wpdb->posts."
		  WHERE post_status = 'spam'
		  AND post_type = 'reply'
		  AND TIMESTAMPDIFF( HOUR, post_date, NOW()) > ".$hours
		);	

		if (isset($_GET['bbpress-autodelete-force-run']))
		{
	
			echo $hours;
			
			echo "<br>";
			
			echo count($result);
			
			echo "<br>";
			
			echo "SELECT * 
			  FROM ".$wpdb->posts."
			  WHERE post_status = 'spam'
			  AND post_type = 'reply'
			  AND TIMESTAMPDIFF( HOUR, post_date, NOW()) > ".$hours;			  
			  
			echo "<br>";
		}
		
		
		foreach ($result as $post)
		{
			$delete = $wpdb->query(	'DELETE FROM '.$wpdb->posts.' WHERE ID = '.$post->ID);
			$delete = $wpdb->query(	'DELETE FROM '.$wpdb->postmeta.' WHERE post_id = '.$post->ID);
			echo "deleting: ".$post->ID."<br>";
		}
	}
		
		
	
?>