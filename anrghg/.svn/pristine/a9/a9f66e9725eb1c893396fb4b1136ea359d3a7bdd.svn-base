// phpcs:ignoreFile
/**
 * Script of the block ‘Include partial’.
 *
 * @since 1.15.0
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
	'anrghg/include',
	{

		title: __( 'Include partial', 'anrghg' ),
		description: anrghgInclude.description,
		icon: 'editor-justify',
		category: 'embed',
		keywords: [
			_x( 'include', 'block keyword', 'anrghg' ),
			_x( 'HTML', 'block keyword', 'anrghg' ),
			_x( 'partial', 'block keyword', 'anrghg' ),
		],
		example: {},

		supports: {

			multiple: true,

		},

		attributes: {

			filePath: {
				type: 'string',
				default: '',
			},

			placeholderValue: {
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
					__( 'Include partial', 'anrghg' ) + anrghgInclude.dash + _x( 'stored locally', 'partial', 'anrghg' )
				}</div>
			);

			const inputPath = (
				<TextControl
					label={ __( 'Path', 'anrghg' ) }
					style={
						{
							fontSize: '18px',
							overflowWrap: 'anywhere', /* For the Help text. */
						}
					}
					help={
						sprintf(
							/* Translators: %s: Configured path. */
							__( 'The path of the HTML file to include. May be absolute or relative to %s', 'anrghg' ),
							anrghgInclude.configuredPath
						)
					}
					autoComplete={ 'on' }
					value={ attributes.filePath }
					onChange={ ( typed ) => setAttributes( { filePath: typed } ) }
				/>
			);

			const inputPlaceholder = (
				<TextControl
					label={ __( 'Value', 'anrghg' ) }
					style={
						{
							fontSize: '18px',
							overflowWrap: 'anywhere', /* For the Help text. */
						}
					}
					help={
						sprintf(
							/* Translators: %s: Configured placeholder for value. */
							__( 'The value of the placeholder “%s” optionally included in the partial.', 'anrghg' ),
							anrghgInclude.valuePlaceholder
						)
					}
					autoComplete={ 'on' }
					value={ attributes.placeholderValue }
					onChange={ ( typed ) => setAttributes( { placeholderValue: typed } ) }
				/>
			);

			const icPlaceholder = (
				<PanelBody
					title={ __( 'Value' ) }
					initialOpen={ true }
				>
					{ inputPlaceholder }
				</PanelBody>
			);

			let full = false;
			let half = false;
			let zero = false;

			switch ( anrghgInclude.blockSettingElements ) {
				case '2': full = true; break;
				case '1': half = true; break;
				default:  zero = true;
			}

			return (
				<>
					<InspectorControls>
						<h3>
							{ __( 'Path', 'anrghg' ) }
						</h3>
						<p
							style={
								{
									overflowWrap: 'anywhere',
								}
							}
						>
							{
								sprintf(
									/* Translators: %s: Configured path. */
									__( 'The path of the HTML file to include. May be absolute or relative to %s', 'anrghg' ),
									anrghgInclude.configuredPath
								)
								+ anrghgInclude.dash
								+ sprintf(
									/* Translators: %s: /home/. */
									__( 'In shared hosting, the absolute path typically starts with “%s” followed by the name of the hosting account.', 'anrghg' ),
									'/home/'
								)
							}
						</p>
						<h3>
							{ __( 'Value', 'anrghg' ) }
						</h3>
						<p
							style={
								{

									overflowWrap: 'anywhere',
								}
							}
						>
							{
								sprintf(
									/* Translators: %s: Configured placeholder for value. */
									__( 'The value of the placeholder “%s” optionally included in the partial.', 'anrghg' ),
									anrghgInclude.valuePlaceholder
								)
								+ anrghgInclude.dash
								+ sprintf(
									/* Translators: %s: Configured placeholder for classes. */
									__( 'Another placeholder, “%s”, will be replaced with the additional CSS classes.', 'anrghg' ),
									anrghgInclude.classesPlaceholder
								)
								+ anrghgInclude.dash
								+ __( 'The placeholders may occur in multiple instances.', 'anrghg' )
							}
						</p>
						{ zero && icPlaceholder }
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
						{ inputPath }
						{ ! zero && inputPlaceholder }
					</div>

				</>
			);
		},

		save: ( props ) => {

			const { attributes } = props;

			return (

				<div
					className={ undefined }
					data-path={ attributes.filePath }
					data-value={ attributes.placeholderValue ? attributes.placeholderValue : undefined }
				>

				</div>

			);

		},

	}
);
