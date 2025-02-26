<?php

if (!defined("ABSPATH")) {
    exit(); // Prevent direct access
}

class Automatik_Blog_REST_API_Endpoints
{
    public function __construct()
    {
        // Register custom endpoints
        add_action("rest_api_init", [$this, "register_endpoints"]);
    }

    public function register_endpoints()
    {
        // Endpoint to publish articles
        register_rest_route("automatik_blog/v1", "/publish-article", [
            "methods" => "POST",
            "callback" => [$this, "publish_article"],
            "permission_callback" => [$this, "permission_callback"],
        ]);

        // Endpoint to install theme
        register_rest_route("automatik_blog/v1", "/install-theme", [
            "methods" => "POST",
            "callback" => [$this, "install_theme"],
            "permission_callback" => [$this, "permission_callback"],
        ]);

        // Endpoint to activate theme
        register_rest_route("automatik_blog/v1", "/activate-theme", [
            "methods" => "POST",
            "callback" => [$this, "activate_theme"],
            "permission_callback" => [$this, "permission_callback"],
        ]);

        // Endpoint to update articles
        register_rest_route("automatik_blog/v1", "/update-article", [
            "methods" => "POST",
            "callback" => [$this, "update_article"],
            "permission_callback" => [$this, "permission_callback"],
        ]);

        // Endpoint to create menus
        register_rest_route("automatik_blog/v1", "/create-menu", [
            "methods" => "POST",
            "callback" => [$this, "create_menu"],
            "permission_callback" => [$this, "permission_callback"],
        ]);

        // Endpoint to add items to menus
        register_rest_route("automatik_blog/v1", "/add-menu-item", [
            "methods" => "POST",
            "callback" => [$this, "add_menu_item"],
            "permission_callback" => [$this, "permission_callback"],
        ]);

        // Endpoint to assign menu to location
        register_rest_route("automatik_blog/v1", "/assign-menu-location", [
            "methods" => "POST",
            "callback" => [$this, "assign_menu_location"],
            "permission_callback" => [$this, "permission_callback"],
        ]);

        // Endpoint to update site title
        register_rest_route("automatik_blog/v1", "/update-site-title", [
            "methods" => "POST",
            "callback" => [$this, "update_site_title"],
            "permission_callback" => [$this, "permission_callback"],
        ]);

        // Endpoint to update site tagline
        register_rest_route("automatik_blog/v1", "/update-site-tagline", [
            "methods" => "POST",
            "callback" => [$this, "update_site_tagline"],
            "permission_callback" => [$this, "permission_callback"],
        ]);

        // Endpoint to update author bio
        register_rest_route("automatik_blog/v1", "/update-author-bio", [
            "methods" => "POST",
            "callback" => [$this, "update_author_bio"],
            "permission_callback" => [$this, "permission_callback"],
        ]);

        // Endpoint to update author display name
        register_rest_route(
            "automatik_blog/v1",
            "/update-author-display-name",
            [
                "methods" => "POST",
                "callback" => [$this, "update_author_display_name"],
                "permission_callback" => [$this, "permission_callback"],
            ]
        );

        // Endpoint to update category
        register_rest_route("automatik_blog/v1", "/update-category", [
            "methods" => "POST",
            "callback" => [$this, "update_category"],
            "permission_callback" => [$this, "permission_callback"],
        ]);

        // Endpoint to create categories
        register_rest_route("automatik_blog/v1", "/create-category", [
            "methods" => "POST",
            "callback" => [$this, "create_category"],
            "permission_callback" => [$this, "permission_callback"],
        ]);

        // Endpoint to delete articles
        register_rest_route("automatik_blog/v1", "/delete-article", [
            "methods" => "DELETE",
            "callback" => [$this, "delete_article"],
            "permission_callback" => [$this, "permission_callback"],
        ]);

        // Endpoint to upload images
        register_rest_route("automatik_blog/v1", "/upload-image", [
            "methods" => "POST",
            "callback" => [$this, "upload_image_endpoint"],
            "permission_callback" => [$this, "permission_callback"],
        ]);

        // Endpoint to get posts
        register_rest_route("automatik_blog/v1", "/posts", [
            "methods" => "GET",
            "callback" => [$this, "get_posts"],
            "permission_callback" => [$this, "permission_callback"],
        ]);

        // Endpoint to get pages
        register_rest_route("automatik_blog/v1", "/pages", [
            "methods" => "GET",
            "callback" => [$this, "get_pages"],
            "permission_callback" => [$this, "permission_callback"],
        ]);

        // Endpoint to get categories
        register_rest_route("automatik_blog/v1", "/categories", [
            "methods" => "GET",
            "callback" => [$this, "get_categories"],
            "permission_callback" => [$this, "permission_callback"],
        ]);

        // Endpoint to get authors
        register_rest_route("automatik_blog/v1", "/authors", [
            "methods" => "GET",
            "callback" => [$this, "get_authors"],
            "permission_callback" => [$this, "permission_callback"],
        ]);

        // Endpoint to get tags
        register_rest_route("automatik_blog/v1", "/tags", [
            "methods" => "GET",
            "callback" => [$this, "get_tags"],
            "permission_callback" => [$this, "permission_callback"],
        ]);

        // Endpoint to get plugins
        register_rest_route("automatik_blog/v1", "/plugins", [
            "methods" => "GET",
            "callback" => [$this, "get_plugins"],
            "permission_callback" => [$this, "permission_callback"],
        ]);

        // Endpoint to deactivate plugin
        register_rest_route("automatik_blog/v1", "/deactivate-plugin", [
            "methods" => "POST",
            "callback" => [$this, "deactivate_plugin"],
            "permission_callback" => [$this, "permission_callback"],
        ]);

        // Endpoint to delete plugin
        register_rest_route("automatik_blog/v1", "/delete-plugin", [
            "methods" => "DELETE",
            "callback" => [$this, "delete_plugin"],
            "permission_callback" => [$this, "permission_callback"],
        ]);

        // Endpoint to install plugin
        register_rest_route("automatik_blog/v1", "/install-plugin", [
            "methods" => "POST",
            "callback" => [$this, "install_plugin"],
            "permission_callback" => [$this, "permission_callback"],
        ]);

        // Endpoint to activate plugin
        register_rest_route("automatik_blog/v1", "/activate-plugin", [
            "methods" => "POST",
            "callback" => [$this, "activate_plugin"],
            "permission_callback" => [$this, "permission_callback"],
        ]);
    }

    private function get_unique_filename($dir, $filename)
    {
        $file_parts = pathinfo($filename);
        $extension = isset($file_parts["extension"])
            ? "." . $file_parts["extension"]
            : "";
        $name = sanitize_title($file_parts["filename"]);
        $number = 1;

        // Initial filename
        $new_filename = $name . $extension;

        // Check if the file exists and append a number if it does
        while (file_exists($dir . "/" . $new_filename)) {
            $new_filename = $name . "-" . $number . $extension;
            $number++;
        }

        return $new_filename;
    }

    public function create_category(WP_REST_Request $request)
    {
        $logger = new Automatik_Blog_Logger();

        // Retrieve parameters from the request
        $name = sanitize_text_field($request->get_param("name"));
        $slug = sanitize_title($request->get_param("slug"));
        $description = sanitize_textarea_field(
            $request->get_param("description")
        );

        // Validate required fields
        if (empty($name)) {
            $logger->log("Category name missing in the request.");
            return new WP_Error(
                "missing_data",
                __("Category name is required.", "automatik-blog"),
                ["status" => 400]
            );
        }

        // Prepare category data
        $category_data = [
            "description" => $description,
            "slug" => $slug,
        ];

        // Create the category using wp_insert_term()
        $result = wp_insert_term($name, "category", $category_data);

        if (is_wp_error($result)) {
            $logger->log(
                "Failed to create category: " . $result->get_error_message()
            );
            return $result;
        }

        $category_id = $result["term_id"];
        $category = get_category($category_id);

        $logger->log("Category created successfully. ID: " . $category_id);

        return rest_ensure_response([
            "message" => "Category created successfully",
            "id" => $category_id,
            "name" => $category->name,
            "slug" => $category->slug,
            "description" => $category->description,
        ]);
    }

