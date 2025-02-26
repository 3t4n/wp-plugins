import { registerBlockType } from '@wordpress/blocks';
import './style.scss';

import metadata from './block.json';

/**
 * Internal dependencies
 */
import Edit from './edit';
import Save from './save';

/**
 * Block Registration
 */

registerBlockType(metadata, {
	icon: {
		background: '#ffb900',
		foreground: '#000000',
		src: 'star-filled',
	},
	edit: Edit,
	save: Save,
});
