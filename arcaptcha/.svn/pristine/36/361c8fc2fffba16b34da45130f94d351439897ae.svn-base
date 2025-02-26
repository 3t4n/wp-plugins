const current_script = document.currentScript;
var is_solved = false;
var is_wc_digits_solved = false;
var attributes = ["data-site-key", "data-theme", "data-lang", "data-color"];
var submitComment = document.querySelector("#commentform #submit");

if (submitComment) {
  submitComment.id = "comment-submit";
  submitComment.name = "comment-submit";
}

window.clickWithOutARCaptcha = function () {
  document.querySelector("#place_order").click();
};

window.placeOrderClicked = function (e) {
  if (is_solved) {
    return true;
  } else {
    const last_index = Object.keys(window.arcaptcha.widgets).length - 1;

    const widget_id = Object.keys(window.arcaptcha.widgets)[last_index];

    window.arcaptcha.execute(widget_id);

    addEventListener(`arcaptcha-challenge-solved-${widget_id}`, function () {
      is_solved = true;
      clickWithOutARCaptcha();
    });

    return false;
  }
};

var forms = {
  "#loginform": {
    button: document.getElementById("wp-submit"),
  },
  "#lostpasswordform": {
    button: document.getElementById("wp-submit"),
  },
  "#commentform": {
    button: document.querySelector("#commentform #comment-submit"),
  },
  "#registerform": {
    button: document.getElementById("wp-submit"),
  },
  ".woocommerce-form.woocommerce-form-login.login": {
    button: document.querySelector(
      ".woocommerce-form.woocommerce-form-login button[type='submit']"
    ),
  },
  ".woocommerce-form.woocommerce-form-register.register": {
    button: document.querySelector(
      ".woocommerce-Button.woocommerce-button.button.woocommerce-form-register__submit"
    ),
  },
  ".woocommerce-ResetPassword.lost_reset_password": {
    button: document.querySelector(".woocommerce-Button.button"),
  },
};

Object.entries(forms).forEach(function ([form, value]) {
  if (!document.querySelector(form)) {
    return;
  }

  const b = value.button;

  if (b.nodeName === "BUTTON") {
    const input = document.createElement("input");

    input.value = b.value;

    input.name = b.name;

    input.hidden = true;

    b.parentNode.appendChild(input);
  }
  b.classList.add("arcaptcha");

  attributes.forEach(function (a) {
    b.setAttribute(a, current_script.getAttribute(a));
  });

  const call_back_func_name = formSubmittedFor(
    document.querySelector(form),
    b,
    value.additionalLogic
  );

  b.addEventListener("click", function (e) {
    b.setAttribute("data-callback", call_back_func_name);
  });

  b.setAttribute("data-callback", call_back_func_name);
});

function formSubmittedFor(form) {
  const random_name = (Math.random() + 1).toString(36).substring(7);
  window[random_name] = function (token) {
    form.submit();
  };
  return random_name;
}
