var wpwlOptions               = {
    paymentTarget: 'tpApplePayifrm',
    shopperResultTarget: 'tpApplePayifrm',
    onError: function(error){
        console.log('error::' + error);
    }
};

(function(tpap, $){
    var termsChecked        = false;
    var isToCCheckboxActive = false;
    function communicateWithParentWindow( e ){
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

    function postMessageToParent(obj){
        if(typeof window.CustomEvent === "function") {
            var event = new CustomEvent('parentApplePayLogV52', {detail:obj});
        } else {
            var event = document.createEvent('Event');
            event.initEvent('parentApplePayLogV52', true, true);
            event.detail = obj;
        }
        window.parent.document.dispatchEvent(event);
    }

    function setScreenSizeClass( args ){
        let topScreenWidth        = args[0];
        if( topScreenWidth >= 768 ){
            $('body').addClass('tpapplepay-bigscreen');
        }else{
            $('body').removeClass('tpapplepay-bigscreen');
        }
    }

    function validateTermsCheckbox( args ){
        termsChecked            = args[0];
        console.log(termsChecked);
    }
    
    function drawFormElementToPage(brands){
        console.log('drawing form.paymentWidgets applepay element! =>' + brands);
        jQuery('#cnpf').html(`
            <div class="tp-applepay-init-loader">
                <form action="${tpconf.formpayurl}" class="paymentWidgets" data-brands="${brands}"></form>
            </div>
        `);
    }
    
    function getCheckoutResponse(){
        return new Promise(function(resolve, reject) {
            fetch(tpconf.ajaxurl + '?action=tp_applepay_checkout_response', {
                method:  'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body:    JSON.stringify({})
            }).then(function(response){
                return response.json();
            }).then(function(json){
                console.log('applepay init');
                console.log(json.data);
                isToCCheckboxActive = json.data.termAndConditionCheckbox;
                resolve(json.data);
            });
        });
    }

    var processResponseToCreateOrder = async function(payment){
        var response = await fetch(tpconf.ajaxurl + '?action=onPaymentAuthorized', {
                method:  'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body:    JSON.stringify({'payment': payment, 'checkout_id': tpAppOPPWCheckoutID})
        });
        var data     = await response.json();
        return data;
    }
    
    function drawOppwaScriptToPage(){
        var promise           = getCheckoutResponse();
        promise.then(function (response){
            renderTpGatewayWidget(response);
        }).catch((error) => {
            console.log(error)
        });
    }
    
    function renderTpGatewayWidget(result){
        var responseResult    = result;
        let applePay          = {
            displayName:                       result.displayName,
            style:                             "black",
            currencyCode:                      result.currencyCode,
            submitOnPaymentAuthorized:         [ "customer" ],
            checkAvailability:                 "canMakePayments",
            merchantCapabilities:              result.merchantCapabilities,
            total:                             result.total,
            onCancel:                          function () {},
            requiredShippingContactFields:     result.requiredShippingContactFields,
            requiredBillingContactFields:      result.requiredBillingContactFields,
            onPaymentAuthorized: async function(payment){
                var response = await processResponseToCreateOrder(payment);
                if( response.data.status != true ){
                    return {status: 'FAILURE', errors: response.data.errors};
                }
                console.log(response);
                return null;
            }
        };
    
        wpwlOptions.applePay       = applePay;
        
        wpwlOptions.createCheckout = function() {
            if( termsChecked == false && isToCCheckboxActive == true ){
                alert('Please tick term and condition checkbox to proceed');
                return null;
            }
            return responseResult.checkout_id;
        };
    
        let platform_base     = result.platformBase;
        let checkout_id       = result.checkout_id;
        tpAppOPPWCheckoutID   = checkout_id;
        let scriptURL         = "https://" + platform_base + "/v1/paymentWidgets.js";
        console.log('Loading: ' + scriptURL + ' =>');
        let scriptElement     = document.createElement( "script" );
        scriptElement.onload  = function() {
            $('#mcif').hide();
            console.log('Successfully loaded '  + scriptURL + ' using (onload).');
        };
        scriptElement.src     = scriptURL;
        document.body.appendChild( scriptElement );
    }
    
    tpap.initialiseCnp        = function(){
        window.document.addEventListener('appleFrameLogV52', communicateWithParentWindow, false);
        postMessageToParent({funcs:[{"name":"tpApplepayInitWindowReady","args":['ready']}]});
        console.log('applepay initialiseCnp =>');
        drawFormElementToPage('APPLEPAY');
        drawOppwaScriptToPage();
    }
    
})(window.tpap = window.tpap || {}, jQuery);

jQuery(document).ready(function() {
    window.tpap.initialiseCnp();
});
