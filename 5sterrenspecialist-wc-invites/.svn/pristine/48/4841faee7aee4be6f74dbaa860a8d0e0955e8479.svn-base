<?php

class FiveSter_Admin {

    public $notice;
    public $error;

    public function __construct() {
        $this->load();
    }

    private function load() {
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    }

    function admin_menu() {
        add_options_page( FIVESTER_INVITE_NAME__, FIVESTER_INVITE_NAME__, "manage_options", FIVESTER_INVITE_SLUG__, array( $this, 'admin_settings' ) );
    }

    function admin_settings() {
        if ( isset( $_POST['5ster-settings'] ) && wp_verify_nonce( $_POST['nonce'], $_POST['tab'] ) ) {
	        
			switch ( $_POST['tab'] ) {
				case 'fields':
					self::setOption( 'employeeFirstname', sanitize_text_field($_POST['employeeFirstname']) );
					self::setOption( 'employeeSurname', sanitize_text_field($_POST['employeeSurname']) );
					self::setOption( 'employeeEmail', sanitize_email($_POST['employeeEmail']) );
					self::setOption( 'reminderDelayInDays', sanitize_text_field($_POST['reminderDelayInDays'] ));
					self::setOption( 'debug', filter_var( @$_POST['debug'], FILTER_SANITIZE_NUMBER_INT) );
					break;
				case 'config':
					self::setOption( 'companyID', sanitize_text_field($_POST['companyID']) );
					self::setOption( 'password', sanitize_text_field($_POST['password']) );
					self::setOption( 'blacklist', sanitize_textarea_field($_POST['blacklist']) );
					break;
			}
        }

        include_once FIVESTER_INVITE_DIR__ . 'resources/admin/includes/settings.php';
        
    }

    public static function getOption( $field, $default = false ) {
        return get_option( FIVESTER_INVITE_SLUG__ . $field, $default );
    }

    public static function setOption( $field, $value ) {
        return update_option( FIVESTER_INVITE_SLUG__ . $field, $value );
    }

    public static function deleteOption( $field ) {
        return delete_option( FIVESTER_INVITE_SLUG__ . $field );
    }

}