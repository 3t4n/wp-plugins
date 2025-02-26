<?php
/*
* @Author 		pickplugins
* Copyright: 	pickplugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 







function awesome_changelog_types_css(){
	
	$class_awesome_changelog_functions = new class_awesome_changelog_functions();
	
	$changlog_status = $class_awesome_changelog_functions->changlog_status();
	
	
	echo '<style type="text/css">';
	
	foreach($changlog_status as $type_key=>$types){
		
		$css = $types['css'];
		
		echo '.awesome-changelog .log-items li .type.'.$type_key.'{';
		
		echo $css;
		
		echo '}';
		}
	
	
	
	echo '</style>';
	
	
	
	
	}

add_filter('wp_head','awesome_changelog_types_css');



function ac_changelog_post_types(){
	
		$post_types_all = get_post_types( '', 'names' ); 
		foreach ( $post_types_all as $post_type ) {
			
			$obj = get_post_type_object( $post_type );

			
			$posttypes[$post_type] = $obj->labels->singular_name;
			
			}
		return $posttypes;
	
	}















function ac_display_changelog_single_function( $content ){
	
	$allowed_post_type = get_option( 'ac_options_select_post_type', array() );
	
	
	//echo "<pre>".var_export($allowed_post_type, true)."</pre>";
	
	if( !in_array(get_post_type(), $allowed_post_type) ) return $content;
	
	$current_post_id 	= get_the_ID();
	$product_changelog 	= get_post_meta( $current_post_id, 'product_changelog', true );
	$ac_display_automatically 	= get_post_meta( $current_post_id, 'ac_display_automatically', true );	
	$ac_display_reverse 	= get_post_meta( $current_post_id, 'ac_display_reverse', true );		
	
	//var_dump($ac_display_automatically);
	
	if( ! empty( $product_changelog ) && $ac_display_automatically=='yes' ) {
		
		$content .= do_shortcode("[awesome_changelog id=$current_post_id]");
	}
	
	
	return $content;
}
add_filter( 'the_content', 'ac_display_changelog_single_function' );





function ac_add_changelog( $changelog_data = array() ){
	
	$changelog_id			= isset( $changelog_data['changelog_id'] ) ? $changelog_data['changelog_id'] : time();
	$changelog_version 		= isset( $changelog_data['changelog_version'] ) ? $changelog_data['changelog_version'] : '';
	$changelog_log_items	= isset( $changelog_data['log_items'] ) ? $changelog_data['log_items'] : array();
	
	echo "
	<div class='single'>
		<span class='remove'><i class='fa fa-times'></i></span>
		<span class='move'><i class='fa fa-bars'></i></span>
		<input type='text' placeholder='1.0.0' name='product_changelog[$changelog_id][changelog_version]' value='$changelog_version' />
		<ul class='log-items'>";
	
	if( empty( $changelog_log_items ) ) {
		echo ac_add_log_items();
	}
	
	foreach( $changelog_log_items as $log_index=>$log ){

		$log['changelog_id'] = $changelog_id;
		$log['log_id'] = $log_index;
		echo ac_add_log_items($log);
	}

	echo "
		</ul>
		<div changelog_id='$changelog_id' class='button add-log-item'>Add Log</div>
	</div>";
}

	
function ac_add_log_items( $log_data = array() ){
	
	$class_awesome_changelog_functions = new class_awesome_changelog_functions();
	$changlog_status = $class_awesome_changelog_functions->changlog_status();
	
	
	
	$changelog_id 	= isset( $log_data['changelog_id'] ) ? $log_data['changelog_id'] : time();
	$log_id 		= isset( $log_data['log_id'] ) ? $log_data['log_id'] : time();
	$log_type 		= isset( $log_data['log_type'] ) ? $log_data['log_type'] : '';
	$log_date 		= isset( $log_data['log_date'] ) ? $log_data['log_date'] : '';
	$log_content 	= isset( $log_data['log_content'] ) ? $log_data['log_content'] : '';
	

	echo "
	<li>
		<span class='remove'><i class='fa fa-times'></i></span>
		<span class='move'><i class='fa fa-arrows-alt'></i></span> 
		<select name='product_changelog[$changelog_id][log_items][$log_id][log_type]'>";
			
			
			foreach($changlog_status as $status_key=>$status){
				
				$title = $status['title'];
				
				?>
                <option <?php if( $log_type == $status_key) echo 'selected'; ?>  value="<?php echo $status_key; ?>"><?php echo $title; ?></option>
                <?php
				
				
				
				}

	
	echo "</select>
		<input  class='ac_date_field' type='text' placeholder='17-05-2016' name='product_changelog[$changelog_id][log_items][$log_id][log_date]' value='$log_date' />
		<textarea placeholder='Write something...' name='product_changelog[$changelog_id][log_items][$log_id][log_content]' rows='1' cols='50'>$log_content</textarea>
		
	</li>";
}





function ac_ajax_add_new_changelog() {

	echo ac_add_changelog();
	die();
}

add_action('wp_ajax_ac_ajax_add_new_changelog', 'ac_ajax_add_new_changelog');

function ac_ajax_add_new_changelog_item() {
	
	$changelog_id = isset( $_POST['changelog_id'] ) ? (int)sanitize_text_field($_POST['changelog_id']) : time();
	
	$log_data = array();
	$log_data['changelog_id'] = $changelog_id;
	
	echo ac_add_log_items($log_data);
	die();
}

add_action('wp_ajax_ac_ajax_add_new_changelog_item', 'ac_ajax_add_new_changelog_item');
