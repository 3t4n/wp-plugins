if((typeof jQuery === 'undefined') && window.jQuery) {
	jQuery = window.jQuery;
} else if((typeof jQuery !== 'undefined') && !window.jQuery) {
	window.jQuery = jQuery;
}
var flg_v1 = 0; 	
function ACP_loadMoreProducts(category_id,limit,elementId,total,request_obj){
	if(flg_v1==1) return;
	jQuery(document).ready(function($){ 
			var root_element = $("#"+elementId).parent();
			if($("#"+elementId).parent().parent().hasClass("lt-tab"))
				root_element = $("#"+elementId).parent().parent(); 
			 
			if((category_id==='undefined')) category_id = 0; 
 			$(root_element).find(".item-products").find(".ik-product-load-more").html("<div align='center'>"+$(".wp-load-icon").html()+"</div>");
			flg_v1 = 1;
			$.ajax({
				url: categoryaccordionpanel.acp_ajax_url, 
				data: {'action':'getMoreProducts',security: categoryaccordionpanel.acp_security,'limit_start' : limit,'total' : total,'category_id' : category_id,'hide_product_price' : request_obj.hide_product_price,'hide_product_title' : request_obj.hide_product_title,'product_price_color' : request_obj.product_price_color,'product_title_color' : request_obj.product_title_color,'price_tab_text_color' : request_obj.price_tab_text_color,'price_tab_background_color' : request_obj.price_tab_background_color,'header_text_color' : request_obj.header_text_color,'header_background_color' : request_obj.header_background_color,'display_title_price_over_image' : request_obj.display_title_price_over_image,'number_of_product_display' : request_obj.number_of_product_display,'vcode' : request_obj.vcode	},
				success:function(data) {     
					ACP_printData(elementId,data,"loadmore");
				},error: function(errorThrown){ console.log(errorThrown);}
			});
	});
}
function ACP_fillProducts(elementId,category_id,request_obj,flg_pr){
	if(flg_v1==1) return;
 	jQuery(document).ready(function($){
	
			if($("#"+elementId).hasClass('pn-active') && flg_pr==1){
				$("#"+elementId).removeClass("pn-active");
				$("#"+elementId).parent().find(".item-products").slideUp(600);
				return;
			}
			
			var root_element = $("#"+elementId).parent();
			if($("#"+elementId).parent().parent().hasClass("lt-tab"))
				root_element = $("#"+elementId).parent().parent();  
			 
			$("#"+elementId).addClass("pn-active");	
			 
			if(flg_pr!=2){
				$("#"+elementId).find(".ik-load-content,.ik-product-no-items").remove();
				$("#"+elementId).find(".ld-price-item-text").html("<div class='ik-load-content'>"+$(".wp-load-icon").html()+"</div>");
			}	 
			if((category_id==='undefined')) category_id = 0; 
 			flg_v1 = 1;
		 	$.ajax({
				url: categoryaccordionpanel.acp_ajax_url,
				security: categoryaccordionpanel.acp_security,
				data: {'action':'getProducts',security: categoryaccordionpanel.acp_security,flg_pr:flg_pr,'category_id' : category_id,'hide_product_price' : request_obj.hide_product_price,'hide_product_title' : request_obj.hide_product_title,'product_price_color' : request_obj.product_price_color,'product_title_color' : request_obj.product_title_color,'price_tab_text_color' : request_obj.price_tab_text_color,'price_tab_background_color' : request_obj.price_tab_background_color,'header_text_color' : request_obj.header_text_color,'header_background_color' : request_obj.header_background_color,'display_title_price_over_image' : request_obj.display_title_price_over_image,'number_of_product_display' : request_obj.number_of_product_display,'vcode' : request_obj.vcode},
				success:function(data) { 
					ACP_printData(elementId,data,"fillproduct"); 
				},error: function(errorThrown){ console.log(errorThrown);}
			});   
	});		

	;(function($){
		$(window).resize(function(){
			$(".wea_content .item-products").each(function(){
				var root_element = $(this).parent();
				var cnt_width = $(this).parent().width();
				$(this).find(".ik-product-item").each(function(){
					if(cnt_width > 1024)		
						$(this).css("width","230px");
					else if(cnt_width <= 1024 && cnt_width > 768)	
						$(this).css("width","19%");
					else if(cnt_width <= 858 && cnt_width > 640)	
						$(this).css("width","24%");
					else if(cnt_width <= 640 && cnt_width > 480)	
						$(this).css("width","32%"); 
					else if(cnt_width <= 480 && cnt_width > 260)	
						$(this).css("width","49%");  
					else if(cnt_width <= 260)	
						$(this).css("width","99%");     
				}); 
			});
		});
	})(jQuery);	
}
function ACP_printData(elementId,data,flg){
	jQuery(document).ready(function($){
		
	  	var root_element = $("#"+elementId).parent();
		if($("#"+elementId).parent().parent().hasClass("lt-tab"))
			root_element = $("#"+elementId).parent().parent(); 
		 
		if(flg=="loadmore"){
			$(root_element).find(".item-products").find(".wp-load-icon").remove();
			$(root_element).find(".item-products").find(".clr").remove();
			$(root_element).find(".item-products").find(".ik-product-load-more").remove(); 
			$(root_element).find(".item-products").append(data).fadeIn(400); 
			$(root_element).find(".item-products").append("<div class='clr'></div>");
		}else{ 
			$("#"+elementId).find(".ik-load-content,.ik-product-no-items").remove();
			//$(root_element).find(".item-products").fadeOut(1);
			//$(root_element).parent().find(".item-products").fadeOut(1);
			$(root_element).find(".item-products").html(data).fadeIn(400);  
		}
		
		var cnt_width = $("#"+elementId).parent().parent().width();
		var prod_item_height = [];
		$(root_element).find(".item-products").find(".ik-product-item").each(function(){		
			
			if(cnt_width > 1024)		
				$(this).css("width","230px");
			else if(cnt_width <= 1024 && cnt_width > 768)	
				$(this).css("width","19%");
			else if(cnt_width <= 858 && cnt_width > 640)	
				$(this).css("width","24%");
			else if(cnt_width <= 640 && cnt_width > 480)	
				$(this).css("width","32%"); 
			else if(cnt_width <= 480 && cnt_width > 260)	
				$(this).css("width","49%");  
			else if(cnt_width <= 260)	
				$(this).css("width","99%");  	 
				
			prod_item_height.push($(this).find(".ik-product-name").height()); 
		}); 
		
		if(cnt_width > 260)
		$(root_element).find(".item-products").find(".ik-product-item").find(".ik-product-name").css("height",(Math.max.apply(Math,prod_item_height))+"px");
		
		flg_v1 = 0;	
	});	  
}
var flg_ms_hover = 0;
function acp_pr_item_image_mousehover(ob_pii){ 
	if(flg_ms_hover == 1) return;
	jQuery(document).ready(function($){
		$(ob_pii).find(".ov-layer").show();  
		$(ob_pii).find(".ov-layer").css("visibility","visible"); 
		$(ob_pii).find(".ov-layer").css("top","40");  
		flg_ms_hover = 1;
		if($.trim($(ob_pii).find(".ov-layer").html())!="")
			$(ob_pii).find(".ov-layer").animate({opacity:0.9,top:0},0); 
		else
			$(ob_pii).find(".ov-layer").animate({opacity:0.5,top:0},0); 
	});
} 
function acp_pr_item_image_mouseout(ob_pii){
	jQuery(document).ready(function($){ 
		$(ob_pii).find(".ov-layer").animate({opacity:0,top:40},0);
		flg_ms_hover = 0;
		$(ob_pii).find(".ov-layer").hide();
		$(ob_pii).find(".ov-layer").css("visibility","hidden");  
	});
}

function acp_cat_tab_ms_out(ob_ms_eff){
	jQuery(document).ready(function($){ 
		$(ob_ms_eff).removeClass("pn-active-bg"); 	
	});
}
function acp_cat_tab_ms_hover(ob_ms_eff){
	jQuery(document).ready(function($){ 
		$(ob_ms_eff).addClass("pn-active-bg"); 	
	});
}