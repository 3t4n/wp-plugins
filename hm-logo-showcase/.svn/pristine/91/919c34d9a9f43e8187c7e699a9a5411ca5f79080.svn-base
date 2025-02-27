<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hmlsGridMessage = false;

if ( isset( $_POST['updateGridTemplate'] ) ) {

    if ( ! isset( $_POST['hmls_grid_temp_settings_nonce_field'] ) 
        || ! wp_verify_nonce( $_POST['hmls_grid_temp_settings_nonce_field'], 'hmls_grid_temp_settings_action' ) ) {
        print 'Sorry, your nonce did not verify.';
        exit;
    } else {
        $hmls_grid_template = isset( $_POST['hmls_grid_template'] ) ? sanitize_text_field( $_POST['hmls_grid_template'] ) : 'default';
        $hmlsGridMessage = update_option( 'hmls_grid_temp_settings', $hmls_grid_template );
    }
}

$hmls_grid_template = get_option('hmls_grid_temp_settings', 'default');
?>
<div id="wph-wrap-all" class="wrap hmls-grid-settings-page">
    
    <div class="settings-banner">
        <h2><i class="fa fa-th" aria-hidden="true"></i>&nbsp;<?php _e('Grid Layout Settings', HMLS_TXT_DOMAIN); ?></h2>
    </div>

    <?php 
    if ( $hmlsGridMessage ) {
        $this->hmls_display_notification('success', 'Your information updated successfully.');
    }
    ?>

    <div class="hmls-wrap">

        <nav class="nav-tab-wrapper">
            <a href="?post_type=hmls_logo&page=hmls-grid-settings&tab=content" class="nav-tab hmls-tab <?php if ( ( $tab === 'content' ) || ( $tab == '' ) ) { ?>hmls-tab-active<?php } ?>">
                <i class="fa fa-cog" aria-hidden="true">&nbsp;</i><?php _e('Content', HMLS_TXT_DOMAIN); ?>
            </a>
            <a href="?post_type=hmls_logo&page=hmls-grid-settings&tab=template" class="nav-tab hmls-tab <?php if ( $tab === 'template' ) { ?>hmls-tab-active<?php } ?>">
                <i class="fa fa-eye" aria-hidden="true">&nbsp;</i><?php _e('Template', HMLS_TXT_DOMAIN); ?>
            </a>
            <a href="?post_type=hmls_logo&page=hmls-grid-settings&tab=styles" class="nav-tab hmls-tab <?php if ( $tab === 'styles' ) { ?>hmls-tab-active<?php } ?>">
                <i class="fa fa-paint-brush" aria-hidden="true">&nbsp;</i><?php _e('Styles', HMLS_TXT_DOMAIN); ?>
            </a>
        </nav>

        <div class="hmls_personal_wrap hmls_personal_help" style="width: 75%; float: left;">
            <div class="tab-content">
                <?php 
                switch ( $tab ) {
                    case 'styles':
                        include HMLS_PATH . 'admin/view/partial/grid-styles.php';
                        break;
                    case 'template':
                        include HMLS_PATH . 'admin/view/partial/grid-template.php';
                        break;
                    default:
                        include HMLS_PATH . 'admin/view/partial/grid-content.php';
                        break;
                } 
                ?>
            </div>
        </div>

        <?php $this->hmls_admin_sidebar(); ?>

    </div>

</div>