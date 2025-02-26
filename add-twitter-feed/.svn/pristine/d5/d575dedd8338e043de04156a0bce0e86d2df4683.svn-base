jQuery(document).ready(function() {
  jQuery('input[type="radio"]').click(function() {
    if(jQuery(this).attr('id') == 'vertical') {
      jQuery('#vertical_options').show();
      jQuery('#blog_options').hide();
      jQuery('#masonry_options').hide();          
    }
  });
  jQuery('input[type="radio"]').click(function() {
    if(jQuery(this).attr('id') == 'blog_style') {
      jQuery('#blog_options').show();
      jQuery('#vertical_options').hide();
      jQuery('#masonry_options').hide();            
    }
  });

  jQuery('input[type="radio"]').click(function() {
    if(jQuery(this).attr('id') == 'masonry') {
      jQuery('#masonry_options').show();   
      jQuery('#vertical_options').hide();
      jQuery('#blog_options').hide();           
    }
  });

    var selectedFeedStyle = jQuery('input[name=tfbip_select_style]:checked').val();
    
     if(selectedFeedStyle == 'vertical'){
      jQuery('#vertical_options').show();
    }
    if(selectedFeedStyle == 'blog_style'){
      jQuery('#blog_options').show();
    }
    if(selectedFeedStyle == 'masonry'){
      jQuery('#masonry_options').show();   
    }

});
