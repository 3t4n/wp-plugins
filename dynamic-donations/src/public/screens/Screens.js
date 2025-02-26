import React from "react";
import { useSelector } from "react-redux";

// Screens
import ScreenDonation from "./ScreenDonation";
import ScreenPayment from "./ScreenPayment";
import ScreenThanks from "./ScreenThanks";
import ScreenAuth from "./ScreenAuth";
import ScreenUpdateSubscriptionDate from "./ScreenUpdateSubscriptionDate";
import ScreenUpdateSubscriptionAmount from "./ScreenUpdateSubscriptionAmount";
import ScreenCancelSubscription from "./ScreenCancelSubscription";
import ScreenSubscriptionUpdated from "./ScreenSubscriptionUpdated";
import ScreenAddPaymentMethod from "./ScreenAddPaymentMethod";
import ScreenRemovePaymentMethod from "./ScreenRemovePaymentMethod";
import ScreenPaymentMethodUpdated from "./ScreenPaymentMethodUpdated";
import ScreenUpdatePaymentMethodSubscription from "./ScreenUpdatePaymentMethodSubscription";
import ScreenManagePaymentMethod from "./ScreenManagePaymentMethod";

// Main Component
export default function Screens() {
  const { global } = useSelector((state) => ({
    global: state.global,
  }));

  switch (global.action) {
    case "DONATION_SETUP":
      return <ScreenDonation />;
    case "AUTH":
      return <ScreenAuth />;
    case "PAYMENT":
      return <ScreenPayment />;
    case "THANKS":
      return <ScreenThanks />;
    case "UPDATE_SUBSCRIPTION_DATE":
      return <ScreenUpdateSubscriptionDate />;
    case "UPDATE_SUBSCRIPTION_AMOUNT":
      return <ScreenUpdateSubscriptionAmount />;
    case "UPDATE_PAYMENT_METHOD_SUBSCRIPTION":
      return <ScreenUpdatePaymentMethodSubscription />;
    case "PAYMENT_METHOD_UPDATED":
      return <ScreenPaymentMethodUpdated />;
    case "CANCEL_SUBSCRIPTION":
      return <ScreenCancelSubscription />;
    case "SUBSCRIPTION_UPDATED":
      return <ScreenSubscriptionUpdated />;
    case "ADD_PAYMENT_METHOD":
      return <ScreenAddPaymentMethod />;
    case "REMOVE_PAYMENT_METHOD":
      return <ScreenRemovePaymentMethod />;
    case "MANAGE_PAYMENT_METHOD":
      return <ScreenManagePaymentMethod />;
    default:
      return null;
  }
}
