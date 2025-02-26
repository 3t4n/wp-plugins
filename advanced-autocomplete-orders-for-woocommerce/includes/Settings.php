<?php
/**
 * Settings Class
 *
 * @category Admin
 * @package  Optemiz\AWO
 * @author   Nazrul Islam Nayan <nazrulislamnayan7@gmail.com>
 * @license  GPL3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @since    1.0.0
 */

namespace Optemiz\AWO;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Settings class
 *
 * @class Settings The class that manages all about Settings.
 *
 * @category Admin
 * @package  Optemiz\AWO
 * @author   Nazrul Islam Nayan <nazrulislamnayan7@gmail.com>
 * @license  GPL3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * 
 * @property null|object $_instance Instance of the class
 */
class Settings extends Admin_Page {
    /* Saved options */
    public $options;

    /**
     * Class constructor
     *
     * Sets up all the appropriate hooks and functions
     * within our plugin.
     *
     * @return void
     */
    public function __construct() {
        add_action( 'admin_init', array( $this, 'setting_options' ) );

        parent::__construct();

        do_action( 'awo_settings_loaded', $this );

    }

    /**
	 * Instance.
	 * 
	 * The instance will be created if it does not exist yet.
	 *
	 * @return self The main instance.
	 * @since 1.0.0
	 */
	public static function instance(): self {
		static $instance = null;
		if ( is_null( $instance ) ) {
			$instance = new self();
		}

		return $instance;
	}

