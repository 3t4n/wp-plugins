<?php

namespace ElementsHiveForBreakdance\Extensions\Backgrounds\WebglKineticTypography;

add_filter( 'breakdance_element_css_template', 'ElementsHiveForBreakdance\Extensions\Backgrounds\WebglKineticTypography\addStyles', 100, 1 );

/**
 * @param string $css_template
 * @return string
 */
function addStyles( $css_template ) {
	return $css_template . "\n\n" . '
        {% if design.elements_hive.backgrounds.background_type == "webgl_kinetic_typography" %}
            %%SELECTOR%% .eh-webgl-kinetic-typography-%%ID%%,
            %%SELECTOR%% .eh-webgl-kinetic-typography__canvas  {
                position: absolute;
                inset: 0;
                width: 100%;
                height: 100%;
            }

            %%SELECTOR%% .eh-webgl-kinetic-typography__canvas {
                position: sticky;
                display: block;
                max-height: 100vh;
            }

            {% if design.elements_hive.backgrounds.webgl_kinetic_typography.apply_to_page != "" %}
                {% if design.elements_hive.backgrounds.webgl_kinetic_typography.apply_to_page == true %}
                    .eh-webgl-kinetic-typography-%%ID%% {
                        position: fixed;
                        inset: 0;
                        width: 100vw;
                        height: 100vh;
                        z-index: 1;
                    }

                    .eh-webgl-kinetic-typography-%%ID%% .eh-webgl-kinetic-typography__canvas  {
                        position: relative;
                        width: 100%;
                        height: 100%;
                    }

                    .breakdance .bde-section .section-container,
                    header,
                    footer {
                        z-index: 2;
                    }
                {% endif %}
            {% endif %}

        {% endif %}
    ';
}
