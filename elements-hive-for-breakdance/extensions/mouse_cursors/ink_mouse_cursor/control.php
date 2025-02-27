<?php

namespace ElementsHiveForBreakdance\Extensions\MouseCursors\InkMouseCursor;

use function Breakdance\Elements\control;
use function Breakdance\Elements\controlSection;

/**
 * @return Control
 */
function controls() {
	/** @var Control */
	return controlSection(
		'ink_cursor',
		'Ink Cursor',
		[
			control(
				'cursor_style',
				'Cursor Style',
				[
					'type' => 'dropdown',
					'layout' => 'inline',
					'items' => [
						'0' => ['text' => 'Drop', 'value' => 'drop'],
						'1' => ['text' => 'Track', 'value' => 'track'],
						'2' => ['text' => 'Droplet', 'value' => 'droplet'],
					],
				]
			),
			control('size', 'Size', [
				'type' => 'number',
				'rangeOptions' => [
					'min' => 0.1,
					'max' => 4,
					'step' => 0.1,
				],
			]),
			control(
				'color',
				'Color',
				[
					'type' => 'color',
					'layout' => 'vertical',
					'colorOptions' => [ 'type' => 'solidOnly' ],
				]
			),
			control(
				'mix_blend_mode',
				'Blend Mode',
				[
					'type' => 'dropdown',
					'layout' => 'inline',
					'items' => [
						'0' => ['value' => 'normal', 'text' => 'Normal'],
						'1' => ['text' => 'Multiply', 'value' => 'multiply'],
						'2' => ['text' => 'Screen', 'value' => 'screen'],
						'3' => ['text' => 'Overlay', 'value' => 'overlay'],
						'4' => ['text' => 'Darken', 'value' => 'darken'],
						'5' => ['text' => 'Lighten', 'value' => 'lighten'],
						'6' => ['text' => 'Color-dodge', 'value' => 'color-dodge'],
						'7' => ['text' => 'Color-burn', 'value' => 'color-burn'],
						'8' => ['text' => 'Hard-light', 'value' => 'hard-light'],
						'9' => ['text' => 'Soft-light', 'value' => 'soft-light'],
						'10' => ['text' => 'Difference', 'value' => 'difference'],
						'11' => ['text' => 'Exclusion', 'value' => 'exclusion'],
						'12' => ['text' => 'Hue', 'value' => 'hue'],
						'13' => ['text' => 'Saturation', 'value' => 'saturation'],
						'14' => ['text' => 'Color', 'value' => 'color'],
						'15' => ['text' => 'Luminosity', 'value' => 'luminosity'],
					],
				],
			),
			control(
				'oscillate_on_idle',
				'Oscillate on Idle',
				[
					'type' => 'toggle',
				]
			),
			control(
				'apply_to_page',
				'Apply to whole page',
				[
					'type' => 'toggle',
				]
			),
			control('z_index', 'Z-index', [
				'type' => 'number',
			]),
		],
		[
			'condition' => ['path' => 'design.elements_hive.mouse_cursors.cursor_type', 'operand' => 'equals', 'value' => 'ink_cursor'],
			'isExternal' => true,
		],
		'popout'
	);
}
