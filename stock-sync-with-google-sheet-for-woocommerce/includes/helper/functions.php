<?php
/**
 * Non-object helpers functions.
 *
 * @package StockSyncWithGoogleSheetForWooCommerce
 * @since   1.2.2
 */



// Exit if accessed directly.
defined('ABSPATH') || exit;
function update_variation_title( $variation_id, $new_title ) {
	// Check if WooCommerce is active
	if ( ! class_exists( 'WC_Product_Variation' ) ) {
		return new WP_Error( 'woocommerce_missing', 'WooCommerce is not loaded.' );
	}

	// Load the variation product
	$variation = new WC_Product_Variation( $variation_id );

	if ( $variation && $variation->get_id() ) {
		$variation->set_name( $new_title ); // Set the new title
		$variation->save(); // Save changes to the database
		return true;
	}

	return false;
}



/**
 * Get an option from the options table
 */
if ( ! function_exists('ssgsw_get_option') ) {
	/**
	 * Get an option from the options table
	 *
	 * @param  string $option_name The option name.
	 * @param  mixed  $default     The default value.
	 * @return mixed
	 */
	function ssgsw_get_option( $option_name, $default = null ) {
		$value = get_option(SSGSW_PREFIX . $option_name);

		if ( ! $value ) {
			return $default;
		}

		return apply_filters('ssgsw_get_' . $option_name, $value);
	}
}
/**
 * Counts all published products in the WordPress database.
 *
 * @return int The count of published products.
 */
function ssgsw_count_all_product() {
	global $wpdb;
	$statuses = ssgsw_status_formating_funcions();
	$status_placeholders = implode(',', array_fill(0, count($statuses), '%s'));
	$product_count = $wpdb->get_var(
		$wpdb->prepare(
			"SELECT COUNT(*) 
			 FROM {$wpdb->posts} 
			 WHERE post_type = %s 
			 AND post_status IN ($status_placeholders)",
			array_merge([ 'product' ], $statuses)
		)
	);
	if ( $product_count > 100 ) {
		$limit = apply_filters('ssgsw_product_limit', 100);
		if ( $limit ) {
			return $limit;
		}
	}
	return $product_count;
}


/**
 * Update an option in the options table
 */
if ( ! function_exists('ssgsw_update_option') ) {
	/**
	 * Update an option in the options table
	 *
	 * @param  string $option_name The option name.
	 * @param  mixed  $value       The value.
	 * @return bool
	 */
	function ssgsw_update_option( $option_name, $value ) {

		$value = apply_filters('ssgsw_update_' . $option_name, $value);

		do_action('ssgsw_before_update_' . $option_name, $value);

		$updated = update_option(SSGSW_PREFIX . $option_name, $value);

		if ( $updated ) {
			do_action('ssgsw_updated_' . $option_name, $value);
		}
		return $updated;
	}
}


/**
 * Get the app instance
 */
if ( ! function_exists('ssgsw') ) {
	/**
	 * Get the app instance
	 *
	 * @return \StockSyncWithGoogleSheetForWooCommerce\App
	 */
	function ssgsw() {
		return new \StockSyncWithGoogleSheetForWooCommerce\App();
	}
}
// Function to check if ATUM Inventory Management for WooCommerce plugin is active
function ssgsw_is_atum_plugin_active() {
	// Check if the function exists
	if ( ! function_exists('is_plugin_active') ) {
		include_once ABSPATH . 'wp-admin/includes/plugin.php';
	}

	// Check if ATUM Inventory Management for WooCommerce plugin is active
	if ( is_plugin_active('atum-stock-manager-for-woocommerce/atum-stock-manager-for-woocommerce.php') ) {
		return true;
	} else {
		return false;
	}
}
/**
 * Function to check if a table exists in the WordPress database
 */
function ssgsw_atum_table_exists( $table_name ) {
	global $wpdb;
	$table_exists = $wpdb->get_var($wpdb->prepare(
		'SHOW TABLES LIKE %s',
		$table_name
	));
	return $table_exists === $table_name;
}

/**
 * Function to update or insert ATUM price
 */
function ssgsw_insert_atum_table( $product_id = '11' ) {
	global $wpdb;
	if ( ssgsw_atum_table_exists($wpdb->prefix . 'atum_product_data') ) {
		$exists = $wpdb->get_var($wpdb->prepare(
			"SELECT COUNT(*) FROM {$wpdb->prefix}atum_product_data WHERE product_id = %d",
			$product_id
		));
		if (0 == $exists) { //phpcs:ignore
			 $wpdb->query($wpdb->prepare(
				"INSERT INTO {$wpdb->prefix}atum_product_data (product_id) VALUES (%d)",
				$product_id
			));
		}
	}
}

/**
 * Function update atum price
 */
function ssgsw_update_atum_price( $product_id = '539', $key = '', $new_price = '12' ) {
	if ( is_serialized($new_price) ) {
		$new_price = maybe_unserialize($new_price);
	}
	global $wpdb;
	if ( ssgsw_atum_table_exists($wpdb->prefix . 'atum_product_data') ) {
		$new_key = ssgsw_find_atum_key_from_table($key);
		if ( $new_key ) {
			$wpdb->update( $wpdb->prefix . 'atum_product_data',
				array( $new_key => $new_price ),
				array( 'product_id' => $product_id ),
				array( '%f' ),
				array( '%d' )
			);
		}
	}
}
/**
 * Retrive ssgsw atum prorduct columns information.
 */
function ssgsw_atum_table_column_name() {
	global $wpdb;
	$columns = [];
	if ( ssgsw_atum_table_exists($wpdb->prefix . 'atum_product_data') ) {
		$results = $wpdb->get_results("DESCRIBE {$wpdb->prefix}atum_product_data");
		foreach ( $results as $row ) {
			if ( $row->Field != 'product_id') { //phpcs:ignore
				$columns[ $row->Field . '_from_atum_table' ] = $row->Field . '_from_atum_table';
			}
		}
	}
	return $columns;
}



/**
 * Get all custom meta fields data
 *
 * @return array
 */
if ( ! function_exists( 'ssgsw_get_product_custom_fields' ) ) {
	/**
	 *  Get custom meta fields data.
	 *
	 * @return array
	 */
	function ssgsw_get_product_custom_fields() {
		global $wpdb;

		// Replace 'wp_posts' with your actual posts table name if it's different.
		$postmeta_table = $wpdb->prefix . 'postmeta';

		// Replace 'product' with your actual post type for products.
		$query = $wpdb->prepare("SELECT DISTINCT meta_key, meta_value FROM $postmeta_table INNER JOIN $wpdb->posts ON $wpdb->posts.ID = $postmeta_table.post_id WHERE $wpdb->posts.post_type IN (%s, %s)", 'product', 'product_variation' );// phpcs:ignore
		$results = $wpdb->get_results($query);// phpcs:ignore

		$custom_fields = [];

		foreach ( $results as $result ) {
			$custom_fields[ $result->meta_key ] = $result->meta_key;
		}
		$atum_columns = [];
		if ( ssgsw_is_atum_plugin_active() ) {
			$atum_columns = ssgsw_atum_table_column_name();
		}
		$keys_to_unset = [
			'total_sales',
			'_sale_price',
			'_regular_price',
			'_sku',
			'_stock',
			'_stock_status',
			'_product_attributes',
			'_price',
			'_manage_stock',
			'product_image',
			'product_type',
			'_product_default_quantity',
			'_sold_individually',
			'chosen_product_cat',
			'custom_prefix_for_price',
			'custom_suffix_for_price',
			'Status',
		];
		foreach ( $keys_to_unset as $key ) {
			if ( isset($custom_fields[ $key ]) ) {
				unset($custom_fields[ $key ]);
			}
		}
		$new_custom = $custom_fields + $atum_columns;

		return $new_custom;
	}
}
// ssgsw_get_product_custom_fields();
/**
 * Save meta fields value
 *
 * @param  int   $id The option id.
 * @param  mixed $meta_key       The meta key.
 * @param  mixed $value       The meta value.
 *
 * @return void
 */