    public function install_theme(WP_REST_Request $request)
    {
        $logger = new Automatik_Blog_Logger();

        // Check if current user has permissions
        if (!current_user_can("install_themes")) {
            $logger->log("User does not have permission to install themes.");
            return new WP_Error(
                "rest_forbidden",
                __(
                    "You do not have permissions to install themes.",
                    "automatik-blog"
                ),
                ["status" => rest_authorization_required_code()]
            );
        }

        $theme_slug = sanitize_text_field($request->get_param("theme_slug"));
        $theme_zip_url = esc_url_raw($request->get_param("theme_url"));
        $theme_stylesheet = sanitize_text_field(
            $request->get_param("theme_stylesheet")
        );

        if (empty($theme_slug) && empty($theme_zip_url)) {
            $logger->log("No theme slug or zip URL provided for installation.");
            return new WP_Error(
                "missing_theme_info",
                __("Theme slug or zip URL is required.", "automatik-blog"),
                ["status" => 400]
            );
        }

        // Get list of themes before installation
        wp_clean_themes_cache();
        $themes_before = wp_get_themes();

        // Include necessary files
        require_once ABSPATH . "wp-admin/includes/file.php";
        require_once ABSPATH . "wp-admin/includes/misc.php";
        require_once ABSPATH . "wp-admin/includes/class-wp-upgrader.php";
        require_once ABSPATH . "wp-admin/includes/theme-install.php";

        $upgrader = new Theme_Upgrader(new WP_Ajax_Upgrader_Skin());

        if (!empty($theme_slug)) {
            // Install theme from WordPress.org repository
            $api = themes_api("theme_information", [
                "slug" => $theme_slug,
                "fields" => [
                    "sections" => false,
                ],
            ]);

            if (is_wp_error($api)) {
                $logger->log(
                    "Failed to retrieve theme information for slug: " .
                        $theme_slug
                );
                return new WP_Error(
                    "theme_not_found",
                    __(
                        "Theme not found in WordPress.org repository.",
                        "automatik-blog"
                    ),
                    ["status" => 404]
                );
            }

            $result = $upgrader->install($api->download_link);

            // Get the installed theme stylesheet
            $theme_stylesheet = $api->stylesheet;
        } else {
            // Install theme from provided zip URL
            $result = $upgrader->install($theme_zip_url);
        }

        if (is_wp_error($result)) {
            $logger->log(
                "Failed to install theme. Error: " .
                    $result->get_error_message()
            );
            return $result;
        }

        if (!$result) {
            $logger->log("Theme installation failed.");
            return new WP_Error(
                "theme_installation_failed",
                __("Failed to install theme.", "automatik-blog"),
                ["status" => 500]
            );
        }

        // Get list of themes after installation
        wp_clean_themes_cache();
        $themes_after = wp_get_themes();

        // Determine the newly installed theme
        if (empty($theme_stylesheet)) {
            $new_themes = array_diff_key($themes_after, $themes_before);

            if (count($new_themes) === 1) {
                $theme_stylesheet = key($new_themes);
            } elseif (count($new_themes) > 1) {
                $logger->log(
                    "Multiple new themes installed; unable to determine the correct theme stylesheet."
                );
                return new WP_Error(
                    "multiple_themes_installed",
                    __(
                        "Multiple new themes installed; specify 'theme_stylesheet' parameter.",
                        "automatik-blog"
                    ),
                    ["status" => 400]
                );
            } else {
                $logger->log("No new themes found after installation.");
                return new WP_Error(
                    "theme_installation_failed",
                    __(
                        "No new themes found after installation.",
                        "automatik-blog"
                    ),
                    ["status" => 500]
                );
            }
        }

        $logger->log("Theme installed successfully: " . $theme_stylesheet);

        return rest_ensure_response([
            "message" => "Theme installed successfully",
            "theme_stylesheet" => $theme_stylesheet,
        ]);
    }

    public function activate_theme(WP_REST_Request $request)
    {
        $logger = new Automatik_Blog_Logger();

        // Check if current user has permissions
        if (!current_user_can("switch_themes")) {
            $logger->log("User does not have permission to activate themes.");
            return new WP_Error(
                "rest_forbidden",
                __(
                    "You do not have permissions to activate themes.",
                    "automatik-blog"
                ),
                ["status" => rest_authorization_required_code()]
            );
        }

        $theme_stylesheet = sanitize_text_field(
            $request->get_param("theme_stylesheet")
        );

        if (empty($theme_stylesheet)) {
            $logger->log("No theme stylesheet specified for activation.");
            return new WP_Error(
                "missing_theme_stylesheet",
                __("Theme stylesheet is required.", "automatik-blog"),
                ["status" => 400]
            );
        }

        // Check if theme exists
        $theme = wp_get_theme($theme_stylesheet);

        if (!$theme->exists()) {
            $logger->log("Theme not found: " . $theme_stylesheet);
            return new WP_Error(
                "theme_not_found",
                __("Theme not found.", "automatik-blog"),
                ["status" => 404]
            );
        }

        // Activate the theme
        switch_theme($theme->get_stylesheet());

        $logger->log("Theme activated successfully: " . $theme_stylesheet);

        return rest_ensure_response([
            "message" => "Theme activated successfully",
            "theme_stylesheet" => $theme_stylesheet,
        ]);
    }

    public function create_menu(WP_REST_Request $request)
    {
        $logger = new Automatik_Blog_Logger();

        // Check if current user has permissions
        if (!current_user_can("edit_theme_options")) {
            $logger->log("User does not have permission to create menus.");
            return new WP_Error(
                "rest_forbidden",
                __(
                    "You do not have permissions to create menus.",
                    "automatik-blog"
                ),
                ["status" => rest_authorization_required_code()]
            );
        }

        $name = sanitize_text_field($request->get_param("name"));
        $slug = sanitize_title($request->get_param("slug"));
        $description = sanitize_textarea_field(
            $request->get_param("description")
        );

        if (empty($name)) {
            $logger->log("Menu name missing in the request.");
            return new WP_Error(
                "missing_data",
                __("Menu name is required.", "automatik-blog"),
                ["status" => 400]
            );
        }

        // Create the menu
        $menu_exists = wp_get_nav_menu_object($name);

        if (!$menu_exists) {
            $menu_id = wp_create_nav_menu($name);

            if (is_wp_error($menu_id)) {
                $logger->log(
                    "Failed to create menu: " . $menu_id->get_error_message()
                );
                return $menu_id;
            }

            // Update menu slug and description
            wp_update_term($menu_id, "nav_menu", [
                "slug" => $slug,
                "description" => $description,
            ]);

            $logger->log("Menu created successfully. ID: " . $menu_id);

            return rest_ensure_response([
                "message" => "Menu created successfully",
                "id" => $menu_id,
                "name" => $name,
                "slug" => $slug,
                "description" => $description,
            ]);
        } else {
            $logger->log("Menu already exists with name: " . $name);
            return new WP_Error(
                "menu_exists",
                __("A menu with that name already exists.", "automatik-blog"),
                ["status" => 400]
            );
        }
    }

    public function add_menu_item(WP_REST_Request $request)
    {
        $logger = new Automatik_Blog_Logger();

        // Check if current user has permissions
        if (!current_user_can("edit_theme_options")) {
            $logger->log("User does not have permission to add menu items.");
            return new WP_Error(
                "rest_forbidden",
                __(
                    "You do not have permissions to add menu items.",
                    "automatik-blog"
                ),
                ["status" => rest_authorization_required_code()]
            );
        }

        $menu_id = intval($request->get_param("menu_id"));
        $title = $request->get_param("title");
        $type = sanitize_text_field($request->get_param("type"));
        $object = sanitize_text_field($request->get_param("object"));
        $object_id = intval($request->get_param("object_id"));
        $url = esc_url_raw($request->get_param("url"));
        $description = sanitize_textarea_field(
            $request->get_param("description")
        );
        $parent_id = intval($request->get_param("parent_id"));
        $position = intval($request->get_param("position"));

        if (empty($menu_id) || empty($title)) {
            $logger->log("Menu ID or title missing in the request.");
            return new WP_Error(
                "missing_data",
                __("Menu ID and title are required.", "automatik-blog"),
                ["status" => 400]
            );
        }

        // Check if menu exists
        $menu = wp_get_nav_menu_object($menu_id);
        if (!$menu) {
            $logger->log("Menu not found. ID: " . $menu_id);
            return new WP_Error(
                "menu_not_found",
                __("Menu not found.", "automatik-blog"),
                ["status" => 404]
            );
        }

        // Prepare menu item data
        $menu_item_data = [
            "menu-item-title" => $title,
            "menu-item-menu-item-parent-id" => $parent_id,
            "menu-item-position" => $position,
            "menu-item-status" => "publish",
        ];

        if ($type === "custom") {
            $menu_item_data["menu-item-type"] = "custom";
            $menu_item_data["menu-item-url"] = $url;
        } else {
            $menu_item_data["menu-item-type"] = $type;
            $menu_item_data["menu-item-object"] = $object;
            $menu_item_data["menu-item-object-id"] = $object_id;
        }

        if (!empty($description)) {
            $menu_item_data["menu-item-description"] = $description;
        }

        // Add the menu item
        $menu_item_id = wp_update_nav_menu_item($menu_id, 0, $menu_item_data);

        if (is_wp_error($menu_item_id)) {
            $logger->log(
                "Failed to add menu item: " . $menu_item_id->get_error_message()
            );
            return $menu_item_id;
        }

        $logger->log("Menu item added successfully. ID: " . $menu_item_id);

        return rest_ensure_response([
            "message" => "Menu item added successfully",
            "menu_item_id" => $menu_item_id,
        ]);
    }

