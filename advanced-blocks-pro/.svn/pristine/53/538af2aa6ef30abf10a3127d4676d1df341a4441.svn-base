import React from "react"
import { __ } from '@wordpress/i18n';
import './editor.scss';
import { CustomInputField, CustomNumberPanel, CustomToggleControl, SelectControls } from '../../filters/component/custom_panel/panel';
const { useBlockProps, useInnerBlocksProps, InspectorControls, RichText } = wp.blockEditor;
const { PanelBody } = wp.components;

const TEMPLATE = [
	[
		'advanced-blocks-pro/form-field-select', { field_label: "One", field_value: "one", field_id: "one", field_name: "one" }
	],
	[
		'advanced-blocks-pro/form-field-select', { field_label: "Two", field_value: "two", field_id: "two", field_name: "two" }
	],
	[
		'advanced-blocks-pro/form-field-select', { field_label: "Three", field_value: "three", field_id: "three", field_name: "three" }
	]
];

export default function Edit(props) {
	const { attributes, setAttributes, clientId } = props;
	// console.log("check", props)
	const { blockId } = attributes;
	if (!blockId) {
		setAttributes({ blockId: clientId });
	}else{
		setAttributes({ blockId: clientId });
	}

	const blockProps = useBlockProps({
		className: `em-field-group em-column em-col-${attributes.column_width}`
	})

	// Allow Inner Blocks
	const { ...innerBlocksProps } = useInnerBlocksProps(blockProps, {
		allowedBlocks: ['advanced-blocks-pro/form-field-select'],
		template: TEMPLATE
	});

	const [visible, setVisible] = React.useState(false)

	return <>
		<InspectorControls>
			<PanelBody title="Form Fields">
				<SelectControls
					label="Type"
					options={[
						{ value: "text", label: "Text" },
						{ value: "textarea", label: "Textarea" },
						{ value: "password", label: "Password" },
						{ value: "url", label: "Url" },
						{ value: "email", label: "Email" },
						{ value: "number", label: "Number" },
						{ value: "range", label: "Range" },
						{ value: "tel", label: "Tel" },
						{ value: "file", label: "File Upload" },
						{ value: "select", label: "Select" },
						{ value: "radio", label: "Radio" },
						{ value: "checkbox", label: "Checkbox" },
						{ value: "date", label: "Date" },
						{ value: "datetime-local", label: "Datetime Local" },
						{ value: "week", label: "Week" },
						{ value: "time", label: "Time" },
					]}
					value={attributes.field_type}
					onChange={(e) => {
						setAttributes({ field_type: e })
					}}
				/>
				<CustomInputField
					label="Label"
					style={{ width: "120px" }}
					value={attributes.field_label}
					onChange={(new_value) => {
						setAttributes({ field_label: new_value });
					}}
				/>
				{attributes.field_type !== "checkbox" &&
					<CustomInputField
						label="Name"
						style={{ width: "120px" }}
						value={attributes.field_name}
						onChange={(new_value) => {
							setAttributes({ field_name: new_value });
						}}
					/>}
				{(attributes.field_type === "checkbox" || attributes.field_type === "radio") ?"":
					<CustomInputField
						label="Id"
						style={{ width: "120px" }}
						value={attributes.field_id}
						onChange={(new_value) => {
							setAttributes({ field_id: new_value });
						}}
					/>}
				{(attributes.field_type === "range" || attributes.field_type === "date" || attributes.field_type === "select" || attributes.field_type === "radio" || attributes.field_type === "checkbox") ? "":
					<CustomInputField
						label="Placeholder"
						style={{ width: "120px" }}
						value={attributes.field_placeholder}
						onChange={(new_value) => {
							setAttributes({ field_placeholder: new_value });
						}}
					/>}
				{(attributes.field_type === "checkbox" || attributes.field_type === "radio") &&
					<CustomToggleControl
						label={"Inline List"}
						checked={attributes.inline_list}
						onChange={(e) => {
							setAttributes({ inline_list: e })
						}}
					/>}
				<CustomToggleControl
					label={attributes.required_toggle ? "Required True" : "Required False"}
					checked={attributes.required_toggle}
					onChange={(e) => {
						setAttributes({ required_toggle: e })
					}}
				/>

				<SelectControls
					label="Column Width"
					options={[
						{ value: "20", label: "20%" },
						{ value: "25", label: "25%" },
						{ value: "30", label: "30%" },
						{ value: "33", label: "33%" },
						{ value: "40", label: "40%" },
						{ value: "50", label: "50%" },
						{ value: "60", label: "60%" },
						{ value: "66", label: "66%" },
						{ value: "70", label: "70%" },
						{ value: "75", label: "75%" },
						{ value: "80", label: "80%" },
						{ value: "100", label: "100%" },
					]}
					value={attributes.column_width}
					onChange={(e) => {
						setAttributes({ column_width: e })
					}}
				/>
				{attributes.field_type === "textarea" &&
					<CustomNumberPanel
						label="Row"
						value={attributes.field_row}
						onChange={(e) => {
							setAttributes({ field_row: e })
						}}
					/>
				}
			</PanelBody>
		</InspectorControls>
		<div {...innerBlocksProps}>
			{attributes.label_toggle &&
				<>
					<label for={attributes.field_id} className='em-field-label'>{attributes.field_label} {attributes.required_toggle &&
						<RichText
							tagName="sup"
							style={{ color: "red", fontSize: "12px" }}
							placeholder="Enter a required field label"
							value={__(attributes.required_text,"advanced-blocks-pro")}
							onChange={(e) => {
								setAttributes({ required_text: e })
							}}
						/>
					}
					</label>

				</>
			}
			{attributes.field_type === "select" ?
				<div className="em-select-field">
					<div className="em-form-control em-field-textual" style={{ display: "flex", alignItems: "center", justifyContent: "space-between" }} isSecondary onClick={(e) => setVisible(!visible)}>
						<span>{__("Choose options","advanced-blocks-pro")} </span><i aria-hidden="true" class="fas fa-angle-down"></i>
					</div>
					{visible && (
						<div style={{ padding: "16px" }}>
							{innerBlocksProps.children}
						</div>
					)}
				</div>
				: (attributes.field_type === "radio" || attributes.field_type === "checkbox") ?
					<div className={`em-field-subgroup  ${attributes.inline_list ? "em-subgroup-inline" : ""} `}>
						{innerBlocksProps.children}
					</div>
					: attributes.field_type === "textarea" ?
						<textarea name={attributes.field_name} id={attributes.field_id} placeholder={attributes.field_placeholder} rows={attributes.field_row} className="em-form-control em-field-textual" required={attributes.required_toggle} />
						:
						<input type={attributes.field_type} name={attributes.field_name} id={attributes.field_id} placeholder={attributes.field_placeholder} className="em-form-control em-field-textual" required={attributes.required_toggle} />
			}
		</div>
	</>
}
