import React from 'react';

// Stripe
import { Elements } from '@stripe/react-stripe-js';
import { loadStripe } from '@stripe/stripe-js';

// Components
import PaymentCheckout from './PaymentCheckout';

const stripePromise = loadStripe(dydo_wp_public.plugin.stripe.pk);
// Main Component
export default function Payment() {
	return (
		<Elements stripe={stripePromise}>
			<PaymentCheckout />
		</Elements>
	);
}
