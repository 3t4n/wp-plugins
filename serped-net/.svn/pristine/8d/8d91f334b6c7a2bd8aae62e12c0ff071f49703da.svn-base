<?php
/*
  Plugin Name: SERPed.net
  Plugin URI: https://serped.net/apps.php#wordpress-plugin
  Description: The SERPed.net plugin provides powerful SEO features to help you manage your sites, pages and internal links, set up analytics code, embed optin forms, display page metrics and more.
  Version: 4.6
  Author: SERPed
  Author URI: https://serped.net
  License: GPLv2 or later
  License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */
$icp_db_version = 39;
if (!defined('ABSPATH')) exit;

function srpd_plugin_path() {
    return dirname(__FILE__);
}
function srpd_root_path() {
    return plugin_dir_url(__FILE__);
}
include dirname(__FILE__) . '/inc/icp.functions.php';

function srpd_create_menus() {
    add_menu_page('SERPed.net', 'SERPed.net', 'manage_options', 'icp', 'srpd_settings', srpd_root_path() . 'img/logo.png');
    add_submenu_page('icp', 'Settings', 'Settings', 'manage_options', 'icp', 'srpd_settings', '');
    add_submenu_page('icp', 'Web Analytics', 'Web Analytics', 'manage_options', 'icp_tracking_code', 'srpd_tracking_code_page', '');
    add_submenu_page('icp', 'Site Auditor Pro', 'Site Auditor Pro', 'manage_options', 'icp_site_auditor_pro', 'srpd_site_auditor_pro_page', '');
    add_submenu_page('icp_site_auditor_pro', 'Add New', 'Add New', 'manage_options', 'icp_site_auditor_pro_add', 'srpd_site_auditor_pro_add_page', '');
    add_submenu_page('icp_site_auditor_pro', 'Edit', 'Edit', 'manage_options', 'icp_site_auditor_pro_edit', 'srpd_site_auditor_pro_add_page', '');
    add_submenu_page('icp', 'Link Projects', 'Link Projects', 'manage_options', 'icp_link_projects', 'srpd_link_projects_page', '');
    add_submenu_page('icp_link_projects', 'Add New', 'Add New', 'manage_options', 'icp_link_projects_add', 'srpd_link_projects_add_page', '');
    add_submenu_page('icp_link_projects', 'Edit Project', 'Edit Project', 'manage_options', 'icp_link_projects_edit', 'srpd_link_projects_edit_page', '');
    add_submenu_page('icp_link_projects', 'Check ShortLink', 'Check ShortLink', 'manage_options', 'icp_link_projects_check_shortlink', 'srpd_link_projects_check_shortlink_page', '');
    add_submenu_page('icp', 'Keyword Statistics', 'Keyword Statistics', 'manage_options', 'icp_keyword_stats', 'srpd_keyword_stats_page', '');
    add_submenu_page('icp_keyword_stats', 'Keyword Statistics CSV', 'Keyword Statistics CSV', 'manage_options', 'icp_keyword_stats_generate', 'srpd_keyword_stats_generate_page', '');
}

add_action('admin_menu', 'srpd_create_menus');

function srpd_filter_hyperlink_title($title) {
    global $wpdb, $post;

    // Ensure that $title is sanitized if it comes from user input
    $title = sanitize_text_field($title); // This sanitizes any user input for XSS protection.

    // Use $wpdb->prepare to ensure that queries are safely constructed
    $query = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}icp_projects", []);
    $result = $wpdb->get_results($query, OBJECT);

    foreach ($result as $project) {
        if ($project->headings == 1) {
            $res = srpd_content_helper($project, $title, $post->ID, 'title');
            $title = $res['content'];
        }
    }

    return $title;
}


function srpd_filter_hyperlink_comment($comment) {
    global $wpdb, $post;

    // Ensure that $comment is sanitized if it comes from user input
    $comment = sanitize_text_field($comment); // This sanitizes any user input for XSS protection.

    // Prepare the query using $wpdb->prepare() to ensure safety, even though this query has no dynamic user input
    $query = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}icp_projects", []);
    $result = $wpdb->get_results($query, OBJECT);

    foreach ($result as $project) {
        if ($project->comments == 1) {
            $res = srpd_content_helper($project, $comment, $post->ID, 'comment');
            $comment = $res['content'];
        }
    }

    return $comment;
}


function srpd_filter_hyperlink_keywords($content) {
    global $wpdb, $post;

    // Use $wpdb->prepare for SQL queries to prevent SQL injection
    $query = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "icp_projects");
    $result = $wpdb->get_results($query, OBJECT);

    // Safely retrieve post type and date
    $postType = sanitize_text_field(get_post_type());
    $postDate = sanitize_text_field(the_date('F-m-d H:i:s', '', '', false));
    $postDate = strtotime($postDate);

    foreach ($result as $project) {
        // Sanitize project properties
        $projDate = strtotime(sanitize_text_field($project->created_at));
        $content_changed = (!empty($project->content_changed)) ? json_decode($project->content_changed, true) : array();
        $content_changed_keys = array_keys($content_changed);

        // Sanitize and clean the "ignores" field
        $exclude = array_map('sanitize_text_field', explode(",", $project->ignores));

        foreach ($exclude as $key => $ex) {
            $exclude[$key] = trim($ex);
        };

        // Avoiding SQL injection: Ensure that dynamic values are properly validated and sanitized
        if (!in_array($post->ID, $exclude) && !in_array($post->post_name, $exclude)) {
            if ($project->posts == 1 && $postType == 'post') {
                if (($postDate > $projDate) && ($project->new == 1)) {
                    $res = srpd_content_helper($project, $content, $post->ID, 'content');
                    $content = $res['content'];
                } elseif (($postDate <= $projDate) && ($project->existing == 1)) {
                    $res = srpd_content_helper($project, $content, $post->ID, 'content');
                    $content = $res['content'];
                }
            };
            if ($project->pages == 1 && $postType == 'page') {
                if (($postDate > $projDate) && ($project->new == 1)) {
                    $res = srpd_content_helper($project, $content, $post->ID, 'content');
                    $content = $res['content'];
                } elseif (($postDate <= $projDate) && ($project->existing == 1)) {
                    $res = srpd_content_helper($project, $content, $post->ID, 'content');
                    $content = $res['content'];
                }
            };
        };
    }

    return $content;
}

