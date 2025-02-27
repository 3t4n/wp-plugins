<?php

if (!defined('ABSPATH'))
    exit;

class AWECM_Front_End
{
	/**
     * @var    object
     * @access  private
     * @since    1.0.0
    */
    private static $_instance = null;

    /**
     * The version number.
     * @var     string
     * @access  public
     * @since   1.0.0
    */
    public $_version;

    /**
     * The token.
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $_token;

    /**
     * The main plugin file.
     * @var     string
     * @access  public
     * @since   1.0.0
    */
    public $file;
	
	/**
     * The main plugin directory.
     * @var     string
     * @access  public
     * @since   1.0.0
    */
    public $dir;

    /**
     * The plugin assets directory.
     * @var     string
     * @access  public
     * @since   1.0.0
    */
    public $assets_dir;
	
	/**
     * The plugin assets URL.
     * @var     string
     * @access  public
     * @since   1.0.0
    */
    public $assets_url;

    
    /**
     * The global styles
     * @var     string
     * @access  public
     * @since   1.0.0
    */
    public $global_styles;

    /**
     * Constructor function.
     * @access  public
     * @return  void
     * @since   1.0.0
    */
    function __construct($file = '', $version = '1.0.0')
    {
        $this->_version = $version;
        $this->_token = AWECM_TOKEN;
		$this->file = $file;
		$this->dir = dirname( $this->file );
        $this->assets_dir = trailingslashit( $this->dir ) . 'assets';
        $this->assets_url = esc_url( trailingslashit( plugins_url( '/assets/', __DIR__ ) ) );
        $this->global_styles = get_option( $this->_token.'_global_styles' );
        
        /**
         * Check if WooCommerce is active
         * 
		*/
        $this->check_woocommerce_active();

        // reg taxonomy
        add_action( 'init', array( $this, 'awecm_taxonomy' ) );
        //  reg post type
        add_action( 'init', array( $this, 'awecm_post_type' ) );
        // handling template preview
        add_action( 'init', array( $this, 'handle_preview' ), 10 );
        // Rewrite woocommerce email styles
        add_filter('woocommerce_email_styles', array( $this, 'change_default_email_styles' ), 10, 2);
        // woocommerce locate email template
        add_filter( 'woocommerce_locate_template', array( $this, 'woo_locate_template' ), 999, 3 );
        // safe styles for wp_kses_post
        add_filter( 'safe_style_css', array( $this, 'filter_safe_style_css' ), 10, 1 );
    }

    /**
     * Adding post type
    */
    public function awecm_post_type()
    {
        // Register Custom Post Type
        if( !post_type_exists( 'aco_email_templates' ) ) {
            register_post_type( 'aco_email_templates',
                array(
                    'labels' => array(
                        'name' => __( 'Email Templates', 'email-customizer-and-designer-for-woocommerce' ),
                        'singular_name' => __( 'Email Template', 'email-customizer-and-designer-for-woocommerce' ),
                        'menu_name' => __( 'Woo Email Customizer By Acowebs', 'email-customizer-and-designer-for-woocommerce' ),
                    ),
                    'public' => false,
                    'show_ui' => false,
                    'show_in_rest' => false,
                    'has_archive' => false,
                    'taxonomies' => array('awecm_template_categories'),
                    'menu_icon' => 'dashicons-editor-justify',
                    'rewrite' => array('slug' => 'email-templates'),
                    'capability_type' => 'post',
                    'map_meta_cap' => true,
                    'supports'=> array('title'),
                    'hierarchical' => false,
                    'show_in_nav_menus' => false,
                    'publicly_queryable' => false,
                    'exclude_from_search' => true,
                    'can_export' => true,
                    'query_var' => false,
                )
            );
        }
    }

    /**
     * Adding taxonomies
    */
    public function awecm_taxonomy()
    {
        // Register Custom Taxonomy
        $labels = array(
            'name'                       => _x( 'Category', 'Taxonomy General Name', 'email-customizer-and-designer-for-woocommerce' ),
            'singular_name'              => _x( 'Categories', 'Taxonomy Singular Name', 'email-customizer-and-designer-for-woocommerce' ),
            'menu_name'                  => __( 'Categories', 'email-customizer-and-designer-for-woocommerce' ),
            'all_items'                  => __( 'All Categories', 'email-customizer-and-designer-for-woocommerce' ),
            'parent_item'                => __( 'Parent Category', 'email-customizer-and-designer-for-woocommerce' ),
            'parent_item_colon'          => __( 'Parent Category:', 'email-customizer-and-designer-for-woocommerce' ),
            'new_item_name'              => __( 'New Category Name', 'email-customizer-and-designer-for-woocommerce' ),
            'add_new_item'               => __( 'Add New Category', 'email-customizer-and-designer-for-woocommerce' ),
            'edit_item'                  => __( 'Edit Category', 'email-customizer-and-designer-for-woocommerce' ),
            'update_item'                => __( 'Update Category', 'email-customizer-and-designer-for-woocommerce' ),
            'view_item'                  => __( 'View Category', 'email-customizer-and-designer-for-woocommerce' ),
            'separate_items_with_commas' => __( 'Separate categories with commas', 'email-customizer-and-designer-for-woocommerce' ),
            'add_or_remove_items'        => __( 'Add or remove categories', 'email-customizer-and-designer-for-woocommerce' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'email-customizer-and-designer-for-woocommerce' ),
            'popular_items'              => __( 'Popular Categories', 'email-customizer-and-designer-for-woocommerce' ),
            'search_items'               => __( 'Search Categories', 'email-customizer-and-designer-for-woocommerce' ),
            'not_found'                  => __( 'Not Found', 'email-customizer-and-designer-for-woocommerce' ),
            'no_terms'                   => __( 'No Categories', 'email-customizer-and-designer-for-woocommerce' ),
            'items_list'                 => __( 'Categories list', 'email-customizer-and-designer-for-woocommerce' ),
            'items_list_navigation'      => __( 'Categories list navigation', 'email-customizer-and-designer-for-woocommerce' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => false,
            'public'                     => false,
            'show_ui'                    => false,
            'show_admin_column'          => false,
            'show_in_nav_menus'          => false,
            'show_tagcloud'              => false,
            'show_in_rest'               => false,
        );

        if( ! taxonomy_exists( 'awecm_template_categories' ) ){
	        register_taxonomy( 'awecm_template_categories', array( 'aco_email_templates' ), $args );
        }

        /** Terms insert */
        if( taxonomy_exists( 'awecm_template_categories' ) ){
            // admin new order
            if( ! term_exists( 'awecm_admin_new_order', 'awecm_template_categories' ) ){
                wp_insert_term(
                    'Admin New Order',   // the term 
                    'awecm_template_categories', // the taxonomy
                    array(
                        'slug' => 'awecm_admin_new_order',
                    )
                );
            }

            // admin cancelled order
            if( ! term_exists( 'awecm_admin_cancelled_order', 'awecm_template_categories' ) ){
                wp_insert_term(
                    'Admin Cancelled Order',
                    'awecm_template_categories',
                    array(
                        'slug' => 'awecm_admin_cancelled_order',
                    )
                );
            }

            // admin failed order
            if( ! term_exists( 'awecm_admin_failed_order', 'awecm_template_categories' ) ){
                wp_insert_term(
                    'Admin Failed Order',
                    'awecm_template_categories',
                    array(
                        'slug' => 'awecm_admin_failed_order',
                    )
                );
            }

            // customer order on-hold
            if( ! term_exists( 'awecm_order_onhold', 'awecm_template_categories' ) ){
                wp_insert_term(
                    'Customer Order On Hold',
                    'awecm_template_categories',
                    array(
                        'slug' => 'awecm_order_onhold',
                    )
                );
            }

            // customer processing order
            if( ! term_exists( 'awecm_order_processing', 'awecm_template_categories' ) ){
                wp_insert_term(
                    'Customer Order Processing',
                    'awecm_template_categories',
                    array(
                        'slug' => 'awecm_order_processing',
                    )
                );
            }

            // customer completed order
            if( ! term_exists( 'awecm_order_completed', 'awecm_template_categories' ) ){
                wp_insert_term(
                    'Customer Order Completion',
                    'awecm_template_categories',
                    array(
                        'slug' => 'awecm_order_completed',
                    )
                );
            }

            // customer refunded order
            if( ! term_exists( 'awecm_order_refunded', 'awecm_template_categories' ) ){
                wp_insert_term(
                    'Customer Order Refunded',
                    'awecm_template_categories',
                    array(
                        'slug' => 'awecm_order_refunded',
                    )
                );
            }

            // customer order invoice
            if( ! term_exists( 'awecm_order_invoice', 'awecm_template_categories' ) ){
                wp_insert_term(
                    'Customer Invoice',
                    'awecm_template_categories',
                    array(
                        'slug' => 'awecm_order_invoice',
                    )
                );
            }

            // customer note
            if( ! term_exists( 'awecm_order_note', 'awecm_template_categories' ) ){
                wp_insert_term(
                    'Customer Note',
                    'awecm_template_categories',
                    array(
                        'slug' => 'awecm_order_note',
                    )
                );
            }

            // reset password
            if( ! term_exists( 'awecm_reset_password', 'awecm_template_categories' ) ){
                wp_insert_term(
                    'Reset Password',
                    'awecm_template_categories',
                    array(
                        'slug' => 'awecm_reset_password',
                    )
                );
            }

            // new account
            if( ! term_exists( 'awecm_new_account', 'awecm_template_categories' ) ){
                wp_insert_term(
                    'New Account',
                    'awecm_template_categories',
                    array(
                        'slug' => 'awecm_new_account',
                    )
                );
            }
        }
    }

	/**
     * Checking woocommerce installed.
     * @access  public
     * @return  boolean
     * @since   1.0.0
    */
    public function check_woocommerce_active()
    {
        if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
            return true;
        }
        if (is_multisite()) {
            $plugins = get_site_option('active_sitewide_plugins');
            if (isset($plugins['woocommerce/woocommerce.php']))
                return true;
        }
        return false;
    }

    /**
     * get rewrite woocommerce default styles
     * @return cf
    */
    public function change_default_email_styles( $styles, $email )
    {
        if( ! empty( $this->global_styles ) ){
            if( ! empty( $this->global_styles['bgColor'] ) ){
                $styles .= '#wrapper{background-color:'.$this->global_styles['bgColor'].';}';
            }
            if( ! empty( $this->global_styles['bodyBgColor'] ) ){
                $styles .= '#template_container{background-color:'.$this->global_styles['bodyBgColor'].';border:none;}';
            }
            if( ! empty( $this->global_styles['headerBgColor'] ) ){
                $styles .= '#template_header{background-color:'.$this->global_styles['headerBgColor'].';}';
            }
            if( ! empty( $this->global_styles['headerTextColor'] ) ){
                $styles .= '#template_header{color:'.$this->global_styles['headerTextColor'].';}';
            }
            if( ! empty( $this->global_styles['headerTextColor'] ) ){
                $styles .= '#template_header h1, #template_header h1 a {color:'.$this->global_styles['headerTextColor'].';}';
            }
            if( ! empty( $this->global_styles['textColor'] ) ){
                $styles .= '#template_footer #credit{color:'.$this->global_styles['textColor'].';}';
            }
            if( ! empty( $this->global_styles['bodyBgColor'] ) ){
                $styles .= '#body_content{background-color:'.$this->global_styles['bodyBgColor'].';}';
            }
            if( ! empty( $this->global_styles['textColor'] ) ){
                $styles .= '#body_content_inner{color:'.$this->global_styles['textColor'].';}';
            }
            if( ! empty( $this->global_styles['tableTdColor'] ) ){
                $styles .= '.td{color:'.$this->global_styles['tableTdColor'].';}';
            }
            if( ! empty( $this->global_styles['tableBorderColor'] ) ){
                $styles .= '.td{border-color:'.$this->global_styles['tableBorderColor'].';}';
            }
            if( ! empty( $this->global_styles['tableBgColor'] ) ){
                $styles .= 'table.td{background-color:'.$this->global_styles['tableBgColor'].';}';
            }
            if( ! empty( $this->global_styles['tableThColor'] ) ){
                $styles .= 'th.td{color:'.$this->global_styles['tableThColor'].';}';
            }
            if( ! empty( $this->global_styles['textColor'] ) ){
                $styles .= '.address{color:'.$this->global_styles['textColor'].';}';
            }
            if( ! empty( $this->global_styles['textColor'] ) ){
                $styles .= '.text{color:'.$this->global_styles['textColor'].';}';
            }
            if( ! empty( $this->global_styles['linkColor'] ) ){
                $styles .= '.link{color:'.$this->global_styles['linkColor'].';}';
            }
            if( ! empty( $this->global_styles['headingColor'] ) ){
                $styles .= 'h1, h2, h3, h4{color:'.$this->global_styles['headingColor'].';}';
            }
            if( ! empty( $this->global_styles['linkColor'] ) ){
                $styles .= 'a{color:'.$this->global_styles['linkColor'].';}';
            }
            if( ! empty( $this->global_styles['headingColor'] ) ){
                $styles .= 'h1 a.link, h2 a.link, h3 a.link, h4 a.link{color:'.$this->global_styles['headingColor'].';}';
            }
        }

        return $styles;
    }

    /**
     * Locate woocommerce email template
     * @return template||email_template
    */
    public function woo_locate_template( $template, $template_name, $template_path )
    {
        $template_mapping = get_option( $this->_token.'_email_mapping' );
        $search = array( 'emails/', '.php' );
        $replace = array( '', '' );
        $parsed_template_name = str_replace( $search, $replace, $template_name );

        if( ! empty( $template_mapping ) && ! empty( $parsed_template_name ) ){
            switch( $parsed_template_name ){
                case "admin-new-order":
                    $template_id = $template_mapping['new_ord_temp_id'];
                    if( ! empty( $template_id ) && ( $template_id != -1 ) ){
                        $email_template = $this->get_email_template( $template_id );
                        if( ! empty( $email_template ) ){
                            return $email_template;
                        }
                    }
                    break;
                case "admin-cancelled-order":
                    $template_id = $template_mapping['cancelled_ord_temp_id'];
                    if( ! empty( $template_id ) && ( $template_id != -1 ) ){
                        $email_template = $this->get_email_template( $template_id );
                        if( ! empty( $email_template ) ){
                            return $email_template;
                        }
                    }
                    break;
                case "admin-failed-order":
                    $template_id = $template_mapping['failed_ord_temp_id'];
                    if( ! empty( $template_id ) && ( $template_id != -1 ) ){
                        $email_template = $this->get_email_template( $template_id );
                        if( ! empty( $email_template ) ){
                            return $email_template;
                        }
                    }
                    break;
                case "customer-completed-order":
                    $template_id = $template_mapping['completed_ord_temp_id'];
                    if( ! empty( $template_id ) && ( $template_id != -1 ) ){
                        $email_template = $this->get_email_template( $template_id );
                        if( ! empty( $email_template ) ){
                            return $email_template;
                        }
                    }
                    break;
                case "customer-on-hold-order":
                    $template_id = $template_mapping['onhold_ord_temp_id'];
                    if( ! empty( $template_id ) && ( $template_id != -1 ) ){
                        $email_template = $this->get_email_template( $template_id );
                        if( ! empty( $email_template ) ){
                            return $email_template;
                        }
                    }
                    break;
                case "customer-processing-order":
                    $template_id = $template_mapping['processing_ord_temp_id'];
                    if( ! empty( $template_id ) && ( $template_id != -1 ) ){
                        $email_template = $this->get_email_template( $template_id );
                        if( ! empty( $email_template ) ){
                            return $email_template;
                        }
                    }
                    break;
                case "customer-refunded-order":
                    $template_id = $template_mapping['refunded_ord_temp_id'];
                    if( ! empty( $template_id ) && ( $template_id != -1 ) ){
                        $email_template = $this->get_email_template( $template_id );
                        if( ! empty( $email_template ) ){
                            return $email_template;
                        }
                    }
                    break;
                case "customer-invoice":
                    $template_id = $template_mapping['invoice_temp_id'];
                    if( ! empty( $template_id ) && ( $template_id != -1 ) ){
                        $email_template = $this->get_email_template( $template_id );
                        if( ! empty( $email_template ) ){
                            return $email_template;
                        }
                    }
                    break;
                case "customer-note":
                    $template_id = $template_mapping['customer_note_temp_id'];
                    if( ! empty( $template_id ) && ( $template_id != -1 ) ){
                        $email_template = $this->get_email_template( $template_id );
                        if( ! empty( $email_template ) ){
                            return $email_template;
                        }
                    }
                    break;
                case "customer-reset-password":
                    $template_id = $template_mapping['reset_password_temp_id'];
                    if( ! empty( $template_id ) && ( $template_id != -1 ) ){
                        $email_template = $this->get_email_template( $template_id );
                        if( ! empty( $email_template ) ){
                            return $email_template;
                        }
                    }
                    break;
                case "customer-new-account":
                    $template_id = $template_mapping['new_account_temp_id'];
                    if( ! empty( $template_id ) && ( $template_id != -1 ) ){
                        $email_template = $this->get_email_template( $template_id );
                        if( ! empty( $email_template ) ){
                            return $email_template;
                        }
                    }
                    break;
                default:
                    return $template;
            }
        }

       	return $template;
	}

