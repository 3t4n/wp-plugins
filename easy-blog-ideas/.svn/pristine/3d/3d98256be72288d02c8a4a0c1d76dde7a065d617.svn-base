<?php
/**
* Plugin Name: Easy Blog Ideas
* Plugin URI: https://easyblogideas.com
* Description: Need inspiration for your next blog post? Just type some keywords ... and Easy Blog Ideas shows popular and trending topics in your niche, using social media data.
* Version: 1.0
* Author: EasyBlogIdeas
* Author URI: https://easyblogideas.com
* License: GPL2
* Text Domain: __pig_
* Domain Path: /languages
*/
/*
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

define("PIG_PLUGIN_NAME__", "Easy Blog Ideas");
define("PIG_PLUGIN_SLUG__", "__pig_");
define("PIG_VERSION__", 1.0);
define("PIG_DIR__", trailingslashit(plugin_dir_path(__FILE__)));
define("PIG_URL__", plugin_dir_url(__FILE__));
define("PIG_ROOT__", trailingslashit(plugins_url("", __FILE__)));
define("PIG_RESOURCES__", PIG_ROOT__ . "resources/");
define("PIG_IMAGES__", PIG_RESOURCES__ . "images/");
define("PIG_TIMEOUT__", 120);
define("PIG_DEBUG__", false);
define("PIG_TEST__", false);
define("PIG_API_PROD_BASE__", "https://easyblogideas.com");
define("PIG_API_TEST_BASE__", "http://localhost:81");
define("PIG_API_BASE__", PIG_TEST__ ? PIG_API_TEST_BASE__ : PIG_API_PROD_BASE__);
define("PIG_API__", PIG_API_BASE__ . "/wp-json/__pig_server_/v1/");
define("PIG_PREMIUM_URL__", "https://easyblogideas.com/premium/");


if (PIG_DEBUG__) {
    @error_reporting(E_ALL);
    @ini_set("display_errors", "1");
}

/**
 * Abort loading if WordPress is upgrading
 */
if (defined("WP_INSTALLING") && WP_INSTALLING) return;

include_once PIG_DIR__ . "resources/admin/includes/messages.php";

class PostIdeasGenerator
{

    private $error;
    private $notice;

    public function __construct()
    {
        @mkdir(PIG_DIR__ . "tmp");

        register_activation_hook(__FILE__ , array($this, "pig_activate"));
        register_deactivation_hook(__FILE__ , array($this, "pig_deactivate"));

        $this->loadHooks();
    }

    private function loadHooks()
    {
        add_action("init", array($this, "pig_register"));
        add_action("admin_enqueue_scripts", array($this, "pig_includeResources"));
        add_action("plugins_loaded", array($this, "pig_i18n"));
        add_action("admin_menu", array($this, "pig_add_menu"), 9);
        add_action("admin_menu", array($this, "pig_add_menu_pro"));
        add_action("wp_ajax_" . PIG_PLUGIN_SLUG__, array($this, "ajax"));
        add_action("pre_get_posts", array($this, "pig_pre_get_posts"));
        add_action("wp_dashboard_setup", array($this, "pig_widget_add_widget"));
        add_action("activated_plugin", array($this, "pig_activated_plugin"));
        add_action("pig_email_alerts_daily", array($this, "pig_email_alerts_daily"));
        add_action("pig_email_alerts_weekly", array($this, "pig_email_alerts_weekly"));
        add_action("pig_email_alerts_monthly", array($this, "pig_email_alerts_monthly"));
        add_action("pig_daily", array($this, "pig_daily"));
        add_action("admin_head", array($this, "pig_admin_head"));

        add_filter("bulk_actions-edit-pig_bookmark", array($this, "pig_bulkaction"));
        add_filter("manage_edit-pig_bookmark_sortable_columns", array($this, "pig_sortable_columns"));
        add_filter("pig_search_term", array($this, "pig_search_term"), 10, 2);
        add_filter("bulk_actions-edit-pig_email", array($this, "pig_bulkaction"));
        add_filter("cron_schedules", array($this, "pig_cron_schedules"));
        add_filter("pig_alerts_per_email", array($this, "pig_alerts_per_email"));
        add_filter("pig_rss_feed_link", array($this, "pig_rss_feed_link"), 10, 2);
        add_filter("plugin_row_meta", array($this, "pig_add_links"), 10, 2);
    }

    function pig_add_links($plugin_meta, $plugin_file){
        $pro   = apply_filters("pig_pro", false);
		if ( $plugin_file == plugin_basename( __FILE__ ) && !$pro) {
			$plugin_meta[] = sprintf(
				'<a href="' . admin_url("admin.php?page=" . PIG_PLUGIN_SLUG__ . "1") . '"><span class="pig-gopro">%s</span></a>',
				esc_html__( "Go Pro", PIG_PLUGIN_SLUG__ )
			);
		}

		return $plugin_meta;
    }

    function pig_rss_feed_link($null, $id)
    {
        global $PIG_MESSAGES;

        $defaults   = self::getOption("defaults");

        $link       = sprintf($PIG_MESSAGES['free_upgrade_rss'], "<a href='" . PIG_PREMIUM_URL__ . "' target='_blank'>", "</a>", $defaults["free"]["price"]);
        return apply_filters("pig_pro_rss_feed_link", $link, $id, false);
    }

