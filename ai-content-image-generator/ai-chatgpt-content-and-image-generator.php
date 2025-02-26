<?php
/*
Plugin Name: AI ChatGPT Content And Image Generator
Description: It is designed to help users save time and increase their productivity by generating high-quality, unique content in a matter of seconds. The AI ChatGPT Content And Image Generator is trained on a large corpus of text and uses machine learning algorithms to generate content that is coherent, grammatically correct, and semantically meaningful. One of the key features of AI ChatGPT Content And Image Generator is its writing assistant capabilities. AI ChatGPT Content And Image Generator is a powerful tool for businesses, content creators, and marketers who need to generate large amounts of written content quickly and efficiently. With its ability to generate articles, blog posts, product descriptions, and other types of content, AI ChatGPT Content And Image Generator can help users save time and resources, while still delivering high-quality, engaging content that their audience will love.
Create new engaging content for blog readers or simply spice up older posts with new AI-generated content. The choice is yours!
This plugin can create realistic images and art from natural language descriptions from the WordPress admin panel With this plugin, your editors in a couple of clicks will get a unique image for your articles, which can be immediately added to the WordPress media library. The uniqueness of the images on the site has a positive impact on SEO optimization.
Version: 1.0.2
Author: webdzier
Author URI: https://webdzier.com/
Text Domain: ai-chatgpt-content-and-image-generator
Requires PHP: 5.6
*/


// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
    define( 'OPAIGPT_PATH', plugin_dir_path( __FILE__ ) ); // Plugin dir
    define( 'OPAIGPT_URL', plugin_dir_url( __FILE__ ) ); // plugin url

/**
 * Check WP plugin is active
 *
 * @package AI ChatGPT Content And Image Generator
 * 
*/

add_action( 'plugins_loaded', 'opaigpt_loaded' );

function opaigpt_loaded()
{
   if ( current_user_can( 'administrator' ) )
   {
    add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'opaigpt_add_action_links' );

    function opaigpt_add_action_links( $opaigptactions ){

        $opaigptlinks = array(
          '<a href="' . admin_url( 'admin.php?page=opaigpt-settings' ) . '">Settings</a>',
      );
        $opaigptactions = array_merge( $opaigptactions, $opaigptlinks );
        return $opaigptactions;
    }
    // enqueue style
    require( OPAIGPT_PATH.'inc/enqueue.php' );

    // page editor
    require( OPAIGPT_PATH.'/inc/editor/class/class-webdzier-page-editor.php' );

     // add menu
    add_action('admin_menu', 'opaigpt_admin_add_page');

    function opaigpt_admin_add_page() {

        // main menu
        global $opaigpt_options_page;
        $opaigpt_options_page = add_menu_page( 'AI ChatGPT Content And Image Generator ', 'AI ChatGPT Content And Image Generator','manage_options', 'opaigpt-settings', false, OPAIGPT_URL.'/assets/img/menu-icon/main-menu.png');

        // Submenu Item Api Keys
        add_submenu_page( 'opaigpt-settings', 'API Settings', 'API Settings','manage_options', 'opaigpt-settings', 'opaigpt_submenu_api_key' );

        // Submenu Item Generate Content
        add_submenu_page( 'opaigpt-settings', 'Generate Content', 'Generate Content', 'manage_options', 'generator-content', 'opaigpt_submenu_generate_content' );

        // Submenu Item Generate Image
        add_submenu_page( 'opaigpt-settings', 'Generate Image', 'Generate Image', 'manage_options', 'generator-image', 'opaigpt_submenu_generate_image' );

           // Submenu Item Generate Chat
        add_submenu_page( 'opaigpt-settings', 'Generate Chat', 'Generate Chat', 'manage_options', 'generator-chat', 'opaigpt_submenu_generate_chat' );

         // Submenu Item Help
        add_submenu_page( 'opaigpt-settings', 'Help', 'Help', 'manage_options', 'opaigpt-help', 'opaigpt_submenu_help' );

        // Submenu Item Support
        add_submenu_page( 'opaigpt-settings', 'Support', 'Support', 'manage_options', 'opaigpt-support', 'opaigpt_submenu_support' );


        add_action("load-$opaigpt_options_page", 'opaigpt_plugin_help_tabs');
    }
    require( OPAIGPT_PATH.'inc/api-help-tab/api-help-tab.php' );

     // Submenu Item Api Keys callback
    function opaigpt_submenu_api_key(){

        require( OPAIGPT_PATH.'inc/menu-page/api-key.php' );
    } 
    // Submenu Item Generate Content callback
    function opaigpt_submenu_generate_content(){ 

     require( OPAIGPT_PATH.'/inc/menu-page/content-generate.php' );
 }
   // Submenu Item Generate Image callback
 function opaigpt_submenu_generate_image(){

    require( OPAIGPT_PATH.'/inc/menu-page/generate-image.php' );
}
// Submenu Item Generate Chat callback
function opaigpt_submenu_generate_chat(){

    require( OPAIGPT_PATH.'/inc/menu-page/generate-chat.php' );
}
// Submenu Item Help callback
function opaigpt_submenu_help(){

    require( OPAIGPT_PATH.'/inc/menu-page/chatgpt-help.php' );
} 
// Submenu Item Support callback
function opaigpt_submenu_support(){

 require( OPAIGPT_PATH.'/inc/menu-page/chatgpt-support.php' );
} 
}
}
function opaigpt_ajaxurl_cdata_to_front(){ 
    ?>
    <script type="text/javascript"> //<![CDATA[
    ajaxurl = '<?php echo esc_js( admin_url( 'admin-ajax.php') ) ?>';
    //]]> </script>
    <?php 
}
add_action( 'wp_head', 'opaigpt_ajaxurl_cdata_to_front', 1 );

