<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php // PUT YOUR settings_fields name and your input // ?>
<?php settings_fields('ns_simple_loader_options_group'); ?>
<div class="genRowNssdc">
	<?php $ns_disp_dim_load =  get_option('ns_simple_loader_dimension', ''); ?>
	<?php $ns_disp_style =  get_option('ns_disp_style', ''); ?>
	<?php $ns_loader_text =  get_option('ns_loader_text', ''); ?>
<table class="form-table adjTblNs">
	<tr>
		<th><label for="ns_display_loader"><?php _e('Display loader', 'ns-simple-intro-loader') ?></label></th>
		<td>
			<select name="ns_simple_loader_dimension" id="ns_simple_loader_dimension">
				<option value="gifLoader"<?php if($ns_disp_dim_load != '' && $ns_disp_dim_load == 'gifLoader'){ echo ' selected';}?>>gifLoader</option>
				<option value="simpleLoader"<?php if($ns_disp_dim_load != '' && $ns_disp_dim_load == 'simpleLoader'){ echo ' selected';}?>>simpleLoader</option>
				<option value="cssLoader"<?php if($ns_disp_dim_load != '' && $ns_disp_dim_load == 'cssLoader'){ echo ' selected';}?>>cssLoader</option>
				<option value="doubleLoader"<?php if($ns_disp_dim_load != '' && $ns_disp_dim_load == 'doubleLoader'){ echo ' selected';}?>>doubleLoader</option>
				<option value="lettersLoader"<?php if($ns_disp_dim_load != '' && $ns_disp_dim_load == 'lettersLoader'){ echo ' selected';}?>>lettersLoader</option>
				<option value="counterLoader"<?php if($ns_disp_dim_load != '' && $ns_disp_dim_load == 'counterLoader'){ echo ' selected';}?>>counterLoader</option>
			</select>
			<p class="description"><?php _e('Choose how loader to display loading.', 'ns-simple-intro-loader') ?></p>
		</td>
	</tr>
	<tr>
	<th><label for="ns_display_loader"><?php _e('Loader Style', 'ns-simple-intro-loader') ?></label></th>
		<td>
			<select name="ns_disp_style" id="ns_disp_style">
				<option value="light"<?php if($ns_disp_style != '' && $ns_disp_style == 'light'){ echo ' selected';}?>><?php _e('light', 'ns-simple-intro-loader') ?></option>
				<option value="dark"<?php if($ns_disp_style != '' && $ns_disp_style == 'dark'){ echo ' selected';}?>><?php _e('dark', 'ns-simple-intro-loader') ?></option>
				<option value="ocean"<?php if($ns_disp_style != '' && $ns_disp_style == 'ocean'){ echo ' selected';}?>><?php _e('ocean', 'ns-simple-intro-loader') ?></option>
				<option value="forest"<?php if($ns_disp_style != '' && $ns_disp_style == 'forest'){ echo ' selected';}?>><?php _e('forest', 'ns-simple-intro-loader') ?></option>
				<option value="fluoGreen"<?php if($ns_disp_style != '' && $ns_disp_style == 'fluoGreen'){ echo ' selected';}?>><?php _e('fluoGreen', 'ns-simple-intro-loader') ?></option>
				<option value="fluoMagenta"<?php if($ns_disp_style != '' && $ns_disp_style == 'fluoMagenta'){ echo ' selected';}?>><?php _e('fluoMagenta', 'ns-simple-intro-loader') ?></option>
				<option value="fluoYellow"<?php if($ns_disp_style != '' && $ns_disp_style == 'fluoYellow'){ echo ' selected';}?>><?php _e('fluoYellow', 'ns-simple-intro-loader') ?></option>
			</select>
			<p class="description"><?php _e('Choose style loader to display.', 'ns-simple-intro-loader') ?></p>
		</td>
	</tr>
	<tr>
	<th><label for="ns_display_loader"><?php _e('Loader Text', 'ns-simple-intro-loader') ?></label></th>
		<td>
			<input type="text" name="ns_loader_text" id="ns_loader_text" value="<?php echo $ns_loader_text; ?>">
			<p class="description"><?php _e('If Choose style loader lettersLoader write here your loader text.', 'ns-simple-intro-loader') ?></p>
		</td>
	</tr>
</table>	
 
</div>


