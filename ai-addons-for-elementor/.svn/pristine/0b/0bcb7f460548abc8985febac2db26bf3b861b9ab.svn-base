<?php
class AIEA_Post_Elements {
	
	protected static $instance;
	
	public static function instance() {

		if ( null === self::$instance ) {

			self::$instance = new self();
		}

		return self::$instance;
	}
	
	function get_contact_forms_7() { 
		
		$contact_forms = array( '' => esc_html__( 'None', 'ai-addons' ) );
		
		if( class_exists( "WPCF7" ) ){
			$args = array('post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1);
			if( $data = get_posts( $args ) ){
				foreach( $data as $key ){
					$contact_forms[$key->ID] = $key->post_title;
				}
			}
		}
		
		return $contact_forms;
		
	}
	
	function get_ninja_forms() { 
		
		global $wpdb;
		$forms = array( '' => esc_html__( 'None', 'ai-addons' ) );
		if( class_exists( "Ninja_Forms" ) ){
			$result = $wpdb->get_results( "SELECT id, title FROM ". $wpdb->prefix ."nf3_forms" );

			if( !empty( $result ) ){
				foreach( $result as $key ){
					$forms[$key->id] = $key->title;
				}
			}
		}
		
		return $forms;
		
	}
	
	function get_wp_forms() { 
		
		static $forms_list = [];
		
		if( function_exists( 'wpforms' ) && empty( $forms_list ) ) {
			$forms = wpforms()->form->get();
			if ( ! empty( $forms ) ) {
				$forms_list[0] = esc_html__( 'Select a form', 'ai-addons' );
				foreach ( $forms as $form ) {
					$forms_list[ $form->ID ] = mb_strlen( $form->post_title ) > 100 ? mb_substr( $form->post_title, 0, 97 ) . '...' : $form->post_title;
				}
			}
		}

		return $forms_list;
		
	}

	function pagination( $args = array(), $max = '' ) {
    
		$defaults = array(
			'range'           => 4,
			'custom_query'    => false,
			'first_string' => esc_html__( 'First', 'ai-addons' ),
			'previous_string' => esc_html__( 'Prev', 'ai-addons' ),
			'next_string'     => esc_html__( 'Next', 'ai-addons' ),
			'last_string'     => esc_html__( 'Last', 'ai-addons' )
		);
		
		$args = wp_parse_args( 
			$args, 
			apply_filters( 'aiea_wp_bootstrap_pagination_defaults', $defaults )
		);
		
		$args['range'] = (int) $args['range'] - 1;
		if ( !$args['custom_query'] ){
			$args['custom_query'] = $GLOBALS['wp_query'];
		}
		$count = (int) $args['custom_query']->max_num_pages;
		$count = absint( $count ) ? absint( $count ) : (int) $max;
		
		$page = 1;
		if( get_query_var('paged') ){
			$page = intval( get_query_var('paged') );
		}elseif( get_query_var('page') ){
			$page = intval( get_query_var('page') );
		}
		
		$ceil  = ceil( $args['range'] / 2 );
		
		if ( $count <= 1 )
			return FALSE;
		
		if ( !$page )
			$page = 1;
		
		if ( $count > $args['range'] ) {
			if ( $page <= $args['range'] ) {
				$min = 1;
				$max = $args['range'] + 1;
			} elseif ( $page >= ($count - $ceil) ) {
				$min = $count - $args['range'];
				$max = $count;
			} elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
				$min = $page - $ceil;
				$max = $page + $ceil;
			}
		} else {
			$min = 1;
			$max = $count;
		}
		
		echo '<div class="post-pagination-wrap"><ul class="inc-nav pagination post-pagination justify-content-center">';
		
		$previous = intval($page) - 1;
		$previous = esc_attr( get_pagenum_link($previous) );
		
		// For theme check
		$t_next_post_link = get_next_posts_link();
		$t_prev_post_link = get_previous_posts_link();
		
		$firstpage = esc_attr( get_pagenum_link(1) );
		if ( $firstpage && (1 != $page) && isset( $args['first_string'] ) && $args['first_string'] != '' )
			echo '<li class="inc-nav-item previous"><a href="' . esc_url( $firstpage ) . '" title="' . esc_attr__( 'First', 'ai-addons') . '">' . esc_html( $args['first_string'] ) . '</a></li>';
		if ( $previous && (1 != $page) )
			echo '<li class="inc-nav-item"><a href="' . esc_url( $previous ) . '" title="' . esc_attr__( 'previous', 'ai-addons') . '">' . esc_html( $args['previous_string'] ) . '</a></li>';
		
		if ( !empty($min) && !empty($max) ) {
			for( $i = $min; $i <= $max; $i++ ) {
				if ($page == $i) {
					echo '<li class="inc-nav-item active"><span class="active">' . str_pad( (int)$i, 2, '0', STR_PAD_LEFT ) . '</span></li>';
				} else {
					echo sprintf( '<li class="inc-nav-item"><a href="%s">%002d</a></li>', esc_attr( get_pagenum_link($i) ), $i );
				}
			}
		}
		
		$next = intval($page) + 1;
		$next = esc_attr( get_pagenum_link($next) );
		if ($next && ($count != $page) )
			echo '<li class="inc-nav-item"><a href="' . esc_url( $next ) . '" class="next-page" title="' . esc_attr__( 'next', 'ai-addons') . '">' . esc_html( $args['next_string'] ) . '</a></li>';
		
		$lastpage = esc_attr( get_pagenum_link($count) );
		if ( $lastpage && isset( $args['last_string'] ) && $args['last_string'] != '' ) {
			echo '<li class="inc-nav-item next"><a href="' . esc_url( $lastpage ) . '" title="' . esc_attr__( 'Last', 'ai-addons') . '">' . esc_html( $args['last_string'] ) . '</a></li>';
		}
		
		echo '</ul></div>';
	}
	
	function infinite_pagination_links( $args = array(), $max = '' ) {
    
		$defaults = array(
			'range'           => 4,
			'custom_query'    => false
		);
		
		$args = wp_parse_args( $args, $defaults );
		
		$args['range'] = (int) $args['range'] - 1;
		if ( !$args['custom_query'] ){
			$args['custom_query'] = $GLOBALS['wp_query'];
		}
		$count = (int) $args['custom_query']->max_num_pages;
		$count = absint( $count ) ? absint( $count ) : (int) $max;
		
		$page = 1;
		if( get_query_var('paged') ){
			$page = intval( get_query_var('paged') );
		}elseif( get_query_var('page') ){
			$page = intval( get_query_var('page') );
		}
		
		$ceil  = ceil( $args['range'] / 2 );
		
		if ( $count <= 1 )
			return FALSE;
		
		if ( !$page )
			$page = 1;
		
		if ( $count > $args['range'] ) {
			if ( $page <= $args['range'] ) {
				$min = 1;
				$max = $args['range'] + 1;
			} elseif ( $page >= ($count - $ceil) ) {
				$min = $count - $args['range'];
				$max = $count;
			} elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
				$min = $page - $ceil;
				$max = $page + $ceil;
			}
		} else {
			$min = 1;
			$max = $count;
		}
		
		$links_arr = array();
		
		if ( !empty($min) && !empty($max) ) { $next_stat = 0; $extra_class = '';
			for( $i = $min; $i <= $max; $i++ ) {
				if ( $page != $i ) $links_arr[] = get_pagenum_link($i);			
			}
		}

		return $links_arr;
	}
	
}

function aiea_post_elements() {
	return AIEA_Post_Elements::instance();
}