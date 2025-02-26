import React from "react";

// Components
import PaymentMethod from "./PaymentMethod";

function PaymentMethodsList({ cards, selectMultiple = true }) {
  return (
    <div className="dydo_paymentmethods">
      <div className="dydo_col-xs-12 dydo_col-sm-12">
        <p className="dydo_donation-type__placeholder">
          Please select or add a payment method
        </p>
      </div>
      {cards.map((paymentMethod) => (
        <PaymentMethod
          paymentMethod={paymentMethod}
          key={paymentMethod.id}
          multiple={selectMultiple}
        />
      ))}
    </div>
  );
}

export default PaymentMethodsList;
