<?php

class Awesome_Plugins_Team_Showcase_Public
{

    private $plugin_name;
    private $version;

    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version     = $version;

        add_shortcode("awesome-team-showcase", array($this, "display_awesome_team_showcase"));
        add_shortcode("awesome-team-member", array($this, "render_member_shortcode"));

        add_image_size('aws-team-showcase', 9999, 500, false);

        add_filter("the_content", array($this, "posts_connection"));
        add_filter("the_content", array($this, "the_content_filter"), 50);

        add_filter("aws_ts_get_skin", array($this, "fn_aws_ts_get_skin"), 10, 1);
        add_filter("aws_ts_get_skin_path", array($this, "fn_aws_ts_get_skin_path"), 10, 1);
        add_filter("aws_ts_get_views_path", array($this, "fn_aws_ts_get_views_path"), 10, 1);
        
    }

    public function enqueue_styles() {

        $included = get_option("aws_team_showcase_active_cssjs", true);

        $settings_flag = false;

        if (!empty($included) && isset($included["css"]) && intval($included["css"]) > 0)
        {
            $settings_flag = true;
        }

        global $post;
        $post_type_flag = false;

        if (get_post_type($post->ID) === "aws-showcase-teams" || get_post_type($post->ID) === "aws-showcase-members")
        {
            $post_type_flag = true;
        }

        $shortcode_flag = false;

        if (has_shortcode($post->post_content, 'awesome-team-showcase') || has_shortcode($post->post_content, 'awesome-team-member'))
        {
            $shortcode_flag = true;
        }


        if ($settings_flag && ( $post_type_flag === true || $shortcode_flag === true ))
        {
            wp_enqueue_style($this->plugin_name . "-public-css", plugin_dir_url(__FILE__) . 'css/awesome-plugins-team-showcase-public.css', array(), $this->version, 'all');
        }
    }

    public function enqueue_scripts() {

        $included = get_option("aws_team_showcase_active_cssjs", true);

        $settings_flag = false;

        if (!empty($included) && isset($included["js"]) && intval($included["js"]) > 0)
        {
            $settings_flag = true;
        }

        global $post;
        $post_type_flag = false;

        if (get_post_type($post->ID) === "aws-showcase-teams" || get_post_type($post->ID) === "aws-showcase-members")
        {
            $post_type_flag = true;
        }

        $shortcode_flag = false;

        if (has_shortcode($post->post_content, 'awesome-team-showcase') || has_shortcode($post->post_content, 'awesome-team-member'))
        {
            $shortcode_flag = true;
        }

        if ($settings_flag && ( $post_type_flag === true || $shortcode_flag === true ))
        {
            wp_enqueue_script($this->plugin_name . "-public-js", plugin_dir_url(__FILE__) . 'js/main.js', array('jquery', "jquery-ui-core"), $this->version, true);
        }
    }

    public function display_awesome_team_showcase($atts) {

        // Loads the script when shortcode is rendered. We are using the same script ID to prevent duplicated loading.
        wp_enqueue_style($this->plugin_name . "-public-css", plugin_dir_url(__FILE__) . 'css/awesome-plugins-team-showcase-public.css', array(), $this->version, 'all');
        wp_enqueue_script($this->plugin_name . "-public-js", plugin_dir_url(__FILE__) . 'js/main.js', array('jquery', "jquery-ui-core"), $this->version, true);

        ob_start();

        if (!isset($atts["id"]))
        {
            echo "Shortcode must have team showcase ID param";
            return ob_get_clean();
        }

        $team_id = $atts["id"];

        $team_post = get_post($team_id);

        if (is_wp_error($team_post))
        {
            _e("Wrong shortcode", $this->plugin_name);
            return ob_get_clean();
        }

        $team_settings = get_post_meta($team_id, "aws_team_settings", true);
        $skin          = apply_filters("aws_ts_get_skin", array("team_settings" => $team_settings));

        if (!isset($skin["skin_data"]))
        {
            echo __("No skin selected", $this->plugin_name);
            return ob_get_clean();
        }

        $skin = $skin["skin_data"];

        $this->check_skin_css($skin);

        $orderby = ( isset($skin["orderby"]) ? $skin["orderby"] : "asc" );
        $order   = ( isset($skin["order"]) ? $skin["order"] : "" );

        $teamshowcase_ids = get_post_meta($team_id, "aws_ts_members", true);

        $args = array(
            "post_type"     => "aws-showcase-members",
            "post_per_page" => -1,
            "post__in"      => $teamshowcase_ids,
            "orderby"       => $orderby,
            "order"         => $order,
        );

        $query = new WP_Query($args);

        $card_file = $skin["card_file"];
        $card_file = ( strpos($card_file, ".php.php") ? str_replace(".php.php", ".php", $card_file) : $card_file );

        $extrainfo       = ( isset($skin["extrainfo_action"]) && $skin["extrainfo_action"] !== "none" ? $skin["extrainfo_action"] : "none" );
        $extra_info_file = ( isset($skin["extrainfo_card_file"]) && $skin["extrainfo_card_file"] !== "none" ? $skin["extrainfo_card_file"] : "none" );
        $extra_info_file = ( strpos($extra_info_file, ".php.php") > 1 ? str_replace(".php.php", ".php", $extra_info_file) : $extra_info_file );
        
        echo "<div class='awesome-team-showcase' data-skin='" . $skin['id'] . "'>";
        $views_path = apply_filters("aws_ts_get_views_path", array("skin" => $skin, "path" => false));

        include $views_path["path"];

        wp_reset_query();
        wp_reset_postdata();

        echo "</div>";

        return ob_get_clean();
    }

    private function check_skin_css($skin) {

        if (!isset($skin["id"]) || $skin["id"] === "custom" || $skin["id"] === "")
        {
            return true;
        }

        $included = get_option("aws_team_showcase_active_cssjs", true);

        $load_style = true;

        if (!empty($included) && isset($included["css"]) && intval($included["css"]) < 1)
        {
            return false;
        }

        $skin_path_url = array();
        $skin_path_url = apply_filters("aws_ts_get_skin_path", array("id" => $skin["id"]));

        $skin_path = $skin_path_url["path"] . $skin["id"] . "/style.css";
        $skin_url  = $skin_path_url["url"] . $skin["id"] . "/style.css";

        if ($load_style && file_exists($skin_path))
        {
            wp_enqueue_style("aws-teamshowcase-skin-" . $skin["id"], $skin_url, array(), $this->version, 'all');
        }

        return true;
    }

    public function posts_connection($content) {

        global $post;

        $showcases = get_posts(array("post_type" => "aws-showcase-teams", "posts_per_page" => -1));

        foreach ($showcases as $sc):

            $sc_con_ID = get_post_meta($sc->ID, "aws_team_post_connected", true);
            $sc_con_ID = (is_array($sc_con_ID) ? $sc_con_ID : array());

            if (in_array($post->ID, $sc_con_ID))
            {

                ob_start();
                echo do_shortcode("[awesome-team-showcase id='$sc->ID']");
                $sc_view = ob_get_clean();

                $content = $content . " " . $sc_view;
            }

        endforeach;

        return $content;
    }

    public function the_content_filter($content) {

        global $post;
        global $wp_query;

        $default_values = array(
            "teams"                => "yes",
            "members"              => "yes",
            "team_card_position"   => "before",
            "member_card_position" => "before",
        );

        $aws_ts_posts = get_option("aws_ts_posts");
        $aws_ts_posts = (is_array($aws_ts_posts) && !empty($aws_ts_posts) ? $aws_ts_posts : $default_values);

        if (get_post_type($post->ID) === "aws-showcase-teams")
        {

            $team_card_position = ( isset($aws_ts_posts["team_card_position"]) ? $aws_ts_posts["team_card_position"] : "" );

            if ($team_card_position === "before")
            {
                $content = do_shortcode("[awesome-team-showcase id='$post->ID']") . $content;
            }
            else if ($team_card_position === "after")
            {
                $content = $content . do_shortcode("[awesome-team-showcase id='$post->ID']");
            }
        }
        else if (get_post_type($post->ID) === "aws-showcase-members")
        {

            if (isset($wp_query->query["post_type"]) && $wp_query->query["post_type"] === "aws-showcase-members")
            {

                $member_card_position = ( isset($aws_ts_posts["member_card_position"]) ? $aws_ts_posts["member_card_position"] : "" );

                if ($member_card_position === "before")
                {
                    $content = do_shortcode("[awesome-team-member id='$post->ID']") . $content;
                }
                else if ($member_card_position === "after")
                {
                    $content = $content . do_shortcode("[awesome-team-member id='$post->ID']");
                }
            }
        }

        return $content;
    }

    public function render_member_shortcode($atts) {

        // Loads the script when shortcode is rendered. We are using the same script ID to prevent duplicated loading.
        wp_enqueue_style($this->plugin_name . "-public-css", plugin_dir_url(__FILE__) . 'css/awesome-plugins-team-showcase-public.css', array(), $this->version, 'all');
        wp_enqueue_script($this->plugin_name . "-public-js", plugin_dir_url(__FILE__) . 'js/main.js', array('jquery', "jquery-ui-core"), $this->version, true);

        ob_start();

        if (!is_array($atts) || !isset($atts["id"]))
        {
            return ob_get_clean();
        }

        $member_id   = $atts["id"];
        $member_post = get_post($member_id);

        $aws_ts_posts       = get_option("aws_ts_posts");
        $member_link_action = ( isset($aws_ts_posts["member_link_action"]) ? $aws_ts_posts["member_link_action"] : false );

        $card_file = AWESOME_PLUGINS_TEAM_SHOWCASE_DIR . "/public/partials/cards/showcase-member.php";

        $meta_card = "sections/awesome-plugins-team-showcase/member.php";


        if (file_exists(get_stylesheet_directory() . "/$meta_card.php"))
        {
            $card_file = get_stylesheet_directory() . "/$meta_card.php";
        }

        $args = array("p" => $member_id, "post_type" => "aws-showcase-members");

        $query = new WP_Query($args);

        if ($query->have_posts()):

            $default_values = array(
                "teams"                => "yes",
                "members"              => "yes",
                "team_card_position"   => "after",
                "member_card_position" => "after",
            );

            $aws_ts_posts = get_option("aws_ts_posts");
            $aws_ts_posts = (is_array($aws_ts_posts) && !empty($aws_ts_posts) ? $aws_ts_posts : $default_values);

            $team_card_position   = ( isset($aws_ts_posts["team_card_position"]) ? $aws_ts_posts["team_card_position"] : "" );
            $member_card_position = ( isset($aws_ts_posts["member_card_position"]) ? $aws_ts_posts["member_card_position"] : "" );


            $member_link_action = false;


            if (isset($aws_ts_posts["members"]) && $aws_ts_posts["members"] === "yes"):

                $member_link_action = ( isset($aws_ts_posts["member_link_action"]) ? $aws_ts_posts["member_link_action"] : false );

            endif;

            while ($query->have_posts()):
                $query->the_post();

                include $card_file;

            endwhile;

        endif;

        return ob_get_clean();
    }

    public function fn_aws_ts_get_skin_path($skin_array) {

        $result = array(
            "id"   => $skin_array["id"],
            "path" => AWESOME_PLUGINS_TEAM_SHOWCASE_DIR . "/skins/",
            "url"  => plugins_url("/skins/", AWESOME_PLUGINS_TEAM_SHOWCASE_FILE)
        );

        return $result;
    }

    public function fn_aws_ts_get_views_path($path_and_skin) {

        $skin = $path_and_skin["skin"];

        if ($skin["grid"] === "carousel"):

            wp_enqueue_script("owl-script", plugin_dir_url(__FILE__) . 'js/owl.carousel.js', array('jquery'), false, true);

            $path = AWESOME_PLUGINS_TEAM_SHOWCASE_DIR . "/public/partials/main-carousel.php";

        elseif ($skin["grid"] === "table"):

            if (!isset($skin["settings"]))
            {
                $skin["settings"] = array();
            }

            if (!isset($skin["settings"]["tablehead"]))
            {
                $skin["settings"]["tablehead"] = array("Users", "Function", "Email", "Phone", "Socials");
            }

            $path = AWESOME_PLUGINS_TEAM_SHOWCASE_DIR . "/public/partials/main-table.php";

        else:

            $path = AWESOME_PLUGINS_TEAM_SHOWCASE_DIR . "/public/partials/main.php";

        endif;

        return array(
            "path" => $path,
            "skin" => $skin
        );
        
    }

    public function fn_aws_ts_get_skin($values) {

        $skin_data = array();

        $team_settings = ( isset($values["team_settings"]) ? $values["team_settings"] : array() );
        $skin_id       = ( isset($team_settings["skin"]) ? $team_settings["skin"] : false );

        $skin_data["id"] = $skin_id;
        $skin_path_url   = apply_filters("aws_ts_get_skin_path", array("id" => $skin_id));
        $config_file     = $skin_path_url["path"] . $skin_id . "/config.php";

        if (!file_exists($config_file))
        {
            return array("team_settings" => $team_settings, "error" => "Config doesn't exists");
        }

        $skin_config = include $skin_path_url["path"] . $skin_id . "/config.php";


        if (isset($skin_config["settings"]) && is_array($skin_config["settings"])):

            foreach ($skin_config["settings"] as $key => $setting_key):

                if ($key !== "tablehead")
                {

                    if (isset($team_settings[$setting_key]))
                    {
                        $skin_data[$setting_key] = $team_settings[$setting_key];
                    }
                    elseif (isset($skin_config[$setting_key]))
                    {
                        $skin_data[$setting_key] = $skin_config[$setting_key];
                    }
                }
                elseif ($key === "tablehead")
                {

                    $skin_data["tablehead"] = $setting_key;
                }


            endforeach;

        endif;

        $skin_data["grid"] = $skin_config["grid"];

        $skin_data["columns"] = $skin_config["columns"];
        $skin_data["columns"] = ( isset($team_settings["columns"]) ? $team_settings["columns"] : $skin_data["columns"] );


        $skin_path = $skin_path_url["path"] . $skin_id;

        $card_file = __DIR__ . "/partials/cards/showcase-default.php";

        if (file_exists($skin_path . "/card.php")):

            $card_file = $skin_path . "/card.php";

        endif;

        // EXTRA INFO //////////////
        $stored_extrainfo = $team_settings["extrainfo"];

        // The skin allows extrainfo settings?
        if (isset($skin_data["extrainfo_actions"]) && is_array($skin_data["extrainfo_actions"]) && !empty($skin_data["extrainfo_actions"]))
        {
            $skin_data["extrainfo"] = (isset($team_settings["extrainfo"]) && $team_settings["extrainfo"] !== "" ? $team_settings["extrainfo"] : "none");
            $skin_data["extrainfo"] = ( $skin_data["extrainfo"] === "none" && isset($skin_config["extrainfo"]) ? $skin_config["extrainfo"] : "none");
        }
        else
        {
            //NO UPDATED, and uses the config.php value.
            $skin_data["extrainfo"] = ( isset($skin_config["extrainfo"]) ? $skin_config["extrainfo"] : "none" );
        }

        $skin_data["card_file"] = $card_file;

        $info_file = $skin_path_url["path"] . $skin_id . "/info.php";

        if (file_exists($info_file)):

            $skin_data["extrainfo_card_file"] = $info_file;

        endif;

        $skin_data["orderby"] = ( isset($team_settings["orderby"]) ? $team_settings["orderby"] : "date" );
        $skin_data["order"]   = ( isset($team_settings["order"]) ? $team_settings["order"] : "ASC" );

        $return = array(
            "team_settings" => $team_settings,
            "skin_data"     => $skin_data,
        );

        return $return;
    }

}
