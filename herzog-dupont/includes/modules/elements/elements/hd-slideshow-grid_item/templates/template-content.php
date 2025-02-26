<?php

/* Herzog Dupont for YOOtheme Pro Copyright (C) 2016-2023 YOOtheme GmbH, 2021-2023 Thomas Weidlich GNU GPL v3 */

// Title
$title = $this->el($element['title_element'], [

    'class' => [
        'el-title',
        'uk-{title_style}',
        'uk-card-title {@panel_style} {@!title_style}',
        'uk-heading-{title_decoration}',
        'uk-font-{title_font_family}',
        'uk-text-{title_color} {@!title_color: background}',
        'uk-margin[-{title_margin}]-top {@!title_margin: remove}',
        'uk-margin-remove-top {@title_margin: remove}',
        'uk-margin-remove-bottom',
    ],

]);

// Meta
$meta = $this->el($element['meta_element'], [

    'class' => [
        'el-meta',
        'uk-{meta_style}',
        'uk-text-{meta_color}',
        'uk-margin[-{meta_margin}]-top {@!meta_margin: remove}',
        'uk-margin-remove-bottom [uk-margin-{meta_margin: remove}-top]' => !in_array($element['meta_style'], ['', 'text-meta', 'text-lead', 'text-small', 'text-large']) || $element['meta_element'] != 'div',
    ],

]);

// Content
$content = $this->el('div', [

    'class' => [
        'el-content uk-panel',
        'uk-{content_style}',
        '[uk-text-left{@content_align}]',
        'uk-dropcap {@content_dropcap}',
        'uk-column-{content_column}[@{content_column_breakpoint}]',
        'uk-column-divider {@content_column} {@content_column_divider}',
        'uk-margin[-{content_margin}]-top {@!content_margin: remove}',
        'uk-margin-remove-bottom [uk-margin-{content_margin: remove}-top]' => !in_array($element['content_style'], ['', 'text-meta', 'text-lead', 'text-small', 'text-large']),
    ],

]);

// Link
$link_container = $this->el('div', [

    'class' => [
        'uk-margin[-{link_margin}]-top {@!link_margin: remove}',
    ],

]);

// Title Grid
$grid = $this->el('div', [

    'class' => [
        'uk-child-width-expand',
        $element['title_grid_column_gap'] == $element['title_grid_row_gap'] ? 'uk-grid-{title_grid_column_gap}' : '[uk-grid-column-{title_grid_column_gap}] [uk-grid-row-{title_grid_row_gap}]',
        'uk-margin[-{title_margin}]-top {@!title_margin: remove} {@image_align: top}' => !$props['meta'] || $element['meta_align'] != 'above-title',
        'uk-margin[-{meta_margin}]-top {@!meta_margin: remove} {@image_align: top} {@meta_align: above-title}' => $props['meta'],
    ],

    'uk-grid' => true,
]);

$cell_title = $this->el('div', [

    'class' => [
        'uk-width-{title_grid_width}[@{title_grid_breakpoint}]',
        'uk-margin-remove-first-child',
    ],

]);

$cell_content = $this->el('div', [

    'class' => [
        'uk-margin-remove-first-child',
    ],

]);

?>

<?php if ($props['title'] && $element['title_align'] == 'left') : ?>
<?php echo $grid($element) ?>
    <?php echo $cell_title($element) ?>
<?php endif ?>

        <?php if ($props['meta'] && $element['meta_align'] == 'above-title') : ?>
        <?php echo $meta($element, $props['meta']) ?>
        <?php endif ?>

        <?php if ($props['title']) : ?>
        <?php echo $title($element) ?>
            <?php if ($element['title_color'] == 'background') : ?>
            <span class="uk-text-background"><?php echo $props['title'] ?></span>
            <?php elseif ($element['title_decoration'] == 'line') : ?>
            <span><?php echo $props['title'] ?></span>
            <?php else : ?>
            <?php echo $props['title'] ?>
            <?php endif ?>
        <?php echo $title->end() ?>
        <?php endif ?>

        <?php if ($props['meta'] && $element['meta_align'] == 'below-title') : ?>
        <?php echo $meta($element, $props['meta']) ?>
        <?php endif ?>

    <?php if ($props['title'] && $element['title_align'] == 'left') : ?>
    <?php echo $cell_title->end() ?>
    <?php echo $cell_content($element) ?>
    <?php endif ?>

        <?php if ($element['image_align'] == 'between') : ?>
        <?php echo $image ?>
        <?php endif ?>

        <?php if ($props['meta'] && $element['meta_align'] == 'above-content') : ?>
        <?php echo $meta($element, $props['meta']) ?>
        <?php endif ?>

        <?php if ($props['content']) : ?>
        <?php echo $content($element, $props['content']) ?>
        <?php endif ?>

        <?php if ($props['meta'] && $element['meta_align'] == 'below-content') : ?>
        <?php echo $meta($element, $props['meta']) ?>
        <?php endif ?>

        <?php if ($props['link'] && ($props['link_text'] || $element['link_text'])) : ?>
        <?php echo $link_container($element, $link($element, $props['link_text'] ?: $element['link_text'])) ?>
        <?php endif ?>

<?php if ($props['title'] && $element['title_align'] == 'left') : ?>
    <?php echo $cell_content->end() ?>
<?php echo $grid->end() ?>
<?php endif ?>