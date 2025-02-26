import React from "react";

// Components
import PaymentMethodForm from "./PaymentMethodForm";

function PaymentMethodsListForm({ cards }) {
  return (
    <div className="dydo_paymentmethods">
      {cards.map((paymentMethod) => (
        <PaymentMethodForm
          paymentMethod={paymentMethod}
          key={paymentMethod.id}
        />
      ))}
    </div>
  );
}

export default PaymentMethodsListForm;
