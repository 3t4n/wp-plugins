<?php
/*
Plugin Name: Hack me if you can
Plugin URI: http://artanik.ru/
Description: Protect the admin panel of brute force
Version: 1.2
Author: Artem Anikeev
Author URI: http://artanik.ru/
License: GPL2
*/
/*  Copyright 2011  Artanik  (email : artanik94 {at} yandex.ru)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
 

add_action( 'login_init', 'fa_login_stringcheck' );
function fa_login_stringcheck() {

    $wp_admin = get_option('wp_admin');
    $fa_text = get_option('fa_text');
    
    $custom_url = site_url() . '/' . $wp_admin;
    
    // set the location a failed attempt goes to
    $redirect = $wp_admin;

    // get the requested URL
    $form_request = site_url() . $_SERVER['REQUEST_URI'];
    if(!empty($wp_admin)) {
        if (wplogin_filter($form_request)) {
            if(empty($fa_text)) {
                wp_redirect(home_url('404.php'), 302); exit;
                die('');
            } else {
                die($fa_text);
            }
        }
    }

}

add_action( 'parse_request', 'fa_request' );
function fa_request() {
    $wp_admin = get_option('wp_admin');
    if(!empty($wp_admin)) {
        $custom_url = site_url() . '/' . $wp_admin;
        $custom_url2 = site_url() . '/?' . $wp_admin;

        $serv_port = $_SERVER['SERVER_PORT']=='80'?'':':'.$_SERVER['SERVER_PORT'];
        $form_request = 'http://' . $_SERVER['SERVER_NAME']. $serv_port.$_SERVER['REQUEST_URI'];

        if($form_request==$custom_url or $form_request==$custom_url2) {
            $redirect = site_url() . '/wp-admin/?'.$wp_admin;
            wp_redirect( esc_url_raw ($redirect), 302 );
            die('redirect...');
        }
    }
}

function wplogin_filter($form_request) {
    $serv_port = $_SERVER['SERVER_PORT']=='80'?'':':'.$_SERVER['SERVER_PORT'];
    $url = 'http://' . $_SERVER['SERVER_NAME']. $serv_port.$_SERVER['REQUEST_URI'];
    $old  = "/(wp-admin|wp-login\.php)/";
    $new  = '';
    if(preg_match( $old, $url, $new)) {
        $wp_admin = get_option('wp_admin');
        if(preg_match( "/($wp_admin|action=logout)/", $url, $new) or preg_match( "/($wp_admin)/", $_POST['redirect_to'], $new)) {
           return false; 
        }
        if(preg_match( "/(loggedout=true)/", $url, $new)) {
            $redirect = site_url();
            wp_redirect( esc_url_raw ($redirect), 302 );
            die('redirect...');
        }
        return true;
    } else {
       return false; 
    }
  
}

function fa_set_options() {
    add_option('wp_admin');
    add_option('fa_text');
    add_option('current_lang', 'en_EN');
}

function fa_unset_options() {
    delete_option('wp_admin');
    delete_option('fa_text');
    delete_option('current_lang');
}

function fa_admin_page() {
    add_options_page('Hack me if you can', 'Hack me if you can', 8, __FILE__, 'fa_options_page');
}


function _rl($option,$lang) {
    $langs = array(
        'en_EN' =>
            array(
                'options' => 'Hack me if you can',
                'replece' => 'New admin path:',
                'replece_sample' => 'Sample: '.site_url().'/superadmin',
                'language' => 'language/язык:',
                'settings' => 'Settings',
                'save_settings' => 'The settings are saved.',
                'is_empty_field' => ' If the field is empty, the plugin is disabled.',
                'text_for_hacker' => 'Text for hacker:',
                'text_for_hacker_explain' => 'If the field is empty, then a 404 redirect to the page template(404.php)',
                'save_text' => 'Save Changes',
                'dev_title' => 'From the developer',
                'link_to_admin' => 'Link to adminpanel:',
                'link_to_admin_SEO' => 'If enable custom permalink, try this:',
                'author_title' => 'Author:',
                'author' => 'Artem Anikeev',
                'desc_title' => 'Description:',
                'desc' => 'Plugin to protect the admin panel.',
                'version' => 'Version:',
            ),
        'ru_RU' =>
            array(
                'options' => 'Hack me if you can',
                'replece' => 'Замена wp-admin:',
                'replece_sample' => 'Пример: '.site_url().'/superadmin',
                'language' => 'language/язык:',
                'settings' => 'Настройки',
                'save_settings' => 'Настройки сохранены.',
                'is_empty_field' => ' Если поле пустое, плагин отключается.',
                'text_for_hacker' => 'Текст для хакера:',
                'text_for_hacker_explain' => 'Если поле пустое, то происходит редирект на 404 страницу шаблона(404.php)',
                'save_text' => 'Сохранить изменения',
                'dev_title' => 'От разработчика',
                'link_to_admin' => 'Ссылка на админку:',
                'link_to_admin_SEO' => 'Если есть ЧПУ, то можно:',
                'author_title' => 'Автор:',
                'author' => 'Аникеев Артём',
                'desc_title' => 'Описание:',
                'desc' => 'Защита админки от подбора паролей.',
                'version' => 'Версия:',
            )
    );
    return $langs[$lang][$option];
}
function _erl($option,$lang) {
    echo _rl($option,$lang);
}

function fa_options_page() {
    $options = array(
     'wp_admin',
     'fa_text',
     'current_lang'
    );
    $cmd = $_POST['cmd'];
    foreach ($options as $myplugin_opt) {
     $$myplugin_opt = get_option($myplugin_opt);
    }
    if ($cmd == "myplugin_save_opt") {
     foreach ($options as $myplugin_opt) {
        $$myplugin_opt = $myplugin_opt=='fa_text'?$_POST[$myplugin_opt]:str_replace('?','',$_POST[$myplugin_opt]);
     }

     foreach ($options as $myplugin_opt) {
        update_option($myplugin_opt, $$myplugin_opt);
     }
     if(empty($current_lang)) {
        $current_lang = 'en_EN';
     }
    ?>
     <div class="updated"><p><strong> <?php _erl('save_settings',$current_lang); ?></strong> <?php if(empty($wp_admin)) {echo _erl('is_empty_field',$current_lang);} ?> </p></div>
    <?php
    }
    ?>
    <div class="wrap">
    <h2><?php _erl('options',$current_lang); ?></h2>
    <h3><?php _erl('settings',$current_lang);?></h3>
    <form method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>">
        <table class="form-table">
            <tr>
                <td scope="row">
                    <?php _erl('replece',$current_lang); ?>
                </td>
                <td scope="row">
                    <?php echo site_url(); ?>/<input type="text" name="wp_admin" value="<?php echo $wp_admin;?>" />
                    <p class="description"><?php _erl('replece_sample',$current_lang) ?></p>
                </td>
            </tr>
            <tr>
                <td scope="row">
                    <?php _erl('text_for_hacker',$current_lang); ?>
                <td scope="row">
                    <textarea name="fa_text"><?php echo $fa_text;?></textarea>
                    <p class="description"><?php _erl('text_for_hacker_explain',$current_lang); ?></p>
                </td>
            </tr>
            <tr>
                <td scope="row">
                    <?php _erl('language',$current_lang); ?>
                <td scope="row">
                    <?php if($current_lang == 'en_EN') {
                        $chekEn = 'checked="checked"';
                        $chekRu = '';
                    } else {
                        $chekEn = '';
                        $chekRu = 'checked="checked"';
                    }?>
                    <label><input type="radio" name="current_lang" value="en_EN" <?php echo $chekEn; ?> /> English</label>
                    <label><input type="radio" name="current_lang" value="ru_RU" <?php echo $chekRu; ?> /> Русский</label>
                </td>
            </tr>
        </table>
        <input type="hidden" name="cmd" value="myplugin_save_opt">
        <p class="submit">
            <input type="submit" class="button button-primary" name="Submit" value="<?php _erl('save_text',$current_lang) ?>" /> 
        </p>
    </form>

    
    <h3><?php _erl('dev_title',$current_lang); ?></h3>
    <table class="form-table">
        <tr>
            <td>
                <?php 
                    if(!empty($wp_admin)) {
                        $custom_url = site_url() . '/' . $wp_admin;
                        $custom_url2 = site_url() . '/?' . $wp_admin;
                        echo '<strong>'._rl('link_to_admin',$current_lang).' </strong>' . $custom_url2 . '<br/>';
                        echo '<strong>'._rl('link_to_admin_SEO',$current_lang).' </strong>'. $custom_url . '<br/>';
                    }
                    
                ?>
            </td>
            <td rowspan="2">
                <?php if($current_lang != 'en_EN') {?>
                Понравился плагин? Отблагодарите автора:<br>
                WMR: <strong>R214648204236</strong><br>
                WMZ: <strong>Z119064023911</strong>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php 
                    echo '<strong>'._rl('author_title',$current_lang).'</strong> <a href="http://artanik.ru/" target="_blank">'._rl('author',$current_lang).'</a><br /><strong>'._rl('desc_title',$current_lang).'</strong> '._rl('desc',$current_lang).'<br /><strong>'._rl('version',$current_lang).'</strong> 1.2'; ?>
            </td>
        </tr>
    </table>
    </div>
    <?php
}


register_activation_hook(__FILE__, 'fa_set_options');
register_deactivation_hook(__FILE__, 'fa_unset_options');
add_action('admin_menu', 'fa_admin_page');
