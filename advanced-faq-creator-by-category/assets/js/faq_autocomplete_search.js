"use strict";
jQuery(document).ready(function($){
	"use strict";
	$('#faq_search').keyup(function(e){
		"use strict";
		$('#hdTuto_search').show().html("<li class='list-gpfrm-list'>LOADING</li>");
		e.preventDefault();
		var faq_search = $("#faq_search").val();
		var faq_id = $("#faq_id").val();
		$.ajax({
			type: 'POST',
			url: faq_autocomplete_search.ajax_url, // or example_ajax_obj.ajaxurl if using on frontend
			data: {
				'action': 'faq_autocomplete_search',
				'faq_search' : faq_search,
				'faq_id' : faq_id,
			},

			dataType: 'json',
			success: function(response){
				if(response.error){
					$('#hdTuto_search').hide();
				}else{
					$('#hdTuto_search').show().html(response.data);
				}
			}
		});
	});

	$('body').on('click',function(e){
		"use strict";
		$('#hdTuto_search').hide();
	});

	//fill the input

	$(document).on('click', '.list-gpfrm-list', function(e){
		"use strict";
		e.preventDefault();
		$('#hdTuto_search').hide();
		var fullname = $(this).data('fullname');
		$('#faq_search').val(fullname);
	});
});




// set and reade cookies

jQuery(document).ready(function($){
	"use strict";
	$('.faq_q_link').on('mouseover',function() {
		var faqid = $(this).data('faqid');      
		var catid = $(this).data('catid');      
		var qid = $(this).data('qid');    
		var faq_name = $(this).data('faqname');    
		var cat_name = $(this).data('catname');    
		
		var array_set = {faq_id:faqid , cat_id: catid,faq_name: faq_name,cat_name: cat_name,link_url:window.location.href};
		createCookie(qid,JSON.stringify(array_set),3);
		
		//console.log(document.cookie);
		return true;
	});
	function createCookie(name, value, days) {
		var expires;
		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			expires = "; expires=" + date.toGMTString();
		} else {
			expires = "";
		}
		document.cookie = encodeURIComponent(name) + "="+encodeURIComponent(value)+"; domain=." + 
		location.hostname.split('.').reverse()[1] + "." + 
		location.hostname.split('.').reverse()[0] + "; path=/"
		
		//document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
	}
	
//console.log(document.cookie);	
});