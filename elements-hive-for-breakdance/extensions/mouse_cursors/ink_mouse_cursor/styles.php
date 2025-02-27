<?php

namespace ElementsHiveForBreakdance\Extensions\MouseCursors\InkMouseCursor;

add_filter( 'breakdance_element_css_template', 'ElementsHiveForBreakdance\Extensions\MouseCursors\InkMouseCursor\addStyles', 100, 1 );

/**
 * @param string $css_template
 * @return string
 */
function addStyles( $css_template ) {
	return $css_template . "\n\n" . '
        {% if design.elements_hive.mouse_cursors.cursor_type == "ink_cursor" %}
            %%SELECTOR%% .eh-ink-mouse-cursor {
                {{ macros.effects(design.elements_hive.mouse_cursors.ink_cursor) }}
                filter: url("#eh-ink-cursor__goo--%%ID%%");
                z-index: {{design.elements_hive.mouse_cursors.ink_cursor.z_index|default(1000)}};
                visibility: hidden;
            }

            %%SELECTOR%% .eh-ink-mouse-cursor span {
                {{ macros.backgroundColor( design.elements_hive.mouse_cursors.ink_cursor.color) }};
            }
        {% endif %}
    ';
}
