import React, { useEffect, useState } from "react";
import { useDispatch, useSelector } from "react-redux";

import { 
  changeError,
  changeStatusLoader,
  changeAction } from "../../actions/global.actions";
import { newPaymentMethod, updateCreditCards  } from "../../actions/user.actions";
// Stripe
import { CardElement, useElements, useStripe } from "@stripe/react-stripe-js";

import { handleAddNewPaymentMethod } from "../Payment/handlers";

// WP API
import { WP } from "../../api";

export default function NewPaymentMethod() {
  const dispatch = useDispatch();
  const elements = useElements();
  const stripe = useStripe();

  const [ formEmpty, setFormEmpty] = useState(true);

  const { user, global } = useSelector((state) => ({
    user: state.user,
    global: state.global
  }))

  const handleOnChange = async (e) => {
    try {
      if ((e?.error?.message == "" || e?.error?.message ===undefined ) && e?.complete == true) {
        setFormEmpty(false)
        dispatch(changeError(''));
        dispatch(newPaymentMethod({error: "", element:elements.getElement(CardElement), stripe: stripe}));
      }else{
        if (e?.error?.message == "") {
          setFormEmpty(false)
          dispatch(changeError( e.error.message));
          dispatch(newPaymentMethod({error: e.error.message, element:{},  stripe: {}}));
        } else {
          setFormEmpty(true)
        }
        
      }
    } catch (e) {
      dispatch(changeError(e.message));
    }
  };

  const handleSubmit = async (e) => {
    try {
      e.preventDefault();

      const cardElementResult = user.newPaymentMethod.element;
      const cardElementError = user.newPaymentMethod.error;
      const stripeReference = user.newPaymentMethod.stripe;

      if (
        ((cardElementError == "" || cardElementError === undefined) && 
        cardElementResult !== undefined) && !formEmpty
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
            elements.getElement(CardElement).clear();
            dispatch(newPaymentMethod({ error: "", element: {}, stripe: {} }));
            const resPaymentMethods = await WP.request.hook("wp_payment_methods");
            if (resPaymentMethods.success) {
              dispatch(updateCreditCards(resPaymentMethods.data));
            }
            dispatch(changeStatusLoader(false));
          } 
      } else {
        dispatch(changeError('The card data is incomplete'));
        dispatch(changeStatusLoader(false));
      }
    } catch {

    }
  }


  return (
    <div className="dydo_new-payment-method">
        <div className="dydo_card-element-container">
          <CardElement
            onChange={handleOnChange}
          />
        </div>
        <div> 
          <button type="button" className="dydo_btn-enable-solid" onClick={handleSubmit}>Save</button>
        </div>
    </div>
  );
}
