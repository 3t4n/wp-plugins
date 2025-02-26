(function(window, document, $){

    $('.pxc_amm_page_suggest')
            .suggest(window.ajaxurl + "?action=hwp_ajax_page_search");

    $('#pxc_amm_apikey_validate').click(function() {

        var uri = $('#pxc_amm_apiurl').val();
        var key = $('#pxc_amm_apikey').val();

        $('#pxc_amm_apikey').attr('readonly', true);
        $('#pxc_amm_apikey_validate').attr('disabled', true);

        $.get(uri + "/uiconfig/all?apikey=" + key)
        .success(function() {
            $('#pxc_amm_apikey_valid').show();
            $('#pxc_amm_apikey_invalid').hide();
            $('#pxc_amm_apikey').attr('readonly', false);
            $('#pxc_amm_apikey_validate').attr('disabled', false);
            
        })
        .fail(function() {
            $('#pxc_amm_apikey_valid').hide();
            $('#pxc_amm_apikey_invalid').show();
            $('#pxc_amm_apikey').attr('readonly', false);
            $('#pxc_amm_apikey_validate').attr('disabled', false);
        });

    });


})(window, document, jQuery);