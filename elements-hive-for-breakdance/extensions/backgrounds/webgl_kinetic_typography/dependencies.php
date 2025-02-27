<?php

namespace ElementsHiveForBreakdance\Extensions\Backgrounds\WebglKineticTypography;

add_filter( 'breakdance_element_dependencies', 'ElementsHiveForBreakdance\Extensions\Backgrounds\WebglKineticTypography\addDependencies', 100, 1 );

/**
 * @param ElementDependenciesAndConditions[] $deps
 * @return ElementDependenciesAndConditions[]
 */
function addDependencies( $deps ) {
	$condition = "
		{% set backgroundType = design.elements_hive.backgrounds.background_type %}
		return {{ backgroundType == 'webgl_kinetic_typography' ? 'true' : 'false' }};
	";
	$conditionWithoutTouch = "
		{% set backgroundType = design.elements_hive.backgrounds.background_type %}
		{% set disableOnTouch = design.elements_hive.backgrounds.webgl_kinetic_typography.disable_on_touch_devices|default(false) %}
		{% if backgroundType == 'webgl_kinetic_typography' and disableOnTouch == false %}
			return true;
		{% else %}
			return false;
		{% endif %}
	";
	$conditionWithTouch = "
		{% set backgroundType = design.elements_hive.backgrounds.background_type %}
		{% set disableOnTouch = design.elements_hive.backgrounds.webgl_kinetic_typography.disable_on_touch_devices|default(false) %}
		{% if backgroundType == 'webgl_kinetic_typography' and disableOnTouch == true %}
			return true;
		{% else %}
			return false;
		{% endif %}
	";
	$deps[] = [
		'frontendCondition' => 'return false;',
		'builderCondition' => $condition,
		'scripts' => [
			ELEMENTS_HIVE_DIR . 'assets/js/utils/eh_instances_manager.js',
		],
	];
	$deps[] = [
		'frontendCondition' => $conditionWithoutTouch,
		'builderCondition' => $condition,
		'scripts' => [
			ELEMENTS_HIVE_DIR . 'assets/js/vendors/threejs/three.min.js',
		],
	];
	$deps[] = [
		'frontendCondition' => $conditionWithoutTouch,
		'builderCondition' => $condition,
		'scripts' => [
			ELEMENTS_HIVE_DIR . 'extensions/backgrounds/webgl_kinetic_typography/assets/js/eh_webgl_kinetic_typography.min.js',
		],
	];
	$deps[] = [
		'frontendCondition' => 'return false;',
		'builderCondition' => $condition,
		'inlineScripts' => [
			'
			 ( function() {

				const containerEl = document.querySelector("%%SELECTOR%%");
				const settings = {{design.elements_hive.backgrounds.webgl_kinetic_typography|json_encode}} ?? {};

				if (!containerEl ) return;

  				if ( window.EhInstancesManager.instanceExists("EhWebglKineticTypography", "%%ID%%") ) return;

				const options = {
					containerEl: containerEl,
					sectionContainer: containerEl.querySelector(".section-container"),
					eventsContainer: settings?.apply_to_page ? window : containerEl,
					id: %%ID%%,
					placeholderImage: "{{getElementsHivePluginUrl()}}assets/images/placeholders/elements-hive-text.jpg",
					...settings
				}

				const instance = new EhWebglKineticTypography(options);
				window.EhInstancesManager.registerInstance("EhWebglKineticTypography", "%%ID%%", instance);

				const resizeObserver = new ResizeObserver( (entries) => {
					setTimeout( () => {
						instance.onResize()
					}, 500 );
				});

				resizeObserver.observe(containerEl.parentElement);

			}());
			',
		],
	];
	$deps[] = [
		'frontendCondition' => $conditionWithTouch,
		'builderCondition' => 'return false;',
		'inlineScripts' => [
			'
			 ( function() {

			 	function isTouchDevice() {
					if (window.matchMedia(`(pointer: fine)`).matches) return false;
					if (`standalone` in navigator) return true;
					if (window.matchMedia(`(pointer: coarse)`).matches) return true;
					return `ontouchstart` in window || navigator.maxTouchPoints > 0;
				}

				const containerEl = document.querySelector("%%SELECTOR%%");
				const settings = {{design.elements_hive.backgrounds.webgl_kinetic_typography|json_encode}} ?? {};

				if (!containerEl ) return;

				// if ( settings?.disable_on_touch_devices && "ontouchstart" in window ) return;
				if ( settings?.disable_on_touch_devices && isTouchDevice() ) return;

				function init() {
    const options = {
        containerEl: containerEl,
        sectionContainer: containerEl.querySelector(".section-container"),
        eventsContainer: settings?.apply_to_page ? window : containerEl,
        id: %%ID%%,
        placeholderImage: "{{getElementsHivePluginUrl()}}assets/images/placeholders/elements-hive-text.jpg",
        ...settings
    }
    new EhWebglKineticTypography(options);
}

async function loadModules() {
    const threejsPath = "{{getElementsHivePluginUrl()}}assets/js/vendors/threejs/three.min.js";
    const modulePath = "{{getElementsHivePluginUrl()}}extensions/backgrounds/webgl_kinetic_typography/assets/js/eh_webgl_kinetic_typography.min.js";

    await Promise.all([
        import(threejsPath),
        import(modulePath),
    ]);
}

async function initialize() {
    await loadModules()
	init()
}

initialize();

			}());
			',
		],
	];
	$deps[] = [
		'frontendCondition' => $conditionWithoutTouch,
		'builderCondition' => 'return false;',
		'inlineScripts' => [
			'
			 ( function() {

				const containerEl = document.querySelector("%%SELECTOR%%");
				const settings = {{design.elements_hive.backgrounds.webgl_kinetic_typography|json_encode}} ?? {};

				if (!containerEl ) return;

				const options = {
					containerEl: containerEl,
					sectionContainer: containerEl.querySelector(".section-container"),
					eventsContainer: settings?.apply_to_page ? window : containerEl,
					id: %%ID%%,
					placeholderImage: "{{getElementsHivePluginUrl()}}assets/images/placeholders/elements-hive-text.jpg",
					...settings
				}
				new EhWebglKineticTypography(options);


			}());
			',
		],
	];

	return $deps;
}