    /**
     * Get email template from id 
     * @return path
    */
    public function get_email_template($template_id)
    {
        if( empty( $template_id ) )
            return false;

        $template_name = get_the_title( $template_id );
        $file_name = get_post_field( 'post_name', $template_id );
        $file_path = AWECM_UPLOAD_TEMPLATE_DIR.$file_name.'.php';

        return $file_path;
    }
    
    /**
     * Handling template preview
    */
    public function handle_preview()
    {
        // hanling document generation
        if( isset( $_GET['awecm_preview'] ) ) {
        	//checkes user is logged in
        	if( !is_user_logged_in() ) {
        		auth_redirect();
        	}

        	$not_allowed_msg = __( 'You are not allowed to view this page.', 'email-customizer-and-designer-for-woocommerce' );
            $not_allowed_title = __( 'Access denied !!!.', 'email-customizer-and-designer-for-woocommerce' );

            if( current_user_can( 'administrator' ) || current_user_can( 'manage_woocommerce' ) ){
                if( !session_id() )
                    session_start();

                if( ! empty( $_SESSION['awecm_template_settings'] ) ){
                    $settings_serialized = $_SESSION['awecm_template_settings'];
                    $settings = maybe_unserialize( $settings_serialized );
                    if( ! empty( $settings ) ){
                        if( isset( $_GET['device'] ) ){
                            $device_type = sanitize_text_field( $_GET['device'] );
                        } else {
                            $device_type = "desktop";
                        }

                        $template_content = $this->prepare_template( $settings, 'preview', $device_type );

                        $allowed_tags = array(
                            'html' => array(
                                'class' => array(),
                                'lang' => array(),
                            ),
                            'head' => array(),
                            'title' => array(),
                            'style' => array(),
                            'body' => array(
                                'class' => array(),
                                'style' => array(),
                                'direction' => array()
                            ),
                            'div' => array(
                                'class' => array(),
                                'title' => array(),
                                'style' => true,
                                'direction' => array()
                            ),
                            'a' => array(
                                'class' => array(),
                                'href'  => array(),
                                'target'  => array(),
                                'rel'   => array(),
                                'title' => array(),
                                'direction' => array(),
                                'style' => true,
                            ),
                            'abbr' => array(
                                'title' => array(),
                                'direction' => array()
                            ),
                            'b' => array(),
                            'blockquote' => array(
                                'cite'  => array(),
                                'style' => array(),
                                'direction' => array()
                            ),
                            'cite' => array(
                                'title' => array(),
                                'direction' => array()
                            ),
                            'code' => array(),
                            'del' => array(
                                'datetime' => array(),
                                'title' => array(),
                                'direction' => array()
                            ),
                            'dd' => array(),
                            'table' => array(
                                'class' => array(),
                                'border' => array(),
                                'cellpadding' => array(),
                                'cellspacing' => array(),
                                'height' => array(),
                                'width'  => array(),
                                'align' => array(),
                                'valign' => array(),
                                'style' => array(),
                                'direction' => array()
                            ),
                            'thead' => array(
                                'direction' => array()
                            ),
                            'tbody' => array(
                                'direction' => array()
                            ),
                            'tfoot' => array(
                                'direction' => array()
                            ),
                            'tr' => array(
                                'direction' => array()
                            ),
                            'th' => array(
                                'scope' => array(),
                                'colspan' => array(),
                                'align' => array(),
                                'valign' => array(),
                                'class' => array(),
                                'style' => array(),
                                'direction' => array(),
                                'width' => array()
                            ),
                            'td' => array(
                                'scope' => array(),
                                'colspan' => array(),
                                'align' => array(),
                                'valign' => array(),
                                'class' => array(),
                                'style' => array(),
                                'direction' => array(),
                                'width' => array()
                            ),
                            'dl' => array(
                                'direction' => array()
                            ),
                            'dt' => array(
                                'direction' => array()
                            ),
                            'em' => array(
                                'direction' => array()
                            ),
                            'h1' => array(
                                'class'  => array(),
                                'style' => array(),
                                'direction' => array()
                            ),
                            'h2' => array(
                                'class'  => array(),
                                'style' => array(),
                                'direction' => array()
                            ),
                            'h3' => array(
                                'class'  => array(),
                                'style' => array(),
                                'direction' => array()
                            ),
                            'h4' => array(
                                'class'  => array(),
                                'style' => array(),
                                'direction' => array()
                            ),
                            'h5' => array(
                                'class'  => array(),
                                'style' => array(),
                                'direction' => array()
                            ),
                            'h6' => array(
                                'class'  => array(),
                                'style' => array(),
                                'direction' => array()
                            ),
                            'i' => array(
                                'class'  => array(),
                                'style' => array(),
                                'direction' => array()
                            ),
                            'img' => array(
                                'alt'    => array(),
                                'class'  => array(),
                                'height' => array(),
                                'src'    => array(),
                                'width'  => array(),
                                'height'  => array(),
                                'style' => array(),
                                'direction' => array()
                            ),
                            'li' => array(
                                'class' => array(),
                                'direction' => array(),
                                'style' => array(),
                            ),
                            'ol' => array(
                                'class' => array(),
                                'direction' => array(),
                                'style' => array(),
                            ),
                            'p' => array(
                                'class' => array(),
                                'style' => array(),
                                'direction' => array()
                            ),
                            'q' => array(
                                'cite' => array(),
                                'title' => array(),
                                'style' => array(),
                                'direction' => array()
                            ),
                            'span' => array(
                                'class' => array(),
                                'title' => array(),
                                'style' => array(),
                                'direction' => array()
                            ),
                            'strike' => array(),
                            'strong' => array(),
                            'ul' => array(
                                'class' => array(),
                                'style' => array(),
                                'direction' => array()
                            ),
                            'hr' => array(
                                'class' => array(),
                                'style' => array(),
                                'direction' => array()
                            ),
                        );

                        echo wp_kses($template_content, $allowed_tags);
                    }
                }
            } else {
                wp_die( $not_allowed_msg, $not_allowed_title );
            }
            
            exit;
        }
    }

