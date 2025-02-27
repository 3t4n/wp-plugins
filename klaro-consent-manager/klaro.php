<?php     
	/*
	Plugin Name: Klaro Consent Manager
	Plugin URI: http://wordpress.transformnews.com/klaro-consent-manager
	Description: Simple consent manager.
	Version: 1.1.7
	Author: m.r.d.a
	Author URI: http://wordpress.transformnews.com/
	Text Domain: klaro-consent-manager
	Domain Path: /languages
	License: GPLv2 or later
	*/

defined('ABSPATH') or die("Cannot access pages directly.");
define( 'KLARO_VERSION', '1.1.7' );

class KlaroBackend
{

    private $options;
	
	

	public function __construct()
	{  
	 
		
		add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'klaro_load_transl') );
		add_action( 'admin_init', array( $this, 'page_init' ) );
		add_action( 'admin_init', array( $this, 'klaro_default_options' ) );
		
		add_action( 'admin_head', array( $this, 'check_post_type_and_remove_media_buttons'  ) );
		//add_filter( 'wp_editor_settings', array( $this, 'klaro_editor_settings' ) );
		add_filter( 'user_can_richedit', array( $this, 'klaro_editor_settings' ) );

		add_action( 'admin_enqueue_scripts', array( $this, 'klaro_admin_script' ) );
		add_filter( 'plugin_action_links_klaro-consent-manager/klaro.php', array( $this, 'klaro_settings_link' )  );
		
		
		add_action( 'init', array( $this, 'register_custom_post_type' ) );
		
	

		
    }

	public function klaro_settings_link($links){ 
		$settings_link = '<a href="edit.php?post_type=klaro_consent&page=klaro-settings">Settings</a>'; 
		array_unshift($links, $settings_link); 
	return $links; 
	}
	




    public function klaro_admin_script($hook) {
		//if ($hook != 'settings_page_klaro-settings') {
		//	return;
		//}
		$screen = get_current_screen();
    if ( $hook == 'post.php' && $screen->post_type != 'klaro_consent' ) {
        return;
    }

		wp_register_script('klaroAdminScript', plugins_url('/js/klaro-admin.js', __FILE__), array( 'jquery' ), KLARO_VERSION);
		wp_enqueue_script('klaroAdminScript');

		wp_register_style('klaroAdminStyle', plugins_url('/css/klaro-admin.css', __FILE__) );
	    wp_enqueue_style('klaroAdminStyle');	
		
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'my-script-handle', plugins_url('js/iris-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );	
	}

/*	
	public function klaro_enqueue_color_picker(  ) 
	{
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'my-script-handle', plugins_url('js/iris-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );		
		
	}	


*/

public function check_post_type_and_remove_media_buttons() {
	global $current_screen;
        // use 'post', 'page' or 'custom-post-type-name'
	if( 'klaro_consent' == $current_screen->post_type ) remove_action('media_buttons', 'media_buttons');
}



public function klaro_editor_settings( $default ) {
    global $post;
    if ( 'klaro_consent' == get_post_type( $post ) )
        return false;
    return $default;
}

	
		
	public function klaro_load_transl(){
		load_plugin_textdomain('klaro-consent-manager', FALSE, dirname(plugin_basename(__FILE__)).'/languages/');
	}
	
	public function add_plugin_page(){
		// This page will be under "Settings"
		/*add_options_page(
			'Settings Admin', 
			'Klaro Consent Manager', 
			'manage_options', 
			'klaro-settings', 
			array( $this, 'create_admin_page' )
		);
		*/
		
		add_submenu_page(
    'edit.php?post_type=klaro_consent',
    'Settings Admin', 
			'Settings', 
			'manage_options', 
			'klaro-settings', 
			array( $this, 'create_admin_page' )
);
		
		
		
	}

	public function create_admin_page(){
		// Set class property
		$this->options = get_option( 'klaro_option_name');
		?>
		<div id="klaro" class="wrap">
			
			<h2><?php _e('Klaro Consent Manager', 'klaro-consent-manager'); ?></h2>  
            <p><?php _e("Add Klaro cookie consent manager.", 'klaro-consent-manager'); ?></p> 
            
            <div class="main-content"> 
                
            
            
            <?php $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'klaro-general';  ?> 
            
            <h2 class="nav-tab-wrapper">
                <a class="nav-tab btn-general <?php echo $active_tab == 'klaro-general' ? 'nav-tab-active' : ''; ?>">General Settings</a>  
                <a class="nav-tab btn-style <?php echo $active_tab == 'klaro-style' ? 'nav-tab-active' : ''; ?>">Style</a> 
                <a class="nav-tab btn-advanced <?php echo $active_tab == 'klaro-advanced' ? 'nav-tab-active' : ''; ?>">Advanced</a> 
            </h2>
            
            
                   
            
            
            
          
            
            
			<form class="mysticky-hideform" method="post" action="options.php">
            
            
            
             <?php
			
			
			 //we check if the page is visited by click on the tabs or on the menu button.
                //then we get the active tab.
               
                if(isset($_GET["tab"]))
                {
					
					if($_GET["tab"] == "klaro-general")
                    {
					echo '<div class="klaro-general">';
					settings_fields( 'klaro_option_group' );   
					do_settings_sections( 'klaro-settings' );
					echo '</div>';
					
					}
                    else if($_GET["tab"] == "klaro-style")
                    {
					echo '<div class="klaro-style">';	
					settings_fields( 'klaro_option_group' );   
					do_settings_sections( 'klaro-settings' );
					echo '</div>';
                    }
					
					else if($_GET["tab"] == "klaro-advanced")
                    {
					echo '<div class="klaro-advanced">';		
					settings_fields( 'klaro_option_group' );   
					do_settings_sections( 'klaro-settings' );
					echo '</div>';
                    } 
		
					
                }
				
				else {
						
					//	echo '<div class="klaro-general">';
					settings_fields( 'klaro_option_group' );   
					do_settings_sections( 'klaro-settings' );
				//	echo '</div>';
						
						
						}
			
				
				submit_button();
			?>
       
 
			</form>
  
			<form class="klaro-hideformreset" method="post" action="">
				<input name="reset" class="button button-secondary confirm" type="submit" value="Reset to default settings" >
				<input type="hidden" name="action" value="reset" />
			</form>
            
            
			</div>
            
            
            <div class="main-sidebar">	
            
            <h3><?php _e('Plugin info','klaro-consent-manager'); ?></h3>
            
			<div class="inner">
				<ul>
					<li><strong><?php _e('Author:','klaro-consent-manager'); ?></strong> <a href="http://wordpress.transformnews.com" target="_blank">m.r.d.a</a></li>
					<li><strong><?php _e('Version:','klaro-consent-manager'); ?></strong> <?php echo KLARO_VERSION; ?></li>
					<li><strong><?php _e('Documentation:','klaro-consent-manager'); ?></strong> <a href="https://wordpress.org/plugins/klaro-consent-manager/" target="_blank">About Plugin</a></li> 
					<li><strong><?php _e('Support Forum','klaro-consent-manager'); ?></strong>: <a href="https://wordpress.org/support/plugin/klaro-consent-manager" target="_blank">WordPress.org</a></li>
					<!--<li><strong><?php _e('Donate:','klaro-consent-manager'); ?></strong> <a href="" target="_blank">Soon</a></li>-->
     
				</ul>
			</div>

			<p><a href="https://wordpress.org/support/plugin/klaro-consent-manager/reviews/" target="_blank"><strong><?php _e('Add your own review','klaro-consent-manager'); ?></strong></a></p>

			</div>
        </div>
		<?php
	}
	
	public function page_init()
	{   
		global $id, $title, $callback, $page;     
		register_setting(
			'klaro_option_group',
			'klaro_option_name',
			array( $this, 'sanitize' )
		);
		
		
		
		
		add_settings_field( $id, $title, $callback, $page, $section = 'default', $args = array() );

		add_settings_section(
			'setting_section_id',
			__(" ", 'klaro-consent-manager'),
			array( $this, 'print_section_info' ),
			'klaro-settings'
			
		);
		
		
		
		
		
		add_settings_field(
			'klaro_id_selector',
			__("Element ID and Cookie Name", 'klaro-consent-manager'),
			array( $this, 'klaro_id_selector_callback' ),
			'klaro-settings',
			'setting_section_id'
		);
		
		add_settings_field(
			'klaro_privacy_link',
			__("Privacy Policy Link", 'klaro-consent-manager'),
			array( $this, 'klaro_privacy_link_callback' ),
			'klaro-settings',
			'setting_section_id'
		);
		
		
		add_settings_field(
			'klaro_zindex', 
			__("Z-index", 'klaro-consent-manager'),
			array( $this, 'klaro_zindex_callback' ), 
			'klaro-settings', 
			'setting_section_id'
		);
		add_settings_field(
			'klaro_bgcolor', 
			__("Background Color", 'klaro-consent-manager'),
			array( $this, 'klaro_bgcolor_callback' ), 
			'klaro-settings', 
			'setting_section_id'
		);
		add_settings_field(
			'klaro_linkcolor', 
			__("Link Color", 'klaro-consent-manager'),
			array( $this, 'klaro_linkcolor_callback' ), 
			'klaro-settings', 
			'setting_section_id'
		);
		add_settings_field(
			'klaro_buttonokcolor', 
			__("Buton OK Color", 'klaro-consent-manager'),
			array( $this, 'klaro_buttonokcolor_callback' ), 
			'klaro-settings', 
			'setting_section_id'
		);
		add_settings_field(
			'klaro_buttondeclinecolor', 
			__("Buton Decline Color", 'klaro-consent-manager'),
			array( $this, 'klaro_buttondeclinecolor_callback' ), 
			'klaro-settings', 
			'setting_section_id'
		);
		add_settings_field(
			'klaro_toggleactivecolor', 
			__("Toggle Color", 'klaro-consent-manager'),
			array( $this, 'klaro_toggleactivecolor_callback' ), 
			'klaro-settings', 
			'setting_section_id'
		);
		add_settings_field(
			'klaro_opacity', 
			__("Opacity", 'klaro-consent-manager'),
			array( $this, 'klaro_opacity_callback' ), 
			'klaro-settings', 
			'setting_section_id'
		);
		add_settings_field(
			'klaro_cookie_expires', 
			__("Cookie expires after", 'klaro-consent-manager'),
			array( $this, 'klaro_cookie_expires_callback' ), 
			'klaro-settings', 
			'setting_section_id'
		);
		
		
		
		add_settings_field(
			'must_consent', 
			__("Must Consent", 'klaro-consent-manager'),
			array( $this, 'must_consent_callback' ), 
			'klaro-settings', 
			'setting_section_id'
		);	
		
		
		add_settings_field(
			'klaro_cssstyle', 
			__("CSS style", 'klaro-consent-manager'),
			array( $this, 'klaro_cssstyle_callback' ), 
			'klaro-settings', 
			'setting_section_id'
		);
		add_settings_field(
			'disable_css', 
			__("Disable CSS style", 'klaro-consent-manager'),
			array( $this, 'disable_css_callback' ), 
			'klaro-settings', 
			'setting_section_id'
		);
		
		
		
		add_settings_field(
			'klaro_disable_at_front_home', 
			__("Disable at", 'klaro-consent-manager'),
			array( $this, 'klaro_enable_callback' ), 
			'klaro-settings', 
			'setting_section_id'
		);
		add_settings_field(
			'klaro_disable_at_blog', 
			__("Disable at", 'klaro-consent-manager'),
			'klaro-settings', 
			'setting_section_id'
		);
		add_settings_field(
			'klaro_disable_at_page', 
			__("Disable at", 'klaro-consent-manager'),
			'klaro-settings', 
			'setting_section_id'
		);
		add_settings_field(
			'klaro_disable_at_tag', 
			__("Disable at", 'klaro-consent-manager'),
			'klaro-settings', 
			'setting_section_id'
		);
		add_settings_field(
			'klaro_disable_at_category', 
			__("Disable at", 'klaro-consent-manager'),
			'klaro-settings', 
			'setting_section_id'
		);
		add_settings_field(
			'klaro_disable_at_single', 
			__("Disable at", 'klaro-consent-manager'),
			'klaro-settings', 
			'setting_section_id'
		);
		add_settings_field(
			'klaro_disable_at_archive', 
			__("Disable at", 'klaro-consent-manager'),
			'klaro-settings', 
			'setting_section_id'
		);
		add_settings_field(
			'klaro_enable_at_pages', 
			__(" ", 'klaro-consent-manager'),
			'klaro-settings', 
			'setting_section_id'
		);
		add_settings_field(
			'klaro_enable_at_posts', 
			__(" ", 'klaro-consent-manager'),
			'klaro-settings', 
			'setting_section_id'
		);
		add_settings_field(
			'klaro_disable_at_search', 
			__("Disable at", 'klaro-consent-manager'),
			'klaro-settings', 
			'setting_section_id'
		);
		add_settings_field(
			'klaro_disable_at_404', 
			__("Disable at", 'klaro-consent-manager'),
			'klaro-settings', 
			'setting_section_id'
		);
		
		
		
	}
/**
* Sanitize each setting field as needed
*
* @param array $input Contains all settings fields as array keys
*/
	public function sanitize( $input )
	{
		$new_input = array();
		if( isset( $input['klaro_id_selector'] ) )
			$new_input['klaro_id_selector'] = sanitize_text_field( $input['klaro_id_selector'] );
			
		if( isset( $input['klaro_privacy_link'] ) )
			$new_input['klaro_privacy_link'] = sanitize_text_field( $input['klaro_privacy_link'] );

		if( isset( $input['klaro_zindex'] ) )
			$new_input['klaro_zindex'] = absint( $input['klaro_zindex'] );

		if( isset( $input['klaro_bgcolor'] ) )
			$new_input['klaro_bgcolor'] = sanitize_text_field( $input['klaro_bgcolor'] );
		
		if( isset( $input['klaro_linkcolor'] ) )
			$new_input['klaro_linkcolor'] = sanitize_text_field( $input['klaro_linkcolor'] );
			
		if( isset( $input['klaro_buttonokcolor'] ) )
			$new_input['klaro_buttonokcolor'] = sanitize_text_field( $input['klaro_buttonokcolor'] );
			
		if( isset( $input['klaro_buttondeclinecolor'] ) )
			$new_input['klaro_buttondeclinecolor'] = sanitize_text_field( $input['klaro_buttondeclinecolor'] );	
			
		if( isset( $input['klaro_toggleactivecolor'] ) )
			$new_input['klaro_toggleactivecolor'] = sanitize_text_field( $input['klaro_toggleactivecolor'] );	

		if( isset( $input['klaro_opacity'] ) )
			$new_input['klaro_opacity'] = absint( $input['klaro_opacity'] );

		if( isset( $input['klaro_cookie_expires'] ) )
			$new_input['klaro_cookie_expires'] = absint( $input['klaro_cookie_expires'] );
			
		if( isset( $input['must_consent'] ) )
			$new_input['must_consent'] = sanitize_text_field( $input['must_consent'] ); 		
			
		if( isset( $input['klaro_cssstyle'] ) )
			$new_input['klaro_cssstyle'] = sanitize_text_field( $input['klaro_cssstyle'] );
			
		if( isset( $input['disable_css'] ) )
			$new_input['disable_css'] = sanitize_text_field( $input['disable_css'] );	
			
			
			
		if( isset( $input['klaro_disable_at_front_home'] ) )
			$new_input['klaro_disable_at_front_home'] = sanitize_text_field( $input['klaro_disable_at_front_home'] );
			
		if( isset( $input['klaro_disable_at_blog'] ) )
			$new_input['klaro_disable_at_blog'] = sanitize_text_field( $input['klaro_disable_at_blog'] );
			
		if( isset( $input['klaro_disable_at_page'] ) )
			$new_input['klaro_disable_at_page'] = sanitize_text_field( $input['klaro_disable_at_page'] );
		
		if( isset( $input['klaro_disable_at_tag'] ) )
			$new_input['klaro_disable_at_tag'] = sanitize_text_field( $input['klaro_disable_at_tag'] );
			
		if( isset( $input['klaro_disable_at_category'] ) )
			$new_input['klaro_disable_at_category'] = sanitize_text_field( $input['klaro_disable_at_category'] );
			
		if( isset( $input['klaro_disable_at_single'] ) )
			$new_input['klaro_disable_at_single'] = sanitize_text_field( $input['klaro_disable_at_single'] );	
			
		if( isset( $input['klaro_disable_at_archive'] ) )
			$new_input['klaro_disable_at_archive'] = sanitize_text_field( $input['klaro_disable_at_archive'] );
			
		if( isset( $input['klaro_enable_at_pages'] ) )
			$new_input['klaro_enable_at_pages'] = sanitize_text_field( $input['klaro_enable_at_pages'] );	
				
		if( isset( $input['klaro_enable_at_posts'] ) )
			$new_input['klaro_enable_at_posts'] = sanitize_text_field( $input['klaro_enable_at_posts'] );
				
		if( isset( $input['klaro_disable_at_search'] ) )
			$new_input['klaro_disable_at_search'] = sanitize_text_field( $input['klaro_disable_at_search'] );
		
		if( isset( $input['klaro_disable_at_404'] ) )
			$new_input['klaro_disable_at_404'] = sanitize_text_field( $input['klaro_disable_at_404'] );
													
		return $new_input;
	}

	public function klaro_default_options() {

		global $options;
		$default = array(

				'klaro_id_selector' => 'klaro',
				'klaro_privacy_link' => '/privacy',
				'klaro_zindex' => '99990',
				'klaro_bgcolor' => '#050404',
				'klaro_linkcolor' => '#00aa3e',
				'klaro_buttonokcolor' => '#00aa3e',
				'klaro_buttondeclinecolor' => '#005091',
				'klaro_toggleactivecolor' => '#005091',
				'klaro_opacity' => '90',
				'klaro_cookie_expires' => '365',
				'klaro_cssstyle' => '.klaro .cookie-modal,.klaro .cookie-notice{font-size:14px}.klaro .cookie-modal .switch,.klaro .cookie-notice .switch{position:relative;display:inline-block;width:50px;height:30px}.klaro .cookie-modal .switch.disabled input:checked+.slider,.klaro .cookie-notice .switch.disabled input:checked+.slider{opacity:.5;background-color:#005091}.klaro .cookie-modal .cm-app-input,.klaro .cookie-notice .cm-app-input{position:absolute;top:0;left:0;opacity:0;width:50px;height:30px}.klaro .cookie-modal .cm-app-label .slider,.klaro .cookie-notice .cm-app-label .slider{position:absolute;cursor:pointer;top:0;left:0;right:0;bottom:0;background-color:#ccc;-webkit-transition:.4s;transition:.4s;width:50px;display:inline-block}.klaro .cookie-modal .cm-app-label .slider:before,.klaro .cookie-notice .cm-app-label .slider:before{position:absolute;content:"";height:20px;width:20px;left:5px;bottom:5px;background-color:#fff;-webkit-transition:.4s;transition:.4s}.klaro .cookie-modal .cm-app-label .slider.round,.klaro .cookie-notice .cm-app-label .slider.round{border-radius:30px}.klaro .cookie-modal .cm-app-label .slider.round:before,.klaro .cookie-notice .cm-app-label .slider.round:before{border-radius:50%}.klaro .cookie-modal .cm-app-label input:focus+.slider,.klaro .cookie-notice .cm-app-label input:focus+.slider{box-shadow:0 0 1px #0885ba}.klaro .cookie-modal .cm-app-label input:checked+.slider:before,.klaro .cookie-notice .cm-app-label input:checked+.slider:before{-webkit-transform:translateX(20px);-ms-transform:translateX(20px);transform:translateX(20px)}.klaro .cookie-modal .cm-app-input:focus+.cm-app-label .slider,.klaro .cookie-notice .cm-app-input:focus+.cm-app-label .slider{box-shadow:0 4px 6px 0 hsla(0,0%,49%,.2),5px 5px 10px 0 hsla(0,0%,49%,.19)}.klaro .cookie-modal .cm-app-input:checked+.cm-app-label .slider,.klaro .cookie-notice .cm-app-input:checked+.cm-app-label .slider{background-color:#0885ba}.klaro .cookie-modal .cm-app-input:checked+.cm-app-label .slider:before,.klaro .cookie-notice .cm-app-input:checked+.cm-app-label .slider:before{-webkit-transform:translateX(20px);-ms-transform:translateX(20px);transform:translateX(20px)}.klaro .cookie-modal .slider,.klaro .cookie-notice .slider{box-shadow:0 4px 6px 0 rgba(0,0,0,.2),5px 5px 10px 0 rgba(0,0,0,.19)}.klaro .cookie-modal a,.klaro .cookie-notice a{color:#00aa3e;text-decoration:none}.klaro .cookie-modal h1,.klaro .cookie-modal h2,.klaro .cookie-modal li,.klaro .cookie-modal p,.klaro .cookie-modal strong,.klaro .cookie-modal ul,.klaro .cookie-notice h1,.klaro .cookie-notice h2,.klaro .cookie-notice li,.klaro .cookie-notice p,.klaro .cookie-notice strong,.klaro .cookie-notice ul{font-family:inherit;color:#eee}.klaro .cookie-modal h1,.klaro .cookie-modal h2,.klaro .cookie-modal li,.klaro .cookie-modal p,.klaro .cookie-modal ul,.klaro .cookie-notice h1,.klaro .cookie-notice h2,.klaro .cookie-notice li,.klaro .cookie-notice p,.klaro .cookie-notice ul{display:block;text-align:left;margin:0;padding:0;margin-top:.7em}.klaro .cookie-modal .cm-btn,.klaro .cookie-notice .cm-btn{box-shadow:0 4px 6px 0 rgba(0,0,0,.2),5px 5px 10px 0 rgba(0,0,0,.19);color:#eee;border-radius:6px;padding:.5em;margin-right:.5em;border:0}.klaro .cookie-modal .cm-btn.cm-btn-sm,.klaro .cookie-notice .cm-btn.cm-btn-sm{padding:.4em;font-size:1em}.klaro .cookie-modal .cm-btn.cm-btn-close,.klaro .cookie-notice .cm-btn.cm-btn-close{background:#eee;color:#000}.klaro .cookie-modal .cm-btn.cm-btn-success,.klaro .cookie-notice .cm-btn.cm-btn-success{background:#00aa3e}.klaro .cookie-modal .cm-btn.cm-btn-danger,.klaro .cookie-notice .cm-btn.cm-btn-danger{background:#005091}.klaro .cookie-modal .cm-btn.cm-btn-info,.klaro .cookie-notice .cm-btn.cm-btn-info{background:#0885ba}.klaro .cookie-modal{overflow:hidden;z-index:1000}.klaro .cookie-modal,.klaro .cookie-modal .cm-bg{width:100%;height:100%;position:fixed;left:0;top:0}.klaro .cookie-modal .cm-bg{background:rgba(0,0,0,.5)}.klaro .cookie-modal .cm-modal{z-index:1001;box-shadow:0 4px 6px 0 rgba(0,0,0,.2),5px 5px 10px 0 rgba(0,0,0,.19);width:100%;max-height:98%;top:50%;transform:translateY(-50%);position:fixed;overflow:auto;background:#333;color:#eee}@media (min-width:1024px){.klaro .cookie-modal .cm-modal{border-radius:4px;position:relative;margin:0 auto;max-width:640px;height:auto;width:auto}}.klaro .cookie-modal .cm-modal .hide{border:none;background:none;position:absolute;top:20px;right:20px;display:block!important}.klaro .cookie-modal .cm-modal .hide svg{stroke:#eee}.klaro .cookie-modal .cm-modal .cm-footer{padding:1em;border-top:1px solid #555}.klaro .cookie-modal .cm-modal .cm-footer a.cm-powered-by{position:absolute;right:1em;color:#999;font-size:.8em;padding-top:4px}.klaro .cookie-modal .cm-modal .cm-header{padding:1em;padding-right:24px;border-bottom:1px solid #555}.klaro .cookie-modal .cm-modal .cm-header h1{margin:0;font-size:2em;display:block}.klaro .cookie-modal .cm-modal .cm-header h1.title{padding-right:20px}.klaro .cookie-modal .cm-modal .cm-body{padding:1em}.klaro .cookie-modal .cm-modal .cm-body ul{display:block}.klaro .cookie-modal .cm-modal .cm-body span{display:inline-block;width:auto}.klaro .cookie-modal .cm-modal .cm-body ul.cm-apps{padding:0;margin:0}.klaro .cookie-modal .cm-modal .cm-body ul.cm-apps li.cm-app{position:relative;line-height:20px;vertical-align:middle;padding-left:60px;min-height:40px}.klaro .cookie-modal .cm-modal .cm-body ul.cm-apps li.cm-app:first-child{margin-top:0}.klaro .cookie-modal .cm-modal .cm-body ul.cm-apps li.cm-app .switch{position:absolute;left:0}.klaro .cookie-modal .cm-modal .cm-body ul.cm-apps li.cm-app p{margin-top:0}.klaro .cookie-modal .cm-modal .cm-body ul.cm-apps li.cm-app p.purposes{font-size:.8em;color:#999}.klaro .cookie-modal .cm-modal .cm-body ul.cm-apps li.cm-app.cm-toggle-all{border-top:1px solid #555;padding-top:1em}.klaro .cookie-modal .cm-modal .cm-body ul.cm-apps li.cm-app span.cm-app-title{font-weight:600; color: #fff;}.klaro .cookie-modal .cm-modal .cm-body ul.cm-apps li.cm-app span.cm-opt-out,.klaro .cookie-modal .cm-modal .cm-body ul.cm-apps li.cm-app span.cm-required{padding-left:.2em;font-size:.8em;color:#999} .klaro .cookie-notice{background:#333;z-index:999;position:fixed;width:100%;bottom:0;right:0}@media (min-width:990px){ .klaro .cookie-notice{box-shadow:0 4px 6px 0 rgba(0,0,0,.2),5px 5px 10px 0 rgba(0,0,0,.19);border-radius:0px;position:fixed;bottom:20px;right:20px;max-width:300px}} @media (max-width:989px){.klaro .cookie-notice{border:none;border-radius:0}}.klaro .cookie-notice .cn-body{margin-bottom:0;margin-right:0;bottom:0;padding:1em;padding-top:0}.klaro .cookie-notice .cn-body p{margin-bottom:.5em}.klaro .cookie-notice .cn-body p.cn-changes{text-decoration:underline}.klaro .cookie-notice .cn-body .cn-learn-more{display:inline-block}.klaro .cookie-notice .cn-body p.cn-ok{padding-top:.5em;margin:0}.klaro .cookie-notice-hidden{display:none!important}'
			);

		if ( get_option('klaro_option_name') == false ) {	
			update_option( 'klaro_option_name', $default );		
		} 
		
		
		if(isset($_POST['reset'])) {
			update_option( 'klaro_option_name', $default );
		}
	
		
	}
	

	public function print_section_info()
	{
		echo __(" ", 'klaro-consent-manager');
    }

	public function klaro_id_selector_callback()
	{
		printf(
			'<p class="description"><input type="text" size="18" id="klaro_id_selector" class="mystickyinput" name="klaro_option_name[klaro_id_selector]" value="%s" /> ',  
			isset( $this->options['klaro_id_selector'] ) ? esc_attr( $this->options['klaro_id_selector']) : '' 
		);
		
		 echo '</p>';
	}
	
	public function klaro_privacy_link_callback()
	{
		printf(
			'<p class="description"><input type="text" size="18" id="klaro_privacy_link" class="mystickyinput" name="klaro_option_name[klaro_privacy_link]" value="%s" /> ',  
			isset( $this->options['klaro_privacy_link'] ) ? esc_attr( $this->options['klaro_privacy_link']) : '' 
		);
		
		 echo 'Put a link to your privacy policy here (relative or absolute). Put shortcode [klaro type="review"] and [klaro type="reset"] to your privacy page so visitor can review, update and reset their consent.</p>';
		 
	}

	public function klaro_zindex_callback()
	{
		printf(
			'<p class="description"><input type="number" min="0" max="2147483647" step="1" id="klaro_zindex" name="klaro_option_name[klaro_zindex]" value="%s" /></p>',
			isset( $this->options['klaro_zindex'] ) ? esc_attr( $this->options['klaro_zindex']) : ''
		);
	}

	public function klaro_bgcolor_callback()
	{
		printf(
			'<p class="description"><input type="text" id="klaro_bgcolor" name="klaro_option_name[klaro_bgcolor]" class="my-color-field" value="%s" /></p> ' ,
			isset( $this->options['klaro_bgcolor'] ) ? esc_attr( $this->options['klaro_bgcolor']) : ''
		);
	}
	
	public function klaro_linkcolor_callback()
	{
		printf(
			'<p class="description"><input type="text" id="klaro_linkcolor" name="klaro_option_name[klaro_linkcolor]" class="my-color-field" value="%s" /></p> ' ,
			isset( $this->options['klaro_linkcolor'] ) ? esc_attr( $this->options['klaro_linkcolor']) : ''
		);
	}
	
	public function klaro_buttonokcolor_callback()
	{
		printf(
			'<p class="description"><input type="text" id="klaro_buttonokcolor" name="klaro_option_name[klaro_buttonokcolor]" class="my-color-field" value="%s" /></p> ' ,
			isset( $this->options['klaro_buttonokcolor'] ) ? esc_attr( $this->options['klaro_buttonokcolor']) : ''
		);
	}
	
	public function klaro_buttondeclinecolor_callback()
	{
		printf(
			'<p class="description"><input type="text" id="klaro_buttondeclinecolor" name="klaro_option_name[klaro_buttondeclinecolor]" class="my-color-field" value="%s" /></p> ' ,
			isset( $this->options['klaro_buttondeclinecolor'] ) ? esc_attr( $this->options['klaro_buttondeclinecolor']) : ''
		);
	}
	
	public function klaro_toggleactivecolor_callback()
	{
		printf(
			'<p class="description"><input type="text" id="klaro_toggleactivecolor" name="klaro_option_name[klaro_toggleactivecolor]" class="my-color-field" value="%s" /></p> ' ,
			isset( $this->options['klaro_toggleactivecolor'] ) ? esc_attr( $this->options['klaro_toggleactivecolor']) : ''
		);
	}

	public function klaro_opacity_callback()
	{
		printf(
			'<p class="description"><input type="number" class="small-text" min="0" step="1" max="100" id="klaro_opacity" name="klaro_option_name[klaro_opacity]"  value="%s" /> ',
			isset( $this->options['klaro_opacity'] ) ? esc_attr( $this->options['klaro_opacity']) : ''
		);
		echo __("numbers 1-100.", 'klaro-consent-manager');
		echo '</p>';
	}


	public function klaro_cookie_expires_callback()
	{
		printf(
		'<p class="description">'
		);
		printf(
		' <input type="number" class="small-text" min="0" step="1" id="klaro_cookie_expires" name="klaro_option_name[klaro_cookie_expires]" value="%s" />',
			isset( $this->options['klaro_cookie_expires'] ) ? esc_attr( $this->options['klaro_cookie_expires']) : ''
		);
		echo __("days", 'klaro-consent-manager');
		echo '</p>';
	}
	

	
	public function must_consent_callback()
	{
			
		printf(
			'<p class="description"><input id="%1$s" name="klaro_option_name[must_consent]" type="checkbox" %2$s /> ',
			'must_consent',
			checked( isset( $this->options['must_consent'] ), true, false ) 
		);
		echo __("If Must Consent is set to true, Klaro will directly display the consent manager modal and not allow the user to close it before having actively consented or declines the use of third-party apps.", 'klaro-consent-manager');
		echo '</p>';	
		
			
	} 
	

	public function klaro_cssstyle_callback()
	{
		printf(
		'<p class="description">'
		);
		echo __("Edit CSS style.", 'klaro-consent-manager');
		echo '</p>';
		printf(
			'<textarea type="text" rows="28" cols="44" id="klaro_cssstyle" name="klaro_option_name[klaro_cssstyle]">%s</textarea> <br />',
			isset( $this->options['klaro_cssstyle'] ) ? esc_attr( $this->options['klaro_cssstyle']) : ''
		);
		
		
	}
	
	public function disable_css_callback()
	{
		printf(
			'<p class="description"><input id="%1$s" name="klaro_option_name[disable_css]" type="checkbox" %2$s /> ',
			'disable_css',
			checked( isset( $this->options['disable_css'] ), true, false ) 
		);
		echo __("Use this option if you plan to include CSS Style manually", 'klaro-consent-manager');
		echo '</p>';	
	} 
	
	
	
		public function klaro_enable_callback()
	{
		
		
		printf(
			'<div><input id="%1$s" name="klaro_option_name[klaro_disable_at_front_home]" type="checkbox" %2$s />  ',
			'klaro_disable_at_front_home',
			checked( isset( $this->options['klaro_disable_at_front_home'] ), true, false ) 
		) ;
		_e('<span>front page </span>', 'klaro-consent-manager');
		printf('</div>');
		printf(
			'<div><input id="%1$s" name="klaro_option_name[klaro_disable_at_blog]" type="checkbox" %2$s /> ',
			'klaro_disable_at_blog',
			checked( isset( $this->options['klaro_disable_at_blog'] ), true, false ) 
		);
		_e('<span>blog page </span>', 'klaro-consent-manager');
		printf('</div>');
		
		printf(
			'<div><input id="%1$s" name="klaro_option_name[klaro_disable_at_page]" type="checkbox" %2$s /> ',
			'klaro_disable_at_page',
			checked( isset( $this->options['klaro_disable_at_page'] ), true, false ) 
		);
		_e('<span>pages </span>', 'klaro-consent-manager');
		printf('</div>');
		
		printf(
			'<div><input id="%1$s" name="klaro_option_name[klaro_disable_at_tag]" type="checkbox" %2$s /> ',
			'klaro_disable_at_tag',
			checked( isset( $this->options['klaro_disable_at_tag'] ), true, false ) 
		);
		_e('<span>tags </span>', 'klaro-consent-manager');
		printf('</div>');
		
		printf(
			'<div><input id="%1$s" name="klaro_option_name[klaro_disable_at_category]" type="checkbox" %2$s /> ',
			'klaro_disable_at_category',
			checked( isset( $this->options['klaro_disable_at_category'] ), true, false ) 
		);
		_e('<span>categories </span>', 'klaro-consent-manager');
		printf('</div>');
		
		printf(
			'<div><input id="%1$s" name="klaro_option_name[klaro_disable_at_single]" type="checkbox" %2$s /> ',
			'klaro_disable_at_single',
			checked( isset( $this->options['klaro_disable_at_single'] ), true, false ) 
		);
		_e('<span>posts </span>', 'klaro-consent-manager');
		printf('</div>');
		
		printf(
			'<div><input id="%1$s" name="klaro_option_name[klaro_disable_at_archive]" type="checkbox" %2$s /> ',
			'klaro_disable_at_archive',
			checked( isset( $this->options['klaro_disable_at_archive'] ), true, false ) 
		);
		_e('<span>archives </span>', 'klaro-consent-manager');
		printf('</div>');
		
		printf(
			'<div><input id="%1$s" name="klaro_option_name[klaro_disable_at_search]" type="checkbox" %2$s /> ',
			'klaro_disable_at_search',
			checked( isset( $this->options['klaro_disable_at_search'] ), true, false ) 
		);
		_e('<span>search </span>', 'klaro-consent-manager');
		printf('</div>');
		
		printf(
			'<div><input id="%1$s" name="klaro_option_name[klaro_disable_at_404]" type="checkbox" %2$s /> ',
			'klaro_disable_at_404',
			checked( isset( $this->options['klaro_disable_at_404'] ), true, false ) 
		);
		_e('<span>404 </span>', 'klaro-consent-manager');
		printf('</div>');
		
	
		if  (isset ( $this->options['klaro_disable_at_page'] ) == true )  {
			
			echo '<p> </p> <hr />';
			_e('<span class="">Except for this pages: </span>', 'klaro-consent-manager');
	
			printf(
				'<input type="text" size="26" id="klaro_enable_at_pages" name="klaro_option_name[klaro_enable_at_pages]" value="%s" /> ',  
				isset( $this->options['klaro_enable_at_pages'] ) ? esc_attr( $this->options['klaro_enable_at_pages']) : '' 
			); 
			
		 	_e('<span class="description">Comma separated list of pages to enable. It should be page name, id or slug. Example: about-us, 1134, Contact Us. Leave blank if you realy want to disable sticky menu for all pages.</span>', 'klaro-consent-manager');
			
		}
	
		if  (isset ( $this->options['klaro_disable_at_single'] ) == true )  {
			
			echo '<p> </p> <hr />';
			_e('<span class="">Except for this posts: </span>', 'klaro-consent-manager');
	
			printf(
				'<input type="text" size="26" id="klaro_enable_at_posts" name="klaro_option_name[klaro_enable_at_posts]" value="%s" /> ',  
				isset( $this->options['klaro_enable_at_posts'] ) ? esc_attr( $this->options['klaro_enable_at_posts']) : '' 
			); 
			
		 	_e('<span class="description">Comma separated list of posts to enable. It should be post name, id or slug. Example: about-us, 1134, Contact Us. Leave blank if you realy want to disable sticky menu for all posts.</span>', 'klaro-consent-manager');
			
		}
	
	}
	
	
	
	


	
	
	
	
	
	public function register_custom_post_type()
	{
		
		
		
		
		
		
		$labels = array(
			'name'					=> __('Klaro Consent Manager','klaro-consent-manager'),
	        'all_items'             => __('Applications','klaro-consent-manager'),
			'singular_name'			=> __('Application','klaro-consent-manager'),
			'add_new'				=> __('Add New','klaro-consent-manager'),
			'add_new_item'			=> __('Add New Application','klaro-consent-manager'),
			'edit_item'				=> __('Edit Application','klaro-consent-manager'),
			'new_item'				=> __('New Applicatione','klaro-consent-manager'),
			'view_item'				=> __('View Application','klaro-consent-manager'),
			'search_items'			=> __('Search Applications','klaro-consent-manager'),
			'not_found'				=> __('Nothing found','klaro-consent-manager'),
			'not_found_in_trash'	=> __('Nothing found in Trash','klaro-consent-manager'),
			'parent_item_colon'		=> ''
		);
		$args = array(
			'labels'				=> $labels,
			'public'				=> false,
			'publicly_queryable'	=> false,
			'exclude_from_search'	=> true,
			'show_ui'				=> true,
			'query_var'				=> true,
			'rewrite'				=> true,
			
			//'show_in_menu'          => true,
			'capabilities' => array(
				'publish_posts' => 'manage_options',
				'edit_posts' => 'manage_options',
				'edit_others_posts' => 'manage_options',
				'delete_posts' => 'manage_options',
				'delete_others_posts' => 'manage_options',
				'read_private_posts' => 'manage_options',
				'edit_post' => 'manage_options',
				'delete_post' => 'manage_options',
				'read_post' => 'manage_options',
			),
			/** done editing */
			//'menu_icon'				=>plugin_dir_url( __FILE__ ).'images/cli_icon.png',
			'hierarchical'			=> false,
			'menu_position'			=> null,
			'supports'				=> array( 'title', 'editor', 'custom-fields' )
		); 
		register_post_type('klaro_consent', $args );
	}
	
	

	
}



