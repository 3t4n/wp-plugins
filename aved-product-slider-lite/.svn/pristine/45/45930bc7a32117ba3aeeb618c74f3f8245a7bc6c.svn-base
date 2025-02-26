jQuery(document).ready(function($)
{

	// Admin adding slider functions (ASF)
	

	// Functions //
	var adding_slide_by_product = function(id)
	{
		var text = "<div class='slide'><label>Product ID: <input type='text' name='options[slides][slide_id_"+id+"]' value placeholder='Input ID Product' /> <a class='remove_id'>X</a></label></div>";
		$('#options_product_id .list-slides').append(text);
	}
	// End functions //


	// Adding slide by product id
	$('body').on( 'click','#adding_slide_pr_id', function(){
		var incr = $('#main_increment').val();
		$('#main_increment').val(parseInt(incr)+1);
		adding_slide_by_product( parseInt(incr) );
	});
	// End adding slider by product id

	// Removed element
	$('body').on('click', 'a.remove_id', function(){
		$(this).parent().remove();
	});
	// End removed element


	// Select functions
	$('body').on('change','[name="options[slider_type]"]', function(){
		$('#options_product_id').attr('hidden_s','true');
		$('#options_product_category').attr('hidden_s','true');
		$('#options_product_page_category').attr('hidden_s','true');
		var attr  = $(this).attr('value');
		switch (attr){
			case '1' :
				$('#options_product_id').attr('hidden_s','false');
			 break;
			case '2':
				$('#options_product_category').attr('hidden_s','false');
			break;
			case '3':
				$('#options_product_page_category').attr('hidden_s','false');
			break;
			case '4':
				$('#options_product_viewed').attr('hidden_s','false');
			break;
		}
	});
	// End Select functions 
	// End ASF


	// Editor functions 
	$('body').on('click','#editor_close',function()
	{
		$('div.editor').remove();
	});
	// Edit slider
	$('body').on('click','.edit-slider',function()
	{
		var id = $(this).attr('data-id');
		var data = {
			action: 'AVS_edit_slider',
			slider_id: id
		};
		jQuery.post( ajaxurl, data, function(response) {
			$('#main-set-avs').append(response);
		});

	});

	// Delete slider
	$('body').on('click','.delete-slider',function()
	{
		$(this).parent().parent().parent().remove();
		var id = $(this).attr('data-id');
		var data = {
			action: 'AVS_delete_slider',
			slider_id: id
		};
		jQuery.post( ajaxurl, data, function(response) {
			$('.message-section').append('<div class="col-lg-8 message-box-error"><h4>Delted</h4></div>');

		});
	});

	// End Editor functions 
});