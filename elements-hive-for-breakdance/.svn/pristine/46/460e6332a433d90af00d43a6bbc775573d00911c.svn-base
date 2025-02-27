<?php

namespace ElementsHiveForBreakdance\Extensions\MouseCursors;

use function Breakdance\Elements\control;
use function Breakdance\Elements\controlSection;

/**
 * @return Control
 */
function controls() {
	/** @var Control */
	return controlSection(
		'mouse_cursors',
		'Mouse Cursors',
		[
			control(
				'cursor_type',
				'Cursor Type',
				[
					'type' => 'dropdown',
					'layout' => 'inline',
					'items' => [
						'0' => ['text' => 'Ink Cursor', 'value' => 'ink_cursor'],
						'1' => ['text' => 'Magnetic Cursor', 'value' => 'magnetic_cursor'],
					],
				],
			),
			\ElementsHiveForBreakdance\Extensions\MouseCursors\InkMouseCursor\controls(),
			\ElementsHiveForBreakdance\Extensions\MouseCursors\MagneticMouseCursor\controls(),
		],
		[ 'isExternal' => true ],
		'popout'
	);
}

