jQuery(document).ready(function(){

        jQuery('.atcpw-container ul.atcpw-tabs li').click(function(){
                var tab_id = jQuery(this).attr('data-tab');
                jQuery('.atcpw-container ul.atcpw-tabs li').removeClass('atcpw-current');
                jQuery('.atcpw-container .tab-content').removeClass('atcpw-current');
                jQuery(this).addClass('atcpw-current');
                jQuery("#"+tab_id).addClass('atcpw-current');
        });

        jQuery('#atcpw_select_product').select2({
                ajax: {
                        url: ajaxurl,
                        dataType: 'json',
                        allowClear: true,
                        data: function (params) {
                                return {
                                        q: params.term,
                                        action: 'atcpw_product_ajax'
                                };
                        },
                        processResults: function( data ) {
                                        var options = [];
                                        if ( data ) {
                                                jQuery.each( data, function( index, text ) { 
                                                        options.push( { id: text[0], text: text[1], 'price': text[2]} );
                                                });
                                        }
                                        return {
                                                results: options
                                        };
                                },
                                cache: true
                },
                minimumInputLength: 3 
        });
});