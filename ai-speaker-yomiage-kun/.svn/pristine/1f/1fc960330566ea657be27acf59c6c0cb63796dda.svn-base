<?php
//=====[ register category ]=====//
function AIS_register_block_category( $categories, $post ){
    
    return array_merge(
        $categories,
        array(
            array(
                'slug'  => 'ais-category',
                'title' => '本文読み上げ機能',
                'icon'  => 'controls-volumeon'
            ),
        ),
    );
}
add_filter( 'block_categories', 'AIS_register_block_category', 10, 2);

//=====[ register block ]=====//
function AIS_register_blocks_func(){

    wp_enqueue_script(
        'aispeaker-script',
        AIS_add_block_url,
        array( 'wp-blocks', 'wp-element', 'wp-components')
    );

	register_block_type(
        'ais/speech-block',
        array(
            'editor_script' => 'aispeaker-script'
        )
    );
}
add_action( 'init', 'AIS_register_blocks_func' );
// add_action( 'enqueue_block_editor_assets', 'AIS_register_blocks_func' );


//=====[ init setting ]=====//
function AIS_init_setting(){
    if(!get_option('AIS_installed')){
        add_option('AIS_installed', 1);
        add_option('AIS_speech-rate', '');
        add_option('AIS_speech-pitch', '');
        add_option('AIS_speech-volume', '');
        add_option('AIS_FontColor', '');
        add_option('AIS_ButtonColor', '');
        add_option('AIS_BGColor', '');
        add_option('AIS_certification', '');
    }
}
register_activation_hook(__FILE__, 'AIS_init_setting');


//=====[ add setting page (admin page) ]=====//
function AIS_adding_setting_page(){
    
    /*** main menu ***/
    add_menu_page(
        'AIS_mainsetting',
        'AI Speaker',
        'manage_options',
        'AIS_setting',
        'AIS_certification',
        'dashicons-controls-volumeon'
    );

    /*** certification ***/
    add_submenu_page(
        'AIS_setting',
        'プラグイン認証と詳細',
        'プラグイン認証と詳細',
        'administrator',
        'AIS_setting',
        'AIS_certification'
    );

    /*** speaker setting ***/
    add_submenu_page(
        'AIS_setting',
        '音声の設定',
        '音声の設定',
        'administrator',
        'AIS_speaker',
        'AIS_speaker_setting'
    );

}
add_action('admin_menu', 'AIS_adding_setting_page');