add_action( 'wp_ajax_opaicontent', 'opaigpt_my_ajax_openai' );
function opaigpt_my_ajax_openai() {

// fetch opaigpt settings
  $model_value               = get_option( 'existing_api_model', 'text-davinci-003');
  $temperature_value         = get_option( 'existing_temperature', 0.9);
  $max_tokens_value          = get_option( 'existing_max_tokens', 2048);
  $frequency_penalty_value   = get_option( 'existing_frequency_penalty', 0);
  $presence_penalty_value    = get_option( 'existing_presence_penalty', 0.6);
  $api_n_value               = get_option( 'existing_api_n', 1);

   // fetch token
  $token = get_option( 'api_script_key' );
  $getinput = sanitize_text_field( $_POST['getinput'] );


  $mess = $getinput;
  $send_json = json_encode([
    'model' => $model_value,
    'prompt' => $mess,
    'temperature' => floatval($temperature_value),
    'max_tokens' => intval($max_tokens_value),
    'frequency_penalty' => floatval($frequency_penalty_value),
    'presence_penalty' => floatval($presence_penalty_value),
    'n'=>intval($api_n_value)
]);


  $api_call = wp_remote_post(
    'https://api.openai.com/v1/completions',
    array(
        'headers' => array(
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ),
        'body'        => $send_json,
        'method'      => 'POST',
        'data_format' => 'body',
        'timeout'     => 999,
    )
); 
  wp_send_json($api_call);

  wp_die();
}
 // image generator
function opaigpt_ajaxurl_image(){ 
    ?>
    <script type="text/javascript"> //<![CDATA[
    ajaxurl = '<?php echo esc_js( admin_url( 'admin-ajax.php') ) ?>';
    //]]> </script>
    <?php 
}
add_action( 'wp_head', 'opaigpt_ajaxurl_image', 2 );

add_action( 'wp_ajax_opimg', 'opaigpt_my_ajax_openai_image' );
function opaigpt_my_ajax_openai_image() {

  // fetch opaigpt settings
  $img_size_get      = get_option( 'existing_img_size', '1024x1024');
  $num_images_get    = get_option( 'existing_num_images', 6);

   // fetch token
  $token = get_option( 'api_script_key' );
  $imagegetinput = sanitize_text_field( $_POST['imagegetinput'] );

  $mess = $imagegetinput;
  $send_json = json_encode([
    'prompt'=> $mess,
    'n'=> intval($num_images_get),
    'size'=> $img_size_get
]);

  $api_call = wp_remote_post(
    'https://api.openai.com/v1/images/generations',
    array(
        'headers' => array(
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ),
        'body'        => $send_json,
        'method'      => 'POST',
        'data_format' => 'body',
        'timeout'     => 999,
    )
); 
  $data = array('title'=>$mess,'value'=> $api_call);
  wp_send_json($data);

  wp_die();
}

// save image media
add_action('wp_ajax_opai_save_image_media','opaigpt_save_image_media');

function opaigpt_save_image_media()
{
    $opaigpt_result = array('status' => 'error', 'msg' => 'Something went wrong');
    if(
        isset($_POST['image_url'])
        && !empty($_POST['image_url'])
    ){
        $url = sanitize_url($_POST['image_url']);
        $image_title = isset($_POST['image_title']) && !empty($_POST['image_title']) ? sanitize_text_field($_POST['image_title']) : '';
        $image_alt = isset($_POST['image_alt']) && !empty($_POST['image_alt']) ? sanitize_text_field($_POST['image_alt']) : '';
        $image_caption = isset($_POST['image_caption']) && !empty($_POST['image_caption']) ? sanitize_text_field($_POST['image_caption']) : '';
        $image_description = isset($_POST['image_description']) && !empty($_POST['image_description']) ? sanitize_text_field($_POST['image_description']) : '';
        $opaigpt_image_attachment_id = opaigpt_save_image($url, $image_title);
        if($opaigpt_image_attachment_id){
            wp_update_post(array(
                'ID' => $opaigpt_image_attachment_id,
                'post_content' => $image_description,
                'post_excerpt' => $image_caption
            ));
            update_post_meta($opaigpt_image_attachment_id,'_wp_attachment_image_alt', $image_alt);
            $opaigpt_result['status'] = esc_html__('success','ai-chatgpt-content-and-image-generator');
        }
        else{
            $opaigpt_result['msg']  = esc_html__('Can not save image to media library.','ai-chatgpt-content-and-image-generator');
        }
    }
    wp_send_json($opaigpt_result);
}

