<?php defined( 'ABSPATH' ) or exit; ?>
<div class="wrap">
	<h1><?php esc_attr_e( 'Criar formulário de cadastro', 'mpwp_forms' ); ?></h1>
	<?php settings_errors(); ?>
	<div class="both20"></div>
	<div class="one">
		<div class="box white">
			<form method="post">
				<label class="mpwp" for="nome"><?php esc_attr_e( 'Dê um nome para seu formulário', 'mpwp_forms' ); ?> <span><?php esc_attr_e( '(obrigatório)', 'mpwp_forms' ); ?></span>:</label>
				<input type="text" class="mpwp" name="mpwp_form[title]" id="nome" autocomplete="off" value="" placeholder="<?php esc_attr_e( 'Ex.: Formulário do rodapé', 'mpwp_forms' ); ?>" required />
				<span class="description"><?php esc_attr_e( 'Este nome será exibido apenas para você.', 'mpwp_forms' ); ?></span>
				<div class="both20"></div>
				<?php wp_nonce_field( 'new_form', '_mpwp_nonce' ); ?>
				<a href="javascript:history.go(-1);" class="mpwp_button white"><?php esc_attr_e( 'Voltar', 'mpwp_forms' ); ?></a> 
				<input type="submit" name="mpwp_new_form" class="mpwp_button blue" value="<?php esc_attr_e( 'Criar formulário', 'mpwp_forms' ); ?>" />
			</form>
		</div>
	</div>
</div>