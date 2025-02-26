var current_script_digits = document.currentScript;

document.addEventListener("DOMContentLoaded", function () {
  var wrapperClasses = ["forgot"];
  var attributes = ["data-site-key", "data-theme", "data-lang", "data-color"];

  wrapperClasses.forEach((className) => {
    var wrapper = document.querySelector(
      `.${className} .digits_fields_wrapper`
    );

    if (wrapper) {
      var arcaptchaElement = document.createElement("div");

      arcaptchaElement.className = "arcaptcha";

      arcaptchaElement.style.padding = "5px 0";

      attributes.forEach(function (a) {
        arcaptchaElement.setAttribute(a, current_script_digits.getAttribute(a));
      });

      wrapper.appendChild(arcaptchaElement);
    }
  });
});
