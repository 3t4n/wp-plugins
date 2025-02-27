<?php

namespace ElementsHiveForBreakdance\Extensions\Backgrounds\WebglSlideshow;

add_filter( 'breakdance_element_dependencies', 'ElementsHiveForBreakdance\Extensions\Backgrounds\WebglSlideshow\addDependencies', 100, 1 );

/**
 * @param ElementDependenciesAndConditions[] $deps
 * @return ElementDependenciesAndConditions[]
 */
function addDependencies( $deps ) {
	$condition = "
		{% set backgroundType = design.elements_hive.backgrounds.background_type %}
		return {{ backgroundType == 'webgl_slideshow' ? 'true' : 'false' }};
	";
	$conditionWithoutTouch = "
		{% set backgroundType = design.elements_hive.backgrounds.background_type %}
		{% set disableOnTouch = design.elements_hive.backgrounds.webgl_slideshow.disable_on_touch_devices|default(false) %}
		{% if backgroundType == 'webgl_slideshow' and disableOnTouch == false %}
			return true;
		{% else %}
			return false;
		{% endif %}
	";
	$conditionWithTouch = "
		{% set backgroundType = design.elements_hive.backgrounds.background_type %}
		{% set disableOnTouch = design.elements_hive.backgrounds.webgl_slideshow.disable_on_touch_devices|default(false) %}
		{% if backgroundType == 'webgl_slideshow' and disableOnTouch == true %}
			return true;
		{% else %}
			return false;
		{% endif %}
	";
	$deps[] = [
		'frontendCondition' => $conditionWithoutTouch,
		'builderCondition' => $condition,
		'scripts' => [
			ELEMENTS_HIVE_DIR . 'elements/WebGL_Slideshow/assets/js/eh_webgl_slideshow.min.js',
		],
	];
	$deps[] = [
		'frontendCondition' => 'return false;',
		'builderCondition' => $condition,
		'inlineScripts' => [
			"
			 ( function() {

				const containerEl = document.querySelector('%%SELECTOR%%');
				if (!containerEl) return;

				if (containerEl.querySelector('.eh-webgl-slideshow__wrapper-%%ID%%') ) return;

				initEhSlideshow();

				function initEhSlideshow() {

					const settings = {{design.elements_hive.backgrounds.webgl_slideshow|json_encode}} || {};

					if(!settings?.hasOwnProperty('effects') ) {
						settings.effects = {};
						settings.effects.effect = 'blend-wave';
					}

					const wrapper = document.createElement('div');
					wrapper.classList.add('eh-webgl-slideshow__wrapper-%%ID%%');
					containerEl.insertAdjacentElement('afterbegin', wrapper);

					const canvas = document.createElement('canvas');
					canvas.classList.add('eh-webgl-slideshow__canvas');
					wrapper.append(canvas);

					const images = [];

					if(settings?.hasOwnProperty('images') ) {
						settings?.images?.images?.forEach ( image => {
							images.push(image.url);
						})
					} else {
						images.push( '{{getElementsHivePluginUrl()}}assets/images/placeholders/render_1.webp' );
						images.push( '{{getElementsHivePluginUrl()}}assets/images/placeholders/render_2.webp' );
						images.push( '{{getElementsHivePluginUrl()}}assets/images/placeholders/render_3.webp' );
					}

					const options = {
						parent: wrapper,
						canvas: canvas,
						effect: settings?.effects?.effect,
						direction: settings?.effects?.direction || 0,
						invert: settings?.effects?.invert || 0,
						blurLevel: settings?.effects?.blur_level?.number || 0,
						scale: settings?.effects?.scale?.number || 10,
						duration: settings?.timing?.transition_duration?.number || 1500,
						interval: settings?.timing?.transition_interval?.number || 3000,
						isExtension: true,
						images
					}

					new EhWebglSlideShow(options);

				}
			}());
			",
		],
	];
	$deps[] = [
		'frontendCondition' => $conditionWithTouch,
		'builderCondition' => 'return false;',
		'inlineScripts' => [
			"
			 ( function() {
			  	function isTouchDevice() {
					if (window.matchMedia(`(pointer: fine)`).matches) return false;
					if (`standalone` in navigator) return true;
					if (window.matchMedia(`(pointer: coarse)`).matches) return true;
					return `ontouchstart` in window || navigator.maxTouchPoints > 0;
				}
				const containerEl = document.querySelector('%%SELECTOR%%');
				if (!containerEl) return;

				if (containerEl.querySelector('.eh-webgl-slideshow__wrapper-%%ID%%') ) return;

				const settings = {{design.elements_hive.backgrounds.webgl_slideshow|json_encode}} || {};

				// if ( settings?.disable_on_touch_devices && 'ontouchstart' in window ) return;
				if ( settings?.disable_on_touch_devices && isTouchDevice() ) return;

				function init() {

					if(!settings?.hasOwnProperty('effects') ) {
						settings.effects = {};
						settings.effects.effect = 'blend-wave';
					}

					const wrapper = document.createElement('div');
					wrapper.classList.add('eh-webgl-slideshow__wrapper-%%ID%%');
					containerEl.insertAdjacentElement('afterbegin', wrapper);

					const canvas = document.createElement('canvas');
					canvas.classList.add('eh-webgl-slideshow__canvas');
					wrapper.append(canvas);

					const images = [];

					if(settings?.hasOwnProperty('images') ) {
						settings?.images?.images?.forEach ( image => {
							images.push(image.url);
						})
					} else {
						images.push( '{{getElementsHivePluginUrl()}}assets/images/placeholders/render_1.webp' );
						images.push( '{{getElementsHivePluginUrl()}}assets/images/placeholders/render_2.webp' );
						images.push( '{{getElementsHivePluginUrl()}}assets/images/placeholders/render_3.webp' );
					}

					const options = {
						parent: wrapper,
						canvas: canvas,
						effect: settings?.effects?.effect,
						direction: settings?.effects?.direction || 0,
						invert: settings?.effects?.invert || 0,
						blurLevel: settings?.effects?.blur_level?.number || 0,
						scale: settings?.effects?.scale?.number || 10,
						duration: settings?.timing?.transition_duration?.number || 1500,
						interval: settings?.timing?.transition_interval?.number || 3000,
						isExtension: true,
						images
					}

					new EhWebglSlideShow(options);

				}

				const modulePath = '{{getElementsHivePluginUrl()}}elements/WebGL_Slideshow/assets/js/eh_webgl_slideshow.min.js';

				import(modulePath)
					.then(module => {
						init();
					})
					.catch(err => {
						console.log('WebGL Slideshow Extension, could not load module', err);
					})
			}());
			",
		],
	];
	$deps[] = [
		'frontendCondition' => $conditionWithoutTouch,
		'builderCondition' => $condition,
		'inlineScripts' => [
			"
			 ( function() {

				const containerEl = document.querySelector('%%SELECTOR%%');
				if (!containerEl) return;

				if (containerEl.querySelector('.eh-webgl-slideshow__wrapper-%%ID%%') ) return;

				initEhSlideshow();

				function initEhSlideshow() {

					const settings = {{design.elements_hive.backgrounds.webgl_slideshow|json_encode}} || {};

					if(!settings?.hasOwnProperty('effects') ) {
						settings.effects = {};
						settings.effects.effect = 'blend-wave';
					}

					const wrapper = document.createElement('div');
					wrapper.classList.add('eh-webgl-slideshow__wrapper-%%ID%%');
					containerEl.insertAdjacentElement('afterbegin', wrapper);

					const canvas = document.createElement('canvas');
					canvas.classList.add('eh-webgl-slideshow__canvas');
					wrapper.append(canvas);

					const images = [];

					if(settings?.hasOwnProperty('images') ) {
						settings?.images?.images?.forEach ( image => {
							images.push(image.url);
						})
					} else {
						images.push( '{{getElementsHivePluginUrl()}}assets/images/placeholders/render_1.webp' );
						images.push( '{{getElementsHivePluginUrl()}}assets/images/placeholders/render_2.webp' );
						images.push( '{{getElementsHivePluginUrl()}}assets/images/placeholders/render_3.webp' );
					}

					const options = {
						parent: wrapper,
						canvas: canvas,
						effect: settings?.effects?.effect,
						direction: settings?.effects?.direction || 0,
						invert: settings?.effects?.invert || 0,
						blurLevel: settings?.effects?.blur_level?.number || 0,
						scale: settings?.effects?.scale?.number || 10,
						duration: settings?.timing?.transition_duration?.number || 1500,
						interval: settings?.timing?.transition_interval?.number || 3000,
						isExtension: true,
						images
					}

					new EhWebglSlideShow(options);

				}
			}());
			",
		],
	];

	return $deps;
}
