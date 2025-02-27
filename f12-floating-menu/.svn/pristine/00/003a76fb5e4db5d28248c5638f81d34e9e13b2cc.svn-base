<?php

namespace forge12\floating_menu {
    if (class_exists('\WP_Customize_Control')) {
        /**
         * Abstract class for the components
         */
        class WP_Customize_Control_Multiselect extends \WP_Customize_Control
        {
            public $type = 'multiple-select';

            public function render_content()
            {
                $default_value = $this->value();
                if (!is_array($default_value)) {
                    $default_value = [];
                }
                ?>
                <label>
                    <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                    <select <?php $this->link(); ?> multiple="multiple" size="25">
                        <?php
                        foreach ($this->choices as $value => $label) {
                            $selected = (in_array($value, $default_value)) ? selected(1, 1, false) : '';
                            echo '<option value="' . esc_attr($value) . '"' . $selected . '>' . $label . '</option>';
                        }
                        ?>
                    </select>
                </label>
                <?php
            }
        }
    }
}