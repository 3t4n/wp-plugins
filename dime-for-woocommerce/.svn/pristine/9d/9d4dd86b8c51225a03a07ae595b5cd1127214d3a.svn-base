// No need for import statements, use the wp global instead
const { decodeEntities } = wp.htmlEntities;

const { registerPaymentMethod } = window.wc.wcBlocksRegistry;
const { getSetting } = window.wc.wcSettings;

const settings = getSetting('dime_payment_data', {});

const label = decodeEntities(settings.title);
const icon =  decodeEntities(settings.icon || '');

const Content = () => {
    return decodeEntities(settings.description || '');
};

const Label = (props) => {
    const { PaymentMethodLabel } = props.components;

    // Using a styled div to center elements vertically
    const labelStyle = {
        display: 'flex',
        alignItems: 'center'
    };

    return wp.element.createElement(
        PaymentMethodLabel,
        {
            text: wp.element.createElement(
                'div',
                { style: labelStyle },
                label,
                icon ? wp.element.createElement('img', {
                    src: icon,
                    alt: label,
                    style: { maxWidth: '100px', height: 'auto', marginLeft: '8px' }
                }) : null
            )
        }
    );
};

// Register the payment method
registerPaymentMethod({
    name: "dime_payment",
    label: wp.element.createElement(Label),
    content: wp.element.createElement(Content),
    edit: wp.element.createElement(Content),
    canMakePayment: () => true,
    ariaLabel: label,
    supports: {
        features: settings.supports,
    }
});
