<?php

namespace ElementsHiveForBreakdance\Extensions\Backgrounds\WebglSlideshow;

add_filter( 'breakdance_element_css_template', 'ElementsHiveForBreakdance\Extensions\Backgrounds\WebglSlideshow\addStyles', 100, 1 );

/**
 * @param string $css_template
 * @return string
 */
function addStyles( $css_template ) {
	return $css_template . "\n\n" . '
        {% if design.elements_hive.backgrounds.background_type == "webgl_slideshow" %}
            %%SELECTOR%%>.eh-webgl-slideshow__wrapper-%%ID%%,
            %%SELECTOR%%>.eh-webgl-slideshow__wrapper-%%ID%%>.eh-webgl-slideshow__canvas {
                position: absolute;
                inset: 0;
                width: 100%;
                height: 100%;
            }
            %%SELECTOR%%>.eh-webgl-slideshow__wrapper-%%ID%%>.eh-webgl-slideshow__canvas  {
                position: sticky;
                display: block;
                max-height: 100vh;
            }

        {% endif %}
    ';
}
