<?php
if (!defined('ABSPATH')) exit;

add_action('rest_api_init', function() {
    register_rest_route('ll/v1', '/create', array(
        'methods' => 'POST',
        'callback' => 'll_create_link',
        'permission_callback' => 'll_admin_permission_check',
    ));

    register_rest_route('ll/v1', '/update/(?P<id>\d+)', array(
        'methods' => 'PUT',
        'callback' => 'll_update_link',
        'permission_callback' => 'll_admin_permission_check',
    ));

    register_rest_route('ll/v1', '/delete/(?P<id>\d+)', array(
        'methods' => 'DELETE',
        'callback' => 'll_delete_link',
        'permission_callback' => 'll_admin_permission_check',
    ));
});

function ll_admin_permission_check($request) {
    return current_user_can('manage_options');
}

function ll_create_link($request) {
    try {
        $params = $request->get_params();
        $link_id = LLLoginLink::create($params);
        $link = LLLoginLink::getById($link_id);
        $rowData = $link->getRowData();

        return new WP_REST_Response(array(
            'result'  => 'link_create_success',
            'message' => 'Login link created successfully',
            'rowData' => $rowData,
        ), 201);

    } catch (Throwable $th) {
        return new WP_REST_Response(
			array_merge(
				array(
            		'result'  => 'link_create_failure',
            		'message' => 'Failed to create link',
				),
				(defined('WP_DEBUG') && true !== WP_DEBUG)
				    ? array(
						'debug' => array( 
							'type'    => get_class($th),
							'code'    => $th->getCode(),
							'message' => $th->getMessage(),
							'file'    => $th->getFile(),
							'line'    => $th->getLine(),
							'trace'   => $th->getTraceAsString(),
						),
					) 
					: array(),
        	), 
			500
		);
    }
}

function ll_update_link($request) {
    try {
        $link_id = $request->get_param('id');
        $params = array(
            'expiration_time' => $request->get_param('expiration_time'),
            'max_logins' => $request->get_param('max_logins'),
        );

        LLLoginLink::updateById($link_id, $params);

        return new WP_REST_Response(array(
            'message' => 'Login link updated successfully.'
        ), 200);

    } catch (Exception $e) {
        return new WP_Error('update_failed', $e->getMessage(), array('status' => 500));
    }
}

function ll_delete_link($request) {
    try {
        $link_id = $request->get_param('id');

        LLLoginLink::destroyById($link_id);

        return new WP_REST_Response(array(
            'message' => ' login link deleted successfully.'
        ), 200);

    } catch (Exception $e) {
        return new WP_Error('delete_failed', $e->getMessage(), array('status' => 500));
    }
}
