<?php

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * @model   $this->enable_cpt_viewmodel
 * @since   1.0.0
 */
?>

<div class="wrap cwf-admin-wrap">
    <h1 class="wp-heading-inline">
        <?php esc_html_e( 'Enable Custom Post Type', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>    
    </h1>
    <div style="max-width:800px;">
        <p><?php esc_html_e( 'You are about to enable the following custom post type:', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?></p>
        <ul class="cwf-ul">
            <?php
                echo sprintf( '<li>%s (Post Type Key)</li>', esc_html( $this->enable_cpt_viewmodel->cpt->post_type_labels->name ) );
            ?>
        </ul>
        <p><strong><u><?php esc_html_e( 'WARNING: Enabling this custom post type may cause posts to reappear on the front-end.', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?></u></strong></p>
        <p><?php esc_html_e( 'Are you sure that you want to enable this post type?', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?></p>
        <form id="cwf-enable-cpt" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
            <input type="hidden" name="action" value="cwf_enable_cpt" />
            <div>
                <?php wp_nonce_field( 'cwf_enable_cpt', 'cwf_enable_cpt_nonce_field' ); ?>
                <?php echo sprintf( '<input name="cwf-cpt-id" type="hidden" value="%d" />', esc_html( $this->enable_cpt_viewmodel->cpt->post_type_id ) ); ?>
                <p class="submit">
                <input type="submit" name="submit" class="button button-primary" value="<?php esc_html_e( 'Enable', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>"/>
                    <input type="submit" name="submit" class="button" value="<?php esc_html_e( 'Cancel and go back', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>" />
                </p>
            </div>
        </form>
    </div>
</div>