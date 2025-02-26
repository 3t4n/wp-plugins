<?php
/**
 * Plugin class logic goes here
 */
class CONTRIX_CSP{

    /**
     * Instance of this class.
     *
     * @since    0.1.0
     *
     * @var      object
     */
    protected static $instance = null;

	private $comingsoon_rendered = false;

	function __construct(){

			extract(contrix_csp_get_settings());
            // Actions & Filters if the landing page is active or being previewed
            if((!empty($status) && $status == '1') || (isset($_GET['cs_preview']) && $_GET['cs_preview'] == 'true')){
               	add_action( 'template_redirect', array(&$this,'render_comingsoon_page'));
                add_action( 'admin_bar_menu',array( &$this, 'admin_bar_menu' ), 1000 );
            }

            // Add this script globally so we can view the notification across the admin area
            add_action('admin_enqueue_scripts', array(&$this,'add_scripts') );
            add_action('redux/options/contrix_csp/saved', array(&$this,'report_usage') );
            
    }

    /**
     * Return an instance of this class.
     *
     * @since     0.1.0
     *
     * @return    object    A single instance of this class.
     */
    public static function get_instance() {

        // If the single instance hasn't been set, set it now.
        if ( null == self::$instance ) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * Get pages and put in assoc array
     */
    function get_pages(){
        $pages = get_pages();
        $page_arr = array();
        if(is_array($pages)){
            foreach($pages as $k=>$v){
                $page_arr[$v->ID] = $v->post_title;
            }
        }
        return $page_arr;
    }

    /**
     * Display admin bar when active
     */
    function admin_bar_menu($str){
        global $contrix_csp_settings,$wp_admin_bar;
        extract($contrix_csp_settings);

        if(!isset($status)){
            return false;
        }

        $msg = '';
        if($status == '1'){
        	$msg = __('3D Coming Soon Mode Active','redux-framework');
        }
    	//Add the main siteadmin menu item
        $wp_admin_bar->add_menu( array(
            'id'     => 'contrix-csp-notice',
            'href' => admin_url().'admin.php?page=contrix_csp_options&tab=0',
            'parent' => 'top-secondary',
            'title'  => $msg,
            'meta'   => array( 'class' => 'csp-mode-active' ),
        ) );
    }

    /**
     * Display the default template
     */
    function get_default_template(){
        $file = file_get_contents(CONTRIX_CSP_PLUGIN_PATH.'/themes/default/index.php');
        return $file;
    }

	/**
     * Load scripts
     */
    function add_scripts($hook) {
        wp_enqueue_style( 'contrix-csp-adminbar-notification', CONTRIX_CSP_PLUGIN_URL.'inc/adminbar-style.css', false, CONTRIX_CSP_VERSION, 'screen');
    }

     /**
     * Get Font Family
     */
    public static function get_font_family($font){
        $fonts                    = array();
        $fonts['_arial']          = 'Helvetica, Arial, sans-serif';
        $fonts['_arial_black']    = 'Arial Black, Arial Black, Gadget, sans-serif';
        $fonts['_georgia']        = 'Georgia,serif';
        $fonts['_helvetica_neue'] = '"Helvetica Neue", Helvetica, Arial, sans-serif';
        $fonts['_impact']         = 'Charcoal,Impact,sans-serif';
        $fonts['_lucida']         = 'Lucida Grande,Lucida Sans Unicode, sans-serif';
        $fonts['_palatino']       = 'Palatino,Palatino Linotype, Book Antiqua, serif';
        $fonts['_tahoma']         = 'Geneva,Tahoma,sans-serif';
        $fonts['_times']          = 'Times,Times New Roman, serif';
        $fonts['_trebuchet']      = 'Trebuchet MS, sans-serif';
        $fonts['_verdana']        = 'Verdana, Geneva, sans-serif';

        if(!empty($fonts[$font])){
            $font_family = $fonts[$font];
        }else{
            $font_family = 'Helvetica Neue, Arial, sans-serif';
        }

        echo $font_family;
    }

   
    /**
     * Display the coming soon page
     */
    function render_comingsoon_page() {

    	extract(contrix_csp_get_settings());

        if(!isset($status)){
            $err =  new WP_Error('error', __("Please enter your settings.", 'redux-framework'));
            echo $err->get_error_message();
            exit();
        }

       
        if(empty($_GET['cs_preview'])){
            $_GET['cs_preview'] = false;
        }

        // Check if Preview
        $is_preview = false;
        if ((isset($_GET['cs_preview']) && $_GET['cs_preview'] == 'true')) {
        	
        	
        	//if($_SERVER["HTTP_REFERER"]){
        		//$serverName = $_SERVER['SERVER_NAME'];
        		//$referer = $_SERVER["HTTP_REFERER"];
        		//$referer = parse_url($referer);
        		//error_log( $serverName .','.$referer[host]);
        		//if($serverName)
        		$is_preview = true;
        	//}else{
        		//$is_preview = false;
        	//}
        	
        	
          
        }

        // Exit if a custom login page
        if(empty($disable_default_excluded_urls)){
            if(preg_match("/login|admin|dashboard|account/i",$_SERVER['REQUEST_URI']) > 0 && $is_preview == false){
                return false;
            }
        }


        // Check if user is logged in.
        if($is_preview === false){
            if(is_user_logged_in()){
                return false;
            }
        }


        // Finally check if we should show the coming soon page.
        $this->comingsoon_rendered = true;

        // render template tags

        $template = $this->get_default_template();
        require_once( CONTRIX_CSP_PLUGIN_PATH.'/themes/default/functions.php' );
        $template_tags = array(
            '{Title}' => contrix_csp_title(),
            '{MetaDescription}' => contrix_csp_metadescription(),
            '{Privacy}' => contrix_csp_privacy(),
            '{Favicon}' => contrix_csp_favicon(),
            '{Head}' => contrix_csp_head(),
            '{Logo}' => contrix_csp_logo(),
            '{Headline}' => contrix_csp_headline(),
            '{Description}' => contrix_csp_description(),
        	'{Countdown}' => contrix_csp_countdown(),
        	'{CubePath}' => contrix_csp_cube_path(),
        	'{PluginPath}' => CONTRIX_CSP_PLUGIN_URL,
        	'{Social}' => contrix_csp_social(),
        	'{Scripts}' => contrix_csp_scripts(),
            );
		echo strtr($template, $template_tags);
        exit();

    }
    /**
     * Report activate / deactive to contrixlab
     */
    function report_usage() {
    	
    	$options = get_option( 'contrix_csp' );
    	$siteUrl = get_site_url(); 
    	$url = 'http://csp.contrixlab.com:8080/!/csp/usage';
    	try {
    		$response=wp_remote_post( $url, array(
    					'timeout' => 10,
						'method' => 'POST',
    					'body' => array('site' => $siteUrl,'status' =>$options['status'])
			 ) );
    		
    	}catch(Exception $e){
    		
    	}
    }
    

}
