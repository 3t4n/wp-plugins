<?php
    /*
      Plugin Name: Preload Images
      Plugin URI:  https://wordpress.org/plugins/preload-images
      Description:  Similar to DNS prefetching, preload imagaes/ prefetching with JavaScript to get faster page loading experience.
      Version: 1.2.1
      Author: ravipatel
      Author URI:  https://profiles.wordpress.org/ravipatel/
      Text Domain: preload-images
      Domain Path: /languages
      License: GPLv2 or later
     */

    if (!defined('ABSPATH'))
        exit;

// Load text domain
    function preload_images_text_domain() {
        load_plugin_textdomain('preload-images', false, basename(dirname(__FILE__)) . '/languages');
    }

    add_action('init', 'preload_images_text_domain');

    class PreloadImages {

        private $preload_images_options;

        public function __construct() {
            add_action('admin_menu', [$this, 'preload_images_add_plugin_page']);
            add_action('admin_init', [$this, 'preload_images_page_init']);

            if (is_admin()) {
                add_action('load-post.php', [$this, 'preload_images_page_init']);
                add_action('load-post-new.php', [$this, 'preload_images_page_init']);
            }
        }

        public function preload_images_page_init() {
            register_setting(
                    'preload_images_option_group', // option_group
                    'preload_images_option_name', // option_name
                    [$this, 'preload_images_sanitize'] // sanitize_callback
            );

            add_settings_section(
                    'preload_images_setting_section', // id
                    'Settings', // title
                    [$this, 'preload_images_section_info'], // callback
                    'preload-images-admin' // page
            );

            add_settings_field(
                    'image_urls_0', // id
                    __('Common Image URLs', 'preload-images'), [$this, 'image_urls_0_callback'], // callback
                    'preload-images-admin', // page
                    'preload_images_setting_section' // section
            );

            add_settings_field(
                    'image_urls_ctp', 'Post Types', [$this, 'image_urls_cpt_callback'], 'preload-images-admin', 'preload_images_setting_section'
            );

            /* Add meta box custom post type */
            $preload_images_options = get_option('preload_images_option_name');
            $posts                  = !empty($preload_images_options['cpt_list']) ? $preload_images_options['cpt_list'] : [];

            if (!empty($posts)) {
                add_meta_box(
                        'sections_images_urls', __('Preload Images', 'tanium'), [$this, 'sections_images_urls_render_metabox'], $posts, 'advanced', 'default'
                );

                /* Save post */
                add_action('save_post', [$this, 'sections_images_urls_metabox'], 10, 2);
            }
        }

        public function sections_images_urls_metabox($post_id, $post) {
            if (!isset($_POST['sections_images_urls_nonce']) || !wp_verify_nonce($_POST['sections_images_urls_nonce'], 'sections_images_urls_nonce_action'))
                return;

            // Check if the user has permissions to save data.
            if (!current_user_can('edit_post', $post_id))
                return;

            // Check if it's not an autosave.
            if (wp_is_post_autosave($post_id))
                return;

            // Check if it's not a revision.
            if (wp_is_post_revision($post_id))
                return;

            $preload_image_urls = isset($_POST['preload_image_urls']) && !empty($_POST['preload_image_urls']) ? esc_textarea($_POST['preload_image_urls']) : null;
            update_post_meta($post_id, 'preload_image_urls', $preload_image_urls);
        }

        public function preload_images_add_plugin_page() {
            add_menu_page('Preload Images', 'Preload Images', 'manage_options', 'preload-images', [$this, 'preload_images_create_admin_page'], 'dashicons-images-alt', 99);
        }

        public function preload_images_create_admin_page() {
            $this->preload_images_options = get_option('preload_images_option_name');

            printf('<div class="wrap">
                <h2>%s</h2>
                <ul>
                    <li><a href="https://wordpress.org/support/plugin/preload-images" target="_blank" >%s</a></li>
                </ul>', __('Preload Images', 'preload-images'), __('Support Forum on WordPress.org', 'preload-images')
            );

            settings_errors();
            printf('<form method="post" action="options.php">');
            settings_fields('preload_images_option_group');
            do_settings_sections('preload-images-admin');
            submit_button();
            printf('</form></div>');
        }

        public function sections_images_urls_render_metabox($post) {
            // Add nonce for security and authentication.
            wp_nonce_field('sections_images_urls_nonce_action', 'sections_images_urls_nonce');
            $preload_image_urls = get_post_meta($post->ID, 'preload_image_urls', true);

            printf('<table class="form-table">
                    <tbody>
                        <tr>
                            <th>
                                <label>%s</label>
                            </th>
                            <td>
                                <textarea class="large-text" rows="10" name="preload_image_urls" id="preload_image_urls">%s</textarea><br><strong>One URL per line.</strong> 
                            </td>
                        </tr>
                        </tbody>
                    </table>', __('Image URLs', 'tanium'), !empty($preload_image_urls) ? esc_attr($preload_image_urls) : null
            );
        }

        public function preload_images_sanitize($input) {
            $sanitary_values = [];
            if (isset($input['image_urls_0'])) {
                $sanitary_values['image_urls_0'] = esc_textarea($input['image_urls_0']);
            }

            if (!empty($input['cpt_list'])) {
                $sanitary_values['cpt_list'] = $input['cpt_list'];
            }
            return $sanitary_values;
        }

        public function preload_images_section_info() {}

        public function image_urls_0_callback() {
            printf(
                    '<textarea class="large-text" rows="10" name="preload_images_option_name[image_urls_0]" id="image_urls_0">%s</textarea><br><strong>One URL per line.</strong> ', isset($this->preload_images_options['image_urls_0']) ? esc_attr($this->preload_images_options['image_urls_0']) : null
            );
        }

        public function image_urls_cpt_callback() {
            $post_types = get_post_types(['public' => true], 'objects', 'and');

            $posts = !empty($this->preload_images_options['cpt_list']) ? $this->preload_images_options['cpt_list'] : [];
            unset($post_types['attachment']);
            if (!empty($post_types)) {
                foreach ($post_types as $post_type) {
                    printf(
                            '<p><input type="checkbox" name="preload_images_option_name[cpt_list][]" id="cpt_list" value="%s" %s><strong>%s</strong></p>', esc_html($post_type->name), in_array($post_type->name, $posts) ? 'checked' : '', esc_html($post_type->labels->name)
                    );
                }
            }
        }

    }

    if (is_admin()) {
        $preload_images = new PreloadImages();
    }

