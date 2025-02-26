<?php

if ( ! defined( 'ABSPATH' ) ) {
    die;
}

function shsp_lastModifiedAtOrAfter_filter($request)
{
    /** Add lastmod to query */
    if (isset($_GET["lastModifiedAtOrAfter"])) {
        $lm = $_GET["lastModifiedAtOrAfter"];

        $request['date_query'] = array(
            'relation' => 'OR',
            array(
                "after" => $lm,
                "column" => "post_modified_gmt",
                "compare" => ">=",
                "inclusive" => true
            ),
            array(
                "after" => $lm,
                "column" => "post_modified",
                "compare" => ">=",
                "inclusive" => true
            )
        );
    }

    return $request;
}

add_filter("woocommerce_rest_product_object_query", 'shsp_lastModifiedAtOrAfter_filter');
add_filter("woocommerce_rest_product_query", 'shsp_lastModifiedAtOrAfter_filter');

?>
