import React, { useEffect } from 'react'
import { __ } from '@wordpress/i18n';
import { MediaParent, EMMedia, EMTitle, EmButton, Col } from '../../filters/frontend_components';
import { apply_font_style, getAttributeValueDynamic } from '../../helper/globalFunctions';
const { useBlockProps, useInnerBlocksProps, InspectorControls } = wp.blockEditor;
const { PanelBody } = wp.components;
import jss from 'jss'
import { CustomButton, CustomButtonGroup, CustomRangeControl, CustomToggleControl, SelectControls } from '../../filters/component/custom_panel/panel';
import './editor.scss';

const TEMPLATE = [
	[
		'advanced-blocks-pro/icon-list'
	]
];

export default function Edit(props) {
	const { attributes, setAttributes, clientId } = props;
	const { blockId } = attributes;

	const blockProps = useBlockProps()

	// Allow Inner Blocks
	const { ...innerBlocksProps } = useInnerBlocksProps(blockProps, {
		allowedBlocks: ['advanced-blocks-pro/icon-list-child'],
		template: TEMPLATE
	});

	if (!blockId) {
		setAttributes({ blockId: clientId });
	} else {
		setAttributes({ blockId: clientId });
	}
	useEffect(() => {
		apply_font_style(attributes[getAttributeValueDynamic(attributes, "title", "font_family")])
		apply_font_style(attributes[getAttributeValueDynamic(attributes, "subTitle", "font_family")])
		apply_font_style(attributes[getAttributeValueDynamic(attributes, "button", "font_family")])
	}, []);

	const sheet = jss.createStyleSheet({
		"@global": {
			[`.em-wrapper-${attributes.blockId}`]: {
				display: attributes.img_pos !== "center" ? "flex" : "",
				flexDirection: attributes.img_pos === "right" ? "row-reverse" : "",
				alignItems: attributes.img_pos !== "center" ? attributes.vertical_align : "",
				textAlign: attributes.align,
				[`& .em-infobox-banner`]: {
					width: attributes.type !== "icon" && attributes.width && `${attributes.width}%`,
					marginBottom: attributes.img_pos === "center" ? `${attributes.image_spacing}px` : "",
					marginRight: attributes.img_pos === "left" ? `${attributes.image_spacing}px` : "",
					marginLeft: attributes.img_pos === "right" ? `${attributes.image_spacing}px` : "",
				},
				["& .em-infobox-content"]: {
					WebkitBoxFlex: attributes.img_pos !== "center" ? 1 : "",
					flexGrow: attributes.img_pos !== "center" ? 1 : "",
					["& .em-icon-list-items"]: {
						marginBottom: `${attributes.icon_list_spacing}px`,
						["& .em-icon-list-item"]: {
							justifyContent: attributes.align
						}
					}
				}
			}
		}
	})

	return <>
		<InspectorControls>
			<PanelBody title="InfoBox">
				{attributes.media &&
					<>
						<CustomButtonGroup label="Type">
							<CustomButton
								variant={attributes.type === "image"}
								onClick={(new_value) => {
									setAttributes({ type: "image" });
								}}><i className="far fa-image" /></CustomButton>
							<CustomButton
								variant={attributes.type === "icon"}
								onClick={(new_value) => {
									setAttributes({ type: "icon" });
								}}><i className="fas fa-volleyball-ball" /></CustomButton>
							<CustomButton
								variant={attributes.type === "video"}
								onClick={(new_value) => {
									setAttributes({ type: "video" });
								}}><i className="fas fa-video" /></CustomButton>
						</CustomButtonGroup>


						<CustomButtonGroup label="Image Position">
							<CustomButton
								variant={attributes.img_pos === "left"}
								onClick={(new_value) => {
									setAttributes({ img_pos: "left" });
								}}><i className="fas fa-chevron-left" /></CustomButton>
							<CustomButton
								variant={attributes.img_pos === "center"}
								onClick={(new_value) => {
									setAttributes({ img_pos: "center" });
								}}><i className="fas fa-chevron-up" /></CustomButton>
							<CustomButton
								variant={attributes.img_pos === "right"}
								onClick={(new_value) => {
									setAttributes({ img_pos: "right" });
								}}><i className="fas fa-chevron-right" /></CustomButton>
						</CustomButtonGroup>
						{attributes.img_pos !== "center" &&
							<SelectControls
								label="Type"
								options={[
									{ value: "flex-start", label: "Top" },
									{ value: "center", label: "Middle" },
									{ value: "flex-end", label: "Bottom" }
								]}
								value={attributes.vertical_align}
								onChange={(value) => {
									setAttributes({ vertical_align: value, });
								}}
							/>
						}
						<CustomRangeControl
							label="Media Spacing"
							max={100}
							value={attributes.image_spacing}
							onChange={(new_value) => {
								setAttributes({
									image_spacing: new_value,
								});
							}}
						/>
						{attributes.type !== "icon" &&
							<CustomRangeControl
								label="Width (%)"
								max={100}
								value={attributes.width}
								onChange={(new_value) => {
									setAttributes({
										width: new_value,
									});
								}}
							/>}
					</>
				}

				<CustomButtonGroup label="Align">
					<CustomButton
						variant={attributes.align === "left"}
						onClick={(new_value) => {
							setAttributes({ align: "left" });
						}}><i className="fas fa-align-left" /></CustomButton>
					<CustomButton
						variant={attributes.align === "center"}
						onClick={(new_value) => {
							setAttributes({ align: "center" });
						}}><i className="fas fa-align-center" /></CustomButton>
					<CustomButton
						variant={attributes.align === "right"}
						onClick={(new_value) => {
							setAttributes({ align: "right" });
						}}><i className="fas fa-align-right" /></CustomButton>
					<CustomButton
						variant={attributes.align === "justify"}
						onClick={(new_value) => {
							setAttributes({ align: "justify" });
						}}><i className="fas fa-align-justify" /></CustomButton>
				</CustomButtonGroup>


				<CustomToggleControl
					label={`Media ${attributes.media ? "Show" : "Hide"}`}
					checked={attributes.media}
					onChange={(new_value) => {
						setAttributes({
							media: new_value,
						});
					}}
				/>
				<CustomToggleControl 
					label={`Title ${attributes.title ? "Show" : "Hide"}`}
					checked={attributes.title}
					onChange={(new_value) => {
						setAttributes({
							title: new_value,
						});
					}}
				/>
				<CustomToggleControl
					label={`Icon List ${attributes.icon_list ? "Show" : "Hide"}`}
					checked={attributes.icon_list}
					onChange={(new_value) => {
						setAttributes({
							icon_list: new_value,
						});
					}}
				/>
				{attributes.icon_list && <CustomRangeControl
					label="Icon List Spacing"
					max={100}
					value={attributes.icon_list_spacing}
					onChange={(new_value) => {
						setAttributes({
							icon_list_spacing: new_value,
						});
					}}
				/>}
				<CustomToggleControl
					label={`SubTitle ${attributes.subTitle ? "Show" : "Hide"}`}
					checked={attributes.subTitle}
					onChange={(new_value) => {
						setAttributes({
							subTitle: new_value,
						});
					}}
				/>
				<CustomToggleControl
					label={`Button ${attributes.button ? "Show" : "Hide"}`}
					checked={attributes.button}
					onChange={(new_value) => {
						setAttributes({
							button: new_value,
						});
					}}
				/>
			</PanelBody>
		</InspectorControls>
		<style>{sheet.toString()}</style>
		<div {...innerBlocksProps}>
			<MediaParent attribute_name="wrapper" innerblock={true} edit={true}	{...props}>
				{attributes.media &&
					<Col className="em-infobox-banner" {...props} >
						<EMMedia
							style={{ height: attributes[getAttributeValueDynamic(attributes, "choose", "media_height")] }}
							className={`em-image-wrapper`}
							type={attributes.type}
							edit={true}
							attribute_name="choose"
							{...props} />
					</Col>}
				<Col
					className="em-infobox-content" {...props}>
					{attributes.title &&
						<EMTitle type="rich" tagName={attributes[getAttributeValueDynamic(attributes, "title", "text_tag")]} edit={true} attribute_name="title" {...props} />
					}
					{attributes.subTitle &&
						<EMTitle type="rich" tagName={attributes[getAttributeValueDynamic(attributes, "subTitle", "text_tag")]} className="subTitle" edit={true} attribute_name="subTitle" {...props} />
					}
					{attributes.icon_list &&
						innerBlocksProps.children
					}
					{attributes.button &&
						<EmButton attribute_name="button" {...props} />}
				</Col>
			</MediaParent>
		</div>
	</>

}
