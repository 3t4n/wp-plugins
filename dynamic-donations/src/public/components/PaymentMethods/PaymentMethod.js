import React from "react";
import { useDispatch, useSelector } from "react-redux";

// Actions
import { changePaymentMethodId } from "../../actions/subscription.actions";
import { removePaymentMethod } from "../../actions/user.actions";

// Main Component
function PaymentMethod({ paymentMethod, multiple = false }) {
  // redux Hooks
  const dispatch = useDispatch();
  const { user } = useSelector((state) => ({
    user: state.user,
  }));

  const handleOnChange = (e) => {
    if (multiple) {
      if (e.target.checked) {
        dispatch(
          removePaymentMethod([...user.removePaymentMethod, e.target.value])
        );
      } else {
        dispatch(
          removePaymentMethod( user.removePaymentMethod.filter((pm) => pm !== e.target.value))
        );
      }
    } else {
      dispatch(changePaymentMethodId(e.target.value));
    }
  };

  return (
    <div className="dydo_paymentmethods__item">
      <div className="dydo_row dydo_middle-xs">
        <div className="dydo_col-xs-10">
          <label
            className="dydo_paymentmethods-item__label"
            htmlFor={paymentMethod.id}
          >
            <span>
              <strong>{paymentMethod.brand}</strong>
              {` ${dydo_texts.screens.payment.ending_in} `}
              <strong>{paymentMethod.last4}</strong>
            </span>
            <span className="dydo_paymentmethods-item__separator"> </span>
            <span>
              {` ${dydo_texts.screens.payment.expires_on} `}
              <strong>
                {paymentMethod.exp_month}/{paymentMethod.exp_year}
              </strong>
            </span>
          </label>
        </div>
        <div className="dydo_col-xs-2 dydo_end-xs">
          <input
            onChange={handleOnChange}
            className={
              multiple
                ? "dydo_paymentmethods-item__checkbox"
                : "dydo_paymentmethods-item__radio"
            }
            type={multiple ? "checkbox" : "radio"}
            id={paymentMethod.id}
            name="payment-methods"
            value={paymentMethod.id}
          />
        </div>
      </div>
    </div>
  );
}

export default PaymentMethod;