function ssgsw_meta_field_value_save( $id, $meta_key, $value ) {
	if ( is_serialized($value) ) {
		$value = maybe_unserialize($value);
	}
	if ( function_exists('get_field') ) {
		$field_object = acf_get_field($meta_key);
		if ( is_array($field_object) && ! empty($field_object) ) {
			if ( array_key_exists('choices', $field_object) ) {
				$choices = $field_object['choices'];
				if ( array_key_exists($value, $choices) ) {
					update_post_meta($id, $meta_key, $value);
				}
			} else {
				update_post_meta($id, $meta_key, $value);
			}
		} else {
			update_post_meta($id, $meta_key, $value);
		}
	} else {
		update_post_meta($id, $meta_key, $value);
	}
}

/**
 * Check acf fields type
 *
 * @param string $meta_key acf meta key.
 * @return string
 */
function check_ssgsw_file_type( $meta_key ) {
	$all_acf_type = ssgsw_all_type_field_in_acf();
	if ( function_exists('get_field') ) {
		$field_object = acf_get_field($meta_key);
		if ( is_array($field_object) && ! empty($field_object) ) {
			if ( array_key_exists('type', $field_object) ) {
				if ( 'select' === $field_object['type'] ) {
					if ( 1 === $field_object['multiple'] ) {
						return 'not_suported';
					}
				} else if ( in_array($field_object['type'], $all_acf_type) ) {
					return 'not_suported';
				}
			}
		}
	}
	return 'suported';
}


/**
 * Sql reserved keyword check
 *
 * @param string $key key.
 * @return string
 */
function ssgsw_reserved_keyword( $key ) {
	$reserved_keywords = [
		'ADD',
		'ALL',
		'ALTER',
		'AND',
		'AS',
		'ASC',
		'BETWEEN',
		'BY',
		'CHAR',
		'CHECK',
		'COLUMN',
		'CONNECT',
		'CREATE',
		'CURRENT',
		'DECIMAL',
		'DEFAULT',
		'DELETE',
		'DESC',
		'DISTINCT',
		'DROP',
		'ELSE',
		'EXCLUSIVE',
		'EXISTS',
		'FILE',
		'FLOAT',
		'FOR',
		'FROM',
		'GRANT',
		'GROUP',
		'HAVING',
		'IDENTIFIED',
		'IMMEDIATE',
		'IN',
		'INCREMENT',
		'INDEX',
		'INITIAL',
		'INSERT',
		'INTEGER',
		'INTERSECT',
		'INTO',
		'IS',
		'JOIN',
		'LIKE',
		'LOCK',
		'LONG',
		'MAXEXTENTS',
		'MINUS',
		'MLSLABEL',
		'MODE',
		'MODIFY',
		'NOAUDIT',
		'NOCOMPRESS',
		'NOT',
		'NOWAIT',
		'NULL',
		'NUMBER',
		'OF',
		'OFFLINE',
		'ON',
		'ONLINE',
		'OPTION',
		'OR',
		'ORDER',
		'PCTFREE',
		'PRIOR',
		'PRIVILEGES',
		'PUBLIC',
		'RAW',
		'RENAME',
		'RESOURCE',
		'REVOKE',
		'ROW',
		'ROWID',
		'ROWNUM',
		'ROWS',
		'SELECT',
		'SESSION',
		'SET',
		'SMALLINT',
		'START',
		'SYNONYM',
		'SYSDATE',
		'TABLE',
		'THEN',
		'TO',
		'TRIGGER',
		'UID',
		'UNION',
		'UNIQUE',
		'UPDATE',
		'USER',
		'VALIDATE',
		'VALUES',
		'VARCHAR',
		'VIEW',
		'WHENEVER',
		'WHERE',
		'WITH',
		'RANGE',
		'LIMIT',
		'GROUP BY',
		'ORDER BY',
		'WHERE',
		'FROM',
	];
	$value_lower = strtolower($key);
	$keywords_lower = array_map('strtolower', $reserved_keywords);
	if ( in_array($value_lower, $keywords_lower) ) {
		return 'yes';
	} else {
		return 'no';
	}
}
/**
 * Collection of all type fields in acf.
 *
 * @return array
 */
function ssgsw_all_type_field_in_acf() {
	$field_types = array(
		'wysiwyg',
		'image',
		'file',
		'checkbox',
		'post_object',
		'page_link',
		'relationship',
		'taxonomy',
		'user',
		'google_map',
		'date_picker',
		'date_time_picker',
		'time_picker',
		'message',
		'tab',
		'group',
		'repeater',
		'flexible_content',
		'clone',
		'accordion',
		'gallery',
		'block',
		'nav_menu',
		'post_taxonomy',
		'sidebar',
		'widget_area',
		'user_role',
		'true_false',
		'link',
	);
	return $field_types;
}
/**
 * Find out atum table information.
 *
 * @param string $string value of the field.
 *
 * @return array
 */
function ssgsw_check_atum_key_exits( $string ) {
	$substring = '_from_atum_table';
	if ( strpos($string, $substring) !== false ) {
		return true;
	} else {
		return false;
	}
}
function ssgsw_find_atum_key_from_table( $string ) {
	$substring = '_from_atum_table';
	$parts = explode($substring, $string);
	if ( isset($parts[0]) && ! empty($parts[0]) ) {
		return $parts[0];
	}
	return false;
}
/**
 * Check if license is activated and valid.
 *
 * @return bool
 */
function ssgsw_is_license_valid() {
	global $ssgsw_license;

	if ( ! $ssgsw_license ) {
		return false;
	}

	return $ssgsw_license->is_valid();
}

/**
 * Insert product
 *
 * @param array   $postarr post information.
 * @param boolean $wp_error error code.
 * @param boolean $fire_after_hooks error code.
 */
