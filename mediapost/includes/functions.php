<?php
defined( 'ABSPATH' ) or exit;

/**
 * Função que busca os modelos de templates via Ajax
 *
 * @param
 *
 * @return (stryng) $error
 */
add_action( 'wp_ajax_mpwp_forms_load_forms_models', 'mpwpFormsGetFormsModelsAjax' );
function mpwpFormsGetFormsModelsAjax() {
	global $wpdb;

	$formModels = json_encode( mpwpFormsGetFormsModels() );

	echo $formModels;
	
	wp_die();
}

/**
 * Função que cria uma lista de contatos na conta @MediaPost via Ajax
 *
 * @param
 *
 * @return (stryng) $error
 */
add_action( 'wp_ajax_mpwp_forms_add_new_list', 'mpwpFormsAddNewList' );
function mpwpFormsAddNewList() {
	global $wpdb;
	
	$error = '';
	$arrLista['nome'] = utf8_decode( $_POST['name'] );
	if ( $mapi = mpwpFormsGetMapi( ) ){

		try {
			$arrResult = $mapi->post("lista/salvar", $arrLista);
			mpwpFormsUpdateMPWPLists();
			$error = '0';
		} catch ( MapiException $e ){
			$error = $e->getMessage();
		}
		
	} else {
		$error = '1';
	}
	echo $error;
	
	wp_die();
}

/**
 * Função que busca as listas na conta @MediaPost e atualiza no banco de dados do Wordpress via Ajax
 *
 * @param
 *
 * @return (stryng) $error
 */
add_action( 'wp_ajax_mpwp_forms_update_lists', 'mpwpFormsUpdateLists' );
function mpwpFormsUpdateLists() {
	global $wpdb;
	
	return mpwpFormsUpdateMPWPLists();
	
	wp_die();
}

/**
 * Função que busca as configurações da integração
 *
 * @param (array) $new_settings
 *
 * @return (boolean) true or false
 */
function mpwpFormsGetSettings(){
	$settings = get_option( MPWP_SETTINGS_SLUG );
	return $settings;
}

/**
 * Função que garava as configurações da integração
 *
 * @param (array) $new_settings
 *
 * @return (boolean) true or false
 */
function mpwpFormsUpdateSettings( $new_settings ){
	
	if ( update_option( MPWP_SETTINGS_SLUG, mpwpFormsSanitize( $new_settings ) ) ){
		mpwpFormsUpdateMPWPLists();
		mpwpFormsUpdateMPWPFields();
		return true;
	} else {
		$old_settings = get_option( MPWP_SETTINGS_SLUG );
		if( $old_settings == $new_settings ) {
			mpwpFormsUpdateMPWPLists();
			mpwpFormsUpdateMPWPFields();
			return true;
		}
	}
	return false;
	
}

/**
 * Função que verificar se está conectado à conta @MediaPost
 *
 * @param
 *
 * @return (boolean) true or false
 */
function mpwpFormsIsConected(){
	$settings = get_option( MPWP_SETTINGS_SLUG );
	
	if ( mpwpFormsUpdateMPWPFields() ){
		$settings['status'] = 1;
		mpwpFormsUpdateSettings( $settings );
		return true;
	}
	$settings['status'] = 0;
	mpwpFormsUpdateSettings( $settings );
	return false;
}

/**
 * Função que cria e retorna uma instância da integração com a conta @MediaPost através das chaves de API
 *
 * @param
 *
 * @return API_Instance
 */
function mpwpFormsGetMapi() {
	$settings = mpwpFormsGetSettings();
	if ( !empty( $settings['consumer-key'] ) && !empty( $settings['consumer-secret'] ) && !empty( $settings['token'] ) && !empty( $settings['token-secret'] ) ) {
		$instance = new MapiClient( 
			$settings['consumer-key'],
			$settings['consumer-secret'],
			$settings['token'],
			$settings['token-secret']
		);
		return $instance;
	}
}

/**
 * Função que busca as listas salvas no Wordpress
 *
 * @param
 *
 * @return (array)
 */
function mpwpFormsGetLists(){
	return get_option( MPWP_LISTS_SLUG );
}

/**
 * Função que busca as listas da ferramenta @MediaPost e atualiza no Wordpress
 *
 * @param
 *
 * @return (boolean) true or false
 */
