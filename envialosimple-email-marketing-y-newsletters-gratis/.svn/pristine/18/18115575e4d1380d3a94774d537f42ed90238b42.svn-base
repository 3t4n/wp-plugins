<?php 

/*--- endpoints ---*/
//add image
add_action('rest_api_init', function () {
    register_rest_route('envialosimple/v1', '/gallery/add', array(
        'methods' => 'POST',
        'callback' => 'gallery_add',
        'permission_callback' => function () {
            return true;
        }
    ));
});
//get gallery
add_action('rest_api_init', function () {
    register_rest_route('envialosimple/v1', '/gallery/getall', array(
        'methods' => 'POST',
        'callback' => 'gallery_getall',
        'permission_callback' => function () {
            return true;
        }
    ));
});

/*-----------------*/


/*--- functions ---*/
function gallery_add($req) {
    $wordpress_upload_dir = wp_upload_dir();
    $i = 1;
    $nonce = $req->get_param('es_gallery_nounce');
    if ( ! wp_verify_nonce( $nonce, 'es_gallery_nounce' ) ) {
        return response_error_422( 'admin_not_valid' );
    }
    $file = $req->get_file_params()['file'];
    
    $new_file_path = $wordpress_upload_dir['path'] . '/' . $file['name'];
    $new_file_mime = mime_content_type( $file['tmp_name'] );

    if( empty( $file ) )  
        return response_error_422( 'file_empty' );

    if( $file['error'] )
        return response_error_422('file_error' );
        
    if( $file['size'] > wp_max_upload_size() )
        return response_error_422( 'file_size' );

    $mime_types = array(
        'pdf' => 'application/pdf',
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif' => 'image/gif',
        'png' => 'image/png',
        'bmp' => 'image/bmp',
    );
    if( !in_array( $new_file_mime, $mime_types ) )
        return response_error_422( 'file_invalid_mime' );
        
    while( file_exists( $new_file_path ) ) {
        $i++;
        $new_file_path = $wordpress_upload_dir['path'] . '/' . $i . '_' . $file['name'];
    }

    // looks like everything is OK
    if (move_uploaded_file($file['tmp_name'], $new_file_path)) {
        $upload_id = wp_insert_attachment(array(
            'guid'           => $new_file_path,
            'post_mime_type' => $new_file_mime,
            'post_title'     => preg_replace('/\.[^.]+$/', '', $file['name']),
            'post_content'   => '',
            'post_status'    => 'inherit'
        ), $new_file_path);

        // wp_generate_attachment_metadata() won't work if you do not include this file
        require_once(ABSPATH . 'wp-admin/includes/image.php');

        // Generate and save the attachment metas into the database
        wp_update_attachment_metadata($upload_id, wp_generate_attachment_metadata($upload_id, $new_file_path));
        $urlImage = wp_get_attachment_url($upload_id );
        return new WP_REST_Response([
            'status' => 'ok',
            'data' => [
                'url' => $urlImage
            ]
        ], 200);
    } else {
        return response_error_422('file_move');
    }
}

function gallery_getall($req) {
    $limit = 6;
    $params = $req->get_params();
    $page = ($params['page']) ? sanitize_text_field($params['page']) : 1;

    //get totals
    $query_img_args = array( 
        'post_type' => 'attachment', 
        'post_mime_type' =>array( 
            'jpg|jpeg|jpe' => 'image/jpeg', 
            'gif' => 'image/gif', 
            'png' => 'image/png', 
        ), 
        'post_status' => 'inherit', 
        'posts_per_page' => -1, 
    ); 
    $query_img = new WP_Query( $query_img_args ); 

    //get Posts
    $gallery_page_args = array(
        'post_type' => 'attachment',
        'posts_per_page' => $limit,
        'paged' => $page,
        'post_mime_type' =>'image'
    );
    $gallery_page_query = get_posts($gallery_page_args);

    $result = [];
    if(!empty($gallery_page_query)) {
        foreach ($gallery_page_query as $key => $value) {
            $result[] = wp_get_attachment_image_src($value->ID);
        }
    }
    
    return new WP_REST_Response([
        'status' => 'ok',
        'data' => [
            'images'=> $result,
            'pages' => ceil($query_img->post_count/$limit),
            'current_page' => $page,
            'es_gallery_nounce' => wp_create_nonce( 'es_gallery_nounce' )
        ]
    ], 200);
}

function response_error_422($msg) {
    return new WP_REST_Response([
        'status' => 'error',
        'msg' => $msg
    ], 200);
}