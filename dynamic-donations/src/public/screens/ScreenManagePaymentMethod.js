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
import PaymentMethodsForm from "../components/PaymentMethods/PaymentMethodsForm";

import { handleAddNewPaymentMethod } from "../components/Payment/handlers";

// Stripe
import StripeElementsWrapper from "../components/stripe/StripeElementsWrapper";
import NewPaymentMethod from "../components/PaymentMethods/NewPaymentMethod";

export default function ScreenManagePaymentMethod() {
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
          console.log('update');
          // dispatch(newPaymentMethod({ error: "", element: {}, stripe: {} }));
          // dispatch(changeAction("PAYMENT_METHOD_UPDATED"));
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
          Set Your Payment Method
          <br />
          <p className="dydo_donation-type__placeholder">
          You can add, edit, or set your primary card as your payment method.        
          </p>
          <div className="dydo_container_message_info">
            <span className="dydo_message_info">You can only edit the expiration month and year. If you want to edit the credit card number you must remove and add again.</span>
            <a>
              <img src={`${dydo_wp_public.plugin.assets_uri}/public/icons/close-gray.svg`}  title="Close" /> 
            </a>
          </div>

            <NewPaymentMethod />
            <hr></hr>
          <PaymentMethodsForm />
          
        </Content>
      </StripeElementsWrapper>
    </>
    
  );
}
