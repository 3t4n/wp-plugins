<?php
/**
 * Plugin Name: Administración de Pedidos Servientrega
 * Description: Con este plugin podrás configurar tu cuenta de Servientrega para que gestiones los envíos.
 * Version: 1.0.4
 * Author: Servientrega
 * Author URI: https://www.servientrega.com/
 * Text Domain: woocommerce-extension
*/

if (! defined ('ABSPATH')) { 
    exit; // Salir si se accede directamente 
}

function acutions_recent_bids_add_admin_page(){

add_menu_page('Servientrega', 'Servientrega', 'manage_options','servientrega-inicio','inicio','', 56);   


add_submenu_page(
    'servientrega-inicio',       // parent slug
    'Inicio',    // page title
    'Inicio',             // menu title
    'manage_options',           // capability
    'servientrega-inicio', // slug
    'inicio' // callback
); 


add_submenu_page(
    'servientrega-inicio',       // parent slug
    'Generación de Envíos',    // page title
    'Generación de Envíos',             // menu title
    'manage_options',           // capability
    'servientrega-generacion-envio', // slug
    'carguemasivo' // callback
);  

add_submenu_page(
    'servientrega-inicio',       // parent slug
    '',    // page title
    '',             // menu title
    'manage_options',           // capability
    'servientrega-upload', // slug
    'uploadarchivo' // callback
); 

/*add_submenu_page(
    null,       // parent slug
    '',    // page title
    '',             // menu title
    'manage_options',           // capability
    'servientrega-consulta-detallada', // slug
    'consultadetallada' // callback
); */


add_submenu_page(
    'servientrega-inicio',       // parent slug
    'Configuración',    // page title
    'Configuración',             // menu title
    'manage_options',           // capability
    'servientrega-general', // slug
    'opciones' // callback
);  




wp_enqueue_script('servientrega_custom_script', plugin_dir_url(__FILE__) . '/includes/javascript/servientrega.js');
wp_enqueue_script('servientrega_util_script', plugin_dir_url(__FILE__) . '/includes/javascript/servientrega-docready.js');

wp_enqueue_script( 'my_js',  plugin_dir_url(__FILE__) . '/includes/javascript/ajaxciudades.js', array('jquery') );
wp_localize_script( 'my_js', 'ajax_ciudades_var', array(
        'url'    => admin_url( 'admin-ajax.php' ),
        'nonce'  => wp_create_nonce( 'my-ajax-nonce' ),
        'action' => 'ciudades'
    ) );
	
wp_enqueue_script( 'ajax_busqueda_servientrega',  plugin_dir_url(__FILE__) . '/includes/javascript/ajaxbuscar.js', array('jquery') );
wp_localize_script( 'ajax_busqueda_servientrega', 'ajax_busqueda_var', array(
        'url'    => admin_url( 'admin-ajax.php' ),
        'nonce'  => wp_create_nonce( 'my-ajax-nonce' ),
        'action' => 'busqueda'
    ) );
	
wp_enqueue_script( 'ajax_crearenviosmasivo_servientrega',  plugin_dir_url(__FILE__) . '/includes/javascript/ajaxcrearenviosmasivos.js', array('jquery') );
wp_localize_script( 'ajax_crearenviosmasivo_servientrega', 'ajax_crearenviosmasivo_var', array(
        'url'    => admin_url( 'admin-ajax.php' ),
        'nonce'  => wp_create_nonce( 'my-ajax-nonce' ),
        'action' => 'crearenviosmasivo'
    ) );	
	
	
wp_enqueue_script( 'ajax_anularenviosmasivo_servientrega',  plugin_dir_url(__FILE__) . '/includes/javascript/ajaxanularenviosmasivos.js', array('jquery') );
wp_localize_script( 'ajax_anularenviosmasivo_servientrega', 'ajax_anularenviosmasivo_var', array(
        'url'    => admin_url( 'admin-ajax.php' ),
        'nonce'  => wp_create_nonce( 'my-ajax-nonce' ),
        'action' => 'anularenviosmasivo'
    ) );
	
wp_enqueue_script( 'ajax_otrasacciones_servientrega',  plugin_dir_url(__FILE__) . '/includes/javascript/ajaxotrasacciones.js', array('jquery') );
wp_localize_script( 'ajax_otrasacciones_servientrega', 'ajax_otrasacciones_var', array(
        'url'    => admin_url( 'admin-ajax.php' ),
        'nonce'  => wp_create_nonce( 'my-ajax-nonce' ),
        'action' => 'otrasacciones'
    ) );
	
wp_enqueue_script( 'ajax_carguearchivomasivos_servientrega',  plugin_dir_url(__FILE__) . '/includes/javascript/ajaxcarguearchivomasivoservientrega.js', array('jquery') );
wp_localize_script( 'ajax_carguearchivomasivos_servientrega', 'ajax_carguearchivomasivoservientrega_var', array(
        'url'    => admin_url( 'admin-ajax.php' ),
        'nonce'  => wp_create_nonce( 'my-ajax-nonce' ),
        'action' => 'cargararchivo'
    ) );
		
	


wp_enqueue_script('servientrega_intlTelInput_min', plugin_dir_url(__FILE__) . '/includes/javascript/intlTelInput.min.js');
wp_enqueue_script('servientrega_ciudades', plugin_dir_url(__FILE__) . '/includes/javascript/ciudades.js');
//wp_enqueue_script('jquery351', plugin_dir_url(__FILE__) . '/includes/javascript/jquery-3.5.1.min.js');
wp_enqueue_script('bootstrap_bundle_min', plugin_dir_url(__FILE__) . '/includes/javascript/bootstrap.bundle.min.js');
wp_enqueue_script('bootstrap_timepicker_min', plugin_dir_url(__FILE__) . '/includes/javascript/bootstrap-timepicker.min.js');
wp_enqueue_script('datatables_min', plugin_dir_url(__FILE__) . '/includes/javascript/datatables.min.js');
//wp_enqueue_script('scriptstels', plugin_dir_url(__FILE__) . '/includes/javascript/scriptstels.js');

wp_register_style('bootstrapmin_css', plugin_dir_url(__FILE__) . 'includes/css/bootstrap.min.css', array(), '1', 'all');
wp_enqueue_style('bootstrapmin_css');
wp_register_style('fontawesome_css', plugin_dir_url(__FILE__) . 'includes/css/fontawesome-all.css', array(), '1', 'all');
wp_enqueue_style('fontawesome_css');
wp_register_style('intlTelInput_css', plugin_dir_url(__FILE__) . 'includes/css/intlTelInput.min.css', array(), '1', 'all');
wp_enqueue_style('intlTelInput_css');
wp_register_style('custom_css', plugin_dir_url(__FILE__) . 'includes/css/custom.css', array(), '1', 'all');
wp_enqueue_style('custom_css');
wp_register_style('bootstrap_timepicker_min_css', plugin_dir_url(__FILE__) . 'includes/css/bootstrap-timepicker.min.css', array(), '1', 'all');
wp_enqueue_style('bootstrap_timepicker_min_css');

wp_register_style('datatables_css', plugin_dir_url(__FILE__) . 'includes/css/datatables.css', array(), '1', 'all');
wp_enqueue_style('datatables_css');









}


