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
				<label><h2><?php esc_attr_e( 'Ecolha um dos modelos de formulário ou crie seu próprio em HTML, ', 'mpwp_forms' ); ?><a href="<?php echo admin_url( sprintf( 'admin.php?page=mpwp_forms&id=%d&advanced', $form->ID ) ) ?>"><?php esc_attr_e( 'clicando aqui', 'mpwp_forms' ) ?></a>  <span><?php esc_attr_e( '(obrigatório)', 'mpwp_forms' ); ?></span>:</h2></label>
				<p><?php esc_attr_e( 'Você poderá personalizar seu formulário alterando as cores e textos', 'mpwp_forms' ); ?></p>
				<?php
					if( $formModels = mpwpFormsGetFormsModels() ){
						foreach( $formModels as $id_model => $model ){ 
				?>
							<div class="models">
								<label class="mpwp_model">
									<input type="radio" class="model hidden" name="mpwp_form[model]" value="<?php echo $id_model ?>" <?php checked( $id_model, $forms[$form->ID]['model'] ) ?> />
									<img class="mpwp" src="<?php echo MPWP_URL . $model['preview'] ?>" />
									<div class="choice"><span><?php esc_attr_e( 'escolhido', 'mpwp_forms' ); ?></span></div>
								</label>
							</div>
				<?php
						}
					} else {
				?>
						<?php esc_attr_e( 'Não foi possível carregar os modelos Tente novamente.', 'mpwp_forms' ); ?>
				<?php
					}
				?>
				<div class="both"></div>
			</div>
			
			<div class="both20"></div>
			
			<div class="box white">
				<h2><?php esc_attr_e( 'Personalize seu formulário:', 'mpwp_forms' ); ?></h2>
				<p><?php esc_attr_e( 'Personalize seu formulário alterando as cores e os textos.', 'mpwp_forms' ); ?></p>
				<table class="mpwp">
					<tbody>
					<tr>
						<td colspan="2" class="text-center">
							<h4 class="title_destac"><?php esc_attr_e( 'Cores', 'mpwp_forms' ); ?></h4>
						</td>
					</tr>
					<tr>
						<td><label class="mpwp" for="mpwp_form_background_color"><?php esc_attr_e( 'Cor de fundo', 'mpwp_forms' ); ?></label></td>
						<td>
							<input type="text" maxlength="7" autocomplete="off" class="mpwp_change_apparence mpwp" id="mpwp_form_background_color" name="mpwp_form[apparence][background_color]" value="<?php echo esc_attr( $forms[$form->ID]['apparence']['background_color'] ); ?>" />
							<span class="description"><?php esc_attr_e( 'Insira o código no formato Hexadecimal. Ex.: #000000', 'mpwp_forms' ); ?></span>
						</td>
					</tr>
					<tr>
						<td><label class="mpwp" for="mpwp_form_title_color"><?php esc_attr_e( 'Cor do título', 'mpwp_forms' ); ?></label></td>
						<td>
							<input type="text" maxlength="7" autocomplete="off" class="mpwp_change_apparence mpwp" id="mpwp_form_title_color" name="mpwp_form[apparence][title_color]" value="<?php echo esc_attr( $forms[$form->ID]['apparence']['title_color'] ); ?>" />
							<span class="description"><?php esc_attr_e( 'Insira o código no formato Hexadecimal. Ex.: #000000', 'mpwp_forms' ); ?></span>
						</td>
					</tr>
					<tr>
						<td><label class="mpwp" for="mpwp_form_text_color"><?php esc_attr_e( 'Cor dos textos', 'mpwp_forms' ); ?></label></td>
						<td>
							<input type="text" maxlength="7" autocomplete="off" class="mpwp_change_apparence mpwp" id="mpwp_form_text_color" name="mpwp_form[apparence][text_color]" value="<?php echo esc_attr( $forms[$form->ID]['apparence']['text_color'] ); ?>" />
							<span class="description"><?php esc_attr_e( 'Insira o código no formato Hexadecimal. Ex.: #FFFFFF', 'mpwp_forms' ); ?></span>
						</td>
					</tr>
					<tr>
						<td><label class="mpwp" for="mpwp_form_submit_background"><?php esc_attr_e( 'Cor do botão', 'mpwp_forms' ); ?></label></td>
						<td>
							<input type="text" maxlength="7" autocomplete="off" class="mpwp_change_apparence mpwp" id="mpwp_form_submit_background" name="mpwp_form[apparence][submit_background]" value="<?php echo esc_attr( $forms[$form->ID]['apparence']['submit_background'] ); ?>" />
							<span class="description"><?php esc_attr_e( 'Insira o código no formato Hexadecimal. Ex.: #000000', 'mpwp_forms' ); ?></span>
						</td>
					</tr>
					<tr>
						<td><label class="mpwp" for="mpwp_form_submit_text_color"><?php esc_attr_e( 'Cor do texto do botão', 'mpwp_forms' ); ?></label></td>
						<td>
							<input type="text" maxlength="7" autocomplete="off" class="mpwp_change_apparence mpwp" id="mpwp_form_submit_text_color" name="mpwp_form[apparence][submit_text_color]" value="<?php echo esc_attr( $forms[$form->ID]['apparence']['submit_text_color'] ); ?>" />
							<span class="description"><?php esc_attr_e( 'Insira o código no formato Hexadecimal. Ex.: #000000', 'mpwp_forms' ); ?></span>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="text-center">
							<div class="both40"></div>
							<h4 class="title_destac"><?php esc_attr_e( 'Textos', 'mpwp_forms' ); ?></h4>
						</td>
					</tr>
					<tr>
						<td><label class="mpwp" for="mpwp_form_title"><?php esc_attr_e( 'Título', 'mpwp_forms' ); ?></label></td>
						<td>
							<input type="text" class="mpwp_change_apparence mpwp" id="mpwp_form_title" value="" />
							<span class="description"><?php esc_attr_e( 'Digite o título do formulário. Deixe vazio para removê-lo.', 'mpwp_forms' ); ?></span>
						</td>
					</tr>
					<tr>
						<td><label class="mpwp" for="mpwp_form_description"><?php esc_attr_e( 'Descrição', 'mpwp_forms' ); ?></label></td>
						<td>
							<input type="text" class="mpwp_change_apparence mpwp" id="mpwp_form_description" value="" />
							<span class="description"><?php esc_attr_e( 'Digite a descrição do formulário. Deixe vazio para removê-la.', 'mpwp_forms' ); ?></span>
						</td>
					</tr>
					<tr>
						<td><label class="mpwp" for="mpwp_form_email_type"><?php esc_attr_e( 'Tipo de e-mail', 'mpwp_forms' ); ?></label></td>
						<td>
							<input type="text" class="mpwp_change_apparence mpwp" id="mpwp_form_email_type" value="" />
							<span class="description"><?php esc_attr_e( 'Digite o tipo de e-mail que o contato receberá. Este faz parte das boas prátincas de e-mail marketing.', 'mpwp_forms' ); ?></span>
						</td>
					</tr>
					<tr>
						<td><label class="mpwp" for="mpwp_form_submit_text"><?php esc_attr_e( 'Botão', 'mpwp_forms' ); ?></label></td>
						<td>
							<input type="text" class="mpwp_change_apparence mpwp" id="mpwp_form_submit_text" name="mpwp_form[apparence][submit_text]" value="" required />
							<span class="description"><?php esc_attr_e( 'Digite o texto do botão. Não deixe em branco.', 'mpwp_forms' ); ?></span>
						</td>
					</tr>
					</tbody>
				</table>
			</div>
			
			<div class="both20"></div>
			
			<div class="box blue">
				<h2><?php esc_attr_e( 'Entende de HTML? Use o editor avançado.', 'mpwp_forms' ); ?></h2>
				<p><?php esc_attr_e( 'Você poderá adicionar novos campos, alterar a ordem dos campos e personalizar seu formulário diretamente no HTML.', 'mpwp_forms' ); ?></p>
				<div class="both20"></div>
				<a class="mpwp_button white" href="<?php echo admin_url( sprintf( 'admin.php?page=mpwp_forms&id=%d&advanced', $form->ID ) ) ?>"><?php esc_attr_e( 'Usar o editor avançado', 'mpwp_forms' ); ?></a>
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
			
			<textarea class="mpwp hidden" name="mpwp_form[content]" cols="160" rows="15" id="formFinal">
				<?php esc_html_e( $form->post_content ); ?>
			</textarea>
			
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