    /**
     * Settings page options
     *
     * @return void
     */
    public function setting_options() {
    
        $this->setArgs([
            'panel_title'	=> __( 'Control Panel', 'advanced-autocomplete-woocommerce-orders' ),
            'color'			=> "#901fef",
            'encode'		=> false,
            'header'		=> false,
            'sidebar'		=> false,
        ]);
    
        $this->createSidebar([]);
    
        // General Tab
        $this->createTab( 'autocomplete', [
            'label'		=> __( 'Autocomplete Order', 'advanced-autocomplete-woocommerce-orders' ),
            'classes'	=> [],
        ] );
    
        $this->createSubTab( 'autocomplete', 'init', [
            'label' => esc_html__( 'Initialization', 'advanced-autocomplete-woocommerce-orders' ),
            'classes' => [],
        ] );
    
        $this->createOptions( 'autocomplete', 'init', [
            [
                'name' => 'enable_dynamic_attributes',
                'type' => 'switch',
                'default_value' => 1,
                'placeholder' => '',
                'disabled' => false,
                'required' => false,
                'min' => '',
                'max' => '',
                'step' => '',
                'label' => __( 'Enable Autocomplete Order', 'advanced-autocomplete-woocommerce-orders' ),
                'description' => __( 'Enable to show any product attributes value inside answers dynamically.', 'advanced-autocomplete-woocommerce-orders' ),
                'css' => '',
                'id' => '',
                'classes' => [],
                'options' => [],
            ],
            [
                'name' => 'awo_tab_label',
                'type' => 'text',
                'default_value' => esc_html__('FAQs', 'advanced-autocomplete-woocommerce-orders'),
                'placeholder' => '',
                'disabled' => false,
                'required' => false,
                'min' => '',
                'max' => '',
                'step' => '',
                'label' => esc_html__( 'Tab Label', 'advanced-autocomplete-woocommerce-orders' ),
                'description' => esc_html__( 'Change the faq tab label, it will affect in the product page description faq tab.', 'advanced-autocomplete-woocommerce-orders' ),
                'css' => '',
                'id' => '',
                'classes' => [],
                'options' => [],
            ],
    
            [
                'name' => 'awo_display_location',
                'type' => 'select',
                'default_value' => 'product_tab',
                'placeholder' => __( 'Select Display Location', 'advanced-autocomplete-woocommerce-orders' ),
                'multiple' => false,
                'disabled' => false,
                'required' => false,
                'label' => __( 'Display Location', 'advanced-autocomplete-woocommerce-orders' ),
                'description' => __( 'Choose the display location of FAQs in product page, Where it should be displayed.', 'advanced-autocomplete-woocommerce-orders' ),
                'css' => '',
                'id' => '',
                'classes' => [],
                'options' => apply_filters( 'awo_display_location_options', array(
                    [
                        'label' => __( 'Product Tab', 'advanced-autocomplete-woocommerce-orders' ),
                        'value' => 'product_tab'
                    ],
                    [
                        'label' => __( 'Top of Product page [Pro]', 'advanced-autocomplete-woocommerce-orders' ),
                        'value' => 'top_of_the_product_page'
                    ],
                    [
                        'label' => __( 'Before Product Summary [Pro]', 'advanced-autocomplete-woocommerce-orders' ),
                        'value' => 'before_product_summary'
                    ],
                    [
                        'label' => __( 'After `Add To Cart` Button [Pro]', 'advanced-autocomplete-woocommerce-orders' ),
                        'value' => 'after_add_to_cart_button'
                    ],
                    [
                        'label' => __( 'After Product Meta [Pro]', 'advanced-autocomplete-woocommerce-orders' ),
                        'value' => 'after_product_meta'
                    ],
                    [
                        'label' => __( 'After Social Share Buttons [Pro]', 'advanced-autocomplete-woocommerce-orders' ),
                        'value' => 'after_social_share_buttons'
                    ],
                    [
                        'label' => __( 'Bottom of Product page [Pro]', 'advanced-autocomplete-woocommerce-orders' ),
                        'value' => 'bottom_of_the_product_page'
                    ],
                )),
            ],
        ]);
        
        $this->createTab( 'coupon', [
            'label'		=> __( 'Coupon List', 'advanced-autocomplete-woocommerce-orders' ),
            'classes'	=> [],
        ] );
    
        $this->createSubTab( 'coupon', 'init', [
            'label' => esc_html__( 'Initialization', 'advanced-autocomplete-woocommerce-orders' ),
            'classes' => [],
        ] );
    
        $this->createOptions( 'coupon', 'init', [
            [
                'name' => 'enable_dynamic_attributes',
                'type' => 'switch',
                'default_value' => 1,
                'placeholder' => '',
                'disabled' => false,
                'required' => false,
                'min' => '',
                'max' => '',
                'step' => '',
                'label' => __( 'Enable Coupon List', 'advanced-autocomplete-woocommerce-orders' ),
                'description' => __( 'Enable to show any product attributes value inside answers dynamically.', 'advanced-autocomplete-woocommerce-orders' ),
                'css' => '',
                'id' => '',
                'classes' => [],
                'options' => [],
            ],
            [
                'name' => 'awo_tab_label',
                'type' => 'text',
                'default_value' => esc_html__('FAQs', 'advanced-autocomplete-woocommerce-orders'),
                'placeholder' => '',
                'disabled' => false,
                'required' => false,
                'min' => '',
                'max' => '',
                'step' => '',
                'label' => esc_html__( 'Tab Label', 'advanced-autocomplete-woocommerce-orders' ),
                'description' => esc_html__( 'Change the faq tab label, it will affect in the product page description faq tab.', 'advanced-autocomplete-woocommerce-orders' ),
                'css' => '',
                'id' => '',
                'classes' => [],
                'options' => [],
            ],
    
            [
                'name' => 'awo_display_location',
                'type' => 'select',
                'default_value' => 'product_tab',
                'placeholder' => __( 'Select Display Location', 'advanced-autocomplete-woocommerce-orders' ),
                'multiple' => false,
                'disabled' => false,
                'required' => false,
                'label' => __( 'Display Location', 'advanced-autocomplete-woocommerce-orders' ),
                'description' => __( 'Choose the display location of FAQs in product page, Where it should be displayed.', 'advanced-autocomplete-woocommerce-orders' ),
                'css' => '',
                'id' => '',
                'classes' => [],
                'options' => apply_filters( 'awo_display_location_options', array(
                    [
                        'label' => __( 'Product Tab', 'advanced-autocomplete-woocommerce-orders' ),
                        'value' => 'product_tab'
                    ],
                    [
                        'label' => __( 'Top of Product page [Pro]', 'advanced-autocomplete-woocommerce-orders' ),
                        'value' => 'top_of_the_product_page'
                    ],
                    [
                        'label' => __( 'Before Product Summary [Pro]', 'advanced-autocomplete-woocommerce-orders' ),
                        'value' => 'before_product_summary'
                    ],
                    [
                        'label' => __( 'After `Add To Cart` Button [Pro]', 'advanced-autocomplete-woocommerce-orders' ),
                        'value' => 'after_add_to_cart_button'
                    ],
                    [
                        'label' => __( 'After Product Meta [Pro]', 'advanced-autocomplete-woocommerce-orders' ),
                        'value' => 'after_product_meta'
                    ],
                    [
                        'label' => __( 'After Social Share Buttons [Pro]', 'advanced-autocomplete-woocommerce-orders' ),
                        'value' => 'after_social_share_buttons'
                    ],
                    [
                        'label' => __( 'Bottom of Product page [Pro]', 'advanced-autocomplete-woocommerce-orders' ),
                        'value' => 'bottom_of_the_product_page'
                    ],
                )),
            ],
        ]);
        
        $this->createTab( 'order', [
            'label'		=> __( 'Order', 'advanced-autocomplete-woocommerce-orders' ),
            'classes'	=> [],
        ] );
    
        $this->createSubTab( 'order', 'init', [
            'label' => esc_html__( 'Initialization', 'advanced-autocomplete-woocommerce-orders' ),
            'classes' => [],
        ] );
    
        $this->createOptions( 'order', 'init', [
            [
                'name' => 'enable_dynamic_attributes',
                'type' => 'switch',
                'default_value' => 1,
                'placeholder' => '',
                'disabled' => false,
                'required' => false,
                'min' => '',
                'max' => '',
                'step' => '',
                'label' => __( 'Enable Order List', 'advanced-autocomplete-woocommerce-orders' ),
                'description' => __( 'Enable to show any product attributes value inside answers dynamically.', 'advanced-autocomplete-woocommerce-orders' ),
                'css' => '',
                'id' => '',
                'classes' => [],
                'options' => [],
            ],
            [
                'name' => 'awo_tab_label',
                'type' => 'text',
                'default_value' => esc_html__('FAQs', 'advanced-autocomplete-woocommerce-orders'),
                'placeholder' => '',
                'disabled' => false,
                'required' => false,
                'min' => '',
                'max' => '',
                'step' => '',
                'label' => esc_html__( 'Tab Label', 'advanced-autocomplete-woocommerce-orders' ),
                'description' => esc_html__( 'Change the faq tab label, it will affect in the product page description faq tab.', 'advanced-autocomplete-woocommerce-orders' ),
                'css' => '',
                'id' => '',
                'classes' => [],
                'options' => [],
            ],
    
            [
                'name' => 'awo_display_location',
                'type' => 'select',
                'default_value' => 'product_tab',
                'placeholder' => __( 'Select Display Location', 'advanced-autocomplete-woocommerce-orders' ),
                'multiple' => false,
                'disabled' => false,
                'required' => false,
                'label' => __( 'Display Location', 'advanced-autocomplete-woocommerce-orders' ),
                'description' => __( 'Choose the display location of FAQs in product page, Where it should be displayed.', 'advanced-autocomplete-woocommerce-orders' ),
                'css' => '',
                'id' => '',
                'classes' => [],
                'options' => apply_filters( 'awo_display_location_options', array(
                    [
                        'label' => __( 'Product Tab', 'advanced-autocomplete-woocommerce-orders' ),
                        'value' => 'product_tab'
                    ],
                    [
                        'label' => __( 'Top of Product page [Pro]', 'advanced-autocomplete-woocommerce-orders' ),
                        'value' => 'top_of_the_product_page'
                    ],
                    [
                        'label' => __( 'Before Product Summary [Pro]', 'advanced-autocomplete-woocommerce-orders' ),
                        'value' => 'before_product_summary'
                    ],
                    [
                        'label' => __( 'After `Add To Cart` Button [Pro]', 'advanced-autocomplete-woocommerce-orders' ),
                        'value' => 'after_add_to_cart_button'
                    ],
                    [
                        'label' => __( 'After Product Meta [Pro]', 'advanced-autocomplete-woocommerce-orders' ),
                        'value' => 'after_product_meta'
                    ],
                    [
                        'label' => __( 'After Social Share Buttons [Pro]', 'advanced-autocomplete-woocommerce-orders' ),
                        'value' => 'after_social_share_buttons'
                    ],
                    [
                        'label' => __( 'Bottom of Product page [Pro]', 'advanced-autocomplete-woocommerce-orders' ),
                        'value' => 'bottom_of_the_product_page'
                    ],
                )),
            ],
        ]);

    }

