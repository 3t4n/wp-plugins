import React, { useState } from 'react';
import { useDispatch, useSelector } from 'react-redux';

// Actions
import { changeCreditCardStatus } from '../../actions/subscription.actions'

// Main Component
export default function SubscriptionToggleButton() {
	// redux Hooks
	const dispatch = useDispatch();
	const {global, subscription} = useSelector(state => ({
		global: state.global,
		subscription: state.subscription,
	}));

	// Component States
	const [buttonText, setButtonText] = useState(dydo_texts.screens.payment.add_a_payment_method);

	const handleToggle = (e) => {
		e.preventDefault();

		if (subscription.creditCardStatus === 'SAVED') {
			setButtonText(dydo_texts.screens.payment.select_previous_payment_method);
			dispatch(changeCreditCardStatus('NEW'));
		}

		if (subscription.creditCardStatus === 'NEW') {
			setButtonText(dydo_texts.screens.payment.add_a_payment_method);
			dispatch(changeCreditCardStatus('SAVED'));
		}
	};

	
	return (
		<button
			type="button"
			className="dydo_paymentmethods__toggle"
			disabled={global.loader}
			onClick={handleToggle}
		>
			{buttonText}
		</button>
	);
}
