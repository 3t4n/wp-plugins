<?php
function wpcf7_add_tag_generator_konfirmi ( $contact_form, $args = '' ) {
	$args = wp_parse_args( $args, array() );
	$type = 'konfirmi';
	$description = __( "Generate a form-tag for Konfirmi widget. For more details, see %s.", 'contact-form-7' );
	$desc_link = wpcf7_link( __( 'https://contactform7.com/number-fields/', 'contact-form-7' ), __( 'Number Fields', 'contact-form-7' ) );
?>
<div class="control-box">
	<fieldset>
		<legend><?php echo sprintf(esc_html($description), esc_url($desc_link)); ?></legend>
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row"><label for="<?php echo esc_attr($args['content'] . '-id'); ?>"><?php echo esc_html(__('Widget id', 'contact-form-7')); ?></label></th>
					<td><input type="text" name="id" class="idvalue oneline option" id="<?php echo esc_attr($args['content'] . '-id'); ?>" /></td>
				</tr>
			</tbody>
		</table>
	</fieldset>
</div>
<div class="insert-box">
	<input type="text" name="<?php echo esc_html($type); ?>" class="tag code" readonly="readonly" onfocus="this.select()" />
	<div class="submitbox">
		<input type="button" class="button button-primary insert-tag" value="<?php echo esc_attr(__('Insert Tag', 'contact-form-7')); ?>" />
	</div>
	<br class="clear" />
	<p class="description mail-tag"><label for="<?php echo esc_attr($args['content'] . '-mailtag'); ?>"><?php echo sprintf(esc_html(__("To use the value input through this field in a mail field, you need to insert the corresponding mail-tag (%s) into the field on the Mail tab.", 'contact-form-7')), esc_html('<strong><span class="mail-tag"></span></strong>')); ?><input type="text" class="mail-tag code hidden" readonly="readonly" id="<?php echo esc_attr($args['content'] . '-mailtag'); ?>" /></label></p>
</div>
<?php }