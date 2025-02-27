jQuery(document).ready(function(){
	//Call main  Function
	generate_shortcode();
	 generate_preview();
	//For paragraph blur event
	jQuery( "#lipsum_wli_paragraphs" ).blur(function() {
		 if(jQuery("#lipsum_wli_paragraphs").val()=="" || jQuery("#lipsum_wli_paragraphs").val()==0){
		
                  //jQuery("#lipsum_wli_paragraphs").focus();
		  jQuery("#lipsum_wli_paragraphs").val(5);
		
            }	
		 generate_shortcode();
		 generate_preview();
	});
	
	//For Radio Button click event
	jQuery("input:radio[name=lipsum_wli_length]").click(function(){
		  generate_shortcode();	
		  generate_preview();
	});
	
	//For plaintext checkbox change event
	jQuery('.lipsum_wli_checkbox_plain').change(function() {
		generate_shortcode();
		 generate_preview();
	});
	
	//For all checkbox change event
	jQuery('.lipsum_wli_checkbox_all').change(function() {
		generate_shortcode();
		generate_preview();
		
	});   	
});
//For dyanmic shortcode generation
function generate_shortcode()
{
	 var start_string = "[lorem_ipsum_wli";
	 var end_string = "]";
	 lipsum_wli_paragraph_decoration = '';
	 lipsum_wli_paragraph_links = '';
	 lipsum_wli_paragraph_unorder_list = '';
	 lipsum_wli_paragraph_order_list = '';
	 lipsum_wli_paragraph_description_list = '';
	 lipsum_wli_paragraph_blockquotes = '';
	 lipsum_wli_paragraph_code = '';
	 lipsum_wli_paragraph_headers = '';
	 lipsum_wli_paragraph_capital = '';
	 lipsum_wli_paragraph_prude = '';
	 
	 
	 //For Paragraph Number
	 lipsum_wli_paragraph_number = "paragraphs='"+jQuery("#lipsum_wli_paragraphs").val()+"'";
	
	
	jQuery("#lipsum_wli_paragraphs").keypress(function(event) {
        	return /\d/.test(String.fromCharCode(event.keyCode));
    	});
	 
	 //For Length of Paragraph
	 lipsum_wli_paragraph_length = "length='"+jQuery('input[name=lipsum_wli_length]:checked').val()+"'";
	 
	 //For Plain Textbox Checked
	 if(lipsum_wli_pt.checked){
		 paragraph_plain_text = "text='"+jQuery('input[name="lipsum_wli_pt"]:checked').val()+"'";
		 jQuery("input.lipsum_wli_checkbox_all").attr("disabled", true);
		 
	 }else{
		 paragraph_plain_text = '';
		 jQuery("input.lipsum_wli_checkbox_all").attr("disabled", false);
		 
		 //All The Checkbox checked
		 if(lipsum_wli_decorate.checked){
			 lipsum_wli_paragraph_decoration = "decoration='"+jQuery('input[name="lipsum_wli_decorate"]:checked').val()+"'";
	     }
		 if(lipsum_wli_links.checked){
			 lipsum_wli_paragraph_links = "links='"+jQuery('input[name="lipsum_wli_links"]:checked').val()+"'";
		 }
		 
		 if(lipsum_wli_ul.checked){
			 lipsum_wli_paragraph_unorder_list = "unorder_list='"+jQuery('input[name="lipsum_wli_ul"]:checked').val()+"'";
		 }
		 if(lipsum_wli_ol.checked){
			 lipsum_wli_paragraph_order_list = "order_list='"+jQuery('input[name="lipsum_wli_ol"]:checked').val()+"'";
		 }
		 if(lipsum_wli_dl.checked){
			 lipsum_wli_paragraph_description_list = "description_list='"+jQuery('input[name="lipsum_wli_dl"]:checked').val()+"'";
		 }
		 if(lipsum_wli_bq.checked){
			 lipsum_wli_paragraph_blockquotes = "blockquotes='"+jQuery('input[name="lipsum_wli_bq"]:checked').val()+"'";
		 }
		 if(lipsum_wli_code.checked){
			 lipsum_wli_paragraph_code = "code='"+jQuery('input[name="lipsum_wli_code"]:checked').val()+"'";
		 }
		 if(lipsum_wli_headers.checked){
			 lipsum_wli_paragraph_headers = "headers='"+jQuery('input[name="lipsum_wli_headers"]:checked').val()+"'";
		 }
		 if(lipsum_wli_ac.checked){
			 lipsum_wli_paragraph_capital = "capital='"+jQuery('input[name="lipsum_wli_ac"]:checked').val()+"'";
		 }
		 if(lipsum_wli_pr.checked){
			 lipsum_wli_paragraph_prude = "prude='"+jQuery('input[name="lipsum_wli_pr"]:checked').val()+"'";
		 }
		
	 }
	 //Final Dynamic shortcode generation
	 var final_shortcode =  start_string +" "+lipsum_wli_paragraph_number+" "+lipsum_wli_paragraph_length+" "+lipsum_wli_paragraph_decoration +" " + lipsum_wli_paragraph_links +" "+ lipsum_wli_paragraph_unorder_list +" "+  lipsum_wli_paragraph_order_list +" "+ lipsum_wli_paragraph_description_list  +" "+ lipsum_wli_paragraph_blockquotes +" "+ lipsum_wli_paragraph_code +" "+ lipsum_wli_paragraph_headers +" "+ lipsum_wli_paragraph_capital +" "+ lipsum_wli_paragraph_prude +" "+ paragraph_plain_text +""+ end_string;
	
	 //Final Shortcode Assign to HTML
	 jQuery("#shortcode").html(final_shortcode);
}
//For preview generated text
function generate_preview()
{
	 
	 lipsum_wli_paragraph_plain_text = jQuery('input[name="lipsum_wli_pt"]:checked').val();
	 lipsum_wli_paragraph_number = jQuery("#lipsum_wli_paragraphs").val();
	 jQuery("#lipsum_wli_paragraphs").keypress(function(event) {
        	return /\d/.test(String.fromCharCode(event.keyCode));
    	});
	 lipsum_wli_paragraph_length = jQuery('input[name=lipsum_wli_length]:checked').val();
	 lipsum_wli_paragraph_decoration = jQuery('input[name="lipsum_wli_decorate"]:checked').val();
	 lipsum_wli_paragraph_links = jQuery('input[name="lipsum_wli_links"]:checked').val();
	 lipsum_wli_paragraph_unorder_list = jQuery('input[name="lipsum_wli_ul"]:checked').val();
	 lipsum_wli_paragraph_order_list = jQuery('input[name="lipsum_wli_ol"]:checked').val();
	 lipsum_wli_paragraph_description_list = jQuery('input[name="lipsum_wli_dl"]:checked').val();
	 lipsum_wli_paragraph_blockquotes = jQuery('input[name="lipsum_wli_bq"]:checked').val();
	 lipsum_wli_paragraph_code = jQuery('input[name="lipsum_wli_code"]:checked').val();
	 lipsum_wli_paragraph_headers =jQuery('input[name="lipsum_wli_headers"]:checked').val();
	 lipsum_wli_paragraph_capital = jQuery('input[name="lipsum_wli_ac"]:checked').val();
	 lipsum_wli_paragraph_prude = jQuery('input[name="lipsum_wli_pr"]:checked').val();
	 									
	
	 jQuery.ajax({
	        type : "post",
	
	        url: myAjax.ajaxurl,
	        data: {
	            'action':'lipsum_wli_preview',
	            
	            lipsum_wli_paragraph_number:  lipsum_wli_paragraph_number,
	            lipsum_wli_paragraph_length:  lipsum_wli_paragraph_length,
	            lipsum_wli_paragraph_decoration : lipsum_wli_paragraph_decoration,
	            lipsum_wli_paragraph_links : lipsum_wli_paragraph_links,
	            lipsum_wli_paragraph_unorder_list : lipsum_wli_paragraph_unorder_list,
	            lipsum_wli_paragraph_order_list : lipsum_wli_paragraph_order_list,
	            lipsum_wli_paragraph_description_list : lipsum_wli_paragraph_description_list,
	            lipsum_wli_paragraph_blockquotes : lipsum_wli_paragraph_blockquotes,
	            lipsum_wli_paragraph_code : lipsum_wli_paragraph_code,
	            lipsum_wli_paragraph_headers : lipsum_wli_paragraph_headers,
	            lipsum_wli_paragraph_capital : lipsum_wli_paragraph_capital,
	            lipsum_wli_paragraph_prude : lipsum_wli_paragraph_prude,
	            lipsum_wli_paragraph_plain_text : lipsum_wli_paragraph_plain_text,
	        },
	        success:function(response) {
	            // This outputs the result of the ajax request
	        	jQuery("#lipsum_wli_preview_text").html(response);
	        	jQuery("#lipsum_wli_preview_text").show();
	        },
	        error: function(errorThrown){
	            console.log(errorThrown);
	        }
	    });
}