function cotizador(){
	$tab = ( ! empty( $_GET['tab'] ) ) ? sanitize_text_field( $_GET['tab'] ) : 'consultartoken';
	switch ($tab) {
			case "consultartoken":
				consultartoken();
				break;
			
			
		}
}


function recoleccionenvios(){
	$tab = ( ! empty( $_GET['tab'] ) ) ? sanitize_text_field( $_GET['tab'] ) : 'createrequestsporadic';
	switch ($tab) {
			case "createrequestsporadic":
				createrequestsporadic();
				break;
			case "cancelpickup":
				cancelpickup();
				break;
			
		}
}

function rastreoenvio(){
	$tab = ( ! empty( $_GET['tab'] ) ) ? sanitize_text_field( $_GET['tab'] ) : 'ConsultarGuia';
	switch ($tab) {
			case "ConsultarGuia":
				consultarguia();
				break;
			case "EstadoGuia":
				estadoguia();
				break;
			
		}
}



function generacionenvios()
{
	// Code displayed before the tabs (outside)
// Tabs
	$tab = ( ! empty( $_GET['tab'] ) ) ? sanitize_text_field( $_GET['tab'] ) : 'Inicio';
	
	switch ($tab) {
    case "Inicio":
        inicio();
        break;
    
    case "CargueMasivo":
        carguemasivo();
        break;
	
	
}
	

	
}
function opciones()
{
	require_once('includes/configuracion.php');
	admonpedidosservientrega_options();

}

