import React , {useEffect} from 'react'
import { __ } from '@wordpress/i18n';
import './editor.scss';
import jss from 'jss'
import { EmButton, MediaParent } from '../../filters/frontend_components';
import { CustomColorPalette2, CustomInputField, CustomRangeControl, CustomToggleControl, SelectControls } from '../../filters/component/custom_panel/panel';
import { fontStyle } from '../../filters/frontend_components/cssFunc';
import { apply_font_style, getAttributeValueDynamic } from '../../helper/globalFunctions';
const { useBlockProps, useInnerBlocksProps, InspectorControls } = wp.blockEditor;

const { PanelBody } = wp.components;


const TEMPLATE = [
	[
		'advanced-blocks-pro/form-field', { field_type: "text", field_label: "First Name", field_name: "fname", field_id: "fname" , field_placeholder: "Enter First Name", column_width:"50"}
	],
	[
		'advanced-blocks-pro/form-field', { field_type: "text", field_label: "Last Name", field_name: "lname", field_id: "lname", field_placeholder: "Enter Last Name", column_width:"50"}
	],
	[
		'advanced-blocks-pro/form-field', { field_type: "email", field_label: "Email", field_name: "email", field_id: "email", field_placeholder: "Enter Email", column_width:"100"}
	],
	[
		'advanced-blocks-pro/form-field', { field_type: "textarea", field_label: "Message", field_name: "message", field_id: "message", field_placeholder: "Message", column_width:"100"}
	]
];
export default function Edit(props) {
	const { attributes, setAttributes, clientId } = props;
	const { blockId } = attributes;
	if (!blockId) {
		setAttributes({ blockId: clientId });
	}else{
		setAttributes({ blockId: clientId });
	}
	useEffect(() => {
		apply_font_style(attributes[getAttributeValueDynamic(attributes, "label", "font_family")])
		apply_font_style(attributes[getAttributeValueDynamic(attributes, "field", "font_family")])
		apply_font_style(attributes[getAttributeValueDynamic(attributes, "button", "font_family")])
	}, []);

	const blockProps = useBlockProps()

	// Allow Inner Blocks
	const { ...innerBlocksProps } = useInnerBlocksProps(blockProps, {
		allowedBlocks: ['advanced-blocks-pro/form-field'],
		template: TEMPLATE
	});

	const sheet = jss.createStyleSheet({
		"@global": {
			[`.em-wrapper-${attributes.blockId}`]: {
				["& .em-field-group , .em-field-button-group"]: {
					paddingRight: `calc(${attributes.columns_gap}px / 2)`,
					paddingLeft: `calc(${attributes.columns_gap}px / 2)`
				},
				["& .em-field-group"]: {
					marginBottom: `${attributes.rows_gap}px`
				},
				[`& .em-field-label`]: {
					...fontStyle(attributes, "label", ""),
					display:attributes.label_toggle ? "block" : "none"
				},
				[`& .em-field-textual`]: {
					...fontStyle(attributes, "field", ""),
					backgroundColor: attributes.field_bg,
					borderTopLeftRadius: attributes[getAttributeValueDynamic(attributes, "field", "border_radius")]?.top,
					borderTopRightRadius: attributes[getAttributeValueDynamic(attributes, "field", "border_radius")]?.right,
					borderBottomLeftRadius: attributes[getAttributeValueDynamic(attributes, "field", "border_radius")]?.bottom,
					borderBottomRightRadius: attributes[getAttributeValueDynamic(attributes, "field", "border_radius")]?.left,
					borderTopWidth: attributes[getAttributeValueDynamic(attributes, "field", "border_width")]?.top,
					borderRightWidth: attributes[getAttributeValueDynamic(attributes, "field", "border_width")]?.right,
					borderBottomWidth: attributes[getAttributeValueDynamic(attributes, "field", "border_width")]?.bottom,
					borderLeftWidth: attributes[getAttributeValueDynamic(attributes, "field", "border_width")]?.left,
					borderColor: attributes[getAttributeValueDynamic(attributes, "field", "border_color")],

				},
				'@media (max-width: 768px)': {
					[`& .em-field-label`]: {
						...fontStyle(attributes, "label", "_tablet"),
					},
					[`& .em-field-textual`]: {
						...fontStyle(attributes, "field", "_tablet"),
					}
				},
				'@media (max-width: 600px)': {
					[`& .em-field-label`]: {
						...fontStyle(attributes, "label", "_mobile"),
					},
					[`& .em-field-textual`]: {
						...fontStyle(attributes, "field", "_mobile"),
					}
				},
			}
		}
	})


	return <>
		<InspectorControls>
			<PanelBody title="Form">
				<CustomInputField
					label="Form Name"
					style={{ width: "140px" }}
					value={attributes.form_name}
					onChange={(new_value) => {
						setAttributes({ form_name: new_value });
					}}
				/>
				<SelectControls
					label="Input Size"
					options={[
						{ value: "xs", label: "Extra Small" },
						{ value: "sm", label: "Small" },
						{ value: "md", label: "Medium" },
						{ value: "lg", label: "Large" },
						{ value: "xl", label: "Extra Large" },
					]}
					value={attributes.input_size}
					onChange={(e) => {
						setAttributes({ input_size: e })
					}}
				/>
				<CustomToggleControl
					label={attributes.label_toggle ? "Label Show" : "Label Hide"}
					checked={attributes.label_toggle}
					onChange={(e) => {
						setAttributes({ label_toggle: e })
					}}
				/>
				<PanelBody title="Style" className="em-custom-panel">
					<CustomRangeControl
						label="Columns Gap"
						min={0}
						max={60}
						value={attributes.columns_gap}
						onChange={(e) => {
							setAttributes({ columns_gap: e })
						}}
					/>
					<CustomRangeControl
						label="Rows Gap"
						min={0}
						max={60}
						value={attributes.rows_gap}
						onChange={(e) => {
							setAttributes({ rows_gap: e })
						}}
					/>
					<CustomColorPalette2 
						label={"Field Background"}
						value={attributes.field_bg}
						onChange={(new_value) => {
							setAttributes({ field_bg: new_value });
						}}
					/>
				</PanelBody>
			</PanelBody>
		</InspectorControls>
		<div {...innerBlocksProps}>
			<MediaParent attribute_name="wrapper" edit={true} {...props} innerblock={true} >
				<form className='em-form' method="post" name={attributes.form_name}>
					<div className={`em-form-wrapper em-size-${attributes.input_size}`}>
						{innerBlocksProps.children}
						<div className='em-field-button-group' style={{ width: "100%" }}>
							<EmButton attribute_name="button" {...props} button={true} />
							{/* <button style={{display:"inline-block"}}>Submit</button> */}
						</div>
					</div>
				</form>
			</MediaParent>
			<style>{sheet.toString()}</style>
		</div>
	</>
}
