const { useBlockProps, InnerBlocks, RichText } = wp.blockEditor;
import { __ } from '@wordpress/i18n';

export default function save(props) {
	const { attributes } = props
	const blockProps = useBlockProps.save({
		className: `em-field-group em-column em-col-${attributes.column_width}`
	})

	return (
		<div {...blockProps}>
			{attributes.label_toggle && <label for={attributes.field_id} className='em-field-label'>{attributes.field_label}
				{attributes.required_toggle && <RichText.Content
					tagName="sup"
					style={{ color: "red" }}
					value={__(attributes.required_text,"advanced-blocks-pro")}
				/>}</label>}

			{attributes.field_type === "select" ?
				<div className="em-form-control em-select-field">
					<select name={attributes.field_name} id={attributes.field_id} placeholder={attributes.field_placeholder} className="em-form-control em-field-textual" required={attributes.required_toggle}>
						<option>{__("Choose options","advanced-blocks-pro")}</option>
						<InnerBlocks.Content />
					</select>
				</div>
				: (attributes.field_type === "radio" || attributes.field_type === "checkbox") ?
				<div className={`em-field-subgroup  ${attributes.inline_list ? "em-subgroup-inline" :"" } `}>
					<InnerBlocks.Content />
				</div>
				: attributes.field_type === "textarea" ?
					<textarea name={attributes.field_name} id={attributes.field_id} placeholder={attributes.field_placeholder} rows={attributes.field_row} className="em-form-control em-field-textual" required={attributes.required_toggle} />
					: <input type={attributes.field_type} name={attributes.field_name} id={attributes.field_id} placeholder={attributes.field_placeholder} className="em-form-control em-field-textual" required={attributes.required_toggle} />
			}
		</div>
	);
}