    public function assign_menu_location(WP_REST_Request $request)
    {
        $logger = new Automatik_Blog_Logger();

        // Check if current user has permissions
        if (!current_user_can("edit_theme_options")) {
            $logger->log(
                "User does not have permission to assign menus to locations."
            );
            return new WP_Error(
                "rest_forbidden",
                __(
                    "You do not have permissions to assign menus to locations.",
                    "automatik-blog"
                ),
                ["status" => rest_authorization_required_code()]
            );
        }

        $menu_id = intval($request->get_param("menu_id"));
        $locations = $request->get_param("locations");

        if (empty($menu_id) || empty($locations)) {
            $logger->log("Menu ID or locations missing in the request.");
            return new WP_Error(
                "missing_data",
                __("Menu ID and locations are required.", "automatik-blog"),
                ["status" => 400]
            );
        }

        // Check if menu exists
        $menu = wp_get_nav_menu_object($menu_id);
        if (!$menu) {
            $logger->log("Menu not found. ID: " . $menu_id);
            return new WP_Error(
                "menu_not_found",
                __("Menu not found.", "automatik-blog"),
                ["status" => 404]
            );
        }

        // Get registered menu locations
        $registered_locations = get_registered_nav_menus();

        // Get current menu locations
        $nav_menu_locations = get_nav_menu_locations();

        foreach ($locations as $location) {
            if (!array_key_exists($location, $registered_locations)) {
                $logger->log("Invalid menu location: " . $location);
                return new WP_Error(
                    "invalid_location",
                    sprintf(
                        // translators: %s: menu location slug
                        __("Invalid menu location: %s", "automatik-blog"),
                        $location
                    ),
                    ["status" => 400]
                );
            }

            // Assign menu to location
            $nav_menu_locations[$location] = $menu_id;
        }

        // Update menu locations
        set_theme_mod("nav_menu_locations", $nav_menu_locations);

        $logger->log("Menu assigned to locations successfully.");

        return rest_ensure_response([
            "message" => "Menu assigned to locations successfully",
            "menu_id" => $menu_id,
            "locations" => $locations,
        ]);
    }

    public function update_site_title(WP_REST_Request $request)
    {
        $logger = new Automatik_Blog_Logger();

        // Check if current user has permissions
        if (!current_user_can("manage_options")) {
            $logger->log("User does not have permission to update site title.");
            return new WP_Error(
                "rest_forbidden",
                __(
                    "You do not have permissions to update site title.",
                    "automatik-blog"
                ),
                ["status" => rest_authorization_required_code()]
            );
        }

        $site_title = sanitize_text_field($request->get_param("site_title"));

        if (empty($site_title)) {
            $logger->log("No site title provided for update.");
            return new WP_Error(
                "missing_site_title",
                __("Site title is required.", "automatik-blog"),
                ["status" => 400]
            );
        }

        // Update the site title
        update_option("blogname", $site_title);

        $logger->log("Site title updated successfully to: " . $site_title);

        return rest_ensure_response([
            "message" => "Site title updated successfully",
            "site_title" => $site_title,
        ]);
    }

    public function update_site_tagline(WP_REST_Request $request)
    {
        $logger = new Automatik_Blog_Logger();

        // Check if current user has permissions
        if (!current_user_can("manage_options")) {
            $logger->log(
                "User does not have permission to update site tagline."
            );
            return new WP_Error(
                "rest_forbidden",
                __(
                    "You do not have permissions to update site tagline.",
                    "automatik-blog"
                ),
                ["status" => rest_authorization_required_code()]
            );
        }

        $site_tagline = sanitize_text_field(
            $request->get_param("site_tagline")
        );

        if (empty($site_tagline)) {
            $logger->log("No site tagline provided for update.");
            return new WP_Error(
                "missing_site_tagline",
                __("Site tagline is required.", "automatik-blog"),
                ["status" => 400]
            );
        }

        // Update the site tagline
        update_option("blogdescription", $site_tagline);

        $logger->log("Site tagline updated successfully to: " . $site_tagline);

        return rest_ensure_response([
            "message" => "Site tagline updated successfully",
            "site_tagline" => $site_tagline,
        ]);
    }

    public function update_author_bio(WP_REST_Request $request)
    {
        $logger = new Automatik_Blog_Logger();

        // Check if current user has permissions
        if (!current_user_can("edit_users")) {
            $logger->log("User does not have permission to update author bio.");
            return new WP_Error(
                "rest_forbidden",
                __(
                    "You do not have permissions to update author bio.",
                    "automatik-blog"
                ),
                ["status" => rest_authorization_required_code()]
            );
        }

        $author_id = intval($request->get_param("author_id"));
        $bio = sanitize_textarea_field($request->get_param("bio"));

        if (empty($author_id) || empty($bio)) {
            $logger->log("Author ID or bio missing in the request.");
            return new WP_Error(
                "missing_data",
                __("Author ID and bio are required.", "automatik-blog"),
                ["status" => 400]
            );
        }

        // Check if user exists
        $user = get_user_by("ID", $author_id);
        if (!$user) {
            $logger->log("User not found. ID: " . $author_id);
            return new WP_Error(
                "user_not_found",
                __("User not found.", "automatik-blog"),
                ["status" => 404]
            );
        }

        // Update the bio (description)
        wp_update_user([
            "ID" => $author_id,
            "description" => $bio,
        ]);

        $logger->log("Author bio updated successfully. ID: " . $author_id);

        return rest_ensure_response([
            "message" => "Author bio updated successfully",
            "author_id" => $author_id,
        ]);
    }

    public function update_author_display_name(WP_REST_Request $request)
    {
        $logger = new Automatik_Blog_Logger();

        // Check if current user has permissions
        if (!current_user_can("edit_users")) {
            $logger->log(
                "User does not have permission to update author display name."
            );
            return new WP_Error(
                "rest_forbidden",
                __(
                    "You do not have permissions to update author display name.",
                    "automatik-blog"
                ),
                ["status" => rest_authorization_required_code()]
            );
        }

        $author_id = intval($request->get_param("author_id"));
        $display_name = sanitize_text_field(
            $request->get_param("display_name")
        );

        if (empty($author_id) || empty($display_name)) {
            $logger->log("Author ID or display name missing in the request.");
            return new WP_Error(
                "missing_data",
                __(
                    "Author ID and display name are required.",
                    "automatik-blog"
                ),
                ["status" => 400]
            );
        }

        // Check if user exists
        $user = get_user_by("ID", $author_id);
        if (!$user) {
            $logger->log("User not found. ID: " . $author_id);
            return new WP_Error(
                "user_not_found",
                __("User not found.", "automatik-blog"),
                ["status" => 404]
            );
        }

        // Update the display name
        wp_update_user([
            "ID" => $author_id,
            "display_name" => $display_name,
        ]);

        $logger->log(
            "Author display name updated successfully. ID: " . $author_id
        );

        return rest_ensure_response([
            "message" => "Author display name updated successfully",
            "author_id" => $author_id,
        ]);
    }

