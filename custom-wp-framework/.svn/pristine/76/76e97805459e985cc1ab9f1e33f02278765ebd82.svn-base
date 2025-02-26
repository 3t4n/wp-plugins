<?php

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * @model   $this->add_cpt_viewmodel
 * @since   1.0.0
 */

?>

<div class="wrap cwf-page-container">
    <?php
        if ( ! empty( $this->add_cpt_viewmodel->success ) ) {
            ?>
                <div class="cwf-notification-updated cwf-cpt-notice">
                    <p class="cwf-notification"><?php esc_html_e( 'Your custom post type has been added!', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?></p>
                </div>
            <?php
        }
        elseif( $this->add_cpt_viewmodel->success === false ) {
            ?>
                <div class="cwf-notification-error cwf-cpt-notice">
                    <p class="cwf-notification"><?php esc_html_e( 'An error occurred while trying to add your custom post type!', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?></p>
                </div>
            <?php
        }
    ?>
    <h1 class="wp-heading-inline"><?php esc_html_e( 'Add Custom Post Type', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?></h1>
    <?php 
        if( ! empty( $this->add_cpt_viewmodel->validation_summary ) ) {
            ?>
                <div class="error notice cwf-cpt-notice">
                    <p class="cwf-notification"><?php esc_html_e( 'Please fix the below error(s):', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?></p>
                    <ul class="cwf-validation-summary">
                        <?php
                            foreach( $this->add_cpt_viewmodel->validation_summary as $validation_error ) {
                                echo esc_html( sprintf( '<li class="cwf-notification">%s</li>', $validation_error ) );
                            }
                        ?>
                    </ul>
                </div>
            <?php
        }

    ?>
    <p><em><?php esc_html_e( 'Use this form to add new Custom Post Types (CPTs) to your WordPress website.', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?></em></p>
    <form id="cwf-add-cpt" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" enctype="multipart/form-data">    
        <input type="hidden" name="action" value="cwf_add_cpt" />
        <div id="poststuff">
            <div id="postbox-container" class="postbox-container cwf-cpt-postbox-container">
                <div class="meta-box-sortables ui-sortable" id="normal-sortables">
                    <div class="postbox " id="cwf-cpt-required-details">
                        <button type="button" class="handlediv button-link" aria-expanded="true">
                            <span class="screen-reader-text">Toggle panel: Required Details</span>
                            <span class="toggle-indicator" aria-hidden="true"></span>
                        </button>
                        <div title="Click to toggle" class="handlediv"><br /></div><h3 class="hndle"><span><?php esc_html_e( 'Required Details', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?></span></h3>
                        <div class="inside">
                            <table class="form-table" role="presentation">
                            <tr>
                                <th scope="row">
                                    <label for="post-type-key" class="cwf-tooltip"><?php esc_html_e( 'Post Type Key', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?><span class="cwf-required-asterisk">*</span>
                                        <span class="cwf-tooltip-text">(Required) Post type key. Must not exceed 20 characters and may 
                                            only contain lowercase alphanumeric characters, dashes, and underscores. (e.g. 'book').</span>
                                    </label>
                                </th>
                                <td>
                                    <input name="post-type-key" type="text" maxlength="20" class="regular-text cwf-slug<?php echo esc_attr( $this->add_cpt_viewmodel->validation_errors['post-type-key'] ? ' cwf-has-error' : '' ); ?>" 
                                    placeholder="" value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_key ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_key ); ?>" required />
                                    <p class="cwf-field-validation"><?php echo esc_html( empty( $this->add_cpt_viewmodel->validation_errors['post-type-key'] ) ? '' : $this->add_cpt_viewmodel->validation_errors['post-type-key'] ); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="post-type-label-singular" class="cwf-tooltip"><?php esc_html_e( 'Label (Singular)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?><span class="cwf-required-asterisk">*</span>
                                        <span class="cwf-tooltip-text">(Required) Name of the post type in singular form. (e.g. 'Book')</span>
                                    </label>
                                </th>
                                <td>
                                    <input name="post-type-label-singular" type="text" class="regular-text<?php echo esc_attr( empty( $this->add_cpt_viewmodel->validation_errors['post-type-label-singular'] ) ? '' : ' cwf-has-error' ); ?>" 
                                    placeholder="" value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->singular_name ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->singular_name ); ?>" required />
                                    <p class="cwf-field-validation"><?php echo esc_html( empty( $this->add_cpt_viewmodel->validation_errors['post-type-label-singular'] ) ? '' : $this->add_cpt_viewmodel->validation_errors['post-type-label-singular'] ); ?></p>
                                    <div class="cwf-populate-checkbox"><input name="post-type-label-singular-all" tabindex="-1" type="checkbox" value="true" <?php echo esc_html( empty( $this->add_cpt_viewmodel->post_type_label_singular_all ) ? '' : ( $this->add_cpt_viewmodel->post_type_label_singular_all ? 'checked' : '' ) ); ?> /><?php esc_html_e( 'Use term for all singular labels', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?></div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="post-type-label" class="cwf-tooltip"><?php esc_html_e('Label (Plural)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?><span class="cwf-required-asterisk">*</span>
                                        <span class="cwf-tooltip-text">(Required) Name of the post type shown in the menu. Usually plural. (e.g. 'Books').</span>
                                    </label>
                                </th>
                                <td>
                                    <input name="post-type-label" type="text" class="regular-text<?php echo esc_attr( empty( $this->add_cpt_viewmodel->validation_errors['post-type-label'] ) ? '' : ' cwf-has-error' ); ?>" 
                                    placeholder="" value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_label ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_label ); ?>" required />
                                    <p class="cwf-field-validation"><?php echo esc_html( empty( $this->add_cpt_viewmodel->validation_errors['post-type-label'] ) ? '' : $this->add_cpt_viewmodel->validation_errors['post-type-label'] ); ?></p>
                                    <div class="cwf-populate-checkbox"><input name="post-type-label-all" tabindex="-1" type="checkbox" value="true" <?php echo esc_html( empty( $this->add_cpt_viewmodel->post_type_label_all ) ? '' : ( $this->add_cpt_viewmodel->post_type_label_all ? 'checked' : '' ) ); ?>/><?php esc_html_e( 'Use term for all plural labels', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN );?> </div>
                                </td>
                            </tr>
                            </table>
                        </div>
                    </div> <!-- End postbox -->
                    <div class="postbox " id="cwf-cpt-additional-post-labels">
                        <button type="button" class="handlediv button-link" tabindex="-1" aria-expanded="true">
                            <span class="screen-reader-text">Toggle panel: Additional Post Labels</span>
                            <span class="toggle-indicator" aria-hidden="true"></span>
                        </button>
                        <div title="Click to toggle" class="handlediv"><br /></div><h3 class="hndle"><span><?php esc_html_e( 'Additional Post Labels', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?></span></h3>
                        <div class="inside">
                            <table class="form-table" role="presentation">
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-add-new" class="cwf-tooltip"><?php esc_html_e( 'Label (Add New)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN );?>
                                                <span class="cwf-tooltip-text">Default is ‘Add New’ for both hierarchical and non-hierarchical types.</span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-add-new" type="text" class="regular-text" placeholder=""
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->add_new ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->add_new ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-add-new-item" class="cwf-tooltip"><?php esc_html_e( 'Label (Add New Item)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label for adding a new singular item. Default is ‘Add New Post’ / ‘Add New Page’ 
                                                    for non-hierarchical and hierarchical types respectively.</span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-add-new-item" type="text" class="regular-text cwf-singular-label" placeholder=""
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->add_new_item ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->add_new_item ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-edit-item" class="cwf-tooltip"><?php esc_html_e( 'Label (Edit Item)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label for editing a singular item. Default is ‘Edit Post’ / ‘Edit Page’ 
                                                    for non-hierarchical and hierarchical types respectively.
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-edit-item" type="text" class="regular-text cwf-singular-label" placeholder=""
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->edit_item ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->edit_item ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-new-item" class="cwf-tooltip"><?php esc_html_e( 'Label (New Item)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label for the new item page title. Default is ‘New Post’ / ‘New Page’ 
                                                    for non-hierarchical and hierarchical types respectively.
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-new-item" type="text" class="regular-text cwf-singular-label" placeholder=""
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->new_item ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->new_item ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-view-item" class="cwf-tooltip"><?php esc_html_e('Label (View Item)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label for viewing a singular item. Default is ‘View Post’ / ‘View Page’
                                                    for non-hierarchical and hierarchical types respectively.
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-view-item" type="text" class="regular-text cwf-singular-label" placeholder=""
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->view_item ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->view_item ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-view-items" class="cwf-tooltip"><?php esc_html_e('Label (View Items)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label for viewing post type archives. Default is ‘View Posts’ / ‘View Pages’
                                                    for non-hierarchical and hierarchical types respectively.
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-view-items" type="text" class="regular-text cwf-plural-label" placeholder=""
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->view_items ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->view_items ); ?>" />

                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-search-items" class="cwf-tooltip"><?php esc_html_e( 'Label (Search Items)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label for searching plural items. Default is ‘Search Posts’ / ‘Search Pages’
                                                    for non-hierarchical and hierarchical types respectively.
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-search-items" type="text" class="regular-text cwf-plural-label" placeholder="" 
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->search_items ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->search_items ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-not-found" class="cwf-tooltip"><?php esc_html_e( 'Label (Not Found)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label used when no items are found. Default is ‘No posts found’ / ‘No pages found’
                                                    for non-hierarchical and hierarchical types respectively.
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-not-found" type="text" class="regular-text cwf-plural-label" placeholder=""
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->not_found ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->not_found ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-not-found-in-trash" class="cwf-tooltip"><?php esc_html_e( 'Label (Not Found in Trash)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label used when no items are in the Trash. Default is ‘No posts found in Trash’ / ‘No pages found in Trash’
                                                    for non-hierarchical and hierarchical types respectively.
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-not-found-in-trash" type="text" class="regular-text cwf-plural-label" placeholder=""
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->not_found_in_trash ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->not_found_in_trash ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-parent-item-colon" class="cwf-tooltip"><?php esc_html_e( 'Label (Parent Item Colon)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label used to prefix parents of hierarchical items. Not used on non-hierarchical post types. 
                                                    Default is ‘Parent Page:’
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-parent-item-colon" type="text" class="regular-text cwf-singular-label" placeholder=""
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->parent_item_colon ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->parent_item_colon ); ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-all-items" class="cwf-tooltip"><?php esc_html_e( 'Label (All Items)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label to signify all items in a submenu link. Default is ‘All Posts’ / ‘All Pages’
                                                    for non-hierarchical and hierarchical types respectively.
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-all-items" type="text" class="regular-text cwf-plural-label" placeholder=""
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->all_items ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->all_items ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-archives" class="cwf-tooltip"><?php esc_html_e('Label (Archives)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label for archives in nav menus. Default is ‘Post Archives’ / ‘Page Archives’
                                                    for non-hierarchical and hierarchical types respectively.
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-archives" type="text" class="regular-text cwf-singular-label" placeholder="" 
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->archives ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->archives ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-attributes" class="cwf-tooltip"><?php esc_html_e( 'Label (Attributes)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label for the attributes meta box. Default is ‘Post Attributes’ / ‘Page Attributes’
                                                    for non-hierarchical and hierarchical types respectively.
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-attributes" type="text" class="regular-text cwf-singular-label" placeholder=""
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->attributes ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->attributes ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-insert-into-item" class="cwf-tooltip"><?php esc_html_e( 'Label (Insert into Item)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label for the media frame button. Default is ‘Insert into post’ / ‘Insert into page’
                                                    for non-hierarchical and hierarchical types respectively.
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-insert-into-item" type="text" class="regular-text cwf-singular-label" placeholder=""
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->insert_into_item ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->insert_into_item ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-uploaded-to-this-item" class="cwf-tooltip"><?php esc_html_e( 'Label (Uploaded to this Item)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label for the media frame filter. Default is ‘Uploaded to this post’ / ‘Uploaded to this page
                                                    for non-hierarchical and hierarchical types respectively.
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-uploaded-to-this-item" type="text" class="regular-text cwf-singular-label" placeholder=""
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->uploaded_to_this_item ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->uploaded_to_this_item ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-featured-image" class="cwf-tooltip"><?php esc_html_e( 'Label (Featured Image)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label for the featured image meta box title. Default is ‘Featured image’.
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-featured-image" type="text" class="regular-text cwf-singular-label" placeholder=""
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->featured_image ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->featured_image ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-set-featured-image" class="cwf-tooltip"><?php esc_html_e( 'Label (Set Featured Image)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label for setting the featured image. Default is ‘Set featured image’.
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-set-featured-image" type="text" class="regular-text cwf-singular-label" placeholder=""
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->set_featured_image ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->set_featured_image ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-remove-featured-image" class="cwf-tooltip"><?php esc_html_e( 'Label (Remove Featured Image)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label for removing the featured image. Default is ‘Remove featured image’.</span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-remove-featured-image" type="text" class="regular-text cwf-singular-label" placeholder=""
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->remove_featured_image ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->remove_featured_image ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-use-featured-image" class="cwf-tooltip"><?php esc_html_e( 'Label (Use Featured Image)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label in the media frame for using a featured image. Default is ‘Use as featured image’.</span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-use-featured-image" type="text" class="regular-text cwf-singular-label" placeholder=""
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->use_featured_image ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->use_featured_image ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-menu-name" class="cwf-tooltip"><?php esc_html_e( 'Label (Menu Name)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label for the menu name. Default is the same as name.</span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-menu-name" type="text" class="regular-text cwf-plural-label" placeholder="" 
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->menu_name ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->menu_name ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-filter-items-list" class="cwf-tooltip"><?php esc_html_e( 'Label (Filter Items List)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label for the table views hidden heading. Default is ‘Filter posts list’ / ‘Filter pages list’
                                                    for non-hierarchical and hierarchical types respectively.
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-filter-items-list" type="text" class="regular-text cwf-plural-label" placeholder="" 
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->filter_items_list ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->filter_items_list ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-items-list-navigation" class="cwf-tooltip"><?php esc_html_e( 'Label (Items List Navigation)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label for the table pagination hidden heading. Default is ‘Posts list navigation’ / ‘Pages list navigation’
                                                    for non-hierarchical and hierarchical types respectively.
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-items-list-navigation" type="text" class="regular-text cwf-plural-label" placeholder=""
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->items_list_navigation ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->items_list_navigation ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-items-list" class="cwf-tooltip"><?php esc_html_e( 'Label (Items List)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label for the table hidden heading. Default is ‘Posts list’ / ‘Pages list’
                                                    for non-hierarchical and hierarchical types respectively.
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-items-list" type="text" class="regular-text cwf-plural-label" placeholder="" 
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->items_list ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->items_list ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-item-published" class="cwf-tooltip"><?php esc_html_e( 'Label (Item Published)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label used when an item is published. Default is ‘Post published.’ / ‘Page published.’
                                                    for non-hierarchical and hierarchical types respectively.
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-item-published" type="text" class="regular-text cwf-singular-label" placeholder=""
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->item_published ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->item_published ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-item-published-privately" class="cwf-tooltip"><?php esc_html_e( 'Label (Item Published Privately)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label used when an item is published with private visibility. Default is ‘Post published privately.’ / ‘Page published privately.’
                                                    for non-hierarchical and hierarchical types respectively.
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-item-published-privately" type="text" class="regular-text cwf-singular-label" placeholder=""
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->item_published_privately ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->item_published_privately ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-item-reverted-to-draft" class="cwf-tooltip"><?php esc_html_e( 'Label (Item Reverted to Draft)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label used when an item is switched to a draft. Default is ‘Post reverted to draft.’ / ‘Page reverted to draft.’
                                                    for non-hierarchical and hierarchical types respectively.
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-item-reverted-to-draft" type="text" class="regular-text cwf-singular-label" placeholder="" 
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->item_reverted_to_draft ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->item_reverted_to_draft ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-item-scheduled" class="cwf-tooltip"><?php esc_html_e( 'Label (Item Scheduled)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label used when an item is scheduled for publishing. Default is ‘Post scheduled.’ / ‘Page scheduled.’
                                                    for non-hierarchical and hierarchical types respectively.        
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-item-scheduled" type="text" class="regular-text cwf-singular-label" placeholder=""
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->item_scheduled ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->item_scheduled ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-label-item-updated" class="cwf-tooltip"><?php esc_html_e( 'Label (Item Updated)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Label used when an item is updated. Default is ‘Post updated.’ / ‘Page updated.’
                                                    for non-hierarchical and hierarchical types respectively.
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-label-item-updated" type="text" class="regular-text cwf-singular-label" placeholder=""
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_labels->item_updated ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_labels->item_updated ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-description" class="cwf-tooltip"><?php esc_html_e( 'Description', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">A short descriptive summary of what the post type is.</span>
                                            </label>
                                        </th>
                                        <td>
                                            <textarea name="post-type-description" max-length="500" rows="5" class="regular-text" placeholder=""><?php echo esc_textarea( empty( $this->add_cpt_viewmodel->cpt->post_type_description ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_description ); ?></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- End postbox -->
                    <div class="postbox " id="cwf-cpt-settings">
                        <button type="button" tabindex="-1" class="handlediv button-link" aria-expanded="true">
                            <span class="screen-reader-text">Toggle panel: Post Type Settings</span>
                            <span class="toggle-indicator" aria-hidden="true"></span>
                        </button>
                        <div title="Click to toggle" class="handlediv"><br /></div><h3 class="hndle"><span><?php esc_html_e( 'Post Type Settings', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?></span></h3>
                        <div class="inside">
                            <table class="form-table" role="presentation">
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-is-public" class="cwf-tooltip"><?php esc_html_e( 'Public', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Whether a post type is intended for use publicly either via the admin interface or by front-end users. Default is true.</span>
                                            </label>
                                        </th>
                                    <td>
                                        <input name="post-type-is-public" type="checkbox" value="true" 
                                        <?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_is_public ) ? "" : ( $this->add_cpt_viewmodel->cpt->post_type_is_public ? "checked" : "" ) ); ?>>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label for="post-type-is-hierarchical" class="cwf-tooltip"><?php esc_html_e( 'Hierarchical', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                            <span class="cwf-tooltip-text">Whether the post type is hierarchical (e.g. page). Default is false.</span>
                                        </label>
                                    </th>
                                    <td>
                                        <input name="post-type-is-hierarchical" type="checkbox" value="true"
                                        <?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_is_hierarchical ) ? "" : ( $this->add_cpt_viewmodel->cpt->post_type_is_hierarchical ? "checked" : "" ) ); ?>>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label for="post-type-exclude-from-search" class="cwf-tooltip"><?php esc_html_e( 'Exclude from Search', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                            <span class="cwf-tooltip-text">Whether to exclude posts with this post type from front end search results. Default is false.</span>
                                        </label>
                                    </th>
                                    <td>
                                        <input name="post-type-exclude-from-search" type="checkbox" value="true"
                                        <?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_exclude_from_search ) ? "" : ( $this->add_cpt_viewmodel->cpt->post_type_exclude_from_search ? "checked" : "" ) ); ?>>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label for="post-type-publicly-queryable" class="cwf-tooltip"><?php esc_html_e( 'Publicly Queryable', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                            <span class="cwf-tooltip-text">Whether queries can be performed on the front end for the post type as part of parse_request(). Default is true.
                                        </label>
                                    </th>
                                    <td>
                                        <input name="post-type-publicly-queryable" type="checkbox" value="true"
                                        <?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_is_publicly_queryable ) ? "" : ( $this->add_cpt_viewmodel->cpt->post_type_is_publicly_queryable ? "checked" : "" ) ); ?>>
                                    </td>
                                </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-show-ui" class="cwf-tooltip"><?php esc_html_e( 'Show UI', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Whether to generate and allow a UI for managing this post type in the admin. Default is true.</span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-show-ui" type="checkbox" value="true"
                                            <?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_show_in_ui ) ? "" : ( $this->add_cpt_viewmodel->cpt->post_type_show_in_ui ? "checked" : "" ) ); ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-show-in-menu" class="cwf-tooltip"><?php esc_html_e('Show in Menu', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Where to show the post type in the admin menu. To work, 'Show UI' must be set to true. 
                                                    If true, the post type is shown in its own top level menu. If false, no menu is shown. Default is true.</span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-show-in-menu" type="checkbox" value="true"
                                            <?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_show_in_menu ) ? "" : ( $this->add_cpt_viewmodel->cpt->post_type_show_in_menu ? "checked" : "" ) ); ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-show-in-nav-menus" class="cwf-tooltip"><?php esc_html_e( 'Show in Nav Menus', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Makes this post type available for selection in navigation menus. Default is true.</span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-show-in-nav-menus" type="checkbox" value="true"
                                            <?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_show_in_nav_menus ) ? "" : ( $this->add_cpt_viewmodel->cpt->post_type_show_in_nav_menus ? "checked" : "" ) ); ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-show-in-admin-bar" class="cwf-tooltip"><?php esc_html_e( 'Show in Admin Bar', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Makes this post type available via the admin bar. Default is true.</span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-show-in-admin-bar" type="checkbox" value="true"
                                            <?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_show_in_admin_bar ) ? "" : ( $this->add_cpt_viewmodel->cpt->post_type_show_in_admin_bar ? "checked" : "" ) ); ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-show-in-rest" class="cwf-tooltip"><?php esc_html_e('Show in REST', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Whether to include the post type in the REST API. 
                                                    Set this to true for the post type to be available in the block editor.</span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-show-in-rest" type="checkbox" value="true"
                                            <?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_show_in_rest ) ? "" : ( $this->add_cpt_viewmodel->cpt->post_type_show_in_rest ? "checked" : "" ) ); ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-rest-base" class="cwf-tooltip"><?php esc_html_e( 'REST Base', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">To change the base url of REST API route. Default is value of 'Post Type Key'.</span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-rest-base" type="text" class="regular-text cwf-slug" placeholder="" 
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_rest_base ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_rest_base ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-rest-controller-class-name" class="cwf-tooltip"><?php esc_html_e( 'REST Controller Class Name', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">REST API Controller class name. Default is 'WP_REST_Posts_Controller'.</span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-rest-controller-class-name" type="text" class="regular-text" placeholder="" 
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_rest_controller_class ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_rest_controller_class ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-menu-position" class="cwf-tooltip"><?php esc_html_e( 'Menu Position', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">The position in the menu order the post type should appear. 
                                                    To work, 'Show in Menu' must be true. Default is null (at the bottom).</span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-menu-position" type="number" min="5" max="100" step="1" class="regular-text <?php echo empty( $this->add_cpt_viewmodel->validation_errors['post-type-menu-position'] ) ? '' : 'cwf-has-error'; ?>" 
                                            placeholder="" value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_menu_position ) ? "" : $this->add_cpt_viewmodel->cpt->post_type_menu_position ); ?>" />
                                            <p class="cwf-field-validation"><?php echo esc_html( empty( $this->add_cpt_viewmodel->validation_errors['post-type-menu-position'] ) ? '' : $this->add_cpt_viewmodel->validation_errors['post-type-menu-position'] ); ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-menu-icon" class="cwf-tooltip"><?php esc_html_e('Menu Icon', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">The icon to use for the post type menu. Choose a dashicon or select a custom image (maximum 20 x 20 pixels). Default is the 'posts' dashicon.
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <div class="cwt-cpt-dashicon-container<?php echo esc_attr( empty( $this->add_cpt_viewmodel->cpt->validation_errors['post-type-menu-icon'] ) ? '' : ' cwf-has-error' ); ?>">
                                                <?php 
                                                    $i = 1; 
                                                    foreach( $this->add_cpt_viewmodel->dashicons as $key => $value ) { ?>
                                                    <div>
                                                        <label title="<?php echo esc_attr( $key ); ?>">
                                                            <input id="<?php echo esc_attr( 'cwf-cpt-icon-' . $i ); ?>" type="radio" class="cwf-cpt-dashicon-input" name="cwf-cpt-menu-dashicon"
                                                            value="<?php echo esc_html( $value ); ?>" 
                                                            <?php
                                                                if( $value == $this->add_cpt_viewmodel->cpt->post_type_menu_icon ) {
                                                                    echo esc_html( 'checked' );
                                                                }
                                                                else if($key == "Post" && empty( $this->add_cpt_viewmodel->cpt->post_type_menu_icon ) ){
                                                                    echo esc_html( 'checked' );
                                                                }
                                                            ?>/>
                                                            <span class="dashicons <?php echo esc_attr( $value ); ?>"></span>
                                                        </label>
                                                    </div>
                                                <?php $i++; } ?>
                                            </div>
                                            <div id="cwf-upload-container">
                                                <button id="cwf-upload-icon" class="cwf-media-upload-button<?php echo esc_attr( empty( $this->add_cpt_viewmodel->validation_errors['post-type-menu-icon'] ) ? '' : ' cwf-has-error' ); ?>" type="button"
                                                data-type="label" data-destination="cwf-icon-url" data-media="Choose File" data-input="cwf-icon-url-input" data-reset="cwt-cpt-menu-dashicon" data-reset-type="radio"><?php esc_html_e( 'Choose file', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?></button>
                                                <input id="cwf-icon-url-input" name="post-type-menu-icon" type="hidden" value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_menu_icon ) ? 'dashicons-admin-post' : $this->add_cpt_viewmodel->cpt->post_type_menu_icon ); ?>" />
                                            </div>
                                            <div id="cwf-icon-url-container"><span id="cwf-icon-url"><?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_menu_icon ) ? 'dashicons-admin-post' : basename( $this->add_cpt_viewmodel->cpt->post_type_menu_icon ) ); ?></span></div>
                                            <p class="cwf-field-validation"><?php echo esc_html( empty( $this->add_cpt_viewmodel->validation_errors['post-type-menu-icon'] ) ? '' : $this->add_cpt_viewmodel->validation_errors['post-type-menu-icon'] ); ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-capability-type" class="cwf-tooltip"><?php esc_html_e( 'Capability Type', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">The post type(s) to use as a model for the read, edit, and delete capabilities. Default is 'post'.</span>
                                            </label>
                                        </th>
                                        <td>
                                            <select name="post-type-capability-type" class="regular-text">
                                                <option value="post" <?php echo esc_html( $this->add_cpt_viewmodel->cpt->post_capability_type == 'post' ? 'selected' : '' ); ?>>Post</option>
                                                <option value="page" <?php echo esc_html( $this->add_cpt_viewmodel->cpt->post_capability_type == 'page' ? 'selected' : '' ); ?>>Page</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label class="cwf-tooltip"><?php esc_html_e( 'Supports', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">The core feature(s) the post type supports. Default is post type supports 'title', 'editor', 'themes' and 'thumbnail'.</span>
                                            </label>
                                        </th>
                                        <td>
                                            <div><label for="post-type-supports-title"><input name="post-type-supports-title" type="checkbox" value="true"
                                            <?php echo esc_html( $this->add_cpt_viewmodel->cpt->post_type_supports["title"] ? 'checked' : '' ); ?>/>Title</label></div>
                                            <div><label for="post-type-supports-editor"><input name="post-type-supports-editor" type="checkbox" value="true"
                                            <?php echo esc_html( $this->add_cpt_viewmodel->cpt->post_type_supports["editor"] ? 'checked' : '' ); ?>/>Editor</label></div>
                                            <div><label for="post-type-supports-thumbnail"><input name="post-type-supports-thumbnails" type="checkbox" value="true"
                                            <?php echo esc_html( $this->add_cpt_viewmodel->cpt->post_type_supports["thumbnail"] ? 'checked' : '' ); ?>/>Thumbnails</label></div>
                                            <div><label for="post-type-supports-comments"><input name="post-type-supports-comments" type="checkbox" value="true"
                                            <?php echo esc_html( $this->add_cpt_viewmodel->cpt->post_type_supports["comments"] ? 'checked' : '' ); ?>/>Comments</label></div>
                                            <div><label for="post-type-supports-revisions"><input name="post-type-supports-revisions" type="checkbox" value="true"
                                            <?php echo esc_html( $this->add_cpt_viewmodel->cpt->post_type_supports["revisions"] ? 'checked' : '' ); ?>/>Revisions</label></div>
                                            <div><label for="post-type-supports-trackbacks"><input name="post-type-supports-trackbacks" type="checkbox" value="true"
                                            <?php echo esc_html( $this->add_cpt_viewmodel->cpt->post_type_supports["trackbacks"] ? 'checked' : '' ); ?>/>Trackbacks</label></div>
                                            <div><label for="post-type-supports-author"><input name="post-type-supports-author" type="checkbox" value="true"
                                            <?php echo esc_html( $this->add_cpt_viewmodel->cpt->post_type_supports["author"] ? 'checked' : '' ); ?>/>Author</label></div>
                                            <div><label for="post-type-supports-excerpt"><input name="post-type-supports-excerpt" type="checkbox" value="true"
                                            <?php echo esc_html( $this->add_cpt_viewmodel->cpt->post_type_supports["excerpt"] ? 'checked' : '' );  ?>/>Excerpt</label></div>
                                            <div><label for="post-type-supports-page-attributes"><input name="post-type-supports-page-attributes" type="checkbox" value="true"
                                            <?php echo esc_html( $this->add_cpt_viewmodel->cpt->post_type_supports["page-attributes"] ? 'checked' : '' ); ?>/>Page Attributes</label></div>
                                            <div><label for="post-type-supports-custom-fields"><input name="post-type-supports-custom-fields" type="checkbox" value="true"
                                            <?php echo esc_html( $this->add_cpt_viewmodel->cpt->post_type_supports["custom-fields"] ? 'checked' : '' ); ?>/>Custom Fields</label></div>
                                            <div><label for="post-type-supports-post-formats"><input name="post-type-supports-post-formats" type="checkbox" value="true"
                                            <?php echo esc_html( $this->add_cpt_viewmodel->cpt->post_type_supports["post-formats"] ? 'checked' : '' ); ?>/>Post Formats</label></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label class="cwf-tooltip"><?php esc_html_e( 'Custom Support Features', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Add your own custom support slug(s) here. Press enter key after typing each slug.</span>
                                            </label>
                                        </th>
                                        <td>
                                            <div id="custom-support-container" class="cwf-tag-container">
                                                <?php 
                                                    if( ! empty( $this->add_cpt_viewmodel->cpt->post_type_custom_supports ) ) {
                                                        foreach( $this->add_cpt_viewmodel->cpt->post_type_custom_supports as $custom_support ) {
                                                            ?>
                                                                <div id="tag_<?php echo esc_attr( $custom_support ); ?>" class="cwf-tag" data-item="<?php echo esc_attr( $custom_support ); ?>"><?php echo esc_html( $custom_support ); ?> <span class="cwf-tag-exit" data-item="<?php echo esc_attr( $custom_support ); ?>" data-hidden="post-type-custom-support" data-container="custom-support-container" onclick="deleteTag(this)">&#x2715;</span></div>
                                                            <?php
                                                        }
                                                    }
                                                ?>
                                                <input id="custom-support-slugs" name="custom-support-slugs" class="cwf-tag-input" onblur="finaliseTags('custom-support-slugs')" data-hidden="post-type-custom-support" />
                                                <?php 
                                                    if( ! empty( $this->add_cpt_viewmodel->cpt->post_type_custom_supports ) ) {
                                                        foreach( $this->add_cpt_viewmodel->cpt->post_type_custom_supports as $custom_support ) {
                                                            ?>
                                                                <input id="post-type-custom-support-<?php echo esc_attr( $custom_support ); ?>" type="hidden" name="post-type-custom-support[]" value="<?php echo esc_html( $custom_support ); ?>"/> 
                                                            <?php
                                                        }
                                                    }
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-has-archive" class="cwf-tooltip"><?php esc_html_e( 'Has Archive', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Whether there should be archives for the post type. Default is false.</span>
                                            </label>
                                        </th>
                                        <td>
                                            <input id="post-type-has-archive" name="post-type-has-archive" type="checkbox" value="true" class="cwf-conditional"
                                            <?php echo esc_html( $this->add_cpt_viewmodel->cpt->post_type_has_archive ? 'checked' : '' ); ?> 
                                            data-children="<?php echo htmlspecialchars( json_encode( array( 'post-type-archive-slug-row') ), ENT_COMPAT ); ?>" />
                                        </td>
                                    </tr>
                                    <tr id="post-type-archive-slug-row" style="<?php echo esc_attr( $this->add_cpt_viewmodel->cpt->post_type_has_archive ? '' : 'display:none;' ); ?>">
                                        <th scope="row">
                                            <label for="post-type-archive-slug" class="cwf-tooltip"><?php esc_html_e( 'Archive Slug', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">The archive URL to use for this post type. Default is the post type key.</span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-archive-slug" type="text" class="regular-text" data-clear="true"
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_archive_slug ) ? '' : $this->add_cpt_viewmodel->cpt->post_type_archive_slug ); ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-rewrite" class="cwf-tooltip"><?php esc_html_e( 'Rewrite', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Enables the handling of rewrites for this post type. To prevent rewrite, set to false. Default is true.</span>
                                            </label>
                                        </th>
                                        <td>
                                            <input id="post-type-rewrite" name="post-type-rewrite" type="checkbox" value="true"
                                            <?php echo esc_html( $this->add_cpt_viewmodel->cpt->post_type_rewrite ? 'checked' : '' ); ?> class="cwf-conditional"
                                            data-children="<?php echo htmlspecialchars( json_encode( array( 'post-type-rewrite-slug-row', 'post-type-rewrite-with-front-row',
                                            'post-type-rewrite-feeds-row', 'post-type-rewrite-pages-row' ) ), ENT_COMPAT ); ?>"/>
                                        </td>
                                    </tr>
                                    <tr id="post-type-rewrite-slug-row" style="<?php echo esc_attr( $this->add_cpt_viewmodel->cpt->post_type_rewrite ? '' : 'display:none;' ); ?>">
                                        <th scope="row">
                                            <label for="post-type-rewrite-slug" class="cwf-tooltip"><?php esc_html_e( 'Rewrite (Slug)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Customise the permastruct slug. Defaults to Post Type Key.</span>        
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-rewrite-slug" type="text" class="regular-text cwf-slug" data-clear="true"
                                            value="<?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_rewrite_rules['slug'] ) ? '' : $this->add_cpt_viewmodel->cpt->post_type_rewrite_rules['slug'] ); ?>" />
                                        </td>
                                    </tr>
                                    <tr id="post-type-rewrite-with-front-row" style="<?php echo esc_attr( $this->add_cpt_viewmodel->cpt->post_type_rewrite ? '' : 'display:none;' ); ?>">
                                        <th scope="row">
                                            <label for="post-type-rewrite-with-front" class="cwf-tooltip"><?php esc_html_e( 'Rewrite (With Front)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Whether the rewrite should be prepended with the front base. Default is true.</span>        
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-rewrite-with-front" type="checkbox" value="true" data-clear="false"
                                            <?php echo esc_html( $this->add_cpt_viewmodel->cpt->post_type_rewrite_rules['with-front'] ? 'checked' : '' ); ?> />
                                        </td>
                                    </tr>
                                    <tr id="post-type-rewrite-feeds-row" style="<?php echo esc_attr( $this->add_cpt_viewmodel->cpt->post_type_rewrite ? '' : 'display:none;' ); ?>">
                                        <th scope="row">
                                            <label for="post-type-rewrite-feeds" class="cwf-tooltip"><?php esc_html_e( 'Rewrite (Feeds)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Whether the feed permastruct should be built for this post type. Default is value of 'Has Archive'.</span>
                                            </label>           
                                        </th>
                                        <td>
                                            <input name="post-type-rewrite-feeds" type="checkbox" value="true" data-clear="false"
                                            <?php echo esc_html( $this->add_cpt_viewmodel->cpt->post_type_rewrite_rules['feeds'] ? 'checked' : '' ); ?>/>
                                        </td>
                                    </tr>
                                    <tr id="post-type-rewrite-pages-row" style="<?php echo esc_attr( $this->add_cpt_viewmodel->cpt->post_type_rewrite ? '' : 'display:none;' ); ?>">
                                        <th scope="row">
                                            <label for="post-type-rewrite-pages" class="cwf-tooltip"><?php esc_html_e( 'Rewrite (Pages)', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Whether the permastruct should provide for pagination. Default is true.</span>        
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-rewrite-pages" type="checkbox" value="true" data-clear="false"
                                            <?php echo esc_html( $this->add_cpt_viewmodel->cpt->post_type_rewrite_rules['pages'] ? 'checked' : '' ); ?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-query-var" class="cwf-tooltip"><?php esc_html_e( 'Query Variable', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">If false, a post type cannot be loaded at ?{query_var}={post_slug}.
                                                    Default value is true. 
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input id="post-type-query-var" name="post-type-query-var" type="checkbox" value="true" class="cwf-conditional"
                                            <?php echo esc_html( $this->add_cpt_viewmodel->cpt->post_type_query_var ? 'checked' : '' ); ?>
                                            data-children="<?php echo htmlspecialchars( json_encode( array( 'post-type-query-var-slug-row' ) ), ENT_COMPAT ); ?>"/>
                                        </td>
                                    </tr>
                                    <tr id="post-type-query-var-slug-row" style="<?php echo esc_attr( $this->add_cpt_viewmodel->cpt->post_type_query_var ? '' : 'display:none;' ); ?>">
                                        <th scope="row">
                                            <label for="post-type-query-var-slug" class="cwf-tooltip"><?php esc_html_e( 'Query Variable Slug', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Sets the query_var key for this post type. Default is the post type key.
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-query-var-slug" type="text" class="regular-text cwf-slug"
                                            value="<?php echo esc_html( empty($this->add_cpt_viewmodel->cpt->post_type_query_var_slug) ? '' : $this->add_cpt_viewmodel->cpt->post_type_query_var_slug ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-can-export" class="cwf-tooltip"><?php esc_html_e( 'Can Export', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">
                                                    Whether to allow this post type to be exported. Default is true.
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-can-export" type="checkbox" value="true"
                                            <?php echo esc_html( $this->add_cpt_viewmodel->cpt->post_type_can_export ? 'checked' : '' ); ?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-delete-with-user" class="cwf-tooltip"><?php esc_html_e( 'Delete With User', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Whether to delete posts of this type when deleting a user. If true, 
                                                    posts of this type belonging to the user will be moved to Trash when user is deleted. If false, posts of this type belonging
                                                    to the user will *not* be trashed or deleted. Default is true if post type supports 'Author'.
                                                </span>
                                            </label>
                                        </th>
                                        <td>
                                            <input name="post-type-delete-with-user" type="checkbox" value="true"
                                            <?php echo esc_html( $this->add_cpt_viewmodel->cpt->post_type_delete_with_user ? 'checked' : '' ); ?>/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="post-type-registered-taxonomies" class="cwf-tooltip"><?php esc_html_e( 'Registered Taxonomies', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>
                                                <span class="cwf-tooltip-text">Add post type support for taxonomies that have already been registered. Custom taxonomies can be added to the post type later.</span>
                                            </label>
                                        </th>
                                        <td>
                                            <div class="cwf-multiselect regular-text">
                                                <div id="cpt-taxonomy-select">
                                                    <select>
                                                        <option>Select available taxonomies</option>
                                                    </select>
                                                    <div class="cwf-over-select"></div>
                                                </div>
                                                <div id="cpt-taxonomy-checkboxes">
                                                    <?php
                                                        foreach( $this->add_cpt_viewmodel->available_taxonomies as $available_taxonomy ) {
                                                            ?>
                                                                <label>
                                                                    <input id="cpt-post-type-taxonomy-<?php echo $available_taxonomy->name; ?>" name="post-type-taxonomies[]" type="checkbox" value="<?php echo esc_html( $available_taxonomy->name ); ?>"
                                                                    <?php echo esc_html( empty( $this->add_cpt_viewmodel->cpt->post_type_taxonomies ) ? '' : ( in_array( $available_taxonomy->name, $this->add_cpt_viewmodel->cpt->post_type_taxonomies ) ? 'checked' : '' ) ); ?>/>
                                                                    <?php echo esc_html( $available_taxonomy->label ); ?>
                                                                </label> 
                                                            <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- End postbox -->
                    <div>
                        <?php wp_nonce_field( 'cwf_add_cpt', 'cwf_add_cpt_nonce_field' ); ?>
                        <p class="submit">
                            <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php esc_html_e( 'Add Custom Post Type', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>"/>
                        </p>
                    </div>
                </div> <!-- End meta-box-sortables -->
            </div> <!-- End postbox-container -->
        </div><!-- End poststuff -->
    </form>
</div>