function ssgsw_wp_insert_post( $postarr, $wp_error = false, $fire_after_hooks = true ) {
	global $wpdb;

	// Capture original pre-sanitized array for passing into filters.
	$unsanitized_postarr = $postarr;

	$user_id = get_current_user_id();

	$defaults = array(
		'post_author'           => $user_id,
		'post_content'          => '',
		'post_content_filtered' => '',
		'post_title'            => '',
		'post_excerpt'          => '',
		'post_status'           => 'draft',
		'post_type'             => 'post',
		'comment_status'        => '',
		'ping_status'           => '',
		'post_password'         => '',
		'to_ping'               => '',
		'pinged'                => '',
		'post_parent'           => 0,
		'menu_order'            => 0,
		'guid'                  => '',
		'import_id'             => 0,
		'context'               => '',
		'post_date'             => '',
		'post_date_gmt'         => '',
	);

	$postarr = wp_parse_args( $postarr, $defaults );

	unset( $postarr['filter'] );

	$postarr = sanitize_post( $postarr, 'db' );

	// Are we updating or creating?
	$post_id = 0;
	$update  = false;
	$guid    = $postarr['guid'];

	if ( ! empty( $postarr['ID'] ) ) {
		$update = true;

		// Get the post ID and GUID.
		$post_id     = $postarr['ID'];
		$post_before = get_post( $post_id );

		if ( is_null( $post_before ) ) {
			if ( $wp_error ) {
				return new WP_Error( 'invalid_post', __( 'Invalid post ID.','stock-sync-with-google-sheet-for-woocommerce' ) );
			}
			return 0;
		}

		$guid            = get_post_field( 'guid', $post_id );
		$previous_status = get_post_field( 'post_status', $post_id );
	} else {
		$previous_status = 'new';
		$post_before     = null;
	}

	$post_type = empty( $postarr['post_type'] ) ? 'post' : $postarr['post_type'];

	$post_title   = $postarr['post_title'];
	$post_content = $postarr['post_content'];
	$post_excerpt = $postarr['post_excerpt'];

	if ( isset( $postarr['post_name'] ) ) {
		$post_name = $postarr['post_name'];
	} elseif ( $update ) {
		// For an update, don't modify the post_name if it wasn't supplied as an argument.
		$post_name = $post_before->post_name;
	}

	$maybe_empty = 'attachment' !== $post_type
		&& ! $post_content && ! $post_title && ! $post_excerpt
		&& post_type_supports( $post_type, 'editor' )
		&& post_type_supports( $post_type, 'title' )
		&& post_type_supports( $post_type, 'excerpt' );

	/**
	 * Filters whether the post should be considered "empty".
	 *
	 * The post is considered "empty" if both:
	 * 1. The post type supports the title, editor, and excerpt fields
	 * 2. The title, editor, and excerpt fields are all empty
	 *
	 * Returning a truthy value from the filter will effectively short-circuit
	 * the new post being inserted and return 0. If $wp_error is true, a WP_Error
	 * will be returned instead.
	 *
	 * @since 3.3.0
	 *
	 * @param bool  $maybe_empty Whether the post should be considered "empty".
	 * @param array $postarr     Array of post data.
	 */
	if ( apply_filters( 'wp_insert_post_empty_content', $maybe_empty, $postarr ) ) {
		if ( $wp_error ) {
			return new WP_Error( 'empty_content', __( 'Content, title, and excerpt are empty.','stock-sync-with-google-sheet-for-woocommerce' ) );
		} else {
			return 0;
		}
	}

	$post_status = empty( $postarr['post_status'] ) ? 'draft' : $postarr['post_status'];

	if ( 'attachment' === $post_type && ! in_array( $post_status, array( 'inherit', 'private', 'trash', 'auto-draft' ), true ) ) {
		$post_status = 'inherit';
	}

	if ( ! empty( $postarr['post_category'] ) ) {
		// Filter out empty terms.
		$post_category = array_filter( $postarr['post_category'] );
	} elseif ( $update && ! isset( $postarr['post_category'] ) ) {
		$post_category = $post_before->post_category;
	}

	// Make sure we set a valid category.
	if ( empty( $post_category ) || 0 === count( $post_category ) || ! is_array( $post_category ) ) {
		// 'post' requires at least one category.
		if ( 'post' === $post_type && 'auto-draft' !== $post_status ) {
			$post_category = array( get_option( 'default_category' ) );
		} else {
			$post_category = array();
		}
	}

	/*
	 * Don't allow contributors to set the post slug for pending review posts.
	 *
	 * For new posts check the primitive capability, for updates check the meta capability.
	 */
	if ( 'pending' === $post_status ) {
		$post_type_object = get_post_type_object( $post_type );

		if ( ! $update && $post_type_object && ! current_user_can( $post_type_object->cap->publish_posts ) ) {
			$post_name = '';
		} elseif ( $update && ! current_user_can( 'publish_post', $post_id ) ) {
			$post_name = '';
		}
	}

	/*
	 * Create a valid post name. Drafts and pending posts are allowed to have
	 * an empty post name.
	 */
	if ( empty( $post_name ) ) {
		if ( ! in_array( $post_status, array( 'draft', 'pending', 'auto-draft' ), true ) ) {
			$post_name = sanitize_title( $post_title );
		} else {
			$post_name = '';
		}
	} else {
		// On updates, we need to check to see if it's using the old, fixed sanitization context.
		$check_name = sanitize_title( $post_name, '', 'old-save' );

		if ( $update
			&& strtolower( urlencode( $post_name ) ) === $check_name
			&& get_post_field( 'post_name', $post_id ) === $check_name
		) {
			$post_name = $check_name;
		} else { // New post, or slug has changed.
			$post_name = sanitize_title( $post_name );
		}
	}

	/*
	 * Resolve the post date from any provided post date or post date GMT strings;
	 * if none are provided, the date will be set to now.
	 */
	$post_date = wp_resolve_post_date( $postarr['post_date'], $postarr['post_date_gmt'] );

	if ( ! $post_date ) {
		if ( $wp_error ) {
			return new WP_Error( 'invalid_date', __( 'Invalid date.','stock-sync-with-google-sheet-for-woocommerce' ) );
		} else {
			return 0;
		}
	}

	if ( empty( $postarr['post_date_gmt'] ) || '0000-00-00 00:00:00' === $postarr['post_date_gmt'] ) {
		if ( ! in_array( $post_status, get_post_stati( array( 'date_floating' => true ) ), true ) ) {
			$post_date_gmt = get_gmt_from_date( $post_date );
		} else {
			$post_date_gmt = '0000-00-00 00:00:00';
		}
	} else {
		$post_date_gmt = $postarr['post_date_gmt'];
	}

	if ( $update || '0000-00-00 00:00:00' === $post_date ) {
		$post_modified     = current_time( 'mysql' );
		$post_modified_gmt = current_time( 'mysql', 1 );
	} else {
		$post_modified     = $post_date;
		$post_modified_gmt = $post_date_gmt;
	}

	if ( 'attachment' !== $post_type ) {
		$now = gmdate( 'Y-m-d H:i:s' );

		if ( 'publish' === $post_status ) {
			if ( strtotime( $post_date_gmt ) - strtotime( $now ) >= MINUTE_IN_SECONDS ) {
				$post_status = 'future';
			}
		} elseif ( 'future' === $post_status ) {
			if ( strtotime( $post_date_gmt ) - strtotime( $now ) < MINUTE_IN_SECONDS ) {
				$post_status = 'publish';
			}
		}
	}

	// Comment status.
	if ( empty( $postarr['comment_status'] ) ) {
		if ( $update ) {
			$comment_status = 'closed';
		} else {
			$comment_status = get_default_comment_status( $post_type );
		}
	} else {
		$comment_status = $postarr['comment_status'];
	}

	// These variables are needed by compact() later.
	$post_content_filtered = $postarr['post_content_filtered'];
	$post_author           = isset( $postarr['post_author'] ) ? $postarr['post_author'] : $user_id;
	$ping_status           = empty( $postarr['ping_status'] ) ? get_default_comment_status( $post_type, 'pingback' ) : $postarr['ping_status'];
	$to_ping               = isset( $postarr['to_ping'] ) ? sanitize_trackback_urls( $postarr['to_ping'] ) : '';
	$pinged                = isset( $postarr['pinged'] ) ? $postarr['pinged'] : '';
	$import_id             = isset( $postarr['import_id'] ) ? $postarr['import_id'] : 0;

	/*
	 * The 'wp_insert_post_parent' filter expects all variables to be present.
	 * Previously, these variables would have already been extracted
	 */
	if ( isset( $postarr['menu_order'] ) ) {
		$menu_order = (int) $postarr['menu_order'];
	} else {
		$menu_order = 0;
	}

	$post_password = isset( $postarr['post_password'] ) ? $postarr['post_password'] : '';
	if ( 'private' === $post_status ) {
		$post_password = '';
	}

	if ( isset( $postarr['post_parent'] ) ) {
		$post_parent = (int) $postarr['post_parent'];
	} else {
		$post_parent = 0;
	}

	$new_postarr = array_merge(
		array(
			'ID' => $post_id,
		),
		compact( array_diff( array_keys( $defaults ), array( 'context', 'filter' ) ) )
	);

	/**
	 * Filters the post parent -- used to check for and prevent hierarchy loops.
	 *
	 * @since 3.1.0
	 *
	 * @param int   $post_parent Post parent ID.
	 * @param int   $post_id     Post ID.
	 * @param array $new_postarr Array of parsed post data.
	 * @param array $postarr     Array of sanitized, but otherwise unmodified post data.
	 */
	$post_parent = apply_filters( 'wp_insert_post_parent', $post_parent, $post_id, $new_postarr, $postarr );

	/*
	 * If the post is being untrashed and it has a desired slug stored in post meta,
	 * reassign it.
	 */
	if ( 'trash' === $previous_status && 'trash' !== $post_status ) {
		$desired_post_slug = get_post_meta( $post_id, '_wp_desired_post_slug', true );

		if ( $desired_post_slug ) {
			delete_post_meta( $post_id, '_wp_desired_post_slug' );
			$post_name = $desired_post_slug;
		}
	}

	// If a trashed post has the desired slug, change it and let this post have it.
	if ( 'trash' !== $post_status && $post_name ) {
		/**
		 * Filters whether or not to add a `__trashed` suffix to trashed posts that match the name of the updated post.
		 *
		 * @since 5.4.0
		 *
		 * @param bool   $add_trashed_suffix Whether to attempt to add the suffix.
		 * @param string $post_name          The name of the post being updated.
		 * @param int    $post_id            Post ID.
		 */
		$add_trashed_suffix = apply_filters( 'add_trashed_suffix_to_trashed_posts', true, $post_name, $post_id );

		if ( $add_trashed_suffix ) {
			wp_add_trashed_suffix_to_post_name_for_trashed_posts( $post_name, $post_id );
		}
	}

	// When trashing an existing post, change its slug to allow non-trashed posts to use it.
	if ( 'trash' === $post_status && 'trash' !== $previous_status && 'new' !== $previous_status ) {
		$post_name = wp_add_trashed_suffix_to_post_name_for_post( $post_id );
	}

	$post_name = wp_unique_post_slug( $post_name, $post_id, $post_status, $post_type, $post_parent );

	// Don't unslash.
	$post_mime_type = isset( $postarr['post_mime_type'] ) ? $postarr['post_mime_type'] : '';

	// Expected_slashed (everything!).
	$data = compact(
		'post_author',
		'post_date',
		'post_date_gmt',
		'post_content',
		'post_content_filtered',
		'post_title',
		'post_excerpt',
		'post_status',
		'post_type',
		'comment_status',
		'ping_status',
		'post_password',
		'post_name',
		'to_ping',
		'pinged',
		'post_modified',
		'post_modified_gmt',
		'post_parent',
		'menu_order',
		'post_mime_type',
		'guid'
	);

	$emoji_fields = array( 'post_title', 'post_content', 'post_excerpt' );

	foreach ( $emoji_fields as $emoji_field ) {
		if ( isset( $data[ $emoji_field ] ) ) {
			$charset = $wpdb->get_col_charset( $wpdb->posts, $emoji_field );

			if ( 'utf8' === $charset ) {
				$data[ $emoji_field ] = wp_encode_emoji( $data[ $emoji_field ] );
			}
		}
	}

	if ( 'attachment' === $post_type ) {
		/**
		 * Filters attachment post data before it is updated in or added to the database.
		 *
		 * @since 3.9.0
		 * @since 5.4.1 The `$unsanitized_postarr` parameter was added.
		 * @since 6.0.0 The `$update` parameter was added.
		 *
		 * @param array $data                An array of slashed, sanitized, and processed attachment post data.
		 * @param array $postarr             An array of slashed and sanitized attachment post data, but not processed.
		 * @param array $unsanitized_postarr An array of slashed yet *unsanitized* and unprocessed attachment post data
		 *                                   as originally passed to wp_insert_post().
		 * @param bool  $update              Whether this is an existing attachment post being updated.
		 */
		$data = apply_filters( 'wp_insert_attachment_data', $data, $postarr, $unsanitized_postarr, $update );
	} else {
		/**
		 * Filters slashed post data just before it is inserted into the database.
		 *
		 * @since 2.7.0
		 * @since 5.4.1 The `$unsanitized_postarr` parameter was added.
		 * @since 6.0.0 The `$update` parameter was added.
		 *
		 * @param array $data                An array of slashed, sanitized, and processed post data.
		 * @param array $postarr             An array of sanitized (and slashed) but otherwise unmodified post data.
		 * @param array $unsanitized_postarr An array of slashed yet *unsanitized* and unprocessed post data as
		 *                                   originally passed to wp_insert_post().
		 * @param bool  $update              Whether this is an existing post being updated.
		 */
		$data = apply_filters( 'wp_insert_post_data', $data, $postarr, $unsanitized_postarr, $update );
	}

	$data  = wp_unslash( $data );
	$where = array( 'ID' => $post_id );

	if ( $update ) {
		/**
		 * Fires immediately before an existing post is updated in the database.
		 *
		 * @since 2.5.0
		 *
		 * @param int   $post_id Post ID.
		 * @param array $data    Array of unslashed post data.
		 */
		do_action( 'pre_post_update', $post_id, $data );

		if ( false === $wpdb->update( $wpdb->posts, $data, $where ) ) {
			if ( $wp_error ) {
				if ( 'attachment' === $post_type ) {
					$message = __( 'Could not update attachment in the database.','stock-sync-with-google-sheet-for-woocommerce' );
				} else {
					$message = __( 'Could not update post in the database.','stock-sync-with-google-sheet-for-woocommerce' );
				}

				return new WP_Error( 'db_update_error', $message, $wpdb->last_error );
			} else {
				return 0;
			}
		}
	} else {
		// If there is a suggested ID, use it if not already present.
		if ( ! empty( $import_id ) ) {
			$import_id = (int) $import_id;

			if ( ! $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE ID = %d", $import_id ) ) ) {
				$data['ID'] = $import_id;
			}
		}

		if ( false === $wpdb->insert( $wpdb->posts, $data ) ) {
			if ( $wp_error ) {
				if ( 'attachment' === $post_type ) {
					$message = __( 'Could not insert attachment into the database.','stock-sync-with-google-sheet-for-woocommerce' );
				} else {
					$message = __( 'Could not insert post into the database.','stock-sync-with-google-sheet-for-woocommerce' );
				}

				return new WP_Error( 'db_insert_error', $message, $wpdb->last_error );
			} else {
				return 0;
			}
		}

		$post_id = (int) $wpdb->insert_id;

		// Use the newly generated $post_id.
		$where = array( 'ID' => $post_id );
	}

	if ( empty( $data['post_name'] ) && ! in_array( $data['post_status'], array( 'draft', 'pending', 'auto-draft' ), true ) ) {
		$data['post_name'] = wp_unique_post_slug( sanitize_title( $data['post_title'], $post_id ), $post_id, $data['post_status'], $post_type, $post_parent );

		$wpdb->update( $wpdb->posts, array( 'post_name' => $data['post_name'] ), $where );
		clean_post_cache( $post_id );
	}

	if ( is_object_in_taxonomy( $post_type, 'category' ) ) {
		wp_set_post_categories( $post_id, $post_category );
	}

	if ( isset( $postarr['tags_input'] ) && is_object_in_taxonomy( $post_type, 'post_tag' ) ) {
		wp_set_post_tags( $post_id, $postarr['tags_input'] );
	}

	// Add default term for all associated custom taxonomies.
	if ( 'auto-draft' !== $post_status ) {
		foreach ( get_object_taxonomies( $post_type, 'object' ) as $taxonomy => $tax_object ) {

			if ( ! empty( $tax_object->default_term ) ) {

				// Filter out empty terms.
				if ( isset( $postarr['tax_input'][ $taxonomy ] ) && is_array( $postarr['tax_input'][ $taxonomy ] ) ) {
					$postarr['tax_input'][ $taxonomy ] = array_filter( $postarr['tax_input'][ $taxonomy ] );
				}

				// Passed custom taxonomy list overwrites the existing list if not empty.
				$terms = wp_get_object_terms( $post_id, $taxonomy, array( 'fields' => 'ids' ) );
				if ( ! empty( $terms ) && empty( $postarr['tax_input'][ $taxonomy ] ) ) {
					$postarr['tax_input'][ $taxonomy ] = $terms;
				}

				if ( empty( $postarr['tax_input'][ $taxonomy ] ) ) {
					$default_term_id = get_option( 'default_term_' . $taxonomy );
					if ( ! empty( $default_term_id ) ) {
						$postarr['tax_input'][ $taxonomy ] = array( (int) $default_term_id );
					}
				}
			}
		}
	}

	// New-style support for all custom taxonomies.
	if ( ! empty( $postarr['tax_input'] ) ) {
		foreach ( $postarr['tax_input'] as $taxonomy => $tags ) {
			$taxonomy_obj = get_taxonomy( $taxonomy );

			if ( ! $taxonomy_obj ) {
				/* translators: %s: Taxonomy name. */
				_doing_it_wrong( __FUNCTION__, sprintf( esc_html__( 'Invalid taxonomy: %s.', 'stock-sync-with-google-sheet-for-woocommerce' ), esc_html( $taxonomy ) ), '4.4.0' );
				continue;
			}
			// array = hierarchical, string = non-hierarchical.
			if ( is_array( $tags ) ) {
				$tags = array_filter( $tags );
			}

			if ( current_user_can( $taxonomy_obj->cap->assign_terms ) ) {
				wp_set_post_terms( $post_id, $tags, $taxonomy );
			}
		}
	}

	if ( ! empty( $postarr['meta_input'] ) ) {
		foreach ( $postarr['meta_input'] as $field => $value ) {
			update_post_meta( $post_id, $field, $value );
		}
	}

	$current_guid = get_post_field( 'guid', $post_id );

	// Set GUID.
	if ( ! $update && '' === $current_guid ) {
		$wpdb->update( $wpdb->posts, array( 'guid' => get_permalink( $post_id ) ), $where );
	}

	if ( 'attachment' === $postarr['post_type'] ) {
		if ( ! empty( $postarr['file'] ) ) {
			update_attached_file( $post_id, $postarr['file'] );
		}

		if ( ! empty( $postarr['context'] ) ) {
			add_post_meta( $post_id, '_wp_attachment_context', $postarr['context'], true );
		}
	}

	// Set or remove featured image.
	if ( isset( $postarr['_thumbnail_id'] ) ) {
		$thumbnail_support = current_theme_supports( 'post-thumbnails', $post_type ) && post_type_supports( $post_type, 'thumbnail' ) || 'revision' === $post_type; //phpcs:ignore

		if ( ! $thumbnail_support && 'attachment' === $post_type && $post_mime_type ) {
			if ( wp_attachment_is( 'audio', $post_id ) ) {
				$thumbnail_support = post_type_supports( 'attachment:audio', 'thumbnail' ) || current_theme_supports( 'post-thumbnails', 'attachment:audio' );
			} elseif ( wp_attachment_is( 'video', $post_id ) ) {
				$thumbnail_support = post_type_supports( 'attachment:video', 'thumbnail' ) || current_theme_supports( 'post-thumbnails', 'attachment:video' );
			}
		}

		if ( $thumbnail_support ) {
			$thumbnail_id = (int) $postarr['_thumbnail_id'];
			if ( -1 === $thumbnail_id ) {
				delete_post_thumbnail( $post_id );
			} else {
				set_post_thumbnail( $post_id, $thumbnail_id );
			}
		}
	}

	clean_post_cache( $post_id );

	$post = get_post( $post_id );

	if ( ! empty( $postarr['page_template'] ) ) {
		$post->page_template = $postarr['page_template'];
		$page_templates      = wp_get_theme()->get_page_templates( $post );

		if ( 'default' !== $postarr['page_template'] && ! isset( $page_templates[ $postarr['page_template'] ] ) ) {
			if ( $wp_error ) {
				return new WP_Error( 'invalid_page_template', __( 'Invalid page template.','stock-sync-with-google-sheet-for-woocommerce' ) );
			}

			update_post_meta( $post_id, '_wp_page_template', 'default' );
		} else {
			update_post_meta( $post_id, '_wp_page_template', $postarr['page_template'] );
		}
	}

	if ( 'attachment' !== $postarr['post_type'] ) {
		wp_transition_post_status( $data['post_status'], $previous_status, $post );
	} else {
		if ( $update ) {
			/**
			 * Fires once an existing attachment has been updated.
			 *
			 * @since 2.0.0
			 *
			 * @param int $post_id Attachment ID.
			 */

			$post_after = get_post( $post_id );

			/**
			 * Fires once an existing attachment has been updated.
			 *
			 * @since 4.4.0
			 *
			 * @param int     $post_id      Post ID.
			 * @param WP_Post $post_after   Post object following the update.
			 * @param WP_Post $post_before  Post object before the update.
			 */

		} else {

			/**
			 * Fires once an attachment has been added.
			 *
			 * @since 2.0.0
			 *
			 * @param int $post_id Attachment ID.
			 */
			do_action('ssgsw_attachment_add', $post_id);

		}

		return $post_id;
	}

	if ( $update ) {
		/**
		 * Fires once an existing post has been updated.
		 *
		 * The dynamic portion of the hook name, `$post->post_type`, refers to
		 * the post type slug.
		 *
		 * Possible hook names include:
		 *
		 *  - `edit_post_post`
		 *  - `edit_post_page`
		 *
		 * @since 5.1.0
		 *
		 * @param int     $post_id Post ID.
		 * @param WP_Post $post    Post object.
		 */

		/**
		 * Fires once an existing post has been updated.
		 *
		 * @since 1.2.0
		 *
		 * @param int     $post_id Post ID.
		 * @param WP_Post $post    Post object.
		 */

		$post_after = get_post( $post_id );

		/**
		 * Fires once an existing post has been updated.
		 *
		 * @since 3.0.0
		 *
		 * @param int     $post_id      Post ID.
		 * @param WP_Post $post_after   Post object following the update.
		 * @param WP_Post $post_before  Post object before the update.
		 */
	}

	/**
	 * Fires once a post has been saved.
	 *
	 * The dynamic portion of the hook name, `$post->post_type`, refers to
	 * the post type slug.
	 *
	 * Possible hook names include:
	 *
	 *  - `save_post_post`
	 *  - `save_post_page`
	 *
	 * @since 3.7.0
	 *
	 * @param int     $post_id Post ID.
	 * @param WP_Post $post    Post object.
	 * @param bool    $update  Whether this is an existing post being updated.
	 */
	do_action( 'save_post', $post_id, $post, $update );
	/**
	 * Fires once a post has been saved.
	 *
	 * @since 1.5.0
	 *
	 * @param int     $post_id Post ID.
	 * @param WP_Post $post    Post object.
	 * @param bool    $update  Whether this is an existing post being updated.
	 */

	/**
	 * Fires once a post has been saved.
	 *
	 * @since 2.0.0
	 *
	 * @param int     $post_id Post ID.
	 * @param WP_Post $post    Post object.
	 * @param bool    $update  Whether this is an existing post being updated.
	 */

	if ( $fire_after_hooks ) {
		wp_after_insert_post( $post, $update, $post_before );
	}

	return $post_id;
}

