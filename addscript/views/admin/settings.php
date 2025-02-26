<div class="wrap">

	<h1><?php echo $this->get_plugin_name() ?></h1>
	<h2><?php _e('Impostazioni' , $this->get_language_domain() ) ?></h2>
	
	<!-- display error or success -->
	<!--
	<?php settings_errors(); ?>
	-->
	
	<div class="notice notice-info">
		<?php _e('Ricorda che questo codice non verrà mostrato finchè non viene impostato il COOKIE di WP Italy Choices' , $this->get_language_domain() ); ?>
	</div>
	
	<form method="post" action="options.php">
		<?php settings_fields( $this->get_option_group() ); ?>
		<?php do_settings_sections( $this->get_option_group() ); ?>
		
		<?php
		
			// get the array for form keys
			$form_array = $this->get_array_admin_key_form();
		
		?>
		
		<table class="form-table">
			<!-- FROM NAME SECTION -->
			<tr>
		    	<th scope="row"><?php _e('Script' , $this->get_language_domain()) ?></th>
		    	<td>
		    		
		    		<?php
		    		
		    			$value = $form_array['script'];
						$saved_option = trim ( esc_attr( get_option ( $value ) ) );
						$explain = 'Inserisci lo script (Jquery principalmente)';
		    		
		    		?>
		    		
		    		<textarea name="<?php echo $value ?>" name="10" rows="10" cols="50" rows="" class="large-text"><?php echo $saved_option; ?></textarea>
		    		<p class="description"><?php _e( $explain , $this->get_language_domain() ); ?></p>
		    		
		    	</td>
			</tr>
			<!-- /NAME SECTION -->
			
		</table>
		
		<?php submit_button(); ?>
		
	</form>

</div>