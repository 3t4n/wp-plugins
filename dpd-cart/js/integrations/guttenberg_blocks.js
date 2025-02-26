/** @const DPD */
const el = wp.element.createElement;
const {registerBlockType} = wp.blocks;
const {InspectorControls} = wp.editor;
const {SelectControl, ToggleControl, ColorPicker, TextControl, PanelBody} = wp.components;

const attrNames = ['href', 'data-text', 'data-button-size', 'data-lightbox', 'data-variant', 'data-bg-color',
    'data-bg-color-hover', 'data-text-color', 'data-pr-bg-color', 'data-pr-color'];
const dpdIcon = el('svg',
    {
        width: 1125,
        height: 1024,
        viewBox: "0 0 1125 1024",
    },
    el('path',
        {
            fill: '#333',
            d: "M1012.274 376.43c-51.134 253.854-233.183 395.046-512.060 398.914h-229.678l24.177-92.596-294.713 167.786 204.413 173.588 23.21-84.618h272.108c293.867 0 539.38-157.994 583.019-464.433 42.188-295.922-43.155-432.64-292.416-474.828 181.325 33.847 266.668 153.763 221.941 376.43z"
        },
    ),
    el('path',
        {
            fill: '#333',
            d: "M569.601 101.904h-31.792c-0.498-0.025-1.082-0.040-1.669-0.040-17.177 0-31.478 12.311-34.561 28.591l-0.035 0.219-114.597 429.739c-5.077 18.858 1.692 28.408 19.341 28.77h138.895c150.258 0 272.591-90.541 314.296-244.184s-33.605-243.096-183.863-243.096z"
        },
    )
);

function dpdAttributes(attributes) {
    let out = {};
    attributes.forEach(
        function (attr) {
            out[attr] = {
                type: 'attribute',
                selector: 'a',
                attribute: attr,
                default: DPD[attr]
            }
        }
    );
    return out;
}

let attributes = dpdAttributes(attrNames);
// add block align support
attributes['align'] = {type: 'string', default: 'full'};
//setting default value for href
attributes.href.default = DPD.products[0].value;
registerBlockType('dpd-cart/block', {
    title: 'DPD Button',
    description: 'Show DPD Cart button with many styles.',
    icon: dpdIcon,
    category: 'embed',
    attributes: attributes,
    supports: {
        align: true,
    },

    edit: function (props) {
        function PanelColorPicker(title, attrName) {
            return el(
                PanelBody,
                {
                    title: title,
                    initialOpen: false,
                },
                el(
                    ColorPicker,
                    {
                        onChangeComplete: function (x) {
                            props.setAttributes({[attrName]: x.hex.substr(1)});
                        },
                        color: '#' + props.attributes[attrName],
                        disableAlpha: true
                    }
                )
            );
        }

        function DpdSelect(title, options, attrName) {
            return el(
                SelectControl,
                {
                    label: title,
                    options: options,
                    value: props.attributes[attrName],
                    onChange: function (x) {
                        props.setAttributes({[attrName]: x});
                    }
                },
            );
        }

        function DpdToggle(title, attrName) {
            return el(
                ToggleControl,
                {
                    label: title,
                    checked: props.attributes[attrName],
                    onChange: function (x) {
                        props.setAttributes({[attrName]: x});
                    }
                },
            );
        }

        function DpdText(title, attrName) {
            return el(
                TextControl, {
                    label: title,
                    value: props.attributes[attrName],
                    onChange: function (x) {
                        props.setAttributes({[attrName]: x});
                    }
                }
            );
        }

        function at(name, prefix = '') {
            return prefix + props.attributes[name];
        }

        const dpdGeneralSettings = el(
            PanelBody,
            {
                title: 'General Setting',
                initialOpen: true,
            },
            DpdToggle('Use LightBox', 'data-lightbox'),
            DpdSelect('Button Size',
                [
                    {value: 'dpd-small', label: "Small"},
                    {value: 'dpd-medium', label: "Medium"},
                    {value: 'dpd-large', label: "Large"},
                ],
                'data-button-size'
            ),
            DpdSelect('Price Position',
                [
                    {value: 'price-none', label: "Don't Show Price"},
                    {value: 'price-left', label: "Price on Left"},
                    {value: 'price-right', label: "Price on Right"},
                    {value: 'price-top', label: "Price on Top"},
                ],
                'data-variant'
            )
        );
        const controls = [
            el(
                InspectorControls,
                {},
                dpdGeneralSettings,
                PanelColorPicker('Button Color', 'data-bg-color'),
                PanelColorPicker('Button Hover Color', 'data-bg-color-hover'),
                PanelColorPicker('Button Text Color', 'data-text-color'),
                PanelColorPicker('Price Color', 'data-pr-color'),
                PanelColorPicker('Price Background Color', 'data-pr-bg-color')
            )

        ];

        return [
            controls,
            DpdSelect('Select Product', DPD.products, 'href'),
            DpdText('Button Text', 'data-text')
        ]
    },

    save: function (props) {
        let dataAttr = {"data-dpd-type": "button"};
        attrNames.forEach(function (attrName) {
            dataAttr[attrName] = props.attributes[attrName];
        });
        return el(
            'div', {},
            el('a', dataAttr)
        );
    },
});