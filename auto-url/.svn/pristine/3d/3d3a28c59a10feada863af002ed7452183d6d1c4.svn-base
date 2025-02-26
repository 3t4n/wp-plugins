<?php

$removeTokens = array(
    '%categories%',
    '%categorypath%',
    '%tags%',
);

$multiPartTokens = array(
    '%namepath%'
);

function auto_url_get_url($post_id) {
    global $wpdb;

    return $wpdb->get_row($wpdb->prepare('SELECT * FROM ' . AU_ALIAS_TABLE_NAME . ' WHERE post_id = %d;', $post_id));
}

function auto_url_get_url_by_link($link) {
    global $wpdb;
    $sql = $wpdb->prepare(" SELECT a.*,p.post_type
                            FROM " . AU_ALIAS_TABLE_NAME . " a
                            LEFT JOIN $wpdb->posts p ON (p.ID = a.post_id) 
                            WHERE link = %s;", $link);
    return $wpdb->get_row($sql);
}

function auto_url_get_url_by_id($id) {
    global $wpdb;
    $sql = $wpdb->prepare(" SELECT a.*,p.post_type
                            FROM " . AU_ALIAS_TABLE_NAME . " a
                            LEFT JOIN $wpdb->posts p ON (p.ID = a.post_id) 
                            WHERE url_id = %d;", $id);
    return $wpdb->get_row($sql);
}

function auto_url_insert_url($post_id, $url, $pattern) {
    global $wpdb;

    $data['post_id'] = $post_id;
    $data['link'] = $url;
    $data['pattern'] = $pattern;

    $existing = auto_url_get_url($post_id);

    if (!$existing) {
        $wpdb->insert(AU_ALIAS_TABLE_NAME, $data, array('%d', '%s', '%s'));
        return true;
    }
    return false;
}

function auto_url_remove_url($id) {
    global $wpdb;

    $sql = $wpdb->prepare("DELETE FROM " . AU_ALIAS_TABLE_NAME . " WHERE url_id = %d LIMIT 1", $id);
    return $wpdb->query($sql);
}

function auto_url_remove_all_url() {
    global $wpdb;

    $wpdb->query('TRUNCATE ' . AU_ALIAS_TABLE_NAME);
}

function auto_url_get_all_posts() {
    global $wpdb;
    $types = auto_url_get_post_types();
    $types = array_keys($types);
    
    $sql = $wpdb->prepare(" SELECT p.*,a.link,a.url_id
                            FROM $wpdb->posts p 
                            LEFT JOIN " . AU_ALIAS_TABLE_NAME . " a ON (a.post_id = p.ID)
                            WHERE (p.post_type IN ('".implode("','", $types)."') AND p.post_status = 'publish')
                            OR (p.post_type IN ('attachment'))
                            ORDER BY p.post_type, p.post_title");

    return $wpdb->get_results($sql);
}

function auto_url_current_url() {
    $pageURL = 'http';
    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
        $pageURL .= "s";
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

function auto_url_generate_slug($phrase, $maxLength = 99) {
    $result = strtolower($phrase);

    $result = preg_replace("/[^a-z0-9\s-]/", "", $result);
    $result = trim(preg_replace("/[\s-]+/", " ", $result));
    $result = trim(substr($result, 0, $maxLength));
    $result = preg_replace("/\s/", "-", $result);

    return $result;
}

function auto_url_get_page_path($id) {
    $p = get_page($id);

    $path = $p->post_name;

    while ($p->post_parent != 0) {
        $p = get_page($p->post_parent);
        $path = $p->post_name . '/' . $path;
    }
    return $path;
}

function auto_url_get_category_tree($pid = 0, $d=1) {
    $cats = get_categories(array(
        'parent' => $pid,
        'hide_empty' => false
            ));

    for ($i = 0; $i < count($cats); $i++) {
        $children = auto_url_get_category_tree($cats[$i]->cat_ID, $d + 1);
        if (!empty($children)) {
            for ($j = 0; $j < count($children); $j++) {
                $children[$j]->cat_name = str_repeat('&ndash;', $d) . ' ' . $children[$j]->cat_name;
            }
            $cats[$i]->children = $children;
        }
    }

    return $cats;
}

function auto_url_walk_category_tree($categories, $patterns) {
    $output = '';
    foreach ($categories as $c) {
        $output .=
                '<div class="formRow patternRow">
                <label>' . $c->name . '</label>
                <input type="text" name="p[category][' . $c->term_id . ']" value="' . (isset($patterns['category'][$c->term_id]) ? $patterns['category'][$c->term_id] : '') . '" />
            </div>';

        if (isset($c->children) && !empty($c->children))
            $output .= auto_url_walk_category_tree($c->children, $patterns);
    }

    return $output;
}

function auto_url_get_post_types(){
    global $wpdb, $wp_post_types;
    
    $types = $wp_post_types;
    $not = array('revision','nav_menu_item');
    
    foreach ($not as $type){
        if(isset($types[$type]))
            unset($types[$type]);
    }

    return $types;
}