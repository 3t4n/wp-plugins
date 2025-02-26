import React, {  } from "react";
import { useDispatch, useSelector } from "react-redux";
// Components
import MainButton from "../components/Buttons/MainButton";
import { Content } from "../components/Styles";
import {
  changeStatusLoader,
  changeError,
  changeAction,
} from "../actions/global.actions";
import PaymentMethods from "../components/PaymentMethods/PaymentMethods";
import { handleChangeSubscriptionPaymentMethod } from "../components/Payment/handlers";
import LoadingSpinner from '../components/LoadingSpinner/LoadingSpinner';


export default function ScreenEditPaymentMethodSubscription() {
  const dispatch = useDispatch();
  const { global, subscription } = useSelector((state) => ({
    global: state.global,
    subscription: state.subscription,
  }));

  const handleSubmit = async (e) => {
    const paymentMethodId = subscription.paymentMethodId;
    if (paymentMethodId != "" && paymentMethodId != undefined) {
      try {
        e.preventDefault();
        dispatch(changeStatusLoader(true));
        const res = await handleChangeSubscriptionPaymentMethod({
          subscriptionId: global.selectedSubscription.id,
          paymentMethodId: subscription.paymentMethodId,
        });
        if (res.success) {
          dispatch(changeAction("SUBSCRIPTION_UPDATED"));
        } else {
          dispatch(changeError(res.data));
        }
      } catch (e) {
        dispatch(changeError(e.message));
      }
      dispatch(changeStatusLoader(false));
      return;
    }
    dispatch(changeError("You must select a payment method. "));
  };

  return (
    <>
      {global.loader ? (<LoadingSpinner />) : ''}
      <Content>
        Select a payment method for this subscription
        <PaymentMethods />
      </Content>
      <MainButton title="Save change" onClick={handleSubmit} />
    </>
  );
}
