<?php

namespace forge12\floating_menu {

    use forge12\floating_menu\component\floatingmenu\MetaBoxFloatingMenuSettings;

    if (class_exists('\WP_Customize_Control')) {
        /**
         * Class for the components
         */
        class WP_Customize_Control_Pages extends \WP_Customize_Control
        {
            public $type = 'pages';

            /**
             * @return void
             */
            public function render_content()
            {
                $default_value = $this->value();

                if(is_array($default_value)){
                    $default_value = implode(',',$default_value);
                }
                ?>
                <div class="customize-control-menu">
                    <!-- This field must be updated by javascript on change of the other fields -->
                    <textarea <?php $this->link(); ?> class="textarea-pages"
                                                      style="display:none;"><?php echo $default_value; ?></textarea>

                    <label>
                        <span class="customize-control-title">
                        <?php _e('Pages', 'f12_floating_menu'); ?>
                            </span>
                    </label>
                    <div class="select2">
                        <select name="pages" class="f12-floating-menu-select2 f12-floating-menu-select2-customizer"
                                multiple="multiple">
                            <?php MetaBoxFloatingMenuSettings::renderPredefinedPagesToSelect(explode(',', $default_value)); ?>
                        </select>
                    </div>
                </div>
                <?php
            }
        }
    }
}