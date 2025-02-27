(function ($) {
  "use strict";

  // data - background
  $("[data-background]").each(function () {
    $(this).css("background-image", "url(" + $(this).attr("data-background") + ")");
  });

  $("[data-width]").each(function () {
    $(this).css("width", $(this).attr("data-width"));
  });

  $("[data-left]").each(function () {
    $(this).css("left", $(this).attr("data-left"));
  });

  /*------------------------------------
		Slider
	--------------------------------------*/
  function mainSlider($data) {
    let active = $data.find(".bd-slider-active");
    let autoplay = parseInt(active.attr("autoplay-speed"));

    // data - background
    $("[data-background]").each(function () {
      $(this).css("background-image", "url(" + $(this).attr("data-background") + ")");
    });

    if (jQuery(".bd-slider-active").length > 0) {
      let sliderActive1 = ".bd-slider-active";
      let sliderInit1 = new Swiper(sliderActive1, {
        // Optional parameters
        slidesPerView: 1,
        slidesPerColumn: 1,
        paginationClickable: true,
        loop: true,
        effect: "fade",

        autoplay: {
          delay: autoplay,
        },

        // If we need pagination
        pagination: {
          el: ".t-swiper-pagination",
          // type: 'fraction',
          // clickable: true,
        },

        // Navigation arrows
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },

        a11y: false,
      });

      if (jQuery(".bd-slider-active").data("swipper_autoplay_stop") == "") {
        sliderInit1.autoplay.stop();
      }

      function animated_swiper(selector, init) {
        let animated = function animated() {
          $(selector + " [data-animation]").each(function () {
            let anim = $(this).data("animation");
            let delay = $(this).data("delay");
            let duration = $(this).data("duration");

            $(this)
              .removeClass("anim" + anim)
              .addClass(anim + " animated")
              .css({
                webkitAnimationDelay: delay,
                animationDelay: delay,
                webkitAnimationDuration: duration,
                animationDuration: duration,
              })
              .one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function () {
                $(this).removeClass(anim + " animated");
              });
          });
        };
        animated();
        // Make animated when slide change
        init.on("slideChange", function () {
          $(sliderActive1 + " [data-animation]").removeClass("animated");
        });
        init.on("slideChange", animated);
      }
      animated_swiper(sliderActive1, sliderInit1);
    }
  }

  // Team Activation
  function teamActive(data) {
    let active = data.find(".bd-team-active");
    let autoplay = parseInt(active.attr("autoplay-speed"));
    let autoplay_toggle = active.attr("autoplay_stop");

    if (jQuery(".bd-team-active").length > 0) {
      let portfolio = new Swiper(".bd-team-active", {
        slidesPerView: 1,
        spaceBetween: 30,
        // direction: 'vertical',
        loop: true,
        autoplay: {
          delay: autoplay,
        },

        // If we need pagination
        pagination: {
          el: ".team-pagination",
          clickable: true,
        },

        // Navigation arrows
        navigation: {
          nextEl: ".brand-button-next",
          prevEl: ".brand-button-prev",
        },

        // And if we need scrollbar
        scrollbar: {
          el: ".swiper-scrollbar",
        },
        breakpoints: {
          550: {
            slidesPerView: 2,
          },
          768: {
            slidesPerView: 2,
          },
          1200: {
            slidesPerView: 3,
          },
        },
      });

      if (autoplay_toggle == "yes") {
        portfolio.autoplay.start();
      } else {
        portfolio.autoplay.stop();
      }
    }
  }

  // Testimonial Activation
  function testimonialActive($data) {
    let active = $data.find(".testimonial-nav");

    let autoplay = active.attr("autoplay-toggle");

    let loop = active.attr("loop-active");

    let auto_speed = parseInt(active.attr("tes-speed"));

    let slide_per_view = parseInt(active.attr("slider-view"));

    // Testimonial Active
    var swiper = new Swiper(".testimonial-nav", {
      spaceBetween: 10,
      slidesPerView: slide_per_view,
      loop: loop == 1 ? loop : false,

      allowTouchMove: false,
      autoplay: {
        delay: auto_speed,
      },
      speed: 100,
      centeredSlides: true,
      freeMode: true,
      watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".testimonial-text", {
      spaceBetween: 10,
      loop: loop == 1 ? loop : false,
      autoplay: {
        delay: auto_speed,
      },
      navigation: {
        nextEl: ".slider-button-next",
        prevEl: ".slider-button-prev",
      },

      // If we need pagination
      pagination: {
        el: ".generic-el-testimonial-slider-paginations",
        // dynamicBullets: true,
        clickable: true,
      },
      thumbs: {
        swiper: swiper,
      },
    });

    if (autoplay == "yes") {
      swiper.autoplay.start();
      swiper2.autoplay.start();
    } else {
      swiper.autoplay.stop();
      swiper2.autoplay.stop();
    }
  }

  // Brand Activation
  function brandActive() {
    if (jQuery(".bd-brand-active").length > 0) {
      let brand = new Swiper(".bd-brand-active", {
        slidesPerView: 2,
        spaceBetween: 30,
        loop: true,
        autoplay: {
          delay: 5000,
        },

        // If we need pagination
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },

        // Navigation arrows
        navigation: {
          nextEl: ".brand-button-next",
          prevEl: ".brand-button-prev",
        },

        // And if we need scrollbar
        scrollbar: {
          el: ".swiper-scrollbar",
        },
        breakpoints: {
          550: {
            slidesPerView: 3,
          },
          768: {
            slidesPerView: 4,
          },
          1200: {
            slidesPerView: 5,
          },
          1400: {
            slidesPerView: 6,
          },
        },
      });
    }
  }

  function brandActive2() {
    if (jQuery(".generic-el-brand-active").length > 0) {
      let genBrand = new Swiper(".generic-el-brand-active", {
        slidesPerView: 2,
        spaceBetween: 30,
        loop: true,
        autoplay: {
          delay: 5000,
        },
        breakpoints: {
          550: {
            slidesPerView: 3,
          },
          768: {
            slidesPerView: 4,
          },
          1200: {
            slidesPerView: 5,
          },
          1400: {
            slidesPerView: 6,
          },
        },
      });
    }
  }
  brandActive2();
  // Instagram Active
  function instagramActive(data) {
    let active = data.find(".instagram-active");
    let autoplay = parseInt(active.attr("autoplay-speed"));
    let autoplay_toggle = active.attr("autoplay_stop");

    const swiper = new Swiper(".instagram-active", {
      // Default parameters
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      autoplay: {
        delay: autoplay,
      },
      // Responsive breakpoints
      breakpoints: {
        // when window width is >= 320px
        540: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 2,
        },
        992: {
          slidesPerView: 4,
        },
        1200: {
          slidesPerView: 6,
        },
      },
    });
    if (autoplay_toggle == "yes") {
      swiper.autoplay.start();
    } else {
      swiper.autoplay.stop();
    }
  }

  // Skill Active
  function skillActive() {
    // data - background
    $("[data-background]").each(function () {
      $(this).css("background-image", "url(" + $(this).attr("data-background") + ")");
    });

    $("[data-width]").each(function () {
      $(this).css("width", $(this).attr("data-width"));
    });

    $("[data-left]").each(function () {
      $(this).css("left", $(this).attr("data-left"));
    });

    $("[data-right]").each(function () {
      $(this).css("right", $(this).attr("data-right"));
    });

    new WOW().init();
  }

  // Video Active
  function videoActive() {
    // data - background
    $("[data-background]").each(function () {
      $(this).css("background-image", "url(" + $(this).attr("data-background") + ")");
    });

    /* magnificPopup img view */
    $(".gen-popup-image,.insta-thumb a").magnificPopup({
      type: "image",
      gallery: {
        enabled: true,
      },
    });

    /* magnificPopup video view */
    $(".gen-popup-video").magnificPopup({
      type: "iframe",
    });
  }

  // Meanmenu Activation For Mobile
  function menuActive() {
    // meanmenu
    $("#generic-mobile-menu").meanmenu({
      meanMenuContainer: ".generic-mobile-menu",
      meanScreenWidth: "1199",
    });

    //mobile side menu
    $(".side-toggle").on("click", function () {
      $(".side-info").addClass("info-open");
      $(".offcanvas-overlay").addClass("overlay-open");
    });

    $(".side-info-close,.offcanvas-overlay").on("click", function () {
      $(".side-info").removeClass("info-open");
      $(".offcanvas-overlay").removeClass("overlay-open");
    });

    //sidebar menu
    $(".side-toggle1").on("click", function () {
      $(".side-info1").addClass("info-open1");
      $(".offcanvas-overlay1").addClass("overlay-open1");
    });

    $(".side-info-close1,.offcanvas-overlay1").on("click", function () {
      $(".side-info1").removeClass("info-open1");
      $(".offcanvas-overlay1").removeClass("overlay-open1");
    });
  }

  // Fun Factor Active
  function funfactorActive() {
    // Active Odometer Counter
    jQuery(".odometer").appear(function (e) {
      var odo = jQuery(".odometer");
      odo.each(function () {
        var countNumber = jQuery(this).attr("data-count");
        jQuery(this).html(countNumber);
      });
    });
  }

  $(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction("frontend/element_ready/generic-slider.default", mainSlider);
    elementorFrontend.hooks.addAction("frontend/element_ready/generic-team.default", teamActive);
    elementorFrontend.hooks.addAction("frontend/element_ready/generic-testimonial.default", testimonialActive);
    elementorFrontend.hooks.addAction("frontend/element_ready/generic-instagram.default", instagramActive);
    elementorFrontend.hooks.addAction("frontend/element_ready/generic-skill.default", skillActive);
    elementorFrontend.hooks.addAction("frontend/element_ready/generic-videoinfo.default", videoActive);
    elementorFrontend.hooks.addAction("frontend/element_ready/brand-pro.default", brandActive);
    elementorFrontend.hooks.addAction("frontend/element_ready/generic-el-brand.default", brandActive2);
    elementorFrontend.hooks.addAction("frontend/element_ready/generic-fun-factor.default", funfactorActive);
    elementorFrontend.hooks.addAction("frontend/element_ready/generic-navigation-menu.default", menuActive);
  });
})(jQuery);
