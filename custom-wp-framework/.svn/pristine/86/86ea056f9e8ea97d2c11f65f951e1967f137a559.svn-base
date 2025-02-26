<?php

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * @model   $this->delete_cpt_viewmodel
 * @since   1.0.0
 */
?>

 <div class="wrap cwf-admin-wrap">
   <h1 class="wp-heading-inline">
      <?php esc_html_e( 'Delete Custom Post Type', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
   </h1>
   <div style="max-width:800px;">
      <p><?php esc_html_e( 'You are about to delete the following custom post type:', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?></p>
      <ul class="cwf-ul">
         <?php 
            echo sprintf( '<li>%s (Post Type Key)</li>', esc_html( $this->delete_cpt_viewmodel->cpt->post_type_labels->name ) );     
         ?>
      </ul>
      <p><strong><u><?php esc_html_e( 'WARNING: Deleting a custom post type will also remove all associated posts and custom field/taxonomy data. This action is permanent and cannot be undone. We recommend taking a backup of the database before proceeding in case you need to restore any data.', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?></u></strong></p>
      <p><?php esc_html_e( 'Are you sure that you want to continue with the deletion?', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?></p>
      <form id="cwf-delete-cpt" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) );  ?>">
         <input type="hidden" name="action" value="cwf_delete_cpt" />
         <div>
            <?php wp_nonce_field( 'cwf_delete_cpt', 'cwf_delete_cpt_nonce_field' ); ?>
            <?php
               echo sprintf( '<input name="cwf-cpt-id" type="hidden" value="%d" />', esc_html( $this->delete_cpt_viewmodel->cpt->post_type_id ) );
            ?>
            <p class="submit">
                  <input type="submit" name="submit" class="button button-primary" value="<?php esc_html_e( 'Delete', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>"/>
                  <input type="submit" name="submit" class="button" value="<?php esc_html_e( 'Cancel and go back', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>"/>
            </p>
         </div>
      </form>
   </div>
 </div>