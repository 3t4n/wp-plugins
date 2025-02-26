	<?php
	/*
	 * Plugin Name: Fuelling
	 * Plugin URI: https://www.anware.de/download/wp-fuelling.zip
	 * Description: Control your fuel consumption.
	 * Version: 0.91
	 * Author: TJC
	 * Author URI: https://www.anware.de/wordpress/fuelling/
	 */
	
	// include all classes (in one file)
	require_once 'filling.class.php';
	
	// initialization
	fufi_Filling::$site_url = site_url ();
	
	// ====================================================
	
	/* Set up the post types. */
	add_action ( 'init', 'fufi_register_post_types' );
	
	/* Registers post types. */
	function fufi_register_post_types() {
		
		/* Set up the arguments for the 'fuel' post type. */
		$fuel_filling_args = array (
				'public' => true,
				'has_archive' => false,
				'query_var' => 'fuel_filling',
				'rewrite' => array (
						'slug' => 'fuel_filling',
						'with_front' => false 
				),
				'supports' => array (
						'' 
				),
				// 'comments',
				// 'revisions'
				'labels' => array (
						'name' => 'Fuel Consumption',
						'singular_name' => 'Fuel Consumption',
						'add_new' => 'Add Filling',
						'add_new_item' => 'Add Filling',
						'edit_item' => 'Edit Filling',
						'all_items' => 'All Fillings',
						'new_item' => 'New Filling',
						'view_item' => 'View Fillings',
						'search_items' => 'Search Filling',
						'not_found' => 'No Fillings Found',
						'not_found_in_trash' => 'No Fillings In Trash' 
				) 
		);
		
		/* Register the fuel-filling post type. */
		register_post_type ( 'fuel_filling', $fuel_filling_args );
	}
	
	// ====================================================
	
	// hook to add a meta box
	add_action ( 'add_meta_boxes', 'fufi_meta_box_create' );
	function fufi_meta_box_create() {
		
		// create a custom meta box
		add_meta_box ( 'fuel-filling-meta', 'Fuel filling details', 'fufi_meta_box_function', 'fuel_filling', 'normal', 'high' );
	}
	function fufi_meta_box_function($post) {
		// helper function
		$get_single_meta_if_exist = function ($meta_key, $default = NULL) use($post) {
			$meta = get_post_meta ( $post->ID, $meta_key, true );
			if (NULL != $meta) {
				return $meta;
			} else {
				return $default;
			}
		};
		// retrieve the meta data values if they exist
		$ff_date = $get_single_meta_if_exist ( '_ff_date', date ( "Y-m-d", time () ) );
		$ff_evaluate = $get_single_meta_if_exist ( '_ff_evaluate', 1 );
		$ff_quantity = $get_single_meta_if_exist ( '_ff_quantity' );
		$ff_full = $get_single_meta_if_exist ( '_ff_full', 1 );
		$ff_price = $get_single_meta_if_exist ( '_ff_price' );
		$ff_mileage = $get_single_meta_if_exist ( '_ff_mileage' );
		$ff_station = $get_single_meta_if_exist ( '_ff_station' );
		$ff_comment = $get_single_meta_if_exist ( '_ff_comment' );
		?>

<p>
	Date: <input type="date" name="ff_date" value="<?php echo esc_attr( $ff_date ); ?>" />
</p>
<p>
	Quantity: <input type="number" step="0.01" name="ff_quantity" value="<?php echo esc_attr( $ff_quantity ); ?>" />
</p>
<p>
	<input type="hidden" name="ff_full" value="0" />
	<!-- hidden field required in order to get value = FALSE for unchecked checkboxes -->
	Full Refueling: <input type="checkbox" name="ff_full" value="1" <?php if( TRUE == $ff_full ) { ?> checked="checked" <?php } ?> />
</p>
<p>
	Price: <input type="number" step="0.001" name="ff_price" value="<?php echo esc_attr( $ff_price ); ?>" />
</p>
<p>
	Mileage: <input type="number" step="1" name="ff_mileage" value="<?php echo esc_attr( $ff_mileage ); ?>" />
</p>
<p>
	Station: <input type="text" name="ff_station" value="<?php echo esc_attr( $ff_station ); ?>" />
</p>
<p>
	Comment: <input type="text" name="ff_comment" value="<?php echo esc_attr( $ff_comment ); ?>" />
</p>
<p>
	<input type="hidden" name="ff_evaluate" value="0" />
	<!-- hidden field required in order to get value = FALSE for unchecked checkboxes -->
	Evaluate: <input type="checkbox" name="ff_evaluate" value="1" <?php if( TRUE == $ff_evaluate ) { ?> checked="checked" <?php } ?>" />
</p>

<?php
	}
	
	/*
	 * hook to save the meta box data
	 */
	add_action ( 'save_post', 'fufi_save_meta' );
	function fufi_save_meta($post_id) {
		// If this isn't a 'book' post, don't update it.
		$post_type = get_post_type ( $post_id );
		if ("fuel_filling" != $post_type)
			return;
			
			// verify that the meta data is set and save
		if (isset ( $_POST ['ff_date'] )) {
			$ffd = sanitize_text_field ( $_POST ['ff_date'] );
			if (date_create_from_format ( 'Y-m-d', $ffd ))
				update_post_meta ( $post_id, '_ff_date', $ffd );
		}
		if (isset ( $_POST ['ff_quantity'] )) {
			update_post_meta ( $post_id, '_ff_quantity', ( float ) sanitize_text_field ( $_POST ['ff_quantity'] ) );
		}
		if (isset ( $_POST ['ff_full'] )) {
			update_post_meta ( $post_id, '_ff_full', ( int ) sanitize_text_field ( $_POST ['ff_full'] ) );
		}
		if (isset ( $_POST ['ff_price'] )) {
			update_post_meta ( $post_id, '_ff_price', ( float ) sanitize_text_field ( $_POST ['ff_price'] ) );
		}
		if (isset ( $_POST ['ff_mileage'] )) {
			update_post_meta ( $post_id, '_ff_mileage', ( int ) sanitize_text_field ( $_POST ['ff_mileage'] ) );
		}
		if (isset ( $_POST ['ff_station'] )) {
			update_post_meta ( $post_id, '_ff_station', sanitize_text_field ( $_POST ['ff_station'] ) );
		}
		if (isset ( $_POST ['ff_comment'] )) {
			update_post_meta ( $post_id, '_ff_comment', sanitize_text_field ( $_POST ['ff_comment'] ) );
		}
		if (isset ( $_POST ['ff_evaluate'] )) {
			update_post_meta ( $post_id, '_ff_evaluate', ( int ) sanitize_text_field ( $_POST ['ff_evaluate'] ) );
		}
	}
	
	// ====================================================
	
	// ADD NEW COLUMN
	function fufi_columns_head($defaults) {
		unset ( $defaults ['title'] );
		unset ( $defaults ['date'] );
		unset ( $defaults ['comments'] );
		$defaults ['filling_date'] = 'Filling Date';
		$defaults ['quantity'] = 'Quantity';
		$defaults ['full'] = 'Full';
		$defaults ['price'] = 'Price';
		$defaults ['mileage'] = 'Mileage';
		$defaults ['station'] = 'Station';
		$defaults ['comment'] = 'Comment';
		$defaults ['evaluate'] = 'Evaluate';
		return $defaults;
	}
	
	// SHOW THE FEATURED IMAGE
	function fufi_columns_content($column_name, $post_ID) {
		$bool_char = function ($b) {
			if (TRUE == $b)
				return "&radic;";
			else
				return "-";
		};
		switch ($column_name) {
			case 'filling_date' :
				echo get_post_meta ( $post_ID, '_ff_date', true );
				break;
			case 'quantity' :
				echo get_post_meta ( $post_ID, '_ff_quantity', true );
				break;
			case 'full' :
				echo $bool_char ( get_post_meta ( $post_ID, '_ff_full', true ) );
				break;
			case 'price' :
				echo get_post_meta ( $post_ID, '_ff_price', true );
				break;
			case 'mileage' :
				echo get_post_meta ( $post_ID, '_ff_mileage', true );
				break;
			case 'station' :
				echo get_post_meta ( $post_ID, '_ff_station', true );
				break;
			case 'comment' :
				echo get_post_meta ( $post_ID, '_ff_comment', true );
				break;
			case 'evaluate' :
				echo $bool_char ( get_post_meta ( $post_ID, '_ff_evaluate', true ) );
				break;
		}
	}
	
	add_filter ( 'manage_fuel_filling_posts_columns', 'fufi_columns_head' );
	add_action ( 'manage_fuel_filling_posts_custom_column', 'fufi_columns_content', 10, 2 );
	
	// ====================================================
	function fufi_get_fillings() {
		/* Query stuff from the database. */
		$loop = new WP_Query ( array (
				'post_type' => 'fuel_filling', //
				'orderby' => 'title', //
				'order' => 'DESC',
				'posts_per_page' => - 1 
		) );
		
		$fillings = array ();
		if ($loop->have_posts ()) {
			while ( $loop->have_posts () ) {
				$loop->the_post ();
				
				$id = get_the_ID ();
				$fdate = get_post_meta ( $id, '_ff_date', true );
				$quantity = get_post_meta ( $id, '_ff_quantity', true );
				$full = get_post_meta ( $id, '_ff_full', true );
				$mileage = get_post_meta ( $id, '_ff_mileage', true );
				$price = get_post_meta ( $id, '_ff_price', true );
				$station = get_post_meta ( $id, '_ff_station', true );
				$comment = get_post_meta ( $id, '_ff_comment', true );
				$evaluate = get_post_meta ( $id, '_ff_evaluate', true );
				
				$fillings [$mileage] = new fufi_Filling ( $id, $fdate, $quantity, $mileage, $price, $station, $comment, $full, $evaluate );
			}
			ksort ( $fillings );
			fufi_Filling::enrich ( $fillings );
			return $fillings;
		}
		return $fillings;
	}
	// ====================================================
	function fufi_list_shortcode() {
		$fillings = fufi_get_fillings ();
		krsort ( $fillings );
		if (count ( $fillings ) > 0) {
			$output = "";
			// compile table
			$output .= '<div class="fillings">';
			$output .= '<table>';
			$output .= fufi_Filling::tableHeader;
			foreach ( $fillings as $idx => $filling ) {
				$output .= $filling->tableRow ();
			}
			$output .= '</table></div>';
		} else { /* If no stuff was found. */
			$output = '<p>No entries found.';
		}
		
		return $output;
	}
	
	// ====================================================
	function fufi_enqueue_scripts() {
		wp_enqueue_script ( 'chart-min-js', plugins_url ( 'Chart.min.js', __FILE__ ), array (), 1.0, false );
	}
	add_action ( 'init', 'fufi_enqueue_scripts' );
	
	// ====================================================
	function fufi_price_chart_shortcode() {
		$fillings = fufi_get_fillings ( False );
		if (count ( $fillings ) > 0) {
			// create coordinates string
			$xdata = "";
			$ydata = "";
			$last = count ( $fillings );
			foreach ( $fillings as $idx => $filling ) {
				$xdata .= '"' . date ( "d.m.y", strtotime ( $filling->fdate ) ) . '"';
				$ydata .= $filling->ppu;
				if (! ! (-- $last)) {
					$xdata .= ",";
					$ydata .= ",";
				}
			}
			$output = "";
			?>

<canvas id="pricePerUnitChart"></canvas>
<script>
			var ctx = document.getElementById("pricePerUnitChart");
			var myChart = new Chart(ctx, {
				type: 'line',
				data: {
			        labels: [<?php echo $xdata?>],
			        datasets: [{
			            data: [<?php echo $ydata?>],
			            backgroundColor: [
			                'rgba(255, 255, 255, 0.2)'
			            ],
			            borderColor: [
			               'rgba(255, 0, 0, 0.4)'
			            ],
			            borderWidth: 3
			        }]
			    },
			    options: {
			    	legend: {
			            display: false
			        },
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero:false
			                }
			            }]
			        }
			    }
			});
			</script>
