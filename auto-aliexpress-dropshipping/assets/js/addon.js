(function($){

    "use strict";

    var AutoAliexpressAddon = {

        init: function()
        {
            // Document ready.
            $( document ).ready( AutoAliexpressAddon._loadPopup() );

            this._bind();
        },

        /**
         * Binds events for the Auto Aliexpress Addon.
         *
         * @since 1.0.0
         * @access private
         * @method _bind
         */
        _bind: function()
        {
            $( document ).on('click', '.aliexpress-connect-integration', AutoAliexpressAddon._selectIntegration );
            $( document ).on('click', '.aliexpress-addon-connect', AutoAliexpressAddon._saveAPIData );
            $( document ).on('auto-aliexpress-reload-integration-page', AutoAliexpressAddon._reloadIntegrationPage );

        },

        /**
         * Load Popup
         *
         */
        _loadPopup: function( ) {

            $('.aliexpress-connect-integration').magnificPopup({
                type:'inline',
                midClick: true, // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
                // Delay in milliseconds before popup is removed
                removalDelay: 300,

                // Class that is added to popup wrapper and background
                // make it unique to apply your CSS animations just to this exact popup
                callbacks: {
                    beforeOpen: function() {
                        this.st.mainClass = this.st.el.attr('data-effect');
                    }
                },
            });

        },

        /**
         * Display Actions
         *
         */
        _selectIntegration: function( event ) {

            event.preventDefault();


            var slug = $(this).data('slug');

            $.ajax({
                    url  : Auto_Aliexpress_Data.ajaxurl,
                    type : 'POST',
                    dataType: 'json',
                    data : {
                        action       : 'auto_aliexpress_select_integration',
                        template     : slug,
                        _ajax_nonce  : Auto_Aliexpress_Data._ajax_nonce,
                    },
                    beforeSend: function() {
                        $('#integration-popup').empty();
                    },
                })
                .fail(function( jqXHR ){
                    console.log( jqXHR.status + ' ' + jqXHR.responseText);
                })
                .done(function ( result ) {
                    if( false === result.success ) {
                        console.log(result);
                    } else {
                        $('#integration-popup').html(result.data);
                    }
                });


        },

        /**
         * Save API Data
         *
         */
        _saveAPIData: function( event ) {

            event.preventDefault();


            var formdata = $('.aliexpress-integration-form').serializeArray();
            var fields = {};
            $(formdata ).each(function(index, obj){
                fields[obj.name] = obj.value;
            });

            console.log(fields);

            $.ajax({
                    url  : Auto_Aliexpress_Data.ajaxurl,
                    type : 'POST',
                    dataType: 'json',
                    data : {
                        action       : 'auto_aliexpress_save_api_data',
                        fields_data  : fields,
                        _ajax_nonce  : Auto_Aliexpress_Data._ajax_nonce,
                    },
                    beforeSend: function() {
                        $('.aliexpress-loading-text').text('Loading...');
                    },
                })
                .fail(function( jqXHR ){
                    console.log( jqXHR.status + ' ' + jqXHR.responseText);
                })
                .done(function ( result ) {
                    if( false === result.success ) {
                        console.log(result);
                    } else {
                        $('.aliexpress-loading-text').text('Save');

                        AutoAliexpressAddon._displayNoticeMessage(result.data);

                        setTimeout(function(){
                         $(document).trigger( 'auto-aliexpress-reload-integration-page' );
                        }, 3000);
                    }


                });


        },

        /**
         * Reload Integration Page
         *
         */
        _reloadIntegrationPage: function( event ) {

            event.preventDefault();

            var target_url = Auto_Aliexpress_Data.integrations_url;
            window.location.replace(target_url);

        },

        /**
         * Display Notice Message
         *
         */
        _displayNoticeMessage: function(message) {

            event.preventDefault();

            var html = '<div class="message-box aliexpress-message-box success">' + message + '</div>';
            $(html).appendTo(".aliexpress-wrap").fadeIn('slow').animate({opacity: 1.0}, 2500).fadeOut('slow');;

        },

    };

    /**
     * Initialize AutoAliexpressAddon
     */
    $(function(){
        AutoAliexpressAddon.init();
    });

})(jQuery);
