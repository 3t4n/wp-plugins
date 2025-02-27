import { useEffect, useState } from 'react';
import { sprintf, __ } from '@wordpress/i18n';
import { registerPaymentMethod, registerExpressPaymentMethod } from '@woocommerce/blocks-registry';
import { decodeEntities } from '@wordpress/html-entities';
import { getSetting } from '@woocommerce/settings';
import '../css/main.css';

const settings = getSetting( 'wc_tp_cardsv3_data', {} );

const setGatewayuuid = () => {
    Promise.resolve(
        jQuery.ajax({
            type: 'post',
            dataType : 'json',
            url: woocommerce_params.ajax_url,
            data : {action: "tpcpv3_requestOrderCheckoutId"},
        })
    ).then(function( res ){
        if(res.success === true) {
            jQuery( '#tpcpv3_iframe_container' ).empty().html('Initializing.....');
            jQuery( '#tpcpv3_checkout_id').val( res.data.uuid );
            console.log('set the uuid to: ' + res.data.uuid);
            jQuery( '#tpcpv3_iframe_container' ).html('<iframe id="tpcpv3_cnpFrame" name="myCustomIframe" src="'+res.data.frameurl+'?v='+Date.now()+'" style="width: 100%; height:80px; border: none;"></iframe>');
        }
    }).catch(function(e) {
        console.log(e); 
    });
};

const defaultLabel = __(
	'Total Processing Card Payments & Gateway for WooCommerce',
	'totalprocessing-card-payments-and-gateway-woocommerce'
);

const label = decodeEntities( settings.title ) || defaultLabel;

const cardIcons = () => {
	return Object.entries( settings.icons ?? {} ).map(
		( [ id, { src, alt } ] ) => {
			return {
				id,
				src,
				alt,
			};
		}
	);
};

const IframeContainer  = () => {
    if( settings.uuid == null ){    
        Promise.resolve(
            jQuery.ajax({
                type: 'post',
                dataType : 'json',
                url: woocommerce_params.ajax_url,
                data : {action: "tpcpv3_requestOrderCheckoutId"},
            })
        ).then(function( res ){
            if(res.success === true) {
                jQuery( '#tpcpv3_iframe_container' ).empty().html('<div class="dot-bricks"></div>');
                jQuery( '#tpcpv3_checkout_id').val( res.data.uuid );
                console.log('set the uuid to: ' + res.data.uuid);
                jQuery( '#tpcpv3_iframe_container' ).html('<iframe id="tpcpv3_cnpFrame" name="myCustomIframe" src="'+res.data.frameurl+'?v='+Date.now()+'" style="width: 100%; height:80px; border: none;"></iframe>');
            }
        }).catch(function(e) {
            console.log(e); 
        });
        return <div id="tpcpv3_cnpForm inline">
                   <input id="tpcpv3_checkout_id" type="hidden" name="tpcpv3_checkout_id" value="" />
                   <div id="tpcpv3_inline-loading">
                       <div className="dot-bricks"></div>
                   </div>
                   <div id="tpcpv3_iframe_container"></div>
               </div>;
    }else{
        console.log("pre:" + settings.uuid );
        return <div id="tpcpv3_cnpForm">
                   <input id="tpcpv3_checkout_id" type="hidden" name="tpcpv3_checkout_id" value={ settings.uuid } />
                   <div id="tpcpv3_inline-loading">
                       <div className="dot-bricks"></div>
                   </div>
                   <div id="tpcpv3_iframe_container" style={{ display: 'none' }}>
                       <iframe id="tpcpv3_cnpFrame" name="myCustomIframe" src={ settings.frameurl } style={{ width: '100%', height:'80px', border: 'none' }} />
                   </div>
               </div>;
    }
}

/**
 * Content component
 */
const Content = ( props ) => {
	const { eventRegistration, emitResponse, onSubmit } = props;
	const { onCheckoutSuccess, onPaymentSetup } = eventRegistration;
    useEffect( () => {
		const unsubscribe = onCheckoutSuccess( async(ar) => {
            console.log(ar);
            wc_gateway_tp.finalOrderPaymentProcess( ar );
			return true;
		} );
		// Unsubscribes when this component is unmounted.
		return () => {
			unsubscribe();
		};
	}, [
		emitResponse.responseTypes.ERROR,
		emitResponse.responseTypes.SUCCESS,
        onCheckoutSuccess,
	] );
    return <IframeContainer />;
};

/**
 * Label component
 *
 * @param {*} props Props from payment API.
 */
const Label = ( props ) => {
	const { PaymentMethodLabel, PaymentMethodIcons } = props.components;
	return <span>
               <PaymentMethodLabel text={ label } />
               <PaymentMethodIcons icons={ cardIcons() } align="left" />
           </span>;
};

/**
 * Icon component
 *
 * @param {*} props Props from payment API.
 */
const TPIcons = ( props ) => {
	const { PaymentMethodIcons } = props.components;
	return <PaymentMethodIcons icons={ cardIcons } align="left" />
};

/**
 * Payment method config object.
 */
const TPCardsBolockRegister = {
	name: "wc_tp_cardsv3",
	label: <Label />,
	//icons: cardIcons(),
	content: <Content />,
	edit: <Content />,
	canMakePayment: () => true,
	ariaLabel: label,
	supports: {
		features: settings.supports,
	},
};
registerPaymentMethod( TPCardsBolockRegister );
