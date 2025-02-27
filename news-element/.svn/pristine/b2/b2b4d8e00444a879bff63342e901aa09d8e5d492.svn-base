(function ($) {

   'use strict';

    var NEWS24LIB;

    NEWS24LIB = {

        init: function () {

            window.elementor.on(
                'document:loaded',
                window._.bind(NEWS24LIB.onPreviewLoaded, NEWS24LIB)
            );
        },

        onPreviewLoaded: function () {

            var tap_icon = news24_library.imgpath+'admin/lib/assets/icon.gif';
            var ne_widget = "Widget"+"<span>"+news24_library.elements+"</span>";
            var ne_slider = "Slider"+"<span>"+news24_library.slider+"</span>";
            var ne_hero = "Hero"+"<span>"+news24_library.hero+"</span>";
            var ne_header_footer = "Header footer"+"<span>"+news24_library.header_footer+"</span>";
            var ne_theme_builder = "Theme builder"+"<span>"+news24_library.theme_builder+"</span>";
            var ne_extra = "Extra"+"<span>"+news24_library.extra+"</span>";

            var main_wrap = $('#elementor-preview-iframe').contents();
            var wrapper_html = "<div style='display:none;' class='news24-lib-wrap'>"
                                    +"<div class='lib-inner'>"
                                        +"<div class='header'>"
                                            +"<div class='lhead'>"
                                                +"<h2 class='lib-logo'>Library</h2>"
                                                +"<h2 class='back-to-home'>Back to template</h2>"
                                            +"</div>"
                                            +"<div class='centerhead'>"
                                                +"<ul>"
                                                   +"<li data-type='widget' class='active'>"+ne_widget+"</li>"
                                                   +"<li data-type='slider'>"+ne_slider+"</li>"
                                                   +"<li data-type='hero'>"+ne_hero+"</li>"
                                                   +"<li data-type='header-footer'>"+ne_header_footer+"</li>"
                                                   +"<li data-type='theme-builder'>"+ne_theme_builder+"</li>"
                                                   +"<li data-type='extra'>"+ne_extra+"</li>"
                                                +"<ul>"
                                            +"</div>"                                            
                                            +"<div class='rhead'>"
                                                +"<i class='eicon-sync'></i>"
                                                +"<i class='lib-close eicon-close'></i>"
                                            +"</div>"                                            
                                        +"</div>"
                                        +"<div class='lib-inner'>"
                                            +"<div class='search-input'>"
                                                +"<input class='xl-search' type='text' placeholder='Type & hit enter'>"
                                            +"</div>"
                                            +"<div class='lib-content'>"
                                            +"</div>"
                                        +"</div>"
                                    +"</div>"
                                    +"<div data-type='element' class='xl-settings'></div>"
                                +"</div>";

            main_wrap.find('.elementor-add-template-button').after('<div class="elementor-add-section-area-button news24-add-button" style="background:black;margin-left:10px;display:inherit;"><img src="'+tap_icon+'"></div>');

            $('#elementor-editor-wrapper').append(wrapper_html);
            $('#elementor-editor-wrapper').append('<div class="tp-preview"><span class="dashicons dashicons-update"></span><div>');
 
            main_wrap.find('.news24-add-button').click(function(){

                $('#elementor-editor-wrapper').find('.news24-lib-wrap').show();
                var ajax_data = {
                    page : '1',
                    category:'',
                    type : 'widget',
                };
                process_data(ajax_data);

            });

            $(document).on('click', '.insert-tmpl', function(e) {

                var tmpl_id = $(this).data('id');
                $('.lib-content').addClass('loading');
                $.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    data: {
                      action: 'news24_import_lib',
                      id: tmpl_id,
                    },
                    success: function(data, textStatus, XMLHttpRequest) {
                        var xl_data = JSON.parse(data); 
                        elementor.getPreviewView().addChildModel(xl_data, {silent: 0});
                        $('.lib-content').removeClass('loading');
                        $('#elementor-editor-wrapper').find('.news24-lib-wrap').hide();
                    },
                    error: function (jqXHR, exception) {
                        console.log(exception);
                    }, 

                  });
            });

            $(document).on('click', '.rhead .eicon-sync', function(e) {
                $('.lib-content').addClass('loading');
                $('.xl-search').val('');
                $.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    data: {
                      action: 'news24_reload_template',
                    },
                    success: function(data, textStatus, XMLHttpRequest) {
                        $('.xl-loader').hide();
                        var ajax_data = {
                            page : '1',
                            category:'',
                            type : 'widget',
                        };
                        process_data(ajax_data);                        
                    },
                  });
            });

            $(document).on('click', '.lib-img-wrap', function(e) {
                
                var live_link = $(this).data('preview');
                var win = window.open( live_link, '_blank');
                if (win) {
                    //Browser has allowed it to be opened
                    win.focus();
                } else {
                    //Browser has blocked it
                    alert('Please allow popups for this website');
                } 

            });

            $(document).on('click', '.tp-preview .close', function(e) {
            
                $('.tp-preview .inner').html('');
                $('.tp-preview').removeClass('loading');
                $('.back-to-home').hide();
                $('.lib-content').show();
                $('.lib-logo').show();

            });

            $(document).on('click', '.page-link', function(e) {
                $('.lib-content').addClass('loading');
                var page_no = $(this).data('page-number');
                var category = $('#elementor-editor-wrapper').find('.xl-settings').attr('data-catsettings');
                var type = $('#elementor-editor-wrapper').find('.xl-settings').attr('data-type');
                var search = $('#elementor-editor-wrapper').find('.xl-settings').attr('data-search');
                $('#elementor-editor-wrapper').find('.xl-settings').attr('data-pagesettings', page_no);
                var ajax_data = {
                    page: page_no,
                    category: category,
                    type : type,
                    search : search,
                };
                process_data(ajax_data);
            });

            $(document).on('click', '.filter-wrap a', function(e) {
                var category = $(this).data('cat');
                $('#elementor-editor-wrapper').find('.xl-settings').attr('data-catsettings', category);
                $('.lib-content').addClass('loading');
                var ajax_data = {
                    page : '1',
                    category:category,
                };
                process_data(ajax_data);
            });

            $(document).on('keypress', '.xl-search', function(e) {
                if(e.which == 13) {
                    var search = $(this).val();
                    $('#elementor-editor-wrapper').find('.xl-settings').attr('data-search', search);
                    var type = $('#elementor-editor-wrapper').find('.xl-settings').attr('data-type');
                    $('.lib-content').addClass('loading');
                    var ajax_data = {
                        page : '1',
                        type : type,
                        search : search,
                    };
                    process_data(ajax_data);
                }
            });

            // Top type filter
            $(document).on('click', '.centerhead li', function(e) {
                var type = $(this).data('type');
                $(this).addClass("active").siblings().removeClass("active");
                $('#elementor-editor-wrapper').find('.xl-settings').attr('data-type', type);
                $('.lib-content').addClass('loading');
                $('.xl-search').val('');
                $('#elementor-editor-wrapper').find('.xl-settings').attr('data-search','');
                var ajax_data = {
                    page : '1',
                    category:'',
                    type : type,
                };
                process_data(ajax_data);
            });

            function process_data($data){

                  $.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    data: {
                      action: 'news24_process_lib_data',
                      data : $data,
                    },

                    success: function(data, textStatus, XMLHttpRequest) {

                        $('.lib-content').removeClass('loading');
                        $('.lib-content').html(data);

                        $('.item-wrap').masonry({
                            itemSelector: '.item',
                            isAnimated: false,
                            transitionDuration: 0
                        });

                        $('.item-wrap').masonry('reloadItems');
                        $('.item-wrap').masonry('layout');

                        $('.item-wrap').imagesLoaded( function() {
                        $('.item-wrap').masonry('layout');
                        });
                    },

                  });
            }

            $('#elementor-editor-wrapper').find('.lib-close').click(function(){
                $('#elementor-editor-wrapper').find('.news24-lib-wrap').hide();
                $('.live-preview').html('');
                $('.lib-content').show();
                $('.back-to-home').hide();
            });
        },

    };

    $(window).on('elementor:init', NEWS24LIB.init);

})(jQuery);