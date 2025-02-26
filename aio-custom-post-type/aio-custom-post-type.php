<?php
/*
 * Plugin Name: AIO Custom Post Type | AIOCPT
 * Description: A professional plugin to create and manage custom post types with advanced settings and default block editor.
 * Version: 1.0
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Author: Ashok Kumar
 * License: GPL-2.0-or-later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: aio-custom-post-type
 */

defined("ABSPATH") || exit();

// Add admin menu
add_action("admin_menu", function () {
    add_menu_page(
        "AIO CPT",
        "AIO CPT",
        "manage_options",
        "aio-custom-post-type",
        "aiocpt_admin_page",
        "dashicons-admin-tools",
        85
    );
});

// Display the admin page
function aiocpt_admin_page()
{
    $post_types = get_option("aiocpt_post_types", []); ?>
    <div class="wrap">
        <h1>AIOCPT - Manage AIO Custom Post Types</h1>
        <br>
        <div id="postbox-container" class="meta-box-sortables">
            <div id="postbox-container-1" class="postbox-container">
                <div id="side-sortables" class="meta-box-sortables ui-sortable">
                    <div id="submitdiv" class="postbox">
                        <h2 class="hndle"><span>Create New Post Type</span></h2>
                        <div class="inside">
                            <form method="post" action="">
                                <?php wp_nonce_field(
                                    "aiocpt_create_post_type",
                                    "aiocpt_nonce"
                                ); ?>
                                <table class="form-table">
                                    <tbody>
                                        <tr>
                                            <th><label for="post_type_slug">Post Type Slug:</label></th>
                                            <td><input type="text" name="post_type_slug" id="post_type_slug" required placeholder="e.g., books" class="regular-text"></td>
                                        </tr>
                                        <tr>
                                            <th><label for="post_type_name">Post Type Name (Plural):</label></th>
                                            <td><input type="text" name="post_type_name" id="post_type_name" required placeholder="e.g., Books" class="regular-text"></td>
                                        </tr>
                                        <tr>
                                            <th><label for="post_type_singular">Post Type Name (Singular):</label></th>
                                            <td><input type="text" name="post_type_singular" id="post_type_singular" required placeholder="e.g., Book" class="regular-text"></td>
                                        </tr>
                                        <tr>
                                            <th><label for="supports">Supports:</label></th>
                                            <td>
                                                <fieldset>
                                                    <legend class="screen-reader-text">Supports</legend>
                                                    <ul>
                                                        <li><input type="checkbox" name="supports[]" value="title" checked> Title</li>
                                                        <li><input type="checkbox" name="supports[]" value="editor" checked> Editor</li>
                                                        <li><input type="checkbox" name="supports[]" value="thumbnail"> Featured Image</li>
                                                        <li><input type="checkbox" name="supports[]" value="custom-fields"> Custom Fields</li>
                                                    </ul>
                                                </fieldset>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="public">Publicly Visible:</label></th>
                                            <td>
                                                <select name="public" id="public">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="has_archive">Has Archive:</label></th>
                                            <td>
                                                <select name="has_archive" id="has_archive">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="hierarchical">Hierarchical:</label></th>
                                            <td>
                                                <select name="hierarchical" id="hierarchical">
                                                    <option value="1">Yes (like Pages)</option>
                                                    <option value="0" selected>No (like Posts)</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="taxonomies">Taxonomies:</label></th>
                                            <td>
                                                <fieldset>
                                                    <legend class="screen-reader-text">Taxonomies</legend>
                                                    <ul>
                                                        <li><input type="checkbox" name="taxonomies[]" value="category"> Category</li>
                                                        <li><input type="checkbox" name="taxonomies[]" value="post_tag"> Tags</li>
                                                    </ul>
                                                </fieldset>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p><input type="submit" name="aiocpt_post_save" class="button button-primary aiocpt_button" value="Create Post Type"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div id="postbox-container-2" class="postbox-container">
                <div id="normal-sortables" class="meta-box-sortables ui-sortable">
                    <?php if (!empty($post_types)): ?>
                        <div id="existing-post-types" class="postbox">
                            <h2 class="hndle"><span>Existing Custom Post Types</span></h2>
                            <div class="inside">
                                <table class="wp-list-table widefat fixed striped aiocpt_table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Slug</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Singular Name</th>
                                            <th scope="col">Public</th>
                                            <th scope="col">Archive</th>
                                            <th scope="col">Hierarchical</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach (
                                            $post_types
                                            as $slug => $data
                                        ): ?>
                                            <tr>
                                                <td><?php echo esc_html(
                                                    $slug
                                                ); ?></td>
                                                <td><?php echo esc_html(
                                                    $data["name"]
                                                ); ?></td>
                                                <td><?php echo esc_html(
                                                    $data["singular"]
                                                ); ?></td>
                                                <td><?php echo $data["public"]
                                                    ? "Yes"
                                                    : "No"; ?></td>
                                                <td><?php echo $data[ 
                                                    "has_archive"
                                                ] 
                                                    ? "Yes" 
                                                    : "No"; ?></td>
                                                <td><?php echo $data[ 
                                                    "hierarchical"
                                                ] 
                                                    ? "Yes" 
                                                    : "No"; ?></td>
                                                <td>
                                                    <form method="post" action="" style="display:inline;">
                                                        <?php wp_nonce_field(
                                                            "aiocpt_delete_post_type",
                                                            "aiocpt_nonce"
                                                        ); ?>
                                                        <input type="hidden" name="delete_slug" value="<?php echo esc_attr(
                                                            $slug
                                                        ); ?>">
                                                        <input type="submit" class="button button-secondary aiocpt_delete_button" value="Delete">
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}