    public function update_category(WP_REST_Request $request)
    {
        $logger = new Automatik_Blog_Logger();

        // Check if current user has permissions
        if (!current_user_can("manage_categories")) {
            $logger->log("User does not have permission to update categories.");
            return new WP_Error(
                "rest_forbidden",
                __(
                    "You do not have permissions to update categories.",
                    "automatik-blog"
                ),
                ["status" => rest_authorization_required_code()]
            );
        }

        $category_id = intval($request->get_param("category_id"));
        $name = sanitize_text_field($request->get_param("name"));
        $slug = sanitize_title($request->get_param("slug"));
        $description = sanitize_textarea_field(
            $request->get_param("description")
        );

        if (empty($category_id) || empty($name)) {
            $logger->log("Category ID or name missing in the request.");
            return new WP_Error(
                "missing_data",
                __("Category ID and name are required.", "automatik-blog"),
                ["status" => 400]
            );
        }

        // Prepare category data
        $category_data = [
            "name" => $name,
        ];

        if (!empty($slug)) {
            $category_data["slug"] = $slug;
        }

        if (!empty($description)) {
            $category_data["description"] = $description;
        }

        // Update the category using wp_update_term()
        $result = wp_update_term($category_id, "category", $category_data);

        if (is_wp_error($result)) {
            $logger->log(
                "Failed to update category: " . $result->get_error_message()
            );
            return $result;
        }

        $logger->log("Category updated successfully. ID: " . $category_id);

        return rest_ensure_response([
            "message" => "Category updated successfully",
            "category_id" => $category_id,
        ]);
    }

    public function permission_callback($request)
    {
        $logger = new Automatik_Blog_Logger();

        // Retrieve the stored unique code
        $stored_code = get_option("automatik_blog_unique_code");

        // Get the code sent in the Authorization header
        $headers = $request->get_headers();
        $authorization_header = isset($headers["authorization"])
            ? $headers["authorization"]
            : null;

        if (!$authorization_header) {
            $logger->log("Authorization header missing in the request.");
            return new WP_Error(
                "unauthorized",
                __("Authorization header missing.", "automatik-blog"),
                ["status" => 401]
            );
        }

        // The header can be "Bearer {code}" or just "{code}"
        $received_code = trim(
            is_array($authorization_header)
                ? $authorization_header[0]
                : $authorization_header
        );
        if (stripos($received_code, "Bearer ") === 0) {
            $received_code = substr($received_code, 7);
        }

        // Compare the codes securely
        if (!hash_equals($stored_code, $received_code)) {
            $logger->log("Invalid authorization code provided.");
            return new WP_Error(
                "unauthorized",
                __("Invalid authorization code.", "automatik-blog"),
                ["status" => 401]
            );
        }

        // Authorization successful; no need to set current user

        return true;
    }

    public function publish_article(WP_REST_Request $request)
    {
        $logger = new Automatik_Blog_Logger();

        // Retrieve parameters individually
        $title = sanitize_text_field($request->get_param("title"));
        $slug = sanitize_title($request->get_param("slug"));
        $content = $request->get_param("content");
        $status = sanitize_text_field($request->get_param("status") ?: "draft");
        $categories = $request->get_param("categories");
        $tags = $request->get_param("tags");
        $author_id = intval($request->get_param("author_id"));
        $seo_focus_keyword = sanitize_text_field(
            $request->get_param("seo_focus_keyword")
        );
        $seo_title = sanitize_text_field($request->get_param("seo_title"));
        $seo_meta_description = sanitize_textarea_field(
            $request->get_param("seo_meta_description")
        );
        $post_type = sanitize_text_field(
            $request->get_param("post_type") ?: "post"
        );

        // Sanitize and validate content
        $content = wp_kses_post($content);

        // Process categories
        if (!empty($categories)) {
            if (is_array($categories)) {
                $categories = array_map("intval", $categories);
            } else {
                // Handle comma-separated string
                $categories = array_map(
                    "intval",
                    array_map("trim", explode(",", $categories))
                );
            }
        } else {
            $categories = [];
        }

        // Process tags
        if (!empty($tags)) {
            if (is_array($tags)) {
                $tags = array_map("sanitize_text_field", $tags);
            } else {
                // Handle comma-separated string
                $tags = array_map(
                    "sanitize_text_field",
                    array_map("trim", explode(",", $tags))
                );
            }
        } else {
            $tags = [];
        }

        // Validate post_type
        $post_type_input = $request->get_param("post_type") ?: "post";
        $post_type_input = sanitize_text_field($post_type_input);

        // Map input to valid post types
        $post_type_map = [
            "post" => "post",
            "posts" => "post",
            "Post" => "post",
            "Posts" => "post",
            "page" => "page",
            "pages" => "page",
            "Page" => "page",
            "Pages" => "page",
        ];

        // Normalize the input
        if (isset($post_type_map[$post_type_input])) {
            $post_type = $post_type_map[$post_type_input];
        } else {
            $logger->log("Invalid post type provided: " . $post_type_input);
            return new WP_Error(
                "invalid_post_type",
                __(
                    'Invalid post type. Use "post" or "page".',
                    "automatik-blog"
                ),
                ["status" => 400]
            );
        }

        // Validate required fields
        if (empty($title) || empty($content)) {
            $logger->log("Title or content missing in the request.");
            return new WP_Error(
                "missing_data",
                __("Title or content missing.", "automatik-blog"),
                ["status" => 400]
            );
        }

        // Prepare post data
        $post_data = [
            "post_title" => $title,
            "post_name" => $slug,
            "post_content" => $content,
            "post_status" => $status,
            "post_type" => $post_type,
        ];

        // Add this new code for excerpt
        $excerpt = sanitize_text_field($request->get_param("excerpt"));
        if (!empty($excerpt)) {
            $post_data["post_excerpt"] = $excerpt;
        }

        // Example of excerpt usage:
        $excerpt = sanitize_text_field($request->get_param("excerpt"));
        if (!empty($excerpt)) {
            $post_data["post_excerpt"] = $excerpt;
        }

        // Set the author
        if ($author_id && get_userdata($author_id)) {
            $post_data["post_author"] = $author_id;
        } else {
            // Get an administrator user
            $admin_users = get_users(["role" => "administrator"]);
            if (!empty($admin_users)) {
                $post_data["post_author"] = $admin_users[0]->ID;
            } else {
                $logger->log("No administrator user found.");
                return new WP_Error(
                    "no_user_permissions",
                    __("No administrator user found.", "automatik-blog"),
                    ["status" => 403]
                );
            }
        }

        // Add categories and tags if post type is 'post'
        if ($post_type === "post") {
            $post_data["post_category"] = $categories;
            $post_data["tags_input"] = $tags;
        }

        // Insert the post
        $post_id = wp_insert_post($post_data, true);

        if (is_wp_error($post_id)) {
            $logger->log(
                "Failed to create the article: " . $post_id->get_error_message()
            );
            return $post_id;
        }

        // Set SEO metadata
        if ($seo_focus_keyword || $seo_title || $seo_meta_description) {
            // Yoast SEO
            if (defined("WPSEO_VERSION")) {
                if (!empty($seo_title)) {
                    update_post_meta(
                        $post_id,
                        "_yoast_wpseo_title",
                        $seo_title
                    );
                }
                if (!empty($seo_meta_description)) {
                    update_post_meta(
                        $post_id,
                        "_yoast_wpseo_metadesc",
                        $seo_meta_description
                    );
                }
                if (!empty($seo_focus_keyword)) {
                    update_post_meta(
                        $post_id,
                        "_yoast_wpseo_focuskw",
                        $seo_focus_keyword
                    );
                }
            }

            // Rank Math SEO
            if (defined("RM_VERSION") || class_exists("RankMath")) {
                if (!empty($seo_title)) {
                    update_post_meta($post_id, "rank_math_title", $seo_title);
                }
                if (!empty($seo_meta_description)) {
                    update_post_meta(
                        $post_id,
                        "rank_math_description",
                        $seo_meta_description
                    );
                }
                if (!empty($seo_focus_keyword)) {
                    update_post_meta(
                        $post_id,
                        "rank_math_focus_keyword",
                        $seo_focus_keyword
                    );
                }
            }

            // All in One SEO
            if (
                defined("AIOSEO_VERSION") ||
                class_exists("AIOSEO\\Plugin\\Main")
            ) {
                $aioseo_meta = get_post_meta(
                    $post_id,
                    "_aioseo_settings",
                    true
                );
                if (!is_array($aioseo_meta)) {
                    $aioseo_meta = [];
                }

                if (!empty($seo_title)) {
                    $aioseo_meta["title"] = $seo_title;
                }
                if (!empty($seo_meta_description)) {
                    $aioseo_meta["description"] = $seo_meta_description;
                }
                if (!empty($seo_focus_keyword)) {
                    $aioseo_meta["focus_keyword"] = $seo_focus_keyword;
                }

                update_post_meta($post_id, "_aioseo_settings", $aioseo_meta);
            }
        }

        // Set featured image if featured_image_id is provided
        $featured_image_id = $request->get_param("featured_image_id");
        if ($featured_image_id) {
            $attachment_id = intval($featured_image_id);
            if (get_post($attachment_id)) {
                set_post_thumbnail($post_id, $attachment_id);
            } else {
                $logger->log("Featured image not found. ID: " . $attachment_id);
            }
        }

        // Upload and set featured image if provided
        $params = $request->get_params();
        if (isset($params["featured_image"])) {
            $image_data = $params["featured_image"];
            $image_id = $this->upload_image($image_data, $post_id);
            if (!is_wp_error($image_id)) {
                set_post_thumbnail($post_id, $image_id);
            } else {
                $logger->log(
                    "Failed to upload image: " . $image_id->get_error_message()
                );
            }
        }

        // Upload and insert media if provided
        if (isset($params["media"])) {
            $media_data = $params["media"];
            $attachment_id = $this->upload_image($media_data, $post_id);
            if (!is_wp_error($attachment_id)) {
                $filetype = wp_check_filetype($media_data["filename"], null);

                if (strpos($filetype["type"], "audio/") !== false) {
                    // It's an audio file
                    $audio_url = wp_get_attachment_url($attachment_id);

                    // Generate the audio block
                    $audio_block = "<!-- wp:audio -->\n";
                    $audio_block .=
                        '<figure class="wp-block-audio"><audio controls src="' .
                        esc_url($audio_url) .
                        '"></audio></figure>';
                    $audio_block .= "\n<!-- /wp:audio -->";

                    // Append or prepend the audio block to the content
                    $existing_post = get_post($post_id);
                    $new_content = $audio_block . $existing_post->post_content;

                    // Update the post with the new content
                    wp_update_post([
                        "ID" => $post_id,
                        "post_content" => $new_content,
                    ]);
                }
            } else {
                $logger->log(
                    "Failed to upload media: " .
                        $attachment_id->get_error_message()
                );
            }
        }

        // Get the article URL
        $post_url = get_permalink($post_id);

        $logger->log("Article published successfully. ID: " . $post_id);

        return rest_ensure_response([
            "message" => "Article published successfully",
            "post_id" => $post_id,
            "post_url" => $post_url,
            "title" => get_the_title($post_id),
        ]);
    }

