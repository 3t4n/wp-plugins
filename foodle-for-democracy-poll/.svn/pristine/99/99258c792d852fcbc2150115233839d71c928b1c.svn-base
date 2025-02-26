/*
 * Author: Michael Finkenberger
 * @since V2.5.1.1
 * Last change in plugin version: V2.5.2.0 (Enable touchscreen visibility)
 * Date: 16.01.2024
 * Tested with the latest plugin version
*/

var $ = jQuery;
var foodle_com_timeout;

var foodle_com_delay_default = 0; // the default value
var foodle_com_delay = foodle_com_delay_default; // delay before to show the foodle_com_tooltip in ms
var foodle_com_d_y_default = 11; // the default value
var foodle_com_d_x_default = 11; // the default value
var foodle_com_d_y = foodle_com_d_y_default; // Horizontal distance between mousepointer and foodle_com_tooltip in pixels
var foodle_com_d_x = foodle_com_d_x_default; // Horizontal distance between mousepointer and foodle_com_tooltip in pixels



$(document).ready(function() {
  foodle_activate_comments_tooltips();
});
function foodle_activate_comments_tooltips() {
  // Tooltips
  var foodle_com_jqueryTooltip = $('<div id="foodle_com_jqueryTooltip"></div>');
  $('body').append(foodle_com_jqueryTooltip);
  $('[foodle_com_tooltip]').hover(function(e) { // Mouse in
    $('html,body').css('cursor','context-menu'); // Change the cursor as wanted
    var foodle_this = $(this);
    if ( foodle_this.attr('foodle_com_tooltip_delay') ) foodle_com_delay = foodle_this.attr('foodle_com_tooltip_delay'); // Set delay, if provided through the element
    if ( foodle_this.attr('foodle_com_tooltip_dy') ) foodle_com_d_y = foodle_this.attr('foodle_com_tooltip_dy') * 1; // Set vertical distance, if provided through the element
    if ( foodle_this.attr('foodle_com_tooltip_dx') ) foodle_com_d_x = foodle_this.attr('foodle_com_tooltip_dx') * 1; // Set horizontal distance, if provided through the element
    var foodle_id = foodle_this.attr('foodle_com_tooltip');
    foodle_com_jqueryTooltip.html('<div class="mf_foodle_comments_response" id="mf_foodle_comments_response_' + foodle_id + '"><div class="mf_foodle_comments_overlay" id="mf_foodle_comments_overlay_' + foodle_id + '"></div><div class="mf_foodle_comments_content" id="mf_foodle_comments_content_' + foodle_id + '">' + foodle_id + '</div></div>'); // Define the foodle_com_tooltip
    foodle_get_the_democracy_comments(foodle_id);
    var _t = e.pageY + foodle_com_d_y;
    var _l = e.pageX + foodle_com_d_x;
    foodle_com_jqueryTooltip.css({ 'top':_t, 'left':_l }); // Define location of the foodle_com_tooltip
    if ( foodle_id != '' ) foodle_com_timeout = setTimeout( function(){foodle_com_jqueryTooltip.show(100).css('display','block');}, foodle_com_delay); // Show foodle_com_tooltip with delay as long as the string isn't empty.
  },
  function() { // Mouse out
    $('html,body').css('cursor',''); // No specific cursor any more
    clearTimeout(foodle_com_timeout); // Eliminate the timeout to avoid foodle_com_tooltip to be shown after mouse out
    foodle_com_jqueryTooltip.hide(100); // Hide foodle_com_tooltip without delay
    foodle_com_delay = foodle_com_delay_default; // back to default
    foodle_com_d_y = foodle_com_d_y_default; // back to default
    foodle_com_d_x = foodle_com_d_x_default; // back to default
  }).mousemove(function(e) { // Mouse moving
    var $ = jQuery;
    var _t = e.pageY + foodle_com_d_y;
    var _l = e.pageX + foodle_com_d_x;
    foodle_com_jqueryTooltip.css({ 'top':_t, 'left':_l });
  }); // mousedown was deleted as there's no button and in order to enable touchscreen functions
  
  // Action for touchscreens
  $('[foodle_com_tooltip]').on({
    touch : function(e) { // Touched
      $('[foodle_com_tooltip]').unbind('mousedown');
      $('[foodle_com_tooltip]').unbind('hover');
      $('[foodle_com_tooltip]').unbind('mousemove');
      $('html,body').css('cursor','context-menu'); // Change the cursor as wanted
      var foodle_this = $(this);
      if ( foodle_this.attr('foodle_com_tooltip_delay') ) foodle_com_delay = foodle_this.attr('foodle_com_tooltip_delay'); // Set delay, if provided through the element
      if ( foodle_this.attr('foodle_com_tooltip_dy') ) foodle_com_d_y = foodle_this.attr('foodle_com_tooltip_dy') * 1; // Set vertical distance, if provided through the element
      if ( foodle_this.attr('foodle_com_tooltip_dx') ) foodle_com_d_x = foodle_this.attr('foodle_com_tooltip_dx') * 1; // Set horizontal distance, if provided through the element
      var foodle_id = foodle_this.attr('foodle_com_tooltip');
      foodle_com_jqueryTooltip.html('<div class="mf_foodle_comments_response" id="mf_foodle_comments_response_' + foodle_id + '"><div class="mf_foodle_comments_overlay" id="mf_foodle_comments_overlay_' + foodle_id + '"></div><div class="mf_foodle_comments_content" id="mf_foodle_comments_content_' + foodle_id + '">' + foodle_id + '</div></div>'); // Define the foodle_com_tooltip
      foodle_get_the_democracy_comments(foodle_id);
      var _t = e.pageY + foodle_com_d_y;
      var _l = e.pageX + foodle_com_d_x;
      foodle_com_jqueryTooltip.css({ 'top':_t, 'left':_l }); // Define location of the foodle_com_tooltip
      if ( foodle_id != '' ) foodle_com_timeout = setTimeout( function(){foodle_com_jqueryTooltip.show(100).css('display','block');}, foodle_com_delay); // Show foodle_com_tooltip with delay as long as the string isn't empty.
    },
    focusout : function() { // Focus out
      $('html,body').css('cursor',''); // No specific cursor any more
      clearTimeout(foodle_com_timeout); // Eliminate the timeout to avoid foodle_com_tooltip to be shown after mouse out
      foodle_com_jqueryTooltip.hide(100); // Hide foodle_com_tooltip without delay
      foodle_com_delay = foodle_com_delay_default; // back to default
      foodle_com_d_y = foodle_com_d_y_default; // back to default
      foodle_com_d_x = foodle_com_d_x_default; // back to default
    }
  })
};

