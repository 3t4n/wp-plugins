import { __ } from '@wordpress/i18n';
import './editor.scss';
import { CustomInputField } from '../../filters/component/custom_panel/panel';
const { useBlockProps, InspectorControls, RichText } = wp.blockEditor;
const { PanelBody } = wp.components;

export default function Edit(props) {
	const { attributes, setAttributes, clientId, context } = props;
	const { blockId } = attributes;
	if (!blockId) {
		setAttributes({ blockId: clientId });
	}else{
		setAttributes({ blockId: clientId });
	}
	const blockProps = useBlockProps({ className: 'em-field-option' })
	console.log("check", props)

	return <>
		<InspectorControls>
			<PanelBody title="Form Fields">
				<CustomInputField
					label="Label"
					style={{ width: "120px" }}
					value={attributes.field_label}
					onChange={(new_value) => {
						setAttributes({ field_label: new_value });
					}}
				/>
				<CustomInputField
					label="Value"
					style={{ width: "120px" }}
					value={attributes.field_value}
					onChange={(new_value) => {
						setAttributes({ field_value: new_value });
					}}
				/>

				{context.field_type === "checkbox" &&
					<CustomInputField
						label="Name"
						style={{ width: "120px" }}
						value={attributes.field_name}
						onChange={(new_value) => {
							setAttributes({ field_name: new_value });
						}}
					/>}
				{context.field_type !== "select" &&
				<CustomInputField
					label="Id"
					style={{ width: "120px" }}
					value={attributes.field_id}
					onChange={(new_value) => {
						setAttributes({ field_id: new_value });
					}}
				/>}
			</PanelBody>
		</InspectorControls>
		{context.field_type === "select" ?
			<div {...useBlockProps()}>
				<RichText
					tagName="span"
					placeholder="Enter label"
					value={attributes.field_label}
					onChange={(e) => {
						setAttributes({ field_label: e })
					}}
				/>
			</div>
			: (context.field_type === "radio" || context.field_type === "checkbox") &&
			<span {...blockProps}>
				<input type={context.field_type} value={attributes.field_value} id={attributes.field_id} name={context.field_type === "radio" ? context.field_name : attributes.field_name } required={context.required_toggle}/>
				<RichText
					tagName="label"
					placeholder="Enter label"
					value={attributes.field_label}
					onChange={(e) => {
						setAttributes({ field_label: e })
					}}
				/>
			</span>
		}


	</>
}
