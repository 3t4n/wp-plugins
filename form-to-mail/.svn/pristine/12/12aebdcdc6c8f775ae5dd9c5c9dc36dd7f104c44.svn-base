<?php
function ftm_settings_box($post) {
?>
<div class="inside">
	<p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="ftm_form_id">Селектор</label></p>
	<input name="ftm_form_id" type="text" id="ftm_form_id" value="<?php echo get_post_meta( $post->ID, 'ftm_form_id', true ); ?>">
	<p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="ftm_send_email">Email получателя</label></p>
	<input name="ftm_send_email" type="email" id="ftm_send_email" value="<?php echo get_post_meta( $post->ID, 'ftm_send_email', true ); ?>"><br />
	<p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="ftm_from_email">Email отправителя</label></p>
	<input name="ftm_from_email" type="email" id="ftm_from_email" value="<?php echo get_post_meta( $post->ID, 'ftm_from_email', true ); ?>"><br />
	<span>Если не указать, то будет использованы по-умолчанию</span>
</div>
	
<?php
}