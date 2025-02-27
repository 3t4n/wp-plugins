<?php

add_filter( 'pt-ocdi/import_files', 'edi_import_files' );
function edi_import_files() {
    return array(
        array(
            'import_file_name'             => __('Experoner-pro','edi'),
            'local_import_file'            => EDI_PLUGIN_DIR_PATH . '/theme/experoner-pro/inc/demo-content.xml',
            'local_import_customizer_file' => EDI_PLUGIN_DIR_PATH . '/theme/experoner-pro/inc/experoner-export.dat',
            'local_import_preview_image'   => EDI_PLUGIN_DIR_PATH . '/theme/experoner-pro/inc/preview_import_image1.png',
            'local_import_widget_file'     => EDI_PLUGIN_DIR_PATH . '/theme/experoner-pro/inc/widgets.wie',
        )
    );
}

function edi_register_plugins( $plugins ) {

    $theme_plugins = [
        [ 
          'name'     => 'One Click Demo Import', 
          'slug'     => 'one-click-demo-import', 
          'required' => true,             
        ],
        [ 
          'name'     => 'Reviewexchanger Demo Importer', 
          'slug'     => 'reviewexchanger-demo-importer', 
          'required' => true,             
        ]
    ];
 
    return $theme_plugins;

}
add_filter( 'ocdi/register_plugins', 'edi_register_plugins' );