    function pig_alerts_per_email($null)
    {
        $pro        = apply_filters("pig_pro_activated", false);
        $limit      = 0;
        if ($pro === false) {
            $defaults   = self::getOption("defaults");
            $defaults   = $defaults[($pro === true ? "pro" : "free")];
            $limit      = $defaults["alerts"];
        }
        return apply_filters("pig_pro_alerts_per_email", $limit);
    }

    function pig_admin_head()
    {
        if ($this->pig_email_can_add()) {
        ?>
    <script>
    jQuery(function(){
        jQuery("body.post-type-pig_email .wrap h1").append('<a href="<?php echo admin_url("admin.php?tab=email&page=" . PIG_PLUGIN_SLUG__);?>" class="page-title-action"><?php _e("Add New", PIG_PLUGIN_SLUG__);?></a>');
    });
    </script>
    <?php
        }
    }

    function pig_cron_schedules($schedules)
    {
        $schedules["weekly"] = array(
            "interval" => 604800,
            "display" => __("Once Weekly")
        );
        $schedules["monthly"] = array(
            "interval" => 2592000,
            "display" => __("Once Monthly")
        );
        return $schedules;
    }

    function pig_email_alerts_monthly()
    {
        $this->pig_email_alerts("monthly");
    }

    function pig_email_alerts_weekly()
    {
        $this->pig_email_alerts("weekly");
    }

    function pig_email_alerts_daily()
    {
        do_action("pig_check_license");
        $this->getDefaults();
        $this->pig_email_alerts("daily");
    }

    function pig_daily()
    {
        $pro        = apply_filters("pig_pro_activated", false);
        $defaults   = self::getOption("defaults");
        $limit      = $defaults[($pro === true ? "pro" : "free")]["limit"];
        self::setSearchesLeft(null, $limit);
    }

    private function pig_email_can_add()
    {
        $pro        = apply_filters("pig_pro_activated", false);
        $defaults   = self::getOption("defaults");
        $limit      = $defaults[($pro === true ? "pro" : "free")]["email"];

        $emails     = get_posts(array(
            "post_type"     => "pig_email",
            "fields"        => "ids",
            "numberposts"   => 999,
        ));

        return count($emails) < $limit;
    }

    private function pig_email_alerts($freq)
    {
        $alerts     = get_posts(array(
                "post_type"     => "pig_email",
                "post_status"   => "publish",
                "meta_query"    => array(
                    array(
                        "key" => PIG_PLUGIN_SLUG__ . "frequency",
                        "value" => $freq
                    ),
                    array(
                        "key" => PIG_PLUGIN_SLUG__ . "active",
                        "value" => 1
                    )
                )
        ));

        if (!$alerts) return;

        $this->processEmailAlerts($alerts);
    }

    private function processEmailAlerts($alerts) {
        $emails         = array();
        @set_time_limit(0);
        foreach ($alerts as $alert) {
            $type       = self::getPostMeta($alert->ID, "type");
            if (!empty($type)) {
                $type   = " type:" . $type;
            }

            $search     = apply_filters("pig_search_term", $alert->post_title, $type);

            $result     = self::callEpictions(
                            $search,
                            self::getPostMeta($alert->ID, "range"),
                            self::getPostMeta($alert->ID, "sort")
            );

            if (is_wp_error($result)) {
                self::writeDebug("pig_email_alerts error fetching results from server " . print_r($result,true), true);
                return;
            }
            
            $now        = $result["response"]["result"]["response"]["results"];
            $body       = $this->getEmailData($alert->ID, $now);
            if ($body) {
                $emails[]   = array(
                                "body"      => $body,
                                "to"        => self::getPostMeta($alert->ID, "email"),
                                "subject"   => PIG_PLUGIN_NAME__ . " " . __("email alert for", PIG_PLUGIN_NAME__) . " " . $alert->post_title,
                                "keyword"   => $alert->post_title,
                );
            } else {
                self::writeDebug("pig_email_alerts no body found", true);
            }
        }

        $this->sendEmails($emails);
    }

    private function getEmailData($id, $now)
    {
        $prev       = self::getPostMeta($id, "prev");
        $num_alerts = apply_filters("pig_alerts_per_email", null);

        if (!$prev) {
            $prev   = array();
        } else {
            $prev   = json_decode($prev);
        }

        $titles         = array();
        $emails         = array();
        foreach ($now as $element) {
            // atleast one share
            if (intval($element["popularity"]["total"]["shares"]) == 0) {
                continue;
            }

            $title      = self::getTitle($element, 10000);
            $md5        = md5($title);
            if (empty($title) || in_array($md5, $prev)) {
                continue;
            }

            $titles[]   = $md5;
            if (count($emails) == $num_alerts) {
                break;
            }
            $emails[]   = array(
                            "title"     => $title,
                            "url"       => $element["url"],
                            "src"       => self::getSource($element),
                            "shares"    => $element["popularity"]["total"]["shares"],
            );
        }
        if ($titles) {
            self::setPostMeta($id, "prev", json_encode($titles));
        }
        return $emails;
    }

