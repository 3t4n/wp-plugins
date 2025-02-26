<?php

/*
  Plugin Name: Auto URL
  Plugin URI: http://www.bunchacode.com/programming/auto-url
  Description: generates customized permalinks according to post types, categories and tags
  Version: 1.4
  Author: FunkyDude
  Author URI: http://www.bunchacode.com
  License: GPL2
 */
/*  Copyright 2011  Jiong Ye  (email : dexxaye@gmail.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

global $au_db_version, $wpdb;
$au_db_version = "0.5";

define('AU_DB_VERSION_NAME', 'auto_url_db_version');
define('AU_DIR', WP_CONTENT_DIR . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR . 'auto-url' . DIRECTORY_SEPARATOR);
define('AU_TEMPLATE', AU_DIR . 'templates' . DIRECTORY_SEPARATOR);
define('AU_ALIAS_TABLE_NAME', $wpdb->prefix . 'au_urls');
define('AU_OPTION_PATTERN_NAME', 'auto_url_patterns');

require_once('auto-url-data.php');

function auto_url_install() {
    global $wpdb, $au_db_version;

    $sql = "CREATE TABLE " . AU_ALIAS_TABLE_NAME . " (
            `url_id` int(11) NOT NULL AUTO_INCREMENT,
            `post_id` int(11) NOT NULL DEFAULT '0',
            `link` text NOT NULL,
            `pattern` text NOT NULL,
            `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`url_id`),
            KEY `post_id` (`post_id`)
            );";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    update_option(AU_DB_VERSION_NAME, $au_db_version);

    if (!get_option(AU_OPTION_PATTERN_NAME))
        update_option(AU_OPTION_PATTERN_NAME, '{"type":{"post":"\/show\/post\/%name%","page":"\/show\/page\/%name%"}}');
}

register_activation_hook(__FILE__, 'auto_url_install');

function auto_url_db_check() {
    global $au_db_version;
    if (get_site_option(AU_DB_VERSION_NAME) != $au_db_version) {
        auto_url_install();
    }
}

add_action('plugins_loaded', 'auto_url_db_check');

/*
 * registers admin menu
 */

function auto_url_admin_menu() {
    $page = add_menu_page('Auto URL', 'Auto URL', 'edit_posts', 'auto-url', 'auto_url_admin_template_url');
    $urlPage = add_submenu_page('auto-url', 'See All URL', 'See All URL', 'edit_posts', 'au-url', 'auto_url_admin_template_url');
    $settingPage = add_submenu_page('auto-url', 'URL Patterns', 'URL Patterns', 'edit_posts', 'au-pattern', 'auto_url_admin_template_pattern');

    add_action("admin_print_scripts-$urlPage", 'auto_url_admin_head');
    add_action("admin_print_scripts-$settingPage", 'auto_url_admin_head');

    if (function_exists('remove_submenu_page'))
        remove_submenu_page('auto-url', 'auto-url');
    unset($GLOBALS['submenu']['auto-url'][0]);
}

add_action('admin_menu', 'auto_url_admin_menu');

/*
 * enqueue scripts and styles only on fancy graph page
 */

function auto_url_admin_head() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('jqueryui', plugins_url('js/jquery-ui-1.8.16.custom.min.js', __FILE__));
    wp_enqueue_script('auto_url_js', plugins_url('js/auto_url.js', __FILE__));

    $cssUrl = plugins_url('css', __FILE__);
    echo "<link rel='stylesheet' href='$cssUrl/auto_url_admin.css' type='text/css' />\n";
    echo "<link rel='stylesheet' href='$cssUrl/jquery-ui-1.8.16.custom.css' type='text/css' />\n";
}

/*
 * callback function to display url page
 */

