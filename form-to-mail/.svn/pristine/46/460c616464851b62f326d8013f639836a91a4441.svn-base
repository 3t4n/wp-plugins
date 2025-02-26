<?php
function ftm_templatemail_box($post) {
?>
	<div>
	<?php
	wp_editor($post->post_excerpt, 'ftm_content_template_mail', array(
		'media_buttons' => 0,
		'textarea_name' => 'excerpt',
		'teeny'         => 0,
		'dfw'           => 0,
		'tinymce'       => 1,
		'quicktags'     => [
			'buttons' => 'strong,em,link,block,del,ins,img,ul,ol,li,code'
		],
		'drag_drop_upload' => false
	) );
	?>
	</div>
	<p>
		Добавьте поля из формы, например: <code>[username]</code>
	</p>
<?php
}