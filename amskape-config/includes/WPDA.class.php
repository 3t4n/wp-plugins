<?php
class WPDA{
 
    public function __construct() {
		add_action( 'admin_init', array( $this, 'wpda_admin_init' ) );
		add_action( 'wp_footer', array( $this, 'wpda_register_scripts' ) );
		add_action( 'admin_menu', array( $this, 'wpda_admin_menu' ),9);
		
	}
	function wpda_admin_init() {
		if ( isset($_GET['page']) && $_GET['page'] == 'wpda' )  {
			wp_enqueue_style( 'wpda-css',WPDA_PLUGIN_URL.'css/style.css',array());
		}
	}

	public function wpda_register_scripts() {

		wp_register_script( 'jquery-mask',WPDA_PLUGIN_URL.'js/jquery.mask.min.js',array('jquery') );
		$mask = array(
			'class' => get_option( 'wpda_field_class' ),
			'pattern' => get_option( 'wpda_field_pattern' ),
			'clear' => get_option( 'wpda_field_clear' ),
		);
		wp_localize_script( 'jquery-mask', 'mask', $mask );
		wp_enqueue_script( 'jquery-mask' );
		wp_enqueue_script( 'wpda-mask',WPDA_PLUGIN_URL.'js/mask.js',false );

	}
 
	public function wpda_admin_menu() {
		global $_wp_last_object_menu;

		$_wp_last_object_menu++;

		add_menu_page( __( 'WP Advanced Developer Assistance', 'wpda' ),__( 'Developer Assist', 'wpda' ),'manage_options',
		'wpda',array($this,'wpda_admin_management_page'), 'dashicons-welcome-widgets-menus',$_wp_last_object_menu );
		
		add_submenu_page( 'wpda',__( 'WP Advanced Developer Assistance', 'wpda' ),__( 'Config', 'wpda' ),
			'manage_options', 'wpda',array($this,'wpda_admin_management_page') );

	}
	
	public function wpda_admin_management_page() {
		
		$active_tab	= isset($_GET['tab'])?$_GET['tab']:'config';
		
	?>

		<div class="wrap wpda">
				
			<h1>WP Advanced Developer Assistance </h1>
			<h2 class="nav-tab-wrapper wp-clearfix">
				<a href="?page=wpda&tab=config" class="nav-tab <?php echo $active_tab == 'config' ? 'nav-tab-active' : ''; ?>">Config</a>
				<a href="?page=wpda&tab=admin_login" class="nav-tab <?php echo $active_tab == 'admin_login' ? 'nav-tab-active' : ''; ?>">Admin Login</a>
				<a href="?page=wpda&tab=email" class="nav-tab  <?php echo $active_tab == 'email' ? 'nav-tab-active' : ''; ?>">Email</a>
				<a href="?page=wpda&tab=test_mail" class="nav-tab <?php echo $active_tab == 'test_mail' ? 'nav-tab-active' : ''; ?>">Test Mail</a>
				<a href="?page=wpda&tab=mask" class="nav-tab <?php echo $active_tab == 'mask' ? 'nav-tab-active' : ''; ?>">Field Mask</a>
				<!--a href="?page=wpda&tab=updates" class="nav-tab <?php //echo $active_tab == 'updates' ? 'nav-tab-active' : ''; ?>">Updates</a-->
			</h2>
			
			<form action="<?php echo esc_url( add_query_arg( array('tab'=>$active_tab), menu_page_url( 'wpda', false ) ) ); ?>" method="POST">
			<?php
				call_user_func(array($this,"wpda_".$active_tab));
			?>
			</form>
			<?php
	}

	public function save_form($data){
	
		foreach($data as $option => $value){
			if ( get_option( $option ) !== false ) {
				update_option( $option, $value );
			} else {
				$deprecated = null;
				$autoload = 'no';
				add_option( $option, $value, $deprecated, $autoload );
			}
		}

	}

	public function validate_multiple_email($email){
        $arr_email = explode(',',$email);
        $out_email = [];
        foreach($arr_email as $email){
            if(is_email($out = sanitize_email($email))){
                $out_email[] = $out;
            }else{
                return '';
            }
        }

        return implode(',',$out_email);
    }

