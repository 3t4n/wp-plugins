jQuery(document).ready(function ($) {
    (function() {

        'use strict';

        if($('.c-tabs-nav__link').length){
            var tabs = function(options) {

                var el = document.querySelector(options.el);
                var tabNavigationLinks = el.querySelectorAll(options.tabNavigationLinks);
                var tabContentContainers = el.querySelectorAll(options.tabContentContainers);
                var activeIndex = 0;
                var initCalled = false;

                var init = function() {
                    if (!initCalled) {
                        initCalled = true;
                        el.classList.remove('no-js');

                        for (var i = 0; i < tabNavigationLinks.length; i++) {
                            var link = tabNavigationLinks[i];
                            handleClick(link, i);
                        }
                    }
                };

                var handleClick = function(link, index) {

                };

                $('body').on('click', '.c-tabs-nav__link', function (e) {
                    e.preventDefault();
                    var index = $(this).index('.c-tabs-nav__link');

                    $('.c-tabs-nav__link').removeClass('is-active');
                    $(this).addClass('is-active');

                    $('.c-tab').removeClass('is-active');
                    $('.c-tab').eq(index).addClass('is-active');
                });

                var goToTab = function(index) {
                    if (index !== activeIndex && index >= 0 && index <= tabNavigationLinks.length) {
                        tabNavigationLinks[activeIndex].classList.remove('is-active');
                        tabNavigationLinks[index].classList.add('is-active');
                        tabContentContainers[activeIndex].classList.remove('is-active');
                        tabContentContainers[index].classList.add('is-active');
                        activeIndex = index;
                    }
                };

                return {
                    init: init,
                    goToTab: goToTab
                };

            };
            window.tabs = tabs;
            var myTabs = tabs({
                el: '#tabs',
                tabNavigationLinks: '.c-tabs-nav__link',
                tabContentContainers: '.c-tab'
            });
            myTabs.init();

            var type = 0;
            var id = $('.c-tabs-nav__link').size() + 1;
            var shortcode = "[shortcode_arbitrage id='" + id + "' type='" + type + "']";


            $('.add').click(function (e) {
                var txt ='input[name="0"]';
                var text = $(txt).val();

                shortcode = "[shortcode_arbitrage id='" + id + "' type='" + type + "']";

                var template = '<a href="#" class="c-tabs-nav__link">' +
                    '<span>Mirror</span>'+
                    '<div class="close-tab">'+
                    '</div>'+
                    '</a>';

                var templateContent = '<div class="c-tab">'+
                    '<div class="c-tab__content">'+
                    '<div><label>Arbitrage:</label>'+
                    '<textarea readonly class="text-iframe" name="text[]">' + text + '</textarea></div>'+
                    '<label>Arbitrage View:</label>' +
                    '<select class="type" name="type[]"><option value="0">View basic</option><option value="1">View advaced</option></select>' +
                    '<div><label>Width:</label>'+
                    '<input class="width-in" type="text" name="width[]" value="800px">' +
                    '<p>Choose width of the arbitrage table.</p></div>'+
                    '<div><label>Height:</label>'+
                    '<input class="height-in" type="text" name="height[]" value="800px">' +
                    '<p>Choose height of the arbitrage table.</p></div>'+
                    '<div><label>Shortcode:</label>'+
                    '<input class="shortcode-in" readonly type="text" name="shortcode[]" value="' + shortcode + '">'+
                    '<p>Copy short code and paste it on any page or post, where you\'d like the widget to be displayed.</p></div>'+
                    '<div><label>ID Widget:</label>'+
                    '<input readonly type="text" name="" value="' + id + '">' +
                    '<p>Copy widget ID and paste it inside the widget.</p></div>'+
                    '<div class="bottom-text">To store new mirror, click on the save link.</div>' +
                    '</div>'+
                    '</div>';

                $('.c-tabs-nav').append(template);

                $('.c-tabs').append(templateContent);
            });

            var indexS = $('select.type').val();

            if(indexS != 0){
                $('.text-hide').addClass('show');
            }
            else{
                $('.text-hide').removeClass('show');
            }

            $('body').on('change', 'select.type', function (e) {
                e.preventDefault();

                var index = $(this).val();
                var text = $('.inputs-elem input').eq(index).val();

                if(index != 0){
                    $('.text-hide').addClass('show');
                }
                else{
                    $('.text-hide').removeClass('show');
                }

                type = index;
                shortcode = "[shortcode_arbitrage id='" + id + "' type='" + type + "']";
                $('.shortcode-in').val(shortcode);
                $(this).closest('.c-tab').find('.text-iframe').val(text);

                $(this).closest('.c-tab').find('.width-in').val('800px');
                $(this).closest('.c-tab').find('.height-in').val('400px');
            });

            $('body').on('click', '.close-tab', function (e){
                e.stopPropagation();
                var index = $(this).parent().index('.c-tabs-nav__link');

                $('.c-tabs-nav__link').removeClass('is-active');
                $('.c-tabs-nav__link:first-child').addClass('is-active');

                $('.c-tab').removeClass('is-active');
                $('.c-tab').eq(0).addClass('is-active');

                $(this).closest('.c-tabs-nav__link').remove();
                $('.c-tab').eq(index).remove();
            });

        }

        $('body').on('change', '.width-in', function (e){
            e.stopPropagation();

            var text = $(this).closest('.c-tab__content').find('.text-iframe').val();
            var textReplaced = text.replace(/width: \d{1,8}px/g, 'width: '+$(this).val());
            var val = $(this).val();

            if(val.match( /\d{1,8}px$/i )){
                $(this).closest('.c-tab').find('.text-iframe').val(textReplaced);
            }
            else{
                alert('Enter correct value');
            }

        });

        $('body').on('change', '.height-in', function (e){
            e.stopPropagation();

            var text = $(this).closest('.c-tab__content').find('.text-iframe').val();
            var textReplaced = text.replace(/height: \d{1,8}px/g, 'height: '+$(this).val());
            var val = $(this).val();

            if(val.match( /\d{1,8}px$/i )){
                $(this).closest('.c-tab').find('.text-iframe').val(textReplaced);
            }
            else{
                alert('Enter correct value');
            }
        });



    })();
});
