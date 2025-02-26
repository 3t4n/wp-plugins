<?php
namespace Elvez;

class AuthUtil {
   /**
	 * Create and set auth token.
	 *
	 * @since   1.0.0
     * @return  string  token hash
	 */
	static public function create_token( $user_id, $token_meta_key, $expiration_meta_key, $expiration_min=10 ) {
		$time = time();
		$has_key = wp_generate_password( 16, false );
		$hash_string = $user_id . $has_key . $time;

        $token = wp_hash( $hash_string );
        $expiration = $time + ( 60 * $expiration_min );
		$stored_value = wp_hash_password( $token . $expiration );

		update_user_meta( $user_id, $token_meta_key, $stored_value );
		update_user_meta( $user_id, $expiration_meta_key , $expiration );

		return $token;
    }

   /**
	 * Verify auth token.
	 *
	 * @since   1.0.0
     * @params  $user_id                int
     * @params  $token                  string
     * @params  $token_meta_key         string
     * @params  $expiration_meta_key    string
     * @return  bool    result of verify
	 */
	static public function verify_token( $user_id, $token, $token_meta_key, $expiration_meta_key ) {

        $token_meta = get_user_meta( $user_id, $token_meta_key, true);
        $expiration_meta = get_user_meta( $user_id, $expiration_meta_key, true);
        $value = $token . $expiration_meta;
        $time = time();

        /**
         * トークンと有効期限が存在するか
         * トークンが正しいか
         * トークンが有効期限内か
         *
         * 検証に成功すればトークン情報を削除してtrueを返す
         * 失敗した場合はfalseを返す
         *
         */

        if ( $token_meta && $expiration_meta && wp_check_password($value, $token_meta) && $time < $expiration_meta ) {

            delete_user_meta( $user_id, $token_meta_key );
            delete_user_meta( $user_id, $expiration_meta_key );
            return true;

        } else {

            return false;

        }
    }
}