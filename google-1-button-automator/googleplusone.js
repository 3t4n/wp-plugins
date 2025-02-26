function googleone_changePreview(){
    // shows preview of button
    var xpos=0;
    var ypos=0;
    switch(jQuery('#googleone_size').val()){
        case 'small': ypos=0; break;
        case 'medium': ypos=-100; break;
        case 'tall': ypos=-300; break;
        default: ypos=-200; // standard
    } // switch
    switch(jQuery('#googleone_displaycount').val()){
        case 'none': xpos=-200; break;
        case 'inline': xpos=-400; break;
        default: xpos=0; // standard
    } // switch
	jQuery('#googleone_preview').css('background-position',xpos+'px '+ypos+'px');
}
// initialize onload
jQuery(document).ready(function($) {
    googleone_changePreview();
});