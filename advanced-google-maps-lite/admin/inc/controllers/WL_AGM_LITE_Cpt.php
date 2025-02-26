<?php
defined('ABSPATH') or die();

class WL_AGM_LITE_CPT {
	/* Creating CPT assets */
	public static function cpt_assets() {
		self::create_location_cpt();
		self::create_map_cpt();
		self::create_route_cpt();
		self::create_interactive_map_cpt();
	}

	/* Add Location Cpt */
	public static function create_location_cpt() {
		$labels = array(
			'name'               => esc_html(_x('Locations', WL_AGM_LITE_DOMAIN)),
			'singular_name'      => esc_html(_x('Location', WL_AGM_LITE_DOMAIN)),
			'add_new'            => esc_html__('Add New', WL_AGM_LITE_DOMAIN),
			'add_new_item'       => esc_html__('Add Location', WL_AGM_LITE_DOMAIN),
			'edit_item'          => esc_html__('Edit Location', WL_AGM_LITE_DOMAIN),
			'new_item'           => esc_html__('New Location', WL_AGM_LITE_DOMAIN),
			'view_item'          => esc_html__('View Location', WL_AGM_LITE_DOMAIN),
			'search_items'       => esc_html__('Search Locations', WL_AGM_LITE_DOMAIN),
			'not_found'          => esc_html__('No Locations Found', WL_AGM_LITE_DOMAIN),
			'not_found_in_trash' => esc_html__('No Locations Found in Trash', WL_AGM_LITE_DOMAIN),
			'parent_item_colon'  => esc_html__('Parent Location:', WL_AGM_LITE_DOMAIN),
			'all_items'          => esc_html__('All Locations', WL_AGM_LITE_DOMAIN),
			'menu_name'          => esc_html(_x('Location', WL_AGM_LITE_DOMAIN)),
		);

		$args = array(
			'labels'              => $labels,
			'hierarchical'        => true,
			'supports'            => array('title'),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => false,
			'menu_position'       => 10,
			'menu_icon'           => 'dashicons-admin-home',
			'show_in_nav_menus'   => true,
			'publicly_queryable'  => false,
			'exclude_from_search' => true,
			'has_archive'         => true,
			'query_var'           => true,
			'can_export'          => true,
			'rewrite'             => true,
			'capability_type'     => 'post'
		);
		register_post_type('wl_agm_locations', $args);
		add_filter('manage_edit-wl_agm_locations_columns', array('WL_AGM_LITE_CPT', 'advanced_gmaps_locations_columns'));
		add_action('manage_wl_agm_locations_posts_custom_column', array(
			'WL_AGM_LITE_CPT',
			'advanced_gmaps_locations_manage_columns'
		), 10, 2);
	}

	public static function advanced_gmaps_locations_columns($columns) {
		$columns = array(
			'cb'        => '<input type="checkbox" />',
			'title'     => esc_html__('Locations', WL_AGM_LITE_DOMAIN),
			'shortcode' => esc_html__('Advanced Google Maps Lite Shortcode', WL_AGM_LITE_DOMAIN),
			'author'    => esc_html__('Author', WL_AGM_LITE_DOMAIN),
			'date'      => esc_html__('Date', WL_AGM_LITE_DOMAIN)
		);

		return $columns;
	}
	public static function advanced_gmaps_locations_manage_columns($column, $post_id) {
		global $post;
		switch ($column) {
			case 'shortcode':
?><input type="text" value="[WL_AGM_LOCATION id='<?php echo absint($post_id) ?>' ]" readonly="readonly" /><?php
																															break;
																														default:
																															break;
																													}
																												}