function srpd_content_helper($project, $content, $post_id, $type) {
    global $wpdb;

    $keyword_stats = $wpdb->prefix . "icp_keyword_stats";
    $linksTable = $wpdb->prefix . "icp_project_links";
    $keywordsTable = $wpdb->prefix . "icp_project_keywords";

    // Prepare queries with prepared statements to prevent SQL injection
    $filters = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT pk.keyword keyword, pl.url link, ks.no_follow no_follow 
            FROM $keyword_stats ks, $linksTable pl, $keywordsTable pk 
            WHERE ks.type = %s AND ks.keyword_id = pk.id AND ks.link_id = pl.id 
            AND ks.post_id = %d AND ks.project_id = %d",
            $type,
            $post_id,
            $project->id
        )
    );

    $counter = $wpdb->num_rows;

    // If no follow weight exists for the project
    if ($project->no_follow_weight > 0) {
        $getCount = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM $keyword_stats WHERE no_follow = 1 AND project_id = %d",
                $project->id
            )
        );
        $kwrd_noFollow = $wpdb->num_rows;

        $getCount = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM $keyword_stats WHERE project_id = %d",
                $project->id
            )
        );
        $kwrd_added = $wpdb->num_rows;

        // If no follow links have not been added, add them
        if ($kwrd_noFollow == 0) {
            $noFollows = (int) (($kwrd_added * $project->no_follow_weight) / 100);
            $c = 0;
            foreach ($getCount as $kw1) {
                $wpdb->update(
                    $keyword_stats,
                    array('no_follow' => 1),
                    array('id' => $kw1->id),
                    null
                );
                $c++;
                if ($c >= $noFollows) break;
            }
        }
    }

    ////////////////////////////////////////////////

    $target = ($project->new_window == 1) ? ' target="_blank"' : '';
    if ($counter > 0) {
        foreach ($filters as $filter) {
            if ($filter->no_follow == 1) {
                $rel = ' rel="nofollow"';
                $noFollows--;
            } else {
                $rel = '';
            };
            $content = preg_replace(
                "/(?i)\b" . preg_quote($filter->keyword, '/') . "\b(?=[^<>]*(?:<\w|<\/[^a]|$))/",
                '<a href="' . esc_url($filter->link) . '"' . $target . $rel . ' >$0</a>',
                $content,
                1,
                $replaced
            );
        }
    } else {
        $keywords = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM $keywordsTable pk WHERE id_project_fk = %d ORDER BY RAND()",
                $project->id
            )
        );
        $addedLinks = array();

        foreach ($keywords as $keyword) {
            // Check if the keyword has been added already
            $getCount = $wpdb->get_results(
                $wpdb->prepare(
                    "SELECT * FROM $keyword_stats WHERE project_id = %d AND keyword_id = %d",
                    $project->id,
                    $keyword->id
                )
            );
            $kwrd_added = $wpdb->num_rows;

            $getCountPost = $wpdb->get_results(
                $wpdb->prepare(
                    "SELECT * FROM $keyword_stats WHERE project_id = %d AND post_id = %d",
                    $project->id,
                    $post_id
                )
            );
            $post_added = $wpdb->num_rows;

            if ($kwrd_added >= $project->max_keyword || $post_added >= $project->max_replace) {
                break;
            }

            // Avoid duplicate links by checking already added links
            $rel = '';
            $notIn = '';
            if (count($addedLinks) > 0) {
                $notIn = " AND url NOT IN ('" . implode("', '", array_map('esc_sql', $addedLinks)) . "')";
            }

            // Select a link to associate with the keyword
            $link = $wpdb->get_row(
                $wpdb->prepare(
                    "SELECT * FROM $linksTable WHERE id_project_fk = %d $notIn ORDER BY RAND() LIMIT 1",
                    $project->id
                )
            );

            if ($link != null) {
                $replaced = 0;
                // Add link to content with the keyword
                $content = preg_replace(
                    "/(?i)\b" . preg_quote($keyword->keyword, '/') . "\b(?=[^<>]*(?:<\w|<\/[^a]|$))/",
                    '$1<a href="' . esc_url($link->url) . '" ' . $target . '>$2</a>$3',
                    $content,
                    1,
                    $replaced
                );

                if ($replaced > 0) {
                    // Insert keyword stats into the database
                    $wpdb->insert(
                        $keyword_stats,
                        array(
                            'keyword_id' => $keyword->id,
                            'link_id' => $link->id,
                            'project_id' => $project->id,
                            'post_id' => $post_id,
                            'type' => $type
                        ),
                        array('%d', '%d', '%d', '%d', '%s')
                    );
                    $addedLinks[] = $link->url;
                }
            } else {
                continue;
            }
        }
    }

    // Return modified content
    return array('content' => $content, 'replaced' => $counter);
}

