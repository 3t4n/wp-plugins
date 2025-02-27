jQuery(document).ready(function($){
    jQuery('.GPV-color-field').wpColorPicker();
});

var myOptions = {   
    defaultColor: false,    
    change: function(event, ui){},  
    clear: function() {},    
    hide: true,   
    palettes: true
}; 
jQuery('.GPV-color-field').wpColorPicker(myOptions);