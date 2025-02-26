<?php
namespace DevToWP;

defined( 'ABSPATH' ) || die();
/**
 * Sending request and getting data from the source
 *
 * @package DevToWP
 */

class Engine {

    public static $data;

    public static function dev_to_get_posts($user_name) {
        $transient_key = 'devto_wp-' . $user_name;
        $data = get_transient($transient_key);

        if ( $data === false ) {
            $request = wp_remote_get('https://dev.to/api/articles?username=' . trim($user_name));

            if( is_wp_error( $request ) ) {
                return false;
            }
            $body = wp_remote_retrieve_body( $request );
            $data = json_decode( $body, true );
            set_transient( $transient_key, $data, MINUTE_IN_SECONDS );
        }
        if ( !empty( $data ) ) {
            self::$data = $data;
        }
        return $data;
    }

}
