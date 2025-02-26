import './styles.editor.scss';
import { blurb } from './data';

const { registerBlockType } = wp.blocks;
const { _n } = wp.i18n;
const { RichText} = wp.editor;
const defaultBlurb = blurb.gogh

registerBlockType('japanese-lorem-block/japaneseloremblock', {
	title: _n('Japanese Lorem Block', 'japanese-lorem-block'),
	description: _n('Japanese lorem text placeholder', 'japanese-lorem-block'),
	category: 'common',
	icon: (
		<svg
			xmlns="http://www.w3.org/2000/svg"
			fill="none"
			viewBox="0 0 24 24"
			stroke="currentColor"
		>
			<path
				stroke-linecap="round"
				stroke-linejoin="round"
				stroke-width="2"
				d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"
			/>
		</svg>
	),
	keywords: [
		_n('Placeholder', 'japanese-lorem-block'),
		_n('Japanese', 'japanese-lorem-block'),
		_n('Dummy Text', 'japanese-lorem-block'),
	],
	attributes: {
		content: {
			type: 'string',
			source: 'html',
			selector: 'p',
			default: defaultBlurb,
		},
	},

	edit: ({ className, attributes, setAttributes }) => {
		const { content } = attributes;
		const onChangeContent = (content) => {
			setAttributes({ content });
		};
		return (
			<RichText
				tagName="p"
				className={className}
				formattingControls={['bold']}
				onChange={onChangeContent}
				value={content}
			/>
		);
	},

	save({ attributes }) {
		return <RichText.Content tagName="p" value={attributes.content} />;
	},
});
