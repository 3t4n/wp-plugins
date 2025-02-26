<?php

use function PHPSTORM_META\type;

defined( 'ABSPATH' ) || exit;
final class Youbica { 
	public $version = '1.2.2'; 
	protected static $_instance = null; 

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

    /**
	 * e-youbica Constructor.
	 */
    function __construct() {
        $this->init_hooks();
    }
    
	private function init_hooks() {
		add_action('admin_init', array($this, 'initSettings'));
        add_action('admin_menu', array($this, 'settignsLink'));
 
		add_action('woocommerce_before_checkout_form', array($this, 'LoginYoubica'));
		add_action('woocommerce_email_customer_details', array( $this, 'youbica_email_addresses'), 21, 3 );
		add_action('woocommerce_checkout_update_order_review', array($this, 'youbica_checkout_update_order_review'));
		add_action('woocommerce_checkout_process', array($this, 'youbica_checkout_process'));
		add_action('woocommerce_checkout_order_processed', array($this, 'youbica_checkout_order_processed'));
		add_action('woocommerce_before_checkout_shipping_form', array($this, 'youbica_before_checkout_shipping_form'));
		add_action('woocommerce_cart_totals_before_shipping', array($this, 'youbica_cart_totals_before_shipping'));
		//add_action('wp_loaded', array($this, 'youbica_cart_totals_before_order_total'));
		add_action('wp_enqueue_scripts',  array($this, 'initScript'));

		add_filter( 'ppcp_create_order_request_body_data', array($this, 'youbica_ppcp_body_data_sanitize'), 11 );
    }

	function initSettings() {
		add_settings_section('ybp_api_keys_section', null, null, 'youbica-settings-page');

		add_settings_field('ybp_public_key', 'Public Key', array($this, 'textareaHTML'), 'youbica-settings-page', 'ybp_api_keys_section', array('name'=>'ybp_public_key', 'type'=>'text'));
		register_setting('youbicaplugin','ybp_public_key', array('sanitize_callback' => 'sanitize_textarea_field', 'default' => null));

		add_settings_field('ybp_private_key', 'Private Key', array($this, 'textareaHTML'), 'youbica-settings-page', 'ybp_api_keys_section', array('name'=>'ybp_private_key', 'type'=>'password'));
		register_setting('youbicaplugin', 'ybp_private_key', array('sanitize_callback' => 'sanitize_textarea_field', 'default' => null)); 
	}

	function initScript(){
		wp_enqueue_script( 'js-youbica', plugins_url(null, YOUBICA_PLUGIN_FILE).'/assets/js/youbica.js', ['jquery', 'jquery-ui-core', 'jquery-ui-autocomplete'], null, true);

		// init user vars
		$id_user = isset($_COOKIE['id_user_youbica'])? sanitize_key($_COOKIE['id_user_youbica']) : null;
		$token_user = isset($_COOKIE['token_user_youbica'])? sanitize_textarea_field($_COOKIE['token_user_youbica']) : null;

		if (!empty($token_user)) { 
            wp_localize_script( 'js-youbica', 'user_id', array('current_user' => esc_js($id_user),'base_url' => get_site_url(), 'rest_url' => get_rest_url(), 'token' => esc_js($token_user)));
        } else {
            wp_localize_script( 'js-youbica', 'user_id', array('current_user' => 0, 'base_url' => get_site_url(), 'rest_url' => get_rest_url(), 'token' => ''));
        }
		 
		wp_enqueue_style( 'css-youbica', plugins_url(null, YOUBICA_PLUGIN_FILE) . '/assets/css/youbica.css');
		wp_enqueue_style( 'css-youbicad', plugins_url(null, YOUBICA_PLUGIN_FILE) . '/assets/css/jquery-ui.css');
	}

    function settignsLink() {
        add_options_page(
            'Youbica Settings',
            'e-youbica',
            'manage_options',
            'youbica-settings-page',
            array($this, 'settingsPageHTML')
        );
    }
    