function mpwpFormsUpdateMPWPLists( ){
	
	if ( $mapi = mpwpFormsGetMapi() ){
		try {
			$mpLists = $mapi->get("lista/all");
			
			if( !empty($mpLists) ){
				update_option( MPWP_LISTS_SLUG, mpwpFormsSanitize( $mpLists ) );
				return true;
			}else{
				return false;
			}
		} catch (MapiException $e){
			if ( (!empty($result['error']['code'])) && ($result['error']['code'] == 123) ) {
				delete_option( MPWP_LISTS_SLUG );
			} else {
				return false;
			}
		}
	}else{
		return false;
	}
	
}

/**
 * Função que busca os campos (inputs) salvos no Wordpress
 *
 * @param
 *
 * @return (array)
 */
function mpwpFormsGetMPWPFields(){
	
	return get_option( MPWP_FIELDS_SLUG );
	
}

/**
 * Função que define o HTML (input) de cada campo
 *
 * @params (stryng)
 *
 * @return (stryng) $html
 */
function mpwpFormsGetFieldType($name, $label){
	
	$email  = '<input type="email" name="mpwp_field_' . $name . '" value="" placeholder="' . $label . '">';
	$tel    = '<input type="tel" name="mpwp_field_' . $name . '" value="" placeholder="' . $label . '">';
	$data   = '<input type="date" name="mpwp_field_' . $name . '" value="" placeholder="' . $label . '">';
	$text   = '<input type="text" name="mpwp_field_' . $name . '" value="" placeholder="' . $label . '">';
	$sexo   = 'Sexo <label><input type="radio" name="mpwp_field_' . $name . '" value="F"> Feminino</label> <label><input type="radio" name="mpwp_field_' . $name . '" value="M"> Masculino</label>';
	
	switch ($name) {
		case 'email':
			return $email;
			break;
		case 'sexo':
			return $sexo;
			break;
		case 'telefone':
		case 'celular':
			return $tel;
			break;
		case 'data_nascimento':
			return $data;
			break;
		default:
			return $text;
	}
}

/**
 * Função que sincroniza os campos (inputs) da ferramenta @MediaPost com o Wordpress
 *
 * @param
 *
 * @return (boolean) true or false
 */
function mpwpFormsUpdateMPWPFields( ){
	if ( $mapi = mpwpFormsGetMapi() ){
		try {
			$mpFields = $mapi->get("contato/campos");
			
			if( !empty($mpFields) ){
				foreach( $mpFields as $field => $value ){
					$mpwp_fields[$field]['status'] 		= mpwpFormsSanitize( ($field == 'email') ? 1 : 0 );
					$mpwp_fields[$field]['label'] 		= mpwpFormsSanitize( $value );
					$mpwp_fields[$field]['placeholder'] = mpwpFormsSanitize( $value );
					$mpwp_fields[$field]['input'] 		= mpwpFormsGetFieldType( $field, $value );
				}
				update_option( MPWP_FIELDS_SLUG, $mpwp_fields );
				return true;
			}else{
				return false;
			}
		} catch (MapiException $e){
			return false;
		}
	}else{
		return false;
	}	
}

/**
 * Função que salva as informações do um novo formulário nas opções do Wordpress
 *
 * @param (array) $form_data
 *
 * @return (int) $form_id or (boolean) false
 */
function mpwpFormsCreateForm( $form_data ){
	
	if( !empty( $form_data ) ){
		
		$form = array(
			'post_type' 	=> MPWP_POST_TYPE,
			'post_title' 	=> mpwpFormsSanitize( $form_data['title'] ),
			'post_status' 	=> 'draft',
			'post_content' 	=> include( MPWP_DIR . 'includes/admin/views/models/default.php' )
		);
		
		if( $form_id = wp_insert_post( $form ) ){
			
			$forms = get_option( MPWP_FORMS_SLUG );
			
			$forms[$form_id] = array(
				'title'   	=>  $form_data['title'],
				'lista' 	=> 0,
				'shortcode' => '[mpwp_form id="' . $form_id . '"]',
				'fields'   	=> array(
					'email' => array(
						'name' 	   => 'E-mail',
						'status'   => 1,
						'required' => 1
					)
				),
				'redir_on_success'  => false,
				'redir_on_error'  	=> false,
				'model'   	=> '',
				'apparence' => array(
					'background_color'  => '#FFFFFF',
					'text_color'		=> '#000000',
					'title_color'  		=> '#000000',
					'submit_text_color'	=> '#FFFFFF',
					'submit_background'	=> '#000000'
				)
			);
			
			update_option( MPWP_FORMS_SLUG, mpwpFormsSanitize( $forms ) );
			return $form_id;
			
		}
		
	}
	return false;
	
}

