function itemSelected(element) {
	
  jQuery(document).ready(function($) {
    var lang_key;

    // Remove 'selected' class from all menu items
    $('#wp-admin-bar-roman').removeClass('selected');
    $('#wp-admin-bar-tamil99').removeClass('selected');
    $('#wp-admin-bar-typewriter').removeClass('selected');
    $('#wp-admin-bar-english').removeClass('selected');
    
    // Determine the menu item to highlight
    if(element.hash)
      lang_key = '#wp-admin-bar-'+element.hash.replace('#','');
    else
      lang_key = '#wp-admin-bar-'+element;
      
    $(lang_key).addClass('selected');
  });
}

function openUp(obj, w, h) {
  console.log('openUp called with:', obj, w, h);
  window.open(obj.href, obj.id, 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width=' + w + ',height=' + h);
}
