import { useEffect } from '@wordpress/element';
import { registerExpressPaymentMethod } from '@woocommerce/blocks-registry';

const IframeContainer  = () => {
    useEffect(() => {
        // Trigger the jQuery custom event after the button is rendered
        document.dispatchEvent( new Event('tpApplepayExpressButtonRendered') );

        // Cleanup or additional logic can go here if necessary
    }, []); // Runs only once after the component is mounted
    let iconURL      = tpApplepayExpressCheckoutPlugin.baseUrl + 'assets/img/apple-pay-logo@2x.png';
    return <>
               <div style={{ padding: '1.41575em 0 1.41575em 0' }}>
                   <span style={{ float: 'left' }}>All transactions are secured and encrypted</span> 
                   <img src={ iconURL } alt="Apple Pay" style={{ height: '24px', padding: '0', float: 'right', margin: '2px' }} />
               </div>
               <div id="payment_method_wc_tp_applepayiframecontainer"></div>
           </>;
}

const ExpressCheckoutButton = ( props ) => {
    return <IframeContainer />;
};

const ExpressCheckoutEdit = ( props ) => {
    return <div>Express Checkout (Preview)</div>;
};

if (window.ApplePaySession) {
    registerExpressPaymentMethod({
        name: 'tp_applepay_express_checkout',
        title: 'Apple Pay Express Checkout',
        description: 'Apple Pay Express Checkout',
        content: <ExpressCheckoutButton />,
        edit: <ExpressCheckoutEdit />,
        canMakePayment: () => true,
    });
}