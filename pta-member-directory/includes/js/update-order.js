jQuery(document).ready(function($) {
	$('.pta-categories').sortable({
		items: '.list_item',
		opacity: 0.6,
		cursor: 'move',
		axis: 'y',
		update: function() {
			let order = $(this).sortable('serialize');
			let data = {
				action: 'pta_directory_update_order',
				list_items: order,
				nonce: PTA_MemberAJAX.nonce
			};
			$.ajax({
				url: ajaxurl,
				type: 'POST',
				data: data,
				success: function(response) {
					console.log(response);
				}
			});
		}
	});
});