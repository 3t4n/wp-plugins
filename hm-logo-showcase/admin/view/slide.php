<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div id="wph-wrap-all" class="wrap hmls-slide-settings-page">
    
    <div class="settings-banner">
        <h2><i class="fa fa-photo" aria-hidden="true"></i>&nbsp;<?php _e('Slider Layout Settings', HMLS_TXT_DOMAIN); ?></h2>
    </div>

    <?php 
    if ( $hmlsSlideMessage ) {
        $this->hmls_display_notification('success', 'Your information updated successfully.');
    }
    ?>

    <div class="hmls-wrap">

        <nav class="nav-tab-wrapper">
            <a href="?post_type=hmls_logo&page=hmls-slide-settings&tab=general" class="nav-tab hmls-tab <?php if ( ( $tab === 'general' ) || ( $tab == '' ) ) { ?>hmls-tab-active<?php } ?>">
                <i class="fa fa-cog" aria-hidden="true">&nbsp;</i><?php _e('General', HMLS_TXT_DOMAIN); ?>
            </a>
            <a href="?post_type=hmls_logo&page=hmls-slide-settings&tab=template" class="nav-tab hmls-tab <?php if ( $tab === 'template' ) { ?>hmls-tab-active<?php } ?>">
                <i class="fa fa-eye" aria-hidden="true">&nbsp;</i><?php _e('Template', HMLS_TXT_DOMAIN); ?>
            </a>
            <a href="?post_type=hmls_logo&page=hmls-slide-settings&tab=styles" class="nav-tab hmls-tab <?php if ( $tab === 'styles' ) { ?>hmls-tab-active<?php } ?>">
                <i class="fa fa-paint-brush" aria-hidden="true">&nbsp;</i><?php _e('Styles', HMLS_TXT_DOMAIN); ?>
            </a>
        </nav>

        <div class="hmls_personal_wrap hmls_personal_help" style="width: 75%; float: left;">
            <div class="tab-content">
                <?php 
                switch ( $tab ) {
                    case 'styles':
                        include HMLS_PATH . 'admin/view/partial/slide-styles.php';
                        break;
                    case 'template':
                        include HMLS_PATH . 'admin/view/partial/slide-template2.php';
                        break;
                    default:
                        include HMLS_PATH . 'admin/view/partial/slide-content.php';
                        break;
                } 
                ?>
            </div>
        </div>

        <?php $this->hmls_admin_sidebar(); ?>

    </div>

</div>