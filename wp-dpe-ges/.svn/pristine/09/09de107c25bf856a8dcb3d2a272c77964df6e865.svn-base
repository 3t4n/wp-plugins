<?php
//defined( 'ABSPATH' ) || die( 'What did you expect ?' );

if ( ! class_exists( '_WP_Editors' ) )
    require( ABSPATH . WPINC . '/class-wp-editor.php' );

function wpdpeges_tinymce_plugin_translation() {
    $strings = array(
        'titleDPE'      => __('Insert DPE Shortcode', 'wpdpeges'),
        'titleGES'      => __('Insert GES Shortcode', 'wpdpeges'),
        'value'         => __('Value', 'wpdpeges'),
        'displayInline' => __('Display Inline', 'wpdpeges'),
        'yes'           => __('Yes', 'wpdpeges'),
        'no'            => __('No', 'wpdpeges'),
        'titleDPEGES'   => __('Insert new DPE/GES Shortcode', 'wpdpeges'),
        'DPEvalue'      => __('DPE Value', 'wpdpeges'),
        'GESvalue'      => __('GES Value', 'wpdpeges'),
        'metaDPEvalue'  => __('DPE Meta Key', 'wpdpeges'),
        'metaGESvalue'  => __('GES Meta Key', 'wpdpeges'),
    );
    $locale = _WP_Editors::$mce_locale;
    $translated = 'tinyMCE.addI18n("' . $locale . '.wpdpeges_tinymce_plugin", ' . json_encode( $strings ) . ");\n";

     return $translated;
}

$strings = wpdpeges_tinymce_plugin_translation();