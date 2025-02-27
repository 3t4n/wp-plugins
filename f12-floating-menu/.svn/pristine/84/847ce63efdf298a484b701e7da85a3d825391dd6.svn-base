<?php

namespace forge12\floating_menu {
    if (!defined('ABSPATH')) {
        exit;
    }

    /**
     * Class UIDashboard
     */
    class UISettings extends UIPageForm
    {
        private static $Settings = [];

        /**
         * @param $UI
         * @param $domain
         */
        public function __construct($domain)
        {
            parent::__construct($domain, 'settings', 'Settings');
        }

        /**
         * Get global settings
         *
         * @parama bool $reload - if enabled, the settings cache will be resetted.
         *
         * @return array
         */
        public static function getOptions($reload = false)
        {
            // Store the settings, so we do not have to request them every
            // time we call for the settings
            if (null == self::$Settings || $reload === true) {
                $atts = array(
                    'attachment_size' => 32,
                    'link_color' => '#ffffff',
                    'link_color_hover' => '#ffffff',
                    'background_color' => '#000000',
                    'background_color_hover' => '#333333',
                    'font_size' => 16,
                    'icon_padding' => 5,
                    'animation_distance' => 'disabled',
                    'animation_slideout' => 'disabled',
                    'display_settings' => 'icon',
                    'display_responsive_tablet' => 'visible',
                    'display_responsive_mobile' => 'visible',
                    'display_responsive_desktop' => 'visible',
                    'support' => 1,
                );

                $attr = get_option('f12_floating_menu_settings', true);

                if (!is_array($attr)) {
                    $attr = array();
                }

                self::$Settings = array_merge($atts, $attr);
            }

            return self::$Settings;
        }


        protected function theSidebar($slug, $page)
        {
            if ($page != 'settings') {
                return;
            }
            ?>
            <div class="box">
                <h2>
                    <?php _e('Hint:', $this->domain); ?>
                </h2>
                <p>
                    <?php _e("Use the options on the left side to set general design and layout options.", $this->domain); ?>
                </p>
            </div>
            <?php
        }