class KlaroFrontend
{
	
	public function __construct()
	{
		
	add_action( 'wp_head', array( $this, 'klaro_build_stylesheet_content' ) );
	add_action( 'wp_enqueue_scripts', array( $this, 'klaro_disable_at' ) );
	add_action( 'init', array( $this, 'klaro_load_transl') );
		add_shortcode( 'klaro', array( $this, 'klaro_func' ) );
		
			
	
	
	}
	
	public function klaro_load_transl(){
		load_plugin_textdomain('klaro-consent-manager', FALSE, dirname(plugin_basename(__FILE__)).'/languages/');
	}
	
	public function klaro_func( $atts ) {
		$type = '';
		$a = shortcode_atts( array(
			'type' => $type,
		), $atts );

  		if ($a['type'] == 'review' ) {
    		return '<a href="#" onclick="return klaro.show(klaroConfig)">'. __('Review and update','klaro-consent-manager').'</a>';
  		} 
		
		else if ($a['type'] == 'reset' ) {
			//return '<a href="#" onclick="klaro.getManager().resetConsent();location.reload()">'. __('Reset your consents','klaro-consent-manager').'</a>';
			return '<a href="#" onclick="deleteACookie(),klaro.getManager().resetConsent();location.reload()">'. __('Reset your consents','klaro-consent-manager').'</a>';
	  	}
	}
	
	
	
