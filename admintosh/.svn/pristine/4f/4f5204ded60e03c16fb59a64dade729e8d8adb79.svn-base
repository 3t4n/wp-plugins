<?php
namespace Admintosh\Inc;
 /**
  * 
  * @package    Admintosh
  * @version    1.0.0
  * @author     wpmobo
  * @Websites: http://wpmobo.com
  *
  */

class Modules_Setup {


    function __construct() {
        $this->init();
    }

    public function init() {

        $opt = get_option( ADMINTOSH_OPTION_NAME );

        // is Active Captcha
        if( !empty( $opt['active_captcha'] ) ) {
            new \Admintosh\Inc\Recaptcha();
        }

        // is Active Dashboard Design Customization
        if( !empty( $opt['active_login_dashboard_customiz'] ) ) {
            new \Admintosh\Inc\Dashboard();
        }

        // is Active Dashboard Design Customization
        if( !empty( $opt['active_login_page_customiz'] ) ) {
            new \Admintosh\Inc\Login_Page_Customize();
        }

        // is Active Login Attempts
        if( !empty( $opt['active_login_attempts'] ) ) {
            new \Admintosh\Inc\Limit_Login_Attempts();
        }

        // Hide login
        if( !empty( $opt['active_hide_login'] ) ) {
            new \Admintosh\Inc\Hide_Login();
        }
        
        // Login History
        if( !empty( $opt['active_login_history'] ) ) {
            new \Admintosh\Inc\Login_History();
        }
        
        // country restriction
        if( !empty( $opt['active_country_restriction'] ) ) {
            new \Admintosh\Inc\Country_Block();
        }

    }



}