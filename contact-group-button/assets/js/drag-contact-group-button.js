jQuery.noConflict();
jQuery(window).load(function() {
jQuery('a.btn-support').click(function(e){
      e.stopPropagation();
      jQuery('.support-content').slideToggle();
    });
    jQuery('.support-content').click(function(e){
      e.stopPropagation();
    });
    jQuery(document).click(function(){
      jQuery('.support-content').slideUp();
    });
});