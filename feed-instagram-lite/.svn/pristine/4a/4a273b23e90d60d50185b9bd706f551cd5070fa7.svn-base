<?php

if ( ! defined( 'ABSPATH' ) ) {
    die( 'Please do not load this file directly!' );
}

/*-------------------------------------------------------------------------------*/

/*   Fallback function if the PHP Server does not have the array_replace function
/*-------------------------------------------------------------------------------*/
if ( ! function_exists( 'array_replace' ) ) {

    function array_replace()
    {

        $array = array();
        $n     = func_num_args();

        while ( $n-- > 0 ) {
            $array += func_get_arg( $n );
        }

        return $array;
    }

}

/*-------------------------------------------------------------------------------*/
/*  Duplicate Forms
/*-------------------------------------------------------------------------------*/
function gifeed_duplicate_feed()
{

    if ( ! is_admin() || ! current_user_can( 'manage_options' ) ) {
        wp_die( 'Security Issue!' );
    }

    if ( ! check_ajax_referer( 'gifeed-duplicate-nonce', 'nonce' ) && ( isset( $_GET['nonce'] ) && ! wp_verify_nonce( $_GET['nonce'], 'gifeed-duplicate-nonce' ) ) ) {
        wp_die( 'Security Issue!' );
    }

    if ( ! ( isset( $_GET['post'] ) || isset( $_POST['post'] ) || ( isset( $_REQUEST['action'] ) && 'gifeed_duplicate_feed' == $_REQUEST['action'] ) ) ) {
        wp_die( 'No post to duplicate has been supplied!' );
    }

    /*
     * get the original post id
     */
    $post_id = ( isset( $_GET['post'] ) ? sanitize_text_field( wp_unslash( $_GET['post'] ) ) : sanitize_text_field( wp_unslash( $_POST['post'] ) ) );
    $post_id = intval( $post_id );
    /*
     * and all the original post data then
     */
    $post = get_post( $post_id );

    /*
     * if you don't want current user to be the new post author,
     * then change next couple of lines to this: $new_post_author = $post->post_author;
     */
    $current_user    = wp_get_current_user();
    $new_post_author = $current_user->ID;

/*
 * if post data exists, create the post duplicate
 */
    if ( isset( $post ) && $post != null ) {

        /*
         * new post data array
         */
        $args = array(
            'comment_status' => $post->comment_status,
            'ping_status'    => $post->ping_status,
            'post_author'    => $new_post_author,
            'post_content'   => $post->post_content,
            'post_excerpt'   => $post->post_excerpt,
            'post_name'      => $post->post_name,
            'post_parent'    => $post->post_parent,
            'post_password'  => $post->post_password,
            'post_status'    => 'draft',
            'post_title'     => 'COPY of '.$post->post_title,
            'post_type'      => $post->post_type,
            'to_ping'        => $post->to_ping,
            'menu_order'     => $post->menu_order,
        );

        /*
         * insert the post by wp_insert_post() function
         */
        $new_post_id = wp_insert_post( $args );

        $data = get_post_custom( $post_id );

        foreach ( $data as $key => $values ) {

            foreach ( $values as $value ) {
                add_post_meta( $new_post_id, $key, maybe_unserialize( $value ) );
            }

        }

/*
 * finally, redirect to the edit post screen for the new draft
 */

        if ( wp_get_referer() ) {

            wp_safe_redirect( wp_get_referer() );

        } else {

            wp_redirect( admin_url( 'post.php?action=edit&post='.$new_post_id ) );

        }

        exit;
    } else {
        wp_die( 'Post creation failed, could not find original post: '.$post_id );
    }

}

add_action( 'wp_ajax_gifeed_duplicate_feed', 'gifeed_duplicate_feed' );

/*-------------------------------------------------------------------------------*/
/*  Create Preview Metabox
/*-------------------------------------------------------------------------------*/
function gifeed_preview_metabox()
{

    $gifeed_allowedtags = array(
		'a' => array( 'href' => array(), 'title' => array(), 'target' => array(), 'style' => array() ),
        'img' => array( 'src' => array(), 'class' => array(), 'id' => array(), 'alt' => array(), 'style' => array(), 'width' => array(), 'height' => array() ),
		'div' => array( 'class' => array(), 'style' => array() ),
        'ul' => array( 'class' => array() ),
		'li' => array()
		);

    $gprev = '<div style="text-align:center;">';
    $gprev .= '<img class="grayscale" id="gifeed-preview" style="-moz-border-radius: 3px;-webkit-border-radius: 3px;-khtml-border-radius: 3px;border-radius:3px;margin-top:9px;cursor:pointer;" src="'.plugins_url( 'img/metabox/preview.png', dirname( __FILE__ ) ).'" width="130" height="65" alt="Preview" >';
    $gprev .= '</div>';

    echo wp_kses( $gprev, $gifeed_allowedtags );

}

