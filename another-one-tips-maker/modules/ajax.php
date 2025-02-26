<?php 	
 //hook the Ajax call
add_action('wp_ajax_update_counter', 'wtb_message_action');
add_action('wp_ajax_nopriv_update_counter', 'wtb_message_action');

function wtb_message_action(){
    if( check_ajax_referer( 'filter_nonce', 'security') ){

		$cur_value = (int)get_post_meta( $_POST['id'], 'vote', true );
		if( $_POST['method'] == 'inc' ){
			$cur_value = $cur_value + 1;
			update_post_meta( $_POST['id'], 'vote', $cur_value );
			echo $cur_value;
		}
		if( $_POST['method'] == 'dec' ){
			$cur_value = $cur_value - 1;
			update_post_meta( $_POST['id'], 'vote', $cur_value );
			echo $cur_value;
		}
	} 
	die();
} 

?>