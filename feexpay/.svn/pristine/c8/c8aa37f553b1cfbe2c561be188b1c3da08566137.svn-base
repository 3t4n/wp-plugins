document.addEventListener('DOMContentLoaded', function (event) {
  const button = document.querySelector('#feexpay-button-init');
  function makeid(length) {
    let result = '';
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    const charactersLength = characters.length;
    let counter = 0;
    while (counter < length) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
      counter += 1;
    }
    return result;
  }

  // console.log(inputs)
  const reference = makeid(8);
  inputs.reference = makeid(8);
  inputs.callback = inputs.callback+inputs.reference;
  inputs.testmode === 'yes'
      ? (inputs.mode = "SANDBOX")
      : (inputs.mode = "LIVE");

  // console.log(inputs)
  // if (!inputs.theme) inputs.theme = 'primary';
  event.preventDefault();
  inputs.sdk = 'woocommerce';

  const button_woo = document.querySelector('#feexpay-button-init');
  button_woo.style.display = "none";
  // console.log(inputs)
  // console.log({
  //   id: inputs.shop,
  //   amount: inputs.amount,
  //   token: inputs.token,
  //   mode: inputs.mode,
  //   currency: inputs.currency,
  //   callback_url: inputs.callback,
  //   custom_id: inputs.reference,
  //   case: inputs.country ? "MOBILE" : inputs.form,
  //   defaultValue: inputs.country !== "" ? {'country': inputs.country, network: inputs.network !== "" ? inputs.network : ""} : undefined
  // })
  FeexPayButton.init("render", {
    id: inputs.shop,
    amount: inputs.amount,
    token: inputs.token,
    mode: inputs.mode,
    currency: inputs.currency,
    callback_url: inputs.callback,
    custom_id: inputs.reference,
    case: inputs.country ? "MOBILE" : inputs.form,
    defaultValue: inputs.country !== "" ? {'country': inputs.country, network: inputs.network !== "" ? inputs.network : ""} : undefined
  });
  button.addEventListener('click', function (event) {
    // console.log(inputs)

    let redirectionStart = false;

    // window.addSuccessListener((data) => {
    //   console.log(data)
    //   setTimeout(() => {
    //     if (!redirectionStart) {
    //       const url = `${inputs.callback}&transaction_id=${data.transactionId}`;
    //       window.location.replace(url);
    //     }
    //   }, 5000);
    // });

    window.addPaymentEndListener(() => {
      redirectionStart = true;
    });
  });
});
