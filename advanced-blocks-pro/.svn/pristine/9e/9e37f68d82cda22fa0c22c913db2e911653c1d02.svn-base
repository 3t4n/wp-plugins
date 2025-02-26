import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { ReactComponent as Icon } from '../../helper/blocks-svg/heading.svg'
import './style.scss';
import Edit from './edit';
import save from './save';
import metadata from './block.json';

registerBlockType( metadata.name, {
	keywords: [
		__('heading', 'advanced-blocks-pro'),
		__('paragraph', 'advanced-blocks-pro'),
		__('text', 'advanced-blocks-pro'),
		__('bold', 'advanced-blocks-pro'),
		__('title', 'advanced-blocks-pro'),
		__('subTitle', 'advanced-blocks-pro')
	  ],
	icon:<Icon width="20" height="20" className="block-icon" />,
	edit: Edit,
	save,
} );