    private function sendEmails($emails)
    {
        @set_time_limit(PIG_TIMEOUT__);

        PostIdeasGenerator::callAPI(
            PIG_API__ . "mandrill/",
            array(
                "method"    => "post",
                "json"      => true,
            ),
            array(
                "emails"    => $emails,
                "url"       => admin_url("edit.php?post_type=pig_email"),
                "license"   => self::getOption("license"),
            ),
            array(
                "Accept"    => "application/json"
            )
        );
    }

    function pig_search_term($search, $type)
    {
        $domain     = "";
        $parts      = explode(" ", $search);
        if (count($parts) > 1) {
            $last   = end($parts);
            $last   = trim($last);
            if (strpos($last, ".") !== false) {
                $domain = " domain:" . $last;
                unset($parts[count($parts) - 1]);
                $search = "'" . implode(" ", $parts) . "'";
            }
        }
        $search     = $search . $domain . $type;
        return $search;
    }

    function pig_activated_plugin($plugin)
    {
        if( $plugin == plugin_basename( __FILE__ ) ) {
            exit( wp_redirect( admin_url( "admin.php?page=" .  PIG_PLUGIN_SLUG__) ) );
        }
    }

    function pig_widget_add_widget()
    {
        wp_add_dashboard_widget(
             "pig_widget",
             PIG_PLUGIN_NAME__,
             array($this, "pig_show_widget")
        );	
    }

    function pig_show_widget()
    {
        $bookmarks          = get_posts(array(
            "post_type"         => "pig_bookmark",
            "post_status"       => "publish",
            "numberposts"       => 10,
            "order"             => "DESC",
            "orderby"           => "post_date",
        ));

        ob_start();
        include_once PIG_DIR__ . "resources/admin/includes/widget.php";
        echo ob_get_clean();
    }

    function pig_sortable_columns($columns)
    {
        $columns["shares"]      = "pig-share";
        $columns["type"]        = "pig-type";
        $columns["titlex"]      = "title";
        $columns["src"]         = "pig-src";
        $columns["pub"]         = "pig-pub";
        return $columns;
    }

    function pig_pre_get_posts($query)
    {
        if (!is_admin()) return;

        $orderby = $query->get("orderby");

        switch ($orderby) {
            case "pig-share":
                $query->set("meta_key", PIG_PLUGIN_SLUG__ . "shares");
                $query->set("orderby", "meta_value_num");
                break;
            case "pig-type":
                $query->set("meta_key", PIG_PLUGIN_SLUG__ . "type");
                $query->set("orderby", "meta_value");
                break;
            case "pig-src":
                $query->set("meta_key", PIG_PLUGIN_SLUG__ . "src");
                $query->set("orderby", "meta_value");
                break;
            case "pig-pub":
                $query->set("meta_key", PIG_PLUGIN_SLUG__ . "publish");
                $query->set("orderby", "meta_value_num");
                break;
        }
    }

    function pig_bulkaction($actions)
    {
        unset($actions["edit"]);
        return $actions;
    }

    function pig_i18n()
    {
        $pluginDirName  = dirname(plugin_basename(__FILE__));
        $domain         = PIG_PLUGIN_SLUG__;
        $locale         = apply_filters("plugin_locale", get_locale(), $domain);
        load_textdomain($domain, WP_LANG_DIR . "/" . $pluginDirName . "/" . $domain . "-" . $locale . ".mo");
        load_plugin_textdomain($domain, "", $pluginDirName . "/resources/lang/");
    }

    function pig_add_menu()
    {
        add_menu_page(PIG_PLUGIN_NAME__, PIG_PLUGIN_NAME__, "manage_options", PIG_PLUGIN_SLUG__, array($this, "pig_settings"), "dashicons-lightbulb");
        add_submenu_page(PIG_PLUGIN_SLUG__, PIG_PLUGIN_NAME__, __("Find Ideas", PIG_PLUGIN_SLUG__), "manage_options", PIG_PLUGIN_SLUG__, array($this, "pig_settings"));
    }

    function pig_add_menu_pro()
    {
        $pro    = apply_filters("pig_pro", false);
        if (!$pro) {
            add_submenu_page(PIG_PLUGIN_SLUG__, PIG_PLUGIN_NAME__, __("Go Pro", PIG_PLUGIN_SLUG__) . " <span class='dashicons dashicons-star-filled'></span>", "manage_options", PIG_PLUGIN_SLUG__ . "1", array($this, "pig_settings_go_pro"));
        }
    }

    function pig_settings_go_pro()
    {
        global $PIG_MESSAGES;

        $defaults   = self::getOption("defaults");
        $price      = $defaults["free"]["price"];

        include_once PIG_DIR__ . "resources/admin/includes/gopro.php";
    }

