jQuery(document).ready(function($){ 
    
    getHoneyPotPlusToken();

    document.addEventListener( 'wpcf7mailsent', function( event ) {
        getHoneyPotPlusToken();
    }, false );

    function getHoneyPotPlusToken(){
        setTimeout(function(){
            $.ajax({
                url: honeypot_plus.site_url+'/wp-json/honeypotplus/token',
                data: {
                    uid : honeypot_plus.uid
                },
                method:'post',
                dataType: 'json',
                success: function(res){
                    if(res.uid){
                        honeypot_plus.uid = res.uid;
                        $('.honeypotplus').val( res.uid );
                    }
                },
            });
        }, 1500);
    }

});