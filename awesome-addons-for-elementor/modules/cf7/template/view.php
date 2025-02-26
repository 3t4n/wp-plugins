<?php
if ( ! Awesome_Addons_is_cf7_activated() ) {
    return;
}

$settings = $this->get_settings_for_display();

if ( ! empty( $settings['form_id'] ) ) {
    echo Awesome_Addons_do_shortcode( 'contact-form-7', [
        'id' => $settings['form_id'],
        'html_class' => 'Awesome_Addons-cf7-form ' . Awesome_Addons_sanitize_html_class_param( $settings['html_class'] ),
    ] );
}
    