/**
 * Inserts an attachment.
 *
 * If you set the 'ID' in the $args parameter, it will mean that you are
 * updating and attempt to update the attachment. You can also set the
 * attachment name or title by setting the key 'post_name' or 'post_title'.
 *
 * You can set the dates for the attachment manually by setting the 'post_date'
 * and 'post_date_gmt' keys' values.
 *
 * By default, the comments will use the default settings for whether the
 * comments are allowed. You can close them manually or keep them open by
 * setting the value for the 'comment_status' key.
 *
 * @since 2.0.0
 * @since 4.7.0 Added the `$wp_error` parameter to allow a WP_Error to be returned on failure.
 * @since 5.6.0 Added the `$fire_after_hooks` parameter.
 *
 * @see wp_insert_post()
 *
 * @param string|array $args             Arguments for inserting an attachment.
 * @param string|false $file             Optional. Filename. Default false.
 * @param int          $parent_post_id   Optional. Parent post ID or 0 for no parent. Default 0.
 * @param bool         $wp_error         Optional. Whether to return a WP_Error on failure. Default false.
 * @param bool         $fire_after_hooks Optional. Whether to fire the after insert hooks. Default true.
 * @return int|WP_Error The attachment ID on success. The value 0 or WP_Error on failure.
 */
function ssgsw_wp_insert_attachment( $args, $file = false, $parent_post_id = 0, $wp_error = false, $fire_after_hooks = true ) {
	$defaults = array(
		'file'        => $file,
		'post_parent' => 0,
	);

	$data = wp_parse_args( $args, $defaults );

	if ( ! empty( $parent_post_id ) ) {
		$data['post_parent'] = $parent_post_id;
	}

	$data['post_type'] = 'attachment';

	return ssgsw_wp_insert_post( $data, $wp_error, $fire_after_hooks );
}