        protected function theContent($slug, $page, $settings)
        {
            // Check if data should be updated
            $this->maybeSave();

            // Get Settings
            $metadata = self::getOptions();

            ?>
            <h1><?php _e('Settings', 'f12_floating_menu'); ?></h1>

            <div class="option">
                <div class="label">
                    <label for="font_size">
                        <?php echo __('Font Size', 'f12_floating_menu'); ?>
                    </label>
                </div>
                <div class="input">
                    <input id="font_size" type="number" name="font_size"
                           value="<?php esc_attr_e($metadata['font_size']); ?>"/>

                    <p>
                        <?php _e('Define the font size of the label in px.', 'f12_floating_menu'); ?>
                    </p>
                </div>
            </div>

            <div class="option">
                <div class="label">
                    <label for="icon_size">
                        <?php echo __('Icon Size', 'f12_floating_menu'); ?>
                    </label>
                </div>
                <div class="input">
                    <input id="icon_size" type="number" name="attachment_size"
                           value="<?php esc_attr_e($metadata['attachment_size']); ?>"/>

                    <p>
                        <?php _e('Define the size of the icons in px.', 'f12_floating_menu'); ?>
                    </p>
                </div>
            </div>

            <div class="option">
                <div class="label">
                    <label for="icon_padding">
                        <?php echo __('Icon Padding', 'f12_floating_menu'); ?>
                    </label>
                </div>
                <div class="input">
                    <input id="icon_padding" type="number" name="icon_padding"
                           value="<?php esc_attr_e($metadata['icon_padding']); ?>"/>

                    <p>
                        <?php _e('Define the padding around the icon.', 'f12_floating_menu'); ?>
                    </p>
                </div>
            </div>

            <div class="option">
                <div class="label">
                    <label for="background_color">
                        <?php echo __('Background Color', 'f12_floating_menu'); ?>
                    </label>
                </div>
                <div class="input">
                    <input id="background_color" type="text" name="background_color"
                           class="f12_floating_menu_color_picker"
                           value="<?php esc_attr_e($metadata['background_color']); ?>"/>

                    <p>
                        <?php _e('Define the background color for the floating menu items.', 'f12_floating_menu'); ?>
                    </p>
                </div>
            </div>

            <div class="option">
                <div class="label">
                    <label for="background_color_hover">
                        <?php echo __('Background Color (hover)', 'f12_floating_menu'); ?>
                    </label>
                </div>
                <div class="input">
                    <input id="background_color_hover" type="text" name="background_color_hover"
                           class="f12_floating_menu_color_picker"
                           value="<?php esc_attr_e($metadata['background_color_hover']); ?>"/>

                    <p>
                        <?php _e('Define the background color for the floating menu items on hover.', 'f12_floating_menu'); ?>
                    </p>
                </div>
            </div>

            <div class="option">
                <div class="label">
                    <label for="link_color">
                        <?php echo __('Link Color', 'f12_floating_menu'); ?>
                    </label>
                </div>
                <div class="input">
                    <input id="link_color" type="text" name="link_color" class="f12_floating_menu_color_picker"
                           value="<?php esc_attr_e($metadata['link_color']); ?>"/>

                    <p>
                        <?php _e('Define the color of the links on hover.', 'f12_floating_menu'); ?>
                    </p>
                </div>
            </div>

            <div class="option">
                <div class="label">
                    <label for="link_color_hover">
                        <?php echo __('Link Color (hover)', 'f12_floating_menu'); ?>
                    </label>
                </div>
                <div class="input">
                    <input id="link_color_hover" type="text" name="link_color_hover"
                           class="f12_floating_menu_color_picker"
                           value="<?php esc_attr_e($metadata['link_color_hover']); ?>"/>

                    <p>
                        <?php _e('Define the color of the links on hover.', 'f12_floating_menu'); ?>
                    </p>
                </div>
            </div>

            <div class="option">
                <div class="label">
                    <label for="animation_distance">
                        <?php echo __('Distance Animation', 'f12_floating_menu'); ?>
                    </label>
                </div>
                <div class="input">
                    <?php
                    $AnimationOpacity = new HTMLSelect(
                        'animation_distance',
                        [
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
                    $AnimationOpacity->setOptionSelectedByKey($metadata['animation_distance']);
                    $AnimationOpacity->render();
                    ?>
                    <p>
                        <?php _e('If enabled, the opacity of the menu will be calculated by the distance of the mouse pointer. The close the mouse pointer comes to the menu, the less the opacity becomes.', 'f12_floating_menu'); ?>
                    </p>
                </div>
            </div>

            <!-- option -->
            <div class="option">
                <div class="label">
                    <label for="animation_slideout">
                        <?php _e('Slide-Out Animation', 'f12_floating_menu'); ?>
                    </label>
                </div>
                <div class="input">
                    <?php
                    $AnimationSlideout = new HTMLSelect(
                        'animation_slideout',
                        [
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
                    $AnimationSlideout->setOptionSelectedByKey($metadata['animation_slideout']);
                    $AnimationSlideout->render();
                    ?>
                    <p>
                        <?php _e('If enabled, only the icon will be displayed and the text will become visible after the mouse enters the icon.', 'f12_floating_menu'); ?>
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
                </div>
                <div class="input">
                    <?php
                    $DisplayFull = new HTMLSelect(
                        'display_settings',
                        [
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
                    $DisplayFull->setOptionSelectedByKey($metadata['display_settings']);
                    $DisplayFull->render();
                    ?>

                    <p>
                        <?php _e('If enabled, the icon and the the text will be displayed together. Otherwise only the icon will be displayed. If enabled, the "Slide-Out Animation" will be disabled.', 'f12_floating_menu'); ?>
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
                </div>
                <div class="input">
                    <?php
                    $DisplayFull = new HTMLSelect(
                        'display_responsive_desktop',
                        [
                            'visible' => __('Visible', 'f12_floating_menu'),
                            'hidden' => __('Hidden', 'f12_floating_menu')
                        ],
                        [
                            'id' =>
                                [
                                    'display_responsive_desktop'
                                ]
                        ]
                    );
                    $DisplayFull->setOptionSelectedByKey($metadata['display_responsive_desktop']);
                    $DisplayFull->render();
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
                </div>
                <div class="input">
                    <?php
                    $DisplayFull = new HTMLSelect(
                        'display_responsive_tablet',
                        [
                            'visible' => __('Visible', 'f12_floating_menu'),
                            'hidden' => __('Hidden', 'f12_floating_menu')
                        ],
                        [
                            'id' =>
                                [
                                    'display_responsive_tablet'
                                ]
                        ]
                    );
                    $DisplayFull->setOptionSelectedByKey($metadata['display_responsive_tablet']);
                    $DisplayFull->render();
                    ?>

                    <p>
                        <?php _e('Please select if the menu should be displayed on smartphone devices.', 'f12_floating_menu'); ?>
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
                </div>
                <div class="input">
                    <?php
                    $Select = new HTMLSelect('display_responsive_mobile', [
                        'visible' => __('Visible', 'f12_floating_menu'),
                        'hidden' => __('Hidden', 'f12_floating_menu'),
                    ], [
                        'id' => [
                            'display_responsive_mobile'
                        ]
                    ]);
                    $Select->setOptionSelectedByKey($metadata['display_responsive_mobile']);
                    $Select->render();
                    ?>

                    <p>
                        <?php _e('Please select if the menu should be displayed on smartphone devices.', 'f12_floating_menu'); ?>
                    </p>
                </div>
            </div>

            <div class="option">
                <div class="label">
                    <label for="support"><?php _e('Support Forge12', $this->domain); ?></label>
                </div>
                <div class="input">
                    <input type="hidden" class="toggle" name="support" value="<?php esc_attr_e($metadata['support']);?>" data-before="<?php _e('On',$this->domain);?>" data-after="<?php _e('Off',$this->domain);?>"/>

                    <p>
                        <?php _e('The Footer will contain a noscript referral to support Forge12 Floating Menu.', $this->domain); ?>
                    </p>
                </div>
            </div>
            <?php
        }

        protected function onSave($settings)
        {
            $settings = self::getOptions();

            if (isset($_POST['font_size'])) {
                $settings['font_size'] = (int)$_POST['font_size'];
            } else {
                $settings['font_size'] = 16;
            }

            if (isset($_POST['attachment_size'])) {
                $settings['attachment_size'] = (int)$_POST['attachment_size'];
            }

            if (isset($_POST['icon_padding'])) {
                $settings['icon_padding'] = (int)$_POST['icon_padding'];
            }

            if (isset($_POST['background_color'])) {
                $settings['background_color'] = sanitize_text_field($_POST['background_color']);
            }

            if (isset($_POST['background_color_hover'])) {
                $settings['background_color_hover'] = sanitize_text_field($_POST['background_color_hover']);
            }

            if (isset($_POST['link_color'])) {
                $settings['link_color'] = sanitize_textarea_field($_POST['link_color']);
            }

            if (isset($_POST['link_color_hover'])) {
                $settings['link_color_hover'] = sanitize_textarea_field($_POST['link_color_hover']);
            }

            if (isset($_POST['animation_distance'])) {
                $settings['animation_distance'] = sanitize_textarea_field($_POST['animation_distance']);
            }

            if (isset($_POST['animation_slideout'])) {
                $settings['animation_slideout'] = sanitize_textarea_field($_POST['animation_slideout']);
            }

            if (isset($_POST['display_settings'])) {
                $settings['display_settings'] = sanitize_textarea_field($_POST['display_settings']);
            }

            if (isset($_POST['display_responsive_tablet'])) {
                $settings['display_responsive_tablet'] = sanitize_textarea_field($_POST['display_responsive_tablet']);
            }

            if (isset($_POST['display_responsive_mobile'])) {
                $settings['display_responsive_mobile'] = sanitize_textarea_field($_POST['display_responsive_mobile']);
            }

            if (isset($_POST['display_responsive_desktop'])) {
                $settings['display_responsive_desktop'] = sanitize_textarea_field($_POST['display_responsive_desktop']);
            }

            if(isset($_POST['support'])){
                $settings['support'] = (int)$_POST['support'];
            }

            update_option('f12_floating_menu_settings', $settings);
            self::getOptions(true);

            return $settings;
        }

        public function getSettings($settings)
        {
            // TODO: Implement getSettings() method.
        }
    }
}