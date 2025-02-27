const baseRequest = {
  apiVersion: 2,
  apiVersionMinor: 0
};
const allowedCardNetworks = ["AMEX", "MASTERCARD", "VISA"];
const allowedCardAuthMethods = ["PAN_ONLY", "CRYPTOGRAM_3DS"];
const tokenizationSpecification = {
  type: 'PAYMENT_GATEWAY',
  parameters: {
    'gateway': 'aciworldwide',
    'gatewayMerchantId': '8a829418629b18640162a387aad10a79'
  }
};
const baseCardPaymentMethod = {
  type: 'CARD',
  parameters: {
    allowedAuthMethods: allowedCardAuthMethods,
    allowedCardNetworks: allowedCardNetworks
  }
};
const cardPaymentMethod = Object.assign(
  {},
  baseCardPaymentMethod,
  {
    tokenizationSpecification: tokenizationSpecification
  }
);
let paymentsClient = null;
function getGoogleIsReadyToPayRequest() {
  return Object.assign(
      {},
      baseRequest,
      {
        allowedPaymentMethods: [baseCardPaymentMethod]
      }
  );
}
function getGooglePaymentDataRequest() {
  const paymentDataRequest = Object.assign({}, baseRequest);
  paymentDataRequest.allowedPaymentMethods = [cardPaymentMethod];
  paymentDataRequest.transactionInfo = getGoogleTransactionInfo();
  paymentDataRequest.merchantInfo = {
    merchantId: '01234567890123456789',
    merchantName: 'Total Processing Limited'
  };

  paymentDataRequest.callbackIntents = ["SHIPPING_ADDRESS",  "SHIPPING_OPTION", "PAYMENT_AUTHORIZATION"];
  paymentDataRequest.shippingAddressRequired = true;
  paymentDataRequest.shippingAddressParameters = getGoogleShippingAddressParameters();
  paymentDataRequest.shippingOptionRequired = true;

  return paymentDataRequest;
}
function getGooglePaymentsClient() {
  if ( paymentsClient === null ) {
    paymentsClient = new google.payments.api.PaymentsClient({
      environment: "TEST",
      merchantInfo: {
        merchantId: '01234567890123456789',
        merchantName: 'Total Processing Limited'
      },
      paymentDataCallbacks: {
        onPaymentAuthorized: onPaymentAuthorized,
        onPaymentDataChanged: onPaymentDataChanged
      }
    });
  }
  return paymentsClient;
}
function onPaymentAuthorized(paymentData) {
        return new Promise(function(resolve, reject){
  processPayment(paymentData)
    .then(function() {
      resolve({transactionState: 'SUCCESS'});
    })
    .catch(function() {
        resolve({
        transactionState: 'ERROR',
        error: {
          intent: 'PAYMENT_AUTHORIZATION',
          message: 'Insufficient funds',
          reason: 'PAYMENT_DATA_INVALID'
        }
      });
    });

  });
}
function onPaymentDataChanged(intermediatePaymentData) {
  return new Promise(function(resolve, reject) {

        let shippingAddress = intermediatePaymentData.shippingAddress;
    let shippingOptionData = intermediatePaymentData.shippingOptionData;
    let paymentDataRequestUpdate = {};

    if (intermediatePaymentData.callbackTrigger == "INITIALIZE" || intermediatePaymentData.callbackTrigger == "SHIPPING_ADDRESS") {
      if(shippingAddress.administrativeArea == "GB")  {
        paymentDataRequestUpdate.error = getGoogleUnserviceableAddressError();
      }
      else {
        paymentDataRequestUpdate.newShippingOptionParameters = getGoogleDefaultShippingOptions();
        let selectedShippingOptionId = paymentDataRequestUpdate.newShippingOptionParameters.defaultSelectedOptionId;
        paymentDataRequestUpdate.newTransactionInfo = calculateNewTransactionInfo(selectedShippingOptionId);
      }
    }
    else if (intermediatePaymentData.callbackTrigger == "SHIPPING_OPTION") {
      paymentDataRequestUpdate.newTransactionInfo = calculateNewTransactionInfo(shippingOptionData.id);
    }

    resolve(paymentDataRequestUpdate);
  });
}
function calculateNewTransactionInfo(shippingOptionId) {
        let newTransactionInfo = getGoogleTransactionInfo();

  let shippingCost = getShippingCosts()[shippingOptionId];
  newTransactionInfo.displayItems.push({
    type: "LINE_ITEM",
    label: "Shipping cost",
    price: shippingCost,
    status: "FINAL"
  });
  let totalPrice = 0.00;
  newTransactionInfo.displayItems.forEach(displayItem => totalPrice += parseFloat(displayItem.price));
  newTransactionInfo.totalPrice = totalPrice.toString();
  return newTransactionInfo;
}
function onGooglePayLoaded() {
  const paymentsClient = getGooglePaymentsClient();
  paymentsClient.isReadyToPay(getGoogleIsReadyToPayRequest())
      .then(function(response) {
        if (response.result) {
          addGooglePayButton();
          
        }
      })
      .catch(function(err) {
        // show error in developer console for debugging
        console.error(err);
      });
}
function addGooglePayButton() {
  const paymentsClient = getGooglePaymentsClient();
  const button =
      paymentsClient.createButton({onClick: onGooglePaymentButtonClicked});
  document.getElementById('gpay_btn').appendChild(button);
}
function getGoogleTransactionInfo() {
  return {
        displayItems: [
        {
          label: "Subtotal",
          type: "SUBTOTAL",
          price: gpVars.subTotalAmount,
        }
    ],
    countryCode: 'GB',
    currencyCode: "GBP",
    totalPriceStatus: "FINAL",
    totalPrice: gpVars.subTotalAmount,
    totalPriceLabel: "Total"
  };
}
function getShippingCosts() {
        return {
    "shipping-001": "0.00",
    "shipping-002": "1.99",
    "shipping-003": "10.00"
  }
}
function getGoogleShippingAddressParameters() {
        return  {
        allowedCountryCodes: ['GB'],
    phoneNumberRequired: true
  };
}
function getGoogleDefaultShippingOptions() {
        return {
      defaultSelectedOptionId: "shipping-001",
      shippingOptions: [
        {
          "id": "shipping-001",
          "label": "Free: Standard shipping",
          "description": "Free Shipping delivered in 5 business days."
        },
        {
          "id": "shipping-002",
          "label": "1.99: Standard shipping",
          "description": "Standard shipping delivered in 3 business days."
        },
        {
          "id": "shipping-003",
          "label": "10: Express shipping",
          "description": "Express shipping delivered in 1 business day."
        },
      ]
  };
}
function getGoogleUnserviceableAddressError() {
        return {
    reason: "SHIPPING_ADDRESS_UNSERVICEABLE",
    message: "Cannot ship to the selected address",
    intent: "SHIPPING_ADDRESS"
        };
}
function prefetchGooglePaymentData() {
  const paymentDataRequest = getGooglePaymentDataRequest();
  // transactionInfo must be set but does not affect cache
  paymentDataRequest.transactionInfo = {
    totalPriceStatus: 'NOT_CURRENTLY_KNOWN',
    currencyCode: 'GBP'
  };
  const paymentsClient = getGooglePaymentsClient();
  paymentsClient.prefetchPaymentData(paymentDataRequest);
}
function onGooglePaymentButtonClicked() {
  const paymentDataRequest = getGooglePaymentDataRequest();
  paymentDataRequest.transactionInfo = getGoogleTransactionInfo();

  const paymentsClient = getGooglePaymentsClient();
  paymentsClient.loadPaymentData(paymentDataRequest);
}
function processPayment(paymentData) {
        return new Promise(function(resolve, reject) {
        setTimeout(function() {
        // show returned data in developer console for debugging
         console.log(paymentData);
                // @todo pass payment token to your gateway to process payment
                console.log('handoff paymentToken!');
                paymentToken = paymentData.paymentMethodData.tokenizationData.token;
                console.log(paymentToken);
                //do fetch...
                fetch('test-post.php', { method: 'POST', credentials: 'include', body: paymentToken })
                .then(response => {
                    console.log(response);
                    return response.json();
                }).then(result => {
                    console.log(result);
                });
        resolve({});
    }, 3000);
  });
}