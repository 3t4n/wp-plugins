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

function ivisa_select_changed(el){
  var $wrap = jQuery(el).closest('.ivisa-widget');
  var to = $wrap.find('[name="to_country"] option:selected').val();
  var from = $wrap.find('[name="from_country"] option:selected').val();
  
  if(to.length != 2 || from.length !=2)
    return;
  
  $wrap.find('[name="to_country"]').val('')
  $wrap.find('[name="from_country"]').val('')
  $wrap.find('.ivisa-widget-results').html('');
  $wrap.find('.ivisa-overlay').css('visibility','visible').css('opacity',1);
  var url = 'https://www.ivisa.com/visa-requirements';
  url = url + '?wp_plugin=1&to='+to+'&from='+from;
  
  var $aff = $wrap.find('[data-ivisa-affiliate]');
  if($aff != null && $aff.length != 0 && $aff.attr('data-ivisa-affiliate').length > 0)
    url += '&utm_source=' + $aff.attr('data-ivisa-affiliate') + '&utm_medium=wp_plugin'
  
  jQuery.ajax({ 'url': url }).always(function(data){
    $wrap.find('.ivisa-widget-results').html(data);
    
  });
  
}

function ivisa_close_modal(el){
  var $wrap = jQuery(el).closest('.ivisa-widget');
  $wrap.find('.ivisa-overlay').css('visibility','hidden').css('opacity',0);
}

if(typeof gtrack == "undefined"){
  function gtrack(){ return true }
}
