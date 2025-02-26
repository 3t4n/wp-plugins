<?php
/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

	$product_changelog = get_post_meta( $post_id, 'product_changelog', true );
	$ac_head_line = get_post_meta( $post_id, 'ac_head_line', true );
	$ac_display_reverse = get_post_meta( $post_id, 'ac_display_reverse', true );	
	
	
	if( empty( $product_changelog ) ) $product_changelog = array();
	
	if($ac_display_reverse=='yes'){
		
		rsort($product_changelog);
		}
	
	$class_awesome_changelog_functions = new class_awesome_changelog_functions();
	$changlog_types = $class_awesome_changelog_functions->changlog_status();
	
	
	//echo '<pre>'; print_r( $product_changelog );  echo '</pre>';

wp_enqueue_style('ac_style');

?>

<div class="awesome-changelog awesome-changelog-<?php echo $post_id; ?>">
	
	<h2><?php echo $ac_head_line; ?></h2>
	
	<?php 
	foreach( $product_changelog as $changelog_id => $changelog ){
		
		$changelog_version 		= isset( $changelog['changelog_version'] ) ? $changelog['changelog_version'] : '---';
		$changelog_log_items	= isset( $changelog['log_items'] ) ? $changelog['log_items'] : array();
		
		echo "<div class='changelog changelog-$changelog_id'>";
		echo "<span class='version'>$changelog_version</span>";
        echo "<ul class='log-items'>";
		
		foreach( $changelog_log_items as $log_id => $log_data ){
			
			$log_id 		= isset( $log_data['log_id'] ) ? $log_data['log_id'] : time();
			$log_type 		= isset( $log_data['log_type'] ) ? $log_data['log_type'] : '';
			$log_date 		= isset( $log_data['log_date'] ) ? $log_data['log_date'] : '';
			$log_content 	= isset( $log_data['log_content'] ) ? $log_data['log_content'] : '';
			
			$time_ago 		= sprintf(__('%s ago','awesome-changelog' ), human_time_diff( date("U", strtotime($log_date) ), current_time('timestamp') ));


			if(!empty($changlog_types[$log_type]['title'])){
				$log_type_text	=  $changlog_types[$log_type]['title'];
				}			
			else{
				
				$log_type_text	=  'none';
				}
			
			
			echo "
			<li>
				<span class='date pt-tooltip  tooltipstered'>$time_ago</span>
				<span class='type $log_type'>$log_type_text</span>
				<span class='content'>$log_content</span>
			</li>";
			
		}
		
					            
		echo "</ul>";
		
		
		echo "</div>";
	}
	
	
	?>

</div>