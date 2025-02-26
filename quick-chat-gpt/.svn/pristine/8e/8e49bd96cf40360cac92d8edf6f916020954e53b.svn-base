jQuery(document).ready(function($){
    $('.multi-siderbar-content i').on('click',function(){
        $('.sidebar-panel-close').removeClass('sidebar-panel-close').addClass('sidebar-panel-expand');

        var index = $(this).parent().index();
        $('.multi-sidebar-plugins > *').removeClass('current');
        $('.multi-sidebar-plugins > *:eq(' + index + ')').addClass('current');
        
        $('.multi-siderbar-content i').parent().removeClass('active');
        $(this).parent().addClass('active');
    });
	  
$('#gtp-close').on('click',function(){
	
	 $('.sidebar-panel-expand').removeClass('sidebar-panel-expand').addClass('sidebar-panel-close');
	
}); 
});
 