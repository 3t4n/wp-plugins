<?php

namespace ElementsHiveForBreakdance\Extensions\Backgrounds\WebglFluid;

add_filter( 'breakdance_element_css_template', 'ElementsHiveForBreakdance\Extensions\Backgrounds\WebglFluid\addStyles', 100, 1 );

/**
 * @param string $css_template
 * @return string
 */
function addStyles( $css_template ) {
	return $css_template . "\n\n" . '
        {% if design.elements_hive.backgrounds.background_type == "webgl_fluid" %}
            %%SELECTOR%% .eh-webgl-fluid__wrapper-%%ID%%,
            %%SELECTOR%% .eh-webgl-fluid__canvas  {
                position: absolute;
                inset: 0;
                width: 100%;
                height: 100%;
            }

            %%SELECTOR%% .eh-webgl-fluid__canvas {
                position: sticky;
                display: block;
                max-height: 100vh;
            }

            {% if design.elements_hive.backgrounds.webgl_fluid.relative_to == "page" %}
                .eh-webgl-fluid__wrapper-%%ID%% {
                    position: fixed;
                    inset: 0;
                    width: 100vw;
                    height: 100vh;
                    z-index: 1;
                }

                .eh-webgl-fluid__wrapper-%%ID%% .eh-webgl-fluid__canvas  {
                    position: relative;
                    width: 100%;
                    height: 100%;
                }

                .breakdance .bde-section .section-container {
                    z-index: 2;
                }
            {% endif %}

        {% endif %}
    ';
}
