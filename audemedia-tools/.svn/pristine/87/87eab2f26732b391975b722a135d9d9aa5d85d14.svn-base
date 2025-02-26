(function($){
    $(document).ready(function(){
        $("#portfolio_video").hide();
        $("#portfolio_images_info").hide();
		
        
        //interactivity by adding an event listener
        $("#_portfolio_layout").bind("change",function(){
            if ($(this).val()=="featured"){
                $("#portfolio_video").hide();
                $("#portfolio_images_info").hide();
            }else if ($(this).val()=="video"){
                $("#portfolio_video").show();
                $("#portfolio_images_info").hide();
            } else {
               $("#portfolio_video").hide();
               $("#portfolio_images_info").show();
            }
        });
 
        //make sure that these metaboxes appear properly
        if($("#_portfolio_layout").val()=="featured") { 
            $("#portfolio_video").hide();
            $("#portfolio_images_info").hide();
        }else if ($("#_portfolio_layout").val()=="video"){ 
           $("#portfolio_video").show();
           $("#portfolio_images_info").hide();
		} else {  
		 $("#portfolio_video").hide();
         $("#portfolio_images_info").show();
		 }
 
    })
})(jQuery);