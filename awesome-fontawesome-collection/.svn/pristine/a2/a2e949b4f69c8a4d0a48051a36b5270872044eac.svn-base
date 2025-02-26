<?php if ( ! defined( 'ABSPATH' ) ) exit;
	
if ( ! empty( $_POST ) && check_admin_referer( 'phoen_icon_text_action', 'phoen_icon_text_nonce_field' ) ) {

	if(sanitize_text_field( $_POST['plugin_register'] ) == 'Save'){
		
		$phoen_enable = sanitize_text_field( $_POST['phoen_enable'] ) ;
		
		update_option('phoen_icon_with_text',$phoen_enable,'yes');
		
	}
	
}
 
	$gen_settings = get_option('phoen_icon_with_text');

?>

<form method="post" name="phoen_icon_with_text">

	<?php wp_nonce_field( 'phoen_icon_text_action', 'phoen_icon_text_nonce_field' ); ?>
	<br/>
	<table class="form-table">
		<tr>
			<th>
				Enable Plugin
			</th>
			<td>
				<input type="checkbox" name="phoen_enable" value="1" <?php echo(isset($gen_settings) && $gen_settings == '1')?'checked':'';?> >
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" class="button button-primary" value="Save" name="plugin_register">
			</td>
		</tr>
	</table>

</form>