<?php
/* This file is forked from the original author Micro Ocean Technologies's MoceanAPI Order SMS Notification plugin on 7/1/2024 */

/**
 * Created by PhpStorm.
 * User: Neoson Lam
 * Date: 4/10/2019
 * Time: 2:15 PM.
 */

class Notify_WooCommerce_Frontend_Scripts implements Notify_Register_Interface {
	public function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'msmswc_admin_enqueue_scripts' ) );
        add_action( 'init', array($this, 'load_bootstrap'));
	}

	public function msmswc_admin_enqueue_scripts() {
		wp_enqueue_script( 'admin-notifysms-scripts', plugins_url( 'js/admin.js', __DIR__ ), array( 'jquery' ), '1.1.5', true );

		//jquery modal
		wp_enqueue_style( 'admin-notifysms-css', plugins_url('css/jquery.modal.min.css', __DIR__ ), array(), '0.9.1' );
		wp_enqueue_script( 'Jquery Modal', plugins_url('js/jquery.modal.js', __DIR__ ), array( 'jquery' ), '0.9.1', true );
	}

    // only load bootstrap 5 in  our plugin page
    public function load_bootstrap()
    {
        if ( isset($_GET['page']) ) {
            $page = sanitize_text_field($_GET['page']);
            global $pagenow;
            if ($pagenow === 'options-general.php' && $this->str_contains($page, '360notify-woocoommerce-setting')) {
                wp_enqueue_style(
                    'admin-notifysms-bootstrap',
                    plugins_url('css/bootstrap.css', __DIR__),
                    array(), // Dependencies
                    '1.0.0'  // Version number
                );
                wp_enqueue_style(
                    'admin-notifysms-wpfooter-fix',
                    plugins_url('css/wpfooter-fix.css', __DIR__),
                    array(), // Dependencies
                    '1.0.0'  // Version number
                );
                wp_style_add_data( 'admin-notifysms-bootstrap', 'rtl', 'replace' );
            }
        }
    }

    private function str_contains($haystack, $needle)
    {
        return $needle !== '' && mb_strpos($haystack, $needle) !== false;
    }
}
