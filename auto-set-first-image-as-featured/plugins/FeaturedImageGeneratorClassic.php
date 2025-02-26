<?php
/*
Plugin URI: https://wordpress.org/plugins/auto-set-first-image-as-featured/
Author: BehroozDante
Author URI: https://BehroozDante.ir/
Email: behroozdante@gmail.com
*/
if (!defined( 'ABSPATH' ) ) {
exit;
}
?>
<?php

add_theme_support('post-thumbnails');
 
add_filter( 'admin_post_thumbnail_html', 'thumbnail_url_field' );

add_action( 'save_post', 'thumbnail_url_field_save', 10, 2 );

add_filter( 'post_thumbnail_html', 'thumbnail_external_replace', 10, PHP_INT_MAX );

function url_is_image( $url ) {
    global $post;
    if ( ! filter_var( $url, FILTER_VALIDATE_URL ) ) {
    $last_error_msg = __("404: first/custom image URL is not valid, try to set featured image manually or use another custom URL.", 'DanteFunctionTextDoamin');
    update_option( 'is_DanteFunction_IsName_OptionLastErrorFirstFeaturedImagede_Error_404', $last_error_msg );
        return;
    }
    $header_response = get_headers($url, 1);
    if ( strpos( $header_response[0], "404" ) !== false ){
    $last_error_msg = __("404: first/custom image URL is not valid, try to set featured image manually or use another custom URL.", 'DanteFunctionTextDoamin');
    update_option( 'is_DanteFunction_IsName_OptionLastErrorFirstFeaturedImagede_Error_404', $last_error_msg );
    return;
    }
    $ext = array( 'jpeg', 'jpg', 'gif', 'png' );
    $info = (array) pathinfo( parse_url( $url, PHP_URL_PATH ) );
    return isset( $info['extension'] ) && in_array( strtolower( $info['extension'] ), $ext, TRUE );
}