    function pig_settings()
    {
        global $PIG_MESSAGES;

        if (isset($_POST["pig-submit"]) && wp_verify_nonce($_POST["nonce"], $_POST["tab"])) {
            switch ($_POST["tab"]) {
                case "search":
                    if (isset($_POST["show-images-old"])) {
                        self::setOption("show-images", isset($_POST["show-images"]) ? $_POST["show-images"] : 0);
                    }
                    $current_page           = isset($_POST["search-page"]) ? $_POST["search-page"] : 1;
                    $results                = $this->initSearch($current_page - 1);
                    if (is_wp_error($results)) {
                        if (!empty($results->get_error_message())) {
                            $this->error    = sprintf(__("An error occurred with reason: %s", PIG_PLUGIN_SLUG__), $results->get_error_message());
                        } else {
                            $this->error    = sprintf(__("An error occurred with reason: %s", PIG_PLUGIN_SLUG__), $results->get_error_code());
                        }
                    } else {
                        list($results, $num)    = $results;

                        $pages                  = null;
                        if (apply_filters("pig_pro_activated", false)) {
                            $pages              = $this->getPagination($current_page, $num);
                        }
                    }
                    break;
                case "email":
                    $id = wp_insert_post(array(
                        "ID"            => isset($_POST["pigemailid"]) && $_POST["pigemailid"] ? $_POST["pigemailid"] : 0,
                        "post_type"     => "pig_email",
                        "post_status"   => "publish",
                        "post_title"    => $_POST["search-q"]
                    ));

                    self::setPostMeta($id, "sort", $_POST["search-sort"]);
                    if (!empty($_POST["search-type"])) {
                        self::setPostMeta($id, "type", $_POST["search-type"]);
                    }
                    self::setPostMeta($id, "email", $_POST["email"]);
                    self::setPostMeta($id, "frequency", $_POST["freq"]);
                    self::setPostMeta($id, "range", $_POST["freq"] == "daily" ? "24h" : ($_POST["freq"] == "monthly" ? "1m" : "7d"));
                    self::setPostMeta($id, "active", 1);

                    if ( $_POST["freq"] != "daily" ) {
                        $post   = get_post( $id );
                        $this->processEmailAlerts( array( $post ) );
                    }

                    break;
            }
        }

        include_once PIG_DIR__ . "resources/admin/includes/settings.php";
    }

    function pig_includeResources()
    {
        global $PIG_MESSAGES;


        $defaults   = self::getOption("defaults");
        $pro        = apply_filters("pig_pro_activated", false);
        $title      = ($pro === true ? "Premium" : "Free") . " " . __("Limits", PIG_PLUGIN_SLUG__);
        list($content, $reached) = $this->getLimitsDescription();

        wp_enqueue_script("pig", PIG_RESOURCES__ . "admin/js/pig.js", array("jquery", "wp-pointer"));
        wp_localize_script("pig", "pig", array(
            "ajax"      => array(
                "action"            => PIG_PLUGIN_SLUG__,
                "nonce"             => wp_create_nonce(PIG_PLUGIN_SLUG__),
            ),
            "pointer"           => array(
                "html"      => sprintf(
                                    "<h3> %s </h3> <p> %s </p>",
                                    $title,
                                    $content
                ),
                "reached"   => $reached,
            ),
            "l10n"      => array(
                "no_email"      => $PIG_MESSAGES['email_atleast_one'],
            ),
        ));

        wp_enqueue_style("wp-pointer");
        wp_register_style("pig", PIG_RESOURCES__ . "admin/css/pig.css");
        wp_enqueue_style("pig");
    }

    function pig_register()
    {
		// Create custom post type
		register_post_type("pig_bookmark",
            array(
                    "labels" => array(
                        "name" 					=>	__("Bookmarks", PIG_PLUGIN_SLUG__),
                        "singular_name" 		=> 	__("Bookmark", PIG_PLUGIN_SLUG__),
                        "edit" 					=> 	__("Edit Bookmark", PIG_PLUGIN_SLUG__),
                        "edit_item" 			=> 	__("Edit Bookmark", PIG_PLUGIN_SLUG__),
                        "view" 					=> 	__("View Bookmarks", PIG_PLUGIN_SLUG__),
                        "view_item" 			=> 	__("View Bookmark", PIG_PLUGIN_SLUG__),
                        "not_found" 			=> 	__("No Bookmarks found", PIG_PLUGIN_SLUG__),
                        "not_found_in_trash"	=> 	__("No Bookmarks found in Trash", PIG_PLUGIN_SLUG__)
                    ),
                    "label"						=>	__("Bookmarks", PIG_PLUGIN_SLUG__),
                    "public" 					=>	false,
                    "publicly_queryable"        =>	false,
                    "show_ui"                   =>	true,
                    "show_in_nav_menus"         =>	true,
                    "show_in_menu"              =>	PIG_PLUGIN_SLUG__,
                    "query_var" 				=>	true,
                    "exclude_from_search" 		=>	true,
                    "has_archive" 				=>	true,
                    "map_meta_cap" 				=>	true,
                    "hierarchical" 				=>	false,
                    "can_export" 				=>	false,
                    "supports"                  =>  false,
                    "menu_icon"                 => "dashicons-heart",
                    "rewrite"                   => array("slug"=> "pigbookmark"),
                    "capabilities"              =>  array(
                        "create_posts"              => false,
                    ),
            )
        );

		register_post_type("pig_email",
            array(
                    "labels" => array(
                        "name" 					=>	__("Email Alerts", PIG_PLUGIN_SLUG__),
                        "singular_name" 		=> 	__("Email Alert", PIG_PLUGIN_SLUG__),
                        "edit" 					=> 	__("Edit Email Alert", PIG_PLUGIN_SLUG__),
                        "edit_item" 			=> 	__("Edit Email Alert", PIG_PLUGIN_SLUG__),
                        "view" 					=> 	__("View Email Alerts", PIG_PLUGIN_SLUG__),
                        "view_item" 			=> 	__("View Email Alerts", PIG_PLUGIN_SLUG__),
                        "not_found" 			=> 	__("No Email Alerts found", PIG_PLUGIN_SLUG__),
                        "not_found_in_trash"	=> 	__("No Email Alerts found in Trash", PIG_PLUGIN_SLUG__)
                    ),
                    "label"						=>	__("Email Alerts", PIG_PLUGIN_SLUG__),
                    "public" 					=>	false,
                    "publicly_queryable"        =>	false,
                    "show_ui"                   =>	true,
                    "show_in_nav_menus"         =>	true,
                    "show_in_menu"              =>	PIG_PLUGIN_SLUG__,
                    "query_var" 				=>	true,
                    "exclude_from_search" 		=>	true,
                    "has_archive" 				=>	true,
                    "map_meta_cap" 				=>	true,
                    "hierarchical" 				=>	false,
                    "can_export" 				=>	false,
                    "supports"                  =>  false,
                    "menu_icon"                 => "dashicons-heart",
                    "rewrite"                   => array("slug"=> "pigemail"),
                    "capabilities"              =>  array(
                        "create_posts"              => false,
                    ),
           )
       );

        flush_rewrite_rules();

        add_filter("post_row_actions", array($this, "pig_remove_row_actions"), 10, 2);
		add_filter("manage_edit-pig_bookmark_columns", array($this, "pig_add_columns_bookmark"));
        add_action("manage_pig_bookmark_posts_custom_column", array($this, "pig_manage_columns_bookmark"), 10, 2);

		add_filter("manage_edit-pig_email_columns", array($this, "pig_add_columns_email"));
        add_action("manage_pig_email_posts_custom_column", array($this, "pig_manage_columns_email"), 10, 2);

    }

