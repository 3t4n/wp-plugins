import { createHigherOrderComponent } from '@wordpress/compose';
import { PanelBody, SelectControl } from '@wordpress/components';
import { InspectorControls } from '@wordpress/block-editor';
import { addFilter } from '@wordpress/hooks';
import { __ } from '@wordpress/i18n';
import { useState, useEffect, cloneElement } from '@wordpress/element';

/**
 * Higher-order component to add custom controls to the core button block.
 */
const withCustomInspectorControls = createHigherOrderComponent((BlockEdit) => {
  return (props) => {
    if (props.name !== 'core/button') {
      return <BlockEdit {...props} />;
    }

    const { attributes, setAttributes } = props;
    const { ankaPaymentButtonShortcode, ankaPaymentButtonUrl } = attributes;

    const [paymentButtons, setPaymentButtons] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
      wp.apiFetch({ path: '/anka-commerce/v1/payment-buttons' })
        .then((buttons) => {
          setPaymentButtons(buttons);
        })
        .catch((error) => {
          console.error('Error fetching payment buttons:', error);
        })
        .finally(() => {
          setLoading(false);
        });
    }, []);

    const options = [
      { label: __('Select a Payment Button', 'anka-commerce'), value: '' },
      ...paymentButtons.map((button) => ({
        label: button.title,
        value: button.shortcode,
      })),
    ];

    if (loading) {
      options.unshift({ label: __('Loading...', 'anka-commerce'), value: '' });
    }

    const PaymentButtonInspectorControls = ({ paymentButtonShortcode, paymentButtons, handleSelectChange }) => (
      <InspectorControls>
        <PanelBody title={__('ANKA Pay Settings', 'anka-commerce')}>
          <SelectControl
            label={__('Select Payment Button', 'anka-commerce')}
            value={paymentButtonShortcode}
            options={options}
            onChange={handleSelectChange}
            __nextHasNoMarginBottom={true}
          />
        </PanelBody>
      </InspectorControls>
    );

    const handleSelectChange = (newShortcode) => {
      const selectedButton = paymentButtons.find(
        (button) => button.shortcode === newShortcode
      );

      setAttributes({
        ankaPaymentButtonShortcode: newShortcode,
        ankaPaymentButtonUrl: selectedButton?.payment_url ?? '',
      });
    };

    return (
      <>
        <BlockEdit {...props} />
        <PaymentButtonInspectorControls paymentButtonShortcode={ankaPaymentButtonShortcode} paymentButtons={paymentButtons} handleSelectChange={handleSelectChange} />
      </>
    );
  };
}, 'withCustomInspectorControls');

/**
 * Filter to register custom attributes for core button block.
 */
addFilter('blocks.registerBlockType', 'anka-commerce/add-button-attributes', (settings, name) => {
  if (name !== 'core/button') {
    return settings;
  }

  return {
    ...settings,
    attributes: {
      ...settings.attributes,
      ankaPaymentButtonShortcode: {
        type: 'string',
        default: '',
      },
      ankaPaymentButtonUrl: {
        type: 'string',
        default: '',
      },
    },
  };
});

/**
 * Modify the save function to inject `href` into the `<a>` tag.
 */
addFilter('blocks.getSaveElement', 'anka-commerce/modify-save-element', (element, blockType, attributes) => {
  if (blockType.name !== 'core/button' || !element || !element.props || !element.props.children) {
    return element; // Return the original element if not a button or undefined
  }

  const { ankaPaymentButtonUrl } = attributes;

  if (ankaPaymentButtonUrl) {
    return cloneElement(element, {}, cloneElement(element.props.children, { href: ankaPaymentButtonUrl }));
  }

  return element;
});

// Apply the filter to add custom Inspector Controls.
addFilter('editor.BlockEdit', 'anka-commerce/with-custom-inspector-controls', withCustomInspectorControls);
