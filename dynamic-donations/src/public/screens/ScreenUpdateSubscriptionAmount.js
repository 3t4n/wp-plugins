import React, { useEffect, useState, useRef } from "react";
import { useDispatch, useSelector } from "react-redux";

// Components
import MainButton from "../components/Buttons/MainButton";
import { Content } from "../components/Styles";
import {
  changeStatusLoader,
  changeError,
  changeAction,
} from "../actions/global.actions";
import { handleChangeSubscriptionAmount } from "../components/Payment/handlers";

export default function ScreenUpdateSubscriptionAmount() {
  const dispatch = useDispatch();
  const { global } = useSelector((state) => ({
    global: state.global,
  }));
  const [amount, setAmount] = useState(global.selectedSubscription.amount);

  const handleSubmit = async (e) => {
    if (amount != "" && amount > 0) {
      try {
        e.preventDefault();
        dispatch(changeStatusLoader(true));
        const res = await handleChangeSubscriptionAmount({
          subscriptionId: global.selectedSubscription.id,
          newAmount: amount,
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
    dispatch(changeError("Amount can't be empty"));
  };

  const handleChangeAmount = (e) => {
    if (e.target.value < 0) {
      dispatch(changeError("Amount should be greater than 0"));
      return;
    }
    setAmount(e.target.value);
  };

  return (
    <>
      <Content>
        Edit Subscription Amount
        <input
          className="dydo_donation-amount__edit-amount"
          type="number"
          data-name="dydo-custom-amount"
          onChange={handleChangeAmount}
          value={amount}
        />
      </Content>
      <MainButton title="Save change" onClick={handleSubmit} />
    </>
  );
}
