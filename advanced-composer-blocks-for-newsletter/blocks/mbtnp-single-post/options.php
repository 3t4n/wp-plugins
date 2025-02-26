<?php
/*
 * @var $options array contains all the options the current block we're ediging contains
 * @var $controls NewsletterControls
 * @var $fields NewsletterFields
 */

// Don't access this file directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php
// get all post type options
$post_types = get_post_types( array( 'public' => true ), 'objects' );
$post_type_options = [];
foreach($post_types as $post_type){
	$post_type_options[$post_type->name] = $post_type->label;
}

// get all thumbnail size options
$image_sizes = wp_get_registered_image_subsizes();
$image_size_options = ['none' => 'None'];
foreach($image_sizes as $name => $details){
	$image_size_options[$name] = ucfirst(str_replace('_', ' ', $name)) . ' (' . $details['width'] . 'x' . $details['height'] . ')';
}
$image_size_options['full'] = 'Full';
?>

<div class="tnp-field-row">
	<div class="tnp-field-col-3">
		<?php $fields->text('post_id', __('Post ID', 'advanced-composer-blocks-for-newsletter')) ?>
	</div>
	<div class="tnp-field-col-3">
		&nbsp;
	</div>
	<div class="tnp-field-col-3">
		&nbsp;
	</div>
</div>

<p class="mbtnp-section-title">Featured image</p>
<div class="tnp-field-row">
		<div class="tnp-field-col-2">
			<?php $fields->select('image_size', __('Image size', 'advanced-composer-blocks-for-newsletter'), $image_size_options) ?>
		</div>
		<div class="tnp-field-col-2" id="o-link_image">
			<?php $fields->checkbox('link_image', __('Link image to post', 'advanced-composer-blocks-for-newsletter')) ?>
		</div>
</div>

<div class="tnp-field-row">
		<div class="tnp-field-col-2" id="o-image_align">
			<?php $fields->select('image_align', __('Align', 'advanced-composer-blocks-for-newsletter'), ['center' => 'Center', 'left' => 'Left', 'right' => 'Right']) ?>
		</div>
		<div class="tnp-field-col-2" id="o-border_radius">
			<?php $fields->size('border_radius', __('Border radius', 'advanced-composer-blocks-for-newsletter')) ?>
		</div>
</div>

<p class="mbtnp-section-title">Title</p>
<div class="tnp-field-row">
		<div class="tnp-field-col-2">
			<?php $fields->checkbox('hide_title', __('Hide title', 'advanced-composer-blocks-for-newsletter')) ?>
		</div>
		<div class="tnp-field-col-2" id="o-link_title">
			<?php $fields->checkbox('link_title', __('Link title to post', 'advanced-composer-blocks-for-newsletter')) ?>
		</div>
</div>

<div style="clear:both;" id="o-title_font">
	<?php $fields->font('title_font', '', ['family_default'=>true, 'size_default'=>true, 'weight_default'=>true, 'align'=>true]) ?>
</div>

<p class="mbtnp-section-title">Post date</p>
<div class="tnp-field-row">
		<div class="tnp-field-col-2">
			<?php $fields->checkbox('show_post_date', __('Show post date', 'advanced-composer-blocks-for-newsletter')) ?>
		</div>
</div>

<div style="clear:both;" id="o-post_date_font">
	<?php $fields->font('post_date_font', '', ['family_default'=>true, 'size_default'=>true, 'weight_default'=>true, 'align'=>true]) ?>
</div>

<p class="mbtnp-section-title">Post content</p>
<div class="tnp-field-row">
	<div class="tnp-field-col-2">
		<?php $fields->select('show_content', __('Show content', 'advanced-composer-blocks-for-newsletter'), ['none' => 'None', 'excerpt' => 'Excerpt', 'full' => 'Full']) ?>
	</div>
	<div class="tnp-field-col-2" id="o-excerpt_length">
		<?php $fields->number('excerpt_length', __('Excerpt length (characters)', 'advanced-composer-blocks-for-newsletter')) ?>
	</div>
</div>

<div style="clear:both;" id="o-post_content_font">
	<?php $fields->font('post_content_font', '', ['family_default'=>true, 'size_default'=>true, 'weight_default'=>true, 'align'=>true]) ?>
</div>

<p class="mbtnp-section-title">Custom content</p>
<p style="font-size: 0.9em; margin-top: 0;">Add custom fields by using brackets. Ex: for "custom_name", use <strong>{field_custom_name}</strong></p>
<?php $fields->wp_editor( 'post_custom_html', 'Content', [
	'post_custom_html_font_family'  => $composer['post_custom_html_font_family'],
	'post_custom_html_font_size'    => $composer['post_custom_html_font_size'],
	'post_custom_html_font_weight'  => $composer['post_custom_html_font_weight'],
	'post_custom_html_font_color'   => $composer['post_custom_html_font_color'],
] ) ?>

<p class="mbtnp-section-title">Button</p>
<?php $fields->checkbox('hide_button', __('Hide button', 'advanced-composer-blocks-for-newsletter')) ?>
<div id="o-button_text">
	<?php $fields->text('button_text', __('Button text', 'advanced-composer-blocks-for-newsletter')) ?>
	<?php $fields->font('button_text_font', '', [ 'family_default' => true, 'size_default' => true, 'weight_default' => true, 'align'=>false, 'color'=>false ] ) ?>
