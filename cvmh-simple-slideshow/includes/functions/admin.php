<?php
defined( 'ABSPATH' ) or exit;

/**
 * Admin initialisation
 */
add_action( 'admin_menu', 'cvmh_slideshow_admin_menu' );
function cvmh_slideshow_admin_menu() {
    add_options_page( 'Simple Slideshow', 'Simple Slideshow', 'manage_options', 'cvmh-simple-slideshow', 'cvmh_slideshow_admin_settings_page' );
    add_meta_box( CVMH_SLIDESHOW_SLUG, __( 'Slideshow', 'cvmh-simple-slideshow' ), 'cvmh_slideshow_admin_metabox_slide', CVMH_SLIDESHOW_SLUG, 'normal', 'high' );
}

/**
 * Enqueues scripts
 */
add_action( 'admin_enqueue_scripts', 'cvmh_slideshow_admin_enqueue' );
function cvmh_slideshow_admin_enqueue() {
    wp_enqueue_media();
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'jquery-ui-sortable' );
    wp_enqueue_script( 'cvmh-slideshow-admin', plugins_url( '../../assets/js/admin.min.js', __FILE__), array( 'jquery' ) );
    wp_enqueue_style( 'cvmh-slideshow-admin', plugins_url( '../../assets/css/admin.min.css', __FILE__) );
    // Adds data in JavaScript
    $l10n = array(
        'select'             => __( "Select images", 'cvmh-simple-slideshow' ),
        'use-selection'      => __( "Use this selection", 'cvmh-simple-slideshow' ),
    );
    wp_localize_script( 'cvmh-slideshow-admin', 'cvmhTranslate', $l10n );
}

/**
 * Admin settings page
 */
function cvmh_slideshow_admin_settings_page() {
    require_once( CVMH_SLIDESHOW_PATH . 'views/settings.php' );
}
    
/**
 * Settings link in extension list
 * 
 * @param type $links
 * @return type
 */
add_filter( 'plugin_action_links_cvmh-simple-slideshow/cvmh-simple-slideshow.php', 'cvmh_slideshow_admin_add_action_links' );
function cvmh_slideshow_admin_add_action_links( $links ) {
    array_unshift(
        $links,
        '<a href="' . admin_url( 'admin.php?page=cvmh-simple-slideshow' ) . '">' . __( 'Settings', 'cvmh-simple-slideshow' ) . '</a>'
    );
    return $links;
}

/**
 * Slide metabox
 */
function cvmh_slideshow_admin_metabox_slide() {
    require_once( CVMH_SLIDESHOW_PATH . 'views/metabox-slide.php' );
}
        
/**
 * Prepare custom post table columns
 * 
 * @param type $columns
 * @return type
 */
add_filter( 'manage_edit-' . CVMH_SLIDESHOW_SLUG . '_columns' , 'cvmh_slideshow_admin_prepare_columns' );
function cvmh_slideshow_admin_prepare_columns( $columns ) {
    unset( $columns['title'] );
    unset( $columns['wpseo-score'] );
    unset( $columns['wpseo-title'] );
    unset( $columns['wpseo-metadesc'] );
    unset( $columns['wpseo-focuskw'] );        
    $new_columns['image'] = __( 'Image', 'cvmh-simple-slideshow' );
    $options = json_decode( get_option( 'cvmh_slideshow' ), true );
    if ( !empty( $options['fields'] ) ) :
        $new_columns['field_0'] = $options['fields'][0];
    endif;
    $columns = array_slice( $columns, 0, 1 ) + $new_columns + array_slice( $columns, 1, null );
    return $columns;
}

/**
 * Display custom columns in admin properties table
 * 
 * @param type $name
 */
