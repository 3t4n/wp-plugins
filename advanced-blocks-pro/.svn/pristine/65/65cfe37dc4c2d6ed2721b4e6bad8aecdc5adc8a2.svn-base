import { useEffect } from "react";
import { __ } from '@wordpress/i18n';
import { MediaParent, EMTitle } from '../../filters/frontend_components';
import { apply_font_style, getAttributeValueDynamic } from '../../helper/globalFunctions';
import './editor.scss';

export default function Edit(props) {
	const { attributes, setAttributes, clientId } = props;
	const { blockId } = attributes;
	if (!blockId) {
		setAttributes({ blockId: clientId });
	}else{
		setAttributes({ blockId: clientId });
	}
	useEffect(() => {
		apply_font_style(attributes[getAttributeValueDynamic(attributes, "title", "font_family")])
	}, []);
	return <>
		<MediaParent attribute_name="wrapper" edit={true} {...props}>
			<EMTitle type="rich" tagName={attributes[getAttributeValueDynamic(attributes, "title", "text_tag")]} edit={true} attribute_name="title" {...props} />
		</MediaParent>
	</>
}
