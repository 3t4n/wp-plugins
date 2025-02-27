<?php
/**
 * @version    1.0
 * @package    Ovic_Pinmap
 */
if (!class_exists('Ovic_Pinmap_Post_Type')) {
    class Ovic_Pinmap_Post_Type
    {
        /**
         * Initialize.
         *
         * @return  void
         */
        public function __construct()
        {
            // Register Post_Type.
            add_action('init', array($this, 'register_post_type'));
            // template Post_Type.
            add_filter('single_template', array($this, 'single_pinmap'));
            // Register Ajax actions / filters.
            add_filter('woocommerce_json_search_found_products', array($this, 'search_products'));
        }

        public function single_pinmap($single)
        {
            global $post;

            /* Checks for single template by post type */
            if ($post->post_type == 'ovic_pinmap') {
                if (file_exists(OVIC_PINMAP_DIR.'/archive-pinmap.php')) {
                    return OVIC_PINMAP_DIR.'/archive-pinmap.php';
                }
            }

            return $single;
        }

        public function is_pinmap()
        {
            global $pagenow, $post_type, $post;

            if (in_array($pagenow, array('edit.php', 'post.php', 'post-new.php'))) {
                if (!isset($post_type)) {
                    $post_type = isset($_REQUEST['post_type']) ? wp_unslash($_REQUEST['post_type']) : null;
                }
                if (empty($post_type) && (isset($post) || isset($_REQUEST['post']))) {
                    $post_type = isset($post) ? $post->post_type : get_post_type(absint($_REQUEST['post']));
                }
                if ('ovic_pinmap' == $post_type) {
                    return true;
                }
            }

            return false;
        }

        /**
         * is Elementor editor?
         *
         * @return bool
         */
        public static function is_elementor_editor()
        {
            if (class_exists('Elementor\Plugin')) {
                if (Elementor\Plugin::$instance->preview->is_preview_mode() || Elementor\Plugin::$instance->editor->is_edit_mode()) {
                    return true;
                }
            }

            return false;
        }

        public function register_post_type()
        {
            global $pagenow;

            $labels = array(
                'name'               => esc_html__('Pinmap', 'ovic-pinmap'),
                'singular_name'      => esc_html__('Pinmap', 'ovic-pinmap'),
                'menu_name'          => esc_html__('Pinmap', 'ovic-pinmap'),
                'name_admin_bar'     => esc_html__('Pinmap', 'ovic-pinmap'),
                'add_new'            => esc_html__('Add New', 'ovic-pinmap'),
                'add_new_item'       => sprintf(esc_html__('Add New %s', 'ovic-pinmap'), 'Pinmap'),
                'new_item'           => sprintf(esc_html__('New %s', 'ovic-pinmap'), 'Pinmap'),
                'edit_item'          => sprintf(esc_html__('Edit %s', 'ovic-pinmap'), 'Pinmap'),
                'view_item'          => sprintf(esc_html__('View %s', 'ovic-pinmap'), 'Pinmap'),
                'all_items'          => sprintf(esc_html__('%s', 'ovic-pinmap'), 'Pinmap'),
                'search_items'       => sprintf(esc_html__('Search %s', 'ovic-pinmap'), 'Pinmap'),
                'parent_item_colon'  => sprintf(esc_html__('Parent %s:', 'ovic-pinmap'), 'Pinmap'),
                'not_found'          => sprintf(esc_html__('No %s found.', 'ovic-pinmap'), 'Pinmap'),
                'not_found_in_trash' => sprintf(esc_html__('No %s found in Trash.', 'ovic-pinmap'), 'Pinmap'),
            );
            $args   = array(
                'labels'             => $labels,
                'description'        => '',
                'public'             => true,
                'publicly_queryable' => true,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'query_var'          => true,
                'rewrite'            => array(
                    'slug'       => 'pinmap',
                    'with_front' => false
                ),
                'capability_type'    => 'post',
                'menu_icon'          => 'dashicons-pressthis',
                'has_archive'        => true,
                'hierarchical'       => false,
                'show_in_rest'       => false,
                'menu_position'      => 4,
                'supports'           => array('title', 'editor'),
            );
            register_post_type('ovic_pinmap', $args);

            $labels = array(
                'name'                       => esc_html__('Category', 'ovic-pinmap'),
                'singular_name'              => esc_html__('Category', 'ovic-pinmap'),
                'search_items'               => sprintf(esc_html__('Search %s', 'ovic-pinmap'), 'Category'),
                'popular_items'              => sprintf(esc_html__('Popular %s', 'ovic-pinmap'), 'Category'),
                'all_items'                  => sprintf(esc_html__('All %s', 'ovic-pinmap'), 'Category'),
                'parent_item'                => null,
                'parent_item_colon'          => null,
                'edit_item'                  => sprintf(esc_html__('Edit %s', 'ovic-pinmap'), 'Category'),
                'update_item'                => sprintf(esc_html__('Update %s', 'ovic-pinmap'), 'Category'),
                'add_new_item'               => sprintf(esc_html__('Add New %s', 'ovic-pinmap'), 'Category'),
                'new_item_name'              => sprintf(esc_html__('New %s Name', 'ovic-pinmap'), 'Category'),
                'separate_items_with_commas' => sprintf(esc_html__('Separate %s with commas', 'ovic-pinmap'), 'Category'),
                'add_or_remove_items'        => sprintf(esc_html__('Add or remove %s', 'ovic-pinmap'), 'Category'),
                'choose_from_most_used'      => sprintf(esc_html__('Choose from the most used %s', 'ovic-pinmap'), 'Category'),
                'not_found'                  => sprintf(esc_html__('No %s found.', 'ovic-pinmap'), 'Category'),
                'menu_name'                  => 'Category',
            );
            $args   = array(
                'hierarchical'          => false,
                'labels'                => $labels,
                'show_ui'               => true,
                'show_admin_column'     => true,
                'update_count_callback' => '_update_post_term_count',
                'query_var'             => true,
                'rewrite'               => array(
                    'slug'       => 'pinmap-cat',
                    'with_front' => false
                ),
            );
            register_taxonomy('pinmap_cat', 'ovic_pinmap', $args);

            // Check if WR Mapper page is requested.
            if ($this->is_pinmap()) {
                if ('edit.php' == $pagenow) {
                    // Register necessary actions / filters to customize All Items screen.
                    add_filter('bulk_actions-edit-ovic_pinmap', array($this, 'bulk_actions'));
                    add_filter('manage_ovic_pinmap_posts_columns', array($this, 'register_columns'));
                    add_action('manage_posts_custom_column', array($this, 'display_columns'), 10, 2);
                } elseif (in_array($pagenow, array('post.php', 'post-new.php'))) {
                    if (!isset($_REQUEST['action']) || 'trash' != $_REQUEST['action']) {
                        // Register necessary actions / filters to override Item Details screen.
                        add_action('admin_footer', array($this, 'load_edit_form'));
                        add_action('save_post', array($this, 'save_post'), 10, 2);
                    }
                }
                add_action('admin_enqueue_scripts', array($this, 'enqueue_assets'), 999);
            }
        }

        /**
         * Setup bulk actions for in stock alert subscription screen.
         *
         * @param    $actions
         *
         * @return  array
         */
        public function bulk_actions($actions)
        {
            // Remove edit action.
            unset($actions['edit']);

            return $actions;
        }

        /**
         * Register columns for in stock alert subscription screen.
         *
         * @param  $columns
         *
         * @return  array
         */
        public function register_columns($columns)
        {
            $columns = array(
                'cb'                  => '<input type="checkbox" />',
                'title'               => esc_html__('Name', 'ovic-pinmap'),
                'image'               => esc_html__('Image', 'ovic-pinmap'),
                'num_pins'            => esc_html__('Number of Pins', 'ovic-pinmap'),
                'shortcode'           => esc_html__('Shortcode', 'ovic-pinmap'),
                'taxonomy-pinmap_cat' => esc_html__('Categories', 'ovic-pinmap'),
                'date'                => esc_html__('Time', 'ovic-pinmap'),
            );

            return $columns;
        }

        /**
         * Display columns for in stock alert subscription screen.
         *
         * @param    $column
         * @param    $post_id
         *
         */
        public function display_columns($column, $post_id)
        {
            switch ($column) {
                case 'image' :
                    // Get current image.
                    $attachment_id = get_post_meta($post_id, 'ovic_pinmap_image', true);
                    if ($attachment_id) {
                        // Print image source.
                        echo wp_get_attachment_image($attachment_id, array(70, 70));
                    } else {
                        echo esc_html__('No image', 'ovic-pinmap');
                    }
                    break;
                case 'num_pins' :
                    // Get all pins.
                    $pins = get_post_meta($post_id, 'ovic_pinmap_pins', true);
                    echo $pins ? count($pins) : 0;
                    break;
                case 'shortcode' :
                    ?>
                    <span>[ovic_pinmap id="<?php echo absint($post_id); ?>"]</span>
                    <?php
                    break;
            }
        }

        /**
         * Enqueue assets for custom add/edit item form.
         */
        public function enqueue_assets()
        {
            // Check if WR Mapper page is requested.
            global $pagenow;

            if ($this->is_pinmap()) {
                wp_dequeue_script('select2');
            }

            // Register action to print inline initialization script.
            if ($this->is_pinmap() && 'edit.php' == $pagenow) {
                add_action('admin_print_footer_scripts', array($this, 'print_footer_scripts'));
            }

            if ($this->is_pinmap() && in_array($pagenow, array('post.php', 'post-new.php'))) {
                // Enqueue media.
                wp_enqueue_media();
                // Enqueue Select2.
                wp_enqueue_style('select2', OVIC_PINMAP_URL.'assets/3rd-party/select2/select2.min.css');
                wp_enqueue_script('wr_select2', OVIC_PINMAP_URL.'assets/3rd-party/select2/select2.min.js', array(), false, true);
                // Enqueue custom color picker library.
                wp_enqueue_style('ovic-color-picker', OVIC_PINMAP_URL.'assets/3rd-party/color-picker/color-picker.css', array('wp-color-picker'));
                wp_enqueue_script('ovic-color-picker', OVIC_PINMAP_URL.'assets/3rd-party/color-picker/color-picker.js', array('wp-color-picker'), false, true);
                // Awesome
                wp_enqueue_style('font-awesome', OVIC_PINMAP_URL.'assets/3rd-party/font-awesome/css/font-awesome.min.css', array(), '2.4');
                // Enqueue assets for custom add/edit item form.
                wp_enqueue_style('ovic-pinmap', OVIC_PINMAP_URL.'assets/admin/pinmap.css');
                wp_enqueue_script('ovic-pinmap', OVIC_PINMAP_URL.'assets/admin/pinmap.js', array(), false, true);
                wp_localize_script('ovic-pinmap', 'ovic_pinmap_params',
                    array(
                        'is_elementor'     => (bool) $this->is_elementor_editor(),
                        'product_selector' => array(
                            'url'      => admin_url('admin-ajax.php?action=woocommerce_json_search_products'),
                            'security' => wp_create_nonce('search-products'),
                        ),
                        'text'             => array(
                            'img_selector_btn_label'   => esc_html__('Select', 'ovic-pinmap'),
                            'img_selector_modal_title' => esc_html__('Select or upload an image', 'ovic-pinmap'),
                            'ask_for_saving_changes'   => esc_html__('Your changes on this page are not saved!', 'ovic-pinmap'),
                            'confirm_removing_pin'     => esc_html__('Are you sure you want to remove this pin?', 'ovic-pinmap'),
                            'please_input_a_title'     => esc_html__('Please input a title for this pin', 'ovic-pinmap'),
                        ),
                    )
                );
            }
        }

        /**
         * Method to print inline initialization script for items list screen.
         *
         * @return  void
         */
        public function print_footer_scripts()
        {
            ?>
            <script type="text/javascript">
                jQuery(function ($) {
                    // Init action to copy shortcode to clipboard.
                    $('[data-clipboard-target]').each(function () {
                        var clipboard = new Clipboard('#' + $(this).attr('id'));

                        $(this).data('original-text', $(this).text());

                        clipboard.on('success', $.proxy(function (e) {
                            e.clearSelection();

                            // Swap button status.
                            $(this).text($(this).attr('data-success-text')).attr('disabled', 'disabled');

                            // Restore button after 5 seconds.
                            setTimeout($.proxy(function () {
                                $(this).text($(this).data('original-text')).removeAttr('disabled');
                            }, this), 5000);
                        }, this));

                        clipboard.on('error', $.proxy(function (e) {
                            // Swap button status.
                            $(this).text($(this).attr('data-error-text')).attr('disabled', 'disabled');

                            // Restore button after 5 seconds.
                            setTimeout($.proxy(function () {
                                $(this).text($(this).data('original-text')).removeAttr('disabled');
                            }, this), 5000);
                        }, this));
                    });
                });
            </script>
            <?php
        }

        /**
         * Hide default add/edit item form.
         *
         * @return  void
         */
        public function hide_default_form()
        {
            ?>
            <style type="text/css">
                #screen-meta, #wpb_visual_composer, #screen-meta-links, #submitdiv, #pageparentdiv > .wrap {
                    display: none;
                }
            </style>
            <?php
        }

        /**
         * Load custom add/edit item form.
         *
         * @return  void
         */
        public function load_edit_form()
        {
            if ($this->is_pinmap()) {
                // Load template file.
                include_once OVIC_PINMAP_DIR.'includes/templates.php';
            }
        }

        /**
         * Clean variables using sanitize_text_field. Arrays are cleaned recursively.
         * Non-scalar values are ignored.
         *
         * @param  string|array  $var  Data to sanitize.
         *
         * @return string|array
         */
        public function clean($var)
        {
            if (is_array($var)) {
                return array_map(array($this, 'clean'), $var);
            } else {
                return is_scalar($var) ? sanitize_text_field($var) : $var;
            }
        }

        /**
         * Save custom post type extra data.
         *
         * @param $id
         *
         * @return mixed
         */
        public function save_post($id)
        {
            if (isset($_POST['ovic_pinmap_image'])) {
                update_post_meta($id, 'ovic_pinmap_image', absint($_POST['ovic_pinmap_image']));
            }
            if (isset($_POST['ovic_pinmap_settings']) && is_array($_POST['ovic_pinmap_settings'])) {
                // Sanitize input data.
                $settings = array();
                $data     = $this->clean(wp_unslash($_POST['ovic_pinmap_settings']));
                foreach ($data as $key => $value) {
                    $settings[$key] = sanitize_text_field($value);
                }
                update_post_meta($id, 'ovic_pinmap_settings', $settings);
            }
            if (isset($_POST['ovic_pinmap_pins']) && is_array($_POST['ovic_pinmap_pins'])) {
                $pins = array();
                $data = $this->clean(wp_unslash($_POST['ovic_pinmap_pins']));
                foreach ($data as $k => $pin) {
                    // Sanitize input data.
                    foreach ($pin as $key => $value) {
                        if ('settings' == $key) {
                            foreach ($value as $settings_key => $settings_value) {
                                if ('text' == $settings_key || 'area-text' == $settings_key) {
                                    $pins[$k][$key][$settings_key] = esc_sql(
                                        str_replace(
                                            array("\r\n", "\r", "\n", '\\'),
                                            array('<br>', '<br>', '<br>', ''),
                                            $settings_value
                                        )
                                    );
                                } else {
                                    $pins[$k][$key][$settings_key] = sanitize_text_field($settings_value);
                                }
                                if ('id' == $settings_key && empty($settings_value)) {
                                    $pins[$k][$key][$settings_key] = wp_generate_password(5, false, false);
                                }
                            }
                        } else {
                            $pins[$k][$key] = sanitize_text_field($value);
                        }
                    }
                }
                update_post_meta($id, 'ovic_pinmap_pins', $pins);
            } else {
                delete_post_meta($id, 'ovic_pinmap_pins');
            }
            // Publish post if needed.
            if (!defined('DOING_AUTOSAVE') || !DOING_AUTOSAVE) {
                $post = get_post($id);
                if (__('Auto Draft') != $post->post_title && 'publish' != $post->post_status) {
                    wp_publish_post($post);
                }
            }
            // Image Tesst
            if (!isset($_POST['pinmapper_image_fields']) || !wp_verify_nonce($_POST['pinmapper_image_fields'], basename(__FILE__))) {
                return $id;
            }
            // Check Autosave
            if ((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || (defined('DOING_AJAX') && DOING_AJAX) || isset($_REQUEST['bulk_edit'])) {
                return $id;
            }
            // Don't save if only a revision
            if (isset($post->post_type) && $post->post_type == 'revision') {
                return $id;
            }
            // Check permissions
            if (!current_user_can('edit_post', $post->ID)) {
                return $id;
            }
            $meta['pin_style_select'] = isset($_POST['pin_style_select']) ? wp_unslash($_POST['pin_style_select']) : '';

            foreach ($meta as $key => $value) {
                update_post_meta($id, $key, $value);
            }

            return $id;
        }

        /**
         * Method to alter results of WooCommerce's product search function.
         *
         * @param $found_products
         *
         * @return  array
         */
        public function search_products($found_products)
        {
            // Check if term is a number.
            $id = ( string ) wc_clean(stripslashes($_GET['term']));
            if (preg_match('/^\d+$/', $id)) {
                // Get product.
                $product        = wc_get_product(( int ) $id);
                $found_products = array(
                    $id => rawurldecode(str_replace('&ndash;', ' - ', $product->get_formatted_name())),
                );
            }

            return $found_products;
        }
    }

    new Ovic_Pinmap_Post_Type();
}