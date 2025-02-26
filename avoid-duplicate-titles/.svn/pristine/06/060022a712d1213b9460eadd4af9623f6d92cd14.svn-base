<?php
 
/*
*
* @package    AvoidDuplicateTitles
*
*/
 
if(!defined('ABSPATH')) {
	exit;
}

/// callback ajax 
function wpadt_duplicate_title_checks_callback() {

		function title_checks() {
			$title = $_POST['post_title'];
			$title = esc_attr(sanitize_text_field( $title ));
			$post_id = $_POST['post_id'];
			$post_id = esc_attr(sanitize_text_field( $post_id ));
			if ( false == wp_verify_nonce( $_POST['nonce'], 'update-post_' . $post_id )) {
				die;
			}
			
			$active_post_type = esc_attr(sanitize_text_field($_POST['post_type']));
			$active_post_type = esc_attr(sanitize_text_field( $active_post_type ));
			$post_types_to_check = get_option('wpadt_selected_post_types');

			if ( ! isset( $post_types_to_check ) ) {
				
				$post_types_to_check = 'post';
			
			}
			
			if ( ! is_array( $post_types_to_check ) ) {
				
				if ( $post_types_to_check != $active_post_type ) {
					
					return '<span style="color:green">'.sanitize_text_field(esc_attr_e('This title is allowed.', 'avoid-duplicate-titles')).'</span>';
				
				}
			
			}
			
			if ( ! in_array($active_post_type, $post_types_to_check) ) {
				
				return '<span style="color:green">'.sanitize_text_field(esc_attr_e('This title is allowed.' , 'avoid-duplicate-titles')).'</span>';
			
			}
			
			// if (true === defined('GUTENBERG_VERSION')) {
				// return;
			// }
			
			global $wpdb;
			$duplicate_check_behavior =  get_option('wpadt_check_individual_types');
			$duplicate_check_behavior = esc_attr( $duplicate_check_behavior );
			$enforce_unique_post_titles = get_option('wpadt_allow_duplicate_titles');
			$enforce_unique_post_titles = esc_attr( $enforce_unique_post_titles );
			
			if ( ! isset( $enforce_unique_post_titles ) ) {
		
				$enforce_unique_post_titles = 'Prevent-Duplicates';
	
			}

			if ( ! isset( $duplicate_check_behavior ) ) {
				
				$duplicate_check_behavior = 'Check-All';
			
			}
			
			if ( $duplicate_check_behavior == 'Check-All' ) {
				$post_type_selector = 'AND post_type = ';
				//how many items in $post_types_to_check?
				$item_count = count($post_types_to_check);
				foreach ( $post_types_to_check as $option=>$type ) {
					//if not last item in list
					if ( $item_count > 1 ) {
						$post_type_selector = $post_type_selector . '"' .$type . '" OR post_type = ';
						$item_count = $item_count - 1;
					}
					//if last item in the list
					if ( $item_count == 1 ) {
						$post_type_selector = $post_type_selector . '"' . $type . '"';
					}					

				}
			}
			
			if ( $duplicate_check_behavior == 'Check-Individual' ) {
				$post_type_selector = "AND post_type = '{$active_post_type}'";
			}

			$posts_status_query = '';
			
			if ( function_exists( 'bpps_get_users_visible_group_posts_count' ) ) {
				
				// Members only query
					$posts_status_query .= "'members_only',";
				
				// Friends only query
				if ( bp_is_active( 'friends' ) ) {
					$posts_status_query .= "'friends_only',";
				}
				
				// Following query
				$args = array(
					'leader_id'   => $user_id,
					'follower_id' => $current_user_id
				);
				
				if ( function_exists( 'bp_follow_is_following' ) ) {
					$posts_status_query .= "'following',";
				}

				// Followed query
				$args = array(
					'leader_id'   => $current_user_id,
					'follower_id' => $user_id
				);
				
				if ( function_exists( 'bp_follow_is_following' ) ) {
					$posts_status_query .= "'followed',";
				}

				//Groups query
				if ( bp_is_active( 'groups' ) ) {
					$posts_status_query .= "'group_post',";
				}
				
			}
			
			$posts_status_query .= "'publish'";
			
			if ( $posts_status_query == "'publish'" ) {
				$posts_status_query = "= 'publish'";
			} else {
				$posts_status_query = "IN (" . $posts_status_query . ")";
			}
					
			$titles = "SELECT post_title FROM $wpdb->posts WHERE post_status $posts_status_query {$post_type_selector} AND post_title = '{$title}' AND ID != {$post_id}";
 
			$results = $wpdb->get_results($titles);

			if($results) {
				if ($enforce_unique_post_titles == 'Prevent-Duplicates') {
					return "<span style='color:red'>" . sanitize_text_field(esc_attr_e('Duplicate title detected, please change the title.' , 'avoid-duplicate-titles' ) )." </span>";
				} else {
					return '<span style="color:yellow">' . sanitize_text_field(esc_attr_e('Duplicate title, publishing is allowed.' , 'avoid-duplicate-titles')).'</span>';
				}
			} else {
				return '<span style="color:green">' . sanitize_text_field(esc_attr_e('This title is allowed.' , 'avoid-duplicate-titles')).'</span>';
			}
			
		}		
		echo title_checks();
		die();
	}

add_action('wp_ajax_title_checks', 'wpadt_duplicate_title_checks_callback');

	

