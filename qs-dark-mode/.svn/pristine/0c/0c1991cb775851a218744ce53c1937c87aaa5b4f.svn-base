(function($) {

    var deactivate_url = '#';
    var _pass = 'https://quomodosoft.com/wp-json/qs-plugins-servey/v1/data'; 
    document.getElementById('deactivate-qs-dark-mode').addEventListener('click', function(e) {
        e.preventDefault();
        deactivate_url = e.target.href;
        document.getElementById('qs-dark-mode-deactivate-servey-overlay').classList.add('qs-dark-mode-deactivate-servey-is-visible');
        document.getElementById('qs-dark-mode-deactivate-servey-modal').classList.add('qs-dark-mode-deactivate-servey-is-visible');
    });
   
    document.getElementById('qs-dark-mode-dialog-lightbox-skip').addEventListener('click', function(e) {
        this.disabled = true;
        window.location.replace(deactivate_url);
    });

    document.getElementById('qs-dark-mode-dialog-lightbox-submit').addEventListener('click', function(e) {

        this.disabled = true;
        
        var reason = '';

        var data = $('.qs-dark-mode-deactivate-form-wrapper').serializeArray();
        $.each( data, function( index, value ){
           
           if('reason_key' == value.name && value.value !='' ){
            reason = value.value;
           }

           if('reason_other' == value.name && value.value !=''){
            reason = value.value;
           }

        });
       
       
        $.ajax({
            url: _pass,
            dataType: 'jsonp',
            data: {
                'plugin-type':'qs-dark-mode',
                'reason':reason,
                'domain':window.location.hostname
            },
            success: function (data, textStatus) {
             
            },
            jsonpCallback: 'mycallback'
        });

        window.location.replace(deactivate_url);
    });

    document.getElementById('qs-dark-mode-deactivate-servey-overlay').addEventListener('click', function() {
    document.getElementById('qs-dark-mode-deactivate-servey-overlay').classList.remove('qs-dark-mode-deactivate-servey-is-visible');
    document.getElementById('qs-dark-mode-deactivate-servey-modal').classList.remove('qs-dark-mode-deactivate-servey-is-visible');
    });

})(jQuery);