/**
 * Save a large dataset (up to 4GB) into a single transient.
 *
 * @param array  $data The dataset to store (e.g., 40K product info).
 * @param string $key The transient key.
 * @param int    $expiration Expiration time in seconds (default: 12 hours).
 * @return bool True if saved successfully, false otherwise.
 */
function ssgsw_save_sheet_data_to_transient( $data, $key = 'ssgsw_temp_sheet_info', $expiration = 43200 ) {
	if ( ! is_array($data) || empty($data) ) {
		return false;
	}
	$serialized_data = serialize($data);
	return set_transient($key, $serialized_data, $expiration);
}
/**
 * Retrieve large-scale data from a single transient.
 *
 * @param string $key The transient key.
 * @return array|false The dataset as an array, or false if the transient is missing/expired.
 */
function ssgsw_get_sheet_data_from_transient( $key = 'ssgsw_temp_sheet_info' ) {
	$serialized_data = get_transient($key);

	if ( $serialized_data === false ) {
		return [];
	}

	// Unserialize the data to restore the original array.
	return unserialize($serialized_data);
}

/**
 * Insert SSGSW product information
 *
 * @param int    $product_id ID of product.
 * @param object $value Key of the product.
 *
 * @return mixed
 */
function ssgsw_insert_update_product_information( $product_id, $value = [], $tag = 'WordPress' ) {

	global $wpdb;
	$table_name = $wpdb->prefix . 'ssgsw_products';

	if ( is_object($value) ) {
		$value = (array) $value;
	}
	if ( is_array($value) ) {
		$value = serialize($value);
	}

	$check_data = ssgsw_get_product_information_by_id($product_id);

	if ( is_array($check_data) && ! empty($check_data) ) {
		$id = $check_data[0]['id'];
		$current_product_information = $check_data[0]['product_current_info'];

		$current_unserialized = unserialize($current_product_information);
		$new_unserialized = unserialize($value);
		// $merged_data = array_merge($current_unserialized, $new_unserialized);

		if ( $current_unserialized !== $new_unserialized ) {

			$update_data = [
				'product_id' => $product_id,
				'product_current_info' => $value,
				'product_info_previous' => $current_product_information,
				'product_info_previous_2' => $check_data[0]['product_info_previous'],
				'current_tag' => $tag,
				'previous_tag' => $check_data[0]['current_tag'],
				'previous_tag_2' => $check_data[0]['previous_tag'],
				'date' => gmdate('Y-m-d H:i:s'),
			];
			if ( 'Sheet' === $tag ) {
				$update_data['product_information'] = $value;
			}
			$where_condition = [ 'id' => $id ];
			$updated = $wpdb->update($table_name, $update_data, $where_condition);

			return $updated;
		} else {
			return 0;
		}
	} else {

		$insert_data = [
			'product_id' => $product_id,
			'product_current_info' => $value,
			'product_info_previous' => '',
			'product_info_previous_2' => '',
			'current_tag' => $tag,
			'previous_tag' => '',
			'previous_tag_2' => '',
		];
		if ( 'Sheet' === $tag ) {
			$update_data['product_information'] = $value;
		}

		$inserted = $wpdb->insert($table_name, $insert_data);
		return $inserted;
	}
}


