<?php

namespace FeatherLoginPagePro;


class ExpirableLoginLink {

    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {

        if ( self::$instance == null )
            self::$instance = new ExpirableLoginLink();

        return self::$instance;
    
    }

    function setupExtension() {


         /**
         * Add menu page
         * */
         

        add_action( "admin_menu", function() {
            
            add_submenu_page( "plbp_feather-login-page" , "Expirable Login Link", "Expirable Login Link", "manage_options", "expirable-login-link", array( $this, 'view' ));

        } );

        /**
         * load assets
         * */
        add_action( "admin_enqueue_scripts", function() {

            if ( get_current_screen()->id != "feather-login-designer_page_expirable-login-link" )
                return;

            wp_enqueue_script( "react" );
            wp_enqueue_script( "react-dom" );
           
            wp_enqueue_script( "ftlpp-ext-expirable-login-link", Config::getAssetsURL() . "expirable-login-link.js", array( "react", "react-dom" ), '1.0', true );

            wp_localize_script('ftlpp-ext-expirable-login-link', 'nonceKeyNewTempUser', array( 'nonce_token' => wp_create_nonce('new_temp_user_token') ) );

            wp_enqueue_style( "ftlpp-ext-expirable-login-link-style", Config::getAssetsURL() . "expirable-login-link.css" );

        } );

        add_action( "wp_ajax_ftlpp-ext-expirable-login-link", array( $this, "createTempAccountLink" ) );

        //add_action( "wp_ajax_nopriv_ftlpp-ext-expirable-login-link", array( $this, "createTempAccountLink" ) );

        add_action( "wp_ajax_ftlpp-ext-expirable-get-users", array( $this, "getListOfUsers" ) );

        //add_action( "wp_ajax_nopriv_ftlpp-ext-expirable-get-users", array( $this, "getListOfUsers" ) );

        add_action( "wp_ajax_ftlpp-ext-expirable-delete-user", array( $this, "deleteUser" ) );

       // add_action( "wp_ajax_nopriv_ftlpp-ext-expirable-delete-user", array( $this, "deleteUser" ) );

        add_action( "admin_init", array( $this, "restrictControlToMenuPage" ) );

        add_action( "init", array( $this, "loginUser" ) );

    }

    function deleteUser() {
        
        $nonceKey = sanitize_text_field( $_GET['nonce'] );
        if( ! wp_verify_nonce( $nonceKey, 'new_temp_user_token') ){
            die('Security Verification failed.');
        }

        if(!current_user_can('delete_users')){
            return;
        }

        require_once( ABSPATH . "wp-admin/includes/user.php" );

        if ( isset( $_GET["id"] ) ) {
            
            $userId = $_GET["id"];

            if ( get_user_meta( $userId , "flpp_ext_expirable_login_link_is_our_user", true ) ) {
                wp_delete_user( $userId );
            }
        }
    }

    function getListOfUsers() {

        $nonceKey = sanitize_text_field( $_GET['nonce'] );
        if( ! wp_verify_nonce( $nonceKey, 'new_temp_user_token') ){
            die('Security Verification failed.');
        }

        if(!current_user_can('delete_users')){
            return;
        }

        $users = get_users(
            array(
                "meta_key" => "flpp_ext_expirable_login_link_is_our_user"
            )
        );

        $usersToReturn = array();


        foreach( $users as $user ) {

            if ( ! get_user_meta( $user->ID , "flpp_ext_expirable_login_link_is_our_user", true ) ) continue;

            $userObj = new \stdClass();

            $userObj->id = sanitize_text_field($user->ID);
            $userObj->email = sanitize_text_field($user->user_email);
            $userObj->firstName = sanitize_text_field(get_user_meta( $user->ID , "first_name", true ) );
            $userObj->accountLinkExpiry = sanitize_text_field(get_user_meta( $user->ID , "flpp_ext_expirable_login_link_expiry_time", true ));
            $userObj->loginCode = sanitize_text_field(get_user_meta( $user->ID, "flpp_ext_expirable_login_link_login_id" , true ));
            $userObj->expiryDate = sanitize_text_field(get_user_meta( $user->ID, "flpp_ext_expirable_login_link_expiry_date", true ));
            $userObj->role = sanitize_text_field($user->roles[0]);
            $userObj->userRegDateTime = sanitize_text_field($user->user_registered);
            $userObj->loginLink = esc_url_raw( admin_url() . "?ftlppexpire&id=$user->ID&loginCode=$userObj->loginCode" );

            $dateExpiry = new \DateTime( $userObj->expiryDate );
            $dateCompare = new \DateTime( "now" );

            if ( $dateCompare > $dateExpiry ) {
                $userObj->status = "Expired";
            } else {
                $userObj->status = "Active";
            }

            $usersToReturn[] = $userObj;

        }

        
        echo json_encode( $usersToReturn );

        exit;

    }

