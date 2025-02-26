jQuery(document).ready(function(){


    jQuery(".setting-social-plugins .tab_content").hide();
    jQuery(".setting-social-plugins .tab_content:first").show();

    jQuery(".setting-social-plugins ul.tabs li").click(function() {
		
      jQuery(".setting-social-plugins .tab_content").hide();
      var activeTab = jQuery(this).attr("rel"); 
      jQuery(".setting-social-plugins #"+activeTab).fadeIn();		
		
      jQuery(".setting-social-plugins ul.tabs li").removeClass("active");
      jQuery(this).addClass("active");

	  jQuery(".setting-social-plugins .tab_drawer_heading").removeClass("d_active");
	  jQuery(".setting-social-plugins .tab_drawer_heading[rel^='"+activeTab+"']").addClass("d_active");
	  
    });
	
	jQuery(".setting-social-plugins .tab_drawer_heading").click(function() {
      
      jQuery(".setting-social-plugins .tab_content").hide();
      var d_activeTab = jQuery(this).attr("rel"); 
      jQuery(".setting-social-plugins #"+d_activeTab).fadeIn();
	  
	  jQuery(".setting-social-plugins .tab_drawer_heading").removeClass("d_active");
      jQuery(this).addClass("d_active");
	  
	  jQuery(".setting-social-plugins ul.tabs li").removeClass("active");
	  jQuery(".setting-social-plugins ul.tabs li[rel^='"+d_activeTab+"']").addClass("active");
    });
	
	
	jQuery('.setting-social-plugins ul.tabs li').last().addClass("tab_last");
	



jQuery(".popup-facebook-messages .title-live-chat").click(function(){
jQuery(".popup-facebook-messages").toggleClass("showlivechatfb");
});


});