/**
 * Get Ult version number
 */
function ssgsw_get_ult_version() {
	$ult_version = 'stock-sync-with-google-sheet-for-woocommerce-ultimate/stock-sync-with-google-sheet-for-woocommerce-ultimate.php';
	if ( file_exists( WP_PLUGIN_DIR . '/' . $ult_version ) ) {
		$plugin_data = get_plugin_data( WP_PLUGIN_DIR . '/' . $ult_version );
		if ( is_plugin_active( $ult_version ) ) {
			if ( $plugin_data ) {
				$plugin_version = $plugin_data['Version'];
				if ( $plugin_version < '2.0.6' ) {
					return false;
				} else {
					return true;
				}
			}
		}
	}
	return true;
}
/**
 * Get SSGSW product information
 *
 * @param int $product_id ID of product.
 *
 * @return mixed
 */
function ssgsw_get_product_information_by_id( $product_id ) {
	global $wpdb;
	$product_id = sanitize_text_field( $product_id );
	$results = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->prefix}ssgsw_products WHERE product_id = %d",
			$product_id
		),
		ARRAY_A
	);
	return $results;
}
/**
 * Get parent id by child id
 *
 * @return integer
 */
function ssgsw_get_parent_id_by_child( $child_id ) {
	global $wpdb;
	$parent_id = $wpdb->get_var($wpdb->prepare(
		"SELECT post_parent FROM {$wpdb->prefix}posts 
         WHERE ID = %d AND (post_type = 'product' OR post_type = 'product_variation')",
		$child_id
	));
	return $parent_id;
}

/**
 * Retrieves the child product IDs for a given parent product ID, ordered by ascending ID.
 *
 * This function fetches the IDs of all child products (including variations)
 * that belong to a specified parent product, sorted in ascending order.
 *
 * @param int $product_id The parent product ID.
 *
 * @return array The IDs of the child products, or an empty array if none are found.
 */
function ssgsw_get_children_ids( $product_id ) {
	global $wpdb;
	$statuses = ssgsw_status_formating_funcions();
	$status_placeholders = implode(',', array_fill(0, count($statuses), '%s'));
	$child_product_ids = $wpdb->get_col($wpdb->prepare(
		"SELECT ID
        FROM {$wpdb->posts}
        WHERE post_parent = %d
        AND (post_type = 'product' OR post_type = 'product_variation')
        AND post_status IN ($status_placeholders)
        ORDER BY ID ASC",
		array_merge([ $product_id ], $statuses)
	));
	return $child_product_ids;
}



/**
 * Function to get the nearest smaller ID from an array compared to a target ID.
 * The array is processed in descending order to find the closest smaller ID.
 *
 * @param array $array The array of product IDs.
 * @param int   $target_id The target ID to compare against.
 * @return int|null The nearest smaller ID, or null if none found.
 */
function ssgsw_get_nearest_smaller_id( $array, $target_id ) {
	// Sort the array in descending order.
	$nearest_id = null;
	if ( is_array($array) && ! empty($array) ) {
		rsort($array);
		foreach ( $array as $id ) {
			if ( $id < $target_id ) {
				$nearest_id = $id;
				break;
			}
		}
	}
	return $nearest_id;
}

/**
 * Find the range of a row in Google Sheets with cross-checking.
 *
 * This function attempts to find the row index of a specific child ID in a Google Sheets array.
 * It first checks for a previously saved temporary index number, cross-checks the corresponding row,
 * and if not matched, searches within a 50-row range.
 *
 * @param mixed $child_id The child product ID to search for.
 * @param array $sheets_info The Google Sheets data array to search in.
 *
 * @return mixed The found row index (1-based) or false if not found.
 */
function ssgsw_find_out_range_with_cross_check( $child_id, $sheets_info = [] ) {
	return false;
}

/**
 * Format and retrieve the index number for a given product ID from a multi-dimensional array.
 *
 * This function processes a multi-dimensional array to extract the first value of each sub-array
 * and creates a single-dimensional array. It then checks if the given product ID exists as a key
 * in the formatted array and returns the corresponding value.
 *
 * @param int   $product_id The product ID (index position) to search for in the flattened array.
 * @param array $sheets_info A multi-dimensional array containing product information.
 *                           Each sub-array is expected to have the relevant data in the first index (0).
 * @return mixed|null Returns the formatted index number (first value of the sub-array) if found;
 *                    otherwise, returns null. If the input array is empty, returns null.
 *
 * Example Usage:
 * $sheets_info = [
 *     [1001, 'Product A'],
 *     [1002, 'Product B'],
 *     [1003, 'Product C'],
 * ];
 * $product_id = 1; // Index position to retrieve.
 * $result = ssgsw_format_index_number($product_id, $sheets_info);
 * // Output: 1002 (value from index 1 in the flattened array).
 */
function ssgsw_format_index_number( $sheets_info = [] ) {
	if ( is_array($sheets_info) && ! empty($sheets_info) ) {
		$flattened_array = array_merge(...array_map(function ( $subArray ) {
			return [ $subArray[0] ];
		}, $sheets_info));
		return array_flip($flattened_array);
	}
	return [];
}
/**
 * Finds and returns the sheet index number for a given product ID.
 * If the product ID exists in the provided sheet information, it increments the value by 1.
 * If the product ID is not found, returns null.
 *
 * @param int   $product_id The ID of the product to find the sheet index number for.
 * @param array $sheets_info The array containing sheet information where keys are product IDs and values are index numbers.
 *
 * @return int|null The incremented index number if the product ID exists in the sheet information, or null if not.
 */
function ssgsw_findout_sheet_index_number( $product_id, $sheets_info ) {
	return isset($sheets_info[ $product_id ]) ? $sheets_info[ $product_id ] + 1 : null;
}

/**
 * Get the temporary index number for a product.
 *
 * This function retrieves a temporary index number for a given product ID from stored options.
 * If the product ID does not have an index number, it attempts to find the closest related product
 * (either child or parent) and returns the index number based on various conditions, including if
 * the product is variable or simple.
 *
 * @param mixed  $product_id The ID of the product to find the index for.
 * @param bool   $parent Whether the product is a parent product.
 * @param string $orginal_type The type of the product (e.g., 'Variable', 'Simple'). Default is 'Variable'.
 *
 * @return array An array containing:
 *               - 'index_number': The index number of the product or nearest related product.
 *               - 'increment': Whether the index number should be incremented (true/false).
 *               - 'product_id': The ID of the product that provided the index number.
 *               - (optional) 'sibling_plus': A flag indicating if sibling increment logic was used.
 */
