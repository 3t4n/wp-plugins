const current_script_digits = document.currentScript;
const attributes_digits = {
  "data-site-key": "site_key",
  "data-theme": "theme",
  "data-lang": "lang",
  "data-color": "color",
  "data-size": "size",
};

var is_solved = [];

document.addEventListener("DOMContentLoaded", function () {
  var wrapperClasses = ["digloginpage", "forgot", "register"];
  var attributes = ["data-site-key", "data-theme", "data-lang", "data-color"];

  setInLoginPage();

  setInRegisterPage();

  setInForgotPass();
});

function registerARCaptchaFor(query) {
  var config = {};
  const wrapper = document.querySelector(query);
  if (!wrapper) return;

  const arcaptchaElement = document.createElement("div");

  Object.entries(attributes_digits).forEach(function ([key, value]) {
    config[value] = current_script_digits.getAttribute(key);
  });

  wrapper.appendChild(arcaptchaElement);

  const widget_id = window.arcaptcha.render(arcaptchaElement, config);

  is_solved[widget_id] = false;

  return widget_id;
}

function setInRegisterPage() {
  const widget_id = registerARCaptchaFor(".digits_register");

  registerEventListenerFor(
    document.querySelector(".dig-signup-otp"),
    widget_id
  );

  document.querySelector(".dig_reg_btn_password").addEventListener(
    "click",
    function () {
      registerEventListenerFor(
        document.querySelector(".dig_reg_btn_password"),
        widget_id
      );
    },
    { once: true }
  );
}

function setInLoginPage() {
  const widget_id = registerARCaptchaFor(".digloginpage form");

  registerEventListenerFor(
    document.querySelector(".digits_login button[type='submit']"),
    widget_id
  );

  registerEventListenerFor(
    document.querySelector(".digits_login #dig_login_va_otp"),
    widget_id
  );
}

function setInForgotPass() {
  const widget_id = registerARCaptchaFor(".forgot .digits_forgot_pass");

  registerEventListenerFor(
    document.querySelector("button.forgotpassword"),
    widget_id
  );
}

function registerEventListenerFor(element, widget_id) {
  element.addEventListener(
    "click",
    function (e) {
      if (is_solved[widget_id]) {
        is_solved[widget_id] = false;
        arcaptcha.reset(widget_id);
        return true;
      }

      e.stopPropagation();

      e.preventDefault();

      arcaptcha.execute(widget_id);

      addEventListener(`arcaptcha-challenge-solved-${widget_id}`, function () {
        is_solved[widget_id] = true;
        element.click();
      });
      return false;
    },
    true
  );
}
