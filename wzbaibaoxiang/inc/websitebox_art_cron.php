<?php
add_action( 'init', 'websitebox_bootstrap' );

add_filter( 'cron_schedules', 'websitebox_add_cron_interval' );
add_action( 'websitebox_cronhook','websitebox_cronexec' );
function websitebox_add_cron_interval( $schedules ) {
   
   $schedules['five_minutes'] = array(
      'interval' => 300,
      'display'  => esc_html__( 'Every Five Minutes' ),
   );
   return $schedules;
}
function websitebox_bootstrap() {
    
	if(!wp_next_scheduled( 'websitebox_cronhook' )){
        wp_schedule_event( time(), 'five_minutes', 'websitebox_cronhook' );
    }
    
}

function websitebox_cronexec() {
	global $wpdb;
	$scheduled_ids = $wpdb->get_col(
		$wpdb->prepare(
			"SELECT ID FROM {$wpdb->posts} WHERE post_date <= %s AND post_status = 'future' LIMIT %d",
			current_time( 'mysql', 0 ),
			20
		)
	);
	
	if ( ! count( $scheduled_ids ) ) {
		return;
	}

	array_map( 'wp_publish_post', $scheduled_ids );
}