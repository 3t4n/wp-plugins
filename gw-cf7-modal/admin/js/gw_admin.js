jQuery('tr.set_selector').hide();  // hide set selector field untill we need it

if (jQuery('#onload_or_click_2').is(':checked')) {
  jQuery('tr.set_selector').show();  // show set selector
}

jQuery('#onload_or_click_2').on('click', function(){

jQuery('tr.set_selector').show();  // show set selector

});


jQuery('#onload_or_click_1').on('click', function(){

jQuery('tr.set_selector').hide();  // hide set selector

});
