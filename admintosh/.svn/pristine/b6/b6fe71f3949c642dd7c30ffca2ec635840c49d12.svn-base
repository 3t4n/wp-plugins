<?php
namespace Admintosh\Inc;
 /**
  * 
  * @package    Admintosh
  * @version    1.0.0
  * @author     wpmobo
  * @Websites: http://wpmobo.com
  *
  */
 
 class Country_Block {

    protected static $options;
    protected static $ipObj;

    /**
     * Start up
     */
    public function __construct() {

        self::$ipObj = \Admintosh\Classes\Geolocation::get_geolocation();
        self::$options = get_option('admintosh_options'); 

        add_action( 'init', [ __CLASS__, 'blocking_stuff' ], 1 );

    }

    public static function blocking_stuff() {

        // if block for entire site
        if( self::is_entire() ) {

            self::block_template();

            exit;
        }

        // if block for frontend
        if( self::is_frontend() ) {

            self::block_template();

            exit;
        }

        // if block for admin
        // if( self::is_admin() ) {

        //     exit;
        // }

        // if block for admin
        if( self::is_login_page() ) {

            self::block_template();
            exit;
        }


    }


    public static function is_entire() {

        if( empty( self::$options['active_entire_site_restriction'] ) ) {
            return false;
        }

        $visitorCountry = self::country_code();

        $restrictedCountry = self::$options['entire_site_exclued_country'] ?? [];

        if( !empty( $restrictedCountry ) && !in_array( $visitorCountry, $restrictedCountry ) ) {
            return true;
        }

    }

    public static function is_frontend() {
        
        if( empty( self::$options['active_front_end_restriction'] ) ) {
            return false;
        }

        $visitorCountry = self::country_code();

        $restrictedCountry = self::$options['front_end_exclued_country'] ?? [];

        if( !self::check_login_page() && !is_admin() && ( !empty( $restrictedCountry ) && !in_array( $visitorCountry, $restrictedCountry ) ) ) {
            return true;
        }

    }

    public static function is_admin() {
        
    }

    public static function is_login_page() {

        if( empty( self::$options['active_wp_login_restriction'] ) ) {
            return false;
        }

        $visitorCountry = self::country_code();

        $restrictedCountry = self::$options['wplogin_page_exclued_country'] ?? [];

        if( self::check_login_page() &&  ( !empty( $restrictedCountry ) && !in_array( $visitorCountry, $restrictedCountry ) ) ) {
            return true;
        }

    }

    public static function country_code() {
        return self::$ipObj['countryCode'] ?? '';
    }
    
    public static function block_template() {

        $title = !empty( self::$options['block_temp_title'] ) ? self::$options['block_temp_title'] : 'Sorry our services are not available in your country.';
        $desc = !empty( self::$options['block_temp_description'] ) ? self::$options['block_temp_description'] : 'We apologize, but our services are currently unavailable in your country. We strive to provide quality products and services to customers around the world, and we regret any inconvenience this may cause. At this time, we are continuously working to expand our offerings and hope to reach your region soon. Our goal is to ensure that everyone can benefit from the features and solutions we provide.';


        echo '<div class="country-block-page-wrap">
            <h2>'.esc_html( $title ).'</h2>
            <p>'.esc_html( $desc ).'</p>
        </div>';

        self::block_template_style();
    }

    public static function block_template_style() {
        ?>
        <style type="text/css">
            .country-block-page-wrap {
                max-width: 500px;
                margin: 85px auto;
                padding: 15px;
                border-radius: 4px;
                box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;
            }
            .country-block-page-wrap h2 {
                margin: 0;
                margin-bottom: 30px;
            }
            .country-block-page-wrap p {
                margin: 0;
                font-size: 15px;
                line-height: 1.4;
            }
        </style>
        <?php
    }

    public static function check_login_page() {

        global $pagenow;

        if( !is_admin() && 'wp-login.php' == $pagenow && ! is_user_logged_in()  ) {
            return true;
        }

    }


}

