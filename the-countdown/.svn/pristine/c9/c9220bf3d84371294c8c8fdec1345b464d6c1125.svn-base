/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';

/**
 * Internal dependencies
 */
import { attributes } from './attributes';
import Edit from './edit';
import Save from './save';
import metadata from './block.json';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './style.scss';

/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
registerBlockType( metadata.name, {
	title: __( 'The Countdown', 'the-countdown' ),
	/**
	 * @see ./attributes.js
	 */
    attributes,
	/**
	 * @see ./edit.js
	 */
	edit: ( { attributes, setAttributes, clientId } ) => Edit( { attributes, setAttributes, clientId } ),

	/**
	 * @see ./save.js
	 */
	save: ( { attributes } ) => Save( { attributes } ),
} );

