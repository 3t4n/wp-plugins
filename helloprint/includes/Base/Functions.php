<?php

/**
 * Output a select input box.
 *
 * @param array $field Data about the field to render.
 */
if (!function_exists('helloprint_wp_select')) {
	function helloprint_wp_select($field)
	{
		global $thepostid, $post;

		$thepostid = empty($thepostid) ? $post->ID : $thepostid;
		$field     = wp_parse_args(
			$field,
			array(
				'class'             => 'select short',
				'style'             => '',
				'wrapper_class'     => '',
				'value'             => get_post_meta($thepostid, $field['id'], true),
				'name'              => $field['id'],
				'desc_tip'          => false,
				'custom_attributes' => array(),
			)
		);

		$wrapper_attributes = array(
			'class' => $field['wrapper_class'] . " form-field {$field['id']}_field",
		);

		$label_attributes = array(
			'for' => $field['id'],
		);

		$field_attributes          = (array) $field['custom_attributes'];
		$field_attributes['style'] = $field['style'];
		$field_attributes['id']    = $field['id'];
		$field_attributes['name']  = $field['name'];
		$field_attributes['class'] = $field['class'];

		$tooltip     = !empty($field['description']) && false !== $field['desc_tip'] ? $field['description'] : '';
		$description = !empty($field['description']) && false === $field['desc_tip'] ? $field['description'] : '';
?>
		<p <?php echo wp_kses_post(wc_implode_html_attributes($wrapper_attributes)); // WPCS: XSS ok. 
			?>>
			<label <?php echo wp_kses_post(wc_implode_html_attributes($label_attributes)); // WPCS: XSS ok. 
					?>><?php echo wp_kses_post($field['label']); ?></label>
			<?php if ($tooltip) : ?>
				<?php echo wp_kses_post(wc_help_tip($tooltip)); // WPCS: XSS ok. 
				?>
			<?php endif; ?>
			<select <?php echo wp_kses_post(wc_implode_html_attributes($field_attributes)); // WPCS: XSS ok. 
					?>>
				<?php
				foreach ($field['options'] as $key => $value) {
					if (!is_array($value)) {
						echo '<option value="' . esc_attr($key) . '"' . esc_html(wc_selected($key, $field['value'])) . '>' . esc_html($value) . '</option>';
					} else {
						echo '<optgroup label="' . esc_attr($key) . '">';
						foreach ($value as $k => $val) {
							echo '<option value="' . esc_attr($k) . '"' . esc_html(wc_selected($k, $field['value'])) . '>' . esc_html($val) . '</option>';
						}
						echo '</optgroup>';
					}
				}
				?>
			</select>
			<?php if ($description) : ?>
				<span class="description"><?php echo wp_kses_post($description); ?></span>
			<?php endif; ?>
		</p>
<?php
	}
}


if (!function_exists('all_existing_wphp_product_ids')) {
	function all_existing_wphp_product_ids() {
        // Check for cached data
        $cached_hp_ids = get_transient('all_existing_wphp_product_ids');
        if ($cached_hp_ids !== false) {
            return $cached_hp_ids;
        }
    
        $hp_ids = [];
    
        // Query posts with a specific meta key
        $posts = get_posts([
            'post_type'      => 'any', // Match all post types
            'posts_per_page' => -1, // Retrieve all posts
            'meta_key'       => 'helloprint_external_product_id',
            'fields'         => 'ids', // Only retrieve post IDs
            'no_found_rows'  => true,  // Skip the pagination count
        ]);
    
        // Fetch all post meta in one go
        if (!empty($posts)) {
            $meta_values = get_post_meta($posts, 'helloprint_external_product_id');
    
            // Collect the meta values into an array
            foreach ($meta_values as $meta_value) {
                if (!empty($meta_value)) {
                    $hp_ids = array_merge($hp_ids, $meta_value);
                }
            }
        }
    
        // Cache the results in a transient
        set_transient('all_existing_wphp_product_ids', $hp_ids, DAY_IN_SECONDS);
    
        return $hp_ids;
    }
}


