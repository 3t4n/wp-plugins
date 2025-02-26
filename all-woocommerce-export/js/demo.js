jQuery(document).ready(function(){
jQuery("#idForm").on('submit', function(){
    var name = jQuery("#dname").val();
jQuery.ajax({
type: 'POST',
url: MyAjax.ajaxurl,
data: {"action": "post_word_count", "dname":name},
success: function(data){
alert(data);
}
});
});
});

jQuery("#idForm").on('submit', function(){
		var searchIDs = jQuery("#idForm input:checkbox:checked").map(function(){			
			var value = jQuery(this).val();
			var name = jQuery(this).attr('name');
			var rel = jQuery(this).attr('rel');
			var stuff = {'name':name,'value':value,'rel':rel,};
			return stuff;
		}).get();
		var tmp = searchIDs;
			jQuery.ajax({
				type: "POST",
				action:  'ajax-script_js',
				url: MyAjax.ajaxurl, //Relative or absolute path to response.php file
				data: {
					"action": "post_word_count", 
					"dname":name
				},
				//data: {search_val:JSON.stringify(searchIDs)},
				success: function(data){
					/*var zz=document.createElement('a');
					var data_type = 'data:application/vnd.ms-excel';
					zz.href = order_file;
					zz.download='order'+'.xlsx';
					zz.click();*/
					alert(data);
				}
			});
    });
