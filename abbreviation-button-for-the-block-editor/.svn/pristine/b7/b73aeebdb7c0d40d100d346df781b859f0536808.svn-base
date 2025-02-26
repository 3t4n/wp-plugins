import { __ } from '@wordpress/i18n';

import './index.scss';

import { BlockControls, RichTextToolbarButton } from '@wordpress/block-editor';
import { TextControl, Button, Popover } from '@wordpress/components';
import { useState } from '@wordpress/element';
import { applyFormat, removeFormat, useAnchorRef } from '@wordpress/rich-text';
import { ENTER } from '@wordpress/keycodes';

const abbrIcon = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_1512_4)"><rect width="24" height="24"/><path d="M0.9 15L4.14 7.95H5.39L8.63 15H7.07L6.41 13.47H3.12L2.47 15H0.9ZM4.75 9.6L3.64 12.26H5.9L4.77 9.6H4.75ZM9.2393 15V7.95H12.4693C13.2226 7.95 13.8026 8.11333 14.2093 8.44C14.6226 8.76667 14.8293 9.21333 14.8293 9.78C14.8293 10.1533 14.736 10.4767 14.5493 10.75C14.3626 11.0167 14.1026 11.2167 13.7693 11.35C14.1693 11.4633 14.476 11.6633 14.6893 11.95C14.9093 12.2367 15.0193 12.59 15.0193 13.01C15.0193 13.6367 14.7993 14.1267 14.3593 14.48C13.926 14.8267 13.3326 15 12.5793 15H9.2393ZM10.7193 10.85H12.1993C12.9593 10.85 13.3393 10.5567 13.3393 9.97C13.3393 9.39 12.9593 9.1 12.1993 9.1H10.7193V10.85ZM10.7193 13.85H12.3693C12.7693 13.85 13.0626 13.7733 13.2493 13.62C13.436 13.4667 13.5293 13.2333 13.5293 12.92C13.5293 12.6133 13.436 12.3833 13.2493 12.23C13.0626 12.0767 12.7693 12 12.3693 12H10.7193V13.85ZM16.1924 15V7.95H19.4124C20.1991 7.95 20.8058 8.14 21.2324 8.52C21.6591 8.9 21.8724 9.43 21.8724 10.11C21.8724 10.6367 21.7358 11.0767 21.4624 11.43C21.1958 11.7767 20.8124 12.0133 20.3124 12.14C20.6658 12.2467 20.9558 12.5033 21.1824 12.91L22.3224 15H20.6124L19.3924 12.75C19.2924 12.57 19.1691 12.4467 19.0224 12.38C18.8758 12.3067 18.7024 12.27 18.5024 12.27H17.7424V15H16.1924ZM17.7424 11.15H19.1324C19.9658 11.15 20.3824 10.8167 20.3824 10.15C20.3824 9.49 19.9658 9.16 19.1324 9.16H17.7424V11.15Z" fill="black"/></g><defs><clipPath id="clip0_1512_4"><rect width="24" height="24"/></clipPath></defs></svg>';


const AbbrTagButton = ( props ) => {
	const { contentRef, isActive, onChange, value } = props;
	const anchorRef = useAnchorRef( { ref: contentRef, value } );
	
	const [ abbr, setAbbr ] = useState( '' );
	const [ isPopoverVisible, setIsPopoverVisible ] = useState( false );
	const togglePopover = () => {
		setIsPopoverVisible( ( state ) => ! state );
		setAbbr( '' )
	};

	return (
		<>
				<RichTextToolbarButton
						icon= {
							<svg width="24" height="24" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_1512_4)"><rect width="24" height="24" fill="white"/><path d="M0.9 15L4.14 7.95H5.39L8.63 15H7.07L6.41 13.47H3.12L2.47 15H0.9ZM4.75 9.6L3.64 12.26H5.9L4.77 9.6H4.75ZM9.2393 15V7.95H12.4693C13.2226 7.95 13.8026 8.11333 14.2093 8.44C14.6226 8.76667 14.8293 9.21333 14.8293 9.78C14.8293 10.1533 14.736 10.4767 14.5493 10.75C14.3626 11.0167 14.1026 11.2167 13.7693 11.35C14.1693 11.4633 14.476 11.6633 14.6893 11.95C14.9093 12.2367 15.0193 12.59 15.0193 13.01C15.0193 13.6367 14.7993 14.1267 14.3593 14.48C13.926 14.8267 13.3326 15 12.5793 15H9.2393ZM10.7193 10.85H12.1993C12.9593 10.85 13.3393 10.5567 13.3393 9.97C13.3393 9.39 12.9593 9.1 12.1993 9.1H10.7193V10.85ZM10.7193 13.85H12.3693C12.7693 13.85 13.0626 13.7733 13.2493 13.62C13.436 13.4667 13.5293 13.2333 13.5293 12.92C13.5293 12.6133 13.436 12.3833 13.2493 12.23C13.0626 12.0767 12.7693 12 12.3693 12H10.7193V13.85ZM16.1924 15V7.95H19.4124C20.1991 7.95 20.8058 8.14 21.2324 8.52C21.6591 8.9 21.8724 9.43 21.8724 10.11C21.8724 10.6367 21.7358 11.0767 21.4624 11.43C21.1958 11.7767 20.8124 12.0133 20.3124 12.14C20.6658 12.2467 20.9558 12.5033 21.1824 12.91L22.3224 15H20.6124L19.3924 12.75C19.2924 12.57 19.1691 12.4467 19.0224 12.38C18.8758 12.3067 18.7024 12.27 18.5024 12.27H17.7424V15H16.1924ZM17.7424 11.15H19.1324C19.9658 11.15 20.3824 10.8167 20.3824 10.15C20.3824 9.49 19.9658 9.16 19.1324 9.16H17.7424V11.15Z" fill="black"/></g><defs><clipPath id="clip0_1512_4"><rect width="24" height="24"/></clipPath></defs></svg>
						}
						label={ __( 'Abbreviation', 'abbreviation-button-for-the-block-editor' ) }
						title={ __( 'Abbreviation', 'abbreviation-button-for-the-block-editor' ) }
						onClick={ () => {
							if ( isActive ) {
								onChange( removeFormat( value, 'abbr/format-abbreviation-tag' ) );
							} else {
								togglePopover()
							}
						} }
						isActive={ isActive }
					/>

			{ isPopoverVisible && (
				<Popover
					className="components-abbreviation-tag-popover"
					anchor={ anchorRef }
					position="bottom center"
				>
					<TextControl
						label={ __( 'Abbreviation description', 'abbreviation-button-for-the-block-editor' ) }
						value={ abbr }
						onChange={ abbr => setAbbr( abbr ) }
					/>
					<p class="abbreviation-tag-info">
						<em>{ __( 'Describe the meaning of the abbreviation.', 'abbreviation-button-for-the-block-editor' ) }</em>
					</p>
					<Button
						isPrimary
						text={ __( 'Apply', 'abbreviation-button-for-the-block-editor' ) }
						onClick={ () => {
							onChange(
								applyFormat( value, {
									type: 'abbr/format-abbreviation-tag',
									attributes: {
										title: abbr
									}
								} )
							)
							togglePopover()
						} }
					/>
				</Popover>
			) }
		</>
	)
};
		
// Register the Format.
wp.richText.registerFormatType( 'abbr/format-abbreviation-tag', {
	className: null,
	edit     : AbbrTagButton,
	tagName  : 'abbr',
	icon     : abbrIcon,
	title    : __( 'Abbreviation', 'abbreviation-button-for-the-block-editor' ),
} );