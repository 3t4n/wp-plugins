(function($){

    "use strict";

    var AutoAliexpressAction = {

        init: function()
        {
            // Document ready.
            $( document ).ready( AutoAliexpressAction._stickyHeader() );
            $( document ).ready( AutoAliexpressAction._loadPopup() );
            $( document ).ready( AutoAliexpressAction._mobileSelect() );
            $( document ).ready( AutoAliexpressAction._rangeSlider() );
            $( document ).ready( AutoAliexpressAction._mainSelect() );
            $( document ).ready( AutoAliexpressAction._postSelect() );
            $( document ).ready( AutoAliexpressAction._typeSelect() );
            $( document ).ready( AutoAliexpressAction._authorSelect() );
            $( document ).ready( AutoAliexpressAction._categorySelect() );

            this._bind();
        },

        /**
         * Binds events for the Auto Aliexpress Action.
         *
         * @since 1.0.0
         * @access private
         * @method _bind
         */
        _bind: function()
        {
            $( document ).on('click', '.aliexpress-vertical-tab a', AutoAliexpressAction._switchTabs );
            $( document ).on('keyup', '#aliexpress-search', AutoAliexpressAction._searchSuggest );
            $( document ).on('click', '.aliexpress-keyword-selected', AutoAliexpressAction._selectKeyword );
            $( document ).on('click', '#aliexpress-campaign-save', AutoAliexpressAction._saveCampaign );
            $( document ).on('click', '#aliexpress-campaign-publish', AutoAliexpressAction._publishCampaign );
            $( document ).on('click', '.aliexpress-run-campaign-button', AutoAliexpressAction._runCampaign );

            $( document ).on('click', '.sui-tab-item', AutoAliexpressAction._switchSuiTabs );
            $( document ).on('click', '.nav-tab', AutoAliexpressAction._switchWelcomeTabs );
            $( document ).ready( AutoAliexpressAction._languageSelector() );

        },


        /**
         * Language Selector
         *
         */
         _languageSelector: function( ) {
            $('.aliexpress-init-language-selector').click(function(e) {
                e.preventDefault();
                e.stopPropagation();
                /* api type expanded */
                $(this).toggleClass('expanded');

                /* set from language value */
                //var translator_from_language = $('#'+$(e.target).attr('for'));
                var language = $(this).find('#'+$(e.target).attr('for'));
                console.log(language);
                language.prop('checked',true);
            });
        },

        /** Switch Welcome Tabs
         *
         */
         _switchWelcomeTabs: function( event ) {

            event.preventDefault();
            var tab = '#' + $(this).data('nav');

            $('.nav-tab').removeClass('nav-tab-active');
            $(this).addClass('nav-tab-active');

            $('.nav-container').removeClass('active');
            $('.robot-welcome-tabs').find(tab).addClass('active');

        },

        /**
         * Switch Tabs
         *
         */
        _switchTabs: function( event ) {

            event.preventDefault();

            var tab = '#' + $(this).data('nav');

            $('.aliexpress-vertical-tab').removeClass('current');
            $(this).parent().addClass('current');

            $('.aliexpress-box-tab').removeClass('active');
            $('.aliexpress-box-tabs').find(tab).addClass('active');

        },

        /**
         * Switch Sui Tabs
         *
         */
        _switchSuiTabs: function( event ) {

            event.preventDefault();

            //console.log('clicked');

            var tab = '#' + $(this).data('nav');

            console.log(tab);

            $('.sui-tab-item').removeClass('active');
            $(this).addClass('active');

            $('.sui-tab-content').removeClass('active');
            $('.sui-tabs-content').find(tab).addClass('active');


        },

        /**
         * Search Suggest
         *
         */
        _searchSuggest: function( ) {

            var term = $(this).val();

            $.ajax({
                    url  : 'https://clients1.google.com/complete/search',
                    type : 'GET',
                    dataType: 'jsonp',
                    data: {
                        q: term,
                        nolabels: 't',
                        client: 'hp',
                        ds: ''
                    },
                })
                .fail(function( jqXHR ){
                    console.log( jqXHR.status + ' ' + jqXHR.responseText);
                })
                .done(function ( data ) {

                    var result = [];

                    $.each( data[1], function( key, value ) {
                        result[key] = value[0];
                    });

                    var template = wp.template('aliexpress-search-results');

                    jQuery('.search-result-list').show().html(template( result ));

                });

        },

        /**
         * Select Keyword
         *
         */
        _selectKeyword: function( event ) {

            event.preventDefault();

            var keyword = $(this).data('keyword');
            var parsed = keyword.replace(/(<([^>]+)>)/ig,"");

            $('#aliexpress-selected-keywords').val(function(i, text) {
                if(text.length === 0){
                    return text +  parsed;
                }else{
                    return text + ', '+ parsed;
                }
            });


        },

        /**
         * Save Campaign
         *
         */
        _saveCampaign: function( ) {

            // set post form data
            var formdata = $('.aliexpress-campaign-form').serializeArray();
            var fields = {};
            $(formdata ).each(function(index, obj){
                fields[obj.name] = obj.value;
            });
            fields['campaign_status'] = 'draft';
            fields['update_frequency'] = $('.range-slider__value').text();
            fields['update_frequency_unit'] = $('#aliexpress-field-unit-button').val();
            fields['aliexpress_post_status'] = $('#aliexpress-post-status').val();
            fields['aliexpress_post_type'] = $('#aliexpress-post-type').val();
            fields['aliexpress_post_author'] = $('#aliexpress-post-author').val();

            // set selected category data
            var select_category_data = $('.aliexpress-category-multi-select').select2('data');
            var selected_category = select_category_data.map(function (el) {
                return el.id;
            });
            fields['aliexpress-post-category'] = selected_category;

            // set selected tag data
            var select_tag_data = $('.aliexpress-tag-multi-select').select2('data');
            var selected_tag = select_tag_data.map(function (el) {
                return el.id;
            });
            console.log(selected_tag);
            fields['aliexpress-post-tag'] = selected_tag;

            $.ajax({
                    url  : Auto_Aliexpress_Data.ajaxurl,
                    type : 'POST',
                    dataType: 'json',
                    data : {
                        action       : 'auto_aliexpress_save_campaign',
                        fields_data  : fields,
                        _ajax_nonce  : Auto_Aliexpress_Data._ajax_nonce


                    },
                    beforeSend: function() {

                        $('.aliexpress-status-changes').html('<ion-icon name="reload-circle"></ion-icon></ion-icon>Saving');

                    },
                })
                .fail(function( jqXHR ){
                    console.log( jqXHR.status + ' ' + jqXHR.responseText);
                })
                .done(function ( options ) {
                    if( false === options.success ) {
                        console.log(options);
                    } else {
                        console.log(options.data);
                        $( "input[name='campaign_id']" ).val(options.data);


                        // update campaign status
                        $('.aliexpress-tag').html('draft');
                        $('.aliexpress-tag').removeClass('aliexpress-tag-published');
                        $('.aliexpress-tag').addClass('aliexpress-tag-draft');

                        // update campaign save icon status
                        $('.aliexpress-status-changes').html('<ion-icon class="aliexpress-icon-saved" name="checkmark-circle"></ion-icon>Saved');

                        // update campaign button text
                        $('.campaign-save-text').text('save draft');
                        $('.campaign-publish-text').text('publish');

                        //update page url with campaign id
                        var campaign_url = Auto_Aliexpress_Data.wizard_url+ '&id=' + options.data + '&source=' + fields['aliexpress_selected_source'];
                        window.history.replaceState('','',campaign_url);
                    }
                });

        },

        /**
         * Publish Campaign
         *
         */
        _publishCampaign: function( ) {


            var formdata = $('.aliexpress-campaign-form').serializeArray();
            var fields = {};
            $(formdata ).each(function(index, obj){
                fields[obj.name] = obj.value;
            });
            fields['campaign_status'] = 'publish';
            fields['update_frequency'] = $('.range-slider__value').text();
            fields['update_frequency_unit'] = $('#aliexpress-field-unit-button').val();
            fields['aliexpress_post_status'] = $('#aliexpress-post-status').val();
            fields['aliexpress_post_type'] = $('#aliexpress-post-type').val();
            fields['aliexpress_post_author'] = $('#aliexpress-post-author').val();

            // set selected category data
            var select_category_data = $('.aliexpress-category-multi-select').select2('data');
            var selected_category = select_category_data.map(function (el) {
                return el.id;
            });
            fields['aliexpress-post-category'] = selected_category;

            // set selected tag data
            var select_tag_data = $('.aliexpress-tag-multi-select').select2('data');
            var selected_tag = select_tag_data.map(function (el) {
                return el.id;
            });
            fields['aliexpress-post-tag'] = selected_tag;

            console.log(fields);

            $.ajax({
                    url  : Auto_Aliexpress_Data.ajaxurl,
                    type : 'POST',
                    dataType: 'json',
                    data : {
                        action       : 'auto_aliexpress_save_campaign',
                        fields_data  : fields,
                        _ajax_nonce  : Auto_Aliexpress_Data._ajax_nonce,


                    },
                    beforeSend: function() {

                        $('.aliexpress-status-changes').html('<ion-icon name="reload-circle"></ion-icon></ion-icon>Saving');

                    },
                })
                .fail(function( jqXHR ){
                    console.log( jqXHR.status + ' ' + jqXHR.responseText);
                })
                .done(function ( options ) {
                    if( false === options.success ) {
                        console.log(options);
                    } else {
                        console.log(options);
                        $( "input[name='campaign_id']" ).val(options.data);

                        // update campaign tag status
                        $('.aliexpress-tag').html('published');
                        $('.aliexpress-tag').removeClass('aliexpress-tag-draft');
                        $('.aliexpress-tag').addClass('aliexpress-tag-published');

                        // update campaign save icon status
                        $('.aliexpress-status-changes').html('<ion-icon class="aliexpress-icon-saved" name="checkmark-circle"></ion-icon>Saved');

                        // update campaign button text
                        $('.campaign-save-text').text('unpublish');
                        $('.campaign-publish-text').text('update');

                        //update page url with campaign id
                        var campaign_url = Auto_Aliexpress_Data.wizard_url+ '&id=' + options.data + '&source=' + fields['aliexpress_selected_source'];
                        window.history.replaceState('','',campaign_url);



                    }
                });

        },

        /**
         * Run Campaign
         *
         */
        _runCampaign: function( ) {

            var fields = {};
            fields['campaign_id'] = $( "input[name='campaign_id']" ).val();

            $.ajax({
                    url  : Auto_Aliexpress_Data.ajaxurl,
                    type : 'POST',
                    dataType: 'json',
                    data : {
                        action       : 'auto_aliexpress_run_campaign',
                        fields_data  : fields,
                        _ajax_nonce  : Auto_Aliexpress_Data._ajax_nonce,
                    },
                    beforeSend: function() {
                      $('.aliexpress-box-footer').hide();
                      $('.aliexpress-campaign-popup-body').html('<div class="aliexpress-campaign-running"><div class="loader" id="loader-1"></div><span>running now...</span><div>');
                    },
                })
                .fail(function( jqXHR ){
                    console.log( jqXHR.status + ' ' + jqXHR.responseText);
                })
                .done(function ( option ) {
                    console.log(option);
                    if( false === option.success ) {
                        console.log(option);
                        $('.aliexpress-campaign-popup-body').html(option.data);
                    } else {
                        setTimeout(function(){

                            $('.aliexpress-campaign-popup-body').html('Running Log:<br>');
                            $.each(option.data, function(index, value) {
                                $('.aliexpress-campaign-popup-body').append(value);
                                $('.aliexpress-campaign-popup-body').append('<br>');
                            });
                            $('.aliexpress-campaign-popup-body').append('Finished');

                            $('.aliexpress-box-footer').show();

                        },3000);

                   }

                });

        },


        /**
         * Sticky Header
         *
         */
        _stickyHeader: function( ) {

                //===== Sticky

                $(window).on('scroll',function(event) {
                    var scroll = $(window).scrollTop();
                    if (scroll < 245) {
                         $(".aliexpress-box-sticky").removeClass("aliexpress-is-sticky");
                    }else{
                          $(".aliexpress-box-sticky").addClass("aliexpress-is-sticky");
                    }
                });

        },

        /**
         * Load Popup
         *
         */
        _loadPopup: function( ) {

            $('.open-popup-campaign').magnificPopup({
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
         * Mobile Select
         *
         */
        _mobileSelect: function( ) {

            // onClick new options list of new select
            var newOptions = $('.aliexpress-vertical-tabs > li');
            newOptions.on('click', function(){
                $('.aliexpress-select-content').text($(this).text());
                $('.aliexpress-vertical-tabs > li').removeClass('selected');
                $(this).addClass('selected');
            });

            var aeDropdown = $('.aliexpress-sidenav');
            aeDropdown.on('click', function(){
                $('.aliexpress-vertical-tabs').toggleClass('aliexpress-sidenav-hide-md');
            });

        },

        /**
         * Range Slider
         *
         */
        _rangeSlider: function( ) {

            var slider = $('.range-slider'),
                range = $('.range-slider__range'),
                value = $('.range-slider__value');

            slider.each(function(){

                value.each(function(){
                    var value = $(this).prev().attr('value');
                    $(this).html(value);
                });

                range.on('input', function(){
                    $(this).next(value).html(this.value);
                });
            });

        },

        /**
         * Main Select
         *
         */
        _mainSelect: function( ) {

            // onClick new options list of new select
            var newOptions = $('.list-results > li');
            newOptions.on('click', function(){
                $('.list-value').text($(this).text());
                $('.list-value').val($(this).text());
                $('.list-results > li').removeClass('selected');
                $(this).addClass('selected');
            });

            var aeDropdown = $('.select-list-container');
            aeDropdown.on('click', function(){
                $('.list-results').toggleClass('aliexpress-sidenav-hide-md');
            });

            var aliexpressDropdown = $('.dropdown-handle');
            aliexpressDropdown.on('click', function(){
                $('.list-results').toggleClass('aliexpress-sidenav-hide-md');
            });



        },

        /**
         * Post Select
         *
         */
        _postSelect: function( ) {

            // onClick new options list of new select
            var newOptions = $('.post-list-results > li');
            newOptions.on('click', function(){
                $('.post-list-value').text($(this).text());
                $('.post-list-value').val($(this).text());
                $('.post-list-results > li').removeClass('selected');
                $(this).addClass('selected');
            });

            var aeDropdown = $('.post-select-list-container');
            aeDropdown.on('click', function(){
                $('.post-list-results').toggleClass('aliexpress-sidenav-hide-md');
            });

            var aliexpressDropdown = $('.post-dropdown-handle');
            aliexpressDropdown.on('click', function(){
                $('.post-list-results').toggleClass('aliexpress-sidenav-hide-md');
            });
        },

        /**
         * Type Select
         *
         */
        _typeSelect: function( ) {

            // onClick new options list of new select
            var newOptions = $('.type-list-results > li');
            newOptions.on('click', function(){
                $('.type-list-value').text($(this).text());
                $('.type-list-value').val($(this).text());
                $('.type-list-results > li').removeClass('selected');
                $(this).addClass('selected');
            });

            var aeDropdown = $('.type-select-list-container');
            aeDropdown.on('click', function(){
                $('.type-list-results').toggleClass('aliexpress-sidenav-hide-md');

            });

            var aliexpressDropdown = $('.type-dropdown-handle');
            aliexpressDropdown.on('click', function(){
                $('.type-list-results').toggleClass('aliexpress-sidenav-hide-md');
            });

        },

        /**
         * Author Select
         *
         */
        _authorSelect: function( ) {

            // onClick new options list of new select
            var newOptions = $('.author-list-results > li');
            newOptions.on('click', function(){
                $('.author-list-value').text($(this).text());
                $('.author-list-value').val($(this).text());
                $('.author-list-results > li').removeClass('selected');
                $(this).addClass('selected');
            });

            var aeDropdown = $('.author-select-list-container');
            aeDropdown.on('click', function(){
                $('.author-list-results').toggleClass('aliexpress-sidenav-hide-md');

            });

            var aliexpressDropdown = $('.author-dropdown-handle');
            aliexpressDropdown.on('click', function(){
                $('.author-list-results').toggleClass('aliexpress-sidenav-hide-md');
            });

        },

        /**
         * Category Select
         *
         */
        _categorySelect: function( ) {

            // Categories Select2
            $(".aliexpress-category-multi-select").select2({
                placeholder: "Select your post categories here", //placeholder
                allowClear: true
            });

            // Tags Select2
            $(".aliexpress-tag-multi-select").select2({
                placeholder: "Select your post tags here", //placeholder
                allowClear: true
            });

        },


    };

    /**
     * Initialize AutoAliexpressAction
     */
    $(function(){
        AutoAliexpressAction.init();
    });

})(jQuery);