function registra_opciones()
{
		register_setting('servientrega-autenticacion','User');
		register_setting('servientrega-autenticacion','Password');
		register_setting('servientrega-autenticacion','CodSer');
		register_setting('servientrega-autenticacion','UserCobro');
		register_setting('servientrega-autenticacion','PasswordCobro');
		register_setting('servientrega-autenticacion','CodSerCobro');
		register_setting('servientrega-autenticacion','Nombre_Cargue');
		register_setting('servientrega-autenticacion','Des_CiudadRemitente');	
		register_setting('servientrega-autenticacion','Des_DireccionRemitente');	
		register_setting('servientrega-autenticacion','Nom_Remitente');
		register_setting('servientrega-autenticacion','Num_IdentiRemitente');	
		register_setting('servientrega-autenticacion','Num_TelefonoRemitente');	
		register_setting('servientrega-autenticacion','Des_CiudadOrigen');
		register_setting('servientrega-autenticacion','Des_DepartamentoOrigen');	
		register_setting('servientrega-autenticacion','Nombrecontacto_remitente');	
		register_setting('servientrega-autenticacion','Celular_remitente');	
		register_setting('servientrega-autenticacion','Correo_remitente');	
		register_setting('servientrega-autenticacion','Nom_UnidadEmpaque');
		register_setting('servientrega-autenticacion','IdCliente');
		register_setting('servientrega-autenticacion','contraEntrega');
		
		create_table();
		
}













function carguemasivo(){
	
	require_once('includes/consulta-detallada.php');
	admonpedidosservientrega_pedidos();
	
}

function uploadarchivo(){
	
	require_once('includes/importar_pedidosenvios.php');
	importar_pedidosenvios();
}



function inicio() { 
	
	require_once('includes/inicio.php');
	admonpedidosservientrega_portada();

}




function wc_Servientrega_add_box() {
                                add_meta_box(
								'woocommerce-packinglist-box', __('Servientrega'), 
								'wc_Servientrega_content', 
								'shop_order', 
								'side', 
								'default');
                            }




function show_total_weight($order){

	if(!$order) return;

    $total_weight = 0;

    foreach( $order->get_items() as $item_id => $product_item ){
        $quantity = $product_item->get_quantity(); // get quantity
        $product = $product_item->get_product(); // get the WC_Product object
        $product_weight = $product->get_weight(); // get the product weight
        // Add the line item weight to the total weight calculation
        $total_weight += floatval( $product_weight * $quantity );
    }
	$total_weight=$total_weight>=3?$total_weight:3;
	return $total_weight;
}
function name_destination($country, $state_destination)
    {
        $countries_obj = new WC_Countries();
        $country_states_array = $countries_obj->get_states();

        $name_state_destination = '';

        if(!isset($country_states_array[$country][$state_destination]))
            return $name_state_destination;

        $name_state_destination = $country_states_array[$country][$state_destination];
        //$name_state_destination = self::clean_string($name_state_destination);
        return $name_state_destination;//self::short_name_location($name_state_destination);
    }
 function short_name_location($name_location)
    {
        if ( 'Valle del Cauca' === $name_location )
            $name_location =  'Valle';
        return $name_location;
    }

function clean_string($string)
    {
        $not_permitted = array ("á","é","í","ó","ú","Á","É","Í",
            "Ó","Ú","ñ");
        $permitted = array ("a","e","i","o","u","A","E","I","O",
            "U","n");
        $text = str_replace($not_permitted, $permitted, $string);
        return $text;
	}


