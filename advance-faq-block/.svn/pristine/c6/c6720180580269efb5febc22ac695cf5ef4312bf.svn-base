/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText } from '@wordpress/block-editor';
import { SelectControl, PanelBody} from '@wordpress/components';
/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './style.scss';
import './editor.scss';
/**
 * Internal dependencies
 */
import metadata from './block.json';

/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
registerBlockType( metadata.name, {
	/**
	 * @see ./edit.js
	 */

	attributes: {
		question: {
		  type: 'string',
		  default: '',
		},
		answer: {
		  type: 'string',
		  default: '',
		},
	  },


	edit: function(props) {
		const { attributes: { question, answer}, setAttributes } = props;
		return (
			<div { ...useBlockProps() } className='wtd-single-faq-wrap'>
				<div className='wtd-faq-title' >
					<div className='wtd-faq-icon'>
						<svg width="13" height="2" viewBox="0 0 13 2" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect x="0.666992" y="0.0478516" width="11.6667" height="1.90476" fill="#848383"/>
						</svg>
					</div>
					<RichText
						tagName="h5"
						placeholder="Write question here…"
						value={ question }
						onChange={ ( question ) => props.setAttributes( { question } ) }
					/>
				</div>
				<div className='wtd-faq-content'>
					<RichText
							tagName="p"
							placeholder="Write answer here…"
							value={ answer }
							onChange={ ( answer ) => props.setAttributes( { answer } ) }
						/>
				</div>
			</div>
		);
	},
	/**
	 * @see ./save.js
	 */
	save: function(props){
		const { attributes: { question, answer}, setAttributes } = props;

		return (
			<div { ...useBlockProps.save() } className='wtd-single-faq-wrap'>
				<div className='wtd-faq-title' >
					<div className='wtd-faq-icon'>
						<svg width="13" height="2" viewBox="0 0 13 2" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect x="0.666992" y="0.0478516" width="11.6667" height="1.90476" fill="#848383"/>
						</svg>
					</div>
					<RichText.Content tagName="h5" value={ question } />
				</div>
				<div className='wtd-faq-content'>
					<RichText.Content tagName="p" value={ answer } />
				</div>
			</div>
		);
	},
} );
