<?php defined( 'ABSPATH' ) or exit; ?>
<a href="#TB_inline?width=500&height=400&inlineId=mpwp_new_list" class="thickbox"><?php esc_attr_e( 'Criar nova lista', 'mpwp_forms' ); ?></a>
<div id="mpwp_new_list" style="display:none;">
	<div>
		<div class="one">
			<div class="both20"></div>
			<label class="mpwp" for="new_list"><?php esc_attr_e( 'Nome da nova lista:', 'mpwp_forms' ) ?></label>
			<input type="text" class="mpwp" id="new_list" value="" placeholder="<?php esc_attr_e( 'Ex.: Cadastros do blog', 'mpwp_forms' ) ?>" required />
			<div class="both20"></div>
			<a class="mpwp_button white" id="close_new_list_modal" href="#"><?php esc_attr_e( 'Fechar', 'mpwp_forms' ); ?></a> 
			<input type="submit" class="mpwp_button blue" id="new" value="<?php esc_attr_e( 'Criar lista', 'mpwp_forms' ); ?>" />
			<div class="both20"></div>
			<span class="description"><?php esc_attr_e( 'Importante: A página será atualizada após a criação da lista. Salve as alterações de seu formulário antes de criar uma nova lista.', 'mpwp_forms' ); ?></span>
			<div class="both20"></div>
			<div id="result"></div>
		</div>
	</div>
</div>

<?php
add_action( 'admin_footer', 'create_list' );
function create_list() { ?>
<script type="text/javascript" >
	jQuery("#close_new_list_modal").click(function($) {
		tb_remove();
	});
	jQuery("#new").click(function($) {
		jQuery("#new").val('<?php esc_attr_e( 'aguarde...', 'mpwp_forms' ); ?>');
		
		var name = jQuery("#new_list").val();

		var data = {
			'action': 'mpwp_forms_add_new_list',
			'new': 1,
			'name': name
		};

		jQuery.post(ajaxurl, data, function(response) {
			if ( response == '0' ){
				jQuery("#result").html('<div class="label label-success"><?php esc_attr_e( 'Lista criada com sucesso. A página será atualizada em instantes.' ) ?></div>');
				location.reload();
			} else {
				jQuery("#new").val('<?php esc_attr_e( 'Criar lista', 'mpwp_forms' ); ?>');
				if ( response == '1' ){
					jQuery("#result").html('<div class="label label-warning"><?php esc_attr_e( 'Não foi possível conectar à sua conta. Por favor, tente novamente.' ) ?></div>');
				} else {
					jQuery("#result").html('<div class="label label-warning">' + response + '</div>');
				}
			}
		});
	});
</script>
<?php
}
?>