    function restrictControlToMenuPage() {

       // echo '<pre>' . print_r( $GLOBALS[ 'menu' ], TRUE) . '</pre>';

        if ( is_user_logged_in() ) {
            
            $user = wp_get_current_user();

            if ( get_user_meta( $user->ID, "flpp_ext_expirable_login_link_is_our_user", true ) ) {


                //remove access to user profile page
                remove_menu_page( "profile.php" );

                //remove access to the plugin which allows to create temp logins
                remove_menu_page( "plbp_feather-login-page" );
                
            }


        }

    }

    function loginUser() {

        
        

        if ( isset( $_GET["ftlppexpire"] ) ) {
           
            $userId = $_GET["id"];
            
            $uniqueLoginCode = $_GET["loginCode"];

            $userUniqueLoginCode = get_user_meta( $userId , "flpp_ext_expirable_login_link_login_id", true );
           
           
            if ( $uniqueLoginCode === $userUniqueLoginCode  ) {

                $dateExpiry = new \DateTime( get_user_meta( $userId, "flpp_ext_expirable_login_link_expiry_date", true ) );

                $dateCompare = new \DateTime( "now" );

                if ( $dateCompare > $dateExpiry )
                    die( "<h3 style='margin-top: 30%'><center>Temporary Login link is expired.</center></h3>" );
               
    
                $user = new \WP_User( $userId );

                $user->add_role( $userInfo->roles[0] );

                $user->add_cap( "list_users", false );
                $user->add_cap( "manage_network_users", false );
                $user->add_cap( "remove_users", false );
                $user->add_cap( "delete_users", false );
                $user->add_cap( "add_users", false );
                $user->add_cap( "create_users", false );
                $user->add_cap( "promote_users", false );
                $user->add_cap( "read", true );

                wp_set_current_user( $userId );
                wp_set_auth_cookie( $userId, false, is_ssl() );
                

                wp_redirect( admin_url() );
                exit;

            }

        }
    }

    function createTempAccountLink() {

        if ( ! current_user_can( "delete_users" ) )
            return null;
        
        header( "content-type", "application/json" );

        $user = file_get_contents( "php://input" );

        $user = json_decode( $user );

        $nonceKey = sanitize_text_field( $user->noncekey );

        if( ! wp_verify_nonce( $nonceKey, 'new_temp_user_token') ){
            die('Security Verification failed.');

        }
        $firstName = sanitize_text_field( $user->firstName );

        $email = sanitize_text_field( $user->email );

        $role = sanitize_text_field( $user->role );

        $expiryTime = sanitize_text_field( $user->accountLinkExpiry );


       
        

        $userData = array(
            "user_login" => $email,
            "user_email" => $email,
            "first_name" => $firstName,
            "role" => $role
        );

        $userId = wp_insert_user( $userData );

        

        if ( ! is_wp_error( $userId ) ) {

            $uniqueLoginCode = md5( uniqid( rand() ) );

            update_user_meta( $userId, "flpp_ext_expirable_login_link_expiry_time", $expiryTime );

            update_user_meta( $userId, "flpp_ext_expirable_login_link_login_id", $uniqueLoginCode );

            update_user_meta( $userId, "flpp_ext_expirable_login_link_is_our_user", true );

            $expiryDate = date("Y-m-d H:i:s", strtotime(" +$expiryTime hours" ) );

            update_user_meta( $userId, "flpp_ext_expirable_login_link_expiry_date", $expiryDate );

            $returnResponse = array(
                "error"     => false,
                "message"   => "",
                "userId" => $userId,
                "loginCodee" => $uniqueLoginCode
            );

        } else {
            
            $returnResponse = array(
                "error"     => true,
                "message"   => $userId->get_error_message(),
                "userId" => null,
                "loginCode" => null
            );

           

        }


        echo json_encode( $returnResponse );
        
        
        //wp_send_json( $this->getOptionData() );

        exit;

    }

    function view() {

        $options = $this->getOptionData();

        require( Config::getViewsPath() . "expirable-login-link-view.php" );

    }


    function getOptionData() {

        $defaults = array(
           
            
            array(
                "firstName" => "",
                "lastName" => "",
                "email" => "",
                "role" => "administrator",
                "accountLinkExpiry" => "",
                "redirectTo" => ""
            )

        );

        return wp_parse_args( get_option( "flpp_ext_expirable_login_link" ) , $defaults);
    }

}