/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */

import { InnerBlocks, RichText, useBlockProps } from '@wordpress/block-editor';

/**
 * Save function for block
 *
 * @param	{Object}	attributes
 * @param	{Object} 	attributes.attributes
 * @return 	{WPElement} Element to render.
 */
export default function save( { attributes } ) {
	return (
		<details className="wp-block-bm-wp-details-container">
			<RichText.Content
				{ ...useBlockProps.save() }
				tagName="summary"
				value={ attributes.heading }
			/>
			<InnerBlocks.Content />
		</details>
	);
}