    public function validate_multiple_ip($ip){
        $arr_ip = explode(',',$ip);
        $out_ip = [];
        foreach($arr_ip as $ip){
            if($out = rest_is_ip_address($ip)){
                $out_ip[] = $out;
            }else{
                return '';
            }
        }

        return implode(',',$out_ip);
    }

	public function wpda_header(){
		if(!wpda_verify_ip()){ ?>
				<div class="error">
					<p>Your current IP <strong> <?php echo wpda_get_client_ip(); ?> </strong> is not configured in IP List. Do you want to add please <a href="?page=wpda&amp;tab=ip">click here</a></p></div>
				<div>
		<?php }
	}

	public function wpda_footer(){
		//TODO
		echo '<hr />';
	}

	//============== CONFIG   F U N C T I O N S =============================================//
	public function wpda_config() {
        $error = array();
		if($_POST['save']){
			$data = [];

			$data['wpda_cf7_message'] = isset($_POST['options']['wpda_cf7_message']) ? 1 : 0;
			$data['wpda_disable_gutenberg'] = isset($_POST['options']['wpda_disable_gutenberg']) ? 1 : 0;
			$data['wpda_ip'] = trim($this->validate_multiple_ip($_POST['options']['wpda_ip']));

            if($_POST['options']['wpda_ip'] && $data['wpda_ip'] == '')
                $error['wpda_ip'] = "Invalid IP address";

            if(empty($error)) {
                $this->save_form($data);
                echo '<div class="updated " id="wpda-update"><p>Success! Updated Successfully.</p></div>';
            }else{
                echo '<div class="error "><p>Oops! Failed to update.</p></div>';
            }
		}
		$this->wpda_header();
		require_once('config.php');
		$this->wpda_footer();
	}
	//=============================================================//

	// ==================== E M A I L   F U N C T I O N S ============================//
	public function wpda_email() {
        $error = array();
		if($_POST['save']){
			$data['wpda_email_developer_mode'] = isset($_POST['options']['wpda_email_developer_mode']) ? 1 : 0;

			$data['wpda_email_to'] = trim($this->validate_multiple_email($_POST['options']['wpda_email_to']));
			$data['wpda_email_cc'] = trim($this->validate_multiple_email($_POST['options']['wpda_email_cc']));
			$data['wpda_email_bcc'] = trim($this->validate_multiple_email($_POST['options']['wpda_email_bcc']));
			$data['wpda_email_reply_to'] = trim($this->validate_multiple_email($_POST['options']['wpda_email_reply_to']));
			$data['wpda_email_header'] = trim(wp_filter_nohtml_kses($_POST['options']['wpda_email_header']));
			$data['wpda_email_template_header'] = trim(wp_filter_post_kses($_POST['options']['wpda_email_template_header']));
			$data['wpda_email_template_footer'] = trim(wp_filter_post_kses($_POST['options']['wpda_email_template_footer']));

            if($_POST['options']['wpda_email_to'] != $data['wpda_email_to'])
                $error['wpda_email_to'] = esc_html("Invalid email address");
            if($_POST['options']['wpda_email_cc'] && $data['wpda_email_cc'] == '')
                $error['wpda_email_cc'] = esc_html("Invalid email address");
            if($_POST['options']['wpda_email_bcc'] && $data['wpda_email_bcc'] == '')
                $error['wpda_email_bcc'] = esc_html("Invalid email address");
            if($_POST['options']['wpda_email_reply_to'] && $data['wpda_email_reply_to'] == '')
                $error['wpda_email_reply_to'] = esc_html("Invalid email address");

            if(empty($error)) {
                $this->save_form($data);
                echo '<div class="updated " id="wpda-update"><p>Success! Updated Successfully.</p></div>';
            }else{
                echo '<div class="error "><p>Oops! Failed to update.</p></div>';
            }
		}
		$this->wpda_header();
		require_once('email.php');
		$this->wpda_footer();
	}

	//=========================================================================//

