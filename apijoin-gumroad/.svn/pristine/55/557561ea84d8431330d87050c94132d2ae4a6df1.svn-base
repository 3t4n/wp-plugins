<?php 
function apijoin_gumroad_gblocks(){

if(!function_exists('register_block_type')){
    return;
}

wp_register_script(
   'mig-gblocks',
    plugins_url( 'build/index.js',  __DIR__  ),
    array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'),
    filemtime(plugin_dir_path(__DIR__). 'build/index.js')
);

wp_register_style(
    'mig-gblocks-edit-css',
    plugins_url( 'build/editor.css',  __DIR__  ),
     array('wp-edit-blocks'),
     filemtime(plugin_dir_path(__DIR__). 'build/editor.css')
 );

 wp_register_style(
    'mig-gblocks-css',
    plugins_url( 'build/style.css',  __DIR__  ),
     array(),
     filemtime(plugin_dir_path(__DIR__). 'build/style.css')
 );


 $gblocks = ['migblocks/gblockone'];

 foreach($gblocks as $gblock){
    register_block_type($gblock, array(
        'editor_script' => 'mig-gblocks',
        'editor_style' => 'mig-gblocks-edit-css',
        'style' => 'mig-gblocks-css'
    ));
 }


}

add_action('init', 'apijoin_gumroad_gblocks');
?>