<?php
require_once(plugin_dir_path(__FILE__) . 'wbs-config.php');
require_once(plugin_dir_path(__FILE__).'Api.class.php');
require_once(plugin_dir_path(__FILE__).'Widget.class.php');
require_once(plugin_dir_path(__FILE__).'vc_addons.php');
/**
 * The Plugin class.
 */
 
class WBS_Plugin {
    
    private $options = array();
    private $frontendUrl;
    private $gratisUrl;
    
    /**
     * Constructor, hook to actions ...
     */
    public function __construct() {
		
        add_action('wp_logout', array( $this, 'myEndSession'), 1 );
		add_action('wp_login', array( $this, 'myEndSession'), 1 );
		add_action('init', array($this, 'init'));
        add_shortcode('wbsf', array($this, 'wbs_shortcode'));
		
		if ( is_admin() ) {
            add_action( 'admin_init', array($this, 'admin_init') );
            add_action( 'admin_menu', array($this, 'admin_menu') );
            add_action( 'admin_notices', array($this, 'admin_notices') );
            add_action( 'admin_enqueue_scripts', array($this, 'admin_enqueue_scripts') );
			add_action( "wp_ajax_wbs_install", array( $this, "post_install" ) );
			add_action( "wp_ajax_wbs_login", array( $this, "ajax_wbs_login" ) );
			add_action( "wp_ajax_wbs_update_forms", array( $this, "ajax_wbs_update_forms" ) );
			add_action( "wp_ajax_wbs_update_form", array( $this, "ajax_wbs_update_form" ) );
			add_action( "wp_ajax_wbs_post_login", array( $this, "ajax_wbs_post_login" ) );
			add_action( 'vc_before_init', array( $this, 'custom_maps') );
			add_filter( 'vc_after_init', array ( $this, 'addForms2VC') );
			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
		}
			
		add_action('widgets_init', array($this,'widgets_init'));
        add_action( 'media_buttons', array( $this, 'add_media_button' ), 999 );
		add_action( "wp_ajax_wbs_media_button", array( $this, "ajax_media_button" ) );
		add_filter( 'plugin_action_links', array( $this, 'plugin_action_links' ), 10, 2 );
    }
    
	public function load_textdomain() {
	  load_plugin_textdomain( 'free-forms-and-crm', false, plugin_dir_url(__FILE__) . '/languages' ); 
	}
	
    public function init() {
		if (!isset($this->frontendUrl)) {
			$this->frontendUrl = WBSFRONTENDURL;
			$this->gratisUrl = WBSGRATISURL;
			$this->options = get_option('wbs_options');
		}	
    }
    
    public function plugin_action_links( $links, $file ) {
		if ( dirname( $file ) == dirname( plugin_basename( __FILE__ ) ) ) {
			if ( $this->is_option_valid() )
				$links[] = '<a href="options-general.php?page=wbs-settings">' . __( 'Settings' , 'free-forms-and-crm') . '</a>';
			else 
				$links[] = '<a href="admin.php?page=wbs-install">' . __( 'Install' , 'free-forms-and-crm') . '</a>';
		}
		return $links;
	}

	function custom_maps(){
		global $options;
		vc_add_shortcode_param( 'wbsfvc', 'displayWBSFormsVC',  plugin_dir_url(__FILE__).'/scripts/wbsvc.js');
		vc_map( array(
		  "name" => __("Free forms crm", 'free-forms-and-crm'),
		  "base" => "wbsf",
		  "icon" => "dashicons dashicons-editor-table",
		  "category" => __('Content', 'free-forms-and-crm'),
		  "description" => __('Place form connected with CRM', 'free-forms-and-crm'),
		  "weight" => 10,
		  "params" => array(
		    array(
		      "type" => "wbsfvc",
		      "heading" => __("Select Form", 'free-forms-and-crm'),
		      "admin_label" => true,
		      "param_name" => "id",
			  "class" => "wbsformselect",
		      "value" => array(),
		      "description" => __('Please choose a form from the ones you created', 'free-forms-and-crm'),
		      'save_always' => true,
			  'callback' => 'updateFormInfo',
		    )
		)
	) );
}

