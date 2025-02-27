<?php

/**
 * This class covers helper and utility functions for the plugin
 *
 * @since      1.0.0
 * @package    Partnero
 * @subpackage Partnero/includes
 * @author     https://www.partnero.com/
 */

class Partnero_Util {

    /**
     * Constant for affiliate program type.
     *
     * @since 1.4.0
     * @var string TYPE_AFFILIATE The program type identifier for affiliate.
     */
    public const TYPE_AFFILIATE = 'affiliate';

    /**
     * Constant for refer a friend program type.
     *
     * @since 1.4.0
     * @var string TYPE_REFER_A_FRIEND The program type identifier for refer_a_friend.
     */
    public const TYPE_REFER_A_FRIEND = 'refer_a_friend';

    /**
     * List of all available program types.
     *
     * @var array<string>
     */
    public const ALL_TYPES = [self::TYPE_AFFILIATE, self::TYPE_REFER_A_FRIEND];

    /**
     * Return icon up or down based on postive or nagative growth
     * Reference in: /admin/template/dashboard.php
     *
     * @since    1.0.0
     * @param    float    $growth
     * @return   string
     */
    public static function get_growth_icon( $growth ) {
        if( $growth < 0 ) {
            return "dashicons-arrow-down-alt";
        }
        return "dashicons-arrow-up-alt";
    }

    /**
     * Return class for progress based on postive or nagative growth
     * Reference in: /admin/template/dashboard.php
     *
     * @since    1.0.0
     * @param    float    $growth
     * @return   string
     */
    public static function get_growth_class( $growth ) {
        if( $growth < 0 ) {
            return "nagative-progress";
        }
        return "positive-progress";
    }

    /**
     * Return directory path of partnero plugin.
     *
     * @since    1.0.0
     * @return   string
     */
    public static function get_plugin_directory() {
        return plugin_dir_path( dirname( __FILE__ ) );
    }

    /**
     * Return url for the partnero images folder.
     *
     * @since    1.0.0
     * @return   string
     */
    public static function get_image_url() {
        return plugin_dir_url( dirname( __FILE__ ) ) . '/images/';
    }

    /**
     * Checks if Partnero data like api_key and program_public_id is stored and not empty in the database.
     *
     * @since    1.0.0
     * @updated  2.0.0
     * @param    string $program_type  The type of program (e.g., affiliate or refer_a_friend).
     * @param    string $option_name  The specific option key (e.g., api_key, program_public_id).
     * @return   boolean              True if the option exists and is not empty, false otherwise.
     */
    public static function has_option( $program_type, $option_name ) {
        $option_value = self::get_option( $program_type, $option_name );

        return !empty($option_value);
    }

    /**
     * Retrieves the option key based on the specified option type.
     *
     * @since    2.0.0
     * @param    string $program_type  The type of program (e.g., affiliate or refer_a_friend).
     * @return   string|null           The option key if found, or null if the type is invalid.
     */
    public static function get_option_key( $program_type ) {
        if ( $program_type === self::TYPE_AFFILIATE ) {
            return 'partnero';
        } elseif ( $program_type === self::TYPE_REFER_A_FRIEND ) {
            return 'partnero_refer_a_friend';
        }
        return null;
    }

    /**
     * Retrieves the value of a specific Partnero option from the database.
     *
     * @since    2.0.0
     * @param    string $program_type  The type of program (e.g., affiliate or refer_a_friend).
     * @param    string $option_name  The specific option key (e.g., api_key, program_public_id).
     * @return   string|null          The option value if found, or null if not.
     */
    public static function get_option( $program_type, $option_name ) {
        $options = get_option( self::get_option_key( $program_type ), [] );

        return trim($options[$option_name] ?? '') ?? null;
    }

