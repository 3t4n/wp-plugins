class QuoteContent extends React.Component {
	render() {
		var quote;

		const styles = {
			lineHeight: this.props.lineHeight + 'em',
			fontSize: this.props.fontSize + 'em',
		};

		if ( this.props.className )
			quote = (
				<div
					style={ styles }
					className={ this.props.className }
					dangerouslySetInnerHTML={ { __html: this.props.content } }
				></div>
			);
		else
			quote = (
				<div
					style={ styles }
					dangerouslySetInnerHTML={ { __html: this.props.content } }
				></div>
			);
		return quote;
	}
}
export { QuoteContent };
