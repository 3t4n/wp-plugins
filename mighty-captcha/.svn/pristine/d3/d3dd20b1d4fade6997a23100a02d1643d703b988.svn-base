<?php
/*
Plugin Name: Mighty-CAPTCHA
Plugin URI:  http://wordpress.sabaoh.com/
Description: Mighty-CAPTCHA add an authentication with Google reCAPTCHA technology to login panel, comment form, and sign-up form. It take an API key which delivered by Google. Please refer to https://www.google.com/recaptcha/intro/index.html for more information.
Version:     1.0
Author:      Eiji 'Sabaoh' Yamada
Author URI:  http://wordpress.sabaoh.com/
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/*  Copyright 2015 Eiji 'Sabaoh' Yamada (email : age.yamada@kxa.biglobe.ne.jp)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/**
 * start with any potential translation
 */
load_plugin_textdomain( 'mighty_captcha', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );

// Instantiate new class
$mighty_captcha = new mighty_captcha();

// mighty_captcha class
class mighty_captcha {

    /**
     * Constractor
     */
    function __construct() {
        // add options
        add_option( 'mighty_captcha_site_key' );
        add_option( 'mighty_captcha_secret_key' );
        add_option( 'mighty_captcha_login_panel' );
        add_option( 'mighty_captcha_login_compact' );
        add_option( 'mighty_captcha_comment_form' );
        add_option( 'mighty_captcha_sign_up' );
        add_option( 'mighty_captcha_sign_up_compact' );
        
        // add admin init hook
        add_action( 'admin_init', array(&$this, 'my_admin_init' ) );

        // add admin menu
        add_action( 'admin_menu', array(&$this, 'my_admin_menu') );

        // show submenu result (maybe wrong usage)
        if ( isset($_POST['submit']) )
            add_action( 'admin_notices', array(&$this, 'my_admin_update_notice') );

        // general java script loading
        add_action( 'wp_enqueue_scripts', array(&$this, 'add_enqueue_script') );
        add_action( 'login_enqueue_scripts', array(&$this, 'add_enqueue_script') );

        // login panel process
        $this->add_login_hook();
        
        // comment form process
        $this->add_comment_hook();
        
        // sign up form process
        $this->add_sign_up_hook();
    }

/*===== admin submenu routines =====*/    
    
    /**
     * register style sheet
     */
    function my_admin_init() {
        wp_register_style(  'pluginStylesheet', plugins_url('css/admin.css', __FILE__) );
    }
       
    /**
     * add submenu
     */
    function my_admin_menu() {
        // add submenu in plugins menu
        $page = add_submenu_page( 'plugins.php',
                                  __('Mighty CAPTCHA', 'mighty_captcha'),
                                  __('Mighty CAPTCHA', 'mighty_captcha'),
                                  'edit_theme_options', 'mighty-captcha', array(&$this, 'my_admin_page') );
        // hook to read stylesheet
        add_action( 'admin_print_styles-'.$page, array(&$this, 'my_admin_styles') );
    }
    
    /**
     * enqueue stylesheet
     */
    function my_admin_styles() {
        wp_enqueue_style( 'pluginStylesheet' );
    }

