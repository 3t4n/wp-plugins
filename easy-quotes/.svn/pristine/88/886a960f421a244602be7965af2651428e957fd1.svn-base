import { __ } from '@wordpress/i18n';
import { PanelBody, ToggleControl } from '@wordpress/components';

export class InspectorRating extends React.Component {
	componentDidMount() {
		//this.fetchQuoteCategories();
	}

	render() {
		const { isShowStars, isShowRating } = this.props.attributes;

		const { setAttributes } = this.props;

		return (
			<PanelBody
				title={ __( 'Rating', 'easy-quotes' ) }
				initialOpen={ false }
			>
				<ToggleControl
					label={ __( 'Show Stars', 'easy-quotes' ) }
					checked={ isShowStars }
					onChange={ ( isShowStars ) =>
						setAttributes( { isShowStars } )
					}
					__nextHasNoMarginBottom
				></ToggleControl>
				<ToggleControl
					label={ __( 'Show Rating', 'easy-quotes' ) }
					checked={ isShowRating }
					onChange={ ( isShowRating ) =>
						setAttributes( { isShowRating } )
					}
					__nextHasNoMarginBottom
				></ToggleControl>
			</PanelBody>
		);
	}
}
