<?php

namespace forge12\floating_menu\component\floatingmenu {

    use forge12\floating_menu\Ajax;
    use forge12\floating_menu\HTMLSelect;
    use forge12\floating_menu\UISettings;

    if (!defined('ABSPATH')) {
        exit;
    }

    /**
     * This class is responsible to set the position, styles and global settings
     * for the difference floating menu.
     */
    class MetaBoxFloatingMenuSettings
    {
        /**
         * Add a new
         */
        public function __construct()
        {
            add_action('add_meta_boxes', [$this, '_addMetaBox']);
            add_action('admin_enqueue_scripts', [$this, '_addAssets']);
            add_action('save_post_floating_menu', [$this, '_save'], 10, 2);
        }

        /**
         * Load all javascript files required to run the backend
         */
        public function _addAssets()
        {
            /**
             * Ensure the color picker api is loaded to use it for styling.
             */
            wp_enqueue_style('wp-color-picker');

            /**
             * We need a script to load the color picker
             */
            wp_register_script('f12_floating_menu_color_picker', plugin_dir_url(__FILE__) . 'assets/f12_floating_menu_color_picker.js', array(
                'jquery',
                'wp-color-picker'
            ));
            wp_enqueue_script('f12_floating_menu_color_picker');
        }

        /**
         * Save the metadata whenever the post is going to be saved.
         *
         * @param int      $post_id
         * @param \WP_Post $post
         */
        public function _save($post_id, $post)
        {
            if (!isset($_POST['f12_floating_menu_settings_nonce'])) {
                return $post_id;
            }

            if (!wp_verify_nonce($_POST['f12_floating_menu_settings_nonce'], 'f12_floating_menu_settings')) {
                return $post_id;
            }

            /*
             * If this is an autosave, our form has not been submitted,
             * so we don't want to do anything.
             */
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                return $post_id;
            }

            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }

            $Post = get_post($post_id);
            $FloatingMenu = new FloatingMenu($Post);

            $settings = $FloatingMenu->getSettings();

            /**
             * Store the pages where the current floating menu should be displayed on
             */
            $listOfPages = isset($_POST['pages']) ? array_map('intval', $_POST['pages']) : array();
            $settings['pages'] = implode(',', $listOfPages);

            /**
             * This option allows to display the floating menu on all pages.
             */
            $settings['pages_all'] = isset($_POST['pages_all']) ? (int)($_POST['pages_all']) : 0;

            /**
             * This will store all post types where to display the floating menu
             */
            $posttypes = isset($_POST['pages_post_type']) ? array_map('absint', $_POST['pages_post_type']) : array();
            $settings['pages_post_type'] = [];

            foreach ($posttypes as $key => $value) {
                if ($value == 1) {
                    $settings['pages_post_type'][] = sanitize_text_field($key);
                    set_theme_mod($post->post_name . '_pages_post_type_' . $key, 1);
                } else {
                    remove_theme_mod($post->post_name . '_pages_post_type_' . $key);
                }
            }

            /**
             * Store the position (left, right, bottom, top, hidden)
             */
            $settings['position'] = isset($_POST['position']) ? sanitize_text_field($_POST['position']) : 'hidden';

            /**
             * Set the size of the attachment/icon in px. default 32
             */
            $settings['attachment_size'] = isset($_POST['attachment_size']) ? sanitize_text_field($_POST['attachment_size']) : 32;

            /**
             * Set the background color of the link items
             */
            $settings['background_color'] = isset($_POST['background_color']) ? sanitize_text_field($_POST['background_color']) : '';

            /**
             * Set the hover color of the background that will be triggered whenever the user enters a item with the mouse.
             */
            $settings['background_color_hover'] = isset($_POST['background_color_hover']) ? sanitize_text_field($_POST['background_color_hover']) : '';

            /**
             * Set the color of the links
             */
            $settings['link_color'] = isset($_POST['link_color']) ? sanitize_text_field($_POST['link_color']) : '';

