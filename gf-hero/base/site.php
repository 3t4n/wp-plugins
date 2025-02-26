<?php

if ( ! defined( 'TGGH_URL' ) ) {
    exit;
}

function tggh_site_field_content( $field_content, $field ) {
    $field_vars = array();

    foreach ( get_object_vars( $field ) as $var => $value ) {
        if ( strpos( $var, 'tggh_' ) === 0 ) {
            $field_vars[$var] = $value;
        }
    }

    if ( count( $field_vars ) > 0 ) {
        $field_content .= (
            '<script type="text/javascript">' .
                'tggh_field_' . $field->id . '=' . json_encode( $field_vars ) .
            '</script>'
        );
    }

    return $field_content;
}

add_filter( 'gform_field_content', 'tggh_site_field_content', 10, 2 );
