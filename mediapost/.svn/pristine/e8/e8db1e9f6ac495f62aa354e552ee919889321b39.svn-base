<?php defined( 'ABSPATH' ) or exit; ?>
<a href="#TB_inline?width=500&height=400&inlineId=mpwp_update_lists" class="thickbox"><?php esc_attr_e( 'Atualizar listas', 'mpwp_forms' ); ?></a>
<div id="mpwp_update_lists" style="display:none;">
	<div>
		<div class="one">
			<div class="both20"></div>
			<h3><?php esc_attr_e( 'Deseja atualizar suas listas?', 'mpwp_forms' ) ?></h3>
			<p><?php esc_attr_e( 'Esta operação irá buscar em sua conta @MediaPost todas as listas existentes e atualizará o cache do Wordpress.', 'mpwp_forms' ); ?></p>
			<div class="both20"></div>
			<a class="mpwp_button white" id="close_update_lists_modal" href="#"><?php esc_attr_e( 'Fechar', 'mpwp_forms' ); ?></a> 
			<input type="submit" class="mpwp_button blue" id="update" value="<?php esc_attr_e( 'Atualizar listas', 'mpwp_forms' ); ?>" />
			<div class="both20"></div>
			<span class="description"><?php esc_attr_e( 'Importante: A página será atualizada após a atualização de suas listas. Antes de prosseguir, salve as alterações de seu formulário.', 'mpwp_forms' ); ?></span>
			<div class="both20"></div>
			<div id="result"></div>
		</div>
	</div>
</div>

<?php
add_action( 'admin_footer', 'mpwpFormsUpdateListsAjax' );
function mpwpFormsUpdateListsAjax() { ?>
<script type="text/javascript" >
	jQuery("#close_update_lists_modal").click(function($) {
		tb_remove();
	});
	jQuery("#update").click(function($) {
		jQuery("#update").val('<?php esc_attr_e( 'atualizando...', 'mpwp_forms' ); ?>');
		
		var data = {
			'action': 'mpwp_forms_update_lists',
			'new': 1,
		};

		jQuery.post(ajaxurl, data, function(response) {
			if ( response ){
				jQuery("#result").html('<div class="label label-success"><?php esc_attr_e( 'Listas atualizadas com sucesso. A página será atualizada em instantes.' ) ?></div>');
				location.reload();
			} else {
				jQuery("#update").val('<?php esc_attr_e( 'Atualizar listas', 'mpwp_forms' ); ?>');
				jQuery("#result").html('<div class="label label-warning"><?php esc_attr_e( 'Não foi possível buscar as listas de sua conta @MediaPost. Por favor, tente novamente.' ) ?></div>');
			}
		});
	});
</script>
<?php
}
?>