function srpd_clear_kstats_table($content) {
    global $wpdb, $post;

    // Ensure the post object exists and has a valid ID
    if (isset($post->ID) && is_numeric($post->ID)) {
        // Safely delete rows from the database
        $wpdb->delete(
            $wpdb->prefix . "icp_keyword_stats",
            array('post_id' => absint($post->ID)), // Ensure post ID is an integer
            array('%d') // Specify the format for the post_id value
        );
    }

    return $content;
}

add_filter('the_content', 'srpd_filter_hyperlink_keywords');
add_filter('content_save_pre', 'srpd_clear_kstats_table');
add_filter('comment_text', 'srpd_filter_hyperlink_comment');
add_filter('the_title', 'srpd_filter_hyperlink_title');

function srpd_settings() {
    include srpd_plugin_path() . '/inc/pages/icp.settings.php';
}

function srpd_site_auditor_pro_page() {
    include srpd_plugin_path() . '/inc/pages/icp.site.auditor.pro.php';
}

function srpd_site_auditor_pro_add_page() {
    include srpd_plugin_path() . '/inc/pages/icp.site.auditor.pro.add.php';
}

function srpd_tracking_code_page() {
    include srpd_plugin_path() . '/inc/pages/icp.tracking.code.php';
}

function srpd_link_projects_page() {
    include srpd_plugin_path() . '/inc/pages/icp.link.projects.php';
}

function srpd_link_projects_add_page() {
    include srpd_plugin_path() . '/inc/pages/icp.link.projects.add.php';
}

function srpd_link_projects_edit_page() {
    include srpd_plugin_path() . '/inc/pages/icp.link.projects.edit.php';
}

function srpd_link_projects_check_shortlink_page() {
    include srpd_plugin_path() . '/inc/pages/icp.auto.link.check.shortlink.php';
}

function srpd_keyword_stats_page() {
    include srpd_plugin_path() . '/inc/pages/icp.keyword.stats.php';
}

function srpd_inner_page() {
    include srpd_plugin_path() . '/inc/pages/icp.inner.php';
}

function srpd_keyword_stats_generate_page() {
    include srpd_plugin_path() . '/inc/pages/icp.keyword.stats.generate.php';
}

function srpd_add_tracking_code() {
    $trackingCode = '';
    $siteID = srpd_get_tracking_code();
    if (strlen($siteID) > 0 && (strpos($siteID, 'innercircleassets.com') > -1 || strpos($siteID, 'serped.net') > -1 || strpos($siteID, 'serpd.co') > -1 || strpos($siteID, 'serpd.org') > -1 || strpos($siteID, 'serpd.ws') > -1 || strpos($siteID, 'serped.co') > -1 || strpos($siteID, 'clickster.info') > -1 || strpos($siteID, 'trackingz.com') > -1 || strpos($siteID, 'tracktrack.co') > -1)) {
        $trackingCode = $tracking;
    } else if (strlen($siteID) > 0) {
        $domain = srpd_get_tracking_domain();
        $trackingCode = "<script type='text/javascript'>
                var _paq = _paq || [];
                _paq.push(['trackPageView']);
                _paq.push(['enableLinkTracking']);
                (function() {
                  var u=(('https:' == document.location.protocol) ? 'https' : 'http') + '://" . $domain . "/analytics/';
                  _paq.push(['setTrackerUrl', u+'piwik.php']);
                  _paq.push(['setSiteId', " . $siteID . "]);
                  var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
                  g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
                })();
            </script>";
    }
    echo $trackingCode;
}

