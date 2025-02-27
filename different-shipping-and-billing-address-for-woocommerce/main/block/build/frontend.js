  
(() => {
  "use strict";
  const { useEffect, useState, useRef } = window.wp.element;
  const { useSelect, dispatch, select ,useDispatch} = window.wp.data;
  const { CHECKOUT_STORE_KEY ,CART_STORE_KEY} = window.wc.wcBlocksData;
  const React = window.React;

  const blockMetadata = {
    $schema: "https://schemas.wp.org/trunk/block.json",
    apiVersion: 2,
    name: "multiple-billing-address/dropdown", // This is correct (lowercase)
    version: "1.0.0",
    title: "Multiple Billing Address Dropdown",
    category: "woocommerce",
    parent: ["woocommerce/checkout-billing-address-block"],
    attributes: {
      lock: {
        type: "object",
        default: { remove: true, move: true },
      },
    },
    textdomain: "multiple-billing-address",
  };


  const wcBlocksCheckout = window.wc.blocksCheckout;
  const { registerCheckoutBlock } = wcBlocksCheckout;

  
  registerCheckoutBlock({
    metadata: blockMetadata,
    component: ({ children, checkoutExtensionData }) => {
      const { dispatchCart } = useDispatch(CART_STORE_KEY);
      const [selectedOption, setSelectedOption] = useState('');
      const [isModalOpen, setIsModalOpen] = useState(false); // Modal visibility state
      const [loading, setLoading] = useState(false);
      const { setExtensionData } = checkoutExtensionData;
      const extensionData = select(CHECKOUT_STORE_KEY).getExtensionData();
  
      // Initialize billingUserData at the top
      const billingUserData = window.DSABAFW_VARS?.dsabafw_variable?.['dsabafw_billing_user_data'] || {};
      console.log("billingUserData :", billingUserData);
  
      const maxCount = 3; // Maximum number of addresses
      const savedAddressCount = Object.keys(billingUserData).length; // Count of saved addresses
  
      // Function to handle modal toggle
      const handleModalToggle = () => {
        if (savedAddressCount >= maxCount) {
          setIsModalOpen(true); // Open the modal if 3 addresses are saved
        } else {
          // Logic to add a new address can be implemented here
          console.log("Add new address logic goes here."); 
        }
      };
  
      // Function to close the modal
      const handleModalClose = () => {
        setIsModalOpen(false); // Close the modal
      };
  
      const handleSelectChange = (e) => {
        const selectedValue = e.target.value;
        setSelectedOption(selectedValue);
        console.log("Selected option:", selectedValue);
  
        if (selectedValue !== '') {
          setLoading(true); // Set loading to true when an option is selected
  
          // Simulate a delay (for example, data fetching)
          setTimeout(() => {
            const selectedAddress = billingUserData[selectedValue] || {};
            console.log("selectedAddress :", selectedAddress);
  
            const newAddress = {
              first_name: selectedAddress['billing_first_name'] || '',
              last_name: selectedAddress['billing_last_name'] || '',
              company: selectedAddress['billing_company'] || '',
              country: selectedAddress['billing_country'] || '',
              address_1: selectedAddress['billing_address_1'] || '',
              address_2: selectedAddress['billing_address_2'] || '',
              city: selectedAddress['billing_city'] || '',
              state: selectedAddress['billing_state'] || '',
              postcode: selectedAddress['billing_postcode'] || '',
              phone: selectedAddress['billing_phone'] || '',
              email: selectedAddress['billing_email'] || '',
            };
  
            dispatch(CART_STORE_KEY)
              .updateCustomerData({ billing_address: newAddress }, false)
              .then(() => {
                setLoading(false); // Hide loading once data is updated
              })
              .catch((response) => {
                setLoading(false); // Hide loading on error as well
              });
          }, 1000); // Simulate 1 second delay
        }
      };
  
      // Button to open modal
      const addButtonElement = React.createElement(
        'a',
        {
          className: `addButton ${savedAddressCount < maxCount ? 'form_option_billing' : ''}`,
          onClick: handleModalToggle, // Always trigger modal toggle
          style: {
            padding: '8px 56px',
            backgroundColor: '#000000',
            color: '#fff',
            border: 'none',
            borderRadius: '5px',
            cursor: 'pointer',
            opacity: 1,
          },
        },
        'Add'
      );
  
      const dynamicOptions = Object.keys(billingUserData).map((key) =>
        React.createElement('option', { value: key }, billingUserData[key].reference_field)
      );
  
      const selectDropdownElement = React.createElement(
        'select',
        {
          value: selectedOption,
          onChange: handleSelectChange,
          className: `billing-address-dropdown ${loading ? 'loading' : ''}`,
          style: {
            marginBottom: '0px',
            padding: '10px',
            borderRadius: '5px',
            width: '26%',
            opacity: loading ? 0.4 : 1,
            pointerEvents: loading ? 'none' : 'auto',
          }
        },
        React.createElement('option', { value: '' }, 'Select a Billing Address'),
        ...dynamicOptions
      );
  
      // Modal Element
      const modalElement = isModalOpen &&
        React.createElement(
          'div',
          {
            className: 'dsabafw_modal-content',
            style: {
              background: '#000000',
              padding: '20px',
              border: '1px solid #000',
              borderRadius: '5px',
              position: 'fixed',
              top: '50%',
              left: '50%',
              transform: 'translate(-50%, -50%)',
              zIndex: 9999,
              width:'80%'
            },
          },
          React.createElement('span', {
            className: 'dsabafw_close',
            onClick: handleModalClose,
            style: { cursor: 'pointer', float: 'right', fontSize: '20px' },
            children: '×',
          }),
          React.createElement(
            'h3',
            { className: 'dsabafw_border', style: { margin: '20px 0', color: '#ffffff' } },
            savedAddressCount >= maxCount ? 'You can add a maximum of 3 addresses!' : 'Add your address here!'
          )
        );
  
      const exampleFieldsElement = React.createElement(
        'div',
        {
          className: 'example-fields',
          style: {
            display: 'flex',
            alignItems: 'center',
            gap: '2px',
          },
        },
        selectDropdownElement,
        addButtonElement,
        loading && React.createElement('div', { style: { marginLeft: '10px', fontWeight: 'bold' } }, 'Loading...'),
        modalElement // Add the modal to the render
      );
  
      return exampleFieldsElement;
    },
  });
  
  
          

  const blockMetadataShipping = {
    $schema: "https://schemas.wp.org/trunk/block.json",
    apiVersion: 2,
    name: "multiple-shipping-address/dropdown", // This is correct (lowercase)
    version: "1.0.0",
    title: "Multiple Shipping Address Dropdown",
    category: "woocommerce",
    parent: ["woocommerce/checkout-shipping-address-block"],
    attributes: {
      lock: {
        type: "object",
        default: { remove: true, move: true },
      },
    },
    textdomain: "multiple-shipping-address",
  };

  registerCheckoutBlock({
    metadata: blockMetadataShipping,
    component: ({ children, checkoutExtensionData }) => {
      const { dispatchCart } = useDispatch(CART_STORE_KEY);
      const [selectedOption, setSelectedOption] = useState('');
      const [isModalOpen, setIsModalOpen] = useState(false); // Modal visibility state
      const [loading, setLoading] = useState(false);
      const { setExtensionData } = checkoutExtensionData;
      const shippingUserData = window.DSABAFW_VARS?.dsabafw_variable?.['dsabafw_shipping_user_data'] || {};
      
      const maxCount = 3; // Maximum number of addresses
      const savedAddressCount = Object.keys(shippingUserData).length; // Count of saved addresses
  
      // Function to handle modal toggle
      const handleModalToggle = () => {
        if (savedAddressCount >= maxCount) {
          setIsModalOpen(true); // Open the modal if 3 addresses are saved
        } else {
          // Logic to add a new shipping address can be implemented here
          console.log("Add new shipping address logic goes here.");
        }
      };
  
      // Function to close the modal
      const handleModalClose = () => {
        setIsModalOpen(false); // Close the modal
      };
  
      const handleSelectChange = (e) => {
        const selectedValue = e.target.value;
        setSelectedOption(selectedValue);
        console.log("Selected option:", selectedValue);
  
        if (selectedValue !== '') {
          setLoading(true); // Set loading to true when an option is selected
  
          // Simulate a delay (for example, data fetching)
          setTimeout(() => {
            const selectedAddress = shippingUserData[selectedValue] || {};
            console.log("selectedAddress :", selectedAddress);
  
            const newAddress = {
              first_name: selectedAddress['shipping_first_name'] || '',
              last_name: selectedAddress['shipping_last_name'] || '',
              company: selectedAddress['shipping_company'] || '',
              country: selectedAddress['shipping_country'] || '',
              address_1: selectedAddress['shipping_address_1'] || '',
              address_2: selectedAddress['shipping_address_2'] || '',
              city: selectedAddress['shipping_city'] || '',
              state: selectedAddress['shipping_state'] || '',
              postcode: selectedAddress['shipping_postcode'] || '',
            };
  
            dispatch(CART_STORE_KEY)
              .updateCustomerData({ shipping_address: newAddress }, false)
              .then(() => {
                setLoading(false); // Hide loading once data is updated
              })
              .catch((response) => {
                setLoading(false); // Hide loading on error as well
              });
          }, 1000); // Simulate 1 second delay
        }
      };
  
      // Button to open modal
      const addButtonElement = React.createElement(
        'a',
        {
           className: `addButton ${savedAddressCount < maxCount ? 'form_option_shipping' : ''}`,
          onClick: handleModalToggle, // Trigger modal toggle
          style: {
            padding: '8px 56px',
            backgroundColor: '#000000',
            color: '#fff',
            border: 'none',
            borderRadius: '5px',
            cursor: 'pointer', 
          },
        },
        'Add'
      );
  
      const dynamicOptions = Object.keys(shippingUserData).map((key) =>
        React.createElement('option', { value: key }, shippingUserData[key].reference_field)
      );
  
      const selectDropdownElement = React.createElement(
        'select',
        {
          value: selectedOption,
          onChange: handleSelectChange,
          className: `shipping-address-dropdown ${loading ? 'loading' : ''}`,
          style: {
            marginBottom: '0px',
            padding: '10px',
            borderRadius: '5px',
            width: '26%',
            opacity: loading ? 0.4 : 1, 
            pointerEvents: loading ? 'none' : 'auto'
          },
        },
        React.createElement('option', { value: '' }, 'Select a shipping Address'),
        ...dynamicOptions  
      );
  
      // Modal Element
      const modalElement = isModalOpen &&
        React.createElement(
          'div',
          {
            className: 'dsabafw_modal-content',
            style: {
              background: '#000000',
              padding: '20px',
              border: '1px solid #000',
              borderRadius: '5px',
              position: 'fixed',
              top: '50%',
              left: '50%',
              transform: 'translate(-50%, -50%)',
              zIndex: 9999,
              width:'80%'
            },
          },
          React.createElement('span', {
            className: 'dsabafw_close',
            onClick: handleModalClose,
            style: { cursor: 'pointer', float: 'right', fontSize: '20px' },
            children: '×',
          }),
          React.createElement(
            'h3',
            { className: 'dsabafw_border', style: { margin: '20px 0', color:'#ffffff' } },
            savedAddressCount >= maxCount ? 'You can add a maximum of 3 addresses!' : 'Add your shipping address here!'
          )
        );
  
      const exampleFieldsElement = React.createElement(
        'div',
        {
          className: 'example-fields',
          style: {
            display: 'flex',
            alignItems: 'center',
            gap: '2px',
          },
        },
        selectDropdownElement,
        addButtonElement,
        loading && React.createElement('div', { style: { marginLeft: '10px', fontWeight: 'bold' } }, 'Loading...'),
        modalElement // Add the modal to the render
      );
  
      return exampleFieldsElement;
    },
  });
  


})();
