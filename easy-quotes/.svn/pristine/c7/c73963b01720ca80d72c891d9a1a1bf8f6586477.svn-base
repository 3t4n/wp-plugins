import { __ } from '@wordpress/i18n';
import {
	PanelBody,
	SelectControl,
	BaseControl,
	ComboboxControl,
	RangeControl,
	RadioControl,
	ToggleControl,
	__experimentalText as Text,
	__experimentalSpacer as Spacer
} from '@wordpress/components';

const randomMode = { value: -1, label: __('Mode: Random', 'easy-quotes') };
const dailyMode = { value: -2, label: __('Mode: Daily', 'easy-quotes') };
const titleSuggestionsModes = [ randomMode, dailyMode ];

export class InspectorQuote extends React.Component {

	componentDidMount() {
		const { specificQuote } = this.props.attributes;

		if (specificQuote.value == -1) {
			this.props.setAttributes({ titleSuggestions: [randomMode] });
			this.props.setAttributes({ specificQuote: randomMode });
		}
		else if (specificQuote.value == -2) {
			this.props.setAttributes({ titleSuggestions: [dailyMode] });
			this.props.setAttributes({ specificQuote: dailyMode });
		}
		else 
			this.props.setAttributes({ titleSuggestions: [specificQuote] });
		
		this.fetchQuoteCategories();
	}

	/**
	 * Helper function to fetch Quote Categories
	 */
	fetchQuoteCategories() {
		wp.apiFetch( {
			url: '/wp-json/layart/v1/categories',
		} ).then( ( categories ) => {
			this.props.setAttributes( { categories } );
		} );
	}

	/**
	 * Helper function to fetch Title Suggestions
	 * @param {string} title A search string like "famo"
	 * @param {number} category category_id (-1 is any category)
	 * @param {number} perPage how many sugestions
	 */
	fetchTitleSuggestions( title, category, perPage ) {
		wp.apiFetch( {
			url:
				'/wp-json/layart/v1/titles?title=' +
				title +
				'&cat=' +
				category +
				'&per_page=' +
				perPage,
		}).then((titleSuggestions) => {
			titleSuggestions = titleSuggestionsModes.concat(titleSuggestions);
			this.props.setAttributes( { titleSuggestions } );
		} );
	}

	render() {
		const {
			selectedCategory,
			categories,
			titleSuggestions,
			specificQuote,
			viewMode,
			listViewQuotesAmount,
			rotationSpeed,
			isAvoidCache,
			isRandomViewingOrder
		} = this.props.attributes;
		
		const { setAttributes } = this.props;

		if (!categories) return null;
		
		const onChangeCategory = ( category ) => {
			setAttributes( { selectedCategory: category } );
			setAttributes( { isFetchQuotes: true } );
			setAttributes( { specificQuote: randomMode } );
			setAttributes( { titleSuggestions: [ randomMode ] } );
		};

		const onChangeViewMode = ( viewMode ) => {
			setAttributes( { viewMode } );
			setAttributes( { isFetchQuotes: true } );
		};

		const onChangeListViewQuotesAmount = ( listViewQuotesAmount ) => {
			setAttributes( { listViewQuotesAmount } );
			setAttributes( { isFetchQuotes: true } );
		};

		const onFilterValueChangeSpecificQuote = ( title ) => {
			this.fetchTitleSuggestions( title, selectedCategory, 8 );
		};

		const onChangeSpecificQuote = ( value ) => {
			// if Reset was pressed
			if ( value === null ) {
				setAttributes( { specificQuote: randomMode } );
				setAttributes( { titleSuggestions: [ randomMode ] } );
			} else {
				const result = titleSuggestions.find(
					( quote ) => quote.value === value
				);
				const id = result.value;
				setAttributes( { specificQuote: result } );
				setAttributes( { titleSuggestions: [ result ] } );
				setAttributes( { isFetchQuotes: true } );
			}
		};

		let visibleComponent;
		switch ( viewMode ) {
			case 'single':
				visibleComponent = (
					<>
						<BaseControl
							className="la-component-margin-top"
							help={__('Type to search for a Quote.', 'easy-quotes')}
							__nextHasNoMarginBottom
						>
							<ComboboxControl
								label={ __( 'Specific Quote', 'easy-quotes' ) }
								options={ titleSuggestions }
								onFilterValueChange={
									onFilterValueChangeSpecificQuote
								}
								value={ specificQuote.value }
								onChange={onChangeSpecificQuote}
								__nextHasNoMarginBottom
							/>
						</BaseControl>
						{(specificQuote === dailyMode || specificQuote === randomMode) ?
							<ToggleControl
								label={__('Avoid caching', 'easy-quotes')}
								help={(isAvoidCache) ? __('experimental', 'easy-quotes') : __('Caching Plugins prevent dynamic content from being updated. Try this option if you\'re having problems with "random" or "daily" quotes. Don\'t cache the REST API!', 'easy-quotes' )}
								checked={isAvoidCache}
								onChange={() => { setAttributes({ isAvoidCache: !isAvoidCache }) }}
								__nextHasNoMarginBottom
							/> : '' }
					</>
				);
				break;
			case 'list':
				visibleComponent = (
					<>
						<Spacer marginTop={5}>
							<RangeControl
								label={ __( 'Number of Quotes', 'easy-quotes' ) }
								value={ listViewQuotesAmount }
								min={ 0 }
								max={ 99 }
								step={ 1 }
								showTooltip={ false }
								onChange={onChangeListViewQuotesAmount}
								__nextHasNoMarginBottom
							/>
							<Text color={"#757575"} >
								{ __('0 = Show all Quotes', 'easy-quotes') }
							</Text>
						</Spacer>
					</>
				);
				break;
			case 'rotation':
				visibleComponent = (
					<>
						<Spacer marginTop={5}>
							<RangeControl
								label={ __( 'Rotation speed (sec)', 'easy-quotes' ) }
								value={ rotationSpeed }
								min={ 1 }
								max={ 20 }
								step={ 0.5 }
								showTooltip={ false }
								onChange={(rotationSpeed) => setAttributes({ rotationSpeed })}
								__nextHasNoMarginBottom
							/>
							<ToggleControl
								label={__('Random Viewing Order', 'easy-quotes')}
								checked={isRandomViewingOrder}
								onChange={() => { setAttributes({ isRandomViewingOrder: !isRandomViewingOrder }) }}
								__nextHasNoMarginBottom
							/>	
						</Spacer>
					</>
				);
				break;
		}

		return (
			<PanelBody
				title={ __( 'Quote', 'easy-quotes' ) }
				initialOpen={ false }
			>
				<SelectControl
					label={ __( 'Categories', 'easy-quotes' ) }
					value={ selectedCategory }
					options={ categories }
					onChange={onChangeCategory}
					__nextHasNoMarginBottom
				/>
				<RadioControl
					label={ __( 'View mode', 'easy-quotes' ) }
					selected={ viewMode }
					options={ [
						{
							label: __( 'Single', 'easy-quotes' ),
							value: 'single',
						},
						{
							label: __('List', 'easy-quotes'),
							value: 'list'
						},
						{
							label: __( 'Rotation', 'easy-quotes' ),
							value: 'rotation',
						}
					] }
					onChange={onChangeViewMode}
					__nextHasNoMarginBottom
				/>
				{ visibleComponent }
			</PanelBody>
		);
	}
}