/**
 * Função que atualiza as informações do formulário nas opções do Wordpress
 *
 * @param (array) $form_data
 *
 * @return (string) $error
 */
function mpwpFormsUpdateForm( $form_data ){
	
	$error = '';
	if( !empty( $form_data ) ){
		
		if ( empty( $form_data['lista'] ) OR empty( $form_data['redir_on_success'] ) OR empty( $form_data['redir_on_error'] ) ){
			$post_status = 'draft';
			$error = "required_info";
		}else{
			$has_email = strpos($form_data['content'], 'name="mpwp_field_email"');
			if ( false === $has_email ){
				$post_status = 'draft';
				$error = "no_email";
			} else {
				$post_status = 'publish';
			}
		}
		
		$form = array(
			'ID' 			=> $form_data['id'],
			'post_status' 	=> $post_status,
			'post_title' 	=> mpwpFormsSanitize( $form_data['title'] ),
			'post_content' 	=> $form_data['content']
		);
		
		if( wp_update_post( $form ) ){
			
			$forms = get_option( MPWP_FORMS_SLUG );
			
			$forms[$form_data['id']] = array(
				'title'   			=> $form_data['title'],
				'lista' 			=> $form_data['lista'],
				'shortcode' 		=> '[mpwp_form id="' . $form_data['id'] . '"]',
				'fields'   			=> ( !empty($form_data['fields']) ) ? $form_data['fields'] : '',
				'model'   			=> ( !empty($form_data['model']) ) ? $form_data['model'] : '',
				'redir_on_success'  => ( !empty($form_data['redir_on_success']) ) ? $form_data['redir_on_success'] : false,
				'redir_on_error'  	=> ( !empty($form_data['redir_on_error']) ) ? $form_data['redir_on_error'] : false,
				'apparence' => array(
					'background_color'  => ( !empty($form_data['apparence']['background_color']) ) ? $form_data['apparence']['background_color'] : '',
					'text_color'		=> ( !empty($form_data['apparence']['text_color']) ) ? $form_data['apparence']['text_color'] : '',
					'title_color'  		=> ( !empty($form_data['apparence']['title_color']) ) ? $form_data['apparence']['title_color'] : '',
					'submit_text_color'	=> ( !empty($form_data['apparence']['submit_text_color']) ) ? $form_data['apparence']['submit_text_color'] : '',
					'submit_background'	=> ( !empty($form_data['apparence']['submit_background']) ) ? $form_data['apparence']['submit_background'] : ''
				)
			);
			
			update_option( MPWP_FORMS_SLUG, mpwpFormsSanitize( $forms ) );

		}
		return $error;
	}
}

/**
 * Função que retorna os modelos de formulário
 *
 * @param
 *
 * @return (array)
 */
function mpwpFormsGetFormsModels(){
	return include( MPWP_DIR . 'includes/admin/views/models/forms.php' );
}

/**
 * Função que monta a retorna o HTML do formulário
 *
 * @param (int) $form_id
 *
 * @return (stryng) $form_html
 */
function mpwpFormsGetFormHTML( $form_id ){
	
	$form  = get_post( $form_id );
	$forms = get_option( MPWP_FORMS_SLUG );
	
	$form_html  = '<form action="" method="post">';
	$form_html .= '<input type="hidden" name="mpwp_form_id" value="' . $form_id . '" />';
	$form_html .= '<input type="hidden" name="mpwp_field_lista" value="' . $forms[$form_id]['lista'] . '" />';
	$form_html .= '<div class"mpwp_form_' . $form_id . '">';
	$form_html .= $form->post_content;
	$form_html .= '</div>';
	$form_html .=  wp_nonce_field( 'optin_' . $form_id, '_mpwp_nonce' );
	$form_html .= '</form>';
	
	return $form_html;
}

/**
 * Sanitiza os valores das variáveis
 *
 * @param mixed $value
 *
 * @return mixed
 */
function mpwpFormsSanitize( $value ) {

	if ( is_scalar( $value ) ) {
		$value = sanitize_text_field( $value );
	} elseif( is_array( $value ) ) {
		$value = array_map( 'mpwpFormsSanitize', $value );
	} elseif ( is_object( $value ) ) {
		$vars = get_object_vars( $value );
		foreach ( $vars as $key => $data ) {
			$value->{$key} = mpwpFormsSanitize( $data );
		}
	}

	return $value;
}
?>