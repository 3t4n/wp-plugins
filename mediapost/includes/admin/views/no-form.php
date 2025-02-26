<?php defined( 'ABSPATH' ) or exit; ?>
<div class="wrap">
	<h1><?php esc_attr_e( 'Formulário de cadastro', 'mpwp_forms' ); ?></h1>
	<?php settings_errors(); ?>
	<div class="both20"></div>
	<div class="one">
		<?php
		if ( isset( $_GET['delete'] ) ){
			?>
			<h3><?php esc_attr_e( 'Feito. O formulário ' . $_GET['id'] . ' não existe mais!', 'mpwp_forms' ); ?></h3>
			<?php
		} else {
			if ( empty ( $_GET['id'] ) ){
				?>
				<h3><?php esc_attr_e( 'Nenhum formulário encontrado com as informações fornecidas. Talvez ele tenha sido excluído!', 'mpwp_forms' );  ?></h3>
				<?php
			} else {
				?>
				<h3><?php esc_attr_e( 'Nenhum formulário encontrado com o ID ' . $_GET['id'] . '. Talvez ele tenha sido excluído!', 'mpwp_forms' );  ?></h3>
				<?php
			}
		}
		?>
		<div class="both20"></div>
		<a class="mpwp_button white" href="<?php echo admin_url( 'admin.php?page=mpwp_forms' ) ?>" title="<?php esc_attr_e( 'Meus formulário', 'mpwp_forms' ); ?>"><?php esc_attr_e( 'Formulários', 'mpwp_forms' ); ?></a> 
		<a class="mpwp_button blue" href="<?php echo admin_url( 'admin.php?page=mpwp_form' ) ?>" title="<?php esc_attr_e( 'Criar novo formulário', 'mpwp_forms' ); ?>"><?php esc_attr_e( 'Novo formulário', 'mpwp_forms' ); ?></a>
	</div>
</div>