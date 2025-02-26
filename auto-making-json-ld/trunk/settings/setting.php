<?php

//---- 管理画面にプラグインページを設定 ----//
function amJL_add_main_setting_page(){
    //メインメニュー
    add_menu_page(
        'auto making JSON-LD',
        '構造化データの設定',
        'manage_options',
        'amJL_setting',
        'amJL_certification',
        'dashicons-admin-generic'
    );

    //---[ Certification ]---//
    add_submenu_page(
        'amJL_setting',
        'プラグイン認証と詳細',
        'プラグイン認証と詳細',
        'administrator',
        'amJL_setting',
        'amJL_certification'
    );

    //---[ View setting ]---//
    add_submenu_page(
        'amJL_setting',
        '構造化データの表示設定',
        '構造化データの表示設定',
        'administrator',
        'view_setting',
        'amJL_view_setting_admin_page'
    );

    //---[ Article ]---//
    add_submenu_page(
        'amJL_setting',
        'Article・組織の設定',
        'Article・組織の設定',
        'administrator',
        'article_setting',
        'amJL_article_admin_page'
    );

    //---[ Recipe, Video, Howto ]---//
    add_submenu_page(
        'amJL_setting',
        'YouTubeの動画',
        'YouTubeの動画',
        'administrator',
        'youtubeAPI_setting',
        'amJL_youtubeAPI_admin_page'
    );


}

add_action('admin_menu', 'amJL_add_main_setting_page');