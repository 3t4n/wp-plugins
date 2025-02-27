<?php
namespace Pagup\Vidseo\Controllers;
use Pagup\Vidseo\Core\Plugin;
use Pagup\Vidseo\Core\Request;

class MetaboxController
{
    public function add_metabox() {
        add_meta_box(
            'vidseo_post_options', // id, used as the html id att
            __( 'Video SEO', 'vidseo' ), // meta box title
            array(&$this, 'metabox'), // callback function, spits out the content
            'vidseo', // post type or page. This adds to posts only
            'normal', // context, where on the screen
            'high' // priority, where should this go in the context
        );
    }

    public function metabox( $post )
    {
        $data = [
            'vidseo_content' => get_post_meta($post->ID, 'vidseo_content', true),
            'post' => $post,
            'get_pro' => sprintf( wp_kses( __( '<a href="%s">Get Pro version</a> to enable', 'vidseo' ), 
                    array(
                        'a' => array(
                        'href'   => array(),
                        'target' => array(),
                    ),
                ) ), esc_url( 'edit.php?post_type=vidseo&page=settings-pricing' ) )
        ];

        $meta = get_post_meta($post->ID);

        $fields = ['vidseo_url', 'vidseo_language', 'vidseo_content', 'vidseo_host', 'vidseo_width', 'hide_title', 'hide_transcript', 'excerpt_length'];
        $metadata = array();

        foreach ($meta as $key => $value) { 
            if (isset($key) && in_array($key, $fields) ) {
                $metadata[$key] = $value[0];
            }
        }

        wp_localize_script( 'vidseo_script', 'meta', $metadata ); 

        //var_dump($metadata);

        return Plugin::view('metabox', $data);
    }

    public function add_meta_sidebar() {
        add_meta_box(
            'vidseo_post_sidebar', // id, used as the html id att
            __( 'VIDSEO - Custom settings', 'vidseo' ), // meta box title
            array(&$this, 'meta_sidebar'), // callback function, spits out the content
            'vidseo', // post type or page. This adds to posts only
            'side', // context, where on the screen
            'low' // priority, where should this go in the context
        );
    }

    public function meta_sidebar( $post )
    {
        $data = [
            'vidseo_width' => get_post_meta($post->ID, 'vidseo_width', true),
            'excerpt_length' => get_post_meta($post->ID, 'excerpt_length', true),
            'hide_title' => get_post_meta($post->ID, 'hide_title', true),
            'hide_transcript' => get_post_meta($post->ID, 'hide_transcript', true),
            'post' => $post,
        ];

        return Plugin::view('meta_sidebar', $data);
    }

    public function metadata( $postid )
    {
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return false;
        if ( !current_user_can( 'edit_page', $postid ) ) return false;
        if( empty($postid) ) return false;

        $safe = ["hide_title", "hide_transcript"];

        ( Request::input('vidseo_host') ) ? 
            update_post_meta( $postid, 'vidseo_host', sanitize_text_field( $_POST['vidseo_host'] ) ) : 
            delete_post_meta( $postid, 'vidseo_host' );

        ( Request::input('vidseo_url') ) ? 
            update_post_meta( $postid, 'vidseo_url', sanitize_text_field( $_POST['vidseo_url'] ) ) : 
            delete_post_meta( $postid, 'vidseo_url' );
            
        ( Request::input('vidseo_language') ) ? 
            update_post_meta( $postid, 'vidseo_language', sanitize_text_field( $_POST['vidseo_language'] ) ) : delete_post_meta( $postid, 'vidseo_language' );
            
        ( Request::input('vidseo_content') ) ? 
            update_post_meta( $postid, 'vidseo_content', $_POST['vidseo_content'] ) : 
            delete_post_meta( $postid, 'vidseo_content' );

        ( Request::input('vidseo_width') ) ? 
            update_post_meta( $postid, 'vidseo_width', sanitize_text_field( $_POST['vidseo_width'] ) ) : 
            delete_post_meta( $postid, 'vidseo_width' );

        ( Request::checkbox('hide_title', $safe) ) ? 
            update_post_meta( $postid, 'hide_title', sanitize_text_field( $_POST['hide_title'] ) ) : 
            delete_post_meta( $postid, 'hide_title' );
            
        ( Request::checkbox('hide_transcript', $safe) ) ? 
            update_post_meta( $postid, 'hide_transcript', sanitize_text_field( $_POST['hide_transcript'] ) ) : delete_post_meta( $postid, 'hide_transcript' );
            
        ( Request::input('excerpt_length') ) ? 
            update_post_meta( $postid, 'excerpt_length', sanitize_text_field( $_POST['excerpt_length'] ) ) : delete_post_meta( $postid, 'excerpt_length' );
    }
}