    public function update_article(WP_REST_Request $request)
    {
        $logger = new Automatik_Blog_Logger();

        // Retrieve parameters individually
        $post_id = intval($request->get_param("id"));

        // Get the post object
        $post = get_post($post_id);

        if (!$post) {
            $logger->log("Article not found. ID: " . $post_id);
            return new WP_Error(
                "post_not_found",
                __("Article not found.", "automatik-blog"),
                ["status" => 404]
            );
        }

        // Get the actual post type of the post being updated
        $post_type = $post->post_type;

        // Retrieve parameters
        $title = $request->get_param("title");
        $slug = $request->get_param("slug");
        $content = $request->get_param("content");
        $status = $request->get_param("status");
        $categories = $request->get_param("categories");
        $tags = $request->get_param("tags");
        $author_id = intval($request->get_param("author_id"));
        $seo_focus_keyword = $request->get_param("seo_focus_keyword");
        $seo_title = $request->get_param("seo_title");
        $seo_meta_description = $request->get_param("seo_meta_description");

        // Sanitize inputs if they are provided
        if ($title !== null) {
            $title = sanitize_text_field($title);
        }
        if ($slug !== null) {
            $slug = sanitize_title($slug);
        }
        if ($content !== null) {
            $content = wp_kses_post($content);
        }
        if ($status !== null) {
            $status = sanitize_text_field($status);
        }
        if ($categories !== null) {
            if (is_array($categories)) {
                $categories = array_map("intval", $categories);
            } else {
                // Handle comma-separated string
                $categories = array_map(
                    "intval",
                    array_map("trim", explode(",", $categories))
                );
            }
        }
        if ($tags !== null) {
            if (is_array($tags)) {
                $tags = array_map("sanitize_text_field", $tags);
            } else {
                // Handle comma-separated string
                $tags = array_map(
                    "sanitize_text_field",
                    array_map("trim", explode(",", $tags))
                );
            }
        }
        if ($seo_focus_keyword !== null) {
            $seo_focus_keyword = sanitize_text_field($seo_focus_keyword);
        }
        if ($seo_title !== null) {
            $seo_title = sanitize_text_field($seo_title);
        }
        if ($seo_meta_description !== null) {
            $seo_meta_description = sanitize_textarea_field(
                $seo_meta_description
            );
        }

        // Prepare post data
        $post_data = [
            "ID" => $post_id,
        ];

        if ($title !== null) {
            $post_data["post_title"] = $title;
        }

        // Add this new code for excerpt
        $excerpt = sanitize_text_field($request->get_param("excerpt"));
        if (!empty($excerpt)) {
            $post_data["post_excerpt"] = $excerpt;
        }

        if ($slug !== null) {
            $post_data["post_name"] = $slug;
        }
        if ($content !== null) {
            $post_data["post_content"] = $content;
        }
        if ($status !== null) {
            $post_data["post_status"] = $status;
        }
        if ($author_id && get_userdata($author_id)) {
            $post_data["post_author"] = $author_id;
        } else {
            // Get an administrator user
            $admin_users = get_users(["role" => "administrator"]);
            if (!empty($admin_users)) {
                $post_data["post_author"] = $admin_users[0]->ID;
            } else {
                $logger->log("No administrator user found.");
                return new WP_Error(
                    "no_user_permissions",
                    __("No administrator user found.", "automatik-blog"),
                    ["status" => 403]
                );
            }
        }

        // Update the post
        $result = wp_update_post($post_data, true);

        if (is_wp_error($result)) {
            $logger->log(
                "Failed to update the article: " . $result->get_error_message()
            );
            return $result;
        }

        // Update categories and tags if provided
        if ($post_type === "post") {
            if ($categories !== null) {
                wp_set_post_categories($post_id, $categories);
            }
            if ($tags !== null) {
                wp_set_post_tags($post_id, $tags);
            }
        }

        // Set SEO metadata
        if ($seo_focus_keyword || $seo_title || $seo_meta_description) {
            // Yoast SEO
            if (defined("WPSEO_VERSION")) {
                if (!empty($seo_title)) {
                    update_post_meta(
                        $post_id,
                        "_yoast_wpseo_title",
                        $seo_title
                    );
                }
                if (!empty($seo_meta_description)) {
                    update_post_meta(
                        $post_id,
                        "_yoast_wpseo_metadesc",
                        $seo_meta_description
                    );
                }
                if (!empty($seo_focus_keyword)) {
                    update_post_meta(
                        $post_id,
                        "_yoast_wpseo_focuskw",
                        $seo_focus_keyword
                    );
                }
            }

            // Rank Math SEO
            if (defined("RM_VERSION") || class_exists("RankMath")) {
                if (!empty($seo_title)) {
                    update_post_meta($post_id, "rank_math_title", $seo_title);
                }
                if (!empty($seo_meta_description)) {
                    update_post_meta(
                        $post_id,
                        "rank_math_description",
                        $seo_meta_description
                    );
                }
                if (!empty($seo_focus_keyword)) {
                    update_post_meta(
                        $post_id,
                        "rank_math_focus_keyword",
                        $seo_focus_keyword
                    );
                }
            }

            // All in One SEO
            if (
                defined("AIOSEO_VERSION") ||
                class_exists("AIOSEO\\Plugin\\Main")
            ) {
                $aioseo_meta = get_post_meta(
                    $post_id,
                    "_aioseo_settings",
                    true
                );
                if (!is_array($aioseo_meta)) {
                    $aioseo_meta = [];
                }

                if (!empty($seo_title)) {
                    $aioseo_meta["title"] = $seo_title;
                }
                if (!empty($seo_meta_description)) {
                    $aioseo_meta["description"] = $seo_meta_description;
                }
                if (!empty($seo_focus_keyword)) {
                    $aioseo_meta["focus_keyword"] = $seo_focus_keyword;
                }

                update_post_meta($post_id, "_aioseo_settings", $aioseo_meta);
            }
        }

        // Set featured image if featured_image_id is provided
        $featured_image_id = $request->get_param("featured_image_id");
        if ($featured_image_id) {
            $attachment_id = intval($featured_image_id);
            if (get_post($attachment_id)) {
                set_post_thumbnail($post_id, $attachment_id);
            } else {
                $logger->log("Featured image not found. ID: " . $attachment_id);
            }
        }

        // Upload and set featured image if provided
        $featured_image = $request->get_param("featured_image");
        if ($featured_image) {
            $image_data = $featured_image;
            $image_id = $this->upload_image($image_data, $post_id);
            if (!is_wp_error($image_id)) {
                set_post_thumbnail($post_id, $image_id);
            } else {
                $logger->log(
                    "Failed to upload image: " . $image_id->get_error_message()
                );
            }
        }

        // Upload and insert media if provided
        $params = $request->get_params();
        if (isset($params["media"])) {
            $media_data = $params["media"];
            $attachment_id = $this->upload_image($media_data, $post_id);
            if (!is_wp_error($attachment_id)) {
                $filetype = wp_check_filetype($media_data["filename"], null);

                if (strpos($filetype["type"], "audio/") !== false) {
                    // It's an audio file
                    $audio_url = wp_get_attachment_url($attachment_id);

                    // Generate the audio block
                    $audio_block = "<!-- wp:audio -->\n";
                    $audio_block .=
                        '<figure class="wp-block-audio"><audio controls src="' .
                        esc_url($audio_url) .
                        '"></audio></figure>';
                    $audio_block .= "\n<!-- /wp:audio -->";

                    // Append or prepend the audio block to the content
                    $existing_post = get_post($post_id);
                    $new_content = $audio_block . $existing_post->post_content;

                    // Update the post with the new content
                    wp_update_post([
                        "ID" => $post_id,
                        "post_content" => $new_content,
                    ]);
                }
            } else {
                $logger->log(
                    "Failed to upload media: " .
                        $attachment_id->get_error_message()
                );
            }
        }

        // Get the article URL
        $post_url = get_permalink($post_id);

        $logger->log("Article updated successfully. ID: " . $post_id);

        return rest_ensure_response([
            "message" => "Article updated successfully",
            "post_id" => $post_id,
            "post_url" => $post_url,
        ]);
    }

