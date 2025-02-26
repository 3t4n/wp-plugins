/*
 * Author: Michael Finkenberger
 * @since V2.5.5.0
 * Last change in plugin version: V2.5.5.0 (A table with a list of users that did not vote so far for a poll is being displayed interactively as a tooltip when hovering with the mouse over the related bar graph)
 * Date: 23.01.2024
 * Tested with the latest plugin version
*/

var $ = jQuery;
var foodle_non_voters_timeout;

var foodle_non_voters_delay_default = 0; // the default value
var foodle_non_voters_delay = foodle_non_voters_delay_default; // delay before to show the foodle_non_voters_tooltip in ms
var foodle_non_voters_d_y_default = -60; // the default value
var foodle_non_voters_d_x_default = 15; // the default value
var foodle_non_voters_d_y = foodle_non_voters_d_y_default; // Horizontal distance between mousepointer and foodle_non_voters_tooltip in pixels
var foodle_non_voters_d_x = foodle_non_voters_d_x_default; // Horizontal distance between mousepointer and foodle_non_voters_tooltip in pixels



$(document).ready(function() {
  foodle_activate_non_voters_tooltips();
});
function foodle_activate_non_voters_tooltips() {
  // Tooltips
  var foodle_non_voters_jqueryTooltip = $('<div id="foodle_non_voters_jqueryTooltip"></div>');
  $('body').append(foodle_non_voters_jqueryTooltip);
  $('[foodle_non_voters_tooltip]').hover(function(e) { // Mouse in
    $('html,body').css('cursor','context-menu'); // Change the cursor as wanted
    var foodle_this = $(this);
    if ( foodle_this.attr('foodle_non_voters_tooltip_delay') ) foodle_non_voters_delay = foodle_this.attr('foodle_non_voters_tooltip_delay'); // Set delay, if provided through the element
    if ( foodle_this.attr('foodle_non_voters_tooltip_dy') ) foodle_non_voters_d_y = foodle_this.attr('foodle_non_voters_tooltip_dy') * 1; // Set vertical distance, if provided through the element
    if ( foodle_this.attr('foodle_non_voters_tooltip_dx') ) foodle_non_voters_d_x = foodle_this.attr('foodle_non_voters_tooltip_dx') * 1; // Set horizontal distance, if provided through the element
    var foodle_id = foodle_this.attr('foodle_non_voters_tooltip');
    foodle_non_voters_jqueryTooltip.html('<div class="mf_foodle_non_voters_response" id="mf_foodle_non_voters_response_' + foodle_id + '"><div class="mf_foodle_non_voters_overlay" id="mf_foodle_non_voters_overlay_' + foodle_id + '"></div><div class="mf_foodle_non_voters_content" id="mf_foodle_non_voters_content_' + foodle_id + '">' + foodle_id + '</div></div>'); // Define the foodle_non_voters_tooltip
    foodle_get_the_non_voters(foodle_id);
    var _t = e.pageY + foodle_non_voters_d_y;
    var _l = e.pageX + foodle_non_voters_d_x;
    foodle_non_voters_jqueryTooltip.css({ 'top':_t, 'left':_l }); // Define location of the foodle_non_voters_tooltip
    if ( foodle_id != '' ) foodle_non_voters_timeout = setTimeout( function(){foodle_non_voters_jqueryTooltip.show(100).css('display','block');}, foodle_non_voters_delay); // Show foodle_non_voters_tooltip with delay as long as the string isn't empty.
  },
  function() { // Mouse out
    $('html,body').css('cursor',''); // No specific cursor any more
    clearTimeout(foodle_non_voters_timeout); // Eliminate the timeout to avoid foodle_non_voters_tooltip to be shown after mouse out
    foodle_non_voters_jqueryTooltip.hide(100); // Hide foodle_non_voters_tooltip without delay
    foodle_non_voters_delay = foodle_non_voters_delay_default; // back to default
    foodle_non_voters_d_y = foodle_non_voters_d_y_default; // back to default
    foodle_non_voters_d_x = foodle_non_voters_d_x_default; // back to default
  }).mousemove(function(e) { // Mouse moving
    var $ = jQuery;
    var _t = e.pageY + foodle_non_voters_d_y;
    var _l = e.pageX + foodle_non_voters_d_x;
    foodle_non_voters_jqueryTooltip.css({ 'top':_t, 'left':_l });
  }); // mousedown was deleted as there's no button and in order to enable touchscreen functions
  
  // Action for touchscreens
  $('[foodle_non_voters_tooltip]').on({
    touch : function(e) { // Touched
      $('[foodle_non_voters_tooltip]').unbind('mousedown');
      $('[foodle_non_voters_tooltip]').unbind('hover');
      $('[foodle_non_voters_tooltip]').unbind('mousemove');
      $('html,body').css('cursor','context-menu'); // Change the cursor as wanted
      var foodle_this = $(this);
      if ( foodle_this.attr('foodle_non_voters_tooltip_delay') ) foodle_non_voters_delay = foodle_this.attr('foodle_non_voters_tooltip_delay'); // Set delay, if provided through the element
      if ( foodle_this.attr('foodle_non_voters_tooltip_dy') ) foodle_non_voters_d_y = foodle_this.attr('foodle_non_voters_tooltip_dy') * 1; // Set vertical distance, if provided through the element
      if ( foodle_this.attr('foodle_non_voters_tooltip_dx') ) foodle_non_voters_d_x = foodle_this.attr('foodle_non_voters_tooltip_dx') * 1; // Set horizontal distance, if provided through the element
      var foodle_id = foodle_this.attr('foodle_non_voters_tooltip');
      foodle_non_voters_jqueryTooltip.html('<div class="mf_foodle_non_voters_response" id="mf_foodle_non_voters_response_' + foodle_id + '"><div class="mf_foodle_non_voters_overlay" id="mf_foodle_non_voters_overlay_' + foodle_id + '"></div><div class="mf_foodle_non_voters_content" id="mf_foodle_non_voters_content_' + foodle_id + '">' + foodle_id + '</div></div>'); // Define the foodle_non_voters_tooltip
      foodle_get_the_non_voters(foodle_id);
      var _t = e.pageY + foodle_non_voters_d_y;
      var _l = e.pageX + foodle_non_voters_d_x;
      foodle_non_voters_jqueryTooltip.css({ 'top':_t, 'left':_l }); // Define location of the foodle_non_voters_tooltip
      if ( foodle_id != '' ) foodle_non_voters_timeout = setTimeout( function(){foodle_non_voters_jqueryTooltip.show(100).css('display','block');}, foodle_non_voters_delay); // Show foodle_non_voters_tooltip with delay as long as the string isn't empty.
    },
    focusout : function() { // Focus out
      $('html,body').css('cursor',''); // No specific cursor any more
      clearTimeout(foodle_non_voters_timeout); // Eliminate the timeout to avoid foodle_non_voters_tooltip to be shown after mouse out
      foodle_non_voters_jqueryTooltip.hide(100); // Hide foodle_non_voters_tooltip without delay
      foodle_non_voters_delay = foodle_non_voters_delay_default; // back to default
      foodle_non_voters_d_y = foodle_non_voters_d_y_default; // back to default
      foodle_non_voters_d_x = foodle_non_voters_d_x_default; // back to default
    }
  })
};

