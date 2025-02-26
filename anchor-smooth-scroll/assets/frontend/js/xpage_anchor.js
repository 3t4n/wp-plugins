



(function ($) {
    $win = $(window);
    $(function () {

        // return false;
        console.table(xspage_anchor_plugin_options);
        st_superAnchor3(xspage_anchor_plugin_options);

        var pluginReinit = _.once(st_superAnchor3);
    });

    function st_superAnchor3(settings) {
        var menuSelector = '.' + settings.menuClass;
        var offset = settings.offset;
        var scrollDuration = settings.scrollDuration;
        var forceDisableAnotherClicks = !!(settings.DisableThemeScroll);
        var removeWPlinkHighlightifAnchor = !!(settings.removeWPlinkHighlightifAncor);
        var customAnchorSelector = settings.customAnchorSelector? settings.customAnchorSelector : '.anchor-link';

        var finalOffset = null;
        setFinalOffset(offset);

        function setFinalOffset(x) {
            console.info(x);
            var offset = 0;

            if (!!x){
                if(/^\d+$/.test ( x )){
                    console.log('isNumber');
                    offset = parseInt(x);
                }else{
                    console.log('isString');

                    function getFloatBoardHeight() {
                        var board = $(x);
                        // console.log(board.outerHeight());

                        return board.outerHeight();
                    }
                    offset = getFloatBoardHeight();


                    $win.on('resize', _.throttle(function(){
                        // $('body').trigger('wp-resize-update');
                        offset = getFloatBoardHeight();
                        finalOffset = offset;
                        console.log('111finalOffset changed = ' + finalOffset);
                    },100));
                }
            }
            finalOffset = offset;
        }
        console.info(finalOffset);


        if(forceDisableAnotherClicks){disableMenuClickEvents(menuSelector);}

        init();

        function init() {
            console.log('init');

            urlAnchorOnLoad();
            bindAnchorClick();

            $('body').on('plugin_xpage_anchor__reinit', function (event) {
                bindAnchorClick();
            });
        }

        function urlAnchorOnLoad() {

            console.log('urlAnchorOnLoad');

            var anchorID = getAnchorID(window.location.href);

            if (anchorID !== null) {

                var $el = $(anchorID);
                $('body').trigger('anchor-url_before-scroll');
                console.log(finalOffset);

                _.delay(function () {
                    elScrollTop($el, finalOffset);
                },300);

            }
        }


        function disableMenuClickEvents(menuClass){
            setTimeout(function(){
                $(menuClass + ' a[href*="#"]').unbind("click");
                $(menuClass + ' a[href*="#"]').off("click");
                console.log('other menu anchor click events - deactivated')

                $('body').trigger('plugin_xpage_anchor__reinit');
            },300);
        }
        function bindAnchorClick() {
            var anchorArray = findAnchors(menuSelector);

            if(removeWPlinkHighlightifAnchor){
                // console.log(anchorArray.length)
                _.each(anchorArray, function (a) {
                    var li = $(a).parent('li');
                    li[0].classList.remove('current-menu-item', 'current_page_item');
                    // console.log('current-menu-item = removed');
                });
            }
            // console.log(anchorArray);
            var otherAnchors = $(customAnchorSelector);
            // console.log(otherAnchors);

            _.each(otherAnchors, function (el) {
                anchorArray.push(el);
            });

            // console.log(anchorArray);

            anchorArray.concat($(customAnchorSelector));


            $(anchorArray).off("click");
            $(anchorArray).click(function (event) {
                event.preventDefault();

                // return false;
                var href = this.getAttribute('href');
                var anchorId = getAnchorID(href);
                var weHere = areWeHere(href);
                console.log(weHere);

                if(weHere === false){
                    document.location.href = href;
                    return;
                }else{
                    var $el = $(anchorId);
                    console.info(anchorId);

                    $('body').trigger('anchor-link_before-scroll');
                    elScrollTop($el, finalOffset);
                }

            });

            function findAnchors(wrapperSelector) {
                wrapperSelector = wrapperSelector || '';
                var anchors = _.map($(wrapperSelector + ' ' + 'a'), function (a) {
                    var href = a.getAttribute('href');
                    if ((href.length > 1) && !!getAnchorID(href)) {
                        return a;
                    } else {
                        return null;
                    }
                });
                anchors = _.compact(anchors);

                // console.info(anchors.length);
                return anchors;
            }
        }

        function areWeHere(href) {

            var curentURL = (function () {
                var curentURL = window.location.href;
                var index = curentURL.indexOf('#');
                console.info(index);
                console.info(curentURL);

                if(index === -1){
                    // console.warn('no anchor found in URL');
                    curentURL = curentURL;
                } else {
                    curentURL = curentURL.substring(0,index)
                }


                return curentURL;
            })();

            // console.info(curentURL);
            var targetURL = (function (href) {
                var url = href;
                var index = url.indexOf('#');
                // console.info(href);

                if(index === -1){
                    // console.warn('no anchor found in URL');
                } else {
                    url = url.substring(0, index)
                }

                return url;
            })(href);
            // console.info(targetURL);

            return (curentURL === targetURL)
        }
        function getAnchorID(str) {
            var url = str;
            var anchorID;

            var index = url.indexOf('#');
            if(index === -1){
                // console.warn('no anchor found in URL');
                anchorID = null;
            } else {
                anchorID = url.substring(index)
            }
            // console.log(index);
            // console.log(anchorID);

            return anchorID;
        }
    }

    function elScrollTop($el, paddingTop){
        console.info('elScrollTop, pt=' + paddingTop);
        paddingTop = paddingTop || 0;

        var offsetTop = $el.offset().top;

        // console.log(offsetTop);
        $('html, body').animate({
            scrollTop: offsetTop - paddingTop
        }, parseInt(xspage_anchor_plugin_options.scrollDuration));
    }


})(jQuery);





