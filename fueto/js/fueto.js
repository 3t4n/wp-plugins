jQuery(document).ready(function(){

    var fueto_path = jQuery('#fueto_path').val();

    // Index Blog
    jQuery('.btn_index').click(function(){
        send_info_posts();
    });

    // Close Warning-width
    jQuery('#close_warning_width_btn').click(function(){
        jQuery('#warning_width').hide('slow');
    });

    // Close Progress Bar
    jQuery('#close_postit_btn').click(function(){
        jQuery('#close_postit').val('1');
        jQuery('#postit').hide('slow');
    });

    // Help with Social Proxy
    jQuery('#socialproxy').click(function(){
        var socialproxy = jQuery('#socialproxy').attr('checked');

        if (socialproxy)
        {
            socialproxy = 1;
        }
        else
        {
            socialproxy = 0;
        }

        var fueto_path = jQuery('#fueto_path').val();

        jQuery.ajax({
            url: fueto_path+'includes/send_socialproxy.php?sp='+socialproxy
        });
    });
    
    // Notify by e-mail
    jQuery('#fueto_send_mail').click(function(){
       var fueto_path = jQuery('#fueto_path').val();     

       jQuery.ajax({
            url: fueto_path+'includes/send_mail.php?sp='+jQuery('#txt_email').val()     
       });
    });
    
    // E-mail effect
    jQuery('#txt_email').bind('focusin', function(){
        
        var email = jQuery('#txt_email').val();
        
        if( email == 'Your email here')
        {
           jQuery('#txt_email').val('');
        }
    });
    
    // E-mail effect
    jQuery('#txt_email').bind('focusout', function(){
        var email = jQuery('#txt_email').val();

        if( email == '')
        {
           jQuery('#txt_email').val('Your email here');
        }
    });    

    view_remaining_posts();
});

function view_remaining_posts()
{
    var num = jQuery('#remaining_posts').val();

    if (parseInt(num) >= 100)
    {
        view_processed_info();
    }
}

function send_info_posts()
{
    var fueto_path = jQuery('#fueto_path').val();

    jQuery('.progress_bar_fill').css('width', '0.00%');

    jQuery.ajax({
        url: fueto_path+'includes/send_info_posts.php',
        success: function(data){
                data  = jQuery.parseJSON( data );
                if(data['end'] != true)
                {
                    send_info_posts();
                }
                else
                {
                    view_processed_info();
                }
        }
    });
}


function view_processed_info()
{
    var fueto_path = jQuery('#fueto_path').val();

    jQuery.ajax({
        url: fueto_path+'includes/get_processed_posts.php',
        success: function(data){
                data  = jQuery.parseJSON( data );

                jQuery('.progress_bar_fill').css('width', data["num"]+'%');
                jQuery('#process_msj').html('Flueto-Indexing '+data['remaining']+' of '+data['total posts']+' urls. Remaining: '+data['time']+'');

                if (data['num']!="100.00")
                {
                    view_processed_info();
                }
                else
                {
                    jQuery('#postit').hide('slow');
                }
        }    
    });
}