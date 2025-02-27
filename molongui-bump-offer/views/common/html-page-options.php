<?php
defined( 'ABSPATH' ) or exit;

?>

<div id="molongui-options">

    <?php do_action( 'mbo/options/before_masthead' ); ?>

    <?php
        $args = array
        (
            'logo'   => MOLONGUI_BUMP_OFFER_URL . 'assets/img/plugin_logo.png',
            'link'   => MOLONGUI_BUMP_OFFER_WEB,
            'button' => array
            (
                'id'    => 'm-button-save',
                'class' => 'm-button-save',
                'label' => __( "Save Settings", 'molongui-bump-offer' ),
            ),
        );
        include 'parts/html-part-masthead.php';

    ?>

    <?php do_action( 'mbo/options/after_masthead' ); ?>

    <!-- Page Content -->
    <div class="m-page-content">

        <!-- Nav -->
        <div id="m-navigation" class="m-navigation">
            <div class="m-section-nav <?php echo ( empty( $tabs ) ? 'is-empty' : 'has-pinned-items' ); ?>">

                <div class="m-section-nav__mobile-header" role="button" tabindex="0">
                    <?php echo $tabs[$current_tab]['name']; ?>
                </div>

                <div class="m-section-nav__panel">
                    <div class="m-section-nav-group">
                        <div class="m-section-nav-tabs">
                            <ul class="m-section-nav-tabs__list" role="menu">
                                <?php echo $nav_items; ?>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Tabs -->
        <?php echo $div_contents; ?>

        <!-- Other stuff -->
        <?php echo wp_nonce_field( 'mfw_save_options_nonce', 'mfw_save_options_nonce', true, false ); ?>

    </div><!-- !m-page-content -->

    <?php do_action( 'mbo/options/before_footer' ); ?>

    <?php
        $plugin_url    = MOLONGUI_BUMP_OFFER_WEB;
        $help_url      = 'https://www.molongui.com/help/';
        $support_url   = $help_url . 'support/';
        $docs_url      = $help_url . 'docs/';
        $changelog_url = $help_url . MOLONGUI_BUMP_OFFER_NAME . '/changelog/';
        $demo_url      = 'https://demos.molongui.com/test-drive-'.MOLONGUI_BUMP_OFFER_NAME.'-pro/';

        $args = array
        (
            'links' => array
            (
                array
                (
                    'label'   => __( "Pro", 'molongui-bump-offer' ) . " " . ( defined( 'MOLONGUI_BUMP_OFFER_PRO_VERSION' ) ? MOLONGUI_BUMP_OFFER_PRO_VERSION : '0.0.0' ),
                    'prefix'  => '<span class="m-page-footer__version">',
                    'suffix'  => '</span>',
                    'href'    => $plugin_url,
                    'display' => did_action( 'mbo_pro/loaded' ),
                ),
                array
                (
                    'label'   => __( "Free", 'molongui-bump-offer' ) . " " . MOLONGUI_BUMP_OFFER_VERSION,
                    'prefix'  => '<span class="m-page-footer__version">',
                    'suffix'  => '</span>',
                    'href'    => $plugin_url,
                    'display' => true,
                ),
                array
                (
                    'label'   => __( "Changelog", 'molongui-bump-offer' ),
                    'prefix'  => '',
                    'suffix'  => '',
                    'href'    => $changelog_url,
                    'display' => true,
                ),
                array
                (
                    'label'   => __( "Docs", 'molongui-bump-offer' ),
                    'prefix'  => '',
                    'suffix'  => '',
                    'href'    => $help_url . 'deals',
                    'display' => true,
                ),
                array
                (
                    'label'   => __( "Support", 'molongui-bump-offer' ),
                    'prefix'  => '',
                    'suffix'  => '',
                    'href'    => $support_url,
                    'display' => true,
                ),
                array
                (
                    'label'   => __( "Try Pro", 'molongui-bump-offer' ),
                    'prefix'  => '',
                    'suffix'  => '',
                    'href'    => $demo_url,
                    'display' => !did_action( 'mbo_pro/loaded' ),
                ),
                array
                (
                    'label'   => __( "Upgrade", 'molongui-bump-offer' ),
                    'prefix'  => '',
                    'suffix'  => '',
                    'href'    => $plugin_url.'pricing/',
                    'display' => !did_action( 'mbo_pro/loaded' ),
                ),
            ),
        );
        include 'parts/html-part-footer.php';

    ?>

    <?php mbo_enqueue_common_options_scripts(); ?>
    <?php mbo_enqueue_common_options_styles();  ?>
    <?php do_action( 'mbo/options/after_footer' ); ?>

</div> <!-- #molongui-options -->

<div id="m-options-saving"><div class="m-loader"><div></div><div></div><div></div><div></div></div></div>
<div id="m-options-saved"><span class="dashicons dashicons-yes"></span><strong><?php echo __( 'Saved', 'molongui-bump-offer' ); ?></strong></div>
<div id="m-options-error"><span class="dashicons dashicons-no"></span><strong><?php echo __( 'Error', 'molongui-bump-offer' ); ?></strong></div>