<?php defined('ABSPATH') or die('No script kiddies please!!');
if ( !class_exists('WPMICONSLITE_Library') ) {
    class WPMICONSLITE_Library {
        /**
         * Prints array in pre format
         *
         * @since 1.0.0
         *
         * @param array $array
         */
        function displayArr($array) {
            echo "<pre>";
            print_r($array);
            echo "</pre>";
        }

        /**
         * Function to generate random number
         * @param  integer $length Length of the random number to be generated
         * @return mixed Returns the mixed value of number and alphabets
         */
        public function generateRandomIndex($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
       
        /**
         * Sanitizes Multi Dimensional Array
         * @param array $array
         * @param array $sanitize_rule
         * @return array
         *
         * @since 1.0.0
         */
         function sanitize_array($array = array(), $sanitize_rule = array()) {
            if ( !is_array($array) || count($array) == 0 ) {
                return array();
            }

            foreach ( $array as $k => $v ) {
                if ( !is_array($v) ) {

                    $default_sanitize_rule = (is_numeric($k)) ? 'text' : 'html';
                    $sanitize_type = isset($sanitize_rule[ $k ]) ? $sanitize_rule[ $k ] : $default_sanitize_rule;
                    $array[ $k ] = $this->sanitize_value($v, $sanitize_type);
                }
                if ( is_array($v) ) {
                    $array[ $k ] = $this->sanitize_array($v, $sanitize_rule);
                }
            }

            return $array;
        }

        /**
         * Sanitizes Value
         *
         * @param type $value
         * @param type $sanitize_type
         * @return string
         *
         * @since 1.0.0
         */
        function sanitize_value($value = '', $sanitize_type = 'text') {
            switch ( $sanitize_type ) {
                case 'html':
                  return wp_kses_post(stripslashes_deep($value));
                    break;
                default:
                    return sanitize_text_field($value);
                    break;
            }
        }
         
        /**
         * Hover icon animation
         */
        function wpmi_animation_options() {
             $wpmicon_animation_options = array(
                 'hvr-icon-fade-in' => 'Fade In',
                 'hvr-icon-fade-out' => 'Fade Out',
                 'hvr-icon-back' => 'Icon Back',
                 'hvr-icon-forward' => 'Icon ForWard',
                 'hvr-icon-down' => 'Icon Down',
                 'hvr-icon-spin' => 'Icon Spin',
                 'hvr-icon-drop' => 'Icon Drop',
                 'hvr-float-away' => 'Icon Float Away',
                 'hvr-icon-sink-away' => 'Icon Sink Away',
                 'hvr-icon-grow' => 'Icon Grow',
                 'hvr-icon-shrink' => 'Icon Shrink',
                 'hvr-icon-pulse' => 'Icon Pulse',
                 'hvr-icon-pulse-grow' => 'Icon Pulse Grow',
                 'hvr-icon-pulse-shrink' => 'Icon Pulse Shrink',
                 'hvr-icon-push' => 'Icon Push',
                 'hvr-icon-pop' => 'Icon Pop',
                 'hvr-icon-bounce' => 'Icon Bounce',
                 'hvr-icon-rotate' => 'Icon Rotate',
                 'hvr-icon-grow-rotate' => 'Icon Grow Rotate',
                 'hvr-float' => 'Icon Float',
                 'hvr-icon-sink' => 'Icon Sink',
                 'hvr-icon-bob' => 'Icon Bob',
                 'hvr-icon-hang' => 'Icon Hang',
                 'hvr-icon-wobble-horizontal' => 'Icon Wobble Horizontal',
                 'hvr-icon-wobble-vertical' => 'Icon Wobble Vertical',
                 'hvr-icon-buzz' => 'Icon Buzz',
                 'hvr-icon-buzz-out' => 'Icon Flip Horizontally',
                 'hvr-icon-flip-vertical' =>  'Icon Flip Vertically',
                 'hvr-float-shadow' =>  'Icon Float Shadow',
                 'hvr-icon-hover-shadow' =>  'Icon Hover Shadow'
            );
            return $wpmicon_animation_options;
        }
   
       public function get_available_preicons(){
          $preicons = array(
             'font-awesome' => 'Font Awesome',
             'dashicons' => 'Dashicons',
             'genericons' => 'Genericons',
             'linecons' => 'Linecons',
             'icomoon' => 'Icomoon',
             'themify-icons' => 'Themify Icons',
             'elusive-icons' => 'Elusive Icons',
             'typicons' => 'Typicons',
             'foundicons' => 'Foundicons',
             'ap-social-icons' => 'AccessPress Social Icons',
             'elegant-icons' => 'Elegant Icons'
            );
          return $preicons;
       }

       /*
       * Get current menu id for nav-menu.php metabox.
       */
        function current_menu_id() {
          /*Get List of registered menus*/
          $nav_menus = wp_get_nav_menus( array( 'orderby' => 'name' ) );

          /*Count numbr of Menus*/
          $menu_count = count( $nav_menus );

          $wpmenuicon_selectedID = isset( $_GET['menu'] ) ? (int) $_GET['menu'] : 0;

          $wpmiAddNewScreen = ( isset( $_GET['menu'] ) && 0 == $_GET['menu'] ) ? true : false;
          $page_count = wp_count_posts( 'page' );
          $one_theme_location_no_menus = ( 1 == count( get_registered_nav_menus() ) && !$wpmiAddNewScreen && empty( $nav_menus ) && !empty( $page_count->publish ) ) ? true : false;

          /* Get recently edited nav menu*/
          $recently_edited = absint( get_user_option( 'nav_menu_recently_edited' ) );

          if ( empty( $recently_edited ) && is_nav_menu( $wpmenuicon_selectedID ) ) {
            $recently_edited = $wpmenuicon_selectedID;
          }

          /* Use $recently_edited if none are selected*/
          if ( empty( $wpmenuicon_selectedID ) && !isset( $_GET['menu'] ) && is_nav_menu( $recently_edited ) ) {
            $wpmenuicon_selectedID = $recently_edited;
          }

          /* On deletion of menu, if another menu exists, show it*/
          if ( !$wpmiAddNewScreen && 0 < $menu_count && isset( $_GET['action'] ) && 'delete' == $_GET['action'] ) {
            $wpmenuicon_selectedID = $nav_menus[0]->term_id;
          }

          /* Set $wpmenuicon_selectedID to 0 if no menus*/
          if ( $one_theme_location_no_menus ) {
            $wpmenuicon_selectedID = 0;
          } elseif ( empty( $wpmenuicon_selectedID ) && !empty( $nav_menus ) && !$wpmiAddNewScreen ) {
            /* if we have no selection yet, and we have menus, set to the first one in the list*/
            $wpmenuicon_selectedID = $nav_menus[0]->term_id;
          }

          return $wpmenuicon_selectedID;
        }
 }
}