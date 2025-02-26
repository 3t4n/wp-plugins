import { MediaParent, } from '../../filters/frontend_components';
const { useBlockProps, InnerBlocks } = wp.blockEditor;
import jss from 'jss'
import { fontStyle } from '../../filters/frontend_components/cssFunc';
import { getAttributeValueDynamic } from '../../helper/globalFunctions';

export default function save(props) {
	const { attributes } = props;

	const blockProps = useBlockProps.save({
		className: "em-column-wrapper",
		style: {
			flexBasis: attributes.column_width,
			flexGrow: attributes.column_width && 0,
		}
	})
	const sheet = jss.createStyleSheet({
		"@global": {
			[`.em-wrapper-${attributes.blockId}`]: {
				alignContent: attributes.vertical_align ? `${attributes.vertical_align} !important` : "",
				alignItems: attributes.vertical_align ? `${attributes.vertical_align} !important` : "",
			}
		}
	})

	return <div {...blockProps}>
		<MediaParent sliderId={12} attribute_name="wrapper" className="em-inner-block" {...props} innerblock={true} >
			<InnerBlocks.Content />
			<style>{sheet.toString()}</style>
		</MediaParent>
	</div>
}
