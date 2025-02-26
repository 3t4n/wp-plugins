/* ==========================================================================
   Adds a custom class where field instructions exist
   ========================================================================== */

jQuery(document).ready(function() {

	jQuery('.acf-field .acf-label:has(p.description)').addClass('jp-simple-acf-tooltip-has-instruction');
	jQuery('.acf-repeater .acf-th:has(p.description)').addClass('jp-simple-acf-tooltip-has-instruction');

});