	function pig_add_columns_email($columns)
    {
		$new_columns["cb"]          = "<input type=\"checkbox\" />";
		$new_columns["titlex"]      = __("Keywords", PIG_PLUGIN_SLUG__);
		$new_columns["type"]        = __("Type", PIG_PLUGIN_SLUG__);
		$new_columns["sort"]        = __("Sort", PIG_PLUGIN_SLUG__);
		$new_columns["email"]       = __("Email", PIG_PLUGIN_SLUG__);
        if (apply_filters("pig_pro_activated", false)) {
    		$new_columns["rss"]         = __("RSS Feed", PIG_PLUGIN_SLUG__);
        }
		$new_columns["freq"]        = __("Frequency", PIG_PLUGIN_SLUG__);
		$new_columns["date"]        = _x("Date", PIG_PLUGIN_SLUG__);
		$new_columns["actions"]     = __("Actions", PIG_PLUGIN_SLUG__);
	 
		return $new_columns;
	}

	function pig_manage_columns_email($column_name, $id)
    {
		switch ($column_name) {
			case "titlex":
                $post       = get_post($id);
                echo $post->post_title;
				break;
			case "type":
                $type       = self::getPostMeta($id, "type");
                if (empty($type)) {
                    $type   = "any";
                }
                echo $type;
				break;
			case "rss":
                echo apply_filters("pig_rss_feed_link", "", $id);
				break;
			case "sort":
                echo self::getPostMeta($id, "sort");
				break;
			case "email":
                echo self::getPostMeta($id, "email");
				break;
			case "freq":
                echo self::getPostMeta($id, "frequency");
				break;
			case "actions":
				printf("<a href='%s'>%s</a>", admin_url("admin.php?page=". PIG_PLUGIN_SLUG__ . "&tab=email&id=" . $id), __("Modify", PIG_PLUGIN_SLUG__));
                echo " | ";
                $action     = self::getPostMeta($id, "active") == 0 ? "Enable" : "Disable";
				printf("<a class='pig-email-toggle' href='%s' data-id='%d'>%s</a>", admin_url("edit.php?post_type=pig_email"), $id, __($action, PIG_PLUGIN_SLUG__));
				break;
			default:
				break;
		}
	}

	function pig_remove_row_actions($actions, $post)
    {
        if($post->post_type !== "pig_bookmark" || $post->post_type !== "pig_email") return $actions;

        unset($actions["view"]);
        unset($actions["edit"]);
        unset($actions["inline hide-if-no-js"]);

        return $actions;
    }

	function pig_add_columns_bookmark($columns)
    {
		$new_columns["cb"]          = "<input type=\"checkbox\" />";
		$new_columns["titlex"]      = __("Title", PIG_PLUGIN_SLUG__);
		$new_columns["type"]        = __("Type", PIG_PLUGIN_SLUG__);
		$new_columns["shares"]      = __("Engagements", PIG_PLUGIN_SLUG__);
		$new_columns["src"]         = __("Source", PIG_PLUGIN_SLUG__);
		$new_columns["pub"]         = __("Published Date", PIG_PLUGIN_SLUG__);
		$new_columns["actions"]     = __("Actions", PIG_PLUGIN_SLUG__);
	 
		return $new_columns;
	}

