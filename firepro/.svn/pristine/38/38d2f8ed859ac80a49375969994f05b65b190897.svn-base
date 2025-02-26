/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/#registering-a-block
 */
import { registerBlockType } from '@wordpress/blocks';
// const el = wp.element.createElement;

/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * Media Library Interface
 *
 * @see https://github.com/WordPress/gutenberg/tree/master/packages/block-editor/src/components/media-upload
 */
// import { addFilter } from '@wordpress/hooks';
// import MediaUpload from './media-upload';
//
// const replaceMediaUpload = () => MediaUpload;
//
// addFilter(
// 	'editor.MediaUpload',
// 	'core/edit-post/components/media-upload/replace-media-upload',
// 	replaceMediaUpload
// );




/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './style.scss';

/**
 * Internal dependencies
 */
import Edit from './edit';
import save from './save';

// const iconEl = el('svg', { width: 20, height: 20 },
//   el('path', { d: "M17.66 11.2C17.43 10.9 17.15 10.64 16.89 10.38C16.22 9.78 15.46 9.35 14.82 8.72C13.33 7.26 13 4.85 13.95 3C13 3.23 12.17 3.75 11.46 4.32C8.87 6.4 7.85 10.07 9.07 13.22C9.11 13.32 9.15 13.42 9.15 13.55C9.15 13.77 9 13.97 8.8 14.05C8.57 14.15 8.33 14.09 8.14 13.93C8.08 13.88 8.04 13.83 8 13.76C6.87 12.33 6.69 10.28 7.45 8.64C5.78 10 4.87 12.3 5 14.47C5.06 14.97 5.12 15.47 5.29 15.97C5.43 16.57 5.7 17.17 6 17.7C7.08 19.43 8.95 20.67 10.96 20.92C13.1 21.19 15.39 20.8 17.03 19.32C18.86 17.66 19.5 15 18.56 12.72L18.43 12.46C18.22 12 17.66 11.2 17.66 11.2M14.5 17.5C14.22 17.74 13.76 18 13.4 18.1C12.28 18.5 11.16 17.94 10.5 17.28C11.69 17 12.4 16.12 12.61 15.23C12.78 14.43 12.46 13.77 12.33 13C12.21 12.26 12.23 11.63 12.5 10.94C12.69 11.32 12.89 11.7 13.13 12C13.9 13 15.11 13.44 15.37 14.8C15.41 14.94 15.43 15.08 15.43 15.23C15.46 16.05 15.1 16.95 14.5 17.5H14.5Z" } )
// );

/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/#registering-a-block
 */
