// phpcs:ignoreFile
/**
 * Script of the block ‘Reference list’.
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
import { registerBlockType } from '@wordpress/blocks';
import { InspectorControls, RichText } from '@wordpress/blockEditor';
import { TextControl, RadioControl, PanelBody } from '@wordpress/components';

registerBlockType(
	'anrghg/references',
	{

		title: __( 'Reference list', 'anrghg' ),
		description: anrghgReferences.description,
		icon: 'editor-justify',
		category: 'text',
		keywords: [
			_x( 'cite', 'block keyword' ),
			_x( 'sources', 'block keyword', 'anrghg' ),
			_x( 'references', 'block keyword', 'anrghg' ),
			_x( 'bibliography', 'block keyword', 'anrghg' ),
		],
		example: {},

		supports: {

			multiple: true,

		},

		attributes: {

			referenceLabel: {
				type: 'string',
				default: '',
			},

			writingDirection: {
				type: 'string',
				default: '',
				value: 'selected',
			},

			collapsing: {
				type: 'string',
				default: '',
				value: 'selected',
			},

			referenceList: {
				type: 'string',
				default: '',
			},

		},

		edit: ( props ) => {

			const { attributes, setAttributes } = props;

			const purpose = (
				<div
					style={
						{
							fontStyle: 'italic',
							textAlign: 'center',
							fontSize: 'smaller',
							marginBottom: '10px',
						}
					}
				>{
					__( 'Standalone reference list', 'anrghg' ) + anrghgReferences.dash + __( 'Supports templates', 'anrghg' )
				}</div>
			);

			const labelReferences = (
				<TextControl
					label={ anrghgReferences.labelInputLegend }
					style={
						{
							fontSize: '18px',
						}
					}
					placeholder={ anrghgReferences.configReferenceLabel }
					help={ anrghgReferences.helpReferenceLabel }
					autoComplete={ 'off' }
					value={ attributes.referenceLabel }
					onChange={ ( typed ) => setAttributes( { referenceLabel: typed } ) }
				/>
			);

			const icCollapsing = (
				<PanelBody
					title={ __( 'Collapsing', 'anrghg' ) }
					initialOpen={ true }
				>
					<fieldset>
						<legend>
							{ <strong>{ __( 'Collapsible property and collapsed state:', 'anrghg' ) }</strong> }
						</legend>
						<RadioControl
							selected={ attributes.collapsing }
							options={
								[
									{
										label: __( 'Collapsed', 'anrghg' ),
										value: 'collapsed',
									},
									{
										label: __( 'Expanded', 'anrghg' ),
										value: 'expanded',
									},
									{
										label: __( 'Uncollapsible', 'anrghg' ),
										value: 'uncollapsible',
									},
									{
										label: __( 'Keep as configured', 'anrghg' ),
										value: '',
									},
								]
							}
							onChange={ ( val ) => setAttributes( { collapsing: val } ) }
						/>
					</fieldset>
				</PanelBody>
			);

			const blockLegendDir = (
				<legend
					style={
						{
							position: 'absolute',
							width: '0',
							height: '0',
							overflow: 'hidden',
						}
					}
				>
					{ __( 'Text direction', 'anrghg' ) }
				</legend>
			);

			const dirRadio = (
				<RadioControl
					selected={ attributes.writingDirection }
					options={
						[
							{
								label: _x( 'Left to right', 'editor button' ),
								value: 'ltr',
							},
							{
								label: _x( 'Right to left', 'editor button' ),
								value: 'rtl',
							},
							{
								label: __( 'Not set' ),
								value: '',
							},
						]
					}
					onChange={ ( val ) => setAttributes( { writingDirection: val } ) }
				/>
			);

			const blockDir = (
				<fieldset>
					{ blockLegendDir }
					{ dirRadio }
				</fieldset>
			);

			const icDir = (
				<fieldset>
					{ dirRadio }
				</fieldset>
			);

			const labelReferencesDir = (
				<div
					style={
						{
							display: 'flex',
						}
					}
				>
					<div
						style={
							{
								flexGrow: '1',
							}
						}
					>
						{ labelReferences }
					</div>
					<div
						title={ __( 'Text direction', 'anrghg' ) }
						style={
							{
								flexShrink: '0',
								padding: '12px 10px 0',
							}
						}
					>
						{ blockDir }
					</div>
				</div>
			);

			const icLabel = (
				<PanelBody
					title={ __( 'Label' ) }
					initialOpen={ false }
				>
					{ labelReferences }
				</PanelBody>
			);

			const icWritingDir = (
				<PanelBody
					title={ __( 'Text direction', 'anrghg' ) }
					initialOpen={ false }
				>
					{ icDir }
				</PanelBody>
			);

			let full = false;
			let half = false;
			let zero = false;

			switch ( anrghgReferences.blockSettingElements ) {
				case '2': full = true; break;
				case '1': half = true; break;
				default:  zero = true;
			}

			return (
				<>
					<InspectorControls>
						{ icCollapsing }
						{ zero && icLabel }
						{ ! full && icWritingDir }
					</InspectorControls>

					<div
						style={
							{
								border: '1px solid #000',
								marginTop: '20px',
								paddingTop: '20px',
								paddingInlineEnd: '15px',
								paddingBottom: '20px',
								paddingInlineStart: '30px',
								textAlign: 'start',
							}
						}
					>

						{ purpose }
						{ half && labelReferences }
						{ full && labelReferencesDir }

						<RichText
							style={
								{
									paddingTop: '30px',
									paddingBottom: '30px',
								}
							}
							value={ attributes.referenceList }
							onChange={ ( newtext ) => setAttributes( { referenceList: newtext } ) }
						/>
					</div>

				</>
			);
		},

		save: ( props ) => {

			const { attributes } = props;

			return (

				<div
					className={ 'anrghg-refs' }
					dir={ attributes.writingDirection ? attributes.writingDirection : undefined }
					data-display={ attributes.collapsing ? attributes.collapsing : undefined }
				>

					<div
						className={ 'anrghg-label' }
					>
						{ attributes.referenceLabel }
					</div>

					<RichText.Content
						value={ attributes.referenceList }
					/>

					<span
						data-anrghg={ 'refs-end' }
					></span>

				</div>

			);

		},

	}
);
