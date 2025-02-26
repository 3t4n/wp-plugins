<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://acewebx.com/
 * @since      1.0.0
 *
 * @package    Ace_whatsapp_chat_wp
 * @subpackage Ace_whatsapp_chat_wp/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ace_whatsapp_chat_wp
 * @subpackage Ace_whatsapp_chat_wp/admin
 * @author     AceWebx <webbninja01@gmail.com>
 */
class Ace_whatsapp_chat_wp_Admin {

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

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ace_whatsapp_chat_wp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ace_whatsapp_chat_wp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ace_whatsapp_chat_wp-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name.'fontawesome-cdn', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css' );
		wp_enqueue_style( $this->plugin_name.'poppins-cdn', 'https://fonts.googleapis.com/css?family=Poppins:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i' );


	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ace_whatsapp_chat_wp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ace_whatsapp_chat_wp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ace_whatsapp_chat_wp-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name."-jquery-whatsapp", site_url() . '/wp-includes/js/jquery/jquery.js', array( 'jquery' ), $this->version, false );



	}

	public function whatsapp_load_textdomain() {
		$mo_file = plugins_url( 'ace_whatsapp_chat_wp/languages/ace_whatsapp_chat_wp' ).'-'.get_locale().'mo';
		load_textdomain('ace_whatsapp_chat_wp', $mo_file );
	    load_plugin_textdomain('ace_whats_chat_wp', false, plugins_url( 'ace_whatsapp_chat_wp/languages/' ) );
	    if( sanitize_text_field( $_POST['ace_mail_submit'] ) == 'Submit' ){ 

		   $ace_mail_name      = sanitize_text_field( $_POST['ace_mail_name'] );
		   $ace_mail_email      = sanitize_text_field( $_POST['ace_mail_email'] );
		   $ace_mail_web       = sanitize_text_field( $_POST['ace_mail_web'] );
		   $ace_mail_comment   = sanitize_text_field( $_POST['ace_mail_comment'] );
		   //$owner_mail = 'acewebxpert@gmail.com';
		   	$owner_mail = 'webbninja2@gmail.com';
		  	$subject = "Ace Whatsapp Chat Query";
		  	$headers = "From:" . strip_tags($ace_mail_email) . "\r\n";
			$headers .= "Reply-To: ". strip_tags($owner_mail) . "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

			$message = 'Name: '.$ace_mail_name;
			$message .= '<br/> Email:   '.$ace_mail_email;
			$message .= '<br/> Massage:  '.$ace_mail_comment;
			$message .= '<br/> Website Link:  '.$ace_mail_web;

		   $sent = wp_mail( $owner_mail, $subject, $message, $headers);      
		   if( $sent ){
		       function mail_scuss_message(){  
		           echo '<div class="updated notice">
		                   <h3>Your Query Has been submited</h3>
		           </div>';
		       }
		       add_action( 'admin_notices', 'mail_scuss_message' );
		   }
		}
	}

	public function ace_whatsapp_menu() {

		 	add_menu_page( 	 
		  					'Whatsapp Chat', // page title
			                'Whatsapp Chat', 	//menu title
			                'manage_options', //capability
			                'ace-whatsapp-menu', // menu slug 
			                array( $this, "ace_whatsapp_menu_callback"), // callback function
			                plugin_dir_url( __FILE__ ).'image/whatsapp.png', // icon 
			                152						//position 
			);

			add_submenu_page( 	 
		  					'ace-whatsapp-menu', // page title
			                'Whatsapp Group',
			                'Group Settings', 	//menu title
			                'manage_options', //capability
			                'ace-whatsapp-group', // menu slug 
			                array( $this, "ace_whatsapp_groupId") 
			);
	}

	public function ace_whatsapp_menu_callback() {
			if( isset( $_POST['ace_chat_setting_save'] ) ) {
				$whatapp_phone 		     = sanitize_text_field( $_POST['whatsapp_no'] );
				$whatsapp_start_chat     = sanitize_text_field( $_POST['whatsapp_start_chat'] );
				// $whatsapp_content        = sanitize_text_field( $_POST['whatsapp_content'] );
				$whatsapp_btn_color      = sanitize_text_field( $_POST['whatsapp_btn_color'] );
				$whatsapp_txtbtn_color   = sanitize_text_field( $_POST['whatsapp_txtbtn_color'] );
				$whatsapp_hide_btn       = sanitize_text_field( $_POST['wp_hidden_button']);
				$whatsapp_position_btn   = sanitize_text_field( $_POST['wp_position_button'] );
				$whatsapp_position_vtl   = sanitize_text_field( $_POST['wp_position_vtl'] );
				$whatsapp_hover_color    = sanitize_text_field( $_POST['whatsapp_hover_color'] );
				$whatsapp_txthover_color = sanitize_text_field( $_POST['whatsapp_txthover_color'] );
				$wp_display_home		 = sanitize_text_field( $_POST['wp_display_home'] );
				$wp_mobile_display		 = sanitize_text_field( $_POST['wp_mobile_display'] );

				$error = array();
				if( !empty( $whatapp_phone ) ) {
					if( strlen( $whatapp_phone ) >  6   ) {
						if ( !preg_match("~^[+]\d+$~", $whatapp_phone) ) {
							$error['Phone_no_empty'] = esc_attr('Phone Number Not Valid', 'ace_whatsapp_chat_wp');
						}
					} else {
						$error['Phone_no_empty'] = esc_attr('Phone Number Not Valid', 'ace_whatsapp_chat_wp');						
					}
				} else  {
					$error['Phone_no_empty'] = esc_attr('Please Enter Phone No.', 'ace_whatsapp_chat_wp');
				}


				if( !empty( $whatsapp_hide_btn ) == 1 ) {
					$checked = 1;
				} else {
					$checked = 0;
				}

				if( !empty( $wp_display_home ) == 1 ) {
					$wp_display_home = 1;
				} else {
					$wp_display_home = 0;
				}

				if( !empty( $wp_mobile_display ) == 1 ) {
					$wp_mobile_display = 1;
				} else {
					$wp_mobile_display = 0;
				}

				if( empty( $error ) ){
					update_option( 'ace-whatsapp-setting-field', array( 
															'ace_whatsapp_no' => $whatapp_phone, 
															'whatsapp_start_chat' => $whatsapp_start_chat, 
															// 'whatsapp_content' => $whatsapp_content,
															'ace_whatsapp_hiden_btn' => $checked,
															'ace_whatsapp_btn_color' => $whatsapp_btn_color,
															'ace_whatsapp_txtbtn_color' => $whatsapp_txtbtn_color,
															'ace_whatsapp_position_btn' => $whatsapp_position_btn,
															'ace_whatsapp_position_vtl' => $whatsapp_position_vtl,
															'ace_whatsapp_hover_color' => $whatsapp_hover_color,
															'ace_whatsapp_txthover_color' => $whatsapp_txthover_color,
															'ace_wp_display_home' => $wp_display_home,
															'ace_wp_mobile_display' => $wp_mobile_display  ) );
				}
			}

			$get_setting_value = get_option( 'ace-whatsapp-setting-field' );

	 		if( $get_setting_value['ace_whatsapp_hiden_btn'] == 1 ):
	 			$hiden_btn_check = 'checked="checked"';
	 		else:
	 			$hiden_btn_check = '';
	 		endif;

	 		if( $get_setting_value['ace_wp_display_home'] == 1 ):
	 			$display_home = 'checked="checked"';
	 		else:
	 			$display_home = '';
	 		endif;

	 		if( $get_setting_value['ace_wp_mobile_display'] == 1 ):
	 			$mobile_display = 'checked="checked"';
	 		else:
	 			$mobile_display = '';
	 		endif;

	 		if( $get_setting_value['ace_whatsapp_position_btn'] == 'right' ):
	 			$position_check_right = 'checked="checked"';
	 		elseif( $get_setting_value['ace_whatsapp_position_btn'] == 'left' ):
	 			$position_check_left = 'checked="checked"';
	 		endif;

	 		if( $get_setting_value['ace_whatsapp_position_vtl'] == 'top' ):
	 			$position_top = 'checked="checked"';
	 		elseif( $get_setting_value['ace_whatsapp_position_vtl'] == 'center' ):
	 			$position_center = 'checked="checked"';
	 		elseif( $get_setting_value['ace_whatsapp_position_vtl'] == 'bottom' ):
	 			$position_bottom = 'checked="checked"';
	 		endif;

	 		if ( !empty( $error ) ) : ?>
				<div class="notice notice-error is-dismissible"><h1>
	 		<?php foreach ($error as $value): ?>
			        <font size="2em"><?php echo "<font color='red'>*</font>"; print_r( $value ); ?></font>
	 		<?php endforeach; ?>
	 			</h1></div>	 			 	
	 <?php else: if( isset( $_POST['ace_chat_setting_save'] ) ): ?>
	 				<br>
			        <div class="notice notice-success is-dismissible">
        				<font size="2em"><h4><?php _e( 'Successfully Done!', 'ace_whatsapp_chat_wp' ); ?></h4></font>
   				 </div>

	 		<?php endif; endif;
		 	require_once( plugin_dir_path( __FILE__ ).'partials/whatsapp_setting_template.php' );
	 }


	public function ace_whatsapp_groupId(){
		if( isset( $_POST['ace_chat_group_setting'])){
			unset($_POST['ace_chat_group_setting']);
			if( !empty($_POST["whatsapp_groupId"] ) ){
				update_option( "ace_WA_group_info", $_POST );
			} else {
				$error = "Group Id Field Empty";
			}
		}

		$get_setting_group = get_option( "ace_WA_group_info" );
		if( $get_setting_group['wp_hidden_button'] == 1 ): $hiden_btn_check = 'checked="checked"'; endif;
		require_once( plugin_dir_path( __FILE__ ).'partials/setting_group_template.php' );	
	}

}

?>