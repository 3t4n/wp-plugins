<?php

if (!defined('ABSPATH')) {
    exit;
}

function revi_register_widgets()
{
    return register_widget('revi_Widget');
}

// POPUP
function revi_popup_order_confirmation($idOrder)
{
    //WEE_TODO Temporaly disabled
    return;

    if (is_null($idOrder)) {
        return;
    }

    $reviGeneralModel = new reviGeneralModel();
    $result = $reviGeneralModel->getNewReviewUrl($idOrder);

    if ($result) {
        $templateVars = array(
            'id_external_order' => $idOrder,
            // 'new_review_link' => $result->newreview_link . '&utm_source=map&utm_medium=email&utm_campaign=map_web_view', //no se usa
        );

        revi_load_widget_html("popup_new_review", $templateVars);
    }
}

// FUNCIONES DE WIDGETS QUE CARGA LA CLASE WIDGETS
function revi_load_widget_vertical()
{
    revi_load_widget_html("vertical");
}

function revi_load_widget_wide()
{
    revi_load_widget_html("wide");
}

function revi_load_widget_floating()
{
    revi_load_widget_html("floating");
}

function revi_load_widget_small()
{
    revi_load_widget_html("small");
}

function revi_load_widget_general()
{
    revi_load_widget_html("general");
}

function revi_load_widget_html($templateName, $templateVars = [], $idProduct = null)
{
    $allowedHtml = [
        'div' => [
            'class' => [],
            'id' => [],
            'data-*' => [],
            'data-id-product' => [],
            'data-lang' => [],
            'data-revi-widget-lazy' => [],
        ],
        'span' => [
            'class' => [],
        ],
        'small' => [
            'class' => [],
        ],
        'script' => [], // Permitir scripts si es seguro
    ];

    $reviWidgetsClass = new reviWidgetsClass();
    echo wp_kses($reviWidgetsClass->loadReviWidget($templateName, $templateVars, $idProduct), $allowedHtml);
}
