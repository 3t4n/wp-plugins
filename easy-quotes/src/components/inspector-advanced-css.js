const { __ } = wp.i18n;
const { InspectorAdvancedControls } = wp.blockEditor;
const { BaseControl } = wp.components;

import { __experimentalInputControl as InputControl } from '@wordpress/components';

import { sanitizeHtmlClasses } from './helper';

export class InspectorAdvancedCSS extends React.Component {
	componentDidMount() {}

	render() {
		const {
			classNameTitle,
			classNameRating,
			classNameQuote,
			classNameCitation,
		} = this.props.attributes;

		const { setAttributes } = this.props;

		return (
			<InspectorAdvancedControls>
				<BaseControl
					help={__('Separate multiple classes with spaces.', 'easy-quotes')}
					__nextHasNoMarginBottom
				>
					<InputControl
						label={ __( 'Title CSS class(es)', 'easy-quotes' ) }
						onChange={ ( classNameTitle ) =>
							setAttributes( {
								classNameTitle:
									sanitizeHtmlClasses( classNameTitle ),
							} )
						}
						placeholder={ 'widget-title' }
						value={ classNameTitle }
					></InputControl>
				</BaseControl>

				<BaseControl
					help={__('Separate multiple classes with spaces.', 'easy-quotes')}
					__nextHasNoMarginBottom
				>
					<InputControl
						label={ __( 'Rating CSS class(es)', 'easy-quotes' ) }
						onChange={ ( classNameRating ) =>
							setAttributes( {
								classNameRating:
									sanitizeHtmlClasses( classNameRating ),
							} )
						}
						placeholder={ 'la-rating' }
						value={ classNameRating }
					></InputControl>
				</BaseControl>

				<BaseControl
					className="la-component-margin-top"
					help={__('Separate multiple classes with spaces.', 'easy-quotes')}
					__nextHasNoMarginBottom
				>
					<InputControl
						label={ __( 'Quote CSS class(es)', 'easy-quotes' ) }
						onChange={ ( classNameQuote ) =>
							setAttributes( {
								classNameQuote:
									sanitizeHtmlClasses( classNameQuote ),
							} )
						}
						placeholder={ 'la-quote' }
						value={ classNameQuote }
					></InputControl>
				</BaseControl>

				<BaseControl
					help={__('Separate multiple classes with spaces.', 'easy-quotes')}
					__nextHasNoMarginBottom
				>
					<InputControl
						label={ __( 'Citation CSS class(es)', 'easy-quotes' ) }
						onChange={ ( classNameCitation ) =>
							setAttributes( {
								classNameCitation:
									sanitizeHtmlClasses( classNameCitation ),
							} )
						}
						placeholder={ 'la-citation' }
						value={ classNameCitation }
					></InputControl>
				</BaseControl>
			</InspectorAdvancedControls>
		);
	}
}
