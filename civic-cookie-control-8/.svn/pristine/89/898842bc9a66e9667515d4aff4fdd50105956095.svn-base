(function () {
  const cookieBannerButtonAcceptHide = document.querySelector(
    ".cookie-banner-accept--hide"
  );
  const cookieBannerButtonRejectHide = document.querySelector(
    ".cookie-banner-reject--hide"
  );
  const cookieBannerButtonAccept = document.querySelector(
    ".cookie-banner-button--accept"
  );
  const cookieBannerButtonReject = document.querySelector(
    ".cookie-banner-button--reject"
  );
  const cookieBannerAccept = document.querySelector(".cookie-banner--accept");
  const cookieBannerReject = document.querySelector(".cookie-banner--reject");
  const cookieBannerMain = document.querySelector(".cookie-banner--main");
  const cookieBanner = document.querySelector(".ccc-cookie-banner");
  const body = document.getElementsByTagName("BODY")[0];

  function CccResizeTopBody() {
    if (
      cookieBanner &&
      cookieBanner.classList.contains("fixed-top") &&
      !body.classList.contains("toolbar-fixed")
    ) {
      let bannerHeight = cookieBanner.offsetHeight;
      body.style.paddingTop = bannerHeight + "px";
    }
  }

  function hideElement(element) {
    element.hidden = true;
    body.style.paddingTop = 0;
  }

  function showElement(element) {
    element.setAttribute("tabindex", -1);
    element.hidden = false;
  }

  function hideConfirmation(e) {
    e.preventDefault();
    hideElement(cookieBanner);
    body.style.paddingTop = 0;
  }

  function showConfirmation(e) {
    const cookieValue = e.target.value;
    e.preventDefault();
    hideElement(cookieBannerMain);

    if (cookieValue === "accept") {
      showElement(cookieBannerAccept);
      //Cookie Control accept all
      CookieControl.acceptAll();
    }
    if (cookieValue === "reject") {
      showElement(cookieBannerReject);
      //Cookie Control reject all
      CookieControl.rejectAll();
    }
    if (
      cookieBanner &&
      cookieBanner.classList.contains("fixed-top") &&
      !body.classList.contains("toolbar-fixed")
    ) {
      let bannerHeight = cookieBanner.offsetHeight;
      body.style.paddingTop = bannerHeight + "px";
    }
  }

  function CccGetCookieValue(name) {
    return document.cookie.match("(^|;)\\s*" + name + "\\s*=\\s*([^;]+)")
      ? document.cookie.match("(^|;)\\s*" + name + "\\s*=\\s*([^;]+)").pop()
      : "";
  }

  window.addEventListener("load", (event) => {
    if (
      cookieBanner &&
      CccGetCookieValue("CookieControl").indexOf("accepted") === -1 &&
      CccGetCookieValue("CookieControl").indexOf("revoked") === -1
    ) {
      showElement(cookieBanner);
      CccResizeTopBody();
      window.onresize = CccResizeTopBody;
    }

    if (cookieBannerButtonAcceptHide != null) {
      cookieBannerButtonAcceptHide.addEventListener("click", hideConfirmation);
      cookieBannerButtonRejectHide.addEventListener("click", hideConfirmation);
    }
    if (cookieBanner != null) {
      cookieBannerButtonAccept.addEventListener("click", showConfirmation);
      cookieBannerButtonReject.addEventListener("click", showConfirmation);
    }
  });
})();