    function settingsPageHTML() { ?>
        <div class="wrap">
            <h1>Ajustes e-youbica</h1>

			<?php if(YOUBICA_ENV !== 'live') { ?>
			<div class="notice notice-warning settings-error"> 
				<p><strong>e-youbica se encuentra actualmente en entorno <?php echo esc_html(strtoupper(YOUBICA_ENV)) ?>.</strong></p>
			</div>
			<?php } ?>

			<form action="options.php" method="POST" autocomplete="off">
			<?php
				settings_fields('youbicaplugin');
				do_settings_sections('youbica-settings-page');
				submit_button();
			?>
			</form>
        </div>
    <?php }

	function inputHTML($args) { ?>
		<input type="<?php echo esc_attr($args['type']) ?>" class="regular-text" name="<?php echo esc_attr($args['name']) ?>" value="<?php echo esc_textarea(get_option($args['name'])) ?>" autocomplete="off">
	<?php }

	function textareaHTML($args) { ?>
		<textarea class="large-text code" name="<?php echo esc_attr($args['name']) ?>" rows="6" autocomplete="off"><?php echo esc_textarea(get_option($args['name'])) ?></textarea>
	<?php }

	function LoginYoubica($user) {
		// init user vars
		$user_token_youbica = isset($_COOKIE['token_user_youbica'])? sanitize_textarea_field($_COOKIE['token_user_youbica']) : null;
		$name_user_youbica = isset($_COOKIE['name_user_youbica'])? sanitize_user($_COOKIE['name_user_youbica']) : null;
		$avatar_user_youbica = isset($_COOKIE['avatar_user_youbica'])? sanitize_url($_COOKIE['avatar_user_youbica']) : null;

		?>
		<button class="modal-toggle">Regala con e-youbica</button>
			<div class="modal_youbica"> 
				<div class="modal-wrapper modal-transition"> 
					<div class="modal-body">
						<div class="modal-header">  
						<?php if(!empty($user_token_youbica)){ ?>
							<button class="btn-logout">Cerrar sesión</button>
						<?php }  ?>   
							<button class="modal-close modal-toggle">
							<img alt="e-Youbica logo" src="<?php echo esc_url(plugin_dir_url( __DIR__ )."assets/img/close.png"); ?>" style="height: 15px;"> 
							</button> 
						</div> 
						<div class="modal-content">
							<img alt="e-Youbica logo" src="<?php echo esc_url(plugin_dir_url( __DIR__ )."assets/img/logo-color.svg"); ?>" class="logo"> 
						 
							<?php if(empty($user_token_youbica)){ ?>
							<div class="login">
								<form id="loginYoubica" method="POST">
									<div class="email">  
										<input type="email"  name="email" id="email" placeholder="Correo electrónico o usuario e-youbica"> 
									</div>
									<div class="password"> 
										<input type="password"  name="password" id="password" placeholder="Contraseña">
									</div>
									<div class="submit">
										<input type="submit" value="INGRESAR">
										<a href="https://e-youbica.com/register" target="_blank" class="btn-youbica">CREAR CUENTA</a>
										<a href="https://e-youbica.com/lost-password" target="_blank">¿Olvidaste tu contraseña?</a>
									</div>
								</form> 
							</div> 
							<?php } else { ?>
							<div class="content">
								<div class="header"> 
									<?php if(!empty($avatar_user_youbica)){
									?>
										<div class="avatar">
											<img alt="e-Youbica logo" src="<?php echo esc_url($avatar_user_youbica) ?>">
										</div>
									<?php
									} ?>
									 
									<h3>Has ingresado como: @<?php echo esc_html($name_user_youbica); ?> </h3> 
								</div>
								<p>Ya estás listo para regalar. Busca a la persona a la que deseas hacerle un regalo sopresa.</p>
								<div class="buscador">
									<div class="ui-widget"> 
										<div class="form-row"> 
											<div class="loading" id="loading1" style="float:right"></div> 
											<input id="tags" type="text" name="youbica_friend" class="input-text"> 
										</div>
									</div>
									<button class="confirm-youbica modal-toggle btn-youbica-confirm">
										CONFIRMAR
									</button> 
								</div> 
								
								<div class="invitar">
									<h3>¿La persona que buscas no está en e-youbica?</h3>
									<h4>Inivitala/o a unirse</h4>
									<input type="text" value="https://e-youbica.com/register">
									<button class="btn-youbica-copy">Copiar</button>
									<div class="clear" style="clear:both;"></div>
								</div> 
							</div>
							<?php }  ?>
						</div>
					</div> 
				</div>
			</div> 
	<?php } 