function srpd_install() {
    global $wpdb;
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    $charset_collate = '';
    if ($wpdb->has_cap('collation')) {
        if (!empty($wpdb->charset))
            $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
        if (!empty($wpdb->collate))
            $charset_collate .= " COLLATE $wpdb->collate";
    };
    $table_name = $wpdb->prefix . "icp_links";
    $val = dbDelta('select 1 from ' . $table_name);
    if (count($val) > 0) {
        //DO NOTHING! IT EXISTS!
    } else {
        //I can't find it... Create table
        $sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		url VARCHAR(255) NOT NULL,
		slug VARCHAR(255) NOT NULL,
		shortlink_url VARCHAR(255) NOT NULL,
		title VARCHAR(50) NOT NULL,
		nofollow tinyint(1) DEFAULT 0 NOT NULL,
		redirect_type mediumint(9) DEFAULT 301 NOT NULL,
		created_at bigint(20) NOT NULL,
		PRIMARY KEY  (id)
		) {$charset_collate};";
        dbDelta($sql);
    }
    $table_name = $wpdb->prefix . "icp_projects";
    $val = dbDelta('select 1 from ' . $table_name);
    if (count($val) > 0) {
        //DO NOTHING! IT EXISTS!
    } else {
        //I can't find it... Create table
        $sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		project_name VARCHAR(55) NOT NULL,
		posts tinyint(1) DEFAULT 1 NOT NULL,
		pages tinyint(1) DEFAULT 1 NOT NULL,
		existing tinyint(1) DEFAULT 1 NOT NULL,
		new tinyint(1) DEFAULT 1 NOT NULL,
		comments tinyint(1) DEFAULT 1 NOT NULL,
		new_window tinyint(1) DEFAULT 1 NOT NULL,
		headings tinyint(1) DEFAULT 1 NOT NULL,
		max_replace int(20) DEFAULT 3 NOT NULL,
		max_keyword int(20) DEFAULT 1 NOT NULL,
		no_follow_weight int(10) DEFAULT 0 NOT NULL,
		content_changed text,
		ignores text,
		created_at bigint(20) NOT NULL,
		PRIMARY KEY  (id)
		) {$charset_collate};";
        dbDelta($sql);
    }
    $table_name = $wpdb->prefix . "icp_project_links";
    $val = dbDelta('select 1 from ' . $table_name);
    if (count($val) > 0) {
        //DO NOTHING! IT EXISTS!
    } else {
        //I can't find it... Create table
        $sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		id_project_fk mediumint(9) NOT NULL,
		url VARCHAR(255) NOT NULL,
		PRIMARY KEY  (id)
		) {$charset_collate};";
        dbDelta($sql);
    }
    $table_name = $wpdb->prefix . "icp_project_keywords";
    $val = dbDelta('select 1 from ' . $table_name);
    if (count($val) > 0) {
        //DO NOTHING! IT EXISTS!
    } else {
        //I can't find it... Create table
        $sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		id_project_fk mediumint(9) NOT NULL,
		keyword VARCHAR(55) NOT NULL,
		PRIMARY KEY  (id)
		) {$charset_collate};";
        dbDelta($sql);
    }
    $table_name = $wpdb->prefix . "icp_keyword_stats";
    $val = dbDelta('select 1 from ' . $table_name);
    if (count($val) > 0) {
        //DO NOTHING! IT EXISTS!
    } else {
        //I can't find it... Create table
        $sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		keyword_id mediumint(9) NOT NULL,
		link_id mediumint(9) NOT NULL,
		project_id mediumint(9) NOT NULL,
		post_id mediumint(9) NOT NULL,
		type VARCHAR(50) NOT NULL,
		no_follow tinyint(4) NOT NULL,
		PRIMARY KEY  (id)
		) {$charset_collate};";
        dbDelta($sql);
    }
    $table_name = $wpdb->prefix . "icp_sa_forms";
    $val = dbDelta('select 1 from ' . $table_name);
    if (count($val) > 0) {
        //DO NOTHING! IT EXISTS!
    } else {
        //I can't find it... Create table
        $sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		icp_sa_name VARCHAR(255) NULL,
		icp_sa_pid VARCHAR(255) NULL,
		icp_optin_box_style VARCHAR(255) NULL,
		icp_bg_color VARCHAR(255) NULL,
                icp_bg_color_val VARCHAR(255) NULL,
		icp_title_color VARCHAR(255) NULL,
		icp_text_color VARCHAR(255) NULL,
		icp_button_color VARCHAR(255) NULL,
		icp_img VARCHAR(255) NULL,
		icp_frm_design VARCHAR(255) NULL,
		icp_title VARCHAR(255) NULL,
		icp_text VARCHAR(255) NULL,
		icp_placeholder VARCHAR(255) NULL,
		icp_submit_btn VARCHAR(255) NULL,
		PRIMARY KEY  (id)
		) {$charset_collate};";
        dbDelta($sql);
    }
}

function srpd_uninstall() {
    global $wpdb;

    // Delete plugin options
    $options = [
        'serped_db_version',
        'icp_wp_auto_update',
        'icp_plugins_auto_update',
        'icp_themes_auto_update',
        'icp_plugin_key',
        'icp_tracking_code',
        'widget_srpd_sa_widget'
    ];

    foreach ($options as $option) {
        delete_option($option);
    }

    // List of tables to drop
    $tables = [
        $wpdb->prefix . "icp_links",
        $wpdb->prefix . "icp_projects",
        $wpdb->prefix . "icp_project_links",
        $wpdb->prefix . "icp_project_keywords",
        $wpdb->prefix . "icp_keyword_stats",
        $wpdb->prefix . "icp_sa_forms"
    ];

    // Drop each table securely
    foreach ($tables as $table) {
        $wpdb->query("DROP TABLE IF EXISTS " . esc_sql($table));
    }
}

register_uninstall_hook(__FILE__, 'srpd_uninstall');
add_filter('wp_footer', 'srpd_add_tracking_code');
if (get_option('serped_db_version') == '' || get_option('serped_db_version') < $icp_db_version) {
    update_option('serped_db_version', $icp_db_version);
    srpd_install();
}
//remove wp generator
remove_action('wp_head', 'wp_generator');
//rename readme.file
if (file_exists($_SERVER["DOCUMENT_ROOT"] . '/readme.html'))
    rename($_SERVER["DOCUMENT_ROOT"] . '/readme.html', $_SERVER["DOCUMENT_ROOT"] . '/readme-Renamed.html');
//stop folders from browsing
srpd_update_htaccess('disable_folder_browsing');
//custom column
add_filter('manage_posts_columns', 'srpd_serped_innerLink_column');
add_filter('manage_pages_columns', 'srpd_serped_innerLink_column');
add_action('manage_posts_custom_column', 'srpd_serped_innerLink_column_content', 10, 2);
add_action('manage_pages_custom_column', 'srpd_serped_innerLink_column_content', 10, 2);
//auto update options
$icp_wp_auto_update = (get_option('icp_wp_auto_update') == '') ? false : true;
$icp_plugins_auto_update = (get_option('icp_plugins_auto_update') == '') ? false : true;
$icp_themes_auto_update = (get_option('icp_themes_auto_update') == '') ? false : true;
if ($icp_wp_auto_update)
    add_filter('auto_update_core', '__return_true');
