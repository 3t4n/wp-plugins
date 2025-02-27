<?php

namespace ElementsHiveForBreakdance\Extensions\MouseCursors\MagneticMouseCursor;

add_filter( 'breakdance_element_actions', '\ElementsHiveForBreakdance\Extensions\MouseCursors\MagneticMouseCursor\addActions', 100, 1 );

function addActions( $actions ) {
	$actions[] = [
		'onPropertyChange' => [
			[
				'script' => <<<JS
					( function() {
						if ( '{{design.elements_hive.mouse_cursors.cursor_type}}' == 'magnetic_cursor' ) {
							const isTouchDevice = "ontouchstart" in window ? true : false
							if (!isTouchDevice) init()
							async function init() {
								await import("{{getElementsHivePluginUrl()}}extensions/mouse_cursors/magnetic_mouse_cursor/assets/js/eh_magnetic_cursor.min.js")
								const containerElement = document.querySelector("%%SELECTOR%%")
								let isRelativeToPage = false
								{% if design.elements_hive.mouse_cursors.magnetic_cursor.apply_to_page != "" %}
									isRelativeToPage = {{ design.elements_hive.mouse_cursors.magnetic_cursor.apply_to_page|default(false)}}
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
								new EhMagneticCursor(options)
							}
						} else {
							document.querySelector('.eh-magnetic-cursor-outer.eh-for-%%ID%%')?.remove()
							document.querySelector('.eh-magnetic-cursor-inner.eh-for-%%ID%%')?.remove()
						}
					}()
				);
				JS,
			],
		],
	];

	return $actions;
}
