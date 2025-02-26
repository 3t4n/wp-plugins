<?php

global $wpdb;
$table_name = $wpdb->prefix . 'shipping_coordinadora_cities';
$query = "SELECT * FROM $table_name";
$cities = $wpdb->get_results(
    $query
);
$sending_cities = array();
if (!empty($cities)){
    foreach ($cities as $city){
        $sending_cities[$city->codigo] = "$city->nombre, $city->nombre_departamento";
    }
}

$cities_not_loaded = '<a href="' . esc_url(admin_url( 'admin.php?page=vendesfacil-install-setp' )) . '">' . __( 'Para cargar las ciudades, clic aquí') . '</a>';
$license_key_not_loaded = '<a target="_blank" href="' . esc_url('https://shop.saulmoralespa.com/producto/plugin-shipping-vendesfacil-woocommerce/') . '">' . __( 'Obtener una licencia desde aquí') . '</a>';

if (empty($this->get_option( 'license_key' ))){
    $license_key_title = array(
        'license_key_title' => array(
            'title'       => __( 'Se require una licencia para uso completo'),
            'type'        => 'title',
            'description' => $license_key_not_loaded,
        )
    );
}else{
    $license_key_title = array();
}

$license_key = array(
    'license_key'  => array(
        'title' => __( 'Licencia' ),
        'type'  => 'password',
        'description' => __( 'La licencia para su uso, según la cantidad de sitios por la cual la haya adquirido' ),
        'desc_tip' => true,
    )
);

if (empty($sending_cities)){
    $sending_cities_select = array(
        'shipping_cities_not_select' => array(
            'title'       => __( 'Las ciudades no estan cargadas!!!'),
            'type'        => 'title',
            'description' => $cities_not_loaded,
        )
    );
}else{
    $sending_cities_select = array(
        'city_sender' => array(
            'title' => __('Ciudad del remitente (donde se encuentra ubicada la tienda)'),
            'type'        => 'select',
            'class'       => 'wc-enhanced-select',
            'description' => __('Se recomienda selecionar ciudadades centrales'),
            'desc_tip' => true,
            'default' => true,
            'options'     => $sending_cities
        )
    );
}

return array_merge(
    array(
        'enabled' => array(
            'title' => __('Activar/Desactivar'),
            'type' => 'checkbox',
            'label' => __('Activar  VendesFácil'),
            'default' => 'no'
        ),
        'title'        => array(
            'title'       => __( 'Título método de envío' ),
            'type'        => 'text',
            'description' => __( 'Esto controla el título que el usuario ve durante el pago' ),
            'default'     => __( 'VendesFácil transporte' ),
            'desc_tip'    => true
        ),
        'debug'        => array(
            'title'       => __( 'Depurador' ),
            'label'       => __( 'Habilitar el modo de desarrollador' ),
            'type'        => 'checkbox',
            'default'     => 'no',
            'description' => __( 'Enable debug mode to show debugging information on your cart/checkout.' ),
            'desc_tip' => true
        ),
        'environment' => array(
            'title' => __('Enntorno'),
            'type'        => 'select',
            'class'       => 'wc-enhanced-select',
            'description' => __('Entorno de pruebas o producción'),
            'desc_tip' => true,
            'default' => true,
            'options'     => array(
                false    => __( 'Producción'),
                true => __( 'Pruebas')
            )
        )
    ),
    $license_key_title,
    $license_key,
    $sending_cities_select,
    array(
        'client_id'      => array(
            'title' => __( 'client_id' ),
            'type'  => 'password',
            'description' => __( 'client_id provisto por VendesFácil' ),
            'desc_tip' => true
        ),
        'secret' => array(
            'title' => __( 'secret' ),
            'type'  => 'password',
            'description' => __( 'secret provisto por VendesFácil' ),
            'desc_tip' => true
        ),
        'identification_number' => array(
            'title' => __( 'Número de identificación' ),
            'type'  => 'text',
            'description' => __( 'Número de identificación asociado con VendesFácil' ),
            'desc_tip' => true
        ),
        'phone_sender'      => array(
            'title' => __( 'Teléfono de la tienda ' ),
            'type'  => 'text',
            'description' => __( 'Teléfono de la tienda con fines de enviar los documentos en cada despacho' ),
            'desc_tip' => true
        )
    )
);