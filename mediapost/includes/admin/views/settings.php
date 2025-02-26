<?php defined( 'ABSPATH' ) or exit; ?>
<div class="wrap">
	<h1><?php esc_attr_e( '@MediaPost - Formulário de cadastro', 'mpwp_forms' ); ?></h1>
	<?php settings_errors(); ?>
	<p class="descrition"><?php esc_attr_e( 'Crie e integre formulários de cadastro de seu site com sua conta @MediaPost', 'mpwp_forms' ); ?></p>
	<div class="both20"></div>
	<div class="one">
	<?php
	$opt = get_option( MPWP_SETTINGS_SLUG );
	if( !isset( $opt['status'] ) OR 1 != $opt['status'] ){
	?>
		<div class="box white">
			<h2><?php esc_attr_e( 'Solicite as chaves de acesso abrindo um chamado em sua conta @MediaPost abaixo:', 'mpwp_forms' ); ?></h2>
			<div class="both20"></div>
			
			<form name="lgn" id="login" action="https://painel.mediapost.com.br/login_ip.php" method="post" target="_blank">
				<input type="hidden" name="id_pagina_inicial" value="10" />
				<div class="one_third">
					<input type="text" class="mpwp" name="NomeMp" id="NomeMp" value="" placeholder="<?php esc_attr_e( 'Sua conta', 'mpwp_forms' ); ?>" required />
				</div>
				<div class="one_third">
					<input type="text" class="mpwp" name="username" value="" placeholder="<?php esc_attr_e( 'Seu usuário', 'mpwp_forms' ); ?>" required />
				</div>
				<div class="one_third last">
					<input type="password" class="mpwp" name="password" value="" placeholder="<?php esc_attr_e( 'Sua senha', 'mpwp_forms' ); ?>" required />
				</div>
				<div class="both20"></div>
				<input type="submit" class="mpwp_button blue" id="acessarMP" value="<?php esc_attr_e( 'Acessar conta', 'mpwp_forms' ); ?>" />
			</form>
			
			<p><span class="descrition"><?php esc_attr_e( 'As chaves são geradas pela equipe de suporte de segunda a sexta-feira (dias úteis) das 08 às 20 horas.', 'mpwp_forms' ); ?></span></p>
		</div>
		<div class="both20"></div>
	<?php
		add_action( 'admin_footer', 'mpwpFormsSettingsPageScripts' );
		function mpwpFormsSettingsPageScripts() {
		?>
			<script>
			document.getElementById('acessarMP').addEventListener('click', function(e) {
				document.getElementById('login').action = 'https://' + encodeURIComponent(document.getElementById('NomeMp').value) + '.mediapost.com.br/login_ip.php';
			}, false);
			</script>
		<?php
		}
	}
	?>
		
		<div class="box white">
			<h2><?php esc_attr_e( 'Insira as chaves de integração:', 'mpwp_forms' ); ?></h2>
			<div class="both20"></div>
			<form method="post">
				<?php 
					if( isset( $opt['status'] ) ){
						if( 1 == $opt['status'] ){
							$status_style = 'success';
							$status_text  = __( 'Conectado', 'mpwp_forms' );
						}else{
							$status_style = 'warning';
							$status_text  = __( 'Não conectado', 'mpwp_forms' );
						}
					}else{
						$status_style = 'default';
						$status_text  = __( 'Aguardando chaves', 'mpwp_forms' );
					}	
				?>
				<table class="mpwp">
					<tbody>
					<tr>
						<td><label class="mpwp"><?php esc_attr_e( 'Status', 'mpwp_forms' ); ?></label></td>
						<td>
							<span class="label label-<?php echo esc_attr( $status_style ) ?>"><?php echo esc_attr( $status_text ) ?></span>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<div class="both20"></div>
						</td>
					</tr>
					<tr>
						<td><label class="mpwp" for="consumer-key"><?php esc_attr_e( 'Consumer key', 'mpwp_forms' ); ?></label></td>
						<td>
							<input type="text" class="mpwp" name="mpwp_settings[consumer-key]" id="consumer-key" palceholder="<?php echo esc_attr( 'Consumer key' ) ?>" required value="<?php echo esc_attr( isset( $opt['consumer-key'] ) ? $opt['consumer-key'] : '' ) ?>" />
						</td>
					</tr>
					<tr>
						<td><label class="mpwp" for="consumer-secret"><?php esc_attr_e( 'Consumer secret', 'mpwp_forms' ); ?></label></td>
						<td>
							<input type="text" class="mpwp" name="mpwp_settings[consumer-secret]" id="consumer-secret" palceholder="<?php echo esc_attr( 'Consumer secret' ) ?>" required value="<?php echo esc_attr( isset( $opt['consumer-secret'] ) ? $opt['consumer-secret'] : '' ) ?>" />
						</td>
					</tr>
					<tr>
						<td><label class="mpwp" for="token"><?php esc_attr_e( 'Token', 'mpwp_forms' ); ?></label></td>
						<td>
							<input type="text" class="mpwp" name="mpwp_settings[token]" id="token" palceholder="<?php echo esc_attr( 'Token' ) ?>" required value="<?php echo esc_attr( isset( $opt['token'] ) ? $opt['token'] : '' ) ?>" />
						</td>
					</tr>
					<tr>
						<td><label class="mpwp" for="token-secret"><?php esc_attr_e( 'Token secret', 'mpwp_forms' ); ?></label></td>
						<td>
							<input type="text" class="mpwp large-text" name="mpwp_settings[token-secret]" id="token-secret" palceholder="<?php echo esc_attr( 'Token secret' ) ?>" required value="<?php echo esc_attr( isset( $opt['token-secret'] ) ? $opt['token-secret'] : '' ) ?>" />
						</td>
					</tr>
					</tbody>
				</table>
				<?php wp_nonce_field('update_settings', '_mpwp_nonce'); ?>
				<div class="both20"></div>
				<input type='submit' name='mpwp_update_settings' class="mpwp_button blue" value='<?php esc_attr_e( 'Salvar alterações', 'mpwp_forms' ); ?>' /> 
				<?php 
					if( isset( $opt['status'] ) && 1 == $opt['status'] ){
						?>
						<a class="mpwp_button white" href="<?php echo admin_url( 'admin.php?page=mpwp_form' ) ?>"><?php esc_attr_e( "Criar formulário", 'mpwp_forms' ) ?></a>
						<?php
					}
				?>
			</form>
		</div>
	</div>
</div>