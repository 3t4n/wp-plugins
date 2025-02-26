<?php

if ( ! defined( 'TGGH_URL' ) ) {
    exit;
}

global $tggh_gform_current_field;
global $tggh_gform_current_form;

function tggh_gform_field_capture( $classes, $field, $form ) {
    global $tggh_gform_current_field;
    global $tggh_gform_current_form;

    $tggh_gform_current_field = $field;
    $tggh_gform_current_form = $form;

    return $classes;
}

add_filter( 'gform_field_css_class', 'tggh_gform_field_capture', 10, 3 );

function tggh_gform_get_current_field() {
    global $tggh_gform_current_field;
    return $tggh_gform_current_field;
}

function tggh_gform_get_current_field_id() {
    $field = tggh_gform_get_current_field();
    return empty( $field ) ? 0 : tggh_gform_get_current_field()->id;
}

function tggh_gform_get_current_form() {
    global $tggh_gform_current_form;
    return $tggh_gform_current_form;
}

function tggh_gform_get_current_form_id() {
    $form = tggh_gform_get_current_form();
    return empty( $form ) ? 0 : $form['id'];
}
