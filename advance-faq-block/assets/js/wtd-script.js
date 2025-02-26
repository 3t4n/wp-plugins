// jquery strict methood
jQuery(document).ready(function($) {
	"use strict";
	// jquery code here

	$(document).ready(function(){
		$(document).on('click', '.wtd-single-faq-wrap .wtd-faq-title', function(e){
			$(this).toggleClass('active');

			if($(this).hasClass('active')){
				$(this).parent().find('.wtd-faq-icon').html(`<svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M5.66699 6.04729V0.333008H7.33366V6.04729H12.3337V7.95206H7.33366V13.6663H5.66699V7.95206H0.666992V6.04729H5.66699Z" fill="#848383"/>
				</svg>`);

			}else{
				$(this).parent().find('.wtd-faq-icon').html(`<svg width="13" height="2" viewBox="0 0 13 2" fill="none" xmlns="http://www.w3.org/2000/svg">
				<rect x="0.666992" y="0.0478516" width="11.6667" height="1.90476" fill="#848383"/>
				</svg>`);

			}
			$(this).next('.wtd-faq-content').slideToggle();
		});

	});

});


