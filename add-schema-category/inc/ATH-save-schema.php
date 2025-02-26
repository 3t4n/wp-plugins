<?php defined('ABSPATH') || exit('No see');

add_action('edited_category', 'ATH_SAVE_SCHEMA', 10, 2);
add_action('edited_product_cat', 'ATH_SAVE_SCHEMA', 10, 2);

function ATH_SAVE_SCHEMA($term_id)
{
    $ATH_POST_META_SCHEMA = wp_kses($_POST['peymanseo_add_schema_category_code'], array('script' => array("type" => array())));

    if (isset($ATH_POST_META_SCHEMA))
        update_term_meta($term_id, 'peymanseo_schema_category', $ATH_POST_META_SCHEMA);


    if ($ATH_POST_META_SCHEMA == '')
        delete_term_meta($term_id, 'peymanseo_schema_category');
    elseif (strpos($ATH_POST_META_SCHEMA, 'schema.org') !== false)
        return;
    else
        delete_term_meta($term_id, 'peymanseo_schema_category');
}