	function pig_manage_columns_bookmark($column_name, $id)
    {
		switch ($column_name) {
			case "pub":
                echo date("F j, Y", self::getPostMeta($id, "publish")/1000);
				break;
			case "titlex":
                $url        = self::getPostMeta($id, "url");
                $post       = get_post($id);
                echo "<a href='" . $url . "' target='_new'>" . $post->post_title . "</a>";
				break;
			case "type":
                echo self::getPostMeta($id, "type");
				break;
			case "shares":
                echo self::roundIt(self::getPostMeta($id, "shares"));
				break;
			case "src":
                echo self::getPostMeta($id, "src");
				break;
			case "actions":
                $epictions  = (array) self::getPostMeta($id, "epictions");
				printf("<span data-epic='%s' data-bookmark='%d'><span><span><a href='#' class='pig-post-draft'>%s</a></span></span></span>", esc_attr(json_encode($epictions)), $id, __("Create Draft", PIG_PLUGIN_SLUG__));
				break;
			default:
				break;
		}
	}

    function pig_activate()
    {
        @unlink(PIG_DIR__ . "tmp/log.log");

        wp_clear_scheduled_hook("pig_email_alerts_daily");
        wp_clear_scheduled_hook("pig_email_alerts_weekly");
        wp_clear_scheduled_hook("pig_email_alerts_monthly");
        wp_schedule_event(strtotime("midnight") - get_option("gmt_offset") * HOUR_IN_SECONDS, "daily", "pig_email_alerts_daily");
        wp_schedule_event(strtotime("midnight") - get_option("gmt_offset") * HOUR_IN_SECONDS, "weekly", "pig_email_alerts_weekly");
        wp_schedule_event(strtotime("midnight") - get_option("gmt_offset") * HOUR_IN_SECONDS, "monthly", "pig_email_alerts_monthly");
        wp_schedule_event(strtotime("midnight"), "daily", "pig_daily");
        self::setOption("show-images", 1);

        $this->getDefaults();
    }

    function pig_deactivate(){
        wp_clear_scheduled_hook("pig_email_alerts_daily");
        wp_clear_scheduled_hook("pig_email_alerts_weekly");
        wp_clear_scheduled_hook("pig_email_alerts_monthly");
        wp_clear_scheduled_hook("pig_daily");
    }

    function ajax()
    {
        check_ajax_referer(PIG_PLUGIN_SLUG__, "nonce");

        $action     = $_POST["_action"];

        if (in_array($action, array("draft", "bookmark"))) {
            $element    = (array) json_decode(stripslashes($_POST["_element"]));
            $bookmark   = isset($_POST["_bookmark"]) ? $_POST["_bookmark"] : "";
            if (!$element) return;
        } else {
            $id         = $_POST["id"];
            if (!$id) return;
        }

        switch ($action) {
            case "draft":
                $id = wp_insert_post(array(
                    "post_status"   => "draft",
                    "post_title"    => $element["display_title"],
                    "post_content"  => $element["description"] . "<p>Source: <a href='" . $element["url"] . "'>" . $element["url"] . "</a>",
                ));
                $shares     = (array) $element["popularity"];
                $shares     = (array) $shares["total"];
                $src        = (array) $element["publisher"];
                self::setPostMeta($id, "epictions", $element);
                self::setPostMeta($id, "shares", $shares["shares"]);
                self::setPostMeta($id, "type", $element["type"]);
                self::setPostMeta($id, "src", $src["name"]);
                self::setPostMeta($id, "url", $element["url"]);
                self::setPostMeta($id, "publish", $element["publish_time"]);
                if ($bookmark && is_int($bookmark)) wp_delete_post($bookmark, true);
                wp_send_json_success(array("redirect" => admin_url("post.php?action=edit&post=" . $id)));
                break;
            case "bookmark":
                $id = wp_insert_post(array(
                    "post_type"     => "pig_bookmark",
                    "post_status"   => "publish",
                    "post_title"    => $element["display_title"],
                    "post_content"  => $element["description"] . "<p></p><p>Source: <a href='" . $element["url"] . "'>" . $element["url"] . "</a>",
                ));
                $shares     = (array) $element["popularity"];
                $shares     = (array) $shares["total"];
                $src        = (array) $element["publisher"];
                self::setPostMeta($id, "epictions", $element);
                self::setPostMeta($id, "shares", $shares["shares"]);
                self::setPostMeta($id, "type", $element["type"]);
                self::setPostMeta($id, "src", $src["name"]);
                self::setPostMeta($id, "url", $element["url"]);
                self::setPostMeta($id, "publish", $element["publish_time"]);
                break;
            case "toggle":
                self::setPostMeta($id, "active", abs(self::getPostMeta($id, "active") - 1));
                wp_send_json_success(array("redirect" => admin_url("edit.php?post_type=pig_email")));
                break;
        }
        wp_die();
    }

    public function getLimitsDescription()
    {
        global $PIG_MESSAGES;

        $defaults   = self::getOption("defaults");

        $pro        = apply_filters("pig_pro_activated", false);
        $def        = $defaults[($pro === true ? "pro" : "free")];
        $link       = sprintf($PIG_MESSAGES['limit_search'], $defaults["pro"]["limit"], "<a href='" . PIG_PREMIUM_URL__ . "' target='_blank'>", "</a>", @$defaults["free"]["price"]);
        $msg        = array();
        $msg[]      = sprintf($PIG_MESSAGES['limit_searches'], __($pro === true ? "Premium" : "Free", PIG_PLUGIN_SLUG__), $def["limit"]);

        $reached    = false;
        $left       = self::getSearchesLeft(null);
        if ($left > 0) {
            $msg[]  = sprintf($PIG_MESSAGES['searches_left'], $left);
        } else {
            $msg[]  = $PIG_MESSAGES['search_limit_reached'];
            $reached    = true;
        }
        $msg[]      = sprintf($PIG_MESSAGES['search_limit_reset'], $def["limit"], self::getEOD());
        //$msg[]      = sprintf(__("Need more than %d daily credit? Please %scontact us%s.", PIG_PLUGIN_SLUG__), $def["limit"], "<a target='_blank' href='https://easyblogideas.com/contact/ '>", "</a>");
        $msg[]      = apply_filters("pig_pro_increase_limit", $link);

        return array(implode("<br><br>", $msg), $reached);
    }