	function ybButtonRowHTML($user) {
		if(is_user_logged_in()){
			$user_token_youbica = get_the_author_meta( 'token_user_youbica', $user->ID ); 
		} else {
			//init user vars
			$user_token_youbica = isset($_COOKIE['token_user_youbica'])? sanitize_textarea_field($_COOKIE['token_user_youbica']) : null;
		}

		if(empty($user_token_youbica) ){  
		} else {  ?>
		<div class="wrap-collabsible yb-checkout-btn-row ">
			<input id="collapsible" class="toggle" type="checkbox">
			<label for="collapsible" class="lbl-toggle button alt yb-checkout-btn" style="display:block;">Regala con e-youbica</label>
			<div class="collapsible-content">
				<div class="content-inner">
				 
				</div>
			</div>
		</div>
		<hr>
		<?php }
	}

	/**
	 * Get the email addresses.
	 *
	 * @param WC_Order $order         Order instance.
	 * @param bool     $sent_to_admin If should sent to admin.
	 * @param bool     $plain_text    If is plain text email.
	 */
	public function youbica_email_addresses( $order, $sent_to_admin = false, $plain_text = false ) {

		if ( ! is_a( $order, 'WC_Order' ) ) {
			return;
		}

		if($sent_to_admin && get_post_meta($order->id, '_yuobica_gift', true )){
			$text_align = is_rtl() ? 'right' : 'left';
			$raw_address = array(
				'first_name' => get_post_meta($order->id, '_yuobica_shipping_first_name', true ),
				'last_name'  => get_post_meta($order->id, '_yuobica_shipping_last_name', true ),
				'company'    => '',
				'address_1'  => get_post_meta($order->id, '_yuobica_shipping_address_1', true ),
				'address_2'  => '',
				'city'       => get_post_meta($order->id, '_yuobica_shipping_city', true ),
				'state'      => get_post_meta($order->id, '_yuobica_shipping_state', true ),
				'postcode'   => get_post_meta($order->id, '_yuobica_shipping_postcode', true ),
				'country'    => get_post_meta($order->id, '_yuobica_shipping_country', true )
			);
			$address        = WC()->countries->get_formatted_address( $raw_address );
			$shipping_phone = get_post_meta($order->id, '_yuobica_shipping_phone', true );
			$shipping_email = get_post_meta($order->id, '_yuobica_shipping_email', true );

			if ( $plain_text ) {
				echo "\n" . esc_html( wc_strtoupper( esc_html__( 'Shipping address', 'woocommerce' ) ) ) . " e-youbica\n\n";
				echo preg_replace( '#<br\s*/?>#i', "\n", $address ) . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

				if ( $shipping_phone ) {
					echo $shipping_phone . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}

				if ( $shipping_email ) {
					echo $shipping_email . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			} else { ?>
				<table id="addresses" cellspacing="0" cellpadding="0" style="width: 100%; vertical-align: top; margin-bottom: 40px; padding:0;" border="0">
					<tr>
						<td style="text-align:<?php echo esc_attr( $text_align ); ?>; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; border:0; padding:0;" valign="top" width="50%">
							<h2><?php esc_html_e( 'Shipping address', 'woocommerce' ); ?> e-youbica</h2>
				
							<address class="address">
								<?php echo wp_kses_post( $address ? $address : esc_html__( 'N/A', 'woocommerce' ) ); ?>
								<?php if ( $shipping_phone ) : ?>
									<br/><?php echo wc_make_phone_clickable( $shipping_phone ); ?>
								<?php endif; ?>
								<?php if ( $shipping_email ) : ?>
									<br/><?php echo esc_html( $shipping_email ); ?>
								<?php endif; ?>
							</address>
							<p style="margin-top: 5px; color: red;">Recuerda proporcionar estos datos a la paquetería, no compartas esta información con el usuario de la compra.</p>
						</td>
					</tr>
				</table>
			<?php }
		}

		
	}

	public function youbica_checkout_update_order_review( $post_data_raw ) {
		parse_str($post_data_raw, $post_data);
		//die('ESTA ENTRANDO AQUI');

		if(!empty( $post_data["user_id_youbica"])) {
			// cargar direccion de envio del servidor de youbica
			$response = wp_remote_request( YOUBICA_API_URL . "/usuario/" . $post_data["user_id_youbica"],
				array(
					'method'     => 'GET',
					'headers' => array('S-Authorization' => 'Bearer ' . base64_encode(get_option( 'ybp_public_key' )), 'Yb-Plugin' => 'WC'),
				)
			);
			if(is_object($response) && (get_class($response) == WP_Error::class)) die(rest_ensure_response($response));
			$yb_address = json_decode(wp_remote_retrieve_body($response));
			
			// verificar que los codigos de pais/estado sean correctos
			$country_code = null;
			$state_code = null;

			if( !empty($yb_address->pais) ){
				$country_code = strtoupper($yb_address->pais->code);

				if( !empty($yb_address->estado) && ($states = WC()->countries->get_states($country_code)) ) {
					foreach($states as $_code => $_name) {
						if(
							strtoupper($yb_address->estado->code) == $_code ||
							$yb_address->estado->name == $_name ||
							$yb_address->estado->local_name == $_name ||
							strtoupper($yb_address->pais->code).strtoupper($yb_address->estado->code) == $_code ||
							strtoupper($yb_address->pais->code).'-'.strtoupper($yb_address->estado->code) == $_code
						) {
							$state_code = $_code;
							break;
						} elseif ( is_numeric($yb_address->estado->code) ) {
							$_num = str_pad($yb_address->estado->code, 2, '0', STR_PAD_LEFT);
							if(
								strtoupper($yb_address->pais->code).$_num == $_code ||
								strtoupper($yb_address->pais->code).'-'.$_num == $_code
							) {
								$state_code = $_code;
								break;
							}
						}
					}
				}
			}

			// si no se encontraron ponerlos ilegibles para que no se pongan por default los de facturacion
			if( is_null($country_code) ) $country_code = "N/A";
			if( is_null($state_code) ) $state_code = "N/A";
			

			// poner default shipping method
			$chosen_shipping_methods = WC()->session->get( 'chosen_shipping_methods' );
			$posted_shipping_methods = isset( $_POST['shipping_method'] ) ? wc_clean( wp_unslash( $_POST['shipping_method'] ) ) : array();

			if ( is_array( $posted_shipping_methods ) ) {
				foreach ( $posted_shipping_methods as $i => $value ) {
					$chosen_shipping_methods[ $i ] = $value;
				}
			}

			WC()->session->set( 'chosen_shipping_methods', $chosen_shipping_methods );
			WC()->session->set( 'chosen_payment_method', empty( $_POST['payment_method'] ) ? '' : wc_clean( wp_unslash( $_POST['payment_method'] ) ) );

			WC()->customer->set_props(
				array(
					'billing_country'   => isset( $_POST['country'] ) ? wc_clean( wp_unslash( $_POST['country'] ) ) : null,
					'billing_state'     => isset( $_POST['state'] ) ? wc_clean( wp_unslash( $_POST['state'] ) ) : null,
					'billing_postcode'  => isset( $_POST['postcode'] ) ? wc_clean( wp_unslash( $_POST['postcode'] ) ) : null,
					'billing_city'      => isset( $_POST['city'] ) ? wc_clean( wp_unslash( $_POST['city'] ) ) : null,
					'billing_address_1' => isset( $_POST['address'] ) ? wc_clean( wp_unslash( $_POST['address'] ) ) : null,
					'billing_address_2' => isset( $_POST['address_2'] ) ? wc_clean( wp_unslash( $_POST['address_2'] ) ) : null,
				)
			);

			// guardar custommer address con la que se carga de youbica
			WC()->customer->set_props(
				array(
					'shipping_first_name'=> isset( $yb_address->nombre ) ? wc_clean( wp_unslash( $yb_address->nombre ) ) : null,
					'shipping_last_name' => isset( $yb_address->apellido ) ? wc_clean( wp_unslash( $yb_address->apellido ) ) : null,
					'shipping_country'   => wc_clean( wp_unslash($country_code) ),
					'shipping_state'     => wc_clean( wp_unslash($state_code) ),
					'shipping_postcode'  => isset( $yb_address->codigoPostal ) ? wc_clean( wp_unslash( $yb_address->codigoPostal ) ) : null,
					'shipping_city'      => isset( $yb_address->ciudad ) ? wc_clean( wp_unslash( $yb_address->ciudad ) ) : null,
					'shipping_address_1' => isset( $yb_address->address1 ) ? wc_clean( wp_unslash( $yb_address->address1 ) ) : null,
					'shipping_address_2' => isset( $yb_address->address2 ) ? wc_clean( wp_unslash( $yb_address->address2 ) ) : null,
				)
			);

			if ( isset( $yb_address->pais_code ) &&  isset($yb_address->estado_code) ) {
				WC()->customer->set_calculated_shipping( true );
			} else {
				WC()->customer->set_calculated_shipping( false );
			}
	
			WC()->customer->save();
			// guardar una bandera para indicar que esta es una direccion auxiliar de youbica (shipping)
			//update_user_meta( WC()->customer->get_id(), '_yuobica_aux_shipping_address', true );
			WC()->session->set('_yuobica_aux_shipping_address', true);

			// Calculate shipping before totals. This will ensure any shipping methods that affect things like taxes are chosen prior to final totals being calculated. Ref: #22708.
			WC()->cart->calculate_shipping();
			WC()->cart->calculate_totals();
	
			// Get order review fragment.
			ob_start();
			woocommerce_order_review();
			$woocommerce_order_review = ob_get_clean();
	
			// Get checkout payment fragment.
			ob_start();
			woocommerce_checkout_payment();
			$woocommerce_checkout_payment = ob_get_clean();
	
			// Get messages if reload checkout is not true.
			$reload_checkout = isset( WC()->session->reload_checkout );
			if ( ! $reload_checkout ) {
				$messages = wc_print_notices( true );
			} else {
				$messages = '';
			}
	
			unset( WC()->session->refresh_totals, WC()->session->reload_checkout );
	
			wp_send_json(
				array(
					'result'    => empty( $messages ) ? 'success' : 'failure',
					'messages'  => $messages,
					'reload'    => $reload_checkout,
					'fragments' => apply_filters(
						'woocommerce_update_order_review_fragments',
						array(
							'.woocommerce-checkout-review-order-table' => $woocommerce_order_review,
							'.woocommerce-checkout-payment' => $woocommerce_checkout_payment,
						)
					),
				)
			);
			die();
		}
	}

	public function youbica_checkout_process() {
		if(!empty( $_POST["user_id_youbica"])) {
			$_POST['ship_to_different_address'] = true;
			// cargar en $_POST la direccion de envio guardada antes para que no se sobreescriba con la de el formulario
			//if( get_user_meta(WC()->customer->get_id(), '_yuobica_aux_shipping_address') ) {
			if( WC()->session->get('_yuobica_aux_shipping_address') ) {
				$shiping = WC()->customer->get_shipping();
				$_POST['shipping_first_name'] = $shiping["first_name"];
				$_POST['shipping_last_name'] = $shiping["last_name"];
				$_POST['shipping_address_1'] = $shiping["address_1"];
				$_POST['shipping_address_2'] = $shiping["address_2"];
				$_POST['shipping_city'] = $shiping["city"];
				$_POST['shipping_state'] = $shiping["state"];
				$_POST['shipping_country'] = $shiping["country"];
				$_POST['shipping_postcode'] = $shiping["postcode"];
			} else { die(json_encode(['status' => "error", 'message' => "La compra tiene id de youbica pero no se pudo soreescribir la direccion de envio"])); }
			
			//$_post['shipping_first_name'] = 
			//die(var_dump($_POST));
		}
	}

	public function youbica_checkout_order_processed($order_id){
		$was_cleared = $this->youbica_delete_aux_shipping_address();
	}

	public function youbica_before_checkout_shipping_form(WC_Checkout $checkout) {
		$was_cleared = $this->youbica_delete_aux_shipping_address();
		if($was_cleared) {
			// asegurarse que el checkout no traiga la direccion de envio
			echo "<script type='text/javascript'>
					console.log('Se va a regargar la pagina en 1 segundos...');
					setTimeout(function(){
						window.location=document.location.href; 
					}, 100);
				  </script>";
		}
	}

	public function youbica_cart_totals_before_shipping($cart) {
		$was_cleared = $this->youbica_delete_aux_shipping_address();
		if($was_cleared) {
			// asegurarse que el checkout no traiga la direccion de envio
			echo "<script type='text/javascript'>
				window.location=document.location.href;
			</script>";
			die("");
		}
	}

	private function youbica_delete_aux_shipping_address(): bool {
		// limpiar aux_shipping_address
		//if( get_user_meta(WC()->customer->get_id(), '_yuobica_aux_shipping_address') ) {
		if( isset(WC()->session) && WC()->session->get('_yuobica_aux_shipping_address') ) {
			try{
				WC()->cart->get_customer()->set_shipping_first_name(null);
				WC()->cart->get_customer()->set_shipping_last_name(null);
				WC()->cart->get_customer()->set_shipping_country(null);
				WC()->cart->get_customer()->set_shipping_state(null);
				WC()->cart->get_customer()->set_shipping_city(null);
				WC()->cart->get_customer()->set_shipping_postcode(null);
				WC()->cart->get_customer()->set_shipping_address(null);
				WC()->cart->get_customer()->set_shipping_address_1(null);
				WC()->cart->get_customer()->set_shipping_address_2(null);
				WC()->cart->get_customer()->set_shipping_company(null);
				WC()->cart->get_customer()->set_shipping_phone(null);
				WC()->cart->get_customer()->set_shipping_address_to_base();

				if(WC()->customer->get_id()) {
					update_user_meta(WC()->customer->get_id(), 'shipping_first_name', null);
					update_user_meta(WC()->customer->get_id(), 'shipping_last_name', null);
					update_user_meta(WC()->customer->get_id(), 'shipping_country', null);
					update_user_meta(WC()->customer->get_id(), 'shipping_state', null);
					update_user_meta(WC()->customer->get_id(), 'shipping_postcode', null);
					update_user_meta(WC()->customer->get_id(), 'shipping_city', null);
					update_user_meta(WC()->customer->get_id(), 'shipping_address_1', null);
					update_user_meta(WC()->customer->get_id(), 'shipping_address_2', null);
				}
				
				//delete_user_meta(WC()->customer->get_id(), '_yuobica_aux_shipping_address');
				WC()->session->set('_yuobica_aux_shipping_address', false);

				return true;
			} catch(Error $e){
				die(var_dump($e));
			}
		}
		return false;
	}

	public function youbica_ppcp_body_data_sanitize(array $data) {
		//die(json_encode($data));
		if( isset(WC()->session) && WC()->session->get('_yuobica_aux_shipping_address') ) {
			$data["application_context"]["shipping_preference"] = 'NO_SHIPPING';
		}
		return $data;
	}
}