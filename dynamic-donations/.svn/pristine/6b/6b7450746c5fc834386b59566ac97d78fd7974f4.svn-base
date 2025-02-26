import React, { useEffect } from "react";
import { useDispatch, useSelector } from "react-redux";

// Components
import MainButton from "../components/Buttons/MainButton";
import { Content } from "../components/Styles";
import {
  changeStatusLoader,
  changeError,
  changeAction,
} from "../actions/global.actions";
import { handleRemoveSubscription } from "../components/Payment/handlers";
import LoadingSpinner from '../components/LoadingSpinner/LoadingSpinner';

export default function ScreenCancelSubscription() {
  const dispatch = useDispatch();
  const { global } = useSelector((state) => ({
    global: state.global,
  }));

  const handleSubmit = async (e) => {
    try {
      e.preventDefault();
      dispatch(changeStatusLoader(true));
      const res = await handleRemoveSubscription(
        global.selectedSubscription.id
      );
      if (res.success) {
        dispatch(changeAction("SUBSCRIPTION_UPDATED"));
      } else {
        dispatch(changeError(res.data));
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
      <Content>
        <p className="dydo_content-paragraph">
          Do you want to cancel this subscription?
        </p>
      </Content>
      <MainButton title="Cancel subscription" onClick={handleSubmit} />
    </>
  );
}
