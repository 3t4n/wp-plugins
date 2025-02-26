<?php

namespace ARCaptcha\ElementorPro;

use ARCaptcha\ElementorPro\ARCaptchaField as ElementorProARCaptchaField;

class ElementorPro
{
    const FIELD_ID               = 'arcaptcha';


    public function __construct()
    {
        add_action('elementor_pro/forms/fields/register', [$this, 'add_new_form_field']);
    }

    public function add_new_form_field($form_fields_registrar)
    {
        $form_fields_registrar->register(new ElementorProARCaptchaField());
    }
}
