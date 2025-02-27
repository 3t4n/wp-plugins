<?php

namespace ElementsHiveForBreakdance\Extensions\Backlight;

add_filter( 'breakdance_element_css_template', 'ElementsHiveForBreakdance\Extensions\Backlight\addStyles', 100, 1 );

/**
 * @param string $css_template
 * @return string
 */
function addStyles( $css_template ) {
	return $css_template . "\n\n" . '
        {% if design.elements_hive.backlight.enabled %}
            %%SELECTOR%% {
                filter: url(#eh-backlight-%%ID%%-filter);
            }
        {% endif %}
    ';
}
