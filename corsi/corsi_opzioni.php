<?php
	function corsi_menu() {
		add_options_page('Corso', 'Corsi', 'manage_options', 'corsi', 'corsi_opzioni');
	}
	
	function corsi_opzioni_validate() {
		return true;
	}

  function corsi_registraopzioni() { // whitelist options
	  register_setting( 'corsi_opzioni', 'corsi_facebook' );
	  register_setting( 'corsi_opzioni', 'corsi_youtube' );
	  register_setting( 'corsi_opzioni', 'corsi_twitter' );
	  register_setting( 'corsi_opzioni', 'corsi_agoogleplus' );
	  register_setting( 'corsi_opzioni', 'corsi_smtphost' );
	  register_setting( 'corsi_opzioni', 'corsi_smtpuser' );
	  register_setting( 'corsi_opzioni', 'corsi_smtppassword' );
	}
	
	function corsi_opzioni() {
		global $corsi_opzioni;
		?>
		<div class="wrap">
		<div class="icon32" id="icon-tools"><br /></div>
		<h2>Opzioni plugin Corsi</h2>
		<p>Inserisci i dati per personalizzare la visualizzazione.</p>
		<form method="post" action="options.php" enctype="multipart/form-data">
			<?php settings_fields('corsi_opzioni'); ?>
			<?php do_settings_sections('corsi'); ?>
			<table class="optiontable form-table">
			<tr valign="top">
				<th scope="row" colspan="2"><hr><strong>Configurazioni plugin</strong></th>
			</tr>
			<tr valign="top">
				<th scope="row" colspan="2"><hr><div id="icon-link-manager" class="icon32"></div><strong>Social</strong></th>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="corsi_facebook">Indirizzo Facebook</label></th>
				<td><input name="corsi_facebook" type="text" id="corsi_facebook" value="<?php print(get_option('corsi_facebook')); ?>" size="40" class="regular-text" />
				<span class="description">Indirizzo del profilo o della pagina FB</span></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="corsi_youtube">Indirizzo YouTube</label></th>
				<td><input name="corsi_youtube" type="text" id="corsi_youtube" value="<?php print(get_option('corsi_youtube')); ?>" size="40" class="regular-text" />
				<span class="description">Indirizzo canale YouTube</span></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="corsi_twitter">Indirizzo Twitter</label></th>
				<td><input name="corsi_twitter" type="text" id="corsi_twitter" value="<?php print(get_option('corsi_twitter')); ?>" size="40" class="regular-text" />
				<span class="description">Indirizzo del profilo Twitter</span></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="corsi_googleplus">Indirizzo Google+</label></th>
				<td><input name="corsi_googleplus" type="text" id="corsi_googleplus" value="<?php print(get_option('corsi_googleplus')); ?>" size="40" class="regular-text" />
				<span class="description">Indirizzo del profilo o della pagina Google+</span></td>
			</tr>
			<tr valign="top">
				<th scope="row" colspan="2"><hr><strong>Configurazioni di invio email</strong></th>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="corsi_smtphost">host SMTP</label></th>
				<td><input name="corsi_smtphost" type="text" id="corsi_smtphost" value="<?php print(get_option('corsi_smtphost')); ?>" size="40" class="regular-text" />
				<span class="description">Server della posta in uscita</span></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="corsi_smtpuser">user SMTP</label></th>
				<td><input name="corsi_smtpuser" type="text" id="corsi_smtpuser" value="<?php print(get_option('corsi_smtpuser')); ?>" size="40" class="regular-text" />
				<span class="description">Nome utente per invio posta SMTP</span></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="corsi_smtppassword">password SMTP</label></th>
				<td><input name="corsi_smtppassword" type="text" id="corsi_smtppassword" value="<?php print(get_option('corsi_smtppassword')); ?>" size="40" class="regular-text" />
				<span class="description">Password per invio posta SMTP</span></td>
			</tr>
			</table>
			<?php submit_button(); ?>
		</form>
		</div>
		<?php
	}

	if ( is_admin() ){ // admin actions
  	add_action( 'admin_menu', 'corsi_menu' );
	  add_action( 'admin_init', 'corsi_registraopzioni' );
	}