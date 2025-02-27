<?php
defined( 'ABSPATH' ) or exit;
function mbo_display_install_notice()
{
    if ( !get_transient( MOLONGUI_BUMP_OFFER_NAME . '-activated' ) ) return;

    $n_content = array();
    $plugin_function = "highlights_plugin";
    $class_name = '\Molongui\\'.MOLONGUI_BUMP_OFFER_NAMESPACE.'\Includes\Highlights';
    if ( method_exists( $class_name, $plugin_function ) )
    {
        $plugin_class = new $class_name();
        $n_content    = $plugin_class->{$plugin_function}();
    }
    if ( empty( $n_content ) ) return;
    $notice = array
    (
        'id'          => 'install-notice-dismissal',
        'type'        => 'success',
        'content'     => $n_content,
        'dismissible' => true,
        'dismissal'   => 'forever',
        'class'       => 'molongui-notice molongui-notice-activated',
        'pages'       => array
        (
            'dashboard' => 'dashboard',
            'updates'   => 'update-core',
            'plugins'   => 'plugins',
            'plugin'    => 'molongui_page_' . MOLONGUI_BUMP_OFFER_NAME,
        ),
    );
    mbo_notice_display( $notice['id'], $notice['type'], $notice['content'], $notice['dismissible'], $notice['dismissal'], $notice['class'], $notice['pages'] );
}
add_action( 'admin_notices', 'mbo_display_install_notice' );
function mbo_display_whatsnew_notice()
{
    if ( !get_transient( MOLONGUI_BUMP_OFFER_NAME . '-updated' ) ) return;

    $n_content = array();
    $current_release = str_replace('.', '', MOLONGUI_BUMP_OFFER_VERSION );
    $plugin_function = "highlights_release_{$current_release}";
    $class_name = '\Molongui\\'.MOLONGUI_BUMP_OFFER_NAMESPACE.'\Includes\Highlights';
    if ( method_exists( $class_name, $plugin_function ) )
    {
        $plugin_class = new $class_name();
        $n_content    = $plugin_class->{$plugin_function}();
    }
    if ( empty( $n_content ) ) return;
    $notice = array
    (
        'id'          => 'whatsnew-notice-dismissal',
        'type'        => 'success',
        'content'     => $n_content,
        'dismissible' => true,
        'dismissal'   => 'forever',
        'class'       => 'molongui-notice molongui-notice-whatsnew',
        'pages'       => array
        (
            'dashboard' => 'dashboard',
            'updates'   => 'update-core',
            'plugins'   => 'plugins',
            'plugin'    => 'molongui_page_' . MOLONGUI_BUMP_OFFER_NAME,
        ),
    );
    mbo_notice_display( $notice['id'], $notice['type'], $notice['content'], $notice['dismissible'], $notice['dismissal'], $notice['class'], $notice['pages'] );
}
add_action( 'admin_notices', 'mbo_display_whatsnew_notice' );
function mbo_reset_whatsnew_notice( $response, $hook_extra, $result )
{
    if ( isset( $hook_extra['plugin'] ) and $hook_extra['plugin'] != MOLONGUI_BUMP_OFFER_BASENAME ) return $result;
    delete_transient( MOLONGUI_BUMP_OFFER_NAME . '-activated' );
    set_transient( MOLONGUI_BUMP_OFFER_NAME . '-updated', 1 );
    $notices = get_option( MOLONGUI_BUMP_OFFER_NOTICES );
    unset( $notices['whatsnew-notice-dismissal'] );
    update_option( MOLONGUI_BUMP_OFFER_NOTICES, $notices );
    return $result;
}
add_filter( 'upgrader_post_install', 'mbo_reset_whatsnew_notice', 10, 3 );
function mbo_display_upgrade_notice()
{
    if ( !apply_filters( 'mbo/admin/show_upgrade_notice', true ) ) return;
    $notice = array
    (
        'id'          => 'upgrade-notice-dismissal',
        'type'        => 'info',
        'content'     => array
        (
            'image'   => '',
            'icon'    => '',
            'title'   => sprintf( __( "%sMore features? It's time to upgrade your %s plugin to Premium vesion!%s", 'molongui-bump-offer' ), '<a href="'.MOLONGUI_BUMP_OFFER_WEB.'" target="_blank" >', MOLONGUI_BUMP_OFFER_TITLE, '</a>' ),
            'message' => __( "Extend standard plugin functionality with new great options.", 'molongui-bump-offer' ),
            'buttons' => array(),
            'button'  => array
            (
                'id'     => '',
                'href'   => MOLONGUI_BUMP_OFFER_WEB,
                'target' => '_blank',
                'class'  => '',
                'icon'   => '',
                'label'  => __( "Learn more", 'molongui-bump-offer' ),
            ),
        ),
        'dismissible' => true,
        'dismissal'   => 60,
        'class'       => 'molongui-notice molongui-notice-orange molongui-notice-icon-star',
        'pages'       => array
        (
            'dashboard' => 'dashboard',
            'updates'   => 'update-core',
            'plugins'   => 'plugins',
            'plugin'    => 'molongui_page_'.MOLONGUI_BUMP_OFFER_NAME,
        ),
    );
    if ( defined( MOLONGUI_BUMP_OFFER_CPT ) )
    {
        $notice['pages'][MOLONGUI_BUMP_OFFER_CPT]         = MOLONGUI_BUMP_OFFER_CPT;
        $notice['pages']['edit-'.MOLONGUI_BUMP_OFFER_CPT] = 'edit-'.MOLONGUI_BUMP_OFFER_CPT;
    }
    mbo_notice_display( $notice['id'], $notice['type'], $notice['content'], $notice['dismissible'], $notice['dismissal'], $notice['class'], $notice['pages'] );
}
function mbo_recommended_pro_warning()
{
    if ( defined( 'MOLONGUI_BUMP_OFFER_PRO_BASENAME' ) and is_plugin_active( MOLONGUI_BUMP_OFFER_PRO_BASENAME ) )
    {
        if ( defined( 'MOLONGUI_BUMP_OFFER_PRO_VERSION' ) and  defined( 'MOLONGUI_BUMP_OFFER_RECOMMENDED_PRO' ) and version_compare( MOLONGUI_BUMP_OFFER_PRO_VERSION, MOLONGUI_BUMP_OFFER_RECOMMENDED_PRO, '<' ) )
        {
            /*! translators: 1: <strong> 2: </strong> 3: <strong> 4: </strong> */
            $message  = sprintf( esc_html__( '%1$sYou are running an old version of Molongui Boilerplate Pro%2$s. Some plugin features might not work as expected. %3$sPlease update the plugin%4$s to the latest available version.', 'molongui-bump-offer' ), '<strong>', '</strong>', '<strong>', '</strong>' );

            if ( current_user_can( 'activate_plugins' ) )
            {
                $update_url    = wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' ) . MOLONGUI_BUMP_OFFER_PRO_BASENAME, 'upgrade-plugin_'.MOLONGUI_BUMP_OFFER_PRO_BASENAME );
                $download_url  = 'https://www.molongui.com/my-account/api-downloads/';
                $message      .= sprintf( '<p><a href="%s" class="button-primary">%s</a> <a href="%s" target="_blank" class="button">%s</a></p>', $update_url, __( "Update It Now", 'molongui-bump-offer' ), $download_url, __( "Download latest", 'molongui-bump-offer' ) );
            }

            $html_message = sprintf( '<div class="error">%s</div>', wpautop( $message ) );
            echo wp_kses_post( $html_message );
        }
    }
}
add_action( 'admin_notices', 'mbo_recommended_pro_warning' );
function mbo_display_rate_notice()
{
    $installation = get_option( MOLONGUI_BUMP_OFFER_INSTALLATION );

    if ( empty( $installation ) or !isset( $installation['timestamp'] ) )
    {
        $installation = array
        (
            'timestamp' => time(),
            'version'   => MOLONGUI_BUMP_OFFER_VERSION,
        );

        update_option( MOLONGUI_BUMP_OFFER_INSTALLATION, $installation );
        return;
    }
    else
    {
        $installation_date = $installation['timestamp'];
    }
    $threshold_date = strtotime( '+30 days', $installation_date );
    if ( !empty( $installation_date ) and ( time() <= $threshold_date ) ) return;
    global $current_user;
    $notice = array
    (
        'id'          => 'rate-notice-dismissal',
        'type'        => 'info',
        'content'     => array
        (
            'image'   => '',
            'icon'    => '',
            'title'   => sprintf( __( "Like %s?", 'molongui-bump-offer' ), MOLONGUI_BUMP_OFFER_TITLE ),
            'message' => sprintf( __( "Hey %s, hope you're happy with %s plugin. We would really appreciate it if you dropped us a quick rating!", 'molongui-bump-offer' ), $current_user->display_name, MOLONGUI_BUMP_OFFER_TITLE ),
            'buttons' => array(),
            'button'  => array
            (
                'id'     => MOLONGUI_BUMP_OFFER_NAME.'-rate-button',
                'href'   => 'https://wordpress.org/support/plugin/'.MOLONGUI_BUMP_OFFER_NAME.'/reviews/?filter=5#new-post',
                'target' => '_blank',
                'class'  => 'molongui-notice-rate-button',
                'icon'   => '',
                'label'  => __( "Rate plugin", 'molongui-bump-offer' ),
            ),
        ),
        'dismissible' => true,
        'dismissal'   => 'forever',
        'class'       => 'molongui-notice molongui-notice-blue molongui-notice-icon-heart',
        'pages'       => array
        (
            'dashboard' => 'dashboard',
            'updates'   => 'update-core',
            'plugins'   => 'plugins',
            'plugin'    => 'molongui_page_'.MOLONGUI_BUMP_OFFER_NAME,
        ),
    );
    if ( defined( MOLONGUI_BUMP_OFFER_CPT ) )
    {
        $notice['pages'][MOLONGUI_BUMP_OFFER_CPT]         = MOLONGUI_BUMP_OFFER_CPT;
        $notice['pages']['edit-'.MOLONGUI_BUMP_OFFER_CPT] = 'edit-'.MOLONGUI_BUMP_OFFER_CPT;
    }
    mbo_notice_display( $notice['id'], $notice['type'], $notice['content'], $notice['dismissible'], $notice['dismissal'], $notice['class'], $notice['pages'] );
}
if ( did_action( '_molongui/notice/loaded' ) ) return;
function mbo_notice_dismiss()
{
    check_ajax_referer( 'molongui-notice-nonce', 'security', true );
    $plugin_id = sanitize_text_field( $_POST['plugin_id'] );
    $name      = sanitize_text_field( $_POST['dismissible_id'] );
    $value     = sanitize_text_field( $_POST['dismissible_length'] );
    if ( empty( $plugin_id ) ) wp_die();
    $key = molongui_get_constant( $plugin_id, 'NOTICES' );
    $notices = get_option( $key );
    $notices[$name] = ( 'forever' == $value ? 'forever' : time() + absint( $value ) * DAY_IN_SECONDS );
    update_option( $key, $notices );
    wp_die();
}
add_action( 'wp_ajax_molongui_notice_dismiss', 'mbo_notice_dismiss' );
function mbo_register_notice_styles()
{
    $file = MOLONGUI_BUMP_OFFER_FOLDER . ( is_rtl() ? '/assets/css/common/notice-rtl.5221.min.css' : '/assets/css/common/notice.be16.min.css' );
    if ( file_exists( trailingslashit( WP_PLUGIN_DIR ) . $file ) )
    {
        wp_register_style( 'molongui-notice-styles', plugins_url( '/' ).$file, array(), MOLONGUI_BUMP_OFFER_VERSION, 'screen' );
    }
}
add_action( 'admin_enqueue_scripts', 'mbo_register_notice_styles' );
function mbo_register_notice_scripts()
{
    $file = MOLONGUI_BUMP_OFFER_FOLDER . '/assets/js/common/notice.d651.min.js';
    if ( file_exists( trailingslashit( WP_PLUGIN_DIR ) . $file ) )
    {
        wp_register_script( 'molongui-notice-scripts', plugins_url( '/' ).$file, array( 'jquery' ), MOLONGUI_BUMP_OFFER_VERSION, true );
        wp_localize_script( 'molongui-notice-scripts', 'molongui_notice_params', array
        (
            'ajax_nonce' => wp_create_nonce( 'molongui-notice-nonce' ),
        ));
    }
}
add_action( 'admin_enqueue_scripts', 'mbo_register_notice_scripts' );

/*!
 * PRIVATE ACTION HOOK.
 *
 * For internal use only. Not intended to be used by plugin or theme developers.
 * Future compatibility NOT guaranteed.
 *
 * Please do not rely on this hook for your custom code to work. As a private hook it is meant to be used only by
 * Molongui. It may be edited, renamed or removed from future releases without prior notice or deprecation phase.
 *
 * If you choose to ignore this notice and use this filter, please note that you do so at on your own risk and knowing
 * that it could cause code failure.
 */
do_action( '_molongui/notice/loaded' );