jQuery(document).ready(function() {	
	jQuery("div.widget_style").jCarouselLite({
		btnPrev: ".previous",
		btnNext: ".next",
		visible: 1,
		afterEnd: function(a) {
			jQuery("a.zoom").attr("href", a[0].firstElementChild);
		}
	});
	jQuery("a[rel^='prettyPhoto']").prettyPhoto({ 
		show_title: false, 
		deeplinking: false,
		social_tools: false,		
		theme: 'light_rounded', 
		counter_separator_label: ' of ',
		allow_resize: true
		});		
});
