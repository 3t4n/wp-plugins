<?php

namespace forge12\floating_menu {
    if (class_exists('\WP_Customize_Control')) {
        /**
         * Class for the components
         */
        class WP_Customize_Control_PostTypes extends \WP_Customize_Control
        {
            public $type = 'post_types';


            /**
             * Use to get the name of the inputs
             *
             * @param $setting_key
             *
             * @return string
             */
            private function get_name($setting_key = 'default')
            {
                if (isset($this->settings[$setting_key]) && $this->settings[$setting_key] instanceof \WP_Customize_Setting) {
                    echo esc_attr($this->settings[$setting_key]->id);
                } else {
                    echo esc_attr($setting_key);
                }
            }

            /**
             * @return void
             */
            public function render_content()
            {
                $default_value = $this->value();

                /*
                 * Fallback to ensure the data is set as array even if we use the json encoded string.
                 */
                if (!empty($default_value) && !is_array($default_value)) {
                    $default_value = json_decode($default_value, true);
                }

                if (!is_array($default_value)) {
                    $default_value = [];
                }

                $post_types = get_post_types();
                $list_of_post_types = array();

                foreach($post_types as $post_type) {
                    $post_type_object = get_post_type_object($post_type);
                    $list_of_post_types[$post_type] = $post_type_object->labels->singular_name;
                }

                asort($list_of_post_types);


                ?>
                <div class="customize-control-menu">
                    <!-- This field must be updated by javascript on change of the other fields -->
                    <textarea <?php $this->link(); ?> style="display:none;"><?php echo json_encode($default_value); ?></textarea>

                    <div class="wrapper ui-sortable">

                        <div class="section menu-item post_types">
                            <div class="menu-item-bar">
                                <div class="menu-item-handle">
                                        <span class="item-title">
                                          <?php _e('Post Types'); ?>
                                        </span>
                                    <span class="item-controls">
                                            <button type="button" class="button-link item-edit" aria-expanded="true">
                                                <span class="toggle-indicator" aria-hidden="true"></span>
                                            </button>
                                        </span>
                                </div>
                            </div>
                            <div class="menu-item-settings" style="display:none;">
                                <p>
                                    <?php _e('You can limit the floating menu to be only visible on specific post types. Please use the list below if you want to limit the visibility for this floating menu.','f12-floating-menu');?>
                                </p>
                                <div class="grid">
                                <?php foreach ($list_of_post_types as $post_type => $label): ?>
                                    <div class="item">
                                        <input type="checkbox"
                                               name="post_type"
                                               <?php echo in_array($post_type,$default_value) ? 'checked="checked"' : '';?>
                                               value="<?php esc_attr_e($post_type); ?>"/>
                                        <label><?php esc_html_e($label);?> (<?php esc_attr_e($post_type); ?>)</label>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    }
}