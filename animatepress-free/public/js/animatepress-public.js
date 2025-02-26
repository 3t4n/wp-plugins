window.addEventListener("load", (event) => {
  // Check animatepress status
  if (!ANIMATEPRESSDATA.options.isActive) {
    return null;
  }

  // **************************** //
  // **   Get all able links   ** //
  // **************************** //

  const allLinks = document.querySelectorAll(
    'a:not([target="_blank"]):not([href^="#"]):not([href=""])[href]'
  );

  // Get elements transitions
  const body = document.querySelector("body");
  const overlayElt = document.getElementById("animatepress-overlay");
  const loaderElt = document.getElementById("animatepress-loader");
  const fadeElt = overlayElt?.querySelector(".fade");
  const slideTopElt = overlayElt?.querySelector(".slide-top");
  const slideRightElt = overlayElt?.querySelector(".slide-right");
  const slideBottomElt = overlayElt?.querySelector(".slide-bottom");
  const slideLeftElt = overlayElt?.querySelector(".slide-left");

  // Get duration transitions (ms)

  const waitingDuration = 1500;
  const timeDuration = 700;
  const totalTime = parseInt(waitingDuration) + parseInt(timeDuration);
  const transitionEffect = "cubic-bezier(0.165, 0.84, 0.44, 1)";

  // ******************** //
  // **    Functions   ** //
  // ******************** //

  // Global functions

  const showOverlay = (time = 0) => {
    body.style.overflow = "hidden";
    setTimeout(() => {
      overlayElt.style.opacity = 1;
      overlayElt.style.visibility = "visible";
    }, time);
  };

  const hideOverlay = (time = 0) => {
    body.style.overflow = "hidden";
    setTimeout(() => {
      body.style.overflow = "initial";
      overlayElt.style.opacity = 0;
      overlayElt.style.visibility = "hidden";
    }, time);
  };

  //Loaders functions
  const showLoader = (time) => {
    setTimeout(() => {
      loaderElt.style.opacity = 1;
    }, time);
  };

  const hideLoader = (time) => {
    setTimeout(() => {
      loaderElt.style.opacity = 0;
    }, time);
  };

  // Effects functions

  const fadeIn = (link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      let target = e.currentTarget.href;

      showOverlay();
      fadeElt.classList.remove("fade--out");
      fadeElt.classList.add("fade--in");

      if (loaderElt) showLoader(timeDuration);

      setTimeout(() => {
        window.location.href = target;
      }, totalTime);
    });
  };

  const fadeOut = () => {
    fadeElt.classList.add("fade--out");

    if (loaderElt) hideLoader();

    hideOverlay(timeDuration);
  };

  const slideTopIn = (link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      let target = e.currentTarget.href;

      showOverlay();

      slideTopElt.style.animation = `slideTopIn ${timeDuration}ms ${transitionEffect} forwards`;

      if (loaderElt) showLoader(timeDuration);

      setTimeout(() => {
        window.location.href = target;
      }, totalTime);
    });
  };

  const slideTopOut = () => {
    if (loaderElt) hideLoader();

    slideTopElt.style.animation = `slideTopOut ${timeDuration}ms ${transitionEffect} forwards`;

    hideOverlay(timeDuration);
  };

  const slideRightIn = (link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      let target = e.currentTarget.href;

      showOverlay();

      slideRightElt.style.animation = `slideRightIn ${timeDuration}ms ${transitionEffect} forwards`;

      if (loaderElt) showLoader(timeDuration);

      setTimeout(() => {
        window.location.href = target;
      }, totalTime);
    });
  };

  const slideRightOut = () => {
    if (loaderElt) hideLoader();

    slideRightElt.style.animation = `slideRightOut ${timeDuration}ms ${transitionEffect} forwards`;

    hideOverlay(timeDuration);
  };

  const slideBottomIn = (link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      let target = e.currentTarget.href;

      showOverlay();

      slideBottomElt.style.animation = `slideBottomIn ${timeDuration}ms ${transitionEffect} forwards`;

      if (loaderElt) showLoader(timeDuration);

      setTimeout(() => {
        window.location.href = target;
      }, totalTime);
    });
  };

  const slideBottomOut = () => {
    if (loaderElt) hideLoader();

    slideBottomElt.style.animation = `slideBottomOut ${timeDuration}ms ${transitionEffect} forwards`;

    hideOverlay(timeDuration);
  };

  const slideLeftIn = (link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      let target = e.currentTarget.href;

      showOverlay();

      slideLeftElt.style.animation = `slideLeftIn ${timeDuration}ms ${transitionEffect} forwards`;

      if (loaderElt) showLoader(timeDuration);

      setTimeout(() => {
        window.location.href = target;
      }, totalTime);
    });
  };

  const slideLeftOut = () => {
    if (loaderElt) hideLoader();

    slideLeftElt.style.animation = `slideLeftOut ${timeDuration}ms ${transitionEffect} forwards`;

    hideOverlay(timeDuration);
  };

  // ******************** //
  // **     Calls      ** //
  // ******************** //

  for (const link of allLinks) {
    if (fadeElt) {
      fadeIn(link);
      fadeOut();
    }

    if (slideTopElt) {
      slideTopIn(link);
      slideTopOut();
    }

    if (slideRightElt) {
      slideRightIn(link);
      slideRightOut();
    }

    if (slideBottomElt) {
      slideBottomIn(link);
      slideBottomOut();
    }

    if (slideLeftElt) {
      slideLeftIn(link);
      slideLeftOut();
    }
  }
});
