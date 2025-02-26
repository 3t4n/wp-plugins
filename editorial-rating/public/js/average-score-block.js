(function ($) {
	'use strict';

	$(document).ready(function(){

        $('.wpas-freemium-table-main table tbody tr td:contains("✓")').html('<span class="wpas-ft-check-span">✓</span>');
        $('.wpas-freemium-table-main table tbody tr td:contains("✗")').html('<span class="wpas-ft-cross-span">✗</span>');

    });
})(jQuery);