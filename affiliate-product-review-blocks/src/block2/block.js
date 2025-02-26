/**
 * Block Name: Product List Builder
*/

//  Import CSS.
import attributes from './attributes';
import edit from './edit';
import './editor.scss';
import save from './save';
import './style.scss';

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;


/**
 * Register: Product List Builder.
 */
registerBlockType( 'mstg/product-item', {
	title: __( 'Product Item' ),
	description: __( 'Display Products in Grid View' ),
	icon: {
		src: 'ellipsis',
		foreground: '#a32a46'
	},
	category: 'mustenberg-blocks',
	parent: [ 'mstg/products-builder' ],
	keywords: [
		__( 'Product List Builder' ),
	],
	attributes, 
	edit,
	save,
} );
