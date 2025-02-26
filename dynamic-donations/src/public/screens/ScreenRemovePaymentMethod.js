import React from "react";
import { useDispatch, useSelector } from "react-redux";
import {
  changeStatusLoader,
  changeError,
  changeAction,
} from "../actions/global.actions";
import { removePaymentMethod } from "../actions/user.actions";

// Components
import MainButton from "../components/Buttons/MainButton";
import { Content } from "../components/Styles";
import PaymentMethods from "../components/PaymentMethods/PaymentMethods";
import LoadingSpinner from '../components/LoadingSpinner/LoadingSpinner';


import { handleDeleteCard } from "../components/Payment/handlers";

export default function ScreenRemovePaymentMethod() {
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
      const cardsToRemove = user.removePaymentMethod;
      const attachedCards = user.creditCards;
      if (attachedCards.length - cardsToRemove.length >= 1) {
        let defaultPaymentMethodId = "";
        dispatch(changeError(""));
        dispatch(changeStatusLoader(true));
        attachedCards.forEach((attachedCard) => {
          if (
            !cardsToRemove.includes(attachedCard.id)
          ) {
            defaultPaymentMethodId = attachedCard.id ;
            return ;
          }
        });

        const res = await handleDeleteCard( cardsToRemove, defaultPaymentMethodId);
        if (res.success) {
          dispatch(changeAction("PAYMENT_METHOD_UPDATED"));
          dispatch(removePaymentMethod([]));
          dispatch(changeStatusLoader(false));
          return;
        } 
        dispatch(changeError(res.data));
      } else {
        dispatch(
          changeError(
            "You must leave at least one card attached to your account."
          )
        );
      }
    } catch (e) {
      dispatch(changeError(e.message));
    }
    dispatch(changeStatusLoader(false));
  };
  return (
    <>
      {global.loader ? (<LoadingSpinner />) : ''}
      {" "}
      <Content>
        Remove payments method, you must leave one at least.
        <br />
        <PaymentMethods selectMultiple={true} />
      </Content>
      <MainButton title="Remove payment methods" onClick={handleSubmit} />
    </>
  );
}
