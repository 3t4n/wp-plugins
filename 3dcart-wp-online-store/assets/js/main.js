const shift4shop_siteurl = jQuery('#shift4shop_siteurl').val();
const shift4shop_currency = jQuery('#shift4shop_currency').val();

jQuery(function() {

	if(shift4shop_siteurl == null) 
		return;

	if(jQuery('#shift4shop_widget_products').length > 0) {
		var strCatalogIDs = jQuery('#shift4shop_widget_catalogids').val();
		var arrCatalogIDs = strCatalogIDs.split(',');

		shift4shop_get_widget_products(arrCatalogIDs);
		
	}
});


function shift4shop_get_widget_products(arrCatalogIDs) {
	if(arrCatalogIDs.length > 0) {
		jQuery(arrCatalogIDs).each(function(index, catalogId) {
			product = shift4shop_get_product(catalogId);
			if(product != null) {
				var prodTemplate;
				if(product.OnSale == '1') {
					prodTemplate = jQuery('#shift4shop_widget_products_templates .shift4shop_widget_product_saleprice_item').clone();
					jQuery(prodTemplate).find('.shift4shop_widget_product_saleprice').text(shift4shop_currency + parseFloat(product.SalePrice).toFixed(2));
				}
				else {
					prodTemplate = jQuery('#shift4shop_widget_products_templates .shift4shop_widget_product_regularprice_item').clone();
				}
				
				jQuery(prodTemplate).find(' > a').attr('href', product.ProductLink);
				jQuery(prodTemplate).find('.shift4shop_widget_product_img > img').attr('src', shift4shop_siteurl + '/' + product.ThumbnailFile);
				jQuery(prodTemplate).find('.shift4shop_widget_product_img > img').attr('alt', product.Name);
				jQuery(prodTemplate).find('.shift4shop_widget_product_name').text(product.Name);

				jQuery(prodTemplate).find('.shift4shop_widget_product_price').text(shift4shop_currency + parseFloat(product.Price).toFixed(2));

				jQuery(prodTemplate).appendTo('#shift4shop_widget_products');

			}
		});
	}
}


function shift4shop_get_product(catalogId) {
	var product = false;
    jQuery.ajax({
        method: "POST",
        url: shift4shop_siteurl+'/frontapi.asp',
        dataType: 'json',
        type: 'GET',
        cache: false,
        async: false,
        data: {
            productid: catalogId,
            categoryid: -1,
            limit: 1,
            module: 'products',
            offset: 1
        },
        success: function (data) {
        	product = data;
        },
        error: function (objResponse) {
        	product = null;
		}
    });
    return product;
}