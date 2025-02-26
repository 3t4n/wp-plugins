<?php
defined( 'ABSPATH' ) or exit;

if ( isset ( $_POST ) && !empty( $_POST['mpwp_field_email'] ) ) {

	check_admin_referer( 'optin_' . $_POST['mpwp_form_id'], '_mpwp_nonce' );
	
	foreach ( $_POST as $key => $value ) {
		switch ( $key ) {
			case 'mpwp_field_lista':
				$arrInfo['lista'] = trim($value);
				break;
			case 'mpwp_form_id':
				$arrInfo['form_id'] = trim($value);
				break;
			default:
				$arrInfo['contato'][0][str_replace( "mpwp_field_", "", $key )] = utf8_decode(trim($value));
				break;
		}
	}
	
	$forms = get_option( MPWP_FORMS_SLUG );
	
	if ( empty( $arrInfo['contato'][0]['email'] ) OR empty( $arrInfo['lista'] ) ){
		header( "Location: " . $forms[$arrInfo['form_id']]['redir_on_error'] );
		//esc_attr_e("Cadastro não realizado. Os campos obrigatórios não foram informados.", "mpwp_forms");
		exit;
	} else {
		if ( is_email( $arrInfo['contato'][0]['email'] ) ) {
			if ( $mapi = mpwpFormsGetMapi( ) ){

				try {
					$arrResult = $mapi->put("contato/salvar", $arrInfo);
					if ( !empty( $arrResult[0]['cod'] ) ){
						header( "Location: " . $forms[$arrInfo['form_id']]['redir_on_success'] );
						//esc_attr_e("Cadastro realizado com sucesso.", "mpwp_forms");
						exit;
					} else {
						header( "Location: " . $forms[$arrInfo['form_id']]['redir_on_error'] );
						//esc_attr_e("Cadastro não realizado. Por favor, tente novamente.", "mpwp_forms");
						exit;
					}
				} catch ( MapiException $e ){
					header( "Location: " . $forms[$arrInfo['form_id']]['redir_on_error'] );
					//esc_attr_e($e->getMessage());
					exit;
				}
				
			} else {
				header( "Location: " . $forms[$arrInfo['form_id']]['redir_on_error'] );
				//esc_attr_e("Ocorreu um erro. Por favor, tente novamente.", "mpwp_forms");
				exit;
			}
		} else {
			header( "Location: " . $forms[$arrInfo['form_id']]['redir_on_error'] );
			//esc_attr_e($arrInfo['contato'][0]['email'] . " não é um e-mail válido.", "mpwp_forms");
			exit;
		}
	}
}
?>