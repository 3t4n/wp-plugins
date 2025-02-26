(function( $ ) {
  'use strict';
  
    /**
	   *	this file is included for functionalility of admin main page
	   *
	   * @since    1.0.0
	   */	

  $(document).ready(function() {
    
    $(".ciwcamp-menu-btn").click(function(){

      var ciwcamp_href = $(this).attr('href');

       var ciwcamp_active_tab_data = {
            'action' : 'ciwcamp_current_active_action',
           'ciwcamp_href': ciwcamp_href,
        };
        jQuery.post(ciwcamp_ajax_object.ciwcamp_ajax_url, ciwcamp_active_tab_data, function(response)
        {

        });
     
    });

    var ciwcamp_active_tab = $("#ciwcamp-active-data").val();

  if(ciwcamp_active_tab=="ciwcamp-dashboard")
  {
    $("#ciwcamp-dashboard").css("display", "inline");
    $("#ciwcamp-affiliates").css("display", "none");
    $("#ciwcamp-withdraw").css("display", "none");
    $("#ciwcamp-sales").css("display", "none");
    $("#ciwcamp-commission").css("display", "none");
    $("#ciwcamp-payments").css("display", "none");
    $("#ciwcamp-settings").css("display", "none");
    $("#ciwcamp-pro").css("display", "none");
    
    $("#ciwcamp-dashboard-btn").addClass("active");
    $("#ciwcamp-affiliates-btn").removeClass("active");
    $("#ciwcamp-withdraw-btn").removeClass("active");
    $("#ciwcamp-sales-btn").removeClass("active");
    $("#ciwcamp-commission-btn").removeClass("active");
    $("#ciwcamp-payments-btn").removeClass("active");
    $("#ciwcamp-settings-btn").removeClass("active");
    $("#ciwcamp-pro-btn").removeClass("active");
  }
  else if(ciwcamp_active_tab=="ciwcamp-affiliates")
  {
    $("#ciwcamp-dashboard").css("display", "none");
    $("#ciwcamp-affiliates").css("display", "inline");
    $("#ciwcamp-withdraw").css("display", "none");
    $("#ciwcamp-sales").css("display", "none");
    $("#ciwcamp-commission").css("display", "none");
    $("#ciwcamp-payments").css("display", "none");
    $("#ciwcamp-settings").css("display", "none");
    $("#ciwcamp-affiliate-details").css("display", "none"); 
    $("#ciwcamp-pro").css("display", "none");    
    
    $("#ciwcamp-dashboard-btn").removeClass("active");
    $("#ciwcamp-affiliates-btn").addClass("active");
    $("#ciwcamp-withdraw-btn").removeClass("active");
    $("#ciwcamp-sales-btn").removeClass("active");
    $("#ciwcamp-commission-btn").removeClass("active");
    $("#ciwcamp-payments-btn").removeClass("active");
    $("#ciwcamp-settings-btn").removeClass("active");
    $("#ciwcamp-pro-btn").removeClass("active");
  }

  else if(ciwcamp_active_tab=="ciwcamp-withdraw")
  {
    $("#ciwcamp-dashboard").css("display", "none");
    $("#ciwcamp-affiliates").css("display", "none");
    $("#ciwcamp-withdraw").css("display", "inline");
    $("#ciwcamp-sales").css("display", "none");
    $("#ciwcamp-commission").css("display", "none");
    $("#ciwcamp-payments").css("display", "none");
    $("#ciwcamp-settings").css("display", "none");
    $("#ciwcamp-affiliate-details").css("display", "none"); 
    $("#ciwcamp-pro").css("display", "none");    

    $("#ciwcamp-dashboard-btn").removeClass("active");
    $("#ciwcamp-affiliates-btn").removeClass("active");
    $("#ciwcamp-withdraw-btn").addClass("active");
    $("#ciwcamp-sales-btn").removeClass("active");
    $("#ciwcamp-commission-btn").removeClass("active");
    $("#ciwcamp-payments-btn").removeClass("active");
    $("#ciwcamp-settings-btn").removeClass("active");
    $("#ciwcamp-pro-btn").removeClass("active");
  }
  else if(ciwcamp_active_tab=="ciwcamp-sales")
  {
    $("#ciwcamp-dashboard").css("display", "none");
    $("#ciwcamp-affiliates").css("display", "none");
    $("#ciwcamp-withdraw").css("display", "none");
    $("#ciwcamp-sales").css("display", "inline");
    $("#ciwcamp-commission").css("display", "none");
    $("#ciwcamp-payments").css("display", "none");
    $("#ciwcamp-settings").css("display", "none");
    $("#ciwcamp-affiliate-details").css("display", "none");  
    $("#ciwcamp-pro").css("display", "none");   
    
    $("#ciwcamp-dashboard-btn").removeClass("active");
    $("#ciwcamp-affiliates-btn").removeClass("active");
    $("#ciwcamp-withdraw-btn").removeClass("active");
    $("#ciwcamp-sales-btn").addClass("active");  
    $("#ciwcamp-commission-btn").removeClass("active");
    $("#ciwcamp-payments-btn").removeClass("active");
    $("#ciwcamp-settings-btn").removeClass("active");
    $("#ciwcamp-pro-btn").removeClass("active");
  }
  else if(ciwcamp_active_tab=="ciwcamp-commission")
  {
    $("#ciwcamp-dashboard").css("display", "none");
    $("#ciwcamp-affiliates").css("display", "none");
    $("#ciwcamp-withdraw").css("display", "none");
    $("#ciwcamp-sales").css("display", "none");
    $("#ciwcamp-commission").css("display", "inline");
    $("#ciwcamp-payments").css("display", "none");
    $("#ciwcamp-settings").css("display", "none");
    $("#ciwcamp-affiliate-details").css("display", "none");    
    $("#ciwcamp-pro").css("display", "none");     
    
    $("#ciwcamp-dashboard-btn").removeClass("active");
    $("#ciwcamp-affiliates-btn").removeClass("active");
    $("#ciwcamp-withdraw-btn").removeClass("active");
    $("#ciwcamp-sales-btn").removeClass("active");
    $("#ciwcamp-commission-btn").addClass("active");
    $("#ciwcamp-payments-btn").removeClass("active");
    $("#ciwcamp-settings-btn").removeClass("active");
    $("#ciwcamp-pro-btn").removeClass("active");
  }

  else if(ciwcamp_active_tab=="ciwcamp-comman-commission")
  {
    $("#ciwcamp-dashboard").css("display", "none");
    $("#ciwcamp-affiliates").css("display", "none");
    $("#ciwcamp-withdraw").css("display", "none");
    $("#ciwcamp-sales").css("display", "none");
    $("#ciwcamp-commission").css("display", "inline");
    $("#ciwcamp-payments").css("display", "none");
    $("#ciwcamp-settings").css("display", "none");
    $("#ciwcamp-affiliate-details").css("display", "none");    
    $("#ciwcamp-pro").css("display", "none");     
    
    $("#ciwcamp-dashboard-btn").removeClass("active");
    $("#ciwcamp-affiliates-btn").removeClass("active");
    $("#ciwcamp-withdraw-btn").removeClass("active");
    $("#ciwcamp-sales-btn").removeClass("active");
    $("#ciwcamp-commission-btn").addClass("active");
    $("#ciwcamp-payments-btn").removeClass("active");
    $("#ciwcamp-settings-btn").removeClass("active");
    $("#ciwcamp-pro-btn").removeClass("active");
  }
  else if(ciwcamp_active_tab=="ciwcamp-payments")
  {
    $("#ciwcamp-dashboard").css("display", "none");
    $("#ciwcamp-affiliates").css("display", "none");
    $("#ciwcamp-withdraw").css("display", "none");
    $("#ciwcamp-sales").css("display", "none");
    $("#ciwcamp-commission").css("display", "none");
    $("#ciwcamp-payments").css("display", "inline");
    $("#ciwcamp-settings").css("display", "none");
    $("#ciwcamp-affiliate-details").css("display", "none");
    $("#ciwcamp-pro").css("display", "none");          
    
    $("#ciwcamp-dashboard-btn").removeClass("active");
    $("#ciwcamp-affiliates-btn").removeClass("active");
    $("#ciwcamp-withdraw-btn").removeClass("active");
    $("#ciwcamp-sales-btn").removeClass("active");
    $("#ciwcamp-commission-btn").removeClass("active");
    $("#ciwcamp-payments-btn").addClass("active");
    $("#ciwcamp-settings-btn").removeClass("active");
    $("#ciwcamp-pro-btn").removeClass("active");
  }
  else if(ciwcamp_active_tab=="ciwcamp-settings")
  {
    $("#ciwcamp-dashboard").css("display", "none");
    $("#ciwcamp-affiliates").css("display", "none");
    $("#ciwcamp-withdraw").css("display", "none");
    $("#ciwcamp-sales").css("display", "none");
    $("#ciwcamp-commission").css("display", "none");
    $("#ciwcamp-payments").css("display", "none");
    $("#ciwcamp-settings").css("display", "inline");
    $("#ciwcamp-affiliate-details").css("display", "none"); 
    $("#ciwcamp-pro").css("display", "none");         
    
    $("#ciwcamp-settings-btn").removeClass("active");
    $("#ciwcamp-affiliates-btn").removeClass("active");
    $("#ciwcamp-withdraw-btn").removeClass("active");
    $("#ciwcamp-sales-btn").removeClass("active");
    $("#ciwcamp-commission-btn").removeClass("active");
    $("#ciwcamp-payments-btn").removeClass("active");
    $("#ciwcamp-settings-btn").addClass("active");
    $("#ciwcamp-pro-btn").removeClass("active");
  }
  else if(ciwcamp_active_tab=="ciwcamp-pro")
  {
    $("#ciwcamp-dashboard").css("display", "none");
    $("#ciwcamp-affiliates").css("display", "none");
    $("#ciwcamp-withdraw").css("display", "none");
    $("#ciwcamp-sales").css("display", "none");
    $("#ciwcamp-commission").css("display", "none");
    $("#ciwcamp-payments").css("display", "none");
    $("#ciwcamp-settings").css("display", "none");
    $("#ciwcamp-affiliate-details").css("display", "none"); 
    $("#ciwcamp-pro").css("display", "inline");         
    
    $("#ciwcamp-settings-btn").removeClass("active");
    $("#ciwcamp-affiliates-btn").removeClass("active");
    $("#ciwcamp-withdraw-btn").removeClass("active");
    $("#ciwcamp-sales-btn").removeClass("active");
    $("#ciwcamp-commission-btn").removeClass("active");
    $("#ciwcamp-payments-btn").removeClass("active");
    $("#ciwcamp-settings-btn").removeClass("active");
    $("#ciwcamp-pro-btn").addClass("active");
  }
  else
  {
    $("#ciwcamp-dashboard").css("display", "inline");
      $("#ciwcamp-affiliates").css("display", "none");
      $("#ciwcamp-withdraw").css("display", "none");
      $("#ciwcamp-sales").css("display", "none");
      $("#ciwcamp-commission").css("display", "none");
      $("#ciwcamp-payments").css("display", "none");
      $("#ciwcamp-settings").css("display", "none");
      $("#ciwcamp-affiliate-details").css("display", "none");
      $("#ciwcamp-pro").css("display", "none");       
      
      $("#ciwcamp-dashboard-btn").addClass("active");
      $("#ciwcamp-affiliates-btn").removeClass("active");
      $("#ciwcamp-withdraw-btn").removeClass("active");
      $("#ciwcamp-sales-btn").removeClass("active");
      $("#ciwcamp-commission-btn").removeClass("active");
      $("#ciwcamp-payments-btn").removeClass("active");
      $("#ciwcamp-settings-btn").removeClass("active");
      $("#ciwcamp-pro-btn").removeClass("active");
  }

  $("#ciwcamp-dashboard-btn").click(function(e){
      e.preventDefault();
    $("#ciwcamp-dashboard").css("display", "inline");
    $("#ciwcamp-affiliates").css("display", "none");
    $("#ciwcamp-withdraw").css("display", "none");
    $("#ciwcamp-sales").css("display", "none");
    $("#ciwcamp-commission").css("display", "none");
    $("#ciwcamp-payments").css("display", "none");
    $("#ciwcamp-settings").css("display", "none");
    $("#ciwcamp-affiliate-details").css("display", "none");
    $("#ciwcamp-pro").css("display", "none");  
 
    $("#ciwcamp-dashboard-btn").addClass("active");
    $("#ciwcamp-affiliates-btn").removeClass("active");
    $("#ciwcamp-withdraw-btn").removeClass("active");
    $("#ciwcamp-sales-btn").removeClass("active");
    $("#ciwcamp-commission-btn").removeClass("active");
    $("#ciwcamp-payments-btn").removeClass("active");
    $("#ciwcamp-settings-btn").removeClass("active");
    $("#ciwcamp-pro-btn").removeClass("active");
  });

  $("#ciwcamp-affiliates-btn").click(function(e){
      e.preventDefault();
    $("#ciwcamp-dashboard").css("display", "none");
    $("#ciwcamp-affiliates").css("display", "inline");
    $("#ciwcamp-withdraw").css("display", "none");
    $("#ciwcamp-sales").css("display", "none");
    $("#ciwcamp-commission").css("display", "none");
    $("#ciwcamp-payments").css("display", "none");
    $("#ciwcamp-settings").css("display", "none");
    $("#ciwcamp-affiliate-details").css("display", "none");
    $("#ciwcamp-pro").css("display", "none");       
       
    $("#ciwcamp-dashboard-btn").removeClass("active");
    $("#ciwcamp-affiliates-btn").addClass("active");
    $("#ciwcamp-withdraw-btn").removeClass("active");
    $("#ciwcamp-sales-btn").removeClass("active");
    $("#ciwcamp-commission-btn").removeClass("active");  
    $("#ciwcamp-payments-btn").removeClass("active");
    $("#ciwcamp-settings-btn").removeClass("active");
    $("#ciwcamp-pro-btn").removeClass("active");
  });

  $("#ciwcamp-withdraw-btn").click(function(e){
      e.preventDefault();
    $("#ciwcamp-dashboard").css("display", "none");
    $("#ciwcamp-affiliates").css("display", "none");
    $("#ciwcamp-withdraw").css("display", "inline");
    $("#ciwcamp-sales").css("display", "none");
    $("#ciwcamp-commission").css("display", "none");
    $("#ciwcamp-payments").css("display", "none");
    $("#ciwcamp-settings").css("display", "none");
    $("#ciwcamp-affiliate-details").css("display", "none"); 
    $("#ciwcamp-pro").css("display", "none");      
    
    $("#ciwcamp-dashboard-btn").removeClass("active");
    $("#ciwcamp-affiliates-btn").removeClass("active");
    $("#ciwcamp-withdraw-btn").addClass("active");
    $("#ciwcamp-sales-btn").removeClass("active");
    $("#ciwcamp-commission-btn").removeClass("active");
    $("#ciwcamp-payments-btn").removeClass("active");
    $("#ciwcamp-settings-btn").removeClass("active");
    $("#ciwcamp-pro-btn").removeClass("active");
  });

  $("#ciwcamp-sales-btn").click(function(e){
      e.preventDefault();
    $("#ciwcamp-dashboard").css("display", "none");
    $("#ciwcamp-affiliates").css("display", "none");
    $("#ciwcamp-withdraw").css("display", "none");
    $("#ciwcamp-sales").css("display", "inline");
    $("#ciwcamp-commission").css("display", "none");
    $("#ciwcamp-payments").css("display", "none");
    $("#ciwcamp-settings").css("display", "none");
    $("#ciwcamp-affiliate-details").css("display", "none"); 
    $("#ciwcamp-pro").css("display", "none");      
    
    $("#ciwcamp-dashboard-btn").removeClass("active");
    $("#ciwcamp-affiliates-btn").removeClass("active");
    $("#ciwcamp-withdraw-btn").removeClass("active");
    $("#ciwcamp-sales-btn").addClass("active");
    $("#ciwcamp-commission-btn").removeClass("active");
    $("#ciwcamp-payments-btn").removeClass("active");
    $("#ciwcamp-settings-btn").removeClass("active");
    $("#ciwcamp-pro-btn").removeClass("active");
  });

  $("#ciwcamp-commission-btn").click(function(e){
      e.preventDefault();
    $("#ciwcamp-dashboard").css("display", "none");
    $("#ciwcamp-affiliates").css("display", "none");
    $("#ciwcamp-withdraw").css("display", "none");
    $("#ciwcamp-sales").css("display", "none");
    $("#ciwcamp-commission").css("display", "inline");
    $("#ciwcamp-payments").css("display", "none");
    $("#ciwcamp-settings").css("display", "none");
    $("#ciwcamp-affiliate-details").css("display", "none"); 
    $("#ciwcamp-pro").css("display", "none");      
    
    $("#ciwcamp-dashboard-btn").removeClass("active");
    $("#ciwcamp-affiliates-btn").removeClass("active");
    $("#ciwcamp-withdraw-btn").removeClass("active");
    $("#ciwcamp-sales-btn").removeClass("active");
    $("#ciwcamp-commission-btn").addClass("active");
    $("#ciwcamp-payments-btn").removeClass("active");
    $("#ciwcamp-settings-btn").removeClass("active");
    $("#ciwcamp-pro-btn").removeClass("active");
  }); 

  $("#ciwcamp-payments-btn").click(function(e){
      e.preventDefault();
    $("#ciwcamp-dashboard").css("display", "none");
    $("#ciwcamp-affiliates").css("display", "none");
    $("#ciwcamp-withdraw").css("display", "none");
    $("#ciwcamp-sales").css("display", "none");
    $("#ciwcamp-commission").css("display", "none");    
    $("#ciwcamp-payments").css("display", "inline");
    $("#ciwcamp-settings").css("display", "none");
    $("#ciwcamp-affiliate-details").css("display", "none");
    $("#ciwcamp-pro").css("display", "none");           
    
    $("#ciwcamp-dashboard-btn").removeClass("active");
    $("#ciwcamp-affiliates-btn").removeClass("active");
    $("#ciwcamp-withdraw-btn").removeClass("active");
    $("#ciwcamp-sales-btn").removeClass("active");
    $("#ciwcamp-commission-btn").removeClass("active");
    $("#ciwcamp-payments-btn").addClass("active");
    $("#ciwcamp-settings-btn").removeClass("active");
    $("#ciwcamp-pro-btn").removeClass("active");
  }); 

  $("#ciwcamp-settings-btn").click(function(e){
      e.preventDefault();
    $("#ciwcamp-dashboard").css("display", "none");
    $("#ciwcamp-affiliates").css("display", "none");
    $("#ciwcamp-withdraw").css("display", "none");
    $("#ciwcamp-sales").css("display", "none");
    $("#ciwcamp-commission").css("display", "none");
    $("#ciwcamp-payments").css("display", "none");
    $("#ciwcamp-settings").css("display", "inline");
    $("#ciwcamp-affiliate-details").css("display", "none"); 
    $("#ciwcamp-pro").css("display", "none");  

    $("#ciwcamp-settings-btn").removeClass("active");
    $("#ciwcamp-affiliates-btn").removeClass("active");
    $("#ciwcamp-withdraw-btn").removeClass("active");
    $("#ciwcamp-sales-btn").removeClass("active");
    $("#ciwcamp-commission-btn").removeClass("active");
    $("#ciwcamp-payments-btn").removeClass("active");
    $("#ciwcamp-settings-btn").addClass("active");
    $("#ciwcamp-pro-btn").removeClass("active");
  }); 

  $("#ciwcamp-comman-commission-btn").click(function(e){
      e.preventDefault();
    $("#ciwcamp-dashboard").css("display", "none");
    $("#ciwcamp-affiliates").css("display", "none");;
    $("#ciwcamp-withdraw").css("display", "none");
    $("#ciwcamp-sales").css("display", "none");
    $("#ciwcamp-commission").css("display", "inline");
    $("#ciwcamp-payments").css("display", "none");
    $("#ciwcamp-settings").css("display", "none");
    $("#ciwcamp-affiliate-details").css("display", "none");    
    $("#ciwcamp-pro").css("display", "none");       
    
    $("#ciwcamp-dashboard-btn").removeClass("active");
    $("#ciwcamp-affiliates-btn").removeClass("active");
    $("#ciwcamp-withdraw-btn").removeClass("active");
    $("#ciwcamp-sales-btn").removeClass("active");
    $("#ciwcamp-commission-btn").addClass("active");
    $("#ciwcamp-payments-btn").removeClass("active");
    $("#ciwcamp-settings-btn").removeClass("active");
    $("#ciwcamp-pro-btn").removeClass("active");
  }); 

  $("#ciwcamp-pro-btn").click(function(e){
    e.preventDefault();
  $("#ciwcamp-dashboard").css("display", "none");
  $("#ciwcamp-affiliates").css("display", "none");;
  $("#ciwcamp-withdraw").css("display", "none");
  $("#ciwcamp-sales").css("display", "none");
  $("#ciwcamp-commission").css("display", "none");
  $("#ciwcamp-payments").css("display", "none");
  $("#ciwcamp-settings").css("display", "none");
  $("#ciwcamp-affiliate-details").css("display", "none");    
  $("#ciwcamp-pro").css("display", "inline");       
  
  $("#ciwcamp-dashboard-btn").removeClass("active");
  $("#ciwcamp-affiliates-btn").removeClass("active");
  $("#ciwcamp-withdraw-btn").removeClass("active");
  $("#ciwcamp-sales-btn").removeClass("active");
  $("#ciwcamp-commission-btn").removeClass("active");
  $("#ciwcamp-payments-btn").removeClass("active");
  $("#ciwcamp-settings-btn").removeClass("active");
  $("#ciwcamp-pro-btn").addClass("active");
}); 

  if( $(document).find('.ciwcamp-loader').parent().css('display') == 'none' ) 
  {
    $(".ciwcamp-admin-dashboard").addClass("overlay");
  }

  });

})( jQuery );

 