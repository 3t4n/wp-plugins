import React, { useEffect } from "react";
import { useDispatch, useSelector } from "react-redux";
import {
  changeStatusLoader,
  changeError,
  changeAction,
} from "../actions/global.actions";
import {
  newPaymentMethod,
} from "../actions/user.actions";

// Components
import MainButton from "../components/Buttons/MainButton";
import { Content } from "../components/Styles";
import LoadingSpinner from '../components/LoadingSpinner/LoadingSpinner';


import { handleAddNewPaymentMethod } from "../components/Payment/handlers";

// Stripe
import StripeElementsWrapper from "../components/stripe/StripeElementsWrapper";
import NewPaymentMethod from "../components/PaymentMethods/NewPaymentMethod";

export default function ScreenAddPaymentMethod() {
  const dispatch = useDispatch();
  const { user } = useSelector((state) => ({
    user: state.user,
  }));
  const {global} = useSelector((state) => ({
		global: state.global,
	}));

  const handleSubmit = async (e) => {
    try {
      e.preventDefault();
      const cardElementResult = user.newPaymentMethod.element;
      const cardElementError = user.newPaymentMethod.error;
      const stripeReference = user.newPaymentMethod.stripe;

      if (
        (cardElementError == "" || cardElementError === undefined) &&
        cardElementResult !== undefined
      ) {
        dispatch(changeError(''));
        dispatch(changeStatusLoader(true));
        const params = {
          stripe: stripeReference,
          stripe_data: {
            payment_method: {
              card: cardElementResult,
              billing_details: {
                name: `${user.data.first_name} ${user.data.last_name}`,
                email: user.data.email,
              },
            },
          },
        };
        params.type = "setup";
        const res = await handleAddNewPaymentMethod(params);
        if (res) {
          dispatch(newPaymentMethod({ error: "", element: {}, stripe: {} }));
          dispatch(changeAction("PAYMENT_METHOD_UPDATED"));
        } 
      }
    } catch (e) {
      dispatch(changeError(e.message));
    }
    dispatch(changeStatusLoader(false));
  };

  useEffect(() => {}, []);
  return (
    <>
      {global.loader ? (<LoadingSpinner />) : ''}
      <StripeElementsWrapper>
        <Content>
          Add a new payment method in the form below
          <br />
          <NewPaymentMethod />
        </Content>
        <MainButton title="Add payment method" onClick={handleSubmit} />
      </StripeElementsWrapper>
    </>
    
  );
}
