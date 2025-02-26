class Title extends React.Component {
	render() {
		if ( ! this.props.name ) return null;

		const Tag = this.props.tag;

		let title;
		if ( this.props.className )
			title = (
				<Tag className={ this.props.className }>
					{ this.props.name }
				</Tag>
			);
		else title = <Tag>{ this.props.name }</Tag>;

		return <>{ title }</>;
	}
}

export { Title };
