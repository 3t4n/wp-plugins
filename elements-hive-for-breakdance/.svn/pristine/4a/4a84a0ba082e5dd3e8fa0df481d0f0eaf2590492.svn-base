<?php

namespace ElementsHiveForBreakdance\Extensions\Backgrounds\WebglFluid;

add_filter( 'breakdance_element_actions', '\ElementsHiveForBreakdance\Extensions\Backgrounds\WebglFluid\addActions', 100, 1 );

function addActions( $actions ) {
	$actions[] = [
		'onPropertyChange' => [
			[
				'script' => <<<JS
					( function() {
						if ('{{design.elements_hive.backgrounds.background_type}}' == 'webgl_fluid' ) {
							const containerEl = document.querySelector('%%SELECTOR%%')
							const settings = {{design.elements_hive.backgrounds.webgl_fluid|json_encode}} ?? {}
							// there must be a way to declare default values on controls declarations?? can't find any
							if(!settings?.hasOwnProperty('relative_to')) settings.relative_to = 'section'
							const fluidOptions = {
								TRIGGER: 'hover',
								IMMEDIATE: settings?.immediate ?? false,
								SPLAT_RADIUS: settings?.splat_radius ?? 0.25,
								BLOOM: settings?.bloom ?? false,
								SUNRAYS: settings?.sunrays ?? false,
								COLORFUL: settings?.color_type == 'colorful' ? true : false,
								CUSTOM_COLOR: settings?.color_type == 'custom' ? true : false,
							}
							if(!settings?.hasOwnProperty('color_type') ) fluidOptions.COLORFUL = true
							{% if not design.elements_hive.backgrounds.webgl_fluid.color is empty %}
								// There should be some function to get the value of color variables, can't find it
								if ( settings?.color != ''  && settings?.color[0] === '#' ) {
									fluidOptions.COLOR = settings?.color ?? '#FD5A00'
								} else {
									// too lazy...
									let tmpColor = settings?.color.replace('var(', '').replace(')', '')
									const colorValue = getComputedStyle(document.documentElement).getPropertyValue(tmpColor).replace(/ /g,'')
									fluidOptions.COLOR = colorValue ?? '#FD5A00'
								}
							{% endif %}
							const options = {
								container: containerEl,
								sectionContainer: containerEl.querySelector('.section-container'),
								eventsContainer: settings?.relative_to == 'section' ? containerEl : window,
								wrapperClass: 'eh-webgl-fluid__wrapper-%%ID%%',
								canvasClass: 'eh-webgl-fluid__canvas',
								isApplyToPage: settings?.relative_to == 'page' ? true : false,
								fluidOptions: fluidOptions,
								ditheringTextureUrl: '{{getElementsHivePluginUrl()}}extensions/backgrounds/webgl_fluid/assets/images/dithering_texture.png'
							}
							new EhWebglFluid(options)
						} else {
							document.querySelector('.eh-webgl-fluid__wrapper-%%ID%%')?.remove()
						}
					}());
				JS,
			],
		],
	];

	return $actions;
}
