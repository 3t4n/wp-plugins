<?php

class Add_Meta_Tag_For_Wordpress_Admin {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Plugin_Name_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Plugin_Name_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/add-meta-tag-for-wordpress-admin.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Plugin_Name_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Plugin_Name_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/add-meta-tag-for-wordpress-admin.js', array('jquery'), $this->version, false);
        wp_enqueue_script($this->plugin_name . 'charcounter', plugin_dir_url(__FILE__) . 'js/jquery.charcounter.js', array('jquery'), $this->version, false);
       
    }

    public function registermetaboxpostpage($post_type, $post) {

        $is_enable = get_option('enable_tag');
        $is_page = get_option('enable_page_tag');
        $is_post = get_option('enable_post_tag');
    $screen = get_current_screen();	
   
        if ($is_enable == "yes") {
            if ((strtolower(trim($screen->id)) == "page") && ($is_page == "yes")) {
                add_meta_box(
                        'my-meta-box', __('Metadata(by <em>Add-Meta-Tag-For-WordPress</em>)'), array($this, 'render_add_meta_tag_for_wordpress'), $post_type, 'normal', 'default'
                );
            }
        		
            if ((strtolower(trim($screen->id)) == "post") && ($is_post == "yes")) {
                add_meta_box(
                        'my-meta-box', __('Metadata(by <em>Add-Meta-Tag-For-WordPress</em>)'), array($this, 'render_add_meta_tag_for_wordpress'), $post_type, 'normal', 'default'
                );
            }
        }
    }

    /* Add fied in meta box */

    public function render_add_meta_tag_for_wordpress($post_type) {

        global $post;
        $meta = get_post_meta($post->ID, 'add_meta_tag_for_wordpress', TRUE);

        $title_field_value = '';
        $meta_keyword_value = '';
        $meta_description_value = '';

        if (is_array($meta)) {
            $title_field_value = ($meta['meta_title']) ? $meta['meta_title'] : '';
            $meta_keyword_value = ($meta['meta_keyword']) ? $meta['meta_keyword'] : '';
            $meta_description_value = ($meta['meta_description']) ? $meta['meta_description'] : '';
        }
        print('
            <p>
                <label for="amt_custom_description"><strong>' . __('Title', 'add-meta-tag-for-wordpress') . '</strong>:</label>                
                    <input maxlength="60"  warnlength="50" type="text" class="charcounter-control" style="width: 99%" id="meta_title" name="meta_title" value="' . esc_attr(stripslashes($title_field_value)) . '" />
                <br>
                <h6 class="pull-right" id="count_message"></h6>
                ' . __('Enter a custom title to be used in the title HTML element of the page', 'add-meta-tag-for-wordpress') . '
            </p>
            <p>
                <label for="amt_custom_description"><strong>' . __('Keyword', 'add-meta-tag-for-wordpress') . '</strong>:</label>
                <textarea maxlength="160"  warnlength="150" class="charcounter-control" style="width: 99%" id="meta_keyword" name="meta_keyword" cols="30" rows="2" >' . esc_attr(stripslashes($meta_keyword_value)) . '</textarea>
                <br>
                ' . __('Enter keywords separated with commas.', 'add-meta-tag-for-wordpress') . '
            </p>
            <p>
                <label for="amt_custom_description"><strong>' . __('Description', 'add-meta-tag-for-wordpress') . '</strong>:</label>
                <textarea maxlength="160"  warnlength="150" class="charcounter-control" style="width: 99%" id="meta_description" name="meta_description" cols="30" rows="2" >' . esc_attr(stripslashes($meta_description_value)) . '</textarea>
                <br>
                ' . __('Enter a custom description.', 'add-meta-tag-for-wordpress') . '
            </p>
        ');
    }

    /* save meta box */

    public function save_meta_tag_for_wordpress($post_id) {

        $drafts = array(
            'meta_title' => $_POST['meta_title'],
            'meta_keyword' => $_POST['meta_keyword'],
            'meta_description' => $_POST['meta_description']
        );
        update_post_meta($post_id, 'add_meta_tag_for_wordpress', $drafts);
    }

}
