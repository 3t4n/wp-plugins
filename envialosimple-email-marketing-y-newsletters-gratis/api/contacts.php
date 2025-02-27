<?php
/*--- endpoints ---*/
//getall
add_action('rest_api_init', function () {
    register_rest_route('envialosimple/v1', '/contacts/getall', array(
        'methods' => 'GET',
        'callback' => 'contacts_getall',
        'permission_callback' => function () {
            return true;
        }
    ));
    register_rest_route('envialosimple/v1', '/contacts/getbyid', array(
        'methods' => 'GET',
        'callback' => 'contacts_getbyid',
        'permission_callback' => function () {
            return true;
        }
    ));
    register_rest_route('envialosimple/v1', '/contacts/create', array(
        'methods' => 'POST',
        'callback' => 'contacts_create',
        'permission_callback' => function () {
            return true;
        }
    ));
    register_rest_route('envialosimple/v1', '/contacts/edit', array(
        'methods' => 'POST',
        'callback' => 'contacts_edit',
        'permission_callback' => function () {
            return true;
        }
    ));
    register_rest_route('envialosimple/v1', '/contacts/delete', array(
        'methods' => 'POST',
        'callback' => 'contacts_delete',
        'permission_callback' => function () {
            return true;
        }
    ));
    register_rest_route('envialosimple/v1', '/contacts/suscribe', array(
        'methods' => 'POST',
        'callback' => 'contacts_suscribe',
        'permission_callback' => function () {
            return true;
        }
    ));
});
/*-----------------*/


/*--- functions ---*/
function contacts_getall() {
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
    if(!empty(sanitize_text_field($_GET['listId']))) {
        $data['listId'] = sanitize_text_field($_GET['listId']);
    }
    if(!empty(sanitize_text_field($_GET['filterContact']))) {
        $data['email'] = sanitize_text_field($_GET['filterContact']);
    }

    $response = es_plugin_api_post_request('/v1/contacts/getall',$data);
    $httpcode = $response['response']['code'];
    return new WP_REST_Response(json_decode($response['body']), $httpcode);
}
//----------------------------------------------------------

function contacts_create($req) {
    $data = $req->get_params();

    $response = es_plugin_api_post_request('/v1/contacts/create',$data);
    $httpcode = $response['response']['code'];
    return new WP_REST_Response(json_decode($response['body']), $httpcode);
}

function contacts_edit($req) {
    $data = $req->get_params();

    $response = es_plugin_api_post_request('/v1/contacts/edit',$data);
    $httpcode = $response['response']['code'];
    return new WP_REST_Response(json_decode($response['body']), $httpcode);
}

function contacts_delete($req) {
    $data = $req->get_params();

    $response = es_plugin_api_post_request('/v1/contacts/delete',$data);
    $httpcode = $response['response']['code'];
    return new WP_REST_Response(json_decode($response['body']), $httpcode);
}
function contacts_suscribe($req) {
    $data = $req->get_params();

    $response = es_plugin_api_post_request('/v1/contacts/suscribe',$data);
    $httpcode = $response['response']['code'];
    return new WP_REST_Response(json_decode($response['body']), $httpcode);
}

function contacts_getbyid() {
    $id = sanitize_text_field($_GET['id']);

    $response = es_plugin_api_get_request('/v1/contacts/'.$id);
    $httpcode = $response['response']['code'];
    return new WP_REST_Response(json_decode($response['body']), $httpcode);
}
/*-----------------*/