function auto_url_admin_template_url() {
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    $id = isset($_GET['id']) ? $_GET['id'] : '';

    if ($action == 'remove') {
        $autoUrl = auto_url_get_url_by_id($id);

        if (!empty($autoUrl)) {
            if (auto_url_remove_url($autoUrl->url_id)) {
                $message = 'URL removed.';
            } else {
                $message = 'Failed to remove URL.';
            }
        }
    } else if ($action == 'regen') {
        $autoUrl = auto_url_get_url($id);
        $message = '';
        $count = array();

        if (!empty($autoUrl))
            auto_url_remove_url($autoUrl->url_id);

        $count = auto_url_bulk_generate(array(get_post($id)));

        foreach ($count as $name => $n)
            $message .= "$n $name.<br />";
    }


    $url = menu_page_url('au-url', false);
    $posts = auto_url_get_all_posts();
    $types = auto_url_get_post_types();

    require(AU_TEMPLATE . 'url.php');
}

/*
 * callback function to display settings page
 */

function auto_url_admin_template_pattern() {
    global $wpdb;
    $url = menu_page_url('au-pattern', false);
    $message = '';

    if (!empty($_POST)) {
        $action = isset($_POST['action']) ? $_POST['action'] : '';

        if ($action == 'Save') {
            if (is_array($_POST['p'])) {
                $r = auto_url_is_valid_pattern($_POST['p']);
                if ($r['result']) {
                    update_option(AU_OPTION_PATTERN_NAME, json_encode($_POST['p']));
                    $message = 'Patterns Saved.';
                } else {
                    $message = $r['message'];
                }
            }
        } else if ($action == 'Bulk Generate URL') {
            $count = auto_url_bulk_generate(auto_url_get_all_posts());

            foreach ($count as $name => $n)
                $message .= "$n $name.<br />";
        } else if ($action == 'Remove All Generated URL') {
            auto_url_remove_all_url();
            $message = "All links removed.";
        }
    }

    $patterns = json_decode(get_option(AU_OPTION_PATTERN_NAME), true);
    $tags = get_tags();
    $categories = auto_url_get_category_tree();
    $types = auto_url_get_post_types();

    require(AU_TEMPLATE . 'pattern.php');
}

function auto_url_is_valid_pattern($patternGroups) {
    foreach ($patternGroups as $type => $group) {
        foreach ($group as $i => $p) {
            if (strlen(trim($p))) {
                if ($type == 'type' && $i == 'attachment') {
                    if (!strstr($p, '%id%')) {
                        return array(
                            'result' => false,
                            'message' => 'Post type media must contain %id% token in pattern.'
                        );
                    }
                }

                if (!strstr($p, '%id%') && !strstr($p, '%name%') && !strstr($p, '%namepath%')) {
                    return array(
                        'result' => false,
                        'message' => 'Invalid Patterns. Pattern must have either %id% or %name% to uniquely identify a post or page.'
                    );
                    ;
                }
            }
        }
    }
    return array('result' => true);
}

function auto_url_bulk_generate($posts) {
    $count = array();
    $count['Links Total'] = count($posts);
    $types = auto_url_get_post_types();

    $patterns = json_decode(get_option(AU_OPTION_PATTERN_NAME), true);

    $patterns['category'] = isset($patterns['category']) && !empty($patterns['category']) ? array_filter($patterns['category']) : array();
    $patterns['tag'] = isset($patterns['tag']) && !empty($patterns['tag']) ? array_filter($patterns['tag']) : array();

    //generate tag url
    if (!empty($patterns['tag'])) {
        for ($i = 0; $i < count($posts); $i++) {
            foreach ($patterns['tag'] as $id => $pattern) {
                if (has_tag($id, $posts[$i]->ID)) {
                    if (auto_url_generate_url($posts[$i], $pattern)) {
                        $count['Tag links generated'] = isset($count['Tag links generated']) ? $count['Tag links generated'] + 1 : 1;
                        unset($posts[$i]);
                    }
                }
            }
        }
    }
    $posts = array_values($posts);

    //generate category url
    if (!empty($patterns['category'])) {
        for ($i = 0; $i < count($posts); $i++) {
            foreach ($patterns['category'] as $id => $pattern) {
                if (in_category($id, $posts[$i]->ID)) {
                    if (auto_url_generate_url($posts[$i], $pattern)) {
                        $count['Category links generated'] = isset($count['Category links generated']) ? $count['Category links generated'] + 1 : 1;
                        unset($posts[$i]);
                    }
                }
            }
        }
    }
    $posts = array_values($posts);

    //generate posts url
    if (isset($patterns['type']) && !empty($patterns['type'])) {
        for ($i = 0; $i < count($posts); $i++) {
            foreach ($types as $type => $o) {
                if ($posts[$i]->post_type == $type && isset($patterns['type'][$type])) {
                    if (auto_url_generate_url($posts[$i], $patterns['type'][$type])) {
                        $count[$o->label . ' links generated'] = isset($count[$o->label . ' links generated']) ? $count[$o->label . ' links generated'] + 1 : 1;
                    }
                }
            }
        }
    }

    return $count;
}

