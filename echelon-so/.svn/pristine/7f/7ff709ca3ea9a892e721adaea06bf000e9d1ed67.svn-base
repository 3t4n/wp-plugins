<?php

class Echelon_Esorgba extends SiteOrigin_Widget_Field_Base {

    protected function render_field( $value, $instance ) {
        // global $echelon_so;
        // $palette = EsoHelpers::get_palette_colors();
        $palette = implode('|', EsoHelpers::get_palette_colors());
        ?>

        <input class="echelonso-rgba" type="text" id="<?php echo $this->element_id ?>" name="<?php echo $this->element_name ?>" value="<?php echo esc_attr( $value ); ?>" data-palette="<?php echo $palette; ?>" />

        <script type="text/javascript">
        (function($) {
            $(document).ready(function() {
                $( '#<?php echo $this->element_id ?>' ).alphaColorPicker();
            })
        })(jQuery)
        </script>

        <?php
    }

    protected function sanitize_field_input( $value, $instance ) {
        $sanitized_value = sanitize_text_field( $value );
        return $sanitized_value;
    }

}
