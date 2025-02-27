import './style.scss';
import './editor.scss';
import icon from './icon';
import edit from './edit';
import save from './save';

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

registerBlockType( 'straightvisions/twitch-stream', {
	title: __( 'SV Block for Twitch', 'sv_block_for_twitch' ),
	description: __( 'Display a Twitch Livestream.', 'sv_block_for_twitch' ),
	icon,
	category: 'straightvisions',
	keywords: [
		__( 'SV Block for Twitch - Latest Posts', 'sv_block_for_twitch' ),
		__( 'Stream', 'sv_block_for_twitch' ),
		__( 'Video', 'sv_block_for_twitch' ),
	],
	attributes: {
		username: {
			type: 'string',
		},
		autoplay: {
			type: 'boolean',
			default: true,
		},
		allowfullscreen: {
			type: 'boolean',
			default: true,
		}
	},
	edit,
	save,
} );