function auto_url_generate_url($p, $pattern) {
    if (preg_match_all('/(%[a-z0-9_-]+%)/i', $pattern, $matches)) {
        $url = $pattern;
        $matches = isset($matches[0]) ? $matches[0] : null;

        if (!empty($p) && !empty($matches)) {
            foreach ($matches as $m) {
                $tokenValue = auto_url_token_value($p, $m);
                if (!empty($tokenValue)) {
                    $url = str_replace($m, $tokenValue, $url);
                } else {
                    $url = str_replace('/' . $m, $tokenValue, $url);
                    $pattern = str_replace('/' . $m, $tokenValue, $pattern);
                }
            }
        }
        $url = '/' . ltrim($url, "/");

        if (!preg_match('/(%[a-z0-9_-]+%)/i', $url)) {
            return auto_url_insert_url($p->ID, $url, $pattern);
        }
    }

    return false;
}

function auto_url_token_value($p, $token) {
    switch ($token) {
        case '%year%':
            return date('Y', strtotime($p->post_date));
            break;
        case '%monthnum%':
            return date('m', strtotime($p->post_date));
            break;
        case '%day%':
            return date('d', strtotime($p->post_date));
            break;
        case '%hour%':
            return date('G', strtotime($p->post_date));
            break;
        case '%minute%':
            return date('i', strtotime($p->post_date));
            break;
        case '%second%':
            return date('s', strtotime($p->post_date));
            break;
        case '%id%':
            return $p->ID;
            break;
        case '%name%':
            if ($p->post_type == 'attachment')
                return auto_url_generate_slug($p->post_title);
            else
                return $p->post_name;
            break;
        case '%namepath%':
            if ($p->post_type == 'page') {
                return auto_url_get_page_path($p->ID);
            }
            break;
        case '%category%':
            if ($p->post_type != 'page') {
                $cats = wp_get_post_categories($p->ID);
                if (count($cats)) {
                    $cat = get_category($cats[0]);
                    if (!empty($cat))
                        return $cat->slug;
                }
            }
            break;
        case '%categories%':
            if ($p->post_type != 'page') {
                $cats = wp_get_post_categories($p->ID);

                $catName = '';
                foreach ($cats as $cat_id) {
                    $cat = get_category($cat_id);
                    if (!empty($cat))
                        $catName .= $cat->slug . '/';
                }
                return trim($catName, '/');
            }
            break;
        case '%categorypath%':
            if ($p->post_type != 'page') {
                $cats = wp_get_post_categories($p->ID);
                $catName = '';

                if (count($cats) > 0) {
                    $c = get_category($cats[0]);
                    $catName = $c->slug;

                    while (!empty($c->parent)) {
                        $c = get_category($c->parent);
                        $catName = $c->slug . '/' . $catName;
                    }
                    return $catName;
                }
            }
            break;
        case '%blogname%':
            return auto_url_generate_slug(get_option('blogname'));
            break;
        case '%tag%':
            if ($p->post_type != 'page') {
                $tags = wp_get_post_tags($p->ID);
                if (!empty($tags)) {
                    return $tags[0]->slug;
                }
            }
            break;
        case '%tags%':
            if ($p->post_type != 'page') {
                $tags = wp_get_post_tags($p->ID);

                $tagName = '';
                foreach ($tags as $tag) {
                    if (!empty($tag)) {
                        $tagName .= $tag->slug . '/';
                    }
                }
                return trim($tagName, '/');
            }
            break;
        case '%author%':
            $author = get_userdata($p->post_author);
            if (!empty($author)) {
                $name = !empty($author->display_name) ? $author->display_name : $author->nickname;
                return auto_url_generate_slug($name);
            }
            break;
        default:
            break;
    }
    return '';
}

