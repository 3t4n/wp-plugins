<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Feather_POLPB_AdminClass {

	function __construct(){

		$this->_init();
		$this->_hooks();
		$this->_filters();

	}

	function _init(){
		
	}

	function _hooks(){

		add_action('admin_menu',array($this,'register_admin_menu_pages') );

		add_action( 'admin_enqueue_scripts', array( $this, 'load_editor_scripts' ));


		//ajax hooks
		add_action( 'wp_ajax_polpb_save_options', array( $this,'polpb_save_options') );

	}

	function _filters(){
		


	}


	function load_editor_scripts(){

		global $pagenow;
		$screen_id = get_current_screen();

		if ($screen_id->id == 'toplevel_page_plbp_feather-login-page') {


			$featherLoginPluginInfo = get_plugin_data( FPOLPB_PLUGIN_PATH.'/feather-login-page.php', false, true );

			if ( !isset($featherLoginPluginInfo['Version']) ) {

				$featherLoginPluginInfo['Version'] = '1.0.2';

			}

			$featherLoginPluginVersion = $featherLoginPluginInfo['Version'];


			if ( is_plugin_active('feather-login-page-pro/login-pro.php') ){
				$featherLoginProActive = 'true';
			}else{
				$featherLoginProActive = 'true';
			}


			wp_enqueue_script('jquery');

			wp_enqueue_script( 'jquery-ui-core' );

			wp_enqueue_script( 'jquery-ui-tooltip' );

			wp_enqueue_script( 'jquery-ui-slider' );

			wp_enqueue_script( 'jquery-ui-accordion' );

			wp_enqueue_script( 'jquery-ui-datepicker' );

			wp_enqueue_script( 'jquery-ui-button' );

			wp_enqueue_script( 'jquery-ui-tabs' );

			wp_enqueue_script( 'jquery-ui-draggable' );

			wp_enqueue_script( 'jquery-ui-resizable' );

			wp_enqueue_script( 'jquery-ui-droppable' );

			wp_enqueue_script( 'jquery-ui-sortable' );

			wp_enqueue_script( 'jquery-ui-progressbar' );

			wp_enqueue_script( 'jquery-ui-effects' );

			wp_enqueue_script( 'media-upload');

			wp_enqueue_script( 'underscore');

			wp_enqueue_media();

			wp_enqueue_style( 'login' );



			wp_enqueue_script( 'plbp_login-default-ops', FPOLPB_PLUGIN_URL.'/admin/scripts/default-ops.js', array( 'jquery' ), $featherLoginPluginVersion, true );


			wp_enqueue_script( 'plbp_login-load-template', FPOLPB_PLUGIN_URL.'/admin/scripts/load-template.js', array( 'jquery' ), $featherLoginPluginVersion, true );

			
			wp_enqueue_script( 'plbp_login-editor-ui', FPOLPB_PLUGIN_URL.'/admin/scripts/editor-ui.js', array( 'jquery', 'media-upload' ), $featherLoginPluginVersion, true );


			wp_enqueue_script( 'plbp_login-undoRedo', FPOLPB_PLUGIN_URL.'/admin/scripts/undo-redo.js', array( 'jquery' ), $featherLoginPluginVersion, true );


			wp_enqueue_script( 'plbp_login-editor', FPOLPB_PLUGIN_URL.'/admin/scripts/editor.js', array( 'jquery' ), $featherLoginPluginVersion, true );


			wp_enqueue_script( 'plbp_login-update', FPOLPB_PLUGIN_URL.'/admin/scripts/update.js', array( 'jquery' ), $featherLoginPluginVersion, true );


			wp_enqueue_script( 'plbp_login-render', FPOLPB_PLUGIN_URL.'/admin/scripts/render.js', array( 'jquery' ), $featherLoginPluginVersion, true );


			wp_enqueue_script( 'plbp_login-colorpicker-script', FPOLPB_PLUGIN_URL.'/admin/libraries/color/alpha-picker.js', array( 'jquery' ), $featherLoginPluginVersion, true );


			wp_enqueue_script( 'plbp_login-font-picker-script', FPOLPB_PLUGIN_URL.'/admin/libraries/font-picker.js', array( 'jquery' ), $featherLoginPluginVersion, true );


			wp_enqueue_script( 'plbp_login-webfontjs-script', FPOLPB_PLUGIN_URL.'/admin/libraries/webfont.js', array( 'jquery' ), $featherLoginPluginVersion, true );


			wp_register_script( 'plbp_login-ajaxRequests', FPOLPB_PLUGIN_URL.'/admin/scripts/ajax-requests.js', array( 'jquery' ), $featherLoginPluginVersion, true );

			wp_enqueue_script( 'popb_fajs', FPOLPB_PLUGIN_URL.'/admin/libraries/fa.js', array( 'jquery' ), $featherLoginPluginVersion, true );

			$plbp__options_nonce = wp_create_nonce( 'POLPB_options_nonce' );

			wp_localize_script( 
				'plbp_login-ajaxRequests',
				'polpb_ajaxData_array',
				array( 
					'ajaxurlMain' => admin_url('admin-ajax.php?action=polpb_save_options&POLPB_options_nonce='.$plbp__options_nonce ),
					'isFeatherPremActive' => $featherLoginProActive,
				)
			);

			wp_enqueue_script( 'plbp_login-ajaxRequests' );

			wp_enqueue_style( 'plbp_login-jqueryUI-style', FPOLPB_PLUGIN_URL.'/admin/libraries/jquery/jquery-ui.css' );


			wp_enqueue_style( 'plbp_login-editor-styles', FPOLPB_PLUGIN_URL.'/admin/styles/editor-styles.css', array(), $featherLoginPluginVersion );


			wp_enqueue_style( 'plbp_login-colorPicker-style', FPOLPB_PLUGIN_URL.'/admin/libraries/color/spectrum.css' );


			wp_enqueue_style( 'plbp_login-font-picker-style', FPOLPB_PLUGIN_URL.'/admin/libraries/font-picker.css' );

		}
			

	}


	function register_admin_menu_pages(){

		add_menu_page( 
			'Feather Login Designer',
			 __('Feather Login Designer','feather-login-page') ,
			 'activate_plugins',
			 'plbp_feather-login-page',
			 array($this,'plbp__login_builder_editor'),
			 $icon_url = FPOLPB_PLUGIN_URL.'/admin/images/icons/feather-transparent.png',
			 $position = null 
		);

		add_submenu_page( 'plbp_feather-login-page', "PluginOps Feather Login Dashboard", "Dashboard", "edit_pages", 'plpb_feather-login-page-dashboard', array($this,'login_page_dashboard_page'), null );

	}


	function plbp__login_builder_editor(){

		include_once(FPOLPB_PLUGIN_PATH.'/admin/views/editor-wrapper.php');


	}


	function login_page_dashboard_page(){
		include_once(FPOLPB_PLUGIN_PATH.'/admin/views/dashboard-page.php');
	}




	function polpb_save_options(){

		if( current_user_can('delete_users') ) {

			$nonce = $_REQUEST['POLPB_options_nonce'];
			if ( ! wp_verify_nonce( $nonce, 'POLPB_options_nonce' ) ) {
				die( 'Invalid Nonce' ); 
			}else{


				$requestMethod = $_SERVER['REQUEST_METHOD'];
				if (isset($_SERVER['HTTP_METHOD'])) {
					$requestMethod = $_SERVER['HTTP_METHOD'];
				}



				function polpb_strip($string, $allowed_tags = NULL){

					if (is_array($string)){

					   	foreach ($string as $k => $v){
					        $string[$k] = polpb_strip($v, $allowed_tags);
					    }
					    return $string;

					}

					$allowed_tagskses = array(
					    'a' => array(
					        'href' => array(),
					        'title' => array()
					    ),
					    'br' => array(),
					    'em' => array(),
					    'strong' => array(),
					);

					return wp_kses($string, $allowed_tagskses );
					    
				}


				if($requestMethod == 'GET') {
					
					// delete_option( 'plbp__login_builder_options_data' );
					// delete_option( 'plbp__login_builder_options_data_mobile' );


					$data = polpb_strip( get_option( 'plbp__login_builder_options_data', false ) );

					$dataMobile = polpb_strip( get_option('plbp__login_builder_options_data_mobile'), false );

					$data = array($data, $dataMobile);

			   		echo json_encode( $data );
			   		
			   		exit();
				} elseif($requestMethod == 'PUT') {
				} elseif ($requestMethod == 'POST') {


					$data = polpb_strip($_REQUEST['updatedOptions']);

					$dataMobile = polpb_strip($_REQUEST['mobileOptions']);

					if (isset($data['recaptcha'])) {
						update_option( 'plbp_login_builder_recaptcha_data',$data['recaptcha'], null );
					}
					
					$data = apply_filters( 'fpolpb_modify_options_data_before_save' , $data );

					$dataMobile = apply_filters( 'fpolpb_modify_options_data_before_save' , $dataMobile );	

					update_option( 'plbp__login_builder_options_data', $data, null );

					update_option( 'plbp__login_builder_options_data_mobile', $dataMobile, null );

					do_action( "fpolpb_after_options_saved", $data );

					$dataTest = get_option( 'plbp__login_builder_options_data', false );

					if (!empty($dataTest)) {
						echo json_encode( 'Data Saved' );
					}else{
						echo "Not Saved";
					}

			   		exit();
				}


			}
		}

	}



	function wpdocs_my_login_redirect( $url, $request, $user ) {
	    if ( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
	        if ( $user->has_cap( 'administrator' ) ) {
	            $url = admin_url();
	        } else {
	            $url = home_url( '/members-only/' );
	        }
	    }
	    return $url;
	}





}