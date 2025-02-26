<?php
defined( 'ABSPATH' ) or exit;

function mpwpFormsFormsPage(){
	if ( mpwpFormsIsConected() ) {
		if( !empty( $_GET ) && isset( $_GET['id'] ) && !empty( $_GET['id'] ) ){
			$form = get_post( $_GET['id'] );
			if ( !( (array) $form ) ){
				require_once( MPWP_DIR . 'includes/admin/views/no-form.php' );
			} elseif ( isset( $_GET['delete'] ) ){
				require_once( MPWP_DIR . 'includes/admin/views/delete-form.php' );
			} elseif ( isset( $_GET['advanced'] ) ){
				require_once( MPWP_DIR . 'includes/admin/views/edit-form-advanced.php' );
			} else {
				require_once( MPWP_DIR . 'includes/admin/views/edit-form.php' );
			}
		} else {
			require_once( MPWP_DIR . 'includes/admin/views/my-forms.php' );
		}
	} else {
		?>
		<div class="both40"></div>
		<h3>
			<?php esc_attr_e( "Você não está conectado à sua conta @MediaPost.", 'mpwp_forms' ) ?>
			<a href="<?php echo admin_url( 'admin.php?page=mpwp_settings' ) ?>"><?php esc_attr_e( "Clique aqui para habilitar a integração.", 'mpwp_forms' ) ?></a>
		</h3>
		<?php
	}
}

add_action( 'admin_init', 'mpwpFormsUpdateFormCallback' );
function mpwpFormsUpdateFormCallback(){
	if( !empty( $_POST ) && isset( $_POST['mpwp_edit_form'] ) ){
		
		check_admin_referer( 'edit_form', '_mpwp_nonce' );
		
		$form_data = stripslashes_deep( $_POST['mpwp_form'] );
		
		$error = mpwpFormsUpdateForm( $form_data );
		
		if ( 'required_info' == $error ){
			add_settings_error(
				'mpwp_edit_form',
				'form-saved',
				__( 'Informe os campos obrigatórios. Seu formulário foi salvo como rascunho.', 'mpwp_forms' ),
				'error'
			);
		} elseif ( 'no_email' == $error ){
			add_settings_error(
				'mpwp_edit_form',
				'form-not-saved',
				__( 'Seu formulário não possui o campo e-mail. Ele foi salvo como rascunho.', 'mpwp_forms' ),
				'error'
			);
		} else {
			add_settings_error(
				'mpwp_edit_form',
				'form-saved',
				__( 'Alterações salvas com sucesso!', 'mpwp_forms' ),
				'updated'
			);
		}
	}
}

add_action( 'admin_init', 'mpwpFormsDeleteFormCallback' );
function mpwpFormsDeleteFormCallback(){
	if( !empty( $_POST ) && isset( $_POST['mpwp_delete_form'] ) ){
		
		check_admin_referer( 'delete_form', '_mpwp_nonce' );
		
		$form_data = stripslashes_deep( $_POST['mpwp_form'] );
		
		if ( wp_delete_post( $form_data['id'], true ) ){
			
			$forms = get_option( MPWP_FORMS_SLUG );
			unset( $forms[$form_data['id']] );
			update_option( MPWP_FORMS_SLUG, $forms );
			
			add_settings_error(
				'mpwp_delete_form',
				'form-deleted',
				__( 'Formulário excluído com sucesso!', 'mpwp_forms' ),
				'updated'
			);
		} else {
			add_settings_error(
				'mpwp_delete_form',
				'form-not-deleted',
				__( 'Não foi possível excluir este formulário. Por favor, tente novamente.', 'mpwp_forms' ),
				'error'
			);
		}
	}
}
?>