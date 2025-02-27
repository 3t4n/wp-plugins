<?php 
if (!defined( 'ABSPATH')) exit;

class HTML_CF_Settings{
	

		function __construct(){

			add_action( 'admin_menu', array($this,'admin_html_contact_form') );
			add_action( 'admin_notices', array($this, 'html_contact_admin_notice'));
			add_action( 'admin_init', array($this, 'html_contact_nag_ignore') );

		}


		function admin_html_contact_form() {

			add_options_page( __('HTML Insert Options','html-contact-form'), __('HTML Contact Form','html-contact-form'), 'manage_options', 
				'html-contact-form', array($this,'admin_html_insert_options') );

			if (strpos($_SERVER['REQUEST_URI'], 'html-contact-form') !== false) {
				add_action( 'admin_enqueue_scripts',  array($this,'html_contact_form_enqueue') );
			}

		}


		function admin_html_insert_options() {
			if ( !current_user_can( 'activate_plugins' ) )  {
				wp_die( __( 'You do not have sufficient permissions to access this page.', 'html-contact-form' ) );
			}

			$nonce = wp_create_nonce( 'HTML-CF-nonce' );
			if(isset($_POST['insert_header'])){

				$nonce_vrfy = $_REQUEST['_wpnonce'];
	            if ( wp_verify_nonce( $nonce_vrfy, 'HTML-CF-nonce')){
	            	
					update_option( 'HTML_CF_code', esc_sql($_POST['insert_header']));
					//update_option( 'html_CF_Email',esc_sql($_POST['html_CF_Email']));
				}
			}
			?>
		 
    
            <div class="warn_msg">
		    <img src="<?php echo plugin_dir_url( __FILE__ ) .'/img/warn.png'; ?>">HTML Contact Form lite is a fully functional but limited version of <b><a href="http://www.htmlcontactform.net/" target="_blank">HTML Contact Form Pro</a></b> if you want to use this feature.
		    </div>
			<div class="ecf_form">
			<h3 class="selectionShareable"><?php _e('HTML5 form code','html-contact-form'); ?></h3>
			<div class="notice notice-success">
				<p>Add shortcode <b>[HTML-CF]</b> to page or posts </p>
				<p>Save : <b>Ctrl + S</b></p>
			</div>
			<form  action='options-general.php?page=html-contact-form&_wpnonce=<?php echo $nonce; ?>' method="POST">
			<?php 
				$formCode     = get_option('HTML_CF_code');
				$codeText     = str_replace('\r\n', PHP_EOL ,get_option('HTML_CF_code'));
				$admin_email  = get_option('admin_email');
			?> 
			 To Email : 
			 <input id="toEmail" name="html_CF_Email" value="<?php echo get_option('html_CF_Email',$admin_email);?>" disabled>
 			 <textarea  id="textArea"  name='insert_header'><?php echo  str_replace('\\','',$codeText); ?></textarea> 
 			 <div id="code"></div>
			 <input class='button button-primary' id="saveBtn" type="submit">
			</form>
			</div>

	 		<div id="postbox-container" class="postbox-container"> 
			<div class="postbox"> 
				<h3 class="hndle"><span>Like this plugin?</span></h3>
				<div class="inside"> 
				<p><b><a href="https://wordpress.org/plugins/html-contact-form/" target="_blank">Give it a 5 star rating</a></b> on WordPress.org.</p>
				<p><b><a href="https://wordpress.org/plugins/html-contact-form/faq/" target="_blank">FAQ</a></b></p>
				<p><b><a href="http://www.htmlcontactform.net/" target="_blank">HTML Contact Form Pro</a></b></p>
				</div>
	 		</div>
	 		</div>
		 
			 
	<?php
				
		}

		function html_contact_form_enqueue() {
			wp_enqueue_style( 'html_contact_form_style',plugin_dir_url( __FILE__ )  . 'style.css');
		    wp_enqueue_style( 'codemirror_css', plugin_dir_url( __FILE__ ) . 'css/codemirror.css' );
		    wp_enqueue_style( 'show_hint_css', plugin_dir_url( __FILE__ ) . 'css/show-hint.css' );

			wp_enqueue_script( 'html_contact_form', plugin_dir_url( __FILE__ ) . 'js/html_contact_form.js' );
		    wp_enqueue_script( 'codemirror_script', plugin_dir_url( __FILE__ ) . 'js/codemirror.js' );
		    wp_enqueue_script( 'show_hint_script', plugin_dir_url( __FILE__ ) . 'js/show-hint.js' );
		    wp_enqueue_script( 'xml_hint_script', plugin_dir_url( __FILE__ ) . 'js/xml-hint.js' );
		    wp_enqueue_script( 'html_hint_script', plugin_dir_url( __FILE__ ) . 'js/html-hint.js' );
		    wp_enqueue_script( 'xml_script', plugin_dir_url( __FILE__ ) . 'js/xml.js' );
		    wp_enqueue_script( 'javascript_script', plugin_dir_url( __FILE__ ) . 'js/javascript.js' );
		    wp_enqueue_script( 'css_script', plugin_dir_url( __FILE__ ) . 'js/css.js' );
		    wp_enqueue_script( 'htmlmixed_script', plugin_dir_url( __FILE__ ) . 'js/htmlmixed.js' );

		}


	/* Display a notice that can be dismissed */
	
	public function html_contact_admin_notice() {
	
	        $install_date = get_option( 'html_form_install_date', '');
	        $install_date = date_create( $install_date );
	        $date_now     = date_create( date('Y-m-d G:i:s') );
	        $date_diff    = date_diff( $install_date, $date_now );
 
	        if ( $date_diff->format("%d") < 7 ) {
	               
	                return false;
	        }
	
	    global $current_user ;
	    $user_id = $current_user->ID;
	 
	    if ( ! get_user_meta($user_id, 'html_contact_ignore_notice' ) ) {
	
	        echo '<div class="updated"><p>'; 
	
	        printf(__('Awesome, you\'ve been using <a href="options-general.php?page=html-contact-form">Html Contact Form</a> for more than 1 week. May we ask you to give it a 5-star rating on WordPress? | <a href="%2$s" target="_blank">Ok, you deserved it</a> | <a href="%1$s">I alredy did</a> | <a href="%1$s">No, not good enough</a>'), 'options-general.php?page=html-contact-form&html_contact_nag_ignore=0','https://wordpress.org/plugins/html-contact-form/');
	        echo "</p></div>";
	    }
	}
		
	public function html_contact_nag_ignore() {
	    global $current_user;
	    $user_id = $current_user->ID;
	 
	    if ( isset($_GET['html_contact_nag_ignore']) && '0' == $_GET['html_contact_nag_ignore'] ) {
	
	        add_user_meta($user_id, 'html_contact_ignore_notice', 'true', true);
	    }
	}
	
			



}



?>
