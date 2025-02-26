import React from "react"
import { __ } from '@wordpress/i18n';
import './editor.scss';
import { EMTitle } from '../../filters/frontend_components';
  
export default function Edit(props) {
	const { attributes, setAttributes, clientId } = props; 
	const { blockId } = attributes;
	if (!blockId) {
		setAttributes({ blockId: clientId });
	}else{
		setAttributes({ blockId: clientId });
	} 
	return <> 
		<EMTitle type="icon-list" tagName="li" richtext={true} edit={true} attribute_name="list" {...props} />
	</>
}
