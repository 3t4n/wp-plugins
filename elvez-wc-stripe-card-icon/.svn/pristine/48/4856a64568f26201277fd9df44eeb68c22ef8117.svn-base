<?php
namespace Elvez;

use Aws\Sns\SnsClient as SnsClient;

/**
 * Version 1.0.1
 */
class PhoneNumberUtil {
	/**
	 * 翻訳テキストドメイン
	 *
	 * @since    1.0.0
	 */
	const TEXT_DOMAIN = 'elvez_phone_number_util';

	/**
	 * 携帯番号のユーザメタフィールド
	 *
	 * @since    1.0.0
	 */
	const USER_META_PHONE_NUMBER = 'elv_phone_number';

	/**
	 * The singletone instance
	 *
	 * @since    1.0.0
	 */
	protected static $_instance = null;

	/**
	 * The datetime format
	 *
	 * @since    1.0.0
	 */
	protected static $_format = 'Y-m-d H:i:s';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		/**
		 * プロフィールに携帯番号を追加
		 */
		add_action('show_user_profile', [$this, 'add_phone_number_field'] );
		add_action('edit_user_profile', [$this, 'add_phone_number_field'] );
		add_action('personal_options_update', [$this, 'save_phone_number_field'] );
		add_action('edit_user_profile_update', [$this, 'save_phone_number_field'] );

	}

    /**
     * Return singleton instance.
     *
     * @since   1.0.1
     * @return  PhoneNumberUtil
     */
    public static function get_instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

	/**
	 * Show phone number field in profile page.
	 * @param $user	WP_User
	 * @since 1.0.0
	 */
	function add_phone_number_field( $user ) {
		?>
		<h2><?php esc_html_e( 'Elvez Plugins', self::TEXT_DOMAIN ); ?></h2>
		<table class="form-table">
			<tr>
				<th scope="row"><?php esc_html_e( 'Mobile Phone Number', self::TEXT_DOMAIN ); ?></th>
				<td>
					<input type="tel"
						name="<?php echo esc_attr( self::USER_META_PHONE_NUMBER ); ?>"
						value="<?php echo esc_attr( get_user_meta( $user->ID, self::USER_META_PHONE_NUMBER, true ) ); ?>" />
					<p class="description"><?php esc_html_e( 'Should be able to receive SMS.' , self::TEXT_DOMAIN); ?></p>
				</td>
			</tr>
		</table>
		<?php
	}

    /**
     * Set phone number in number
     * @since 1.0.0
     * @param	$user_id	int
     */
    function save_phone_number_field( $user_id ) {
        if (! current_user_can('edit_user', $user_id))
            return false;

        $value = sanitize_key( $_POST[self::USER_META_PHONE_NUMBER] );

        // FIXME: should be validate to unique
        update_user_meta( $user_id, self::USER_META_PHONE_NUMBER, $value);
    }

	/**
	 * Get user by phone number
	 *
	 * @since	1.0.0
	 * @param	$phone_number	string
	 * @return	WP_USER
	 */
	function get_user_by_phone_number( $phone_number ) {
		if ( !$phone_number ) {
			return false;
		}

		$meta_key = self::USER_META_PHONE_NUMBER;

		$args = array(
			'meta_key' => $meta_key,
			'meta_value' => $phone_number
		);
		$users = get_users( $args );

		if ( count($users) == 1 ) {
			return $users[0];
		} else {
			return false;
		}
	}

	/**
	 * Get phone number from user meta
	 *
	 * @since	1.0.0
	 * @param	$user_id	int
	 * @return	$phone_number	string
	 */
	static public function get_phone_number( $user_id ) {
		$meta_key = self::USER_META_PHONE_NUMBER;
		return get_user_meta( $user_id, $meta_key, true);
	}

	/**
	 * Update phone number from user meta
	 *
	 * @since	1.0.1
	 * @param	$user_id	int
	 * @param	$value			string Phone Number
	 * @return	$phone_number	string
	 */
	public function update_phone_number( $user_id, $value ) {
		$meta_key = self::USER_META_PHONE_NUMBER;
		return update_user_meta( $user_id, $meta_key, $value);
	}

	/**
	 * Get amazon sns client
	 *
	 * @since	1.0.0
	 * @param	$credentials	array
	 */
	static public function get_sms_client( $credentials ) {

        $region = $credentials['region'];
        $key = $credentials['key'];
        $secret = $credentials['secret'];

        $version = '2010-03-31';
		$SnSclient = new SnsClient([
			'region' => $region,
			'version' => $version,
			'credentials' => array(
                'key' => $key,
                'secret' => $secret,
            ),
		]);
		return $SnSclient;
	}

	/**
	 * Send SMS
	 *
	 * @since	1.0.0
     * @param   $credentials    array
     *      array(
	 *		    'key' => string,
     *		    'secret' => string,
     *          'region' => string,
	 *	    );
	 * @param	$phone_number	string
	 * @param	$message		string
     * @param   $sender_id      string
     * @return  $result         bool | WP_Error
	 */
	static public function send_sms( $credentials, $phone_number, $message, $sender_id=null ) {

		$client = self::get_sms_client( $credentials );

		/**
		 * 送信の設定
		 */
		$sms_type = 'Transactional';
		$message_attrs = array(
			'AWS.SNS.SMS.SMSType' => array(
				'DataType' => 'String',
				'StringValue' => $sms_type,
			),
		);
		if ( $sender_id ) {
			$message_attrs['AWS.SNS.SMS.SenderID'] = array(
				'DataType' => 'String',
				'StringValue' => $sender_id,
			);
		}

		$country_code = '+81'; // FIXME
		$args = array(
			'MessageAttributes' => $message_attrs,
			'Message' => $message,
			'PhoneNumber' => $country_code . $phone_number,
		);
		try {
			$client->publish($args);
			$result = true;
		} catch (Aws\AwsException | Aws\Sns\Exception\SnsException $e) {
			error_log( $e );
			$result = WP_Error( $e );
		}
		return $result;

	}

}