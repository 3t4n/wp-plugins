const initialState = {
	creditCardStatus: 'SAVED',
	paymentMethodId: '',
};

function subscriptionReducer(state = initialState, action) {
	switch (action.type) {
		case 'CHANGE_CREDIT_CARD_STATUS':
			return {
				...state,
				creditCardStatus: action.payload,
			}
		case 'CHANGE_PAYMENT_METHOD_ID':
			return {
				...state,
				paymentMethodId: action.payload,
			}
		case 'RESTART_SUBSCRIPTION_STATE':
			return {
				...initialState
		}
		default:
			return state
	}
}

export default subscriptionReducer;