	public function klaro_build_stylesheet_content() 
	
	{
		
	$klaro_options = get_option( 'klaro_option_name' );
	
	if (isset($klaro_options['disable_css']))
	
	{
		
		//do nothing
		
	} else {
		
		$klaro_options['disable_css'] = false;
		
	};
	
	if  ($klaro_options ['disable_css'] == false )
	
	{
	
	echo '<style  type="text/css">';
	
	echo $klaro_options ['klaro_cssstyle'];
	
	echo '.klaro .cookie-notice {background: '. $klaro_options ['klaro_bgcolor'] .';  z-index: '. $klaro_options ['klaro_zindex'] .';  -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=' . $klaro_options ['klaro_opacity'] . ')"; filter: alpha(opacity=' . $klaro_options ['klaro_opacity'] . '); opacity:' . $klaro_options ['klaro_opacity'] / 100 . '; }';
	echo '.klaro .cookie-modal { z-index: '. $klaro_options ['klaro_zindex'] .'; }';
	echo '.klaro .cookie-modal .cm-modal {background: '. $klaro_options ['klaro_bgcolor'] .';  z-index: '. $klaro_options ['klaro_zindex'] .'; }';
	
	echo '.klaro .cookie-modal a, .klaro .cookie-notice a {color: '. $klaro_options ['klaro_linkcolor'] .';  }';
	
	echo '.klaro .cookie-modal .cm-btn.cm-btn-success, .klaro .cookie-notice .cm-btn.cm-btn-success {background: '. $klaro_options ['klaro_buttonokcolor'] .';  }';
	
	echo '.klaro .cookie-modal .cm-btn.cm-btn-danger, .klaro .cookie-notice .cm-btn.cm-btn-danger {background: '. $klaro_options ['klaro_buttondeclinecolor'] .';  }';

	echo '.klaro .cookie-modal .cm-app-input:checked + .cm-app-label .slider, .klaro .cookie-notice .cm-app-input:checked + .cm-app-label .slider {background-color: '. $klaro_options ['klaro_toggleactivecolor'] .';  }';	
	
	//echo '.klaro .cookie-modal h1, .klaro .cookie-modal h2, .klaro .cookie-modal li, .klaro .cookie-modal p, .klaro .cookie-modal strong, .klaro .cookie-modal ul, .klaro .cookie-notice h1, .klaro .cookie-notice h2, .klaro .cookie-notice li, .klaro .cookie-notice p, .klaro .cookie-notice strong, .klaro .cookie-notice ul {color: #d72a2a;}';
	
	//echo '.klaro .cookie-modal .cm-modal .cm-body ul.cm-apps li.cm-app span.cm-app-title {color:#fff;}';
	
	//echo '.klaro .cookie-modal .cm-modal .cm-body ul.cm-apps li.cm-app p.purposes {color: #999;}';
	
	//echo '@media (min-width:990px){ .klaro .cookie-notice{box-shadow:0 4px 6px 0 rgba(0,0,0,.2),5px 5px 10px 0 rgba(0,0,0,.19);border-radius:0px;position:fixed;bottom:0;right:0;max-width:100%}} ';
	
	echo '</style>';
	}
}


