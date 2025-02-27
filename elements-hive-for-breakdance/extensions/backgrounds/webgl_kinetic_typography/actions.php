<?php

namespace ElementsHiveForBreakdance\Extensions\Backgrounds\WebglKineticTypography;

add_filter( 'breakdance_element_actions', '\ElementsHiveForBreakdance\Extensions\Backgrounds\WebglKineticTypography\addActions', 100, 1 );

function addActions( $actions ) {
	$actions[] = [
		'onPropertyChange' => [
			[
				'script' => <<<JS
					( function() {
						if ('{{design.elements_hive.backgrounds.background_type}}' == 'webgl_kinetic_typography' ) {
							const containerEl = document.querySelector('%%SELECTOR%%')
							const settings = {{design.elements_hive.backgrounds.webgl_kinetic_typography|json_encode}} ?? {}
							let instance = null
							if ( window.EhInstancesManager.instanceExists('EhWebglKineticTypography', '%%ID%%') ) {
								instance = window.EhInstancesManager.getInstance('EhWebglKineticTypography', '%%ID%%')
								instance.update(settings)
							} else {
								const options = {
									containerEl: containerEl,
									sectionContainer: containerEl.querySelector('.section-container'),
									eventsContainer: settings?.apply_to_page ? window : containerEl,
									id: %%ID%%,
									placeholderImage: "{{getElementsHivePluginUrl()}}assets/images/placeholders/elements-hive-text.jpg",
									...settings
								}
								const instance = new EhWebglKineticTypography(options)
								window.EhInstancesManager.registerInstance("EhWebglKineticTypography", "%%ID%%", instance)
							}
						} else {
							if ( window?.EhInstancesManager?.instanceExists('EhWebglKineticTypography', '%%ID%%') ) {
								window.EhInstancesManager.deleteInstance('EhWebglKineticTypography', '%%ID%%')
							}
							document.querySelector('.eh-webgl-kinetic-typography-%%ID%%')?.remove()
						}
					}());
				JS,
			],
		],
	];

	return $actions;
}
