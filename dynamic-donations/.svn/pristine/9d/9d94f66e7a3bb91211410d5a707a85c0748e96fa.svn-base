import React, { useEffect, useState, useRef } from "react";
import { useDispatch, useSelector } from "react-redux";
import flatpickr from "flatpickr";

// Components
import MainButton from "../components/Buttons/MainButton";
import { Content } from "../components/Styles";
import {
  changeStatusLoader,
  changeError,
  changeAction,
} from "../actions/global.actions";
import { handleChangeSubscriptionDate } from "../components/Payment/handlers";
export default function ScreenEditSubscriptionDate() {
  const [selectedDate, setSelectedDate] = useState("");
  const dateElement = useRef(null);
  const dispatch = useDispatch();
  const { global } = useSelector((state) => ({
    global: state.global,
  }));

  const handleSubmit = async (e) => {
    try {
      e.preventDefault();
      dispatch(changeStatusLoader(true));
      const res = await handleChangeSubscriptionDate({
        subscriptionId: global.selectedSubscription.id,
        newDate: selectedDate,
        timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
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
  };

  useEffect(() => {
    flatpickr(dateElement.current, {
      enableTime: true,
      dateFormat: "m/d/Y G:i K",
      altInput: true,
      altFormat: "m/d/Y G:i K",
      defaultDate: global.selectedSubscription.nextPaymentAttempt * 1000,
      minDate: 'today',
      onChange: (selectedDates, dateStr, instance) => {
        if (dateStr != "") {
          setSelectedDate(dateStr);
          return;
        }
        dispatch(changeError("Date cannot be empty."));
      },
    });
  }, []);

  return (
    <>
      <Content>
        Edit next payment date (The billing cycle will be the same but it will
        change the billing date)
        <input
          type="text"
          placeholder="Select date"
          disabled={global.loader}
          ref={dateElement}
        />
      </Content>
      <MainButton title="Update" onClick={handleSubmit} />
    </>
  );
}
