<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( isset( $_GET[ 'tab' ] ) ) {
    $tab = sanitize_text_field( $_GET[ 'tab' ] );
} else {
    $tab = 'content';
}
?>
<div class="wrap">
    <h1><?php esc_html_e( get_admin_page_title() ); ?></h1>

    <h2 class="nav-tab-wrapper">
        <a href="?page=simple_gdpr_cookies&tab=content" class="nav-tab <?php echo $tab == 'content' ? 'nav-tab-active' : ''; ?>" data-plugin-tab="simple_gdpr_cookies-content-settings">Content Settings</a>
        <a href="?page=simple_gdpr_cookies&tab=modal" class="nav-tab <?php echo $tab == 'modal' ? 'nav-tab-active' : ''; ?>" data-plugin-tab="simple_gdpr_cookies-modal-settings">Modal Settings</a>
        <a href="?page=simple_gdpr_cookies&tab=cookie" class="nav-tab <?php echo $tab == 'cookie' ? 'nav-tab-active' : ''; ?>" data-plugin-tab="3">Cookie Settings</a>
    </h2>

    <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">

            <!-- main content -->
            <div id="post-body-content">
                <div class="meta-box-sortables ui-sortable">
                    <div class="postbox">
                        <div class="inside">
                            <form method="post" action="options.php">
                                <?php
                                if ( $tab === 'content' ) {
                                    settings_fields( 'simple_gdpr_cookies_content_settings' );
                                    do_settings_sections( 'simple_gdpr_cookies_content_settings' );
                                } elseif ( $tab === 'modal' ) {
                                    settings_fields( 'simple_gdpr_cookies_modal_settings' );
                                    do_settings_sections( 'simple_gdpr_cookies_modal_settings' );
                                } else {
                                    settings_fields( 'simple_gdpr_cookies_cookie_settings' );
                                    do_settings_sections( 'simple_gdpr_cookies_cookie_settings' );
                                }
                                ?>
                                <?php submit_button(); ?>
                            </form>
                        </div><!-- .inside -->
                    </div><!-- .postbox -->
                </div><!-- .meta-box-sortables .ui-sortable -->
            </div><!-- post-body-content -->

            <!-- sidebar -->
            <div id="postbox-container-1" class="postbox-container">
                <div class="meta-box-sortables">
                    <div class="postbox">
                        <h2><span><?php echo __('Helpful Links', 'simple_gdpr_cookies'); ?></span></h2>

                        <div class="inside">
                            <ul>
                                <li><a href="https://github.com/smeechos/simple-gdpr-cookies/wiki"><?php echo __('Documentation', 'simple_gdpr_cookies'); ?></a></li>
                                <li><a href="https://github.com/smeechos/simple-gdpr-cookies/wiki"><?php echo __('Plugin Page', 'simple_gdpr_cookies'); ?></a></li>
                                <li><a href="https://github.com/smeechos/simple-gdpr-cookies/issues"><?php echo __('Report an Issue', 'simple_gdpr_cookies'); ?></a></li>
                            </ul>
                        </div><!-- .inside -->
                    </div><!-- .postbox -->
                </div><!-- .meta-box-sortables -->
            </div><!-- #postbox-container-1 .postbox-container -->

        </div><!-- #post-body .metabox-holder .columns-2 -->
        <br class="clear">
    </div><!-- #poststuff -->
</div>