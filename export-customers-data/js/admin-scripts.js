// JavaScript Document
jQuery(document).ready(function($){
	
	
	let checkbox =  $(".export-customer-container .export-field-checkbox");
	let export_data_btn = $(".export-customer-container .export-data-btn");
	let export_data_btn_function = function(){
	
		let checkbox_checked =  $(".export-customer-container .export-field-checkbox:checked");
		if(checkbox_checked.length > 0){
			
			export_data_btn.removeAttr('disabled');
		}else{
			export_data_btn.attr('disabled','disabled');
		} 
	
	};
	
	$(export_data_btn_function);
	checkbox.on("change", function(){
	
		$(export_data_btn_function);
	
	});
		
});		