add_action( 'manage_posts_custom_column', 'cvmh_slideshow_admin_display_columns' );
function cvmh_slideshow_admin_display_columns( $name ) {
    switch ($name):
        case 'image' :
            $image_id = get_post_meta( get_the_ID(), '_cvmh_slide_image', true );
            $image = wp_get_attachment_image_src( $image_id, 'thumbnail' );
            ?>
            <a href="<?php echo admin_url( 'post.php?post=' . get_the_ID() . '&action=edit' ); ?>">
                <img src="<?php echo $image[0]; ?>" />
            </a>
        <?php break;
        case 'field_0' :
            $title = get_post_meta( get_the_ID(), '_cvmh_slide_0', true ); ?>
            <strong>
                <?php if ( get_post_status() === 'trash' ) : ?>
                    <span class="row-title"><?php echo $title; ?></span>
                <?php else : ?>
                    <a class="row-title" href="<?php echo admin_url( 'post.php?post=' . get_the_ID() . '&action=edit' ); ?>">
                        <?php echo $title; ?>
                    </a>
                <?php endif; ?>
            </strong>
            <div class="row-actions">
                <?php if ( get_post_status() === 'trash' ) : ?>
                    <?php $_wpnonce = wp_create_nonce( 'untrash-post_' . get_the_ID() ); ?>
                    <span class="untrash">
                        <a title="<?php _e( 'Restore this item from the Trash', 'cvmh-simple-slideshow' ); ?>" href="<?php echo admin_url( 'post.php?post=' . get_the_ID() . '&action=untrash&_wpnonce=' . $_wpnonce ); ?>">
                            <?php _e( 'Restore', 'cvmh-simple-slideshow' ); ?>
                        </a>
                    </span> | 
                    <span class="delete">
                        <a class="submitdelete" title="<?php _e( 'Delete this item permanently', 'cvmh-simple-slideshow' ); ?>" href="<?php echo get_delete_post_link( get_the_ID(), '', true ); ?>">
                            <?php _e( 'Delete Permanently', 'cvmh-simple-slideshow' ); ?>
                        </a>
                    </span>
                <?php else : ?>
                    <span class="edit">
                        <a title="<?php _e( 'Edit this item', 'cvmh-simple-slideshow' ); ?>" href="<?php echo admin_url( 'post.php?post=' . get_the_ID() . '&action=edit' ); ?>">
                            <?php _e( 'Edit', 'cvmh-simple-slideshow' ); ?>
                        </a>
                    </span> | 
                    <span class="trash">
                        <a class="submitdelete" title="<?php _e( 'Move this item to the Trash', 'cvmh-simple-slideshow' ); ?>" href="<?php echo get_delete_post_link( get_the_ID() ); ?>">
                            <?php _e( 'Trash', 'cvmh-simple-slideshow' ); ?>
                        </a>
                    </span>
                <?php endif; ?>
            </div>
        <?php break;
    endswitch;
}

/**
 * Save slide
 * 
 * @param type $post_id
 * @param type $post
 * @return type
 */
add_action( 'save_post', 'cvmh_slideshow_admin_save', 20, 2 );
function cvmh_slideshow_admin_save( $post_id, $post ) {
    $type = get_post_type_object( $post->post_type );
    if ( 
        $post->post_type !== 'cvmh_slideshow' 
            or 
        !wp_verify_nonce( $_POST['cvmh_slide_nonce'], 'cvmh-slideshow' ) 
            or 
        !current_user_can( $type->cap->edit_post ) 
    ) :
        return $post_id;
    endif;

    delete_post_meta( $post_id, '_cvmh_slide_new_window' );

    foreach( $_POST['slide'] as $key => $value ) :
        update_post_meta( $post_id, '_cvmh_slide_' . $key, $value );
    endforeach;
}
    
/**
 * Update order
 * 
 * @global type $wpdb
 * @return boolean
 */
add_action( 'wp_ajax_update-menu-order', 'cvmh_slideshow_admin_update_menu_order' );
function cvmh_slideshow_admin_update_menu_order() {
    global $wpdb;

    parse_str( $_POST['order'], $data );

    if ( !is_array( $data ) ) return false;

    // get objects per now page
    $id_arr = array();
    foreach( $data as $key => $values ) :
        foreach( $values as $position => $id ) :
            $id_arr[] = $id;
        endforeach;
    endforeach;

    // get menu_order of objects per now page
    $menu_order_arr = array();
    foreach( $id_arr as $key => $id ) :
        $results = $wpdb->get_results( "SELECT menu_order FROM $wpdb->posts WHERE ID = ".intval( $id ) );
        foreach( $results as $result ) :
            $menu_order_arr[] = $result->menu_order;
        endforeach;
    endforeach;

    // maintains key association = no
    sort( $menu_order_arr );

    foreach( $data as $key => $values ) :
        foreach( $values as $position => $id ) :
            $wpdb->update( $wpdb->posts, array( 'menu_order' => $menu_order_arr[$position] ), array( 'ID' => intval( $id ) ) );
        endforeach;
    endforeach;
}
    
/**
 * Refresh order
 * 
 * @global type $wpdb
 */
add_action( 'admin_init', 'cvmh_slideshow_admin_refresh' );
function cvmh_slideshow_admin_refresh() {
    global $wpdb;
    $results = $wpdb->get_results( "
            SELECT ID 
            FROM {$wpdb->posts} 
            WHERE post_type = '" . CVMH_SLIDESHOW_SLUG . "' AND post_status IN ('publish', 'pending', 'draft', 'private', 'future') 
            ORDER BY menu_order ASC
    " );
    foreach( $results as $key => $result ) :
            $wpdb->update( $wpdb->posts, array( 'menu_order' => $key+1 ), array( 'ID' => $result->ID ) );
    endforeach;
}
   
/**
 * Save options
 * 
 * @since 1.0
 */
function cvmh_slideshow_save_options() {
    foreach ( $_REQUEST['options'] as $key => $value ) :
        if ( is_array( $value ) ) :
            foreach ( $value as $tkey => $tvalue ) :
                $tab_options[$key][$tkey] = esc_attr( $tvalue );
            endforeach;
        else:
            $tab_options[$key] = esc_attr( $value );
        endif;
    endforeach;
    update_option( CVMH_SLIDESHOW_SLUG, json_encode( $tab_options ) );
}
