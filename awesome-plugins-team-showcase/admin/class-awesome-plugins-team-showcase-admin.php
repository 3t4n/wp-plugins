<?php

class Awesome_Plugins_Team_Showcase_Admin
{

    private $plugin_name;
    private $version;
    private $folders_prevention;

    public function __construct($plugin_name, $version, $prevent_columns = false) {

        $this->plugin_name        = $plugin_name;
        $this->version            = $version;
        $this->folders_prevention = array(
            ".", "..", "__MACOSX", ".DS_Store", ".git", ".gitignore", ".idea"
        );

        //  POST AND META ------------------------------------------------------
        add_action('add_meta_boxes', array($this, 'add_metabox_teams'), 101);
        add_action('add_meta_boxes', array($this, 'add_metabox_members'), 102);
        add_action('save_post', array($this, 'save_metabox'), 10, 2);

        if (!$prevent_columns):

            add_filter('manage_aws-showcase-teams_posts_columns', array($this, 'aws_team_showcase_edit_columns'));
            add_filter('manage_aws-showcase-teams_posts_custom_column', array($this, 'aws_team_showcase_custom_columns'));

            add_filter('manage_aws-showcase-members_posts_columns', array($this, 'aws_team_showcase_edit_columns'));
            add_filter('manage_aws-showcase-members_posts_custom_column', array($this, 'aws_member_showcase_custom_columns'));

        endif;


        add_filter('mce_buttons_3', array($this, 'remove_bootstrap_buttons'), 999);
        add_filter('mce_buttons', array($this, 'remove_toggle_button'), 999);

        add_action('admin_menu', array($this, 'remove_submenus'));

        //  AJAX CALLS ---------------------------------------------------------

        add_action('wp_ajax_team_save_data', array($this, 'team_save_data'));

        //  SHORTCODES ---------------------------------------------------------

        add_filter("add_shortcode_view", array($this, "settings_render_shortcode"), 10);


        //  CONDITIONAL ACTIONS & FILTERS --------------------------------------

        add_filter("aws_ts_select_available_skins", array($this, "fn_aws_ts_select_available_skins"), 10, 2);
        add_filter("aws_ts_get_settings_tab", array($this, "fn_aws_ts_get_settings_tab"), 10);
        add_filter("aws_ts_include_setting_tab", array($this, "fn_aws_ts_include_setting_tab"), 10);
        add_filter("aws_get_skin_documentation", array($this, "fn_aws_get_skin_documentation"), 10, 1);
    }

    public function enqueue_styles() {

        $interface = __DIR__ . '/css/plugin-interface.css';

        if (file_exists($interface))
        {
            wp_enqueue_style("aws-interface", plugin_dir_url(__FILE__) . 'css/plugin-interface.css', array(), $this->version, 'all');
        }

        global $post;

        $get_page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);

        if ($post && ( get_post_type($post->ID) === "aws-showcase-teams" || get_post_type($post->ID) === "aws-showcase-members" ) || ( $get_page && $get_page === "aws-team-showcase-settings" ))
        {
            wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/awesome-plugins-team-showcase-admin.css', array(), $this->version, 'all');
        }

