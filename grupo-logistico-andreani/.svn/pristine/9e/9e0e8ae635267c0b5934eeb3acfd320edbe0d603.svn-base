<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

	if (isset($_COOKIE['andreani_notice'])) {
			$_SESSION['andreani_notice'] = sanitize_text_field(wp_unslash($_COOKIE['andreani_notice']));
			add_action( 'admin_notices', 'andreani_notificacion_admin' );
	}
	add_action( 'wp_footer', 'andreani_validar_cp');
	function andreani_validar_cp() { 
		if (is_checkout()) { 		
			$response = wp_register_script('funciones', ANDREANI_PLUGIN_URL . '/includes/js/funciones.js', array('jquery'), ANDREANI_VERSION, true);
			$response2 = wp_enqueue_script('funciones'); 			 
	    } 
	}
	function andreani_enviar_orden($order_id) {
		global $wp_session;
			$headers = array(
				'Content-Type'  => 'application/json',
				'Authorization' => $wp_session["cliente_andreani"]

			);
 
			$woocommerce_email_from_address = get_option( 'woocommerce_email_from_address', array() );
  			$order_raw =wc_get_order( $order_id );
			 $metadata = $order_raw->get_meta_data();
			$metodo_envio=  get_post_meta($order_id,"_chosen_shipping",true);
			if(isset($wp_session['contratos_por_modalidad']))  $contrato= strval($wp_session['contratos_por_modalidad'][$metodo_envio]);
			else $contrato= '100006924';
 
			foreach( $order_raw->get_items() as $item_id => $item ){
				$product = wc_get_product( $item->get_product_id() );

				$product_id = $item->get_product_id();
				$product_name = $item->get_name();
				$product_qty = $item->get_quantity(); 
				

				$ancho[$product_id]= $product_qty*(int)$product->get_width();
				$alto[$product_id]= $product_qty*(int)$product->get_height();
				$prof[$product_id]= $product_qty*(int)$product->get_length();
 				$prod_desc[$product_id]=$product->get_description();
				$prod_nombre[$product_id]=$product->get_name();


				$dimensiones[$product_id] = $product_qty*(int)$product->get_width()*(int)$product->get_width()*(int)$product->get_width();
				$peso[$product_id] = $product_qty*(int)$product->get_weight();

				// Get package info based on product ID or any other criteria
				// Display package information
			
				
			}	
 			$dimension_total=0;
			 $order = json_decode(wc_get_order( $order_id ));

			foreach($dimensiones as $id=>$p){
				$dimension_total= $dimension_total+$p;
				$bultos[]= 
					array(

					'anchoCm' => $ancho[$id],
					'altoCm' => $alto[$id],
					'largoCm' =>$prof[$id],
					'kilos' =>$peso[$id],
					'volumenCm' =>$dimensiones[$id],
					'valorDeclaradoSinImpuestos' => floatval($order->shipping_total),

					'valorDeclaradoConImpuestos' => floatval($order->total),
					'referencias' => array(
						array(
							'meta' => "producto",
 					),
						array(
							'meta' => 'idCliente',
							'contenido' => strval($order->customer_id)
						),
						array(
							'meta' => 'observaciones',
							'contenido' => ''
						)
 		
				
				));
			}
		 
			$data = array();
			
			$data['contrato']= $contrato;
			$data['idPedido']= "'".$order->id."'";
 			$data['origen']= array(
					'postal' => array(
						'codigoPostal' => $order->billing->postcode,
						'calle' => $order->billing->address_1,
						'numero' => '3138',
						'localidad' =>$order->billing->city,
						'region' => 'AR-B',
						'pais' => $order->billing->country,
						'componentesDeDireccion' => array(
							array(
								'meta' => 'entreCalle',
								'contenido' => ''
							)
						)
					)
							);
				$data['destino' ]= array(
					'postal' => array(
						'codigoPostal' => $order->shipping->postcode,
						'calle' => $order->shipping->address_1,
						'numero' => '0',
						'localidad' =>$order->shipping->city,
						'region' => '',
						'pais' => $order->shipping->country,
						'componentesDeDireccion' => array(
							array(
								'meta' => 'piso',
								'contenido' => '0'
							),
							array(
								'meta' => 'departamento',
								'contenido' => '0'
							)
						)
					)
							);
				$data['remitente'] = array(
					'nombreCompleto' => $order->billing->first_name." ".$order->billing->last_name,
					'email' => $woocommerce_email_from_address,
					'documentoTipo' => 'DNI',
					'documentoNumero' => '',
					'telefonos' => array(
						array(
							'tipo' => 1,
							'numero' => $order->billing->phone
						)
					)
						);
				$data['destinatario'] = array(
					array(
						'nombreCompleto' => $order->shipping->first_name." ".$order->shipping->last_name,
						'email' => $order->billing->email,
						'documentoTipo' => "DNI",
						'documentoNumero' => '00000000',
						'telefonos' => array(
							array(
								'tipo' => 2,
								'numero' => $order->billing->phone
							)
						)
					)
							);
				$data['remito'] = array(
					'numeroRemito' => $order->order_key
				);
			 
			$data['bultos' ]= $bultos;
			if($metodo_envio == "pasp" ||$metodo_envio == "papp" ){
			$andreani_response = wp_remote_post( $wp_session["url_andreani_orden"], array(
			'headers' => $headers,
			'timeout'=> 40,
			'body'    =>wp_json_encode($data),
			'method'    => 'POST'   

			 ) ); 		
	}
 	 if(isset($andreani_response["body"])) {
		$body_response =explode (" ", $andreani_response["body"]);	
		update_post_meta( $order_id, 'nro_envio', $body_response[9]);
		$url_etiqueta =  str_replace("<br>", "", $body_response[27]);

		update_post_meta( $order_id, 'url_etiqueta', $url_etiqueta);
		echo "<div class='woocommerce-column woocommerce-column--3 woocommerce-column--shipping-address col-3'><h2 class='woocommerce-column__title'>Datos de envio Andreani</h2>
		<p>Número de envio Andreani: ".esc_html($body_response[9])." </p><p>Tracking para seguimiento: <a href=https://www.andreani.com/envio/".esc_html($body_response[9]).">https://www.andreani.com/envio/".esc_html($body_response[9])."</a> </p>
		<p><strong>El tracking del envío estará activo una vez que el vendedor despache su compra en la Sucursal Andreani. Le aconsejamos revisar el seguimiento en 24hs.</strong></p>
		</div>";

	}
 	 
	


		}
	add_action( 'woocommerce_thankyou' , "andreani_enviar_orden");
	 /**
	 * Update the order meta with field value
	 */
	add_action( 'woocommerce_checkout_update_order_meta', 'andreani_actualizar_metodo_envio' );
	function andreani_actualizar_metodo_envio( $order_id ) {
		session_start();
			//$chosen_shipping = json_encode($_SESSION['chosen_shipping'] );
			$params_andreani="";
			if(isset($_SESSION['params_andreani']))	$params_andreani = wp_json_encode(sanitize_text_field(wp_unslash($_SESSION['params_andreani']) ));
			$chosen_shipping = WC()->session->get( 'chosen_shipping_methods' );

			update_post_meta( $order_id, '_params_andreani', $params_andreani );
			update_post_meta( $order_id, '_chosen_shipping', $chosen_shipping[0] );
		
			if (!empty($_POST['sucursales_andreani'])) {
				update_post_meta( $order_id, 'sucursal_andreani', sanitize_text_field(wp_unslash( $_POST['sucursales_andreani'] ) ));
			}
	}

	 
	function andreani_notificacion_admin() {
			if( isset($_SESSION['andreani_notice']) ) { ?>
			<div class="notice error my-acf-notice is-dismissible" >
					<p><?php print(esc_html(sanitize_text_field($_SESSION['andreani_notice'])) ); ?></p>
			</div>

			<?php }
	}

 
	add_filter( 'woocommerce_form_field', 'andreani_style_select_field', 10, 4 );
	function andreani_style_select_field( $field, $key, $args, $value ) {
		if ( $key === 'sucursales_andreani' && is_array( $args['class'] ) ) {
			$args['class'][] = 'custom-select-field-style';
			$field = str_replace( 'select', 'select ' . esc_attr( join( ' ', $args['class'] ) ), $field );
		}
		return $field;
	}
	function andreani_obtener_api_sucursales() {

		global $wp_session;
 		$headers = array(
			'Content-Type'  => 'application/json',
			'Authorization' => $wp_session["cliente_andreani"]

		  );
   		//if(!isset($sucursales)  || is_empty($sucursales) ){
		  $response = wp_remote_post( $wp_session["url_andreani_sedes"], array(
			'timeout'     => 155, // Set the timeout in seconds

			'headers'   => $headers,
			 'body'    =>'{}',
			 'method'    => 'POST'   


		 )  );
 
 
  
		$body = wp_remote_retrieve_body( $response );
		$options = json_decode( $body, true );
  		 if(isset($options["message"]) ){
			 
			return array();

		 } 
		//}
	    
 		return $options;
	}
 	add_action( 'woocommerce_before_order_notes', 'andreani_obtener_sucursales',10 );

 	 
	 function andreani_obtener_sucursales() {
		global $woocommerce;
	
		wp_register_style('sucursales_css', ANDREANI_PLUGIN_URL . '/includes/css/sucursales.css', ANDREANI_VERSION, true);
		wp_enqueue_style('sucursales_css');
	
		$options = andreani_obtener_api_sucursales();
		$array_combo = array("0" => "Seleccione una sucursal");
		$codigo_postal_x_sucursal = array("0" => "");
	
		foreach ($options as $op) {
			$array_combo[$op["numero"] . "#" . $op["direccion"]["codigoPostal"]] = $op["direccion"]["provincia"] . "-" . $op["descripcion"] . "-" . $op["direccion"]["calle"] . " " . $op["direccion"]["numero"] . "-" . $op["direccion"]["localidad"];
			$codigo_postal_x_sucursal[$op["codigo"]] = $op["direccion"]["codigoPostal"];
		}
	
		asort($array_combo);
	
		WC()->session->set('codigo_postal_x_sucursal', $codigo_postal_x_sucursal);
		WC()->session->set('array_combo', $array_combo);
	
		woocommerce_form_field('sucursales_andreani', array(
			'type' => 'select',
			'options' => $array_combo,
			'label' => __('Sucursales Andreani', 'grupo-logistico-andreani'),
			'class' => array('custom-select-field-style'),
			'placeholder' => __('Seleccione una sucursal', 'grupo-logistico-andreani')
		), $woocommerce->checkout->get_value('sucursales_andreani'));
	
		echo "<br/>";
	}
	
	add_action('woocommerce_after_shipping_calculator', 'andreani_grabar_codigo_sucursal');
	
	function andreani_grabar_codigo_sucursal() {
		if (isset($_POST['sucursales_andreani'])) {
			WC()->session->set('codigo_sucursal', sanitize_text_field(wp_unslash($_POST['sucursales_andreani'])));
		}
	}
	
	function andreani_modificar_contenido_orden($order) {
		$order_raw = wc_get_order($order);
		$nro_envio = get_post_meta($order, "nro_envio", true);
	
		echo "<br><div><h2>Datos de envio Andreani</h2>
			<p>Número de envio Andreani: " . esc_html($nro_envio) . " </p>
			<p>Tracking para seguimiento: <a href=https://www.andreani.com/envio/" . esc_html($nro_envio) . ">https://www.andreani.com/envio/" . esc_html($nro_envio) . "</a> </p>
			</div>
			<p><strong>El tracking del envío estará activo una vez que el vendedor despache su compra en la Sucursal Andreani. Le aconsejamos revisar el seguimiento en 24hs.</strong></p>";
	}
	
	add_action('woocommerce_view_order', 'andreani_modificar_contenido_orden');
	
	add_action('woocommerce_admin_order_data_after_order_details', 'andreani_editar_metadata_orden');
	
	function andreani_editar_metadata_orden($order) {
		$nro_envio = get_post_meta($order->id, "nro_envio", true);
		$url_etiqueta = get_post_meta($order->id, "url_etiqueta", true);
	
		echo "<br><div><h3>Datos de envio Andreani</h3>
			<p>Número de envio Andreani: " . esc_html($nro_envio) . " </p>
			<p>Tracking para seguimiento: <a href=https://www.andreani.com/envio/" . esc_html($nro_envio) . ">https://www.andreani.com/envio/" . esc_html($nro_envio) . "</a> </p>
			<p>Etiqueta : <a href=" . esc_html($url_etiqueta) . ">" . esc_html($url_etiqueta) . "</a> </p>
			<p><strong>El tracking del envío estará activo una vez que el vendedor despache su compra en la Sucursal Andreani.</strong></p>
			</div>";
	}
?>