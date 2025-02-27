<?php
defined( 'ABSPATH' ) or exit;
if ( is_admin() )
{
    function mbo_load_wc_admin_styles( $screen_ids )
    {
        $screen_ids[] = MOLONGUI_BUMP_OFFER_CPT;
        $screen_ids[] = 'edit-'.MOLONGUI_BUMP_OFFER_CPT;

        return $screen_ids;
    }
    add_filter( 'woocommerce_screen_ids', 'mbo_load_wc_admin_styles' );
    $file     = apply_filters( 'mbo/bump/admin/stylesheet', MOLONGUI_BUMP_OFFER_FOLDER . ( is_rtl() ? '/assets/css/bump-admin-rtl.0739.min.css' : '/assets/css/bump-admin.d36c.min.css' ) );
    $filepath = trailingslashit( WP_PLUGIN_DIR ) . $file;
    if ( file_exists( $filepath ) )
    {
        add_filter( '_mbo/bump/admin/stylesheet', function() use ( $file )
        {
            return $file;
        }, 10 );

        $filesize = filesize( $filepath );
        if ( $filesize > 4096 )
        {
            add_filter( 'mbo/bump/admin/inline/stylesheet', '__return_false', 0 );
            add_action( 'admin_enqueue_scripts', 'mbo_load_bump_admin_styles' );
        }
        elseif ( $filesize )
        {
            add_filter( 'mbo/bump/admin/inline/stylesheet', '__return_true', 0 );
            add_action( 'admin_head', 'mbo_load_bump_admin_styles' );
        }
    }
    function mbo_load_bump_admin_styles()
    {
        $screen = get_current_screen();
        if ( apply_filters( 'mbo/bump/admin/enqueue_styles', in_array( $screen->id, array( MOLONGUI_BUMP_OFFER_CPT, 'edit-' . MOLONGUI_BUMP_OFFER_CPT ) ), $screen ) )
        {
            /*!
             * PRIVATE FILTER.
             *
             * For internal use only. Not intended to be used by plugin or theme developers.
             * Future compatibility NOT guaranteed.
             *
             * Please do not rely on this filter for your custom code to work. As a private filter it is meant to be
             * used only by Molongui. It may be edited, renamed or removed from future releases without prior notice
             * or deprecation phase.
             *
             * If you choose to ignore this notice and use this filter, please note that you do so at on your own risk
             * and knowing that it could cause code failure.
             */
            if ( $file = apply_filters( '_mbo/bump/admin/stylesheet', false ) )
            {
                $inline = apply_filters( 'mbo/bump/admin/inline/stylesheet', true );
                if ( $inline )
                {
                    $styles       = file_get_contents( trailingslashit( WP_PLUGIN_DIR ) . $file );
                    $onthefly_css = mbo_get_var_bump_admin_styles();
                    echo '<style id="' . MOLONGUI_BUMP_OFFER_NAME . '-inline-css" type="text/css" data-file="' . basename( $file ) . '">' . $styles . $onthefly_css . '</style>';
                }
                else
                {
                    wp_register_style( MOLONGUI_BUMP_OFFER_NAME, plugins_url( '/' ) . $file, array( 'wp-color-picker' ), MOLONGUI_BUMP_OFFER_VERSION, 'all' );
                    $onthefly_css = mbo_get_var_bump_admin_styles();
                    if ( !empty( $onthefly_css ) )
                    {
                        wp_add_inline_style( MOLONGUI_BUMP_OFFER_NAME, $onthefly_css );
                    }

                    wp_enqueue_style( MOLONGUI_BUMP_OFFER_NAME );
                }
            }
        }
    }
    function mbo_get_var_bump_admin_styles()
    {
        $css = '';
        $css .= "";
        return $css;
    }
    $file     = MOLONGUI_BUMP_OFFER_FOLDER . ( is_rtl() ? '/assets/css/common/media-upload-rtl.min.css' : '/assets/css/common/media-upload.min.css' );
    $filepath = trailingslashit( WP_PLUGIN_DIR ) . $file;

    if ( file_exists( $filepath ) )
    {
        add_filter( '_mbo/bump/admin/media_styles', function() use ( $file ){ return $file; }, 10 );

        $filesize = filesize( $filepath );
        if ( $filesize > 4096 )
        {
            add_filter( 'mbo/bump/admin/inline/media_styles', '__return_false', 0 );
            add_action( 'admin_enqueue_scripts', 'mbo_load_media_uploader_styles' );
        }
        elseif ( $filesize )
        {
            add_filter( 'mbo/bump/admin/inline/media_styles', '__return_true', 0 );
            add_action( 'admin_head', 'mbo_load_media_uploader_styles' );
        }
    }
    function mbo_load_media_uploader_styles()
    {
        $screen = get_current_screen();

        if ( apply_filters( 'mbo/bump/admin/enqueue_styles', in_array( $screen->id, array( MOLONGUI_BUMP_OFFER_CPT ) ), $screen ) )
        {
            /*!
             * PRIVATE FILTER.
             *
             * For internal use only. Not intended to be used by plugin or theme developers.
             * Future compatibility NOT guaranteed.
             *
             * Please do not rely on this filter for your custom code to work. As a private filter it is meant to be
             * used only by Molongui. It may be edited, renamed or removed from future releases without prior notice
             * or deprecation phase.
             *
             * If you choose to ignore this notice and use this filter, please note that you do so at on your own risk
             * and knowing that it could cause code failure.
             */
            if ( $file = apply_filters( '_mbo/bump/admin/media_styles', false ) )
            {
                $inline = apply_filters( 'mbo/bump/admin/inline/media_styles', true );
                if ( $inline )
                {
                    $styles = file_get_contents( trailingslashit( WP_PLUGIN_DIR ) . $file );
                    echo '<style id="' . MOLONGUI_BUMP_OFFER_NAME . '-media-inline-css" type="text/css" data-file="' . basename( $file ) . '">' . $styles . '</style>';
                }
                else
                {
                    wp_register_style( MOLONGUI_BUMP_OFFER_NAME . '-media', plugins_url( '/' ) . $file, array(), MOLONGUI_BUMP_OFFER_VERSION, 'all' );
                    wp_enqueue_style( MOLONGUI_BUMP_OFFER_NAME . '-media' );
                }
            }
        }
    }
}
function mbo_register_bump_styles()
{
    $file = apply_filters( 'mbo/bump/stylesheet', MOLONGUI_BUMP_OFFER_FOLDER . ( is_rtl() ? '/assets/css/bump-rtl.0838.min.css' : '/assets/css/bump.20a8.min.css' ) );

    wp_register_style( MOLONGUI_BUMP_OFFER_NAME . '-styles', plugins_url( '/' ).$file, array(), MOLONGUI_BUMP_OFFER_VERSION, 'screen' );
    $onthefly_css = mbo_get_var_bump_styles();
    if ( !empty( $onthefly_css ) )
    {
        wp_add_inline_style( MOLONGUI_BUMP_OFFER_NAME . '-styles', $onthefly_css );
    }
    do_action( 'mbo/bump/after_register_style', $file );
}
add_action( 'wp_enqueue_scripts', 'mbo_register_bump_styles', 5 );
function mbo_get_var_bump_styles()
{
    $css = '';
    $options = mbo_get_options();;
    $bp      = empty( $options['breakpoint'] ) ? '500' : $options['breakpoint'];
    $css .= ":root{ --m-b-box-bp: " . $bp . "px; --m-b-box-bp-l: " . --$bp . "px; }";
    return $css;
}
function mbo_enqueue_bump_styles()
{
    if ( apply_filters( 'mbo/bump/enqueue_styles', true ) )
    {
        $file     = apply_filters( 'mbo/bump/stylesheet', MOLONGUI_BUMP_OFFER_FOLDER . ( is_rtl() ? '/assets/css/bump-rtl.0838.min.css' : '/assets/css/bump.20a8.min.css' ) );
        $filepath = trailingslashit( WP_PLUGIN_DIR ) . $file;

        if ( file_exists( $filepath ) )
        {
            $filesize = filesize( $filepath );
            if ( $filesize > 4096 )
            {
                if ( !wp_style_is( MOLONGUI_BUMP_OFFER_NAME . '-styles', 'registered' ) ) mbo_register_bump_styles();
                wp_enqueue_style( MOLONGUI_BUMP_OFFER_NAME . '-styles' );
            }
            elseif ( $filesize )
            {
                add_action( 'wp_footer', function() use ( $file )
                {
                    mbo_inline_bump_styles( $file );
                }, 99 );
            }
        }
        add_filter( 'mbo/bump/enqueue_styles', '__return_false' );
    }
}
function mbo_inline_bump_styles( $file )
{
    if ( !$file ) return;

    $styles       = file_get_contents( trailingslashit( WP_PLUGIN_DIR ) . $file );
    $onthefly_css = mbo_get_var_bump_styles();
    echo '<style id="' . MOLONGUI_BUMP_OFFER_NAME . '-inline-css" type="text/css" data-file="'.basename( $file ).'">' . $styles . $onthefly_css . '</style>';
}