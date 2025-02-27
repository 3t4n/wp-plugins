<?php
/*--- endpoints ---*/
//getall
add_action('rest_api_init', function () {
    register_rest_route('envialosimple/v1', '/campaigns/getall', array(
        'methods' => 'GET',
        'callback' => 'campaigns_getall',
        'permission_callback' => function () {
            return true;
        }
    ));
    register_rest_route('envialosimple/v1', '/campaigns/getbyid', array(
        'methods' => 'GET',
        'callback' => 'campaigns_getbyid',
        'permission_callback' => function () {
            return true;
        }
    ));
    register_rest_route('envialosimple/v1', '/campaigns/create', array(
        'methods' => 'POST',
        'callback' => 'campaigns_create',
        'permission_callback' => function () {
            return true;
        }
    ));
    register_rest_route('envialosimple/v1', '/campaigns/edit', array(
        'methods' => 'POST',
        'callback' => 'campaigns_edit',
        'permission_callback' => function () {
            return true;
        }
    ));
    register_rest_route('envialosimple/v1', '/campaigns/delete', array(
        'methods' => 'GET',
        'callback' => 'campaigns_delete',
        'permission_callback' => function () {
            return true;
        }
    ));
    register_rest_route('envialosimple/v1', '/campaigns/sendpreview', array(
        'methods' => 'POST',
        'callback' => 'campaigns_send_preview',
        'permission_callback' => function () {
            return true;
        }
    ));
    register_rest_route('envialosimple/v1', '/campaigns/checkstatus', array(
        'methods' => 'POST',
        'callback' => 'campaigns_check_status',
        'permission_callback' => function () {
            return true;
        }
    ));
    register_rest_route('envialosimple/v1', '/campaigns/send', array(
        'methods' => 'POST',
        'callback' => 'campaigns_send',
        'permission_callback' => function () {
            return true;
        }
    ));
});
/*-----------------*/


/*--- functions ---*/
function campaigns_getall() {
    $page = (!empty(sanitize_text_field($_GET['page'])) && is_numeric(sanitize_text_field($_GET['page'])))?$_GET['page']:1;
    $limit = (!empty(sanitize_text_field($_GET['limit'])))?sanitize_text_field($_GET['limit']):10;
    $orderBy = (!empty(sanitize_text_field($_GET['orderby'])))?sanitize_text_field($_GET['orderby']):'id';
    $order = (!empty(sanitize_text_field($_GET['order'])))?sanitize_text_field($_GET['order']):'desc';

    $data = [
        'limit' => $limit,
        'page' => $page,
        'orderBy' => $orderBy,
        'order' => $order
    ];
    if(!empty(sanitize_text_field($_GET['filterName']))) {
        $data['filter'] = sanitize_text_field($_GET['filterName']);
    }
    if(!empty(sanitize_text_field($_GET['filterStatus']))) {
        $data['status'] = sanitize_text_field($_GET['filterStatus']);
    }
    if(!empty(sanitize_text_field($_GET['createDateFrom']))) {
        $data['createDateFrom'] = sanitize_text_field($_GET['createDateFrom']);
    }
    if(!empty(sanitize_text_field($_GET['createDateTo']))) {
        $data['createDateTo'] = sanitize_text_field($_GET['createDateTo']);
    }

    $response = es_plugin_api_post_request('/v1/campaign/getAll',$data);
    $httpcode = $response['response']['code'];
    return new WP_REST_Response(json_decode($response['body']), $httpcode);
}

function campaigns_getbyid() {
    $id = sanitize_text_field($_GET['id']);

    $response = es_plugin_api_get_request('/v1/campaign/'.$id);
    $httpcode = $response['response']['code'];
    return new WP_REST_Response(json_decode($response['body']), $httpcode);
}

function campaigns_create($req) {
    $data = $req->get_params();

    $response = es_plugin_api_post_request('/v1/campaign/create',$data);
    $httpcode = $response['response']['code'];
    return new WP_REST_Response(json_decode($response['body']), $httpcode);
}

function campaigns_delete() {
    $data = [
        'id' => sanitize_text_field($_GET['id'])
    ];
    
    $response = es_plugin_api_post_request('/v1/campaign/delete',$data);
    $httpcode = $response['response']['code'];
    return new WP_REST_Response(json_decode($response['body']), $httpcode);
}

function campaigns_edit($req) {
    $data = $req->get_params();

    $response = es_plugin_api_post_request('/v1/campaign/edit',$data);
    $httpcode = $response['response']['code'];
    return new WP_REST_Response(json_decode($response['body']), $httpcode);
}

function campaigns_send_preview($req) {
    $data = $req->get_params();

    $response = es_plugin_api_post_request('/v1/campaign/preview/email',$data);
    $httpcode = $response['response']['code'];
    return new WP_REST_Response(json_decode($response['body']), $httpcode);
}

function campaigns_check_status($req) {
    $data = $req->get_params();

    $response = es_plugin_api_post_request('/v1/campaign/checkstatus',$data);
    $httpcode = $response['response']['code'];
    return new WP_REST_Response(json_decode($response['body']), $httpcode);
}

function campaigns_send($req) {
    $data = $req->get_params();

    $response = es_plugin_api_post_request('/v1/campaign/send',$data);
    $httpcode = $response['response']['code'];
    return new WP_REST_Response(json_decode($response['body']), $httpcode);
}
/*-----------------*/