	public function klaro_script() {
		
		$klaro_options = get_option( 'klaro_option_name' );
	
		wp_register_script('klaro-config', plugins_url( 'js/klaro-config.js', __FILE__ ), array('jquery'), KLARO_VERSION, true);
		wp_enqueue_script( 'klaro-config' );
			
		wp_register_script('klaro', plugins_url( 'js/klaro.min.js', __FILE__ ), array('jquery'), KLARO_VERSION, true);
		wp_enqueue_script( 'klaro' );

		$mustConsent = isset($klaro_options['must_consent']) ? $klaro_options['must_consent'] : false;
		$klaroCookieExpires = isset($klaro_options['klaro_cookie_expires']) ? $klaro_options['klaro_cookie_expires'] : '365';
		$consentNoticeDescription = __("We collect and process your personal information for the following purposes: {purposes}. ", 'klaro-consent-manager');
		$consentNoticelearnMore = __("Learn more", 'klaro-consent-manager');
		$consentNoticechangeDescription = __("There were changes since your last visit, please update your consent.", 'klaro-consent-manager');
		$consentModalDescription = __("Here you can see and customize the information that we collect about you.", "klaro-consent-manager");
		$consentModalTitle = __("Information that we collect", "klaro-consent-manager");
		$consentModalPrivacyPolicyText = __("To learn more, please read our {privacyPolicy}. ", "klaro-consent-manager");
		$consentModalPrivacyPolicyName = __("privacy policy", "klaro-consent-manager");
		$klaroPoweredBy = __("Powered by Klaro!", "klaro-consent-manager");
		$klaroOK = __("OK", "klaro-consent-manager");
		$klaroDecline = __("Decline", "klaro-consent-manager");
		$klaroSave = __("Save", "klaro-consent-manager");
		$klaroClose = __("Close", "klaro-consent-manager");
		$appPurpose = __("Purpose", "klaro-consent-manager");
		$appPurposes = __("Purposes", "klaro-consent-manager");
		$appDisableAllTitle = __("Toggle all apps", "klaro-consent-manager");
		$appDisableAllDescription = __("Use this switch to enable/disable all apps.", "klaro-consent-manager");
		$appOptOut = __("(opt-out)", "klaro-consent-manager");
		$appOptOutDescription = __("This app is loaded by default (but you can opt out)", "klaro-consent-manager");
		$appRequired = __("(always required)", "klaro-consent-manager");
		$appRequiredDescription = __("This application is always required", "klaro-consent-manager"); 
		$purposesAnalytics = __("Analytics", "klaro-consent-manager");
		$purposesSecurity = __("Security", "klaro-consent-manager");
		$purposesAdvertising = __("Advertising", "klaro-consent-manager");
		$purposesStyling = __("Styling", "klaro-consent-manager");
		$purposesStatistics = __("Statistics", "klaro-consent-manager");
		$purposesOther = __("Other", "klaro-consent-manager");
		$purposesFunctionality = __("Functionality", "klaro-consent-manager");
	
	
		$query = new WP_Query( array( 'post_type' => 'klaro_consent' ) );

		$jsondata = array();
		
		while ( $query->have_posts() ) : $query->the_post();
		
		$slug = get_post_field( 'post_name', get_post() );		
		
        $default_checked = get_post_meta( get_the_ID(), 'klaro_default_state', true );
		if ( isset( $default_checked ) && '0' !==  $default_checked ) {
	 		$default_checked = false;
		} else {
			$default_checked = true;
		};
		
		$required_checked = get_post_meta( get_the_ID(), 'klaro_required', true );
		if ( isset( $required_checked ) && '0' !==  $required_checked ) {
	 		$required_checked = true;
		} else {
			$required_checked = false;
		};
		
		$optout_checked = get_post_meta( get_the_ID(), 'klaro_optout', true );
		if ( isset( $optout_checked ) && '0' !==  $optout_checked ) {
	 		$optout_checked = true;
		} else {
			$optout_checked = false;
		};
		
		$onlyonce_checked = get_post_meta( get_the_ID(), 'klaro_onlyonce', true );
		if ( isset( $onlyonce_checked ) && '0' !==  $onlyonce_checked ) {
	 		$onlyonce_checked = true;
		} else {
			$onlyonce_checked = false;
		};
		
		
		$klaro_purpose = get_post_meta(get_the_ID(), 'klaro_purposes', false);
		//$klaro_cookies = get_post_meta(get_the_ID(), 'klaro_cookies_list', false);

		
	

		$jsondata[] = array(
    
    		'name' => $slug,
			'title' => get_the_title(),
			'default' => $default_checked,
			'required' => $required_checked,
			'optOut' => $optout_checked,
			'onlyOnce' => $onlyonce_checked,
			//cookies : [
                // you can also explicitly provide a path and a domain for
                // a given cookie. This is necessary if you have apps that
                // set cookies for a path that is not "/" or a domain that
                // is not the current domain. If you do not set these values
                // properly, the cookie can't be deleted by Klaro
                // (there is no way to access the path or domain of a cookie in JS)
              //  [/^_pk_.*$/, '/', 'klaro.kiprotect.com'], //for the production version
              //  [/^_pk_.*$/, '/', 'localhost'], //for the local version
               // 'piwik_ignore'],
			//'cookies' => $klaro_cookies,
			//'purposes' => array ('statistics', 'analytics'),
			'purposes' => $klaro_purpose,
    		'description' => get_the_content(),
    
		);
		endwhile; 
		
		wp_reset_query();

		//ob_clean();
		
		//echo "var json=". json_encode($jsondata);
		
		//exit();
		
		
		
		
		
		
		$klaro_translation_array = array( 
		    'klaroID' => $klaro_options['klaro_id_selector'],
			'klaroPrivacyLink' => $klaro_options['klaro_privacy_link'],
			'klaroCookieExpires' => $klaroCookieExpires,
			'consentNoticeDescription' => $consentNoticeDescription,
			'consentNoticelearnMore' => $consentNoticelearnMore,
			'consentNoticechangeDescription' => $consentNoticechangeDescription,
			'consentModalDescription' => $consentModalDescription,
			'consentModalTitle' => $consentModalTitle,
			'consentModalPrivacyPolicyText' => $consentModalPrivacyPolicyText,
			'consentModalPrivacyPolicyName' => $consentModalPrivacyPolicyName,
			'klaroPoweredBy' => $klaroPoweredBy,
			'klaroOK' => $klaroOK,
			'klaroDecline' => $klaroDecline,
			'klaroSave' => $klaroSave,
			'klaroClose' => $klaroClose,
			'appPurpose' => $appPurpose,
			'appPurposes' => $appPurposes,
			'appDisableAllTitle' => $appDisableAllTitle,
			'appDisableAllDescription' => $appDisableAllDescription,
			'appOptOut' => $appOptOut,
			'appOptOutDescription' => $appOptOutDescription,
			'appRequired' => $appRequired,
			'appRequiredDescription' => $appRequiredDescription,
			'purposesAnalytics' => $purposesAnalytics,
			'purposesSecurity' => $purposesSecurity,
			'purposesAdvertising' => $purposesAdvertising,
			'purposesStyling' => $purposesStyling,
			'purposesStatistics' => $purposesStatistics,
			'purposesFunctionality' =>  $purposesFunctionality,
			'purposesOther' =>  $purposesOther,
			//'allAppsJson' => json_encode($jsondata),
			'allAppsJson' => $jsondata,
			'mustConsent' => $mustConsent,


						
		);
		
		
			wp_localize_script( 'klaro-config', 'option', $klaro_translation_array );
			
	}
	
	
	public function klaro_disable_at() {
	
	
		$klaro_options = get_option( 'klaro_option_name' );	
		
		$klaro_disable_at_front_home = isset($klaro_options['klaro_disable_at_front_home']);
		$klaro_disable_at_blog = isset($klaro_options['klaro_disable_at_blog']);
		$klaro_disable_at_page = isset($klaro_options['klaro_disable_at_page']);
		$klaro_disable_at_tag = isset($klaro_options['klaro_disable_at_tag']);
		$klaro_disable_at_category = isset($klaro_options['klaro_disable_at_category']);
		$klaro_disable_at_single = isset($klaro_options['klaro_disable_at_single']);
		$klaro_disable_at_archive = isset($klaro_options['klaro_disable_at_archive']);
		$klaro_disable_at_search = isset($klaro_options['klaro_disable_at_search']);
		$klaro_disable_at_404 = isset($klaro_options['klaro_disable_at_404']);
		$klaro_enable_at_pages = isset($klaro_options['klaro_enable_at_pages']) ? $klaro_options['klaro_enable_at_pages'] : '';
		$klaro_enable_at_posts = isset($klaro_options['klaro_enable_at_posts']) ? $klaro_options['klaro_enable_at_posts'] : '';
		// Trim input to ignore empty spaces
		$klaro_enable_at_pages_exp = array_map('trim', explode(',', $klaro_enable_at_pages));
		$klaro_enable_at_posts_exp = array_map('trim', explode(',', $klaro_enable_at_posts));
		
		
	
	
		if ( is_front_page() && is_home() ) {
		// Default homepage
			if ( $klaro_disable_at_front_home == false ) { 
				$this->klaro_script();
				
			};
	
	
		} elseif ( is_front_page()){
		//Static homepage
			if ( $klaro_disable_at_front_home == false ) { 
				$this->klaro_script();
			};
	

		} elseif ( is_home()){
		
		//Blog page
			if ( $klaro_disable_at_blog == false ) { 
				$this->klaro_script();
			};
	
	
		} elseif ( is_page() ){
		
		//Single page
			if ( $klaro_disable_at_page == false ) { 
				$this->klaro_script();
			};
		
			if ( is_page( $klaro_enable_at_pages_exp  )  ){ 
			$this->klaro_script();
			}
	
			
		} elseif ( is_tag()){
		
		//Tag page
			if ( $klaro_disable_at_tag == false ) { 
				$this->klaro_script();
			};
	
		} elseif ( is_category()){
		
		//Category page
			if ( $klaro_disable_at_category == false ) { 
				$this->klaro_script();
			};
	
	
		} elseif ( is_single()){
		
		//Single post
			if ( $klaro_disable_at_single == false ) { 
				$this->klaro_script();
			};
		
			if ( is_single( $klaro_enable_at_posts_exp  )  ){ 
				$this->klaro_script();
			}
	
		} elseif ( is_archive()){
		
		//Archive
			if ( $klaro_disable_at_archive == false ) { 
				$this->klaro_script();
			};

		} elseif ( is_search()){
		
		//Archive
			if ( $klaro_disable_at_search == false ) { 
				$this->klaro_script();
			};
		
		} elseif ( is_404()){
		
		//Archive
			if ( $klaro_disable_at_404 == false ) { 
				$this->klaro_script();
			};

		}
		

	}

	
}





