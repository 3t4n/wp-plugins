<?php defined( 'ABSPATH' ) or exit; ?>
<div class="wrap">
	<h1><?php esc_attr_e( 'Formulários de cadastro', 'mpwp_forms' ); ?></h1>
	<?php settings_errors(); ?>
	<div class="both20"></div>
	<div class="one">
		<?php
			$forms = get_posts(
				array(
					'posts_per_page' => '1000',
					'post_type' 	 => MPWP_POST_TYPE,
					'post_status' 	 => array(
						'publish', 'draft'
					)
				)
			);
			if( !empty($forms) ){
		?>
				<table class="mpwp personalized">
				<thead>
					<tr>
						<th><?php esc_attr_e( 'ID', 'mpwp_forms' ); ?></th>
						<th><?php esc_attr_e( 'Nome', 'mpwp_forms' ); ?></th>
						<th><?php esc_attr_e( 'Modificado em', 'mpwp_forms' ); ?></th>
						<th><?php esc_attr_e( 'Ação', 'mpwp_forms' ); ?></th>
					</tr>
				</thead>
				<tbody>
				<?php
					foreach( $forms as &$form){
						if ( "draft" == $form->post_status ){
							$draft = " (" . __('Rascunho', 'mpwp_forms') . ")";
						} else {
							$draft = '';
						}
					?>
						<tr>
							<td><?php echo esc_attr( $form->ID ); ?></td>
							<td><?php echo esc_attr( $form->post_title . $draft ); ?></td>
							<td><?php echo esc_attr( date("d/m/Y H:m", strtotime($form->post_modified)) ) ?></td>
							<td>
								<a href="<?php echo admin_url( sprintf( 'admin.php?page=mpwp_forms&id=%d', $form->ID ) ) ?>"><?php esc_attr_e( 'editar', 'mpwp_forms' ); ?></a> | 
								<a href="<?php echo admin_url( sprintf( 'admin.php?page=mpwp_forms&id=%d&delete', $form->ID ) ) ?>"><?php esc_attr_e( 'exluir', 'mpwp_forms' ); ?></a>
							</td>
						</tr>
					<?php
					}
				?>
				</tbody>
				</table>
		<?php
			} else {
				?>
				<h3>
					<?php esc_attr_e( "Você ainda não tem formulários.", 'mpwp_forms' ) ?>
					<a href="<?php echo admin_url( 'admin.php?page=mpwp_form' ) ?>"><?php esc_attr_e( "Clique aqui para criar o primeiro.", 'mpwp_forms' ) ?></a>
				</h3>
				<?php
			}
		?>
	</div>
</div>