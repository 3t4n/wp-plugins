/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
 */
import { useBlockProps } from '@wordpress/block-editor';
import Preview from './preview'
import PreviewNew from './preview-new'

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */
export default function save( { attributes } ) {
	let preview;
	if(attributes.new_dpe) {
		preview = <PreviewNew { ...attributes } />
	} else{
		preview = <Preview { ...attributes } />
	}

	return (
		
		<div { ...useBlockProps.save() }>
			{ !! (attributes.display_dpe || attributes.display_ges) ? (
				preview
			) : (
			<p class="WP-DPE-GES-message">{ __( 'You must display at least 1 value', 'wpdpeges' ) }</p>
			) }
		</div>
		
	);
}
