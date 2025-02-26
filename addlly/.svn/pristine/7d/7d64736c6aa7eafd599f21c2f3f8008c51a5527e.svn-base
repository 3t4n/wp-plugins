<?php
if (!function_exists('addlly_remote_post')) {
    function addlly_remote_post( $url = '', $args = array() ) {
        
        $args['timeout'] = 500;
        $response = wp_remote_post( $url, $args );
        if ( is_wp_error( $response ) ) {
            return array( 'error' => $response->get_error_message() );
        } else {
            $response_body = wp_remote_retrieve_body( $response );
            return (array) json_decode($response_body);
        }
    }
}

if (!function_exists('addlly_remote_get')) {
    function addlly_remote_get( $url = '', $args = array() ) {
        
        $args['timeout'] = 500;
        $response = wp_remote_get( $url, $args );
        if ( is_wp_error( $response ) ) {
            return array( 'error' => $response->get_error_message() );
        } else {
            $response_body = wp_remote_retrieve_body( $response );
            return (array) json_decode($response_body);
        }
    }
}

if (!function_exists('addlly_file_get_contents')) {
    function addlly_file_get_contents( $url = '' ) {
        
        $response = wp_remote_get( $url );
        if ( is_wp_error( $response ) ) {
            return '';
        } else {
            return wp_remote_retrieve_body( $response );
        }
    }
}

if (!function_exists('addlly_get_api_token')) {
    function addlly_get_api_token() {
        
        $data = array(
            "isGenerateToken" => true,
            "user_id"         => addlly_user_id(),
        );
        if( addlly_user_id() == 122 ){
            $data['shopify_domain'] = 'test-wordpress';
        }else{
            $data['wp_domain'] = addlly_user_web_link();
        }
        
        $args = array(
            'body' => wp_json_encode($data),
            'headers' => array(
                'Content-Type' => 'application/json'
            )
        );
        $api_response = addlly_remote_post( 'https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com/staging/user/login', $args );
        return isset($api_response['token']) ? $api_response['token'] : '';
    }
}

if (!function_exists('addlly_generate_blog_callback')) {
    add_action("wp_ajax_addlly_generate_blog", "addlly_generate_blog_callback");
    
    function addlly_generate_blog_callback() {
        
        if ( !isset($_POST['generate_one_click_blog']) || empty($_POST['generate_one_click_blog']) || ! wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['generate_one_click_blog'])), 'addlly_nonce') ){
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $topic        = isset($_POST['topic'])            ? sanitize_text_field(wp_unslash($_POST['topic']))         :  '';
        $keyword      = isset($_POST['keyword'])          ? sanitize_text_field(wp_unslash($_POST['keyword']))       :  '';
        $aiType       = isset($_POST['aiType'])           ? sanitize_text_field(wp_unslash($_POST['aiType']))        :  '';
        $geoLocation  = isset($_POST['geoLocation'])      ? sanitize_text_field(wp_unslash($_POST['geoLocation']))   :  '';
        $lang         = isset($_POST['lang'])             ? sanitize_text_field(wp_unslash($_POST['lang']))          :  '';
        
        $data = array(
            "topic"        => $topic,
            "keyword"      => $keyword,
            "user_id"      => addlly_user_id(),
            'aiType'       => $aiType,
            "geoLocation"  => strtolower($geoLocation),
            "lan"          => $lang,
        );
        
        $args = array(
            'body' => wp_json_encode($data),
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_post( 'https://sogcceedlicovvrrncunn7vqti0uecdg.lambda-url.ap-southeast-1.on.aws/', $args );
        
        if(isset($api_response['error']) && $api_response['error'] != ''){
            wp_send_json(
                array(
                    'type' => 'error',
                    'msg'  => $api_response['error']
                )
            );
        }else{
            $articleID = isset($api_response['id']) ? $api_response['id'] : 0;
            
            // Generating 1-Click Blog images
            $ai_images_response          = addlly_generate_article_ai_images($articleID);
            $articleSEOScore             = addlly_article_generate_SEOScore( 0, $articleID );
            
            // Get Article data by ID
            $article_response            = addlly_get_article_by_id(0, 'API', $articleID);
            $article_data                = isset($article_response['data']) ? $article_response['data'] : '';
            $article_html                = isset($article_data->article_html) ? $article_data->article_html : '';
            $article_status              = isset($article_data->status) ? $article_data->status : '';
            
            if(isset($article_data) && !empty($article_data)){
                // Insert Post
                $post_data                   =  array();
                $post_data['post_type']      =  'post';
                $post_data['post_title']     =  wp_strip_all_tags($topic);
                $post_data['post_content']   =  wp_kses_post(addlly_get_inner_content_from_html_string($article_html));
                $post_data['post_status']    =  'publish';
                $post_id                     =  wp_insert_post( $post_data );

                if (is_wp_error($post_id)){
                    wp_send_json(
                        array(
                            'type' => 'error',
                            'msg'  => esc_html__("Sorry! Something went wrong. Please try again.", 'addlly')
                        )
                    );
                }else{
                    $user_id               =  get_current_user_id();
                    $generated_topic       =  isset($api_response['generated_topic']) ? $api_response['generated_topic'] : '';
                    $meta_title            =  isset($api_response['meta_title']) ? $api_response['meta_title'] : '';
                    $meta_dec              =  isset($api_response['meta_dec']) ? $api_response['meta_dec'] : '';
                    $fact_checkers         =  isset($api_response['search_response']) ? json_decode($api_response['search_response'], true) : array();


                    update_post_meta($post_id, 'article_id', $api_response['id']);
                    update_post_meta($post_id, 'user_id', $user_id);
                    update_post_meta($post_id, 'topic', $topic);
                    update_post_meta($post_id, 'keyword', $keyword);
                    update_post_meta($post_id, 'aiType', $aiType);
                    update_post_meta($post_id, 'geoLocation', $geoLocation);
                    update_post_meta($post_id, 'lang', $lang);
                    update_post_meta($post_id, 'generated_topic', $generated_topic);
                    update_post_meta($post_id, 'meta_title', $meta_title);
                    update_post_meta($post_id, 'meta_dec', $meta_dec);
                    update_post_meta($post_id, 'article_status', $article_status);
                    update_post_meta($post_id, 'article_data', $article_response);
                    
                    wp_send_json(
                        array(
                            'type'         => 'success',
                            'msg'          => esc_html__('1-Click blog generated successfully.', 'addlly'),
                            'redirectURL'  => admin_url('admin.php?page=one-click&id='. $post_id)
                        )
                    );
                }
            }else{
                wp_send_json(
                    array(
                        'type'         => 'error',
                        'msg'          => esc_html__('Something went wrong. Please try again.', 'addlly'),
                    )
                );
            }
        }
    }
}