function ssgsw_get_temp_index_number_in_options( $product_id, $parent = false, $orginal_type = 'Variable', $sheets_info = [] ) {
	$get_option = $sheets_info;
	$index_number_exits = ssgsw_get_index_number_option($product_id, $get_option);
	if ( $index_number_exits ) {
		return [
			'index_number' => $index_number_exits,
			'increment' => false,
			'product_id' => $product_id,
		];
	} else {
		if ( $parent ) {
			if ( 'Variable' === $orginal_type ) {
				$child_product_ids = ssgsw_get_children_ids($product_id);
				if ( is_array( $child_product_ids ) && ! empty( $child_product_ids ) ) {
					$smallest_id = min($child_product_ids);
					$existing_number = ssgsw_get_index_number_option($smallest_id, $get_option);
					if ( $existing_number ) {
						return [
							'index_number' => $existing_number,
							'increment' => 1,
							'product_id' => $smallest_id,
						];
					} else {
						return [
							'index_number' => false,
							'increment' => false,
						];
					}
				} else {
					$nearest_product_id = ssgsw_get_nearest_parent_product_id_wp($product_id);
					$index_number_exits = ssgsw_get_index_number_option($nearest_product_id, $get_option);
					if ( $index_number_exits ) {
						return [
							'index_number' => $index_number_exits,
							'increment' => 1,
							'product_id' => $nearest_product_id,
						];
					} else {
						return [
							'index_number' => false,
							'increment' => false,
						];
					}
				}
			} else {
				$nearest_product_id = ssgsw_get_nearest_parent_product_id_wp($product_id);
				$index_number_exits = ssgsw_get_index_number_option($nearest_product_id, $get_option);
				if ( $index_number_exits ) {
					return [
						'index_number' => $index_number_exits,
						'increment' => 1,
						'product_id' => $nearest_product_id,
					];
				} else {
					return [
						'index_number' => false,
						'increment' => false,
					];
				}
			}
		} else {
			$get_parent_id = ssgsw_get_parent_id_by_child($product_id);
			if ( $get_parent_id ) {
				$child_product_ids = ssgsw_get_children_ids($get_parent_id);
				if ( is_array( $child_product_ids ) && ! empty( $child_product_ids ) ) {
					$subling_id = ssgsw_get_nearest_smaller_id($child_product_ids, $product_id);
					if ( $subling_id ) {
						$existing_number = ssgsw_get_index_number_option($subling_id, $get_option);
						if ( $existing_number ) {
							return [
								'index_number' => $existing_number,
								'increment' => 1,
								'product_id' => $subling_id,
								'sibling_plus' => 1,
							];
						} else {
							$existing_number = ssgsw_get_index_number_option($get_parent_id, $get_option);
							if ( $existing_number ) {
								return [
									'index_number' => $existing_number,
									'increment' => 1,
									'product_id' => $get_parent_id,
									'sibling_plus' => 1,
								];
							} else {
								return [
									'index_number' => false,
									'increment' => false,
								];
							}
						}
					} else {
						$existing_number = ssgsw_get_index_number_option($get_parent_id, $get_option);
						if ( $existing_number ) {
							return [
								'index_number' => $existing_number,
								'increment' => 1,
								'product_id' => $get_parent_id,
								'sibling_plus' => 1,
							];
						} else {
							return [
								'index_number' => false,
								'increment' => false,
							];
						}
					}
				} else {
					$existing_number = ssgsw_get_index_number_option($get_parent_id, $get_option );
					if ( $existing_number ) {
						return [
							'index_number' => $existing_number,
							'increment' => 1,
							'product_id' => $get_parent_id,
							'sibling_plus' => 1,
						];
					} else {
						return [
							'index_number' => false,
							'increment' => false,
						];
					}
				}
			} else {
				return [
					'index_number' => false,
					'increment' => false,
				];

			}
		}
	}
}
/**
 * Check the post status of a specific post or product in WordPress.
 *
 * This function retrieves the `post_status` from the `wp_posts` table
 * for the given post ID. It is designed to work for posts, pages, or custom post types
 * (e.g., WooCommerce products).
 *
 * @param int $product_id The ID of the post or product to check.
 * @return string|null The post status (e.g., 'publish', 'draft', 'pending'),
 *                     or null if the post is not found.
 */
function ssgsw_check_post_status( $product_id ) {
	global $wpdb;
	// Query to retrieve the post_status for the specified ID.
	$query = $wpdb->get_var($wpdb->prepare(
		"SELECT post_status FROM {$wpdb->prefix}posts WHERE ID = %d",
		$product_id
	));

	// Return the post status or null if the post is not found.
	return $query;
}

 /**
  * Get the index number for a product from index data.
  *
  * This function retrieves the index number for a given product ID from the provided index data array.
  *
  * @param mixed $product_id The product ID to search for.
  * @param array $index_data The array containing index data for products.
  *
  * @return mixed The index number for the product or false if not found.
  */
function ssgsw_get_index_number_option( $product_id, $index_data ) {
	return isset($index_data[ $product_id ]) ? $index_data[ $product_id ] + 1 : false;
}
/**
 * Extract the number of rows
 *
 * @return integer
 */
function ssgsw_extract_row_number( $updated_range ) {
	if ( preg_match('/!(?:[A-Z]+)(\d+):/', $updated_range, $matches) ) {
		return (int) $matches[1];
	}
	return false;
}

/**
 * Get categories for a product by ID and return them as a formatted string.
 *
 * @param int $product_id The ID of the product.
 * @return string The categories in the format "term_id:term_name, ...".
 */
function ssgsw_get_product_categories( $child_id ) {
	global $wpdb;
	$parent_id = ssgsw_get_parent_product_id($child_id);
	$categories = null;
	if ( $parent_id ) {
		$categories = $wpdb->get_var($wpdb->prepare(
			"SELECT GROUP_CONCAT(CONCAT_WS(':', t.term_id, t.name) SEPARATOR ', ') AS categories
			 FROM {$wpdb->terms} AS t
			 INNER JOIN {$wpdb->term_taxonomy} AS tt
				ON t.term_id = tt.term_id
			 INNER JOIN {$wpdb->term_relationships} AS tr
				ON tt.term_taxonomy_id = tr.term_taxonomy_id
			 WHERE tt.taxonomy = 'product_cat'
			   AND tr.object_id = %d;",
			$parent_id
		));
	}

	return $categories ? $categories : null;
}

/**
 * Retrieve a list of distinct attribute meta keys for products from the database.
 *
 * This function queries the WordPress postmeta table to fetch distinct `meta_key` values 
 * that match the pattern `attribute_%`, which is commonly used for product attributes 
 * such as `attribute_color`, `attribute_size`, etc. The query is safely executed using 
 * the `$wpdb->prepare()` method to prevent SQL injection.
 *
 * @global wpdb $wpdb WordPress database object used to interact with the database.
 *
 * @return array An array of objects, each containing a `meta_key` property representing 
 *               a distinct attribute meta key. Returns an empty array if no matching 
 *               attributes are found.
 */
/**
 * Retrieve a list of distinct attribute meta keys for products from the database.
 *
 * This function queries the WordPress postmeta table to fetch distinct `meta_key` values 
 * that match the pattern `attribute_%`, which is commonly used for product attributes 
 * such as `attribute_color`, `attribute_size`, etc. The query is safely executed using 
 * the `$wpdb->prepare()` method to prevent SQL injection.
 *
 * @global wpdb $wpdb WordPress database object used to interact with the database.
 *
 * @return array An array of objects, each containing a `meta_key` property representing 
 *               a distinct attribute meta key. Returns an empty array if no matching 
 *               attributes are found.
 */
function ssgsw_get_product_attribute_keys() {
    global $wpdb;
	$show_attributes        = true === wp_validate_boolean( ssgsw_get_option('show_attributes', false) );
	$results = [];
	if ($show_attributes) {
		$results = $wpdb->get_results($wpdb->prepare(
			"SELECT DISTINCT meta_key 
			FROM {$wpdb->prefix}postmeta 
			WHERE meta_key LIKE %s",
			'attribute_%'
		));
	}
    // Ensure results are returned as an array
    return is_array($results) && !empty($results) ? $results : [];
}


/**
 * Get all product statuses in WooCommerce.
 *
 * This function retrieves all statuses associated with products in WooCommerce,
 * including custom statuses, such as trash, draft, and publish.
 *
 * @global wpdb $wpdb WordPress database object.
 * @return array List of all unique product statuses.
 */