	function addForms2VC () {
		$this->init();
		if ( 
			!current_user_can( 'manage_options' ) 
			|| !$this->is_app_allowed() 
			|| !WBS_Api::getToken()   
		) {
			return;
		}
		
		$api = new WBS_Api($this->options);
		$forms = $api->connector_forms_getall();
		
		if ($forms === false) {
			return;
		}
		
		$displayForms = array();
		if ( $forms && is_array($forms) ) {
			foreach($forms as $form) {
				if (is_object($form) ) {
					$displayForms[$form->name] = $form->id;	
				}
			}
		}
		$param = WPBMap::getParam( 'wbsf', 'id' );
		$param['value'] = $displayForms;
		vc_update_shortcode_param( 'wbsf', $param );
	}


    public function wbs_shortcode( $atts ) {
		$attr = shortcode_atts(array( 'id' => 'none' ), $atts, 'wbsf');
        if ( empty( $attr['id'] ) || $attr['id'] == 'none' ) {
            return;
        }
		
        $html = '<div class="wbs-shortcode-item">';
        $html .= get_option('free_forms_crm_' .  $attr['id']);
		$html .= '</div>';
        return $html;
    }
    
    public function admin_enqueue_scripts() {
		wp_enqueue_script('jquery');
		wp_enqueue_script('wbs-object');
        $screen = get_current_screen();
		if ( $screen->id != "wbs_page_wbs-install" ) {
			wp_enqueue_script('wbs-script');	
		}
		wp_enqueue_style('wbs-style');
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_style('wbs-jquery-ui');
    }
    
    
    public function admin_init() {
        $this->options = get_option('wbs_options');
		wp_register_style('wbs-style', plugin_dir_url(__FILE__).'/css/wbs.css');
        wp_register_script('wbs-object', plugin_dir_url(__FILE__).'/scripts/wbsapp.js', false, false, false);
        wp_register_script('wbs-script', plugin_dir_url(__FILE__).'/scripts/wbs.js', false, false, false);
        wp_register_script('wbs-install', plugin_dir_url(__FILE__).'/scripts/wbs-install.js', false, false, true);
		wp_register_style('wbs-jquery-ui', plugin_dir_url(__FILE__).'/css/jquery-ui.css');
        
		$freeFormsAndCrmJSLangInst = array(
			"wordpressError" => __("WordPress error", 'free-forms-and-crm'),
			"loginToGivePermissionToApp" => esc_html__("You need to login in order to give permissions to your app", 'free-forms-and-crm'),
			"connexionError" => esc_html__("Connnexion error", 'free-forms-and-crm'),
			"loginToGivePermissionToAppLink" => sprintf( 
				esc_html__("Please %slogin%s in order to give permissions to your app", 'free-forms-and-crm'), 
				"<a href='#' onclick='loginCheck();'>", "</a>" 
			),
			"error" => esc_html__("Error", 'free-forms-and-crm'),
			"loggedInWelcome" => esc_html__("You are logged in. Welcome.", 'free-forms-and-crm'),
			"notLoggedIn" => esc_html__("You are not logged in.", 'free-forms-and-crm'),
			"loginToCheckAppStatus" => esc_html__("Please login to check app status.", 'free-forms-and-crm'),
			"appDoesntExist" => esc_html__("App does not exist.", 'free-forms-and-crm'),
		);
		wp_localize_script( 'wbs-install', 'freeFormsAndCrmJSLangInst', $freeFormsAndCrmJSLangInst );
		wp_localize_script( 'wbs-script', 'freeFormsAndCrmJSLangInst', $freeFormsAndCrmJSLangInst );

        register_setting(
            'wbs_options_group', // Option group
            'wbs_options', // Option name
            array( $this, 'validate_settings' ) // Sanitize
        );

        add_settings_section(
            'api_section', // ID
            'API Settings', // Title
            array( $this, 'print_api_settings_info' ), // Callback
            'wbs-settings' // Page
        );  

/*        add_settings_field(
            'api_url', // ID
            'API URL', // Title 
            array( $this, 'api_url_setting_callback' ), // Callback
            'wbs-settings', // Page
            'api_section' // Section           
        );      */

		
		add_settings_field(
            'app_name', 
            'App name', 
            array( $this, 'api_name_setting_callback' ), 
            'wbs-settings', 
            'api_section'
        ); 
		
		add_settings_field(
            'api_key', 
            'Key', 
            array( $this, 'api_key_setting_callback' ), 
            'wbs-settings', 
            'api_section'
        ); 

		add_settings_field(
            'api_secret', 
            'Secret', 
            array( $this, 'api_secret_setting_callback' ), 
            'wbs-settings', 
            'api_section'
        ); 
        
		 add_settings_field(
            'api_company_id', 
            'Company_id', 
            array( $this, 'api_company_id_setting_callback' ), 
            'wbs-settings', 
            'api_section'
        ); 
    }
        
