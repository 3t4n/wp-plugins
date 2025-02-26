"use strict";
function save_faq_like_deslike(element_this,opreter,q_id){
	"use strict";
	var this_element = element_this;
	var qu_id= q_id;
	var qu_opreter = opreter;
	var data = {
		'action': 'faq_save_rat',
		'q_id': qu_id,   
		'opreter': qu_opreter,   
	};
	jQuery.post(faq_ajax_object.ajax_url, data, function(response) {
		if(qu_opreter == 1){
			jQuery('#like-'+qu_id).html(response);
		}else{
			jQuery('#deslike-'+qu_id).html(response);
		}
	});
	
}

var $ = jQuery.noConflict();
$( document ).ready(function() {
	"use strict";
	var $ = jQuery.noConflict();
	var search_input = $("input#faq_search").outerWidth();
	$("ul#hdTuto_search").width(search_input);
});

