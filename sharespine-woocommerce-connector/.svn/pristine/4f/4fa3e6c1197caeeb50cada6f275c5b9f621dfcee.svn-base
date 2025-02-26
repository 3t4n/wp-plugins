<?php
/** PB API info resource */

if ( ! defined( 'ABSPATH' ) ) {
    die;
}

add_action( 'rest_api_init', function () {
    /* Register the route */
    register_rest_route( 'wc/sharespine', '/integrator',
    array(
        'methods' => array("POST","GET"),
        'permission_callback' => function () {
            return current_user_can("read");
        },
        'callback' => function($req) {
            $opt = get_option("shsp_integrator_info", (object)array());

            if ($req->get_method() == "POST") {
                $data = $req->get_json_params();

                update_option("shsp_integrator_info", $data);

                return array(
                    "old" => $opt,
                    "new" => $data
                );
            } else if ($req->get_method() == "GET") {
                return $opt;
            }

        }
    )
    );
});

?>