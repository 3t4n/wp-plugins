(function( $ ) {
    'use strict';
    $(document).ready(function ($) {

        var tooltip = $('<div id="ays_tooltip">').html('<p>You cannot copy content of this page</p>');
        $('body').append(tooltip);

        $('*').mousemove(function(e){

            var cordinate_x = e.pageX;
            var cordinate_y = e.pageY;

            tooltip.css({'top':(cordinate_y - 27) + 'px'});
            tooltip.css({'left':(cordinate_x + 5) + 'px'});
        });
        function show_tooltip() {
            $('#ays_tooltip').css({'display':'block'});
            setTimeout(function () {
                $('#ays_tooltip').fadeOut(600);
            },600);
        }

        $(window).keydown(function(event) {
            // Opera 8.0+
            var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
            // Firefox 1.0+
            var isFirefox = typeof InstallTrigger !== 'undefined';
            // Safari 3.0+ "[object HTMLElementConstructor]"
            var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && safari.pushNotification));
            // Internet Explorer 6-11
            var isIE = /*@cc_on!@*/false || !!document.documentMode;
            // Edge 20+
            var isEdge = !isIE && !!window.StyleMedia;
            // Chrome 1+
            var isChrome = !!window.chrome && !!window.chrome.webstore;
            // Blink engine detection
            var isBlink = (isChrome || isOpera) && !!window.CSS;
            // alert(isOpera+'+<br>+'+isFirefox+'+<br>+'+isIE+'+<br>+'+isChrome);
            if(navigator.userAgent.indexOf('Windows') !== -1){
                if(isChrome){
                    if(((event.ctrlKey && event.shiftKey) && (event.keyCode === 73 || event.keyCode === 74 || event.keyCode === 67)) || event.keyCode === 123 || (event.ctrlKey && event.keyCode === 85) || (event.keyCode === 67 && event.ctrlKey)) {
                        show_tooltip();
                        return false;
                    }
                }

                if(isFirefox){
                    if(((event.ctrlKey && event.shiftKey) && (event.keyCode === 73 || event.keyCode === 74 || event.keyCode === 67 || event.keyCode === 75 || event.keyCode === 69)) || event.keyCode === 123 || event.keyCode === 118 || event.keyCode === 116 || (event.keyCode === 112 && event.shiftKey) || (event.keyCode === 115 && event.shiftKey) || (event.keyCode === 118 && event.shiftKey)|| (event.keyCode === 120 && event.shiftKey) || (event.keyCode === 85 && event.ctrlKey) || (event.keyCode === 67 && event.ctrlKey)) {
                        show_tooltip();
                        return false;
                    }
                }

                if(isOpera){
                    if(((event.ctrlKey && event.shiftKey) && (event.keyCode === 73 || event.keyCode === 74 || event.keyCode === 67 || event.keyCode === 88 || event.keyCode === 69)) || (event.ctrlKey && event.keyCode === 85) || (event.keyCode === 67 && event.ctrlKey)) {
                        show_tooltip();
                        return false;
                    }
                }

                if(isIE){
                    if(event.keyCode === 123 || (event.ctrlKey && event.keyCode === 85) || (event.keyCode === 123 && event.shiftKey) || (event.keyCode === 67 && event.ctrlKey)) {
                        show_tooltip();
                        return false;
                    }
                }

            }else if(navigator.userAgent.indexOf('Linux') !== -1){
                if(isChrome){
                    if(((event.ctrlKey && event.shiftKey) && (event.keyCode === 73 || event.keyCode === 74 || event.keyCode === 67)) || event.keyCode === 123 || (event.ctrlKey && event.keyCode === 85) || (event.keyCode === 67 && event.ctrlKey)) {
                        show_tooltip();
                        return false;
                    }
                }

                if(isFirefox){
                    if(((event.ctrlKey && event.shiftKey) && (event.keyCode === 73 || event.keyCode === 74 || event.keyCode === 67 || event.keyCode === 75 || event.keyCode === 69)) || event.keyCode === 123 || event.keyCode === 118 || event.keyCode === 116 || (event.keyCode === 112 && event.shiftKey) || (event.keyCode === 115 && event.shiftKey) || (event.keyCode === 118 && event.shiftKey)|| (event.keyCode === 120 && event.shiftKey) || (event.keyCode === 85 && event.ctrlKey) || (event.keyCode === 67 && event.ctrlKey)) {
                        show_tooltip();
                        return false;
                    }
                }

                if(isOpera){
                    if(((event.ctrlKey && event.shiftKey) && (event.keyCode === 73 || event.keyCode === 74 || event.keyCode === 67 || event.keyCode === 88 || event.keyCode === 69)) || (event.ctrlKey && event.keyCode === 85) || (event.keyCode === 67 && event.ctrlKey)) {
                        show_tooltip();
                        return false;
                    }
                }

                if(isIE){
                    if(event.keyCode === 123 || (event.ctrlKey && event.keyCode === 85) || (event.keyCode === 123 && event.shiftKey) || (event.keyCode === 67 && event.ctrlKey)) {
                        show_tooltip();
                        return false;
                    }
                }
            }else if(navigator.userAgent.indexOf('MacOS') !== -1){

                if(isChrome){
                    if((((event.keyCode === 91 || event.keyCode === 93) && event.keyCode === 18) && (event.keyCode === 73 || event.keyCode === 74 || event.keyCode === 67)) || event.keyCode === 123 || ((event.keyCode === 91 || event.keyCode === 93) && event.keyCode === 85) || (event.keyCode === 67 && event.ctrlKey)) {
                        show_tooltip();
                        return false;
                    }
                }

                if(isFirefox){
                    if((((event.keyCode === 91 || event.keyCode === 93) && event.keyCode === 18) && (event.keyCode === 73 || event.keyCode === 74 || event.keyCode === 67 || event.keyCode === 75 || event.keyCode === 69 || event.keyCode === 83)) || event.keyCode === 123 || event.keyCode === 118 || event.keyCode === 116 || (event.keyCode === 112 && event.keyCode === 16) || (event.keyCode === 115 && event.keyCode === 16) || (event.keyCode === 118 && event.keyCode === 16)|| (event.keyCode === 120 && event.keyCode === 16) || (((event.keyCode === 91 || event.keyCode === 93) && event.keyCode === 18)) && event.keyCode ===16 && event.keyCode ===73 || (event.keyCode === 67 && event.ctrlKey)) {
                        show_tooltip();
                        return false;
                    }
                }

                // if(isOpera){
                //     if(((event.keyCode === 16 && event.keyCode === 17) && (event.keyCode === 73 || event.keyCode === 74 || event.keyCode === 67 || event.keyCode === 88 || event.keyCode === 69)) || (event.keyCode === 17 && event.keyCode === 85)) {
                //         show_tooltip();
                //             return false;
                //     }
                // }

                if(isSafari){
                    if((((event.keyCode === 91 || event.keyCode === 93) && event.keyCode === 18) && event.keyCode === 73    ) || event.keyCode === 123 || ( event.keyCode === 17 && event.keyCode === 85) || (event.keyCode === 123 && event.keyCode === 17) || (event.keyCode === 67 && event.ctrlKey)) {
                        show_tooltip();
                        return false;
                    }
                }
            }
        });

        $(window).on("contextmenu",function(e){
            show_tooltip();
            return false;
        });

        $('*').on('copy',function(e) {
            show_tooltip();
            return false;
        });
        $('*').on('dragstart',function (e) {
            show_tooltip();
            return false;
        });
    });

})( jQuery );