    public function admin_menu() {
		add_menu_page(__('Free Forms &amp; CRM', 'free-forms-and-crm'), __('Free Forms &amp; CRM', 'free-forms-and-crm'), 'manage_options', 'wbs', array($this,'create_admin_menu_page'), 'dashicons-editor-table');
		$valid = $this->is_option_valid();
		if ( !$valid || !$this->is_app_allowed() ) {
			$slug = $valid ? null : 'wbs';
			add_submenu_page($slug, __('Install', 'free-forms-and-crm'), __('Install', 'free-forms-and-crm'), 'manage_options', 'wbs-install', array($this, 'create_install_wbs_page'));
        }
		add_options_page( __('Free Forms &amp; CRM', 'free-forms-and-crm'), __('Free Forms &amp; CRM', 'free-forms-and-crm'), 'manage_options', 'wbs-settings', array( $this, 'create_options_page' ) );
    }
    
    
    public function admin_notices() {
		
		$screen = get_current_screen();
		#include plugin_dir_path(__FILE__) . 'pages/jstranslation.php';
		if ( 
			$screen->id != "wbs_page_wbs-install" &&
			( $screen->id === 'toplevel_page_wbs' || strpos($screen->id, 'wbs_page') === 0 ) 
		) {
            $this->create_notice();
        }
		
		if ( in_array($screen->id, array('post', 'page', 'widgets') ) ) {
			if ( !$this->is_option_valid() || !$allowed = $this->is_app_allowed() ) {
				$this->create_notice();
			}
			else {
				if ( !WBS_Api::getToken() ) {
					$this->login_notice();
				}
				else {
					#$this->login_notice(true);
				}
			}
		}
    }
    
	public function create_notice() {
		$valid = $this->is_option_valid();
		$allowed = $this->is_app_allowed();
		$options_url = !$valid ? admin_url('admin.php?page=wbs-install') : admin_url('options-general.php?page=wbs-settings');
		if ( !$valid || !$allowed ) {
			$str = !$valid ?  __("WBS is not configured. Install it ", 'free-forms-and-crm') : __('Plugin can not connect to WBS. Check permissions ', 'free-forms-and-crm');
			print '<div class="error" id="wbs-error">';
			print '<p><strong>'. $str . "<a href=\"".$options_url."\">" . __('here', 'free-forms-and-crm') .'</a></strong></p>';
			print '</div>';
		}
	}
	
	public function login_notice($checknow = false) {
		echo '<div class="notice notice-warning is-dismissable" id="wbs-login-notice"';
		echo $checknow ? ' style="display:none" ' : '';
		echo '>';
		echo '<p><strong>' . __('You are not logged in to WBS. Please click here:', 'free-forms-and-crm'). '</strong>';
		echo ' &nbsp; <button class="wbs-login button-primary" onclick="loginCheck()">'. __('Login to WBS', 'free-forms-and-crm') . '</button></p>';
		echo '</div>';
		echo $checknow ? '<script>loginCheck();</script>' : '';
	}
	
	
    private function is_option_valid() {
        if ( empty($this->options) ) {
			return false;
		}	
		foreach(array('api_key', 'api_secret', 'api_company_id') as $field) {
			if ( empty($this->options[$field])) {
				return false;
			}
		}
	    return true;
    }
	
	private function is_app_allowed() {
		if ( !$this->is_option_valid()) {
			return false;
		}
		$api = new WBS_Api($this->options);
		$app_token = $api->auth_app();
		
		return $app_token === false ? false : true;
		
	}
    
    public function widgets_init() {
        register_widget('WBS_Widget');
    }
    
    public function create_admin_menu_page() {
		include plugin_dir_path(__FILE__).'pages/links.php';
	}
    
    public function create_options_page() {
        include plugin_dir_path(__FILE__).'pages/options.php';
    }
	
	public function create_install_wbs_page() {
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_style('wbs-jquery-ui');
		wp_enqueue_script('wbs-object');
		$this->createName();
		if ( 
			isset($_POST['deletereinstall']) 
			&& $_POST['deletereinstall'] == 'go' 
			&& wp_verify_nonce( $_POST['secreinstall'], 'wbs-deletereinstall' ) 
		) {
			foreach ( array( 'api_key', 'api_secret' ) as $field ) {
				if ( isset ( $this->options[$field] )) {
					unset ( $this->options[$field] );
				}
			}
			delete_transient( 'wbs_app_token' );
			delete_transient( 'wbs_token' );
			update_option('wbs_options', $this->options );
		}
		$this->options = get_option('wbs_options');	
		echo "<script>var secinstall='" . wp_create_nonce( "wbs-secinstall" ) . "';</script>";
		include plugin_dir_path(__FILE__).'pages/install.php';
		wp_enqueue_script('wbs-install');
	}
    