else
    add_filter('auto_update_core', '__return_false');
if ($icp_wp_auto_update)
    add_filter('auto_update_plugin', '__return_true');
else
    add_filter('auto_update_plugin', '__return_false');
if ($icp_wp_auto_update)
    add_filter('auto_update_theme', '__return_true');
else
    add_filter('auto_update_theme', '__return_false');

function srpd_sa_form_preview_shortcode($atts) {
    global $wpdb;

    // Sanitize the 'id' parameter
    $id = isset($atts['id']) ? intval($atts['id']) : 0;

    $icpFrm = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM " . $wpdb->prefix . "icp_sa_forms WHERE id = %d",
            $id
        ),
        ARRAY_A
    );

    if ($wpdb->num_rows == 0)
        return '';

    $icp_form = srpd_prepare_form($icpFrm);
    return $icp_form;
}


function srpd_prepare_form($icpFrm) {
    // Validate that $icpFrm has the expected structure
    if (empty($icpFrm) || !is_array($icpFrm) || !isset($icpFrm[0])) {
        return ''; // Return an empty string if the input is invalid
    }

    // Select the appropriate form template based on opt-in style and form design
    if ($icpFrm[0]['icp_optin_box_style'] === 'hello') {
        $icp_form = srpd_get_sa_form('topbar' . esc_html($icpFrm[0]['icp_frm_design']) . '.html');
    } else {
        $icp_form = srpd_get_sa_form('form' . esc_html($icpFrm[0]['icp_frm_design']) . '.html');
    }

    // Replace placeholders in the form with actual values from $icpFrm
    $icp_form = str_replace("{title}", esc_html($icpFrm[0]['icp_title']), $icp_form);
    $icp_form = str_replace("{desc}", esc_html($icpFrm[0]['icp_text']), $icp_form);
    $icp_form = str_replace("{url_placeholder}", esc_html($icpFrm[0]['icp_placeholder']), $icp_form);
    $icp_form = str_replace("{btn_text}", esc_html($icpFrm[0]['icp_submit_btn']), $icp_form);
    $icp_form = str_replace("{apikey}", esc_html($icpFrm[0]['icp_sa_pid']), $icp_form);
    $icp_form = str_replace("{bg_color}", esc_html($icpFrm[0]['icp_bg_color']), $icp_form);
    $icp_form = str_replace("{title_color}", esc_html($icpFrm[0]['icp_title_color']), $icp_form);
    $icp_form = str_replace("{desc_color}", esc_html($icpFrm[0]['icp_text_color']), $icp_form);
    $icp_form = str_replace("{submit_color}", esc_html($icpFrm[0]['icp_button_color']), $icp_form);

    // Handle optional fields with default values
    $submit_bg_color = !empty($icpFrm[0]['icp_button_bg_color']) ? esc_html($icpFrm[0]['icp_button_bg_color']) : '#4E3043';
    $submit_border_color = !empty($icpFrm[0]['icp_button_border_color']) ? esc_html($icpFrm[0]['icp_button_border_color']) : '#a5a5a5';
    $icp_form = str_replace("{submit_bg_color}", $submit_bg_color, $icp_form);
    $icp_form = str_replace("{submit_border_color}", $submit_border_color, $icp_form);

    $icp_form = str_replace("{form_id}", intval($icpFrm[0]['id']), $icp_form);
    $icp_form = str_replace("{plugins_url}", esc_url(srpd_root_path() . 'img/'), $icp_form);

    // Add a close button if the form style includes 'slide'
    $closeBtn = '';
    if (strpos($icpFrm[0]['icp_optin_box_style'], 'slide') !== false) {
        $closeBtn = '<div style="position:absolute; top:10px; right:5px;">
                        <a href="javascript:;" style="color:red" 
                        onclick="jQuery(\'.icp_form-' . esc_js($icpFrm[0]['icp_frm_design']) . '-' . esc_js($icpFrm[0]['id']) . '\').hide();">X</a>
                     </div>';
    }
    $icp_form = str_replace("{close_btn}", $closeBtn, $icp_form);

    // Default color settings
    $icp_font_color = '#2c3e50';
    $icp_font_color_opposite = '#ffffff';
    $icp_btn_color = '#4E3043';
    $icp_layer_color = '#2C3E50';
    $icp_orgIMG = $icpFrm[0]['icp_img'];
    if ($icpFrm[0]['icp_img'] > 1 && ($icpFrm[0]['icp_frm_design'] == 2 || $icpFrm[0]['icp_frm_design'] == 3))
        $icpFrm[0]['icp_img'] = $icpFrm[0]['icp_img'] . '_white';
    $icp_whiteFC = array("#34495e", "#2980b9", "#9b59b6", "#8e44ad", "#2c3e50", "#d35400", "#e74c3c", "#c0392b", "#7f8c8d");
    foreach ($icp_whiteFC as $wfc) {
        if ($wfc == $icpFrm[0]['icp_bg_color']) {
            $icp_font_color = '#ffffff';
            $icp_font_color_opposite = '#2c3e50';
            $icp_btn_color = '#f1c40f';
            $icp_layer_color = '#cccccc';
            if ($icp_orgIMG > 1) {
                if ($icpFrm[0]['icp_frm_design'] == 2 || $icpFrm[0]['icp_frm_design'] == 3)
                    $icpFrm[0]['icp_img'] = str_replace("_white", "", $icpFrm[0]['icp_img']);
                else
                    $icpFrm[0]['icp_img'] = $icpFrm[0]['icp_img'] . '_white';
            }
            break;
        }
    }
    // Handle the image display
    $icp_img = intval($icpFrm[0]['icp_img']);
    if ($icp_img > 0) {
        $img_path = srpd_root_path() . 'img/sa_bg_' . $icp_img . '.png';
        $icp_form = str_replace("{img}", '<img src="' . esc_url($img_path) . '" />', $icp_form);
    } else {
        $icp_form = str_replace("{img}", '', $icp_form);
    }

    // Final color settings for font and buttons
    $icp_form = str_replace("{font_color}", esc_html($icp_font_color), $icp_form);
    $icp_form = str_replace("{font_color_opposite}", esc_html($icp_font_color_opposite), $icp_form);
    $icp_form = str_replace("{btn_color}", esc_html($icp_btn_color), $icp_form);
    $icp_form = str_replace("{layer_color}", esc_html($icp_layer_color), $icp_form);

    // Return the final form
    return $icp_form;
}

