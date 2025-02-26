import { Quote } from './quote';
import { Title } from './title';
import { createStyleForFont } from './helper';
import { useEffect } from 'react';

export class Quotes extends React.Component {
	constructor( props ) {
		super( props );
		this.timer = null;
		this.rotationRef = React.createRef();
		this.state = { visibleId: -1, bag: [] };
	}

	componentDidMount() {
		const {
			fontFamily,
			specificQuote,
			selectedCategory,
			viewMode,
			listViewQuotesAmount,
		} = this.props.attributes;

		this.fetchQuotes(
			specificQuote.value,
			selectedCategory,
			viewMode,
			listViewQuotesAmount
		);
		createStyleForFont( this.props.clientId, fontFamily );
		this.props.setAttributes( { isFetchQuotes: false } );
		if (viewMode === 'rotation') this.rotate();
	}

	componentDidUpdate( prevProps, prevState, snapshot ) {
		let update = false;
		
		if ( prevProps.attributes.quotes !== this.props.attributes.quotes ) {
			update = true;
		}
		if (
			prevProps.attributes.rotationSpeed !==
			this.props.attributes.rotationSpeed
		) {
			update = true;
		}
		if (prevProps.attributes.isRandomViewingOrder !== this.props.attributes.isRandomViewingOrder) {
			update = true;
		}
			
		if (update) {
			this.rotate();
		}
	}

	componentWillUnmount() {
		if ( this.timer ) {
			clearInterval( this.timer );
		}
	}

	rotate = () => {
		const { viewMode, quotes } = this.props.attributes;

		if (quotes === undefined)
			return;

		if ( this.timer !== null ) {
			clearInterval(this.timer);
			this.createBag(quotes.length);
			this.timer = null;
		}
	
		if ( viewMode === 'rotation' ) {
			const element = this.rotationRef.current;
			const rotationSpeed = element.dataset.rotationSpeed;
			this.timer = setInterval(
				() => { this.getNext(quotes.length); },
				rotationSpeed * 1000
			);
		}
	};

	getNext = (count) => {
		const { viewMode, isRandomViewingOrder } = this.props.attributes;

		if (this.state.bag === undefined || this.state.bag.length === 0)
			this.createBag(count);

		let index = 0;
		let nextQuoteId = 0;

		if (viewMode === 'rotation' && isRandomViewingOrder) {
			index = Math.floor(Math.random() * this.state.bag.length);
			if (this.state.bag[index] === this.state.visibleId) {
				index = (index + 1) % this.state.bag.length;
			}
		}
		nextQuoteId = this.state.bag[index];

		this.state.bag.splice(index, 1);
		this.setState({ visibleId: nextQuoteId });
	};

	createBag = (count) => {
		this.state.bag = [];
		for (let index = 0; index < count; index++) {
			this.state.bag.push(index);
		}
	};

	/**
	 * Helper function to fetch Quotes
	 * @param {*} id 						-1 returns a random quote - -2 returns a daily quote | post_id
	 * @param {*} category 					-1 from random category | category_id
	 * @param {*} viewMode 					"single, list or rotation"
	 * @param {*} listViewQuotesAmount		0 returns all | 1-99 amount
	 */
	fetchQuotes( id, category, viewMode, listViewQuotesAmount ) {
		wp.apiFetch( {
			url:
				'/wp-json/layart/v1/quotes?id=' +
				id +
				'&cat=' +
				category +
				'&mode=' +
				viewMode +
				'&amount=' +
				listViewQuotesAmount,
		}).then((quotes) => {
			this.props.setAttributes({ quotes });
			if (viewMode === 'rotation')
				this.getNext(quotes.length);
			else {
				this.setState({ visibleId: 0 });
			}
		} );
	}

	render() {
		const {
			quotes,
			isFetchQuotes,
			specificQuote,
			selectedCategory,
			rotationSpeed,
			isCustomTitle,
			customTitle,
			headerTag,
			classNameTitle,
			viewMode,
			listViewQuotesAmount,
		} = this.props.attributes;

		if ( ! quotes && viewMode === 'rotation' )
			return (
				<div
					className="easy-quotes-rotation"
					data-rotation-speed={ rotationSpeed }
					ref={ this.rotationRef }
				></div>
			);

		if ( ! quotes ) return null;

		if ( isFetchQuotes ) {
			this.fetchQuotes(
				specificQuote.value,
				selectedCategory,
				viewMode,
				listViewQuotesAmount
			);
			this.props.setAttributes( { isFetchQuotes: false } );
		}

		let customTitleRender = null;
		if ( viewMode === 'rotation' && isCustomTitle ) {
			customTitleRender = (
				<Title
					name={ customTitle }
					tag={ headerTag }
					className={ classNameTitle }
				/>
			);
		}

		let quotesRender = [];
		let index = 0;

		for ( let quote of quotes ) {
			quotesRender.push(
				<Quote
					attributes={ this.props.attributes }
					setAttributes={ this.props.setAttributes }
					quote={ quote }
					visibleId={ this.state.visibleId }
					index={ index }
				/>
			);
			index++;
		}

		if ( viewMode === 'rotation' ) {
			quotesRender = [
				<div
					className="easy-quotes-rotation"
					data-rotation-speed={ rotationSpeed }
					ref={ this.rotationRef }
				>
					{ quotesRender }
				</div>,
			];
		}

		return (
			<>
				{ customTitleRender }
				{ quotesRender }
			</>
		);
	}
}
