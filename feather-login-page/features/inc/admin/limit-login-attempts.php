<?php

namespace FeatherLoginPagePro;

class LimitLoginAttempts {
    
    public $errorMessage = "";
    public $errorMessageTakeOver = false;

    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {

        if ( self::$instance == null )
            self::$instance = new LimitLoginAttempts();

        return self::$instance;
         
    }

    function setupExtension() {

        $this->createTable();

        /**
         * Add menu page
         * */
         

        add_action( "admin_menu", function() {
            
            add_submenu_page( "plbp_feather-login-page" , "Limit Login Attempts", "Limit Login Attempts", "manage_options", "limit-login-attempts-ftlp", array( $this, 'view' ));

        } );

       // add_action( "wp_login_failed", array( $this, "hookLoginFailed" ), 10, 2 );
        add_action( "authenticate", array( $this, "hookAuthenticate" ), 35 , 3 );
        
        
       

    }

    function hookLoginFailed( $username, $errorObj ) {

        if ( empty( $username ) ) return;

        $ipAddr = sanitize_text_field($_SERVER['REMOTE_ADDR']);

        $options = $this->getOptionData();
    
        $lockOutTime = sanitize_text_field($options["lockout-time"]);
        $tries = sanitize_text_field($options["retries"]);
        $username = sanitize_text_field($username);

        global $wpdb;

        $time = time();

        $timeDiff = ( $time - ( intval($lockOutTime)* 60 ) );

        $table_name = $wpdb->base_prefix.'ftlp_limitlogin_attempts_logs';
        $query = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $table_name ) );

        if ( $wpdb->get_var( $query ) == $table_name ) {
            $results = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM `ftlp_limitlogin_attempts_logs` WHERE ipAddress LIKE '%s' 
            AND timeDiff > %d", $ipAddr, $timeDiff  )  );

            $results = intval( $results );

            if ( intval( $tries ) > intval( $results ) )
            $wpdb->query( $wpdb->prepare( "INSERT INTO `ftlp_limitlogin_attempts_logs` ( ipAddress, timeDiff, username ) VALUES (  %s, %d, %s )", $ipAddr, $time, $username  ) );
            
        }else{
            $results = '';
        }

       

        

        $results = intval( $results );
       

        

        $totalMessage = sprintf( "<br /><strong>Total Allowed Login Attempts:</strong> %d <br />", intval( $tries  ) );

        if ( $results >= intval( $tries ) )
            $remainingAttempts = 0;
        else
            $remainingAttempts = intval( $tries ) - $results;

        $remainingMessage = sprintf( "<strong>Login Attempts Remaining:</strong> %d <br />", intval( $remainingAttempts  ) );

        $message = $totalMessage . $remainingMessage;

       
        $this->errorMessage = $message;

        $errorObj->add( "ftlp-login-attempts", $this->errorMessage  );
      

        
       
       

    }

    function hookAuthenticate( $user, $userName, $password ) { 
        
        if ( is_wp_error( $user )  ) {
            
            $this->hookLoginFailed( $userName, $user );

        }

        $ipAddr = $_SERVER['REMOTE_ADDR'];


        global $wpdb;
        $ipAddr = $_SERVER['REMOTE_ADDR'];

        $options = $this->getOptionData();

        $lockOutTime = intval( sanitize_text_field($options["lockout-time"]) );
        $tries = intval( sanitize_text_field($options["retries"]) );
        
        $timeDiff = ( time() - ( intval($lockOutTime) * 60 ) );

        $table_name = $wpdb->base_prefix.'ftlp_limitlogin_attempts_logs';
        $query = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $table_name ) );

        if ( $wpdb->get_var( $query ) == $table_name ) {
            $results = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM `ftlp_limitlogin_attempts_logs` WHERE ipAddress LIKE '%s' AND timeDiff > %d", $ipAddr, $timeDiff  )  );

            $results = intval( $results );
        }else{
            $results = false;
        }

        

        if ( intval( $results ) >= $tries  ) {

            $timeRow = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM `ftlp_limitlogin_attempts_logs` where ipAddress LIKE '%s' ORDER BY ID DESC LIMIT 1", $ipAddr ) );


            $date = date( 'd-m-Y H:i:s', strtotime("+30 minutes", $timeRow->timeDiff ) );
            $compareTime = date( 'd-m-Y H:i:s', strtotime("$lockOutTime minutes", $timeRow->timeDiff ) );
           

            $now = new \DateTime();
            $future_date = new \DateTime( $compareTime );

            $interval = $future_date->diff($now);
            
            $error = new \WP_Error();

            $this->errorMessageTakeOver = true;

            $error->add( "ftlp-limit-login-attempts-error", sprintf( "Too many failed login attempts. Please try again in %s",  $interval->format("%i minutes, %s seconds") ) );

            return $error;

        }
        

        return $user;

     }

    function createTable() {

       if ( get_option( "flpp_ext_limit_login_attempts_database_table" ) )
           return;

        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE IF NOT EXISTS `ftlp_limitlogin_attempts_logs` (
            `ID` int(11) NOT NULL AUTO_INCREMENT,
            `ipAddress` varchar(255) NOT NULL,
            `timeDiff` bigint(20) NOT NULL,
            `username` varchar(255) NOT NULL,
           primary key(ID)
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );

        update_option( "flpp_ext_limit_login_attempts_database_table", true );
    
    }

    function view() {

        if ( $this->saveData() )
            printf('<div class="notice notice-%s %s"><p>%s</p></div>', "success", "is-dismissible", "Settings successfully saved.");

        $options = $this->getOptionData();

        require( Config::getViewsPath() . "limit-login-attempts.php" );

    }

    function saveData() {
        
        if ( ! current_user_can( "delete_users" ) )
            return null;
            

        if ( ! isset( $_POST["flpp_ext_limit_login_attempts_save_data"] ) )
            return false;

        $enabled = false;

        if ( isset( $_POST["enable"] ) )
            $enabled = true;

        if ( get_option( "flpp_ext_limit_login_attempts" ) )
            $options = get_option( "flpp_ext_limit_login_attempts" );

        $options["enabled"] = sanitize_text_field($enabled);

        $options["retries"] = intval( sanitize_text_field($_POST["retries"]) );

        $options["lockout-time"] = intval( sanitize_text_field($_POST["lockout-time"]) );

       /*  $options["no-of-lockouts-to-increase"] = intval( $_POST["no-of-lockouts-to-increase"] );

        $options["lockout-time-final"] = intval( $_POST["lockout-time-final"] );

        $options["lockout-reset-time-hours"] = intval( $_POST["lockout-reset-time-hours"] );**/

        update_option( "flpp_ext_limit_login_attempts", $options );
    }


    function getOptionData() {

        $defaults = array(
            "enabled" => false,
            "retries" => 5,
            "lockout-time"=> 30,
            "no-of-lockouts-to-increase" => 3,
            "lockout-time-final" => 12,
            "lockout-reset-time-hours" => 24,
            "blacklist-username" => "",
            "blacklist-ip" => "",
            "safelist-username" => "",
            "safelist-ip" => ""
        );

        return wp_parse_args( get_option( "flpp_ext_limit_login_attempts" ) , $defaults);
    }


}