var swiper = new Swiper('.swiper-container', {
	  //direction: 'vertical',
	  simulateTouch: false,
	  autoHeight:true,
		  navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev', 
		  },
		})
		jQuery("#datepicker").datepicker({
			dateFormat: "yy-mm-dd"
			});