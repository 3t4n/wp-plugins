import * as types from '../types/user.types';

export const updateUserIsAuthenticated = (authenticated) => ({
	type: types.UPDATE_USER_IS_AUTHENTICATED,
	payload: authenticated,
});

export const updateUserData = (data) => ({
	type: types.UPDATE_USER_DATA,
	payload: data,
});

export const getCreditCards = (cards) => ({
	type: types.GET_CREDIT_CARDS,
	payload: cards,
});

export const updateCreditCards = (cards) => ({
	type: types.UPDATE_CREDIT_CARDS,
	payload: cards,
});

export const newPaymentMethod = (card) => ({
	type: types.ADD_CREDIT_CARD,
	payload: card,
});

export const updatePaymentMethod = (card) => ({
	type: types.UPDATE_PAYMENT_METHOD,
	payload: card,
});

export const removePaymentMethod = (cards) => ({
	type: types.REMOVE_CREDIT_CARD,
	payload: cards,
});

export const resetUser = () => ({
	type: types.RESTART_USER_STATE,
  });
