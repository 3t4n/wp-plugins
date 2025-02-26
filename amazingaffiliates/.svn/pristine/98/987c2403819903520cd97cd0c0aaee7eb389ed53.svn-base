<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 * 
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    AmazingAffiliates
 * @subpackage AmazingAffiliates/admin
 * @author     pizza2mozzarella <pizzacondoppiamozzarella@gmail.com>
 */
 
class AmazingAffiliates_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;
	
	/**
	 * The common variables used inside the plugin.
	 *
	 * @since    1.0.0
	 * @var      array     $plugin    The common variables used inside the plugin.
	 */
	public $plugin = array(
        'prefix' => 'amazing',
	);
	public $custom_post_types;
	public $custom_taxonomies;
	public $custom_post_meta_groups;
	public $custom_post_meta;
	public $custom_post_meta_metaboxes;
	
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since  1.0.0
	 */
	public function __construct( $plugin_name, $version ) {
        
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		
        /**
         * The custom post types summoned by this plugin.
         *
         * @since    1.0.0
         * @var      array     $custom_post_types    The custom post types' parameters.
         */
		require( plugin_dir_path( __FILE__ ) . 'variables/custom_post_types.php' );
		$this->custom_post_types = $custom_post_types;
        
        /**
         * The custom taxonomies for the custom post types summoned by this plugin.
         *
         * @since    1.0.0
         * @var      array     $custom_taxonomies    The custom taxonomies' parameters.
         */
		require( plugin_dir_path( __FILE__ ) . 'variables/custom_taxonomies.php' );
		$this->custom_taxonomies = $custom_taxonomies;
        self::$amazingaffiliates_tax_index = $this->custom_taxonomies;
        
        /**
         * The custom meta keys for the custom post types summoned by this plugin.
         *
         * @since    1.0.0
         * @var      array     $this->custom_post_meta_groups       The custom meta keys groups.
         * @var      array     $this->custom_post_meta              The custom taxonomies' parameters.
         * @var      array     $this->custom_post_meta_metaboxes    The custom meta metaboxes structure. 
         */
		require( plugin_dir_path( __FILE__ ) . 'variables/custom_post_meta.php' );
		$this->custom_post_meta_groups = array_merge_recursive( $custom_post_meta_groups );
        $this->custom_post_meta = array_merge_recursive( $custom_post_meta );
        $this->custom_post_meta_metaboxes = array_merge_recursive( $custom_post_meta_metaboxes );
		
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		// admin area style
		wp_enqueue_style( 'amazingaffiliates_admin_styles', AMAZINGAFFILIATES_PLUGIN_URL . 'admin/css/amazingaffiliates-admin.css', array(), time(), 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts( $hook ) {
		// admin area scripts
		wp_enqueue_script( 'amazingaffiliates_admin_scripts', plugin_dir_url( __FILE__ ) . 'js/amazingaffiliates-admin.js', array( 'jquery' ), microtime(), false );
		//jQuery UI
		wp_enqueue_script(
            array(
                'jquery-ui-core',
                'jquery-ui-tabs'
            )
        );
        // page specific scripts
		if( str_ends_with( $hook, 'amazingaffiliates_workshop' ) ) {
            wp_enqueue_script( 'amazingaffiliates_admin_workshop_scripts', plugin_dir_url( __FILE__ ) . 'js/amazingaffiliates-admin-workshop.js', array( 'jquery' ), microtime(), false );
		}
		else if( str_ends_with( $hook, 'amazingaffiliates_warehouse' ) ) {
            wp_enqueue_script( 'amazingaffiliates_admin_warehouse_scripts', plugin_dir_url( __FILE__ ) . 'js/amazingaffiliates-admin-warehouse.js', array( 'jquery' ), microtime(), false );
		}
		else if( str_ends_with( $hook, 'amazingaffiliates_handbook' ) ) {
            $handbook_inline_js = "jQuery(document).ready( function() { jQuery('.tablinks')[0].click(); });";
            wp_add_inline_script( 'amazingaffiliates_admin_scripts', $handbook_inline_js , 'after' );
		}
		else if( str_ends_with( $hook, 'amazingaffiliates_settings' ) ) { 
            wp_enqueue_script( 'amazingaffiliates_admin_settings_scripts', plugin_dir_url( __FILE__ ) . 'js/amazingaffiliates-admin-settings.js', array( 'jquery' ), microtime(), false ); 
		}
		else if( str_ends_with( $hook, 'amazingaffiliates_setup' ) ) { 
            wp_enqueue_script( 'amazingaffiliates_admin_setup_scripts', plugin_dir_url( __FILE__ ) . 'js/amazingaffiliates-admin-setup.js', array( 'jquery' ), microtime(), false ); 
		}
	}
	
	/**
	 * Common functionalities of the plugins admin area
	 * 
	 * #since   1.0.6
 	*/
 	public function admin_area_customizations() {
        // plugin admin page customizations
        $amazingaffiliates_admin_page = '';
        if( isset( $_GET['page'] ) ) $amazingaffiliates_admin_page = sanitize_key( wp_unslash( $_GET['page'] ) );
        if(substr( $amazingaffiliates_admin_page, 0, 17 ) == 'amazingaffiliates') {
            
            add_action('admin_init', 'amazingaffiliates_hide_all_admin_notices');
            add_filter('admin_footer_text', 'amazingaffiliates_footer_admin');
        }
        // airplane mode for other plugins' notices on plugin pages
        function amazingaffiliates_hide_all_admin_notices() {
            global $wp_filter;
        
            // Check if the WP_Admin_Bar exists, as it's not available on all admin pages.
            if (isset($wp_filter['admin_notices'])) {
                // Remove all actions hooked to the 'admin_notices' hook.
                unset($wp_filter['admin_notices']);
            }
        }
        // plugin admin footer thankyou
        function amazingaffiliates_footer_admin () {
            if( isset( $_GET['page'] ) ) $amazingaffiliates_admin_page = sanitize_key( wp_unslash( $_GET['page'] ) );
            if(substr( $amazingaffiliates_admin_page, 0, 17 ) == 'amazingaffiliates') :
            ?>
               <p id="footer-thankyou">Enjoying <strong>Amazing Affiliates</strong>? Please rate <a href="https://wordpress.org/plugins/amazingaffiliates/#reviews" target="_blank" rel="noopener noreferrer">★★★★★</a> on <a <a href="https://wordpress.org/plugins/amazingaffiliates/#reviews" target="_blank" rel="noopener">WordPress.org</a> to help us spread the word. Thank you!</p>
        	<?php
        	endif;
        }
 	}


	/**
	 * Register the custom post types used for the plugin.
	 *
	 * @since    1.0.0
	 */
    public function register_custom_post_types() { 
        foreach ($this->custom_post_types as $custom_post_type) {
            register_post_type(
                $custom_post_type['slug'],
                array(
                    'labels'      	=> array(
                    'name'          => $custom_post_type['name'],
                    'singular_name' => $custom_post_type['singular_name']
                ),
                'description' 		=> $custom_post_type['description'],
                'public'      		=> false,
                'taxonomies'		=> array( $this->plugin['prefix'] . '_product_category' ),
                'has_archive' 		=> $custom_post_type['has_archive'],
                'show_in_rest'		=> $custom_post_type['show_in_rest'],
                'menu_icon' 		=> $custom_post_type['menu_icon'],
                'supports'			=> $custom_post_type['supports'],
                'delete_with_user' 	=> $custom_post_type['delete_with_user'],
                'exclude_from_search'   => $custom_post_type['exclude_from_search'],
                'publicly_queryable'    => $custom_post_type['publicly_queryable'],
                'show_ui'               => $custom_post_type['show_ui'],
                'show_in_nav_menus'     => $custom_post_type['show_in_nav_menus'],
                'show_in_rest'          => $custom_post_type['show_in_rest']
                )
            );
        }
    }
    
    /**
	 * Register the custom post types custom taxonomies used for the plugin.
	 *
	 * @since    1.0.0
	 * @var      array     $tax_index    The custom taxonomies' parameters.
	 */   
    public function register_custom_taxonomies() {
      	foreach ($this->custom_taxonomies as $custom_taxonomies) {
            register_taxonomy( 
                $custom_taxonomies['taxSlug'],
                $custom_taxonomies['post_type'],
                array(
                    'labels'      		=> array(
                        'name'          => $custom_taxonomies['taxNamePlural'],
                        'singular_name' => $custom_taxonomies['taxNameSingular']
                    ),
                    'hierarchical'      => $custom_taxonomies['taxHierarchical'],
                    'public'            => true,
                    'show_ui'           => true,
                    'show_admin_column' => true,
                    'query_var'         => true,
                    'rewrite'           => array( 'slug' => $custom_taxonomies['taxSlug'] ),
                    'show_in_rest'      => true,
                )
            );
      	}
    }
    public static $amazingaffiliates_tax_index = '';
    
    /**
	 * Register the custom meta keys for the custom post types summoned by the plugin.
	 *
	 * @since    1.0.0
	 */   
    public function register_custom_post_meta() {
        foreach( array_keys($this->custom_post_meta) as $post_type_target ) {
           foreach( array_keys($this->custom_post_meta[$post_type_target]) as $custom_post_meta_group_key ) { 
                foreach( $this->custom_post_meta[$post_type_target][$custom_post_meta_group_key] as $custom_post_meta ) {
                    register_post_meta(
                        $post_type_target,
                        $custom_post_meta['slug'],
                        array(
                            'single'       => true,
                            'type'         => $custom_post_meta['type'],
                            'show_in_rest' => array(
                                'schema' => array(
                                    'type'  => $custom_post_meta['type'],
                                    'default' => ''
                                ),
                            )
                        )
                    );
                }
            }
        }
    }
    
    /**
	 * Enables the custom meta keys on the wp editor.
	 *
	 * @since    1.0.0
	 */   
    public function add_custom_post_meta_metaboxes() {
        foreach( $this->custom_post_meta_metaboxes as $custom_post_meta_metabox ) {
            add_meta_box(
                $custom_post_meta_metabox['id'],
                $custom_post_meta_metabox['title'],
                array( $this, 'meta_box_content' ),
                $custom_post_meta_metabox['post_type']
            );
        }
    }
    public function save_custom_post_meta_metaboxes() {
        if ( ! isset( $_POST['amazingaffiliates_metabox_field'] )
			|| ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['amazingaffiliates_metabox_field'] ) ), 'amazingaffiliates_metabox' ) ) {
        }
        else {
            foreach( array_keys($this->custom_post_meta) as $post_type_target ) {
               foreach( array_keys($this->custom_post_meta[$post_type_target]) as $custom_post_meta_group_key ) { 
                    foreach( $this->custom_post_meta[$post_type_target][$custom_post_meta_group_key] as $custom_post_meta ) {
                        if ( array_key_exists( $custom_post_meta['slug'], $_POST ) ) {
                            update_post_meta( get_the_ID(), $custom_post_meta['slug'],	wp_kses_post( wp_unslash( $_POST[$custom_post_meta['slug']] ) ) );
                        }
                    }
                }
            }
        }
    }
    public function meta_box_content()	{
		require( plugin_dir_path( __FILE__ ) . 'partials/metaboxes.php' );
    }
    
    /**
     * Removes metaboxes from the plugin custom post types
     */
    function remove_post_custom_fields() {
	    remove_meta_box( 'postcustom' , 'post' , 'normal' ); 
    }

    /**
	 * AJAX callback to refresh the list of products shown on the warehouse admin page
	 *
	 * @since    1.0.0
	 */
    public function product_display_callback() {
		if( isset( $_REQUEST['nonce'] ) ) {
			if( wp_verify_nonce( sanitize_text_field( wp_unslash( $_REQUEST['nonce'] ) ), 'workshop-warehouse' ) ) {
				require( plugin_dir_path( __FILE__ ) . 'partials/product_display.php' );
			}
		}
		die();
    }
	
    /**
	 * AJAX callback to delete a product from the database
	 *
	 * @since    1.0.0
	 */
    public function product_delete_callback() {
		if( isset( $_REQUEST['nonce'] ) ) {
			if( wp_verify_nonce( sanitize_text_field( wp_unslash( $_REQUEST['nonce'] ) ), 'workshop-warehouse' ) ) {
				if( isset( $_REQUEST['asin'] ) ) {
					$asin = sanitize_text_field( wp_unslash( $_REQUEST['asin'] ) );
					require_once( plugin_dir_path( __FILE__ ) . 'partials/product_delete.php' );	
					echo wp_json_encode($block);
				}
			}
		}
      	die();
    }
	
    /**
	 * AJAX callback to delete a product from the database
	 *
	 * @since    1.0.0
	 */
    function product_update_callback() {
		if( isset( $_REQUEST['nonce'] ) ) {
			if( wp_verify_nonce( sanitize_text_field( wp_unslash( $_REQUEST['nonce'] ) ), 'workshop-warehouse' ) ) {
				if( isset( $_REQUEST['asin'] ) ) {
					$asin = sanitize_text_field( wp_unslash( $_REQUEST['asin'] ) );
					$product_batch = array( $asin );
					require_once( plugin_dir_path( __FILE__ ) . 'partials/product_update.php' );
					echo wp_json_encode( 'Updated!' );
				}
			}
		}
      	die();
    }
	
    /**
	 * AJAX callback to delete a product from the database
	 *
	 * @since    1.0.0
	 */
    public function product_create_callback() {
		if( isset( $_REQUEST['nonce'] ) ) {
			if( wp_verify_nonce( sanitize_text_field( wp_unslash( $_REQUEST['nonce'] ) ), 'workshop-warehouse' ) ) {
				if( isset( $_REQUEST['asin'] ) ) {
					$asin = sanitize_text_field( wp_unslash( $_REQUEST['asin'] ) );
					require_once( plugin_dir_path( __FILE__ ) . 'partials/product_create.php' );	
					echo wp_json_encode($response);
				}
			}
		}
      	die();
    }
    
    /**
	 * Product update cron event
	 *
	 * @since    1.0.0
	 */
    public function amazingaffiliates_product_update_cron_callback() {
        $product = new WP_Query( 
            array(
                'showposts'     => 10,
                'post_type'     => $this->plugin['prefix'] . '_product',
                'orderby'       => 'meta_value_num',
                'meta_key'      => 'last_update',
                'order'         => 'ASC'
            )
        );
        $i = 0;
        $product_batch = array(); 
        if(  $product->have_posts() ) {
            while( $product->have_posts() ) {
                $product->the_post();
                $now = time();
                $last_update = get_post_meta( get_the_ID(), 'last_update', true );
                $allowance = $now - $last_update;
                if( $i < 10 AND $allowance > 600 ) {
                    $product_batch[$i++] = get_post_meta( get_the_ID(), 'asin', true );
                }
                else { continue; }
            }
        }
        require_once( plugin_dir_path( __FILE__ ) . 'partials/product_update.php' );
    }
    public function amazingaffiliates_product_update_cron_custom_schedule( $schedules ) {
        $schedules[ 'amazingaffiliates_product_update_cron_interval' ] = array(
            'interval' => 7200,
            'display'  => 'Amazing Affiliates product update custom cron interval',
        );
        return $schedules;
    }
	
	/**
	 * Admin area navbar.
	 *
	 * @since    1.0.0
	 */   
    public function navbar($amazingaffiliates_page = '') {
		require( AMAZINGAFFILIATES_PLUGIN_URI . '/admin/partials/navbar.php' );
	}
	
	/**
	 * Admin area setup complete notices
	 * 
	 *  @since 1.0.10
 	*/
 	public function setupnotice() {
        if( (float) get_option('amazingaffiliates_setup_status') < 1 ) :
            ?>
            <a  style="display:block;margin:2em 0.5em 0 0;padding:1em;border:1px solid red;border-radius:10px;font-size:100%;color:white;background-color:red;text-align:center;text-decoration:none;"
                href="<?php echo esc_url( get_admin_url() . 'admin.php?page=amazingaffiliates_setup' ); ?>"
            >
                <b><big>Plugin setup progress: <?php echo esc_html( ((float) get_option('amazingaffiliates_setup_status'))*100 ); ?>%. </big></b><br> Please complete the <big style="text-decoration:underline;font-weight:bold;">setup</big> before using the plugin or it will not work as intended.
            </a>
        <?php
        endif;
 	}
 	
 	/**
	 * Setup complete checker
	 * 
	 *  @since 1.0.10
 	*/
 	public function setupcheck() {
        $partner_tag = get_option('amazingaffiliates_settings_api_partner_tag');
        $country = get_option('amazingaffiliates_settings_api_country');
        $accessKey = get_option('amazingaffiliates_settings_api_accessKey');
        $secretKey = get_option('amazingaffiliates_settings_api_secretKey');
        $api_test = get_option('amazingaffiliates_api_test_successful');
        $progress = 0;
        
        if( strlen( $partner_tag ) > 3 ) $progress += 0.20;
        if( strlen( $country ) > 3 ) $progress += 0.20;
        if( strlen( $accessKey ) > 10 ) $progress += 0.20;
        if( strlen( $secretKey ) > 10 ) $progress += 0.20;
        if( $api_test == 1 ) $progress += 0.20;
    
        update_option( 'amazingaffiliates_setup_status', $progress, true );
		
		if( strlen( $partner_tag ) < 3 
		  	OR strlen( $country ) < 3 
		   	OR strlen( $accessKey ) < 10
		   	OR strlen( $secretKey ) < 10 
		) {
			update_option( 'amazingaffiliates_api_test_successful', 0, true );
		}
    
 	}
	
	/**
	 * Admin page for the plugin's dashboard and main menu.
	 *
	 * @since    1.0.0
	 */  
	public function dashboard_page() {
		add_menu_page(
          'Amazing Affiliates',
          'Amazing Affiliates',
          'manage_options',
          'amazingaffiliates_menu',
          '',
          AMAZINGAFFILIATES_PLUGIN_URL . '/admin/img/amazingaffiliates_icon_16x16_white.png',
          3
        );
        add_submenu_page(
			'amazingaffiliates_menu',
			'Dashboard',
			'»   Dashboard',
			'manage_options',
			'amazingaffiliates_menu',
			'amazingaffiliates_dashboard_page_contents',
			1
		);
		function amazingaffiliates_dashboard_page_contents() {			
			require( plugin_dir_path( __FILE__ ) . 'partials/dashboard.php' );
        }
	}
	
	public function dashboard_content() {
	    require( AMAZINGAFFILIATES_PLUGIN_URI . 'admin/partials/dashboard_content.php' );
	}
	
	/**
	 * Admin dashboard for the insertion of the plugins' product custom post types.
	 *
	 * @since    1.0.0
	 */   
    public function workshop_page() {
		add_submenu_page(
			'amazingaffiliates_menu',
			'Workshop',
			'+   Add Products',
			'manage_options',
			'amazingaffiliates_workshop',
			'amazingaffiliates_workshop_page_contents',
			1
		);
        function amazingaffiliates_workshop_page_contents() {
            $warehouse_filters = true;
            require( plugin_dir_path( __FILE__ ) . 'partials/workshop.php' );
        }
    }
	
	/**
	 * Admin page for the custom management of the plugins' product custom post types.
	 *
	 * @since    1.0.0
	 */   
    public function warehouse_page() {
		add_submenu_page(
			'amazingaffiliates_menu',
			'Warehouse',
			'✎  Edit Products',
			'manage_options',
			'amazingaffiliates_warehouse',
			'amazingaffiliates_warehouse_page_contents',
			2
		);
        function amazingaffiliates_warehouse_page_contents() {
            $warehouse_filters = true;
            require( plugin_dir_path( __FILE__ ) . 'partials/warehouse.php' );
        }
    }
    
    /**
	 * Admin page for the plugins' settings.
	 *
	 * @since    1.0.0
	 */   
    public function settings_page() {
		add_submenu_page(
			'amazingaffiliates_menu',
			'Settings',
			'#   Settings',
			'manage_options',
			'amazingaffiliates_settings',
			'amazingaffiliates_settings_page_contents',
			6
		);
        add_action( 'admin_init', 'amazingaffiliates_settings' );
        function amazingaffiliates_settings() {
			$sanitization = array(
        		'sanitize_callback' => 'sanitize_text_field'
			);
            // API
            register_setting( 'amazingaffiliates_settings', 'amazingaffiliates_settings_api_country', $sanitization );
            register_setting( 'amazingaffiliates_settings', 'amazingaffiliates_settings_api_partner_tag', $sanitization );
            register_setting( 'amazingaffiliates_settings', 'amazingaffiliates_settings_api_accessKey', $sanitization );
            register_setting( 'amazingaffiliates_settings', 'amazingaffiliates_settings_api_secretKey', $sanitization );
            // Product pages
            register_setting( 'amazingaffiliates_settings', 'amazingaffiliates_settings_product_pages_public_status', $sanitization );
            register_setting( 'amazingaffiliates_settings', 'amazingaffiliates_settings_product_pages_automatic_content', $sanitization );
            // Product block
             //defaults
            register_setting( 'amazingaffiliates_settings', 'amazingaffiliates_settings_product_block_buybutton_default_text', $sanitization );
            register_setting( 'amazingaffiliates_settings', 'amazingaffiliates_settings_product_block_currentprice_prefix', $sanitization );
            register_setting( 'amazingaffiliates_settings', 'amazingaffiliates_settings_product_block_offerprice_prefix', $sanitization );
            register_setting( 'amazingaffiliates_settings', 'amazingaffiliates_settings_product_block_listprice_prefix', $sanitization );
             //offer banner
            register_setting( 'amazingaffiliates_settings', 'amazingaffiliates_settings_product_block_automatic_offer_banner_display', $sanitization );
            register_setting( 'amazingaffiliates_settings', 'amazingaffiliates_settings_product_block_automatic_offer_banner_threshold', $sanitization );
//            register_setting( 'amazingaffiliates_settings', 'amazingaffiliates_settings_product_block_offerflip_default_text', $sanitization );
//            register_setting( 'amazingaffiliates_settings', 'amazingaffiliates_settings_product_block_offerflip_default_text_alt', $sanitization );
//            register_setting( 'amazingaffiliates_settings', 'amazingaffiliates_settings_product_block_offerflip_default_background_color', $sanitization );
//            register_setting( 'amazingaffiliates_settings', 'amazingaffiliates_settings_product_block_offerflip_default_text_color', $sanitization );	
        }
        function amazingaffiliates_settings_page_contents() {			
			require( plugin_dir_path( __FILE__ ) . 'partials/settings.php' );
        }
    }
	
	/**
	 * Admin page for the plugin's dashboard and main menu.
	 *
	 * @since    1.0.0
	 */  
	public function handbook_page() {
		add_submenu_page(
			'amazingaffiliates_menu',
			'Handbook',
			'?   Instructions',
			'manage_options',
			'amazingaffiliates_handbook',
			'amazingaffiliates_handbook_page_contents',
			4
		);
		function amazingaffiliates_handbook_page_contents() {			
			require( plugin_dir_path( __FILE__ ) . 'partials/handbook.php' );
        }
	}
	
	/**
     * Setup Page On Activation
     * 
     * @since   1.0.10
     */
    public function setup_page() {
        add_submenu_page(
            'amazingaffiliates_menu',
            'Setup',
            '✓  Setup',
            'manage_options',
            'amazingaffiliates_setup',
            'amazingaffiliates_setup_page_contents',
            5
        );
        add_action( 'admin_init', 'amazingaffiliates_settings' );
        function amazingaffiliates_setup_page_contents() {
            require( plugin_dir_path( __FILE__ ) . 'partials/setup.php' );
        }
    }
    
    /**
	 * AJAX callback to test the APIs setup
	 *
	 * @since    1.0.10
	 */
    public function test_api() {
		require( plugin_dir_path( __FILE__ ) . 'partials/api_test.php' );
		die();
    }

}