    public function delete_article(WP_REST_Request $request)
    {
        $logger = new Automatik_Blog_Logger();

        $params = $request->get_params();
        $post_id = isset($params["id"]) ? intval($params["id"]) : 0;

        if (!$post_id || !get_post($post_id)) {
            $logger->log("Article not found for deletion. ID: " . $post_id);
            return new WP_Error(
                "post_not_found",
                __("Article not found.", "automatik-blog"),
                ["status" => 404]
            );
        }

        // Get an administrator user ID
        $admin_users = get_users(["role" => "administrator"]);
        if (!empty($admin_users)) {
            $admin_user_id = $admin_users[0]->ID;
        } else {
            $logger->log("No administrator user found for deletion.");
            return new WP_Error(
                "no_user_permissions",
                __("No administrator user found.", "automatik-blog"),
                ["status" => 403]
            );
        }

        // Delete the post
        $result = wp_delete_post($post_id, true);

        if (!$result) {
            $logger->log("Failed to delete the article. ID: " . $post_id);
            return new WP_Error(
                "post_deletion_failed",
                __("Failed to delete the article", "automatik-blog"),
                ["status" => 500]
            );
        }

        $logger->log("Article deleted successfully. ID: " . $post_id);

        return rest_ensure_response([
            "message" => "Article deleted successfully",
            "post_id" => $post_id,
        ]);
    }

    // Method for image upload
    public function upload_image_endpoint(WP_REST_Request $request)
    {
        $logger = new Automatik_Blog_Logger();

        $params = $request->get_params();

        if (!isset($params["image"])) {
            $logger->log("Image or audio data missing in the request.");
            return new WP_Error(
                "missing_media_data",
                __("Image or audio data missing.", "automatik-blog"),
                ["status" => 400]
            );
        }

        $image_data = $params["image"];

        $attachment_id = $this->upload_image($image_data);

        if (is_wp_error($attachment_id)) {
            $logger->log(
                "Failed to upload media: " . $attachment_id->get_error_message()
            );
            return $attachment_id;
        }

        // Get the media URL
        $attachment_url = wp_get_attachment_url($attachment_id);

        $logger->log("Media uploaded successfully. ID: " . $attachment_id);

        return rest_ensure_response([
            "message" => "Media uploaded successfully",
            "attachment_id" => $attachment_id,
            "attachment_url" => $attachment_url,
        ]);
    }

    private function upload_image($media_data, $post_id = 0)
    {
        require_once ABSPATH . "wp-admin/includes/file.php";
        require_once ABSPATH . "wp-admin/includes/media.php";
        require_once ABSPATH . "wp-admin/includes/image.php";

        $media_content = isset($media_data["data"]) ? $media_data["data"] : "";
        $filename = isset($media_data["filename"])
            ? sanitize_file_name($media_data["filename"])
            : "media-file";
        $alt_text = isset($media_data["alt_text"])
            ? sanitize_text_field($media_data["alt_text"])
            : "";
        $description = isset($media_data["description"])
            ? sanitize_textarea_field($media_data["description"])
            : "";
        $caption = isset($media_data["caption"])
            ? sanitize_text_field($media_data["caption"])
            : "";

        if (empty($media_content)) {
            return new WP_Error(
                "missing_media_data",
                __("Image or audio data missing.", "automatik-blog")
            );
        }

        // Decode base64 data
        $decoded_media = base64_decode($media_content);

        if ($decoded_media === false) {
            return new WP_Error(
                "invalid_media_data",
                __("Invalid media data.", "automatik-blog")
            );
        }

        // Initialize WP Filesystem
        global $wp_filesystem;
        if (!function_exists("WP_Filesystem")) {
            require_once ABSPATH . "/wp-admin/includes/file.php";
        }
        WP_Filesystem();

        // Save the media temporarily
        $upload_dir = wp_upload_dir();
        $filename = $this->get_unique_filename($upload_dir["path"], $filename);
        $file_path = $upload_dir["path"] . "/" . $filename;

        // Save the media using WP_Filesystem
        if (
            !$wp_filesystem->put_contents(
                $file_path,
                $decoded_media,
                FS_CHMOD_FILE
            )
        ) {
            return new WP_Error(
                "media_save_error",
                __("Error saving the media file.", "automatik-blog")
            );
        }

        // Prepare file data for upload
        $filetype = wp_check_filetype($filename, null);

        // Validate allowed MIME types
        $allowed_types = [
            "image/jpeg",
            "image/png",
            "image/gif",
            "audio/mpeg",
            "audio/wav",
            "audio/ogg",
            "audio/mp4",
        ];

        if (!in_array($filetype["type"], $allowed_types)) {
            wp_delete_file($file_path);
            return new WP_Error(
                "invalid_file_type",
                __("Unsupported file type.", "automatik-blog")
            );
        }

        $attachment = [
            "post_mime_type" => $filetype["type"],
            "post_title" => pathinfo($filename, PATHINFO_FILENAME),
            "post_content" => $description,
            "post_status" => "inherit",
            "post_excerpt" => $caption,
        ];

        // Insert attachment into WordPress
        $attach_id = wp_insert_attachment($attachment, $file_path, $post_id);

        // Check for errors
        if (is_wp_error($attach_id)) {
            wp_delete_file($file_path);
            return $attach_id;
        }

        // Generate attachment metadata based on file type
        if (strpos($filetype["type"], "image/") !== false) {
            // It's an image
            add_filter("big_image_size_threshold", "__return_false");
            $attach_data = wp_generate_attachment_metadata(
                $attach_id,
                $file_path
            );
            wp_update_attachment_metadata($attach_id, $attach_data);

            // Update alt text
            if (!empty($alt_text)) {
                update_post_meta(
                    $attach_id,
                    "_wp_attachment_image_alt",
                    $alt_text
                );
            }
        } elseif (strpos($filetype["type"], "audio/") !== false) {
            // It's an audio file
            // Generate metadata for audio files
            $attach_data = wp_generate_attachment_metadata(
                $attach_id,
                $file_path
            );
            wp_update_attachment_metadata($attach_id, $attach_data);
        }

        return $attach_id;
    }