if (!function_exists('addlly_get_article_by_id_from_api')) {
    function addlly_get_article_by_id_from_api( $articleID = 0 ){
        
        $args = array(
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_get( "https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com/staging/api/articleHistory/byId/".$articleID, $args );
        $data = isset($api_response['data']) ? addlly_decodeJsonInArray($api_response['data']) : array();
        return array( 'data' => $data );
    }
}

if (!function_exists('addlly_get_article_by_id')) {
    function addlly_get_article_by_id( $postID = 0, $storage = 'DB', $articleID = 0 ){
        
        if( $storage == 'API' ){
            if( $articleID <= 0 ){
                $articleID = get_post_meta($postID, 'article_id', true);
            }
            return addlly_get_article_by_id_from_api( $articleID );
        }else{
            $article_data = get_post_meta($postID, 'article_data', true);
            if(isset($article_data['data']) && !empty($article_data['data'])){
                return $article_data;
            }else{
                if( $articleID <= 0 ){
                    $articleID = get_post_meta($postID, 'article_id', true);
                }
                return addlly_get_article_by_id_from_api( $articleID );
            }
        }
    }
}

if (!function_exists('addlly_generate_article_ai_images')) {
    function addlly_generate_article_ai_images( $article_id = 0, $articleType = '1-Click Blog' ) {
        
        $data = array(
            "articleType"      => $articleType,
        );
        $args = array(
            'body' => wp_json_encode($data),
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_post( "https://jbihde6nc53povpoikk32wnc4q0daqbg.lambda-url.ap-southeast-1.on.aws/?articleId=". $article_id, $args );
        return $api_response;
    }
}

if (!function_exists('addlly_save_article_SEOScore')) {
    function addlly_article_generate_SEOScore( $postID = 0, $articleID = 0 ){
        
        if( $articleID <= 0 ){
            $articleID = get_post_meta($postID, 'article_id', true);
        }
        $args = array(
            'body' => wp_json_encode(array()),
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_post( "https://cfbcjngplr7iqtueamg4mxju5m0zaiie.lambda-url.ap-southeast-1.on.aws/?id=". $articleID ."&articleType=short", $args );
        return $api_response;
        
    }
}

if (!function_exists('addlly_save_article_callback')) {
    add_action("wp_ajax_addlly_save_article", "addlly_save_article_callback");
    function addlly_save_article_callback() {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
    
        $tabs_arr = array(
            'article'      => 'Short Article',
            'faqSchema'    => 'FAQ and Schema Markup',
            'linkedIn'     => 'LinkedIn Post',
            'facebook'     => 'Facebook Post',
            'twitter'      => 'Twitter Post',
            'instagram'    => 'Instagram Post',
            'googleAdCopy' => 'Google Ad Copy'
        );
        
        $id             = isset($_POST['id'])      ? absint($_POST['id']) : 0;
        $type           = isset($_POST['type'])    ? sanitize_text_field(wp_unslash($_POST['type'])) : 'article';
        $content        = isset($_POST['content']) ? wp_kses_post(wp_unslash($_POST['content'])) : '';
        
        $article_id     = get_post_meta($id, 'article_id', true);
        $meta_title     = get_post_meta($id, 'meta_title', true);
        $meta_dec       = get_post_meta($id, 'meta_dec', true);
        
        $article_html = $FAQHTML = $FAQschema = $linkedInPost = $facebookPost = $twitterPost = $instagramPost = $googleAdCopy = '';
        $currentField = $type;
        if( $type == 'article' ){
            $article_html = '<!DOCTYPE html>
            <html>
                <head>
                    <title>'. $meta_title .'</title>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta name="title" content="'. $meta_title .'">
                    <meta name="description" content="'. $meta_dec .'">
                </head>
                <body>
                '. $content .'
                </body>
            </html>';
        }
        if( $type == 'faqSchema' ){
            $FAQschema  = isset($_POST['FAQschema']) ? sanitize_textarea_field(wp_unslash($_POST['FAQschema'])) : '';
            $FAQHTML    = $content;
        }
        if( $type == 'linkedIn' ){
            $linkedInPost = $content;
        }
        if( $type == 'facebook' ){
            $facebookPost = $content;
        }
        if( $type == 'twitter' ){
            $twitterPost = $content;
        }
        if( $type == 'instagram' ){
            $instagramPost = $content;
        }
        
        $data = array(
            "id"                   => $article_id,
            "currentField"         => $currentField,
            "article_html"         => $article_html,
            "article_detail_html"  => '',
            "FAQHTML"              => $FAQHTML,
            "FAQschema"            => $FAQschema,
            "googleAdCopy"         => $googleAdCopy,
            "linkedIn_post"        => $linkedInPost,
            "facebook_post"        => $facebookPost,
            "twitter_post"         => $twitterPost,
            "instagram_post"       => $instagramPost,
        );
        
        $args = array(
            'body' => wp_json_encode($data),
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_post( "https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com/staging/api/articleHistory/update", $args );
        
        if(isset($api_response['error']) && $api_response['error'] != ''){
            wp_send_json(
                array(
                    'type' => 'error',
                    'msg'  => $api_response['error']
                )
            );
        }else{
            
            $article_response     = addlly_get_article_by_id($id, 'API', $article_id);
            $article_data         = isset($article_response['data']) ? $article_response['data'] : '';
            $article_html         = isset($article_data->article_html) ? $article_data->article_html : '';
            
            update_post_meta($id, 'article_data', $article_response);
            
            if( $type == 'article' ){
                if(isset($article_html) && !empty($article_html)){
                    wp_update_post( array( 'ID' => $id, 'post_content' => wp_kses_post(addlly_get_inner_content_from_html_string($article_html)) ) );
                }
            }
            
            wp_send_json(
                array(
                    'type'         => 'success',
                    'msg'          => esc_html__('Saved successfully.', 'addlly'),
                    'redirectURL'  => admin_url('admin.php?page=one-click&id='. $id .'&tab='. $type)
                )
            );
        }
        
    }
}

if (!function_exists('addlly_regenerate_content_callback')) {
    add_action("wp_ajax_addlly_regenerate_content", "addlly_regenerate_content_callback");
    
    function addlly_regenerate_content_callback() {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $id            = isset($_POST['id'])       ? sanitize_text_field(wp_unslash($_POST['id']))          : 0;
        $type          = isset($_POST['type'])     ? sanitize_text_field(wp_unslash($_POST['type']))         : 'article';
        $feedback      = isset($_POST['feedback']) ? sanitize_textarea_field(wp_unslash($_POST['feedback'])) : '';
        $article_id    = get_post_meta($id, 'article_id', true);
        
        $tabs_arr = array(
            'article'      => 'Short Article',
            'faqSchema'    => 'FAQ and Schema Markup',
            'linkedIn'     => 'LinkedIn Post',
            'facebook'     => 'Facebook Post',
            'twitter'      => 'Twitter Post',
            'instagram'    => 'Instagram Post',
            'googleAdCopy' => 'Google Ad Copy'
        );
        
        if( $type  ==  'article' ){
            
            $data = array(
                "feedback"    => $feedback,
                "articleId"   => $article_id,
            );
            $args = array(
                'body' => wp_json_encode($data),
                'headers' => array(
                    'Authorization' => addlly_get_api_token(),
                    'Content-Type'  => 'application/json'
                )
            );
            $api_response = addlly_remote_post( "https://jquqosvafts24u4f5himklxlua0khvif.lambda-url.ap-southeast-1.on.aws/", $args );
        }
        
        if( $type  ==  'faqSchema' || $type  ==  'linkedIn' || $type  ==  'facebook' || $type  ==  'twitter' || $type  ==  'instagram' || $type  ==  'googleAdCopy' ){
            if( $type  ==  'faqSchema' ){
                $url = "https://geykspiywxmc7m5tf6kqgxpml40pmjun.lambda-url.ap-southeast-1.on.aws/?id=". $article_id;
            }
            if( $type  ==  'linkedIn' ){
                $url = "https://yogafegrxm2qjh3jrommo5zffq0htlus.lambda-url.ap-southeast-1.on.aws/?id=". $article_id .'&type=linkedIn';
            }
            if( $type  ==  'facebook' ){
                $url = "https://yogafegrxm2qjh3jrommo5zffq0htlus.lambda-url.ap-southeast-1.on.aws/?id=". $article_id .'&type=facebook';
            }
            if( $type  ==  'twitter' ){
                $url = "https://yogafegrxm2qjh3jrommo5zffq0htlus.lambda-url.ap-southeast-1.on.aws/?id=". $article_id .'&type=twitter';
            }
            if( $type  ==  'instagram' ){
                $url = "https://yogafegrxm2qjh3jrommo5zffq0htlus.lambda-url.ap-southeast-1.on.aws/?id=". $article_id .'&type=instagram';
            }
            if( $type  ==  'googleAdCopy' ){
                $url = "https://ivypyewc4nadrtgh75pmaxxbyu0jzvww.lambda-url.ap-southeast-1.on.aws/?id=". $article_id;
            }
            
            $args = array(
                'body' => wp_json_encode(array()),
                'headers' => array(
                    'Authorization' => addlly_get_api_token(),
                    'Content-Type'  => 'application/json'
                )
            );
            $api_response = addlly_remote_post( $url, $args );
        }
        
        if(isset($api_response['error']) && $api_response['error'] != ''){
            wp_send_json(
                array(
                    'type' => 'error',
                    'msg'  => $api_response['error']
                )
            );
        }else{
            
            addlly_article_generate_SEOScore( 0, $article_id );
            
            if( 1 == 2 ){
                $sub_type = isset($tabs_arr[$type]) ? $tabs_arr[$type] : '';
                $history  = addlly_get_version_history( $article_id, $sub_type );
                update_post_meta($id, $type.'VersionHistory', $history);
            }
            
            $article_response     = addlly_get_article_by_id($id, 'API', $article_id);
            $article_data         = isset($article_response['data']) ? $article_response['data'] : '';
            $article_html         = isset($article_data->article_html) ? $article_data->article_html : '';
            
            update_post_meta($id, 'article_data', $article_response);
            if( $type == 'article' ){
                if(isset($article_html) && !empty($article_html)){
                    wp_update_post( array( 'ID' => $id, 'post_content' => wp_kses_post(addlly_get_inner_content_from_html_string($article_html)) ) );
                }
            }
            
            wp_send_json(
                array(
                    'type'         => 'success',
                    'msg'          => esc_html__('Generated successfully.', 'addlly'),
                    'redirectURL'  => admin_url('admin.php?page=one-click&id='. $id.'&tab='. $type)
                )
            );
        }
    }
}

if (!function_exists('addlly_generate_faqschema_callback')) {
    add_action("wp_ajax_addlly_generate_faqschema", "addlly_generate_faqschema_callback");
    
    function addlly_generate_faqschema_callback() {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $id            = isset($_POST['id']) ? absint($_POST['id']) : 0;
        $article_id    = get_post_meta($id, 'article_id', true);
        
        $args = array(
            'body' => wp_json_encode(array()),
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_post( "https://geykspiywxmc7m5tf6kqgxpml40pmjun.lambda-url.ap-southeast-1.on.aws/?id=". $article_id, $args );
        
        if(isset($api_response['error']) && $api_response['error'] != ''){
            wp_send_json(
                array(
                    'type' => 'error',
                    'msg'  => $api_response['error']
                )
            );
        }else{
            
            $article_response     = addlly_get_article_by_id($id, 'API', $article_id);
            update_post_meta($id, 'article_data', $article_response);
            
            wp_send_json(
                array(
                    'type'         => 'success',
                    'msg'          => esc_html__('FAQ schema generated successfully.', 'addlly'),
                    'redirectURL'  => admin_url('admin.php?page=one-click&id='. $id.'&tab=faqSchema')
                )
            );
        }
    }
}

if (!function_exists('addlly_generate_googleAdCopy_callback')) {
    add_action("wp_ajax_addlly_generate_googleAdCopy", "addlly_generate_googleAdCopy_callback");
    
    function addlly_generate_googleAdCopy_callback() {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $id            = isset($_POST['id']) ? absint($_POST['id']) : 0;
        $article_id    = get_post_meta($id, 'article_id', true);
        
        $args = array(
            'body' => wp_json_encode(array()),
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_post( "https://ivypyewc4nadrtgh75pmaxxbyu0jzvww.lambda-url.ap-southeast-1.on.aws/?id=". $article_id, $args );
        
        if(isset($api_response['error']) && $api_response['error'] != ''){
            wp_send_json(
                array(
                    'type' => 'error',
                    'msg'  => $api_response['error']
                )
            );
        }else{
            
            $article_response     = addlly_get_article_by_id($id, 'API', $article_id);
            update_post_meta($id, 'article_data', $article_response);
            
            wp_send_json(
                array(
                    'type'         => 'success',
                    'msg'          => esc_html__('Google Ad Copy generated successfully.', 'addlly'),
                    'redirectURL'  => admin_url('admin.php?page=one-click&id='. $id.'&tab=googleAdCopy')
                )
            );
        }
    }
}

if (!function_exists('addlly_generate_socialContent_callback')) {
    add_action("wp_ajax_addlly_generate_socialContent", "addlly_generate_socialContent_callback");
    
    function addlly_generate_socialContent_callback() {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $id            = isset($_POST['id'])   ? absint($_POST['id'])   : 0;
        $type          = isset($_POST['type']) ? sanitize_text_field(wp_unslash($_POST['type'])) : 'linkedIn';
        $article_id    = get_post_meta($id, 'article_id', true);
        
        $args = array(
            'body' => wp_json_encode(array()),
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_post( "https://yogafegrxm2qjh3jrommo5zffq0htlus.lambda-url.ap-southeast-1.on.aws/?id=". $article_id ."&type=". $type, $args );
        
        if(isset($api_response['error']) && $api_response['error'] != ''){
            wp_send_json(
                array(
                    'type' => 'error',
                    'msg'  => $api_response['error']
                )
            );
        }else{
            
            $article_response     = addlly_get_article_by_id($id, 'API', $article_id);
            update_post_meta($id, 'article_data', $article_response);
            
            wp_send_json(
                array(
                    'type'         => 'success',
                    'msg'          => $type . esc_html__(' content generated successfully.', 'addlly'),
                    'redirectURL'  => admin_url('admin.php?page=one-click&id='. $id.'&tab='. $type)
                )
            );
        }
    }
}

if (!function_exists('addlly_generate_hashtags_callback')) {
    add_action("wp_ajax_addlly_generate_hashtags", "addlly_generate_hashtags_callback");
    
    function addlly_generate_hashtags_callback() {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $id            = isset($_POST['id'])   ? absint($_POST['id']) : 0;
        $type          = isset($_POST['type']) ? sanitize_text_field(wp_unslash($_POST['type'])) : 'linkedIn';
        $article_id    = get_post_meta($id, 'article_id', true);
        
        $args = array(
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_get( "https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com/staging/api/chatGPT/generate-popularHashtags/". $article_id, $args );
        
        if(isset($api_response['error']) && $api_response['error'] != ''){
            wp_send_json(
                array(
                    'type' => 'error',
                    'msg'  => $api_response['error']
                )
            );
        }else{
            
            $article_response     = addlly_get_article_by_id($id, 'API', $article_id);
            update_post_meta($id, 'article_data', $article_response);
            
            wp_send_json(
                array(
                    'type'         => 'success',
                    'msg'          => esc_html__('Hashtags generated successfully.', 'addlly'),
                    'redirectURL'  => admin_url('admin.php?page=one-click&id='. $id.'&tab='. $type)
                )
            );
        }
    }
}

if (!function_exists('addlly_get_version_history')) {
    function addlly_get_version_history( $article_id = 0, $sub_type = '', $type = '1-Click Blog' ) {
        
        $data = array(
            "articleId"       => $article_id,
            "type"            => $type,
            "subType"         => $sub_type,
            "isVersionList"   => 'true',
        );

        $args = array(
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_get( "https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com/staging/api/previous-generated-content/list/". addlly_user_id() ."?". http_build_query($data), $args );
        return $api_response;
    }
}

if (!function_exists('addlly_train_article_callback')) {
    add_action("wp_ajax_addlly_train_article", "addlly_train_article_callback");
    
    function addlly_train_article_callback() {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $id             = isset($_POST['id'])   ? absint($_POST['id']) : 0;
        $type           = isset($_POST['type']) ? sanitize_text_field(wp_unslash($_POST['type'])) : '';
        $view           = isset($_POST['view']) ? sanitize_text_field(wp_unslash($_POST['view'])) : '';
        $article_id     = get_post_meta($id, 'article_id', true);
        
        $data = array(
            "type"          => $type,
            "userId"        => addlly_user_id(),
            "articleType"   => '1-Click Blog',
        );
        
        $args = array(
            'body' => wp_json_encode($data),
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_post( "https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com/staging/api/articleHistory/train-or-untrained/". $article_id, $args );
        
        if(isset($api_response['error']) && $api_response['error'] != ''){
            wp_send_json(
                array(
                    'type' => 'error',
                    'msg'  => $api_response['error']
                )
            );
        }else{
            
            if( $type == 'train' ){
                update_post_meta($id, 'istrainArticle', 1);
            }else{
                update_post_meta($id, 'istrainArticle', 0);
            }
            
            $redirectURL = admin_url('admin.php?page=one-click&id='. $id .'&tab=article');
            $msg         = 'Article '. $type .' successfully.';
            if( $view == 'list' ){
                $redirectURL = admin_url('admin.php?page=one-click');
                if( $type == 'train' ){
                    $msg         = 'Article Trained successfully.';
                }else{
                    $msg         = 'Article UnTrained successfully.'; 
                }
            }
            
            wp_send_json(
                array(
                    'type'         => 'success',
                    'msg'          => $msg,
                    'redirectURL'  => $redirectURL
                )
            );
        }
    }
}

if (!function_exists('addlly_get_img_base64_callback')) {
    add_action("wp_ajax_addlly_get_img_base64", "addlly_get_img_base64_callback");
    function addlly_get_img_base64_callback() {
        
        if(!isset($_GET['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_GET['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $url = isset($_GET['url']) ? sanitize_url(wp_unslash($_GET['url'])) : '';
        echo 'data:image/png;base64, '. wp_kses_post(base64_encode(addlly_file_get_contents($url)));
        wp_die();
        
    }
}

if (!function_exists('addlly_auto_citation_callback')) {
    add_action("wp_ajax_addlly_auto_citation", "addlly_auto_citation_callback");
    
    function addlly_auto_citation_callback() {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $id             = isset($_POST['id'])   ? absint($_POST['id']) : 0;
        $type           = isset($_POST['type']) ? sanitize_text_field(wp_unslash($_POST['type'])) : '';
        $article_id     = get_post_meta($id, 'article_id', true);
        
        $data = array(
            "userId"      => addlly_user_id(),
            "articleId"   => $article_id,
        );
        
        $args = array(
            'body' => wp_json_encode($data),
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_post( "https://ttviaojrt7rszumm3pzigulwxm0shzxm.lambda-url.ap-southeast-1.on.aws/", $args );
        
        if(isset($api_response['error']) && $api_response['error'] != ''){
            wp_send_json(
                array(
                    'type' => 'error',
                    'msg'  => $api_response['error']
                )
            );
        }else{
            $api_response = isset($api_response[0]) ? json_decode($api_response[0], true) : array();
            update_post_meta($id, 'citationContent', $api_response);
            
            wp_send_json(
                array(
                    'type'         => 'success',
                    'msg'          => esc_html__('Auto citation successfully.', 'addlly'),
                    'redirectURL'  => admin_url('admin.php?page=one-click&id='. $id .'&tab=article')
                )
            );
        }
    }
}

if (!function_exists('addlly_get_refund_requests')) {
    function addlly_get_refund_requests( $article_id = 0, $articleType = '1-Click Blog' ) {
        
        $data = array(
            "articleType"     => $articleType,
            "articleId"       => $article_id,
            
        );
        
        $args = array(
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_get( "https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com/staging/api/user/credit-transactions/". addlly_user_id() ."?". http_build_query($data), $args );
        return $api_response;
    }
}

if (!function_exists('addlly_send_refund_request_callback')) {
    add_action("wp_ajax_addlly_send_refund_request", "addlly_send_refund_request_callback");
    
    function addlly_send_refund_request_callback() {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $refund_id         = isset($_POST['refund_id']) ? absint($_POST['refund_id']) : 0;
        $article_id        = isset($_POST['article_id']) ? absint($_POST['article_id']) : 0;
        $subtype           = isset($_POST['subtype']) ? sanitize_text_field(wp_unslash($_POST['subtype'])) : '';
        $comment           = isset($_POST['comment']) ? sanitize_textarea_field(wp_unslash($_POST['comment'])) : '';
        
        
        $data = array(
            "comment"           => $comment,
            "articleId"         => $article_id,
            'articleType'       => '1-Click Blog',
            'articleSubType'    => $subtype,
        );
        
        $args = array(
            'body' => wp_json_encode($data),
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_post( "https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com/staging/api/credit-transactions/refund/". $refund_id, $args );
        
        if(isset($api_response['error']) && $api_response['error'] != ''){
            wp_send_json(
                array(
                    'type' => 'error',
                    'msg'  => $api_response['error']
                )
            );
        }else{
            wp_send_json(
                array(
                    'type'         => 'success',
                    'msg'          => esc_html__('Generated successfully.', 'addlly'),
                    'redirectURL'  => admin_url('admin.php?page=one-click&id='. $article_id .'&tab=refundRequests')
                )
            );
        }
    }
}

if (!function_exists('addlly_get_article_refund_requests_callback')) {
    add_action("wp_ajax_addlly_get_article_refund_requests", "addlly_get_article_refund_requests_callback");
    
    function addlly_get_article_refund_requests_callback() {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $article_id         = isset($_POST['article_id']) ? absint($_POST['article_id']) : 0;
        
        ob_start();
            set_query_var('article_id', $article_id);
            addlly_get_template_part('one-click-blog-writer/edit/refund-requests-list');
        $refund_requests = ob_get_contents();
        ob_end_clean();
        
        wp_send_json( array( 'refund_requests' => $refund_requests ) );
    }
}

if (!function_exists('addlly_get_version_history_callback')) {
    add_action("wp_ajax_addlly_get_version_history", "addlly_get_version_history_callback");
    
    function addlly_get_version_history_callback() {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $postid             = isset($_POST['id']) ? absint($_POST['id']) : 0;
        $active_tab     = isset($_POST['type']) ? sanitize_text_field(wp_unslash($_POST['type'])) : 'article';
        $sort_by        = isset($_POST['sort_by']) ? sanitize_text_field(wp_unslash($_POST['sort_by'])) : '';
        $filter_by      = isset($_POST['filter_by']) ? sanitize_text_field(wp_unslash($_POST['filter_by'])) : 'all';
        
        set_query_var('postid', $postid);
        set_query_var('active_tab', $active_tab);
        set_query_var('sort_by', $sort_by);
        set_query_var('filter_by', $filter_by);
        ob_start();
            addlly_get_template_part('one-click-blog-writer/edit/version-history-ajax');
        $history_data = ob_get_contents();
        ob_end_clean();
        
        wp_send_json( array( 'history_data' => $history_data ) );
    }
}

if (!function_exists('addlly_article_preview_callback')) {
    add_action("wp_ajax_addlly_article_preview", "addlly_article_preview_callback");
    
    function addlly_article_preview_callback() {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $idd  = isset($_POST['id']) ? absint($_POST['id']) : 0;
        
        ob_start();
            set_query_var('idd', $idd);
            addlly_get_template_part('one-click-blog-writer/list/preview-article-ajax');
        $article_data = ob_get_contents();
        ob_end_clean();
        
        echo wp_kses_post($article_data);
        wp_die();
    }
}

if (!function_exists('addlly_get_or_generate_ai_images_callback')) {
    add_action("wp_ajax_addlly_get_or_generate_ai_images", "addlly_get_or_generate_ai_images_callback");
    function addlly_get_or_generate_ai_images_callback() {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $id    = isset($_POST['id'])    ? absint($_POST['id']) : 0;
        $type  = isset($_POST['type'])  ? sanitize_text_field(wp_unslash($_POST['type'])) : 'article';
        
        $tabs_arr = array(
            'article'      => 'Short Article Images',
            'linkedIn'     => 'LinkedIn Post',
            'facebook'     => 'Facebook Post',
            'twitter'      => 'Twitter Post',
            'instagram'    => 'Instagram Post',
        );
        $sub_type = isset($tabs_arr[$type]) ? $tabs_arr[$type] : '';
        
        $article_id = get_post_meta($id, 'article_id', true);
        $topic      = get_post_meta($id, 'topic', true);
        
        $article         = addlly_get_article_by_id($id);
        $article_data    = isset($article['data']) ? $article['data'] : array();
        
        if( $type == 'article' ){
            $articleContent  = isset($article_data->article_html) ? $article_data->article_html : '';
        }else if ($type == 'linkedIn') {
            $articleContent  = isset($article_data->linkedIn_post) ? $article_data->linkedIn_post : '';
        } else if ($type == 'facebook') {
            $articleContent  = isset($article_data->facebook_post) ? $article_data->facebook_post : '';
        } else if ($type == 'twitter') {
            $articleContent  = isset($article_data->twitter_post) ? $article_data->twitter_post : '';
        } else if ($type == 'instagram') {
            $articleContent  = isset($article_data->instagram_post) ? $article_data->instagram_post : '';
        }
        
        
        $data = array(
            "html"           => $articleContent,
            "type"           => '1-Click Blog',
            'subType'        => $sub_type,
            'userId'         => addlly_user_id(),
            'articleId'      => $article_id,
            'topic'          => $topic,
        );
        
        $args = array(
            'body' => wp_json_encode($data),
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_post( "https://4clzwsr7wovizhmefo4edpald40vauzx.lambda-url.ap-southeast-1.on.aws/", $args );
        
        if(isset($api_response['error']) && $api_response['error'] != ''){
            wp_send_json(
                array(
                    'type' => 'error',
                    'msg'  => $api_response['error']
                )
            );
        }else{
            wp_send_json(
                array(
                    'type'         => 'success',
                    'msg'          => esc_html__('Generated successfully.', 'addlly'),
                    'redirectURL'  => admin_url('admin.php?page=one-click&id='. $id .'&tab='. $type.'&image_library=true')
                )
            );
        }
        
       
    }
}

if (!function_exists('addlly_get_ai_generated_images_callback')) {
    add_action("wp_ajax_addlly_get_ai_generated_images", "addlly_get_ai_generated_images_callback");
    function addlly_get_ai_generated_images_callback() {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $id                 = isset($_POST['id'])               ? absint($_POST['id']) : 0;
        $type               = isset($_POST['type'])             ? sanitize_text_field(wp_unslash($_POST['type'])) : 'article';
        $isRegenerateImg    = isset($_POST['isRegenerateImg'])  ? sanitize_text_field(wp_unslash($_POST['isRegenerateImg'])) : 0;
        $version            = isset($_POST['version'])          ? sanitize_text_field(wp_unslash($_POST['version'])) : '';
        
        $tabs_arr = array(
            'article'      => 'Short Article Images',
            'linkedIn'     => 'LinkedIn Post',
            'facebook'     => 'Facebook Post',
            'twitter'      => 'Twitter Post',
            'instagram'    => 'Instagram Post',
        );
        $sub_type = isset($tabs_arr[$type]) ? $tabs_arr[$type] : '';
        
        $article_id = get_post_meta($id, 'article_id', true);
        $topic      = get_post_meta($id, 'topic', true);
        
        $article         = addlly_get_article_by_id($id);
        $article_data    = isset($article['data']) ? $article['data'] : array();
        
        if( $type == 'article' ){
            $articleContent  = isset($article_data->article_html) ? $article_data->article_html : '';
        }else if ($type == 'linkedIn') {
            $articleContent  = isset($article_data->linkedIn_post) ? $article_data->linkedIn_post : '';
        } else if ($type == 'facebook') {
            $articleContent  = isset($article_data->facebook_post) ? $article_data->facebook_post : '';
        } else if ($type == 'twitter') {
            $articleContent  = isset($article_data->twitter_post) ? $article_data->twitter_post : '';
        } else if ($type == 'instagram') {
            $articleContent  = isset($article_data->instagram_post) ? $article_data->instagram_post : '';
        }
        
        
        $data = array(
            "html"           => $articleContent,
            "type"           => '1-Click Blog',
            'subType'        => $sub_type,
            'userId'         => addlly_user_id(),
            'articleId'      => $article_id,
            'topic'          => $topic,
        );
        
        if($isRegenerateImg == true){
            $data['isRegenerateImg'] = true;
        }
        
        $args = array(
            'body' => wp_json_encode($data),
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_post( "https://4clzwsr7wovizhmefo4edpald40vauzx.lambda-url.ap-southeast-1.on.aws/", $args );
        
        if(isset($api_response['error']) && $api_response['error'] != ''){
            wp_send_json(
                array(
                    'type' => 'error',
                    'msg'  => $api_response['error']
                )
            );
        }else{
            
            $generated_images = isset($api_response['images']) ? $api_response['images'] : array();
            $regenerateLeft   = isset($api_response['regenerateLeft']) ? $api_response['regenerateLeft'] : 0;
            
            $images_list = '';
            ob_start();
            
                if(isset($version) && $version > 0){
                    
                    echo '<div class="fieldSetText position-relative">
                        <p class="d-flex align-items-center gap-2 m-0 px-3">
                            <img src="'. esc_url(ADDLLY_URL) .'/assets/images/star-icon.svg" alt="glitterStar"> 
                            Old Version Images
                        </p>
                    </div>';
                    
                    $version_num = 'version'.($version);
                    $version_images = isset($api_response['oldImages'][$version-1]->$version_num->images) ? $api_response['oldImages'][$version-1]->$version_num->images : array();
                    
                    echo '<div class="genrateImagesCards d-flex flex-wrap">';
                        foreach($version_images as $image_url){
                            set_query_var('image_url', $image_url);
                            addlly_get_template_part('one-click-blog-writer/edit/image-library/free-images-grid');
                        }
                    echo '</div>';
                    
                    echo '<div class="fieldSetText position-relative mt-4">
                        <p class="d-flex align-items-center gap-2 m-0 px-3">
                            <img src="'. esc_url(ADDLLY_URL) .'/assets/images/star-icon.svg" alt="glitterStar"> 
                            New Generated Images
                        </p>
                    </div>';
                    
                    if( $version != count($api_response['oldImages'])){
                        $prev_version_num = 'version'. ($version + 1);
                        $generated_images = isset($api_response['oldImages'][$version]->$prev_version_num->images) ? $api_response['oldImages'][$version]->$prev_version_num->images : $generated_images;
                    }
                }
            
                echo '<div class="genrateImagesCards d-flex flex-wrap">';
                    foreach($generated_images as $image_url){
                        set_query_var('image_url', $image_url);
                        addlly_get_template_part('one-click-blog-writer/edit/image-library/free-images-grid'); 
                    }
                echo '</div>';
            $images_list .= ob_get_contents();
            ob_end_clean();

            wp_send_json( array( 'images_list' => $images_list, 'regenerateLeft' => $regenerateLeft ) );
        }
        
       
    }
}

if (!function_exists('addlly_archive_article_callback')) {
    add_action("wp_ajax_addlly_archive_article", "addlly_archive_article_callback");
    function addlly_archive_article_callback() {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $id             = isset($_POST['id'])   ? absint($_POST['id']) : 0;
        $type           = isset($_POST['type']) ? sanitize_text_field(wp_unslash($_POST['type'])) : '';
        $article_id     = get_post_meta($id, 'article_id', true);
        
        $data = array(
            "id"     => $article_id,
            "type"   => 'short_flow',
        );
        
        if( $type == 'archive' ){
            $url = "https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com/staging/api/articleHistory/archive-article-history";
        }else{
            $url = "https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com/staging/api/articleHistory/restore-article-history";
        }
        
        $args = array(
            'body' => wp_json_encode($data),
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_post( $url, $args );
        
        if(isset($api_response['error']) && $api_response['error'] != ''){
            wp_send_json(
                array(
                    'type' => 'error',
                    'msg'  => $api_response['error']
                )
            );
        }else{
            
            if( $type == 'archive' ){
                update_post_meta($id, 'isArchivedArticle', 1);
                $msg = 'Your record has been archived.';
            }else{
                update_post_meta($id, 'isArchivedArticle', 0);
                $msg = 'Your record has been restored.';
            }
            
            wp_send_json(
                array(
                    'type'         => 'success',
                    'msg'          => $msg,
                )
            );
        }
    }
}

if (!function_exists('addlly_delete_article_callback')) {
    add_action("wp_ajax_addlly_delete_article", "addlly_delete_article_callback");
    
    function addlly_delete_article_callback() {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $id             = isset($_POST['id'])   ? absint($_POST['id']) : 0;
        $article_id     = get_post_meta($id, 'article_id', true);
        
        $data = [
            "data" => [
                [
                    "id" => $article_id,
                    "type" => "short_flow"
                ]
            ]
        ];
        
        $args = array(
            'body' => wp_json_encode($data),
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_post( "https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com/staging/api/articleHistory/delete-article-history", $args );
        
        if( isset($api_response['error']) && $api_response['error'] != '' ){
            wp_send_json(
                array(
                    'type' => 'error',
                    'msg'  => $api_response['error'],
                    'redirectURL'  => admin_url('admin.php?page=one-click')
                )
            );
        }else{
            
            update_post_meta($id, 'isDeletedArticle', 1);
            
            wp_send_json(
                array(
                    'type'         => 'success',
                    'msg'          => esc_html__('Your record has been deleted.', 'addlly'),
                    'redirectURL'  => admin_url('admin.php?page=one-click')
                )
            );
        }
    }
}

if (!function_exists('addlly_get_free_images_callback')) {
    add_action("wp_ajax_addlly_get_free_images", "addlly_get_free_images_callback");
    
    function addlly_get_free_images_callback() {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $id             = isset($_POST['id'])            ? absint($_POST['id'])                                   : 0;
        $type           = isset($_POST['type'])          ? sanitize_text_field(wp_unslash($_POST['type']))        : '';
        $images_type    = isset($_POST['images_type'])   ? sanitize_text_field(wp_unslash($_POST['images_type'])) : '';
        $article_id     = get_post_meta($id, 'article_id', true);
        $topic          = get_post_meta($id, 'topic', true);
        
        $tabs_arr = array(
            'article'      => 'Short Article Images',
            'linkedIn'     => 'LinkedIn Post',
            'facebook'     => 'Facebook Post',
            'twitter'      => 'Twitter Post',
            'instagram'    => 'Instagram Post',
        );
        $sub_type = isset($tabs_arr[$type]) ? $tabs_arr[$type] : '';
        
        $article         = addlly_get_article_by_id($id);
        $article_data    = isset($article['data']) ? $article['data'] : array();
        
        if( $type == 'article' ){
            $articleContent  = isset($article_data->article_html) ? $article_data->article_html : '';
        }else if ($type == 'linkedIn') {
            $articleContent  = isset($article_data->linkedIn_post) ? $article_data->linkedIn_post : '';
        } else if ($type == 'facebook') {
            $articleContent  = isset($article_data->facebook_post) ? $article_data->facebook_post : '';
        } else if ($type == 'twitter') {
            $articleContent  = isset($article_data->twitter_post) ? $article_data->twitter_post : '';
        } else if ($type == 'instagram') {
            $articleContent  = isset($article_data->instagram_post) ? $article_data->instagram_post : '';
        }
        
        $data = array(
            "html"           => $articleContent,
            "type"           => '1-Click Blog',
            'subType'        => $sub_type,
            'userId'         => addlly_user_id(),
            'articleId'      => $article_id,
            'topic'          => $topic,
        );
        
        $args = array(
            'body' => wp_json_encode($data),
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_post( "https://43cohnn5jc5xkss2q7yrv4rs2e0rywkf.lambda-url.ap-southeast-1.on.aws/", $args );
        
        if( $images_type == 'UnSplash' ){
            $free_images  =  isset($api_response['unsplashImages']) ? $api_response['unsplashImages'] : array();
        }else if( $images_type == 'Pixabay' ){
            $free_images  =  isset($api_response['pixabayImages']) ? $api_response['pixabayImages'] : array();
        }else{ 
            $free_images  =  isset($api_response['images']) ? $api_response['images'] : array();
        }
        
        ob_start();
            foreach($free_images as $image_url){
                set_query_var('image_url', $image_url);
                addlly_get_template_part('one-click-blog-writer/edit/image-library/free-images-grid');
            }
        $contents = ob_get_contents();
        ob_end_clean();
        
        echo wp_kses_post($contents);
        wp_die();
    }
}

if (!function_exists('addlly_search_free_images_callback')) {
    add_action("wp_ajax_addlly_search_free_images", "addlly_search_free_images_callback");
    function addlly_search_free_images_callback() {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $id             = isset($_POST['id'])            ? absint($_POST['id'])                                   : 0;
        $type           = isset($_POST['type'])          ? sanitize_text_field(wp_unslash($_POST['type']))        : '';
        $keyword        = isset($_POST['keyword'])       ? sanitize_text_field(wp_unslash($_POST['keyword']))     : '';
        $images_type    = isset($_POST['images_type'])   ? sanitize_text_field(wp_unslash($_POST['images_type'])) : '';
        $article_id     = get_post_meta($id, 'article_id', true);
       
        $data = array(
            "type"            => 'image',
            "imgSubType"      => $images_type,
            'imgSearchVal'    => $keyword,
        );
        
        $args = array(
            'body' => wp_json_encode($data),
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $free_images = addlly_remote_post( "https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com/staging/api/chart-or-image/generate", $args );
        
        ob_start();
            if(isset($free_images) && !empty($free_images)){
                foreach($free_images as $image_url){
                    set_query_var('image_url', $image_url);
                    addlly_get_template_part('one-click-blog-writer/edit/image-library/free-images-grid');
                }
            }else{
                addlly_get_template_part('one-click-blog-writer/edit/image-library/free-images-not-found');
            }
        $contents = ob_get_contents();
        ob_end_clean();
        
        echo wp_kses_post($contents);
        wp_die();
    }
}

if (!function_exists('addlly_get_uploaded_images_callback')) {
    add_action("wp_ajax_addlly_get_uploaded_images", "addlly_get_uploaded_images_callback");
    function addlly_get_uploaded_images_callback() {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $id          = isset($_POST['id'])   ? absint($_POST['id'])    : 0;
        $type        = isset($_POST['type']) ? sanitize_text_field(wp_unslash($_POST['type']))  : '';
        $article_id  = get_post_meta($id, 'article_id', true);
        
        $tabs_arr = array(
            'article'      => 'Short Article Images',
            'linkedIn'     => 'LinkedIn Post',
            'facebook'     => 'Facebook Post',
            'twitter'      => 'Twitter Post',
            'instagram'    => 'Instagram Post',
        );
        $sub_type = isset($tabs_arr[$type]) ? $tabs_arr[$type] : '';
        
        $data = array(
            "type"       => '1-Click Blog',
            'subType'    => $sub_type,
        );
        
        $args = array(
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_get( "https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com/staging/api/generate-images/get-uploaded-image/". addlly_user_id() ."?". http_build_query($data), $args );
        
        $count_images = '00';
        ob_start();
            if(isset($api_response['images']) && !empty($api_response['images'])){
                $count_images = count($api_response['images']);
                foreach($api_response['images'] as $image_url){
                    set_query_var('image_url', $image_url);
                    addlly_get_template_part('one-click-blog-writer/edit/image-library/free-images-grid');
                }
            }
        $contents = ob_get_contents();
        ob_end_clean();
        
        wp_send_json( array('count_images' => $count_images, 'images_list' => $contents) );
    }
}

if (!function_exists('addlly_save_upload_images_callback')) {
    add_action("wp_ajax_addlly_save_upload_images", "addlly_save_upload_images_callback");
    function addlly_save_upload_images_callback( $id = 0, $type = 'article' ) {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $id             = isset($_POST['id'])    ? absint($_POST['id'])        : 0;
        $type           = isset($_POST['type'])  ? sanitize_text_field(wp_unslash($_POST['type']))      : '';
        $article_id     = get_post_meta($id, 'article_id', true);
        
        $tabs_arr = array(
            'article'      => 'Short Article Images',
            'linkedIn'     => 'LinkedIn Post',
            'facebook'     => 'Facebook Post',
            'twitter'      => 'Twitter Post',
            'instagram'    => 'Instagram Post',
        );
        $sub_type = isset($tabs_arr[$type]) ? $tabs_arr[$type] : '';
        
        $images_arr = array();
        $files = isset($_FILES) ? $_FILES : array();
        $file_get_contents = file_get_content.'s';
        if(isset($files['files']['name']) && !empty($files['files']['name'])){
            foreach( ($files['files']['name']) as $key => $name ){
                if( $name != '' ){
                    $tmp_name = isset($files['files']['tmp_name'][$key]) ? $files['files']['tmp_name'][$key] : '';
                    $uploaded_file = wp_upload_bits( $name, null, @$file_get_contents( $tmp_name ) );
                    $images_arr[] = array(
                        'file'  => $uploaded_file['file'],
                        'url'   => $uploaded_file['url'],
                        'type'  => $uploaded_file['type'],
                        'name'  => wp_basename($uploaded_file['file'])
                    );
                }
            }
        }
        
        
        if(isset($images_arr) && !empty($images_arr)){
            foreach($images_arr as $image){
                
                $image_type          = pathinfo($image['file'], PATHINFO_EXTENSION);
                $image_data          = $file_get_contents($image['file']);
                $image_base64code    = 'data:image/' . $image_type . ';base64,' . base64_encode($image_data);

                $data = array(
                    "imageBase64"    => $image_base64code,
                    'file_name'      => $image['name'],
                    'userId'         => addlly_user_id(),
                    'articleId'      => $article_id,
                    "type"           => '1-Click Blog',
                    'subType'        => $sub_type,
                );
                
                $args = array(
                    'body' => wp_json_encode($data),
                    'headers' => array(
                        'Authorization' => addlly_get_api_token(),
                        'Content-Type'  => 'application/json'
                    )
                );
                $api_response = addlly_remote_post( "https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com/staging/api/generate-images/save-upload-image", $args );
            }
        }
        
        $count_images = '00';
        ob_start();
            if(isset($api_response['images']) && !empty($api_response['images'])){
                $count_images = count($api_response['images']);
                foreach($api_response['images'] as $image_url){
                    set_query_var('image_url', $image_url);
                    addlly_get_template_part('one-click-blog-writer/edit/image-library/free-images-grid');
                }
            }
        $contents = ob_get_contents();
        ob_end_clean();
        
        wp_send_json( array('count_images' => $count_images, 'images_list' => $contents) );
    }
}

if (!function_exists('addlly_save_social_post_image_callback')) {
    add_action("wp_ajax_addlly_save_social_post_image", "addlly_save_social_post_image_callback");
    function addlly_save_social_post_image_callback() {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $id             = isset($_POST['id'])          ? absint($_POST['id']) : 0;
        $type           = isset($_POST['type'])        ? sanitize_text_field(wp_unslash($_POST['type']))      : '';
        $image_url      = isset($_POST['image_url'])   ? sanitize_text_field(wp_unslash($_POST['image_url'])) : '';
        $article_id     = get_post_meta($id, 'article_id', true);
        
        $tabs_arr = array(
            'linkedIn'     => 'LinkedIn Post',
            'facebook'     => 'Facebook Post',
            'twitter'      => 'Twitter Post',
            'instagram'    => 'Instagram Post',
        );
        $sub_type = isset($tabs_arr[$type]) ? $tabs_arr[$type] : '';
        
        $data = array(
            "userId"     => addlly_user_id(),
            "articleId"  => $article_id,
            'type'       => '1-Click Blog',
            'subType'    => $sub_type,
            'image'      => $image_url,
        );

        $args = array(
            'body' => wp_json_encode($data),
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_post( "https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com/staging/api/generate-images/save-selected-image", $args );
        
        if(isset($api_response['image']) && $api_response['image'] != ''){
            $article_response     = addlly_get_article_by_id($id, 'API', $article_id);
            update_post_meta($id, 'article_data', $article_response);
            wp_send_json(
                array(
                    'type'         => 'success',
                    'msg'          => $type. esc_html__(' post image saved successfully.', 'addlly'),
                )
            );
            
        }else{
            wp_send_json(
                array(
                    'type' => 'error',
                    'msg'  => $api_response['error'],
                )
            );
        }
        
    }
}


if (!function_exists('addlly_search_articles_callback')) {
    add_action("wp_ajax_addlly_search_articles", "addlly_search_articles_callback");
    function addlly_search_articles_callback() {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $durations        = isset($_POST['durations']) ? sanitize_text_field(wp_unslash($_POST['durations'])) : '';
        $status           = isset($_POST['status']) ? sanitize_text_field(wp_unslash($_POST['status'])) : '';
        $AIModels         = isset($_POST['AIModels']) ? sanitize_text_field(wp_unslash($_POST['AIModels'])) : '';
        $search_keyword   = isset($_POST['search_keyword']) ? sanitize_text_field(wp_unslash($_POST['search_keyword'])) : '';
        $articleStatus    = isset($_POST['articleStatus']) ? sanitize_text_field(wp_unslash($_POST['articleStatus'])) : '';
        $pg               = isset($_POST['pg']) ? absint($_POST['pg']) : 1;
        
        $date_range = '';
        if(isset($durations) && $durations != ''){
            $durations = explode(',', $durations);
            if(isset($durations) && !in_array('all', $durations)){
                $ago_days = end($durations);
                if( $ago_days == 'today' ){
                    $date_range = strtotime ( '-'. 0 .' day' );
                }else{
                    $date_range = strtotime ( '-'. $ago_days .' day' );
                }
            }
        }
        
        
        $status_meta_query = '';
        if(isset($status) && $status != ''){
            $status = explode(',', $status);
            if(isset($status) && !in_array('all', $status)){
                $status_query['relation'] = 'OR';
                foreach($status as $_status){
                    $status_query[] = array(
                        'key'         => 'article_status',
                        'value'       => $_status,
                        'compare'     => '=',
                    );
                }
                $status_meta_query = $status_query;
            }
        }
        $aiModal_meta_query = '';
        if(isset($AIModels) && $AIModels != ''){
            $modals = explode(',', $AIModels);
            if(isset($modals) && !in_array('all', $modals)){
                $modal_query['relation'] = 'OR';
                foreach($modals as $modal){
                    $modal_query[] = array(
                        'key'         => 'aiType',
                        'value'       => $modal,
                        'compare'     => '=',
                    );
                }
                $aiModal_meta_query = $modal_query;
            }
        }
        
        $articleStatus_meta_query = '';
        if( $articleStatus == 'archive' ){
            $articleStatus_meta_query = array(
                'key'         => 'isArchivedArticle',
                'value'       => 1,
                'compare'     => '=',
            );
        }
        
        $query_args = array(
            'post_type'      => 'post',
            'posts_per_page' => 10,
            'paged'          => $pg,
            'post_status'    => 'publish',
            'meta_query'     => array(
                'relation'   => 'AND',
                array(
                    'key'     => 'article_id',
                    'value'   => 0,
                    'compare' => '>'
                ),
                array(
                    'relation'   => 'OR',
                    array(
                        'key' => 'isDeletedArticle',
                        'value' => 1,
                        'compare' => '!='
                    ),
                    array(
                        'key' => 'isDeletedArticle',
                        'compare' => 'NOT EXISTS'
                    )
                ),
                array(
                    'key' => 'user_id',
                    'value' => get_current_user_id(),
                    'compare' => '='
                ),
                $aiModal_meta_query,
                $status_meta_query,
                $articleStatus_meta_query
            )
        );
        
        if(isset($date_range) && $date_range != ''){
            $query_args['date_query'] = array(
                array(
                    'after' => array(
                        'year'  => gmdate('Y', $date_range ),
                        'month' => gmdate('m', $date_range ),
                        'day'   => gmdate('d', $date_range ),
                    )
                )
            );
        }
        
        if(isset($search_keyword) && $search_keyword != ''){
            add_filter( 'posts_where', 'addlly_post_title_filter', 30, 2 );
                $query_args['search_post_title'] = $search_keyword;
                $the_query = new WP_Query($query_args);
            remove_filter( 'posts_where', 'addlly_post_title_filter', 30, 2 );
        }else{
            $the_query = new WP_Query($query_args);
        }
        
        $html = '';
        if ($the_query->have_posts()) {
            ob_start();
                while ($the_query->have_posts()): $the_query->the_post();
                    set_query_var('articles_type', 'all');
                    addlly_get_template_part('one-click-blog-writer/list/article-content');
                endwhile;
            $html = ob_get_contents();
            ob_end_clean();
        } 
        
        ob_start();
            $pagination_args = array(
                'total_posts'    => $the_query->found_posts, 
                'posts_per_page' => 10, 
                'page_num'       => $pg,
            );
            echo wp_kses_post(addlly_pagination($pagination_args));
            $pagination = ob_get_contents();
        ob_end_clean();
        wp_reset_postdata();
        wp_reset_query();
        
        $query_args = array(
            'post_type'      => 'post',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'meta_query'     => array(
                'relation'   => 'AND',
                array(
                    'key'     => 'article_id',
                    'value'   => 0,
                    'compare' => '>'
                ),
                array(
                    'relation'   => 'OR',
                    array(
                        'key' => 'isDeletedArticle',
                        'value' => 1,
                        'compare' => '!='
                    ),
                    array(
                        'key' => 'isDeletedArticle',
                        'compare' => 'NOT EXISTS'
                    )
                ),
                array(
                    'key' => 'user_id',
                    'value' => get_current_user_id(),
                    'compare' => '='
                ),
                array(
                    'key'     => 'istrainArticle',
                    'value'   => 1,
                    'compare' => '='
                ),
                $aiModal_meta_query,
                $status_meta_query,
                $articleStatus_meta_query
            )
        );
        
        if(isset($date_range) && $date_range != ''){
            $query_args['date_query'] = array(
                array(
                    'after' => array(
                        'year'  => gmdate('Y', $date_range ),
                        'month' => gmdate('m', $date_range ),
                        'day'   => gmdate('d', $date_range ),
                    )
                )
            );
        }
        
        if(isset($search_keyword) && $search_keyword != ''){
            add_filter( 'posts_where', 'addlly_post_title_filter', 30, 2 );
                $query_args['search_post_title'] = $search_keyword;
                $train_query = new WP_Query($query_args);
            remove_filter( 'posts_where', 'addlly_post_title_filter', 30, 2 );
        }else{
            $train_query = new WP_Query($query_args);
        }
        
        
        $trainArticles = '';
        if ($train_query->have_posts()) {
            ob_start();
                while ($train_query->have_posts()): $train_query->the_post();
                    set_query_var('articles_type', 'train');
                    addlly_get_template_part('one-click-blog-writer/list/article-content');
                endwhile;
            $trainArticles = ob_get_contents();
            ob_end_clean();
        }
        // translators: %s is the name of the location
        $countTrainArticles = sprintf( __("Trained Article History ( %s / 4 Articles used for training )", 'addlly'), absint($train_query->found_posts));
        wp_send_json(array( 'html' => $html, 'pagination' => $pagination, 'trainArticles' => $trainArticles, 'countTrainArticles' => $countTrainArticles ));
        
    }
}

if (!function_exists('addlly_login_callback')) {
    add_action("wp_ajax_addlly_login", "addlly_login_callback");
    function addlly_login_callback() {
        
        if ( empty($_POST['login_form']) || ! wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['login_form'])), 'addlly_nonce') ){
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $username  = isset($_POST['username'])   ? sanitize_text_field(wp_unslash($_POST['username']))  : '';
        $password  = isset($_POST['password'])   ? sanitize_text_field(wp_unslash($_POST['password']))  : '';
        
        $data = array(
            "username"  => $username,
            "password"  => $password,
        );
        
        $args = array(
            'body' => wp_json_encode($data),
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_post( "https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com/staging/user/login", $args );
        
        if(isset($api_response['error']) && $api_response['error'] != ''){
            
            wp_send_json(
                array(
                    'type'         => 'error',
                    'msg'          => $api_response['error'],
                )
            );
            
        }else{
            
            $current_user_id  = get_current_user_id();
            $user_id          = isset($api_response['data']->id)            ? $api_response['data']->id            : 0;
            $wp_web_link      = isset($api_response['data']->wp_web_link)   ? $api_response['data']->wp_web_link   : '';
            $current_plan     = isset($api_response['data']->current_plan)   ? $api_response['data']->current_plan   : '';
            $first_name       = isset($api_response['data']->first_name)    ? $api_response['data']->first_name    : '';
            $last_name        = isset($api_response['data']->last_name)     ? $api_response['data']->last_name     : '';
            $username         = isset($api_response['data']->username)      ? $api_response['data']->username      : '';
            $password         = isset($api_response['data']->password)      ? $api_response['data']->password      : '';
            
            update_user_meta($current_user_id, 'addlly_user_id', $user_id);
            update_user_meta($current_user_id, 'addlly_user_web_link', $wp_web_link);
            update_user_meta($current_user_id, 'addlly_user_plan', $current_plan);
            update_user_meta($current_user_id, 'addlly_first_name', $first_name);
            update_user_meta($current_user_id, 'addlly_last_name', $last_name);
            update_user_meta($current_user_id, 'addlly_username', $username);
            update_user_meta($current_user_id, 'addlly_user_password', $password);
            wp_send_json( array('type' => 'success', 'msg' => esc_html__('Login successful, redirecting...', 'addlly'), 'redirectURL' => admin_url('admin.php?page=addlly&page=getting-started') ) );
        }
        
    }
}

if (!function_exists('addlly_login_by_app')) {
    function addlly_login_by_app( $username = '', $password = '' ) {
        
        $data = array(
            "username"  => $username,
            "password"  => $password,
        );
        
        $args = array(
            'body' => wp_json_encode($data),
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_post( "https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com/staging/user/login", $args );
        
        if(isset($api_response['error']) && $api_response['error'] != ''){
            wp_redirect(admin_url('admin.php?page=addlly&invalidLogin=true'));
            exit;
        }else{
            $current_user_id  = get_current_user_id();
            $user_id          = isset($api_response['data']->id)             ? $api_response['data']->id             : 0;
            $wp_web_link      = isset($api_response['data']->wp_web_link)    ? $api_response['data']->wp_web_link    : '';
            $current_plan     = isset($api_response['data']->current_plan)   ? $api_response['data']->current_plan   : '';
            $first_name       = isset($api_response['data']->first_name)     ? $api_response['data']->first_name     : '';
            $last_name        = isset($api_response['data']->last_name)      ? $api_response['data']->last_name      : '';
            $username         = isset($api_response['data']->username)       ? $api_response['data']->username       : '';
            $password         = isset($api_response['data']->password)       ? $api_response['data']->password       : '';
            
            update_user_meta($current_user_id, 'addlly_user_id', $user_id);
            update_user_meta($current_user_id, 'addlly_user_web_link', $wp_web_link);
            update_user_meta($current_user_id, 'addlly_user_plan', $current_plan);
            update_user_meta($current_user_id, 'addlly_first_name', $first_name);
            update_user_meta($current_user_id, 'addlly_last_name', $last_name);
            update_user_meta($current_user_id, 'addlly_username', $username);
            update_user_meta($current_user_id, 'addlly_user_password', $password);
            wp_redirect(admin_url('admin.php?page=addlly&page=getting-started'));
            exit;
        }
    }
}

if (!function_exists('addlly_user_app_detail')) {
    function addlly_user_app_detail( $userid = '' ) {
        
        $args = array(
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_get( "https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com/staging/user/detail/". $userid, $args );
        return $api_response;
    }
}

if (!function_exists('addlly_search_refunds_list_callback')) {
    add_action("wp_ajax_addlly_search_refunds_list", "addlly_search_refunds_list_callback");
    function addlly_search_refunds_list_callback() {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $article_id       = isset($_POST['article_id']) ? absint($_POST['article_id']) : 1;
        $pageNum          = isset($_POST['pg']) ? absint($_POST['pg']) : 1;
        $refund_requests  = addlly_get_refund_requests( $article_id );
        
        $refunds_list = '';
        if(isset($refund_requests['data']) && !empty($refund_requests['data'])){
            ob_start();
                foreach($refund_requests['data'] as $key => $refund_request){
                    $start_limit = (( $pageNum - 1)*10) + 1;
                    $end_limit = $pageNum*10;
                    if( ($key+1) >= $start_limit && ($key+1) <= $end_limit ){
                        set_query_var('refund_request', $refund_request);
                        addlly_get_template_part('one-click-blog-writer/edit/refund-requests-content');
                    }
                }
            $refunds_list = ob_get_contents();
            ob_end_clean();
        }
        
        $pagination = addlly_pagination( array( 'total_posts' => count($refund_requests['data']), 'posts_per_page' => 10, 'action' => 'refund_list', 'page_num' => $pageNum ) );
        wp_send_json(array( 'refunds_list' => $refunds_list, 'pagination' => $pagination ));
        
    }
}

if (!function_exists('addlly_upload_aibrand_images_callback')) {
    add_action("wp_ajax_addlly_upload_aibrand_images", "addlly_upload_aibrand_images_callback");
    function addlly_upload_aibrand_images_callback( $id = 0, $type = 'article' ) {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $id             = isset($_POST['id'])    ? absint($_POST['id'])        : 0;
        $type           = isset($_POST['type'])  ? sanitize_text_field(wp_unslash($_POST['type']))      : '';
        $article_id     = get_post_meta($id, 'article_id', true);
        
        $tabs_arr = array(
            'article'      => 'Short Article Images',
            'linkedIn'     => 'LinkedIn Post',
            'facebook'     => 'Facebook Post',
            'twitter'      => 'Twitter Post',
            'instagram'    => 'Instagram Post',
        );
        $sub_type = isset($tabs_arr[$type]) ? $tabs_arr[$type] : '';
        
        $images_arr = array();
        $files = isset($_FILES) ? $_FILES : array();
        $file_get_contents = file_get_content.'s';
        if(isset($files['files']['name']) && !empty($files['files']['name'])){
            foreach( $files['files']['name'] as $key => $name ){
                if( $name != '' ){
                    $tmp_name = isset($files['files']['tmp_name'][$key]) ? $files['files']['tmp_name'][$key] : '';
                    $uploaded_file = wp_upload_bits( $name, null, @$file_get_contents( $tmp_name ) );
                    $images_arr[] = array(
                        'file'  => $uploaded_file['file'],
                        'url'   => $uploaded_file['url'],
                        'type'  => $uploaded_file['type'],
                        'name'  => wp_basename($uploaded_file['file'])
                    );
                }
            }
        }
        
        
        if( isset($images_arr) && !empty($images_arr)){
            foreach($images_arr as $image){
                
                $image_type          = pathinfo($image['file'], PATHINFO_EXTENSION);
                $image_data          = $file_get_contents($image['file']);
                $image_base64code    = 'data:image/' . $image_type . ';base64,' . base64_encode($image_data);

                $data = array(
                    "imageBase64"    => $image_base64code,
                    'file_name'      => $image['name'],
                    'userId'         => addlly_user_id(),
                );
                
                $args = array(
                    'body' => wp_json_encode($data),
                    'headers' => array(
                        'Authorization' => addlly_get_api_token(),
                        'Content-Type'  => 'application/json'
                    )
                );
                $api_response = addlly_remote_post( "https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com/staging/api/product-image-library/save-upload-image", $args );
            }
        }
        
        
        
        $productImg = '';
        if(isset($api_response['imageUrl']) && !empty($api_response['imageUrl'])){
            $productImg = '<img src="'. $api_response['imageUrl'] .'" alt="Uploaded Img">';
            
            $data = array(
                "type"           => '1-Click Blog',
                'subType'        => $sub_type,
                'userId'         => addlly_user_id(),
                'articleId'      => $article_id,
                "productImage"   => $api_response['imageUrl'],
            );
            
            $args = array(
                'body' => wp_json_encode($data),
                'headers' => array(
                    'Authorization' => addlly_get_api_token(),
                    'Content-Type'  => 'application/json'
                )
            );
            $api_response = addlly_remote_post( "https://6cn3kuvmok6j7z6syu64d26hyq0wkbgr.lambda-url.ap-southeast-1.on.aws/", $args );
        }
        
        $count_images = '00';
        $images_list_ui = '';
        if(isset($api_response['backgroundImages']) && !empty($api_response['backgroundImages'])){
            ob_start();
                echo '<div class="fieldSetText position-relative">
                    <p class="d-flex align-items-center gap-2 m-0 px-3">
                        <img src="'. esc_url(ADDLLY_URL) .'/assets/images/star-icon.svg" alt="glitterStar"> 
                        Generated Images
                    </p>
                </div>';

                $count_images = count($api_response['backgroundImages']);
                echo '<div class="genrateImagesCards uploadTabsData d-flex flex-wrap">';
                    foreach($api_response['backgroundImages'] as $image){
                        $image_url = $image->backgroundImage;
                        set_query_var('image_url', $image_url);
                        addlly_get_template_part('one-click-blog-writer/edit/image-library/free-images-grid');
                    }
                echo '</div>';

                $images_list_ui = ob_get_contents();
            ob_end_clean();
        }
        
        $galleryImages      = addlly_get_aibrand_gallery_callback();
        $galleryImagesList  = isset($galleryImages['galleryImagesList']) ? $galleryImages['galleryImagesList'] : '';
        $countGalleryimages = isset($galleryImages['countGalleryimages']) ? $galleryImages['countGalleryimages'] : 0;
        
        wp_send_json( array('count_images' => $count_images, 'images_list' => $images_list_ui, 'productImg' => $productImg, 'galleryImagesList' => $galleryImagesList, 'countGalleryimages' => $countGalleryimages) );
    }
}

if (!function_exists('addlly_get_aibrand_images_callback')) {
    add_action("wp_ajax_addlly_get_aibrand_images", "addlly_get_aibrand_images_callback");
    function addlly_get_aibrand_images_callback() {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $id          = isset($_POST['id'])   ? absint($_POST['id'])    : 0;
        $type        = isset($_POST['type']) ? sanitize_text_field(wp_unslash($_POST['type']))  : '';
        $article_id  = get_post_meta($id, 'article_id', true);
        
        $tabs_arr = array(
            'article'      => 'Short Article Images',
            'linkedIn'     => 'LinkedIn Post',
            'facebook'     => 'Facebook Post',
            'twitter'      => 'Twitter Post',
            'instagram'    => 'Instagram Post',
        );
        $sub_type = isset($tabs_arr[$type]) ? $tabs_arr[$type] : '';
        
        $data = array(
            "type"         => '1-Click Blog',
            'subType'      => $sub_type,
            'userId'       => addlly_user_id(),
            'articleId'    => $article_id,
        );
        
        $args = array(
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_get( "https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com/staging/api/product-image-library/get-product-and-bg-images?". http_build_query($data), $args );
        
        $count_images = '00';
        $productImg   = '';
        ob_start();
            if(isset($api_response['backgroundImages']) && !empty($api_response['backgroundImages'])){
                echo '<div class="fieldSetText position-relative">
                    <p class="d-flex align-items-center gap-2 m-0 px-3">
                        <img src="'. esc_url(ADDLLY_URL) .'/assets/images/star-icon.svg" alt="glitterStar"> 
                        Generated Images
                    </p>
                </div>';
                $count_images = count($api_response['backgroundImages']);
                
                echo '<div class="genrateImagesCards uploadTabsData d-flex flex-wrap">';
                    foreach($api_response['backgroundImages'] as $image){
                        $image_url = $image->backgroundImage;
                        set_query_var('image_url', $image_url);
                        addlly_get_template_part('one-click-blog-writer/edit/image-library/free-images-grid');
                    }
                echo '</div>';
                if(isset($api_response['productImg'])){
                    $productImg = '<img src="'. $api_response['productImg'] .'" alt="Uploaded Img">';
                }
                
            }
        $contents = ob_get_contents();
        ob_end_clean();
        
        $galleryImages      = addlly_get_aibrand_gallery_callback();
        $galleryImagesList  = isset($galleryImages['galleryImagesList']) ? $galleryImages['galleryImagesList'] : '';
        $countGalleryimages = isset($galleryImages['countGalleryimages']) ? $galleryImages['countGalleryimages'] : 0;
        wp_send_json( array('count_images' => $count_images, 'images_list' => $contents, 'productImg' => $productImg, 'galleryImagesList' => $galleryImagesList, 'countGalleryimages' => $countGalleryimages) );
    }
}

if (!function_exists('addlly_get_aibrand_gallery_callback')) {
    function addlly_get_aibrand_gallery_callback() {
        
        $args = array(
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_get( "https://z9ivoy2ig5.execute-api.ap-southeast-1.amazonaws.com/staging/api/product-image-library/list/byUser/". addlly_user_id() ."?isGetHistory=true", $args );
        
        $count_images = 0;
        ob_start();
        if(isset($api_response['productImageData']) && !empty($api_response['productImageData'])){
            echo '<div class="fieldSetText position-relative">
                <p class="d-flex align-items-center gap-2 m-0 px-3">
                    <img src="'. esc_url(ADDLLY_URL) .'/assets/images/star-icon.svg" alt="glitterStar"> 
                    Generated Ai Brand Images
                </p>
            </div>';
            foreach($api_response['productImageData'] as $productImages){
                echo '<div class="genrateImagesCards uploadTabsData d-flex flex-wrap">';
                    foreach($productImages as $image_url){
                        $count_images++;
                        set_query_var('image_url', $image_url);
                        addlly_get_template_part('one-click-blog-writer/edit/image-library/free-images-grid');
                    }
                echo "</div>";
                echo "<hr>";
            }
        }
        if(isset($api_response['images']) && !empty($api_response['images'])){
            echo '<div class="fieldSetText position-relative">
                <p class="d-flex align-items-center gap-2 m-0 px-3">
                    <img src="'. esc_url(ADDLLY_URL) .'/assets/images/star-icon.svg" alt="glitterStar"> 
                    Uploaded Images
                </p>
            </div>';
            echo '<div class="genrateImagesCards uploadTabsData d-flex flex-wrap">';
                foreach($api_response['images'] as $image_url){
                    $count_images++;
                    set_query_var('image_url', $image_url);
                    addlly_get_template_part('one-click-blog-writer/edit/image-library/free-images-grid');
                }
            echo "</div>";
        }
        $galleryImagesList = ob_get_contents();
        ob_end_clean();
        
        return array( 'galleryImagesList' => $galleryImagesList, 'countGalleryimages' => $count_images );
    }
}

if (!function_exists('addlly_get_topic_suggestions_callback')) {
    add_action("wp_ajax_addlly_get_topic_suggestions", "addlly_get_topic_suggestions_callback");
    function addlly_get_topic_suggestions_callback() {
        
        if(!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'addlly_nonce')) {
            $response['msg']  = esc_html__('Verification failed. Try again.', 'addlly');
            $response['type'] = 'error';
            wp_send_json($response);
        }
        
        $topic        = isset($_POST['topic'])        ? sanitize_text_field(wp_unslash($_POST['topic']))       : '';
        $lang         = isset($_POST['lang'])         ? sanitize_text_field(wp_unslash($_POST['lang']))        : '';
        $geoLocation  = isset($_POST['geoLocation'])  ? sanitize_text_field(wp_unslash($_POST['geoLocation'])) : 'sg';
        $regenerate   = isset($_POST['regenerate'])   ? sanitize_text_field(wp_unslash($_POST['regenerate']))  : 'No';
        $version      = isset($_POST['version'])      ? sanitize_text_field(wp_unslash($_POST['version']))     : 0;
        
        $data = array(
            'topic'             => $topic,
            'geoLocation'       => strtolower($geoLocation),
            'language'          => $lang,
            'isGenerateChart'   => true,
            'generateType'      => 'wordpress-generate-question',
            'isRegenerate'      => false,
        );
        if( $regenerate == 'Yes' ){
            $data['isRegenerate'] = true;
        }
        
        $args = array(
            'body' => wp_json_encode($data),
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_post( "https://4z4sgn5spgnf22a75uoqvj2qeu0lnqqf.lambda-url.ap-southeast-1.on.aws/", $args );
        
        if(isset($api_response['error'])){
            wp_send_json( array('type' => 'error', 'msg' => $api_response['error'] ) );
        }else{
        
            $topic_suggestions = '';
            if(isset($version) && $version > 0){
                $topic_suggestions .= '<div class="optomizeCardBlock">
                    <div class="card-header-content m-0 row" style="background: linear-gradient(103deg, rgba(0, 0, 255, 0.05) 0%, rgba(255, 0, 0, 0.05) 121.74%), rgb(255, 255, 255);">
                        <div class="m-0 col-6">
                            <h6>'. esc_html__('Old Generated Headline', 'addlly') .'</h6>
                        </div>
                        <div class="m-0 col-2">
                            <h6>'. esc_html__('Main Keyword', 'addlly') .'</h6>
                        </div>
                        <div class="text-center col-3">
                            <h6>'. esc_html__('Action', 'addlly') .'</h6>
                        </div>
                    </div>
                </div>';
                foreach($api_response['oldGeneratedTopics'][$version-1] as $data){
                    $topic_suggestions .= '<div class="optomizeCardBlock mx-0 row">
                        <div class="opCard d-flex gap-1 mb-2 align-items-center justify-content-between">
                            <div class="col-6"><label class="topic">'. esc_html($data->topicName) .'</label></div>
                            <div class="col-2"><label class="keyword">'. esc_html($data->keyword) .'</label></div>
                            <div class="button-container text-center col-3">
                                <button class="border-0 rounded-2 px-3 py-1" type="button" style="background-color: rgb(230, 235, 255); color: rgb(0, 57, 255);">
                                    '. esc_html__('Click to Use', 'addlly') .'
                                </button>
                            </div>
                        </div>
                    </div>';
                }
                $topic_suggestions .= '<div class="optomizeCardBlock">
                    <div class="card-header-content m-0 row" style="background: linear-gradient(103deg, rgba(0, 0, 255, 0.05) 0%, rgba(255, 0, 0, 0.05) 121.74%), rgb(255, 255, 255);">
                        <div class="m-0 col-6">
                            <h6>'. esc_html__('Suggested Headline', 'addlly') .'</h6>
                        </div>
                        <div class="m-0 col-2">
                            <h6>'. esc_html__('Main Keyword', 'addlly') .'</h6>
                        </div>
                        <div class="text-center col-3">
                            <h6>'. esc_html__('Action', 'addlly') .'</h6>
                        </div>
                    </div>
                </div>';
                if( $version == count($api_response['oldGeneratedTopics']) ){
                    foreach($api_response['data'] as $data){
                        $topic_suggestions .= '<div class="optomizeCardBlock mx-0 row">
                            <div class="opCard d-flex gap-1 mb-2 align-items-center justify-content-between">
                                <div class="col-6"><label class="topic">'. esc_html($data->topicName) .'</label></div>
                                <div class="col-2"><label class="keyword">'. esc_html($data->keyword) .'</label></div>
                                <div class="button-container text-center col-3">
                                    <button class="border-0 rounded-2 px-3 py-1" type="button" style="background-color: rgb(230, 235, 255); color: rgb(0, 57, 255);">
                                        '. esc_html__('Click to Use', 'addlly') .'
                                    </button>
                                </div>
                            </div>
                        </div>';
                    }
                }else{
                    foreach($api_response['oldGeneratedTopics'][$version] as $data){
                        $topic_suggestions .= '<div class="optomizeCardBlock mx-0 row">
                            <div class="opCard d-flex gap-1 mb-2 align-items-center justify-content-between">
                                <div class="col-6"><label class="topic">'. esc_html($data->topicName) .'</label></div>
                                <div class="col-2"><label class="keyword">'. esc_html($data->keyword) .'</label></div>
                                <div class="button-container text-center col-3">
                                    <button class="border-0 rounded-2 px-3 py-1" type="button" style="background-color: rgb(230, 235, 255); color: rgb(0, 57, 255);">
                                        '. esc_html__('Click to Use', 'addlly') .'
                                    </button>
                                </div>
                            </div>
                        </div>';
                    }
                }
            }else{
                if(isset($api_response['data']) && !empty($api_response['data'])){
                    $topic_suggestions .= '<div class="optomizeCardBlock">
                        <div class="card-header-content m-0 row" style="background: linear-gradient(103deg, rgba(0, 0, 255, 0.05) 0%, rgba(255, 0, 0, 0.05) 121.74%), rgb(255, 255, 255);">
                            <div class="m-0 col-6">
                                <h6>'. esc_html__('Suggested Headline', 'addlly') .'</h6>
                            </div>
                            <div class="m-0 col-2">
                                <h6>'. esc_html__('Main Keyword', 'addlly') .'</h6>
                            </div>
                            <div class="text-center col-3">
                                <h6>'. esc_html__('Action', 'addlly') .'</h6>
                            </div>
                        </div>
                    </div>';
                    foreach($api_response['data'] as $data){
                        $topic_suggestions .= '<div class="optomizeCardBlock mx-0 row">
                            <div class="opCard d-flex gap-1 mb-2 align-items-center justify-content-between">
                                <div class="col-6"><label class="topic">'. esc_html($data->topicName) .'</label></div>
                                <div class="col-2"><label class="keyword">'. esc_html($data->keyword) .'</label></div>
                                <div class="button-container text-center col-3">
                                    <button class="border-0 rounded-2 px-3 py-1" type="button" style="background-color: rgb(230, 235, 255); color: rgb(0, 57, 255);">
                                        '. esc_html__('Click to Use', 'addlly') .'
                                    </button>
                                </div>
                            </div>
                        </div>';
                    }
                }
            }

            $regenerateLeft = isset($api_response['regenerateLeft']) ? $api_response['regenerateLeft'] : 3;
            $topic          = isset($api_response['topic']) ? $api_response['topic'] : $topic;

            wp_send_json( array('topic_suggestions' => $topic_suggestions, 'regenerateLeft' => $regenerateLeft, 'topic' => $topic ) );
        
        }
    }
}

if (!function_exists('addlly_get_googleAdCopyKeywords')) {
    function addlly_get_googleAdCopyKeywords( $id = 0 ) {
        
        $article_id = get_post_meta($id, 'article_id', true);
        $keyword    = get_post_meta($id, 'keyword', true);
                    
        $data = array(
            "articleId"    => $article_id,
            "userId"       => addlly_user_id(),
            "keyword"      => $keyword,
        );
        
        $args = array(
            'body' => wp_json_encode($data),
            'headers' => array(
                'Authorization' => addlly_get_api_token(),
                'Content-Type'  => 'application/json'
            )
        );
        $api_response = addlly_remote_post( "https://34dy5cqczxarietmlhjuvnpfba0weckh.lambda-url.ap-southeast-1.on.aws/", $args );
        return $api_response;
    }
}