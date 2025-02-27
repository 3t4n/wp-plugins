jQuery(document).ready(function($){
    var loadingGif = ajax_object.plugin_path+'/text-captcha-contact-form-7/assets/images/loading.gif';
    function captchaRefresh(){
        var data = {
          'action': 'cf7_captcha_input_AjaxRequest'
        };
        $('#image-captcha-cf7').attr('src',loadingGif);
        $.ajax({
          url: ajax_url,
          type: 'post',
          data: data,
          dataType: 'html',
          success: function(response){
              $('#image-captcha-cf7').attr('src',response);
          }
        });
    }
    var ajax_url = ajax_object.ajax_url;
    captchaRefresh();
    $("#reload_captcha").click(function(event){
        captchaRefresh();
    });
    document.addEventListener( 'wpcf7invalid', function( event ) {
        captchaRefresh();
    }, false );
    document.addEventListener( 'wpcf7spam', function( event ) {
        captchaRefresh();
    }, false );
    document.addEventListener( 'wpcf7mailsent', function( event ) {
        captchaRefresh();
    }, false );
    document.addEventListener( 'wpcf7mailfailed', function( event ) {
        captchaRefresh();
    }, false );
    document.addEventListener( 'wpcf7submit', function( event ) {
        captchaRefresh();
    }, false );
    $('a#reload_captcha').click(function(){
        // Fetch filtered records (AJAX with parameter)
        
    });
});