// Handle form submissions
add_action("admin_init", function () {
    if (
        isset($_POST["aiocpt_post_save"]) &&
        check_admin_referer("aiocpt_create_post_type", "aiocpt_nonce")
    ) {
        // Get and sanitize input data
        $slug = isset($_POST["post_type_slug"]) ? sanitize_key($_POST["post_type_slug"]) : "";
        $name = isset($_POST["post_type_name"]) ? sanitize_text_field(wp_unslash($_POST["post_type_name"])) : "";
        $singular = isset($_POST["post_type_singular"]) ? sanitize_text_field(wp_unslash($_POST["post_type_singular"])) : "";

        // Sanitize 'supports' array
        $supports = isset($_POST['supports']) ? array_map('sanitize_text_field', wp_unslash($_POST['supports'])) : [];

        // Sanitize 'public', 'has_archive', and 'hierarchical'
        $public = isset($_POST["public"]) ? (bool) $_POST["public"] : true;
        $has_archive = isset($_POST["has_archive"]) ? (bool) $_POST["has_archive"] : true;
        $hierarchical = isset($_POST["hierarchical"]) ? (bool) $_POST["hierarchical"] : false;

        // Sanitize 'taxonomies' array
        $taxonomies = isset($_POST['taxonomies']) ? array_map('sanitize_text_field', wp_unslash($_POST['taxonomies'])) : [];

        // Validate 'slug' to ensure it is a valid slug
        if (empty($slug) || empty($name) || empty($singular)) {
            wp_die('Post type slug, name, and singular name cannot be empty.');
        }

        // Save the post type data with a prefixed option
        $post_types = get_option("aiocpt_post_types", []);
        $post_types[$slug] = [
            "name" => $name,
            "singular" => $singular,
            "supports" => $supports,
            "public" => $public,
            "has_archive" => $has_archive,
            "hierarchical" => $hierarchical,
            "taxonomies" => $taxonomies,
        ];

        update_option("aiocpt_post_types", $post_types);

        // Register the custom post type with a prefixed slug
        register_post_type("aio-custom-post-type" . $slug, [
            "labels" => [
                "name" => $name,
                "singular_name" => $singular,
            ],
            "public" => $public,
            "has_archive" => $has_archive,
            "hierarchical" => $hierarchical,
            "supports" => $supports,
            "taxonomies" => $taxonomies,
        ]);

        // Redirect to avoid resubmission
        wp_redirect(admin_url("admin.php?page=aio-custom-post-type"));
        exit;
    }

    // Handle post type deletion
    if (
        isset($_POST["delete_slug"]) &&
        check_admin_referer("aiocpt_delete_post_type", "aiocpt_nonce")
    ) {
        $slug = isset($_POST["delete_slug"]) ? sanitize_key($_POST["delete_slug"]) : "";

        if (!empty($slug)) {
            // Delete post type data
            $post_types = get_option("aiocpt_post_types", []);
            unset($post_types[$slug]);
            update_option("aiocpt_post_types", $post_types);

            // Remove the post type registration
            unregister_post_type($slug);

            // Redirect to avoid resubmission
            wp_redirect(admin_url("admin.php?page=aio-custom-post-type"));
            exit;
        }
    }
});

// Register saved custom post types
add_action("init", function () {
    // Register your post types
    $post_types = get_option("aiocpt_post_types", []);
    foreach ($post_types as $slug => $data) {
        register_post_type($slug, [
            "labels" => [
                "name" => $data["name"],
                "singular_name" => $data["singular"],
            ],
            "public" => $data["public"],
            "has_archive" => $data["has_archive"],
            "hierarchical" => $data["hierarchical"],
            "supports" => $data["supports"],
            "taxonomies" => $data["taxonomies"],
            "show_in_rest" => true,
            "rewrite" => [
                "slug" => $slug,
                "with_front" => false,
                "feeds" => true,
            ],
        ]);
    }

    // Flush rewrite rules
    flush_rewrite_rules();
});

