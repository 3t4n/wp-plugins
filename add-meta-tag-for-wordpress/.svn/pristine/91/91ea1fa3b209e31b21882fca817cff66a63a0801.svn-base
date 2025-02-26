<?php

class Add_Meta_Tag_For_Wordpress_Public {

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
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
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
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/add-meta-tag-for-wordpress-public.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
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
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/add-meta-tag-for-wordpress-public.js', array('jquery'), $this->version, false);
    }

    /* Filter wp title */

    public function metabox_details() {
        global $post;
        $meta = get_post_meta($post->ID, 'add_meta_tag_for_wordpress', TRUE);
        $meta_description = "";
        $metakeywords = "";
        $metakeytitle = "";

        $is_enable = get_option('enable_tag');
        if ($is_enable == "yes") {
            $postType = get_post_type_object(get_post_type($post));

            $is_page = get_option('enable_page_tag');
            $is_post = get_option('enable_post_tag');

            $is_displaytitle = false;
            if (strtolower(trim($postType->capability_type)) == "page") {
                if ($is_page == "yes") {
                    $is_displaytitle = true;
                }
            } else if (strtolower(trim($postType->capability_type)) == "post") {
                if ($is_post == "yes") {
                    $is_displaytitle = true;
                }
            }


            if (is_array($meta) && $is_displaytitle) {
                $meta_description = $meta['meta_description'];
                $metakeywords = $meta['meta_keyword'];
                $metakeytitle = $meta['meta_title'];
                $is_enable_og = get_option('enable_og');



                $is_page = get_option('enable_page_tag');
                $is_post = get_option('enable_post_tag');

                echo '<meta name="description" content="' . $meta_description . '" />' . "\n";
                echo '<meta name="keywords" content="' . $metakeywords . '" />' . "\n";

                if ($is_enable_og == "yes") {
                    $type = (($post->post_type) == 'page') ? 'website' : $post->post_title;
                    echo '<meta property="og:locale" content="' . get_locale() . '"/>' . "\n";
                    echo '<meta property="og:type" content="' . $type . '"/>' . "\n";
                    echo '<meta property="og:title" content="' . $metakeytitle . '" />' . "\n";
                    echo '<meta property="og:description" content="' . $meta_description . '" />' . "\n";
                    echo '<meta property="og:url" content="' . get_permalink($post->ID) . '" />' . "\n";
                    echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '" />' . "\n";
                }
            }
        }
    }

    public function metabox_titletag($title) {
        global $post;
        $is_enable = get_option('enable_tag');
        if ($is_enable == "yes") {
            $postType = get_post_type_object(get_post_type($post));
            $is_page = get_option('enable_page_tag');
            $is_post = get_option('enable_post_tag');

            $is_displaytitle = false;
            if (strtolower(trim($postType->capability_type)) == "page") {
                if ($is_page == "yes") {
                    $is_displaytitle = true;
                }
            } else if (strtolower(trim($postType->capability_type)) == "post") {
                if ($is_post == "yes") {
                    $is_displaytitle = true;
                }
            }


            if ($is_displaytitle) {
                $meta = get_post_meta($post->ID, 'add_meta_tag_for_wordpress', TRUE);
                $meta_description = "";
                if (is_array($meta)) {
                    if (strlen($meta['meta_title']) > 0) {
                        $title = $meta['meta_title'] . ' | ';
                    }
                }
            }
        }
        return $title;
    }

}
