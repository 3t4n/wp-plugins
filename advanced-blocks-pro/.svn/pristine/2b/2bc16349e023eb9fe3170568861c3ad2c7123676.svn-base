import React , {useEffect} from 'react';
import { __ } from '@wordpress/i18n';
import './editor.scss';
import { EmButton, MediaParent } from '../../filters/frontend_components'; 
import { apply_font_style, getAttributeValueDynamic } from '../../helper/globalFunctions';

export default function Edit(props) {
	const { attributes, setAttributes, clientId } = props;
	const { blockId } = attributes;
	// console.log("button",attributes)
	if (!blockId) {
		setAttributes({ blockId: clientId });
	}else{
		setAttributes({ blockId: clientId });
	}
	useEffect(() => {
		apply_font_style(attributes[getAttributeValueDynamic(attributes, "button", "font_family")])
	}, []);

	return <>
	<MediaParent attribute_name="wrapper" edit={true} {...props}>
		<EmButton attribute_name="button" {...props} />
	</MediaParent>
	</>
}    