function ssgsw_get_all_product_statuses($ucfirst_skip = true) {
	global $wpdb;

	// Fetch distinct post statuses from the posts table.
	$results = $wpdb->get_col(
		$wpdb->prepare(
			"SELECT DISTINCT post_status 
             FROM {$wpdb->posts} 
             WHERE post_type = %s
               AND post_status != %s;",
			'product',
			'importing'
		)
	);

	// Define default statuses.
	$default_value = [
		'draft',
		'publish',
		'trash',
		'pending',
	];

	// Ensure $results is an array and merge with default values
	$results = is_array($results) ? $results : [];
	$results = array_unique(array_merge($default_value, $results));

	// Remove empty values from the results array.
	$results = array_filter($results, function ( $value ) {
		return ! empty($value);
	});
	if ($ucfirst_skip) {
		$results = array_map(function ($value) {
			if ($value === 'publish') {
				return 'Published';
			} elseif ($value === 'pending') {
				return 'Pending Review';
			}
			return ucfirst($value);
		}, $results);
	}
	// Apply any custom filters.
	$status = apply_filters('ssgsw_product_status_filter', $results);

	return $status;
}

/**
 * Format and Retrieve Product Statuses for the Plugin.
 *
 * This function retrieves all product statuses and formats them based on licensing validation and saved options.
 * It ensures that the returned data adheres to the plugin's configuration.
 *
 * @return array List of product statuses if the license is valid and options are saved,
 *               otherwise returns default statuses.
 */
function ssgsw_status_formating_funcions() {
	$status = ssgsw_get_all_product_statuses(false);
	$checked_value = ssgsw_get_option('show_product_status_data') ?? [];
	$format_value = function ($value) {
		if ($value === 'Pending Review') {
			return 'pending';
		} elseif ($value === 'Published') {
			return 'publish';
		}
		return strtolower($value);
	};
	$data_to_process = (is_array($checked_value) && empty($checked_value)) ? $status : $checked_value;
	return array_map($format_value, $data_to_process);
}

/**
 * Batch update the post status for multiple posts or products in WordPress.
 *
 * This function updates the `post_status` field in the `wp_posts` table
 * for a list of specified post IDs, using a single SQL query for efficiency.
 *
 * @param string $new_status The new post status to set (e.g., 'publish', 'draft').
 * @param array  $child_ids An array of post IDs to update.
 * @return bool True if the query executes successfully, false otherwise.
 */
function ssgsw_batch_update_post_status( $new_status, $child_ids ) {
	global $wpdb;
	if ( empty($child_ids) ) {
		return false;
	}
	$placeholders = implode(',', array_fill(0, count($child_ids), '%d'));
	$query = $wpdb->query($wpdb->prepare(
		"UPDATE {$wpdb->posts} SET post_status = %s WHERE ID IN ($placeholders)",
		array_merge(array( $new_status ), $child_ids)
	));
	return $query !== false;
}

/**
 * Get the parent product ID of a given variation ID in WooCommerce.
 *
 * This function retrieves the parent product ID associated with a child product variation.
 *
 * @param int $variation_id The ID of the variation product.
 * @return int|null The parent product ID if found, or null if not found.
 */
function ssgsw_get_parent_product_id( $variation_id ) {
	global $wpdb;
	$parent_id = $wpdb->get_var($wpdb->prepare(
		"SELECT post_parent
         FROM {$wpdb->posts}
         WHERE ID = %d
           AND post_type = 'product_variation';",
		$variation_id
	));
	return $parent_id ? intval( $parent_id ) : null;
}

/**
 * Retrieves the nearest parent product ID greater than the given product ID.
 *
 * This function searches for the closest parent product in the database
 * with a product ID that is greater than the specified product ID.
 *
 * @param string $product_id The unique identifier for the product.
 *
 * @return string|null The product ID of the nearest parent product, or null if not found.
 */
function ssgsw_get_nearest_parent_product_id_wp( $product_id ) {
	global $wpdb;
	$nearest_product_id = $wpdb->get_var($wpdb->prepare(
		"SELECT ID FROM {$wpdb->prefix}posts 
         WHERE ID > %d
         AND post_type = %s
         ORDER BY ID ASC
         LIMIT 1",
		$product_id,  // First argument should be product ID
		'product'     // Second argument should be post_type
	));

	// Check if a product ID was found, otherwise return null.
	return $nearest_product_id ? $nearest_product_id : null;
}

/**
 * Check if a sync process is currently in progress.
 *
 * This function checks the transient 'ssgsw_sync_in_progress' to determine
 * if a sync process is active. The transient serves as a flag that prevents
 * certain actions (like product creation) while a sync is happening.
 *
 * @return bool True if sync is in progress, false otherwise.
 */
function ssgsw_is_sync_in_progress() {
	return get_transient('ssgsw_sync_in_progress_state') ? true : false;
}
/**
 * Prevent product creation or update if a sync is in progress.
 *
 * This function checks if the 'ssgsw_sync_in_progress' transient is set,
 * and if so, prevents the product from being created or updated by returning an error.
 *
 * @param int $post_id The post ID of the product.
 */
function ssgsw_prevent_product_creation_during_sync( $post_id ) {
	// Check if a sync is in progress.
	if ( ssgsw_is_sync_in_progress() ) {
		// Prevent product saving by aborting the process.
		wp_die(esc_html__('Product creation is disabled during sync to sheet.', 'stock-sync-with-google-sheet-for-woocommerce'));
		exit;
	}
}

// Hook into the product creation and update process
add_action('woocommerce_process_product_meta', 'ssgsw_prevent_product_creation_during_sync', 10, 1);


/**
 * Start the sync process by setting a transient.
 *
 * This function initiates the sync process by setting a transient 'ssgsw_sync_in_progress'.
 * While this transient is active (for 10 minutes by default), actions such as product creation
 * can be blocked to prevent conflicts during the sync.
 *
 * @return void
 */
function ssgsw_start_sync() {
	ssgsw_end_sync();
	set_transient('ssgsw_sync_in_progress_state', true, 10 * MINUTE_IN_SECONDS);
}

/**
 * End the sync process by removing the transient.
 *
 * This function concludes the sync process by deleting the 'ssgsw_sync_in_progress' transient.
 * Once the transient is deleted, blocked actions like product creation can be resumed.
 *
 * @return void
 */
function ssgsw_end_sync() {
	// Remove the transient to mark the end of the sync process.
	delete_transient('ssgsw_sync_in_progress_state');
}



// Hook into plugin upgrade event
add_action('upgrader_process_complete', 'ssgs_plugin_upgrade_handler', 10, 2);

/**
 * Handles plugin upgrade events and updates a custom option.
 *
 * This function is triggered after a plugin upgrade is completed. It checks if the plugin
 * 'Stock Sync with Google Sheet for WooCommerce' was updated. If so, it sets the
 * 'ssgsw_license_sync' option to true, which is used to trigger subsequent actions, such as
 * redirection or data syncing.
 *
 * @param object $upgrader_object The upgrader object containing information about the upgrade process.
 * @param array  $options An array of options that define the upgrade action, including plugin paths.
 *
 * @return void
 */
function ssgs_plugin_upgrade_handler( $upgrader_object, $options ) {
	if ( $options['action'] === 'update' && $options['type'] === 'plugin' ) {
		if ( in_array('stock-sync-with-google-sheet-for-woocommerce/stock-sync-with-google-sheet-for-woocommerce.php', $options['plugins']) ) {
			update_option('ssgsw_license_sync', true);
		}
	}
}

/**
 * Redirects to the settings page if a plugin upgrade sync process is detected.
 *
 * This function checks if the 'ssgsw_license_sync' option is set to true, indicating that
 * a plugin upgrade process has occurred. If true, the admin user is redirected to the
 * plugin's settings page. The option is checked during the 'admin_init' action to ensure
 * that the redirection happens when the WordPress admin interface is loaded.
 *
 * @return void
 */
// function ssgsw_license_and_sync(){
// $get_option = get_option('ssgsw_license_sync');
// if($get_option) {
// wp_redirect(admin_url('admin.php?page=ssgsw-admin#settings'));
// exit();
// }
// }
// add_action('admin_footer','ssgsw_license_and_sync');
