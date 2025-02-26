import { EMTitle, MediaParent } from "../../filters/frontend_components";
import { getAttributeValueDynamic } from "../../helper/globalFunctions";

export default function save(props) {
	const { attributes} = props;
	return <MediaParent sliderId={3} attribute_name="wrapper" {...props}>
		<EMTitle type="rich" tagName={attributes[getAttributeValueDynamic(attributes, "title", "text_tag")]} attribute_name="title" {...props} />
	</MediaParent>
}