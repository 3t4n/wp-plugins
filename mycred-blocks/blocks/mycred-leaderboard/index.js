(function (wp) {
    var registerBlockType = wp.blocks.registerBlockType;
    var InspectorControls = wp.editor.InspectorControls;
    var el = wp.element.createElement;
    var TextControl = wp.components.TextControl;
    var SelectControl = wp.components.SelectControl;
    var ToggleControl = wp.components.ToggleControl;
    var __ = wp.i18n.__;
    registerBlockType('mycred-blocks/mycred-leaderboard', {
        title: __('Leaderboard', 'mycred-gutenberg'),
        category: 'mycred',
        attributes: {
            number: {
                type: 'integer',
                default: '25'
            },
            order: {
                type: 'string'
            },
            offset: {
                type: 'string'
            },
            type: {
                type: 'string'
            },
            based_on: {
                type: 'string',
                default: 'balance'
            },
            total: {
                type: 'bool',
                default: false
            },
            wrap: {
                type: 'string',
                default: 'li'
            },
            template: {
                type: 'string',
                default: '#%position% %user_profile_link% %cred_f%'
            },
            nothing: {
                type: 'string',
                default: 'Leaderboard is empty'
            },
            current: {
                type: 'bool',
                default: false
            },
            timeframe: {
                type: 'string'
            },
            exclude_zero: {
                type: 'bool',
                default: true
            }
        },
        edit: function (props) {
            var number = props.attributes.number;
            var order = props.attributes.order;
            var offset = props.attributes.offset;
            var type = props.attributes.type;

            var based_on = props.attributes.based_on;
            var total = props.attributes.total;
            var wrap = props.attributes.wrap;

            var template = props.attributes.template;
            var nothing = props.attributes.nothing;
            var current = props.attributes.current;
            var exclude_zero = props.attributes.exclude_zero;
            var timeframe = props.attributes.timeframe;

            var options = [];
            function setNumber(value) {
                props.setAttributes({number: value});
            }
            function setOffset(value) {
                props.setAttributes({offset: value});
            }
            function setOrder(value) {
                props.setAttributes({order: value});
            }

            function setType(value) {
                props.setAttributes({type: value});
            }

            function setBasedOn(value) {
                props.setAttributes({based_on: value});
            }

            function setTotal(value) {
                props.setAttributes({total: value});
            }
            function setWrap(value) {
                props.setAttributes({wrap: value});
            }

            function setTemp(value) {
                props.setAttributes({template: value});
            }

            function setNth(value) {
                props.setAttributes({nothing: value});
            }

            function setCurrent(value) {
                props.setAttributes({current: value});
            }
            function setExclude(value) {
                props.setAttributes({exclude_zero: value});
            }

            function setTimeFrame(value) {
                props.setAttributes({timeframe: value});
            }
            Object.keys(mycred_types).forEach(function (key) {
                options.push({
                    label: mycred_types[key],
                    value: key
                });
            });
            return el('div', {}, [
                el('p', {}, __('Leaderboard Shortcode', 'mycred-gutenberg')
                        ),
                el(InspectorControls, null,
                        el(TextControl, {
                            label: __('Number of Users', 'mycred-gutenberg'),
                            help: __('The maximum number of users to include in the leaderboard.', 'mycred-gutenberg'),
                            value: number,
                            onChange: setNumber

                        }),
                        el(SelectControl, {
                            label: __('Order', 'mycred-gutenberg'),
                            help: __('Order of the leaderboard. Either ASC for ascending or DESC for descending order.', 'mycred-gutenberg'),
                            value: order,
                            onChange: setOrder,
                            options: [
                                {label: 'Descending', value: 'DESC'},
                                {label: 'Ascending', value: 'ASC'}
                            ]
                        }),
                        el(TextControl, {
                            label: __('Offset', 'mycred-gutenberg'),
                            help: __('Option to offset the results. Use zero for no offset.', 'mycred-gutenberg'),
                            value: offset,
                            onChange: setOffset
                        }),
                        el(SelectControl, {
                            label: __('Point Type', 'mycred-gutenberg'),
                            help: __('The point type you want to show a leaderboard for.', 'mycred-gutenberg'),
                            value: type,
                            onChange: setType,
                            options
                        }),
                        el(TextControl, {
                            label: __('Based On', 'mycred-gutenberg'),
                            help: __('Use "balance" for a leaderboard based on your users balances. Otherwise use the reference you want to base the leaderboard on. Can not be empty!', 'mycred-gutenberg'),
                            value: based_on,
                            onChange: setBasedOn
                        }),
                        el(ToggleControl, {
                            label: __('Total', 'mycred-gutenberg'),
                            checked: total,
                            onChange: setTotal
                        }),
                        el(TextControl, {
                            label: __('Row Wrap Element', 'mycred-gutenberg'),
                            help: __('The HTML element you want to use for each row in the leaderboard. Will default to list element (li).', 'mycred-gutenberg'),
                            value: wrap,
                            onChange: setWrap
                        }),
                        el(TextControl, {
                            label: __('Row Template', 'mycred-gutenberg'),
                            help: __('The template to use for each row.', 'mycred-gutenberg'),
                            value: template,
                            onChange: setTemp
                        }),
                        el(TextControl, {
                            label: __('No Results', 'mycred-gutenberg'),
                            help: __('Message to show when there are no results to show.', 'mycred-gutenberg'),
                            value: nothing,
                            onChange: setNth
                        }),
                        el(ToggleControl, {
                            label: __('Current Users Position', 'mycred-gutenberg'),
                            help: __('Select if you want to include the current users position in the leaderboard.', 'mycred-gutenberg'),
                            checked: current,
                            onChange: setCurrent
                        }),
                        el(ToggleControl, {
                            label: __('Exclude Zero Balance', 'mycred-gutenberg'),
                            help: __('Only applicable for leaderboards based on balance. By default zero balances are ignored but you can select to override this.', 'mycred-gutenberg'),
                            checked: exclude_zero,
                            onChange: setExclude
                        }),
                        el(TextControl, {
                            label: __('Timeframe', 'mycred-gutenberg'),
                            help: __('Option to limit the leaderboard to a specific timeframe. Leave empty for all time, use "today" for todays leaderboard, "this-week" for this weeks leaderboard, "this-month" for this months leaderboard or enter a date to calculate from (until today). Date must be formatted either YYYY-MM-DD or MM/DD/YYYY. (Requires 1.7)', 'mycred-gutenberg'),
                            value: timeframe,
                            onChange: setTimeFrame
                        }),
                        )
            ]);
        },
        save: function (props) {
            return null;
        }
    });
})(window.wp);