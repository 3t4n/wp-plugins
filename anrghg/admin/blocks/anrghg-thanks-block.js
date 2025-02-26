// phpcs:ignoreFile
/**
 * Script of the block ‘Thank You message’.
 *
 * @since 0.58.0
 * @package WordPress
 * @subpackage A.N.R.GHG Publishing Toolkit
 * Copyright 2021–2023 ANRGHG
 * This file is part of A.N.R.GHG Publishing Toolkit.
 * A.N.R.GHG Publishing Toolkit is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 * A.N.R.GHG Publishing Toolkit is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with A.N.R.GHG Publishing Toolkit.  If not, see <https://www.gnu.org/licenses/>.
 * @see COPYING.txt
 */

import { __, _x, _n, _nx, sprintf } from '@wordpress/i18n';
import { registerBlockType, createBlock } from '@wordpress/blocks';
import { InspectorControls, BlockControls, RichText } from '@wordpress/blockEditor';
import { ToolbarGroup, ToolbarButton, SelectControl, PanelBody } from '@wordpress/components';

registerBlockType(
	'anrghg/thank-you-message',
	{

		title: __( 'Thank You message', 'anrghg' ),
		description: anrghgThanks.description,
		icon: 'editor-justify',
		category: 'text',
		keywords: [
			_x( 'box', 'block keyword', 'anrghg' ),
			_x( 'frame', 'block keyword', 'anrghg' ),
			_x( 'text', 'block keyword' ),
		],
		example: {},

		supports: {

			multiple: true,

		},

		attributes: {

			messageContent: {
				type: 'string',
				default: '',
			},

			styleSheet: {
				type: 'string',
				default: anrghgThanks.defaultStyleSheet,
			},

			blockAlignment: {
				type: 'string',
				default: null,
			},

			textAlign: {
				type: 'string',
				default: null,
			},

		},

		edit: ( props ) => {

			const { attributes, setAttributes } = props;

			const purpose = (
				<p
					style={
						{
							fontStyle: 'italic',
							textAlign: 'center',
							fontSize: 'smaller',
						}
					}
				>{
					__( 'Message box', 'anrghg' ) + anrghgThanks.dash + __( 'Supports templates', 'anrghg' )
				}</p>
			);

			const active = (
				{
					color: 'white',
					background: '#50197C',
				}
			);

			const styleLeft   = 'left'   === attributes.blockAlignment ? active : null;
			const styleCenter = 'center' === attributes.blockAlignment ? active : null;
			const styleRight  = 'right'  === attributes.blockAlignment ? active : null;

			const alignmentControls = (
				<ToolbarGroup
					label={ __( 'Alignment' ) }
				>
					<ToolbarButton
						icon="align-left"
						style={ styleLeft }
						label={ __( 'Left' ) }
						onClick={ () => setAttributes( { blockAlignment: 'left' } ) }
					/>
					<ToolbarButton
						icon="align-center"
						style={ styleCenter }
						label={ __( 'Center' ) }
						onClick={ () => setAttributes( { blockAlignment: 'center' } ) }
					/>
					<ToolbarButton
						icon="align-right"
						style={ styleRight }
						label={ __( 'Right' ) }
						onClick={ () => setAttributes( { blockAlignment: 'right' } ) }
					/>
					<ToolbarButton
						icon="undo"
						label={ __( 'Not set' ) }
						onClick={ () => setAttributes( { blockAlignment: null } ) }
					/>
				</ToolbarGroup>
			);

			const activeLeft    = 'left'    === attributes.textAlign ? active : null;
			const activeCenter  = 'center'  === attributes.textAlign ? active : null;
			const activeRight   = 'right'   === attributes.textAlign ? active : null;
			const activeJustify = 'justify' === attributes.textAlign ? active : null;

			const textAlignControls = (
				<ToolbarGroup
					label={ __( 'Text Align' ) }
				>
					<ToolbarButton
						icon="editor-alignleft"
						style={ activeLeft }
						label={ __( 'Left' ) }
						onClick={ () => setAttributes( { textAlign: 'left' } ) }
					/>
					<ToolbarButton
						icon="editor-aligncenter"
						style={ activeCenter }
						label={ __( 'Center' ) }
						onClick={ () => setAttributes( { textAlign: 'center' } ) }
					/>
					<ToolbarButton
						icon="editor-alignright"
						style={ activeRight }
						label={ __( 'Right' ) }
						onClick={ () => setAttributes( { textAlign: 'right' } ) }
					/>
					<ToolbarButton
						icon="editor-justify"
						style={ activeJustify }
						label={ __( 'Justify' ) }
						onClick={ () => setAttributes( { textAlign: 'justify' } ) }
					/>
					<ToolbarButton
						icon="undo"
						label={ __( 'Not set' ) }
						onClick={ () => setAttributes( { textAlign: null } ) }
					/>
				</ToolbarGroup>
			);

			const styleSheetSelect = (
				<SelectControl
					label={ __( 'Style' ) }
					value={ attributes.styleSheet }
					options={
						[
							{ label: __( 'Style' ) + ' 1',  value: '1' },
							{ label: __( 'Style' ) + ' 2',  value: '2' },
							{ label: __( 'Style' ) + ' 3',  value: '3' },
							{ label: __( 'Style' ) + ' 4',  value: '4' },
							{ label: __( 'Style' ) + ' 5',  value: '5' },
							{ label: __( 'Style' ) + ' 6',  value: '6' },
							{ label: __( 'Style' ) + ' 7',  value: '7' },
							{ label: __( 'Style' ) + ' 8',  value: '8' },
							{ label: __( 'Style' ) + ' 9',  value: '9' },
							{ label: __( 'Style' ) + ' 10', value: '0' },
							{ label:                   ' ', value: '' },
						]
					}
					onChange={ ( newStyle ) => setAttributes( { styleSheet: newStyle } ) }
				/>
			);

			const icStyleSheetSelect = (
				<PanelBody
					title={ __( 'Style' ) }
					initialOpen={ true }
				>
					{ styleSheetSelect }
				</PanelBody>
			);

			return (
				<>
					<InspectorControls>
						{ icStyleSheetSelect }
					</InspectorControls>

					<BlockControls>
						{ alignmentControls }
						{ textAlignControls }
					</BlockControls>

					<div
						style={ {
							border: '1px solid #000',
							marginTop: '20px',
							marginInlineStart: '30px',
							marginInlineEnd: '15px',
							paddingTop: '20px',
							paddingInlineEnd: '15px',
							paddingBottom: '20px',
							paddingInlineStart: '30px',
							textAlign: attributes.textAlign,
						} }
					>
						{ purpose }
						<RichText
							style={
								{
									paddingTop: '30px',
									paddingBottom: '30px',
								}
							}
							value={ attributes.messageContent }
							onChange={ ( newtext ) => setAttributes( { messageContent: newtext } ) }
						/>
					</div>

				</>
			);
		},

		save: ( props ) => {

			const { attributes } = props;

			let classes = 'anrghg-thank-you';

			if ( attributes.styleSheet ) {
				classes += ' anrghg-style-' + attributes.styleSheet;
			}

			if ( attributes.blockAlignment ) {
				classes += ' anrghg-' + attributes.blockAlignment;
			}

			return (

				<div
					className={ classes }
				>

					<div
						className={ 'anrghg-inner-thank-you' }
						style={ { textAlign: attributes.textAlign } }
					>
						<RichText.Content
							value={ attributes.messageContent }
						/>
					</div>

					<span
						className={ 'anrghg-msg-end' }
					></span>

				</div>

			)

		},

	}
);
