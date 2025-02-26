import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { ReactComponent as Icon } from '../../helper/blocks-svg/slider.svg'
import './style.scss';
import Edit from './edit';
import save from './save';
import metadata from './block.json';
registerBlockType( metadata.name, {
	keywords: [
		__("slider", "advanced-blocks-pro"), 
		__("image slider", "advanced-blocks-pro"),
		__("image carousel", "advanced-blocks-pro") 
	  ],
	icon:<Icon width="20" height="20" className="block-icon" />,
	edit: Edit,
	save,
} );
