jQuery(document).ready(function($) {
    const countDecimals = value => (Math.floor(value) === value ? 0 : value.toString().split(".")[1]?.length || 0);

    const renderSlider = () => {
        $('.slider-display').each(function(i, GFSlider) {
            if (!$(this).hasClass('slider-initialized')) {
                const slider = $(this);
                const input = slider.prev(':input');
                const value = input.val();
                const gfield = input.attr('id');
                const tabindex = input.attr('tabindex');
                const minrel = input.data('min-relation');
                const maxrel = input.data('max-relation');
                const min = parseFloat(input.attr('min'));
                const max = parseFloat(input.attr('max'));
                let step = parseFloat(input.attr('step'));
                const visibility = input.data('value-visibility');
                const connect = input.data('connect');
                const format = input.data('value-format');
                let decs = countDecimals(step);

                if (format === 'currency') {
                    const currency = input.data('currency');
                    if (currency.decimals < decs) {
                        step = [1, 0.1, 0.01][currency.decimals] || step;
                    }
                    decs = currency.decimals;
                }

                let formatTooltip = false;
                if (['hover-drag', 'show'].includes(visibility)) {
                    if (format === 'currency') {
                        const currency = input.data('currency');
                        formatTooltip = wNumb({
                            decimals: currency.decimals,
                            mark: currency.decimal_separator,
                            thousand: currency.thousand_separator,
                            prefix: currency.symbol_left + currency.symbol_padding,
                            postfix: currency.symbol_padding + currency.symbol_right,
                        });
                    } else {
                        formatTooltip = wNumb({
                            decimals: decs,
                            mark: format === 'decimal_comma' ? ',' : undefined,
                            thousand: format === 'decimal_comma' ? '.' : undefined,
                        });
                    }
                }

                noUiSlider.create(GFSlider, {
                    start: [value],
                    step: step,
                    range: {
                        min: [min],
                        max: [max],
                    },
                    format: wNumb({
                        decimals: decs,
                    }),
                    connect: connect,
                    tooltips: formatTooltip,
                });

                slider.addClass('slider-initialized');

                GFSlider.noUiSlider.on('update', function(sliderVal) {
                    input.attr('value', sliderVal).change();
                });

                document.getElementById(gfield).addEventListener('change', function() {
                    GFSlider.noUiSlider.set(this.value);
                });

                slider.append(`<span class="min-val-relation">${minrel}</span><span class="max-val-relation">${maxrel}</span>`);
            }
        });
    };

    const initSlider = () => {
        if ($('.gfield .slider').length) {
            renderSlider();
        }
    };

    jQuery(document).bind('gform_page_loaded', initSlider);

    initSlider();
});
