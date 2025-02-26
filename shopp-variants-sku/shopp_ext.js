jQuery(document).ready(function(){
	
	jQuery(".variations select.options").change(function(){
		if(typeof(var_data) === 'undefined') return false;
		
		var key = jQuery.map(jQuery(".variations select.options"), function(el, i){			
			return jQuery(el).val();
		}).sort(sortNumber).join(",");;

		if(var_data[key]){
			jQuery("#am-sku").text(var_data[key].sku);
		} else {
			jQuery("#am-sku").text(def_sku);
		}
	})
	
})
function sortNumber(a,b) {
    return a - b;
}