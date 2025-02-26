// Must include the swiper slider first!
if (window.Swiper === undefined) {
	console.warn(
		"You must include the Swiper library (http://idangero.us/swiper/) in order for this controller to work."
	);
} else {

	var swiper = (function () {
		var swiperSliders = document.getElementsByClassName(
			"js-spc-swiper-container"
		);

		var swiperData = jQuery('.js-spc-swiper-container').data('carousel-settings');

		for (i = 0; i < swiperSliders.length; i++) {

			var swiperOptions = {
				speed: 500,
				slidesPerView: swiperData.slidesPerViewMobile,
				breakpoints: {
					640: {
						slidesPerView: swiperData.slidesPerViewMobile,
					},
					768: {
						slidesPerView: swiperData.slidesPerViewTablet,
					},
					1024: {
						slidesPerView: swiperData.slidesPerView,
					},
				},
			};

			var slidesPagination = swiperData.pagination;
			if (slidesPagination != null) {
				swiperOptions["pagination"] = {
					type: swiperData.paginationType,
					el: ".spc-swiper-pagination",
					clickable: true
				}
			}

			var slidesNavigation = swiperData.navigation;
			if (slidesNavigation != null) {
				swiperOptions["navigation"] = {
					nextEl: ".spc-carousel-nav-next",
					prevEl: ".spc-carousel-nav-prev"
				}
			}

			var slidesPerColumn = swiperData.perColumn;
			if (slidesPerColumn != null) {
				swiperOptions["slidesPerColumn"] = parseFloat(slidesPerColumn);
			}

			var spaceBetween = swiperData.spaceBetween;
			if (spaceBetween != null) {
				swiperOptions["spaceBetween"] = parseFloat(spaceBetween);
			}
			var speed = swiperData.speed;
			if (speed != null) {
				swiperOptions["speed"] = parseFloat(speed);
			}
			var autoplay = swiperData.autoplay;
			if (autoplay != null) {
				var autoplayValue = autoplay;
				var delay = swiperData.delay
					? parseFloat(swiperData.delay)
					: "4000";
				if (autoplayValue) {
					swiperOptions["autoplay"] = {
						delay: delay
					};
				} else {
					swiperOptions["autoplay"] = false;
				}
			}
			var loop = swiperData.loop;
			if (loop != null) {
				swiperOptions["loop"] = loop;
			}

			var grabCursor = swiperData.grabCursor;
			if (grabCursor != null) {
				swiperOptions["grabCursor"] = grabCursor;
			}

			var effect = swiperData.effect;
			if (effect != null) {
				if (effect === "fade") {
					swiperOptions["effect"] = "fade";
					swiperOptions["fadeEffect"] = {
						crossFade: true
					};
				}
				if (effect === "cube") {
					swiperOptions["effect"] = "cube";
					swiperOptions["cubeEffect"] = {
						slidesPerView: "auto",
						shadow: true,
						slideShadows: true,
						shadowOffset: 20,
						shadowScale: 0.94,
					};

				}
				if (effect === "coverflow") {
					swiperOptions["effect"] = "coverflow";
					swiperOptions["coverflowEffect"] = {
						rotate: 30,
						stretch: 0,
						depth: 100,
						modifier: 1,
						slideShadows: true,
					};
				}
				if (effect === "flip") {
					swiperOptions["effect"] = "flip";
					swiperOptions["flipEffect"] = {
						rotate: 30,
						slideShadows: true,
						grabCursor: true,
					};
				}
				if (effect === "cards") {
					swiperOptions["effect"] = "cards";
					swiperOptions["EffectCards"] = {
						slidesPerView: "auto",
						grabCursor: true,
						slideShadows: true,
						centeredSlides: true,
					};
				}
			}

			new Swiper(swiperSliders[i], swiperOptions);

		}
	})();
}
