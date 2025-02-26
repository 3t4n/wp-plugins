<?php
/*
Plugin Name: AdminNotes
Description: Adds an admin notes block to post and page editing screens with formatted text support and user notifications.
Version: 1.0
Author: Nick Smith
License: GPL2
Text Domain: adminnotes
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function adno_register_meta() {
    register_post_meta( '', '_adno_notes', array(
        'show_in_rest'        => true,
        'single'              => true,
        'type'                => 'string',
        'sanitize_callback'   => 'wp_kses_post',
    ));

    register_post_meta( '', '_adno_show_message', array(
        'show_in_rest'        => true,
        'single'              => true,
        'type'                => 'boolean',
        'sanitize_callback'   => 'rest_sanitize_boolean',
    ));
}
add_action( 'init', 'adno_register_meta' );

function adno_add_meta_box() {
    add_meta_box(
        'adno_notes_meta_box',
        esc_html__( 'Admin Notes', 'adminnotes' ),
        'adno_render_meta_box',
        ['post', 'page'],
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'adno_add_meta_box' );

function adno_render_meta_box( $post ) {
    wp_nonce_field( 'adno_save_notes', 'adno_notes_nonce' );

    $notes        = get_post_meta( $post->ID, '_adno_notes', true );
    $show_message = get_post_meta( $post->ID, '_adno_show_message', true );

    $settings = array(
        'textarea_name' => 'adno_notes',
        'textarea_rows' => 10,
        'media_buttons' => false,
        'tinymce'       => array(
            'toolbar1' => 'bold,italic,underline,blockquote,|,bullist,numlist,|,link,unlink,|,removeformat',
            'toolbar2' => '',
        ),
    );

    echo '<div style="margin-bottom: 20px;">';
    wp_editor( $notes, 'adno_notes_editor', $settings );
    echo '</div>';

    echo '<div>';
    echo '<label for="adno_show_message">';
    echo '<input type="checkbox" id="adno_show_message" name="adno_show_message" value="1" ' . checked( $show_message, true, false ) . ' />';
    echo ' ' . esc_html__( 'Show notification when editing post/page', 'adminnotes' );
    echo '</label>';
    echo '</div>';
}

function adno_save_notes( $post_id ) {
    if ( ! isset( $_POST['adno_notes_nonce'] ) ) {
        return;
    }

    $nonce = sanitize_text_field( wp_unslash( $_POST['adno_notes_nonce'] ) );

    if ( ! wp_verify_nonce( $nonce, 'adno_save_notes' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['adno_notes'] ) ) {
        $notes = wp_kses_post( wp_unslash( $_POST['adno_notes'] ) );
        update_post_meta( $post_id, '_adno_notes', $notes );
    }

    $show_message = filter_input( INPUT_POST, 'adno_show_message', FILTER_VALIDATE_BOOLEAN );
    update_post_meta( $post_id, '_adno_show_message', $show_message );
}
add_action( 'save_post', 'adno_save_notes' );

function adno_register_block() {
    wp_register_script(
        'adno-block',
        plugins_url( 'js/block.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-data' ),
        filemtime( plugin_dir_path( __FILE__ ) . 'js/block.js' ),
        true
    );

    wp_register_style(
        'adno-block-editor',
        plugins_url( 'css/editor.css', __FILE__ ),
        array( 'wp-edit-blocks' ),
        filemtime( plugin_dir_path( __FILE__ ) . 'css/editor.css' )
    );

    wp_register_style(
        'adno-block',
        plugins_url( 'css/style.css', __FILE__ ),
        array(),
        filemtime( plugin_dir_path( __FILE__ ) . 'css/style.css' )
    );

    register_block_type( 'adno/admin-notes', array(
        'editor_script'   => 'adno-block',
        'editor_style'    => 'adno-block-editor',
        'style'           => 'adno-block',
        'render_callback' => 'adno_render_block',
        'attributes'      => array(
            'notes' => array(
                'type'    => 'string',
                'default' => '',
            ),
        ),
    ));
}
add_action( 'init', 'adno_register_block' );

function adno_render_block( $attributes, $content ) {
    global $post;
    if ( ! $post ) {
        return '';
    }

    $notes = get_post_meta( $post->ID, '_adno_notes', true );

    if ( empty( $notes ) ) {
        return '';
    }

    ob_start();
    ?>
    <div class="adno-notes-block">
        <h2><?php esc_html_e( 'Admin Notes', 'adminnotes' ); ?></h2>
        <div class="adno-notes-content">
            <?php echo wp_kses_post( wpautop( $notes ) ); ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

function adno_enqueue_assets() {
    wp_enqueue_style( 'adno-block', plugins_url( 'css/style.css', __FILE__ ), array(), '1.0' );
}
add_action( 'enqueue_block_assets', 'adno_enqueue_assets' );

function adno_display_admin_notice() {
    global $pagenow;

    if ( ! in_array( $pagenow, array( 'post.php', 'post-new.php' ), true ) ) {
        return;
    }

    if ( 'post-new.php' === $pagenow ) {
        return;
    }

    $post_id = filter_input( INPUT_GET, 'post', FILTER_VALIDATE_INT );

    if ( ! $post_id ) {
        return;
    }

    $notes        = get_post_meta( $post_id, '_adno_notes', true );
    $show_message = get_post_meta( $post_id, '_adno_show_message', true );

    if ( ! empty( $notes ) && $show_message ) {
        echo '<div class="notice notice-info is-dismissible adno-admin-notice">';
        echo '<p><strong>' . esc_html__( 'Attention!', 'adminnotes' ) . '</strong> ' . esc_html__( 'Please read the admin notes before editing this post or page.', 'adminnotes' ) . '</p>';
        echo '</div>';
    }
}
add_action( 'admin_notices', 'adno_display_admin_notice' );

function adno_enqueue_admin_scripts( $hook ) {
    if ( ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) {
        return;
    }

    wp_enqueue_script( 'adno-admin-notice', '', array( 'jquery' ), '1.0', true );

    $inline_script = "
        ( function( $ ) {
            $( document ).ready( function() {
                $( '.adno-admin-notice' ).on( 'click', '.notice-dismiss', function() {
                } );
            } );
        } )( jQuery );
    ";
    wp_add_inline_script( 'adno-admin-notice', $inline_script );
}
add_action( 'admin_enqueue_scripts', 'adno_enqueue_admin_scripts' );
?>