import { registerBlockType } from '@wordpress/blocks';
import { ReactComponent as Icon } from '../../helper/blocks-svg/form.svg'
import './style.scss';
import Edit from './edit';
import save from './save';
import metadata from './block.json';
registerBlockType( metadata.name, {
	icon:<Icon width="20" height="20" className="block-icon" />,
	edit: Edit,
	save,
} );
