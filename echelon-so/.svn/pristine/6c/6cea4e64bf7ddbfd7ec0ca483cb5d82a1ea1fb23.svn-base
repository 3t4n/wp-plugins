<?php

class Echelon_Esolibrarynotification extends SiteOrigin_Widget_Field_Base {

    protected $eso_widget;
    protected $eso_slug;

    protected function render_field( $value, $instance ) {
        ?>

        <div>
            Prebuilt <?php echo esc_html($this->eso_widget); ?> widgets are available in our library <a target="_blank" href="https://echelonso.com/library/<?php echo $this->eso_slug; ?>/">here</a>.
        </div>

        <?php
    }

    protected function sanitize_field_input( $value, $instance ) {
        $sanitized_value['slug'] = sanitize_text_field( $value['slug'] );
        $sanitized_value['widget'] = sanitize_text_field( $value['widget'] );
        return $sanitized_value;
    }

}
