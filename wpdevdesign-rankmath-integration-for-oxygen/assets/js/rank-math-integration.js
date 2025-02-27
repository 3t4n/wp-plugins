(function ($) {
	RankMathIntegration = function () {
		wp.hooks.addFilter('rank_math_content', 'rank-math', this.replaceDataWithOxygenMarkup);
	}

	/**
	 * Replaces the full content with Oxygen generated markup, as it is supposed to contain the_content too
	 *
	 * @param data The data to modify
	 */
	RankMathIntegration.prototype.replaceDataWithOxygenMarkup = function ( data ) {
		return data + rm_data.oxygen_markup;
	};

	$(document).ready(function () {
		new RankMathIntegration();
	});
})(jQuery);