function thumbnail_url_field( $html ) {
    global $post;
    $value = get_post_meta( $post->ID, '_thumbnail_ext_url', TRUE ) ? : "";
    $_thumbnail_id = get_post_meta( $post->ID, '_thumbnail_id', TRUE ) ? : "";
    $nonce = wp_create_nonce( 'thumbnail_ext_url_' . $post->ID . get_current_blog_id() );
    $html .= '<input type="hidden" name="thumbnail_ext_url_nonce" value="' . esc_attr( $nonce ) . '">';
    $html .= '<div><p style="text-align:center;font-weight: bold;">' . __('OR', 'DanteFunctionTextDoamin') . '</p>';
    $html .= '<p><input placeholder="'. __("enter url for external image", 'DanteFunctionTextDoamin') .'" id="thumbnail_url_field_cleanup" type="url" name="thumbnail_ext_url" value="' . $value . '"></p>';
    $html .= '<input type="button" id="thumbnail_url_field_cleanup_btn" value="'. __("remove current URL", 'DanteFunctionTextDoamin') .'" />';
    if ( ! empty($value) && url_is_image( $value ) ) {
        $html .= '<p><img style="width:100%;height:auto;" src="' . esc_url($value) . '"></p>';
    }

 
 
    if (get_option( 'is_DanteFunction_IsName_OptionLastErrorFirstFeaturedImagede_Error_default')){
    $html .= '<div class="IsName_OptionLastErrorFirstFeaturedImage_Error" > '. get_option( 'is_DanteFunction_IsName_OptionLastErrorFirstFeaturedImagede_Error_default') .' </div>';
    }
    if (get_option( 'is_DanteFunction_IsName_OptionLastErrorFirstFeaturedImagede_Error_404')){
    $html .= '<div class="IsName_OptionLastErrorFirstFeaturedImage_Error" > '. get_option( 'is_DanteFunction_IsName_OptionLastErrorFirstFeaturedImagede_Error_404') .' </div>';
    delete_option( 'is_DanteFunction_IsName_OptionLastErrorFirstFeaturedImagede_Error_404');
    }
    if (get_option( 'is_DanteFunction_IsName_OptionLastErrorFirstFeaturedImage_Error_Manually')){
    $html .= '<div class="IsName_OptionLastErrorFirstFeaturedImage_Error" > '. get_option( 'is_DanteFunction_IsName_OptionLastErrorFirstFeaturedImage_Error_Manually') .' </div>';
    delete_option( 'is_DanteFunction_IsName_OptionLastErrorFirstFeaturedImage_Error_Manually');
    }
    if (get_option( 'is_DanteFunction_IsName_OptionLastErrorFirstFeaturedImage_Error_CustomURL')){
    $html .= '<div class="IsName_OptionLastErrorFirstFeaturedImage_Error"> '. get_option( 'is_DanteFunction_IsName_OptionLastErrorFirstFeaturedImage_Error_CustomURL') .' </div>';
    delete_option( 'is_DanteFunction_IsName_OptionLastErrorFirstFeaturedImage_Error_CustomURL');
    }
    if (get_option( 'is_DanteFunction_IsName_OptionLastErrorFirstFeaturedImage_Error_FirstImg')){
    $html .= '<div class="IsName_OptionLastErrorFirstFeaturedImage_Error"> '. get_option( 'is_DanteFunction_IsName_OptionLastErrorFirstFeaturedImage_Error_FirstImg') .' </div>';
    delete_option( 'is_DanteFunction_IsName_OptionLastErrorFirstFeaturedImage_Error_FirstImg');
    }
    
 
    
    $html .= '<div class="noteOptionLastErrorFirstFeaturedImage">';
    
    $html .= '<p>' . __('Note 1: before do anything (change custom url, change or remove featured image and etc...), remove current URL by top button. otherwise you may dont see right notification, so you have to publish or update post again to see right notification.', 'DanteFunctionTextDoamin') . '</p>';
    
    $html .= '<p>' . __('Note 2: if sometimes this feature not worked properly, because of low memory limit or etc..., you just have to  publish or update post again to see what will happen.', 'DanteFunctionTextDoamin') . '</p>';

    $html .= '<p>' . __('Note 3: if you want switch to gutenberg editor, plugin will use another method for set first image as featured, you will not able to use custom URL on gutenberg editor.', 'DanteFunctionTextDoamin') . '</p>';

    $html .= '<p>' . __('Note 4: change gutenberg enable or disable status by this plugin, otherwise this feature will not work completely.', 'DanteFunctionTextDoamin') . '</p>';
 
    $html .= '<p>' . __('<a target="_blank" href="https://wordpress.org/support/plugin/auto-set-first-image-as-featured/reviews/">please rate us if you like this work</a>', 'DanteFunctionTextDoamin') . '</p>';
    

    $html .= '</div>';
 
    $html .= '</div>';
 
    return $html;
 
}

 
function catch_that_image($post) {
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  if(!isset($matches [1][0]) && !get_post_meta( $post, '_thumbnail_id', TRUE ) ){
    if (get_option('is_DanteFunction_IsName_OptionAutoSetFirstImageFeaturedDefaultImg') ){
    $first_img = esc_url( get_option('is_DanteFunction_IsName_OptionAutoSetFirstImageFeaturedDefaultImg') );
    }else{
    $first_img = esc_url( plugins_url( 'images/noimage.png', dirname(__FILE__) ) );
    }
    $last_error_msg = __("warning: it seem there is no image in your post content, plugin set default image for this post. if you dont want it, you can set featured image manually or set it by another external URL.", 'DanteFunctionTextDoamin');
    update_option( 'is_DanteFunction_IsName_OptionLastErrorFirstFeaturedImagede_Error_default', $last_error_msg );
  }else{
    $header_response = get_headers($matches [1][0], 1);
    if ( strpos( $header_response[0], "404" ) !== false ){
    $last_error_msg = __("404: first/custom image URL is not valid, try to set featured image manually or use another custom URL.", 'DanteFunctionTextDoamin');
    update_option( 'is_DanteFunction_IsName_OptionLastErrorFirstFeaturedImagede_Error_404', $last_error_msg );
    return;
    }else{
    delete_option( 'is_DanteFunction_IsName_OptionLastErrorFirstFeaturedImagede_Error_default');
    $first_img = $matches [1][0];
    $last_error_msg = __("featured image selected by first img.", 'DanteFunctionTextDoamin');
    update_option( 'is_DanteFunction_IsName_OptionLastErrorFirstFeaturedImage_Error_FirstImg', $last_error_msg );
    }
  }
  return $first_img;
}

