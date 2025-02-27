<?php

namespace ElementsHiveForBreakdance\Extensions\Backgrounds\WebglFluid;

add_filter( 'breakdance_element_dependencies', 'ElementsHiveForBreakdance\Extensions\Backgrounds\WebglFluid\addDependencies', 100, 1 );

/**
 * @param ElementDependenciesAndConditions[] $deps
 * @return ElementDependenciesAndConditions[]
 */
function addDependencies( $deps ) {
	$condition = "
		{% set backgroundType = design.elements_hive.backgrounds.background_type %}
		return {{ backgroundType == 'webgl_fluid' ? 'true' : 'false' }};
	";
	$conditionWithoutTouch = "
		{% set backgroundType = design.elements_hive.backgrounds.background_type %}
		{% set disableOnTouch = design.elements_hive.backgrounds.webgl_fluid.disable_on_touch_devices|default(false) %}
		{% if backgroundType == 'webgl_fluid' and disableOnTouch == false %}
			return true;
		{% else %}
			return false;
		{% endif %}
	";
	$conditionWithTouch = "
		{% set backgroundType = design.elements_hive.backgrounds.background_type %}
		{% set disableOnTouch = design.elements_hive.backgrounds.webgl_fluid.disable_on_touch_devices|default(false) %}
		{% if backgroundType == 'webgl_fluid' and disableOnTouch == true %}
			return true;
		{% else %}
			return false;
		{% endif %}
	";
	$deps[] = [
		'frontendCondition' => $conditionWithoutTouch,
		'builderCondition' => $condition,
		'scripts' => [
			ELEMENTS_HIVE_DIR . 'extensions/backgrounds/webgl_fluid/assets/js/eh_webgl_fluid.min.js',
		],
	];
	$deps[] = [
		'frontendCondition' => 'return false;',
		'builderCondition' => $condition,
		'inlineScripts' => [
			"
			 ( function() {

				const containerEl = document.querySelector('%%SELECTOR%%');
				const settings = {{design.elements_hive.backgrounds.webgl_fluid|json_encode}} ?? {};

				// there must be a way to declare default values on controls declarations?? can't find any
				if(!settings?.hasOwnProperty('relative_to')) settings.relative_to = 'section';

				const fluidOptions = {
					TRIGGER: 'hover',
					IMMEDIATE: settings?.immediate ?? false,
					SPLAT_RADIUS: settings?.splat_radius ?? 0.25,
					BLOOM: settings?.bloom ?? false,
					SUNRAYS: settings?.sunrays ?? false,
					COLORFUL: settings?.color_type == 'colorful' ? true : false,
					CUSTOM_COLOR: settings?.color_type == 'custom' ? true : false,
				}

				if(!settings?.hasOwnProperty('color_type') ) fluidOptions.COLORFUL = true;

				{% if not design.elements_hive.backgrounds.webgl_fluid.color is empty %}
					// There should be some function to get the value of color variables, can't find it
					if ( settings?.color != ''  && settings?.color[0] === '#' ) {
						fluidOptions.COLOR = settings?.color ?? '#FD5A00';
					} else {
						// too lazy...
						let tmpColor = settings?.color.replace('var(', '').replace(')', '');
						const colorValue = getComputedStyle(document.documentElement).getPropertyValue(tmpColor).replace(/ /g,'');
						fluidOptions.COLOR = colorValue ?? '#FD5A00';
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

				new EhWebglFluid(options);
			}());
			",
		],
	];
	$deps[] = [
		'frontendCondition' => $conditionWithTouch,
		'builderCondition' => 'return false;',
		'inlineScripts' => [
			"
			 ( async function() {

			 	function isTouchDevice() {
					if (window.matchMedia(`(pointer: fine)`).matches) return false;
					if (`standalone` in navigator) return true;
					if (window.matchMedia(`(pointer: coarse)`).matches) return true;
					return `ontouchstart` in window || navigator.maxTouchPoints > 0;
				}

				const containerEl = document.querySelector('%%SELECTOR%%');
				const settings = {{design.elements_hive.backgrounds.webgl_fluid|json_encode}} ?? {};

				//if ( settings?.disable_on_touch_devices && 'ontouchstart' in window ) return;

				if ( settings?.disable_on_touch_devices && isTouchDevice() ) return;

				function init() {
					// there must be a way to declare default values on controls declarations?? can't find any
					if(!settings?.hasOwnProperty('relative_to')) settings.relative_to = 'section';

					const fluidOptions = {
						TRIGGER: 'hover',
						IMMEDIATE: settings?.immediate ?? false,
						SPLAT_RADIUS: settings?.splat_radius ?? 0.25,
						BLOOM: settings?.bloom ?? false,
						SUNRAYS: settings?.sunrays ?? false,
						COLORFUL: settings?.color_type == 'colorful' ? true : false,
						CUSTOM_COLOR: settings?.color_type == 'custom' ? true : false,
					}

					if(!settings?.hasOwnProperty('color_type') ) fluidOptions.COLORFUL = true;

					{% if not design.elements_hive.backgrounds.webgl_fluid.color is empty %}
						// There should be some function to get the value of color variables, can't find it
						if ( settings?.color != ''  && settings?.color[0] === '#' ) {
							fluidOptions.COLOR = settings?.color ?? '#FD5A00';
						} else {
							// too lazy...
							let tmpColor = settings?.color.replace('var(', '').replace(')', '');
							const colorValue = getComputedStyle(document.documentElement).getPropertyValue(tmpColor).replace(/ /g,'');
							fluidOptions.COLOR = colorValue ?? '#FD5A00';
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

					new EhWebglFluid(options);
				}

				const modulePath = '{{getElementsHivePluginUrl()}}extensions/backgrounds/webgl_fluid/assets/js/eh_webgl_fluid.min.js';

				await import(modulePath)
				init()

			}());
			",
		],
	];

	$deps[] = [
		'frontendCondition' => $conditionWithoutTouch,
		'builderCondition' => 'return false;',
		'inlineScripts' => [
			"
			 ( function() {

				const containerEl = document.querySelector('%%SELECTOR%%');
				const settings = {{design.elements_hive.backgrounds.webgl_fluid|json_encode}} ?? {};

				function init() {
					// there must be a way to declare default values on controls declarations?? can't find any
					if(!settings?.hasOwnProperty('relative_to')) settings.relative_to = 'section';

					const fluidOptions = {
						TRIGGER: 'hover',
						IMMEDIATE: settings?.immediate ?? false,
						SPLAT_RADIUS: settings?.splat_radius ?? 0.25,
						BLOOM: settings?.bloom ?? false,
						SUNRAYS: settings?.sunrays ?? false,
						COLORFUL: settings?.color_type == 'colorful' ? true : false,
						CUSTOM_COLOR: settings?.color_type == 'custom' ? true : false,
					}

					if(!settings?.hasOwnProperty('color_type') ) fluidOptions.COLORFUL = true;

					{% if not design.elements_hive.backgrounds.webgl_fluid.color is empty %}
						// There should be some function to get the value of color variables, can't find it
						if ( settings?.color != ''  && settings?.color[0] === '#' ) {
							fluidOptions.COLOR = settings?.color ?? '#FD5A00';
						} else {
							// too lazy...
							let tmpColor = settings?.color.replace('var(', '').replace(')', '');
							const colorValue = getComputedStyle(document.documentElement).getPropertyValue(tmpColor).replace(/ /g,'');
							fluidOptions.COLOR = colorValue ?? '#FD5A00';
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

					new EhWebglFluid(options);
				}

				init()




			}());
			",
		],
	];

	return $deps;
}
