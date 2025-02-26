<?php

namespace FeatherLoginPagePro;

class CustomLoginURL {

    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {

        if ( self::$instance == null )
            self::$instance = new CustomLoginURL();

        return self::$instance;
    
    }

    public function setupExtension() {
        

         /**
         * logout and redirect
         */

       add_action( "login_init", array( $this, "handleLoginInit" ) );

         /**
         * change login url
         */

       add_action( "init", array( $this, "changeLoginURL" ) );

        /**
         * add redirect field html code on login form page
         */
        add_action( 'login_form', array( $this, "slugHtmlField" ) );
        
        
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueueAssets' ) );

        /**
         * refresh rewrite rule to pretty login url 
         * */ 

        add_action( "admin_init", array( $this, "rewriteLoginURL" ) );


        /**
         * add secret code for unique login url
         */
        add_action( "init", function() {

            //unique key for each site
            $key = sha1(microtime(true).mt_rand(10000,90000));
            
            if ( ! $this->getSecretLoginCode()  )
                update_option( "flpp_ext_customloginurl_secretcode", $key );

        } );

         /**
         * Add menu page
         * */
         

        add_action( "admin_menu", function() {
            
            add_submenu_page( "plbp_feather-login-page" , "Custom Login URL", "Custom Login URL", "manage_options", "custom-login-url-ftlp", array( $this, 'view' ));

        } );

        /**
         * Change lost password and register URL
         */


         add_action( "lostpassword_url", array( $this, "changeLostPasswordURL" ), 10, 2 );
         add_action( "register_url", array( $this, "changeRegisterURL" ), 10, 1 );

        
    
    }

    function changeLostPasswordURL( $lostpasswordURL, $redirectURL ) {
        
        $options = $this->getOptionData();

        $enabled = $options["enabled"];
        
        $slug = $options["slug"];

        if ( $enabled == false )
            return $lostpasswordURL;

        return site_url() . "/" . $slug . "?action=lostpassword" ;
        
    }

    function changeRegisterURL( $registerURL ) {
        
        $options = $this->getOptionData();

        $enabled = $options["enabled"];
        
        $slug = $options["slug"];

        if ( $enabled == false )
            return $registerURL;

        return site_url() . "/" . $slug . "?action=register" ;
        
    }

    function rewriteLoginURL() {

        if ( get_option( "flpp_ext_customloginurl_refreshrewrite" )  ) {

            $options = $this->getOptionData();

            $slug = $options["slug"];

            $secretLoginCode = $this->getSecretLoginCode();

            $regex = 
            add_rewrite_rule(
                            "$slug\/?$", 
                            "wp-login.php?$secretLoginCode&redirect=false", "top" );

            delete_option( 'rewrite_rules' );
            flush_rewrite_rules();

           // delete_option( "flpp_ext_customloginurl_refreshrewrite" );
        
        }

    }

    function enqueueAssets() {
        
        if ( isset( $_GET["page"] ) ) {

            if ( $_GET["page"] !== "custom-login-url-ftlp" )
                return false;

        }

        
        
        wp_enqueue_script( "ftlp-pro", Config::getAssetsURL() . "admin.js" );
    
    }

    function view( $data ) {

        if ( $this->saveData() )
            printf('<div class="notice notice-%s %s"><p>%s</p></div>', "success", "is-dismissible", "Settings successfully saved.");

        $options = $this->getOptionData();
        
        require( Config::getViewsPath() . "custom-login-url-view.php" );

    }

    function slugHTMLField() {

        $options = $this->getOptionData();

        $enabled = $options["enabled"];
        
        $slug = esc_attr($options["slug"]);

        if ( $enabled == false )
            return false;

        echo sprintf( ' <input type="hidden" name="redirectSlug" value="%s" />', $slug );

    }


    function getSecretLoginCode() {

        return get_option( "flpp_ext_customloginurl_secretcode" );
    }

    function changeLoginURL() {
        
        $options = $this->getOptionData();

        $enabled = $options["enabled"];
        
        $slug = $options["slug"];

        $secretLoginCode = $this->getSecretLoginCode();

        if ( $enabled == false )
            return false;

        
        $urlComponents = rtrim ( $_SERVER["REQUEST_URI"], '/' );

        $urlComponents = explode( "/", $urlComponents );

        

        if( end( $urlComponents ) == $slug ) {
            
           

            //wp_safe_redirect(home_url("wp-login.php?$secretLoginCode&redirect=false"));

           // exit();

        }

    }

    function handleLoginInit() {

        $options = $this->getOptionData();

        $enabled = $options["enabled"];
        
        $slug = $options["slug"];

        $redirectURL =  preg_replace("/\s+/", "", $options["redirect_uri"] );

        if ( $enabled == false )
            return false;

        if( isset($_GET['action']) && isset($_GET['key'] ) ) return;

        if( isset($_GET['action']) && $_GET['action'] == 'resetpass' ) return;

        if( isset($_GET['action']) && $_GET['action'] == 'rp' ) return;

        if( isset($_POST['redirectSlug'] ) && $_POST['redirectSlug'] == $slug)              return false;

        if( strpos($_SERVER['REQUEST_URI'], 'action=logout') !== false ) {

            check_admin_referer( 'log-out' );

            $user = wp_get_current_user();

            wp_logout();

            wp_safe_redirect( home_url(), 302 );

            die;
        
        }

        $secretLoginCode = $this->getSecretLoginCode();

       
      
        

        if( ( strpos($_SERVER['REQUEST_URI'], $secretLoginCode) === false  ) && ( strpos($_SERVER['REQUEST_URI'], 'wp-login.php') !== false  ) ) {

           
            if ( $redirectURL == "" )
                wp_safe_redirect( home_url( '404' ), 302 );
            else
                wp_redirect( $redirectURL, 302 );

            exit();

        }

    }

    function saveData() {

        if ( ! current_user_can( "delete_users" ) )
            return null;

        if ( ! isset( $_POST["flpp_ext_customloginurl_save_data"] ) )
            return false;

        $enabled = false;

        if ( isset( $_POST["enable"] ) )
            $enabled = true;

        $slug = $_POST["slug"];

        $redirect_uri = $_POST["redirect_uri"];

        $nonce_code = sanitize_text_field($_POST["verify_nonce"]);
        $isNonceValid = wp_verify_nonce( $nonce_code, 'customLoginUrl_saveData_nonce' );

        if(!$isNonceValid){
            return false;
        }
        $options = array(
            "enabled" => sanitize_text_field($enabled),
            "slug" => sanitize_text_field($slug),
            "redirect_uri" => sanitize_url($redirect_uri)
        );

        update_option( "flpp_ext_customloginurl_options", $options );
        
        if ( $enabled == "true" )
            add_option( "flpp_ext_customloginurl_refreshrewrite", true );
        else
            delete_option( "flpp_ext_customloginurl_refreshrewrite" );

        flush_rewrite_rules();

        $this->rewriteLoginURL();


        return true;

    }

    function getOptionData() {

        $defaults = array(
            "enabled" => false,
            "slug" => "",
            "redirect_uri" => ""
        );

        return wp_parse_args( get_option( "flpp_ext_customloginurl_options" ) , $defaults);
    }


}