    // New method to get posts
    public function get_posts(WP_REST_Request $request)
    {
        $params = $request->get_params();

        // Retrieve and sanitize parameters
        $per_page = isset($params["per_page"])
            ? min(intval($params["per_page"]), 100)
            : 10;
        $page = isset($params["page"]) ? max(intval($params["page"]), 1) : 1;
        $order =
            isset($params["order"]) && strtolower($params["order"]) === "asc"
                ? "ASC"
                : "DESC";
        $orderby = isset($params["orderby"])
            ? sanitize_key($params["orderby"])
            : "date";
        $post_type = isset($params["post_type"])
            ? sanitize_key($params["post_type"])
            : "post";
        $categories = isset($params["categories"]) ? $params["categories"] : "";

        // Process categories
        if (!empty($categories)) {
            if (is_array($categories)) {
                $categories = array_map("intval", $categories);
            } else {
                // Handle comma-separated string
                $categories = array_map(
                    "intval",
                    array_map("trim", explode(",", $categories))
                );
            }
        }

        // Build query arguments
        $args = [
            "post_type" => $post_type,
            "posts_per_page" => $per_page,
            "paged" => $page,
            "order" => $order,
            "orderby" => $orderby,
        ];

        if (!empty($categories)) {
            $args["category__in"] = $categories;
        }

        $query = new WP_Query($args);

        $posts = [];

        if ($query->have_posts()) {
            foreach ($query->posts as $post) {
                $categories = wp_get_post_categories($post->ID);
                $categories = array_map(function ($cat_id) {
                    $cat = get_category($cat_id);
                    return [
                        "id" => $cat->term_id,
                        "name" => $cat->name,
                        "slug" => $cat->slug,
                        "url" => get_category_link($cat_id),
                    ];
                }, $categories);

                $posts[] = [
                    "id" => $post->ID,
                    "title" => get_the_title($post->ID),
                    "date" => get_the_date("", $post->ID),
                    "link" => get_permalink($post->ID),
                    "categories" => $categories,
                ];
            }
            wp_reset_postdata();
        }

        // Prepare the response
        $response = rest_ensure_response($posts);

        // Add pagination headers
        $total_posts = $query->found_posts;
        $max_pages = $query->max_num_pages;

        $response->header("X-WP-Total", (int) $total_posts);
        $response->header("X-WP-TotalPages", (int) $max_pages);

        return $response;
    }

    // New method to get pages
    public function get_pages(WP_REST_Request $request)
    {
        $params = $request->get_params();

        // Retrieve and sanitize parameters
        $per_page = isset($params["per_page"])
            ? min(intval($params["per_page"]), 100)
            : 10;
        $page = isset($params["page"]) ? max(intval($params["page"]), 1) : 1;
        $order =
            isset($params["order"]) && strtolower($params["order"]) === "asc"
                ? "ASC"
                : "DESC";
        $orderby = isset($params["orderby"])
            ? sanitize_key($params["orderby"])
            : "date";

        // Build query arguments
        $args = [
            "post_type" => "page",
            "posts_per_page" => $per_page,
            "paged" => $page,
            "order" => $order,
            "orderby" => $orderby,
        ];

        $query = new WP_Query($args);

        $pages = [];

        if ($query->have_posts()) {
            foreach ($query->posts as $page_post) {
                $pages[] = [
                    "id" => $page_post->ID,
                    "title" => get_the_title($page_post->ID),
                    "date" => get_the_date("", $page_post->ID),
                    "link" => get_permalink($page_post->ID),
                ];
            }
            wp_reset_postdata();
        }

        // Prepare the response
        $response = rest_ensure_response($pages);

        // Add pagination headers
        $total_pages = $query->found_posts;
        $max_pages = $query->max_num_pages;

        $response->header("X-WP-Total", (int) $total_pages);
        $response->header("X-WP-TotalPages", (int) $max_pages);

        return $response;
    }

    // New method to get categories
    public function get_categories(WP_REST_Request $request)
    {
        $params = $request->get_params();

        $per_page = isset($params["per_page"])
            ? min(intval($params["per_page"]), 1000)
            : 0;
        $order =
            isset($params["order"]) && strtolower($params["order"]) === "asc"
                ? "ASC"
                : "DESC";
        $orderby = isset($params["orderby"])
            ? sanitize_key($params["orderby"])
            : "name";

        $args = [
            "taxonomy" => "category",
            "number" => $per_page,
            "orderby" => $orderby,
            "order" => $order,
            "hide_empty" => false,
        ];

        $categories = get_terms($args);

        $data = [];

        foreach ($categories as $category) {
            $data[] = [
                "id" => $category->term_id,
                "name" => $category->name,
                "slug" => $category->slug,
                "url" => get_category_link($category->term_id),
            ];
        }

        return rest_ensure_response($data);
    }

    // New method to get authors
    public function get_authors(WP_REST_Request $request)
    {
        $params = $request->get_params();

        $per_page = isset($params["per_page"])
            ? min(intval($params["per_page"]), 1000)
            : -1;
        $order =
            isset($params["order"]) && strtolower($params["order"]) === "desc"
                ? "DESC"
                : "ASC";
        $orderby = isset($params["orderby"])
            ? sanitize_key($params["orderby"])
            : "display_name";

        $args = [
            "role__in" => [
                "Administrator",
                "Editor",
                "Author",
                "Contributor",
                "Subscriber",
            ],
            "number" => $per_page,
            "orderby" => $orderby,
            "order" => $order,
        ];

        $users = get_users($args);

        $authors = [];

        foreach ($users as $user) {
            $authors[] = [
                "id" => $user->ID,
                "display_name" => $user->display_name,
                "user_login" => $user->user_login,
                "user_email" => $user->user_email,
            ];
        }

        return rest_ensure_response($authors);
    }

    // New method to get tags
    public function get_tags(WP_REST_Request $request)
    {
        $params = $request->get_params();

        $per_page = isset($params["per_page"])
            ? min(intval($params["per_page"]), 1000)
            : 0;
        $order =
            isset($params["order"]) && strtolower($params["order"]) === "asc"
                ? "ASC"
                : "DESC";
        $orderby = isset($params["orderby"])
            ? sanitize_key($params["orderby"])
            : "name";

        $args = [
            "taxonomy" => "post_tag",
            "number" => $per_page,
            "orderby" => $orderby,
            "order" => $order,
            "hide_empty" => false,
        ];

        $tags = get_terms($args);

        $data = [];

        foreach ($tags as $tag) {
            $data[] = [
                "id" => $tag->term_id,
                "name" => $tag->name,
                "slug" => $tag->slug,
            ];
        }

        return rest_ensure_response($data);
    }

    // New method to get plugins
    public function get_plugins(WP_REST_Request $request)
    {
        $logger = new Automatik_Blog_Logger();

        // Include necessary files
        if (!function_exists("get_plugins")) {
            require_once ABSPATH . "wp-admin/includes/plugin.php";
        }

        $plugins = get_plugins();

        // Limit to 1000 plugins
        $plugins = array_slice($plugins, 0, 1000);

        $plugins_data = [];

        foreach ($plugins as $plugin_file => $plugin_data) {
            $plugins_data[] = [
                "plugin_file" => $plugin_file,
                "Name" => $plugin_data["Name"],
                "PluginURI" => $plugin_data["PluginURI"],
                "Version" => $plugin_data["Version"],
                "Description" => $plugin_data["Description"],
                "Author" => $plugin_data["Author"],
                "AuthorURI" => $plugin_data["AuthorURI"],
                "TextDomain" => $plugin_data["TextDomain"],
                "DomainPath" => $plugin_data["DomainPath"],
                "Network" => $plugin_data["Network"],
                "Title" => $plugin_data["Title"],
                "AuthorName" => $plugin_data["AuthorName"],
                "Status" => is_plugin_active($plugin_file)
                    ? "active"
                    : "inactive",
            ];
        }

        $logger->log("Retrieved list of plugins.");

        return rest_ensure_response($plugins_data);
    }

