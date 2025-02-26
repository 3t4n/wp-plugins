<?php defined('ABSPATH') or die; ?>
<div class="wrap">
    <h1><?=esc_html__('Image optimizer settings', 'another-simple-image-optimizer')?></h1>
    <?php if (!$canSpawnProcess): ?>
    <?=esc_html__('The PHP function "proc_open" is disabled, which is required to run any optimizer. Also checking the existence of any optimizer is not possible.', 'another-simple-image-optimizer')?></p>
    <?php endif ?>
    <h2><?=esc_html__('Available image optimizers', 'another-simple-image-optimizer')?></h2>
    <p><?=esc_html__('If no optimizer in the list below is checked, optimizing images won\'t work.', 'another-simple-image-optimizer')?>
    <br />
    <?=esc_html__('At least jpegoptim and optipng should be installed.', 'another-simple-image-optimizer')?></p>
    <ul>
    <?php foreach ($availableCommands as $cmd => $active): ?>
        <li><input type="checkbox" disabled<?=$active ? ' checked' : ''?>/> <?=esc_html($cmd)?></li>
    <?php endforeach ?>
    </ul>
</div>
