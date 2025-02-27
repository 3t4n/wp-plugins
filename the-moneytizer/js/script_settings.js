function resetPlugin(){
    var data = {
        action: 'do_reset_plugin',
        _nonce: nonceSettings['do_reset_plugin']
    };
    
    jQuery_money.post(the_ajax_script.ajaxurl, data, function(response) {
        var result = response.substr(0, response.length - 1);
        document.location.reload();
    });
}

window.onload = function() {
    var data = {
        action: 'get_cmp',
        _nonce: nonceSettings['get_cmp']
    };
    
    jQuery.post(the_ajax_script.ajaxurl, data, function (response) {
        var result = response.substr(0, response.length - 1);
        jQuery_money('#themoneytizer_tag_cmp').html(result);
        if (result !== '' && result !== '<title>CMP The Moneytizer</title>') {
            jQuery_money('#themoneytizer_tag_cmp textarea').css('height', '300px');
        }
    });
}