        if ($post && get_post_type($post->ID) === "aws-showcase-teams")
        {
            wp_enqueue_style("aws-showcase-frontcss", plugin_dir_url("awesome-plugins-team-showcase/awesome-plugins-team-showcase.php") . 'public/css/awesome-plugins-team-showcase-public.css', array(), $this->version, 'all');
        }
    }

    public function enqueue_scripts() {
        wp_enqueue_media();
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/admin.js', array('jquery', "jquery-ui-core", "jquery-ui-sortable"), $this->version, false);
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker', false, array('jquery'));

        global $post;

        if ($post && get_post_type($post->ID) === "aws-showcase-teams")
        {
            wp_enqueue_script("preview-js", plugin_dir_url("awesome-plugins-team-showcase/awesome-plugins-team-showcase.php") . 'public/js/main.js', array('jquery', "jquery-ui-core"), $this->version, true);
        }
    }

    public function aws_team_showcase_admin_subpages() {
        add_submenu_page('edit.php?post_type=aws-showcase-teams', 'Team Showcase', __('Settings', ' aws-team-showcase'), 'manage_options', 'aws-team-showcase-settings', array($this, 'aws_team_showcase_settings_page'));
    }

    public function awesome_team_showcase_cpts() {

        $labels = array(
            'name'               => _x('Teams', 'post type general name'),
            'singular_name'      => _x('Team', 'post type singular name'),
            'menu_name'          => _x('Team Showcase', 'admin menu'),
            'name_admin_bar'     => _x('Team', 'add new on admin bar'),
            'add_new'            => _x('Add New Team', ''),
            'add_new_item'       => _x('Add New Team', ''),
            'edit_item'          => __('Edit Team'),
            'new_item'           => __('New Team'),
            'all_items'          => __('Teams'),
            'view_item'          => __('View Team'),
            'search_items'       => __('Search Teams'),
            'not_found'          => __('No Team found'),
            'not_found_in_trash' => __('No Team found in Trash'),
            'parent_item_colon'  => __('Parent Team:'),
        );

        $teams_are_public = true;

        $aws_ts_posts = get_option("aws_ts_posts");
        $aws_ts_posts = (is_array($aws_ts_posts) && !empty($aws_ts_posts) ? $aws_ts_posts : array("teams" => "yes", "members" => "yes",));

        if (!isset($aws_ts_posts["teams"]) || $aws_ts_posts["teams"] !== "yes")
        {
            $teams_are_public = false;
        }

        $members_are_public = true;

        if (!isset($aws_ts_posts["members"]) || $aws_ts_posts["members"] !== "yes")
        {
            $members_are_public = false;
        }
        
        $args = array(
            'hierarchical'       => true,
            'labels'             => $labels,
            'public'             => $teams_are_public,
            'publicly_queryable' => $teams_are_public,
            'description'        => __('Description.'),
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'rewrite'            => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => 'showcase-team'),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'menu_position'      => 22,
            "show_in_rest"       => true,
            'menu_icon'          => 'dashicons-groups',
            'supports'           => array('title', "content", "thumbnail")
        );
        
        register_post_type('aws-showcase-teams', $args);

        $labels = array(
            'name'               => _x('Members', 'post type general name'),
            'singular_name'      => _x('Member', 'post type singular name'),
            'menu_name'          => _x('Member Showcase', 'admin menu'),
            'name_admin_bar'     => _x('Member', 'add new on admin bar'),
            'add_new'            => _x('Add New Member', ''),
            'add_new_item'       => __('Add New Member'),
            'edit_item'          => __('Edit Member'),
            'new_item'           => __('New Member'),
            'all_items'          => __('Members'),
            'view_item'          => __('View Member'),
            'search_items'       => __('Search Members'),
            'not_found'          => __('No Member found'),
            'not_found_in_trash' => __('No Member found in Trash'),
            'parent_item_colon'  => __('Parent Member:'),
        );



        $args = array(
            'hierarchical'       => true,
            'labels'             => $labels,
            'public'             => $members_are_public,
            'publicly_queryable' => $members_are_public,
            'description'        => __('Description.'),
            'show_ui'            => true,
            'show_in_menu'       => "edit.php?post_type=aws-showcase-teams",
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'rewrite'            => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => 'showcase-member'),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'menu_position'      => 22,
            "show_in_rest"       => true,
            'menu_icon'          => 'dashicons-groups',
            'supports'           => array('title', "editor", "thumbnail")
        );

        $settings = get_option("aws_team_showcase_settings", true);

        register_post_type('aws-showcase-members', $args);
        
        $flush_flag = get_option("aws-showcase-flush-flag");
        
        if( $flush_flag !== "done" )
        {
            flush_rewrite_rules();
            update_option("aws-showcase-flush-flag", "done");
        }
        
    }

    public function add_metabox_teams() {

        add_meta_box('aws-ts-teams-shortcode', __('Shortcode', $this->plugin_name), array($this, 'render_team_shortcode'), 'aws-showcase-teams', 'advanced', 'default');
        add_meta_box('aws-ts-teams-generator', __('Team Members', $this->plugin_name), array($this, 'render_team_generator'), 'aws-showcase-teams', 'advanced', 'default');
        add_meta_box('aws-ts-teams-settings', __('Showcase layout', $this->plugin_name), array($this, 'render_team_settings'), 'aws-showcase-teams', 'advanced', 'default');
        add_meta_box('aws-ts-teams-preview', __('Preview', $this->plugin_name), array($this, 'render_team_preview'), 'aws-showcase-teams', 'advanced', 'default');
    }

    public function add_metabox_members() {

        add_meta_box('aws-ts-member-meta', __('Meta data', $this->plugin_name), array($this, 'render_member_metadata'), 'aws-showcase-members', 'advanced', 'default');
        add_meta_box('aws-ts-member-select-team', __('Select teams', $this->plugin_name), array($this, 'render_member_selet_teams'), 'aws-showcase-members', 'advanced', 'default');
        add_meta_box('aws-ts-member-shortcode', __('Shortcode', $this->plugin_name), array($this, 'render_member_shortcode'), 'aws-showcase-members', 'advanced', 'default');
    }

    public function render_team_shortcode($post) {
        include __DIR__ . "/partials/teams/shortcode.php";
    }

    public function aws_team_showcase_settings_page() {

        $input_post = filter_input(INPUT_POST, "aws_team_showcase_settings_flag", FILTER_DEFAULT, FILTER_SANITIZE_STRING);

        $current = filter_input(INPUT_GET, 'tab', FILTER_SANITIZE_STRING);
        $current = ( $current ? $current : "general" );

        $tabs = array();
        $tabs = apply_filters("aws_ts_get_settings_tab", $tabs);

        if ($input_post && $current === "scripts")
        {
            $this->update_settings("scripts");
        }
        else if ($input_post && $current === "views")
        {
            $this->update_settings("views");
        }

        $skins = array();

        include __DIR__ . "/partials/settings/main.php";
    }

    public function update_settings($tab) {

        if ($tab === "scripts")
        {

            $input_post = filter_input(INPUT_POST, "aws_team_showcase_active_cssjs", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

            $settings = ( $input_post ? $input_post : array() );

            $settings["css"] = ( isset($settings["css"]) ? $settings["css"] : 0 );
            $settings["js"]  = ( isset($settings["js"]) ? $settings["js"] : 0 );

            update_option("aws_team_showcase_active_cssjs", $settings);
        }

        if ($tab === "views")
        {

            $input_post = filter_input(INPUT_POST, "aws_ts_posts", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            $settings   = ( $input_post ? $input_post : array() );

            update_option("aws_ts_posts", $settings);
        }
    }

    public function settings_checked($key) {

        $settings = get_option("aws_team_showcase_settings", true);

        if (is_array($settings) && !empty($settings) && isset($settings[$key]) && intval($settings[$key]) > 0)
        {
            echo "checked";
        }
    }

    public function settings_active_checked($key) {

        $settings = get_option("aws_team_showcase_active_cssjs", true);

        if (!is_array($settings) || empty($settings))
        {
            $settings = array(
                "css" => 1,
                "js"  => 1,
            );
        }

        if (is_array($settings) && !empty($settings) && isset($settings[$key]) && intval($settings[$key]) > 0)
        {
            return "checked";
        }
    }

    public function render_member_metadata($post) {

        $fields             = $this->get_skin_fields($post->ID);
        $aws_ts_member_meta = get_post_meta($post->ID, "aws_ts_member_meta", true);

        include __DIR__ . "/partials/members/meta.php";
    }

    public function render_member_selet_teams($post) {

        $teams = get_posts(array(
            "post_type"   => "aws-showcase-teams",
            "numberposts" => -1
        ));

        include __DIR__ . "/partials/members/connect-with-teams.php";
    }

    public function render_member_shortcode($post) {

        $card = get_post_meta($post->ID, "aws_ts_member_card", true);
        include __DIR__ . "/partials/members/shortcode.php";
    }

    public function save_metabox($post_id) {

        if (get_post_type() === "aws-showcase-teams")
        {

            $aws_ts_members = filter_input(INPUT_POST, "aws_ts_members", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            if ($aws_ts_members)
            {
                update_post_meta($post_id, "aws_ts_members", $aws_ts_members);
            }

            $aws_team_post_connected = filter_input(INPUT_POST, "aws_team_post_connected", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

            if ($aws_team_post_connected)
            {
                update_post_meta($post_id, "aws_team_post_connected", $aws_team_post_connected);
            }

            $input_aws_team_settings = filter_input(INPUT_POST, "aws_team_settings", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

            if ($input_aws_team_settings)
            {

                if (isset($input_aws_team_settings["arrows"]) && $input_aws_team_settings["arrows"] === "yes")
                {
                    $input_aws_team_settings["arrows"] = "yes";
                }
                else
                {
                    $input_aws_team_settings["arrows"] = "no";
                }
            }

            update_post_meta($post_id, "aws_team_settings", $input_aws_team_settings);
        }
        else if (get_post_type() === "aws-showcase-members")
        {

            $aws_ts_member_meta = filter_input(INPUT_POST, "aws_ts_member_meta", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

            if ($aws_ts_member_meta)
            {
                $member_data = get_post_meta($post_id, "aws_ts_member_meta", true);
                $member_data = (!is_array($member_data) ? array() : $member_data );

                foreach ($aws_ts_member_meta as $key => $value)
                {
                    if (!isset($member_data["" . $key]))
                    {
                        $member_data["" . $key] = $value;
                    }

                    $member_data["" . $key] = $value;
                }
            }

            update_post_meta($post_id, "aws_ts_member_meta", $member_data);

            $connected = filter_input(INPUT_POST, "teams_connected", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

            if ($connected)
            {

                $teams = get_posts(array(
                    "post_type"   => "aws-showcase-teams",
                    "numberposts" => -1
                ));

                foreach ($teams as $team):

                    $team_members = get_post_meta($team->ID, "aws_ts_members", true);
                    $team_members = ( is_array($team_members) ? $team_members : array() );

                    if (in_array($team->ID, $connected)):

                        $flag = ( in_array($post_id, $team_members) ? true : false );

                        if (!$flag):

                            $team_members[] = $post_id;
                            update_post_meta($team->ID, "aws_ts_members", $team_members);

                        endif;

                    else:

                        $flag = ( in_array($post_id, $team_members) ? true : false );

                        if ($flag):

                            $index = array_search($post_id, $team_members);
                            unset($team_members[$index]);

                            update_post_meta($team->ID, "aws_ts_members", $team_members);

                        endif;

                    endif;

                endforeach;
            }
            else
            {
                $teams = get_posts(array(
                    "post_type"   => "aws-showcase-teams",
                    "numberposts" => -1
                ));

                foreach ($teams as $team):

                    $team_members = get_post_meta($team->ID, "aws_ts_members", true);
                    $team_members = ( is_array($team_members) ? $team_members : array() );

                    $index = array_search($post_id, $team_members);
                    unset($team_members[$index]);
                    update_post_meta($team->ID, "aws_ts_members", $team_members);

                endforeach;
            }
        }
    }

    public function team_save_data() {

        $post_id = filter_input(INPUT_POST, "post_id", FILTER_DEFAULT);
        $teams   = filter_input(INPUT_POST, "teams", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

        update_post_meta($post_id, 'teams', $teams);

        echo json_encode($teams);

        die();
    }

    public function aws_teamshowcase_templates() {

        $directories = array();

        $templates = array();

        $directories[] = AWESOME_PLUGINS_TEAM_SHOWCASE_DIR . "/public/partials/team-grid/";

        foreach ($directories as $directory)
        {

            $files = glob($directory . "*.php");

            foreach ($files as $filename)
            {
                $filename = basename($filename, ".php"); //Get file name without extension
                if (!in_array($filename, $templates))
                {
                    $templates[] = $filename;
                }
            }
        }

        return $templates;
    }

    public function render_team_settings($post) {

        $team_settings = get_post_meta($post->ID, "aws_team_settings", true);
        $team_settings = ( is_array($team_settings) ? $team_settings : array() );

        $grid      = ( isset($team_settings["grid"]) ? $team_settings["grid"] : "1" );
        $extrainfo = ( isset($team_settings["extrainfo"]) ? $team_settings["extrainfo"] : "nolink" );

        $columns = ( isset($team_settings["columns"]) ? $team_settings["columns"] : 3 );

        $card            = ( isset($team_settings["card"]) ? $team_settings["card"] : "" );
        $extra_info_card = ( isset($team_settings["extra_info_card"]) ? $team_settings["extra_info_card"] : "" );

        $skin = ( isset($team_settings["skin"]) ? $team_settings["skin"] : "basic_list" );

        $skins_plugin_folder_path = AWESOME_PLUGINS_TEAM_SHOWCASE_DIR . "/skins/";
        $skins_plugin_folder      = scandir(AWESOME_PLUGINS_TEAM_SHOWCASE_DIR . "/skins/");

        $skins_options = array();

        foreach ($skins_plugin_folder as $skin_folder):

            if (file_exists($skins_plugin_folder_path . "/$skin_folder/config.php") && !in_array($skin_folder, $this->folders_prevention))
            {

                $skin_data                       = include (AWESOME_PLUGINS_TEAM_SHOWCASE_DIR . "/skins/$skin_folder/config.php");
                $skins_options[$skin_data["id"]] = $skin_data;
            }

        endforeach;

        $options = apply_filters("aws_ts_select_available_skins", $skins_options, $skin);

        include __DIR__ . "/partials/teams/settings.php";
    }

    public function render_team_generator($post) {

        $aws_team_settings = get_option('aws_team_settings', true);

        $team_settings = get_post_meta($post->ID, "aws_team_settings", true);
        $team_settings = ( is_array($team_settings) ? $team_settings : array() );

        $orderby = ( isset($team_settings["orderby"]) ? $team_settings["orderby"] : "asc" );
        $order   = ( isset($team_settings["order"]) ? $team_settings["order"] : "" );

        $members = get_post_meta(get_the_ID(), "aws_ts_members", true);
        $members = ( is_array($members) ? $members : array() );

        $counter = 0;

        $members_posts = get_posts(array(
            "post_type"   => "aws-showcase-members",
            "numberposts" => -1,
        ));

        include __DIR__ . "/partials/teams/generator.php";
    }

    public function remove_bootstrap_buttons($buttons) {

        global $post;

        if ($post && isset($post->ID) && get_post_type($post->ID) === "aws-teams")
        {
            return array();
        }
        else
        {
            return $buttons;
        }
    }

    public function remove_toggle_button($buttons) {

        global $post;

        if ($post && isset($post->ID) && get_post_type($post->ID) === "aws-teams")
        {
            $remove = array('css_components_toolbar_toggle');
            return array_diff($buttons, $remove);
        }
        else
        {
            return $buttons;
        }
    }

    public function aws_team_showcase_edit_columns($columns) {

        $new_columns = array();

        foreach ($columns as $key => $value)
        {

            if ($key !== "shortcode"):


                if ($key === "date"):

                    $new_columns["shortcode"] = __('Shortcode', $this->plugin_name);

                endif;


            endif;

            $new_columns[$key] = $value;
        }


        return $new_columns;
    }

    public function aws_team_showcase_custom_columns($column) {

        global $post;

        if (get_post_type($post->ID) === "aws-showcase-teams" && $column === 'shortcode')
        {
            echo "[awesome-team-showcase id='" . get_the_ID() . "' ]";
        }
    }

    public function aws_member_showcase_custom_columns($column) {

        global $post;

        if (get_post_type($post->ID) === "aws-showcase-members" && $column === 'shortcode')
        {
            echo "[awesome-team-member id='" . get_the_ID() . "' ]";
        }
    }

    public function aws_ts_search_posts_to_connect() {


        $search_key = filter_input(INPUT_GET, 'key', FILTER_SANITIZE_STRING);

        if (!$search_key || $search_key === "" || strlen($search_key) < 3)
        {
            echo "<li>Type minimum three characters</li>";
            die();
        }

        global $wpdb;

        $ptypes_allowed = array("'page'", "'post'");

        $ptypes_all = get_post_types(array(
            'public'   => true,
            '_builtin' => false
        ));

        foreach ($ptypes_all as $key => $pty)
        {
            $ptypes_allowed[] = "'$key'";
        }

        $ptypes_string = implode(",", $ptypes_allowed);
        $sql           = "SELECT * FROM wp_posts WHERE post_status = 'publish' AND post_type IN($ptypes_string) AND post_title LIKE '%$search_key%'";
        $posts_list    = $wpdb->get_results($sql);

        foreach ($posts_list as $pl):
            echo "<li data-team-connection-post='$pl->ID'>$pl->post_title</li>";
        endforeach;

        die();
    }

    public function render_team_preview($post) {

        wp_enqueue_script("frontend-js", plugin_dir_url("awesome-plugins-team-showcase/awesome-plugins-team-showcase.php") . 'public/js/main.js', array('jquery', "jquery-ui-core"), $this->version, true);

        $settings = get_post_meta($post->ID, "aws_team_settings", true);
        $skin_id  = ( isset($settings["skin"]) ? $settings["skin"] : "none" );

        $params = array(
            "skin_id"       => $skin_id,
            "documentation" => ""
        );

        $documentation     = apply_filters("aws_get_skin_documentation", $params);
        $documentation_url = ( isset($documentation["documentation"]) ? $documentation["documentation"] : "none" );

        include __DIR__ . "/partials/teams/preview.php";
    }

    public function fn_aws_get_skin_documentation($params) {

        if (!is_array($params))
        {
            return true;
        }

        $skin_id = $params["skin_id"];

        $free_path = AWESOME_PLUGINS_TEAM_SHOWCASE_DIR . "/skins/$skin_id/config.php";

        $skin_settings = "";

        if (file_exists($free_path)):

            $skin_settings = include $free_path;

        endif;

        $doc_link = ( isset($skin_settings["documentation"]) && $skin_settings["documentation"] !== "" ? $skin_settings["documentation"] : "none");

        $params["documentation"] = $doc_link;

        return $params;
    }

    private function get_teams_of_this_member($member_id) {

        $teams = array();

        $direct_connection = get_post_meta($member_id, "teams_connected", true);
        $direct_connection = ( is_array($direct_connection) ? $direct_connection : array());

        $teams = array_merge($teams, $direct_connection);

        $teams_posts = get_posts(array(
            "post_type"      => "aws-showcase-teams",
            "posts_per_page" => -1
        ));

        foreach ($teams_posts as $team):

            $team_members   = get_post_meta($team->ID, "aws_ts_members", true);
            $team_members   = ( is_array($team_members) ? $team_members : array() );
            $connected_flag = ( in_array($member_id, $team_members) ? true : false );

            if ($connected_flag):
                $teams[] = $team->ID;
            endif;

        endforeach;

        return $teams;
    }

    private function get_skin_fields($member_id) {

        $teams = $this->get_teams_of_this_member($member_id);


        $fields        = array();
        $skin_settings = array();

        foreach ($teams as $tid):

            $team_settings = get_post_meta($tid, "aws_team_settings", true);
            $team_skin     = ( is_array($team_settings) && isset($team_settings["skin"]) && $team_settings["skin"] !== "" ? $team_settings["skin"] : false );

            if ($team_skin):

                $skin_settings = array_merge($skin_settings, $this->search_skin_settings($team_skin));

            endif;
            $skin = "";

        endforeach;

        return $skin_settings;
    }

    private function search_skin_settings($team_skin) {

        $upload_dir = wp_upload_dir();
        $base_path  = $upload_dir["basedir"];

        $uploaded_folder = $base_path . "/" . "awesome-plugins-team-showcase";
        $fields          = array();

        if (file_exists($uploaded_folder))
        {

            $skins_folder = scandir($uploaded_folder);

            foreach ($skins_folder as $skin_folder):

                if ($skin_folder === $team_skin)
                {

                    $skin_data = include ($uploaded_folder . "/$skin_folder/config.php");
                    $fields    = array_merge($fields, ( isset($skin_data["fields"]) ? $skin_data["fields"] : array()));
                }

            endforeach;
            
        }


        $plugin_skins_path   = AWESOME_PLUGINS_TEAM_SHOWCASE_DIR . "/skins";
        $plugin_skins_folder = scandir($plugin_skins_path);

        foreach ($plugin_skins_folder as $skin_folder):

            if ($skin_folder === $team_skin)
            {

                $skin_data = include ($plugin_skins_path . "/$skin_folder/config.php");
                $fields    = array_merge($fields, ( isset($skin_data["fields"]) ? $skin_data["fields"] : array()));
            }

        endforeach;

        if (is_plugin_active("awesome-team-showcase-pro/awesome-team-showcase-pro.php")):

            $plugin_skins_path   = AWS_TEAM_SHOWCASE_PRO_DIR . "/skins";
            $plugin_skins_folder = scandir($plugin_skins_path);

            foreach ($plugin_skins_folder as $skin_folder):

                if ($skin_folder === $team_skin)
                {

                    $skin_data = include ($plugin_skins_path . "/$skin_folder/config.php");
                    $fields    = array_merge($fields, ( isset($skin_data["fields"]) ? $skin_data["fields"] : array()));
                }

            endforeach;

        endif;

        $final_fields     = array();
        $final_fields_ids = array();

        foreach ($fields as $field):

            if (!in_array($field["id"], $final_fields_ids))
            {
                $final_fields[]     = $field;
                $final_fields_ids[] = $field["id"];
            }

        endforeach;

        return $fields;
    }

    public function get_plugin_info() {

        $info = array();

        $info["plugin"] = get_plugin_data(AWESOME_PLUGINS_TEAM_SHOWCASE_DIR . "/awesome-plugins-team-showcase.php");

        if (is_plugin_active("awesome-plugins-team-showcase-premium/awesome-plugins-team-showcase-premium.php")):

            $info["premium_plugin"] = get_plugin_data(AWESOME_PLUGINS_TEAM_SHOWCASE_PREMIUM_DIR . "/awesome-plugins-team-showcase-premium.php");

        endif;

        return $info;
    }

    public function settings_render_shortcode() {

        ob_start();
        ?>
        <input type="text" class="input-shortcode" value="[awesome-team-showcase id='<?php echo get_the_ID() ?>']" />
        <?php
        return ob_get_clean();
    }

    public function fn_aws_ts_select_available_skins($skins_options, $skin) {

        $free_skins = array();

        foreach ($skins_options as $skin_key => $skin_array):

            $free_skins[] = array(
                "id"               => $skin_array["id"],
                "title"            => $skin_array["title"],
                "settings"         => (isset($skin_array["settings"]) ? $skin_array["settings"] : array()),
                "max_columns"      => (isset($skin_array["max_columns"]) ? $skin_array["max_columns"] : 4),
                "extrainfo_action" => (isset($skin_array["extrainfo_action"]) ? $skin_array["extrainfo_action"] : false),
            );

        endforeach;

        return $free_skins;
    }

    public function fn_aws_ts_get_settings_tab() {
        return array(
            'general' => __('General', $this->plugin_name),
            'views'   => __('Views', $this->plugin_name),
            'scripts' => __('Scripts', $this->plugin_name),
            'info'    => __('Info', $this->plugin_name),
        );
    }

    public function fn_aws_ts_include_setting_tab() {

        $current = filter_input(INPUT_GET, 'tab', FILTER_SANITIZE_STRING);

        $current = ( $current ? $current : "general" );

        ob_start();

        if ($current === "scripts")
        {
            $css_active = $this->settings_active_checked("css");
            $js_active  = $this->settings_active_checked("js");
        }
        else if ($current === "info")
        {
            global $wp_version;
            $info = $this->get_plugin_info();
        }
        else if ($current === "views")
        {
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
        }

        include __DIR__ . "/partials/settings/$current.php";
        return ob_get_clean();
    }

    public function remove_submenus() {
        global $submenu;
        unset($submenu['edit.php?post_type=aws-showcase-teams'][10]);
    }

}