//=============================================================================================
// CLASS -> ADD META BOX TO POST PAGE OR CUSTOM POST (EXTENDS CUSTOM FIELDS)
//=============================================================================================
/**
 * Register a meta box using a class.
 */
class KlaroCustomMeta {
 
    /**
     * Constructor.
     */
    public function __construct() {
        if ( is_admin() ) {
            add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
            add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
			add_filter( 'is_protected_meta', array( $this, 'exclude_custom_fields' ), 10, 2);

        }
 
    }
	
		
	/**
     * Hide meta boxes on pages and posts and cpt's
     */
	
	public function exclude_custom_fields( $protected, $meta_key ) {
  		if ( 'klaro_consent' != get_post_type() ) {
    		 if ( in_array( $meta_key, array( 'klaro_default_state', 'klaro_onlyonce', 'klaro_purposes', 'klaro_required', 'klaro_optout' ) ) ) {
      			return true;
    		}
 		}
  		return $protected;
	}
	
 
    /**
     * Meta box initialization.
     */
    public function init_metabox() {
        add_action( 'add_meta_boxes', array( $this, 'add_metabox'  )        );
        add_action( 'save_post',      array( $this, 'save_metabox' ), 10, 2 );
    }
 
    /**
     * Adds the meta box.
     */
    public function add_metabox() {
        add_meta_box(
            'klaro-meta-box',
            __( 'Application settings', 'klaro-consent-manager' ),
            array( $this, 'render_metabox' ),
			
			// where to show, use array to show on diferent post types or pages and posts
			'klaro_consent',
			 //array( 'post_type_slider', 'post', 'page'),
            'advanced',
            'default'
        );
 
    }
 
