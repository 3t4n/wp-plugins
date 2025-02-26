<?php

class Comments_Admin extends Comments_Main {

    public function __construct() {
        parent::__construct();

        add_action('admin_menu', array($this, 'add_menu_item'));
        add_action('admin_init', array($this, 'register_settings'));
    }

    /**
     * add a menu item unter the comment comments menu
     *
     * @since 1.0.0
     */
    public function add_menu_item() {
        add_comments_page(__('Customize Comments', 'comments'), __('Settings', 'comments'), 'manage_options', 'comments-customizer', array($this, 'render_settings_page'));
    }

    /**
     * render the comment form settings page
     *
     * @since 1.0.0
     */
    public function render_settings_page() {
        ?>
        <div class="wrap">
            <form method="post" action="options.php">
                <?php
                // This prints out all hidden setting fields
                settings_fields('comments_settings');
                do_settings_sections('comments-customizer');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    /**
     * initialize settings with Settings API
     *
     * @since 1.0.0
     * @link http://codex.wordpress.org/Settings_API
     */
    public function register_settings() {
        // add sections to comment form settings page
        add_settings_section('comments_permission_section', __('Disable comments', 'comments'), array($this, 'render_permission_section_callback'), 'comments-customizer');

        // add settings fields
        add_settings_field('comments_settings_post_type_permission', __('Disable comments', 'comments'), array($this, 'render_post_type_permission_callback'), 'comments-customizer', 'comments_permission_section');

        // register setting for $_POST handling
        register_setting('comments_settings', 'comments_settings');
    }

    /**
     * content put at the top of the disable comments section on the comments settings apge
     *
     * @since 1.0.0
     */
    public function render_permission_section_callback() {
        echo '<p>' . __('Choose on which post types comments are disabled.', 'comments') . '</p>';
        echo '<p>' . __('Keep in mind that this does not work in reverse. E.g. if commenting is disabled in your blog or your theme doesn’t have comments included for all post types not disabling them here does not automatically enabling them.', 'comments') . '</p>';
        echo '<p>' . __('The setting will not overwrite post (type) specific settings. If commenting is disabled for a specific post, allowing it here does not have any effect', 'comments') . '</p>';
        echo '<p>' . __('Comments will not be removed from your database when you disable them here.', 'comments') . '</p>';
    }

    /**
     * content of the option to disable comments by post type
     *
     * @since 1.0.0
     */
    public function render_post_type_permission_callback() {
        /**
         * get all post types
         * @link http://codex.wordpress.org/Function_Reference/get_post_types
         */
        $args = array(
            'public' => true
        );

        $output = 'objects';
        $post_types = get_post_types($args, $output);

        $post_type_permissions = $this->options('disabled_post_type');

        foreach ($post_types as $post_type) {
            $checked = isset($post_type_permissions[$post_type->name]) ? checked(1, $post_type_permissions[$post_type->name], false) : '';
            echo '<p>';
            echo '<input type="checkbox" id="disabled_post_type_'.$post_type->name.'" '
                    . 'value="1" ' . $checked
                    . ' name="comments_settings[disabled_post_type]['. $post_type->name .']"/>';
            echo '<label for="disabled_post_type_'.$post_type->name.'">'.$post_type->labels->name.'</label>';
            echo '</p>';
        }
    }

}
