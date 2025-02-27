(function ($) {
    "use strict";

    $(document).ready(function() {

        $(document).on("click", ".aarambha-cre-edit-sn", function (event) {
            var $this = $(this),
                tableRow = $this.closest('.aarambha-cre-sn-tr');
            tableRow.find('.aarambha-cre-sn-field').removeClass('hide');
            tableRow.find('.aarambha-cre-sn-title').hide();
            $this.siblings('.aarambha-cre-update-sn').removeClass('hide');
            $this.addClass('hide');
            event.preventDefault();
        });

        $(document).on("click", ".aarambha-cre-update-sn", function (event) {
            var $this = $(this),
                tableRow = $this.closest('.aarambha-cre-sn-tr');
            tableRow.find('.aarambha-cre-sn-field').addClass('hide');
            tableRow.find('.aarambha-cre-sn-title').show().html(tableRow.find('input[type="text"]').val());
            $this.siblings('.aarambha-cre-edit-sn').removeClass('hide');
            $this.addClass('hide');
            event.preventDefault();
        });

        /**
         * Adds formatted price preview on price fields in Property MetaBox.
         *
         * @since 1.0.0
         */
        function crePricePreview(element) {
            var $element = $(element),
                $price = $.trim($element.val()),
                $parent = $element.parent('.rwmb-input'),
                locale = $('html').attr('lang'),
                formatter = new Intl.NumberFormat(locale);

            $parent
                .css('position', 'relative')
                .append('<strong class="cre-price-preview"></strong>');

            var $preview = $parent.find('.cre-price-preview');

            if ($price) {
                $price = formatter.format($price);

                if ('NaN' !== $price && '0' !== $price) {
                    $preview.addClass('overlap').text($price);
                }
            }

            $element.on('input', function () {
                var price = $.trim($(this).val());

                price = formatter.format(price);
                if ('NaN' === price || '0' === price) {
                    $preview.text('');
                } else {
                    $preview.text(price);
                }
            });

            $element.on('focus', function () {
                $preview.removeClass('overlap');
            });

            $element.on('blur', function () {
                $preview.addClass('overlap');
            });

            $preview.on('click', function () {
                $element.focus();
            });
        }

        crePricePreview('#cre_property_price');
        crePricePreview('#cre_property_old_price');
    });

}(jQuery));