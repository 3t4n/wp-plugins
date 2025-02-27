<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Create Import Image from Instagram
 * Class WOO_F_LOOKBOOK_Admin_Instagram
 */
class WOO_F_LOOKBOOK_Admin_Instagram {
	protected static $setting,$api_ver = 'v21.0';
	protected static $app_id,$app_secret,$link_call_back, $cache = [], $data = null;

	public function __construct() {
		add_action( 'admin_init', array( $this, 'save_fb_info' ) );
		self::$setting = WOO_F_LOOKBOOK_Data::get_instance();
		self::$app_id = self::$setting->get_params('ins_client_id');
		self::$app_secret = self::$setting->get_params('ins_client_secret');
	}
	public static function check_token_live( $token ) {
		if (!$token || !self::$app_id || !self::$app_secret){
			return false;
		}
		if (!isset(self::$cache['token_live'])){
			self::$cache['token_live'] = [];
		}
		if (!isset(self::$cache['token_live'][$token])){
			$key = 'viwlb_check_token_live_'.self::$app_id.'_'.self::$app_secret;
			$tmp = get_transient($key);
			$checked = $tmp[$token]??'';
			if (!$checked){
				delete_transient($key);
				$tmp = [];
				$checked = $tmp[$token] = self::fb_request([
					'input_token'=>$token,
					'access_token'=>self::$app_id.'|'.self::$app_secret
				],'https://graph.facebook.com/'.self::$api_ver.'/debug_token');
				set_transient($key, $tmp, 600);
			}
			self::$cache['token_live'][$token] = $checked;
		}
		$token_live_data = self::$cache['token_live'][$token];
		$is_valid = false;
		if (!empty($token_live_data['data']['is_valid'])){
			$is_valid = true;
		}
		return $is_valid ;
	}
	public function save_fb_info() {
		self::$link_call_back = add_query_arg(
			array(
				'post_type' => 'woocommerce-lookbook',
				'page'      => 'woocommerce-lookbook-settings#/instagram'
			),
			admin_url( 'edit.php' )
		);
		if (!isset( $_GET['page'] ) || 'woocommerce-lookbook-settings' !== wc_clean(wp_unslash($_GET['page'] )) ){
			return;
		}
		if (!isset( $_GET['page'] ) || 'woocommerce-lookbook-settings' !== wc_clean(wp_unslash($_GET['page'] )) ){
			return;
		}
		$access_token = isset($_GET['access_token']) ? wc_clean(wp_unslash($_GET['access_token'])) :'';
		if (!$access_token){
			return;
		}
		$token_data = $this->get_token($access_token);
		if (!empty($token_data['data'][0])){
			$tmp = $token_data['data'][0];
			$arg = [
				'ins_business_account'=> !empty($tmp['instagram_business_account']['id']) ? $tmp['instagram_business_account']['id'] :'',
				'ins_access_token'=> $tmp['access_token']??'',
				'ins_page_id'=> $tmp['id']??'',
			];
			update_option( 'woo_lookbook_params', wp_parse_args($arg, self::$setting->get_params()) );
		}
		wp_safe_redirect( self::$link_call_back );
		exit();
	}
	public function get_token($access_token) {
		if (!$access_token || !self::$app_id || !self::$app_secret || !self::$link_call_back){
			return false;
		}
		$long_lived_token = self::fb_request([
			'grant_type'=>'fb_exchange_token',
			'client_id'=>self::$app_id,
			'client_secret'=>self::$app_secret,
			'fb_exchange_token'=>$access_token,
		],'https://graph.facebook.com/'.self::$api_ver.'/oauth/access_token');
		$result = self::fb_request([
			'fields'=>implode(',',['id', 'name','access_token','instagram_business_account']),
			'access_token'=> !empty($long_lived_token['access_token']) ? $long_lived_token['access_token']: $access_token,
		]);
		return $result;
	}
	public static function fb_request( $params,$api_url = '',$endpoint='' ) {
		try {
			$url          = add_query_arg( array_map( 'urlencode', $params ), $api_url ?: ('https://graph.facebook.com/'.self::$api_ver.($endpoint?:'/me/accounts')) );
			$request = wp_remote_get( $url );
			if ( ! is_wp_error( $request ) ) {
				$body = wp_remote_retrieve_body( $request );
				return json_decode( $body, true );
			} else {
				return false;
			}
		} catch ( \Exception $e ) {
			return false;
		}
	}
	public static function get_link_login( $call='',$permissions = '' ) {
		if (!self::$app_id  || !self::$app_secret){
			return '';
		}
		if ( empty( $call ) ) {
			$call = 'https://www.facebook.com/'.self::$api_ver.'/dialog/oauth';
		}
		if ( empty( $permissions ) ) {
			$permissions = [
				'instagram_manage_insights',
				'business_management',
				'instagram_manage_comments',
				'instagram_basic',
				'pages_show_list',
				'pages_read_engagement'
			];
		}
		$params = [
			'client_id'=>self::$app_id,
			'display'=>'page',
			'extras'=>'{"setup":{"channel":"IG_API_ONBOARDING"}}',
			'response_type'=>'token',
			'redirect_uri'=>self::$link_call_back,
			'scope'=>implode(',',$permissions),
		];
		$login_url = add_query_arg(array_map( 'urlencode', $params ), $call);

		return $login_url;
	}

