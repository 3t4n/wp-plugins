<?php

namespace Molongui\BumpOffer\Includes;
\defined( 'ABSPATH' ) or exit;
final class Plugin
{
    const MINIMUM_WC_VERSION = '2.5.0';
    private $wc;
    const HAS_CUSTOMIZER = false;
    private static $_instance = null;
    public function __clone()
    {
        \_doing_it_wrong( __FUNCTION__, \esc_html__( "Cloning instances of this class is forbidden.", 'molongui-bump-offer' ), '2.2.0' );
    }
    public function __wakeup()
    {
        \_doing_it_wrong( __FUNCTION__, \esc_html__( "Unserializing instances of this class is forbidden.", 'molongui-bump-offer' ), '2.2.0' );
    }
    public static function instance()
    {
        if ( \is_null( self::$_instance ) )
        {
            self::$_instance = new self();
            \do_action( 'mbo/loaded' );
        }

        return self::$_instance;
    }
    public function __construct()
    {
        require_once MOLONGUI_BUMP_OFFER_DIR . 'config/plugin.php';
        require_once MOLONGUI_BUMP_OFFER_DIR . 'includes/autoloader.php';
        \register_activation_hook( MOLONGUI_BUMP_OFFER_FILE, array( $this, 'activate' ) );
        \register_deactivation_hook( MOLONGUI_BUMP_OFFER_FILE, array( $this, 'deactivate' ) );
        \add_action( 'wpmu_new_blog', array( $this, 'activate_on_new_blog' ), 10, 6 );
        \add_action( 'plugins_loaded', array( $this, 'on_plugins_loaded' ) );
        return true;
    }
    public function activate( $network_wide )
    {
        Activator::activate( $network_wide );
    }
    public function deactivate( $network_wide )
    {
        Deactivator::deactivate( $network_wide );
    }
    public function activate_on_new_blog( $blog_id, $user_id, $domain, $path, $site_id, $meta )
    {
        Activator::activate_on_new_blog( $blog_id, $user_id, $domain, $path, $site_id, $meta );
    }
    public function on_plugins_loaded()
    {
        $this->update_db();

        if ( $this->is_compatible() )
        {
            $this->init();
        }
    }
    private function update_db()
    {
        $update_db = new \Molongui\BumpOffer\Includes\Libraries\Common\DB_Update( MOLONGUI_BUMP_OFFER_DB, MOLONGUI_BUMP_OFFER_DB_VERSION, MOLONGUI_BUMP_OFFER_NAMESPACE );
        if ( $update_db->db_update_needed() ) $update_db->run_update();
    }
    private function is_compatible()
    {
        if ( !\did_action( 'woocommerce_loaded' ) )
        {
            \add_action( 'admin_notices', array( $this, 'admin_notice_missing_woocommerce_plugin' ) );
            return false;
        }
        global $woocommerce;
        if ( \version_compare( $woocommerce->version, self::MINIMUM_WC_VERSION, '<' ) )
        {
            \add_action( 'admin_notices', array( $this, 'admin_notice_minimum_woocommerce_version' ) );
            return false;
        }

        return true;
    }
    public function admin_notice_missing_woocommerce_plugin()
    {
        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        /*! translators: 1: <strong> 2: </strong> 3: <strong> 4: </strong> */
        $message = \sprintf( \esc_html__( '%1$sMolongui Deals, Sales Promotions and Upsells for WooCommerce%2$s requires WooCommerce to be installed and activated. Because it is not, the plugin is currently %3$sNOT RUNNING%4$s.', 'molongui-bump-offer' ), '<strong>', '</strong>', '<strong>', '</strong>' );

        if ( \current_user_can( 'activate_plugins' ) )
        {
            if ( $this->is_wc_installed() )
            {
                $activation_url = \wp_nonce_url( 'plugins.php?action=activate&amp;plugin='.$this->wc['basename'].'&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_'.$this->wc['basename'] );
                $message .= \sprintf( '<p><a href="%s" class="button-primary">%s</a></p>', $activation_url, __( "Activate WooCommerce", 'molongui-bump-offer' ) );
            }
            else
            {
                $install_url = \wp_nonce_url( \self_admin_url( 'update.php?action=install-plugin&plugin='.$this->wc['TextDomain'] ), 'install-plugin_'.$this->wc['TextDomain'] );
                $message .= \sprintf( '<p><a href="%s" class="button-primary">%s</a></p>', $install_url, __( "Install WooCommerce", 'molongui-bump-offer' ) );
            }
        }

        $html_message = \sprintf( '<div class="error">%s</div>', \wpautop( $message ) );
        echo \wp_kses_post( $html_message );
    }
    private function is_wc_installed()
    {
        $installed_plugins = \get_plugins();
        $key = \array_search( 'woocommerce', \array_map( function( $v ){ return $v['TextDomain']; }, $installed_plugins ) );
        if ( !empty( $key ) )
        {
            $this->wc = $installed_plugins[$key];
            $this->wc['basename'] = $key;
            return \version_compare( $installed_plugins[$key]['Version'], self::MINIMUM_WC_VERSION, '>=' );
        }
        else
        {
            $this->wc['basename']   = 'woocommerce';
            $this->wc['TextDomain'] = 'woocommerce';
        }

        return false;
    }
    public function admin_notice_minimum_woocommerce_version()
    {
        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        /*! translators: 1: <strong> 2: </strong> 3: Core plugin version 4: <strong> 5: </strong> */
        $message = \sprintf( \esc_html__( '%1$sMolongui Deals, Sales Promotions and Upsells for WooCommerce%2$s requires WooCommerce version %3$s or greater. Because you are using an earlier version, the plugin is currently %4$sNOT RUNNING%5$s.', 'molongui-bump-offer' ), '<strong>', '</strong>', self::MINIMUM_WC_VERSION, '<strong>', '</strong>' );

        if ( \current_user_can( 'activate_plugins' ) )
        {
            $update_url = \wp_nonce_url( \self_admin_url( 'update.php?action=upgrade-plugin&plugin=woocommerce/woocommerce.php' ), 'upgrade-plugin_woocommerce/woocommerce.php' );
            $message .= \sprintf( '<p><a href="%s" class="button-primary">%s</a></p>', $update_url, __( "Update It Now", 'molongui-bump-offer' ) );
        }

        $html_message = \sprintf( '<div class="error">%s</div>', \wpautop( $message ) );
        echo \wp_kses_post( $html_message );
    }
    public function init()
    {
        require_once MOLONGUI_BUMP_OFFER_DIR . 'includes/load.php';
        \add_action( 'init', array( $this, 'hook_customizer' ) );
        \do_action( 'mbo/init' );
    }
    public function hook_customizer()
    {
        if ( self::HAS_CUSTOMIZER and \molongui_is_request( 'customizer' ) )
        {
            if ( apply_filters( 'mbo/load_customizer', true ) )
            {
                new \Molongui\BumpOffer\Customizer\Common\Customizer( MOLONGUI_BUMP_OFFER_NAME );
            }
        }
    }

} // class
Plugin::instance();