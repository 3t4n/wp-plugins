const { registerBlockType } = wp.blocks;
const { TextControl } = wp.components;
const { InspectorControls } = wp.blockEditor;
const { createElement } = wp.element;

const icon = createElement('svg', { 
        width: 44, 
        height: 44, 
        viewBox: '0 0 192 192', 
        className: 'dashicon' 
    }, 
    createElement('g', { 
        transform: 'translate(0.000000,192.000000) scale(0.100000,-0.100000)', 
        fill: '#2572c7', 
        stroke: 'none' 
    }, 
        createElement('path', {
            d: 'M1090 1844 c-18 -8 -163 -72 -245 -109 -227 -103 -252 -120 -294 -200 -43 -82 -20 -208 52 -282 l31 -33 -31 -32 c-90 -94 -83 -247 13 -340 31 -29 72 -50 189 -94 83 -30 156 -59 163 -63 8 -4 -55 -38 -160 -87 -185 -84 -227 -113 -260 -178 -28 -52 -30 -165 -5 -212 50 -96 118 -138 222 -139 68 0 77 3 285 99 118 54 230 109 247 123 18 13 45 45 60 71 24 40 28 58 28 122 0 85 -14 119 -70 173 l-35 34 21 19 c99 90 101 252 4 349 -41 41 -83 61 -308 145 -33 12 -55 25 -50 30 4 4 81 40 170 80 182 82 218 107 252 174 20 40 22 59 19 124 -3 64 -8 84 -32 119 -43 64 -110 103 -187 108 -35 3 -71 2 -79 -1z m131 -135 c58 -41 74 -109 39 -166 -25 -41 -16 -36 -269 -153 l-215 -99 -35 15 c-77 32 -112 95 -91 160 7 20 22 45 35 56 13 11 112 62 221 113 219 103 261 113 315 74z m-225 -625 c238 -89 259 -104 259 -187 0 -36 -6 -60 -20 -79 -20 -26 -74 -58 -99 -58 -15 0 -393 142 -426 160 -46 25 -64 114 -35 170 15 29 75 69 104 70 8 0 106 -34 217 -76z m231 -496 c46 -38 55 -136 17 -180 -11 -12 -64 -42 -119 -68 -362 -172 -380 -177 -446 -111 -33 33 -39 45 -39 81 0 83 23 101 265 210 28 13 93 42 144 66 92 41 96 42 130 28 19 -8 41 -20 48 -26z',
        })
    )
);


registerBlockType('api-widgets/block', {
    title: 'API Widgets',
    icon: icon,
    category: 'widgets',
    previewImage: {
        url: apiWidgetsBlock.pluginUrl + 'assets/img/icon-blue.png',
    },
    attributes: {
        id: {
            type: 'string',
        },
    },

    edit: function(props) {
        const { attributes, setAttributes } = props;

        return wp.element.createElement(
            'div',
            null,
            wp.element.createElement(
                InspectorControls,
                null,
                wp.element.createElement(TextControl, {
                    label: 'ID',
                    value: attributes.id,
                    onChange: function(value) {
                        setAttributes({ id: value });
                    }
                })
            ),
            wp.element.createElement(
                'p',
                null,
                'API Widgets - ' + (attributes.id ? 'ID: ' + attributes.id : 'Set an ID in the Block Settings.')
            )
        );
    },

    save: function() {
        return null; // Block is rendered dynamically on the server
    },
});