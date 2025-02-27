<?php

namespace ElementsHiveForBreakdance\Extensions\Backlight;

add_filter( 'breakdance_element_actions', '\ElementsHiveForBreakdance\Extensions\Backlight\addActions', 100, 1 );

function addActions( $actions ) {
	$actions[] = [
		'onPropertyChange' => [
			[
				'script' => <<<JS
					( function() {
						if ( "{{design.elements_hive.backlight.enabled}}" == "false" ) return
						document.querySelector("#eh-backlight-%%ID%%")?.remove();
						const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
						svg.id = "eh-backlight-%%ID%%";
						svg.setAttribute("width", "0");
						svg.setAttribute("height", "0");

						svg.innerHTML = `
							<filter id="eh-backlight-%%ID%%-filter" y="-50%" x="-50%" width="200%" height="200%" colorInterpolationFilters="sRGB">
								<feGaussianBlur in="SourceGraphic" stdDeviation="{{design.elements_hive.backlight.blur|default(10)}}" result="blurred" />
								<feColorMatrix type="saturate" in="blurred" result="saturated" values="{{design.elements_hive.backlight.saturation|default(4)}}" />
								<feComposite in="SourceGraphic" operator="over" />
							</filter>
						`;
						document.body.append(svg);
					})();
				JS,
				'dependencies' => ['design.elements_hive.backlight']
			],
		],
	];

	return $actions;
}