																												/* Add Maps Cpt */
																												public static function create_map_cpt() {
																													$labels = array(
																														'name'               => esc_html(_x('Maps', WL_AGM_LITE_DOMAIN)),
																														'singular_name'      => esc_html(_x('Map', WL_AGM_LITE_DOMAIN)),
																														'add_new'            => esc_html__('Add New', WL_AGM_LITE_DOMAIN),
																														'add_new_item'       => esc_html__('Add Map', WL_AGM_LITE_DOMAIN),
																														'edit_item'          => esc_html__('Edit Map', WL_AGM_LITE_DOMAIN),
																														'new_item'           => esc_html__('New Map', WL_AGM_LITE_DOMAIN),
																														'view_item'          => esc_html__('View Map', WL_AGM_LITE_DOMAIN),
																														'search_items'       => esc_html__('Search Maps', WL_AGM_LITE_DOMAIN),
																														'not_found'          => esc_html__('No Maps Found', WL_AGM_LITE_DOMAIN),
																														'not_found_in_trash' => esc_html__('No Maps Found in Trash', WL_AGM_LITE_DOMAIN),
																														'parent_item_colon'  => esc_html__('Parent Map:', WL_AGM_LITE_DOMAIN),
																														'all_items'          => esc_html__('All Maps', WL_AGM_LITE_DOMAIN),
																														'menu_name'          => esc_html(_x('Map', WL_AGM_LITE_DOMAIN)),
																													);

																													$args = array(
																														'labels'              => $labels,
																														'hierarchical'        => true,
																														'supports'            => array('title'),
																														'public'              => false,
																														'show_ui'             => true,
																														'show_in_menu'        => false,
																														'menu_position'       => 10,
																														'menu_icon'           => 'dashicons-admin-home',
																														'show_in_nav_menus'   => true,
																														'publicly_queryable'  => false,
																														'exclude_from_search' => true,
																														'has_archive'         => true,
																														'query_var'           => true,
																														'can_export'          => true,
																														'rewrite'             => true,
																														'capability_type'     => 'post'
																													);
																													register_post_type('wl_agm_maps', $args);
																													add_filter('manage_edit-wl_agm_maps_columns', array('WL_AGM_LITE_CPT', 'advanced_gmaps_map_columns'));
																													add_action('manage_wl_agm_maps_posts_custom_column', array(
																														'WL_AGM_LITE_CPT',
																														'advanced_gmaps_map_manage_columns'
																													), 10, 2);
																												}

																												public static function advanced_gmaps_map_columns($columns) {
																													$columns = array(
																														'cb'        => '<input type="checkbox" />',
																														'title'     => esc_html__('Maps', WL_AGM_LITE_DOMAIN),
																														'shortcode' => esc_html__('Advanced Google Maps Lite Shortcode', WL_AGM_LITE_DOMAIN),
																														'author'    => esc_html__('Author', WL_AGM_LITE_DOMAIN),
																														'date'      => esc_html__('Date', WL_AGM_LITE_DOMAIN)
																													);

																													return $columns;
																												}

																												public static function advanced_gmaps_map_manage_columns($column, $post_id) {
																													global $post;
																													switch ($column) {
																														case 'shortcode':
																															?><input type="text" value="[WL_AGM_Map id='<?php echo absint($post_id) ?>']" readonly="readonly" /><?php
																															break;
																														default:
																															break;
																													}
																												}

																												/* Add Routes Cpt */
																												public static function create_route_cpt() {
																													$labels = array(
																														'name'               => esc_html(_x('Routes', WL_AGM_LITE_DOMAIN)),
																														'singular_name'      => esc_html(_x('Route', WL_AGM_LITE_DOMAIN)),
																														'add_new'            => esc_html__('Add New', WL_AGM_LITE_DOMAIN),
																														'add_new_item'       => esc_html__('Add Route', WL_AGM_LITE_DOMAIN),
																														'edit_item'          => esc_html__('Edit Route', WL_AGM_LITE_DOMAIN),
																														'new_item'           => esc_html__('New Route', WL_AGM_LITE_DOMAIN),
																														'view_item'          => esc_html__('View Route', WL_AGM_LITE_DOMAIN),
																														'search_items'       => esc_html__('Search Routes', WL_AGM_LITE_DOMAIN),
																														'not_found'          => esc_html__('No Routes Found', WL_AGM_LITE_DOMAIN),
																														'not_found_in_trash' => esc_html__('No Routes Found in Trash', WL_AGM_LITE_DOMAIN),
																														'parent_item_colon'  => esc_html__('Parent Route:', WL_AGM_LITE_DOMAIN),
																														'all_items'          => esc_html__('All Routes', WL_AGM_LITE_DOMAIN),
																														'menu_name'          => esc_html(_x('Route', WL_AGM_LITE_DOMAIN)),
																													);

																													$args = array(
																														'labels'              => $labels,
																														'hierarchical'        => true,
																														'supports'            => array('title'),
																														'public'              => false,
																														'show_ui'             => true,
																														'show_in_menu'        => false,
																														'menu_position'       => 10,
																														'menu_icon'           => 'dashicons-admin-home',
																														'show_in_nav_menus'   => true,
																														'publicly_queryable'  => false,
																														'exclude_from_search' => true,
																														'has_archive'         => true,
																														'query_var'           => true,
																														'can_export'          => true,
																														'rewrite'             => true,
																														'capability_type'     => 'post'
																													);
																													register_post_type('wl_agm_routes', $args);
																													add_filter('manage_edit-wl_agm_routes_columns', array('WL_AGM_LITE_CPT', 'advanced_gmaps_routes_columns'));
																													add_action('manage_wl_agm_routes_posts_custom_column', array(
																														'WL_AGM_LITE_CPT',
																														'advanced_gmaps_routes_manage_columns'
																													), 10, 2);
																												}