</div>

<div class="tnp-field-row">
    <div class="tnp-field-col-3" id="o-button_text_color">
        <?php $fields->color('button_text_color', __('Text color', 'advanced-composer-blocks-for-newsletter')) ?>
    </div>
    <div class="tnp-field-col-3" id="o-button_color">
        <?php $fields->color('button_color', __('Button color', 'advanced-composer-blocks-for-newsletter')) ?>
    </div>
    <div class="tnp-field-col-3" id="o-button_border_color">
        <?php $fields->size('button_border_radius', __('Border radius', 'advanced-composer-blocks-for-newsletter')) ?>
    </div>
</div>

<div class="tnp-field-row">
    <div class="tnp-field-col-2" id="o-button_width">
        <?php $fields->select('button_width', 'Width', ['inline' => __('Inline', 'advanced-composer-blocks-for-newsletter'), 'full_width' => __('Full width', 'advanced-composer-blocks-for-newsletter')]) ?>
    </div>
    <div class="tnp-field-col-2"id="o-button_align">
        <?php $fields->select('button_align', 'Alignment', ['center' => __('Center'), 'left' => __('Left'), 'right' => __('Right')]) ?>
    </div>
</div>

<p class="mbtnp-section-title">Layout</p>
<div class="tnp-field-row">
    <div class="tnp-field-col-4">
        <?php $fields->size('wrap_border_radius', __('Border radius', 'advanced-composer-blocks-for-newsletter')) ?>
    </div>
    <div class="tnp-field-col-4">
        <?php $fields->color('wrap_background_color', __('Background color', 'advanced-composer-blocks-for-newsletter')) ?>
    </div>
    <div class="tnp-field-col-4">
        <?php $fields->size('wrap_border_width', __('Border width', 'advanced-composer-blocks-for-newsletter')) ?>
    </div>
    <div class="tnp-field-col-4">
		<?php $fields->color('wrap_border_color', __('Border color', 'advanced-composer-blocks-for-newsletter')) ?>
    </div>
</div>

<div class="tnp-field-row" style="padding: 10px;">
    <div class="tnp-field-col">
		<table width="100%">
			<tr>
				<td><?php $fields->size('wrap_padding_left', __('&larr; Left', 'advanced-composer-blocks-for-newsletter')) ?></td>
				<td><?php $fields->size('wrap_padding_top', __('&uarr; Top', 'advanced-composer-blocks-for-newsletter')) ?><?php $fields->size('wrap_padding_bottom', __('&darr; Bottom', 'advanced-composer-blocks-for-newsletter')) ?></td>
				<td><?php $fields->size('wrap_padding_right', __('&rarr; Right', 'advanced-composer-blocks-for-newsletter')) ?></td>
			</tr>
		</table>
	</div>
</div>


<hr style="clear:both; margin:20px 0;" />

<script>
jQuery(document).ready(function($){

	function mbtnp_post_list_visibility(){

		// thumbnail rules
		var image_size = $('#options-image_size').val();
		if(image_size == 'none'){
			$('#o-link_images').hide();
			$('#o-image_align').hide();
			$('#o-border_radius').hide();
		} else {
			$('#o-link_images').show();
			$('#o-image_align').show();
			$('#o-border_radius').show();
		}

		// title rules
		var hide_title = $('#options-hide_title').is(':checked');
		if(hide_title){
			$('#o-link_title').hide();
			$('#o-title_font').hide();
		} else {
			$('#o-link_title').show();
			$('#o-title_font').show();
		}

		// post date rules
		var show_post_date = $('#options-show_post_date').is(':checked');
		if(show_post_date){
			$('#o-post_date_font').show();
		} else {
			$('#o-post_date_font').hide();
		}

		// content rules
		var show_content = $('#options-show_content').val();
		if(show_content == 'none'){
			$('#o-post_content_font').hide();
		} else {
			$('#o-post_content_font').show();
		}
		if(show_content == 'full' || show_content == 'none'){
			$('#o-excerpt_length').hide();
		} else {
			$('#o-excerpt_length').show();
		}

		// button rules
		var hide_button = $('#options-hide_button').is(':checked');
		if(hide_button){
			$('#o-button_text').hide();
			$('#o-button_text_color').hide();
			$('#o-button_color').hide();
			$('#o-button_border_color').hide();
			$('#o-button_width').hide();
			$('#o-button_align').hide();
		} else {
			$('#o-button_text').show();
			$('#o-button_text_color').show();
			$('#o-button_color').show();
			$('#o-button_border_color').show();
			$('#o-button_width').show();
			$('#o-button_align').show();
		}
	}

	$(document).delegate('input, select', 'change', function(e){
		e.preventDefault();
		mbtnp_post_list_visibility();
	});

	// if mouse hovers #tnpc-block-options
	$('#tnpc-block-options').hover(function(){
		mbtnp_post_list_visibility();
	});
});
</script>

<?php $fields->block_commons() ?>