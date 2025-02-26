/*
 * Author: Michael Finkenberger
 * @since V1.1.5.1
 * Last change in plugin version: V1.2.1.0
 * Date: 18.05.2021
 * Tested with plugin version: V1.2.2.0
*/

var $ = jQuery;
var mfdwc_timeout;

var mfdwc_delay_default = 400; // the default value
var mfdwc_delay = mfdwc_delay_default; // delay before to show the mfdwc_tooltip in ms
var mfdwc_d_y_default = 14; // the default value
var mfdwc_d_x_default = 14; // the default value
var mfdwc_d_y = mfdwc_d_y_default; // Horizontal distance between mousepointer and mfdwc_tooltip in pixels
var mfdwc_d_x = mfdwc_d_x_default; // Horizontal distance between mousepointer and mfdwc_tooltip in pixels



$(document).ready(function() {
  // Tooltips
  var mfdwc_jqueryTooltip = $('<div id="mfdwc_jqueryTooltip"></div>');
  $('body').append(mfdwc_jqueryTooltip);
  $('[mfdwc_tooltip]').hover(function(e) { // Mouse in
    $('html,body').css('cursor','help'); // Change the cursor as wanted
    var mfdwc_this = $(this);
    if ( mfdwc_this.attr('mfdwc_tooltip_delay') ) mfdwc_delay = mfdwc_this.attr('mfdwc_tooltip_delay'); // Set delay, if provided through the element
    if ( mfdwc_this.attr('mfdwc_tooltip_dy') ) mfdwc_d_y = mfdwc_this.attr('mfdwc_tooltip_dy') * 1; // Set vertical distance, if provided through the element
    if ( mfdwc_this.attr('mfdwc_tooltip_dx') ) mfdwc_d_x = mfdwc_this.attr('mfdwc_tooltip_dx') * 1; // Set horizontal distance, if provided through the element
    var mfdwc_tooltip = mfdwc_this.attr('mfdwc_tooltip');
    mfdwc_jqueryTooltip.html(mfdwc_tooltip); // Define the mfdwc_tooltip
    var _t = e.pageY + mfdwc_d_y;
    var _l = e.pageX + mfdwc_d_x;
    mfdwc_jqueryTooltip.css({ 'top':_t, 'left':_l }); // Define location of the mfdwc_tooltip
    if ( mfdwc_tooltip != '' ) mfdwc_timeout = setTimeout( function(){mfdwc_jqueryTooltip.show(100).css('display','block');}, mfdwc_delay); // Show mfdwc_tooltip with delay as long as the string isn't empty.
  },
  function() { // Mouse out
    $('html,body').css('cursor',''); // No specific cursor any more
    clearTimeout(mfdwc_timeout); // Eliminate the timeout to avoid mfdwc_tooltip to be shown after mouse out
    mfdwc_jqueryTooltip.hide(100); // Hide mfdwc_tooltip without delay
    mfdwc_delay = mfdwc_delay_default; // back to default
    mfdwc_d_y = mfdwc_d_y_default; // back to default
    mfdwc_d_x = mfdwc_d_x_default; // back to default
  }).mousemove(function(e) { // Mouse moving
    var $ = jQuery;
    var _t = e.pageY + mfdwc_d_y;
    var _l = e.pageX + mfdwc_d_x;
    mfdwc_jqueryTooltip.css({ 'top':_t, 'left':_l });
  }).mousedown(function(e) { // to avoid cursor conflicts in case it is a button
    $('html,body').css('cursor',''); // No specific cursor any more
    clearTimeout(mfdwc_timeout); // Eliminate the timeout to avoid mfdwc_tooltip to be shown after mouse out
    mfdwc_jqueryTooltip.hide(100); // Hide mfdwc_tooltip without delay
    mfdwc_delay = mfdwc_delay_default; // back to default
    mfdwc_d_y = mfdwc_d_y_default; // back to default
    mfdwc_d_x = mfdwc_d_x_default; // back to default
  });
});