    public function getEmailLimitsDescription()
    {
        global $PIG_MESSAGES;

        $defaults   = self::getOption("defaults");
        $defaults   = $defaults["free"];
        $msg        = array();
        $msg[]      = sprintf($PIG_MESSAGES['email_limits'], PIG_PLUGIN_NAME__, $defaults["email"]);
        $msg[]      = sprintf($PIG_MESSAGES['free_upgrade_email'], "<a href='" . PIG_PREMIUM_URL__ . "' target='_blank'>", "</a>", $defaults["price"]);

        return implode("<br><br>", $msg);
    }

    public static function getSource($result) {
        $src    = @$result["publisher"]["name"];
        if (empty($src)) {
            $url    = $result["url"];
            $arr    = explode("/", $url);
            $src    = $arr[2];
        }
        return $src;
    }

    public static function getTitle($result, $trim=90) {
        $title  = isset($result["display_title"]) ? $result["display_title"] : $result["title"];
        if ($trim) {
            $title  = self::getTrimmed($title, $trim);
        }
        return $title;
    }

    public static function getDescription($result, $trim=250) {
        $title  = isset($result["description"]) ? $result["description"] : "";
        if ($trim) {
            $title  = self::getTrimmed($title, $trim);
        }
        return $title;
    }

    public static function getTrimmed($string, $limit) {
        return strlen($string) > $limit ? substr($string, 0, $limit) . "..." : $string;
    }

    private function getPagination($current_page, $num)
    {
        $total          = intval($num);
        $pages          = array();
        for ($page = 0; $page < min($total, 5); $page++) {
            if ($page < 0 || $page > $total) continue;
            $pages[]    = $page + 1;
        }
        for ($page = $current_page - 3; $page < $current_page + 3; $page++) {
            if ($page < 0 || $page > $total) continue;
            $pages[]    = $page + 1;
        }
        for ($page = $total - 5; $page < $total; $page++) {
            if ($page < 0 || $page > $total) continue;
            $pages[]    = $page + 1;
        }
        $pages          = array_unique($pages);
        asort($pages);

        $head = $middle = $tail = array();
        $head           = array_slice($pages, 0, 5);
        if ($total > 5) {
            $middle     = array_slice($pages, 5, -5);
        }
        if ($total > 15) {
            $tail       = array_slice($pages, -5);
        }

        $final          = $head;
        if ($middle) {
            $final      = array_merge($final, array(-1), $middle);
        }
        if ($tail) {
            $final      = array_merge($final, array(-2), $tail);
        }
        return $final;
    }

    public static function callEpictions($q, $range, $sort, $page=0)
    {
        @set_time_limit(0);

        $result     = self::callAPI(
            PIG_API__ . "epictions/",
            array(
                "method"    => "post",
                "json"      => true,
            ),
            array(
                "q"             => $q,
                "sort"          => $sort,
                "range"         => $range,
                "page"          => $page,
                "license"       => self::getOption("license"),
            ),
            array(
                "Accept"            => "application/json"
            )
        );

        if (isset($result["response"]["searches-left"]) && strlen($result["response"]["searches-left"]) > 0) {
            self::setSearchesLeft(null, $result["response"]["searches-left"]);
        }

        if ($result["error"] !== 200) {
            return new WP_Error($result["response"]["code"], $result["response"]["message"]);
        }
        return $result;
    }

    private function initSearch($current_page)
    {
        $domain     = "";
        $search     = apply_filters("pig_pro_search_term", apply_filters("pig_search_term", $_POST["search-q"], ""));
        $limit      = apply_filters("pig_pro_search_limit", 10);

        $result     = self::callEpictions(
                        $search,
                        apply_filters("pig_pro_search_time_range", "3m"),
                        apply_filters("pig_pro_search_sort", "relevance"),
                        $current_page
        );

        if (is_wp_error($result)) {
            return $result;
        }

        $posts          = null;
        $response       = $result["response"]["result"]["response"];

        $num            = 0;
        if (is_array($response)) {
            $num        = $response["total"] / 25;
            $response   = $response["results"];
            $posts      = array();
            $urls       = array();
            foreach ($response as $element) {
                // atleast one share
                if (@intval($element["popularity"]["total"]["shares"]) == 0) {
                    continue;
                }
                $posts[]    = $element;
                $urls[]     = $element["url"];
            }
        }

        // check if any of these urls has already been bookmarked
        if ($urls) {
            $bookmarked         = array();
            foreach ($urls as $url) {
                $post           = get_posts(
                    array(
                        "post_type"     => "pig_bookmark",
                        "post_status"   => "publish",
                        "fields"        => "ids",
                        "meta_key"      => PIG_PLUGIN_SLUG__ . "url",
                        "meta_value"    => $url
                    )
                );

                if ($post) {
                    $bookmarked[]   = $url;
                }
            }

            $temp       = $posts;
            $posts      = array();
            foreach ($temp as $element) {
                if (in_array($element["url"], $bookmarked)) {
                    $element["pig-class"]   = "pig-done";
                    continue;
                }
                $posts[]    = $element;
            }
        }

        return array($posts, $num);
    }