            /**
             * Set the hover color for links
             */
            $settings['link_color_hover'] = isset($_POST['link_color_hover']) ? sanitize_text_field($_POST['link_color_hover']) : '';

            /**
             * Update the font size
             */
            $settings['font_size'] = isset($_POST['font_size']) ? sanitize_text_field($_POST['font_size']) : 16;

            /**
             * Padding around the image / icon
             */
            $settings['icon_padding'] = isset($_POST['icon_padding']) ? sanitize_text_field($_POST['icon_padding']) : 5;

            /**
             * Animation Distance
             */
            $settings['animation_distance'] = isset($_POST['animation_distance']) ? sanitize_text_field($_POST['animation_distance']) : 'default';

            /**
             * Animation Distance
             */
            $settings['animation_slideout'] = isset($_POST['animation_slideout']) ? sanitize_text_field($_POST['animation_slideout']) : 'default';

            /**
             * Animation Distance
             */
            $settings['display_settings'] = isset($_POST['display_settings']) ? sanitize_text_field($_POST['display_settings']) : 'default';

            /**
             * Responsive Tablet Option
             */
            $settings['display_responsive_tablet'] = isset($_POST['display_responsive_tablet']) ? sanitize_text_field($_POST['display_responsive_tablet']) : 'default';

            /**
             * Responsive Mobile Option
             */
            $settings['display_responsive_mobile'] = isset($_POST['display_responsive_mobile']) ? sanitize_text_field($_POST['display_responsive_mobile']) : 'default';
            /**
             * Responsive Desktop Option
             */
            $settings['display_responsive_desktop'] = isset($_POST['display_responsive_desktop']) ? sanitize_text_field($_POST['display_responsive_desktop']) : 'default';

            /**
             * Store the updated values
             */
            update_post_meta($post_id, '_floating_settings', $settings);