<?php
			
			// print_r ( $fillings );
		} else { /* If no stuff was found. */
			$output = '<p>No entries found.';
		}
		
		return $output;
	}
	
	// ====================================================
	function fufi_consumption_chart_shortcode() {
		$fillings = fufi_get_fillings ( False );
		if (count ( $fillings ) > 0) {
			// create coordinates string
			$xdata = "";
			$ydata = "";
			$last = count ( $fillings );
			$cont = FALSE;
			foreach ( $fillings as $idx => $filling ) {
				$c = $filling->consumption;
				$e = TRUE; // TODO: $filling->evalutate;
				if ((TRUE == $e) and ('' != $c)) {
					if (TRUE == $cont) {
						$xdata .= ",";
						$ydata .= ",";
					}
					$xdata .= '"' . date ( "d.m.y", strtotime ( $filling->fdate ) ) . '"';
					$ydata .= $c;
					$cont = TRUE;
				}
			}
			$output = "";
			?>

<canvas id="consumptionChart"></canvas>
<script>
				var ctx = document.getElementById("consumptionChart");
				var myChart = new Chart(ctx, {
					type: 'line',
					data: {
				        labels: [<?php echo $xdata?>],
				        datasets: [{
				            data: [<?php echo $ydata?>],
				            backgroundColor: [
				            	'rgba(70, 70, 255, 0.2)'
				            ],
				            borderColor: [
				                          'rgba(0, 0, 255, 0.4)'
							],
	                      	borderWidth: 3,
	                      	pointStyle:  'circle',
	                      	radius : 0.1 
				            }]
				    },
				    options: {
				    	legend: {
				            display: false
				        },
				        scales: {
				            yAxes: [{
				                ticks: {
				                    beginAtZero:false
				                }
				            }]
				        }
				    }
				});
				</script>
<?php
			
			// print_r ( $fillings );
		} else { /* If no stuff was found. */
			$output = '<p>No entries found.';
		}
		
		return $output;
	}
	
	// ====================================================
	function fufi_json_export_shortcode() {
		$fillings = fufi_get_fillings ();
		ksort ( $fillings );
		foreach ( $fillings as $filling ) {
			$entries [] = $filling->jsonRelevantData ();
		}
		if (NULL != $entries) {
			$array = array_values ( $entries );
			// if (count ( $fillings ) > 0) {
			$output = '<pre><code>';
			$output .= json_encode ( $array, JSON_PRETTY_PRINT );
			$output .= '</code></pre>';
		} else { /* If no stuff was found. */
			$output = '<p>No entries found.';
		}
		
		return $output;
	}
	
	// ====================================================
	function fufi_html_form_code() {
		echo "<form action='" . esc_url ( $_SERVER ["REQUEST_URI"] ) . "' method='post'>";
		echo "<div>";
		echo "<label for='import'>JSON Data to be imported:</label><br/>";
		echo "<textarea id='import' name='import' type='text'></textarea>";
		// echo "<input id='import' name='import' type='text' value='' />";
		echo "</div>";
		echo "<p /><p /><input type='submit' name='fuel-json-import-data-submitted' value='Submit'></p>";
		echo "</form>";
	}
	
	// ====================================================
	function fufi_import() {
		// if the submit button is clicked, process
		if (isset ( $_POST ['fuel-json-import-data-submitted'] )) {
			$json = $_POST ['import'];
			$json = stripslashes ( $json );
			$entries = json_decode ( $json, TRUE );
			if (NULL != $entries) {
				foreach ( $entries as $entry ) {
					$new_post = array (
							'ID' => '',
							'post_type' => 'fuel_filling',
							'post_author' => $user->ID,
							'post_status' => 'publish' 
					);
					$fdate = $entry ['fdate'];
					$quantity = $entry ['quantity'];
					$full = $entry ['full'];
					$price = $entry ['price'];
					$mileage = $entry ['mileage'];
					$station = $entry ['station'];
					$comment = $entry ['comment'];
					$evaluate = $entry ['evaluate'];
					
					if ($post_id = wp_insert_post ( $new_post )) {
						add_post_meta ( $post_id, '_ff_date', $fdate, true );
						add_post_meta ( $post_id, '_ff_quantity', $quantity, true );
						add_post_meta ( $post_id, '_ff_full', $full, true );
						add_post_meta ( $post_id, '_ff_price', $price, true );
						add_post_meta ( $post_id, '_ff_mileage', $mileage, true );
						add_post_meta ( $post_id, '_ff_station', $station, true );
						add_post_meta ( $post_id, '_ff_comment', $comment, true );
						add_post_meta ( $post_id, '_ff_evaluate', $evaluate, true );
						
						unset ( $_GET ['import'] );
						// TODO: How to redirect?
					}
				} // foreach
			} // json_decone !NULL
		}
	}
	
	// ====================================================
	function fufi_json_import_form_shortcode() {
		ob_start (); // output buffering - start remembering everything that would normally be outputted...
		fufi_import (); // if something has already been captured: try to import
		fufi_html_form_code (); // otherwise: present form
		return ob_get_clean (); // get current buffer contents and delete current output buffer
	}
	
	// ====================================================
	
	add_action ( 'init', 'fufi_register_shortcodes' );
	function fufi_register_shortcodes() {
		add_shortcode ( 'fufi_list', 'fufi_list_shortcode' );
		add_shortcode ( 'fufi_json_export', 'fufi_json_export_shortcode' );
		add_shortcode ( 'fufi_price_chart', 'fufi_price_chart_shortcode' );
		add_shortcode ( 'fufi_consumption_chart', 'fufi_consumption_chart_shortcode' );
		add_shortcode ( 'fufi_json_import_form', 'fufi_json_import_form_shortcode' );
	}
	
	// ====================================================
	
	?>
