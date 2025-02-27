<?php
/*--- endpoints ---*/
//getall
add_action('rest_api_init', function () {
    register_rest_route('envialosimple/v1', '/customfields/getall', array(
        'methods' => 'GET',
        'callback' => 'customfields_getall',
        'permission_callback' => function () {
            return true;
        }
    ));
});
/*-----------------*/


/*--- functions ---*/
function customfields_getall() {
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

    $response = es_plugin_api_post_request('/v1/customfields/getall',$data);
    $httpcode = $response['response']['code'];
    return new WP_REST_Response(json_decode($response['body']), $httpcode);
}