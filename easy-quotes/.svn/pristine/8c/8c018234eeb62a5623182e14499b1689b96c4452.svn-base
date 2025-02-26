const { __, getLocaleData } = wp.i18n;
import { Stars } from './stars';

class Rating extends React.Component {
	render() {
		let lang = getLocaleData()[ '' ].lang;
		if ( typeof lang === undefined ) {
			lang = 'en';
		}

		let stars;
		if ( this.props.showStars ) {
			stars = <Stars value={ this.props.value } />;
		}
		let rating;
		if ( this.props.showRating ) {
			rating = (
				<span>
					{ new Intl.NumberFormat( lang ).format( this.props.value ) }{ ' ' }
					{ __( 'out of 5', 'easy-quotes' ) }
				</span>
			);
		}

		if ( stars || rating ) {
			let starsrating;
			if ( this.props.className )
				starsrating = (
					<div className={ this.props.className }>
						{ stars }
						{ rating }
					</div>
				);
			else
				starsrating = (
					<div>
						{ stars }
						{ rating }
					</div>
				);

			return starsrating;
		}

		return null;
	}
}

export { Rating };
