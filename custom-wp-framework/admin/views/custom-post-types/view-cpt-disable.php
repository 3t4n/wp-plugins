<?php

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * @model   $this->disable_cpt_viewmodel
 * @since   1.0.0
 */
?>

<div class="wrap cwf-admin-wrap">
    <h1 class="wp-heading-inline">
        <?php esc_html_e( 'Disable Custom Post Type', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
    </h1>
    <div style="max-width:800px;">
        <p><?php esc_html_e( 'You are about to disable the following custom post type:', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?></p>
        <ul class="cwf-ul">
            <?php 
                echo sprintf( '<li>%s (Post Type Key)</li>', esc_html( $this->disable_cpt_viewmodel->cpt->post_type_labels->name ) );
            ?>
        </ul>
        <p><strong><u><?php esc_html_e( 'WARNING: Disabling a custom post type will cause it to disappear from the front-end and admin dashboard. It will NOT delete the custom post type or related data. This action can also be reversed if necessary.', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?></u></strong></p>
        <p><?php esc_html_e( 'Are you sure that you want to disable this post type?', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?></p>
        <form id="cwf-disable-cpt" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
            <input type="hidden" name="action" value="cwf_disable_cpt" />
            <div>
                <?php wp_nonce_field( 'cwf_disable_cpt', 'cwf_disable_cpt_nonce_field' ); ?>
                <?php echo sprintf( '<input name="cwf-cpt-id" type="hidden" value="%d" />', esc_html( $this->disable_cpt_viewmodel->cpt->post_type_id ) ); ?>
                <p class="submit">
                    <input type="submit" name="submit" class="button button-primary" value="<?php esc_html_e( 'Disable', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>"/>
                    <input type="submit" name="submit" class="button" value="<?php esc_html_e( 'Cancel and go back', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>" />
                </p>
            </div>
        </form>
    </div>
</div>