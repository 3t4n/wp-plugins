<?php

/* Herzog Dupont for YOOtheme Pro Copyright (C) 2019-2023 Thomas Weidlich GNU GPL v3 */

$cx = $cy = $props['circle_radius'] * 1.1;
$circleWidth = $circleHeight = $cx * 2;
$viewBox = '0 0 ' . $circleWidth . ' ' . $circleWidth;
$uniqid = uniqid('counter-');
$dashOffsetStart = 2 * M_PI * $props['circle_radius'];
$dashOffsetEnd = 2 * M_PI * $props['circle_radius'] * (1 - intval($props['percentage']) / 100);

$el = $this->el('div', [

    'class' => [
        'counter-container',
    ],

    'data-number' => [
        '{number}',
    ],

    'data-separator-locale' => [
        '{separator_locale}',
    ],

    'data-percentage' => [
        '{percentage}',
    ],

    'data-radius' => [
        '{circle_radius}',
    ],

    'data-duration' => [
        '{duration}',
    ],

    'data-uniqid' => [
        $uniqid,
    ],

]);

$svg = $this->el('svg', [

    'class' => [
        'el-circle',
    ],

    'width' => [
        $circleWidth,
    ],

    'height' => [
        $circleHeight,
    ],

    'viewBox' => [
        $viewBox,
    ],

]);

$textEl = $this->el('span', [

    'class' => [
        'el-text',
        'uk-{text_style}',
        'uk-text-{text_color}',
    ],

]);

$numberEl = $this->el('span', [

    'class' => [
        'el-number',
        'uk-{number_size}',
        'uk-text-{number_color}',
    ],

]);

$unitEl = $this->el('span', [

    'class' => [
        'el-unit',
        'uk-{number_size} {@unit_size: number-size}',
        'uk-{unit_size} {@!unit_size: number-size}',
        'uk-text-{number_color}',
    ],

]);

?>
<?php echo $el($props, $attrs) ?>

    <style>
    #<?php echo $uniqid ?> .counter-value {
        animation: <?php echo $uniqid ?> <?php echo $props['duration'] ?>ms;
    }

    @keyframes <?php echo $uniqid ?> {
        from {
            stroke-dashoffset: <?php echo $dashOffsetStart ?>;
        }

        to {
            stroke-dashoffset: <?php echo $dashOffsetEnd ?>;
        }
    }
    </style>

    <?php if($props['show_circle']) : ?>

        <div class="uk-inline">

            <?php echo $svg($props) ?>
                <circle class="counter-meter" cx="<?php echo $cx ?>" cy="<?php echo $cy ?>" r="<?php echo $props['circle_radius'] ?>" stroke-width="<?php echo $props['circle_stroke_width'] ?>" fill="none" />
                <circle class="counter-value" cx="<?php echo $cx ?>" cy="<?php echo $cy ?>" r="<?php echo $props['circle_radius'] ?>" stroke="<?php echo $props['circle_color'] ?>" stroke-width="<?php echo $props['circle_stroke_width'] ?>" fill="none" />
            </svg>

            <div class="uk-position-center uk-overlay">
                <?php if ($props['number']) : ?><?php echo $numberEl($props) ?><?php echo $props['number'] ?></span><?php endif ?>
                <?php if ($props['unit']) : ?><?php echo $unitEl($props) ?><?php echo ' ' ?><?php echo $props['unit'] ?></span><?php endif ?>
                <?php if ($props['text']) : ?><?php echo $textEl($props) ?><?php echo '<br>' ?><?php echo $props['text'] ?></span><?php endif ?>
            </div>

        </div>

    <?php else : ?>

        <div>
            <?php if ($props['number']) : ?><?php echo $numberEl($props) ?><?php echo $props['number'] ?></span><?php endif ?>
            <?php if ($props['unit']) : ?><?php echo $unitEl($props) ?><?php echo ' ' ?><?php echo $props['unit'] ?></span><?php endif ?>
            <?php if ($props['text']) : ?><?php echo $textEl($props) ?><?php echo '<br>' ?><?php echo $props['text'] ?></span><?php endif ?>
        </div>

    <?php endif; ?>

</div>
