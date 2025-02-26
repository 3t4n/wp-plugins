
import { registerBlockType } from '@wordpress/blocks';
import './style.scss';

/**
 * Internal dependencies
 */
import icon from './icon';
import Edit from './edit';
import save from './save';
import attributes from './attributes';


registerBlockType( 'featurebox/feature-box', {
	icon,
	attributes,
	example: {},

	/**
	 * @see ./edit.js
	 */
	edit: Edit,

	/**
	 * @see ./save.js
	 */
	save,
} );