	private function createName() {
		if (empty($this->options['app_name'])) {
			$str = get_option('siteurl');
			$str = strtr($str, array('http://' => '', 'https://'  => '') );	
			$parts = explode('/', $str);
			$str = $parts[0];
			$parts = explode(':', $str);
			$str = $parts[0];
			$str = strtr($str, array('localhost' => '', '127.0.0.1'  => '') );
			
			$str .= md5(microtime().rand());
			$this->options['app_name'] = "WP-$str";
			$this->saveoptions(array('app_name' => $str));
		}		
		return $this->options['app_name'];
	}
	
	public function wizard_notification () {
		if ( !$this->is_app_allowed() ) :
			if ( !$this->is_option_valid() ) {
				$infostring = __('You can add the credentials manually or use the installation wizard', 'free-forms-and-crm');
				$buttonstring = __('Installation wizard', 'free-forms-and-crm');				
			}
			else {
				$infostring = __('The existing credentials are not valid. You can set them manually or remove existing credentials and re-install', 'free-forms-and-crm');
				$buttonstring = __("Delete current credentials and re-install", 'free-forms-and-crm');				
			}
			echo "<div class='error'> $infostring <br/>";
			?>
			<form action="admin.php?page=wbs-install" method="post">
			<input type="hidden" name="deletereinstall" value="go"/>
			<?php wp_nonce_field( 'wbs-deletereinstall', 'secreinstall' ); ?>
			<input type="submit" class="button button-primary" style="margin:10px 0" value="<?php echo $buttonstring; ?>"/>
			</form><br/></div>
			<?php
		endif;
	}

    public function print_api_settings_info() {
        print '<p>' . __('Enter API credentials below:', 'free-forms-and-crm') . '</p>';
    }
    
    public function validate_settings( $input ) {
        return $input;
    }
    
    public function api_url_setting_callback() {
        $this->setting_callback('api_url');
    }
        
	public function api_company_id_setting_callback() {
        $this->setting_callback('api_company_id');
    }

	public function api_secret_setting_callback() {
        $this->setting_callback('api_secret');
    }

	public function api_key_setting_callback() {
        $this->setting_callback('api_key');	
    }

	public function api_name_setting_callback() {
        $this->setting_callback('app_name');	
    }

	
	public function setting_callback($option) {
		$value =  isset( $this->options[$option] ) ? esc_attr( $this->options[$option]) : '';
		$type = "text";
		if (in_array($option, array('api_key', 'api_secret'))) {
			$type = "password";
			$value = $value == '' ? '' : '*********';
		}
		
		printf(
            '<input type="' .$type. '" id="wbs_' . $option . '" name="wbs_options[' . $option . ']" value="%s" />',
			$value
        );
	}
    
	
	/** Sanitize accidental problems in input. 
	If the data is not ok, it will return false.
	*/
	public function sanitize_validate_option_wbs_options ( $params ) {
		$fields = array(
		    'api_url' => '', 
            'app_name' => '', 
            'api_key' => '',
            'api_secret' => '',
            'api_company_id' => '',
        );
		$params = array_intersect_key($params, $fields);
		foreach ($params as $field => $dummy) {
			if ( $params[$field] == '*********') {
				unset( $params[$field] );
				continue;
			}
			$params[$field] =  sanitize_text_field($params[$field]);
			if ( $field === '' ) {
				continue;
			}
			elseif ( $field == 'api_url' ) {
				if (substr($params[$field], 0, 5) !== 'https') {
					return false;
				}
			}
			elseif ( $field == 'api_company_id' ) {
				if ( $params[$field] != absint($params['api_company_id']) ) {
					return false;
				}
			}
			elseif ( in_array( $field, array('api_key', 'api_secret'))) {
				if ( !preg_match( '@^[a-z0-9]*$@', $params[$field]) ) {
					return false;
				}
			}
		}
		return $params;		
	}
	
	private function saveoptions($params) {
		if (!$this->options) {
			add_option('wbs_options', array() );
			$this->options = array();
		}
		foreach (array('key', 'secret', 'company_id') as $field) {
			if (isset($params[$field])) {
				$params += array('api_' . $field => $params[$field]);
			}
		}
		$params = $this->sanitize_validate_option_wbs_options($params);
		if ($params === false) {
			return false;
		}
		
		$params += $this->options;
		update_option('wbs_options', $params);
	}
	
