(function () {
  const cookieFormMessage = document.querySelector(".ccc-cookie-form-message");
  const cookieCategories = document.getElementsByClassName(
    "govuk-cookiecontrol-radios"
  );
  const cookieCategoryForms = document.querySelectorAll(
    ".ccc-govuk-form-group"
  );
  function CccheckUntilSuccess(i, delay = 200) {
    let timer = null;
    let counter = 0;
    function check() {
      let cccStateCategory = CookieControl.getCategoryConsent(i);
      if (cccStateCategory != null) {
        clearTimeout(timer);
        if (cccStateCategory === true) {
          document.getElementById("accept-" + i).checked = true;
        } else if (cccStateCategory === false) {
          document.getElementById("reject-" + i).checked = true;
        }
      } else {
        counter++;
        if (counter === 50) {
          clearTimeout(timer);
        } else {
          timer = setTimeout(check, delay);
        }
      }
    }
    timer = setTimeout(check, delay);
  }

  function CccGetCookieValue(name) {
    return document.cookie.match("(^|;)\\s*" + name + "\\s*=\\s*([^;]+)")
      ? document.cookie.match("(^|;)\\s*" + name + "\\s*=\\s*([^;]+)").pop()
      : "";
  }
  function cccGovUkDetails() {
    if (
      cookieCategories &&
      (CccGetCookieValue("CookieControl").indexOf("accepted") !== -1 ||
        CccGetCookieValue("CookieControl").indexOf("revoked") !== -1)
    ) {
      for (let i = 0; i < cookieCategories.length; i++) {
        CccheckUntilSuccess(i);
      }
    }

    if (cookieCategoryForms) {
      for (let i = 0; i < cookieCategoryForms.length; i++) {
        cookieCategoryForms[i]
          .closest(".cookie-category-form")
          .addEventListener("submit", function (e) {
            e.preventDefault();
            if (
              document.getElementById("accept-" + i).checked === true ||
              document.getElementById("reject-" + i).checked === true
            ) {
              if (document.getElementById("accept-" + i).checked === true) {
                cccChangeCategory(i, true);
              } else if (
                document.getElementById("reject-" + i).checked === true
              ) {
                cccChangeCategory(i, false);
              }
            }
          });
      }
    }
  }

  function cccChangeCategory(positon, statement) {
    let $changeCat = CookieControl.changeCategory(positon, statement);
    if ($changeCat) {
      cookieFormMessage.hidden = false;
      cookieFormMessage.scrollIntoView({ behavior: "smooth", duration: 500 });
    }
  }

  window.addEventListener("load", (event) => {
    cccGovUkDetails();
  });
})();
