<?php
namespace Elvez;

/**
 * Version 1.0.6
 */
class SubscriptionAPI {
	/**
	 * 翻訳テキストドメイン
	 *
	 * @since    1.0.0
	 */
	const TEXT_DOMAIN = 'elvez-subscription-api';
	/**
	 * サブスクリプションAPIのエンドポイント
	 *
	 * @since    1.0.0
	 */
	const API_ENDPOINT = 'https://shop.elvez.co.jp';
	//const API_ENDPOINT = 'http://192.168.3.2:8888'; // development
	/**
	 * APIリクエストのメールアドレスパラメータ
	 * @since	1.0.0
	 */
	const REQUEST_PARAM_EMAIL = 'Jp6BTiUb';
	/**
	 * APIリクエストのサブスクリプションIDパラメータ
	 * @since	1.0.3
	 */
	const REQUEST_PARAM_SUBSCRIPTION = 'jdM07eQi';
	/**
	 * DEPRECATED
	 * APIリクエストのサブスクリプション商品IDパラメータ
	 * @since	1.0.0
	 * @since	1.0.3 DEPRECATED
	 */
	const REQUEST_PARAM_PRODUCT = 'i9HWEV2b';
	/**
	 * APIリクエストのドメインパラメータ
	 * @since	1.0.0
	 */
	const REQUEST_PARAM_DOMAIN = 'sg0YBew9';
	/**
	 * ステータス更新のアクションフック
	 * @since	1.0.1
	 */
	const GET_STATUS_ACTION_HOOK = 'elvez_subscription_api_get_status';
	/**
	 * ドメイン登録のアクションフック
	 * @since	1.0.2
	 */
	const REGISTER_DOMAIN_ACTION_HOOK = 'elvez_subscription_api_register_domain';
	/**
	 * ドメイン登録解除のアクションフック
	 * @since	1.0.2
	 */
	const DEREGISTER_DOMAIN_ACTION_HOOK = 'elvez_subscription_api_deregister_domain';
	/**
	 * ステータス更新の定期実行イベント名
	 * @since	1.0.1
	 */
	const GET_STATUS_SCHEDULE_EVENT = 'elvez_subscription_api_get_status_event';
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
		 * 翻訳ドメイン登録
		 */
		add_action( 'plugins_loaded', [$this, 'load_textdomain'] );
		/**
		 * スクリプト登録
		 */
		add_action( 'init', [$this, 'register_dependencies'] );
		add_action( 'admin_enqueue_scripts', [$this, 'enqueue_scripts'] );
		// API登録
		$this->api_actions = array(
			array( 'elvez_subscription_api_get_status', 'ELVEZ_SUBSCRIPTION_API_GET_STATUS', 'handle_ajax_elvez_subscription_api_get_status' ),
			array( 'elvez_subscription_api_register_domain', 'ELVEZ_SUBSCRIPTION_API_REGISTER_DOMAIN', 'handle_ajax_elvez_subscription_api_register_domain' ),
			array( 'elvez_subscription_api_deregister_domain', 'ELVEZ_SUBSCRIPTION_API_DEREGISTER_DOMAIN', 'handle_ajax_elvez_subscription_api_deregister_domain' ),
		);
		add_action( 'init', [$this, 'register_api_actions'] );
		add_action( 'admin_enqueue_scripts', [$this, 'register_ajax_scripts'] );
		add_action( 'admin_enqueue_scripts', [$this, 'register_form_text'] );
		/**
		 * Cron登録
		 */
		$event = self::GET_STATUS_SCHEDULE_EVENT;
		if (! wp_next_scheduled ( $event )) {
			wp_schedule_event( time(), 'twicedaily', $event );
		}
	}
    /**
     * Return singleton instance.
     *
     * @since   1.0.0
     * @return  self
     */
    public static function get_instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
		}
        return self::$_instance;
	}
	/**
	 * Load language files.
	 *
	 * @since	1.0.4
	 */
	function load_textdomain() {
		load_plugin_textdomain(
			self::TEXT_DOMAIN,
			false,
			dirname( plugin_basename( __FILE__ ) ) . '/languages/'
		);
	}
	/**
	 * Get registered version of script or style.
	 * 指定キーのスクリプトまたはスタイルが登録されていたらそのバージョン番号を返す
	 * 登録されていない場合は '0' を返す
	 *
	 * @since	1.0.4
	 * @param	$key	string
	 * @param	$type	string	'scripts' | 'styles'
	 * @return	$ver	string	Version string
	 */
	public static function get_registered_version( $key, $type='scripts') {
		$not_registerd_ver = '0';
		if ( $type == 'scripts' ) {
			$dependencies = wp_scripts();
		} else if ( $type == 'styles' ) {
			$dependencies = wp_styles();
		} else {
			return $not_registerd_ver;
		}
		if ( isset( $dependencies->registered[$key] ) ) {
			$registerd = $dependencies->registered[$key];
			return $registerd->ver;
		} else {
			return $not_registerd_ver;
		}
	}
	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since	1.0.4
	 */
	public function register_dependencies() {
		/*
		$tag = 'vue';
		$version = '2.6.12';
		$registered_ver = self::get_registered_version( $tag, 'scripts' );
		if ( version_compare( $version, $registered_ver, '>' ) ) {
			wp_scripts()->remove( $tag );
			wp_register_script( $tag, plugin_dir_url( __FILE__ ) . 'js/elvez-subscription-api.js', array( 'jquery', 'vue', 'axios' ), $version, false );
		}
		*/


		$tag = 'elvez-subscription-api';
		$version = '1.0.3';
		$registered_ver = self::get_registered_version( $tag, 'scripts' );
		if ( version_compare( $version, $registered_ver, '>' ) ) {
			wp_scripts()->remove( $tag );
			wp_register_script( $tag, plugin_dir_url( __FILE__ ) . 'js/elvez-subscription-api.js', array( 'jquery', 'vue', 'axios' ), $version, false );
		}
	}
	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.4
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( 'vue', plugin_dir_url( dirname( dirname( __FILE__ ) ) ) . 'vuejs/vue.min.js' , array( 'jquery' ), null, false );
		wp_enqueue_script( 'axios', plugin_dir_url( dirname( dirname( __FILE__ ) ) ) . 'vuejs/axios.min.js' , array( 'jquery' ), null, false );
		wp_enqueue_script( 'elvez-subscription-api' );
	}
	/**
	 * Register actions for APIs.
	 *
	 * @since	1.0.0
	 */
	function register_api_actions() {
		foreach( $this->api_actions as $args ) {
			$action = $args[0];
			$callback = $args[2];
			add_action( 'wp_ajax_' . $action, [$this, $callback] );
		}
	}
	/**
	 * Register ajax API scripts.
	 *
	 * @since     1.0.0
	 */
	function register_ajax_scripts() {
		foreach( $this->api_actions as $args ) {
			$action = $args[0];
			$var_name = $args[1];
			wp_localize_script( 'jquery', $var_name, [
				'api'    => admin_url( 'admin-ajax.php' ),
				'action' => $action,
				'nonce'  => wp_create_nonce( $action )
			]);
		}
	}
	/**
	 * Register text for subscription form.
	 *
	 * @since     1.0.5
	 */
	function register_form_text() {
		$var_name = 'ELVEZ_SUBSCRIPTION_API_FORM_TEXT';
		$text_args = array(
			'register_button_text' => __( 'Register Domain', self::TEXT_DOMAIN ),
			'deregister_button_text' => __( 'Deregister Domain', self::TEXT_DOMAIN ),
			'subscribe_link_text' => __( 'Subscribe from this page.', self::TEXT_DOMAIN ),
			'contact_link_text' => __( 'Contact', self::TEXT_DOMAIN ),
			'sent_confirm_email_message' => __( 'A confirmation email was sent to you. Please follow the contents of the email to complete the update.', self::TEXT_DOMAIN ),
			'failed_confirm_email_message' => __( 'Failed to send a confirmation email. Please check your email address and subscription id.', self::TEXT_DOMAIN ),
			'get_failed' => __( 'Communication failed.', self::TEXT_DOMAIN ),
			'now_confirming' => __( 'Checking the subscription...', self::TEXT_DOMAIN ),
			'enabled_and_registered' => __( 'Your subscription is active.', self::TEXT_DOMAIN ),
			'enabled_but_in_used' => __( 'Your subscription is active but another site domain has been registered.', self::TEXT_DOMAIN ),
			'enabled_but_not_registered' => __( 'Your subscription is active but you need to register this site domain.', self::TEXT_DOMAIN ),
			'subscription_not_found' => __( 'Your active subscription was not found.', self::TEXT_DOMAIN ),
		);
		$text_args = apply_filters( 'elvez_subscription_api_register_form_text', $text_args );
		wp_localize_script( 'jquery', $var_name, $text_args);
	}
	/**
	 * Return site domain.
	 * @since 1.0.0
	 */
	public static function get_site_domain() {
        $domain = get_site_url();
        $domain = str_replace('http://', '', $domain);
		$domain = str_replace('https://', '', $domain);
		return $domain;
	}

	/**
	 *  API handler.
	 *
	 * @since     1.0.0
	 */
	function handle_ajax_elvez_subscription_api_get_status() {
		$action = 'elvez_subscription_api_get_status';
		// Validate request
		if( !check_ajax_referer( $action, 'nonce', false ) ) {
			status_header( '403' );
			exit();
		}
		$data = array();
		if( isset($_POST['email']) && isset($_POST['product_id']) && isset($_POST['subscription_id']) ) {
			$email = esc_attr( $_POST['email'] );
			$product_id = esc_attr( $_POST['product_id'] );
			$subscription_id = esc_attr( $_POST['subscription_id'] );

			$result = $this->get_subscription_status( $email, $product_id, $subscription_id );
			if ( $result && isset( $result['status'] ) ) {
				$data['status'] = $result['status'];
				$data['domain'] = $result['domain'];
				$data['is_registered'] = $result['is_registered'];
				$data['result'] = $result['result'];
			} else {
				$data['result'] = 'FAILURE';
			}
		} else {
			status_header( '401' );
			exit();
		}
		header( 'Content-Type: application/json; charset=UTF-8' );
		echo json_encode($data);
		exit();
	}
	/**
	 *  API handler.
	 *
	 * @since     1.0.0
	 */
	function handle_ajax_elvez_subscription_api_register_domain() {
		$action = 'elvez_subscription_api_register_domain';
		// Validate request
		if( !check_ajax_referer( $action, 'nonce', false ) ) {
			status_header( '403' );
			exit();
		}
		$data = array();
		if( isset($_POST['email']) && $_POST['email'] && isset($_POST['product_id']) && isset($_POST['subscription_id']) ) {
			$email = esc_attr( $_POST['email'] );
			$product_id = esc_attr( $_POST['product_id'] );
			$subscription_id = esc_attr( $_POST['subscription_id'] );
			$domain = self::get_site_domain();

			$result = $this->register_domain( $email, $product_id, $subscription_id, $domain );
			if ( $result && !is_wp_error( $result ) && isset( $result['result'] ) ) {
				$data['result'] = $result['result'];
			} else {
				$data['result'] = 'FAILURE';
			}
		} else {
			status_header( '401' );
			exit();
		}
		header( 'Content-Type: application/json; charset=UTF-8' );
		echo json_encode($data);
		exit();
	}
	/**
	 *  API handler.
	 *
	 * @since     1.0.0
	 */
	function handle_ajax_elvez_subscription_api_deregister_domain() {
		$action = 'elvez_subscription_api_deregister_domain';
		// Validate request
		if( !check_ajax_referer( $action, 'nonce', false ) ) {
			status_header( '403' );
			exit();
		}
		$data = array();
		if( isset($_POST['email']) && $_POST['email'] && isset($_POST['product_id']) && isset($_POST['subscription_id']) ) {
			$email = esc_attr( $_POST['email'] );
			$product_id = esc_attr( $_POST['product_id'] );
			$subscription_id = esc_attr( $_POST['subscription_id'] );

			$result = $this->deregister_domain( $email, $product_id, $subscription_id );
			if ( $result && !is_wp_error( $result ) && isset( $result['result'] ) ) {
				$data['result'] = $result['result'];
			} else {
				$data['result'] = 'FAILURE';
			}
		} else {
			status_header( '401' );
			exit();
		}
		header( 'Content-Type: application/json; charset=UTF-8' );
		echo json_encode($data);
		exit();
	}

    /**
	 * Send API request.
	 *
	 * @since    1.0.0
     * @return  arry  result of API
	 */
	public function do_request($url, $args, $method='get', $uid=null) {
        $header = array(
            //'Authorization: Token ' . $this->auth_token,
            'Content-Type: application/json',
        );

        //$params = self::get_params($uid);
        //$params = array_merge( $params, $args );
        $params = $args;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

        if ( $method == 'post' ) {
            curl_setopt( $curl, CURLOPT_POST, true );
			curl_setopt( $curl, CURLOPT_POSTFIELDS, json_encode($params) );
			// POSTの場合もAPIルートだけはURLに含める
			$url = $url . '?rest_route=' . $params['rest_route'];
        } else {
            $url = $url . '?' . http_build_query($params);
		}

        curl_setopt($curl, CURLOPT_URL, $url );
		$res = curl_exec($curl);
		curl_close($curl);

        try {
			$result = json_decode( $res, true );
        } catch ( Exception $e ) {
            $result = WP_Error( $e->getMessage() );
        }

        return $result;
    }
    /**
	 * Request subscription status API.
	 * 取得結果のドメインを比較して、登録済みかどうか付け足す
	 * アクションフック用にプロダクトIDとメールドレスを付け足す
	 *
	 * @since    1.0.0
     * @return  arry  response of API and registered flag.
	 */
	public function get_subscription_status( $email, $product_id, $subscription_id ) {
		$route = '/elvez_subscription_manager/get_status';

        $url = self::API_ENDPOINT;
        $args = array(
			'rest_route' => $route,
			self::REQUEST_PARAM_EMAIL => $email,
			self::REQUEST_PARAM_PRODUCT => $product_id,
			self::REQUEST_PARAM_SUBSCRIPTION => $subscription_id,
		);
		$result = self::do_request( $url, $args, 'get' );
		if ( is_wp_error( $result ) ) {
			// TODO: handle WP Error
		} else {
			if ( $result['domain'] == self::get_site_domain() ) {
				$result['is_registered'] = true;
			} else {
				$result['is_registered'] = false;
			}
			$result['email'] = $email;
			$result['product_id'] = $product_id;
			$result['subscription_id'] = $subscription_id;
		}
		do_action( self::GET_STATUS_ACTION_HOOK, $result );
		return $result;
	}
    /**
	 * Request register domain API.
	 *
	 * @since    1.0.0
     * @return  arry  response of API
	 */
	public function register_domain( $email, $product_id, $subscription_id, $domain ) {
		$route = '/elvez_subscription_manager/register_domain';

        $url = self::API_ENDPOINT;
        $args = array(
			'rest_route' => $route,
			self::REQUEST_PARAM_EMAIL => $email,
			self::REQUEST_PARAM_PRODUCT => $product_id,
			self::REQUEST_PARAM_SUBSCRIPTION => $subscription_id,
			self::REQUEST_PARAM_DOMAIN => $domain,
		);
        $result = self::do_request( $url, $args, 'post' );
        if ( is_wp_error( $result ) ) {
			// TODO handle WP Error
		} else {
			$result['email'] = $email;
			$result['product_id'] = $product_id;
			$result['subscription_id'] = $subscription_id;
		}
		do_action( self::REGISTER_DOMAIN_ACTION_HOOK, $result );
		return $result;
}
    /**
	 * Request deregister domain API.
	 *
	 * @since    1.0.0
     * @return  arry  response of API
	 */
	public function deregister_domain( $email, $product_id, $subscription_id ) {
		$route = '/elvez_subscription_manager/deregister_domain';

        $url = self::API_ENDPOINT;
        $args = array(
			'rest_route' => $route,
			self::REQUEST_PARAM_EMAIL => $email,
			self::REQUEST_PARAM_PRODUCT => $product_id,
			self::REQUEST_PARAM_SUBSCRIPTION => $subscription_id,
		);
        $result = self::do_request( $url, $args, 'post' );
        if ( is_wp_error( $result ) ) {
			// TODO handle WP Error
		} else {
			$result['email'] = $email;
			$result['product_id'] = $email;
			$result['subscription_id'] = $subscription_id;
		}
		do_action( self::DEREGISTER_DOMAIN_ACTION_HOOK, $result );
		return $result;
	}

	/**
	 * Return Subscription form title
	 *
	 * @since	1.1.0
	 * @return	string	$title	A string of subscription form title
	 */
	public function get_subscription_form_title() {
		$title = __( 'Subscription', self::TEXT_DOMAIN );
		return apply_filters( 'elvez_subscription_api_get_subscription_form_title', $title );
	}

	/**
	 * Render html form to set subscription email;
	 *
	 * @since	1.0.0
	 * @param	array	$args
	 */
	public function render_register_form( $args ) {
		$email_opt_name = $args['email_opt_name'];
		$email = $args['email'];
		$product_id = $args['product_id'];
		$subscription_id_opt_name = $args['subscription_id_opt_name'];
		$subscription_id = $args['subscription_id'];
		$subscribe_url = $args['subscribe_url'];
		$email_placeholder = __( 'email', self::TEXT_DOMAIN );
		$subscription_placeholder = __( 'only number', self::TEXT_DOMAIN );
		$form_title = $this->get_subscription_form_title();
		?>
		<style>
			.elv-need-subscribe:disabled + .elv-subscribe-icon:before {
				font-family: 'dashicons';
				content: '\f160';
			}
		</style>
		<h2><?php echo esc_html( $form_title ); ?></h2>
		<div id="elvez-subscription-api-form"
			data-email="<?php echo esc_attr( $email ); ?>"
			data-product_id="<?php echo esc_attr( $product_id ); ?>"
			data-subscription_id="<?php echo esc_attr( $subscription_id ); ?>"
			data-subscribe_url="<?php echo esc_attr( $subscribe_url ); ?>"
			>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Subscribed Account', self::TEXT_DOMAIN ); ?></th>
					<td>
						<input type="email" size=30
							name="<?php echo esc_attr( $email_opt_name ); ?>"
							v-model="email"
							placeholder="<?php echo esc_attr( $email_placeholder ); ?>"/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Subscription ID', self::TEXT_DOMAIN ); ?></th>
					<td>
						<input type="number" min=1
							name="<?php echo esc_attr( $subscription_id_opt_name ); ?>"
							v-model="subscription_id"
							placeholder="<?php echo esc_attr( $subscription_placeholder ); ?>"/>
						<input type="button"
							class="register-button button"
							:value="button_text"
							v-on:click="is_registered ? deregister_domain() : register_domain() "/>
					</td>
				</tr>
			</table>
			<p class="description">
				<span>{{ message }}</span>
				<a v-if="!is_subscribed"
					:href="subscribe_url"
					target="_blank"
					>{{ subscribe_link_text }}</a>
			</p>
			<p class="description">{{ notification }}</p>
			<a :href="contact_url"
					target="_blank"
					>{{ contact_link_text }}</a>
		</div>
		<?php
	}

}