jQuery(document).ready(function($) {



    $('.ac_date_field').datepicker({ dateFormat : 'yy-mm-dd',onSelect: function(datetext){

        var d = new Date(); // for now

        var h = d.getHours();
        h = (h < 10) ? ("0" + h) : h ;

        var m = d.getMinutes();
        m = (m < 10) ? ("0" + m) : m ;

        var s = d.getSeconds();
        s = (s < 10) ? ("0" + s) : s ;

        datetext = datetext + " " + h + ":" + m + ":" + s;

        $(this).val(datetext);
    } });





    $( ".changelog-list, .log-items" ).sortable({ handle: '.move' });
	
	$(document).on('click','.remove',function(){
	
		$(this).parent().remove();
	})	
			
	// $(document).on('click','.add-log',function(){
	//
	// 	$.ajax(
	// 		{
	// 	type: 'POST',
	// 	context: this,
	// 	url:ac_ajax.ac_ajaxurl,
	// 	data: { "action" 	: "ac_ajax_add_new_changelog" },
	// 	success: function(data) {
	// 		$(this).prev('.changelog-list').append(data);
	// 	}
	// 		});
	//
	// })
	
	
	// $(document).on('click','.add-log-item',function(){
	//
	// 	changelog_id = $(this).attr('changelog_id');
	//
	// 	if( changelog_id.length == 0 ) return;
	//
	// 	$.ajax(
	// 		{
	// 	type: 'POST',
	// 	context: this,
	// 	url:ac_ajax.ac_ajaxurl,
	// 	data: {
	// 		"action" 		: "ac_ajax_add_new_changelog_item",
	// 		"changelog_id" 	: changelog_id,
	// 	},
	// 	success: function(data) {
	// 		$(this).prev('.log-items').append(data);
	// 		$('.ac_date_field').datepicker({ dateFormat : 'yy-mm-dd' });
	//
	//
	// 	}
	// 		});
	//
	// })
			
});	







