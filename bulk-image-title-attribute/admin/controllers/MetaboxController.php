<?php
namespace Pagup\Bigta\Controllers;
use Pagup\Bigta\Core\Plugin;
use Pagup\Bigta\Core\Request;

class MetaboxController
{
    public function __construct()
    {
        add_action( 'save_post', array(&$this, 'metadata'));
    }

    function metabox ( $post ) {

        global $wpdb;

        $data = [
            'bigta_use_custom_title' => get_post_meta($post->ID, 'bigta_use_custom_title', true),
            'bigta_custom_title' => get_post_meta($post->ID, 'bigta_custom_title', true),
            'bigta_disable' => get_post_meta($post->ID, 'bigta_disable', true)
        ];
        
        return Plugin::view('metabox', $data);
    }

    public function metadata ($postid)
    {   
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return false;
        if ( !current_user_can( 'edit_page', $postid ) ) return false;
        if( empty($postid) ) return false;

        $safe = array(
            "bigta_use_custom_title_yes",
            "bigta_disable_yes"
        );

        ( Request::post('bigta_use_custom_title', $safe) ) ? 
            update_post_meta( $postid, 'bigta_use_custom_title', true ) : 
            delete_post_meta( $postid, 'bigta_use_custom_title' );

        ( Request::check('bigta_custom_title') ) ? 
            update_post_meta( $postid, 'bigta_custom_title', sanitize_text_field( $_POST['bigta_custom_title'] ) ) : 
            delete_post_meta( $postid, 'bigta_custom_title' );

        ( Request::post('bigta_disable', $safe) ) ? 
        update_post_meta( $postid, 'bigta_disable', true ) : 
        delete_post_meta( $postid, 'bigta_disable' );

    }

    public function check($val)
    {
        return isset($option[$val]) && !empty($option[$val]);
    }
}

$metabox = new MetaboxController();