    /**
     *  submenu main routine
     */
    function my_admin_page() {
        if (isset($_POST['submit'])) {
            // if posted
            $options = array (
                'site_key'             => $_POST['site_key'],
                'secret_key'           => $_POST['secret_key'],
                'login_panel'          => isset($_POST['login_panel']) ? true : false,
                'login_panel_compact'  => isset($_POST['login_panel_compact']) ? true : false,
                'comment_form'         => isset($_POST['comment_form']) ? true : false,
                'sign_up'              => isset($_POST['sign_up']) ? true : false,
                'sign_up_compact'      => isset($_POST['sign_up_compact']) ? true : false,
            );
            // update options
            $flag = true;
            foreach($options as $key => $val) {
                $result = update_option( 'mighty_captcha_' . $key, $val );
                if ( !$result ) $flag = false;
            }
            // display result (not work)
            if ( $flag ) {
                add_action( 'admin_notices', array(&$this, 'my_admin_update_notice') );
            } else {
                add_action( 'admin_notices', array(&$this, 'my_admin_error_notice') );
            }
        }
        $options = array (
            'site_key'             => get_option( 'mighty_captcha_site_key' ),
            'secret_key'           => get_option( 'mighty_captcha_secret_key' ),
            'login_panel'          => get_option( 'mighty_captcha_login_panel' ),
            'login_panel_compact'  => get_option( 'mighty_captcha_login_panel_compact' ),
            'comment_form'         => get_option( 'mighty_captcha_comment_form' ),
            'sign_up'              => get_option( 'mighty_captcha_sign_up' ),
            'sign_up_compact'      => get_option( 'mighty_captcha_sign_up_compact' ),
        );
        ?>
<div id="container">
    <h1><?php _e('Mighty CAPTCHA', 'mighty_captcha'); ?></h1>
    <form name="mighty_captcha" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI'] ); ?>">
        <h2><?php _e( 'keys', 'mighty_captcha' ); ?></h2>
        <div class="keys">
            <p><span class="required">*</span><?php _e(' is required field.', 'mighty_captcha'); ?></p>
            <p><label for="site_key"><?php _e( 'Site key', 'mighty_captcha' ); ?><span class="required">*</span></label>
                <input type="text" id="site_key" name="site_key" size="43" aria-required="true" required="required"
                    <?php if ( isset($options['site_key']) ) echo ' value="'.$options['site_key'].'"'; ?>></p>
            <p><label for="secret_key"><?php _e( 'Secret key', 'mighty_captcha' ); ?><span class="required">*</span></label>
                <input type="text" id="secret_key" name="secret_key" size="43" aria-required="true" required="required"
                    <?php if ( isset($options['secret_key']) ) echo ' value="'.$options['secret_key'].'"'; ?>></p>
        </div>
        <hr />
        <h2><?php _e( 'switch', 'mighty_captcha' ); ?></h2>
        <div>
            <p><input type="checkbox" id="login_panel" name="login_panel" value="true"<?php
                if ( $options['login_panel'] ) echo ' checked="checked"'; ?> />
                <label for="login_panel"><?php _e( 'Login panel', 'mighty_captcha' ); ?></label><br />
                <q><input type="checkbox" id="login_panel_compact" name="login_panel_compact" value="true"<?php
                if ( $options['login_panel_compact'] ) echo ' checked="checked"'; ?> /></q>
                <label for="login_panel_compact"><?php _e('Use compact reCAPTCHA widget for login panel.', 'mighty_captcha'); ?></label>
            </p>
            <p><input type="checkbox" id="comment_form" name="comment_form" value="true"<?php
                if ( $options['comment_form'] ) echo ' checked="checked"'; ?> />
                <label for="comment_form"><?php _e( 'Comment form', 'mighty_captcha' ); ?></label></p>
            <p><input type="checkbox" id="sign_up" name="sign_up" value="true"<?php
                if ( $options['sign_up'] ) echo ' checked="checked"'; ?> />
                <label for="sign_up"><?php _e( 'Sign-up form', 'mighty_captcha' ); ?></label><br />
                <q><input type="checkbox" id="sign_up_compact" name="sign_up_compact" value="true"<?php
                if ( $options['sign_up_compact'] ) echo ' checked="checked"'; ?> /></q>
                <label for="sign_up_compact"><?php _e('Use compact reCAPTCHA widget for register panel.', 'mighty_captcha'); ?></label>
            </p>
        </div>
        <hr />
        <p><?php _e( 'Site key and Secret key are required. Please refer to <a href="https://www.google.com/recaptcha/intro/index.html">' . 
                     'https://www.google.com/recaptcha/intro/index.html</a> for more information.', 'mighty_captcha' ); ?></p>
        <input type="submit" id="submit" name="submit" value="<?php _e( 'submit', 'mighty_captcha' ); ?>">
    </form>
</div>
    <?php
    }
    
    /**
     *  admin submenu success message
     */
    function my_admin_update_notice() {
        $class = 'updated';
        $message = __( 'Update!', 'mighty_captcha' );
        echo "<div class=\"$class\"><p>$message</p></div>"; 
    }

    /**
     *  admin submenu error message
     */
    function my_admin_error_notice() {
        $class = 'error';
        $message = __( 'Error in saving', 'mighty_captcha' );
        echo "<div class=\"$class\"><p>$message</p></div>"; 
    }
    
/*===== reCAPTCHA user interface routine =====*/    

    /**
     * General API script loading
     */
    function add_enqueue_script() {
        $js_uri = 'https://www.google.com/recaptcha/api.js';
        wp_register_script( 'captcha-script-js', $js_uri );
        wp_enqueue_script( 'captcha-script-js' );
        wp_register_style( 'captcha-styles', plugins_url('css/style.css', __FILE__) );
        wp_enqueue_style( 'captcha-styles' );        
    }

/*===== login panel reCAPTCHA routines =====*/    

    /*
     * add reCAPTCHA to login panel
     */
    function add_login_captcha() {
        ?>
        <p class="login-panel-captcha">
            <label for="g-recaptcha"><?php echo _e('You are’nt a robot, are you?','mighty_captcha'); ?><br />
            <div id="g-recaptcha" class="g-recaptcha"<?php if ( get_option('mighty_captcha_login_panel_compact') ) echo ' data-size="compact"'; ?> data-sitekey="<?php echo get_option('mighty_captcha_site_key'); ?>"></div>
            </label>
        </p>
        <?php
    }

