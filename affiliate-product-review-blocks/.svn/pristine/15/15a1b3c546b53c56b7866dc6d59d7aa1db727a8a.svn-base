/**
 * Block Name: Test Block
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
 * Register: Product Showcase Block.
 */
registerBlockType( 'mstg/review-box', {
	title: __( 'Review Box' ),
	description: __( 'Show Product in Box with its necessary information' ),
	icon: {
		src: 'analytics',
		foreground: '#a32a46'
	},
	category: 'mustenberg-blocks',
	example: {
		attributes: {
			enableContainerBorder: true,
			containerBorderColor: '#335AB9',
			containerBorderWidth: 5,
			enableContainerBoxShadow: false,
			showBadge: true,
			badgeLabel: 'Badge',
			badgeColor: '#ffffff',
			badgeBackgroundColor: '#335AB9',
			alt: 'Musterberg Logo',
			id: 1,
			title: 'Product Title',
			titleTag: 'h2',
			titleColor: '#D5343A',
			showSubTitle: true,
			subTitle: 'Sub Title',
			subTitleTag: 'h3',
			subTitleColor: '#000000',
			description: 'Product Description',
			descColor: '#000000'
		}
	},
	keywords: [
		__( 'Product Box' ),
		__( 'Review Box' ),
	],
	attributes, 
	edit,
	save,
} );
