<?php

namespace ElementsHiveForBreakdance\Extensions\MouseCursors\MagneticMouseCursor;

add_filter( 'breakdance_element_css_template', 'ElementsHiveForBreakdance\Extensions\MouseCursors\MagneticMouseCursor\addStyles', 100, 1 );

/**
 * @param string $css_template
 * @return string
 */
function addStyles( $css_template ) {
	return $css_template . "\n\n" . '
        {% if design.elements_hive.mouse_cursors.cursor_type == "magnetic_cursor" %}
            .eh-magnetic-cursor-outer.eh-for-%%ID%% {
                width: {{design.elements_hive.mouse_cursors.magnetic_cursor.outer_container.width.style|default("50px")}};
                height: {{design.elements_hive.mouse_cursors.magnetic_cursor.outer_container.height.style|default("50px")}};
                border-radius: {{design.elements_hive.mouse_cursors.magnetic_cursor.outer_container.border_radius.style|default("200px")}};
                border-color: {{design.elements_hive.mouse_cursors.magnetic_cursor.outer_container.color|default("#000000")}};
                border-width: {{design.elements_hive.mouse_cursors.magnetic_cursor.outer_container.stroke_size|default("1px")}};
                z-index: {{design.elements_hive.mouse_cursors.magnetic_cursor.z_index|default("inherit")}};
            }

            .eh-magnetic-cursor-inner.eh-for-%%ID%% {
                width: {{design.elements_hive.mouse_cursors.magnetic_cursor.inner_container.width.style|default("20px")}};
                height: {{design.elements_hive.mouse_cursors.magnetic_cursor.inner_container.height.style|default("20px")}};
                border-radius: {{design.elements_hive.mouse_cursors.magnetic_cursor.inner_container.border_radius.style|default("200px")}};
                /*background-color: {{design.elements_hive.mouse_cursors.magnetic_cursor.inner_container.background_color|default("#fd5a00")}};*/
                {{ macros.backgroundColor(design.elements_hive.mouse_cursors.magnetic_cursor.inner_container.background_color|default("#fd5a00")) }}
                z-index: {{design.elements_hive.mouse_cursors.magnetic_cursor.z_index|default("inherit")}};
            }
        {% endif %}
    ';
}
