<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://getpaycall.com/
 * @since      0.4.1
 *
 * @package    Headstore_Config
 * @subpackage Headstore_Config/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Headstore_Config
 * @subpackage Headstore_Config/public
 * @author     Your Name <info@headstore.com>
 */
class Headstore_Config_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.4.1
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.4.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.4.1
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    0.4.1
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
	   //global $wp_styles;

		//wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/headstore-call-button-public.css', array(), $this->version, 'all' );
		
		//wp_enqueue_style( $this->plugin_name.'-css-ie', plugin_dir_url( __FILE__ ) . 'css/headstore-call-button-ie.css', array(), $this->version, 'all' );
		//$wp_styles->add_data( $this->plugin_name.'-css-ie', 'conditional', 'IE' );
		
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    0.4.1
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, '//'.hs_backend::domain.'/callme/callme.js', array( 'jquery' ), $this->version, false );

	}
	
	public function add_shortcodes() {
	    
		add_shortcode(shortcode_names::hs_call_me, array( $this, 'shortcode_hs_call_me' ));
	}
	
	public function shortcode_hs_call_me($attrs) {
		
		if (!isset($attrs['group_or_expert_id']) || !isset($attrs['design'])) return;
		ob_start();
		$campaign_id = (isset($attrs['campaign'])) ? $attrs['campaign'] : ''; 
		$type = $attrs['type'];
		$group_or_expert_id = $attrs['group_or_expert_id'];
		$design = $attrs['design'];
		include 'partials/iframe_call_me.php';
		$content = ob_get_clean();
		return $content;
	}

	public function hs_display_button($attrs) {
		$campaign_id = (isset($attrs['campaign'])) ? $attrs['campaign'] : ''; 
		$type = $attrs['type'];
		$group_or_expert_id = $attrs['group_or_expert_id'];
		$design = $attrs['design'];
		include 'partials/iframe_call_me.php';
		
	}

	
	public function hs_config_button($attrs) {
					
		?>

		<label>Connect with <a href="https://getpaycall.com/" target="_blank">PAYCALL</a> - Earn money online</label><br/>
		<script type="text/javascript"> 
			hs_connected = false;
			function hs_connect(e) {
				hs_alert("info",'Please wait! Connecting to PAYCALL...');
				jQuery.ajax({
					method: "GET", 
					url: "/wp-content/plugins/headstore-call-button/includes/headstore-api.php?email="+encodeURIComponent(document.getElementById('hs_email'+(hs_connected?'':'_nc')).value)+"&password="+encodeURIComponent(document.getElementById('hs_pw'+(hs_connected?'':'_nc')).value),
					success: function(data) {
						if (data.length==16) {
							document.getElementById('paycallProfile').value=data;
							document.getElementById('paycallButtonType').value=1;
							document.getElementById('paycallEmail').value=document.getElementById('hs_email'+(hs_connected?'':'_nc')).value;
							document.getElementById('paycallPassword').value=document.getElementById('hs_pw'+(hs_connected?'':'_nc')).value;
							hs_toggleView(true);
							hs_alert("info",'Congratulations! You successfully connected your PAYCALL account with your profile.');
						} 
						else {
							hs_alert("error",'Your password or email is wrong . Try again or click on the link below if you forgot your password.');//or you don\'t have completed your <a target="_blank" href="https://paycall.headstore.com/manager/">PAYCALL profile</a> yet
							hs_toggleView(false);
							document.getElementById('paycallProfile').value='';
							document.getElementById('paycallButtonType').value='';
							document.getElementById('paycallEmail').value='';
							document.getElementById('paycallPassword').value='';
						}
					},
					error: function(e) {
						hs_toggleView(false);
						hs_alert("error",'An eroor occured. Please try again.');
					}
				});
			};
			function hs_alert(type, message) {
				document.getElementById('hs_alert').innerHTML = message;
				if (type=="error") {
					document.getElementById('hs_alert').className = "alert-warning alert";
				} else {
					document.getElementById('hs_alert').className = "alert-info alert";
				}
			}
			function hs_toggleView(connected) {
				hs_connected = connected;
				if (connected) {
					document.getElementById('hs_notConnected').style.display = 'none';
					document.getElementById('hs_connected').style.display = 'block';
				} else {
					document.getElementById('hs_notConnected').style.display = 'block';
					document.getElementById('hs_connected').style.display = 'none';
				}
			}
			function pwKeyUp(event) {
				if (event.keyCode === 13) {
					hs_connect();
					return false;
				}
				return true;
			}
		</script>
		 
		<div id="hs_alert" ></div>		
		<div id="hs_notConnected" style="display:none;" class="alert">
			<!---<b>Login to an existing PAYCALL account</b><br/>--->
			If you already have a PAYCALL account, please enter the email address registered to the account.<br/>
			<!--div style="display:inline-block;width:420px;margin-top:10px;">
				<span style="width:203px;display: inline-block;">Email:</span><span style="width:200px;;display: inline-block;">Password:</span>
			</div-->
			<div style="display:inline-block;margin-top:10px;">
				
				<input placeholder="Email" style="width:200px;" id="hs_email_nc" type="text" onkeypress="return pwKeyUp(event)" value="<?php echo $attrs['email']; ?>">&nbsp;
				<input placeholder="Password" style="width:200px;" id="hs_pw_nc" type="password" onkeypress="return pwKeyUp(event)" value="<?php echo $attrs['password']; ?>">&nbsp;
				<input type="button"  onclick="hs_connect()" class="btn btn-secondary btn-sm" value="Connect PAYCALL account">
				
			</div>
			<br/>	
			<a href="https://paycall.headstore.com/#password-reset-request/" target="_blank"> Forgot your PAYCALL password? </a><br/><br/>
			<!---<b>Create PAYCALL account</b><br/>--->
			If you don't have a PAYCALL account, please <a href="https://paycall.headstore.com/#signup" target="_blank">create a PAYCALL account</a>.<br/>
			After creating an account please return to this page and connect in above.<br/>
			<!--a style="margin-top:15px;"href="https://paycall.headstore.com/#signup" class="btn btn-secondary btn-sm" target="_blank">Create PAYCALL account</a><br/><br/-->
			
		</div>
		<div id="hs_connected" style="display:none;" class="alert">			
			<b>You are currently connected to PAYCALL.</b><br/>
			If your credentials have changed you can reconnect using the form below.</b><br/>
			<div style="display:inline-block;">
				
				<input placeholder="Email" style="width:200px;" id="hs_email" type="text" onkeypress="return pwKeyUp(event)" value="<?php echo $attrs['email']; ?>">
				<input placeholder="Password" style="width:200px;" id="hs_pw" type="password" onkeypress="return pwKeyUp(event)" value="<?php echo $attrs['password']; ?>">
				<input type="button"  onclick="hs_connect()" class="btn btn-secondary btn-sm" value="Reconnect PAYCALL account">
				
			</div>	
			<br/>
			<a href="https://paycall.headstore.com/#password-reset-request/" target="_blank"> Forgot your PAYCALL password? </a><br/>
			
			<input style="margin-top:15px;" type="submit" name="submit_resume" class="button btn btn-secondary" value="Preview →" />
		</div>
		<br/>

		<?php
		if (!isset($attrs['email']) || $attrs['email'] == '' || $attrs['email'] == null) {
			?><script type="text/javascript">
				hs_toggleView(false);
			</script><?php
		}  else {
			?><script type="text/javascript">
				hs_toggleView(true);
				document.getElementById('hs_email').value = document.getElementById('paycallEmail').value;
				document.getElementById('hs_password').value = document.getElementById('paycallPassword').value;
			</script><?php
		}
	}


}
