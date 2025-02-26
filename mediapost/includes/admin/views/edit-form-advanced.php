<?php defined( 'ABSPATH' ) or exit; ?>
<div class="wrap">
	<h1><?php esc_attr_e( 'Editar formulário de cadastro', 'mpwp_forms' ); ?></h1>
	<?php
		settings_errors();
		add_thickbox();
	?>
	<div class="both20"></div>
	<form method="post" id="mpwp_form_info" novalidate>
		<div class="two_third">
			<?php $forms = get_option( MPWP_FORMS_SLUG ); ?>
			<input name="mpwp_form[id]" type="hidden" value="<?php echo esc_attr($form->ID) ?>" />
			
			<label class="mpwp" for="nome"><?php esc_attr_e( 'Digite o nome do formulário:', 'mpwp_forms' ); ?></label>
			<input class="mpwp" name="mpwp_form[title]" type="text" size="30" id="nome" spellcheck="true" autocomplete="off" value="<?php echo esc_attr($form->post_title) ?>" placeholder="<?php esc_attr_e( 'Ex.: Formulário do rodapé', 'mpwp_forms' ); ?>" required />
			
			<div class="both40"></div>
			
			<div class="box white">
				<div class="one_half">
					<label for="mpwp_list"><h2><?php esc_attr_e( 'Lista de cadastro', 'mpwp_forms' ); ?>  <span><?php esc_attr_e( '(obrigatório)', 'mpwp_forms' ); ?></span>:</h2></label>
				</div>
				<div class="one_half last text-right">
					<?php require_once( MPWP_DIR . 'includes/admin/views/update-lists.php' ); ?> | 
					<?php require_once( MPWP_DIR . 'includes/admin/views/new-list.php' ); ?>
				</div>
				<?php
					if( $mpLists = mpwpFormsGetLists() ){
						?>
							<select class="mpwp" name="mpwp_form[lista]" id="mpwp_list" required>
								<option value=""><?php esc_attr_e( 'Selecione uma lista', 'mpwp_forms' ); ?></option>
							<?php foreach( $mpLists as $list ){ ?>
								<option value="<?php echo esc_attr( $list['cod'] ); ?>" <?php selected( $forms[$form->ID]['lista'], $list['cod'] ); ?>><?php echo esc_attr( $list['cod'] ); ?> - <?php echo esc_attr( $list['nome'] ); ?></option>
							<?php } ?>
							</select>
							<span class="description"><?php esc_attr_e( 'Selecione em qual lista os cadastros deste formulário devem ser adicionados.', 'mpwp_forms' ); ?></span>
						<?php
					} else {
						?>
						<div class="both10"></div>
						<?php esc_attr_e( 'Nenhuma lista de contatos encontrada em sua conta.', 'mpwp_forms' ); ?> <a href="#TB_inline?width=500&height=400&inlineId=mpwp_new_list" class="thickbox"><?php esc_attr_e( 'Criar lista agora', 'mpwp_forms' ); ?></a>.
						<?php
					}
				?>
			</div>
			
			<div class="both20"></div>
			
			<div class="box white">
				<label><h2><?php esc_attr_e( 'Redirecionamentos após cadastro', 'mpwp_forms' ); ?>  <span><?php esc_attr_e( '(obrigatório)', 'mpwp_forms' ); ?></span>:</h2></label>
				<p><?php esc_attr_e( 'Escoha para quais páginas o usuário deve ser redirecionado após o cadastro.', 'mpwp_forms' ); ?></p>
				
				<?php
					if( $pages = get_pages( array('sort_order' => 'asc', 'sort_column' => 'post_title', 'post_type' => 'page', 'post_status' => 'publish' ) ) ){
						?>
							<label class="mpwp" for="redir_on_success"><?php esc_attr_e( 'Agradecimento', 'mpwp_forms' ); ?>  <span><?php esc_attr_e( '(obrigatório)', 'mpwp_forms' ); ?></span>:</label>
							<select class="mpwp" name="mpwp_form[redir_on_success]" id="redir_on_success" required>
								<option value=""><?php esc_attr_e( 'Selecione uma página de agradecimento', 'mpwp_forms' ); ?></option>
							<?php foreach ( $pages as $page ) { ?>
								<option value="<?php echo esc_attr( $page->guid ); ?>" <?php selected( $forms[$form->ID]['redir_on_success'], $page->guid ); ?>><?php echo esc_attr( $page->post_title ); ?></option>
							<?php } ?>
							</select>
							<span class="description"><?php esc_attr_e( 'O usuário será direcionado para esta página quando o cadastro for realizado com sucesso.', 'mpwp_forms' ); ?></span>
							
							<div class="both20"></div>
							
							<label class="mpwp" for="redir_on_error"><?php esc_attr_e( 'Erro no cadastro', 'mpwp_forms' ); ?>  <span><?php esc_attr_e( '(obrigatório)', 'mpwp_forms' ); ?></span>:</label>
							<select class="mpwp" name="mpwp_form[redir_on_error]" id="redir_on_error" required>
								<option value=""><?php esc_attr_e( 'Selecione uma página de erro', 'mpwp_forms' ); ?></option>
							<?php foreach ( $pages as $page ) { ?>
								<option value="<?php echo esc_attr( $page->guid ); ?>" <?php selected( $forms[$form->ID]['redir_on_error'], $page->guid ); ?>><?php echo esc_attr( $page->post_title ); ?></option>
							<?php } ?>
							</select>
							<span class="description"><?php esc_attr_e( 'O usuário será direcionado para esta página quando ocorrer algum erro.', 'mpwp_forms' ); ?></span>
						<?php
					}else{
						esc_attr_e( 'Nenhuma página encontrada.', 'mpwp_forms' ); 
						?>
						<a href="<?php echo admin_url( 'post-new.php?post_type=page' ) ?>"><?php esc_attr_e( 'Crie uma página', 'mpwp_forms' ); ?>.</a>
						<?php
					}
				?>
			</div>
			
			<div class="both20"></div>
			
			<div class="box white">
				<label><h2><?php esc_attr_e( 'Crie seu formulário em HTML ou volte para o editor simples, ', 'mpwp_forms' ); ?><a href="<?php echo admin_url( sprintf( 'admin.php?page=mpwp_forms&id=%d', $form->ID ) ) ?>"><?php esc_attr_e( 'clicando aqui.', 'mpwp_forms' ) ?></a>  <span><?php esc_attr_e( '(obrigatório)', 'mpwp_forms' ); ?></span>:</h2></label>
				<p><?php esc_attr_e( 'Personalize seu formulário da forma que desejar, mas não altere a proriedade "name" dos campos.', 'mpwp_forms' ); ?></p>
				<div class="both20"></div>
				
				<?php require_once( MPWP_DIR . 'includes/admin/views/add-new-field.php' ); ?>

				<div class="both30"></div>
				<textarea class="mpwp" name="mpwp_form[content]" cols="160" rows="15" id="form_content">
					<?php esc_html_e( $form->post_content ); ?>
				</textarea>
				<div class="both"></div>
			</div>
			
			<div class="both20"></div>
			
			<div class="box blue">
				<h2><?php esc_attr_e( 'Código não é a sua praia? Volte para o editor simples.', 'mpwp_forms' ); ?></h2>
				<p><?php esc_attr_e( 'Volte para o editor simples e personalize seu formulário sem precisar entender de códigos HTML.', 'mpwp_forms' ); ?></p>
				<div class="both20"></div>
				<a class="mpwp_button white" href="<?php echo admin_url( sprintf( 'admin.php?page=mpwp_forms&id=%d', $form->ID ) ) ?>"><?php esc_attr_e( 'Voltar para editor simples', 'mpwp_forms' ); ?></a>
			</div>
		</div>
		<div class="one_third last">
			<div class="both30"></div>
			<div class="box white">
				<h2><?php esc_attr_e( 'Salvar formulário', 'mpwp_forms' ); ?></h2>
				<p><?php esc_attr_e( 'Atualizado em: ' . date("d/m/Y H:m", strtotime($form->post_modified)), 'mpwp_forms' ) ?></p>
				<p>
					<?php 
					if ( 'draft' == $form->post_status ){
						esc_attr_e( 'Rascunho', 'mpwp_forms' );
					}else{
						?>
						<table class="mpwp">
							<tr>
								<td><label class="mpwp" for="mpwp_shortcode"><?php esc_attr_e( 'Shortcode:', 'mpwp_forms' ); ?></label></td>
								<td><input class="mpwp selectContent" id="mpwp_shortcode" type="text" value='<?php echo esc_attr( $forms[$form->ID]['shortcode'] ) ?>' readonly /></td>
							</tr>
							<tr>
								<td colspan="2" class="text-right">
									<?php require_once( MPWP_DIR . 'includes/admin/views/help/what-is-shortcode.php' ); ?>
								</td>
							</tr>
						</table>
						<?php
					}
					 ?>
				</p>
				
				<div class="both30"></div>
				
				<div class="one_half">
					<?php wp_nonce_field( 'edit_form', '_mpwp_nonce' ); ?>
					<input type='submit' name='mpwp_edit_form' class="mpwp_button blue" value='<?php esc_attr_e( 'Salvar alterações', 'mpwp_forms' ); ?>' />
				</div>
				<div class="one_half last text-right">
					<div class="both10"></div>
					<a class="mpwp_button white" href="<?php echo admin_url( sprintf( 'admin.php?page=mpwp_forms&id=%d&delete', $form->ID ) ) ?>"><?php esc_attr_e( 'excluir', 'mpwp_forms' ); ?></a>
				</div>
				<div class="both"></div>
			</div>
			
			<div class="both20"></div>
			<div class="sticky">
				<div class="box white">
					<h2><?php esc_attr_e( 'Prévia do formulário', 'mpwp_forms' ); ?></h2>
					<p><?php esc_attr_e( 'IMPORTANTE: Quando publicado, o formulário pode ficar diferente do exibido abaixo por causa do CSS de seu tema.', 'mpwp_forms' ) ?></p>
					<div class="mpwp_form_<?php echo esc_attr( $form->ID ) ?>" id="formPreview">
						<?php echo $form->post_content ?>
					</div>
				</div>
				<?php require_once( MPWP_DIR . 'includes/admin/views/help/how-to-use.php' ); ?>
			</div>
		</div>
	</form>
</div>