//include SiteAuditoPro ShortCode
add_shortcode('icp_sa_form', 'srpd_sa_form_preview_shortcode');
add_filter('widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode');

//SlideIn Box
function srpd_slide_in_box() {
    global $wpdb;

    // Use prepared statements for SQL queries to prevent SQL injection
    $sql = "SELECT * FROM " . $wpdb->prefix . "icp_sa_forms WHERE icp_optin_box_style LIKE %s ORDER BY id DESC LIMIT 1";
    $icpFrm = $wpdb->get_results($wpdb->prepare($sql, '%slide%'), ARRAY_A);

    if ($wpdb->num_rows == 0) { // No slide found
        return;
    }

    $icp_form = srpd_prepare_form($icpFrm);
    $tmpVal = explode("|", $icpFrm[0]['icp_optin_box_style']);
    $slidein_percent = $tmpVal[2];
    $slidein_position = $tmpVal[1];

    echo '
    <style>
    .icp_sa_slide_in_box {
        position: fixed;
        bottom: 10px;
        ' . esc_html($slidein_position) . ':-300px;
        width: 300px;
        z-index: 10000;
    }
    </style>
    <div class="icp_sa_slide_in_box">' . $icp_form . '</div>
    <script>
    jQuery(window).scroll(function() {    
        icp_sa_form_tmpVal = jQuery(document).height()/' . esc_js($slidein_percent) . ';
        icp_sa_form_currPos = jQuery(\'.icp_sa_slide_in_box\').css("' . esc_js($slidein_position) . '");
        scrollBottom = jQuery(window).scrollTop() + jQuery(window).height();
        if (scrollBottom > icp_sa_form_tmpVal.toFixed(0) && icp_sa_form_currPos == "-300px") 
            jQuery(\'.icp_sa_slide_in_box\').stop().animate({ ' . esc_js($slidein_position) . ': \'0px\' });
    });
    jQuery("#TB_ajaxWindowTitle").text("werwr");
    </script>
    ';
}

function srpd_hello_topbar() {
    global $wpdb;

    // Use prepared statements for SQL queries to prevent SQL injection
    $sql = "SELECT * FROM " . $wpdb->prefix . "icp_sa_forms WHERE icp_optin_box_style = %s ORDER BY id DESC LIMIT 1";
    $icpFrm = $wpdb->get_results($wpdb->prepare($sql, 'hello'), ARRAY_A);

    if ($wpdb->num_rows == 0) { // No form found
        return;
    }

    $icp_form = srpd_prepare_form($icpFrm);
    echo $icp_form;
}

add_filter('wp_footer', 'srpd_slide_in_box');
add_filter('wp_footer', 'srpd_hello_topbar');

///custom SiteAuditorPro Widget
class SRPD_sa_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            // Base ID of your widget
            'srpd_sa_widget',
            // Widget name will appear in UI
            __('SERPed.net Site Auditor Pro', 'srpd_sa_widget_domain'),
            // Widget description
            array('description' => __('Embed your SERPed.net Site Auditor Pro Form.', 'srpd_sa_widget_domain'),)
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);

        // Cast formID to integer to ensure it's safe
        $formID = (int) $instance['formID'];

        // Use prepared statements to prevent SQL injection
        global $wpdb;
        $sql = "SELECT * FROM " . $wpdb->prefix . "icp_sa_forms WHERE id = %d AND icp_optin_box_style = %s";
        $icpFrm = $wpdb->get_results($wpdb->prepare($sql, $formID, 'form'), ARRAY_A);

        if ($wpdb->num_rows == 0) {
            delete_option('widget_srpd_sa_widget');
            echo '';
        } else {
            echo $args['before_widget'];
            if (!empty($title)) {
                echo $args['before_title'] . $title . $args['after_title'];
            }
            echo srpd_prepare_form($icpFrm);
            $icp_form = srpd_prepare_form($icpFrm); // This line seems redundant, as the result is already echoed above
            echo $args['after_widget'];
        }
    }

    // Widget Backend 
    public function form($instance) {
        // Set default values for title and formID if not set
        if (isset($instance['title'])) {
            $title = $instance['title'];
            $formID = $instance['formID'];
        } else {
            $title = __('New title', 'srpd_sa_widget_domain');
            $formID = ''; // Default to an empty string if no formID is provided
        }

        // Widget admin form
?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />

            <label for="<?php echo $this->get_field_id('formID'); ?>"><?php _e('Choose Form to Embed:'); ?></label>
            <?php
            global $wpdb;

            // Use prepared statements for SQL queries to prevent SQL injection
            $sql = "SELECT * FROM " . $wpdb->prefix . "icp_sa_forms WHERE icp_optin_box_style = %s ORDER BY id DESC";
            $forms = $wpdb->get_results($wpdb->prepare($sql, 'form'), ARRAY_A);

            // If no forms are found, display a message
            if (count($forms) == 0) {
                echo 'You haven\'t added any form yet. <a href="' . esc_url(admin_url('admin.php?page=icp_site_auditor_pro_add')) . '">Click here</a> to add a new form.';
            } else {
            ?>
                <select name="<?= $this->get_field_name('formID') ?>" id="<?= $this->get_field_id('formID') ?>" class="widefat">
                    <?php
                    foreach ($forms as $frm) {
                        // Escape form name to prevent potential issues
                        $selected = ($frm['id'] == $formID) ? 'selected' : '';
                        echo '<option value="' . esc_attr($frm['id']) . '" ' . $selected . '>' . esc_html($frm['icp_sa_name']) . '</option>';
                    }
                    ?>
                </select>
            <?php } ?>
        </p>
    <?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['formID'] = (!empty($new_instance['formID'])) ? strip_tags($new_instance['formID']) : '';
        return $instance;
    }
}

