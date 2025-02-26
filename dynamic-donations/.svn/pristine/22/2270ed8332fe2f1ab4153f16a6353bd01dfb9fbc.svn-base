import React from "react";

// Stripe
import { Elements } from "@stripe/react-stripe-js";
import { loadStripe } from "@stripe/stripe-js";
const stripePromise =  loadStripe(dydo_wp_public.plugin.stripe.pk);

export default function StripeElementsWrapper({ children }) {
  return <Elements stripe={stripePromise}>{children} </Elements>;
}
