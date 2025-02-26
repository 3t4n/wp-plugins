import React ,{useEffect} from "react";
import './editor.scss';
import { EMMedia, MediaParent } from '../../filters/frontend_components';
import { apply_font_style, getAttributeValueDynamic } from '../../helper/globalFunctions';

export default function Edit(props) {

	const { attributes, setAttributes, clientId } = props;
	const { blockId } = attributes;
	if (!blockId) {
		setAttributes({ blockId: clientId });
	}else{
		setAttributes({ blockId: clientId });
	}
	useEffect(() => {
		apply_font_style(attributes[getAttributeValueDynamic(attributes, "slider", "font_family")])
	}, []);
	return <>
	<MediaParent attribute_name="wrapper" edit={true} {...props}>
		<EMMedia
			type="slider"
			edit={true}
			attribute_name="slider"
			{...props} />
	</MediaParent>
	</>
}
