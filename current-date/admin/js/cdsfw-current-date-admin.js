(function ($) {
    'use strict';

    $(document).ready(function () {
        $('.card').on('click', function () {
            // Get the shortcode text to copy
            let $shortcodeElement = $(this).find('.shortcode');
            let shortcode = $shortcodeElement.text();

            // Create a temporary element to copy the text
            let $tempElement = $('<textarea>');
            $tempElement.val(shortcode);
            $tempElement.attr('readonly', '');
            $tempElement.css({
                position: 'absolute',
                left: '-9999px'
            });

            $('body').append($tempElement);

            // Select the text in the temporary element
            $tempElement.select();

            // Copy the text to the clipboard
            document.execCommand('copy');

            // Remove the temporary element
            $tempElement.remove();

            // Apply the provided CSS styles to the existing element
			let $copiedMessage = $('<div class="cdsfw-after-copy-text">' + shortcode + ' - Shortcode Copied to Clipboard!</div>');
            $copiedMessage.css({
                'top': '36px',
                'z-index': '9999',
                'position': 'fixed',
                'width': '450px',
                'left': '50%',
                'transform': 'translateX(-50%)',
                'text-align': 'center',
                'font-size': '14px',
                'font-weight': '400',
                'text-transform': 'capitalize',
                'padding': '13px 15px',
                'line-height': '15px',
                'color': '#5db62e',
                'border-radius': '4px',
                'background': '#eaf8e1',
                'border': '1px solid #a2de83'
            });

            $(this).append($copiedMessage);

            // Hide the "Copied" message after 2 seconds
            setTimeout(function () {
                $copiedMessage.remove();
            }, 2000);
        });
    });

})(jQuery);