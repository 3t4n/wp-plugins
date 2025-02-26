<?php
$values = acip_aviratoCalendar_action();

function acip_HexToRGB($hex) {
    $hex = str_replace("#", "", $hex);
    $color = array();
    if (strlen($hex) == 3) {
        $color['r'] = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
        $color['g'] = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
        $color['b'] = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
    } elseif (strlen($hex) == 6) {
        $color['r'] = hexdec(substr($hex, 0, 2));
        $color['g'] = hexdec(substr($hex, 2, 2));
        $color['b'] = hexdec(substr($hex, 4, 2));
    }
    return $color;
}

function acip_avircal_add_style($values) {
    $bg_Alpha = get_option('acip_aviratoCalendar_bgAlpha_value');
    $ico_color = get_option('acip_aviratoCalendar_ico_value');
    $butn_Alpha = get_option('acip_aviratoCalendar_butnAlpha_value');
    $color = acip_HexToRGB(get_option('acip_aviratoCalendar_bg_value'));
    $btn_color = acip_HexToRGB(get_option('acip_aviratoCalendar_butn_value'));
    $font_color = get_Option('acip_aviratoCalendar_font_value');
    $scroll = get_Option('acip_aviratoCalendar_scroll_value');
    $minimal = get_Option('acip_aviratoCalendar_minimal_value');
    $border_color = acip_HexToRGB(get_option('acip_aviratoCalendar_border_value'));
    ?>
    <style>
        .avirato_form {
            background-color: rgba(<?= $color["r"] ?>,<?= $color["g"] ?>,<?= $color["b"] ?>,<?= $bg_Alpha ?>) !important;
        }
        .avirato_form #check-availability {
            background-color: rgba(<?= $btn_color["r"] ?>,<?= $btn_color["g"] ?>,<?= $btn_color["b"] ?>,<?= $butn_Alpha ?>)!important;
            color: <?= $font_color ?> !important;
        }
        #neo_avirato #check-availability {
            background-color: rgba(<?= $btn_color["r"] ?>,<?= $btn_color["g"] ?>,<?= $btn_color["b"] ?>,<?= $butn_Alpha ?>)!important;
            color: <?= $font_color ?> !important;
        }
        .iconAv{
            color: <?= $ico_color ?>;
        }
        #reserv{
            background-color:  rgba(<?= $btn_color["r"] ?>,<?= $btn_color["g"] ?>,<?= $btn_color["b"] ?>,<?= $butn_Alpha ?>)!important;
            color: <?= $font_color ?> !important;
        }
        .acip_boton{
            background-color:  rgba(<?= $btn_color["r"] ?>,<?= $btn_color["g"] ?>,<?= $btn_color["b"] ?>,<?= $butn_Alpha ?>)!important;
        }
        #acip_reservar{
            color: <?= $font_color ?> !important;
        }
        #neo_avirato .btn_avirato {
            background-color: rgba(<?= $btn_color["r"] ?>,<?= $btn_color["g"] ?>,<?= $btn_color["b"] ?>,<?= $butn_Alpha ?>)!important;
            color: <?= $font_color ?> !important;
        }
        #zonaSelect, .select_apart, .avirato_form input[type="text"], .avirato_form input[type="number"],.avirato_form #check-availability{
            border:1px solid rgb(<?= $border_color["r"] ?>,<?= $border_color["g"] ?>,<?= $border_color["b"] ?>)!important;
        }
        <?php
        if($minimal == 'si'){
          ?>
          #zonaSelect, .select_apart, .avirato_form input[type="text"], .avirato_form input[type="number"]{
            border:3px solid rgb(<?= $border_color["r"] ?>,<?= $border_color["g"] ?>,<?= $border_color["b"] ?>)!important;
            border-left: none!important;
            border-right: none!important;
            border-top: none!important;
          }
          <?php
        }
        ?>
        .avirBtn_auto{
            display: inline-block;
            padding: 11px 20px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            border: 2px solid rgb(<?= $border_color["r"] ?>,<?= $border_color["g"] ?>,<?= $border_color["b"] ?>)!important;
            background-color: rgba(<?= $btn_color["r"] ?>,<?= $btn_color["g"] ?>,<?= $btn_color["b"] ?>,<?= $butn_Alpha ?>)!important;
            color: <?= $font_color ?> !important;
        }
        .avirBtn_auto:hover{
            opacity: .5;
            box-shadow: none !important;
            -webkit-box-shadow: none !important;
        }
        .ui-widget-header {
            background: rgba(<?= $btn_color["r"] ?>,<?= $btn_color["g"] ?>,<?= $btn_color["b"] ?>,<?= $butn_Alpha ?>)!important;;
            color: <?= $font_color ?> !important;
        }
        .ui-datepicker table tr:hover td:not([class='  ui-datepicker-current-day']) a{
            color: <?= $font_color ?> !important;
        }
        .ui-datepicker table tr:hover td[class=' ui-datepicker-days-cell-over  ui-datepicker-current-day ui-datepicker-today'] a[class='ui-state-default ui-state-highlight ui-state-active ui-state-hover'], .ui-datepicker table tr:hover td[class=' ui-datepicker-days-cell-over  ui-datepicker-current-day ui-datepicker-today'] a[class='ui-state-default ui-state-highlight ui-state-active']{
            color: #222 !important;
        }
        .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
            background: rgba(<?= $btn_color["r"] ?>,<?= $btn_color["g"] ?>,<?= $btn_color["b"] ?>,<?= $butn_Alpha ?>)!important;;
            color: <?= $font_color ?> !important;
        }
        .ui-state-hover, .ui-widget-content .ui-state-hover, .ui-widget-header .ui-state-hover, .ui-state-focus, .ui-widget-content .ui-state-focus, .ui-widget-header .ui-state-focus {
            color:  <?= $font_color ?> !important;
        }
        .ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active {
            background: #fbf9ee url(images/ui-bg_glass_55_fbf9ee_1x400.png) 50% 50% repeat-x !important;
            color: #212121 !important;
        }
        .ui-state-active:hover, .ui-widget-content .ui-state-active:hover, .ui-widget-header .ui-state-active:hover {
            color: #212121 !important;
        }
        .stickyAvirato{
            top: <?= $scroll ?>px;
        }

    </style>
    <?php
}

