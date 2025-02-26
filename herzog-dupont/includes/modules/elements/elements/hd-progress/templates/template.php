<?php

/* Herzog Dupont for YOOtheme Pro Copyright (C) 2018-2023 Thomas Weidlich GNU GPL v3 */

$uniqid = false;

if ($props['progress_value_color'] || $props['progress_background_color'])
    $uniqid = uniqid('hd-progress-');

$el = $this->el('div', [

    'class' => [
        'hd-progess',
    ],

]);

$progress = $this->el('progress', [

    'id' => [
        $uniqid => $uniqid,
    ],

    'class' => [
        'uk-progress',
    ],

    'value' => [
        '{start}',
    ],

    'max' => [
        '{max}',
    ],

    'data-stop' => [
        '{stop}',
    ],

    'data-step' => [
        '{animation_step}',
    ],

    'data-speed' => [
        '{animation_speed}',
    ]

]);

?>

<?php echo $el($props, $attrs) ?>

    <? if ($uniqid) : ?>
    <style>
    <? if ($props['progress_value_color']) : ?>
    #<?php echo $uniqid ?>.uk-progress::-webkit-progress-value {
        background-color: <?php echo $props['progress_value_color'] ?>;
    }

    #<?php echo $uniqid ?>.uk-progress::-moz-progress-bar {
        background-color: <?php echo $props['progress_value_color'] ?>;
    }

    #<?php echo $uniqid ?>.uk-progress::-ms-fill {
        background-color: <?php echo $props['progress_value_color'] ?>;
    }
    <? endif ?>

    <? if ($props['progress_background_color']) : ?>
    #<?php echo $uniqid ?>.uk-progress {
        background-color: <?php echo $props['progress_background_color'] ?>;
    }

    #<?php echo $uniqid ?>.uk-progress::-webkit-progress-bar {
        background-color: <?php echo $props['progress_background_color'] ?>;
    }
    <? endif ?>
    </style>
    <? endif ?>

    <? if ($props['content']) : ?>
    <div><?php echo $props['content'] ?></div>
    <? endif ?>

    <?php echo $progress($props) ?>
        <?php echo $props['stop'] ?>/<?php echo $props['max'] ?>
    <?php echo $progress->end() ?>

</div>
