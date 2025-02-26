import { Title } from './title';
import { Rating } from './rating';
import { QuoteContent } from './quotecontent';
import { Citation } from './citation';

export class Quote extends React.Component {
	componentDidMount() {}

	render() {
		const {
			isCustomTitle,
			customTitle,
			headerTag,
			isShowStars,
			isShowRating,
			classNameTitle,
			classNameRating,
			classNameQuote,
			classNameCitation,
			fontFamily,
			fontSize,
			lineHeight,
			viewMode,
		} = this.props.attributes;

		const { quote, visibleId, index } = this.props;
		if ( ! quote ) return null;

		const title = isCustomTitle ? customTitle : quote.title;
		const classNamesQuote = (
			classNameQuote +
			' ' +
			fontFamily.family_slug +
			'-' +
			fontFamily.variant.id
		).trim();

		let quoteRender = [];
		if ( ! ( viewMode === 'rotation' && isCustomTitle ) ) {
			quoteRender.push(
				<Title
					name={ title }
					tag={ headerTag }
					className={ classNameTitle }
				/>
			);
		}
		quoteRender.push(
			<Rating
				value={ quote.rating }
				showStars={ isShowStars }
				showRating={ isShowRating }
				className={ classNameRating }
			/>
		);
		quoteRender.push(
			<QuoteContent
				content={ quote.content }
				className={ classNamesQuote }
				fontSize={ fontSize }
				lineHeight={ lineHeight }
			/>
		);
		quoteRender.push(
			<Citation
				author={ quote.author }
				date={ quote.date }
				className={ classNameCitation }
			/>
		);

		if ( viewMode === 'rotation' ) {
			if ( visibleId === index ) {
				quoteRender = [
					<div className="easy-quotes-quote la-show">
						{ quoteRender }
					</div>,
				];
			} else {
				quoteRender = [
					<div className="easy-quotes-quote la-hide">
						{ quoteRender }
					</div>,
				];
			}
		} else {
			quoteRender = [
				<div className="easy-quotes-quote">{ quoteRender }</div>,
			];
		}

		return <>{ quoteRender }</>;
	}
}
