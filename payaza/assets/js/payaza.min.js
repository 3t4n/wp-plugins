jQuery(function ($) {
  let payaza_submit = false;

  $("#wc-payaza-form").hide();

  wcPayazaFormHandler();

  jQuery("#payaza-payment-button").click(function () {
    return wcPayazaFormHandler();
  });

  jQuery("#payaza_form form#order_review").submit(function () {
    return wcPayazaFormHandler();
  });

  function wcPayazaFormHandler() {
    $("#wc-payaza-form").hide();

    if (payaza_submit) {
      payaza_submit = false;
      return true;
    }

    let $form = $("form#payment-form, form#order_review"),
      payaza_txnref = $form.find("input.payaza_txnref");

    payaza_txnref.val("");

    let amount = Number(wc_payaza_params.amount);

    const isLiveMode = wc_payaza_params.connection_mode === "Live";

    let payaza_callback = function (response) {
      $form.append(
        '<input type="hidden" class="payaza_txnref" name="payaza_txnref" value="' +
          response.trxref +
          '"/>'
      );
      payaza_submit = true;

      $form.submit();

      $("body").block({
        message: null,
        overlayCSS: {
          background: "#fff",
          opacity: 0.6,
        },
        css: {
          cursor: "wait",
        },
      });

      if (response.type === "success") {
        $.ajax({
          url: wc_payaza_params.update_order_url, // Ensure this is set in your backend
          type: "POST",
          data: {
            order_id: wc_payaza_params.order_id, // Order ID from WooCommerce
            transaction_reference: wc_payaza_params.txnref, // Transaction reference from Payaza
            status: "completed", // You can modify this based on actual transaction status
          },
          success: function (res) {
            if (res.success) {
              console.log("Order updated successfully:", res);
              window.location.href = wc_payaza_params.thank_you_url; // Redirect to Thank You page
            } else {
              console.log("Failed to update order status.");
            }
          },
          error: function (err) {
            console.error("Error updating order status:", err);
          },
        });
      }
    };

    payazaCheckout = PayazaCheckout.setup({
      merchant_key: wc_payaza_params.key,
      connection_mode: isLiveMode ? "Live" : "Test",
      checkout_amount: amount / 100,
      currency_code: wc_payaza_params.currency,
      email_address: wc_payaza_params.email,
      first_name: wc_payaza_params.first_name,
      last_name: wc_payaza_params.last_name,
      phone_number: wc_payaza_params.phone_number,
      transaction_reference: wc_payaza_params.txnref,

      onClose: function (response) {},

      callback: function (callbackResponse) {
        console.log("callback response", callbackResponse);
      },
    });

    function callback(callbackResponse) {
      console.log("callbackResponse: ", callbackResponse);
      payaza_callback(callbackResponse);
    }

    function onClose() {
      console.log("closed");
    }

    payazaCheckout.setCallback(callback);
    payazaCheckout.setOnClose(onClose);

    // Display popup
    payazaCheckout.showPopup();

    return true;
  }
});