    /**
     * Retrieves the cookie name based on the specified option type.
     *
     * @since    2.0.0
     * @param    string $program_type The type of program to determine the corresponding cookie name.
     * @return   string|null The cookie name for the given option type.
     */
    public static function get_cookie_name( $program_type ) {
        if ( $program_type === self::TYPE_AFFILIATE ) {
            return 'partnero_partner';
        } elseif ( $program_type === self::TYPE_REFER_A_FRIEND ) {
            return 'partnero_referral';
        }
        return null;
    }

    /**
     * Gets partner key from cookie stored by universal js.
     *
     * @since    1.0.0
     * @updated  2.0.0
     * @return   string
     */
    public static function get_partner_key($program_type) {
        $cookie_name = self::get_cookie_name($program_type);

        if( is_null($cookie_name) || empty($_COOKIE[$cookie_name]) ) {
            return null;
        }
        return sanitize_text_field($_COOKIE[$cookie_name]);
    }

    /**
     * Gets partner key from session.
     *
     * @since    1.3.5
     * @updated  2.0.0
     * @param    $program_type
     * @return   string
     */
    public static function get_partner_key_from_session($program_type) {
        $session_key = self::get_cookie_name($program_type);
        $session = WC()->session;

        if ( is_null($session_key) || is_null($session) || !method_exists($session, 'get') ) {
            return;
        }

        $partnerKey = $session->get($session_key);
        if( empty($partnerKey) ) {
            return;
        }

        return sanitize_text_field($partnerKey);
    }

    /**
     * Sets partner key into session.
     *
     * @since    1.3.5
     * @updated  2.0.0
     * @param    $program_type
     * @param    string $value
     * @return   void
     */
    public static function set_partner_key_into_session($program_type, $value) {
        $session_key = self::get_cookie_name($program_type);
        $session = WC()->session;

        if ( is_null($session_key) || is_null($session) || !method_exists($session, 'set') || empty($value) ) {
            return;
        }

        $session->set($session_key, $value);
    }

    /**
     * Removes partner key from session.
     *
     * @since    1.3.5
     * @updated  2.0.0
     * @param    $program_type
     * @return   void
     */
    public static function remove_partner_key_from_session($program_type) {
        $session_key = self::get_cookie_name($program_type);
        $session = WC()->session;

        if ( is_null($session_key) || is_null($session) || !method_exists($session, '__unset') ) {
            return;
        }

        $session->__unset($session_key);
    }

    /**
     * Generates unique customer key to use in api from id provided.
     *
     * @param    string $program_type
     * @param    string $id
     * @return   string
     * @since    1.0.0
     * @updated  2.0.0
     */
    public static function get_customer_key( $program_type, $id ) {
        if( !Partnero_Util::has_option( $program_type, 'program_public_id' ) || empty( $id ) ) {
            return null;
        }
        return sanitize_text_field('wpc_'. Partnero_Util::get_option( $program_type, 'program_public_id' ) ."_{$id}");
    }

    /**
     * Generates unique transaction key to use in api from id provided.
     *
     * @since    1.0.0
     * @updated  2.0.0
     * @param    string $program_type
     * @param    string $id
     * @return   string
     */
    public static function get_transaction_key( $program_type, $id ) {
        if( !Partnero_Util::has_option( $program_type, 'program_public_id' ) || empty( $id ) ) {
            return null;
        }
        return sanitize_text_field('wpt_'. Partnero_Util::get_option( $program_type, 'program_public_id' ) ."_{$id}");
    }

    /**
     * @param int $batch_size
     * @param int $offset
     * @return array|object|stdClass[]|null
     */
    public static function get_woo_commerce_customers(int $batch_size, int $offset)
    {
        global $wpdb;

        return $wpdb->get_results(
            $wpdb->prepare(
                "SELECT customer_id AS id, 
                        email, 
                        first_name, 
                        last_name, 
                        date_registered
                 FROM wp_wc_customer_lookup
                 ORDER BY customer_id ASC 
                 LIMIT %d OFFSET %d",
                $batch_size,
                $offset
            ),
            ARRAY_A
        );
    }
}
