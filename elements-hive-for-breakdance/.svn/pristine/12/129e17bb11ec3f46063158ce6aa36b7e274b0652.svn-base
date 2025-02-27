<?php

namespace ElementsHiveForBreakdance\Extensions\MouseCursors\InkMouseCursor;

add_filter( 'breakdance_element_actions', '\ElementsHiveForBreakdance\Extensions\MouseCursors\InkMouseCursor\addActions', 100, 1 );

function addActions( $actions ) {
	$actions[] = [
		'onPropertyChange' => [
			[
				'script' => <<<JS
					( function() {
						if ( '{{design.elements_hive.mouse_cursors.cursor_type}}' == 'ink_cursor' ) {
							const containerElement = document.querySelector('%%SELECTOR%%')
							document.querySelector('.eh-ink-mouse-cursor.eh-for--%%ID%%')?.remove()
							document.querySelector('.eh-ink-mouse-cursor__svg.eh-for--%%ID%%')?.remove()
							function addMarkup() {
								const svgFilter = `
										<defs>
											<filter id='eh-ink-mouse-cursor__goo--%%ID%%'>
												<feGaussianBlur in='SourceGraphic' stdDeviation='6' result='blur' />
												<feColorMatrix in='blur' mode='matrix' values='1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 35 -15' result='goo' />
												<feComposite in='SourceGraphic' in2='goo' operator='atop'/>
											</filter>
										</defs>
								`
								const svgTag = document.createElement('svg')
								svgTag.classList.add('eh-ink-mouse-cursor__svg', 'eh-for--%%ID%%')
								svgTag.innerHTML = svgFilter
								containerElement.append(svgTag)
								const containerTag = document.createElement('div')
								containerTag.classList.add('eh-ink-mouse-cursor', 'eh-for--%%ID%%')
								containerElement.append(containerTag)
								{{ design.elements_hive.mouse_cursors.ink_cursor.apply_to_page|default(false) }} ? containerTag.style.position = 'fixed' : null
							}
							function init() {
								const options = {
									parent: {{ design.elements_hive.mouse_cursors.ink_cursor.apply_to_page|default(false) }} ? window : containerElement,
									container: containerElement.querySelector('.eh-ink-mouse-cursor'),
									isRelativeToPage: {{ design.elements_hive.mouse_cursors.ink_cursor.apply_to_page|default(false) }},
									sizeFactor: {{ design.elements_hive.mouse_cursors.ink_cursor.size|default(1) }}
								}
								{% if design.elements_hive.mouse_cursors.ink_cursor.cursor_style|default('drop') == 'drop' %}
									options.amount = 20
									options.sine = {% if design.elements_hive.mouse_cursors.ink_cursor.oscillate_on_idle %} 4 / options.sizeFactor; {% else %} 20; {% endif %}
									options.idleTimeout = 150
								{% elseif design.elements_hive.mouse_cursors.ink_cursor.cursor_style == 'track' %}
									options.amount = 40
									options.sine = {% if design.elements_hive.mouse_cursors.ink_cursor.oscillate_on_idle %} 8 / options.sizeFactor; {% else %} 40; {% endif %}
									options.idleTimeout = 500
								{% elseif design.elements_hive.mouse_cursors.ink_cursor.cursor_style == 'droplet' %}
									options.amount = 30
									options.sine = {% if design.elements_hive.mouse_cursors.ink_cursor.oscillate_on_idle %} 5 / options.sizeFactor; {% else %} 30; {% endif %}
									options.idleTimeout = 500
								{% endif %}
								new EhInkCursor(options)
							}
							addMarkup()
							init()
						} else {
							document.querySelector('%%SELECTOR%% .eh-ink-mouse-cursor')?.remove()
							document.querySelector('%%SELECTOR%% .eh-ink-mouse-cursor__svg')?.remove()
						}
					}()
				);
				JS,
			],
		],
	];

	return $actions;
}
