class Stars extends React.Component {
	getStar( index, value ) {
		return (
			<use
				href="#star"
				class="star"
				x={ index * 100 }
				fill={ this.getFillColor( index, value ) }
			/>
		);
	}

	getFillColor( index, value ) {
		const fraction = (value * 10) % 10;

		if ( index < Math.floor( value ) ) return 'rgb(229,187,79)';
		if ( index == Math.floor( value ) && fraction > 0 )
			return 'url(#partialFill-' + fraction + ')';
		if ( index >= value ) return 'rgb(255,255,255)';
	}

	render() {
		const stars = [];
		for ( let index = 0; index < 5; index++ ) {
			stars.push( this.getStar( index, this.props.value ) );
		}
		return (
			<svg class="la-rating-stars" viewBox="0 0 500 100">
				{ stars }
				Sorry, your browser does not support inline SVG.
			</svg>
		);
	}
}

export { Stars };
