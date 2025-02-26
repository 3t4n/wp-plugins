document.addEventListener(
  "DOMContentLoaded",
  function() {
    let account = document.querySelector(".woocommerce-MyAccount-navigation-link--InstaCash");
    if(null != account){
      account.querySelector("a").setAttribute("target", "_blank");
    }
    const paymentField = document.getElementById("instaCashPaymentUrl");
    if(null != paymentField){
      paymentField.form.addEventListener("submit", function(event){
        const paymentMethod = document.getElementById("payment_method_InstaCashBNPLApplication");
        if (paymentMethod.checked) {
          event.preventDefault();
          window.location.href = paymentField.value;
        }
      });
    }
  }
);
