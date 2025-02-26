<?php defined( 'ABSPATH' ) or exit; ?>
<a href="#TB_inline?width=0&height=550&inlineId=mpwp_fields" class="thickbox mpwp_button white"><?php esc_attr_e( 'Adicione um novo campo no seu formulário', 'mpwp_forms' ); ?></a>
<div id="mpwp_fields" style="display:none;">
	<?php
		if( $mpFields = mpwpFormsGetMPWPFields() ){
			?>
			<h2><?php esc_attr_e( 'Copie o código do campo e adicione-o no HTML de seu formlulário.', 'mpwp_forms' ); ?></h2>
			<div class="both20"></div>
			<?php
			foreach( $mpFields as $field ){ 
				?>
				<label class="mpwp" for="<?php echo esc_attr( $field['label'] ) ?>"><?php echo esc_attr( $field['label'] ) ?></label>
				<input class="mpwp selectContent" readonly id="<?php echo esc_attr( $field['label'] ) ?>" value="<?php echo esc_attr( $field['input'] ) ?>" />
				<div class="both20"></div>
				<?php 	
			}
		} else {
			esc_attr_e( 'Não foi possível carregar os campos. Atualize sua integração e tente novamente.', 'mpwp_forms' );
		}
	?>
</div>