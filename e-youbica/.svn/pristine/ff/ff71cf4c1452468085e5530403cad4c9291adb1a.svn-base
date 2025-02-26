<?php 
/**
 * Back end display
 */

add_action( 'show_user_profile', 'youbica_crf_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'youbica_crf_show_extra_profile_fields' );

function youbica_crf_show_extra_profile_fields( $user ) {
	$user_token_youbica = get_the_author_meta( 'token_user_youbica', $user->ID );
	?>
	<h3><?php esc_html_e( 'Youbica', 'crf' ); ?></h3>

	<table class="form-table">
		<tr>
			<th><label for="token_user_youbica"><?php esc_html_e( 'Token de usuario', 'crf' ); ?></label></th>
			<td>
				<input type="text" 
			       id="token_user_youbica"
			       name="token_user_youbica"
			       value="<?php echo esc_attr( $user_token_youbica ); ?>"
			       class="regular-text"
                   disabled
				/>
			</td>
		</tr>
	</table>
	<?php
}

add_action( 'personal_options_update', 'youbica_crf_update_profile_fields' );
add_action( 'edit_user_profile_update', 'youbica_crf_update_profile_fields' );

function youbica_crf_update_profile_fields( $user_id ) {
	if ( ! current_user_can( 'edit_user', $user_id ) ) {
		return false;
	}

	if ( ! empty( $_POST['token_user_youbica'] ) && intval( $_POST['token_user_youbica'] ) >= 1900 ) {
		update_user_meta( $user_id, 'token_user_youbica', intval( $_POST['token_user_youbica'] ) );
	}
}

add_action( 'woocommerce_after_checkout_billing_form', 'youbica_extra_field_checkout' , 10, 1 );
function youbica_extra_field_checkout() { ?> 
	<input type="text" name="user_id_youbica" class="user_id_youbica">
	<input type="text" name="_youbica_user_id_remitente" class="user_id_youbica">
	<input type="text" name="_youbica_user_token" class="user_id_youbica">
  <?php 
}

add_action( 'woocommerce_new_order', 'youbica_add_order_delivery_date_to_order' , 10, 1);
function youbica_add_order_delivery_date_to_order ( $order_id ) { 

	update_post_meta( $order_id, '_youbica_user_id',  sanitize_text_field( $_POST ['user_id_youbica'] ) ); 
	update_post_meta( $order_id, '_youbica_user_id_remitente',  sanitize_text_field( $_POST ['_youbica_user_id_remitente'] ) ); 
	 
	if($_POST ['user_id_youbica']){
		update_post_meta( $order_id, '_shipping_first_name', sanitize_text_field( '' ) );
		update_post_meta( $order_id, '_shipping_last_name', sanitize_text_field( '' ) );
		update_post_meta( $order_id, '_shipping_address_1', sanitize_text_field( '' ) );
		update_post_meta( $order_id, '_shipping_address_2', sanitize_text_field( '' ) );
		update_post_meta( $order_id, '_shipping_city', sanitize_text_field( '' ) );
		update_post_meta( $order_id, '_shipping_state', sanitize_text_field( '' ) );
		update_post_meta( $order_id, '_shipping_postcode', sanitize_text_field( '' ) );
		update_post_meta( $order_id, '_shipping_country', sanitize_text_field( '' ) );
	}
	 
	update_post_meta( $order_id, '_yuobica_gift', true );

	$user_id = get_post_meta($order_id, '_customer_user', true);
	$token = sanitize_text_field( $_POST ['_youbica_user_token'] );
	$user_id_youbica = sanitize_text_field( $_POST ['user_id_youbica'] );
	update_post_meta( $order_id, '_yuobica_buyer_token', $token); 
	
    $response = wp_remote_request( YOUBICA_API_URL . '/usuario/'.$user_id_youbica,
        array(
            'method'     => 'GET',
			'headers' => array('S-Authorization' => 'Bearer ' . base64_encode(get_option( 'ybp_public_key' )), 'Yb-Plugin' => 'WC'),
        )
    );
    $body = json_decode(wp_remote_retrieve_body($response));  
	update_post_meta( $order_id, '_yuobica_shipping_first_name', sanitize_text_field( $body->nombreUsuario ) ); 
	update_post_meta( $order_id, '_yuobica_shipping_last_name', '' ); 
	update_post_meta( $order_id, '_yuobica_shipping_address_1', sanitize_text_field( $body->direccion ).' '.sanitize_text_field( $body->noExterior ) ); 
	update_post_meta( $order_id, '_yuobica_shipping_city', sanitize_text_field( $body->ciudad ) ); 
	update_post_meta( $order_id, '_yuobica_shipping_state', sanitize_text_field( $body->estado->local_name ) ); 
	update_post_meta( $order_id, '_yuobica_shipping_postcode', sanitize_text_field( $body->codigoPostal )); 
	update_post_meta( $order_id, '_yuobica_shipping_country', sanitize_text_field( $body->pais->local_name ) );  
	update_post_meta( $order_id, '_yuobica_shipping_phone', sanitize_text_field( $body->telefono ) );  
	update_post_meta( $order_id, '_yuobica_shipping_email', sanitize_text_field( $body->correo ) ); 
	update_post_meta( $order_id, '_yuobica_shipping_inside', sanitize_text_field( $body->noInterior ) );
}

function youbica_custom_field_function_name($order){
	$id = get_post_meta($order->id, '_yuobica_shipping_first_name', true );
	$nombre = get_post_meta($order->id, '_yuobica_shipping_first_name', true ).' '.get_post_meta($order->id, '_yuobica_shipping_last_name', true );
	$telefono = get_post_meta($order->id, '_yuobica_shipping_phone', true );
	$correo = get_post_meta($order->id, '_yuobica_shipping_email', true );
	$direccion = get_post_meta($order->id, '_yuobica_shipping_address_1', true );
	if(get_post_meta($order->id, '_yuobica_shipping_inside', true )) $direccion .= '('.get_post_meta($order->id, '_yuobica_shipping_inside', true ).')';
	$ciudad = get_post_meta($order->id, '_yuobica_shipping_city', true );
	$estado = get_post_meta($order->id, '_yuobica_shipping_state', true );
	$cp = get_post_meta($order->id, '_yuobica_shipping_postcode', true );
	$pais = get_post_meta($order->id, '_yuobica_shipping_country', true );


	if(!empty($id)){ ?>
		<h3>Envio con e-youbica</h3>
		<b>Nombre:</b> <?php echo esc_attr($nombre); ?><br> 
		<b>Teléfono:</b> <?php echo esc_attr($telefono); ?><br>
		<b>Correo electrónico:</b> <?php echo esc_attr($correo); ?><br>
		<b>Dirección:</b> <?php echo esc_attr($direccion); ?><br>
		<b>Ciudad:</b> <?php echo esc_attr($ciudad); ?><br>
		<b>Estado:</b> <?php echo esc_attr($estado); ?><br>
		<b>C.P.:</b> <?php echo esc_attr($cp); ?><br>
		<b>País:</b> <?php echo esc_attr($pais); ?><br>
		<b style="color:red">Recuerda proporcionar estos datos a la paquetería, no compartas esta información con el usuario de la compra.</b>
	<?php }
}
add_action( 'woocommerce_admin_order_data_after_shipping_address', 'youbica_custom_field_function_name', 10, 1 );
 
function youbica_order_status_processing($order_id) {
	global $wp;
	$order = wc_get_order(  $order_id );
	$site_title = get_bloginfo( 'name' );
	if(get_post_meta($order->id, '_yuobica_gift', true )){
		$response = wp_remote_request( YOUBICA_API_URL . '/regalos',
			array(
				'method'     => 'POST',
				'headers' => array('S-Authorization' => 'Bearer ' . base64_encode(get_option( 'ybp_public_key' )), 'Yb-Plugin' => 'WC'),
				'body'      => array( 
					'destinatario_id' => get_post_meta($order->id, '_youbica_user_id', true ),
					'remitente_id' => get_post_meta($order->id, '_youbica_user_id_remitente', true ),
					'tienda' => $site_title,
					'url' =>  home_url( $wp->request ),
					'descripcion' => get_bloginfo( 'description' ),
					'nombre' => $site_title 
				)
			)
		); 
	}
		 
}
add_action( 'woocommerce_order_status_processing', 'youbica_order_status_processing', 10, 1 ); 