class SRPD_sm_widget extends WP_Widget {

    function __construct() {
        add_action('load-widgets.php', array(&$this, 'my_custom_load'));
        parent::__construct(
            // Base ID of your widget
            'srpd_sm_widget',
            // Widget name will appear in UI
            __('SERPed Metrics', 'srpd_sm_widget_domain'),
            // Widget description
            array('description' => __('Add SERPed Metrics In your Site', 'srpd_sm_widget_domain'),)
        );
    }
    function my_custom_load() {
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('my-script-handle', srpd_root_path() . '/js/wp-color-picker-alpha.js', array('wp-color-picker'));
    }
    // Creating widget front-end
    // This is where the action happens
    public function widget($args, $instance) {

        global $frame_path;

        // Predefined metric names for display
        $matrics_arr = array(
            'pr' => 'SERPed&nbsp;Rank',
            'moz_rank' => 'MozRank',
            'domain_authority' => 'Domain&nbsp;Authority',
            'page_authority' => 'Page&nbsp;Authority',
            'trust_flow' => 'Trust&nbsp;Flow',
            'citation_flow' => 'Citation&nbsp;Flow',
            'external_backlinks' => 'Backlinks',
            'referring_domains' => 'Referring&nbsp;Domains',
            'referring_ips' => 'Referring&nbsp;IPs'
        );

        // Set widget title and form ID
        $title = isset($instance['title']) ? $instance['title'] : '';

        // Get the current domain URL
        $domain = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

        // Encrypt domain for use as cache key
        $key = srpd_encrypt_decrypt(str_replace(array("http://", "https://", "www."), "", $domain), 'e');
        $cache_key = substr($key, 0, 170);

        // Get cached metric values
        $matrics_val = get_transient($cache_key);

        $show = true;

        // If no cache, fetch new data from external source
        if (false === $matrics_val) {
            $frame_path = "https://members.serped.net";

            // Make the request to external service
            $check = wp_remote_get($frame_path . "/plugin/plugin.serped.matrics.php?plugin_key=" . srpd_get_plugin_key() . "&url=" . urlencode($domain));

            // Check if request was successful
            if (is_wp_error($check)) {
                $show = false;
            } else {
                // Parse response body
                $check = wp_remote_retrieve_body($check);
                $res = json_decode($check);

                // If status is true, extract metrics data
                if ($res->status == true) {
                    $matrics = $res->data;
                    $matrics_val = array();

                    foreach ($matrics as $key => $val) {
                        if ($key == 'moz') {
                            $moz = json_decode($val);
                            foreach ($moz->moz as $key => $val) {
                                $matrics_val[$key] = $val;
                            }
                        }
                        if ($key == 'majestic') {
                            $majestic = json_decode($val);
                            foreach ($majestic as $key => $val) {
                                $matrics_val[$key] = $val;
                            }
                        }
                        if ($key == 'general') {
                            $general = json_decode($val);
                            foreach ($general->general as $key => $val) {
                                $matrics_val[$key] = $val;
                            }
                        }
                    }
                    // Cache the metrics for 7 days
                    set_transient($cache_key, $matrics_val, 7 * 24 * 60 * 60);
                } else {
                    $show = false;
                }
            }
        }

        // Output styling
        echo '<style> 
                table, caption, tbody, tfoot, thead, tr, th, td { 
                    border: none !important; 
                    padding: 0px !important; 
                    vertical-align: baseline; 
                    background: transparent; 
                    border-collapse: unset; 
                    font-size: 14px; 
                    word-break: unset !important; 
                } 
                .widget_srpd_sm_widget { padding: 10px; } 
                #' . esc_attr($args['widget_id']) . '{ 
                    background-color: ' . esc_attr($instance['srpd_widget_background_color']) . ' !important; 
                    border-radius: 5px !important; 
                } 
              </style>';

