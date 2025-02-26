import React from 'react';
import { __ } from '@wordpress/i18n';
import './editor.scss';
import jss from 'jss'
import { MediaParent } from '../../filters/frontend_components';
import { SelectControls } from '../../filters/component/custom_panel/panel';
const { useBlockProps, useInnerBlocksProps, InnerBlocks, InspectorControls } = wp.blockEditor;
const { PanelBody, __experimentalUnitControl } = wp.components;
const UnitControl = __experimentalUnitControl;

export default function Edit(props) {
	const { attributes, setAttributes, clientId } = props;
	const { blockId } = attributes;
	if (!blockId) {
		setAttributes({ blockId: clientId });
	} else {
		setAttributes({ blockId: clientId });
	}

	const hasChildBlocks = wp.data.select('core/block-editor').getBlockOrder(clientId).length > 0;
	const blockProps = useBlockProps({
		className: "em-column-wrapper",
		style: {
			flexBasis: attributes.column_width,
			flexGrow: attributes.column_width && 0,
		}
	})
	// Allow Inner Blocks
	// const { ...innerBlocksProps } = useInnerBlocksProps(blockProps, {
	// 	renderAppender : hasChildBlocks ? undefined : InnerBlocks.ButtonBlockAppender ,
	// 	orientation:"vertical"
	// });

	const sheet = jss.createStyleSheet({
		"@global": {
			[`.em-wrapper-${attributes.blockId}`]: {
				"& >.block-editor-inner-blocks": {
					"& >.block-editor-block-list__layout": {
						alignContent: attributes.vertical_align ? `${attributes.vertical_align} !important` : "",
						alignItems: attributes.vertical_align ? `${attributes.vertical_align} !important` : "",
					}
				}
			}
		}
	})

	return <>
		<InspectorControls>
			<PanelBody title="Settings">
				<UnitControl
					label="Colunms"
					value={attributes.column_width}
					min={0}
					max={100}
					units={[
						{ value: '%', label: '%', default: 10 }
					]}
					onChange={(v) => {
						setAttributes({ column_width: v })
					}}
				/>
				<SelectControls
					label="Vertical Align"
					options={[
						{ label: "Top", value: "flex-start" },
						{ label: "Middle", value: "center" },
						{ label: "Bottom", value: "flex-end" },
						{ label: "Space Between", value: "space-between" },
						{ label: "Space Around", value: "space-around" },
						{ label: "Space Evenly", value: "space-evenly" }
					]}
					value={attributes.vertical_align}
					onChange={(e) => {
						setAttributes({ vertical_align: e })
					}}
				/>
			</PanelBody>
		</InspectorControls>
		<div {...blockProps}>
			<MediaParent attribute_name="wrapper" className="em-inner-block" edit={true} {...props} innerblock={true}>
				{/* {innerBlocksProps.children} */}
				<InnerBlocks
					renderAppender={(
						hasChildBlocks ?
							undefined :
							InnerBlocks.ButtonBlockAppender
					)}
					orientation="vertical"
				/>
				<style>{sheet.toString()}</style>
			</MediaParent>
		</div>
	</>
}
