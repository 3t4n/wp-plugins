// Create an immediately invoked functional expression to wrap our code

//todo additional options
//todo destroy method
//todo js api for user on events and methods


jQuery(function () {

    // return false;
    console.table(xspage_anchor_plugin_options);
    var xpageAnchor =  new XPageAnchor(xspage_anchor_plugin_options);

    xpageAnchor.init();

});

(function($) {


    // Define our constructor
    this.XPageAnchor = function() {
        // Create global element references
        // this.closeButton = null;
        this.finalOffset = 0;
        this.prefix = 'xpage_anchor__';
        this.arrayThemeConflict = ['disableThemeMenuAnchors','onlyReload','none'];
        //event templates
        // $('body').trigger(this.prefix + 'event-name');
        // $('body').on(this.prefix + 'event-name', function (event) {});

        var that = this;

        // Define option defaults
        var defaults = {
            menuClass : null,
            offset: 0,
            scrollDuration : 500,
            disableThemeScroll: true,
            removeWPlinkHighlightifAnchor: true,
            customAnchorSelector: null,
            onlyReload: false,
            themeConflict: 'none'
        };

        // Create options by extending defaults with the passed in arugments
        if (arguments[0] && typeof arguments[0] === "object") {
            this.options = extendDefaults(defaults, arguments[0]);
        }

        //parse options
        if(!_.contains(this.arrayThemeConflict, this.options.themeConflict)){
            throw 'Theme conflict option error : ' + this.options.themeConflict;
        }




    };

    // Public Methods
    XPageAnchor.prototype.init = function() {
        console.log('init');
        console.table(this.options);

        offset.call(this);

        urlAnchorOnLoad.call(this);


        if(!(this.options.themeConflict === 'onlyReload')){
            disableMenuClickEvents.call(this);
            bindAnchorClick.call(this);
        }

    };


    // Private Methods

    //write and update vertical offset
    function offset() {

        var that = this;

        var x = this.options.offset;
        // console.info(x);
        var offset = 0;

        if (!!x){
            if(/^\d+$/.test ( x )){
                // console.log('isNumber');
                offset = parseInt(x);
            }else{
                // console.log('isString');

                function getFloatBoardHeight() {
                    var board = $(x);
                    // console.log(board.outerHeight());

                    return board.outerHeight();
                }
                offset = getFloatBoardHeight();


                $(window).on('resize', _.throttle(function(){
                    offset = getFloatBoardHeight();
                    that.finalOffset = offset;
                    console.log('111finalOffset changed = ' + that.finalOffset);
                },100));
            }
        }
        this.finalOffset = offset;

    }

    //detect anchor in url and plizdu
    function urlAnchorOnLoad() {
        var that = this;

        // console.log('urlAnchorOnLoad');

        //disable anchor “jump” when loading a page?
        if (location.hash) {               // do the test straight away
            window.scrollTo(0, 0);         // execute it straight away
            setTimeout(function() {
                window.scrollTo(0, 0);     // run it a bit later also for browser compatibility
            }, 1);
        }



        var anchorID = getAnchorID(window.location.href);

        if (anchorID !== null) {

            var $el = $(anchorID);
            // console.log(this.finalOffset);

            _.delay(function () {
                elScrollTop($el, that.finalOffset);
            },300);

        }

    }//urlAnchorOnLoad


    function disableMenuClickEvents(){
        var that = this;

        if(this.options.themeConflict === 'disableThemeMenuAnchors'){
            setTimeout(function(){
                $(that.options.menuClass + ' a[href*="#"]').unbind("click");
                $(that.options.menuClass + ' a[href*="#"]').off("click");
                console.log('other menu anchor click events - deactivated');

                bindAnchorClick.call(that);
            },300);
        }
    }

    //find anchors and attach click event
    function bindAnchorClick() {

        // console.info('bindAnchorClick');
        // console.info(this);

        var that = this;

        var anchorArray = findAnchors(this.options.menuClass);

        if(this.options.removeWPlinkHighlightifAnchor){
            // console.log(anchorArray.length);
            _.each(anchorArray, function (a) {
                var li = $(a).parent('li');
                li[0].classList.remove('current-menu-item', 'current_page_item');
                // console.log('current-menu-item = removed');
            });
        }
        // console.log(anchorArray);
        var otherAnchors = $(this.options.customAnchorSelector);
        // console.log(otherAnchors);

        _.each(otherAnchors, function (el) {
            anchorArray.push(el);
        });

        // console.log(anchorArray);

        anchorArray.concat(otherAnchors);


        $(anchorArray).off("click");
        $(anchorArray).click(function (event) {

            event.preventDefault();

            // return false;
            var href = this.getAttribute('href');
            var anchorId = getAnchorID(href);
            var weHere = areWeHere.call(this, href);
            // var weHere = areWeHere(href);
            console.log(weHere);


            if(weHere === false){
                document.location.href = href;
                return;
            }else{
                var $el = $(anchorId);
                console.info(anchorId);

                elScrollTop($el, that.finalOffset);
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

    function elScrollTop($el, paddingTop){
        console.info('elScrollTop, pt=' + paddingTop);
        paddingTop = paddingTop || 0;

        var offsetTop = $el.offset().top;

        // console.log(offsetTop);
        $('html, body').animate({
            scrollTop: offsetTop - paddingTop
        }, parseInt(xspage_anchor_plugin_options.scrollDuration));
    }

    // Utility method to extend defaults with user options
    function extendDefaults(source, properties) {
        var property;
        for (property in properties) {
            if (properties.hasOwnProperty(property)) {
                source[property] = properties[property];
            }
        }
        return source;
    }

}(jQuery));


