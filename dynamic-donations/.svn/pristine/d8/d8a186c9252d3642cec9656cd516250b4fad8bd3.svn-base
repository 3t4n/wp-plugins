import React, { useEffect, useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import Cookies from "universal-cookie";
import { WP } from "../../api";

// Stripe
import { CardElement, useElements, useStripe } from "@stripe/react-stripe-js";

// Components
import PaymentMethods from "../PaymentMethods/PaymentMethods";
import MainButton from "../Buttons/MainButton";
import BackButton from "../Buttons/BackButton";
import SubscriptionToggleButton from "../Buttons/SubscriptionToggleButton";
import PaymentResume from "./PaymentResume";
import { Content } from "../Styles";

// Actions
import {
  changeAction,
  changeError,
  changeStatusLoader,
} from "../../actions/global.actions";

// Handlers
import {
  handleRecurringPaymentBySavedPaymentMethod,
  handleOnetimePaymentBySavedPaymentMethod,
  handleRecurringPaymentByNewPaymentMethod,
  handleOnetimePaymentByNewPaymentMethod,
} from "./handlers";

const initBeforeUnLoad = (showExitPrompt) => {
  window.onbeforeunload = (event) => {
    // Show prompt based on state
    if (showExitPrompt) {
      const e = event || window.event;
      e.preventDefault();
      if (e) {
        e.returnValue = "After paying, reloading or closing before the donation process has finished can cause unexpected behaviours.";
      }
      return "After paying, reloading or closing before the donation process has finished can cause unexpected behaviours.";
    }
  };
};

export default function PaymentCheckout() {
  // Stripe Hooks
  const stripe = useStripe();
  const elements = useElements();

  // redux Hooks
  const dispatch = useDispatch();
  const { global, user, donate, subscription } = useSelector((state) => ({
    global: state.global,
    user: state.user,
    donate: state.donate,
    subscription: state.subscription,
  }));
  const [showExitPrompt, setShowExitPrompt] = useState(true);
  window.onload = function () {
    initBeforeUnLoad(showExitPrompt);
  };

  // Pay by saved payment method
  const payBySavedPaymentMethod = async () => {
    if (donate.type === "recurring") {
      try {
        const params = {
          paymentMethodId: subscription.paymentMethodId,
          subscriptionData: {
            amount: donate.amount,
            period: { ...donate.recurringOptions },
            currency: donate.currency,
          },
        };
        const res = await handleRecurringPaymentBySavedPaymentMethod(params);
        if (res.success) {
          dispatch(changeAction("THANKS"));
        } else {
          dispatch(changeError(res.data));
        }
      } catch (e) {
        dispatch(changeError(e.message));
      }
    } else if (donate.type === "onetime") {
      try {
        const params = {
          paymentMethodId: subscription.paymentMethodId,
          amount: donate.amount,
          currency: donate.currency,
        };

        const res = await handleOnetimePaymentBySavedPaymentMethod(params);
        if (res.success) {
          dispatch(changeAction("THANKS"));
        } else {
          dispatch(changeError(res.data));
        }
      } catch (e) {
        dispatch(changeError(e.message));
      }
    } else {
      dispatch(changeError("Error"));
    }
  };

  // Pay by new payment method
  const payByNewPaymentMethod = async () => {
    const subscriptionData = {
      amount: donate.amount,
      period: { ...donate.recurringOptions },
      currency: donate.currency,
    };
    const params = {
      stripe: stripe,
      stripe_data: {
        payment_method: {
          card: elements.getElement(CardElement),
          billing_details: {
            name: `${user.data.first_name} ${user.data.last_name}`,
            email: user.data.email,
          },
        },
      },
    };

    if (donate.type === "recurring") {
      try {
        params.type = "setup";
        params.subscriptionData = subscriptionData;

        await handleRecurringPaymentByNewPaymentMethod(params);
        dispatch(changeAction("THANKS"));
      } catch (e) {
        dispatch(changeError(e.message));
      }
    } else if (donate.type === "onetime") {
      try {
        params.type = "payment";
        params.paymentMethodId = subscription.paymentMethodId;
        params.amount = donate.amount;
        params.currency = donate.currency;

        await handleOnetimePaymentByNewPaymentMethod(params);
        dispatch(changeAction("THANKS"));
      } catch (e) {
        dispatch(changeError(e.message));
      }
    } else {
      dispatch(changeError("Error"));
    }
  };

  /*  const addDonationToWooCart = async () => {
    const res = await WP.request.hook('wc_add_donation', {
      amount: donate.amount,
      pid: global.settings.product_id
    });

    if (res.success) {
      const cookies = new Cookies();
      cookies.set('dydo_donation_amount', donate.amount, {path: '/'});
      location.href = res.data.url_woo_cart;
    }
  }*/

  // Sumbit
  const handleSubmit = async (e) => {
    e.preventDefault();
    setShowExitPrompt(true);
    dispatch(changeStatusLoader(true));
    switch (subscription.creditCardStatus) {
      case "SAVED":
        await payBySavedPaymentMethod();
        break;
      case "NEW":
        await payByNewPaymentMethod();
        break;
      default:
        dispatch(changeError("Invalid Option"));
        break;
    }
    setShowExitPrompt(false);
    dispatch(changeStatusLoader(false));
  };

  // useEffect(() => {
  //   if (global.settings.payment_gateway === 'woocommerce') {
  //     dispatch(changeStatusLoader(false));
  //   }
  // }, []);

  useEffect(() => {
    initBeforeUnLoad(showExitPrompt);
  }, [showExitPrompt]);

  return (
    <form onSubmit={handleSubmit}>
      <Content>
        <BackButton
          action="DONATION_SETUP"
          actionButtonText={dydo_texts.screens.donate.make_a_recurring_donation}
        />
        <PaymentResume />
        {global.settings.payment_gateway === "stripe" ? (
          <>
            {subscription.creditCardStatus === "SAVED" && <PaymentMethods />}
            {subscription.creditCardStatus === "NEW" && (
              <div style={{ margin: "30px 0" }}>
                <div className="dydo_col-xs-12 dydo_col-sm-12">
                  <p className="dydo_donation-type__placeholder">
                    Please add your credit or debit card information
                  </p>
                </div>
                <CardElement />
              </div>
            )}
            <div className="dydo_col-xs-12 dydo_end-xs">
              <SubscriptionToggleButton />
            </div>
          </>
        ) : null}
      </Content>
      <MainButton
        title={
          donate.type === "recurring"
            ? dydo_texts.screens.payment.subscribe
            : dydo_texts.screens.payment.pay
        }
      />
    </form>
  );
}
