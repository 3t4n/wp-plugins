const themerainCore = {
  init: function() {
    this.blockSliderInit();
    this.fancyboxInit();
  },

  blockSlider: function(slider) {
    const data = {
      columns: slider.dataset.columns,
      columnsTablet: slider.dataset.columnsTablet,
      columnsMobile: slider.dataset.columnsMobile,
      space: slider.dataset.space,
      spaceTablet: slider.dataset.spaceTablet,
      spaceMobile: slider.dataset.spaceMobile,
      autoplay: slider.dataset.autoplay,
      loop: slider.dataset.loop,
      center: slider.dataset.center
    }

    const params = {
      slidesPerView: data.columnsMobile,
      spaceBetween: data.spaceMobile,
      centeredSlides: true,
      grabCursor: true,
      autoplay: true,
      loop: true,
      keyboard: {
        enabled: true
      },
      breakpoints: {
        600: {
          slidesPerView: data.columnsTablet,
          spaceBetween: data.spaceTablet
        },
        1024: {
          slidesPerView: data.columns,
          spaceBetween: data.space
        }
      }
    }

    if (!eval(data.autoplay)) {
      delete params.autoplay;
    }

    if (!eval(data.loop)) {
      delete params.loop;
    }

    if (!eval(data.center)) {
      delete params.centeredSlides;
    }

    new Swiper(slider, params);
  },

  blockSliderInit: function() {
    const sliders = document.querySelectorAll('.wp-block-themerain-slider .swiper');
    sliders.forEach(slider => this.blockSlider(slider));
  },

  fancyboxInit: function() {
    const elements = document.querySelectorAll('.entry-content a[href$=".jpg"], .entry-content a[href$=".jpeg"], .entry-content a[href$=".png"], .entry-content a[href$=".webp"], .entry-content a[href$=".avif"], .entry-content a[href$=".gif"], .entry-content a[href$=".mp4"], .entry-content a[href*="youtube"], .entry-content a[href*="vimeo"]');

    elements.forEach(e => {
      e.setAttribute('data-fancybox', 'gallery');
      e.setAttribute('data-no-swup', '');
    });

    Fancybox.assign('[data-fancybox]', {
      closeButton: 'top',
      Thumbs: false,
      Hash: false
    });
  }
};

themerainCore.init();

// Temporary fix for older themes
if (typeof jQuery !== 'undefined') {
  jQuery.fn.themerainBlockSlider = function() {
    themerainCore.blockSliderInit();
  }
}
