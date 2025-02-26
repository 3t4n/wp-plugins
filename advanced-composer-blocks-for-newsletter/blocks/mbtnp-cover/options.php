<?php
/* @var $options array It contains all the options of the current block, but usually there is no need to access it directly */
/* @var $fields NewsletterFields */

// Don't access this file directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php $controls->hidden('image_url') ?>

<?php $fields->media('image', __('Image', 'advanced-composer-blocks-for-newsletter'), array('alt' => false)) ?>

<div class="tnp-field-row">
    <div class="tnp-field-col-3">
        <?php $fields->color('overlay-color', __('Overlay color', 'advanced-composer-blocks-for-newsletter')) ?>
    </div>
    <div class="tnp-field-col-3">
        <?php $fields->number('overlay-opacity', __('Overlay opacity', 'advanced-composer-blocks-for-newsletter'), array('min' => 0, 'max' => 100)) ?>
		<script>jQuery('#options-overlay-opacity').after('%');</script>
    </div>
    <div class="tnp-field-col-3">
        <?php $fields->size('border-radius', __('Border radius', 'advanced-composer-blocks-for-newsletter')) ?>
    </div>
</div>

<?php $fields->text('title', __('Title', 'advanced-composer-blocks-for-newsletter')) ?>
<?php $fields->font('title_font', '', ['family_default'=>true, 'size_default'=>true, 'weight_default'=>true, 'align'=>true]) ?>

<?php $fields->textarea('text', __('Text', 'advanced-composer-blocks-for-newsletter')) ?>
<?php $fields->font( 'font', '', [ 'family_default' => true, 'size_default' => true, 'weight_default' => true, 'align'=>true ] ) ?>

<div class="tnp-field-row" style="padding: 10px;">
    <div class="tnp-field-col">
		<p style="margin: 0; font-size: 14px; font-weight: 300; padding-bottom: 5px; color: #666;">Padding</p>
		<table width="100%">
			<tr>
				<td><?php $fields->size('padding-left', __('&larr; Left', 'advanced-composer-blocks-for-newsletter')) ?></td>
				<td><?php $fields->size('padding-top', __('&uarr; Top', 'advanced-composer-blocks-for-newsletter')) ?><?php $fields->size('padding-bottom', __('&darr; Bottom', 'advanced-composer-blocks-for-newsletter')) ?></td>
				<td><?php $fields->size('padding-right', __('&rarr; Right', 'advanced-composer-blocks-for-newsletter')) ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="tnp-field-row" style="padding: 10px;">
    <div class="tnp-field-col">
		<p style="margin: 0; font-size: 14px; font-weight: 300; padding-bottom: 5px; color: #666;">Box shadow</p>
		<table width="100%">
			<tr>
				<td><?php $fields->color('box-shadow-color', __('Color', 'advanced-composer-blocks-for-newsletter')) ?></td>
				<td><?php $fields->size('box-shadow-x', __('&harr; X-offset', 'advanced-composer-blocks-for-newsletter')) ?></td>
				<td><?php $fields->size('box-shadow-y', __('&varr; Y-offset', 'advanced-composer-blocks-for-newsletter')) ?></td>
				<td><?php $fields->size('box-shadow-blur', __('Blur', 'advanced-composer-blocks-for-newsletter')) ?></td>
				<td><?php $fields->size('box-shadow-spread', __('Spread', 'advanced-composer-blocks-for-newsletter')) ?></td>
			</tr>
		</table>
    </div>
</div>

<hr style="clear:both; margin: 20px 0;" />

<?php $fields->block_commons() ?>