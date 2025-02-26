<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Enable WordPress Dashicons On Frontend
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
	
	function adosui_include_dashicons_font(){
		wp_enqueue_style('dashicons');
	}
	add_action( 'wp_enqueue_scripts', 'adosui_include_dashicons_font', 100 );
	
	
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Custom Slugs
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
	
	// URL Slug
	function adosui_customize_adverts_post_type( $args, $type = null ) {
	   
		$options = get_option('adosui_slug_options_settings');
		
		if($type != "advert" ) {
			return $args;
		}
		
		if(!isset($args["rewrite"])) {
			$args["rewrite"] = array();
		}
	   
		$args["rewrite"]["slug"] = $options['adosui_text_custom_url_slug'];
		return $args;
		
	}
	add_action("adverts_post_type", "adosui_customize_adverts_post_type", 10, 2);

	// Category Slug
	function adosui_customize_adverts_taxonomy( $args, $type = null ) {
		
		$options = get_option('adosui_slug_options_settings');
		
		if( $type != "advert_category" ) {
			return $args;
		}
		
		if(!isset($args["rewrite"])) {
		    $args["rewrite"] = array();
		}
	   
		$args["rewrite"]["slug"] = $options['adosui_text_custom_category_slug'];
		return $args;
	}
	add_action("adverts_register_taxonomy", "adosui_customize_adverts_taxonomy", 10, 2);

	// MAL Extension Advert Location Slug
	if ( function_exists('wpadverts_mal_init') ) {
		function adosui_customize_adverts_location_slug( $args, $type = null ) {
			
			$options = get_option('adosui_slug_options_settings');
			
			if( $type != "advert_location" ) {
				return $args;
			}
			
			if(!isset($args["rewrite"])) {
				$args["rewrite"] = array();
			}
		   
			$args["rewrite"]["slug"] = $options['adosui_text_custom_mal_location_slug'];
			return $args;
		}
		add_action("wpadverts_mal_register_taxonomy", "adosui_customize_adverts_location_slug", 10, 2);
	}
	

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Enable Comments
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */	
	
	$options = get_option('adosui_display_advert_options_settings');	
	
	if( isset($options['adosui_checkbox_activate_adverts_comments']) ){
	
		function adosui_enable_adverts_comments( $args ) {
		   $args["supports"][] = "comments";
		   return $args;
		}
		add_action("adverts_post_type", "adosui_enable_adverts_comments");

		function adosui_enable_adverts_comments_check( $data ) {
			$data["comment_status"] = "open";
			return $data;
		}
		add_action("adverts_insert_post", "adosui_enable_adverts_comments_check");
		add_action("adverts_update_post", "adosui_enable_adverts_comments_check");
	}
	
	
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Force Featured Image
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */	
	
	$options = get_option('adosui_submit_advert_options_settings');	
	
	if( isset($options['adosui_checkbox_force_featured_image']) ){
	
		function adosui_adosui_force_featured_image_add( $content ) {
			
			$post_id = adverts_request("_post_id", null);
			adosui_force_featured_image( $post_id );
			
			return $content;
		}
		add_filter( "adverts_action_preview", "adosui_adosui_force_featured_image_add" );

		function adosui_adosui_force_featured_image_edit( $path ) {
			
			if( basename( $path ) == 'manage-edit.php' && isset( $_POST['_post_id'] ) && is_numeric( $_POST['_post_id' ] ) ) {
				adosui_force_featured_image( $_POST['_post_id'] );
			}
			return $path;
		}
		add_filter( "adverts_template_load", "adosui_adosui_force_featured_image_edit" );

		function adosui_force_featured_image( $post_id ) {
			if( $post_id < 1 ) {
				// No images uploaded
				return -1;
			} else if( $post_id > 0 && get_post_thumbnail_id( $post_id ) ) {
				// Has main image selected
				return -2;
			} 
			
			$children = get_children( array( 'post_parent' => $post_id ) );
			
			foreach( $children as $child ) {
				update_post_meta( $post_id, '_thumbnail_id', $child->ID );
				return 1;
			}
			
			return 0;
		}
	}
	
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Limit Active User Listings
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
 
	function adosui_limit_user_active_listings_init() {
		if( shortcode_exists( "adverts_add" ) ) {
			remove_shortcode( "adverts_add" );
			add_shortcode( "adverts_add", "adosui_limit_user_active_listings_shortcode" );
		}
	}
	add_action( "init", "adosui_limit_user_active_listings_init", 20 );
	
	
	function adosui_limit_user_active_listings_shortcode( $atts ) {
		
		$options = get_option('adosui_submit_advert_options_settings');
		
		if ( $options['adosui_number_max_ads'] == "") {		
			$max = 1000000;		
		} else {			
			$max = $options['adosui_number_max_ads'];
		}
		
		$flash = array(
			"error" => array( ),
			"info" => array( )
		);
		$args = array(
			'post_type' => 'advert',
			'post_status' => 'publish',
			'author' => get_current_user_id(),
		); 
		
		$query = new WP_Query( $args );
		if( $query->found_posts >= $max ) {
			$message = __( 'You reached maximum active ads limit. You cannot have more than %d active Ads at once.', 'addonsuite-for-wpadverts' );
			
			$flash["error"][] = array(
				"message" => sprintf( $message, $max ),
				"icon" => "adverts-icon-attention-alt"
			);
			
			ob_start();
			adverts_flash( $flash );
			return ob_get_clean();
		}
		return shortcode_adverts_add( $atts );
	}
	
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Make Category Selection Mandatory
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */	
	
	$options = get_option('adosui_submit_advert_options_settings');	
	
    if( isset($options['adosui_checkbox_mandatory_category']) ){		
		function adosui_make_advert_category_required( $form ) {
		  if( $form['name'] != "advert" ) {
			return $form;
		  }
		  foreach( $form["field"] as $key => $field ) {
			if( $field["name"] == "advert_category" ) {
				$form["field"][$key]["validator"][] = array( "name"=> "is_required" );
			}
		  }
		  return $form;
		}
		add_filter( "adverts_form_load", "adosui_make_advert_category_required" );
	}

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Limit Category Selection To 1 (one)
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */		
	
	$options = get_option('adosui_submit_advert_options_settings');
	
	if( isset($options['adosui_checkbox_limit_category_selection_1']) ){
		function adosui_limit_category_selection( $form ) {
			if($form["name"] != 'advert' || is_admin()) {
				return $form;
			}
			$count = count( $form["field"] );
			
			for( $i = 0; $i < $count; $i++ ) {
				if($form["field"][$i]["name"] == "advert_category") {
					$form["field"][$i]["empty_option"] = 1;
					$form["field"][$i]["empty_option_text"] = "- Choose Category -";
					$form["field"][$i]["max_choices"] = 1;
				}
			}
			
			return $form;
		}
		add_filter("adverts_form_load", "adosui_limit_category_selection");	
	}

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Show Expireation Date
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */	
	
	$options = get_option('adosui_display_advert_options_settings');
	
	if( isset($options['adosui_checkbox_expiration_date']) ){
		
		function adosui_single_details_expiration_date( $post_id ) {
			$expires = get_post_meta( $post_id, "_expiration_date", true );
			if( $expires ) {
				$expires_text = date_i18n( get_option( 'date_format' ), $expires );
			} else {
				$options = get_option('adosui_display_advert_options_settings');
				$expires_text = $options['adosui_text_expiration_date'];
			}
			if( $expires_text ) { ?>				
			<div class="adverts-grid-row">
				<div class="adverts-grid-col adverts-col-30">
					<span class="adverts-round-icon adverts-icon-clock"></span>
					<span class="adverts-row-title"><?php _e("Expires", "addonsuite-for-wpadverts") ?></span>
				</div>
				<div class="adverts-grid-col adverts-col-65">
					<?php echo $expires_text ?>
				</div>
			</div>
			<?php }
		}	
		add_action("adverts_tpl_single_details", "adosui_single_details_expiration_date");	
	}

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Define Radius Disctance
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */	
	if ( function_exists('wpadverts_mal_init') ) {
		
		$options = get_option('adosui_display_advert_options_settings');
		
		function adosui_additional_radius_options ( $form ) {
			
			$options = get_option('adosui_search_advert_options_settings');
			
			if( $form["name"] != "search" ) {
				return $form;
			}
			
			$du = adverts_config( "mal.distance_unit" );
			
			foreach( $form["field"] as $key => $field ) {
				if( $field["name"] == wpadverts_mal_radius_params( "radius" ) ) {
					
					$str = $options['adosui_text_expiration_date'];
					$arr = preg_split('/\s*\,\s*/', $str);
					$arr = preg_replace('![^0-9]!', '', $arr);
					sort($arr);
					foreach ($arr as $distance) {	
						$form["field"][$key]["options"][] = array( "value" => $distance, "text" => sprintf( $distance ." %s", $du ) );
					}
					
				}
			}
			return $form;
		}
		add_filter( "adverts_form_load", "adosui_additional_radius_options", 1000 );
	}
	
	
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
* Search BY Price
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */		
	$options = get_option('adosui_search_advert_options_settings');
	
	if( isset($options['adosui_checkbox_search_by_price']) ){
		
		function adosui_search_by_price_form_load( $form ) {
    
			$options = get_option('adosui_search_advert_options_settings');	
			
			if( $form['name'] != 'search' ) {
				return $form;
			}
    
			wp_enqueue_script( 'adverts-auto-numeric' );
			$form['field'][] = array(
				"name" => "price_min",
				"type" => "adverts_field_text",
				"class" => "adverts-filter-money",
				"order" => 900,
				"label" => $options['adosui_text_price_search_label_minimal'],
				"placeholder" => __("Minimal price...", "addonsuite-for-wpadverts"),
				"meta" => array(
					"search_group" => "invisible",
					"search_type" => "half" 
				)
			);
    
			$form['field'][] = array(
				"name" => "price_max",
				"type" => "adverts_field_text",
				"class" => "adverts-filter-money",
				"order" => 900,
				"label" => $options['adosui_text_price_search_label_maximal'],
				"placeholder" => __("Maximal price...", "addonsuite-for-wpadverts"),
				"meta" => array(
					"search_group" => "invisible",
					"search_type" => "half" 
				)
			);
			
			return $form;
		}
		add_filter( 'adverts_form_load', 'adosui_search_by_price_form_load' );

		function adosui_search_by_price_query( $args ) {
			
			if( adverts_request( 'price_min' ) ) {
				
				$args["meta_query"][] = array( 
					'key' => 'adverts_price', 
					'value' => adverts_filter_money( adverts_request( 'price_min' ) ), 
					'compare' => '>=',
					'type' => 'DECIMAL(12,2)'
				);
			}
			if( adverts_request( 'price_max' ) ) {
				$args["meta_query"][] = array( 
					'key' => 'adverts_price', 
					'value' => adverts_filter_money( adverts_request( 'price_max' ) ), 
					'compare' => '<=',
					'type' => 'DECIMAL(12,2)'
				);
			}
			
			return $args;
		}
		add_filter( 'adverts_list_query', 'adosui_search_by_price_query' );
	}

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Search by Category
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */		
	$options = get_option('adosui_search_advert_options_settings');
	
	if( isset($options['adosui_checkbox_search_by_category']) ){
		
		function adosui_search_by_category_form_load( $form ) {
			
			$options = get_option('adosui_search_advert_options_settings');
			
			if( $form['name'] != 'search' ) {
				return $form;
			}
			
			$form['field'][] = array(
				"name" => "advert_category",
				"type" => "adverts_field_checkbox",
				"order" => 900,
				"label" => $options['adosui_text_category_search_label'],
				"max_choices" => 50,
				"options" => array(),
				"options_callback" => "adverts_taxonomies",
				"meta" => array(
					"search_group" => "invisible",
					"search_type" => "half" 
				)
			);
			return $form;
		}
		add_filter( 'adverts_form_load', 'adosui_search_by_category_form_load' );
		
		function adosui_search_by_category_query( $args ) {
			
			if( ! adverts_request( "advert_category" ) ) {
				return $args;
			}
			
			$args["tax_query"] = array(
				array(
					'taxonomy' => 'advert_category',
					'field'    => 'term_id',
					'terms'    => adverts_request( "advert_category" ),
				),
			);
			
			return $args;
		}
		add_filter( 'adverts_list_query', 'adosui_search_by_category_query' );
	
		// Hide category search on category page
		add_filter( "adverts_form_load", function( $form ) {
			
			if( $form["name"] != "search" || !is_tax( 'advert_category' ) ) {
				return $form;
			}
			foreach( $form["field"] as $key => $field ) {
				if( $field["name"] == "advert_category" ) {
					unset( $form["field"][$key] );
				}
			}
			return $form;
		}, 10000 );
	}
	
	
				
		
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
* Search BY Date
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
	$options = get_option('adosui_search_advert_options_settings');
	
	if( isset($options['adosui_checkbox_search_by_date']) ){
		
		function adosui_search_by_date_form_load( $form ) {
			
			$options = get_option('adosui_search_advert_options_settings');
			
			if( $form['name'] != 'search' ) {
				return $form;
			}
			//$only_today = "today";
			
			$form['field'][] = array(
				"name" => "posted_range",
				"type" => "adverts_field_radio",
				"class" => "",
				"order" => 900,
				"label" => $options['adosui_text_date_search_label'],
				"max_choices" => 1,
				"options" => array(
					array( "value" => "all", "text" => __('All periods', 'addonsuite-for-wpadverts')),
					array( "value" => "today", "text" => __('Today', 'addonsuite-for-wpadverts')),
					array( "value" => "since-yesterday", "text" => __('Since yesterday', 'addonsuite-for-wpadverts')),
					array( "value" => "less-than-7-days-ago", "text" => __('Less than 7 days ago', 'addonsuite-for-wpadverts')),
					array( "value" => "less-than-30-days-ago", "text" => __('Less than 30 days ago', 'addonsuite-for-wpadverts')),
				),
				"empty_option" => false,
				"empty_option_text" => "Select date range ...",
				"meta" => array(
					"search_group" => "invisible",
					"search_type" => "half" 
				)
			);
			
			return $form;
		}	
		add_filter( 'adverts_form_load', 'adosui_search_by_date_form_load' );
		
		function adosui_search_by_date_query( $args ) {
    
			if( adverts_request( 'posted_range' ) ) {
				
				$date_query = null;
				$ct = current_time( "timestamp", 1 );
				
				switch( adverts_request( 'posted_range' ) ) {
					case "today":
						$date_query = array( 
							"after" => date("Y-m-d 00:00:00", current_time( "timestamp", 1 ) )
						);
						break;
					case "since-yesterday":
						$date_query = array( 
							"after" => date("Y-m-d 00:00:00",  strtotime( "yesterday", $ct ) )
						);
						break;
					case "less-than-7-days-ago":
						$date_query = array( 
							"after" => date("Y-m-d 00:00:00",  strtotime( "today -7 days", $ct ) )
						);
						break;
					case "less-than-30-days-ago":
						$date_query = array( 
							"after" => date("Y-m-d 00:00:00",  strtotime( "today -30 days", $ct ) )
						);
						break;
						
				}
				
				if($date_query) {
					$args["date_query"] = $date_query;
				}
			}
			
			return $args;
		}
		add_filter( 'adverts_list_query', 'adosui_search_by_date_query' );
	}