/*-------------------------------------------------------------------------------*/
/*  Create Demo Link
/*-------------------------------------------------------------------------------*/
function gifeed_demo_metabox()
{

    $gifeed_allowedtags = array(
		'a' => array( 'href' => array(), 'title' => array(), 'target' => array(), 'style' => array() ),
		'div' => array( 'class' => array(), 'style' => array() ),
        'ul' => array( 'class' => array() ),
		'li' => array()
		);

    $gprev = '<div style="margin-left:5px;"><ul class="giffed_checkthisout">';
    $gprev .= '<li><span class="dashicons dashicons-arrow-right"></span><a href="https://ghozy.link/2y9lp" target="_blank">Masonry Gallery</a></li>';
    $gprev .= '<li><span class="dashicons dashicons-arrow-right"></span><a href="https://ghozy.link/oigvk" target="_blank">Flat Gallery</a></li>';
    $gprev .= '<li><span class="dashicons dashicons-arrow-right"></span><a href="https://ghozy.link/sg4rl" target="_blank">Thumbnails Style</a></li>';
    $gprev .= '<li><span class="dashicons dashicons-arrow-right"></span><a href="https://ghozy.link/pholr" target="_blank">Custom Style</a></li>';
    $gprev .= '</ul></div>';

    echo wp_kses( $gprev, $gifeed_allowedtags );
    
}

