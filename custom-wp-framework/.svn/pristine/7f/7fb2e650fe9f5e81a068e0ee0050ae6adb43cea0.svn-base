<?php

// Exit if accessed directly.
if ( ! defined ( 'ABSPATH' ) ) { 
	exit(); 
} 

?>
<div class="wrap cwf-cpt-table<?php echo esc_attr( 'other' === $_GET['cat'] ? ' cwf-other-cpt' : '' ); ?>">

<?php
    if( ! empty( $this->cpt_viewmodel->notification_message ) ) {
        ?>
            <div class="cwf-cpt-notice cwf-notification-updated" style="max-width:none;">
                <p><?php echo esc_html( $this->cpt_viewmodel->notification_message ); ?></p>
            </div>            
        <?php
    }
?>
    <div>
        <h1 class="wp-heading-inline">Custom Post Types</h1>
        <a href="<?php echo esc_url( admin_url() . 'admin.php?page=custom-wp-framework-admin-cpt-add' ); ?>" class="page-title-action">Add New</a>
    </div>
    
    <?php
        $this->cpt_viewmodel->cpt_list_table->prepare_items();
        $this->cpt_viewmodel->cpt_list_table->views();
    ?>
        <input type="hidden" name="page" value="<?php echo esc_html( $_REQUEST['page'] ); ?>" />
        <?php
            $this->cpt_viewmodel->cpt_list_table->display();
        ?>
</div>