    /*
     * reCAPTCHA check routine
     */
    function add_login_check( $user ) {
        /* Checking reCAPTCHA */
        if( !isset( $_POST['g-recaptcha-response'] ) ) {
            return;
        }
        $endpoint = 'https://www.google.com/recaptcha/api/siteverify?secret=' . get_option('mighty_captcha_secret_key') . '&response=' . $_POST['g-recaptcha-response'];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $endpoint);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        $json = curl_exec($curl);
        curl_close($curl) ;
        if ( !preg_match( '/success[^,}]*true/', $json ) ) {
            // did not authentication
            wp_die(__( 'If you are’nt robot and did not check “I’m not a robot”, back to login page and submit after check it.', 'mighty_captcha' ));
        }
    }

    /*
     * switch reCAPTCHA on login panel
     */
    function add_login_hook() {
        if ( get_option( 'mighty_captcha_login_panel' ) ) {
            add_action( 'login_form', array(&$this, 'add_login_captcha') );
            add_action( 'wp_authenticate', array(&$this, 'add_login_check') );
        } else {
            remove_action( 'login_form', array(&$this, 'add_login_captcha') );
            remove_action( 'wp_authenticate', array(&$this, 'add_login_check') );
        }
    }
    
/*===== comment form reCAPTCHA routines =====*/    

    /*
     * add reCAPTCHA to comment form
     */
    function add_comment_captcha( $fields ) {
        $fields['comment-form-captcha'] = '<p class="comment-form-captcha">' .
                '<div class="g-recaptcha" data-sitekey="' . get_option('mighty_captcha_site_key') . '"></div></p>';
        return $fields;
    }

    /*
     * reCAPTCHA check routine
     */
    function add_comment_check( $comment_post_ID ) {
        /* Checking reCAPTCHA */
        if( !isset( $_POST['g-recaptcha-response'] ) ) {
            $_POST['g-recaptcha-response'] = '';
        }
        $endpoint = 'https://www.google.com/recaptcha/api/siteverify?secret=' . get_option('mighty_captcha_secret_key') . '&response=' . $_POST['g-recaptcha-response'];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $endpoint);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        $json = curl_exec($curl);
        curl_close($curl) ;
        if ( !preg_match( '/success[^,}]*true/', $json ) ) {
            // did not authentication
            wp_die(__( 'If you are’nt robot and did not check “I’m not a robot”, back to previous page and submit after check it.', 'mighty_captcha' ));
        }
    }

    /*
     * switch reCAPTCHA on comment form
     */
    function add_comment_hook() {
        if ( get_option( 'mighty_captcha_comment_form' ) ) {
            add_filter('comment_form_default_fields', array(&$this, 'add_comment_captcha'));
            add_action('pre_comment_on_post', array(&$this, 'add_comment_check'));
        } else {
            remove_filter('comment_form_default_fields', array(&$this, 'add_comment_captcha'));
            remove_action('pre_comment_on_post', array(&$this, 'add_comment_check'));
        }
    }

/*===== sign up form reCAPTCHA routines =====*/    

    /*
     * add reCAPTCHA to sign up form
     */
    function add_sign_up_captcha() {
        ?>
        <p class="sign-up-captcha">
            <label for="g-recaptcha"><?php echo _e('You are’nt a robot, are you?','mighty_captcha'); ?><br />
            <div id="g-recaptcha" class="g-recaptcha"<?php if ( get_option('mighty_captcha_sign_up_compact') ) echo ' data-size="compact"'; ?> data-sitekey="<?php echo get_option('mighty_captcha_site_key'); ?>"></div>
            </label>
        </p>
        <?php
    }

    /*
     * reCAPTCHA check routine
     */
    function add_sign_up_check( $error ) {
        /* Checking reCAPTCHA */
        if( !isset( $_POST['g-recaptcha-response'] ) ) {
            $_POST['g-recaptcha-response'] = '';
        }
        $endpoint = 'https://www.google.com/recaptcha/api/siteverify?secret=' . get_option('mighty_captcha_secret_key') . '&response=' . $_POST['g-recaptcha-response'];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $endpoint);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        $json = curl_exec($curl);
        curl_close($curl) ;
        if ( !preg_match( '/success[^,}]*true/', $json ) ) {
            // did not authentication
            wp_die(__( 'If you are’nt robot and did not check “I’m not a robot”, back to previous page and submit after check it.', 'mighty_captcha' ));
        }
        return $error;
    }

    /*
     * switch reCAPTCHA on sign up form
     */
    function add_sign_up_hook() {
        if ( get_option( 'mighty_captcha_sign_up' ) ) {
            add_action( 'register_form', array(&$this, 'add_sign_up_captcha') );
            add_filter( 'registration_errors', array(&$this, 'add_sign_up_check') );
        } else {
            remove_action( 'register_form', array(&$this, 'add_sign_up_captcha') );
            remove_filter( 'registration_errors', array(&$this, 'add_sign_up_check') );
        }
    }
    

}
?>