function thumbnail_url_field_save( $pid, $post ) {
    
    
    delete_post_meta( $pid, '_thumbnail_ext_url' );
    
    $cap = $post->post_type === 'page' ? 'edit_page' : 'edit_post';
    if (! current_user_can( $cap, $pid ) || ! post_type_supports( $post->post_type, 'thumbnail' ) || defined( 'DOING_AUTOSAVE' ) ) {
        return;
    }
 
    $action = 'thumbnail_ext_url_' . $pid . get_current_blog_id();
    $nonce = filter_input( INPUT_POST, 'thumbnail_ext_url_nonce', FILTER_SANITIZE_STRING );
    $url = filter_input( INPUT_POST,  'thumbnail_ext_url', FILTER_VALIDATE_URL );
    if ( empty( $nonce ) || ! wp_verify_nonce( $nonce, $action ) || ( ! empty( $url ) && ! url_is_image( $url ) ) ) {
        return;
    }
    
   $_thumbnail_id = wp_get_attachment_url( get_post_thumbnail_id( $pid ) );
   if  (  !empty( $_thumbnail_id ) ) {
        delete_option( 'is_DanteFunction_IsName_OptionLastErrorFirstFeaturedImagede_Error_default');
        delete_post_meta( $pid, '_thumbnail_ext_url' );
        $last_error_msg = __("featured image selected manually.", 'DanteFunctionTextDoamin');
        update_option( 'is_DanteFunction_IsName_OptionLastErrorFirstFeaturedImage_Error_Manually', $last_error_msg );
        return;
    }
    
 
    if ( ! empty( $url ) && !get_option( 'is_DanteFunction_IsName_OptionLastErrorFirstFeaturedImagede_Error_default') ) {
        $last_error_msg = __("featured image selected by custom URL, a custom URL can be from external link or first image in the content.", 'DanteFunctionTextDoamin');
        update_option( 'is_DanteFunction_IsName_OptionLastErrorFirstFeaturedImage_Error_CustomURL', $last_error_msg );
        update_post_meta( $pid, '_thumbnail_ext_url', esc_url($url) );
        if ( ! get_post_meta( $pid, '_thumbnail_id', TRUE ) ) {
            update_post_meta( $pid, '_thumbnail_id', 'by_url' );
        }
    }else{
        update_post_meta( $pid, '_thumbnail_ext_url', esc_url(catch_that_image($post)) );
        if ( ! get_post_meta( $pid, '_thumbnail_id', TRUE ) ) {
            update_post_meta( $pid, '_thumbnail_id', 'by_url' );
        }
    }
	
}


function thumbnail_external_replace( $html, $post_id ) {
    $url =  get_post_meta( $post_id, '_thumbnail_ext_url', TRUE );
    if ( empty( $url ) || ! url_is_image( $url ) ) {
        return $html;
    }
    $alt = get_post_field( 'post_title', $post_id ) . ' ' .  __( 'thumbnail', 'DanteFunctionTextDoamin' );
    $attr = array( 'alt' => $alt );
    $attr = apply_filters( 'wp_get_attachment_image_attributes', $attr, NULL );
    $attr = array_map( 'esc_attr', $attr );
    $html = sprintf( '<img src="%s"', esc_url($url) );
    foreach ( $attr as $name => $value ) {
        $html .= " $name=" . '"' . $value . '"';
    }
    $html .= ' />';
    return $html;
}


 
?>