    /**
     * Renders the meta box.
     */
    public function render_metabox( $post ) {
		
		
		$meta = get_post_meta( $post->ID );
	//	$klaro_cookies_list = ( isset( $meta['klaro_cookies_list'][0] ) && '' !== $meta['klaro_cookies_list'][0] ) ? $meta['klaro_cookies_list'][0] : '';
		$klaro_purposes = ( isset( $meta['klaro_purposes'][0] ) && '' !== $meta['klaro_purposes'][0] ) ? $meta['klaro_purposes'][0] : '';
		$klaro_default_state = ( isset( $meta['klaro_default_state'][0] ) &&  '1' === $meta['klaro_default_state'][0] ) ? 1 : 0;
		$klaro_required = ( isset( $meta['klaro_required'][0] ) &&  '1' === $meta['klaro_required'][0] ) ? 1 : 0;
		$klaro_optout = ( isset( $meta['klaro_optout'][0] ) &&  '1' === $meta['klaro_optout'][0] ) ? 1 : 0;
		$klaro_onlyonce = ( isset( $meta['klaro_onlyonce'][0] ) &&  '1' === $meta['klaro_onlyonce'][0] ) ? 1 : 0;
		
		wp_nonce_field( 'custom_nonce_action', 'custom_nonce' ); // Always add nonce to your meta boxes!
		
		
        // Add nonce for security and authentication. 
        // wp_nonce_field( 'custom_nonce_action', 'custom_nonce' );
		
		?>
        
        <div class="post_meta_extras">
            <!--<p>
			<label><?php // esc_attr_e( 'Cookies List', 'klaro-consent-manager' ); ?></label>
			<input type="text" name="klaro_cookies_list" value="<?php // echo esc_attr( $klaro_cookies_list ); ?>"></br>
            <?php // esc_attr_e( 'A list of regex expressions or strings giving the names of cookies set by this app. If the user withdraws consent for a given app, Klaro will then automatically delete all matching cookies.', 'klaro-consent-manager' ); ?> 
			</p>
         -->
          
             <p>
				<label><?php esc_attr_e( 'Purpose', 'klaro-consent-manager' ); ?></label>   
                
              	<select id="klaro_purposes" name="klaro_purposes" />
	                <option value="analytics" <?php selected( esc_attr( $klaro_purposes ), 'analytics' )?> ><?php _e("Analytics", "klaro-consent-manager"); ?></option>
	                <option value="advertising" <?php selected( esc_attr( $klaro_purposes ), 'advertising')?> ><?php _e("Advertising", "klaro-consent-manager");?></option>
                    <option value="security" <?php selected( esc_attr( $klaro_purposes ), 'security')?> ><?php _e("Security", "klaro-consent-manager");?></option>
                    <option value="statistics" <?php selected( esc_attr( $klaro_purposes ), 'statistics')?> ><?php _e("Statistics", "klaro-consent-manager");?></option>
                    <option value="functionality" <?php selected( esc_attr( $klaro_purposes ), 'functionality')?> ><?php _e("Functionality", "klaro-consent-manager");?></option>
                    <option value="styling" <?php selected( esc_attr( $klaro_purposes ), 'styling')?> ><?php _e("Styling", "klaro-consent-manager");?></option>
                    <option value="other" <?php selected( esc_attr( $klaro_purposes ), 'other')?> ><?php _e("Other", "klaro-consent-manager");?></option>
	          	</select> 
			</p>
			<p>
				<label><input type="checkbox" name="klaro_default_state" value="1" <?php checked( $klaro_default_state, 1 ); ?> /><?php esc_attr_e( 'Set Default state for app to false. Overwrites global "default" setting. We recommend set this to "false" for apps that collect personal information.', 'klaro-consent-manager' ); ?></label>
			</p>
            
            <p>
				<label><input type="checkbox" name="klaro_required" value="1" <?php checked( $klaro_required, 1 ); ?> /><?php esc_attr_e( 'Required. If "required" is set to true, Klaro will not allow this app to be disabled by the user.', 'klaro-consent-manager' ); ?></label>
			</p>
            
             <p>
				<label><input type="checkbox" name="klaro_optout" value="1" <?php checked( $klaro_optout, 1 ); ?> /><?php esc_attr_e( 'Opt-out. If "optOut" is set to true, Klaro will load this app even before the user gave explicit consent. We recommend always leaving this "false".', 'klaro-consent-manager' ); ?></label>
			</p>
            
            
             <p>
				<label><input type="checkbox" name="klaro_onlyonce" value="1" <?php checked( $klaro_onlyonce, 1 ); ?> /><?php esc_attr_e( 'Only Once. If "onlyOnce" is set to true, the app will only be executed once regardless how often the user toggles it on and off.', 'klaro-consent-manager' ); ?></label>
			</p>  
            
            <hr />
            <p><?php esc_attr_e( 'This is the code that have to be included in your script. Please save app before copy...', 'klaro-consent-manager' ); ?></p>
            
            <p>
            <?php 
			$slug = get_post_field( 'post_name', get_post() );
			echo '# Inline scripts: </br>
			
			&lt;script type="opt-in" data-type="application/javascript" data-name="'.$slug.'"&gt; </br>// Your Code... </br> &lt;/script&gt;';
						
			?>
			</p>
            <p>
			<?php echo '
			# External scripts and resources (img, link, ...): </br>
			&lt;script type="opt-in" data-src="//example.com/script.js" data-name="'.$slug.'"&gt;&lt;/script&gt;' 
			?>
            </p>
        
        <?php
		
    }
 