        if ($show == true) {

            echo $args['before_widget'];

            if (!empty($title))
                echo $args['before_title'] . esc_html($title) . $args['after_title'];

            echo "<table style='width:100%;border-collapse: unset;'>";

            // Display SERP metrics
            if ($instance['hide_metrics'] !== 'on' || $matrics_val['pr'] > 0) {
                $serp_val = (!empty($matrics_val['pr'])) ? number_format($matrics_val['pr'], 2) : 0;
                echo "<tr><td>" . esc_html($matrics_arr['pr']) . ": </td><td>" . esc_html($serp_val) . "</td></tr>";
            }

            // Display other metrics
            foreach ($instance['formID'] as $val) {
                if ($val == 'moz_rank') {
                    $value = (!empty($matrics_val[$val])) ? number_format($matrics_val[$val], 2) : 0;
                } else {
                    $value = (!empty($matrics_val[$val])) ? number_format($matrics_val[$val], 0) : 0;
                }
                if ($instance['hide_metrics'] !== 'on' || $value > 0) {
                    echo "<tr><td>" . esc_html($matrics_arr[$val]) . ": </td><td>" . esc_html($value) . "</td></tr>";
                }
            }
            echo '</div>';
            echo "</table>";

            // Affiliate link
            $affID = srpd_get_clickbank_id();
            $click_link = 'https://serped.net/';
            if ($affID != '') {
                $click_link = 'http://' . esc_url($affID) . '.serped.hop.clickbank.net/';
            }
            echo '<span style="font-size:13px;"> Data&nbsp;from&nbsp;<a style="color: #4A90E2;" href="' . esc_url($click_link) . '" target="_blank">SERPed.net</a></span>';

            echo $args['after_widget'];
        }
    }

    // Widget Backend 
    public function form($instance) {

        // Enabling error reporting for development (avoid this in production)
        if (isset($_GET['debug'])) {
            error_reporting(E_ALL);
            ini_set('display_errors', TRUE);
            ini_set('display_startup_errors', TRUE);
        }

        global $wpdb;

        // Define the available metrics
        $matrics_arr = array(
            'pr' => 'SERPed Rank',
            'moz_rank' => 'MozRank',
            'domain_authority' => 'Domain Authority',
            'page_authority' => 'Page Authority',
            'trust_flow' => 'Trust Flow',
            'citation_flow' => 'Citation Flow',
            'external_backlinks' => 'Backlinks',
            'referring_domains' => 'Referring Domains',
            'referring_ips' => 'Referring IPs'
        );

        $formID = [];

        if (isset($instance['title']) && !empty($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('', 'srpd_sm_widget_domain');
        }
        if (isset($instance['formID']) && !empty($instance['formID'])) {
            $formID = $instance['formID'];
        }

        // Widget admin form
    ?>
        <script type='text/javascript'>
            jQuery(document).ready(function($) {
                $('.color-picker').wpColorPicker();
            });
        </script>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('formID'); ?>"><?php _e('Select the metrics you want to display:'); ?></label> <br />
            <?php
            // Loop through the metrics array and generate checkboxes for each metric
            foreach ($matrics_arr as $key => $val) {
                $selected = (in_array($key, $formID)) ? 'checked="true"' : '';
                // Disable 'pr' checkbox by default
                if ($key == 'pr') {
                    $selected = 'checked="true" disabled="disabled"';
                }
                echo '<input type="checkbox" name="' . $this->get_field_name("formID") . '[]" value="' . esc_attr($key) . '"' . $selected . '  /> ' . esc_html($val) . '<br />';
            }
            $checked = '';
            if (isset($instance['hide_metrics']) && $instance['hide_metrics'] == 'on') {
                $checked = 'checked="true"';
            }
            ?>
            <br><input id="<?php echo $this->get_field_id('hide_metrics'); ?>" name="<?php echo $this->get_field_name('hide_metrics'); ?>" type="checkbox" <?= esc_attr($checked) ?> />
            <?php _e('Hide metrics with no value or a value equal to 0.'); ?>
        </p>

        <p>
            <strong>Background:</strong>
            <input type="text" name="<?php echo $this->get_field_name('srpd_widget_background_color'); ?>" id="<?php echo $this->get_field_name('srpd_widget_background_color'); ?>" value="<?= esc_attr($instance['srpd_widget_background_color'] ?? '') ?>" class="color-picker" data-alpha="true" />
        </p>

        <p>
            <strong>Note:</strong> This widget will only show on pages (homepage and inner pages) that have been added to Site Manager in your <a href="https://serped.net" target="_blank">SERPed.net</a> account.
        </p>
<?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['formID'] = (!empty($new_instance['formID'])) ? ($new_instance['formID']) : '';
        $instance['hide_metrics'] = (!empty($new_instance['hide_metrics']) && $new_instance['hide_metrics'] == 'on') ? ($new_instance['hide_metrics']) : '';
        $instance['srpd_widget_background_color'] = (!empty($new_instance['srpd_widget_background_color'])) ? ($new_instance['srpd_widget_background_color']) : '';

        return $instance;
    }
}

// Class wpb_widget ends here
// Register and load the widget
function srpd_sa_load_widget() {
    register_widget('srpd_sa_widget');
}

function srpd_sm_load_widget() {
    register_widget('srpd_sm_widget');
}

add_action('widgets_init', 'srpd_sa_load_widget');
add_action('widgets_init', 'srpd_sm_load_widget');
//add thickbox popup for POST/PAGE add to serped Link
add_action('init', 'srpd_my_plugin_init');

function srpd_my_plugin_init() {
    add_thickbox();
}
?>