    /**
     * Settings page content
     *
     * @return void
     */
    public function setting_page() {
        $this->loadTemplate();
    }

    /**
	 * Get product categories
	 *
	 * @return array
	 */
	public static function get_product_categories() {

		$args = array(
			'taxonomy'     => 'product_cat',
			'orderby'      => 'name',
			'show_count'   => 0,
			'pad_counts'   => 0,
			'hierarchical' => 1,
			'title_li'     => '',
			'hide_empty'   => 0,
		);

		$all_categories = get_categories( $args );

		$ids   = wp_list_pluck( $all_categories, 'term_id' );
		$names = wp_list_pluck( $all_categories, 'name' );

		$categories = array_combine( $ids, $names );
		$categories = ! empty( $categories ) ? $categories : array();

		return apply_filters( 'awo_product_categories', $categories );
	}

    /**
	 * Get product tags
	 *
	 * @return array
	 */
	public static function get_product_tags() {

		$args = array(
			'taxonomy'     => 'product_tag',
			'orderby'      => 'name',
			'show_count'   => 0,
			'pad_counts'   => 0,
			'hierarchical' => 1,
			'title_li'     => '',
			'hide_empty'   => 0,
		);

		$all_tags = get_tags( $args );

		$ids   = wp_list_pluck( $all_tags, 'term_id' );
		$names = wp_list_pluck( $all_tags, 'name' );

		$tags = array_combine( $ids, $names );
		$tags = ! empty( $tags ) ? $tags : array();

		return apply_filters( 'awo_product_tags', $tags );
	}
}