// Add settings link on plugins page
    function preload_images_action_links($links) {
        $settings_link = '<a href="options-general.php?page=preload-images">' . __('Settings', 'preload-images') . '</a>';
        array_unshift($links, $settings_link);
        return $links;
    }

    $plugin = plugin_basename(__FILE__);
    add_filter("plugin_action_links_$plugin", 'preload_images_action_links');

//plugin script function
    function preload_images_scripts() {
        global $post;
        $preload_image_urls = $options_urls       = $urls_by_post       = $post_type          = [];
        $result             = null;

        if (is_front_page() && is_home()) {
            $id = get_option('page_for_posts');
        } elseif (is_home() && !is_front_page()) {
            $id = get_option('page_for_posts');
        } elseif (!is_home() && is_front_page()) {
            $id = get_option('page_on_front');
        } else {
            $id = !empty($post) ? $post->ID : null;
        }

        $post_type = get_post_type($id);

        $preload_images_options = get_option('preload_images_option_name');
        $posts                  = !empty($preload_images_options['cpt_list']) ? $preload_images_options['cpt_list'] : [];

        //Retrieve options value
        $preload_images_options = get_option('preload_images_option_name');
        $image_urls_0           = (isset($preload_images_options) && !empty($preload_images_options['image_urls_0'])) ? $preload_images_options['image_urls_0'] : [];

        //Retrieve post value
        $preload_image_urls     = get_post_meta($id, 'preload_image_urls', true);

        if (!empty($image_urls_0) || $preload_image_urls) {

            if (!empty($image_urls_0)) {
                $image_urls_0 = explode("\n", $image_urls_0); // Break a string into an array: explode(separator,string,limit) 
                $options_urls = array_map('esc_url', $image_urls_0);
            }

            if (in_array($post_type, $posts) && !empty($preload_image_urls)) {
                $preload_image_urls = explode("\n", $preload_image_urls);
                $urls_by_post       = array_map('esc_url', $preload_image_urls);
            }
            $urls = array_unique(array_merge($options_urls, $urls_by_post));

            $i = 1;
            foreach ($urls as $imageurl) {
                if (count($urls) == $i):
                    $result .= '"' . esc_url($imageurl) . '"' . "\n";
                else:
                    $result .= '"' . esc_url($imageurl) . '",' . "\n";
                endif;
                $i++;
            }
            ?>
            <script type="text/javascript">
                var images = new Array()
                function preload() {
                    for (i = 0; i < preload.arguments.length; i++) {
                        images[i] = new Image()
                        images[i].src = preload.arguments[i]
                    }
                }
                preload(<?php echo $result; ?>)
            </script>
            <?php
        }
    }
    add_action('wp_footer', 'preload_images_scripts', 100);