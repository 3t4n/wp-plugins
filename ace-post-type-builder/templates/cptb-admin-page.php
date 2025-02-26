<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( isset( $_GET['message'] ) && $_GET['message'] == 1 ) : ?>
    <div class="notice notice-success is-dismissible">
        <p><?php esc_html_e( 'Custom post type created successfully!', 'ace-post-type-builder' ); ?></p>
    </div>
<?php elseif ( isset( $_GET['message'] ) && $_GET['message'] == 2 ) : ?>
    <div class="notice notice-success is-dismissible">
        <p><?php esc_html_e( 'Custom post type updated successfully!', 'ace-post-type-builder' ); ?></p>
    </div>
<?php elseif ( isset( $_GET['message'] ) && $_GET['message'] == 3 ) : ?>
    <div class="notice notice-success is-dismissible">
        <p><?php esc_html_e( 'Custom post type deleted successfully!', 'ace-post-type-builder' ); ?></p>
    </div>
<?php endif; 

// Check if we are editing an existing post type
$editing = false;
$edit_post_type = null;

if ( isset( $_GET['edit'] ) && ! empty( $_GET['edit'] ) ) {
    $edit_post_type_slug = sanitize_text_field( $_GET['edit'] );
    $post_types = get_option( 'cptb_custom_post_types', array() );
    
    if ( isset( $post_types[ $edit_post_type_slug ] ) ) {
        $edit_post_type = $post_types[ $edit_post_type_slug ];
        $editing = true;
    }
}
?>
<form method="post" action="<?php echo esc_url( admin_url( $editing ? 'admin-post.php?action=cptb_update_post_type' : 'admin-post.php?action=cptb_save_post_type' ) ); ?>">
    <?php wp_nonce_field( $editing ? 'cptb_update_post_type' : 'cptb_save_post_type', 'cptb_nonce' ); ?>
    
    <?php if ( $editing ) : ?>
        <input type="hidden" name="original_post_type_slug" value="<?php echo esc_attr( $edit_post_type['slug'] ); ?>">
        <h2><?php esc_html_e( 'Edit Custom Post Type', 'ace-post-type-builder' ); ?></h2>
    <?php else : ?>
        <h2><?php esc_html_e( 'Create New Custom Post Type', 'ace-post-type-builder' ); ?></h2>
    <?php endif; ?>
    
    <table class="form-table">
        <tr>
            <th><label for="post_type_name"><?php esc_html_e( 'Post Type Name', 'ace-post-type-builder' ); ?></label></th>
            <td><input type="text" name="post_type_name" id="post_type_name" class="regular-text" value="<?php echo $editing ? esc_attr( $edit_post_type['name'] ) : ''; ?>" required placeholder="<?php esc_attr_e( 'Enter Post Type Name', 'ace-post-type-builder' ); ?>"></td>
        </tr>
        <tr>
            <th><label for="post_type_slug"><?php esc_html_e( 'Post Type Slug', 'ace-post-type-builder' ); ?></label></th>
            <td><input type="text" name="post_type_slug" id="post_type_slug" class="regular-text" value="<?php echo $editing ? esc_attr( $edit_post_type['slug'] ) : ''; ?>" required placeholder="<?php esc_attr_e( 'Enter Post Type Slug', 'ace-post-type-builder' ); ?>"></td>
        </tr>
        <tr>
    <th><label for="post_type_label_name"><?php esc_html_e( 'Label Name (Plural)', 'ace-post-type-builder' ); ?></label></th>
    <td>
    <input type="text" name="post_type_label_name" id="post_type_label_name" class="regular-text" 
           value="<?php echo isset( $edit_post_type['labels']['name'] ) ? esc_attr( $edit_post_type['labels']['name'] ) : ''; ?>" 
           required placeholder="<?php esc_attr_e( 'Enter Label Name For Menue (Plural)', 'ace-post-type-builder' ); ?>">
</td>
</tr>
<tr>
    <th><label for="post_type_singular_name"><?php esc_html_e( 'Singular Name', 'ace-post-type-builder' ); ?></label></th>
    <td>
    <input type="text" name="post_type_singular_name" id="post_type_singular_name" class="regular-text" 
           value="<?php echo isset( $edit_post_type['labels']['singular_name'] ) ? esc_attr( $edit_post_type['labels']['singular_name'] ) : ''; ?>" 
           required placeholder="<?php esc_attr_e( 'Enter Singular Name', 'ace-post-type-builder' ); ?>">
</td>
</tr>

<tr>
    <th><label for="supports"><?php esc_html_e( 'Supports', 'ace-post-type-builder' ); ?></label></th>
    <td>
        <label>
            <input type="checkbox" name="supports[]" value="title" checked disabled>
            <?php esc_html_e( 'Title', 'ace-post-type-builder' ); ?>
        </label><br>
    </td>
</tr>
     
        <tr>
            <th><label for="menu_position"><?php esc_html_e( 'Menu Position', 'ace-post-type-builder' ); ?></label></th>
            <td><input type="number" name="menu_position" id="menu_position" value="<?php echo $editing ? esc_attr( $edit_post_type['menu_position'] ) : '20'; ?>" class="small-text"></td>
        </tr>
    </table>

    <p class="submit">
        <input type="submit" class="button-primary" value="<?php echo $editing ? esc_html_e( 'Update Post Type', 'ace-post-type-builder' ) : esc_html_e( 'Create Post Type', 'ace-post-type-builder' ); ?>">
    </p>
</form>


<?php
$post_types = get_option( 'cptb_custom_post_types' );

if ( isset( $post_types ) && is_array( $post_types ) ) : ?>
    <h2><?php esc_html_e( 'Existing Custom Post Types', 'ace-post-type-builder' ); ?></h2>
    <table class="wp-list-table widefat fixed striped">
        <thead>
            <tr>
                <th><?php esc_html_e( 'Post Type Name', 'ace-post-type-builder' ); ?></th>
                <th><?php esc_html_e( 'Post Type Slug', 'ace-post-type-builder' ); ?></th>
                <th><?php esc_html_e( 'Actions', 'ace-post-type-builder' ); ?></th>
            </tr>
        </thead>
        <tbody>
    <?php foreach ( $post_types as $post_type ) : ?>
    <tr>
        <td><?php echo esc_html( $post_type['name'] ); ?></td>
        <td><?php echo esc_html( $post_type['slug'] ); ?></td>
        <td>
            <!-- Edit Button -->
            <a href="<?php echo esc_url( admin_url( 'admin.php?page=cptb-post-types&edit=' . esc_attr( $post_type['slug'] ) ) ); ?>" class="button button-primary">
                <?php esc_html_e( 'Edit', 'ace-post-type-builder' ); ?>
            </a>
           <!-- Delete Button -->
           <a href="<?php echo esc_url( admin_url( 'admin-post.php?action=cptb_delete_post_type&post_type=' . esc_attr( $post_type['slug'] ) . '&_wpnonce=' . wp_create_nonce( 'cptb_delete_post_type_' . esc_attr( $post_type['slug'] ) ) ) ); ?>" class="button button-secondary">
            <?php esc_html_e( 'Delete', 'ace-post-type-builder' ); ?>
           </a>

        </td>
    </tr>
    <?php endforeach; ?>
</tbody>
    </table>
<?php else : ?>
    <p><?php esc_html_e( 'No custom post types found.', 'ace-post-type-builder' ); ?></p>
<?php endif; ?>
