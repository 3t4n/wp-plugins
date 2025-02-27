<?php
class Catcwp_Custom_Post {
    public function __construct() {
        add_action('init', array($this, 'catcwp_generate_custom_post'));
        add_action('admin_menu', array($this, 'catcwp_add_submenu'));
    }

    public function catcwp_generate_custom_post() {

        if ( post_type_exists( 'copy_to_clipboard' ) ) {
			return;
		}

        // Base 64 encoded SVG image.
		$_menu_icon = 'data:image/svg+xml;base64,' . base64_encode(
        '<?xml version="1.0" encoding="UTF-8" standalone="no"?> <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M6 3C6 1.34315 7.34315 0 9 0H14C14.2652 0 14.5196 0.105357 14.7071 0.292893L21.7071 7.29289C21.8946 7.48043 22 7.73478 22 8V17C22 18.6569 20.6569 20 19 20H18V21C18 22.6569 16.6569 24 15 24H5C3.34315 24 2 22.6569 2 21V7C2 5.34315 3.34315 4 5 4H6V3ZM6 6H5C4.44772 6 4 6.44772 4 7V21C4 21.5523 4.44772 22 5 22H15C15.5523 22 16 21.5523 16 21V20H9C7.34315 20 6 18.6569 6 17V6ZM9 2C8.44772 2 8 2.44772 8 3V17C8 17.5523 8.44771 18 9 18H19C19.5523 18 20 17.5523 20 17V9H16C14.3431 9 13 7.65685 13 6V2H9ZM15 3.41421L18.5858 7H16C15.4477 7 15 6.55228 15 6V3.41421Z" fill="#293644"/>
        </svg>'
		);

        // Set the copy to clipboard post type labels.
		$labels = apply_filters(
			'catcwp_post_type_labels',
			array(
                'name'                  => esc_html__('Copy to Clipboard', 'catcwp'),
                'singular_name'         => esc_html__('Copy to Clipboard', 'catcwp'),
                'menu_name'             => esc_html__('Copy to Clipboard', 'catcwp'),
                'name_admin_bar'        => esc_html__('Copy to Clipboard', 'catcwp'),
                'archives'              => esc_html__('Copy to Clipboard Archives', 'catcwp'),
                'attributes'            => esc_html__('Copy to Clipboard Attributes', 'catcwp'),
                'parent_item_colon'     => esc_html__('Parent Item:', 'catcwp'),
                'all_items'             => esc_html__('All Items', 'catcwp'),
                'add_new_item'          => esc_html__('Add New Item', 'catcwp'),
                'add_new'               => esc_html__('Add New', 'catcwp'),
                'new_item'              => esc_html__('New Item', 'catcwp'),
                'edit_item'             => esc_html__('Edit Item', 'catcwp'),
                'update_item'           => esc_html__('Update Item', 'catcwp'),
                'view_item'             => esc_html__('View Item', 'catcwp'),
                'view_items'            => esc_html__('View Items', 'catcwp'),
                'search_items'          => esc_html__('Search Item', 'catcwp'),
                'not_found'             => esc_html__('Not found', 'catcwp'),
                'not_found_in_trash'    => esc_html__('Not found in Trash', 'catcwp'),
                'featured_image'        => esc_html__('Featured Image', 'catcwp'),
                'set_featured_image'    => esc_html__('Set featured image', 'catcwp'),
                'remove_featured_image' => esc_html__('Remove featured image', 'catcwp'),
                'use_featured_image'    => esc_html__('Use as featured image', 'catcwp'),
                'insert_into_item'      => esc_html__('Insert into item', 'catcwp'),
                'uploaded_to_this_item' => esc_html__('Uploaded to this item', 'catcwp'),
                'items_list'            => esc_html__('Items list', 'catcwp'),
                'items_list_navigation' => esc_html__('Items list navigation', 'catcwp'),
                'filter_items_list'     => esc_html__('Filter items list', 'catcwp'),
            ),
        );

		// Set the copy to clipboard post type arguments.
		$args = apply_filters(
			'catcwp_post_type_args',
			array(
                'label'                 => esc_html__('Copy to Clipboard', 'catcwp'),
                'description'           => esc_html__('Custom post type for Copy to Clipboard functionality', 'catcwp'),
                'labels'                => $labels,
                'supports'              => array('title'),
                'hierarchical'          => false,
                'public'                => false,
                'show_ui'               => true,
                'show_in_menu'          => true,
                'menu_icon'             => $_menu_icon,
                'menu_position'         => 5,
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => false,
                'query_var'             => false,
                'exclude_from_search'   => false,
                'publicly_queryable'    => false,
                'capability_type'       => 'post',
            ),
        );
        
        register_post_type('copy_to_clipboard', $args);
    }

    public function catcwp_add_submenu() {
        add_submenu_page(
            'edit.php?post_type=copy_to_clipboard', // Parent menu slug
            'Help', // Page title
            'Help', // Menu title
            'manage_options', // Capability required to access the submenu
            'help', // Submenu slug
            array($this, 'catcwp_help_page') // Callback function for the submenu page content
        );
    }
    
    public function catcwp_help_page() {
        ?>
        <div class="catcwp_example_wrapper">
                <h1>Method 1 - Using Shortcode Parameters</h1>
                <h3>If you want to display the same text.</h3>
                <p>Get 20% off your next purchase with our exclusive coupon! Simply use the code 'SAVE20' at checkout to avail the discount. Don't miss out on this limited-time offer!</p>
                <h3>How to use the shortcode parameter</h3>
                <p>Get 20% off your next purchase with our exclusive coupon! Simply use the code <b>[copy_clipboard text="('SAVE20')"]</b> at checkout to avail the discount. Don't miss out on this limited-time offer!</p>
                <h3>If you want to copy different text/link while displaying another text</h3>
                <p>Get 20% off your next purchase with our exclusive coupon! Simply use the code 'SAVE20' at checkout to avail the discount. Don't miss out on this limited-time offer!</p>
                <h3>How to use the shortcode parameter</h3>
                <p>Get 20% off your next purchase with our exclusive coupon! Simply use the code <b>[copy_clipboard content="('SAVE20')" text="get coupon code"]</b> at checkout to avail the discount. Don't miss out on this limited-time offer!</p>
        </div>
        <div class="catcwp_example_wrapper">
                <h1>Method 2 - Using builting Shortcode from post</h1>
        </div>
        <?php
    }    
    
}

new Catcwp_Custom_Post();