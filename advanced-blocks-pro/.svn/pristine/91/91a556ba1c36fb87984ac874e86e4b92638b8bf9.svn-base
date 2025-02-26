import { MediaParent, } from '../../filters/frontend_components';
const { useBlockProps, InnerBlocks } = wp.blockEditor;
import jss from 'jss'
import { fontStyle } from '../../filters/frontend_components/cssFunc';
import { getAttributeValueDynamic } from '../../helper/globalFunctions';

export default function save(props) {
	const { attributes } = props;

	const sheet = jss.createStyleSheet({
		"@global": {
			[`.em-section-${attributes.blockId}`]: {
				overflow: attributes[getAttributeValueDynamic(attributes, "setting", "section_overflow")],
				"& >.em-columns":{
					minHeight: attributes[getAttributeValueDynamic(attributes, "setting", "section_height_type")] === "min-height" ? attributes[getAttributeValueDynamic(attributes, "setting", "section_min_height")] :"",
					height: attributes[getAttributeValueDynamic(attributes, "setting", "section_height_type")] === "fit-to-screen" ? "100%" :"",
					[`& >.em-columns-container`]: {
					// padding: "8px",
					// display: 'flex',
					// gap: "10px",
					minHeight: attributes[getAttributeValueDynamic(attributes, "setting", "section_height_type")] === "min-height" ? attributes[getAttributeValueDynamic(attributes, "setting", "section_min_height")] :"",
					height: attributes[getAttributeValueDynamic(attributes, "setting", "section_height_type")] === "fit-to-screen" ? "100%" :"",
					alignItems: attributes[getAttributeValueDynamic(attributes, "setting", "section_height_type")] !== "default" ? attributes[getAttributeValueDynamic(attributes, "setting", "section_column_position")] : "stretch",
					maxWidth: attributes[getAttributeValueDynamic(attributes, "setting", "section_content_width")] === "boxed" ? `${attributes[getAttributeValueDynamic(attributes, "setting", "section_custom_width")]}px` : "100%",
					"& >.em-column-wrapper": {
						"& >.em-inner-block": {
							padding: attributes[getAttributeValueDynamic(attributes, "setting", "section_columns_gap")] !== "custom" ? attributes[getAttributeValueDynamic(attributes, "setting", "section_columns_gap")] : attributes[getAttributeValueDynamic(attributes, "setting", "section_custom_columns_gap")],
							alignContent: attributes[getAttributeValueDynamic(attributes, "setting", "section_vertical_align")],
							alignItems: attributes[getAttributeValueDynamic(attributes, "setting", "section_vertical_align")],
						}
					}
				}},
				"@media (min-width: 768px)": {
					height: attributes[getAttributeValueDynamic(attributes, "setting", "section_height_type")] === "fit-to-screen" ? "100vh" : "",
				}
			}
		}
	})
	const blockProps = useBlockProps.save({ className: `em-section-${attributes.blockId}` })

	return <div {...blockProps}>
		<style>{sheet.toString()}</style>
		<MediaParent sliderId={11} attribute_name="wrapper" className="em-columns" {...props} innerblock={true} >
			<div className='em-columns-container'>
				<InnerBlocks.Content />
			</div>
		</MediaParent>
	</div>
}
