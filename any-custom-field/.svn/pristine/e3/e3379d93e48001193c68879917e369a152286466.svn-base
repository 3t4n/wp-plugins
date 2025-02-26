function showcode(code){
jQuery('#'+code).toggle();
	}


jQuery(document).ready( function () {
jQuery('.show_hide').click( function () {

	var rel = jQuery(this).attr('rel');
	console.log(jQuery('#'+rel+':visible').length);
	jQuery('#'+rel).toggle();
	//console.log(jQuery('#'+rel+':visible').length);
	if(jQuery('#'+rel+':visible').length == 1){

			jQuery(this).text('Hide');
			//console.log('#anc_hidden_'+rel);
			jQuery('#anc_hidden_'+rel).val('1');
		} else {
			jQuery(this).text('Show');
			//console.log('#anc_hidden_'+rel);
			jQuery('#anc_hidden_'+rel).val('0');

			}

});

});

jQuery(document).ready( function (){
	jQuery('#add_social_link').click( function (){

var new_one = jQuery('.new_one_social').length;
if(new_one < 99) {
 if(new_one !=0) {
	for(var i=1;i<100;i++){
		var check_id = jQuery('#table_social #anc_social_custom_'+i+' ').attr('data-id');
		//console.log(check_id);
		if(check_id == undefined || check_id == "") {
				data_id = i;
				break;
		}
	}
		console.log(data_id);
		var add_new = '<tr><td><input type="text" id="anc_social_custom_label'+parseInt(data_id)+'" name="social[label][]" data-id="'+parseInt(data_id)+'" class="" value="" size="35" placeholder="Your label">: </td><td><input type="text" id="anc_social_custom_'+parseInt(data_id)+'" name="social[value][]" data-id="'+parseInt(data_id)+'" class="new_one_social" value="" size="35" placeholder="Your value"> ex: Custom link,text etc. </td></tr>';
 } else {
		var add_new = '<tr><td><input type="text" id="anc_social_custom_label1" name="social[label][]" data-id="1" class="" value="" size="35" placeholder="Your label">: </td><td><input type="text" id="anc_social_custom_1" name="social[value][]" data-id="1" class="new_one_social" value="" size="35" placeholder="Your value"> ex: Custom link,text etc.</td></tr>';

 }
		jQuery('#table_social tr:last-child').after(add_new);
}
	});


	jQuery('#add_general_link').click( function (){

var new_one = jQuery('.new_one_general').length;
if(new_one < 99) {
   if(new_one !=0) {

	for(var i=1;i<100;i++){
			var check_id = jQuery('#table_general #anc_general_custom_'+i+' ').attr('data-id');
			//console.log(check_id);
			if(check_id == undefined || check_id == "") {
					data_id = i;
					break;
				}
	}
		console.log(data_id);
		var add_new = '<tr><td><input type="text" id="anc_general_custom_label'+parseInt(data_id)+'" name="general[label][]" data-id="'+parseInt(data_id)+'" class="" value="" size="35" placeholder="Your label">: </td><td><input type="text" id="anc_general_custom_'+parseInt(data_id)+'" name="general[value][]" data-id="'+parseInt(data_id)+'" class="new_one_general" value="" size="35" placeholder="Your value"> ex: Custom link,text etc. </td></tr>';
	} else {
		var add_new = '<tr><td><input type="text" id="anc_general_custom_label1" name="general[label][]" data-id="1" class="" value="" size="35" placeholder="Your label">: </td><td><input type="text" id="anc_general_custom_1" name="general[value][]" data-id="1" class="new_one_general" value="" size="35" placeholder="Your value"> ex: Custom link,text etc.</td></tr>';

	}
			jQuery('#table_general tr:last-child').after(add_new);
}
	});


jQuery('#add_link_link').click( function (){
var new_one = jQuery('.new_link_social').length;
	if(new_one < 99) {
		if(new_one !=0) {
			for(var i=1;i<100;i++){
					var check_id = jQuery('#table_link #anc_link_custom_'+i+' ').attr('data-id');
					//console.log(check_id);
					if(check_id == undefined || check_id == "") {
							data_id = i;
							break;
						}
				}
				console.log(data_id);
				var add_new = '<tr><td><input type="text" id="anc_link_custom_label'+parseInt(data_id)+'" name="custom[label][]" data-id="'+parseInt(data_id)+'" class="" value="" placeholder="Your label" size="35">   :    </td><td>' +
				'<input type="text" id="anc_link_custom_'+parseInt(data_id)+'" name="custom[value][]" data-id="'+parseInt(data_id)+'" class="new_link_social" value="" size="35" placeholder="Your value"> ex: Custom link,text etc. </td></tr>';
			} else {
			var add_new = '<tr><td><input type="text" id="anc_link_custom_label1" name="custom[label][]" data-id="1" class="" value="" size="35" value="" placeholder="Your label">   : </td><td><input type="text" id="anc_link_custom_1" name="custom[value][]" data-id="1" class="new_link_social" value="" placeholder="Your value" size="35"> ex: Custom link,text etc.</td></tr>';

			}

	jQuery('#table_link tr:last-child').after(add_new);
	}
});


	jQuery('.delete_row').click( function () {

			jQuery(this).parents('tr').fadeOut( function () {
								jQuery(this).remove();
				});
	});
});