    // New method to deactivate a plugin
    public function deactivate_plugin(WP_REST_Request $request)
    {
        $logger = new Automatik_Blog_Logger();

        // Check if current user has permissions
        if (!current_user_can("activate_plugins")) {
            $logger->log(
                "User does not have permission to deactivate plugins."
            );
            return new WP_Error(
                "rest_forbidden",
                __(
                    "You do not have permissions to deactivate plugins.",
                    "automatik-blog"
                ),
                ["status" => rest_authorization_required_code()]
            );
        }

        $plugin_file = sanitize_text_field($request->get_param("plugin_file"));

        if (empty($plugin_file)) {
            $logger->log("No plugin file specified for deactivation.");
            return new WP_Error(
                "missing_plugin_file",
                __("Plugin file is required.", "automatik-blog"),
                ["status" => 400]
            );
        }

        // Include necessary files
        require_once ABSPATH . "wp-admin/includes/plugin.php";

        if (!file_exists(WP_PLUGIN_DIR . "/" . $plugin_file)) {
            $logger->log("Plugin file does not exist: " . $plugin_file);
            return new WP_Error(
                "plugin_not_found",
                __("Plugin not found.", "automatik-blog"),
                ["status" => 404]
            );
        }

        deactivate_plugins($plugin_file);

        if (is_plugin_active($plugin_file)) {
            $logger->log("Failed to deactivate plugin: " . $plugin_file);
            return new WP_Error(
                "plugin_deactivation_failed",
                __("Failed to deactivate plugin.", "automatik-blog"),
                ["status" => 500]
            );
        }

        $logger->log("Plugin deactivated successfully: " . $plugin_file);

        return rest_ensure_response([
            "message" => "Plugin deactivated successfully",
            "plugin_file" => $plugin_file,
        ]);
    }

    // New method to delete a plugin
    public function delete_plugin(WP_REST_Request $request)
    {
        $logger = new Automatik_Blog_Logger();

        // Check if current user has permissions
        if (!current_user_can("delete_plugins")) {
            $logger->log("User does not have permission to delete plugins.");
            return new WP_Error(
                "rest_forbidden",
                __(
                    "You do not have permissions to delete plugins.",
                    "automatik-blog"
                ),
                ["status" => rest_authorization_required_code()]
            );
        }

        $plugin_file = sanitize_text_field($request->get_param("plugin_file"));

        if (empty($plugin_file)) {
            $logger->log("No plugin file specified for deletion.");
            return new WP_Error(
                "missing_plugin_file",
                __("Plugin file is required.", "automatik-blog"),
                ["status" => 400]
            );
        }

        // Include necessary files
        require_once ABSPATH . "wp-admin/includes/plugin.php";
        require_once ABSPATH . "wp-admin/includes/file.php";

        if (!file_exists(WP_PLUGIN_DIR . "/" . $plugin_file)) {
            $logger->log("Plugin file does not exist: " . $plugin_file);
            return new WP_Error(
                "plugin_not_found",
                __("Plugin not found.", "automatik-blog"),
                ["status" => 404]
            );
        }

        $result = delete_plugins([$plugin_file]);

        if (is_wp_error($result)) {
            $logger->log(
                "Failed to delete plugin: " .
                    $plugin_file .
                    " Error: " .
                    $result->get_error_message()
            );
            return $result;
        }

        $logger->log("Plugin deleted successfully: " . $plugin_file);

        return rest_ensure_response([
            "message" => "Plugin deleted successfully",
            "plugin_file" => $plugin_file,
        ]);
    }

    // New method to install a plugin
    public function install_plugin(WP_REST_Request $request)
    {
        $logger = new Automatik_Blog_Logger();

        // Check if current user has permissions
        if (!current_user_can("install_plugins")) {
            $logger->log("User does not have permission to install plugins.");
            return new WP_Error(
                "rest_forbidden",
                __(
                    "You do not have permissions to install plugins.",
                    "automatik-blog"
                ),
                ["status" => rest_authorization_required_code()]
            );
        }

        $plugin_slug = sanitize_text_field($request->get_param("plugin_slug"));
        $plugin_zip_url = esc_url_raw($request->get_param("plugin_zip_url"));

        if (empty($plugin_slug) && empty($plugin_zip_url)) {
            $logger->log(
                "No plugin slug or zip URL provided for installation."
            );
            return new WP_Error(
                "missing_plugin_info",
                __("Plugin slug or zip URL is required.", "automatik-blog"),
                ["status" => 400]
            );
        }

        // Include necessary files
        require_once ABSPATH . "wp-admin/includes/file.php";
        require_once ABSPATH . "wp-admin/includes/misc.php";
        require_once ABSPATH . "wp-admin/includes/class-wp-upgrader.php";
        require_once ABSPATH . "wp-admin/includes/plugin-install.php";

        $upgrader = new Plugin_Upgrader(new WP_Ajax_Upgrader_Skin());

        if (!empty($plugin_slug)) {
            // Install plugin from WordPress.org repository
            $api = plugins_api("plugin_information", [
                "slug" => $plugin_slug,
                "fields" => [
                    "sections" => false,
                ],
            ]);

            if (is_wp_error($api)) {
                $logger->log(
                    "Failed to retrieve plugin information for slug: " .
                        $plugin_slug
                );
                return new WP_Error(
                    "plugin_not_found",
                    __(
                        "Plugin not found in WordPress.org repository.",
                        "automatik-blog"
                    ),
                    ["status" => 404]
                );
            }

            $result = $upgrader->install($api->download_link);
        } else {
            // Install plugin from provided zip URL
            $result = $upgrader->install($plugin_zip_url);
        }

        if (is_wp_error($result)) {
            $logger->log(
                "Failed to install plugin. Error: " .
                    $result->get_error_message()
            );
            return $result;
        }

        if (!$result) {
            $logger->log("Plugin installation failed.");
            return new WP_Error(
                "plugin_installation_failed",
                __("Failed to install plugin.", "automatik-blog"),
                ["status" => 500]
            );
        }

        // Get the plugin file
        $plugin_file = $upgrader->plugin_info(); // Returns the plugin file path

        if (!$plugin_file) {
            $logger->log("Failed to retrieve plugin file after installation.");
            return new WP_Error(
                "plugin_installation_failed",
                __(
                    "Failed to retrieve plugin file after installation.",
                    "automatik-blog"
                ),
                ["status" => 500]
            );
        }

        $logger->log("Plugin installed successfully: " . $plugin_file);

        return rest_ensure_response([
            "message" => "Plugin installed successfully",
            "plugin_file" => $plugin_file,
        ]);
    }

    // New method to activate a plugin
    public function activate_plugin(WP_REST_Request $request)
    {
        $logger = new Automatik_Blog_Logger();

        // Check if current user has permissions
        if (!current_user_can("activate_plugins")) {
            $logger->log("User does not have permission to activate plugins.");
            return new WP_Error(
                "rest_forbidden",
                __(
                    "You do not have permissions to activate plugins.",
                    "automatik-blog"
                ),
                ["status" => rest_authorization_required_code()]
            );
        }

        $plugin_file = sanitize_text_field($request->get_param("plugin_file"));

        if (empty($plugin_file)) {
            $logger->log("No plugin file specified for activation.");
            return new WP_Error(
                "missing_plugin_file",
                __("Plugin file is required.", "automatik-blog"),
                ["status" => 400]
            );
        }

        // Include necessary files
        require_once ABSPATH . "wp-admin/includes/plugin.php";

        if (!file_exists(WP_PLUGIN_DIR . "/" . $plugin_file)) {
            $logger->log("Plugin file does not exist: " . $plugin_file);
            return new WP_Error(
                "plugin_not_found",
                __("Plugin not found.", "automatik-blog"),
                ["status" => 404]
            );
        }

        $result = activate_plugin($plugin_file);

        if (is_wp_error($result)) {
            $logger->log(
                "Failed to activate plugin: " .
                    $plugin_file .
                    " Error: " .
                    $result->get_error_message()
            );
            return $result;
        }

        $logger->log("Plugin activated successfully: " . $plugin_file);

        return rest_ensure_response([
            "message" => "Plugin activated successfully",
            "plugin_file" => $plugin_file,
        ]);
    }
} // End of class Automatik_Blog_REST_API_Endpoints
