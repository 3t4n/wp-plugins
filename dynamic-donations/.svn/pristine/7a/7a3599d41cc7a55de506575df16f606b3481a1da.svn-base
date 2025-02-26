import React, { useEffect, useState } from "react";
import { useDispatch, useSelector } from "react-redux";

// WP API
import { WP } from "../../api";

//Actions
import { updateCreditCards } from "../../actions/user.actions";
import { changeStatusLoader } from "../../actions/global.actions";

// Components
import PaymentMethodsList from "./PaymentMethodsList";

export default function PaymentMethods({ selectMultiple = false }) {
  // redux Hooks
  const dispatch = useDispatch();
  const { user } = useSelector((state) => ({
    user: state.user,
  }));

  // Component States
  const [showEmptyList, setShowEmptyList] = useState(false);

  const getPaymentMethods = async () => {
    const resPaymentMethods = await WP.request.hook("wp_payment_methods");
    if (resPaymentMethods.success) {
      dispatch(updateCreditCards(resPaymentMethods.data));
    }
    dispatch(changeStatusLoader(false));
    setShowEmptyList(true);
  };

  useEffect(() => {
    getPaymentMethods().then();
  }, []);

  if (user.creditCards.length > 0) {
    return (
      <PaymentMethodsList
        cards={user.creditCards}
        selectMultiple={selectMultiple}
      />
    );
  } else {
    return showEmptyList ? (
      <div className="dydo_paymentmethods-empty">
        {dydo_texts.screens.payment.there_are_no_payment_methods}.
      </div>
    ) : (
      <></>
    );
  }
}
