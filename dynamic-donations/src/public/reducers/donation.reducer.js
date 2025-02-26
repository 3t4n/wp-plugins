const initialState = {
	type: '',
	amount: 0,
	amountOption: '',
	recurringOptions: {
		mode: 'month',
		interval: 'month',
		intervalCount: 2,
		startDate:'now',
		timezone: Intl.DateTimeFormat().resolvedOptions().timeZone
	},
	currency: '',
	symbol: '$',
};

function donateReducer(state = initialState, action) {
	switch (action.type) {
		case 'CHANGE_DONATION_TYPE':
			return {
				...state,
				type: action.payload,
			}
		case 'CHANGE_DONATION_AMOUNT':
			return {
				...state,
				amount: action.payload,
			}
		case 'CHANGE_DONATION_AMOUNT_OPTION':
			return {
				...state,
				amountOption: action.payload,
			}
		case 'CHANGE_RECURRING_DONATION_OPTIONS':
			return {
				...state,
				recurringOptions: action.payload,
			}
		case 'CHANGE_DONATION_CURRENCY':
			return {
				...state,
				currency: action.payload,
			}
		case 'CHANGE_SYMBOL_CURRENCY':
			return {
				...state,
				symbol: action.payload,
			}
		case 'RESTART_DONATE_STATE':
			return {
				...initialState
		}
		default:
			return state
	}
}

export default donateReducer;