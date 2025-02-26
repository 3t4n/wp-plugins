(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */


	 

})( jQuery );
var $ = jQuery;
$(document).ready(function(){
	const accordionTriggers = document.querySelectorAll('.accordion__item--trigger');
	console.log(accordionTriggers);
 accordionTriggers.forEach((trigger) => {
   trigger.addEventListener('click', expandAccordion);
 });
 
 function expandAccordion(event) {
	 const { target: targetElement } = event;
	 const isPanelExpanded = targetElement.getAttribute('aria-expanded');
	 
	 collapseAllAccordions();
	 
	 if (isPanelExpanded === "false") {
		 targetElement.setAttribute('aria-expanded', true);
	 } else {
		 targetElement.setAttribute('aria-expanded', false);
	 }
 }
 
 function collapseAllAccordions() {
	 accordionTriggers.forEach((trigger) => {
		 trigger.setAttribute('aria-expanded', false);
	 });
 }
});