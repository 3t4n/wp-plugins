var collapsCatList = jQuery.noConflict();

collapsCatList(document).ready(function(){
  if (collapsCatList('#categorychecklist').length) {
    collapsCatList('#categorychecklist input[name^="post_category"]').click(function() {
      if (collapsCatList(this).is(':checked')) {
        var parent = collapsCatList(this).data('parent');
        var num_cats = collapsCatList(this).closest('ul').data('numCats');
        
        if (collapsCatList('#categorychecklist input[data-parent="' + parent + '"]:checked').length > num_cats) {
          window.alert(collCatListTrans.max_subcategories);
          return false;
        }
      }
      
      return true;
    });
  } 
  
  if (collapsCatList('input[id^="limit_categories_selected"]').prop('checked')) {
    collapsCatList('#fieldrow-section_limit_categories_selected').show();
  }
  else {
    collapsCatList('#fieldrow-section_limit_categories_selected').hide();
  }
  
  if (collapsCatList('input[id^="section_limit_categories_selected_add_more_levels"]').prop('checked')) {
    collapsCatList('#fieldset-section_limit_categories_selected_section_more_levels').show();
  }
  else {
    collapsCatList('#fieldset-section_limit_categories_selected_section_more_levels').hide();
  }
    
  collapsCatList('input[id^="limit_categories_selected"]').click(function() {
    if (collapsCatList(this).prop('checked')) {
      collapsCatList('#fieldrow-section_limit_categories_selected').show();
    }
    else {
      collapsCatList('#fieldrow-section_limit_categories_selected').hide();
    }
  });
  
  collapsCatList('input[id^="section_limit_categories_selected_add_more_levels"]').click(function() {
    if (collapsCatList(this).prop('checked')) {
      collapsCatList('#fieldset-section_limit_categories_selected_section_more_levels').show();
    }
    else {
      collapsCatList('#fieldset-section_limit_categories_selected_section_more_levels').hide();
    }
  });
});


