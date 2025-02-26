<?php
/*
Plugin Name: Add Font Family Dropdown to Visual Editor
Version: 1.0
Description: This plugin adds a Font Family Dropdown to Visual Editor.
Author: Pritesh Gupta
Author URI: http://www.priteshgupta.com
Plugin URI: http://www.priteshgupta.com/plugins/font-family-dropdown
License: GPL2
*/
add_filter('mce_buttons_2', 'add_font_family_row_2' );

function add_font_family_row_2( $mce_buttons ) {
        $pastetext = array_search( 'pastetext', $mce_buttons );
        $pasteword = array_search( 'pasteword', $mce_buttons );
        $removeformat = array_search( 'removeformat', $mce_buttons );

        unset( $mce_buttons[ $pastetext ] );
        unset( $mce_buttons[ $pasteword ] );
        unset( $mce_buttons[ $removeformat ] );
        array_splice( $mce_buttons, $pastetext, 0, 'fontselect' );
        return $mce_buttons;
}
function add_font_family_row_3( $mce_buttons ) {
        $mce_buttons[] = 'fontselect';
        return $mce_buttons;
}
add_filter('tiny_mce_before_init', 'font_choices' );
function font_choices( $init ) {
        $init['theme_advanced_fonts'] = 
                'Andale Mono=andale mono,times;'.
                'Arial=arial,helvetica,sans-serif;'.
                'Arial Black=arial black,avant garde;'.
                'Book Antiqua=book antiqua,palatino;'.
                'Comic Sans MS=comic sans ms,sans-serif;'.
                'Courier New=courier new,courier;'.
                'Georgia=georgia,palatino;'.
                'Helvetica=helvetica;'.
                'Impact=impact,chicago;'.
                'Symbol=symbol;'.
                'Tahoma=tahoma,arial,helvetica,sans-serif;'.
                'Terminal=terminal,monaco;'.
                'Times New Roman=times new roman,times;'.
                'Trebuchet MS=trebuchet ms,geneva;'.
                'Verdana=verdana,geneva;'.
                'Webdings=webdings;'.
                'Wingdings=wingdings,zapf dingbats'.
                '';
        return $init;
}