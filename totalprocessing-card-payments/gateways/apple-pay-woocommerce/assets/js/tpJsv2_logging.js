(function(tpap, $){
    'use strict';

    var applepayIframeID      = 'tpappp-ifrm';

    function postMessageToIframe( obj ){
        var iFrameId          = applepayIframeID;
        var iFrame            = document.getElementById( iFrameId );
        var iFrameDoc         = (iFrame.contentWindow || iFrame.contentDocument);
        if( iFrameDoc.document ){
            iFrameDoc         = iFrameDoc.document;
        }

        var event;
        if( typeof window.CustomEvent === "function" ) {
            event             = new CustomEvent( 'appleFrameLogV52', { detail: obj } );
        } else {
            event             = document.createEvent('Event');
            event.initEvent('appleFrameLogV52', true, true);
            event.detail      = obj;
        }
        iFrameDoc.dispatchEvent(event);
    }

    function checkout_success(args){
        var redirect                           = args[0];
        window.location                        = redirect;
    }

    function reload_checkout(args){
        var redirect                           = window.location;
        window.location                        = redirect;
    }
    
    function iframeURLLoaded(){
        $('#tp-appp-loader').hide();
        $(document).find('#'+applepayIframeID).show();
    }

    function logToParentWindow( e ){
        if( e.detail.hasOwnProperty( 'funcs' ) ){
            for ( var i = 0, len = e.detail.funcs.length; i < len; i++ ) {
                try{
                    let tempfunc    = eval( e.detail.funcs[ i ].name );
                    tempfunc(e.detail.funcs[i].args);
                }catch( err ){
                    console.log( err );
                }
            }
        }
    }

    var sendScreenSize      = function() {
        var obj         = {
            funcs: [
                {
                    name: "setScreenSizeClass",
                    args: [
                        window.innerWidth
                    ]
                }
            ]
        };
        postMessageToIframe( obj );
    }

    var tpApplepayInitWindowReady = function( args ){
        sendScreenSize();
        let termsEl         = $('#terms');
        var obj             = {
            funcs: [
                {
                    name: "validateTermsCheckbox",
                    args: [
                        termsEl.is(':checked'),
                        termsEl.val()
                    ]
                }
            ]
        };
        postMessageToIframe( obj );
    }

    tpap.initApplepaySession = function( tpVars ){
        if(window.ApplePaySession){
            let iframeUrl                      = tpVars.applepayifrURL;
            let iframeHTML                     = `
                <iframe id="${applepayIframeID}" name="tpApplePayifrm" src="${iframeUrl}" style="width: 100%; height: 208px; border: none;display:none"></iframe>`;
            $('#payment_method_wc_tp_applepayiframecontainer').html( iframeHTML );
            $('ul.wc_tp_applepay_container').show();
        } else {
            $('ul.wc_tp_applepay_container').hide();
        }
        window.document.addEventListener('parentApplePayLogV52', logToParentWindow, false);
        $(document).on('click', '#terms', function(e){
            let el              = $(this);
            var obj             = {
                funcs: [
                    {
                        name: "validateTermsCheckbox", 
                        args: [
                            el.is(':checked'),
                            el.val()
                        ]
                    }
                ]
            };
            postMessageToIframe( obj );
        });
        window.addEventListener('resize', sendScreenSize);
    } 
})(window.tpapinit = window.tpapinit || {}, jQuery);
jQuery(document).ready(function($){
    jQuery(document.body).on('updated_cart_totals', function(e){
        window.tpapinit.initApplepaySession( tpVars );
    });
    jQuery(document.body).on('updated_checkout', function(e){
        window.tpapinit.initApplepaySession( tpVars );
    });
    jQuery(document).on('tpApplepayExpressButtonRendered', function(e){
        window.tpapinit.initApplepaySession( tpVars );
    });
    window.tpapinit.initApplepaySession( tpVars );
});
