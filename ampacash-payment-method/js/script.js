setTimeout(function () {
  // Ensure the variables are properly defined
  var paymentMethodVar =
    typeof ampaCashVars !== "undefined"
      ? ampaCashVars.paymentMethodVar
      : "ampacash_veprap";
  var isUserLoggedInVar =
    typeof ampaCashVars !== "undefined" ? ampaCashVars.isUserLoggedInVar : "";
  var merchantIdVar =
    typeof ampaCashVars !== "undefined" ? ampaCashVars.merchantIdVar : "";

  let isVeprapInitialized = false;

  function initializeVeprap() {
    if (!isVeprapInitialized) {
      console.log("Initializing veprap.js...");
      jQuery.getScript(
        "wp-content/plugins/ampacash-payment-method/js/veprap.js",
        function () {
          isVeprapInitialized = true;
          attachOnSuccessEvent();
          console.log("veprap.js successfully loaded.");
        }
      );
    }
  }

  function removeVeprap() {
    if (isVeprapInitialized) {
      console.log("Removing veprap.js...");
      jQuery("#def").off("onsuccess");
      jQuery("#ampa-cash-errors").html("");
      localStorage.removeItem("paymentStatus");

      isVeprapInitialized = false;
    }
  }

  function attachOnSuccessEvent() {
    var defElement = document.querySelector("#def");
    if (defElement) {
      defElement.removeEventListener("onsuccess", handleOnSuccess); // Remove existing listener to avoid duplicates
      defElement.addEventListener("onsuccess", handleOnSuccess);
      console.log("Event listener re-attached.");
    } else {
      console.log("Failed to attach the event listener: Element not found.");
    }
  }

  function handleOnSuccess(event) {
    console.log("OnSuccess event triggered...");
    if (event.detail.data.data["success"]) {
      console.log(event.detail.data.data["message"]);
      if (
        document.getElementById("success_def").innerHTML !== "Payment Received."
      ) {
        document.getElementById("success_def").innerHTML = "Payment Received.";
        // toggleOrderButton("block");
      }
      document.getElementById("ampa-cash-errors").style.display = "none";
      document.getElementById("error_def").innerHTML = "";

      // Set payment status to success in local storage
      localStorage.setItem("paymentStatus", "success");
      // Automatically submit the order form
      setTimeout(function () {
        jQuery("form.checkout").submit();
      }, 100);
    } else {
      console.log("error has been logged: ", event.detail.data.data["message"]);
      if (
        document.getElementById("success_def").innerHTML !== "Payment Received."
      ) {
        document.getElementById("success_def").innerHTML = "";
        document.getElementById("ampa-cash-errors").style.display = "block";
        document.getElementById("error_def").innerHTML =
          event.detail.data.data["message"];
      }
    }
  }

  // Function to show/hide the order button
  function toggleOrderButton(display) {
    console.log("place-order button visibility:", display);
    document.getElementById("place_order").style.display = display;
    document.getElementById("def").style.display = !display;
  }

  // Function to validate billing details
  function validateBillingDetails() {
    console.log("validating...");
    var isValid = true;

    // Clear previous errors
    jQuery("#ampa-cash-errors").html("");

    // Check all required fields with class "validate-required" and without style="display: none;"
    jQuery(".validate-required:visible").each(function () {
      var fieldId = jQuery(this).find("input, select, textarea").attr("id");
      var fieldValue = jQuery(this).find("input, select, textarea").val();

      // Custom validation for ZIP code format
      if (fieldId === "billing_postcode") {
        if (!isValidZIP(fieldValue)) {
          isValid = false;
          var errorMessage =
            "<div class='wc-block-components-notice-banner is-error' role='alert'><div class='wc-block-components-notice-banner__content'>Billing ZIP Code is not a valid postcode / ZIP.</div></div>";
          jQuery("#ampa-cash-errors").append(errorMessage);
        }
      }

      if (!fieldValue) {
        console.log("invalid fields found...");
        isValid = false;

        // Display the error message
        var errorMessage =
          "<div class='wc-block-components-notice-banner is-error' role='alert'><div class='wc-block-components-notice-banner__content'><strong>" +
          fieldId +
          "</strong> is a required field.</div></div>";
        jQuery("#ampa-cash-errors").append(errorMessage);
      }
    });

    return isValid;
  }

  // Function to validate ZIP code format
  function isValidZIP(zip) {
    var zipRegex = /^[a-zA-Z0-9]{5,6}$/;
    return zipRegex.test(zip);
  }

  // Function to check if the user is logged in
  function isUserLoggedIn() {
    return isUserLoggedInVar;
  }

  jQuery(function ($) {
    paymentMethodVar = $("input[name='payment_method']:checked").val(); // Get the initially selected payment method
    console.log("Get the initially selected payment method", paymentMethodVar);

    // Check local storage for payment success status
    if (localStorage.getItem("paymentStatus") === "success") {
      document.getElementById("success_def").innerHTML = "Payment Received.";
      // toggleOrderButton("block");
    } else {
      // Hide the order button by default if the payment method is veprap
      if (paymentMethodVar === "ampacash_veprap") {
        initializeVeprap();
        toggleOrderButton("none");
        console.log("VEPRAP is selected by default", paymentMethodVar);
      } else {
        removeVeprap();
        setTimeout(() => {
          toggleOrderButton("block");
        }, 1000);
        console.log(
          "Different payment method is selected by default",
          paymentMethodVar
        );
      }
    }

    // Handle payment method change event
    $(document.body).on("change", "input[name='payment_method']", function () {
      paymentMethodVar = $(this).val(); // Update the variable when payment method changes

      console.log("paymentMethodVar: ", paymentMethodVar);
      console.log(
        "paymentMethodVar === 'ampacash_veprap'?: ",
        paymentMethodVar === "ampacash_veprap"
      );

      if (paymentMethodVar === "ampacash_veprap") {
        console.log("setting up ampacash veprap on change event.");
        setTimeout(() => {
          console.log("Set up ampacash veprap on change event is done.");
          initializeVeprap();
        }, 2000);
      } else {
        removeVeprap();
      }

      toggleOrderButton(
        paymentMethodVar === "ampacash_veprap" &&
          $("#success_def").html().trim() === ""
          ? "none"
          : "block"
      );
    });

    // Handle AmpaCash button hover event (onmouseover)
    $(document.body).on("mouseover", "#def a", function () {
      if (validateBillingDetails() && isUserLoggedIn()) {
        // Get the merchant ID
        var merchantId = merchantIdVar;
        $("#def").attr("merchantid", merchantId);
      } else {
        $("#def").removeAttr("merchantid");
        if (!isUserLoggedIn()) {
          var errorMessage =
            "<div class='wc-block-components-notice-banner is-error' role='alert'><div class='wc-block-components-notice-banner__content'>You must be logged in to use this payment method.</div></div>";
          jQuery("#ampa-cash-errors").append(errorMessage);
        }
      }
    });

    // Reset payment status on page load
    $(window).on("load", function () {
      localStorage.removeItem("paymentStatus");
      document.getElementById("success_def").innerHTML = "";

      if (
        $("input[name='payment_method']:checked").val() !== "ampacash_veprap"
      ) {
        toggleOrderButton("block");
        console.log("Resetting Order button to block");
      } else {
        toggleOrderButton("none");
        console.log("Resetting Order button to none");
      }
    });
  });
}, 2000);