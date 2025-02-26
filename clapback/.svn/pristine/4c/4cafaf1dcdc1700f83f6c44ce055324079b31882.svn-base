/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-i18n/
 */
import { InspectorControls } from '@wordpress/block-editor';
import { TextControl, SelectControl, PanelBody, PanelRow } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

const EMOJI_CHOICES = ['👏', '👏🏻', '👏🏼', '👏🏽', '👏🏾', '👏🏿', '🔥', '🎶', '🎵', '🎂' ];

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#edit
 *
 * @param {Object} [props]           Properties passed from the editor.
 * @param {string} [props.className] Class name generated for the block.
 *
 * @return {WPElement} Element to render.
 */
export default function Edit( { attributes, className, isSelected, setAttributes } ) {
		return (
			<div className={ className }>
				<InspectorControls>
				<PanelBody
		            title="Clapback Settings"
		            icon="smiley"
		            initialOpen={ true }
		            >
		            <PanelRow>
						<SelectControl
						      label="Emoji"
						      value={ attributes.emoji }
						      options={ EMOJI_CHOICES.map( ( emoji ) => ( { label: emoji, value: emoji } ) ) }
						   onChange={ ( emoji ) => setAttributes( { emoji: emoji } ) }
						      />
		            </PanelRow>
	            </PanelBody>
				</InspectorControls>
				{ attributes.content && attributes.emoji && ! isSelected ? (
					<div>{ attributes.content.split( /\s+/ ).join( attributes.emoji ) }</div>
				) : (
					<TextControl
						value={ attributes.content.split( attributes.emoji ).join( " " ) } // Any existing content, either from the database or an attribute default
						onChange={ ( content ) => setAttributes( { content } ) } // Store updated content as a block attribute
						placeholder={ __( 'Enter your text here' ) } // Display this text before any content has been added by the user
					/>
				) }
			</div>
		);
}