if (!function_exists("_helloprint_get_graphic_design_price")) {
	function _helloprint_get_graphic_design_price($productId = null)
	{
		$product_graphic_design_price = 0;
		$enable_product_design = get_post_meta($productId, 'helloprint_product_graphic_design_fee', true);
		if ($enable_product_design == 1) {
			$enable_product_design = true;
			$product_graphic_design_price = get_post_meta($productId, 'helloprint_product_graphic_design_price', true);
		} else if ($enable_product_design == -1) {
			$enable_product_design = false;
			$product_graphic_design_price = 0;
		} else {
			$enable_product_design = get_option("helloprint_enable_global_graphic_design");
			$product_graphic_design_price = ($enable_product_design) ? get_option("helloprint_global_graphic_design_price") : 0;
		}
		$enable_product_design = ($product_graphic_design_price > 0) ? $enable_product_design : false;
		return ['enabled' => $enable_product_design, 'price' => $product_graphic_design_price];
	}
}


if (!function_exists("helloprint_get_max_file_upload_size")) {
	function helloprint_get_max_file_upload_size()
	{
		$size = wp_max_upload_size();
		$base = log($size) / log(1024);
		$suffix = array("", "KB", "MB", "GB", "TB")[floor($base)];
		return pow(1024, $base - floor($base)) . $suffix;
	}
}

if (!function_exists("helloprint_get_checkout_country_code")) {
	function helloprint_get_checkout_country_code()
	{

		$customer = WC()->session->get('customer');
		$shipping_country = (!empty($customer['shipping_country'])) ? esc_html($customer['shipping_country']) : '';
		$billing_country = (!empty($customer['billing_country'])) ? esc_html($customer['billing_country']) : '';
		$current_user = wp_get_current_user();
		$returnCountry = '';
		if (!empty($shipping_country) || !empty($billing_country)) {
			$returnCountry = ($shipping_country) ?? $billing_country;
		} else if (!empty($current_user->billing_country)) {
			$returnCountry = $current_user->billing_country;
		} else {
			$countries_obj   = new WC_Countries();
			$returnCountry = $countries_obj->get_base_country();
		}
		return $returnCountry;
	}
}

if (!function_exists("add_helloprint_flash_notice")) {
	function add_helloprint_flash_notice($notice = "", $type = "warning", $dismissible = true)
	{
		// Here we return the notices saved on our option, if there are not notices, then an empty array is returned
		$notices = get_option("helloprint_flash_notices", array());

		$dismissible_text = ($dismissible) ? "is-dismissible" : "";

		// We add our new notice.
		array_push($notices, array(
			"notice" => $notice,
			"type" => $type,
			"dismissible" => $dismissible_text
		));
		delete_option("helloprint_flash_notices");
		// Then we update the option with our notices array
		add_option("helloprint_flash_notices", $notices);
	}
}

if (!function_exists("helloprint_get_data_from_url")) {
	function helloprint_get_data_from_url($url = "")
	{
		// Perform the HTTP GET request
        $response = wp_remote_get($url);

        // Check for an error in the response
        if (is_wp_error($response)) {
            return 'Request failed: ' . $response->get_error_message();
        }

        // Get the response body
        $body = wp_remote_retrieve_body($response);
    
        return $body;
	}
}

if (!function_exists("hp_is_pitchprint_plugin_active")) {
	function hp_is_pitchprint_plugin_active($response = "active")
	{
		include_once ABSPATH . 'wp-admin/includes/plugin.php';
		$activePlugins = get_option('active_plugins', array());
		foreach ($activePlugins as $plugin) {
			if (strpos($plugin, "pitchprint.php") !== false) {
				if ($response == "root_url") {
					$pluginNameArray = explode("/", $plugin);
					return $pluginNameArray[0];
				}
				return true;
			}
		}
		return false;
	}
}

if (!function_exists("_get_helloprint_version")) {
	function _get_helloprint_version()
	{
		global $wp_version;
		$version = $wp_version;
		$plugin_base_arr = explode('/', plugin_basename(__FILE__));
		if (isset($plugin_base_arr)) {
			$base_name = $plugin_base_arr[0];
			foreach (\get_plugins() as $key => $value) {
				if (strpos($key, $base_name) === 0) {
					$version = $value['Version'];
				}
			}
		}
		return $version;
	}
}

