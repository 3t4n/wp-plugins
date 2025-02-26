<?php
//###############################
//--> Retrasar la publicacion del RSS pasado X tiempo
// ###############################

	function fun_pymseo_pymseo_delay_posts_from_appearing($where) {
		global $wpdb;
		if ( is_feed() ) {
			// timestamp in WP-format
			$now = gmdate('Y-m-d H:i:s');
			// value for wait; + device
			$wait = get_option('pymseoUXDDelayPostsFromAppearing'); // integer
			// http://dev.mysql.com/doc/refman/5.0/en/date-and-time-functions.html#function_timestampdiff
			$device = 'MINUTE'; //MINUTE, HOUR, DAY, WEEK, MONTH, YEAR
			// add SQL-sytax to default $where
			$where .= " AND TIMESTAMPDIFF($device, $wpdb->posts.post_date_gmt, '$now') > $wait ";
		}
		return $where;
	}
	add_filter('posts_where', 'fun_pymseo_pymseo_delay_posts_from_appearing');

?>