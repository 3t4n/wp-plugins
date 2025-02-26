jQuery(function($) {
	$('.bscard-newsletter-toggle a').click(function(e) {
		e.preventDefault();
		$(this).parents('.bscard').find('.bscard-newsletter').slideDown('slow').end().find(this).replaceWith( $(this).text() );
	});
	
	$('.bscard-form input[type="text"]').focus(function(e) { this.select(); });
	
	
	$('#posts-per-category').each(function() {
		$('tbody', this).sortable({
			axis: 'y',
			forceHelperSize: true,
			forcePlaceholderSize: true,
			helper: function(e, ui) {
				var $helper = ui.clone();
				$helper.children().each(function(index) {
				  $(this).width(ui.children().eq(index).width())
				});
				
				return $helper;
			},
			start: function(e, ui) {
				var colCount = ui.helper.children().length;
				ui.placeholder.css('visibility','visible').html('<td colspan="' + colCount + '">&nbsp;</td>');
			}
		});
		
		$(this).data('itemIndex', $('tbody tr', this).length);
		$(this).data('itemRow', $('tbody tr:first-child', this).clone());
		
		$('.add-item', this).click(function(e) {
			e.preventDefault();
			
			var itemRow = $(this).parents('table').data('itemRow');
			$(this).parents('table').find('tbody').append(itemRow.clone()).children('tr:last-child').find('input[type="text"],select,textarea').val('');
			
			$(this).parents('table').find('tbody tr:last-child').find('input[type="text"],select,textarea').each(function(e) {
				var itemIndex = $(this).parents('table').data('itemIndex');
				$(this).attr('name', $(this).attr('name').replace('0', itemIndex) );
			});
			
			$(this).parents('table').data('itemIndex', $(this).parents('table').data('itemIndex')+1 );
		});
	});
	
	$('#posts-per-category').delegate('.remove-item', 'click', function(e) {
		e.preventDefault();
		jQuery(this).parent('td').parent('tr').remove();
	});
});