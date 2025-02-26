jQuery(document).ready(function(){
	jQuery("#delete_panel").click(function(){
		var id    =jQuery("#panel_id").val();
				 
		jQuery.ajax({
			type: 'GET',
			url: ajaxurl,
			data:{"action":"aTables_delete_content","id":id},
			success:function(data){
				
			}
		});
	});
});