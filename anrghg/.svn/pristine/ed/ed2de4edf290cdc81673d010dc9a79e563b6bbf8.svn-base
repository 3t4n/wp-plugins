// phpcs:ignoreFile
/**
 * Script of the block ‘Table of contents’.
 *
 * @since 0.27.0
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
import { InspectorControls, BlockControls } from '@wordpress/blockEditor';
import { ToolbarGroup, ToolbarButton, TextControl, RadioControl, PanelBody } from '@wordpress/components';

registerBlockType(
	'anrghg/table-of-contents',
	{

		title: __( 'Table of contents' ),
		description: anrghgContents.description,
		icon: 'editor-justify',
		category: 'design',
		keywords: [
			_x( 'quick', 'block keyword', 'anrghg' ),
			_x( 'toc', 'block keyword', 'anrghg' ),
		],
		example: {},

		supports: {

			multiple: false,

		},

		attributes: {

			contentsLabel: {
				type: 'string',
				default: '',
			},

			blockAlignment: {
				type: 'string',
				default: '',
			},

			collapsing: {
				type: 'string',
				default: '',
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
					__( 'Here goes the table of contents', 'anrghg' )
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
						onClick={ () => setAttributes( { blockAlignment: '' } ) }
					/>
				</ToolbarGroup>
			);

			const labelContents = (
				<TextControl
					label={ __( 'Label' ) }
					style={ {
						fontSize: '18px',
					} }
					placeholder={ anrghgContents.configContentsLabel }
					help={ anrghgContents.helpContentsLabel }
					autoComplete={ 'off' }
					value={ attributes.contentsLabel }
					onChange={ ( typed ) => setAttributes( { contentsLabel: typed } ) }
				/>
			);

			const icLabel = (
				<PanelBody
					title={ __( 'Label' ) }
					initialOpen={ false }
				>
					{ labelContents }
				</PanelBody>
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
							options={ [
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
							] }
							onChange={ ( val ) => setAttributes( { collapsing: val } ) }
						/>
					</fieldset>
				</PanelBody>
			);

			let full = false;
			let half = false;
			let zero = false;

			switch ( anrghgContents.blockSettingElements ) {
				case '2': full = true; break;
				case '1': half = true; break;
				default:  zero = true;
			}

			return (
				<>
					<InspectorControls>
						{ zero && icLabel }
						{ icCollapsing }
					</InspectorControls>

					<BlockControls>
						{ alignmentControls }
					</BlockControls>

					{ zero ?

						<div
							style={ {
								border: '1px solid #000',
								paddingTop: '20px',
								paddingBottom: '20px',
							} }
						>
							{ purpose }
						</div>

					:

						<div
							style={ {
								border: '1px solid #000',
								paddingTop: '20px',
								paddingBottom: '7px',
								paddingInlineStart: '30px',
								paddingInlineEnd: '15px',
								textAlign: 'start',
							} }
						>
							{ purpose }
							{ full && labelContents }
							{ half && labelContents }
						</div>

					}
				</>
			);
		},

		save: ( props ) => {

			const { attributes } = props;

			return (

				<div
					className={ 'anrghg-toc' }
					data-align={ attributes.blockAlignment ? attributes.blockAlignment : undefined }
					data-display={ attributes.collapsing ? attributes.collapsing : undefined }
					hidden={ true }
				>

					<div
						data-anrghg={ 'label' }
					>
						{ attributes.contentsLabel }
					</div>

				</div>

			);

		},

	}
);
