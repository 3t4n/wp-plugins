// phpcs:ignoreFile
/**
 * Script of the block ‘Notes and sources’.
 *
 * @since 0.27.0
 * Optionally positions the end of a section.
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
import { InspectorControls } from '@wordpress/blockEditor';
import { TextControl, RadioControl, PanelBody } from '@wordpress/components';

registerBlockType(
	'anrghg/notes-and-sources',
	{

		title: __( 'Notes and sources', 'anrghg' ),
		description: anrghgSection.description,
		icon: 'editor-justify',
		category: 'design',
		keywords: [
			_x( 'cite', 'block keyword' ),
			_x( 'section', 'block keyword' ),
			_x( 'notes', 'block keyword', 'anrghg' ),
			_x( 'endnotes', 'block keyword', 'anrghg' ),
			_x( 'sources', 'block keyword', 'anrghg' ),
			_x( 'references', 'block keyword', 'anrghg' ),
		],
		example: {},

		supports: {

			multiple: true,

		},

		attributes: {

			noteListLabel: {
				type: 'string',
				default: '',
			},

			noteDir: {
				type: 'string',
				default: '',
				value: 'selected',
			},

			sourceListLabel: {
				type: 'string',
				default: '',
			},

			sourceDir: {
				type: 'string',
				default: '',
				value: 'selected',
			},

			noteDisplay: {
				type: 'string',
				default: '',
				value: 'selected',
			},

			sourceDisplay: {
				type: 'string',
				default: '',
				value: 'selected',
			},

			inFooter: {
				type: 'string',
				default: '',
				value: 'selected',
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
							margin: '0',
						}
					}
				>{
					__( 'Here ends a section for notes and sources to be listed down to this point.', 'anrghg' )
				}</p>
			);

			const icCollapsing = (
				<PanelBody
					title={ __( 'List collapsing', 'anrghg' ) }
					initialOpen={ true }
				>
					<fieldset>
						<legend>
							{ <strong>{ __( 'Note list', 'anrghg' ) }</strong> }
						</legend>
						<RadioControl
							selected={ attributes.noteDisplay }
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
							onChange={ ( val ) => setAttributes( { noteDisplay: val } ) }
						/>
					</fieldset>

					<fieldset>
						<legend>
							{ <strong>{ __( 'Source list', 'anrghg' ) }</strong> }
						</legend>
						<RadioControl
							selected={ attributes.sourceDisplay }
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
							onChange={ ( val ) => setAttributes( { sourceDisplay: val } ) }
						/>
					</fieldset>
				</PanelBody>
			);

			const icFooter = (
				<PanelBody
					title={ __( 'Footer deferral', 'anrghg' ) }
					initialOpen={ true }
				>
					<fieldset>
						<legend>
							{ <strong>{ __( 'Note list', 'anrghg' ) + anrghgSection.dash + __( 'Source list', 'anrghg' ) }</strong> }
						</legend>
						<RadioControl
							selected={ attributes.inFooter }
							options={
								[
									{
										label: __( 'Defer to footer', 'anrghg' ),
										value: 'true',
									},
									{
										label: __( 'Display in article', 'anrghg' ),
										value: 'false',
									},
									{
										label: __( 'Keep as configured', 'anrghg' ),
										value: '',
									},
								]
							}
							onChange={ ( val ) => setAttributes( { inFooter: val } ) }
						/>
					</fieldset>
				</PanelBody>
			);

			const labelNotes = (
				<TextControl
					label={ __( 'Note list', 'anrghg' ) + anrghgSection.dash + __( 'Label' ) }
					style={
						{
							fontSize: '18px',
						}
					}
					placeholder={ anrghgSection.configListLabelNotes }
					help={ anrghgSection.helpListLabelNotes }
					autoComplete={ 'off' }
					value={ attributes.noteListLabel }
					onChange={ ( typed ) => setAttributes( { noteListLabel: typed } ) }
				/>
			);

			const labelSources = (
				<TextControl
					label={ __( 'Source list', 'anrghg' ) + anrghgSection.dash + __( 'Label' ) }
					style={
						{
							fontSize: '18px',
						}
					}
					placeholder={ anrghgSection.configListLabelSources }
					help={ anrghgSection.helpListLabelSources }
					autoComplete={ 'off' }
					value={ attributes.sourceListLabel }
					onChange={ ( typed ) => setAttributes( { sourceListLabel: typed } ) }
				/>
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

			const icLegendDirNotes = (
				<legend>
					{ <strong>{ __( 'Notes', 'anrghg' ) }</strong> }
				</legend>
			);

			const icLegendDirSources = (
				<legend>
					{ <strong>{ __( 'Sources', 'anrghg' ) }</strong> }
				</legend>
			);

			const dirRadioNotes = (
				<RadioControl
					selected={ attributes.noteDir }
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
					onChange={ ( val ) => setAttributes( { noteDir: val } ) }
				/>
			);

			const dirRadioSources = (
				<RadioControl
					selected={ attributes.sourceDir }
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
					onChange={ ( val ) => setAttributes( { sourceDir: val } ) }
				/>
			);

			const blockDirNotes = (
				<fieldset>
					{ blockLegendDir }
					{ dirRadioNotes }
				</fieldset>
			);

			const blockDirSources = (
				<fieldset>
					{ blockLegendDir }
					{ dirRadioSources }
				</fieldset>
			);

			const icDirNotes = (
				<fieldset>
					{ icLegendDirNotes }
					{ dirRadioNotes }
				</fieldset>
			);

			const icDirSources = (
				<fieldset>
					{ icLegendDirSources }
					{ dirRadioSources }
				</fieldset>
			);

			const labelDirNotes = (
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
						{ labelNotes }
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
						{ blockDirNotes }
					</div>
				</div>
			);

			const labelDirSources = (
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
						{ labelSources }
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
						{ blockDirSources }
					</div>
				</div>
			);

			const icLabels = (
				<PanelBody
					title={ __( 'Labels', 'anrghg' ) }
					initialOpen={ false }
				>
					{ labelNotes }
					{ labelSources }
				</PanelBody>
			);

			const icDir = (
				<PanelBody
					title={ __( 'Text direction', 'anrghg' ) }
					initialOpen={ false }
				>
					{ icDirNotes }
					{ icDirSources }
				</PanelBody>
			);

			let full = false;
			let half = false;
			let zero = false;

			switch ( anrghgSection.blockSettingElements ) {
				case '2': full = true; break;
				case '1': half = true; break;
				default:  zero = true;
			}

			return (
				<>
					<InspectorControls>
						{ icCollapsing }
						{ icFooter }
						{ zero && icLabels }
						{ ! full && icDir }
					</InspectorControls>

					{ zero ?

						<div
							style={
								{
									border: '1px solid #000',
									paddingTop: '20px',
									paddingBottom: '20px',
								}
							}
						>
							{ purpose }
						</div>

					:

						<div
							style={
								{
									border: '1px solid #000',
									paddingTop: '20px',
									paddingBottom: '7px',
									paddingInlineStart: '30px',
									paddingInlineEnd: '15px',
									textAlign: 'start',
								}
							}
						>
							{ purpose }
							{ full && labelDirNotes }
							{ full && labelDirSources }
							{ half && labelNotes }
							{ half && labelSources }
						</div>

					}
				</>
			);

		},

		save: ( props ) => {

			const { attributes } = props;

			return (

				<div
					className={ 'anrghg-section' }
					data-note-dir={ attributes.noteDir ? attributes.noteDir : undefined }
					data-source-dir={ attributes.sourceDir ? attributes.sourceDir : undefined }
					data-note-display={ attributes.noteDisplay ? attributes.noteDisplay : undefined }
					data-source-display={ attributes.sourceDisplay ? attributes.sourceDisplay : undefined }
					data-footer={ attributes.inFooter ? attributes.inFooter : undefined }
					hidden={ true }
				>

					<div
						data-anrghg={ 'note-label' }
					>
						{ attributes.noteListLabel }
					</div>

					<div
						data-anrghg={ 'source-label' }
					>
						{ attributes.sourceListLabel }
					</div>

				</div>

			);

		},

	}
);