/*-------------------------------------------------------------------------------*/
/*   CHECK BROWSER VERSION ( IE ONLY )
/*-------------------------------------------------------------------------------*/
function gifeed_check_browser_version_admin( $sid )
{

    if ( is_admin() && get_post_type( $sid ) == 'ginstagramfeed' ) {

        preg_match( '/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches );

        if ( count( $matches ) > 1 ) {
            $version = explode( '.', $matches[1] );

            switch ( true ) {
                case ( $version[0] <= '8' ):
                    $msg = 'ie8';

                    break;

                case ( $version[0] > '8' ):
                    $msg = 'gah';

                    break;

                default:
            }

            return $msg;
        } else {
            $msg = 'notie';

            return $msg;
        }

    }

}

/*-------------------------------------------------------------------------------*/
/*   Generate Number on Loop
/*-------------------------------------------------------------------------------*/
function gifeed_generate_number( $from = null, $to = null )
{

    $num = range( $from, $to );
    $res = array_combine( $num, $num );

    return $res;

}

/*-------------------------------------------------------------------------------*/
/*   AJAX Update User Info
/*-------------------------------------------------------------------------------*/
function gifeed_ajax_update_user_info()
{

// run a quick security check
    if ( ! check_ajax_referer( 'fil_instagram_at_nonce', 'security' ) ) {
        return;
    }

    $options = get_option( 'ghozylab_instagram_feed_options' );

    if ( isset( $_POST['userPic'] ) ) {

        $options['users'][$_POST['userPic']['uid']]['profile_picture'] = esc_url( $_POST['userPic']['pic'] );

        update_option( 'ghozylab_instagram_feed_options', $options );

        echo json_encode( array( 'status' => 'updated' ) );
        wp_die();

    }

}

add_action( 'wp_ajax_gifeed_ajax_update_user_info', 'gifeed_ajax_update_user_info' );

/*-------------------------------------------------------------------------------*/
/*   AJAX Access Token
/*-------------------------------------------------------------------------------*/
function gifeed_ajax_access_token()
{

// run a quick security check
    if ( ! check_ajax_referer( 'fil_instagram_at_nonce', 'security' ) ) {
        return;
    }

    $options = get_option( 'ghozylab_instagram_feed_options' );

    if ( $_POST['task'] == 'add' ) {

        if ( ! isset( $options['users'] ) ) {
            $options['users'] = array();
        }

        if ( array_key_exists( $_POST['user_data']['id'], $options['users'] ) ) {
            echo json_encode( array( 'error' => __( 'Access Token / Instagram user is already in the list. Please use another account.<br><br>NOTE: If you want to generate access_token from another Instagram account please make sure to logout first from your current account.<br><br>Select the following options to continue:', 'feed-instagram-lite' ) ) );
            wp_die();

        }

        $options['users'][$_POST['user_data']['id']] = gifeed_sanitize_text_or_array_field( $_POST['user_data'] );

        update_option( 'ghozylab_instagram_feed_options', $options );

        echo json_encode( array( 'ok' => '<div data-token-id="'.esc_attr( $_POST['user_data']['id'] ).'" class="fil_each_token"><div class="fil_token_pp"><img class="fil_pp_img" src="'.esc_attr( $_POST['user_data']['profile_picture'] ).'"><span class="fil_user_img_picker button">Set Image</span></div><div class="fil_token_details"><span class="fil_token_dtl fil_token_usr">'.esc_html( $_POST['user_data']['username'] ).'</span><span class="fil_token_dtl fil_token_token">'.esc_html( substr( $_POST['user_data']['access_token'], 0, 48 ).'...' ).'</span><span class="fil_token_dtl fil_token_delete dashicons dashicons-trash"></span></div></div>' ) );

        wp_die();

    }

    if ( $_POST['task'] == 'remove' ) {

        unset( $options['users'][$_POST['token_id']] );

        update_option( 'ghozylab_instagram_feed_options', $options );

        echo 'deleted';

        wp_die();

    }

}

add_action( 'wp_ajax_gifeed_ajax_access_token', 'gifeed_ajax_access_token' );

/**
 * Recursive sanitation for text or array
 *
 * @param $array_or_string (array|string)
 * @since  0.1
 * @return mixed
 */
function gifeed_sanitize_text_or_array_field( $array_or_string )
{
    if ( is_string( $array_or_string ) ) {
        $array_or_string = sanitize_text_field( $array_or_string );
    } elseif ( is_array( $array_or_string ) ) {
        foreach ( $array_or_string as $key => &$value ) {
            if ( is_array( $value ) ) {
                $value = gifeed_sanitize_text_or_array_field( $value );
            } else {
                $value = sanitize_text_field( $value );
            }

        }

    }

    return $array_or_string;
}

/*-------------------------------------------------------------------------------*/
/*   Get Feed List
/*-------------------------------------------------------------------------------*/

function gifeed_get_list_of_feeds()
{

    $args = array(
        'post_type'      => 'ginstagramfeed',
        'order'          => 'ASC',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    );

    $gt = get_posts( $args );

    $feeds = array();

    if ( $gt ) {

        foreach ( $gt as $ce ) {
            $feeds[] = array( 'id' => ''.$ce->ID.'', 'name' => $ce->post_title );
        }

    }

    return $feeds;

}

/*-------------------------------------------------------------------------------*/
/*   AJAX Update Settings
/*-------------------------------------------------------------------------------*/
function gifeed_ajax_update_settings()
{

// run a quick security check
    if ( ! check_ajax_referer( $_POST['cmd'][0], 'security' ) ) {
        return;
    }

    $options                   = get_option( 'ghozylab_instagram_feed_options' );
    $options[$_POST['cmd'][0]] = sanitize_text_field( $_POST['cmd'][1] );

    update_option( 'ghozylab_instagram_feed_options', $options );

    echo '1';
    wp_die();

}

add_action( 'wp_ajax_gifeed_ajax_update_settings', 'gifeed_ajax_update_settings' );

/*-------------------------------------------------------------------------------*/
/*   GENERATE SHARE BUTTONS
/*-------------------------------------------------------------------------------*/
function gfeed_share()
{
    ?>
<div style="position:relative; margin-top:6px;">
<ul class='easycform-social' id='easycform-cssanime'>
<li class='easycform-facebook'>
<a onclick="window.open('https://www.facebook.com/sharer.php?s=100&amp;p[title]=Check out the Best Instagram Feed Wordpress Plugin&amp;p[summary]=Best Instagram Feed Wordpress Plugin is powerful plugin to create Instagram gallery just in minutes&amp;p[url]=https://demo.ghozylab.com/plugins/instagram-feed-plugin/&amp;p[images][0]=<?php echo IFLITE_URL.'/inc/frontend/img/instagram-feed-pro.png'; ?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)" title="Share"><strong>Facebook</strong></a>
</li>
<li class='easycform-twitter'>
<a onclick="window.open('https://twitter.com/share?text=Best Wordpress Instagram Feed Plugin &url=https://demo.ghozylab.com/plugins/instagram-feed-plugin/', 'sharer', 'toolbar=0,status=0,width=548,height=325');" title="Twitter" class="circle"><strong>Twitter</strong></a>
</li>
<li class='easycform-googleplus'>
<a onclick="window.open('https://plus.google.com/share?url=https://demo.ghozylab.com/plugins/instagram-feed-plugin/','','width=415,height=450');"><strong>Google+</strong></a>
</li>
<li class='easycform-pinterest'>
<a onclick="window.open('https://pinterest.com/pin/create/button/?url=https://demo.ghozylab.com/plugins/instagram-feed-plugin/;media=<?php echo IFLITE_URL.'/inc/frontend/img/instagram-feed-pro.png'; ?>;description=Best Instagram Feed Wordpress Plugin','','width=600,height=300');"><strong>Pinterest</strong></a>
</li>
</ul>
</div>

    <?php
}

/*-------------------------------------------------------------------------------*/
/*  Convert Token to Username
/*-------------------------------------------------------------------------------*/
function gifeed_id_to_username( $id )
{

    $id = trim( $id );

    $options = get_option( 'ghozylab_instagram_feed_options' );

    if ( array_key_exists( $id, ( isset( $options['users'] ) ? $options['users'] : array() ) ) ) {

        return ( isset( $options['users'][$id]['username'] ) ? $options['users'][$id]['username'] : $options['users'][$id]['id'] );

    }

}

function gifeed_get_oauth_link( $custom_redirect_uri = false )
{

    if ( $custom_redirect_uri ) {
        $redirect_uri = $custom_redirect_uri;
    } else {
        $redirect_uri = admin_url( 'edit.php?post_type=ginstagramfeed&page=ghozylab-instagram-settings' );
    }

    return esc_url( add_query_arg( array(
        'client_id'     => IFLITE_CLIENT_ID,
        'scope'         => 'instagram_business_basic',
        'redirect_uri'  => rawurlencode( 'https://api.ghozylab.com/oauth/instagram/' ),
        'state'         => base64_encode( $redirect_uri ),
        'response_type' => 'code',
    ), 'https://instagram.com/oauth/authorize/' ) );

}