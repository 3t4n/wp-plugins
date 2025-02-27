/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n'

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
 */
import { useBlockProps } from '@wordpress/block-editor';
import { Fragment } from '@wordpress/element';

import Inspector from './inspector'
import Preview from './preview'
import PreviewNew from './preview-new'

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
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function Edit( props ) {
	let preview;
	
	if(props.attributes.new_dpe) {
		preview = <PreviewNew { ...props } />
	} else{
		preview = <Preview { ...props } />
	}

	return (
		<Fragment>
		<div {...useBlockProps()}>
			<Inspector { ...props } />
			{ !! (props.attributes.display_dpe || props.attributes.display_ges) ? (
				preview
			) : (
			<p class="WP-DPE-GES-message">{ __( 'You must display at least 1 value', 'wpdpeges' ) }</p>
			) }
		</div>
		</Fragment>
	);
}