																												public static function advanced_gmaps_routes_columns($columns) {
																													$columns = array(
																														'cb'        => '<input type="checkbox" />',
																														'title'     => esc_html__('Routes', WL_AGM_LITE_DOMAIN),
																														'shortcode' => esc_html__('Advanced Google Maps Lite Shortcode', WL_AGM_LITE_DOMAIN),
																														'author'    => esc_html__('Author', WL_AGM_LITE_DOMAIN),
																														'date'      => esc_html__('Date', WL_AGM_LITE_DOMAIN)
																													);

																													return $columns;
																												}

																												public static function advanced_gmaps_routes_manage_columns($column, $post_id) {
																													global $post;
																													switch ($column) {
																														case 'shortcode':
																														?><input type="text" value="[WL_AGM_Route id='<?php echo absint($post_id) ?>']" readonly="readonly" /><?php
																															break;
																														default:
																															break;
																													}
																												}

																												/* Add Interactive maps Cpt */
																												public static function create_interactive_map_cpt() {
																													$labels = array(
																														'name'               => esc_html(_x('Interactive maps', WL_AGM_LITE_DOMAIN)),
																														'singular_name'      => esc_html(_x('Interactive map', WL_AGM_LITE_DOMAIN)),
																														'add_new'            => esc_html__('Add New', WL_AGM_LITE_DOMAIN),
																														'add_new_item'       => esc_html__('Add Map', WL_AGM_LITE_DOMAIN),
																														'edit_item'          => esc_html__('Edit Map', WL_AGM_LITE_DOMAIN),
																														'new_item'           => esc_html__('New Map', WL_AGM_LITE_DOMAIN),
																														'view_item'          => esc_html__('View Map', WL_AGM_LITE_DOMAIN),
																														'search_items'       => esc_html__('Search Maps', WL_AGM_LITE_DOMAIN),
																														'not_found'          => esc_html__('No Maps Found', WL_AGM_LITE_DOMAIN),
																														'not_found_in_trash' => esc_html__('No Maps Found in Trash', WL_AGM_LITE_DOMAIN),
																														'parent_item_colon'  => esc_html__('Parent Map:', WL_AGM_LITE_DOMAIN),
																														'all_items'          => esc_html__('All Maps', WL_AGM_LITE_DOMAIN),
																														'menu_name'          => esc_html(_x('Map', WL_AGM_LITE_DOMAIN)),
																													);

																													$args = array(
																														'labels'              => $labels,
																														'hierarchical'        => true,
																														'supports'            => array('title'),
																														'public'              => false,
																														'show_ui'             => true,
																														'show_in_menu'        => false,
																														'menu_position'       => 10,
																														'menu_icon'           => 'dashicons-admin-home',
																														'show_in_nav_menus'   => true,
																														'publicly_queryable'  => false,
																														'exclude_from_search' => true,
																														'has_archive'         => true,
																														'query_var'           => true,
																														'can_export'          => true,
																														'rewrite'             => true,
																														'capability_type'     => 'post'
																													);
																													register_post_type('wl_agm_inter_maps', $args);
																													add_filter('manage_edit-wl_agm_inter_maps_columns', array('WL_AGM_LITE_CPT', 'advanced_gmaps_int_maps_columns'));
																													add_action('manage_wl_agm_inter_maps_posts_custom_column', array(
																														'WL_AGM_LITE_CPT',
																														'advanced_gmaps_int_maps_manage_columns'
																													), 10, 2);
																												}

																												public static function advanced_gmaps_int_maps_columns($columns) {
																													$columns = array(
																														'cb'        => '<input type="checkbox" />',
																														'title'     => esc_html__('Maps', WL_AGM_LITE_DOMAIN),
																														'shortcode' => esc_html__('Advanced Google Maps Lite Shortcode', WL_AGM_LITE_DOMAIN),
																														'author'    => esc_html__('Author', WL_AGM_LITE_DOMAIN),
																														'date'      => esc_html__('Date', WL_AGM_LITE_DOMAIN)
																													);

																													return $columns;
																												}

																												public static function advanced_gmaps_int_maps_manage_columns($column, $post_id) {
																													global $post;
																													switch ($column) {
																														case 'shortcode':
																														?><input type="text" value="[WL_AGM_I_Map id='<?php echo absint($post_id) ?> ']" readonly="readonly" /><?php
																															break;
																														default:
																															break;
																													}
																												}
																											}
																															?>