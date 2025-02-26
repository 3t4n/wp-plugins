class Citation extends React.Component {
	render() {
		const author = this.props.author;
		const date = this.props.date;
		const className = this.props.className;

		if ( ! ( author + date ) ) {
			return null;
		}

		let citation = '';
		if ( ! author ) citation = date;
		else if ( ! date ) citation = author;
		else citation = author + ' - ' + date;

		let citation_react;
		if ( className )
			citation_react = <div className={ className }>{ citation }</div>;
		else citation_react = <div>{ citation }</div>;

		return citation_react;
	}
}

export { Citation };
