<?php
/**
 * iThemes Exchange GIS Layout shows products on the store page as in a Google Image Search page
 */
if (!class_exists('it_exchange_gis_layout')) {

    class it_exchange_gis_layout {

        var $version = '1.0.0';
        var $plugin_name = 'exchange-addon-gis-layout';
        var $store_page = FALSE;
        var $number_of_columns = 5;
        var $viewport = 500;
        var $disable_buy_now = false;
        var $disable_parent_css = false;
        var $disable_child_css = false;

        function __construct() {

            $this->load_plugin_textdomain();
            
            if ( is_admin() ) :
                $this->load_admin();
            else:
                add_action( 'wp', array( $this, 'setup' ) );                
            endif;
        }
        
        function setup() {

            $this->check_store_page(); // only continue if on store page

            if ( $this->store_page == TRUE ) :
                $this->load_required_hooks();
                $this->get_settings();
                $this->enqueue_styles_scripts();
                $this->add_code();
            endif;
                
        }        
        
        /**
         * Load translations
         */
        public function load_plugin_textdomain() {
            
            $locale = apply_filters( 'plugin_locale', get_locale(), $this->plugin_name );
            $dir   = trailingslashit(WP_LANG_DIR . '/plugins/' . dirname(plugin_basename( __FILE__ )));

            load_textdomain( 'it-exchange-addon-gis-layout', $dir . 'it-exchange-addon-gis-layout-' . $locale . '.mo' );
            load_plugin_textdomain( 'it-exchange-addon-gis-layout', false, dirname( plugin_basename( __FILE__  ) ) . '/languages/' );
        }
        
        /**
         * setup addon settings
         */
        function load_admin() {

            include( 'lib/addon-settings.php' );
            
        }
        
        /**
         * setup required hooks
         */
        function load_required_hooks() {

            include( 'lib/required-hooks.php' );
            
        }        
        
        /**
         * get addon settings
         */
        function get_settings() {
            
            $settings = it_exchange_get_option( 'addon_gis_layout', true );
            
            if ( !empty($settings['number-of-columns']) ) :
                $this->number_of_columns = $settings['number-of-columns'];
            endif;
            
            if ( !empty($settings['viewport']) ) :
                $this->viewport = $settings['viewport'];
            endif;

            if ( !empty($settings['disable-buy-now']) ) :
                $this->disable_buy_now = true;
            endif;

            if ( !empty($settings['disable-parent-css']) ) :
                $this->disable_parent_css = true;
            endif;
            
            if ( !empty($settings['disable-child-css']) ) :
                $this->disable_child_css = true;
            endif;
            
        }
        
        /**
         * add styles and scripts
         */
        function enqueue_styles_scripts() {

            add_action('wp_enqueue_scripts', array($this, 'add_styles_scripts'));
            
        }
        
        /**
         * Register and enqueue stylesheets and scripts
         */
        function add_styles_scripts() {

            wp_register_style('it-gis-layout-styles', plugins_url('css/style.css', __FILE__), null, $this->version);
            wp_enqueue_style('it-gis-layout-styles');

            // custom css from child theme if gis-addon-style.css exists in child-theme-folder/exchange/
            if ( is_file( get_stylesheet_directory() . '/exchange/gis-addon-style.css' ) ) :
                wp_register_style('it-gis-layout-custom', get_stylesheet_directory_uri() . '/exchange/gis-addon-style.css', null, $this->version);
                wp_enqueue_style( 'it-gis-layout-custom' );
            endif;
            
            if ( $this->disable_parent_css ):
                wp_dequeue_style( 'it-exchange-parent-theme-css' );
            endif;
          
            if ( $this->disable_child_css ):
                wp_dequeue_style( 'it-exchange-child-theme-css' );
            endif;

            wp_register_script('it-gis-layout-script', plugins_url('js/scripts.js', __FILE__), array('jquery'), $this->version, false);
            wp_enqueue_script('it-gis-layout-script');

        }        

        /**
         * process options and add code
         */
        function add_code() {

            if ( $this->disable_buy_now ):
                add_filter( 'it_exchange_disable_buy_now', array($this, 'disable_buy_now' ) );
                add_action( 'it_exchange_get_content_product_product_info_loop_elements', array($this, 'remove_buy_now_from_product_info' ));
            endif;
                                    
            add_action( 'it_exchange_content_store_before_products_loop', array($this, 'add_opening_div' ));
            add_action( 'it_exchange_content_store_after_products_loop', array($this, 'add_closing_div' ));
           
            add_action( 'wp_head', array( $this, 'add_code_to_header' ) );

        }

        /**
         * disable "Buy Now"
         */
        function disable_buy_now( $disable ) {
            
            return true;
            
        }
        
        /**
         * remove "Buy Now" from product info
         */        
        function remove_buy_now_from_product_info( $elements ) {
    
            foreach ( $elements as $key => $element ) {
                if ( 'buy-now' == $element ) {
                        unset( $elements[$key] );
                }
            }
    
            return $elements;
        }
        
        /**
         * Add opening div to store loop
         */
        function add_opening_div() {
            
            echo "\n<div id='it-exchange-gis-layout'>\n";

        }
        
        /**
         * Add closing div to store loop
         */
        function add_closing_div() {
            
            echo "\n</div>\n";

        }
        
        /**
        * Process options and print dynamic css
        */
        function add_code_to_header() {
            
            $columns = preg_replace("/[^0-9]/", '', $this->number_of_columns);
            
            $width = 100 / $this->number_of_columns;
            $start = 2;
            $margin = 100;
            $container_width = $columns * 100;
            
            echo "\n<!-- start GIS Layout addon css -->\n";
            echo "<style type='text/css'>\n";
            
            echo "\n@media only screen and (min-width: ". $this->viewport . "px) {\n";

                echo "\t#it-exchange-gis-layout .gis-item,\n";
                echo "\t#it-exchange-store #it-exchange-gis-layout .it-exchange-products li {\n";
                    echo "\t\twidth: " . $width . "%;\n";
                echo "\t}\n";

                for ($x = 1; $x < $columns; $x++) {
                    echo "\t#it-exchange-store #it-exchange-gis-layout .it-exchange-products li.gis-item:nth-of-type(" . $columns . "n+" . $start . ") .gis-details {\n";
                    echo "\t\tmargin-left: -" . $margin . "%;\n";
                    echo "\t}\n";
                    $start++;
                    $margin = $margin + 100;
                } 
                
                echo "\t#it-exchange-store #it-exchange-gis-layout .it-exchange-products li.gis-item:nth-of-type(" . $columns . "n+" . $start . ") {\n";
                    echo "\t\tclear: left;\n";
                echo "\t}\n";

                echo "\t#it-exchange-gis-layout .gis-details {\n";
                    echo "\t\twidth: " . $container_width . "%;\n";
                echo "\t}\n";
  
            echo "}\n";
            
            echo "@media only screen and (max-width: ". ($this->viewport+1) . "px) {\n";

                echo "\t#it-exchange-store #it-exchange-gis-layout .it-exchange-products li:nth-child(2n+1) {\n";
                    echo "\t\tclear: left;\n";
                echo "\t}\n";

                echo "\t#it-exchange-gis-layout .gis-item, #it-exchange-store #it-exchange-gis-layout .it-exchange-products li {\n";
                    echo "\t\twidth: 50%;\n";
                echo "\t}\n";

                echo "\t#it-exchange-gis-layout .image-large {\n";
                    echo "\t\tclear: right;\n";
                    echo "\t\tmax-height: 250px;\n";
                echo "\t}\n";

                echo "\t#it-exchange-gis-layout .gis-item:nth-of-type(2n+2) .gis-details {\n";
                    echo "\t\tmargin-left: -100%;\n";
                echo "\t}\n";

                echo "\t#it-exchange-gis-layout .gis-item:nth-of-type(2n+3) {\n";
                    echo "\t\tclear: left;\n";
                echo "\t}\n";

                echo "\t#it-exchange-gis-layout .gis-details {\n";
                    echo "\t\tdisplay: block;\n";
                    echo "\t\twidth: 200%;\n";
                echo "\t}\n";

                echo "\t#it-exchange-gis-layout .gis-details-left {\n";
                    echo "\t\tclear: right;\n";
                    echo "\t\tdisplay: block;\n";
                echo "\t}\n";

            echo "}  \n";
            echo "</style>\n";
            echo "<!-- end GIS Layout addon css -->\n";
            
        }

        /**
        * Check if on a store page
        */
        function check_store_page() {

            $this->store_page = FALSE;
            if( it_exchange_is_page('store') ) :
                $this->store_page = TRUE;
            endif;
        }
    }
}

// Instantiate the class
if (class_exists('it_exchange_gis_layout')) {
        $it_exchange_gis_layout_var = new it_exchange_gis_layout();
}