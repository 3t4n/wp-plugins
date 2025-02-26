import { EMMedia, MediaParent } from '../../filters/frontend_components';
const { useBlockProps , RichText } = wp.blockEditor;

export default function save(props) {
	const { attributes } = props
	const blockProps = useBlockProps.save()
	// console.log("saveCheck", props)
	return (
		<option {...blockProps} value={attributes.field_value}> 
			<RichText.Content
				tagName="sup"
				style={{ color: "red" }} 
				value={attributes.field_label} 
			/>
		</option>
	);
}