    /**
     * Handles saving the meta box.
     *
     * @param int     $post_id Post ID.
     * @param WP_Post $post    Post object.
     * @return null
     */
    public function save_metabox( $post_id, $post ) {
        // Add nonce for security and authentication.
        $nonce_name   = isset( $_POST['custom_nonce'] ) ? $_POST['custom_nonce'] : '';
        $nonce_action = 'custom_nonce_action';
 
        // Check if nonce is set.
        if ( ! isset( $nonce_name ) ) {
            return;
        }
 
        // Check if nonce is valid.
        if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) ) {
            return;
        }
 
        // Check if user has permissions to save data.
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
 
        // Check if not an autosave.
        if ( wp_is_post_autosave( $post_id ) ) {
            return;
        }
 
        // Check if not a revision.
        if ( wp_is_post_revision( $post_id ) ) {
            return;
        }
		
		/* Ok to save */
 
	/* 	if ( isset( $_POST['klaro_cookies_list'] ) ) { // Input var okay.
			update_post_meta( $post_id, 'klaro_cookies_list', sanitize_text_field( wp_unslash( $_POST['klaro_cookies_list'] ) ) ); // Input var okay.
		}
	*/	
		if ( isset( $_POST['klaro_purposes'] ) ) { // Input var okay.
			update_post_meta( $post_id, 'klaro_purposes', sanitize_text_field( wp_unslash( $_POST['klaro_purposes'] ) ) ); // Input var okay.
		}
   
		$klaro_default_state = ( isset( $_POST['klaro_default_state'] ) && '1' === $_POST['klaro_default_state'] ) ? 1 : 0; // Input var okay.
		update_post_meta( $post_id, 'klaro_default_state', esc_attr( $klaro_default_state ) );
		
		$klaro_required = ( isset( $_POST['klaro_required'] ) && '1' === $_POST['klaro_required'] ) ? 1 : 0; // Input var okay.
		update_post_meta( $post_id, 'klaro_required', esc_attr( $klaro_required ) );
		
		$klaro_optout = ( isset( $_POST['klaro_optout'] ) && '1' === $_POST['klaro_optout'] ) ? 1 : 0; // Input var okay.
		update_post_meta( $post_id, 'klaro_optout', esc_attr( $klaro_optout ) );
		
		$klaro_onlyonce = ( isset( $_POST['klaro_onlyonce'] ) && '1' === $_POST['klaro_onlyonce'] ) ? 1 : 0; // Input var okay.
		update_post_meta( $post_id, 'klaro_onlyonce', esc_attr( $klaro_onlyonce ) );
		
    }
}

if( is_admin() ) {
	
	new KlaroBackend();

} else {
		
	new KlaroFrontend();

}

new KlaroCustomMeta();

?>