function opaigpt_save_image($imageurl, $opaigpt_title = '')
{
    global $wpdb;
    $result = false;
    if(!function_exists('wp_generate_attachment_metadata')){
        include_once( ABSPATH . 'wp-admin/includes/image.php' );
    }
    if(!function_exists('download_url')){
        include_once( ABSPATH . 'wp-admin/includes/file.php' );
    }
    if(!function_exists('media_handle_sideload')){
        include_once( ABSPATH . 'wp-admin/includes/media.php' );
    }
    try {
        $array = explode('/', getimagesize($imageurl)['mime']);
        $imagetype = end($array);
        $uniq_name = md5($imageurl);
        $filename = $uniq_name . '.' . $imagetype;
        $checkExist = $wpdb->get_row("SELECT * FROM {$wpdb->postmeta} WHERE meta_value LIKE '%/$filename'");
        if($checkExist){
            $result = $checkExist->post_id;
        }
        else{
            $tmp = download_url($imageurl);
            if ( is_wp_error( $tmp ) ) return false;
            $args = array(
                'name' => $filename,
                'tmp_name' => $tmp,
            );
            $attachment_id = media_handle_sideload( $args, 0, '',array(
                'post_title'     => $opaigpt_title,
                'post_content'   => $opaigpt_title,
                'post_excerpt'   => $opaigpt_title
            ));
            update_post_meta($attachment_id,'_wp_attachment_image_alt', $opaigpt_title);
            if(!is_wp_error($attachment_id)){
                $imagenew = get_post( $attachment_id );
                $fullsizepath = get_attached_file( $imagenew->ID );
                $attach_data = wp_generate_attachment_metadata( $attachment_id, $fullsizepath );
                wp_update_attachment_metadata( $attachment_id, $attach_data );
                $result = $attachment_id;
            }
        }
    }
    catch (\Exception $exception){

    }
    return $result;
}
 // Generate Chat
function opaigpt_chat_ajaxurl_cdata_to_front(){ 
    ?>
    <script type="text/javascript"> //<![CDATA[
    ajaxurl = '<?php echo esc_js( admin_url( 'admin-ajax.php') ) ?>';
    //]]> </script>
    <?php 
}
add_action( 'wp_head', 'opaigpt_chat_ajaxurl_cdata_to_front', 1 );

add_action( 'wp_ajax_opaichat', 'opaigpt_my_ajax_openaichat' );
function opaigpt_my_ajax_openaichat() {

// fetch opaigpt settings
  $model_value               = get_option( 'existing_api_model', 'text-davinci-003');
  $temperature_value         = get_option( 'existing_temperature', 0.9);
  $max_tokens_value          = get_option( 'existing_max_tokens', 2048);
  $frequency_penalty_value   = get_option( 'existing_frequency_penalty', 0);
  $presence_penalty_value    = get_option( 'existing_presence_penalty', 0.6);
  $api_n_value               = get_option( 'existing_api_n', 1);
  $language_existing         = get_option('api_opaigpt_language','English');

  // fetch token
  $token   = get_option( 'api_script_key' );
  $getchat = sanitize_text_field( $_POST['getchat'] );
  
  $chatmess = $getchat;
  $chatsend_json = json_encode([
    'model' => $model_value,
    "prompt" => "".$language_existing.":/n/n ".$chatmess."\n\nHuman: ?\nAI:",
    'temperature' => floatval($temperature_value),
    'max_tokens' => intval($max_tokens_value),
    'frequency_penalty' => floatval($frequency_penalty_value),
    'presence_penalty' => floatval($presence_penalty_value),
    'n'              =>   intval($api_n_value),
    "stop" => ["Human:", "AI:"]
]);

  $chatapi_call = wp_remote_post(
    'https://api.openai.com/v1/completions',
    array(
        'headers' => array(
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ),
        'body'        => $chatsend_json,
        'method'      => 'POST',
        'data_format' => 'body',
        'timeout'     => 999,
    )
); 
  wp_send_json($chatapi_call);

  wp_die();
}

