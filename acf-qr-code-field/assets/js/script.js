
jQuery( document ).ready(function() {
    if(jQuery('.acfqrcode_qr_code').length > 0){
        
        jQuery('.acfqrcode_qr_code').each( function(){
            var text = jQuery(this).text();
            jQuery(this).text("");
            var qrcode = new QRCode(document.getElementById(jQuery(this).attr('id')), {
                text: text, 
                width: jQuery(this).attr('data-size'),
                height: jQuery(this).attr('data-size'),
                colorDark : jQuery(this).attr('data-color'),
                colorLight : jQuery(this).attr('data-bg'),
                correctLevel : QRCode.CorrectLevel.H
            });
           
            jQuery(this).show();
        });
      
    }
    
});