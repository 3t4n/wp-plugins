import { __ } from '@wordpress/i18n';
import './editor.scss';
import { EMMedia, MediaParent } from '../../filters/frontend_components';

export default function Edit(props) {
	const { attributes, setAttributes, clientId } = props;
	const { blockId } = attributes;
	if (!blockId) {
		setAttributes({ blockId: clientId });
	}else{
		setAttributes({ blockId: clientId });
	}
	return <>
	<MediaParent attribute_name="wrapper" edit={true} {...props}>
		<EMMedia
			type="icon"
			edit={true}
			attribute_name="media"
			{...props} />
	</MediaParent>
	</>
}
