<?php

namespace ElementsHiveForBreakdance\Extensions\MouseCursors\MagneticMouseCursor;

add_filter( 'breakdance_element_dependencies', 'ElementsHiveForBreakdance\Extensions\MouseCursors\MagneticMouseCursor\addDependencies', 100, 1 );

/**
 * @param ElementDependenciesAndConditions[] $deps
 * @return ElementDependenciesAndConditions[]
 */
function addDependencies( $deps ) {
	$condition = "
		{% set cursorType = design.elements_hive.mouse_cursors.cursor_type %}
		return {{ cursorType == 'magnetic_cursor' ? true : false }};
	";
	$deps[] = [
		'frontendCondition' => $condition,
		'builderCondition' => $condition,
		'scripts' => [
			'%%BREAKDANCE_REUSABLE_GSAP%%',
		],
	];

	// $deps[] = [
	// 	'frontendCondition' => $condition,
	// 	'builderCondition' => $condition,
	// 	'scripts' => [
	// 		ELEMENTS_HIVE_DIR . 'extensions/mouse_cursors/magnetic_mouse_cursor/assets/js/eh_magnetic_cursor.min.js',
	// 	],
	// ];

	$deps[] = [
		'frontendCondition' => $condition,
		'builderCondition' => $condition,
		'inlineStyles' => [
			'
			  .eh-magnetic-cursor-outer,
			  .eh-magnetic-cursor-inner {
			   position: fixed;
			   display: block;
			   top: 0;
			   left: 0;
			   pointer-events: none;
			}

			.eh-magnetic-cursor-outer {
				border-style: solid;
			}

			 {% if design.elements_hive.mouse_cursors.magnetic_cursor.apply_to_page != "" %}
				{% if design.elements_hive.mouse_cursors.magnetic_cursor.apply_to_page  == false %}
					%%SELECTOR%% {
						cursor: none;
					}
				{% else %}
					body {
						cursor: none;
					}
				{% endif %}
			{% else %}
				%%SELECTOR%% {
					cursor: none;
				}
			{% endif %}
			',
		],
	];

	$deps[] = [
		'frontendCondition' => $condition,
		'builderCondition' => $condition,
		'inlineScripts' => [
			'
			 ( function() {
				// const isTouchDevice = "ontouchstart" in window ? true : false;
				// if (!isTouchDevice) init();

				function isTouchDevice() {
					if (window.matchMedia(`(pointer: fine)`).matches) return false;
					if (`standalone` in navigator) return true;
					if (window.matchMedia(`(pointer: coarse)`).matches) return true;
					return `ontouchstart` in window || navigator.maxTouchPoints > 0;
				}
				if (!isTouchDevice()) init();

				async function init() {
					await import("{{getElementsHivePluginUrl()}}extensions/mouse_cursors/magnetic_mouse_cursor/assets/js/eh_magnetic_cursor.min.js");
					const containerElement = document.querySelector("%%SELECTOR%%");
					let isRelativeToPage = false;
					{% if design.elements_hive.mouse_cursors.magnetic_cursor.apply_to_page != "" %}
						isRelativeToPage = {{ design.elements_hive.mouse_cursors.magnetic_cursor.apply_to_page|default(false)}};
					{% endif %}
					const options = {
						parent: containerElement,
						forIdClass: "eh-for-%%ID%%",
						additionalSelectors: {{ design.elements_hive.mouse_cursors.magnetic_cursor.additional_selectors|json_encode() }},
						outerElOriginalState: {
							width: {{ design.elements_hive.mouse_cursors.magnetic_cursor.outer_container.width.number|default(50)}},
							height: {{ design.elements_hive.mouse_cursors.magnetic_cursor.outer_container.height.number|default(50)}},
							borderRadius: {{ design.elements_hive.mouse_cursors.magnetic_cursor.outer_container.border_radius.number|default(200)}},
						},
						domContainer: isRelativeToPage ? document.body : containerElement,
						eventsContainer: isRelativeToPage ? window : containerElement,
						isRelativeToPage
					}
					new EhMagneticCursor(options);
				}
			}());
			',
		],
	];

	return $deps;
}
