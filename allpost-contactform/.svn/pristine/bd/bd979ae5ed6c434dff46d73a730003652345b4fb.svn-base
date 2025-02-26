<?php
/*******************************************************************************
Plugin Name: All Post Contact Form
Plugin URI: https://www.Rainbow-Link.com/catalogue.htm?&item_no=RLF16&link_id=wp
Description: You can add a confirmation window and a submission window to your own html form(s) which you created, and send the data inputted into your html form to your E-mail address.
Version: 1.7.9
Requires at least: 4.7.3
Requires PHP: 8.0
Author: RainbowLink Inc.
Author URI: https://www.Rainbow-Link.com/
License: GPL-2.0+
License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
Update URI: https://wordpress.org/plugins/allpost-contactform/
Text Domain: allpost-contactform
Copyright: RainbowLink Inc. (email : info@Rainbow-Link.com)
*******************************************************************************/
/*============================================================================== 
 * The plugin bootstrap file
 * @link              https://www.Rainbow-Link.com
 * @since             1.0.0
 * @package           allpost-contactform
 =============================================================================*/
/*=============================================================================
 * This Plugin is created by using the "WordPress Plugin  
 * Boilerplate".https://github.com/DevinVinson/Plugin-Directory-Boilerplate
 =============================================================================*/    
    if ( ! defined( 'WPINC' ) ) {
        die;
    }
    
    define( 'rl_apcf_dir_path', plugin_dir_path( __FILE__ ) );    
    define( 'rl_apcf_URL_path', plugin_dir_url( __FILE__ ) );
    include rl_apcf_dir_path.'allpost-contactform-language.php';
    include rl_apcf_dir_path.'allpost-contactform-admin-ui.php';
    
    
    new RLAllPostContactForm();
    
    class RL_APCF
    {
        const VERSION = "1.7.9";
	const SHORTCODE = "rlallpostcontactform";
        const OPTIONS = "allpost_contactform_options";
        
        public static function get_option(){
            return get_option(self::OPTIONS);
        }
        
        public static function update_option( $options ){
            if ( empty($options)){
                check_admin_referer('checkadminref_apcf');
                return;
            }
            update_option(self::OPTIONS, $options);
        }
               
        public static function enqueue_css(){
            wp_enqueue_style( 'allpost-contactform-style', plugins_url('allpost-contactform.css', __FILE__ ), array(), self::VERSION );
        }
	
        public static function enqueue_admin_css(){
            wp_enqueue_style( 'allpost-contactform-style', plugins_url('allpost-contactform-admin.css', __FILE__ ), array(), self::VERSION);
        }
    }
    
    
    class RLAllPostContactForm{
        
        var $adminUi;
        
        public function __construct(){
            register_activation_hook(__FILE__, array(&$this,'rl_apcf_activation'));
            add_action( 'admin_init', array(&$this,'rl_apcf_admin_init') );
            add_action( 'admin_menu', array(&$this, 'rl_apcf_admin_menu'));
            add_action( 'wp_enqueue_scripts', array(&$this,'rl_apcf_enqueue_css'));
	    add_shortcode( RL_APCF::SHORTCODE, array(&$this,'disp_shortcode'));
	    add_filter( 'using_the_plugin', 'do_shortcode');
	    add_filter( 'plugin_action_links_'.plugin_basename( __FILE__ ), array( &$this, 'rl_apcf_add_action_links' ), 10, 4 );
        }
        
        function rl_apcf_activation() {
            $option = RL_APCF::get_option();
            include rl_apcf_dir_path.'allpost-contactform-language.php';
            if($option) {
                return;
            }
            $the_first_admin_mail = get_option( 'admin_email' );
            $rl_apcf_users_toppage_url = esc_url( home_url( '/' ) );
            $rlarray = array(
                             "rlapcf_mail" => $the_first_admin_mail,
                             "rlapcf_mailsender" => $rl_apcf_admin_m2_eg,
                             "rlapcf_mailsubject" => $rl_apcf_admin_m3_eg,
                             "rlapcf_ctitle" => $rl_apcf_admin_c1_eg,
                             "rlapcf_cmessage" => $rl_apcf_admin_c2_eg,
                             "rlapcf_cbtn" => $rl_apcf_admin_c3_eg,
                             "rlapcf_stitle" => $rl_apcf_admin_s1_eg,
                             "rlapcf_smessage" => $rl_apcf_admin_s2_eg,
                             "rlapcf_redirectpage" => $rl_apcf_users_toppage_url,
                             "rlapcf_redirecttime" => $rl_apcf_admin_r2_eg,
                             "rlapcf_gototop" => $rl_apcf_admin_g1_eg,
                             "rlapcf_errormsg" => $rl_apcf_admin_e1_eg,
                             "rlapcf_errorbtn" => $rl_apcf_admin_e2_eg,
                             "rlapcf_strreplace" => $rl_apcf_admin_sr1_eg,
                             "rlapcf_cookie" => $rl_apcf_admin_co1_eg,
                             "rlapcf_saveattinserver" => $rl_apcf_admin_sa1_eg
                             );
            RL_APCF::update_option( $rlarray );
        }
        
        function rl_apcf_admin_init() {
            include rl_apcf_dir_path.'allpost-contactform-language.php';
            RL_APCF::enqueue_admin_css();
            $this->adminUi = new RL_APCFAdminUi(__FILE__);
        }
        
        public function rl_apcf_admin_menu() {
            include rl_apcf_dir_path.'allpost-contactform-language.php';
            add_options_page($rl_apcf_admin_Menu_Title, $rl_apcf_admin_Menu_Title, 'administrator', __FILE__, array(&$this->adminUi, 'disp_admin_page'));
        }
        
	function rl_apcf_add_action_links( $links ) {
            include 'allpost-contactform-language.php';
	    $rl_apcf_link_settings = '<a href="'.admin_url( 'options-general.php?page=allpost-contactform/allpost-contactform.php').'">'.$rl_apcf_plugin_list_settings.'</a>';
	    $rl_apcf_link_faq = '<a href="https://www.rainbow-link.com/FAQ.htm?&faq_cate=47" target="_blank">FAQ</a>';
            $rl_apcf_links = array($rl_apcf_link_settings,$rl_apcf_link_faq);
            return array_merge( $links, $rl_apcf_links );
        }
	
        function rl_apcf_enqueue_css() {
            if ( is_admin() ){
                return;
            }
            RL_APCF::enqueue_css();
        }
        
        function disp_rl_apcf(){
            $rl_apcf_forming = new RLAPCF_Start();
            include rl_apcf_dir_path.'allpost-contactform-language.php';
            include rl_apcf_dir_path.'allpost-contactform-core.php';
        }
        
        function disp_shortcode(){
		    ob_start();
		    $this->disp_rl_apcf();
		    $rl_apcf_contents = ob_get_contents();
		    ob_end_clean();
		    return $rl_apcf_contents;
	    }
        
    }
    
    class RLAPCF_Start{
        var $rlapcf_mail;
        var $rlapcf_mailsender;
        var $rlapcf_mailsubject;
        var $rlapcf_ctitle;
        var $rlapcf_cmessage;
        var $rlapcf_cbtn;
        var $rlapcf_stitle;
        var $rlapcf_smessage;
        var $rlapcf_redirectpage;
        var $rlapcf_redirecttime;
        var $rlapcf_gototop;
        var $rlapcf_errormsg;
        var $rlapcf_errorbtn;
        var $rlapcf_strreplace;
        var $rlapcf_cookie;
        var $rlapcf_saveattinserver;
        
        public function __construct(){
            $options = RL_APCF::get_option();
            $this->rlapcf_mail = sanitize_email($options['rlapcf_mail']);
            $this->rlapcf_mailsender = sanitize_text_field($options['rlapcf_mailsender']);
            $this->rlapcf_mailsubject = sanitize_text_field($options['rlapcf_mailsubject']);
            $this->rlapcf_ctitle = sanitize_text_field($options['rlapcf_ctitle']);
            $this->rlapcf_cmessage = sanitize_text_field($options['rlapcf_cmessage']);
            $this->rlapcf_cbtn = sanitize_text_field($options['rlapcf_cbtn']);
            $this->rlapcf_stitle = sanitize_text_field($options['rlapcf_stitle']);
            $this->rlapcf_smessage = sanitize_text_field($options['rlapcf_smessage']);
            $this->rlapcf_redirectpage = sanitize_text_field($options['rlapcf_redirectpage']);
            $this->rlapcf_redirecttime = sanitize_text_field($options['rlapcf_redirecttime']);
            $this->rlapcf_gototop = sanitize_text_field($options['rlapcf_gototop']);
            $this->rlapcf_errormsg = sanitize_text_field($options['rlapcf_errormsg']);
            $this->rlapcf_errorbtn = sanitize_text_field($options['rlapcf_errorbtn']);
            $this->rlapcf_strreplace = sanitize_text_field($options['rlapcf_strreplace']);
            $this->rlapcf_cookie = sanitize_text_field($options['rlapcf_cookie']);
            $this->rlapcf_saveattinserver = sanitize_text_field($options['rlapcf_saveattinserver']);
        }
    }
    