registerBlockType( 'firepro/firepro', {
	/**
	 * This is the display title for your block, which can be translated with `i18n` functions.
	 * The block inserter will show this name.
	 */
	title: __( 'Firepro', 'firepro' ),

	/**
	 * This is a short description for your block, can be translated with `i18n` functions.
	 * It will be shown in the Block Tab in the Settings Sidebar.
	 */
	description: __(
		'Example block written with ESNext standard and JSX support – build step required. Good Run.',
		'firepro'
	),

	/**
	 * Blocks are grouped into categories to help users browse and discover them.
	 * The categories provided by core are `common`, `embed`, `formatting`, `layout` and `widgets`.
	 */
	category: 'widgets',

	/**
	 * An icon property should be specified to make it easier to identify a block.
	 * These can be any of WordPress’ Dashicons, or a custom svg element.
	 */

  icon: {
    // Specifying a background color to appear with the icon e.g.: in the inserter.
    // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
    foreground: '#3D5',
    // Specifying an icon for the block
    src: <svg viewBox="0 0 612 612" ><radialGradient id="A" cx="415.713" cy="-34.337" r="469.597" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#fff"/><stop offset=".5" stop-color="#555d66"/><stop offset="1" stop-color="#555d66"/></radialGradient><path d="M409.5 109.3c-62 66.5 28.3 100.3 57.4 164.4-4-54.9-65.2-113.2-57.4-164.4z" fill="url(#A)" class="M"/><radialGradient id="B" cx="153.958" cy="117.323" r="477.269" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#fff"/><stop offset=".5" stop-color="#555d66"/><stop offset="1" stop-color="#555d66"/></radialGradient><g class="M"><path d="M110.2 395.4c-4.7 45.9 6.9 89.8 30 125.8-36.9-58.5-4.7-103.1 30.1-144-17.3-46.2-9.2-104.5 13.9-132-38.8 32.8-68.6 97.3-74 150.2z" fill="url(#B)"/><path d="M164 355.1c-25.3 29.9-45.6 67-45.7 103.8-.1 21.3 9.1 42.6 21.9 62.3-36.9-58.5-4.7-103.1 30.1-144-2.7-7.1-4.8-14.6-6.3-22.1z" opacity=".2"/></g><radialGradient id="C" cx="381.449" cy="-185.347" r="715.801" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#fff"/><stop offset=".5" stop-color="#555d66"/><stop offset="1" stop-color="#555d66"/></radialGradient><g class="M"><path d="M332.9 1.7c-48.2 38.1-110.3 114.8-62.5 201.5 17.8 32.2 59.3 79.6 98.5 130.9 33.3-49.3 42.3-97.2 10.2-137.5-55.6-57.6-98.5-111-46.2-194.9z" fill="url(#C)"/><path d="M353.2 314l15.6 20.1c28.1-41.6 39-82.1 22.5-117.9 7.2 45.4-17 78.8-38.1 97.8z" opacity=".2"/></g><radialGradient id="D" cx="239.739" cy="-48.171" r="762.885" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#fff"/><stop offset=".5" stop-color="#555d66"/><stop offset="1" stop-color="#555d66"/></radialGradient><path d="M253.5 420.8c147.1-119.3-64.4-185.5-7.3-303.2-48.6 44.8-5.2 129.7-24.9 187.4-22 64.5-140.2 122.4-81.1 216.2 30.7 48.7 83.2 82.7 144.9 89-101.7-25.2-115.8-121.1-31.6-189.4z" fill="url(#D)" class="M"/><radialGradient id="E" cx="503.058" cy="478.467" r="429.431" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#fff"/><stop offset=".5" stop-color="#555d66"/><stop offset="1" stop-color="#555d66"/></radialGradient><path d="M233.9 439c-32.6-9.2-53-33.2-63.7-61.8-34.8 40.9-66.9 85.4-30 144 30.7 48.7 83.2 82.7 144.9 89-93-23-112.7-105.2-51.2-171.2z" fill="url(#E)" class="M"/><radialGradient id="F" cx="305.218" cy="443.745" r="206.347" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#fff"/><stop offset=".33" stop-color="#fff"/><stop offset=".66" stop-color="#fff" stop-opacity="0"/><stop offset="1" stop-color="#fff" stop-opacity="0"/></radialGradient><path d="M236.8 413.3c-56.8 46.1-82 116-44.1 158.6-33.1-41-9.3-109.6 47.5-155.7 66-53.5 64.6-98.2 44-136.7 17.2 39.5 18.6 80.3-47.4 133.8z" fill="url(#F)" class="M"/><linearGradient id="G" gradientUnits="userSpaceOnUse" x1="503.008" y1="417.218" x2="182.108" y2="363.423"><stop offset="0" stop-color="#fff"/><stop offset="1" stop-color="#fff" stop-opacity="0"/></linearGradient><path d="M231.8 192.3c6.5 59.4 65.2 114.8-6.4 177.5-43.7 38.3-91.9 99.8-58.7 170.6-10.1-51.1 26.3-103.9 64.1-134.5 28.7-23.3 58.8-54.5 53.1-94.5-5.6-38.5-39.7-79.1-52.1-119.1z" fill="url(#G)" class="M"/><radialGradient id="H" cx="69.529" cy="756.957" r="828.834" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#fff"/><stop offset=".5" stop-color="#b2b2b2"/><stop offset="1" stop-color="#363636"/></radialGradient><path d="M283.5 425.7C163.6 529 273.3 656.2 400.1 586.6c54.2-29.8 93-85.1 99.7-151.3C511.3 323.4 438 257.7 379 196.6c51.9 65.1-3.7 150.1-95.5 229.1z" fill="url(#H)" class="M"/><radialGradient id="I" cx="826.403" cy="829.343" r="835.245" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#fff"/><stop offset=".5" stop-color="#b2b2b2"/><stop offset="1" stop-color="#555d66"/></radialGradient><path d="M368.8 334.1c64.2 84 122.1 178.4 59.3 233.8 39.3-31.6 66.2-78.5 71.8-132.6 11.5-111.9-61.8-177.6-120.8-238.7 32 40.3 23 88.1-10.3 137.5z" fill="url(#I)" class="M"/><radialGradient id="J" cx="371.545" cy="446.384" r="294.187" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#fff"/><stop offset=".33" stop-color="#fff"/><stop offset=".66" stop-color="#fff" stop-opacity="0"/><stop offset="1" stop-color="#fff" stop-opacity="0"/></radialGradient><path d="M288.1 437.8c-54.2 48.3-56.4 99.5-32.7 131.2-19.1-33.4-13.9-84.4 35.3-128.2 78.2-69.6 126.9-134.3 115.9-192.5 6.5 58-40.2 119.9-118.5 189.5z" fill="url(#J)" class="M"/><linearGradient id="K" gradientUnits="userSpaceOnUse" x1="842.938" y1="692.776" x2="353.061" y2="413.569"><stop offset="0" stop-color="#fff"/><stop offset="1" stop-color="#fff" stop-opacity="0"/></linearGradient><path d="M336.6 532c-69.8 53.4-14.9 76.2 36.7 56.6 65.1-24.7 109.9-85 117-154.2 7.7-75.3-24-129.9-72.3-183.2 79.3 116.1 8.9 211.7-81.4 280.8z" fill="url(#K)" class="M"/></svg>,
},

	/**
	 * Optional block extended support features.
	 */
	supports: {
		// Removes support for an HTML mode.
		html: false,
	},

  attributes: {
		seed: {
			type: 'string'
		},
		compositionData: {
			type: 'string'
		}
  },

	/**
	 * @see ./edit.js
	 */
	edit: Edit,

	/**
	 * @see ./save.js
	 */
	save,
} );
