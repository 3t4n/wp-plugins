(function( $ ) {
	'use strict';

    $(document).ready(function(){

        acf.add_action('load', function(){
            acf.do_action('append', $('.appendAcf') );
        });

        var ins = new acf.Model({
            events: {
                'change .acf-fields': 'onchange'
            },

            onchange: function(event, el){
                console.log('Before valid');


                acf.validation.fetch({
                    form: $('#customize-controls'),
                    success: function($form){
                        var data = $('#customize-controls').serialize();
                        $.post({
                            url: ajaxurl + "?action=parse_data_acf",
                            data: data,
                            success: function(res){
                                if (typeof res === 'object') {
                                    $.each(res, function(key, value){
                                        $('.wrapFieldAcfCustomizer').find('#_acf-customizer-' + key).val(value).trigger('change');
                                    });
                                }

                                $('#customize-controls').find('#save').removeAttr('disabled').removeClass('disabled');

                                acf.validation.reset();
                            }
                        });
                    }
                });

            }
        });

    });


})( jQuery );