if (!function_exists("_helloprint_calculate_scaled_margin")) {
	function _helloprint_calculate_scaled_margin($price = null, $scaled_margins = [], $default_margin = 0)
	{
		krsort($scaled_margins);
		foreach ($scaled_margins as $key => $margin) {
			if (floatval($price) >= floatval($key)) {
				return $margin;
			}
		}
		return $default_margin;
	}
}

if (!function_exists("_helloprint_global_margin")) {
	function _helloprint_global_margin($product_margin = 0)
	{
		if ($product_margin > 0) {
			return $product_margin;
		}
		$margin = get_option('helloprint_global_product_margin', 0);
		if (empty($margin) || $margin == '' || $margin == null) {
			$margin = 0;
		}
		return $margin;
	}
}

if (!function_exists("_helloprint_global_markup")) {
	function _helloprint_global_markup($product_markup = 0)
	{
		if ($product_markup > 0) {
			return $product_markup;
		}
		$markup = get_option('helloprint_global_product_markup', 0);
		if (empty($markup) || $markup == '' || $markup == null) {
			$markup = 0;
		}
		return $markup;
	}
}

if (!function_exists("_helloprint_get_pricing_tiers_info")) {
	function _helloprint_get_pricing_tiers_info($product_id = null, $roles = [], $product_margin_option = null, $margin_markup = "")
	{

		if (empty($margin_markup)) {
			$margin_markup = get_post_meta($product_id, 'helloprint_markup_margin', true);
		}
		
		$product_default_markup = get_post_meta($product_id, 'helloprint_product_markup', true);
		$product_default_margin = get_post_meta($product_id, 'helloprint_product_margin', true);
 		if ($product_margin_option == null) {
			if ($margin_markup == "markup") {
				$product_margin_option = get_post_meta($product_id, 'helloprint_product_markup_option', true);
				$product_default_markup_margin = $product_default_markup;
			} else {
				$product_margin_option = get_post_meta($product_id, 'helloprint_product_margin_option', true);
				$product_default_markup_margin = $product_default_margin;
			}
			
			if (empty($product_margin_option) && $product_margin_option != 0) {
				$product_margin_option = ($product_default_markup_margin > 0) ? 2 : 1;
			}
		}

		if ($product_margin_option == 1) {
			if ($margin_markup == "markup") {
				return ["is_scaling" => false, "default_margin" => _helloprint_global_markup(), "type" => "markup"];
			} else {
				return ["is_scaling" => false, "default_margin" => _helloprint_global_margin(), "type" => "margin"];
			}
		} else if ($product_margin_option == 2) {
			if ($margin_markup == "markup") {
				return ["is_scaling" => false, "default_margin" => $product_default_markup, "type" => "markup"];
			} else {
				return ["is_scaling" => false, "default_margin" => $product_default_margin, "type" => "margin"];
			}
			
		}
		global $wpdb;
		$productTierTableName = $wpdb->prefix . 'helloprint_product_pricing_tier';
		$product_tier = $wpdb->get_row(
            // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
            $wpdb->prepare("SELECT id, pricing_tier_id, profile FROM $productTierTableName WHERE product_id = %d", $product_id)
        );
		if (empty($roles)) {
			$user = wp_get_current_user();
			$roles = (array) $user->roles;
		}
		if (!empty($product_tier) && (empty($product_tier->profile) || in_array($product_tier->profile, $roles))) {
			$tierTableName = $wpdb->prefix . 'helloprint_pricing_tiers';
			// Use prepare() for the pricing tier query to prevent SQL injection
            $tier_details = $wpdb->get_row(
                // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
                $wpdb->prepare("SELECT * FROM $tierTableName WHERE id = %d", $product_tier->pricing_tier_id)
            );
            
            if (empty($tier_details)) {
				if ($margin_markup == "markup") {
					return ["is_scaling" => false, "default_margin" => _helloprint_global_markup($product_default_markup), "type" => "markup"];
				} else {
					return ["is_scaling" => false, "default_margin" => _helloprint_global_margin($product_default_margin), "type" => "margin"];
				}
			}
			if ($tier_details->enable_scaling == 1) {
				$tierScaleTableName = $wpdb->prefix . 'helloprint_scaled_pricing';
				// Use prepare() for the scaled pricing query to prevent SQL injection
                $scaled_margins = $wpdb->get_results(
                    // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
                    $wpdb->prepare("SELECT * FROM $tierScaleTableName WHERE pricing_tier_id = %d ORDER BY price DESC", $tier_details->id)
                );
                $scaled_margins_array = [];
				foreach ($scaled_margins as $sc) {
					$scaled_margins_array[$sc->price] = $sc->margin;
				}
				return ["is_scaling" => true, "scaled_margins" => $scaled_margins_array, "default_margin" => $tier_details->default_markup, "type" => $margin_markup];
			}
			return ["is_scaling" => false, "default_margin" => $tier_details->default_markup, "type" => $margin_markup];
		} else {
			if ($margin_markup == "markup") {
				return ["is_scaling" => false, "default_margin" => _helloprint_global_markup($product_default_markup), "type" => "markup"];
			} else {
				return ["is_scaling" => false, "default_margin" => _helloprint_global_margin($product_default_margin), "type" => "margin"];
			}
		}
	}
}



