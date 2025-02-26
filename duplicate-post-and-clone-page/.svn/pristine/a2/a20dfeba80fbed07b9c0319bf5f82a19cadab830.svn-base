<?php
defined('ABSPATH') || exit;
function dpcp_get_svg_icon($icon_name)
{
    $svg = wp_remote_retrieve_body(wp_remote_get(site_url() . '/wp-content/plugins/' . plugin_basename('duplicate-post-and-clone-page') . '/assets/icons/' . $icon_name));
    $svg_coded = "data:image/svg+xml;base64," . base64_encode($svg);
    return $svg_coded;
}

function dpcp_posts_list_url()
{
    $url = admin_url('edit.php');
    return $url;
}

function dpcp_pages_list_url()
{
    $url = admin_url('edit.php?post_type=page');
    return $url;
}

function dpcp_get_action_url($action_name, $query_arg = array())
{
    $action_url = admin_url("admin.php");
    $final_query_arg = array(
        "action" => $action_name
    );
    if (count($query_arg) > 0) {
        $final_query_arg = array_merge($final_query_arg, $query_arg);
    }

    $action_url = add_query_arg(
        $final_query_arg,
        $action_url
    );
    $action_url = wp_nonce_url($action_url, $action_name);
    return $action_url;
}

function dpcp_get_tutorial_hide_show_link($hide_tutorial = "1")
{
    $action_name = "dpcp_hide_tutorial";
    if ($hide_tutorial == "1") {
        $query_arg = array(
            "hide_tutorial" => "1"
        );
    }

    if ($hide_tutorial == "0") {
        $query_arg = array(
            "hide_tutorial" => "0"
        );
    }
    $action_url = dpcp_get_action_url($action_name, $query_arg);
    return $action_url;
}
