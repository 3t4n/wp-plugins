<?php

///////////// GENERAL WIDGETS //////////////

add_shortcode("revi_widget_wide", "revi_shortcode_widget_wide");

function revi_shortcode_widget_wide()
{
    $reviWidgetsClass = new reviWidgetsClass();
    return $reviWidgetsClass->loadReviWidget("wide", []);
}

add_shortcode("revi_widget_vertical", "revi_shortcode_widget_vertical");

function revi_shortcode_widget_vertical()
{
    $reviWidgetsClass = new reviWidgetsClass();
    return $reviWidgetsClass->loadReviWidget("vertical", []);
}

add_shortcode("revi_widget_floating", "revi_shortcode_widget_floating");

function revi_shortcode_widget_floating()
{
    $reviWidgetsClass = new reviWidgetsClass();
    return $reviWidgetsClass->loadReviWidget("floating", []);
}

add_shortcode("revi_widget_small", "revi_shortcode_widget_minimal"); //DEPRECATED
add_shortcode("revi_widget_minimal", "revi_shortcode_widget_minimal");

function revi_shortcode_widget_minimal()
{
    $reviWidgetsClass = new reviWidgetsClass();
    return $reviWidgetsClass->loadReviWidget("minimal", []);
}

add_shortcode("revi_widget_general", "revi_shortcode_widget_general");

function revi_shortcode_widget_general()
{
    $reviWidgetsClass = new reviWidgetsClass();
    return $reviWidgetsClass->loadReviWidget("general", []);
}

///////////// PRODUCT WIDGETS //////////////

add_shortcode("revi_widget_product", "revi_shortcode_widget_product");

function revi_shortcode_widget_product()
{
    global $post;
    $idProduct = $post->ID;

    $reviWidgetsClass = new reviWidgetsClass();
    return $reviWidgetsClass->loadReviWidget("product", [], $idProduct);
}

add_shortcode("revi_product_right", "revi_shortcode_widget_product_stars"); //DEPRECATED
add_shortcode("revi_widget_product_small", "revi_shortcode_widget_product_stars"); //DEPRECATED
add_shortcode("revi_widget_product_stars", "revi_shortcode_widget_product_stars");


function revi_shortcode_widget_product_stars($atts)
{
    global $post;

    $atts = shortcode_atts(array(
        'idProduct' => isset($post->ID) ? $post->ID : 0
    ), $atts, 'revi_widget_product_list');

    $idProduct = intval($atts['idProduct']); // Asegurar que sea un número entero

    $reviWidgetsClass = new reviWidgetsClass();
    return $reviWidgetsClass->loadReviWidget("stars", [], $idProduct);
}

add_shortcode("revi_widget_product_questions", "revi_shortcode_widget_questions");

function revi_shortcode_widget_product_questions()
{
    global $post;
    $idProduct = $post->ID;
    $reviWidgetsClass = new reviWidgetsClass();
    return $reviWidgetsClass->loadReviWidget("questions", [], $idProduct);
}

// PRODUCT LIST

add_shortcode("revi_widget_product_list", "revi_shortcode_product_list");

function revi_shortcode_product_list($atts)
{
    global $post;

    // Definir valores por defecto (el idProduct será el del post si no se pasa como parámetro)
    $atts = shortcode_atts(array(
        'idProduct' => isset($post->ID) ? $post->ID : 0
    ), $atts, 'revi_widget_product_list');

    $idProduct = intval($atts['idProduct']); // Asegurar que sea un número entero

    $reviProductsModel = new reviProductsModel();
    $productInfo = $reviProductsModel->getReviProduct($idProduct);

    $REVI_DISPLAY_PRODUCT_LIST_ALIGN = get_option('REVI_DISPLAY_PRODUCT_LIST_ALIGN');
    $REVI_DISPLAY_PRODUCT_LIST_EMPTY = get_option('REVI_DISPLAY_PRODUCT_LIST_EMPTY');
    $REVI_DISPLAY_PRODUCT_LIST_BLANK_SPACE = get_option('REVI_DISPLAY_PRODUCT_LIST_BLANK_SPACE') ?? 1;
    $REVI_DISPLAY_PRODUCT_LIST_TEXT = get_option('REVI_DISPLAY_PRODUCT_LIST_TEXT');

    include REVI_DIR . 'templates/hook/product_list.php';
}


add_shortcode("revi_load_styles", "revi_styles");
