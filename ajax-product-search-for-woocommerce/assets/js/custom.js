jQuery( document ).ready( function($) {
	
	var currentRequest = null;
	
	jQuery("#pro_search_input").on('input',function(e){
		
		e.stopPropagation();

		var input_val = $(this).val();
		
		if( input_val.length >= $(this).data('min-chars') )
		{
			currentRequest = jQuery.ajax({
				url : pro_search_ajax.pro_search_ajaxurl,
				type : 'post',
				data : {
				action : 'ph_ajax_pro_search',
				keyword : input_val
				},
				beforeSend : function()    {
					if(currentRequest != null) {
						currentRequest.abort();
					}
					
					$('#pro_search_input').css({'background-image': 'url('+ajax_pro_search_loader+')', 'background-repeat': 'no-repeat', 'background-position': 'right center'});
					
					$('.ajax_search_results').hide();
				},
				success : function( response ) 
				{
					var obj = jQuery.parseJSON( response );
					
					var html = '';

					$.each(obj.search_results, function (i,result) {
										
						//console.log( result.value );
						
						var pro_val = result.value.replace(new RegExp(input_val, 'gi'), '<strong>'+input_val+'<\/strong>');
						
						html += '<div class="ajax_search_result" data-pname="' + result.value + '" data-index="' + i + '"><a id="pro-'+ result.id +'" href="'+ result.url +'">' + pro_val + '</a></div>';
					});
					
					$('#pro_search_input').css({'background-image': '', 'background-repeat': 'no-repeat', 'background-position': 'right center'});

					$('.ajax_search_results').html(html).show();
				}
				
			});
			
		}
		else
		{
			
			$('.ajax_search_results').hide();
			
		}
		
	});
	
});
jQuery(document).ready(function($){
   
	$('#pro_search_input').on('keydown',function(e)
	{
		
		var $listItems = $('.ajax_search_result');

		//console.log($listItems);
	
		var key = e.keyCode,
		
			$selected = $listItems.filter('.result_selected'),
			
			$current;

		if ( key != 40 && key != 38 ) return;

		$listItems.removeClass('result_selected');

		if ( key == 40 ) // Down key
		{
			if ( ! $selected.length || $selected.is(':last-child') ) {
				
				$current = $listItems.eq(0);
				
			}
			else {
				
				$current = $selected.next();
				
			}
			
		}
		else if ( key == 38 ) // Up key
		{
			
			if ( ! $selected.length || $selected.is(':first-child') ) {
				
				$current = $listItems.last();
				
			}
			else {
				
				$current = $selected.prev();
				
			}
			
		}
		
		var replace_code = $current.data('pname').replace(/→/g, "&rarr;");
		
		//console.log(sdvfsvd);
		//console.log(data_array);
		
		$('#pro_search_input').val(replace_code);
		
		$current.addClass('result_selected');
		
	});
	
	jQuery('body').bind('click',function(e){
 
		$('.ajax_search_results').hide();

	});
	 
	jQuery("#pro_search_input").bind('click',function(e){
		
		e.stopPropagation();
		
		$('.ajax_search_results').show();
	 
	});

});