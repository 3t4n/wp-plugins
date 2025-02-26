jQuery(document).ready(function($){
	$('.as_woo_owl_add_to_cart_button > #as_woo_owl_ajax_add_to_cart').on('click', function(e){
		e.preventDefault()
		var as_woo_this = $(this);
		var as_woo_get_id = as_woo_this.attr('as_woo_owl_product_id');
		var as_woo_url = as_woo_this.attr('href');
		$('.as_woo_owl_add_to_cart_button > #as_woo_owl_ajax_add_to_cart[as_woo_owl_product_id="'+as_woo_get_id+'"] > span.as_woo_owl_ajax_loader_gif').fadeIn(100);
		$.ajax({
				type: 'POST',
				url: as_woo_ajax.ajaxurl,
				data: {
					action: 'as_woo_owl_add_to_cart',
					as_woo_id: as_woo_get_id
			},
			success: function(data){
					$('.as_woo_owl_add_to_cart_button > #as_woo_owl_ajax_add_to_cart[as_woo_owl_product_id="'+as_woo_get_id+'"] > span.as_woo_owl_ajax_loader_gif').fadeOut(100);	
					$('#as_woo_owl_'+as_woo_get_id+'_new_id').css('display', 'inline-block');


			}
		});
	});
	setTimeout(function(){
		$('.as_woo_pre_load').fadeOut(500);
		$('.as_woo_owl_outer').removeClass('as_def_pre_load');
	}, 400);


	
});