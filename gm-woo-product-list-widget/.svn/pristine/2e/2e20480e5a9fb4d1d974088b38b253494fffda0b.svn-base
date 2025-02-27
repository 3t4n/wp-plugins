const { registerBlockType } = wp.blocks;
const { SelectControl } = wp.components;
const { createElement, useEffect } = wp.element;

registerBlockType('gmwplw/gmwplw-block', {
    title: 'Product Shortcode - Widget - Block for Woocommerce',
    category: 'common',
    attributes: {
        selectedOption: {
            type: 'string',
            default: ''
        }
    },
    edit: (props) => {
        const { attributes, setAttributes } = props;

        // Set the default value to the first option if none is selected
        useEffect(() => {
            if (!attributes.selectedOption && gmwplwBlockData.options.length > 0) {
                setAttributes({ selectedOption: gmwplwBlockData.options[0].value });
            }
        }, []);

        return createElement(SelectControl, {
            label: 'Choose a Product Widget',
            value: attributes.selectedOption,
            options: gmwplwBlockData.options, // Access the PHP-passed options
            onChange: (newValue) => setAttributes({ selectedOption: newValue })
        });
    },
    save: () => {
        return null; // Server-side rendering only
    }
});
