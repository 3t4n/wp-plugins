<?php
defined( 'ABSPATH' ) or exit;

function mpwpFormsFormPage(){
	if ( mpwpFormsIsConected() ) {
		require_once( MPWP_DIR . 'includes/admin/views/new-form.php' );
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

add_action( 'admin_init', 'mpwpFormsCreateFormCallback' );
function mpwpFormsCreateFormCallback(){
	if ( !empty( $_POST ) && isset( $_POST['mpwp_new_form'] ) ){
		
		check_admin_referer( 'new_form', '_mpwp_nonce' );
		
		$form_data = stripslashes_deep( $_POST['mpwp_form'] );
		
		if ( $form_id = mpwpFormsCreateForm( $form_data ) ){
			wp_redirect( admin_url( sprintf( 'admin.php?page=mpwp_forms&id=%d', $form_id ) ) );
			exit;
		} else {
			add_settings_error(
				'mpwp_edit_form',
				'form-not-saved',
				__( 'Não foi possível criar o formulário. Por favor, tente novamente.', 'mpwp_forms' ),
				'error'
			);
		}
	}
}
?>