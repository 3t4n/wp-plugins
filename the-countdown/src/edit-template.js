/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
const { __, } = wp.i18n;
const { applyFilters, } = wp.hooks;
const { 
	PanelBody,
	SelectControl,
} = wp.components;

import { templateStyles } from './attributes.js';

import defaultTemplate from './templates/default.js';
import minimalTemplate from './templates/minimal.js';
import flipTemplate from './templates/flip.js';
import scoreboardTemplate from './templates/scoreboard.js';
import circularTemplate from './templates/circular.js';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function EditTemplate( { attributes, setAttributes } ) {

	const { 
		template,
	} = { ...attributes };

	const templates = applyFilters( 'tc_templates', [
		{
			value: "default",
			label: __( 'Default', 'the-countdown' ),
			help: "This is the default template. Please adjust available setting below to match your needs.",
			component: defaultTemplate,
		},
		{
			value: "minimal",
			label: __( 'Minimal', 'the-countdown' ),
			help: "Display a timer using inline text.",
			component: minimalTemplate,
		},
		{
			value: "flip",
			label: __( 'Flip', 'the-countdown' ),
			help: "Display a timer with flip box style.",
			component: flipTemplate,
		},
		{
			value: "scoreboard",
			label: __( 'Scoreboard', 'the-countdown' ),
			help: "Display a timer with score board style.",
			component: scoreboardTemplate,
		},
		{
			value: "circular",
			label: __( 'Circular', 'the-countdown' ),
			help: __( 'Display countdown with ticking progress bar circles. Best works with combination of days, hours, minutues and seconds', 'the-countdown' ),
			component: circularTemplate,
		},
	] );

	const changeTemplate = ( template ) => {
		setAttributes( {
			template,
			styles: { ...templateStyles[ template ] },
		} );

	}

    return (
        <>
			<PanelBody>
				<SelectControl
					label={ __( 'Template', 'the-countdown' ) }
					help={ templates.filter( tmp => tmp.value === template )[0].help }
					value={ template }
					options={ templates }
					onChange={ value => changeTemplate( value ) }
					__nextHasNoMarginBottom
				/>
			</PanelBody>

			{ templates.filter( tmp => tmp.value === template )[0].component( { attributes, setAttributes } ) }
        </>
	);
}