    private static function getDefaults()
    {
        $result     = self::callAPI(
            PIG_API__ . "defaults/",
            array(
                "method"    => "post",
                "json"      => true,
            ),
            array(),
            array(
                "Accept"            => "application/json"
            )
        );

        self::setOption("defaults", $result["response"]);

        $searches_left  = self::getSearchesLeft("free");
        if (empty($searches_left)) {
            self::setSearchesLeft("free", $result["response"]["free"]["limit"]);
        }
    }

    private static function getEOD()
    {
        $midnight   = new DateTime();
        $midnight->setTimestamp(strtotime("tomorrow midnight"));

        $now        = new DateTime();
        $now->setTimestamp(time());
        $interval   = $now->diff($midnight);
        return $interval->format(__('%h hours %i minutes', PIG_PLUGIN_SLUG__));
    }

    public static function getSearchesLeft($type)
    {
        if (is_null($type)) {
            $pro    = apply_filters("pig_pro_activated", false);
            $type   = $pro === true ? "pro" : "free";
        }
        $left       = self::getOption("searches-left-" . $type);
        return $left;
    }

    public static function setSearchesLeft($type, $left)
    {
        if (is_null($type)) {
            $pro    = apply_filters("pig_pro_activated", false);
            $type   = $pro === true ? "pro" : "free";
        }
        self::setOption("searches-left-" . $type, $left);
    }

    /****************************************** Util functions ******************************************/
    public static function roundIt($num)
    {
        if ($num > 1000000) return round($num/1000000, 0) . "M";
        if ($num > 100000) return round($num/1000000, 1) . "M";
        if ($num > 1000) return round($num/1000, 0) . "K";
        return $num;
    }

    public static function callAPI($url, $props=array(), $params=array(), $headers=array())
    {
        $body       = null;
        $error      = null;
        $conn       = curl_init($url);

        curl_setopt($conn, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($conn, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($conn, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($conn, CURLOPT_HEADER, 0);
        curl_setopt($conn, CURLOPT_NOSIGNAL, 1);
        curl_setopt($conn, CURLOPT_TIMEOUT, PIG_TIMEOUT__);
        curl_setopt($conn, CURLOPT_CONNECTTIMEOUT, PIG_TIMEOUT__);

        if ($headers) {
            $header     = array();
            foreach ($headers as $key=>$val) {
                $header[]   = "$key: $val";
            }
            curl_setopt($conn, CURLOPT_HTTPHEADER, $header);
        }

        if ($props && isset($props["method"]) && $props["method"] === "post") {
            curl_setopt($conn, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)));
        }

        if ($props && isset($props["method"]) && $props["method"] === "json") {
            curl_setopt($conn, CURLOPT_POSTFIELDS, json_encode($params));
        }

        try {
            $body           = curl_exec($conn);
            $error          = curl_getinfo($conn, CURLINFO_HTTP_CODE);
        } catch (Exception $e) {
            self::writeDebug("Exception " . $e->getMessage(), true);
        }

        if (curl_errno($conn)) {
            $error          = curl_error($conn);
            self::writeDebug("curl_errno ".curl_error($conn), true);
        }

        curl_close($conn);

        if ($props && isset($props["json"]) && $props["json"]) {
            $body   = json_decode($body, true);
        }

        $array          = array(
            "response"  => $body,
            "error"     => $error,
        );

        self::writeDebug("Calling ". $url. " with fields = " . print_r($params, true) . " returning raw response " . print_r($body, true) . " and finally returning " . print_r($array,true));

        return $array;
    }

    /**
     * Writes to the file /tmp/log.log if DEBUG is on
     */
    public static function writeDebug($msg, $force=false)
    {
        if (PIG_DEBUG__ || $force) file_put_contents(PIG_DIR__ . "tmp/log.log", date("F j, Y H:i:s", current_time("timestamp")) . " - " . $msg."\n", FILE_APPEND);
    }

    public static function getOption($field, $clean=false)
    {
        $val = get_option(PIG_PLUGIN_SLUG__ . $field);
        return $clean ? htmlspecialchars($val) : $val;
    }

    public static function setOption($field, $value)
    {
        return update_option(PIG_PLUGIN_SLUG__ . $field, $value);
    }

    public static function deleteOption($field)
    {
        return delete_option(PIG_PLUGIN_SLUG__ . $field);
    }

    public static function getPostMeta($postID, $name, $single=true)
    {
        return get_post_meta($postID, PIG_PLUGIN_SLUG__ . $name, $single);
    }

    public static function setPostMeta($postID, $name, $value)
    {
        update_post_meta($postID, PIG_PLUGIN_SLUG__ . $name, $value);
    }

}

$__pig = new PostIdeasGenerator();
