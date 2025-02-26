/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { InnerBlocks, RichText, useBlockProps } from '@wordpress/block-editor';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * Edit function for block
 *
 * @param 	{Object} 	attributes
 * @param	{Object} 	attributes.attributes
 * @param 	{Function} 	attributes.setAttributes
 * @return 	{WPElement}	Element to render.
 */
export default function Edit( { attributes, setAttributes } ) {
	const ALLOWED_BLOCKS = [
		'core/audio',
		'core/archives',
		'core/button',
		'core/buttons',
		'core/calendar',
		'core/categories',
		'core/code',
		'core/column',
		'core/columns',
		'core/embed',
		'core/file',
		'core/gallery',
		'core/group',
		'core/heading',
		'core/image',
		'core/latest-comments',
		'core/latest-posts',
		'core/list',
		'core/media-text',
		'core/page-list',
		'core/paragraph',
		'core/preformatted',
		'core/pullquote',
		'core/quote',
		'core/rss',
		'core/search',
		'core/separator',
		'core/spacer',
		'core/social-link',
		'core/social-links',
		'core/table',
		'core/table-of-contents',
		'core/tag-cloud',
		'core/verse',
		'core/video',
	];

	return (
		<details className="wp-block-bm-wp-details-container">
			<RichText
				{ ...useBlockProps() }
				tagName="summary"
				value={ attributes.heading }
				allowedFormats={ [ 'core/bold', 'core/italic' ] }
				onChange={ ( newText ) =>
					setAttributes( { heading: newText } )
				}
				placeholder={ __(
					'Insert heading. This will be used to display and collapse content.'
				) }
			/>
			<InnerBlocks
				allowedBlocks={ ALLOWED_BLOCKS }
				renderAppender={ () => <InnerBlocks.ButtonBlockAppender /> }
			/>
		</details>
	);
}
