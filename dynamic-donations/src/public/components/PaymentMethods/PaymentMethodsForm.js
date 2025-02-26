import React, { useEffect, useState } from "react";
import { useDispatch, useSelector } from "react-redux";

// WP API
import { WP } from "../../api";

//Actions
import { updateCreditCards } from "../../actions/user.actions";
import { changeStatusLoader } from "../../actions/global.actions";

// Components
import PaymentMethodForm from "./PaymentMethodForm";

export default function PaymentMethods({ data = 'hola' }) {
  // redux Hooks
  const dispatch = useDispatch();
  const { user } = useSelector((state) => ({
    user: state.user,
  }));

  const listOfPaymentsMethods = user.creditCards;
  let listOfPaymentsMethodsExpired = [];
  let listOfPaymentsMethodsNotExpired = [];
  let defaultPaumentItem = [];
  let defaultPaymentMethod = '';

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

  listOfPaymentsMethods.forEach((paymentMethod) => {

    let expirationDate = new Date(`${paymentMethod.exp_month}/01/${paymentMethod.exp_year}`);
    let today = new Date();
    const differenceInMonths = (expirationDate - today) / (1000 * 60 * 60 * 24 * 30);
    
    if (paymentMethod.default_payment_method) {
      defaultPaumentItem.push(paymentMethod)
    } else {  
      if (differenceInMonths <= 3 ) {
        listOfPaymentsMethodsExpired.push(paymentMethod)
      } else {
        listOfPaymentsMethodsNotExpired.push(paymentMethod)
      }
    }    
  })

  let listOfPaymentsMethodsFinal = defaultPaumentItem.concat(listOfPaymentsMethodsExpired, listOfPaymentsMethodsNotExpired);

  const sendMail = async () => {
    const res = await WP.request.hook('check_payment_method_expired');
  }

  useEffect( ()=> {
    getPaymentMethods().then();
  }, []);

  if (listOfPaymentsMethodsFinal.length > 0) {
    return (
      <div className="dydo_paymentmethods">
        {/* <button onClick={sendMail}>Send Mail</button> */}
        <div className="dydo_row dydo_middle-xs dydo_paymentnethods-item-header-titles" >
          <label className="dydo_col-xs-6 dydo_col-sm-3 dydo_labels-header-titles">Credit Card Number</label>
          <label className="dydo_col-xs-6 dydo_col-sm-1 dydo_labels-header-titles">MM</label>
          <label className="dydo_col-xs-6 dydo_col-sm-8 dydo_labels-header-titles">YYYY</label>
        </div>
        
        {listOfPaymentsMethodsFinal.map((paymentMethod) => (
          
          <PaymentMethodForm
            paymentMethod={paymentMethod}
            key={paymentMethod.id}
            defaultPaymentMethodId={defaultPaymentMethod}
          />
        ))}
      </div>
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
