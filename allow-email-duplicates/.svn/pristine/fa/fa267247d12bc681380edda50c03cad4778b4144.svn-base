<?php
/**
 * Created by PhpStorm.
 * User: wissilesogoyou
 * Date: 9/8/15
 * Time: 12:10 PM
 *
 * Plugin Name: Allow User Email Duplicates
 * Plugin URI: http://www.sogoyou.org
 * Description: Skip email duplicates
 * Author: Wissile Sogoyou
 * Author URI: http://www.sogoyou.org
 * Version: 1.0
 */


add_filter('pre_user_email', 'skip_email_exist');
function skip_email_exist($user_email){
    define( 'WP_IMPORTING', 'SKIP_EMAIL_EXIST' );
    return $user_email;
}
