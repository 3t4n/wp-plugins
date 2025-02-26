<?php
/**
 * The dashboard-specific functionality of the plugin.
 *
 * @package    Appconsent_Cmp_Sfbx
 * @subpackage Appconsent_Cmp_Sfbx/admin
 * @author     Sfbx Team <dev-wp@sfbx.io>
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if (! class_exists('Appconsent_Cmp_Sfbx_Admin')) {
	class Appconsent_Cmp_Sfbx_Admin {

		/**
		 * The ID of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string    $plugin_name    The ID of this plugin.
		 */
		private $plugin_name;

		/**
		 * The version of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string    $version    The current version of this plugin.
		 */
		private $version;

		/**
		 * Initialize the class and set its properties.
		 *
		 * @since    1.0.0
		 * @param      string    $plugin_name       The name of this plugin.
		 * @param      string    $version    The version of this plugin.
		 */
		public function __construct( $plugin_name, $version ) {

			$this->plugin_name = $plugin_name;
			$this->version = $version;

		}

		/**
		 * Register the stylesheets for the admin area.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_styles() {

			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/appconsent-cmp-sfbx-admin.css', array(),  $this->version, 'all' );
			if( isset($_GET['page']) && $_GET['page'] == 'appconsent_cmp' ){
				wp_enqueue_style( $this->plugin_name.'select2', plugin_dir_url( __FILE__ ) . 'css/select2.min.css', array(), $this->version, 'all' );
			}

		}

		/**
		 * Register the JavaScript for the admin area.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_scripts() {

			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/appconsent-cmp-sfbx-admin.js', array( 'jquery' ), $this->version, false );
			if( isset($_GET['page']) && $_GET['page'] == 'appconsent_cmp' ){
				wp_enqueue_script( $this->plugin_name.'select2', plugin_dir_url( __FILE__ ) . 'js/select2.min.js', array( 'jquery' ), $this->version, false );
			}
		}

		/**
		 * Function for adding page menu to Wordpress dashboard for AppConsent CMP.
		 *
		 * @since    1.0.0
		 */
		public function add_sfbx_menu()
		{
			add_menu_page(
	            __( 'AppConsent CMP', "appconsent-cmp-sfbx" ),
	            __( 'AppConsent CMP', "appconsent-cmp-sfbx" ),
	            'manage_options',
	            'appconsent_cmp',
	            array(
	                $this,
	                'appconsent_cmp_settings_page'
	            ),
	            APPCONSENT_CMP_SFBX_URL.'/admin/images/Logo-SFBX-main.svg',
	            21
	        );
		}

		/**
		 * Callback Function of page 'AppConsent CMP' menu in Wordpress dashboard
		 *
		 * @since    1.0.0
		 */
		public function appconsent_cmp_settings_page()
		{
			if ( is_admin() ) {
				require APPCONSENT_CMP_SFBX_PATH . '/admin/templates/appconsent-cmp-sfbx-admin-display.php';
			}
		}

		public function sfbx_settings_link( $links ){
			$url = esc_url( add_query_arg(
				'page',
				'appconsent_cmp',
				get_admin_url() . 'admin.php'
			) );
			$settings_link = "<a href='$url'>" . esc_html__( 'Settings', "appconsent-cmp-sfbx" ) . '</a>';
			array_push(
				$links,
				$settings_link
			);
			return $links;
		}


		/**
		* Function for handle the plugin settings form data
		*
		* @since    1.0.0
		*/
		public function save_sfbx_settings() {
			if ( ! isset( $_POST['sfbxnoance'] ) || ! wp_verify_nonce( $_POST['sfbxnoance'], 'savesfbxact' ) ) {
			   	print 'Sorry, your nonce did not verify.';
			   	exit;
			} else {


				if( isset($_POST['sfbx_appkey']) && !empty($_POST['sfbx_appkey']) ){
					$sfbx_appkey = sanitize_text_field( $_POST['sfbx_appkey'] );
				}else{
					$sfbx_appkey = "";
				}

				if( isset($_POST['sfbx_forcegdpr']) && !empty($_POST['sfbx_forcegdpr']) ){
					$sfbx_forcegdpr = sanitize_text_field( $_POST['sfbx_forcegdpr'] );
				}else{
					$sfbx_forcegdpr = "";
				}

				if( isset($_POST['sfbx_pw_status']) && !empty($_POST['sfbx_pw_status']) ){
					$sfbx_pw_status = sanitize_text_field( $_POST['sfbx_pw_status'] );
				}else{
					$sfbx_pw_status = "";
				}

				if( isset($_POST['sfbx_debug_mode']) && !empty($_POST['sfbx_debug_mode']) ){
					$sfbx_debug_mode = sanitize_text_field( $_POST['sfbx_debug_mode'] );
				}else{
					$sfbx_debug_mode = "";
				}

				if( isset($_POST['sfwx_pw_position']) && !empty($_POST['sfwx_pw_position']) ){
					$sfwx_pw_position = sanitize_text_field( $_POST['sfwx_pw_position'] );
				}else{
					$sfwx_pw_position = "";
				}

				if( isset($_POST['sfwx_pwcolor']) && !empty($_POST['sfwx_pwcolor']) ){
					$sfwx_pwcolor = sanitize_text_field( $_POST['sfwx_pwcolor'] );
				}else{
					$sfwx_pwcolor = "";
				}

				if( isset($_POST['sfbx_pw_label']) && !empty($_POST['sfbx_pw_label']) ){
					$sfbx_pw_label = sanitize_text_field( $_POST['sfbx_pw_label'] );
				}else{
					$sfbx_pw_label = "";
				}	

				if( isset($_POST['sfwx_ux_temp']) && !empty($_POST['sfwx_ux_temp']) ){
					$sfwx_ux_temp = sanitize_text_field( $_POST['sfwx_ux_temp'] );
				}else{
					$sfwx_ux_temp = "";
				}	

				if( isset($_POST['sfbx_targetcountries']) && !empty($_POST['sfbx_targetcountries'] && is_array($_POST['sfbx_targetcountries'])) ){
					$sfbx_targetcountries  = array();
					foreach ($_POST['sfbx_targetcountries'] as $singleCountry) {
						$sfbx_targetcountries[] = sanitize_text_field( $singleCountry );
					}
				}else{
					$sfbx_targetcountries = "";
				}
				$sfbxData = array(
					"sfbx_appkey" 			=> $sfbx_appkey,
					"sfbx_forcegdpr" 		=> $sfbx_forcegdpr,
					"sfbx_targetcountries" 	=> $sfbx_targetcountries,
					"sfbx_pw_status" 		=> $sfbx_pw_status,
					"sfwx_pw_position" 		=> $sfwx_pw_position,
					"sfwx_pwcolor" 			=> $sfwx_pwcolor,
					"sfbx_pw_label" 		=> $sfbx_pw_label,
					"sfwx_ux_temp" 			=> $sfwx_ux_temp,
					"sfbx_debug_mode" 		=> $sfbx_debug_mode
				);

				update_option( 'sfbx_settings', $sfbxData );
			   	if( !empty($sfbx_appkey) ){
			   		if( ! $this->validate_sfbx_appkey($sfbx_appkey) ){
			   			update_option( 'sfbx_appkey_valid', '0' );
			   		}else{
			   			update_option( 'sfbx_appkey_valid', '1' );
			   		}
				}else{
					update_option( 'sfbx_appkey_valid', '0' );
					wp_redirect( admin_url('admin.php?page=appconsent_cmp&section=plugin-settings&appkey=empty') );
					exit();
				}
			    wp_redirect( admin_url('admin.php?page=appconsent_cmp&section=plugin-settings&saved=true') );
				exit();
			    
			}
			
		}

		/**
		* Function for validate the appKey with CURL request
		*
		* @since    1.0.0
		*/
		public function validate_sfbx_appkey( $appKey = null ){
			if( $appKey != null ){
				$body = '{ "app_key": "'.$appKey.'","uuid": "1fd9f267-7ef0-42e0-9b31-1ab97ec01973" }';
			    $args = array(
			        'method'      => 'POST',
			        'sslverify'   => false,
			        'headers'     => array(
			            'Content-Type'  => 'application/json',
			        ),
			        'body'        => $body,
			    );

			    $request = wp_remote_post( "https://collector.appconsent.io/hello", $args );

			    if ( is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) != 200 ) {
			    }else{
			    	$resp 		= wp_remote_retrieve_body( $request );
			    	$response 	= json_decode($resp, true);
			    	if( isset($response['cmp_hash']) && !empty($response['cmp_hash']) ){
						return true;
					}
			    }
			}
		    return false;
		}


		/**
		* Function for return allcountries name, alpha-2 format and country code
		*
		* @since    1.0.0
		*/
		public function sfbx_countries(){
			$allCountries = array(array("name"=>__("Afghanistan","appconsent-cmp-sfbx"),"alpha-2"=>"AF","country-code"=>"004"),
				array("name"=>__("Åland Islands","appconsent-cmp-sfbx"),"alpha-2"=>"AX","country-code"=>"248"),
				array("name"=>__("Albania","appconsent-cmp-sfbx"),"alpha-2"=>"AL","country-code"=>"008"),
				array("name"=>__("Algeria","appconsent-cmp-sfbx"),"alpha-2"=>"DZ","country-code"=>"012"),
				array("name"=>__("American Samoa","appconsent-cmp-sfbx"),"alpha-2"=>"AS","country-code"=>"016"),
				array("name"=>__("Andorra","appconsent-cmp-sfbx"),"alpha-2"=>"AD","country-code"=>"020"),
				array("name"=>__("Angola","appconsent-cmp-sfbx"),"alpha-2"=>"AO","country-code"=>"024"),
				array("name"=>__("Anguilla","appconsent-cmp-sfbx"),"alpha-2"=>"AI","country-code"=>"660"),
				array("name"=>__("Antarctica","appconsent-cmp-sfbx"),"alpha-2"=>"AQ","country-code"=>"010"),
				array("name"=>__("Antigua and Barbuda","appconsent-cmp-sfbx"),"alpha-2"=>"AG","country-code"=>"028"),
				array("name"=>__("Argentina","appconsent-cmp-sfbx"),"alpha-2"=>"AR","country-code"=>"032"),
				array("name"=>__("Armenia","appconsent-cmp-sfbx"),"alpha-2"=>"AM","country-code"=>"051"),
				array("name"=>__("Aruba","appconsent-cmp-sfbx"),"alpha-2"=>"AW","country-code"=>"533"),
				array("name"=>__("Australia","appconsent-cmp-sfbx"),"alpha-2"=>"AU","country-code"=>"036"),
				array("name"=>__("Austria","appconsent-cmp-sfbx"),"alpha-2"=>"AT","country-code"=>"040"),
				array("name"=>__("Azerbaijan","appconsent-cmp-sfbx"),"alpha-2"=>"AZ","country-code"=>"031"),
				array("name"=>__("Bahamas","appconsent-cmp-sfbx"),"alpha-2"=>"BS","country-code"=>"044"),
				array("name"=>__("Bahrain","appconsent-cmp-sfbx"),"alpha-2"=>"BH","country-code"=>"048"),
				array("name"=>__("Bangladesh","appconsent-cmp-sfbx"),"alpha-2"=>"BD","country-code"=>"050"),
				array("name"=>__("Barbados","appconsent-cmp-sfbx"),"alpha-2"=>"BB","country-code"=>"052"),
				array("name"=>__("Belarus","appconsent-cmp-sfbx"),"alpha-2"=>"BY","country-code"=>"112"),
				array("name"=>__("Belgium","appconsent-cmp-sfbx"),"alpha-2"=>"BE","country-code"=>"056"),
				array("name"=>__("Belize","appconsent-cmp-sfbx"),"alpha-2"=>"BZ","country-code"=>"084"),
				array("name"=>__("Benin","appconsent-cmp-sfbx"),"alpha-2"=>"BJ","country-code"=>"204"),
				array("name"=>__("Bermuda","appconsent-cmp-sfbx"),"alpha-2"=>"BM","country-code"=>"060"),
				array("name"=>__("Bhutan","appconsent-cmp-sfbx"),"alpha-2"=>"BT","country-code"=>"064"),
				array("name"=>__("Bolivia (Plurinational State of)","appconsent-cmp-sfbx"),"alpha-2"=>"BO","country-code"=>"068"),
				array("name"=>__("Bonaire, Sint Eustatius and Saba","appconsent-cmp-sfbx"),"alpha-2"=>"BQ","country-code"=>"535"),
				array("name"=>__("Bosnia and Herzegovina","appconsent-cmp-sfbx"),"alpha-2"=>"BA","country-code"=>"070"),
				array("name"=>__("Botswana","appconsent-cmp-sfbx"),"alpha-2"=>"BW","country-code"=>"072"),
				array("name"=>__("Bouvet Island","appconsent-cmp-sfbx"),"alpha-2"=>"BV","country-code"=>"074"),
				array("name"=>__("Brazil","appconsent-cmp-sfbx"),"alpha-2"=>"BR","country-code"=>"076"),
				array("name"=>__("British Indian Ocean Territory","appconsent-cmp-sfbx"),"alpha-2"=>"IO","country-code"=>"086"),
				array("name"=>__("Brunei Darussalam","appconsent-cmp-sfbx"),"alpha-2"=>"BN","country-code"=>"096"),
				array("name"=>__("Bulgaria","appconsent-cmp-sfbx"),"alpha-2"=>"BG","country-code"=>"100"),
				array("name"=>__("Burkina Faso","appconsent-cmp-sfbx"),"alpha-2"=>"BF","country-code"=>"854"),
				array("name"=>__("Burundi","appconsent-cmp-sfbx"),"alpha-2"=>"BI","country-code"=>"108"),
				array("name"=>__("Cabo Verde","appconsent-cmp-sfbx"),"alpha-2"=>"CV","country-code"=>"132"),
				array("name"=>__("Cambodia","appconsent-cmp-sfbx"),"alpha-2"=>"KH","country-code"=>"116"),
				array("name"=>__("Cameroon","appconsent-cmp-sfbx"),"alpha-2"=>"CM","country-code"=>"120"),
				array("name"=>__("Canada","appconsent-cmp-sfbx"),"alpha-2"=>"CA","country-code"=>"124"),
				array("name"=>__("Cayman Islands","appconsent-cmp-sfbx"),"alpha-2"=>"KY","country-code"=>"136"),
				array("name"=>__("Central African Republic","appconsent-cmp-sfbx"),"alpha-2"=>"CF","country-code"=>"140"),
				array("name"=>__("Chad","appconsent-cmp-sfbx"),"alpha-2"=>"TD","country-code"=>"148"),
				array("name"=>__("Chile","appconsent-cmp-sfbx"),"alpha-2"=>"CL","country-code"=>"152"),
				array("name"=>__("China","appconsent-cmp-sfbx"),"alpha-2"=>"CN","country-code"=>"156"),
				array("name"=>__("Christmas Island","appconsent-cmp-sfbx"),"alpha-2"=>"CX","country-code"=>"162"),
				array("name"=>__("Cocos (Keeling) Islands","appconsent-cmp-sfbx"),"alpha-2"=>"CC","country-code"=>"166"),
				array("name"=>__("Colombia","appconsent-cmp-sfbx"),"alpha-2"=>"CO","country-code"=>"170"),
				array("name"=>__("Comoros","appconsent-cmp-sfbx"),"alpha-2"=>"KM","country-code"=>"174"),
				array("name"=>__("Congo","appconsent-cmp-sfbx"),"alpha-2"=>"CG","country-code"=>"178"),
				array("name"=>__("Congo, Democratic Republic of the","appconsent-cmp-sfbx"),"alpha-2"=>"CD","country-code"=>"180"),
				array("name"=>__("Cook Islands","appconsent-cmp-sfbx"),"alpha-2"=>"CK","country-code"=>"184"),
				array("name"=>__("Costa Rica","appconsent-cmp-sfbx"),"alpha-2"=>"CR","country-code"=>"188"),
				array("name"=>__("Côte d'Ivoire","appconsent-cmp-sfbx"),"alpha-2"=>"CI","country-code"=>"384"),
				array("name"=>__("Croatia","appconsent-cmp-sfbx"),"alpha-2"=>"HR","country-code"=>"191"),
				array("name"=>__("Cuba","appconsent-cmp-sfbx"),"alpha-2"=>"CU","country-code"=>"192"),
				array("name"=>__("Curaçao","appconsent-cmp-sfbx"),"alpha-2"=>"CW","country-code"=>"531"),
				array("name"=>__("Cyprus","appconsent-cmp-sfbx"),"alpha-2"=>"CY","country-code"=>"196"),
				array("name"=>__("Czechia","appconsent-cmp-sfbx"),"alpha-2"=>"CZ","country-code"=>"203"),
				array("name"=>__("Denmark","appconsent-cmp-sfbx"),"alpha-2"=>"DK","country-code"=>"208"),
				array("name"=>__("Djibouti","appconsent-cmp-sfbx"),"alpha-2"=>"DJ","country-code"=>"262"),
				array("name"=>__("Dominica","appconsent-cmp-sfbx"),"alpha-2"=>"DM","country-code"=>"212"),
				array("name"=>__("Dominican Republic","appconsent-cmp-sfbx"),"alpha-2"=>"DO","country-code"=>"214"),
				array("name"=>__("Ecuador","appconsent-cmp-sfbx"),"alpha-2"=>"EC","country-code"=>"218"),
				array("name"=>__("Egypt","appconsent-cmp-sfbx"),"alpha-2"=>"EG","country-code"=>"818"),
				array("name"=>__("El Salvador","appconsent-cmp-sfbx"),"alpha-2"=>"SV","country-code"=>"222"),
				array("name"=>__("Equatorial Guinea","appconsent-cmp-sfbx"),"alpha-2"=>"GQ","country-code"=>"226"),
				array("name"=>__("Eritrea","appconsent-cmp-sfbx"),"alpha-2"=>"ER","country-code"=>"232"),
				array("name"=>__("Estonia","appconsent-cmp-sfbx"),"alpha-2"=>"EE","country-code"=>"233"),
				array("name"=>__("Eswatini","appconsent-cmp-sfbx"),"alpha-2"=>"SZ","country-code"=>"748"),
				array("name"=>__("Ethiopia","appconsent-cmp-sfbx"),"alpha-2"=>"ET","country-code"=>"231"),
				array("name"=>__("Falkland Islands (Malvinas)","appconsent-cmp-sfbx"),"alpha-2"=>"FK","country-code"=>"238"),
				array("name"=>__("Faroe Islands","appconsent-cmp-sfbx"),"alpha-2"=>"FO","country-code"=>"234"),
				array("name"=>__("Fiji","appconsent-cmp-sfbx"),"alpha-2"=>"FJ","country-code"=>"242"),
				array("name"=>__("Finland","appconsent-cmp-sfbx"),"alpha-2"=>"FI","country-code"=>"246"),
				array("name"=>__("France","appconsent-cmp-sfbx"),"alpha-2"=>"FR","country-code"=>"250"),
				array("name"=>__("French Guiana","appconsent-cmp-sfbx"),"alpha-2"=>"GF","country-code"=>"254"),
				array("name"=>__("French Polynesia","appconsent-cmp-sfbx"),"alpha-2"=>"PF","country-code"=>"258"),
				array("name"=>__("French Southern Territories","appconsent-cmp-sfbx"),"alpha-2"=>"TF","country-code"=>"260"),
				array("name"=>__("Gabon","appconsent-cmp-sfbx"),"alpha-2"=>"GA","country-code"=>"266"),
				array("name"=>__("Gambia","appconsent-cmp-sfbx"),"alpha-2"=>"GM","country-code"=>"270"),
				array("name"=>__("Georgia","appconsent-cmp-sfbx"),"alpha-2"=>"GE","country-code"=>"268"),
				array("name"=>__("Germany","appconsent-cmp-sfbx"),"alpha-2"=>"DE","country-code"=>"276"),
				array("name"=>__("Ghana","appconsent-cmp-sfbx"),"alpha-2"=>"GH","country-code"=>"288"),
				array("name"=>__("Gibraltar","appconsent-cmp-sfbx"),"alpha-2"=>"GI","country-code"=>"292"),
				array("name"=>__("Greece","appconsent-cmp-sfbx"),"alpha-2"=>"GR","country-code"=>"300"),
				array("name"=>__("Greenland","appconsent-cmp-sfbx"),"alpha-2"=>"GL","country-code"=>"304"),
				array("name"=>__("Grenada","appconsent-cmp-sfbx"),"alpha-2"=>"GD","country-code"=>"308"),
				array("name"=>__("Guadeloupe","appconsent-cmp-sfbx"),"alpha-2"=>"GP","country-code"=>"312"),
				array("name"=>__("Guam","appconsent-cmp-sfbx"),"alpha-2"=>"GU","country-code"=>"316"),
				array("name"=>__("Guatemala","appconsent-cmp-sfbx"),"alpha-2"=>"GT","country-code"=>"320"),
				array("name"=>__("Guernsey","appconsent-cmp-sfbx"),"alpha-2"=>"GG","country-code"=>"831"),
				array("name"=>__("Guinea","appconsent-cmp-sfbx"),"alpha-2"=>"GN","country-code"=>"324"),
				array("name"=>__("Guinea-Bissau","appconsent-cmp-sfbx"),"alpha-2"=>"GW","country-code"=>"624"),
				array("name"=>__("Guyana","appconsent-cmp-sfbx"),"alpha-2"=>"GY","country-code"=>"328"),
				array("name"=>__("Haiti","appconsent-cmp-sfbx"),"alpha-2"=>"HT","country-code"=>"332"),
				array("name"=>__("Heard Island and McDonald Islands","appconsent-cmp-sfbx"),"alpha-2"=>"HM","country-code"=>"334"),
				array("name"=>__("Holy See","appconsent-cmp-sfbx"),"alpha-2"=>"VA","country-code"=>"336"),
				array("name"=>__("Honduras","appconsent-cmp-sfbx"),"alpha-2"=>"HN","country-code"=>"340"),
				array("name"=>__("Hong Kong","appconsent-cmp-sfbx"),"alpha-2"=>"HK","country-code"=>"344"),
				array("name"=>__("Hungary","appconsent-cmp-sfbx"),"alpha-2"=>"HU","country-code"=>"348"),
				array("name"=>__("Iceland","appconsent-cmp-sfbx"),"alpha-2"=>"IS","country-code"=>"352"),
				array("name"=>__("India","appconsent-cmp-sfbx"),"alpha-2"=>"IN","country-code"=>"356"),
				array("name"=>__("Indonesia","appconsent-cmp-sfbx"),"alpha-2"=>"ID","country-code"=>"360"),
				array("name"=>__("Iran (Islamic Republic of)","appconsent-cmp-sfbx"),"alpha-2"=>"IR","country-code"=>"364"),
				array("name"=>__("Iraq","appconsent-cmp-sfbx"),"alpha-2"=>"IQ","country-code"=>"368"),
				array("name"=>__("Ireland","appconsent-cmp-sfbx"),"alpha-2"=>"IE","country-code"=>"372"),
				array("name"=>__("Isle of Man","appconsent-cmp-sfbx"),"alpha-2"=>"IM","country-code"=>"833"),
				array("name"=>__("Israel","appconsent-cmp-sfbx"),"alpha-2"=>"IL","country-code"=>"376"),
				array("name"=>__("Italy","appconsent-cmp-sfbx"),"alpha-2"=>"IT","country-code"=>"380"),
				array("name"=>__("Jamaica","appconsent-cmp-sfbx"),"alpha-2"=>"JM","country-code"=>"388"),
				array("name"=>__("Japan","appconsent-cmp-sfbx"),"alpha-2"=>"JP","country-code"=>"392"),
				array("name"=>__("Jersey","appconsent-cmp-sfbx"),"alpha-2"=>"JE","country-code"=>"832"),
				array("name"=>__("Jordan","appconsent-cmp-sfbx"),"alpha-2"=>"JO","country-code"=>"400"),
				array("name"=>__("Kazakhstan","appconsent-cmp-sfbx"),"alpha-2"=>"KZ","country-code"=>"398"),
				array("name"=>__("Kenya","appconsent-cmp-sfbx"),"alpha-2"=>"KE","country-code"=>"404"),
				array("name"=>__("Kiribati","appconsent-cmp-sfbx"),"alpha-2"=>"KI","country-code"=>"296"),
				array("name"=>__("Korea (Democratic People's Republic of)","appconsent-cmp-sfbx"),"alpha-2"=>"KP","country-code"=>"408"),
				array("name"=>__("Korea, Republic of","appconsent-cmp-sfbx"),"alpha-2"=>"KR","country-code"=>"410"),
				array("name"=>__("Kuwait","appconsent-cmp-sfbx"),"alpha-2"=>"KW","country-code"=>"414"),
				array("name"=>__("Kyrgyzstan","appconsent-cmp-sfbx"),"alpha-2"=>"KG","country-code"=>"417"),
				array("name"=>__("Lao People's Democratic Republic","appconsent-cmp-sfbx"),"alpha-2"=>"LA","country-code"=>"418"),
				array("name"=>__("Latvia","appconsent-cmp-sfbx"),"alpha-2"=>"LV","country-code"=>"428"),
				array("name"=>__("Lebanon","appconsent-cmp-sfbx"),"alpha-2"=>"LB","country-code"=>"422"),
				array("name"=>__("Lesotho","appconsent-cmp-sfbx"),"alpha-2"=>"LS","country-code"=>"426"),
				array("name"=>__("Liberia","appconsent-cmp-sfbx"),"alpha-2"=>"LR","country-code"=>"430"),
				array("name"=>__("Libya","appconsent-cmp-sfbx"),"alpha-2"=>"LY","country-code"=>"434"),
				array("name"=>__("Liechtenstein","appconsent-cmp-sfbx"),"alpha-2"=>"LI","country-code"=>"438"),
				array("name"=>__("Lithuania","appconsent-cmp-sfbx"),"alpha-2"=>"LT","country-code"=>"440"),
				array("name"=>__("Luxembourg","appconsent-cmp-sfbx"),"alpha-2"=>"LU","country-code"=>"442"),
				array("name"=>__("Macao","appconsent-cmp-sfbx"),"alpha-2"=>"MO","country-code"=>"446"),
				array("name"=>__("Madagascar","appconsent-cmp-sfbx"),"alpha-2"=>"MG","country-code"=>"450"),
				array("name"=>__("Malawi","appconsent-cmp-sfbx"),"alpha-2"=>"MW","country-code"=>"454"),
				array("name"=>__("Malaysia","appconsent-cmp-sfbx"),"alpha-2"=>"MY","country-code"=>"458"),
				array("name"=>__("Maldives","appconsent-cmp-sfbx"),"alpha-2"=>"MV","country-code"=>"462"),
				array("name"=>__("Mali","appconsent-cmp-sfbx"),"alpha-2"=>"ML","country-code"=>"466"),
				array("name"=>__("Malta","appconsent-cmp-sfbx"),"alpha-2"=>"MT","country-code"=>"470"),
				array("name"=>__("Marshall Islands","appconsent-cmp-sfbx"),"alpha-2"=>"MH","country-code"=>"584"),
				array("name"=>__("Martinique","appconsent-cmp-sfbx"),"alpha-2"=>"MQ","country-code"=>"474"),
				array("name"=>__("Mauritania","appconsent-cmp-sfbx"),"alpha-2"=>"MR","country-code"=>"478"),
				array("name"=>__("Mauritius","appconsent-cmp-sfbx"),"alpha-2"=>"MU","country-code"=>"480"),
				array("name"=>__("Mayotte","appconsent-cmp-sfbx"),"alpha-2"=>"YT","country-code"=>"175"),
				array("name"=>__("Mexico","appconsent-cmp-sfbx"),"alpha-2"=>"MX","country-code"=>"484"),
				array("name"=>__("Micronesia (Federated States of)","appconsent-cmp-sfbx"),"alpha-2"=>"FM","country-code"=>"583"),
				array("name"=>__("Moldova, Republic of","appconsent-cmp-sfbx"),"alpha-2"=>"MD","country-code"=>"498"),
				array("name"=>__("Monaco","appconsent-cmp-sfbx"),"alpha-2"=>"MC","country-code"=>"492"),
				array("name"=>__("Mongolia","appconsent-cmp-sfbx"),"alpha-2"=>"MN","country-code"=>"496"),
				array("name"=>__("Montenegro","appconsent-cmp-sfbx"),"alpha-2"=>"ME","country-code"=>"499"),
				array("name"=>__("Montserrat","appconsent-cmp-sfbx"),"alpha-2"=>"MS","country-code"=>"500"),
				array("name"=>__("Morocco","appconsent-cmp-sfbx"),"alpha-2"=>"MA","country-code"=>"504"),
				array("name"=>__("Mozambique","appconsent-cmp-sfbx"),"alpha-2"=>"MZ","country-code"=>"508"),
				array("name"=>__("Myanmar","appconsent-cmp-sfbx"),"alpha-2"=>"MM","country-code"=>"104"),
				array("name"=>__("Namibia","appconsent-cmp-sfbx"),"alpha-2"=>"NA","country-code"=>"516"),
				array("name"=>__("Nauru","appconsent-cmp-sfbx"),"alpha-2"=>"NR","country-code"=>"520"),
				array("name"=>__("Nepal","appconsent-cmp-sfbx"),"alpha-2"=>"NP","country-code"=>"524"),
				array("name"=>__("Netherlands","appconsent-cmp-sfbx"),"alpha-2"=>"NL","country-code"=>"528"),
				array("name"=>__("New Caledonia","appconsent-cmp-sfbx"),"alpha-2"=>"NC","country-code"=>"540"),
				array("name"=>__("New Zealand","appconsent-cmp-sfbx"),"alpha-2"=>"NZ","country-code"=>"554"),
				array("name"=>__("Nicaragua","appconsent-cmp-sfbx"),"alpha-2"=>"NI","country-code"=>"558"),
				array("name"=>__("Niger","appconsent-cmp-sfbx"),"alpha-2"=>"NE","country-code"=>"562"),
				array("name"=>__("Nigeria","appconsent-cmp-sfbx"),"alpha-2"=>"NG","country-code"=>"566"),
				array("name"=>__("Niue","appconsent-cmp-sfbx"),"alpha-2"=>"NU","country-code"=>"570"),
				array("name"=>__("Norfolk Island","appconsent-cmp-sfbx"),"alpha-2"=>"NF","country-code"=>"574"),
				array("name"=>__("North Macedonia","appconsent-cmp-sfbx"),"alpha-2"=>"MK","country-code"=>"807"),
				array("name"=>__("Northern Mariana Islands","appconsent-cmp-sfbx"),"alpha-2"=>"MP","country-code"=>"580"),
				array("name"=>__("Norway","appconsent-cmp-sfbx"),"alpha-2"=>"NO","country-code"=>"578"),
				array("name"=>__("Oman","appconsent-cmp-sfbx"),"alpha-2"=>"OM","country-code"=>"512"),
				array("name"=>__("Pakistan","appconsent-cmp-sfbx"),"alpha-2"=>"PK","country-code"=>"586"),
				array("name"=>__("Palau","appconsent-cmp-sfbx"),"alpha-2"=>"PW","country-code"=>"585"),
				array("name"=>__("Palestine, State of","appconsent-cmp-sfbx"),"alpha-2"=>"PS","country-code"=>"275"),
				array("name"=>__("Panama","appconsent-cmp-sfbx"),"alpha-2"=>"PA","country-code"=>"591"),
				array("name"=>__("Papua New Guinea","appconsent-cmp-sfbx"),"alpha-2"=>"PG","country-code"=>"598"),
				array("name"=>__("Paraguay","appconsent-cmp-sfbx"),"alpha-2"=>"PY","country-code"=>"600"),
				array("name"=>__("Peru","appconsent-cmp-sfbx"),"alpha-2"=>"PE","country-code"=>"604"),
				array("name"=>__("Philippines","appconsent-cmp-sfbx"),"alpha-2"=>"PH","country-code"=>"608"),
				array("name"=>__("Pitcairn","appconsent-cmp-sfbx"),"alpha-2"=>"PN","country-code"=>"612"),
				array("name"=>__("Poland","appconsent-cmp-sfbx"),"alpha-2"=>"PL","country-code"=>"616"),
				array("name"=>__("Portugal","appconsent-cmp-sfbx"),"alpha-2"=>"PT","country-code"=>"620"),
				array("name"=>__("Puerto Rico","appconsent-cmp-sfbx"),"alpha-2"=>"PR","country-code"=>"630"),
				array("name"=>__("Qatar","appconsent-cmp-sfbx"),"alpha-2"=>"QA","country-code"=>"634"),
				array("name"=>__("Réunion","appconsent-cmp-sfbx"),"alpha-2"=>"RE","country-code"=>"638"),
				array("name"=>__("Romania","appconsent-cmp-sfbx"),"alpha-2"=>"RO","country-code"=>"642"),
				array("name"=>__("Russian Federation","appconsent-cmp-sfbx"),"alpha-2"=>"RU","country-code"=>"643"),
				array("name"=>__("Rwanda","appconsent-cmp-sfbx"),"alpha-2"=>"RW","country-code"=>"646"),
				array("name"=>__("Saint Barthélemy","appconsent-cmp-sfbx"),"alpha-2"=>"BL","country-code"=>"652"),
				array("name"=>__("Saint Helena, Ascension and Tristan da Cunha","appconsent-cmp-sfbx"),"alpha-2"=>"SH","country-code"=>"654"),
				array("name"=>__("Saint Kitts and Nevis","appconsent-cmp-sfbx"),"alpha-2"=>"KN","country-code"=>"659"),
				array("name"=>__("Saint Lucia","appconsent-cmp-sfbx"),"alpha-2"=>"LC","country-code"=>"662"),
				array("name"=>__("Saint Martin (French part)","appconsent-cmp-sfbx"),"alpha-2"=>"MF","country-code"=>"663"),
				array("name"=>__("Saint Pierre and Miquelon","appconsent-cmp-sfbx"),"alpha-2"=>"PM","country-code"=>"666"),
				array("name"=>__("Saint Vincent and the Grenadines","appconsent-cmp-sfbx"),"alpha-2"=>"VC","country-code"=>"670"),
				array("name"=>__("Samoa","appconsent-cmp-sfbx"),"alpha-2"=>"WS","country-code"=>"882"),
				array("name"=>__("San Marino","appconsent-cmp-sfbx"),"alpha-2"=>"SM","country-code"=>"674"),
				array("name"=>__("Sao Tome and Principe","appconsent-cmp-sfbx"),"alpha-2"=>"ST","country-code"=>"678"),
				array("name"=>__("Saudi Arabia","appconsent-cmp-sfbx"),"alpha-2"=>"SA","country-code"=>"682"),
				array("name"=>__("Senegal","appconsent-cmp-sfbx"),"alpha-2"=>"SN","country-code"=>"686"),
				array("name"=>__("Serbia","appconsent-cmp-sfbx"),"alpha-2"=>"RS","country-code"=>"688"),
				array("name"=>__("Seychelles","appconsent-cmp-sfbx"),"alpha-2"=>"SC","country-code"=>"690"),
				array("name"=>__("Sierra Leone","appconsent-cmp-sfbx"),"alpha-2"=>"SL","country-code"=>"694"),
				array("name"=>__("Singapore","appconsent-cmp-sfbx"),"alpha-2"=>"SG","country-code"=>"702"),
				array("name"=>__("Sint Maarten (Dutch part)","appconsent-cmp-sfbx"),"alpha-2"=>"SX","country-code"=>"534"),
				array("name"=>__("Slovakia","appconsent-cmp-sfbx"),"alpha-2"=>"SK","country-code"=>"703"),
				array("name"=>__("Slovenia","appconsent-cmp-sfbx"),"alpha-2"=>"SI","country-code"=>"705"),
				array("name"=>__("Solomon Islands","appconsent-cmp-sfbx"),"alpha-2"=>"SB","country-code"=>"090"),
				array("name"=>__("Somalia","appconsent-cmp-sfbx"),"alpha-2"=>"SO","country-code"=>"706"),
				array("name"=>__("South Africa","appconsent-cmp-sfbx"),"alpha-2"=>"ZA","country-code"=>"710"),
				array("name"=>__("South Georgia and the South Sandwich Islands","appconsent-cmp-sfbx"),"alpha-2"=>"GS","country-code"=>"239"),
				array("name"=>__("South Sudan","appconsent-cmp-sfbx"),"alpha-2"=>"SS","country-code"=>"728"),
				array("name"=>__("Spain","appconsent-cmp-sfbx"),"alpha-2"=>"ES","country-code"=>"724"),
				array("name"=>__("Sri Lanka","appconsent-cmp-sfbx"),"alpha-2"=>"LK","country-code"=>"144"),
				array("name"=>__("Sudan","appconsent-cmp-sfbx"),"alpha-2"=>"SD","country-code"=>"729"),
				array("name"=>__("Suriname","appconsent-cmp-sfbx"),"alpha-2"=>"SR","country-code"=>"740"),
				array("name"=>__("Svalbard and Jan Mayen","appconsent-cmp-sfbx"),"alpha-2"=>"SJ","country-code"=>"744"),
				array("name"=>__("Sweden","appconsent-cmp-sfbx"),"alpha-2"=>"SE","country-code"=>"752"),
				array("name"=>__("Switzerland","appconsent-cmp-sfbx"),"alpha-2"=>"CH","country-code"=>"756"),
				array("name"=>__("Syrian Arab Republic","appconsent-cmp-sfbx"),"alpha-2"=>"SY","country-code"=>"760"),
				array("name"=>__("Taiwan, Province of China","appconsent-cmp-sfbx"),"alpha-2"=>"TW","country-code"=>"158"),
				array("name"=>__("Tajikistan","appconsent-cmp-sfbx"),"alpha-2"=>"TJ","country-code"=>"762"),
				array("name"=>__("Tanzania, United Republic of","appconsent-cmp-sfbx"),"alpha-2"=>"TZ","country-code"=>"834"),
				array("name"=>__("Thailand","appconsent-cmp-sfbx"),"alpha-2"=>"TH","country-code"=>"764"),
				array("name"=>__("Timor-Leste","appconsent-cmp-sfbx"),"alpha-2"=>"TL","country-code"=>"626"),
				array("name"=>__("Togo","appconsent-cmp-sfbx"),"alpha-2"=>"TG","country-code"=>"768"),
				array("name"=>__("Tokelau","appconsent-cmp-sfbx"),"alpha-2"=>"TK","country-code"=>"772"),
				array("name"=>__("Tonga","appconsent-cmp-sfbx"),"alpha-2"=>"TO","country-code"=>"776"),
				array("name"=>__("Trinidad and Tobago","appconsent-cmp-sfbx"),"alpha-2"=>"TT","country-code"=>"780"),
				array("name"=>__("Tunisia","appconsent-cmp-sfbx"),"alpha-2"=>"TN","country-code"=>"788"),
				array("name"=>__("Turkey","appconsent-cmp-sfbx"),"alpha-2"=>"TR","country-code"=>"792"),
				array("name"=>__("Turkmenistan","appconsent-cmp-sfbx"),"alpha-2"=>"TM","country-code"=>"795"),
				array("name"=>__("Turks and Caicos Islands","appconsent-cmp-sfbx"),"alpha-2"=>"TC","country-code"=>"796"),
				array("name"=>__("Tuvalu","appconsent-cmp-sfbx"),"alpha-2"=>"TV","country-code"=>"798"),
				array("name"=>__("Uganda","appconsent-cmp-sfbx"),"alpha-2"=>"UG","country-code"=>"800"),
				array("name"=>__("Ukraine","appconsent-cmp-sfbx"),"alpha-2"=>"UA","country-code"=>"804"),
				array("name"=>__("United Arab Emirates","appconsent-cmp-sfbx"),"alpha-2"=>"AE","country-code"=>"784"),
				array("name"=>__("United Kingdom of Great Britain and Northern Ireland","appconsent-cmp-sfbx"),"alpha-2"=>"GB","country-code"=>"826"),
				array("name"=>__("United States of America","appconsent-cmp-sfbx"),"alpha-2"=>"US","country-code"=>"840"),
				array("name"=>__("United States Minor Outlying Islands","appconsent-cmp-sfbx"),"alpha-2"=>"UM","country-code"=>"581"),
				array("name"=>__("Uruguay","appconsent-cmp-sfbx"),"alpha-2"=>"UY","country-code"=>"858"),
				array("name"=>__("Uzbekistan","appconsent-cmp-sfbx"),"alpha-2"=>"UZ","country-code"=>"860"),
				array("name"=>__("Vanuatu","appconsent-cmp-sfbx"),"alpha-2"=>"VU","country-code"=>"548"),
				array("name"=>__("Venezuela (Bolivarian Republic of)","appconsent-cmp-sfbx"),"alpha-2"=>"VE","country-code"=>"862"),
				array("name"=>__("Viet Nam","appconsent-cmp-sfbx"),"alpha-2"=>"VN","country-code"=>"704"),
				array("name"=>__("Virgin Islands (British)","appconsent-cmp-sfbx"),"alpha-2"=>"VG","country-code"=>"092"),
				array("name"=>__("Virgin Islands (U.S.)","appconsent-cmp-sfbx"),"alpha-2"=>"VI","country-code"=>"850"),
				array("name"=>__("Wallis and Futuna","appconsent-cmp-sfbx"),"alpha-2"=>"WF","country-code"=>"876"),
				array("name"=>__("Western Sahara","appconsent-cmp-sfbx"),"alpha-2"=>"EH","country-code"=>"732"),
				array("name"=>__("Yemen","appconsent-cmp-sfbx"),"alpha-2"=>"YE","country-code"=>"887"),
				array("name"=>__("Zambia","appconsent-cmp-sfbx"),"alpha-2"=>"ZM","country-code"=>"894"),
				array("name"=>__("Zimbabwe","appconsent-cmp-sfbx"),"alpha-2"=>"ZW","country-code"=>"716")
						);
			return $allCountries;
		}

	}
}