(function($){

    "use strict";

    var AutoAliexpress = {

        selected_source: [],

        init: function()
        {
            // Document ready.
            $( document ).ready( AutoAliexpress._loadPopup() );

            this._bind();
        },

        /**
         * Binds events for the Auto Aliexpress.
         *
         * @since 1.0.0
         * @access private
         * @method _bind
         */
        _bind: function()
        {
            $( document ).on('click', '.open-popup-link', AutoAliexpress._openPopup );
            $( document ).on('click', '.auto-aliexpress-select-type', AutoAliexpress._selectType );
            $( document ).on('click', '.auto-aliexpress-select-previous', AutoAliexpress._selectPrevious );
            $( document ).on('click', '.aliexpress-source', AutoAliexpress._checkedSource );
            $( document ).on('click', '.aliexpress-go-wizard', AutoAliexpress._goWizard );


        },

        /**
         * Load Popup
         *
         */
        _loadPopup: function( ) {

            $('.open-popup-link').magnificPopup({
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
         * Open Popup
         *
         */
        _openPopup: function( event ) {

            event.preventDefault();

            $('#test-popup .step-1').show();
            $('#test-popup .step-2').hide();

        },

        /**
         * Select Type
         *
         */
        _selectType: function( event ) {

            event.preventDefault();

            var selected_type = $('#test-popup').find("input[name=aliexpress-selected-type]:checked").val();

            // define source data
            var data = [];

            switch (selected_type) {
                case 'search':
                    data = [
                        { value: "google", icon: "logo-google" },
                        { value: "yahoo", icon: "logo-yahoo" }
                    ];
                    break;
                case 'affiliate':
                    data = [
                        { value: "amazon", icon: "logo-amazon" },
                        { value: "eBay", icon: "logo-ebay" }
                    ];
                    break;
                case 'rss':
                    data = [
                        { value: "rss", icon: "logo-rss" }
                    ];
                    break;
                case 'social':
                    data = [
                        { value: "facebook", icon: "logo-facebook" },
                        { value: "twitter", icon: "logo-twitter" },
                        { value: "flickr", icon: "logo-flickr" },
                        { value: "aliexpress", icon: "logo-aliexpress" },
                    ];
                    break;
                case 'video':
                    data = [
                        { value: "youtube", icon: "logo-youtube" },
                        { value: "vimeo", icon: "logo-vimeo" }
                    ];
                    break;
                case 'sound':
                    data = [
                        { value: "music", icon: "logo-youtube" },
                        { value: "soundcloud", icon: "logo-vimeo" }
                    ];
                    break;
                default:
                    data = [
                        { value: "youtube", icon: "logo-youtube" },
                        { value: "vimeo", icon: "logo-vimeo" }
                    ];
            }

            AutoAliexpress._updateSource(data);
            $('#test-popup .step-1').hide();
            $('#test-popup .step-2').show();


        },

        /**
         * Select Previous
         *
         */
        _selectPrevious: function( event ) {

            event.preventDefault();

            $('#test-popup .step-2').hide();
            $('#test-popup .step-1').show();


        },

        /**
         * Check source
         *
         */
        _checkedSource: function( event ) {

            event.preventDefault();

            AutoAliexpress.selected_source = $(this).data('source');

            $(this).css({"background-color": "#e1f6ff", "color": "#17a8e3"});

            $(".aliexpress-source").not($(this)).css({"background-color": "#ffffff", "color": "#888"});


        },

        /**
         * Update Source
         *
         * @param  {object} event Object.
         * @param  {object} data  API response data.
         */
        _updateSource: function( data  ) {

            var template = wp.template('aliexpress-source-list');

            jQuery('.source-list').show().html(template( data ));

        },

        /**
         * Go Wizard
         *
         */
        _goWizard: function( ) {

            var target_url = Auto_Aliexpress_Data.wizard_url + '&source='+ AutoAliexpress.selected_source;

            window.location.replace(target_url);


        },

    };

    /**
     * Initialize AutoAliexpress
     */
    $(function(){
        AutoAliexpress.init();
    });

})(jQuery);