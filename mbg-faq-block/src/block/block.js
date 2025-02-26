/**
 * BLOCK: mbg-faq-block
 */

//  Import CSS.
import './editor.scss';
import './style.scss';

const { registerBlockType } = window.wp.blocks;
const { RichText } = window.wp.blockEditor;
const { createElement } = window.wp.element;
const { __ } = window.wp.i18n;

/**
 * Register: aa Gutenberg Block.
 *
 * Registers a new block provided a unique name and an object defining its
 * behavior. Once registered, the block is made editor as an option to any
 * editor interface where blocks are implemented.
 *
 * @link https://wordpress.org/gutenberg/handbook/block-api/
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */
registerBlockType( 'mbg/mbg-faq-block', {
	// Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
	title: __( 'IMN FAQ Block' ), // Block title.
	icon: 'shield', // Block icon from Dashicons → https://developer.wordpress.org/resource/dashicons/.
	category: 'common', // Block category — Group blocks together based on common traits E.g. common, formatting, layout widgets, embed.
	keywords: [
		__( 'IMN' ),
		__( 'FAQ' ),
	],

	attributes: {
		question: {
			source: 'children',
			selector: '.mbg-faq-question',
			default: 'Q: '
		},
		answer: {
			source: 'children',
			selector: '.mbg-tab-content',
			default: 'A: '
		},
		qtag: {
    			type: 'string',
    			default: 'h3'
		}
	},

	edit: ( props ) => {
			const question = props.attributes.question;
			const answer = props.attributes.answer;
			const focus = props.focus;
			const qtag  = props.attributes.qtag;
			const isSelected = props.isSelected;

    			function setQTag( event ) {
		            const selected = event.target.querySelector( 'option:checked' );
        		    props.setAttributes( { qtag: selected.value } );
        		    event.preventDefault();
    			}

			function onChangeQuestion( newContent ) {
				props.setAttributes( { question: newContent } );
			}

			function onChangeAnswer( newContent ) {
				props.setAttributes( { answer: newContent } );
			}

			const editQuestion = createElement(
				RichText,
				{
					tagName: qtag,
					className: "mbg-faq-block-qedit",
					onChange: onChangeQuestion,
					value: question,
					focus: focus,
					onFocus: props.setFocus,
				}
			);
			const editAnswer = createElement(
				RichText,
				{
					tagName: 'p',
					onChange: onChangeAnswer,
					value: answer,
					focus: focus,
					onFocus: props.setFocus,
				}
			);

    			let selectTag = (
	                	<form onSubmit={ setQTag } className="mbg-faq-block-form">
        		    	    <select value={ qtag } onChange={ setQTag }>
                    			<option value="h2">H2</option>
	                    		<option value="h3">H3</option>
    		            		<option value="h4">H4</option>
            		    		<option value="h5">H5</option>
                    			<option value="h6">H6</option>
                		    </select>
            			</form>
				);
			
			if(!isSelected){
				selectTag = (<span className="mbg-faq-block-form"> </span>);
			}

			return createElement(
				'div', { key: 'mbg-faq-block-div', className: 'mbg-faq-block' },
				//React.createElement('input', { id: 'meow-faq-block', name: 'meow-faq-block', type: 'checkbox' }),
				selectTag,
				editQuestion,
				editAnswer
				
			);

	},

	save: ( props ) => {
			const question = props.attributes.question;
			const answer = props.attributes.answer;

			let container = (
				<div className='mbg-faq-block' itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
					<RichText.Content className='mbg-faq-question' tagName='label' value={question} itemprop="name" />
					<div className='mbg-tab-answer' itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
						<RichText.Content className='mbg-tab-content' tagName='div' value={answer} itemprop="text" />
					</div>
				</div>
			);
			return container;

	},
} );

