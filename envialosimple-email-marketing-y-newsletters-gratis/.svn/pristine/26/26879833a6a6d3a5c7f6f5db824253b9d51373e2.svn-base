<?php
/*--- endpoints ---*/
//getall
add_action('rest_api_init', function () {
    register_rest_route('envialosimple/v1', '/lists/getall', array(
        'methods' => 'GET',
        'callback' => 'lists_getall',
        'permission_callback' => function () {
            return true;
        }
    ));
    register_rest_route('envialosimple/v1', '/lists/getbyid', array(
        'methods' => 'GET',
        'callback' => 'lists_getbyid',
        'permission_callback' => function () {
            return true;
        }
    ));
    register_rest_route('envialosimple/v1', '/lists/delete', array(
        'methods' => 'GET',
        'callback' => 'lists_delete',
        'permission_callback' => function () {
            return true;
        }
    ));
    register_rest_route('envialosimple/v1', '/lists/create', array(
        'methods' => 'POST',
        'callback' => 'lists_create',
        'permission_callback' => function () {
            return true;
        }
    ));

    register_rest_route('envialosimple/v1', '/lists/edit', array(
        'methods' => 'POST',
        'callback' => 'lists_edit',
        'permission_callback' => function () {
            return true;
        }
    ));
});
/*-----------------*/


/*--- functions ---*/
function lists_getall() {
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
        $data['name'] = sanitize_text_field($_GET['filterName']);
    }

    $response = es_plugin_api_post_request('/v1/listscontacts/getall',$data);
    $httpcode = $response['response']['code'];
    return new WP_REST_Response(json_decode($response['body']), $httpcode);
}

function lists_delete() {
    $id = sanitize_text_field($_GET['id']);

    $response = es_plugin_api_get_request('/v1/listscontacts/delete/'.$id);
    $httpcode = $response['response']['code'];
    return new WP_REST_Response(json_decode($response['body']), $httpcode);
}

function lists_getbyid() {
    $id = sanitize_text_field($_GET['id']);

    $response = es_plugin_api_get_request('/v1/listscontacts/'.$id);
    $httpcode = $response['response']['code'];
    return new WP_REST_Response(json_decode($response['body']), $httpcode);
}

function lists_create($req) {
    $data = $req->get_params();

    $response = es_plugin_api_post_request('/v1/listscontacts/create',$data);
    $httpcode = $response['response']['code'];
    return new WP_REST_Response(json_decode($response['body']), $httpcode);
}

function lists_edit($req) {
    $data = $req->get_params();

    $response = es_plugin_api_post_request('/v1/listscontacts/edit',$data);
    $httpcode = $response['response']['code'];
    return new WP_REST_Response(json_decode($response['body']), $httpcode);
}
//----------------------------------------------------------