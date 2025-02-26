jQuery(function() {
    function ratingEnable() {
        jQuery('#example-1to10').barrating('show', {
            theme: 'bars-1to10'
        });

        jQuery('#example-movie').barrating('show', {
            theme: 'bars-movie'
        });

        jQuery('#example-movie').barrating('set', 'Mediocre');

        jQuery('#example-square').barrating('show', {
            theme: 'bars-square',
            showValues: true,
            showSelectedRating: false
        });

        jQuery('#example-pill').barrating('show', {
            theme: 'bars-pill',
            initialRating: 'A',
            showValues: true,
            showSelectedRating: false,
            allowEmpty: true,
            emptyValue: '-- no rating selected --',
            onSelect: function(value, text) {
                alert('Selected rating: ' + value);
            }
        });

        jQuery('#example-reversed').barrating('show', {
            theme: 'bars-reversed',
            showSelectedRating: true,
            reverse: true
        });

        jQuery('#example-horizontal').barrating('show', {
            theme: 'bars-horizontal',
            reverse: true,
            hoverState: false
        });

        jQuery('#example-fontawesome').barrating({
            theme: 'fontawesome-stars',
            showSelectedRating: false
        });

        jQuery('#example-css').barrating({
            theme: 'css-stars',
            showSelectedRating: false
        });

        jQuery('#example-bootstrap').barrating({
            theme: 'bootstrap-stars',
            showSelectedRating: false
        });

        var currentRating = jQuery('#example-fontawesome-o').data('current-rating');

        jQuery('.stars-example-fontawesome-o .current-rating')
            .find('span')
            .html(currentRating);

        jQuery('.stars-example-fontawesome-o .clear-rating').on('click', function(event) {
            event.preventDefault();

            jQuery('#example-fontawesome-o')
                .barrating('clear');
        });

        jQuery('#example-fontawesome-o').barrating({
            theme: 'fontawesome-stars-o',
            showSelectedRating: false,
            initialRating: currentRating,
            onSelect: function(value, text) {
                if (!value) {
                    jQuery('#example-fontawesome-o')
                        .barrating('clear');
                } else {
                    jQuery('.stars-example-fontawesome-o .current-rating')
                        .addClass('hidden');

                    jQuery('.stars-example-fontawesome-o .your-rating')
                        .removeClass('hidden')
                        .find('span')
                        .html(value);
                }
            },
            onClear: function(value, text) {
                jQuery('.stars-example-fontawesome-o')
                    .find('.current-rating')
                    .removeClass('hidden')
                    .end()
                    .find('.your-rating')
                    .addClass('hidden');
            }
        });
    }

    function ratingDisable() {
        jQuery('select').barrating('destroy');
    }

    jQuery('.rating-enable').click(function(event) {
        event.preventDefault();

        ratingEnable();

        jQuery(this).addClass('deactivated');
        jQuery('.rating-disable').removeClass('deactivated');
    });

    jQuery('.rating-disable').click(function(event) {
        event.preventDefault();

        ratingDisable();

        jQuery(this).addClass('deactivated');
        jQuery('.rating-enable').removeClass('deactivated');
    });

    ratingEnable();
});