            /**
             * Update the theme mods for the customizer.
             */
            foreach ($settings as $key => $value) {
                // skip pages_post_type.
                if ($key == 'pages_post_type') {
                    continue;
                }
                set_theme_mod($post->post_name . '_' . $key, $value);
            }
        }

        /**
         * Register the Meta Box
         */
        public function _addMetaBox()
        {
            add_meta_box('menu-settings', __('Menu Settings', 'f12_floating_menu'), [
                $this,
                '_render'
            ], 'floating_menu');
        }

        /**
         * Get a list of all page ids already defined for the select field
         *
         * @param array $pageIDs
         */
        public static function renderPredefinedPagesToSelect(array $pageIDs): void
        {
            $listOfPages = Ajax::getPageByTitleSearch();

            foreach ($listOfPages as /** @var \WP_Post $Page */ $Page) {
                if (in_array($Page->ID, $pageIDs)) {
                    ?>
                    <option value="<?php esc_attr_e($Page->ID); ?>"
                            selected="selected"><?php esc_html_e($Page->post_title); ?>
                        (<?php esc_html_e(__($Page->post_type, 'f12_floating_menu')); ?>)
                    </option>
                    <?php
                } else {
                    ?>
                    <option value="<?php esc_attr_e($Page->ID); ?>"><?php esc_html_e($Page->post_title); ?>
                        (<?php esc_html_e(__($Page->post_type, 'f12_floating_menu')); ?>)
                    </option>
                    <?php
                }
            }
        }

        /**
         * Render the MetaBox for the
         */
        public function _render($post): void
        {
            $FloatingMenu = new FloatingMenu($post);
            $globalSettings = UISettings::getOptions();
            ?>
            <div class="forge12-plugin">
                <div class="forge12-plugin-content" style="display:block;">
                    <div class="forge12-plugin-content-main">

                        <div class="box">
                            <!-- option -->
                            <div class="option">
                                <div class="label">
                                    <label for="pages_all">
                                        <?php _e('Display', 'f12_floating_menu'); ?>
                                    </label>
                                </div>
                                <div class="input">
                                    <span>
                                    <input type="hidden" class="toggle"
                                           name="pages_all"
                                           value="<?php esc_attr_e($FloatingMenu->getSettings()['pages_all']); ?>"
                                           data-before="<?php _e('On', FORGE12_FLOATING_SLUG); ?>"
                                           data-after="<?php _e('Off', FORGE12_FLOATING_SLUG); ?>"/>
                                    </span>

                                    <span>
                                        <label for="f12-toggle-id-pages_all">
                                            <?php _e('Display this Floating Menu on all pages, posts, products ...', 'f12_floating_menu'); ?>
                                        </label>
                                    </span>
                                    <p>
                                        <?php _e('If enabled, this menu will be displayed everywhere. Use this option whenever you want to create a global Floating Menu.', 'f12_floating_menu'); ?>
                                    </p>
                                </div>
                            </div>
                            <!-- option end -->
                            <!-- option -->
                            <div class="option">
                                <div class="label">
                                    <label for="">
                                        <?php _e('Display by Post Type', 'f12_floating_menu'); ?>
                                    </label>
                                </div>
                                <div class="input" style="display:flex; flex-flow:row wrap;">
                                    <?php
                                    $listOfPostTypes = get_post_types();
                                    $selected_post_types = $FloatingMenu->getPostTypes();

                                    sort($listOfPostTypes);

                                    foreach ($listOfPostTypes as $post_type):
                                        $value = in_array($post_type, $selected_post_types) ? 1 : 0;
                                        ?>
                                        <p style="flex:1 1 33%;">
                                            <span>
                                            <input type="hidden" class="toggle"
                                                   name="pages_post_type[<?php esc_attr_e($post_type); ?>]"
                                                   value="<?php esc_attr_e($value); ?>"
                                                   data-before="<?php _e('On', FORGE12_FLOATING_SLUG); ?>"
                                                   data-after="<?php _e('Off', FORGE12_FLOATING_SLUG); ?>"/>
                                                </span>

                                            <span for="<?php esc_attr_e('toggle-' . $post_type); ?>">
                                                <label for="f12-toggle-id-pages_post_type<?php esc_attr_e($post_type); ?>">
                                                <?php esc_attr_e($post_type); ?>
                                                    </label>
                                            </span>
                                            <!--<input type="checkbox"
                                                   id="pages_post_type_<?php esc_attr_e($post_type); ?>"
                                                   name="pages_post_type[]"
                                                   value="<?php esc_attr_e($post_type); ?>"
                                                <?php if (in_array($post_type, $selected_post_types)) {
                                                echo 'checked="checked"';
                                            } ?>
                                            >
                                            <label for="pages_post_type_<?php esc_attr_e($post_type); ?>">
                                                <?php esc_attr_e($post_type); ?>
                                            </label>
                                            -->
                                        </p>
                                    <?php endforeach; ?>
                                    <p>
                                        <?php _e('Select on which post types this floating menu should be displayed.', 'f12_floating_menu'); ?>
                                    </p>
                                </div>
                            </div>
                            <!-- option end -->
                            <!-- option -->
                            <div class="option">
                                <div class="label">
                                    <label for="pages">
                                        <?php _e('Specific Pages', 'f12_floating_menu'); ?>
                                    </label>
                                </div>
                                <div class="input">
                                    <select id="pages" name="pages[]" class="f12-floating-menu-select2"
                                            multiple="multiple">
                                        <?php self::renderPredefinedPagesToSelect(explode(',', $FloatingMenu->getOption('pages'))); ?>
                                    </select>

                                    <p>
                                        <?php _e('Please select the specific pages that should display the floating menu.', 'f12_floating_menu'); ?>
                                    </p>
                                </div>
                            </div>
                            <!-- option end -->
                            <!-- option -->
                            <div class="option">
                                <div class="label">
                                    <label for="">
                                        <?php _e('Position', 'f12_floating_menu'); ?>
                                    </label>
                                </div>
                                <div class="input">
                                    <?php
                                    $Select = new HTMLSelect('position', [
                                        'hidden' => __('Hidden', 'f12_floating_menu'),
                                        'left' => __('Left', 'f12_floating_menu'),
                                        'top' => __('Top', 'f12_floating_menu'),
                                        'right' => __('Right', 'f12_floating_menu'),
                                        'bottom' => __('Bottom', 'f12_floating_menu'),
                                        'bottomright' => __('Lower Right', 'f12_floating_menu'),
                                        'upperright' => __('Upper Right', 'f12_floating_menu'),
                                        'upperleft' => __('Upper Left', 'f12_floating_menu'),
                                        'lowerleft' => __('Lower Left', 'f12_floating_menu')
                                    ]);
                                    $Select->setOptionSelectedByKey($FloatingMenu->getOption('position'));
                                    $Select->render();
                                    ?>

                                    <p>
                                        <?php _e('Please select the Position of the Floating Menu.', 'f12_floating_menu'); ?>
                                    </p>
                                </div>
                            </div>
                            <!-- option end -->
                            <!-- option -->
                            <div class="option">
                                <div class="label">
                                    <label for="display_responsive_desktop">
                                        <?php _e('Display on Desktop', 'f12_floating_menu'); ?>
                                    </label>
                                    <p class="sub">
                                        <?php printf(__("Default value <a href=\"%s\">%s</a>.", "f12_floating_menu"), admin_url("admin.php?page=f12_floating_menu_settings#display_responsive_tablet"), $globalSettings['display_responsive_desktop']); ?>
                                    </p>
                                </div>
                                <div class="input">
                                    <?php
                                    $Select = new HTMLSelect('display_responsive_desktop', [
                                        'default' => __('Default', 'f12_floating_menu'),
                                        'visible' => __('Visible', 'f12_floating_menu'),
                                        'hidden' => __('Hidden', 'f12_floating_menu'),
                                    ], [
                                        'id' => [
                                            'display_responsive_desktop'
                                        ]
                                    ]);

                                    $Select->setOptionSelectedByKey($FloatingMenu->getOption('display_responsive_desktop'));
                                    $Select->render();
                                    ?>

                                    <p>
                                        <?php _e('Please select if the menu should be displayed on desktop devices.', 'f12_floating_menu'); ?>
                                    </p>
                                </div>
                            </div>
                            <!-- option end -->
                            <!-- option -->
                            <div class="option">
                                <div class="label">
                                    <label for="display_responsive_tablet">
                                        <?php _e('Display on Tablets', 'f12_floating_menu'); ?>
                                    </label>
                                    <p class="sub">
                                        <?php printf(__("Default value <a href=\"%s\">%s</a>.", "f12_floating_menu"), admin_url("admin.php?page=f12_floating_menu_settings#display_responsive_tablet"), $globalSettings['display_responsive_tablet']); ?>
                                    </p>
                                </div>
                                <div class="input">
                                    <?php
                                    $Select = new HTMLSelect('display_responsive_tablet', [
                                        'default' => __('Default', 'f12_floating_menu'),
                                        'visible' => __('Visible', 'f12_floating_menu'),
                                        'hidden' => __('Hidden', 'f12_floating_menu'),
                                    ], [
                                        'id' => [
                                            'display_responsive_tablet'
                                        ]
                                    ]);
                                    $Select->setOptionSelectedByKey($FloatingMenu->getOption('display_responsive_tablet'));
                                    $Select->render();
                                    ?>

                                    <p>
                                        <?php _e('Please select if the menu should be displayed on tablet devices.', 'f12_floating_menu'); ?>
                                    </p>
                                </div>
                            </div>
                            <!-- option end -->
                            <!-- option -->
                            <div class="option">
                                <div class="label">
                                    <label for="display_responsive_mobile">
                                        <?php _e('Display on Smartphones', 'f12_floating_menu'); ?>
                                    </label>
                                    <p class="sub">
                                        <?php printf(__("Default value <a href=\"%s\">%s</a>.", "f12_floating_menu"), admin_url("admin.php?page=f12_floating_menu_settings#display_responsive_mobile"), $globalSettings['display_responsive_mobile']); ?>
                                    </p>
                                </div>
                                <div class="input">
                                    <?php
                                    $Select = new HTMLSelect('display_responsive_mobile', [
                                        'default' => __('Default', 'f12_floating_menu'),
                                        'visible' => __('Visible', 'f12_floating_menu'),
                                        'hidden' => __('Hidden', 'f12_floating_menu'),
                                    ], [
                                        'id' => [
                                            'display_responsive_mobile'
                                        ]
                                    ]);
                                    $Select->setOptionSelectedByKey($FloatingMenu->getOption('display_responsive_mobile'));
                                    $Select->render();
                                    ?>

                                    <p>
                                        <?php _e('Please select if the menu should be displayed on smartphone devices.', 'f12_floating_menu'); ?>
                                    </p>
                                </div>
                            </div>
                            <!-- option end -->
                            <!-- option-->
                            <div class="option">
                                <div class="label">
                                    <label for="font_size">
                                        <?php _e('Font Size', 'f12_floating_menu'); ?>
                                    </label>
                                    <p class="sub">
                                        <?php printf(__("Default value <a href=\"%s\">%spx</a>.", "f12_floating_menu"), admin_url("admin.php?page=f12_floating_menu_settings#font_size"), $globalSettings['font_size']); ?>
                                    </p>
                                </div>
                                <div class="input">
                                    <input id="font_size" type="text" name="font_size"
                                           value="<?php esc_attr_e($FloatingMenu->getOption('font_size')); ?>"/>

                                    <p>
                                        <?php _e('Define the font size of the label in px.', 'f12_floating_menu'); ?>
                                    </p>
                                </div>
                            </div>
                            <!-- option end -->
                            <!-- option-->
                            <div class="option">
                                <div class="label">
                                    <label for="">
                                        <?php echo __('Icon Size', 'f12_floating_menu'); ?>
                                    </label>
                                    <p class="sub">
                                        <?php printf(__("Default value <a href=\"%s\">%spx</a>.", "f12_floating_menu"), admin_url("admin.php?page=f12_floating_menu_settings#icon_size"), $globalSettings['attachment_size']); ?>
                                    </p>
                                </div>
                                <div class="input">
                                    <input type="text" name="attachment_size"
                                           value="<?php esc_attr_e($FloatingMenu->getOption('attachment_size')); ?>"/>

                                    <p>
                                        <?php _e('Define the size of the icons in px.', 'f12_floating_menu'); ?>
                                    </p>
                                </div>
                            </div>
                            <!-- option end -->
                            <!-- option-->
                            <div class="option">
                                <div class="label">
                                    <label for="">
                                        <?php echo __('Icon Padding', 'f12_floating_menu'); ?>
                                    </label>
                                    <p class="sub">
                                        <?php printf(__("Default value <a href=\"%s\">%spx</a>.", "f12_floating_menu"), admin_url("admin.php?page=f12_floating_menu_settings#icon_padding"), $globalSettings['icon_padding']); ?>
                                    </p>
                                </div>
                                <div class="input">
                                    <input type="text" name="icon_padding"
                                           value="<?php esc_attr_e($FloatingMenu->getOption('icon_padding')); ?>"/>

                                    <p>
                                        <?php _e('Define the padding around the icon.', 'f12_floating_menu'); ?>
                                    </p>
                                </div>
                            </div>
                            <!-- option end -->
                            <!-- option-->
                            <div class="option">
                                <div class="label">
                                    <label for="">
                                        <?php echo __('Background Color', 'f12_floating_menu'); ?>
                                    </label>
                                    <p class="sub">
                                        <?php printf(__("Default value <a href=\"%s\">%s</a>.", "f12_floating_menu"), admin_url("admin.php?page=f12_floating_menu_settings#background_color"), $globalSettings['background_color']); ?>
                                    </p>
                                </div>
                                <div class="input">
                                    <input type="text" name="background_color" class="f12_floating_menu_color_picker"
                                           value="<?php esc_attr_e($FloatingMenu->getOption('background_color')); ?>"/>

                                    <p>
                                        <?php _e('Define the background color for the floating menu items.', 'f12_floating_menu'); ?>
                                    </p>
                                </div>
                            </div>
                            <!-- option end -->
                            <!-- option-->
                            <div class="option">
                                <div class="label">
                                    <label for="">
                                        <?php echo __('Background Color (hover)', 'f12_floating_menu'); ?>
                                    </label>
                                    <p class="sub">
                                        <?php printf(__("Default value <a href=\"%s\">%s</a>.", "f12_floating_menu"), admin_url("admin.php?page=f12_floating_menu_settings#background_color_hover"), $globalSettings['background_color_hover']); ?>
                                    </p>
                                </div>
                                <div class="input">
                                    <input type="text" name="background_color_hover"
                                           class="f12_floating_menu_color_picker"
                                           value="<?php esc_attr_e($FloatingMenu->getOption('background_color_hover')); ?>"/>

                                    <p>
                                        <?php _e('Define the background color for the floating menu items on hover.', 'f12_floating_menu'); ?>
                                    </p>
                                </div>
                            </div>
                            <!-- option end -->
                            <!-- option-->
                            <div class="option">
                                <div class="label">
                                    <label for="">
                                        <?php echo __('Link Color', 'f12_floating_menu'); ?>
                                    </label>
                                    <p class="sub">
                                        <?php printf(__("Default value <a href=\"%s\">%s</a>.", "f12_floating_menu"), admin_url("admin.php?page=f12_floating_menu_settings#link_color"), $globalSettings['link_color']); ?>
                                    </p>
                                </div>
                                <div class="input">
                                    <input type="text" name="link_color" class="f12_floating_menu_color_picker"
                                           value="<?php esc_attr_e($FloatingMenu->getOption('link_color')); ?>"/>

                                    <p>
                                        <?php _e('Define the color of the links on hover.', 'f12_floating_menu'); ?>
                                    </p>
                                </div>
                            </div>
                            <!-- option end -->
                            <!-- option-->
                            <div class="option">
                                <div class="label">
                                    <label for="">
                                        <?php echo __('Link Color (hover)', 'f12_floating_menu'); ?>
                                    </label>
                                    <p class="sub">
                                        <?php printf(__("Default value <a href=\"%s\">%s</a>.", "f12_floating_menu"), admin_url("admin.php?page=f12_floating_menu_settings#link_color_hover"), $globalSettings['link_color_hover']); ?>
                                    </p>
                                </div>
                                <div class="input">
                                    <input type="text" name="link_color_hover" class="f12_floating_menu_color_picker"
                                           value="<?php esc_attr_e($FloatingMenu->getOption('link_color_hover')); ?>"/>

                                    <p>
                                        <?php _e('Define the color of the links on hover.', 'f12_floating_menu'); ?>
                                    </p>
                                </div>
                            </div>
                            <!-- option end -->
                            <!-- option-->
                            <div class="option">
                                <div class="label">
                                    <label for="animation_distance">
                                        <?php _e('Distance Animation', 'f12_floating_menu'); ?>
                                    </label>
                                    <p class="sub">
                                        <?php printf(__("Default value <a href=\"%s\">%s</a>.", "f12_floating_menu"), admin_url("admin.php?page=f12_floating_menu_settings#animation_distance"), $globalSettings['animation_distance']); ?>
                                    </p>
                                </div>
                                <div class="input">
                                    <?php
                                    $AnimationDistance = new HTMLSelect(
                                        'animation_distance',
                                        [
                                            'default' => __('Default', 'f12_floating_menu'),
                                            'enabled' => __('Enabled', 'f12_floating_menu'),
                                            'disabled' => __('Disabled', 'f12_floating_menu')
                                        ],
                                        [
                                            'id' =>
                                                [
                                                    'animation_distance'
                                                ]
                                        ]
                                    );
                                    $AnimationDistance->setOptionSelectedByKey($FloatingMenu->getOption('animation_distance'));
                                    $AnimationDistance->render();
                                    ?>
                                    <p>
                                        <?php _e('If enabled, the opacity of the menu will be calculated by the distance of the mouse pointer. The close the mouse pointer comes to the menu, the less the opacity becomes.', 'f12_floating_menu'); ?>
                                    </p>
                                </div>
                            </div>
                            <!-- option end -->
                            <!-- option -->
                            <div class="option">
                                <div class="label">
                                    <label for="animation_slideout">
                                        <?php _e('Slide-Out Animation', 'f12_floating_menu'); ?>
                                    </label>
                                    <p class="sub">
                                        <?php printf(__("Default value <a href=\"%s\">%s</a>.", "f12_floating_menu"), admin_url("admin.php?page=f12_floating_menu_settings#animation_slideout"), $globalSettings['animation_slideout']); ?>
                                    </p>
                                </div>
                                <div class="input">
                                    <?php
                                    $AnimationSlideout = new HTMLSelect(
                                        'animation_slideout',
                                        [
                                            'default' => __('Default', 'f12_floating_menu'),
                                            'enabled' => __('Enabled', 'f12_floating_menu'),
                                            'disabled' => __('Disabled', 'f12_floating_menu')
                                        ],
                                        [
                                            'id' =>
                                                [
                                                    'animation_slideout'
                                                ]
                                        ]
                                    );
                                    $AnimationSlideout->setOptionSelectedByKey($FloatingMenu->getOption('animation_slideout'));
                                    $AnimationSlideout->render();
                                    ?>
                                    <p>
                                        <?php _e('If enabled, only the icon will be displayed and the text will become visible after the mouse enters the icon. Ensure you have enabled the "Show Link Option" label for the each link.', 'f12_floating_menu'); ?>
                                    </p>
                                </div>
                            </div>
                            <!-- option end -->
                            <!-- option -->
                            <div class="option">
                                <div class="label">
                                    <label for="display_settings">
                                        <?php _e('Display Settings', 'f12_floating_menu'); ?>
                                    </label>
                                    <p class="sub">
                                        <?php printf(__("Default value <a href=\"%s\">%s</a>.", "f12_floating_menu"), admin_url("admin.php?page=f12_floating_menu_settings#animation_slideout"), $globalSettings['display_settings']); ?>
                                    </p>
                                </div>
                                <div class="input">
                                    <?php
                                    $DisplayFull = new HTMLSelect(
                                        'display_settings',
                                        [
                                            'default' => __('Default', 'f12_floating_menu'),
                                            'full' => __('Full', 'f12_floating_menu'),
                                            'icon' => __('Only Icon', 'f12_floating_menu')
                                        ],
                                        [
                                            'id' =>
                                                [
                                                    'display_settings'
                                                ]
                                        ]
                                    );
                                    $DisplayFull->setOptionSelectedByKey($FloatingMenu->getOption('display_settings'));
                                    $DisplayFull->render();
                                    ?>

                                    <p>
                                        <?php _e('If enabled, the icon and the the text will be displayed together. Otherwise only the icon will be displayed. If enabled, the "Slide-Out Animation" will be disabled.', 'f12_floating_menu'); ?>
                                    </p>
                                </div>
                            </div>
                            <!-- option end -->
                        </div>

                    </div>
                    <?php wp_nonce_field('f12_floating_menu_settings', 'f12_floating_menu_settings_nonce'); ?>
                </div>
            </div>

            <?php
        }
    }
}