	public function post_install() {
		check_ajax_referer( 'wbs-secinstall', 'secinstall' );
		$this->saveoptions($_POST);
		$this->options = get_option('wbs_options');	
		delete_transient( 'wbs_app_token' );
		delete_transient( 'wbs_token' );
		
		echo (int)($this->is_option_valid() && $this->is_app_allowed());
		die();
	}
	
	public function add_media_button(){
    	if ( current_user_can( 'manage_options' ) ) :
?>
			<a id="wbs-form-button" href="<?php echo add_query_arg( array( 'action' => 'wbs_media_button', 'width' => '450' ), admin_url( 'admin-ajax.php' ) ); ?>" class="button add_media thickbox" title="<?php _e( 'Add Form from Free Forms and CRM', 'free-forms-and-crm' ); ?>">
				<span class="dashicons dashicons-editor-table" style="color:#888; display: inline-block; width: 18px; height: 18px; vertical-align: text-top; margin: 0 4px 0 0;"></span>
				<?php _e( 'Add Form with CRM', 'free-forms-and-crm' ); ?>
			</a>
			<script>
			
			</script>
<?php
		endif;
	}
	
	public function ajax_media_button(){
		if ( !current_user_can( 'manage_options' ) ){
			die(0);
		}
		if ( !$this->is_app_allowed() ) {
			$this->create_notice();
			die();
		}
		$redirect = 'wbs_media_button';
		if (!WBS_Api::getToken() )  {
			$this->ajax_wbs_login('wbs_media_button');
		}
		$api = new WBS_Api($this->options);
        $forms = $api->connector_forms_getall();
		
		if ($forms === false) {
			$this->ajax_wbs_login('wbs_media_button');
		}
		
		include plugin_dir_path(__FILE__).'pages/media-button.php';
		die(1);
	}
	
	public function ajax_wbs_login($redirect = null) {
		include plugin_dir_path(__FILE__).'pages/login.php';
		die(1);
	}
	
	public function validate_token($token) {
		return preg_match('@^[a-z0-9]+$@i', $token);
	}
	
	public function ajax_wbs_post_login() {
		if( isset( $_POST['token'] ) && $this->validate_token( $_POST['token'] ) ) {
			set_transient('wbs_token', $_POST['token'], 3600);
			die('{res:1}');
		}
		die('{res:0}');
	}
	
	public function ajax_wbs_update_forms() {
		$this->update_forms(true);
		die('{res:1}');
	}
	
	public function myEndSession() {
		delete_transient( 'wbs_app_token' );
		delete_transient( 'wbs_token' );
	}
	
	public function update_forms($force = false) {
		$api = new WBS_Api(get_option('wbs_options'));
		$forms = $api->connector_forms_getall();
		if ($forms === false) {
			return false;
		}
		foreach( $forms as $form ) {
			if ( $force || false === get_option("free_forms_crm_" . $form->id) ) {
				$link = $api->connector_widgets_getJSlink( $form->id );		
				update_option( "free_forms_crm_" . $form->id, $link );
			}
		}
	}
	
	public function ajax_wbs_update_form($id = null) {
		if ( isset($_POST['form_id']) && absint($_POST['form_id'])) {
			$id = absint($_POST['form_id']);
		}
		
		if (!$id || $id != absint($id) ) {
			die( '{res:0}' );
		}
		
		$api = new WBS_Api(get_option('wbs_options'));
		$link = $api->connector_widgets_getJSlink( $id );		
		update_option( "free_forms_crm_" . $id, $link );
		die( '{res:1}' );
	}
}

function displayWBSFormsVC( $settings, $value ) {
	$return = 	'<div class="wbsf_block"><select name="' . esc_attr( $settings['param_name'] ) . '" ';
	$return .= ' class="wbsfvcselect wpb_vc_param_value wpb-input wpb-select ' . esc_attr( $settings['param_name'] ) . ' ';
	$return .=	esc_attr( $settings['type'] ) .'_field" >';
	foreach((array)$settings['value'] as $text => $id) {
		$id = absint($id);
		$return .= "<option class=\"$id\" value=\"$id\"";
		$return .= $id == $value ? " selected" : "";
		$return .= ">" . esc_attr($text) . "</option>";
	}
	$return .= "</select></div>";
	return $return; 
}

