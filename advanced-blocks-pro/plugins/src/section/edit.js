import React, { useCallback } from 'react';
import { __ } from '@wordpress/i18n';
import './editor.scss';
import { times, memoize, dropRight } from 'lodash';
// import memoize from 'memoize';
import jss from 'jss'
import { MediaParent } from '../../filters/frontend_components';
import { fontStyle } from '../../filters/frontend_components/cssFunc';
import { apply_font_style, getAttributeValueDynamic } from '../../helper/globalFunctions';
import { CustomRangeControl } from '../../filters/component/custom_panel/panel';
const { useBlockProps, useInnerBlocksProps, InnerBlocks, InspectorControls } = wp.blockEditor;
const { useDispatch, useSelect } = wp.data
const { createBlock } = wp.blocks
const { PanelBody } = wp.components;

export default function Edit(props) {
	const { attributes, setAttributes, clientId } = props;
	const { blockId } = attributes;
	setAttributes({ blockId: clientId });
	// 
	const { replaceInnerBlocks } = useDispatch("core/block-editor");
	const { getBlocks, getBlockAttributes } = useSelect(
		'core/block-editor'
	);

	const updateColumn = useCallback((previousColumns, newColumns) => {

		let innerBlocks = getBlocks(clientId);

		// Redistributdispatche available width for existing inner blocks.
		const isAddingColumn = newColumns > previousColumns;

		if (isAddingColumn) {
			const arrayLength = innerBlocks.length;
			for (let i = 0; i < arrayLength; i++) {
				innerBlocks[i].attributes.id = (i + 1);
			}
			innerBlocks = [
				...innerBlocks,
				...times(newColumns - previousColumns, (n) => {
					return createBlock('advanced-blocks-pro/column', {
						id: previousColumns + n + 1,
					});
				}),
			];
		} else {
			// The removed column will be the last of the inner blocks.
			innerBlocks = dropRight(
				innerBlocks,
				previousColumns - newColumns
			);
		}

		replaceInnerBlocks(clientId, innerBlocks, false);
	});

	const getColumnsTemplate = memoize((columns) => {
		let column_count = `col-${columns}`;
		return times(columns, n => ['advanced-blocks-pro/column', { id: n + 1, className: column_count }]);
	});

	// 
	const sheet = jss.createStyleSheet({
		"@global": {
			[`.em-section-${attributes.blockId}`]: {
				overflow: attributes[getAttributeValueDynamic(attributes, "setting", "section_overflow")],
				"& >.em-columns": {
					minHeight: attributes[getAttributeValueDynamic(attributes, "setting", "section_height_type")] === "min-height" ? attributes[getAttributeValueDynamic(attributes, "setting", "section_min_height")] : "",
					height: attributes[getAttributeValueDynamic(attributes, "setting", "section_height_type")] === "fit-to-screen" ? "100%" : "",
					[`& >.em-columns-container`]: {
						// padding: "8px",
						// display: 'flex',
						// gap: "10px",
						minHeight: attributes[getAttributeValueDynamic(attributes, "setting", "section_height_type")] === "min-height" ? attributes[getAttributeValueDynamic(attributes, "setting", "section_min_height")] : "",
						height: attributes[getAttributeValueDynamic(attributes, "setting", "section_height_type")] === "fit-to-screen" ? "100%" : "",
						alignItems: attributes[getAttributeValueDynamic(attributes, "setting", "section_height_type")] !== "default" ? attributes[getAttributeValueDynamic(attributes, "setting", "section_column_position")] : "stretch",
						maxWidth: attributes[getAttributeValueDynamic(attributes, "setting", "section_content_width")] === "boxed" ? `${attributes[getAttributeValueDynamic(attributes, "setting", "section_custom_width")]}px` : "100%",
						"& >.em-column-wrapper": {
							"& >.em-inner-block": {
								padding: attributes[getAttributeValueDynamic(attributes, "setting", "section_columns_gap")] !== "custom" ? attributes[getAttributeValueDynamic(attributes, "setting", "section_columns_gap")] : attributes[getAttributeValueDynamic(attributes, "setting", "section_custom_columns_gap")],
								"& >.block-editor-inner-blocks": {
									"& >.block-editor-block-list__layout": {
										alignContent: attributes[getAttributeValueDynamic(attributes, "setting", "section_vertical_align")],
										alignItems: attributes[getAttributeValueDynamic(attributes, "setting", "section_vertical_align")],
									}
								}
							}
						}
					}
				},
				"@media (min-width: 768px)": {
					height: attributes[getAttributeValueDynamic(attributes, "setting", "section_height_type")] === "fit-to-screen" ? "100vh" : "",
				}
			}
		}
	})

	const blockProps = useBlockProps({ className: `em-section-${attributes.blockId}` })
	// Allow Inner Blocks
	const { ...innerBlocksProps } = useInnerBlocksProps(blockProps, {
		allowedBlocks: ['advanced-blocks-pro/column'],
		template: getColumnsTemplate(attributes.columns)
	});
	let HTML_Tag = attributes[getAttributeValueDynamic(attributes, "setting", "section_html_tag")]
	return <><InspectorControls>
		<PanelBody title="Columns">
			<CustomRangeControl
				label="Columns"
				min={1}
				max={12}
				value={attributes.columns}
				onChange={(e) => {
					updateColumn(attributes.columns, e);
					setAttributes({ columns: e })
				}}
			/>
		</PanelBody>
	</InspectorControls> <HTML_Tag {...innerBlocksProps}>
			<style>{sheet.toString()}</style>
			<MediaParent attribute_name="wrapper" className="em-columns" edit={true} {...props} innerblock={true}>
				<div className='em-columns-container'>
					{innerBlocksProps.children}
				</div>
			</MediaParent>
		</HTML_Tag></>
}
