(function (blocks, i18n, element, components) {
    var SelectControl = components.SelectControl;
    var blockStyle = { padding: '2px' };
console.log(SelectControl);
    var el = element.createElement; // The wp.element.createElement() function to create elements.

    blocks.registerBlockType('photo-portfolio-gallery/photo-portfolio', {
        title: 'WebPace Portfolio',

        icon: 'format-gallery',

        category: 'photo-portfolio-gallery',

        attributes: {
            portfolio_id: {
                type: 'string'
            }
        },

        edit: function (props) {
            console.log(photoPortfolioBlockI10n.portfolios);

            /*return el(
              'div',
                {},
                'br'
            );*/

            var focus = props.focus;

            props.attributes.portfolio_id =  props.attributes.portfolio_id &&  props.attributes.portfolio_id != '0' ?  props.attributes.portfolio_id : false;

            return el(
                SelectControl,
                {
                    label: 'Select WebPace Portfolio',
                    value: props.attributes.portfolio_id ? parseInt(props.attributes.portfolio_id) : 0,
                    instanceId: 'photo-portfolio-selector',
                    onChange: function (value) {
                        props.setAttributes({portfolio_id: value});
                    },
                    options: photoPortfolioBlockI10n.portfolios,
                }
            );

        },

        save: function (props) {
            return el('p', {style: blockStyle}, '[web_pace_portfolio id="'+props.attributes.portfolio_id+'"]');
        },
    });
})(
    window.wp.blocks,
    window.wp.i18n,
    window.wp.element,
    window.wp.components
);