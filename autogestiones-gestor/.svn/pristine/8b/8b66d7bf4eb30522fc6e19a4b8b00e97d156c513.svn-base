<?php

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


/**
 * Public-facing functionality of the plugin.
 *
 * @link       https://autogestiones.net
 * @since      1.0.0
 *
 * @package    Autogestiones_Plugin
 * @subpackage Autogestiones_Plugin/public
 */

/**
 * Función para obtener el precio de un producto incluyendo el impuesto.
 *
 * @since    1.0.0
 * @param    float    $price       El precio base del producto.
 * @return   float                 El precio del producto incluyendo impuesto.
 */
function autg_plugin_get_price_with_tax($price)
{
    // Calcula aquí el precio incluyendo el impuesto.
    $tax_rate = get_option('autg_plugin_tax_rate', 0); // Obtiene la tasa de impuesto desde las opciones del plugin.
    $price_with_tax = $price + ($price * $tax_rate / 100);
    return $price_with_tax;
}



/**
 * Función para mostrar Numero de Documento
 *
 * @since    1.0.1
 */
function autg_mi_contenido_personalizado_pedido_client($order)
{
    $order_id = $order->get_id(); // Obtener el ID del pedido
    $campo_personalizado = autg_obtener_campo_personalizado();
    $data = get_post_meta($order_id, esc_attr($campo_personalizado), true); //   
    echo '<p> ' . esc_attr($campo_personalizado) . ': ' . esc_html($data) . '</p>';
}
add_action('woocommerce_order_details_after_order_table', 'autg_mi_contenido_personalizado_pedido_client');

/**
 * Función para mostrar el precio de un producto incluyendo el impuesto en la página de producto.
 *
 * @since    1.0.0
 */
function autg_plugin_display_price_with_tax()
{
    global $product;
    $price = $product->get_price();
    $price_with_tax = autg_plugin_get_price_with_tax($price);
    ?>
    <p class="price">
        <?php echo esc_html(wc_price($price_with_tax)) ?>
    </p>
    <?php
} /**
* COMIENZA PARTE DE AUTOGESTIONES 
* Añade el campo Número de documento a la página de checkout de WooCommerce
*/
add_action('woocommerce_after_order_notes', 'autg_agrega_mi_campo_personalizado');

function autg_agrega_mi_campo_personalizado($checkout)
{

    $campo_personalizado = autg_obtener_campo_personalizado();
    $text = '<div id="additional_checkout_field"><h4>' . esc_html__('Información adicional') . '</h4>';
    echo $text;

    wp_nonce_field('autg_connect_form', 'autg_connect_form_nonce');

    $placeholder = esc_html__('Introduzca el Nº de Documento') ;

    woocommerce_form_field('documentNo', array(
        'type' => 'text',
        'class' => array('my-field-class form-row-wide'),
        'label' => esc_attr($campo_personalizado),
        'required' => true,
        'placeholder' => $placeholder,
    ), $checkout->get_value('documentNo'));

    echo '</div>';

}
/**
 * Comprueba que el campo Número de Documento no esté vacío
 */
add_action('woocommerce_checkout_process', 'autg_comprobar_campo_nro_doc');

function autg_comprobar_campo_nro_doc()
{
    $campo_personalizado = autg_obtener_campo_personalizado();

    if (!check_admin_referer('autg_connect_form', 'autg_connect_form_nonce')) {
        wp_die('Insufficient privileges: Sorry, you do not have access to this page.');
    }
    // Comprueba si se ha introducido un valor y si está vacío se muestra un error.
    if (!$_POST['documentNo']) {
        $error_name = esc_attr($campo_personalizado) . esc_html__(', es un campo requerido. Debe de introducir su número de documento para finalizar la compra.');
        wc_add_notice($error_name, 'error');

    }
}

/**
 * Actualiza la información del pedido con el nuevo campo
 */
add_action('woocommerce_checkout_update_order_meta', 'autg_actualizar_info_pedido_con_nuevo_campo');

function autg_actualizar_info_pedido_con_nuevo_campo($order_id)
{
    $campo_personalizado = autg_obtener_campo_personalizado();

    if (!check_admin_referer('autg_connect_form', 'autg_connect_form_nonce')) {
        wp_die('Insufficient privileges: Sorry, you do not have access to this page.');
    }

    if (!empty($_POST['documentNo'])) {
        update_post_meta($order_id, esc_attr($campo_personalizado), sanitize_text_field($_POST['documentNo']));
    }
}

/**
 * Muestra el valor del nuevo campo Número de Documento en la página de edición del pedido
 */
add_action('woocommerce_admin_order_data_after_billing_address', 'autg_mostrar_campo_personalizado_en_admin_pedido', 10, 1);

function autg_mostrar_campo_personalizado_en_admin_pedido($order)
{
    $campo_personalizado = autg_obtener_campo_personalizado();

    $text = '<p><strong>' . esc_attr($campo_personalizado) . ':</strong> ' . esc_html(get_post_meta($order->id, esc_attr($campo_personalizado), true)) . '</p>';

    echo $text;
}

/**
 * Incluye el campo Número de Documento en el email de notificación del cliente
 */

add_filter('woocommerce_email_order_meta_keys', 'autg_muestra_campo_personalizado_email');

function autg_muestra_campo_personalizado_email($keys)
{
    $campo_personalizado = autg_obtener_campo_personalizado();
    $keys[] = esc_attr($campo_personalizado);
    return $keys;
}

/**
 *Incluir Número de Documento en la factura 
 */

add_filter('wpo_wcpdf_billing_address', 'autg_incluir_numero_de_documento_en_factura');

function autg_incluir_numero_de_documento_en_factura($address)
{
    global $wpo_wcpdf;
    $campo_personalizado = autg_obtener_campo_personalizado();

    echo esc_html($address) . '<p>';
    $wpo_wcpdf->custom_field(esc_attr($campo_personalizado), esc_attr($campo_personalizado) . ': ');
    echo '</p>';
}


/**
 * Función para mostrar Tipo de Documento
 *
 * @since    1.0.2
 */
function autg_obtener_campo_personalizado()
{
    // Obtén las opciones del plugin
    $plugin_options = get_option('autg_plugin_options');

    // Comprueba si el campo personalizado existe en las opciones del plugin
    if (isset($plugin_options['fieldCustomName'])) {
        $campo_personalizado = $plugin_options['fieldCustomName'];
    } else {
        $campo_personalizado = 'N° de Documento';
    }

    return $campo_personalizado;
}


/**
 * FINALIZA PARTE DE AUTOGESTIONES 
 */
// Agregar acción de Facturar a pedidos