(function ($) {
    $('.has-spinner').attr("disabled", false);
    $.fn.buttonLoader = function (action) {
        const self = $(this);
        if (action == 'start') {
            if (self.prop("disabled")) {
                return false;
            }
            $('.has-spinner').prop("disabled", true);
            const originalText = self.text(); // Capture the original text
            const loadingText = self.data('load-text') || 'Loading'; // Use data attribute or default

            self.data('btn-text', originalText).html('<span><img src="' + buttonLoaderParams.svgPath + '" alt="' + loadingText + '" style="margin: 5px 0 -5px;height: 20px; width: 20px;"/></span> ' + loadingText).addClass('active');
        }
        if (action == 'stop') {
            self.html(self.data('btn-text')).removeClass('active');
            $('.has-spinner').prop("disabled", false);
        }
    }
})(jQuery);