/**
 * Retrieves data from any custom table with caching.
 *
 * @param string $table_name The name of the custom table (without prefix).
 * @param array $where_conditions Associative array of where conditions for the query.
 * @param array $select_columns Columns to retrieve (default is all '*').
 * @return mixed The query result, either a single row or multiple rows.
 */
if (!function_exists("_helloprint_get_custom_table_data")) {
    function _helloprint_get_custom_table_data($table_name, $where_conditions = [], $select_columns = ['*']) {
        global $wpdb;

        // Sanitize the table name to prevent SQL injection
        $full_table_name = $wpdb->prefix . sanitize_title($table_name);

        // Prepare the SELECT clause
        $select_clause = implode(', ', array_map('esc_sql', $select_fields));

        // Prepare WHERE clause
        $where_parts = [];
        $where_values = [];
        
        foreach ($where_conditions as $field => $value) {
            // Use placeholder and sanitize field names
            $where_parts[] = "$field = %s"; // Placeholder
            $where_values[] = $value; // Value to bind
        }

        // Combine where conditions into a single string if there are any
        $where_clause = !empty($where_parts) ? 'WHERE ' . implode(' AND ', $where_parts) : '';

        // Prepare the final SQL query
        $query = "SELECT $select_clause FROM $full_table_name $where_clause";

        // Use wpdb->prepare() to prepare the query
        if (!empty($where_values)) {
            $prepared_query = $wpdb->prepare(
                // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                $query, ...$where_values
            );
        } else {
            $prepared_query = $query; // No conditions to prepare
        }

        // Execute the query
        $data = $wpdb->get_results(
            // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
            $prepared_query);

        return $data;
    }
}


/**
 * Adds a specified number of working days to the current date and returns the result.
 *
 * @param int $days The number of working days to add.
 * @return string The date in the format like 'Nov 15, 2024'.
 */
if (!function_exists("__helloprint_add_working_days")) {
    function __helloprint_add_working_days($days, $date = null)
    {
        // Sanitize input to ensure it’s an integer
        $days = absint($days);

        // Create a DateTime object with the current date
        $currentDate = empty($date) ? new \DateTime(current_time('Y-m-d')) : new \DateTime($date);

        $addedDays = 0;
        // Loop until we've added the specified number of working days
        while ($addedDays < $days) {
            $currentDate->modify('+1 day');

            // Check if the current day is a weekday (Mon-Fri)
            if ($currentDate->format('N') < 6) { // 'N' returns 1 (Mon) to 7 (Sun)
                $addedDays++;
            }

            
        }

        // Return the formatted date
        return esc_html($currentDate->format('M j, Y')); // Escaping for safe output
    }
}