import * as types from '../types/subscription.types';

export const changeCreditCardStatus = (status) => ({
	type: types.CHANGE_CREDIT_CARD_STATUS,
	payload: status,
});

export const changePaymentMethodId = (id) => ({
	type: types.CHANGE_PAYMENT_METHOD_ID,
	payload: id,
});

export const resetSubscription = () => ({
	type: types.RESTART_SUBSCRIPTION_STATE,
  });