    /**
     * Handling template creation
    */
    public function prepare_template( $settings, $type, $device="desktop" )
    {
        if( empty( $settings ) )
            return false;

        $rows = $settings['rows'];
        if( ! empty( $settings['bgColor'] ) ){
            $bg_color = $settings['bgColor'];
        } else {
            $bg_color = $this->global_styles['bgColor'];
        }

        $rtl = rest_sanitize_boolean( $settings['rtl'] );
        if( is_rtl() ){
            $rtl = true;
        }

        if( ! empty( $device ) && $device == "mobile" ){
            $container_width = 300;
        } else {
            $container_width = 600;
        }

        $g_text_color = ! empty( $this->global_styles['textColor'] ) ? $this->global_styles['textColor'] : 'rgba(10,30,67,0.75)';
        $g_link_color = ! empty( $this->global_styles['textColor'] ) ? $this->global_styles['textColor'] : '#96588a';
        $g_heading_color = ! empty( $this->global_styles['headingColor'] ) ? $this->global_styles['headingColor'] : '#96588a';

        $useragent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? sanitize_text_field( $_SERVER['HTTP_USER_AGENT'] ) : '';
        if( preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)) ){
            $container_width = 300;
        }

        ob_start(); ?>
        <!DOCTYPE html>
        <html>
            <head>
                <title><?php echo sanitize_title( $settings['tempName'] ); ?></title>
                <style>
                    * {box-sizing: border-box;}
                    body{margin: 0;}
                    p{
                        margin: 0; 
                        padding: 0; 
                        font-weight: normal; 
                        font-size: 16px; 
                        line-height: 21px; 
                        color: <?php echo $g_text_color; ?>;
                    }
                    a{
                        text-decoration: none; 
                        color: <?php echo $g_link_color; ?>;
                    }
                    h1, h2, h3, h4, h5, h6 {
                        margin: 0;
                        color: <?php echo $g_heading_color; ?>;
                    }
                </style>
            </head>
            <body style="background-color: <?php echo $bg_color; ?>; <?php if($rtl){echo 'direction: rtl;';} ?>">
                <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" style="<?php if($rtl){echo 'direction: rtl;';} ?>">
                    <tr>
                        <td align="center" valign="top" style="background-color: <?php echo $bg_color; ?>; padding: 70px 0;">
                            <table width="<?php echo $container_width; ?>" cellspacing="0" cellpadding="0" class="awecm-ft-table" style="max-width: 100%; <?php if($rtl){echo 'direction: rtl;';} ?>">
                                <?php if( ! empty( $rows ) ): ?>
                                    <tbody>
                                        <tr>
                                            <td valign="top" style="vertical-align: top; padding: 0;">
                                                <?php foreach( $rows as $row ):
                                                    $row_style = 'width: 100%; border-spacing: 0;';
                                                    if( ! empty( $row['bgColor'] ) ){
                                                        $row_style .= 'background-color:'.$row['bgColor'].';'; 
                                                    } else {
                                                        if( ! empty( $this->global_styles['bodyBgColor'] ) ){
                                                            $row_style .= 'background-color:'.$this->global_styles['bodyBgColor'].';'; 
                                                        }
                                                    }
                                                    $row_style .= 'border-style:'.$row['borderStyle'].';';
                                                    $row_style .= 'border-top-width:'.$row['borderTopWidth'].'px;';
                                                    $row_style .= 'border-right-width:'.$row['borderRightWidth'].'px;';
                                                    $row_style .= 'border-bottom-width:'.$row['borderBottomWidth'].'px;';
                                                    $row_style .= 'border-left-width:'.$row['borderLeftWidth'].'px;';
                                                    $row_style .= 'border-color:'.$row['borderColor'].';';
                                                    $row_style .= 'border-radius:'.$row['borderRadius'].'px;';
                                                    $row_style .= 'padding-top:'.$row['paddingTop'].'px;';
                                                    $row_style .= 'padding-right:'.$row['paddingRight'].'px;';
                                                    $row_style .= 'padding-bottom:'.$row['paddingBottom'].'px;';
                                                    $row_style .= 'padding-left:'.$row['paddingLeft'].'px;'; ?>
                                                    <table style="<?php if($rtl){echo 'direction: rtl;';} ?> <?php echo esc_attr( $row_style ); ?>">
                                                        <tr>
                                                            <?php $col1 = $row['col1'];
                                                            $col1_style = 'width:'.$col1['width'].'%;'; 
                                                            if( ! empty( $col1['bgColor'] ) ){
                                                                $col1_style .= 'background-color:'.$col1['bgColor'].';';
                                                            }
                                                            $col1_style .= 'width:'.$col1['width'].'%;'; 
                                                            $col1_style .= 'border-style:'.$col1['borderStyle'].';';
                                                            $col1_style .= 'border-top-width:'.$col1['borderTopWidth'].'px;';
                                                            $col1_style .= 'border-right-width:'.$col1['borderRightWidth'].'px;';
                                                            $col1_style .= 'border-bottom-width:'.$col1['borderBottomWidth'].'px;';
                                                            $col1_style .= 'border-left-width:'.$col1['borderLeftWidth'].'px;';
                                                            $col1_style .= 'border-color:'.$col1['borderColor'].';';
                                                            $col1_style .= 'border-radius:'.$col1['borderRadius'].'px;';
                                                            $col1_style .= 'padding-top:'.$col1['paddingTop'].'px;';
                                                            $col1_style .= 'padding-right:'.$col1['paddingRight'].'px;';
                                                            $col1_style .= 'padding-bottom:'.$col1['paddingBottom'].'px;';
                                                            $col1_style .= 'padding-left:'.$col1['paddingLeft'].'px;';
                                                            $col1_style .= 'text-align:'.$col1['textAlign'].';'; ?>
                                                            <td style="<?php echo esc_attr( $col1_style ); ?>" valign="top">
                                                                <?php $col1_elems = $col1['elements'];
                                                                if( ! empty( $col1_elems ) ):
                                                                    foreach( $col1_elems as $element ):
                                                                        echo $this->parse_element( $element, $type, $rtl );
                                                                    endforeach;
                                                                endif; ?>
                                                            </td>
                                                            <?php if( $row['layout'] == '1/2' || $row['layout'] == '1/3' || $row['layout'] == '1/4'|| $row['layout'] == '1/5' ):
                                                                $col2 = $row['col2'];
                                                                $col2_style = 'width:'.$col2['width'].'%;';
                                                                if( ! empty( $col2['bgColor'] ) ){
                                                                    $col2_style .= 'background-color:'.$col2['bgColor'].';';
                                                                }
                                                                $col2_style .= 'border-style:'.$col2['borderStyle'].';';
                                                                $col2_style .= 'border-top-width:'.$col2['borderTopWidth'].'px;';
                                                                $col2_style .= 'border-right-width:'.$col2['borderRightWidth'].'px;';
                                                                $col2_style .= 'border-bottom-width:'.$col2['borderBottomWidth'].'px;';
                                                                $col2_style .= 'border-left-width:'.$col2['borderLeftWidth'].'px;';
                                                                $col2_style .= 'border-color:'.$col2['borderColor'].';';
                                                                $col2_style .= 'border-radius:'.$col2['borderRadius'].'px;';
                                                                $col2_style .= 'padding-top:'.$col2['paddingTop'].'px;';
                                                                $col2_style .= 'padding-right:'.$col2['paddingRight'].'px;';
                                                                $col2_style .= 'padding-bottom:'.$col2['paddingBottom'].'px;';
                                                                $col2_style .= 'padding-left:'.$col2['paddingLeft'].'px;';
                                                                $col2_style .= 'text-align:'.$col2['textAlign'].';';
                                                                $col2_elems = $col2['elements']; ?>
                                                                <td style="<?php echo esc_attr( $col2_style ); ?>" valign="top">
                                                                    <?php if( ! empty( $col2_elems ) ):
                                                                        foreach( $col2_elems as $element ):
                                                                            echo $this->parse_element( $element, $type, $rtl );
                                                                        endforeach;
                                                                    endif; ?>
                                                                </td>
                                                            <?php endif; ?>
                                                            <?php if( $row['layout'] == '1/3' || $row['layout'] == '1/4'|| $row['layout'] == '1/5' ):
                                                                $col3 = $row['col3'];
                                                                $col3_style = 'width:'.$col3['width'].'%;';
                                                                if( ! empty( $col3['bgColor'] ) ){
                                                                    $col3_style .= 'background-color:'.$col3['bgColor'].';';
                                                                }
                                                                $col3_style .= 'border-style:'.$col3['borderStyle'].';';
                                                                $col3_style .= 'border-top-width:'.$col3['borderTopWidth'].'px;';
                                                                $col3_style .= 'border-right-width:'.$col3['borderRightWidth'].'px;';
                                                                $col3_style .= 'border-bottom-width:'.$col3['borderBottomWidth'].'px;';
                                                                $col3_style .= 'border-left-width:'.$col3['borderLeftWidth'].'px;';
                                                                $col3_style .= 'border-color:'.$col3['borderColor'].';';
                                                                $col3_style .= 'border-radius:'.$col3['borderRadius'].'px;';
                                                                $col3_style .= 'padding-top:'.$col3['paddingTop'].'px;';
                                                                $col3_style .= 'padding-right:'.$col3['paddingRight'].'px;';
                                                                $col3_style .= 'padding-bottom:'.$col3['paddingBottom'].'px;';
                                                                $col3_style .= 'padding-left:'.$col3['paddingLeft'].'px;';
                                                                $col3_style .= 'text-align:'.$col3['textAlign'].';';
                                                                $col3_elems = $col3['elements']; ?>
                                                                <td style="<?php echo esc_attr( $col3_style ); ?>" valign="top">
                                                                    <?php if( ! empty( $col3_elems ) ):
                                                                        foreach( $col3_elems as $element ):
                                                                            echo $this->parse_element( $element, $type, $rtl );
                                                                        endforeach;
                                                                    endif; ?>
                                                                </td>
                                                            <?php endif; ?>
                                                            <?php if( $row['layout'] == '1/4'|| $row['layout'] == '1/5' ):
                                                                $col4 = $row['col4'];
                                                                $col4_style = 'width:'.$col4['width'].'%;';
                                                                if( ! empty( $col4['bgColor'] ) ){
                                                                    $col4_style .= 'background-color:'.$col4['bgColor'].';';
                                                                }
                                                                $col4_style .= 'border-style:'.$col4['borderStyle'].';';
                                                                $col4_style .= 'border-top-width:'.$col4['borderTopWidth'].'px;';
                                                                $col4_style .= 'border-right-width:'.$col4['borderRightWidth'].'px;';
                                                                $col4_style .= 'border-bottom-width:'.$col4['borderBottomWidth'].'px;';
                                                                $col4_style .= 'border-left-width:'.$col4['borderLeftWidth'].'px;';
                                                                $col4_style .= 'border-color:'.$col4['borderColor'].';';
                                                                $col4_style .= 'border-radius:'.$col4['borderRadius'].'px;';
                                                                $col4_style .= 'padding-top:'.$col4['paddingTop'].'px;';
                                                                $col4_style .= 'padding-right:'.$col4['paddingRight'].'px;';
                                                                $col4_style .= 'padding-bottom:'.$col4['paddingBottom'].'px;';
                                                                $col4_style .= 'padding-left:'.$col4['paddingLeft'].'px;';
                                                                $col4_style .= 'text-align:'.$col4['textAlign'].';';
                                                                $col4_elems = $col4['elements']; ?>
                                                                <td style="<?php echo esc_attr( $col4_style ); ?>" valign="top">
                                                                    <?php if( ! empty( $col4_elems ) ):
                                                                        foreach( $col4_elems as $element ):
                                                                            echo $this->parse_element( $element, $type, $rtl );
                                                                        endforeach;
                                                                    endif; ?>
                                                                </td>
                                                            <?php endif; ?>
                                                            <?php if( $row['layout'] == '1/5' ):
                                                                $col5 = $row['col5'];
                                                                $col5_style = 'width:'.$col5['width'].'%;';
                                                                if( ! empty( $col5['bgColor'] ) ){
                                                                    $col5_style .= 'background-color:'.$col5['bgColor'].';';
                                                                }
                                                                $col5_style .= 'border-style:'.$col5['borderStyle'].';';
                                                                $col5_style .= 'border-top-width:'.$col5['borderTopWidth'].'px;';
                                                                $col5_style .= 'border-right-width:'.$col5['borderRightWidth'].'px;';
                                                                $col5_style .= 'border-bottom-width:'.$col5['borderBottomWidth'].'px;';
                                                                $col5_style .= 'border-left-width:'.$col5['borderLeftWidth'].'px;';
                                                                $col5_style .= 'border-color:'.$col5['borderColor'].';';
                                                                $col5_style .= 'border-radius:'.$col5['borderRadius'].'px;';
                                                                $col5_style .= 'padding-top:'.$col5['paddingTop'].'px;';
                                                                $col5_style .= 'padding-right:'.$col5['paddingRight'].'px;';
                                                                $col5_style .= 'padding-bottom:'.$col5['paddingBottom'].'px;';
                                                                $col5_style .= 'padding-left:'.$col5['paddingLeft'].'px;';
                                                                $col5_style .= 'text-align:'.$col5['textAlign'].';';
                                                                $col5_elems = $col5['elements']; ?>
                                                                <td style="<?php echo esc_attr( $col5_style ); ?>" valign="top">
                                                                    <?php if( ! empty( $col5_elems ) ):
                                                                        foreach( $col5_elems as $element ):
                                                                            echo $this->parse_element( $element, $type, $rtl );
                                                                        endforeach;
                                                                    endif; ?>
                                                                </td>
                                                            <?php endif; ?>
                                                        </tr>
                                                    </table>
                                                <?php endforeach; ?>
                                            </td>
                                         </tr>
                                    </tbody>
                                <?php endif; ?>
                            </table>
                        </td>
                    </tr>
                </table>
            </body>
        </html>
        <?php $html = ob_get_contents();
	    ob_end_clean();

        return $html;
    }

    /**
     * Handling element parsing
    */
    public function parse_element( $element, $type, $rtl = false )
    {
        if( $element['id'] == 'header' ):
            $wrap_style = 'width:'.$element['width'].'%;'; 
            if( ! empty( $element['bgColor'] ) ){
                $wrap_style .= 'background-color:'.$element['bgColor'].';';
            } else {
                if( ! empty( $this->global_styles['headerBgColor'] ) ){
                    $wrap_style .= 'background-color:'.$this->global_styles['headerBgColor'].';';
                }
            }
            $wrap_style .= 'border-style:'.$element['borderStyle'].';';
            $wrap_style .= 'border-top-width:'.$element['borderTopWidth'].'px;';
            $wrap_style .= 'border-right-width:'.$element['borderRightWidth'].'px;';
            $wrap_style .= 'border-bottom-width:'.$element['borderBottomWidth'].'px;';
            $wrap_style .= 'border-left-width:'.$element['borderLeftWidth'].'px;';
            $wrap_style .= 'border-color:'.$element['borderColor'].';';
            $wrap_style .= 'padding-top:'.$element['paddingTop'].'px;';
            $wrap_style .= 'padding-right:'.$element['paddingRight'].'px;';
            $wrap_style .= 'padding-bottom:'.$element['paddingBottom'].'px;';
            $wrap_style .= 'padding-left:'.$element['paddingLeft'].'px;';
            $parsed_elem = '<div style="'.esc_attr( $wrap_style ).'">';
                $element_style = 'font-family:'.$element['fontFamily'].';';
                $element_style .= 'font-style:'.$element['fontStyle'].';';
                $element_style .= 'font-weight:'.$element['fontWeight'].';';
                $element_style .= 'font-size:'.$element['fontSize'].'px;';
                $element_style .= 'line-height:'.$element['lineHeight'].'px;';
                $element_style .= 'text-align:'.$element['textAlign'].';';
                if( ! empty( $element['textColor'] ) ){
                    $element_style .= 'color:'.$element['textColor'].';';
                } else {
                    if( ! empty( $this->global_styles['headerTextColor'] ) ){
                        $element_style .= 'color:'.$this->global_styles['headerTextColor'].';';
                    }
                }
                $element_style .= 'margin: 0;';
                $parsed_elem .= '<h1 style="'.esc_attr( $element_style ).'">';
                if( $type == 'preview' || $type == 'testmail' ){
                    $parsed_elem .= $this->replace_preview_placeholder_data( $element['content'] );
                } else {
                    $parsed_elem .= $this->replace_placeholder_data( $element['content'] );
                }
                $parsed_elem .= '</h1>';
            $parsed_elem .= '</div>';

            return $parsed_elem;
        endif;

        if( $element['id'] == 'textEditor' ):
            $wrap_style = '';
            if( $element['width'] != '' ){
                $wrap_style .= 'width:'.$element['width'].( ( $element['width'] != 'auto' ) ? '%;' : ';' ); 
            }

            if( $element['height'] != '' ){
                $wrap_style .= 'height:'.$element['height'].( ( $element['height'] != 'auto' ) ? '%;' : ';' ); 
            }

            $wrap_style .= 'color:'.$this->global_styles['textColor'].';';

            $parsed_elem = '<div style="'.esc_attr( $wrap_style ).'">';
                if( $type == 'preview' || $type == 'testmail' ){
                    $parsed_elem .= $this->replace_preview_placeholder_data( $element['content'] );
                } else {
                    $parsed_elem .= $this->replace_placeholder_data( $element['content'] );
                }
            $parsed_elem .= '</div>';

            return $parsed_elem;
        endif;

        if( $element['id'] == 'image' ):
            $wrap_style = 'text-align:'.$element['align'].';';
            if( $element['bgColor'] != '' ){
                $wrap_style .= 'background-color:'.$element['bgColor'].';'; 
            }

            $parsed_elem = '<div style="'.esc_attr( $wrap_style ).'">';
                $element_style = 'width:'.$element['width'].( ( $element['width'] != 'auto' ) ? 'px;' : ';' );
                $element_style .= 'height:'.$element['height'].( ( $element['height'] != 'auto' ) ? 'px;' : ';' );
                $parsed_elem .= '<img src="'.esc_url( $element['url'] ).'" alt="'.esc_attr( $element['title'] ).'" style="'.esc_attr( $element_style ).'" />';
            $parsed_elem .= '</div>';

            return $parsed_elem;
        endif;

        if( $element['id'] == 'gif' ):
            $wrap_style = 'text-align:'.$element['align'].';';
            if( $element['bgColor'] != '' ){
                $wrap_style .= 'background-color:'.$element['bgColor'].';'; 
            }

            $parsed_elem = '<div style="'.esc_attr( $wrap_style ).'">';
                $element_style = 'width:'.$element['width'].( ( $element['width'] != 'auto' ) ? 'px;' : ';' );
                $element_style .= 'height:'.$element['height'].( ( $element['height'] != 'auto' ) ? 'px;' : ';' );
                $parsed_elem .= '<img src="'.esc_url( $element['url']).'" alt="'.esc_attr( $element['title'] ).'" style="'.esc_attr( $element_style ).'" />';
            $parsed_elem .= '</div>';

            return $parsed_elem;
        endif;

        if( $element['id'] == 'divider' ):
            $wrap_style = 'text-align:'.$element['align'].';';
            $wrap_style .= 'padding-top:'.$element['paddingTop'].'px;';
            $wrap_style .= 'padding-right:'.$element['paddingRight'].'px;';
            $wrap_style .= 'padding-bottom:'.$element['paddingBottom'].'px;';
            $wrap_style .= 'padding-left:'.$element['paddingLeft'].'px;';
            $wrap_style .= 'margin-top:'.$element['marginTop'].'px;';
            $wrap_style .= 'margin-right:'.$element['marginRight'].'px;';
            $wrap_style .= 'margin-bottom:'.$element['marginBottom'].'px;';
            $wrap_style .= 'margin-left:'.$element['marginLeft'].'px;';

            $parsed_elem = '<div style="'.esc_attr( $wrap_style ).'">';
                $element_style = 'display: inline-block;';
                $element_style .= 'margin: 0px;';
                $element_style .= 'padding: 0px;';
                $element_style .= 'line-height: 0;';
                $element_style .= 'width:'.$element['width'].'%;';
                $element_style .= 'border-width:'.$element['height'].'px 0 0;';
                $element_style .= 'border-style:'.$element['type'].';';
                $element_style .= 'border-color:'.$element['color'].';';
                $parsed_elem .= '<hr style="'.esc_attr( $element_style ).'">';
            $parsed_elem .= '</div>';

            return $parsed_elem;
        endif;

        if( $element['id'] == 'gap' ):
            $wrap_style = 'width: 100%;';

            $parsed_elem = '<div style="'.esc_attr( $wrap_style ).'">';
                $element_style = 'display: inline-block;';
                $element_style .= 'width:100%;';
                $element_style .= 'height:'.$element['height'].'px;';
                $element_style .= 'border-top-width:'.$element['borderTopWidth'].'px;';
                $element_style .= 'border-right-width:'.$element['borderRightWidth'].'px;';
                $element_style .= 'border-bottom-width:'.$element['borderBottomWidth'].'px;';
                $element_style .= 'border-left-width:'.$element['borderLeftWidth'].'px;';
                $element_style .= 'border-style:'.$element['borderStyle'].';';
                if( $element['borderColor'] != '' ){
                    $element_style .= 'border-color:'.$element['borderColor'].';';
                }
                if( $element['bgColor'] != '' ){
                    $element_style .= 'background-color:'.$element['bgColor'].';'; 
                }
                $parsed_elem .= '<span style="'.esc_attr( $element_style ).'"></span>';
            $parsed_elem .= '</div>';

            return $parsed_elem;
        endif;

        if( $element['id'] == 'button' ):
            $wrap_style = 'text-align:'.$element['align'].';';
            $wrap_style .= 'margin-top:'.$element['marginTop'].'px;';
            $wrap_style .= 'margin-right:'.$element['marginRight'].'px;';
            $wrap_style .= 'margin-bottom:'.$element['marginBottom'].'px;';
            $wrap_style .= 'margin-left:'.$element['marginLeft'].'px;';

            $parsed_elem = '<div style="'.esc_attr( $wrap_style ).'">';
                $element_style = 'display: inline-block; text-decoration: none;';
                if( ! empty( $element['bgColor'] ) ){
                    $element_style .= 'background-color:'.$element['bgColor'].';';
                } else {
                    if( ! empty( $this->global_styles['buttonBgColor'] ) ) {
                        $element_style .= 'background-color:'.$this->global_styles['buttonBgColor'].';';
                    }
                }
                $element_style .= 'padding-top:'.$element['paddingTop'].'px;';
                $element_style .= 'padding-right:'.$element['paddingRight'].'px;';
                $element_style .= 'padding-bottom:'.$element['paddingBottom'].'px;';
                $element_style .= 'padding-left:'.$element['paddingLeft'].'px;';
                $element_style .= 'width:'.$element['width'].'px;';
                $element_style .= 'height:'.$element['height'].'px;';
                $element_style .= 'border-top-width:'.$element['borderTopWidth'].'px;';
                $element_style .= 'border-right-width:'.$element['borderRightWidth'].'px;';
                $element_style .= 'border-bottom-width:'.$element['borderBottomWidth'].'px;';
                $element_style .= 'border-left-width:'.$element['borderLeftWidth'].'px;';
                $element_style .= 'border-style:'.$element['borderStyle'].';';
                if( ! empty( $element['borderColor'] ) ) {
                    $element_style .= 'border-color:'.$element['borderColor'].';';
                } else {
                    if( ! empty( $this->global_styles['buttonBorderColor'] ) ){
                        $element_style .= 'border-color:'.$this->global_styles['buttonBorderColor'].';';
                    }
                }
                $element_style .= 'border-radius:'.$element['borderRadius'].'px;';
                $element_style .= 'font-family:'.$element['fontFamily'].';';
                $element_style .= 'font-style:'.$element['fontStyle'].';';
                $element_style .= 'font-weight:'.$element['fontWeight'].';';
                $element_style .= 'font-size:'.$element['fontSize'].'px;';
                $element_style .= 'line-height:'.$element['lineHeight'].'px;';
                $element_style .= 'text-align:'.$element['textAlign'].';';
                if( ! empty( $element['textColor'] ) ){
                    $element_style .= 'color:'.$element['textColor'].';';
                } else {
                    if( ! empty( $this->global_styles['buttonTxtColor'] ) ){
                        $element_style .= 'color:'.$this->global_styles['buttonTxtColor'].';';
                    }
                }
                $parsed_elem .= '<a href="'.esc_url( $element['url'] ).'" target="_blank" style="'.esc_attr( $element_style ).'">'.esc_html( $element['text'] ).'</a>';
            $parsed_elem .= '</div>';

            return $parsed_elem;
        endif;

        if( $element['id'] == 'orderDetails' ):
            $wrap_style = 'padding-top:'.$element['paddingTop'].'px;';
            $wrap_style .= 'padding-right:'.$element['paddingRight'].'px;';
            $wrap_style .= 'padding-bottom:'.$element['paddingBottom'].'px;';
            $wrap_style .= 'padding-left:'.$element['paddingLeft'].'px;';
            $parsed_elem = '<div style="'.esc_attr( $wrap_style ).'">';
                $heading_color = '';
                if( ! empty( $element['headingTextColor'] ) ){
                    $heading_color = $element['headingTextColor'];
                } else {
                    if( ! empty( $this->global_styles['headingColor'] ) ){
                        $heading_color = $this->global_styles['headingColor'];
                    }
                }
                $elem_head_style = 'font-family:'.$element['headingFontFamily'].';';
                $elem_head_style .= 'font-style:'.$element['headingFontStyle'].';';
                $elem_head_style .= 'font-weight:'.$element['headingFontWeight'].';';
                $elem_head_style .= 'font-size:'.$element['headingFontSize'].'px;';
                $elem_head_style .= 'line-height:'.$element['headingLineHeight'].'px;';
                $elem_head_style .= 'text-align:'.$element['headingTextAlign'].';';
                $elem_head_style .= 'color:'.$heading_color.';';
                $elem_head_style .= 'margin: 0 0 '.$element['headerMarginBottom'].'px;';
                // element
                if( $type == 'preview' || $type == 'testmail' ){
                    $parsed_elem .= '<h2 style="'.esc_attr( $elem_head_style ).'"><a href="#" target="_blank" style="color:'.$heading_color.'">'.__('[Order #194]', 'email-customizer-and-designer-for-woocommerce').'</a> '.__('(January 24, 2022)', 'email-customizer-and-designer-for-woocommerce').'</h2>';
                } else {
                    $parsed_elem .= $this->get_order_table_title( $elem_head_style, $heading_color );
                }
                $table_style = 'width: 100%;';
                if( ! empty( $element['tableBgColor'] ) ){
                    $table_style .= 'background-color:'.$element['tableBgColor'].';';
                } else {
                    if( ! empty( $this->global_styles['tableBgColor'] ) ){
                        $table_style .= 'background-color:'.$this->global_styles['tableBgColor'].';';
                    }
                }
                $table_style .= 'font-family:'.$element['fontFamily'].';';
                $table_style .= 'font-style:'.$element['fontStyle'].';';
                $table_style .= 'font-weight:'.$element['fontWeight'].';';
                $table_style .= 'font-size:'.$element['fontSize'].'px;';
                $table_style .= 'line-height:'.$element['lineHeight'].'px;';
                $table_style .= 'text-align:'.$element['textAlign'].';';
                if( ! empty( $element['textColor'] ) ){
                    $table_style .= 'color:'.$element['textColor'].';';
                } else {
                    if( ! empty( $this->global_styles['tableTdColor'] ) ){
                        $table_style .= 'color:'.$this->global_styles['tableTdColor'].';';
                    }
                }
                $table_style .= 'border-collapse: separate;';
                $table_style .= 'border-style: '.$element['tableBorderStyle'].';';
                $table_style .= 'border-width: '.$element['tableBorderWidth'].'px;';
                if( ! empty( $element['tableBorderColor'] ) ){
                    $table_style .= 'border-color: '.$element['tableBorderColor'].';';
                } else {
                    if( ! empty( $this->global_styles['tableBorderColor'] ) ){
                        $table_style .= 'border-color: '.$this->global_styles['tableBorderColor'].';';
                    }
                }
                // element
                $parsed_elem .= '<table cellspacing="0" cellpadding="0" border="0" style="'.esc_attr( $table_style ).'">';
                    $table_th_style = 'font-weight:'.$element['tableHeadWeight'].';';
                    $table_th_style .= 'font-family:'.$element['fontFamily'].';';
                    if( ! empty( $element['tableHeadColor'] ) ){
                        $table_th_style .= 'color:'.$element['tableHeadColor'].';';
                    } else {
                        if( ! empty( $this->global_styles['tableThColor'] ) ){
                            $table_th_style .= 'color:'.$this->global_styles['tableThColor'].';';
                        }
                    }
                    $table_th_style .= 'border-top-width: 0px;';
                    $table_th_style .= 'border-right-width: '.$element['tableBorderWidth'].'px;';
                    $table_th_style .= 'border-bottom-width: '.$element['tableBorderWidth'].'px;';
                    $table_th_style .= 'border-left-width: 0px;';
                    $table_th_style .= 'border-style: '.$element['tableBorderStyle'].';';
                    if( ! empty( $element['tableBorderColor'] ) ){
                        $table_th_style .= 'border-color: '.$element['tableBorderColor'].';';
                    } else {
                        if( ! empty( $this->global_styles['tableBorderColor'] ) ){
                            $table_th_style .= 'border-color: '.$this->global_styles['tableBorderColor'].';';
                        }
                    }
                    $table_th_style .= 'padding-top:'.$element['cellPaddingTop'].'px;';
                    $table_th_style .= 'padding-right:'.$element['cellPaddingRight'].'px;';
                    $table_th_style .= 'padding-bottom:'.$element['cellPaddingBottom'].'px;';
                    $table_th_style .= 'padding-left:'.$element['cellPaddingLeft'].'px;';
                    // td style
                    $table_td_style = 'font-family:'.$element['fontFamily'].';';
                    $table_td_style .= 'border-top-width: 0px;';
                    $table_td_style .= 'border-right-width: '.$element['tableBorderWidth'].'px;';
                    $table_td_style .= 'border-bottom-width: '.$element['tableBorderWidth'].'px;';
                    $table_td_style .= 'border-left-width: 0px;';
                    $table_td_style .= 'border-style: '.$element['tableBorderStyle'].';';
                    if( ! empty( $element['tableBorderColor'] ) ){
                        $table_td_style .= 'border-color: '.$element['tableBorderColor'].';';
                    } else {
                        if( ! empty( $this->global_styles['tableBorderColor'] ) ){
                            $table_td_style .= 'border-color: '.$this->global_styles['tableBorderColor'].';';
                        }
                    }
                    $table_td_style .= 'padding-top:'.$element['cellPaddingTop'].'px;';
                    $table_td_style .= 'padding-right:'.$element['cellPaddingRight'].'px;';
                    $table_td_style .= 'padding-bottom:'.$element['cellPaddingBottom'].'px;';
                    $table_td_style .= 'padding-left:'.$element['cellPaddingLeft'].'px;';
                    // rtl styles
                    $first_col_style = '';
                    if($rtl){
                        $first_col_style = 'border-right:0;';
                    }

                    $last_col_style = 'border-right:0;';
                    if($rtl){
                        $last_col_style = '';
                    }
                    $parsed_elem .= '<thead>';
                        $parsed_elem .= '<tr>';
                            $parsed_elem .= '<th scope="col" style="'.esc_attr( $table_th_style ).esc_attr( $first_col_style ).'">'.__('Product', 'email-customizer-and-designer-for-woocommerce').'</th>';
                            $parsed_elem .= '<th scope="col" style="'.esc_attr( $table_th_style ).'">'.__('Quantity', 'email-customizer-and-designer-for-woocommerce').'</th>';
                            $parsed_elem .= '<th scope="col" style="'.esc_attr( $table_th_style ).esc_attr( $last_col_style ).'">'.__('Price', 'email-customizer-and-designer-for-woocommerce').'</th>';
                        $parsed_elem .= '</tr>';
                    $parsed_elem .= '</thead>';
                    $parsed_elem .= '<tbody>';
                        if( $type == 'preview' || $type == 'testmail' ){
                            $parsed_elem .= '<tr>';
                                $parsed_elem .= '<td style="'.esc_attr( $table_td_style ).esc_attr( $first_col_style ).'">'.__('Beanie', 'email-customizer-and-designer-for-woocommerce').'</td>';
                                $parsed_elem .= '<td style="'.esc_attr( $table_td_style ).'">'.__('3', 'email-customizer-and-designer-for-woocommerce').'</td>';
                                $parsed_elem .= '<td style="'.esc_attr( $table_td_style ).esc_attr( $last_col_style ).'">'.__('₹54', 'email-customizer-and-designer-for-woocommerce').'</td>';
                            $parsed_elem .= '</tr>';
                            $parsed_elem .= '<tr>';
                                $parsed_elem .= '<td style="'.esc_attr( $table_td_style ).esc_attr( $first_col_style ).'">'.__('Cap', 'email-customizer-and-designer-for-woocommerce').'</td>';
                                $parsed_elem .= '<td style="'.esc_attr( $table_td_style ).'">'.__('1', 'email-customizer-and-designer-for-woocommerce').'</td>';
                                $parsed_elem .= '<td style="'.esc_attr( $table_td_style ).esc_attr( $last_col_style ).'">'.__('₹16', 'email-customizer-and-designer-for-woocommerce').'</td>';
                            $parsed_elem .= '</tr>';
                            $parsed_elem .= '<tr>';
                                $parsed_elem .= '<td style="'.esc_attr( $table_td_style ).esc_attr( $first_col_style ).'">'.__('Woo Album', 'email-customizer-and-designer-for-woocommerce').'</td>';
                                $parsed_elem .= '<td style="'.esc_attr( $table_td_style ).'">'.__('1', 'email-customizer-and-designer-for-woocommerce').'</td>';
                                $parsed_elem .= '<td style="'.esc_attr( $table_td_style ).esc_attr( $last_col_style ).'">'.__('₹55', 'email-customizer-and-designer-for-woocommerce').'</td>';
                            $parsed_elem .= '</tr>';
                            $parsed_elem .= '<tr>';
                                $parsed_elem .= '<td style="'.esc_attr( $table_td_style ).esc_attr( $first_col_style ).'">'.__('free product', 'email-customizer-and-designer-for-woocommerce').'</td>';
                                $parsed_elem .= '<td style="'.esc_attr( $table_td_style ).'">'.__('1', 'email-customizer-and-designer-for-woocommerce').'</td>';
                                $parsed_elem .= '<td style="'.esc_attr( $table_td_style ).esc_attr( $last_col_style ).'">'.__('₹0', 'email-customizer-and-designer-for-woocommerce').'</td>';
                            $parsed_elem .= '</tr>';
                        } else {
                            $parsed_elem .= $this->get_order_table_product_data( $table_td_style, $rtl );
                        }
                    $parsed_elem .= '</tbody>';
                    $parsed_elem .= '<tfoot>';
                        if( $type == 'preview' || $type == 'testmail' ){
                            $parsed_elem .= '<tr>';
                                $parsed_elem .= '<th scope="row" colspan="2" style="'.esc_attr( $table_th_style ).esc_attr( $first_col_style ).'">'.__('Subtotal:', 'email-customizer-and-designer-for-woocommerce').'</th>';
                                $parsed_elem .= '<td style="'.esc_attr( $table_td_style ).esc_attr( $last_col_style ).'">'.__('₹125', 'email-customizer-and-designer-for-woocommerce').'</td>';
                            $parsed_elem .= '</tr>';
                            $parsed_elem .= '<tr>';
                                $parsed_elem .= '<th scope="row" colspan="2" style="'.esc_attr( $table_th_style ).esc_attr( $first_col_style ).'">'.__('Shipping:', 'email-customizer-and-designer-for-woocommerce').'</th>';
                                $parsed_elem .= '<td style="'.esc_attr( $table_td_style ).esc_attr( $last_col_style ).'">'.__('Free shipping', 'email-customizer-and-designer-for-woocommerce').'</td>';
                            $parsed_elem .= '</tr>';
                            $parsed_elem .= '<tr>';
                                $parsed_elem .= '<th scope="row" colspan="2" style="'.esc_attr( $table_th_style ).esc_attr( $first_col_style ).'">'.__('SGST:', 'email-customizer-and-designer-for-woocommerce').'</th>';
                                $parsed_elem .= '<td style="'.esc_attr( $table_td_style ).esc_attr( $last_col_style ).'">'.__('₹7', 'email-customizer-and-designer-for-woocommerce').'</td>';
                            $parsed_elem .= '</tr>';
                            $parsed_elem .= '<tr>';
                                $parsed_elem .= '<th scope="row" colspan="2" style="'.$table_th_style.$first_col_style.'">'.__('CGST:', 'email-customizer-and-designer-for-woocommerce').'</th>';
                                $parsed_elem .= '<td style="'.esc_attr( $table_td_style ).esc_attr( $last_col_style ).'">'.__('₹14', 'email-customizer-and-designer-for-woocommerce').'</td>';
                            $parsed_elem .= '</tr>';
                            $parsed_elem .= '<tr>';
                                $parsed_elem .= '<th scope="row" colspan="2" style="'.esc_attr( $table_th_style ).esc_attr( $first_col_style ).'">'.__('Payment method:', 'email-customizer-and-designer-for-woocommerce').'</th>';
                                $parsed_elem .= '<td style="'.esc_attr( $table_td_style ).esc_attr( $last_col_style ).'">'.__('Cash on delivery', 'email-customizer-and-designer-for-woocommerce').'</td>';
                            $parsed_elem .= '</tr>';
                            $parsed_elem .= '<tr>';
                                $parsed_elem .= '<th scope="row" colspan="2" style="'.esc_attr( $table_th_style ).esc_attr( $first_col_style ).' border-bottom: 0;">Total:</th>';
                                $parsed_elem .= '<td style="'.esc_attr( $table_td_style ).esc_attr( $last_col_style ).' border-bottom: 0;">'.__('₹146', 'email-customizer-and-designer-for-woocommerce').'</td>';
                            $parsed_elem .= '</tr>';
                        } else {
                            $parsed_elem .= $this->get_order_table_total_rows( $table_td_style, $table_th_style, $rtl );
                        }
                    $parsed_elem .= '</tfoot>';
                $parsed_elem .= '</table>';
                
            $parsed_elem .= '</div>';

            return $parsed_elem;
        endif;

        if( $element['id'] == 'social' ):
            $wrap_style = 'text-align:'.$element['align'].';';
            $wrap_style .= 'padding-top:'.$element['paddingTop'].'px;';
            $wrap_style .= 'padding-right:'.$element['paddingRight'].'px;';
            $wrap_style .= 'padding-bottom:'.$element['paddingBottom'].'px;';
            $wrap_style .= 'padding-left:'.$element['paddingLeft'].'px;';
            if( $element['bgColor'] != '' ){
                $wrap_style .= 'background-color:'.$element['bgColor'].';';
            }
            $parsed_elem = '<div style="'.esc_attr( $wrap_style ).'">';
                $element_style = 'display: inline-block; text-decoration: none;';
                $element_style .= 'width:'.$element['iconWidth'].'px;';
                $element_style .= 'height:'.$element['iconHeight'].'px;';
                $element_style .= 'margin-top:'.$element['marginTop'].'px;';
                $element_style .= 'margin-right:'.$element['marginRight'].'px;';
                $element_style .= 'margin-bottom:'.$element['marginBottom'].'px;';
                $element_style .= 'margin-left:'.$element['marginLeft'].'px;';
                if( $element['fbURL'] != '' ) {
                    $parsed_elem .= '<a href="'.$element['fbURL'].'" target="_blank" style="'.esc_attr( $element_style ).'">';
                        $parsed_elem .= '<img src="'.$this->assets_url.'images/facebook.png" alt="facebook" style="width: 100%; max-height: 100%; margin: 0;" />';
                    $parsed_elem .= '</a>';
                }
                if( $element['twitterURL'] != '' ) {
                    $parsed_elem .= '<a href="'.$element['twitterURL'].'" target="_blank" style="'.esc_attr( $element_style ).'">';
                        $parsed_elem .= '<img src="'.$this->assets_url.'images/twitter.png" alt="twitter" style="width: 100%; max-height: 100%; margin: 0;" />';
                    $parsed_elem .= '</a>';
                }
                if( $element['youtubeURL'] != '' ) {
                    $parsed_elem .= '<a href="'.$element['youtubeURL'].'" target="_blank" style="'.esc_attr( $element_style ).'">';
                        $parsed_elem .= '<img src="'.$this->assets_url.'images/youtube.png" alt="youtube" style="width: 100%; max-height: 100%; margin: 0;" />';
                    $parsed_elem .= '</a>';
                }
                if( $element['linkedinURL'] != '' ) {
                    $parsed_elem .= '<a href="'.$element['linkedinURL'].'" target="_blank" style="'.esc_attr( $element_style ).'">';
                        $parsed_elem .= '<img src="'.$this->assets_url.'images/linkedin.png" alt="linkedin" style="width: 100%; max-height: 100%; margin: 0;" />';
                    $parsed_elem .= '</a>';
                }
                if( $element['instagramURL'] != '' ) {
                    $parsed_elem .= '<a href="'.$element['instagramURL'].'" target="_blank" style="'.esc_attr( $element_style ).'">';
                        $parsed_elem .= '<img src="'.$this->assets_url.'images/instagram.png" alt="instagram" style="width: 100%; max-height: 100%; margin: 0;" />';
                    $parsed_elem .= '</a>';
                }
                if( $element['pinterestURL'] != '' ) {
                    $parsed_elem .= '<a href="'.$element['pinterestURL'].'" target="_blank" style="'.$element_style.'">';
                        $parsed_elem .= '<img src="'.$this->assets_url.'images/pinterest.png" alt="pinterest" style="width: 100%; max-height: 100%; margin: 0;" />';
                    $parsed_elem .= '</a>';
                }
                if( $element['gmailURL'] != '' ) {
                    $parsed_elem .= '<a href="'.$element['gmailURL'].'" target="_blank" style="'.esc_attr( $element_style ).'">';
                        $parsed_elem .= '<img src="'.$this->assets_url.'images/gmail.png" alt="gmail" style="width: 100%; max-height: 100%; margin: 0;" />';
                    $parsed_elem .= '</a>';
                }
            $parsed_elem .= '</div>';

            return $parsed_elem;
        endif;

        if( $element['id'] == 'billingDetails' ):
            $wrap_style = 'padding-top:'.$element['paddingTop'].'px;';
            $wrap_style .= 'padding-right:'.$element['paddingRight'].'px;';
            $wrap_style .= 'padding-bottom:'.$element['paddingBottom'].'px;';
            $wrap_style .= 'padding-left:'.$element['paddingLeft'].'px;';
            if( ! empty( $element['bgColor'] ) ){
                $wrap_style .= 'background-color:'.$element['bgColor'].';';
            }
            $wrap_style .= 'border-top-width:'.$element['borderTopWidth'].'px;';
            $wrap_style .= 'border-right-width:'.$element['borderRightWidth'].'px;';
            $wrap_style .= 'border-bottom-width:'.$element['borderBottomWidth'].'px;';
            $wrap_style .= 'border-left-width:'.$element['borderLeftWidth'].'px;';
            $wrap_style .= 'border-style:'.$element['borderStyle'].';';
            $wrap_style .= 'border-color:'.$element['borderColor'].';';

            $parsed_elem = '<div style="'.esc_attr( $wrap_style ).'">';
                $heading_style = 'font-family:'.$element['headingFontFamily'].';';
                $heading_style .= 'font-style:'.$element['headingFontStyle'].';';
                $heading_style .= 'font-weight:'.$element['headingFontWeight'].';';
                $heading_style .= 'font-size:'.$element['headingFontSize'].'px;';
                $heading_style .= 'line-height:'.$element['headingLineHeight'].'px;';
                $heading_style .= 'text-align:'.$element['headingTextAlign'].';';
                if( ! empty( $element['headingTextColor'] ) ){
                    $heading_style .= 'color:'.$element['headingTextColor'].';';
                } else {
                    if( ! empty( $this->global_styles['headingColor'] ) ){
                        $heading_style .= 'color:'.$this->global_styles['headingColor'].';';
                    }
                }
                $heading_style .= 'margin: 0 0 '.$element['headerMarginBottom'].'px;';
                // content style
                $element_style = 'font-family:'.$element['fontFamily'].';';
                $element_style .= 'font-style:'.$element['fontStyle'].';';
                $element_style .= 'font-weight:'.$element['fontWeight'].';';
                $element_style .= 'font-size:'.$element['fontSize'].'px;';
                $element_style .= 'line-height:'.$element['lineHeight'].'px;';
                if( ! empty( $element['textColor'] ) ){
                    $element_style .= 'color:'.$element['textColor'].';';
                } else {
                    if( ! empty( $this->global_styles['textColor'] ) ){
                        $element_style .= 'color:'.$this->global_styles['textColor'].';';
                    }
                }
                $element_style .= 'text-align:'.$element['textAlign'].';';
                $element_style .= 'margin:0;padding:0;';
                $parsed_elem .= '<h4 style="'.esc_attr( $heading_style ).'">'.esc_html( $element['title'] ).'</h4>';
                $parsed_elem .= '<p style="'.esc_attr( $element_style ).'">';
                    // link color
                    $link_color = '';
                    if( ! empty( $element['linkColor'] ) ){
                        $link_color = $element['linkColor'];
                    } else {
                        if( ! empty( $this->global_styles['linkColor'] ) ){
                            $link_color = $this->global_styles['linkColor'];
                        }
                    }
                    if( $type == 'preview' || $type == 'testmail' ){
                        $parsed_elem .= __('My company', 'email-customizer-and-designer-for-woocommerce').' <br />';
                        $parsed_elem .= __('John Doe', 'email-customizer-and-designer-for-woocommerce').' <br />';
                        $parsed_elem .= __('286 Mill Pond St.', 'email-customizer-and-designer-for-woocommerce').' <br />';
                        $parsed_elem .= __('Millville, NJ', 'email-customizer-and-designer-for-woocommerce').' <br />';
                        $parsed_elem .= __('New Rochelle, 10583', 'email-customizer-and-designer-for-woocommerce').' <br />';
                        $parsed_elem .= __('New York, USA', 'email-customizer-and-designer-for-woocommerce').' <br />';
                        $parsed_elem .= '<a href="tel:+1-541-754-3010" style="font-family:'.$element['fontFamily'].'; color:'.$link_color.';">'.__('+1-541-754-3010', 'email-customizer-and-designer-for-woocommerce').'</a> <br />';
                        $parsed_elem .= '<a href="mailto:johndoe@exmple.com" style="font-family:'.$element['fontFamily'].'; color:'.$link_color.';">'.__('johndoe@exmple.com', 'email-customizer-and-designer-for-woocommerce').'</a>';
                    } else {
                        $parsed_elem .= $this->get_billing_details( $link_color, $element['fontFamily'] );
                    }
                $parsed_elem .= '</p>';
            $parsed_elem .= '</div>';

            return $parsed_elem;

        endif;

        if( $element['id'] == 'shippingDetails' ):
            $wrap_style = 'padding-top:'.$element['paddingTop'].'px;';
            $wrap_style .= 'padding-right:'.$element['paddingRight'].'px;';
            $wrap_style .= 'padding-bottom:'.$element['paddingBottom'].'px;';
            $wrap_style .= 'padding-left:'.$element['paddingLeft'].'px;';
            if( ! empty( $element['bgColor'] ) ){
                $wrap_style .= 'background-color:'.$element['bgColor'].';';
            }
            $wrap_style .= 'border-top-width:'.$element['borderTopWidth'].'px;';
            $wrap_style .= 'border-right-width:'.$element['borderRightWidth'].'px;';
            $wrap_style .= 'border-bottom-width:'.$element['borderBottomWidth'].'px;';
            $wrap_style .= 'border-left-width:'.$element['borderLeftWidth'].'px;';
            $wrap_style .= 'border-style:'.$element['borderStyle'].';';
            $wrap_style .= 'border-color:'.$element['borderColor'].';';

            $parsed_elem = '<div style="'.esc_attr( $wrap_style ).'">';
                $heading_style = 'font-family:'.$element['headingFontFamily'].';';
                $heading_style .= 'font-style:'.$element['headingFontStyle'].';';
                $heading_style .= 'font-weight:'.$element['headingFontWeight'].';';
                $heading_style .= 'font-size:'.$element['headingFontSize'].'px;';
                $heading_style .= 'line-height:'.$element['headingLineHeight'].'px;';
                $heading_style .= 'text-align:'.$element['headingTextAlign'].';';
                if( ! empty( $element['headingTextColor'] ) ){
                    $heading_style .= 'color:'.$element['headingTextColor'].';';
                } else {
                    if( ! empty( $this->global_styles['headingColor'] ) ){
                        $heading_style .= 'color:'.$this->global_styles['headingColor'].';';
                    }
                }
                $heading_style .= 'margin: 0 0 '.$element['headerMarginBottom'].'px;';
                // content style
                $element_style = 'font-family:'.$element['fontFamily'].';';
                $element_style .= 'font-style:'.$element['fontStyle'].';';
                $element_style .= 'font-weight:'.$element['fontWeight'].';';
                $element_style .= 'font-size:'.$element['fontSize'].'px;';
                $element_style .= 'line-height:'.$element['lineHeight'].'px;';
                if( ! empty( $element['textColor'] ) ){
                    $element_style .= 'color:'.$element['textColor'].';';
                } else {
                    if( ! empty( $this->global_styles['textColor'] ) ){
                        $element_style .= 'color:'.$this->global_styles['textColor'].';';
                    }
                }
                $element_style .= 'text-align:'.$element['textAlign'].';';
                $element_style .= 'margin:0;padding:0;';
                $parsed_elem .= '<h4 style="'.esc_attr( $heading_style ).'">'.esc_html( $element['title'] ).'</h4>';
                $parsed_elem .= '<p style="'.esc_attr( $element_style ).'">';
                    if( $type == 'preview' || $type == 'testmail' ){
                        $parsed_elem .= __('My company', 'email-customizer-and-designer-for-woocommerce').' <br>';
                        $parsed_elem .= __('John Doe', 'email-customizer-and-designer-for-woocommerce').' <br />';
                        $parsed_elem .= __('286 Mill Pond St.', 'email-customizer-and-designer-for-woocommerce').' <br />';
                        $parsed_elem .= __('Millville, NJ', 'email-customizer-and-designer-for-woocommerce').' <br />';
                        $parsed_elem .= __('New Rochelle, 10583', 'email-customizer-and-designer-for-woocommerce').' <br />';
                        $parsed_elem .= __('New York, USA', 'email-customizer-and-designer-for-woocommerce');
                    } else {
                        $parsed_elem .= $this->get_shipping_details();
                    }
                $parsed_elem .= '</p>';
            $parsed_elem .= '</div>';

            return $parsed_elem;

        endif;

        if( $element['id'] == 'customerDetails' ):
            $wrap_style = 'padding-top:'.$element['paddingTop'].'px;';
            $wrap_style .= 'padding-right:'.$element['paddingRight'].'px;';
            $wrap_style .= 'padding-bottom:'.$element['paddingBottom'].'px;';
            $wrap_style .= 'padding-left:'.$element['paddingLeft'].'px;';
            if( ! empty( $element['bgColor'] ) ){
                $wrap_style .= 'background-color:'.$element['bgColor'].';';
            }
            $wrap_style .= 'border-top-width:'.$element['borderTopWidth'].'px;';
            $wrap_style .= 'border-right-width:'.$element['borderRightWidth'].'px;';
            $wrap_style .= 'border-bottom-width:'.$element['borderBottomWidth'].'px;';
            $wrap_style .= 'border-left-width:'.$element['borderLeftWidth'].'px;';
            $wrap_style .= 'border-style:'.$element['borderStyle'].';';
            if( ! empty( $element['borderColor'] ) ){
                $wrap_style .= 'border-color:'.$element['borderColor'].';';
            }

            $parsed_elem = '<div style="'.esc_attr( $wrap_style ).'">';
                $heading_style = 'font-family:'.$element['headingFontFamily'].';';
                $heading_style .= 'font-style:'.$element['headingFontStyle'].';';
                $heading_style .= 'font-weight:'.$element['headingFontWeight'].';';
                $heading_style .= 'font-size:'.$element['headingFontSize'].'px;';
                $heading_style .= 'line-height:'.$element['headingLineHeight'].'px;';
                $heading_style .= 'text-align:'.$element['headingTextAlign'].';';
                if( ! empty( $element['headingTextColor'] ) ){
                    $heading_style .= 'color:'.$element['headingTextColor'].';';
                } else {
                    if( ! empty( $this->global_styles['headingColor'] ) ){
                        $heading_style .= 'color:'.$this->global_styles['headingColor'].';';
                    }
                }
                $heading_style .= 'margin: 0 0 '.$element['headerMarginBottom'].'px;';
                // content style
                $element_style = 'font-family:'.$element['fontFamily'].';';
                $element_style .= 'font-style:'.$element['fontStyle'].';';
                $element_style .= 'font-weight:'.$element['fontWeight'].';';
                $element_style .= 'font-size:'.$element['fontSize'].'px;';
                $element_style .= 'line-height:'.$element['lineHeight'].'px;';
                if( ! empty( $element['textColor'] ) ){
                    $element_style .= 'color:'.$element['textColor'].';';
                } else {
                    if( ! empty( $this->global_styles['textColor'] ) ){
                        $element_style .= 'color:'.$this->global_styles['textColor'].';';
                    }
                }
                $element_style .= 'text-align:'.$element['textAlign'].';';
                $element_style .= 'margin:0;padding:0;';
                $parsed_elem .= '<h4 style="'.esc_attr( $heading_style ).'">'.esc_html( $element['title'] ).'</h4>';
                $parsed_elem .= '<p style="'.esc_attr( $element_style ).'">';
                    // link color
                    $link_color = '';
                    if( ! empty( $element['linkColor'] ) ){
                        $link_color = $element['linkColor'];
                    } else {
                        if( ! empty( $this->global_styles['linkColor'] ) ){
                            $link_color = $this->global_styles['linkColor'];
                        }
                    }

                    if( $type == 'preview' || $type == 'testmail' ){
                        $parsed_elem .= __('John Doe', 'email-customizer-and-designer-for-woocommerce').' <br />';
                        $parsed_elem .= '<a href="tel:+1-541-754-3010" style="font-family:'.$element['fontFamily'].'; color:'.$link_color.';">'.__('+1-541-754-3010', 'email-customizer-and-designer-for-woocommerce').'</a> <br />';
                        $parsed_elem .= '<a href="mailto:johndoe@exmple.com" style="font-family:'.$element['fontFamily'].'; color:'.$link_color.';">'.__('johndoe@exmple.com', 'email-customizer-and-designer-for-woocommerce').'</a>';
                    } else {
                        $parsed_elem .= $this->get_customer_details( $link_color, $element['fontFamily'] );
                    }
                $parsed_elem .= '</p>';
            $parsed_elem .= '</div>';

            return $parsed_elem;

        endif;

        if( $element['id'] == 'paymentMethod' ):
            $wrap_style = 'padding-top:'.$element['paddingTop'].'px;';
            $wrap_style .= 'padding-right:'.$element['paddingRight'].'px;';
            $wrap_style .= 'padding-bottom:'.$element['paddingBottom'].'px;';
            $wrap_style .= 'padding-left:'.$element['paddingLeft'].'px;';
            if( ! empty( $element['bgColor'] ) ){
                $wrap_style .= 'background-color:'.$element['bgColor'].';';
            }
            $wrap_style .= 'border-top-width:'.$element['borderTopWidth'].'px;';
            $wrap_style .= 'border-right-width:'.$element['borderRightWidth'].'px;';
            $wrap_style .= 'border-bottom-width:'.$element['borderBottomWidth'].'px;';
            $wrap_style .= 'border-left-width:'.$element['borderLeftWidth'].'px;';
            $wrap_style .= 'border-style:'.$element['borderStyle'].';';
            if( ! empty( $element['borderColor'] ) ){
                $wrap_style .= 'border-color:'.$element['borderColor'].';';
            }
            $wrap_style .= 'text-align:'.$element['textAlign'].';';

            $parsed_elem = '<div style="'.esc_attr( $wrap_style ).'">';
                $element_style = 'font-family:'.$element['fontFamily'].';';
                $element_style .= 'font-style:'.$element['fontStyle'].';';
                $element_style .= 'font-weight:'.$element['fontWeight'].';';
                $element_style .= 'font-size:'.$element['fontSize'].'px;';
                $element_style .= 'line-height:'.$element['lineHeight'].'px;';
                if( ! empty( $element['textColor'] ) ){
                    $element_style .= 'color:'.$element['textColor'].';';
                } else {
                    if( ! empty( $this->global_styles['textColor'] ) ){
                        $element_style .= 'color:'.$this->global_styles['textColor'].';';
                    }
                }
                $element_style .= 'margin:0;padding:0;';
                $parsed_elem .= '<p style="'.esc_attr( $element_style ).'">';
                    if( $type == 'preview' || $type == 'testmail' ){
                        $parsed_elem .= esc_html( $element['title'] ).__('Paypal', 'email-customizer-and-designer-for-woocommerce');
                    } else {
                        $parsed_elem .= esc_html( $element['title'] ).$this->get_payment_method();
                    }
                $parsed_elem .= '</p>';
            $parsed_elem .= '</div>';

            return $parsed_elem;
        endif;

        if( $element['id'] == 'shippingMethod' ):
            $wrap_style = 'padding-top:'.$element['paddingTop'].'px;';
            $wrap_style .= 'padding-right:'.$element['paddingRight'].'px;';
            $wrap_style .= 'padding-bottom:'.$element['paddingBottom'].'px;';
            $wrap_style .= 'padding-left:'.$element['paddingLeft'].'px;';
            if( ! empty( $element['bgColor'] ) ){
                $wrap_style .= 'background-color:'.$element['bgColor'].';';
            }
            $wrap_style .= 'border-top-width:'.$element['borderTopWidth'].'px;';
            $wrap_style .= 'border-right-width:'.$element['borderRightWidth'].'px;';
            $wrap_style .= 'border-bottom-width:'.$element['borderBottomWidth'].'px;';
            $wrap_style .= 'border-left-width:'.$element['borderLeftWidth'].'px;';
            $wrap_style .= 'border-style:'.$element['borderStyle'].';';
            if( ! empty( $element['borderColor'] ) ){
                $wrap_style .= 'border-color:'.$element['borderColor'].';';
            }
            $wrap_style .= 'text-align:'.$element['textAlign'].';';

            $parsed_elem = '<div style="'.esc_attr( $wrap_style ).'">';
                $element_style = 'font-family:'.$element['fontFamily'].';';
                $element_style .= 'font-style:'.$element['fontStyle'].';';
                $element_style .= 'font-weight:'.$element['fontWeight'].';';
                $element_style .= 'font-size:'.$element['fontSize'].'px;';
                $element_style .= 'line-height:'.$element['lineHeight'].'px;';
                if( ! empty( $element['textColor'] ) ){
                    $element_style .= 'color:'.$element['textColor'].';';
                } else {
                    if( ! empty( $this->global_styles['textColor'] ) ){
                        $element_style .= 'color:'.$this->global_styles['textColor'].';';
                    }
                }
                $element_style .= 'margin:0;padding:0;';
                $parsed_elem .= '<p style="'.esc_attr( $element_style ).'">';
                    if( $type == 'preview' || $type == 'testmail' ){
                        $parsed_elem .= esc_html( $element['title'] ).__('Flat rate', 'email-customizer-and-designer-for-woocommerce');
                    } else {
                        $parsed_elem .= esc_html( $element['title'] ).$this->get_shipping_method();
                    }
                $parsed_elem .= '</p>';
            $parsed_elem .= '</div>';

            return $parsed_elem;
        endif;

        if( $element['id'] == 'orderTotal' ):
            $wrap_style = 'padding-top:'.$element['paddingTop'].'px;';
            $wrap_style .= 'padding-right:'.$element['paddingRight'].'px;';
            $wrap_style .= 'padding-bottom:'.$element['paddingBottom'].'px;';
            $wrap_style .= 'padding-left:'.$element['paddingLeft'].'px;';
            if( ! empty( $element['bgColor'] ) ){
                $wrap_style .= 'background-color:'.$element['bgColor'].';';
            }
            $wrap_style .= 'border-top-width:'.$element['borderTopWidth'].'px;';
            $wrap_style .= 'border-right-width:'.$element['borderRightWidth'].'px;';
            $wrap_style .= 'border-bottom-width:'.$element['borderBottomWidth'].'px;';
            $wrap_style .= 'border-left-width:'.$element['borderLeftWidth'].'px;';
            $wrap_style .= 'border-style:'.$element['borderStyle'].';';
            if( ! empty( $element['borderColor'] ) ){
                $wrap_style .= 'border-color:'.$element['borderColor'].';';
            }
            $wrap_style .= 'text-align:'.$element['textAlign'].';';

            $parsed_elem = '<div style="'.esc_attr( $wrap_style ).'">';
                $element_style = 'font-family:'.$element['fontFamily'].';';
                $element_style .= 'font-style:'.$element['fontStyle'].';';
                $element_style .= 'font-weight:'.$element['fontWeight'].';';
                $element_style .= 'font-size:'.$element['fontSize'].'px;';
                $element_style .= 'line-height:'.$element['lineHeight'].'px;';
                if( ! empty( $element['textColor'] ) ){
                    $element_style .= 'color:'.$element['textColor'].';';
                } else {
                    if( ! empty( $this->global_styles['textColor'] ) ){
                        $element_style .= 'color:'.$this->global_styles['textColor'].';';
                    }
                }
                $element_style .= 'margin:0;padding:0;';
                $parsed_elem .= '<p style="'.esc_attr( $element_style ).'">';
                    if( $type == 'preview' || $type == 'testmail' ){
                        $parsed_elem .= esc_html( $element['title'] ).__('₹146', 'email-customizer-and-designer-for-woocommerce');
                    } else {
                        $parsed_elem .= esc_html( $element['title'] ).$this->get_order_total();
                    }
                $parsed_elem .= '</p>';
            $parsed_elem .= '</div>';

            return $parsed_elem;
        endif;

        if( $element['id'] == 'downloadable' ):
            $wrap_style = 'padding-top:'.$element['paddingTop'].'px;';
            $wrap_style .= 'padding-right:'.$element['paddingRight'].'px;';
            $wrap_style .= 'padding-bottom:'.$element['paddingBottom'].'px;';
            $wrap_style .= 'padding-left:'.$element['paddingLeft'].'px;';
            $parsed_elem = '<div style="'.esc_attr( $wrap_style ).'">';
                // title style
                $elem_head_style = 'font-family:'.$element['headingFontFamily'].';';
                $elem_head_style .= 'font-style:'.$element['headingFontStyle'].';';
                $elem_head_style .= 'font-weight:'.$element['headingFontWeight'].';';
                $elem_head_style .= 'font-size:'.$element['headingFontSize'].'px;';
                $elem_head_style .= 'line-height:'.$element['headingLineHeight'].'px;';
                $elem_head_style .= 'text-align:'.$element['headingTextAlign'].';';
                if( ! empty( $element['headingTextColor'] ) ) {
                    $elem_head_style .= 'color:'.$element['headingTextColor'].';';
                } else {
                    if( ! empty( $this->global_styles['headingColor'] ) ){
                        $elem_head_style .= 'color:'.$this->global_styles['headingColor'].';';
                    }
                }
                $elem_head_style .= 'margin: 0 0 '.$element['headerMarginBottom'].'px;';
                // table style
                $table_style = 'width: 100%;';
                if( ! empty( $element['tableBgColor'] ) ){
                    $table_style .= 'background-color:'.$element['tableBgColor'].';';
                } else {
                    if( ! empty( $this->global_styles['tableBgColor'] ) ){
                        $table_style .= 'background-color:'.$this->global_styles['tableBgColor'].';';
                    }
                }
                $table_style .= 'font-family:'.$element['fontFamily'].';';
                $table_style .= 'font-style:'.$element['fontStyle'].';';
                $table_style .= 'font-weight:'.$element['fontWeight'].';';
                $table_style .= 'font-size:'.$element['fontSize'].'px;';
                $table_style .= 'line-height:'.$element['lineHeight'].'px;';
                $table_style .= 'text-align:'.$element['textAlign'].';';
                if( ! empty( $element['textColor'] ) ){
                    $table_style .= 'color:'.$element['textColor'].';';
                } else {
                    if( ! empty( $this->global_styles['tableTdColor'] ) ){
                        $table_style .= 'color:'.$this->global_styles['tableTdColor'].';';
                    }
                }
                $table_style .= 'border-collapse: separate;';
                $table_style .= 'border-style: '.$element['tableBorderStyle'].';';
                $table_style .= 'border-width: '.$element['tableBorderWidth'].'px;';
                if( ! empty( $element['tableBorderColor'] ) ){
                    $table_style .= 'border-color: '.$element['tableBorderColor'].';';
                } else {
                    if( ! empty( $this->global_styles['tableBorderColor'] ) ){
                        $table_style .= 'border-color: '.$this->global_styles['tableBorderColor'].';';
                    }
                }
                // table th style
                $table_th_style = 'font-weight:'.$element['tableHeadWeight'].';';
                $table_th_style .= 'font-family:'.$element['fontFamily'].';';
                if( ! empty( $element['tableHeadColor'] ) ){
                    $table_th_style .= 'color:'.$element['tableHeadColor'].';';
                } else {
                    if( ! empty( $this->global_styles['tableThColor'] ) ){
                        $table_th_style .= 'color:'.$this->global_styles['tableThColor'].';';
                    }
                }
                $table_th_style .= 'border-top-width: 0px;';
                $table_th_style .= 'border-right-width: '.$element['tableBorderWidth'].'px;';
                $table_th_style .= 'border-bottom-width: '.$element['tableBorderWidth'].'px;';
                $table_th_style .= 'border-left-width: 0px;';
                $table_th_style .= 'border-style: '.$element['tableBorderStyle'].';';
                if( ! empty( $element['tableBorderColor'] ) ){
                    $table_th_style .= 'border-color: '.$element['tableBorderColor'].';';
                } else {
                    if( ! empty( $this->global_styles['tableBorderColor'] ) ){
                        $table_th_style .= 'border-color: '.$this->global_styles['tableBorderColor'].';';
                    }
                }
                $table_th_style .= 'padding-top:'.$element['cellPaddingTop'].'px;';
                $table_th_style .= 'padding-right:'.$element['cellPaddingRight'].'px;';
                $table_th_style .= 'padding-bottom:'.$element['cellPaddingBottom'].'px;';
                $table_th_style .= 'padding-left:'.$element['cellPaddingLeft'].'px;';
                // table td style
                $table_td_style = 'border-top-width: 0px;';
                $table_td_style .= 'border-right-width: '.$element['tableBorderWidth'].'px;';
                $table_td_style .= 'border-bottom-width: '.$element['tableBorderWidth'].'px;';
                $table_td_style .= 'border-left-width: 0px;';
                $table_td_style .= 'border-style: '.$element['tableBorderStyle'].';';
                if( ! empty( $element['tableBorderColor'] ) ){
                    $table_td_style .= 'border-color: '.$element['tableBorderColor'].';';
                } else {
                    if( ! empty( $this->global_styles['tableBorderColor'] ) ){
                        $table_td_style .= 'border-color: '.$this->global_styles['tableBorderColor'].';';
                    }
                }
                $table_td_style .= 'padding-top:'.$element['cellPaddingTop'].'px;';
                $table_td_style .= 'padding-right:'.$element['cellPaddingRight'].'px;';
                $table_td_style .= 'padding-bottom:'.$element['cellPaddingBottom'].'px;';
                $table_td_style .= 'padding-left:'.$element['cellPaddingLeft'].'px;';
                $table_td_style .= 'font-family:'.$element['fontFamily'].';';
                // link color
                $link_color = '';
                if( ! empty( $element['linkColor'] ) ){
                    $link_color = $element['linkColor'];
                } else {
                    if( ! empty( $this->global_styles['tableTdColor'] ) ){
                        $link_color = $this->global_styles['tableTdColor'];
                    }
                }

                if( $type == 'preview' || $type == 'testmail' ){
                    $first_col_style = '';
                    if($rtl){
                        $first_col_style = 'border-right:0;';
                    }

                    $last_col_style = 'border-right:0;';
                    if($rtl){
                        $last_col_style = '';
                    }

                    $parsed_elem .= '<h2 style="'.esc_attr( $elem_head_style ).'">'.__('Downloads', 'email-customizer-and-designer-for-woocommerce').'</h2>';
                    $parsed_elem .= '<table cellspacing="0" cellpadding="0" border="0" style="'.esc_attr( $table_style ).'">';
                        $parsed_elem .= '<thead>';
                            $parsed_elem .= '<tr>';
                                $parsed_elem .= '<th scope="col" style="'.esc_attr( $table_th_style ).esc_attr( $first_col_style ).'">'.__('Product', 'email-customizer-and-designer-for-woocommerce').'</th>';
                                $parsed_elem .= '<th scope="col" style="'.esc_attr( $table_th_style ).'">'.__('Expires', 'email-customizer-and-designer-for-woocommerce').'</th>';
                                $parsed_elem .= '<th scope="col" style="'.esc_attr( $table_th_style ).esc_attr( $last_col_style ).'">'.__('Download', 'email-customizer-and-designer-for-woocommerce').'</th>';
                            $parsed_elem .= '</tr>';
                        $parsed_elem .= '</thead>';
                        $parsed_elem .= '<tbody>';
                            $parsed_elem .= '<tr>';
                                $parsed_elem .= '<td style="'.esc_attr( $table_td_style ).esc_attr( $first_col_style ).'border-bottom: 0;">';
                                    $parsed_elem .= '<a href="#" style="color:'.$link_color.'">'.__('Woo Album', 'email-customizer-and-designer-for-woocommerce').'</a>';
                                $parsed_elem .= '</td>';
                                $parsed_elem .= '<td style="'.esc_attr( $table_td_style ).'border-bottom: 0;">'.__('Never', 'email-customizer-and-designer-for-woocommerce').'</td>';
                                $parsed_elem .= '<td style="'.esc_attr( $table_td_style ).esc_attr( $last_col_style ).'border-bottom: 0;">';
                                    $parsed_elem .= '<a href="#" style="color:'.$link_color.'">'.__('Some Kind Of Love', 'email-customizer-and-designer-for-woocommerce').'</a>';
                                $parsed_elem .= '</td>';
                            $parsed_elem .= '</tr>';
                        $parsed_elem .= '</tbody>';
                    $parsed_elem .= '</table>';
                } else {
                    $parsed_elem .= $this->get_downloadable_table( $elem_head_style, $table_style, $table_th_style, $table_td_style, $link_color, $rtl );
                }
            $parsed_elem .= '</div>';

            return $parsed_elem;
        endif;

        if( $element['id'] == 'coupon' ):
            $wrap_style = 'padding-top:'.$element['paddingTop'].'px;';
            $wrap_style .= 'padding-right:'.$element['paddingRight'].'px;';
            $wrap_style .= 'padding-bottom:'.$element['paddingBottom'].'px;';
            $wrap_style .= 'padding-left:'.$element['paddingLeft'].'px;';
            if( ! empty( $element['bgColor'] ) ){
                $wrap_style .= 'background-color:'.$element['bgColor'].';';
            }
            $wrap_style .= 'border-top-width:'.$element['borderTopWidth'].'px;';
            $wrap_style .= 'border-right-width:'.$element['borderRightWidth'].'px;';
            $wrap_style .= 'border-bottom-width:'.$element['borderBottomWidth'].'px;';
            $wrap_style .= 'border-left-width:'.$element['borderLeftWidth'].'px;';
            $wrap_style .= 'border-style:'.$element['borderStyle'].';';
            $wrap_style .= 'border-color:'.$element['borderColor'].';';
            $wrap_style .= 'text-align:'.$element['textAlign'].';';

            $parsed_elem = '<div style="'.esc_attr( $wrap_style ).'">';
                $element_style = 'font-family:'.$element['fontFamily'].';';
                $element_style .= 'font-style:'.$element['fontStyle'].';';
                $element_style .= 'font-weight:'.$element['fontWeight'].';';
                $element_style .= 'font-size:'.$element['fontSize'].'px;';
                $element_style .= 'line-height:'.$element['lineHeight'].'px;';
                if( ! empty( $element['textColor'] ) ){
                    $element_style .= 'color:'.$element['textColor'].';';
                } else {
                    if( ! empty( $this->global_styles['textColor'] ) ){
                        $element_style .= 'color:'.$this->global_styles['textColor'].';';
                    }
                }
                $element_style .= 'margin:0;padding:0;';
                $parsed_elem .= '<p style="'.esc_attr( $element_style ).'">';
                    if( $type == 'preview' || $type == 'testmail' ){
                        $parsed_elem .= esc_html( $element['title'] ).__('FLAT60', 'email-customizer-and-designer-for-woocommerce');
                    } else {
                        $parsed_elem .= esc_html( $element['title'] ).$this->get_order_coupons();
                    }
                $parsed_elem .= '</p>';
            $parsed_elem .= '</div>';

            return $parsed_elem;
        endif;

        if( $element['id'] == 'rewardCoupon' && ! empty( $element['code'] ) ):
            $wrap_style = 'padding-top:'.$element['paddingTop'].'px;';
            $wrap_style .= 'padding-right:'.$element['paddingRight'].'px;';
            $wrap_style .= 'padding-bottom:'.$element['paddingBottom'].'px;';
            $wrap_style .= 'padding-left:'.$element['paddingLeft'].'px;';
            if( ! empty( $element['bgColor'] ) ){
                $wrap_style .= 'background-color:'.$element['bgColor'].';';
            }
            $wrap_style .= 'border-top-width:'.$element['borderTopWidth'].'px;';
            $wrap_style .= 'border-right-width:'.$element['borderRightWidth'].'px;';
            $wrap_style .= 'border-bottom-width:'.$element['borderBottomWidth'].'px;';
            $wrap_style .= 'border-left-width:'.$element['borderLeftWidth'].'px;';
            $wrap_style .= 'border-style:'.$element['borderStyle'].';';
            $wrap_style .= 'border-color:'.$element['borderColor'].';';
            $wrap_style .= 'text-align:'.$element['textAlign'].';';

            $parsed_elem = '<div style="'.esc_attr( $wrap_style ).'">';
                $element_style = 'font-family:'.$element['fontFamily'].';';
                $element_style .= 'font-style:'.$element['fontStyle'].';';
                $element_style .= 'font-weight:'.$element['fontWeight'].';';
                $element_style .= 'font-size:'.$element['fontSize'].'px;';
                $element_style .= 'line-height:'.$element['lineHeight'].'px;';
                if( ! empty( $element['textColor'] ) ){
                    $element_style .= 'color:'.$element['textColor'].';';
                } else {
                    if( ! empty( $this->global_styles['textColor'] ) ){
                        $element_style .= 'color:'.$this->global_styles['textColor'].';';
                    }
                }
                $element_style .= 'margin:0;padding:0;';
                $parsed_elem .= '<p style="'.esc_attr( $element_style ).'">';
                    $parsed_elem .= esc_html( $element['title'] ).esc_html( $element['code'] );
                $parsed_elem .= '</p>';
            $parsed_elem .= '</div>';

            return $parsed_elem;
        endif;

        if( $element['id'] == 'emailHeader' ):
            if( $type !== 'preview' || $type !== 'testmail' ){
                $parsed_elem = '<?php do_action( "woocommerce_email_header", $email_heading, $email ); ?>';

                return $parsed_elem;
            }
        endif;

        if( $element['id'] == 'orderDetailsHook' ):
            if( $type !== 'preview' || $type !== 'testmail' ){
                $parsed_elem = '<?php if(isset($order)){ 
                    do_action( "woocommerce_email_order_details", $order, $sent_to_admin, $plain_text, $email ); 
                } ?>';

                return $parsed_elem;
            }
        endif;

        if( $element['id'] == 'beforeOrderTable' ):
            if( $type !== 'preview' || $type !== 'testmail' ){
                $parsed_elem = '<?php if(isset($order)){ 
                    do_action( "woocommerce_email_before_order_table", $order, $sent_to_admin, $plain_text, $email );
                } ?>';

                return $parsed_elem;
            }
        endif;

        if( $element['id'] == 'afterOrderTable' ):
            if( $type !== 'preview' || $type !== 'testmail' ){
                $parsed_elem = '<?php if(isset($order)){ 
                    do_action( "woocommerce_email_after_order_table", $order, $sent_to_admin, $plain_text, $email );
                } ?>';
                
                return $parsed_elem;
            }
        endif;

        if( $element['id'] == 'orderMeta' ):
            if( $type !== 'preview' || $type !== 'testmail' ){
                $parsed_elem = '<?php if(isset($order)){ 
                    do_action( "woocommerce_email_order_meta", $order, $sent_to_admin, $plain_text, $email ); 
                } ?>';
                
                return $parsed_elem;
            }
        endif;

        if( $element['id'] == 'customerDetailsHook' ):
            if( $type !== 'preview' || $type !== 'testmail' ){
                $parsed_elem = '<?php if(isset($order)){ 
                    do_action( "woocommerce_email_customer_details", $order, $sent_to_admin, $plain_text, $email );
                } ?>';
                
                return $parsed_elem;
            }
        endif;

        if( $element['id'] == 'emailFooterHook' ):
            if( $type !== 'preview' || $type !== 'testmail' ){
                $parsed_elem = '<?php do_action( "woocommerce_email_footer", $email ); ?>';
                
                return $parsed_elem;
            }
        endif;
    }

    /**
     * Get billing address details
     * @return billing_data
    */
    public function get_billing_details( $link_color, $font_family )
    {
        $billing_data = '<?php if( isset( $order ) ) : ?>';
            $billing_data .= '<?php echo wp_kses_post( $order->get_formatted_billing_address( esc_html__( "N/A", "woocommerce" ) ) ); ?>';
            $billing_data .= '<?php if ( $order->get_billing_phone() ) :';
                $billing_data .= '$number = trim( preg_replace( "/[^\d|\+]/", "", $order->get_billing_phone() ) ); ?>';
                $billing_data .= '<br/><a href="tel:<?php echo esc_attr( $number ); ?>" style="font-family:'.$font_family.'; color:'.$link_color.';"><?php echo esc_html( $order->get_billing_phone() ); ?></a>';
            $billing_data .= '<?php endif; ?>';
            $billing_data .= '<?php if ( $order->get_billing_email() ) : ?>';
                $billing_data .= '<br/><a href="mailto:<?php echo esc_html( $order->get_billing_email() ); ?>" style="font-family:'.$font_family.'; color:'.$link_color.';"><?php echo esc_html( $order->get_billing_email() ); ?></a>';
            $billing_data .= '<?php endif; ?>';
        $billing_data .= '<?php endif; ?>';

        return $billing_data;
    }

    /**
     * Get shipping address details
     * @return shipping_data
    */
    public function get_shipping_details()
    {
        $shipping_data = '<?php if( isset( $order ) ) : ?>';
            $shipping_data .= '<?php echo wp_kses_post( $order->get_formatted_shipping_address( esc_html__( "N/A", "woocommerce" ) ) ); ?>';
        $shipping_data .= '<?php endif; ?>';
        
        return $shipping_data;
    }

    /**
     * Get order customer details 
     * @return customer_data
    */
    public function get_customer_details($link_color, $font_family)
    {
        $customer_data = '<?php if( isset( $order ) ) : ?>';
            $customer_data .= '<?php echo esc_html( $order->get_formatted_billing_full_name() ); ?>';
            $customer_data .= '<?php if ( $order->get_billing_phone() ) : ';
                $customer_data .= '$number = trim( preg_replace( "/[^\d|\+]/", "", $order->get_billing_phone() ) ); ?>';
                $customer_data .= '<br/><a href="tel:<?php echo esc_attr( $number ); ?>" style="font-family:'.$font_family.'; color:'.$link_color.';"><?php echo esc_html( $order->get_billing_phone() ); ?></a>';
            $customer_data .= '<?php endif; ?>';
            $customer_data .= '<?php if ( $order->get_billing_email() ) : ?>';
                $customer_data .= '<br/><a href="mailto:<?php echo esc_html( $order->get_billing_email() ); ?>" style="font-family:'.$font_family.'; color:'.$link_color.';"><?php echo esc_html( $order->get_billing_email() ); ?></a>';
            $customer_data .= '<?php endif; ?>';
        $customer_data .= '<?php endif; ?>';

        return $customer_data;
    }

    /**
     * Get order payment method
     * @return payment_method
    */
    public function get_payment_method()
    {
        $payment_method = '<?php if( isset( $order ) ) : ?>';
            $payment_method .= '<?php echo esc_html( $order->get_payment_method_title() ); ?>';
        $payment_method .= '<?php endif; ?>';

        return $payment_method;
    }

    /**
     * Get order shipping method
     * @return shipping_method
    */
    public function get_shipping_method()
    {
        $shipping_method = '<?php if( isset( $order ) ) : ?>';
            $shipping_method .= '<?php echo esc_html( $order->get_shipping_method() ); ?>';
        $shipping_method .= '<?php endif; ?>';

        return $shipping_method;
    }

    
    /**
     * Get order total amount
     * @return order_total
    */
    public function get_order_total()
    {
        $order_total = '<?php if( isset( $order ) ) : ?>';
            $order_total .= '<?php echo wc_price( esc_html( $order->get_total() ), array( "currency" => $order->get_currency() ) ); ?>';
        $order_total .= '<?php endif; ?>';

        return $order_total;
    }

    /**
     * Get order table title
     * @return title
    */
    public function get_order_table_title($head_style, $text_color)
    {
        $title = '<?php if( isset( $order ) ) : ?>';
            $title .= '<h2 style="'.esc_attr( $head_style ).'">';
                $title .= '<?php if ( $sent_to_admin ) { ?>';
                    $title .= '<a href="<?php echo esc_url( $order->get_edit_order_url() ); ?>" style="color:'.$text_color.'">[<?php echo __("Order", "email-customizer-and-designer-for-woocommerce"); ?> #<?php echo $order->get_order_number(); ?>]</a>';
                $title .= '<?php } else { ?>';
                    $title .= '[Order #<?php echo $order->get_order_number(); ?>]';
                $title .= '<?php } ?>';
                $title .= ' (<?php echo wc_format_datetime( $order->get_date_created() ); ?>)';
            $title .= '</h2>';
        $title .= '<?php endif; ?>';

        return $title;
    }
    
    /**
     * Get order table product data
     * @return prd_infos
    */
    public function get_order_table_product_data($style, $rtl)
    {
        if( $rtl ){
            $prd_infos = '<?php $rtl = true;';
        } else {
            $prd_infos = '<?php $rtl = false;';
        }
        $prd_infos .= '$first_col_style = "";
        if($rtl){
            $first_col_style = "border-right:0;";
        }
        $last_col_style = "border-right:0;";
        if($rtl){
            $last_col_style = "";
        }';
        $prd_infos .= 'if( isset( $order ) ) : ';
            $prd_infos .= '$items = $order->get_items(); ';
            $prd_infos .= 'if( ! empty( $items ) ) : ';
                $prd_infos .= '$text_align  = (is_rtl() || $rtl) ? "right" : "left";';
                $prd_infos .= 'foreach ( $items as $item_id => $item ) : ';
                    $prd_infos .= '$product = $item->get_product(); ';
                    $prd_infos .= 'if( ! apply_filters( "woocommerce_order_item_visible", true, $item ) ) { ';
                        $prd_infos .= 'continue;';
                    $prd_infos .= '} ?>';
                    $prd_infos .= '<tr>';
                        $prd_infos .= '<td style="'.esc_attr( $style ).'<?php echo esc_attr( $first_col_style ); ?>">';
                            $prd_infos .= '<?php echo wp_kses_post( apply_filters( "woocommerce_order_item_name", $item->get_name(), $item, false ) );';
                            $prd_infos .= 'do_action( "woocommerce_order_item_meta_start", $item_id, $item, $order, $plain_text );';
                            $prd_infos .= 'wc_display_item_meta( $item );';
		                    $prd_infos .= 'do_action( "woocommerce_order_item_meta_end", $item_id, $item, $order, $plain_text ); ?>';
                        $prd_infos .= '</td>';
                        $prd_infos .= '<td style="'.esc_attr( $style ).'">';
                            $prd_infos .= '<?php $qty = $item->get_quantity();';
                            $prd_infos .= '$refunded_qty = $order->get_qty_refunded_for_item( $item_id );';
                            $prd_infos .= 'if ( $refunded_qty ) { ';
                                $prd_infos .= '$qty_display = "<del>" . esc_html( $qty ) . "</del> <ins>" . esc_html( $qty - ( $refunded_qty * -1 ) ) . "</ins>";';
                            $prd_infos .= '} else { ';
                                $prd_infos .= '$qty_display = esc_html( $qty ); ';
                            $prd_infos .= '} ';
                            $prd_infos .= 'echo wp_kses_post( apply_filters( "woocommerce_email_order_item_quantity", $qty_display, $item ) ); ?>';
                        $prd_infos .= '</td>';
                        $prd_infos .= '<td style="'.esc_attr( $style ).'<?php echo esc_attr( $last_col_style ); ?>"><?php echo $order->get_formatted_line_subtotal( $item ); ?></td>';
                    $prd_infos .= '</tr>';
                $prd_infos .= '<?php endforeach;';
            $prd_infos .= 'endif;';
        $prd_infos .= 'endif; ?>';

        return $prd_infos;
    }

    /**
     * Get order table total rows
     * @return total_rows
    */
    public function get_order_table_total_rows($table_td_style, $table_th_style, $rtl)
    {
        if( $rtl ){
            $total_rows = '<?php $rtl = true;';
        } else {
            $total_rows = '<?php $rtl = false;';
        }
        $total_rows .= '$first_col_style = "";
        if($rtl){
            $first_col_style = "border-right:0;";
        }
        $last_col_style = "border-right:0;";
        if($rtl){
            $last_col_style = "";
        }';

        $total_rows .= 'if( isset( $order ) ) : ';
            $total_rows .= '$item_totals = $order->get_order_item_totals();';
            $total_rows .= 'if ( $item_totals ){ ';
                $total_rows .= '$i = 1; $c = count( $item_totals );';
                $total_rows .= 'foreach ( $item_totals as $total ): ?>';
                    $total_rows .= '<tr>';
                        $total_rows .= '<th scope="row" colspan="2" style="'.esc_attr( $table_th_style ).'<?php if($i == $c && ! $order->get_customer_note()){ echo "border-bottom: 0;";} ?> <?php echo esc_attr( $first_col_style ); ?>"><?php echo wp_kses_post( $total["label"] ); ?></th>';
                        $total_rows .= '<td style="'.$table_td_style.'<?php if($i == $c && ! $order->get_customer_note()){ echo "border-bottom: 0;";} ?> <?php echo esc_attr( $last_col_style ); ?>"><?php echo wp_kses_post( $total["value"] ); ?></td>';
                    $total_rows .= '</tr>';
                    $total_rows .= '<?php $i++;';
                $total_rows .= 'endforeach;';
            $total_rows .= '} ';
            $total_rows .= 'if( $order->get_customer_note() ) { ?>';
				$total_rows .= '<tr>';
                    $total_rows .= '<th scope="row" colspan="2" style="'.esc_attr( $table_th_style ).' border-bottom: 0; <?php echo esc_attr( $first_col_style ); ?>"><?php esc_html_e( "Note:", "woocommerce" ); ?></th>';
                    $total_rows .= '<td style="'.esc_attr( $table_td_style ).' border-bottom: 0; <?php echo esc_attr( $last_col_style ); ?>"><?php echo wp_kses_post( nl2br( wptexturize( $order->get_customer_note() ) ) ); ?></td>';
                $total_rows .= '</tr>';
            $total_rows .= '<?php }';
        $total_rows .= 'endif; ?>';

        return $total_rows;
    }

    /**
     * Get downloadable table data
     * @return downloadable
    */
    public function get_downloadable_table($elem_head_style, $table_style, $table_th_style, $table_td_style, $link_color, $rtl)
    {
        if( $rtl ){
            $downloadable = '<?php $rtl = true;';
        } else {
            $downloadable = '<?php $rtl = false;';
        }
        $downloadable .= '$first_col_style = "";
        if($rtl){
            $first_col_style = "border-right:0;";
        }

        $last_col_style = "border-right:0;";
        if($rtl){
            $last_col_style = "";
        }';

        // return data
        $downloadable .= 'if( isset( $order ) ) : ';
            $downloadable .= '$downloads = $order->get_downloadable_items();';
            $downloadable .= '$downloads_columns = wc_get_account_downloads_columns(); ';
            $downloadable .= '$c = count( $downloads ); ';
            $downloadable .= '$n = count( $downloads_columns ); ';
            $downloadable .= 'if( $downloads && $downloads_columns ): ?>';
                $downloadable .= '<h2 style="'.esc_attr( $elem_head_style ).'"><?php echo __("Downloads", "email-customizer-and-designer-for-woocommerce"); ?></h2>';
                $downloadable .= '<table cellspacing="0" cellpadding="0" border="0" style="'.esc_attr( $table_style ).'">';
                    $downloadable .= '<thead>';
                        $downloadable .= '<tr>';
                            $downloadable .= '<?php $k = 1; ';
                            $downloadable .= 'foreach( $downloads_columns as $column_id => $column_name ) : ?>';
                                $downloadable .= '<th scope="col" style="'.esc_attr( $table_th_style ).' <?php if($k == 1){ echo esc_attr( $first_col_style ); } ?>"><?php echo esc_html__( $column_name, "woocommerce" ); ?></th>';
                                $downloadable .= '<?php $k++; ';
                            $downloadable .= 'endforeach; ?>';
                        $downloadable .= '</tr>';
                    $downloadable .= '</thead>';
                    $downloadable .= '<tbody>';
                        $downloadable .= '<?php $i = 1; ';
                        $downloadable .= 'foreach ( $downloads as $download ) : ?>';
                            $downloadable .= '<tr>';
                                $downloadable .= '<?php $j = 1; ';
                                $downloadable .= 'foreach( $downloads_columns as $column_id => $column_name ) : ?>';
                                    $downloadable .= '<td style="'.esc_attr( $table_td_style ).' <?php if($j == 1){ echo esc_attr( $first_col_style ); } if($j == $n){ echo esc_attr( $last_col_style ); } if($i == $c){ echo "border-bottom: 0;"; } ?>">';
                                        $downloadable .= '<?php if ( has_action( "woocommerce_account_downloads_column_" . $column_id ) ) {
                                            do_action( "woocommerce_account_downloads_column_" . $column_id, $download );
                                        } else {
                                            switch ( $column_id ) {
                                                case "download-product":
                                                    if ( $download["product_url"] ) { ?>
                                                        <a href="<?php echo esc_url( $download["product_url"] ); ?>" style="font-family: inherit; color:'.$link_color.';"><?php echo esc_html( $download["product_name"] ); ?></a>
                                                    <?php } else {
                                                        echo esc_html( $download["product_name"] );
                                                    }
                                                    break;
                                                case "download-file": ?>
                                                    <a href="<?php echo esc_url( $download["download_url"] ); ?>" style="font-family: inherit; color: '.$link_color.';"><?php echo esc_html( $download["download_name"] ); ?></a>
                                                    <?php break;
                                                case "download-remaining":
                                                    if( is_numeric( $download["downloads_remaining"] ) ){
                                                        echo esc_html( $download["downloads_remaining"] );
                                                    } else {
                                                        echo esc_html__( "&infin;", "woocommerce" );
                                                    }
                                                    break;
                                                case "download-expires":
                                                    if ( ! empty( $download["access_expires"] ) ) { ?>
                                                        <time datetime="<?php echo esc_attr( date( "Y-m-d", strtotime( $download["access_expires"] ) ) ); ?>"><?php echo esc_html( date_i18n( get_option( "date_format" ), strtotime( $download["access_expires"] ) ) ); ?></time>
                                                    <?php } else {
                                                        echo esc_html_e( "Never", "woocommerce" );
                                                    }
                                                    break;
                                            }
                                        } ?>';
                                    $downloadable .= '</td>';
                                    $downloadable .= '<?php $j++; ';
                                $downloadable .= 'endforeach; ?>';
                            $downloadable .= '</tr>';
                            $downloadable .= '<?php $i++; ';
                        $downloadable .= 'endforeach; ?>';
                    $downloadable .= '</tbody>';
                $downloadable .= '</table>';
            $downloadable .= '<?php endif;';
        $downloadable .= 'endif; ?>';

        return $downloadable;
    }

    /**
     * Replace placeholder value for template preview
     * @return modified_data
    */
    public function replace_preview_placeholder_data($data)
    {
        $find = array( "{order_id}", "{order_created_date}", "{customer_name}", "{customer_full_name}", "{customer_note}", "{user_login}", "{site_name}", "{account_area_url}", "{user_pass}", "{reset_password_url}", "{set_password_url}" );
        $replace = array( "194", "January 24, 2022", "John", "John Doe", "<p style='margin:0;padding:0'>Customer note sample data </p>", "johndoe", get_bloginfo(), make_clickable( esc_url( wc_get_page_permalink( "myaccount" ) ) ), "<strong>BqDH#dY!1!Xh</strong>", "<a href='#' target='_blank'>Click here to reset your password</a>", "<a href='#' target='_blank'>Click here to set your new password</a>" );
        $modified_data = str_replace( $find, $replace, $data );

        return $modified_data;
    }

    /**
     * Replace placeholder value
     * @return modified_data
    */
    public function replace_placeholder_data($data)
    {
        $modified_data = $this->replace_order_id( $data );
        $modified_data = $this->replace_customer_name( $modified_data );
        $modified_data = $this->replace_customer_full_name( $modified_data );
        $modified_data = $this->replace_user_login( $modified_data );
        $modified_data = $this->replace_site_name( $modified_data );
        $modified_data = $this->replace_customer_note( $modified_data );
        $modified_data = $this->replace_account_area_url( $modified_data );
        $modified_data = $this->replace_user_password( $modified_data );
        $modified_data = $this->replace_reset_password_url( $modified_data );
        $modified_data = $this->replace_set_password_url( $modified_data );
        $modified_data = $this->replace_order_created_date( $modified_data );

        return $modified_data;
    }

    /**
     * Replace order id
     * @return modified_data
    */
    public function replace_order_id($data)
    {
        $order_id = '<?php if( isset( $order ) ) : ?>';
            $order_id .= '<?php echo $order->get_id(); ?>';
        $order_id .= '<?php endif; ?>';

        $modified_data = str_replace( '{order_id}', $order_id, $data );

        return $modified_data;
    }

    /**
     * Replace customer name
	 * @return modified_data
    */
	public function replace_customer_name($data)
    {
		$customer_name = '<?php if( isset( $order ) ) : ?>';
		    $customer_name .= '<?php echo esc_html( $order->get_billing_first_name() ); ?>';
		$customer_name .= '<?php elseif( isset( $user_login ) ): ?>';
		    $customer_name .= '<?php echo esc_html( $user_login ); ?>';
		$customer_name .= '<?php endif; ?>';

        $modified_data = str_replace( '{customer_name}', $customer_name, $data );

		return $modified_data;
	}

    /**
     * Replace customer full name
	 * @return modified_data
    */
	public function replace_customer_full_name($data)
    {
		$customer_name = '<?php if( isset( $order ) ) : ?>';
		    $customer_name .= '<?php echo esc_html( $order->get_billing_first_name()." ".$order->get_billing_last_name() ); ?>';
		$customer_name .= '<?php elseif( isset( $user_login ) ): ?>';
		    $customer_name .= '<?php echo esc_html( $user_login ); ?>';
		$customer_name .= '<?php endif; ?>';

        $modified_data = str_replace( '{customer_full_name}', $customer_name, $data );

		return $modified_data;
	}

    /**
     * Replace User login
	 * @return modified_data
    */
	public function replace_user_login($data)
    {
		$user_login = '<?php if( isset( $user_login ) ){ ?>';
		    $user_login .= '<?php echo esc_html( $user_login ); ?>';
		$user_login .= '<?php } ?>';

        $modified_data = str_replace( '{user_login}', $user_login, $data );

		return $modified_data;
	}

    /**
     * Replace site name
	 * @return modified_data
    */
	public function replace_site_name($data)
    {
		$site_name = '<?php echo esc_html( get_bloginfo() ); ?>';
        $modified_data = str_replace( '{site_name}', $site_name, $data );

		return $modified_data;
	}

    /**
     * Replace customer note
	 * @return modified_data
    */
	public function replace_customer_note($data)
    {
		$customer_note = '<?php if( isset( $order ) ) : ';
            $customer_note .= '$notes = $order->get_customer_order_notes();';
            $customer_note .= 'reset( $notes );';
            $customer_note .= '$note_key = key( $notes );';
            $customer_note .= '$customer_note = isset( $notes[$note_key]->comment_content ) ? $notes[$note_key]->comment_content : "";';
            $customer_note .= 'if( !empty( $customer_note ) ): ?>';
                $customer_note .= '<?php echo wpautop( wptexturize( $customer_note ) ); ?>';
            $customer_note .= '<?php endif; ?>';
        $customer_note .= '<?php endif; ?>';

        $modified_data = str_replace( '{customer_note}', $customer_note, $data );

		return $modified_data;
	}

    /**
     * Replace account area url
	 * @return modified_data
    */
	public function replace_account_area_url($data)
    {
		$account_area_url = '<?php echo make_clickable( esc_url( wc_get_page_permalink( "myaccount" ) ) ); ?>';
        $modified_data = str_replace( '{account_area_url}', $account_area_url, $data );

		return $modified_data;
	}

    /**
     * Replace User login password
	 * @return modified_data
    */
	public function replace_user_password($data)
    {
		$user_password = '<?php if( get_option( "woocommerce_registration_generate_password" ) === "yes" && isset( $password_generated ) ) : ?>';
            $user_password .= '<?php echo "<strong>". esc_html( $user_pass ) . "</strong>"; ?>';
        $user_password .= '<?php endif; ?>';

        $modified_data = str_replace( '{user_pass}', $user_password, $data );

		return $modified_data;
	}

    /**
     * Reset password url
	 * @return modified_data
    */
	public function replace_reset_password_url($data)
    {
		$reset_password = '<?php if( isset( $reset_key ) && isset( $user_id ) ): ?>';
            $reset_password .= '<a class="link" href="<?php echo esc_url( add_query_arg( array( "key" => $reset_key, "id" => $user_id ), wc_get_endpoint_url( "lost-password", "", wc_get_page_permalink( "myaccount" ) ) ) ); ?>"><?php _e( "Click here to reset your password", "woocommerce" ); ?></a>';
        $reset_password .= '<?php endif; ?>';

        $modified_data = str_replace( '{reset_password_url}', $reset_password, $data );

		return $modified_data;
	}

    /**
     * Set password url
	 * @return modified_data
    */
    public function replace_set_password_url($data)
    {
        $set_password = '<?php if( get_option( "woocommerce_registration_generate_password" ) === "yes" && isset( $password_generated ) && isset( $set_password_url ) ) : ?>';
            $set_password .= '<a href="<?php echo esc_attr( $set_password_url ); ?>"><?php printf( esc_html__( "Click here to set your new password", "woocommerce" ) ); ?></a>';
        $set_password .= '<?php endif; ?>';

        $modified_data = str_replace( '{set_password_url}', $set_password, $data );

		return $modified_data;
	}

    /**
     * Replace Order Created Date
	 * @return modified_data
    */
    public function replace_order_created_date($data)
    {
        $order_date = '<?php if( isset( $order ) ) : ?>';
            $order_date.= '<?php echo wc_format_datetime( $order->get_date_created() ); ?>';
        $order_date.= '<?php endif; ?>';

        $modified_data = str_replace( '{order_created_date}', $order_date, $data );

		return $modified_data;
	}

    /**
     * Get order applied coupons
     * @return order_total
    */
    public function get_order_coupons()
    {
        $order_coupons = '<?php if( isset( $order ) ) : ?>';
            $order_coupons .= '<?php $used_coupons = $order->get_coupon_codes(); ?>';
            $order_coupons .= '<?php if( ! empty( $used_coupons ) ): ?>';
                $order_coupons .= '<?php echo implode( ", ", $used_coupons ); ?>';
            $order_coupons .= '<?php endif; ?>';
        $order_coupons .= '<?php endif; ?>';

        return $order_coupons;
    }

    /**
     * Overide safe_style css
    */
    public function filter_safe_style_css($styles)
    {
        if( isset( $_GET['awecm_preview'] ) ){
           return false;
        }

        return $styles;
    }

	/**
     * Ensures only one instance of AWECM_Front_End is loaded or can be loaded.
     * @return Main AWECM_Front_End instance
     * @since 1.0.0
     * @static
    */
    public static function instance($parent)
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self($parent);
        }
        return self::$_instance;
    }
}