function create_table()
    {

        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();
        $table_name = 'wp_PedidoEnvio';
		
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        if ( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) === $table_name )
		{
			$sqlAlterCol="ALTER TABLE $table_name 
			modify column NroGuia bigint(20)";
			
			
			$wpdb->query( $sqlAlterCol );
			
			$sqlAlterCol2="ALTER TABLE $table_name 
			modify column nroItem bigint(20)";
			
			$wpdb->query( $sqlAlterCol2 );
			
            return;
		}
		
		
        $sql = "CREATE TABLE $table_name  (
		 idPedidoEnvio bigint(20) NOT NULL AUTO_INCREMENT,
		 nombreTienda varchar(200)  NOT NULL,
		 IdOrder bigint(20) NOT NULL,
		 idProducto varchar(13)  NOT NULL,
		 nroItem bigint(20) NOT NULL,
		 nombreArchivo varchar(200)  DEFAULT NULL,
		 NumberOrder bigint(20) NOT NULL,
		 NroGuia bigint(20) DEFAULT NULL,
		 PesoTotal int(11) NOT NULL,
		 ValorDeclaradoTotal int(11) NOT NULL,
		 DesCiudadDestino varchar(100)  NOT NULL,
		 Direccion varchar(200)  NOT NULL,
		 Contacto varchar(200)  NOT NULL,
		 DiceContener varchar(200)  NOT NULL,
		 Alto int(11) NOT NULL,
		 Ancho int(11) NOT NULL,
		 Largo int(11) NOT NULL,
		 DesDptoDestino varchar(100)  NOT NULL,
		 Num_Factura varchar(100)  NOT NULL,
		 Correo_Electronico varchar(200)  DEFAULT NULL,
		 Telefono varchar(200)  DEFAULT NULL,
		 TipoPago varchar(10)  DEFAULT NULL,
		 TieneRecoleccionEsp bit(1) NOT NULL DEFAULT b'0',
		 DescripcionError text ,
		 EnvioExitoso bit(1) NOT NULL DEFAULT b'0',
		 ConCobro bit(1) DEFAULT b'0',
		 idEstado int(11) NOT NULL DEFAULT '1',
		 PickupRequestNumber bigint(20) DEFAULT NULL,
		 FechaCreacion datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
		 FechaActualizacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		 InsertControl int(11) NOT NULL DEFAULT '0',
		 IdEstadoEnvio int(11) DEFAULT NULL,
		 Estado_Envio varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
		 Fecha_Entrega datetime DEFAULT NULL,
		 Novedad varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
		 FechaActualizacionEstado datetime NOT NULL,
		 PRIMARY KEY (nombreTienda,IdOrder,idProducto,nroItem),
		 UNIQUE KEY idPedidoEnvio (idPedidoEnvio)
		) $charset_collate;";
		
		
		
		

        
        dbDelta( $sql );
		
		
		
	
		
    }


 
function combociudades()
{
	require_once('includes/ciudades.php');
	admonpedidosservientrega_generaCiudades();
	
	die();
}

function consultarenviosajax()
{
	require_once('includes/consultarenvios.php');
	admonpedidosservientrega_consultarenvios_ajax();
	
	die();
}

function crearenviosmasivoajax()
{
	require_once('includes/crearEnviosMasivos.php');
	admonpedidosservientrega_crearenviosmasivo_ajax();
	die();
}

function anularenviosmasivoajax()
{
	require_once('includes/anularGuiasMasivo.php');
	admonpedidosservientrega_anularenviosmasivo_ajax();
	die();
}

function otrasaccionesajax()
{
	require_once('includes/acciones.php');
	admonpedidosservientrega_acciones_ajax();
	die();
}

function cargararchivoajax()
{
	require_once('includes/importar_pedidosenvios.php');
	admonpedidosservientrega_importarpedidosenvios_ajax();
	
	die();
}

add_action('admin_menu','acutions_recent_bids_add_admin_page'); 
add_action('admin_init','registra_opciones');
add_action('add_meta_boxes', 'wc_Servientrega_add_box');

 
add_action( 'wp_ajax_ciudades', 'combociudades' ); 
add_action( 'wp_ajax_busqueda', 'consultarenviosajax' );  
add_action( 'wp_ajax_crearenviosmasivo', 'crearenviosmasivoajax' );  
add_action( 'wp_ajax_anularenviosmasivo', 'anularenviosmasivoajax' );  
add_action( 'wp_ajax_otrasacciones', 'otrasaccionesajax' );
add_action( 'wp_ajax_cargararchivo', 'cargararchivoajax' );


