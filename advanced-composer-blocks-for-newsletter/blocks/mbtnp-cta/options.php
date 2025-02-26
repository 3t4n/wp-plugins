<?php
/* @var $fields NewsletterFields */

// Don't access this file directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php $fields->text('button_text', __('Button text', 'advanced-composer-blocks-for-newsletter')) ?>
<?php $fields->font('button_text_font', '', [ 'family_default' => true, 'size_default' => true, 'weight_default' => true, 'align'=>false, 'color'=>false ] ) ?>

<?php $fields->url('button_url', __('Button link URL', 'advanced-composer-blocks-for-newsletter') ) ?>


<div class="tnp-field-row">
    <div class="tnp-field-col-3">
        <?php $fields->color('text_color', __('Text color', 'advanced-composer-blocks-for-newsletter')) ?>
    </div>
    <div class="tnp-field-col-3">
        <?php $fields->color('button_color', __('Button color', 'advanced-composer-blocks-for-newsletter')) ?>
    </div>
    <div class="tnp-field-col-3">
        <?php $fields->size('button_border_radius', __('Border radius', 'advanced-composer-blocks-for-newsletter')) ?>
    </div>
</div>

<div class="tnp-field-row">
    <div class="tnp-field-col-2">
        <?php $fields->select('button_width', 'Width', ['inline' => __('Inline'), 'full_width' => __('Full width')]) ?>
    </div>
    <div class="tnp-field-col-2">
        <?php $fields->select('button_align', 'Alignment', ['center' => __('Center'), 'left' => __('Left'), 'right' => __('Right')]) ?>
    </div>
</div>

<hr style="clear:both;margin:20px 0;" />

<?php $fields->block_commons() ?>
