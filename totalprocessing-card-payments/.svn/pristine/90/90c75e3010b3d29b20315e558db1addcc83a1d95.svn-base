jQuery(document).ready(function(){
	console.log(tpVars.pluginId + ' v.' + tpVars.pluginVer);
    jQuery(document.body).on('updated_cart_totals', function(e){
        applePaymentRequest();
    });
	if(window.ApplePaySession){
		var promise=ApplePaySession.canMakePaymentsWithActiveCard(tpVars.merchantIdentifier);
		promise.then(function(canMakePayments){
			if(canMakePayments){
				console.log('ApplePay enabled');
			} else {
				console.log('ApplePay is possible on this browser, not activated');
				jQuery('a.wc_tpapv2_applepayment').hide();
			}
		}); 
	} else {
		console.log('ApplePay is not available on this browser');
		jQuery('a.wc_tpapv2_applepayment').hide();
	}
});
window.onstorage = function(event){
    if(typeof(wc_cart_fragments_params) === 'object'){
        if(wc_cart_fragments_params.hasOwnProperty('cart_hash_key')){
            var localId = wc_cart_fragments_params.cart_hash_key;
            if(event.key !== localId) return;
            if(event.newValue){
                adjMiniCart(tpVars.miniCartButtonContainer);
            }
        }
    }
};
function applePaymentRequest(){
    return wp.ajax.post("applePaymentRequest").then(function(response){
        return response;
    }).then(function(result){
        
        tpVars.paymentRequest = result;
    });
}
function performValidation(valURL){
    return new Promise(function(resolve, reject){
        var xhr = new XMLHttpRequest();
        xhr.onload = function(){
			var response = this.responseText;
			
            var data = JSON.parse(response);
            resolve(data);
        };
        xhr.onerror = reject;
        xhr.open('POST',tpVars.adminUrl+'?action=applePayMerchantValidationRequest&validationUrl='+valURL);
        xhr.send();
    });
}
function sendPaymentToken(payment) {
    return new Promise(function(resolve, reject) {
        fetch(tpVars.adminUrl+'?action=onPaymentAuthorized', {
            method:'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }, 
            body: JSON.stringify(payment) 
        }).then(function(response){
            return response.json();
        }).then(function(json){
            
            resolve(json.data);
        });
    });
}
function doApplePayFunc2() {
    console.log('starting Apple Pay session');
    if(tpVars.isCheckout === '1' && tpVars.forceTerms === '1'){
        var tpTermsCheckBox = document.querySelector(".woocommerce-checkout #terms");
        if(typeof tpTermsCheckBox === 'object'){
            
            if(tpTermsCheckBox.checked !== true){
                alert('Website terms must be agreed before your payment-please check the required box then click checkout with Apple Pay.');
                jQuery('html, body').animate({
                    scrollTop: jQuery("#terms").offset().top-100
                }, 500);
                tpTermsCheckBox.focus();
                return false;
            }
        }
    }
    var session = new ApplePaySession(tpVars.version,tpVars.paymentRequest);
    session.onvalidatemerchant = function(event){
        
        var promise = performValidation(event.validationURL);
        promise.then(function (merchantSession){
            
            session.completeMerchantValidation(merchantSession);
        }); 
    }
    session.onshippingcontactselected = function(event){
        return wp.ajax.post("genShipping",{
            countryCode:event.shippingContact.countryCode,
            postalCode:event.shippingContact.postalCode
        }).then(function(response){
            
            var errors = [];
            var obj = {};
            if(response.hasOwnProperty('errors')){
                for (let error of response.errors) {
                    if(error.contactField === null || error.message === null){
                        errors.push(new ApplePayError(error.code));
                    } else {
                        errors.push(new ApplePayError(error.code,error.contactField,error.message));
                    }
                }
                obj.errors = errors;
            }
            if(response.hasOwnProperty('shippingMethods')){
                obj.newShippingMethods = response.shippingMethods;
            }
            if(response.hasOwnProperty('newTotal')){
                obj.newTotal = response.newTotal;
            }
            if(response.hasOwnProperty('newLineItems')){
                obj.newLineItems = response.newLineItems;
            }
            return obj;
        }).then(function(obj){
            
            session.completeShippingContactSelection(obj);
        });
    }
    session.onshippingmethodselected = function(event) {
        return wp.ajax.post("sessUpdateChosenShippingMethod",{id:event.shippingMethod.identifier})
        .then(function(response){
            
            session.completeShippingMethodSelection({"status":0,"newTotal":response.newTotal,"newLineItems":response.newLineItems});
        });
    }
    session.onpaymentauthorized = function(event){
        
        var promise = sendPaymentToken(event.payment);
        promise.then(function (response){
            
            var completionMethod = {
                status:response.returnMessage.status
            };
            var errors = [];
            if(response.returnMessage.hasOwnProperty('errors')){
                for (let error of response.returnMessage.errors) {
                    if(error.contactField === null || error.message === null){
                        errors.push(new ApplePayError(error.code));
                    } else {
                        errors.push(new ApplePayError(error.code,error.contactField,error.message));
                    }
                }
                completionMethod.errors = errors;
            }
            
            session.completePayment(completionMethod);
            return response;
        }).then(function (result){
            if(result.hasOwnProperty('redirect')){
                window.location.href = result.redirect;
            } else if(result.hasOwnProperty('error')){
                if(Boolean(tpVars.refreshPage)===true){
                    location.reload(true);
                } else {
                    alert(result.error);
                }
            }
        });
    }
    session.oncancel = function(event) {
        if(Boolean(tpVars.refreshPage)===true && Boolean(tpVars.isCheckout)===true){
            location.reload(true);
        }
    }
    session.begin();
}