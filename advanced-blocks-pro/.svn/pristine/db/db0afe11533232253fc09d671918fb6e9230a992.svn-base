import { EmButton, MediaParent, } from '../../filters/frontend_components';
const { useBlockProps, InnerBlocks } = wp.blockEditor;
import jss from 'jss'
import { fontStyle } from '../../filters/frontend_components/cssFunc';
import { getAttributeValueDynamic } from '../../helper/globalFunctions';

export default function save(props) {
	const { attributes } = props;  

	const sheet = jss.createStyleSheet({
		"@global": {
			[`.em-wrapper-${attributes.blockId}`]: {
				["& .em-field-group , .em-field-button-group"]: {
					paddingRight: `calc(${attributes.columns_gap}px / 2)`,
					paddingLeft: `calc(${attributes.columns_gap}px / 2)`
				},
				["& .em-field-group"]:{
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
					borderRightWidth: attributes[getAttributeValueDynamic	(attributes, "field", "border_width")]?.right,
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


	return ( 
		<div {...useBlockProps}>
			<MediaParent sliderId={2} attribute_name="wrapper" {...props} innerblock={true} > 
			<form className='em-form' method="post" name={attributes.form_name}>
				<div className={`em-form-wrapper em-size-${attributes.input_size}`}>
					<InnerBlocks.Content />
					<div className='em-field-button-group' style={{width:"100%"}}>
						<EmButton attribute_name="button" {...props} button={true} />
							{/* <button style={{display:"inline-block"}}>Submit</button> */}
						</div>
				</div>
			</form>
			<style>{sheet.toString()}</style>
		</MediaParent>
		</div>
	);
}
