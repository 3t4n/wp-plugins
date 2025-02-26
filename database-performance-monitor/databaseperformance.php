<?php
/*
Plugin Name: Database Performance Monitor
Description: Outputs some database query information (Memory usage, time, & number of queries) on page load for logged in admins. Both in an HTML comment and a console.log.
Version: 1.1
Author: Brad Parbs
Author URI: http://bradparbs.com
License: GPL2
*/

function bpdpm_performance() {
	$stat = sprintf(  '%d database queries in %.3f seconds, using %.2fMB memory',
    
	    get_num_queries(),
	    
	    timer_stop( 0, 3 ),
	    
	    memory_get_peak_usage() / 1024 / 1024
    
    );

    if(current_user_can('manage_options')){
	    echo "<!-- {$stat} -->" ;
	    ?><script>console.log("<?php echo $stat ?>");</script><?php
	}
}
add_action( 'wp_footer', 'bpdpm_performance', 20 );