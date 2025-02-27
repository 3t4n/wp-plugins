(() => {
  window["walkerCoreAccordionBlock"] = (e) => {
    const n = e.replace(/-/gi, "_");
    const attributes = window[`walkerCore_${n}`];
    const blockID = `#walkerCore_${n}`;
    const element = document.querySelector(blockID);

    const accordionItem = element.querySelectorAll(
      ".walker-core-accordion-item-block"
    );

    accordionItem.forEach((item) => {
      const titleWrapper = item.querySelector(
        ".walker-core-accordion__title-wrapper"
      );

      titleWrapper.addEventListener("click", function () {
        const contentEl = this.nextElementSibling;

        if (contentEl) {
          this.classList.toggle("active");
          contentEl.classList.toggle("display-block");
        }
      });
    });
  };

  window["walkerCoreCarouselBlock"] = (e) => {
    const n = e.replace(/-/gi, "_");
    const attributes = window[`walkerCore_${n}`];
    const blockID = `#walkerCore_${n}`;
    const element = document.querySelector(blockID);

    const carouselAttr = {
      init: true,
      loop: attributes.sliderOptions.loop,
      direction: attributes.sliderOptions.direction,
      speed: attributes.sliderOptions.speed,
      centeredSlides: attributes.sliderOptions.centeredSlides,
      slidesPerView: attributes.sliderOptions.slidesPerView,
      spaceBetween: attributes.sliderOptions.spaceBetween,
      navigation: {
        nextEl: `${blockID} .swiper-button-next`,
        prevEl: `${blockID} .swiper-button-prev`,
      },
      pagination: {
        clickable: true,
        el: `${blockID} .swiper-pagination`,
      },
      effect: attributes.sliderOptions.effect,
      breakpoints: {
        400: {
          slidesPerView: 1,
        },
        767: {
          slidesPerView:
            attributes.sliderOptions.slidesPerView <= 2
              ? attributes.sliderOptions.slidesPerView
              : 2,
        },
        1024: {
          slidesPerView:
            attributes.sliderOptions.slidesPerView <= 3
              ? attributes.sliderOptions.slidesPerView
              : 3,
        },
        1180: {
          slidesPerView: attributes.sliderOptions.slidesPerView,
        },
      },
    };

    if (attributes.sliderOptions.autoplay.enabled) {
      carouselAttr.autoplay = { ...attributes.sliderOptions.autoplay };
    } else {
      delete carouselAttr.autoplay;
    }

    let carousel = null;

    if (attributes.layout === "carousel") {
      if (carousel != null) {
        carousel.destroy();
      }

      carousel = new Swiper(
        blockID + ".layout-carousel.walker-core-carousel__swiper-container",
        carouselAttr
      );
    }
  };

  window["walkerCorePostBlock"] = (e) => {
    const n = e.replace(/-/gi, "_");
    const attributes = window[`walkerCore_${n}`];
    const blockID = `#walkerCore_${n}`;
    const element = document.querySelector(blockID);

    const carouselAttr = {
      init: true,
      loop: attributes.sliderOptions.loop,
      direction: attributes.sliderOptions.direction,
      speed: attributes.sliderOptions.speed,
      centeredSlides: attributes.sliderOptions.centeredSlides,
      slidesPerView: attributes.sliderOptions.slidesPerView,
      spaceBetween: attributes.sliderOptions.spaceBetween,
      navigation: {
        nextEl: `${blockID} .swiper-button-next`,
        prevEl: `${blockID} .swiper-button-prev`,
      },
      pagination: {
        clickable: true,
        el: `${blockID} .swiper-pagination`,
      },
      effect: attributes.sliderOptions.effect,
      breakpoints: {
        400: {
          slidesPerView: 1,
        },
        767: {
          slidesPerView:
            attributes.sliderOptions.slidesPerView <= 2
              ? attributes.sliderOptions.slidesPerView
              : 2,
        },
        1024: {
          slidesPerView:
            attributes.sliderOptions.slidesPerView <= 3
              ? attributes.sliderOptions.slidesPerView
              : 3,
        },
        1180: {
          slidesPerView: attributes.sliderOptions.slidesPerView,
        },
      },
    };

    if (attributes.sliderOptions.autoplay.enabled) {
      carouselAttr.autoplay = { ...attributes.sliderOptions.autoplay };
    } else {
      delete carouselAttr.autoplay;
    }

    let carousel = null;

    if (attributes.layout === "carousel") {
      if (carousel != null) {
        carousel.destroy();
      }

      const slides = element.querySelectorAll(".wp-block-post");

      slides.forEach((slide) => {
        if (!slide.classList.contains("swiper-slide")) {
          slide.classList.add("swiper-slide"); // Add your custom class here
        }
      });

      carousel = new Swiper(
        blockID + ".layout-carousel .walker-core-post__swiper-container",
        carouselAttr
      );
    }
  };
})();
