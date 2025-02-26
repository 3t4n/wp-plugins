jQuery(function () {
    midwest_logistics_product_sku_text_field_wrapper = jQuery("._midwest_logistics_product_sku_text_field_wrapper")[0];
    midwest_logistics_product_select = jQuery("#_midwest_logistics_product_select");
    midwest_logistics_product_sku_text_field = jQuery("#_midwest_logistics_product_sku_text_field");
    if (midwest_logistics_product_select.length > 0 && midwest_logistics_product_sku_text_field.length > 0) {
        midwest_logistics_product_select.on("change", function () {
            if (midwest_logistics_product_sku_text_field.length > 0) {
                if (midwest_logistics_product_select.val() === "N") {
                    jQuery(midwest_logistics_product_sku_text_field_wrapper).css('display', 'none');
                }
                if (midwest_logistics_product_select.val() === "Y") {
                    jQuery(midwest_logistics_product_sku_text_field_wrapper).css('display', 'block');
                }
            }
        });
        if (midwest_logistics_product_sku_text_field.length > 0) {
            if (midwest_logistics_product_select.val() === "N") {
                jQuery(midwest_logistics_product_sku_text_field_wrapper).css('display', 'none');
            }
            if (midwest_logistics_product_select.val() === "Y") {
                jQuery(midwest_logistics_product_sku_text_field_wrapper).css('display', 'block');
            }
        }

    }
    MW_bindElements();

    //communication sort tables
   
    //if (jQuery("#productTable").length > 0) {
    //    jQuery(".sortableColumn").each(function (index, item) {
    //        jQuery(item).click(function () {
    //            columnId = jQuery(this).attr("data-id");
    //            if (columnId) {
    //                newURL = replaceUrlParam(window.location.href, "sort", columnId);
    //                window.location = newURL
    //            }

    //        });
            
    //    });
            
    //}

});
function MW_bindElements() {
    jQuery(".midwest-cancel-order-button").on("click",function() {
        button = this;
        currentText = this.innerHTML;
        button.innerHTML = "Processing...";
        button.disabled = true;
        orderId = this.getAttribute("data-order");
        jQuery.ajax({
            type: "POST",
            url: ajaxurl,
            data: { 
                action: 'midwest_logistics_cancel_shop_order' ,
                order: orderId 
            }
        }).done(function( response ) {           
            JsonOB = JSON.parse(response);
            code = JsonOB.code;
            message = JsonOB.message;
            if(code === 500) {
                alert(message);
                button.innerHTML = currentText;
                button.disabled = false;
            } else {   
                window.location = window.location;
            }

        });
        
        
    });
    jQuery(".midwest-send-order-button").on("click",function() {
        button = this;
        currentText = this.innerHTML;
        button.innerHTML = "Processing...";
        button.disabled = true;
        orderId = this.getAttribute("data-order");
        jQuery.ajax({
            type: "POST",
            url: ajaxurl,
            data: { 
                action: 'midwest_logistics_process_shop_order' ,
                order: orderId 
            }
        }).done(function( response ) {           
            JsonOB = JSON.parse(response);
            code = JsonOB.code;
            message = JsonOB.message;
            if(code === 500) {
                alert(message);
                button.innerHTML = currentText;
                button.disabled = false;
            }
            window.location = window.location;

        });
        
        
    });
    jQuery(".midwest-update-product-button").on("click",function() {
        button = this;
        currentText = this.innerHTML;
        button.innerHTML = "Processing...";
        button.disabled = true;
        productid = this.getAttribute("data-product");
        jQuery.ajax({
            type: "POST",
            url: ajaxurl,
            data: { 
                action: 'midwest_logistics_process_product_update_stock' ,
                pid: productid 
            }
        }).done(function( response ) {           
            JsonOB = JSON.parse(response);
            code = JsonOB.code;
            message = JsonOB.message;
            if(code === 500) {
                alert(message);
                button.innerHTML = currentText;
                button.disabled = false;
            } else {
                button.disabled = false;
                button.innerHTML = "Inventory Updated!";
                button.style.backgroundColor = "#28a745";
                button.style.color = "#fff";
                setTimeout(function() {
                    if (window.location.hash) {
                        window.location.href = window.location.href.split('#')[0];
                    } else {
                        window.location.reload();
                    }
                },1000);
            }
            
        });
        
        
    });
}

function replaceUrlParam(url, paramName, paramValue) {
    if (paramValue == null)
        paramValue = '';
    var pattern = new RegExp('\\b(' + paramName + '=).*?(&|$)')
    if (url.search(pattern) >= 0) {
        return url.replace(pattern, '$1' + paramValue + '$2');
    }
    return url + (url.indexOf('?') > 0 ? '&' : '?') + paramName + '=' + paramValue
}