	/**
	 * Import Lookbook
	 * @return bool
	 */
	public static function import( $cache = true ) {
		if (self::$data === null){
			self::$data = get_transient( 'wlb_instagram_data' );
		}
		if (!self::$data || !$cache){
			$error = '';
			self::$data = self::get_instagram_data($error);
			if (!is_array(self::$data) || empty(self::$data)){
				if ( wp_doing_ajax()) {
					wp_send_json_error( $error ?: __('Can not get the image. Please try again later.'), 'woo-lookbook'  );
				}
				return;
			}
			set_transient( 'wlb_instagram_data', self::$data , self::$setting->get_params('ins_schedule') );
		}
		$post_status = 'pending';
		$ins_duplicate = self::$setting->get_params('ins_duplicate');
		foreach ( self::$data as $image ) {
			$tmp = wp_parse_args($image,[
				'caption'=> '',
				'like_count'=> 0,
				'comments_count'=> 0,
				'media_url'=> '',
				'permalink'=> '',
				'id'=> '',
				'timestamp'=> '',
			]);
			if (empty($tmp['id']) || empty($tmp['permalink'])|| empty($tmp['permalink'])){
				continue;
			}
			$shortcode = str_replace( '/', '', str_replace( 'https://www.instagram.com/p/', '', $tmp['permalink'] ) );
			$post_id   = self::check_duplicate( $shortcode );
			if ( $ins_duplicate == 1 || ! $post_id ) {
				$thumb_id = self::upload_image( $tmp['media_url'], $shortcode );
				if ( ! $thumb_id ) {
					continue;
				}
				$post_arg = array( // Set up the basic post data to insert for our lookbook
					'post_status' => $post_status,
					'post_title'  => $tmp['caption'] ,
					'post_type'   => 'woocommerce-lookbook',
					'post_date'   => $tmp['timestamp']
				);
				$post_id = wp_insert_post( $post_arg ); // Insert the post returning the new post id
				if ( ! $post_id ) {
					return false;
				}
				$metabox = array(
					'image'     => $thumb_id,
					'instagram' => "1",
					'code'      => $shortcode,
					'date'      => $tmp['timestamp'],
					'comments'  => $tmp['comments_count'] ,
					'likes'     => $tmp['like_count'],
				);
				update_post_meta( $post_id, 'wlb_params', $metabox );
			} elseif ( $post_id && $ins_duplicate == 2 ) {
				$metabox             = get_post_meta( $post_id, 'wlb_params', true );
				if (!is_array($metabox)){
					$metabox = [];
				}
				$metabox['comments'] = $tmp['comments_count'];
				$metabox['likes']    = $tmp['like_count'];
				update_post_meta( $post_id, 'wlb_params', $metabox );
			}
		}
		if ( wp_doing_ajax() ) {
			wp_send_json_success();
		}
	}
	/**
	 * Upload image
	 *
	 * @param $url
	 *
	 * @return int|object
	 */
	protected static function upload_image( $url, $desc = '' ) {
		//https://coursesweb.net/forum/php-get-image-data-from-url-and-display-t108.htm
		//https://stackoverflow.com/questions/35542640/using-php-for-file-upload-in-wordpress
		preg_match( '/[^\?]+\.(jpg|JPG|jpeg|JPEG|jpe|JPE|gif|GIF|png|PNG|webp|WEBP)/', $url, $matches );
		if (!is_array($matches) || empty($matches)){
			return '';
		}
		//add product image:
		if ( ! function_exists( 'media_handle_upload' ) ) {
			require_once( ABSPATH . "wp-admin" . '/includes/image.php' );
			require_once( ABSPATH . "wp-admin" . '/includes/file.php' );
			require_once( ABSPATH . "wp-admin" . '/includes/media.php' );
		}
		// Download file to temp location
		$tmp                    = download_url( $url );
		$img_name = trim(wp_parse_url($url)['path']??'','/');
		if ($img_name){
			$img_name = str_replace('/','-',$img_name);
			$img_name = substr($img_name,0,strpos($img_name,$matches[1]));
		}
		if (!$img_name){
			$img_name = basename( $matches[0] );
			$img_name = substr($img_name,0,strpos($img_name,$matches[1])).time();
		}
		$file_array['name']     = apply_filters( 'viwlb_upload_image_file_name', $img_name.$matches[1] ,$desc);
		$file_array['tmp_name'] = $tmp;

		// If error storing temporarily, unlink
		if ( is_wp_error( $tmp ) ) {
			if ( is_string( $file_array['tmp_name'] ) ) {
				wp_delete_file( $file_array['tmp_name'] );
			}
		}
		//use media_handle_sideload to upload img:
		$thumbid = media_handle_sideload( $file_array, '', $desc );
		// If error storing permanently, unlink
		if ( is_wp_error( $thumbid ) ) {
			if ( is_string( $file_array['tmp_name'] ) ) {
				wp_delete_file( $file_array['tmp_name'] );
			}
		}

		return $thumbid;
	}
	/**
	 * Check post duplicate
	 *
	 * @param $code
	 *
	 * @return bool
	 */
	protected static function check_duplicate( $code ) {
		if (!isset(self::$cache['check_duplicate'])){
			self::$cache['check_duplicate'] = [];
		}
		if (isset(self::$cache['check_duplicate'][$code])){
			return self::$cache['check_duplicate'][$code];
		}
		$posts = get_posts([
			'post_type'   => 'woocommerce-lookbook',
			'fields'   => 'ids',
			'post_status'   => [
				'any',
				'auto-draft',
				'trash',
			],
			'meta_query' => array(
				array(
					'key' => 'wlb_params',
					'value' => $code,
					'compare' => 'LIKE'
				)
			)
		]);
		return $posts[0]??'';
	}
	public static function get_instagram_data(&$error) {
		$access_token = self::$setting->get_params('ins_access_token');
		if ( ! $access_token ) {
			$error = esc_html__( 'Access token is not exist', 'woo-lookbook' );
			return '';
		}
		$check_token = self::check_token_live($access_token);
		if (!$check_token){
			$error = esc_html__( 'Access token is expired', 'woo-lookbook' );
			return '';
		}
		$id = self::$setting->get_params('ins_business_account');//instagram_business_account
		if (!$id){
			$ins_page_id = self::$setting->get_params('ins_page_id');
			if ($ins_page_id){
				$result = self::fb_request([
					'fields'=>'instagram_business_account',
					'access_token'=> $access_token,
				],'https://graph.facebook.com/'.$ins_page_id);
				if (!empty($result['instagram_business_account']['id'])){
					$arg = [
						'ins_business_account'=> $result['instagram_business_account']['id'],
					];
					$id = $arg['ins_business_account'];
					update_option( 'woo_lookbook_params', wp_parse_args($arg, self::$setting->get_params()) );
				}
			}
		}
		if ( ! $id ) {
			$error = esc_html__( 'Instagram id is not exist', 'woo-lookbook' );
			return '';
		}
		$arg = [
			'fields'=>'caption,like_count,media_url,comments_count,permalink,username,timestamp',
			'access_token'=> $access_token,
		];
		$arg['limit'] = 8;
		$result = self::fb_request($arg,'',"/{$id}/media");
		return $result['data'] ??'';
	}
}