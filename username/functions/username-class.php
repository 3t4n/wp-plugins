<?php
/**
* user_name will content the functions
* which help to update username.
*/

class user_name
{
    public static function call_username()
    {
      wp_register_script('my_custom_script',plugins_url().'/username/js/username.js',array( 'jquery' ));
      wp_enqueue_script('my_custom_script');
       
    }
	public function __construct() {
        if ( is_admin() ){
            add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
            add_action( 'admin_init', array( $this, 'page_init' ) );
        }
    }
    public function add_plugin_page(){
        // This page will be under "Settings"
        add_options_page( 'Settings Admin', 'Username', 'manage_options', 'username-setting-admin', array( $this, 'create_admin_page' ) );
    }
    public function create_admin_page() {
        ?>
	<div class="wrap">
	    <?php screen_icon(); ?>
	    <h2>Username Settings</h2>			
	    <form method="post" action="options.php">
	    <?php
                  
		    settings_fields( 'username_option_group' );	
		    do_settings_sections( 'username-setting-admin' );
		?>
	        <?php submit_button(); ?>
	    </form>
	</div>
	<?php
    }
    public function page_init() {		
        register_setting( 'username_option_group', 'username', array( $this, 'username_call' ) );
            
            add_settings_section(
            'setting_section_id',
            'Setting',
            array( $this, 'print_section_info' ),
            'username-setting-admin'
        );	
            
        add_settings_field(
            'username', 
            'Insert Username', 
            array( $this, 'create_an_username_field' ), 
            'username-setting-admin',
            'setting_section_id'			
        );		
    }
	
    public function username_call( $input ) {
		$user_id = get_current_user_id();
		if ( !username_exists( $input )){ 
			global $wpdb;
			$wpdb->update($wpdb->prefix .'users', array('user_login' => $input), array( 'ID' => $user_id ), array( '%s'),  
			array( '%d' ));  
		}
		return $input;
    }
	
    public function print_section_info(){
      global $data; 
      $data .= "<b>Change your Username here:";
      $data .= "</br>";
      $data .= "If you are not logged out, that means username is not changed.</b>";
      print $data;
    }
	
    public function create_an_username_field(){
        ?>
		<input type="text" name="username" id="username" value="">  
		<div class="clickme" id="clickme" style="cursor:pointer; margin: 10px 0; width: 250px; border: 2px solid;" >Click to check username is exist or not </div>
		<div id="username-use"></div>
		<?php 	
    }

	//check username is exist ot not called by ajax.
	function custom_ajax_function() {
		$username = $_POST['username'];
		if ( username_exists( $username ) ){
			   echo 0; // Username In Use!
		}
		else{
			   echo 1; //Username Not In Use!
			}
		exit;
	}
}
