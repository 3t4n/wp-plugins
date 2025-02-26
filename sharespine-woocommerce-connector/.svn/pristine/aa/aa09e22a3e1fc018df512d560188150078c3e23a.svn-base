<?php

if ( ! defined( "ABSPATH" ) ) {
    die;
}

add_action("rest_api_init", "shsp_product_extensions");

function shsp_product_extensions()
{
    register_rest_field(
        "product",
        "shsp-ext",
        array(
            "get_callback"    => "get_shsp_product_extensions",
            "schema"          => array(
                "main" => array(),
                "variations" => array()
            )
        )
    );
}

function get_shsp_product_extensions($object)
{
    $varis = array();
    if ($object["variations"]) {
        foreach ($object["variations"] as $v) {
            if (gettype($v) === "integer") $id = $v;
            else $id = $v["id"];
            $varis[$id] = shsp_mk_product_ext($id);
        }
    }

    return array(
        "main" => shsp_mk_product_ext($object["id"]),
        "variations" => $varis
    );
}

function shsp_mk_product_ext($post_id)
{
    $meta = get_post_meta($post_id);

    $result = array();

    /* Add gtin */
    if (!$meta) {
        /* Nothing to do since empty */
    } else if (array_key_exists("hwp_product_gtin", $meta)) {
        $result["gtin"] = $meta["hwp_product_gtin"][0];
    } else if (array_key_exists("hwp_var_gtin", $meta)) {
        $result["gtin"] = $meta["hwp_var_gtin"][0];
    }

    return (object)$result;
}

?>