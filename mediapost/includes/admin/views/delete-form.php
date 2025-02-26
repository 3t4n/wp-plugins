<?php defined( 'ABSPATH' ) or exit; ?>
<div class="wrap">
	<h1><?php esc_attr_e( 'Excluir formulário de cadastro', 'mpwp_forms' ); ?></h1>
	<?php settings_errors(); ?>
	<div class="both20"></div>
	<div class="one">
		<div class="box white">
			<form method="post">
				<label class="mpwp" for="nome"><?php esc_attr_e( 'Deseja excluir o formulário abaixo?', 'mpwp_forms' ); ?></label>
				
				<input type="hidden" name="mpwp_form[id]" value="<?php echo esc_attr( $form->ID ) ?>" />
				<input type="text" class="mpwp" name="mpwp_form[title]" id="nome" autocomplete="off" value="<?php echo esc_attr( $form->post_title ) ?>" placeholder="<?php esc_attr_e( 'Nome do formulário', 'mpwp_forms' ); ?>" required readonly />
				
				<span class="description"><?php esc_attr_e( 'ATENÇÃO: Esta operação não poderá ser desfeita.', 'mpwp_forms' ); ?></span>
				<div class="both20"></div>
				<?php wp_nonce_field( 'delete_form', '_mpwp_nonce' ); ?>
				<a href="javascript:history.go(-1);" class="mpwp_button white"><?php esc_attr_e( 'Voltar', 'mpwp_forms' ); ?></a> 
				<input type="submit" name="mpwp_delete_form" class="mpwp_button blue" value="<?php esc_attr_e( 'Excluir formulário' ); ?>" />
			</form>
		</div>
	</div>
</div>