/*
 * permalink filter
 */

function auto_url_post_link_filter($permalink, $p = array(), $name = '') {
    global $current_screen;

    if (!is_array($p) && is_numeric($p))
        $p = get_page($p);

    if (!is_admin() || (in_array($current_screen->id, array('post', 'edit-post', 'page', 'edit-page')))) {
        if (!empty($p)) {
            $autoUrl = auto_url_get_url($p->ID);
            if (!empty($autoUrl)) {
                switch ($p->post_type) {
                    case 'post':
                    case 'page':
                    case 'attachment':
                        return rtrim(get_option('siteurl'), "/") . $autoUrl->link;
                        break;
                    default:
                        break;
                }
            }
        }
    }

    return $permalink;
}

add_filter('attachment_link', 'auto_url_post_link_filter', 10, 3);
add_filter('page_link', 'auto_url_post_link_filter', 10, 3);
add_filter('post_link', 'auto_url_post_link_filter', 10, 3);

/*
 * 
 */

function auto_url_query_vars_filter($vars) {
    global $removeTokens, $multiPartTokens;

    $link = rtrim(str_replace(get_bloginfo('url'), '', auto_url_current_url()), '/');
	$linkParts = explode("?", $link);
	$query = "";
	if(count($linkParts)>1)
	{
		$link = rtrim($linkParts[0], '/');
		$query = $linkParts[1];
	}
	
    $autoUrl = auto_url_get_url_by_link($link);
	
    if (!empty($autoUrl)) {
        foreach ($removeTokens as $token) {
            if (strstr($autoUrl->pattern, $token)) {
                $tokenValue = auto_url_token_value(get_post($autoUrl->post_id), $token);

                if (!empty($tokenValue)) {
                    $link = str_replace($tokenValue, '', $link);
                    $autoUrl->pattern = str_replace($token, '', $autoUrl->pattern);
                }
            }
        }

        foreach ($multiPartTokens as $token) {
            if (strstr($autoUrl->pattern, $token)) {
                $tokenValue = auto_url_token_value(get_post($autoUrl->post_id), $token);
                if (!empty($tokenValue)) {
                    $link = str_replace($tokenValue, 'placeholder', $link);
                }
            }
        }

        $links = array_filter(explode('/', $autoUrl->pattern));
        $parts = array_filter(explode('/', $link));

        if (count($links) == count($parts)) {
            $vars = auto_url_fill_vars($links, $parts, $autoUrl);
        }
    }

    return $vars;
}

//add_filter('query_vars', 'auto_url_query_vars_filter');
add_filter('request', 'auto_url_query_vars_filter');

function auto_url_fill_vars($patterns, $values, $p) {
    $translate = array();

    if ($p->post_type == 'page') {
        if ($i = array_search('%name%', $patterns)) {
            $values[$i] = auto_url_get_page_path($p->post_id);
        }
    }

    switch ($p->post_type) {
        case 'page':
            $translate['%namepath%'] = 'pagename';
            $translate['%name%'] = 'pagename';
            $translate['%id%'] = 'page_id';
            break;
        case 'attachment':
            $translate['%id%'] = 'attachment_id';
            break;
        default:
            $translate['%name%'] = 'name';
            $translate['%id%'] = 'p';
            break;
    }

    $replacement = array();
    foreach ($translate as $t => $v) {
        if ($i = array_search($t, $patterns)) {
            $replacement[$v] = $values[$i];
        }
    }

    return $replacement;
}

?>