	//============== TEST MAIL   F U N C T I O N S =============================================//
	public function wpda_test_mail() {
		$this->wpda_header();
		require_once('test_mail.php');
		
		
		if($_POST['send']){
			
			$subject = 'Test mail from WP Advanced Developer Assistance';
			$content= 'Greetings from WP Advanced Developer Assistance! <br> 
						This is a test email to verify the Email Configuration.<br><br>
						Amskape Team';
			$to = sanitize_email($_POST['to']);

			if($to && wp_mail($to,$subject,$content))
				echo "<span style='color:green'> Mail send successfully.</span>";
			else
				echo "<span style='color:red'> Failed to send mail.</span>";
		}
		
		$this->wpda_footer();
	}
	//=============================================================//

	//============== ADMIN LOGIN  F U N C T I O N S =============================================//
	public function wpda_admin_login() {
        $error = [];
		if($_POST['save']){

		    $data['wpda_logo_url'] = trim(esc_url_raw($_POST['options']['wpda_logo_url']));
		    $data['wpda_bg_size'] = trim(filter_var($_POST['options']['wpda_bg_size'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
		    $data['wpda_logo_bg_color'] = trim(sanitize_hex_color($_POST['options']['wpda_logo_bg_color']));
		    $data['wpda_bg_position'] = trim(sanitize_text_field($_POST['options']['wpda_bg_position']));
		    $data['wpda_bg_color'] = trim(sanitize_hex_color($_POST['options']['wpda_bg_color']));
		    $data['wpda_login_bg_color'] = trim(sanitize_hex_color($_POST['options']['wpda_login_bg_color']));
		    $data['wpda_login_color'] = trim(sanitize_hex_color($_POST['options']['wpda_login_color']));
		    $data['wpda_additional_style'] = trim(wp_filter_post_kses($_POST['options']['wpda_additional_style']));

            if(($_POST['options']['wpda_logo_url'] && $data['wpda_logo_url'] == '') || !preg_match('/\.(jpeg|jpg|png|gif)$/i', $data['wpda_logo_url']))
                $error['wpda_logo_url'] = esc_html("Invalid Image URL");

            if(empty($error)) {
                $this->save_form($data);
                echo '<div class="updated " id="wpda-update"><p>Success! Updated Successfully.</p></div>';
            }else{
                echo '<div class="error "><p>Oops! Failed to update.</p></div>';
            }
		}
		$this->wpda_header();
		require_once('admin_login.php');
		$this->wpda_footer();
	}
	//=============================================================//

	//============== UPDATE  F U N C T I O N S =============================================//
	/*public function wpda_updates() {
	    $error = [];
		if($_POST['save']){
			
			if(empty($error)) {
                $this->save_form($_POST);
                echo '<div class="updated " id="wpda-update"><p>Success! Updated Successfully.</p></div>';
            }else{
                echo '<div class="error "><p>Oops! Failed to update.</p></div>';
            }
		}
		$this->wpda_header();
		require_once('updates.php');
		$this->wpda_footer();
	}*/
	//=============================================================//

	//============== M A S K  F U N C T I O N S =============================================//
	public function wpda_mask() {
        $error = $data = [];
        if($_POST['save']){

            foreach($_POST['options']['wpda_field_class'] as $index => $class_name){
                if($class_name) {
                    if (($class = sanitize_html_class($class_name)) == '')
                        $error['wpda_field_class_' . $index] = esc_html('Invalid class name');
                    else
                        $data['wpda_field_class'][] = $class;
                }
            }

            foreach($_POST['options']['wpda_field_pattern'] as $index => $pattern){
                if($pattern) {
                    if (($pattern = sanitize_text_field($pattern)) == '' )
                        $error['wpda_field_pattern_' . $index] = esc_html('Invalid pattern');
                    else{
                        $data['wpda_field_pattern'][] = $pattern;
						$data['wpda_field_clear'][] = isset($_POST['options']['wpda_field_clear'][$index]) ? 1 : 0;                    	
                    }
                }
            }
           
            if(empty($error)) {
                $this->save_form($data);
                echo '<div class="updated " id="wpda-update"><p>Success! Updated Successfully.</p></div>';
            }else{
                echo '<div class="error "><p>Oops! Failed to update.</p></div>';
            }
        }
		$this->wpda_header();
		require_once('mask.php');
		$this->wpda_footer();
	}
	//=============================================================//]
}

$wpda = new WPDA;
