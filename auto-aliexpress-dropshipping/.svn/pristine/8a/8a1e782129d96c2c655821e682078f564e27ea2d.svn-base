(function($){

    "use strict";

    var AutoAliexpressList = {

        init: function()
        {
            // Document ready.
            $( document ).ready( AutoAliexpressList._loadPopup() );
            $( document ).ready( AutoAliexpressList._displayDetails() );



            this._bind();
        },

        /**
         * Binds events for the Auto Aliexpress List.
         *
         * @since 1.0.0
         * @access private
         * @method _bind
         */
        _bind: function()
        {
            $( document ).on('click', '.aliexpress-dropdown-anchor', AutoAliexpressList._displayActions );
            $( document ).on('click', '.aliexpress-close-popup', AutoAliexpressList._closePopup );
            $( document ).on('click', '.aliexpress-delete-action', AutoAliexpressList._deleteAction );
            $( document ).on('click', '#aliexpress-check-all-campaigns', AutoAliexpressList._checkAll );
            $( document ).on('click', '.aliexpress-bulk-action-button', AutoAliexpressList._preparePost );

        },

        /**
         * Display Actions
         *
         */
        _displayActions: function( event ) {

            event.preventDefault();


            if($(this).closest('.aliexpress-dropdown').find('.aliexpress-dropdown-list').hasClass('active')){
                $(this).closest('.aliexpress-dropdown').find('.aliexpress-dropdown-list').removeClass('active');
            }else{
                $(this).closest('.aliexpress-dropdown').find('.aliexpress-dropdown-list').addClass('active');
            }

        },

        /**
         * Load Popup
         *
         */
        _loadPopup: function( ) {

            $('.open-popup-delete').magnificPopup({
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
         * Close Popup
         *
         */
        _closePopup: function( ) {

            $('.open-popup-delete').magnificPopup('close');

        },

        /**
         * Delete Action
         *
         */
        _deleteAction: function( ) {

            var data = $(this).data('campaign-id');

            $('.aliexpress-delete-id').val(data);


        },

        /**
         * Check All
         *
         */
        _checkAll: function( ) {

            if($(this).prop('checked')){
                $('.aliexpress-check-single-campaign').prop('checked', true);
            }else{
                $('.aliexpress-check-single-campaign').prop('checked', false);

            }

        },

        /**
         * Prepare data before post action
         *
         */
        _preparePost: function( ) {

            var ids = [];
            $('.aliexpress-check-single-campaign').each(function( index ) {
                if($(this).prop('checked')){
                    var value = $(this).val();
                    ids.push(value);
                }
            });

            $('#aliexpress-select-campaigns-ids').val(ids);

        },

        /**
         * Display Campaign Details
         *
         */
        _displayDetails: function( ) {

            var indicator = $('.aliexpress-accordion-open-indicator');
            indicator.on('click', function(){
                $(this).closest('.aliexpress-accordion-item').find('.aliexpress-accordion-item-body').toggleClass('aliexpress-campaign-detail-hide');
                $(this).closest('.aliexpress-accordion-item').find('.aliexpress-accordion-item-date').toggleClass('aliexpress-campaign-detail-hide');
            });



        },


    };

    /**
     * Initialize AutoAliexpressList
     */
    $(function(){
        AutoAliexpressList.init();
    });

})(jQuery);