function acip_addStyles() {
    $values = get_option('acip_aviratoCalendar_type_value');
    $scrollA = get_option('acip_aviratoCalendar_scrollActive_value');
    if ($values == 'vertical') {
        wp_enqueue_script('app_calendar', plugins_url('../includes/js/app_calendar.js', __FILE__));
        wp_enqueue_style('style_vertical', plugins_url('../includes/css/style_vertical.css', __FILE__));
        wp_enqueue_style('style_vertical_material', 'https://fonts.googleapis.com/icon?family=Material+Icons');
        ?>
        <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
        <?php
    } else if ($values == 'apaisado') {
        if ($scrollA == 'si') {
            wp_enqueue_script('app_calendar', plugins_url('../includes/js/app_calendar_1.js', __FILE__));
        } else {
            wp_enqueue_script('app_calendar', plugins_url('../includes/js/app_calendar.js', __FILE__));
        }
        wp_enqueue_style('style_apaisado', plugins_url('../includes/css/style_apaisado.css', __FILE__));
        wp_enqueue_style('style_vertical_material', 'https://fonts.googleapis.com/icon?family=Material+Icons');
        ?>
        <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
        <?php
    } else if ($values == 'popup') {
        wp_enqueue_script('app_calendar', plugins_url('../includes/js/script.js', __FILE__));
        wp_enqueue_style('style_o', plugins_url('../includes/css/style_o.css', __FILE__));
        ?>
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
        <?php
    } else if ($values == 'mini') {
        wp_enqueue_script('app_calendar_mini', plugins_url('../includes/js/app_calendar_mini.js', __FILE__));
        wp_enqueue_style('style_mini', plugins_url('../includes/css/style_mini.css', __FILE__));
        ?>
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
        <?php
    } else {
        wp_enqueue_style('style_oculto', plugins_url('../includes/css/style_oculto.css', __FILE__));
        wp_enqueue_style('style_vertical_material', 'https://fonts.googleapis.com/icon?family=Material+Icons');
        ?>
     <!--   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
        <?php
    }
}

function acip_addStyles_oculto() {
    $values = get_option('acip_aviratoCalendar_type_value');
    if ($values == 'oculto') {
        wp_enqueue_script('app_calendar_oculto', plugins_url('../includes/js/app_calendar_oculto.js', __FILE__));
    }
}

function acip_admin_style() {
    wp_enqueue_style('acip_admin_styleCss', plugins_url('../includes/css/acip_admin_stylecss.css', __FILE__));
    wp_enqueue_script('acip_tabs_script', plugins_url('../includes/js/acip_tabs_script.js', __FILE__));
    $values = get_option('acip_aviratoCalendar_type_value');
    if ($values == 'vertical') {

        wp_enqueue_style('style_vertical', plugins_url('../includes/css/style_vertical.css', __FILE__));
        wp_enqueue_style('style_vertical_material', 'https://fonts.googleapis.com/icon?family=Material+Icons');
        ?>
        <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
        <?php
    } else if ($values == 'apaisado') {

        wp_enqueue_style('style_apaisado', plugins_url('../includes/css/style_apaisado.css', __FILE__));
        wp_enqueue_style('style_vertical_material', 'https://fonts.googleapis.com/icon?family=Material+Icons');
        ?>
        <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
        <?php
    } else if ($values == 'popup') {

        wp_enqueue_style('style_o', plugins_url('../includes/css/style_o.css', __FILE__));
        ?>
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
        <?php
    } else if ($values == 'mini') {

        wp_enqueue_style('style_mini', plugins_url('../includes/css/style_mini.css', __FILE__));
        ?>
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
        <?php
    } else {
        wp_enqueue_style('style_oculto', plugins_url('../includes/css/style_oculto.css', __FILE__));
        wp_enqueue_style('style_vertical_material', 'https://fonts.googleapis.com/icon?family=Material+Icons');
        ?>
        <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
        <?php
    }
}
