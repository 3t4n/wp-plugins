/*
 * Author: Michael Finkenberger
 * @since V1.1.0.0
 * Last change in plugin version: V2.5.8.5 (fixed not working hover mouse out with warning tooltips introduced with 2.5.8.2)
 * Date: 01.02.2024
 * Tested with the latest plugin version
*/

var $ = jQuery;
var foodle_timeout;

var foodle_delay_default = 400; // The default value
var foodle_delay = foodle_delay_default; // Delay before to show the foodle_tooltip in ms
var foodle_d_y_default = 14; // The default value
var foodle_d_x_default = 14; // The default value
var foodle_d_y = foodle_d_y_default; // Horizontal distance between mousepointer and foodle_tooltip in pixels
var foodle_d_x = foodle_d_x_default; // Horizontal distance between mousepointer and foodle_tooltip in pixels

var foodle_timeout_w;

var foodle_delay_w_default = 0; // The default value
var foodle_delay_w = foodle_delay_w_default; // Delay before to show the foodle_tooltip in ms
var foodle_d_y_w_default = -80; // The default value
var foodle_d_x_w_default = 6; // The default value
var foodle_d_y_w = foodle_d_y_w_default; // Horizontal distance between mousepointer and foodle_tooltip in pixels
var foodle_d_x_w = foodle_d_x_w_default; // Horizontal distance between mousepointer and foodle_tooltip in pixels



$(document).ready(function() {
  foodle_activate_tooltips();
});
function foodle_activate_tooltips() {
  // Tooltips
  var foodle_jqueryTooltip = $('<div id="foodle_jqueryTooltip"></div>');
  $('body').append(foodle_jqueryTooltip);
  $('[foodle_tooltip]').hover(function(e) { // Mouse in
    $('html,body').css('cursor','help'); // Change the cursor as wanted
    var foodle_this = $(this);
    if ( foodle_this.attr('foodle_tooltip_delay') ) foodle_delay = foodle_this.attr('foodle_tooltip_delay'); // Set delay, if provided through the element
    if ( foodle_this.attr('foodle_tooltip_dy') ) foodle_d_y = foodle_this.attr('foodle_tooltip_dy') * 1; // Set vertical distance, if provided through the element
    if ( foodle_this.attr('foodle_tooltip_dx') ) foodle_d_x = foodle_this.attr('foodle_tooltip_dx') * 1; // Set horizontal distance, if provided through the element
    var foodle_tooltip = foodle_this.attr('foodle_tooltip');
    foodle_jqueryTooltip.html(foodle_tooltip); // Define the foodle_tooltip
    var _t = e.pageY + foodle_d_y;
    var _l = e.pageX + foodle_d_x;
    foodle_jqueryTooltip.css({ 'top':_t, 'left':_l }); // Define location of the foodle_tooltip
    if ( foodle_tooltip != '' ) foodle_timeout = setTimeout( function(){foodle_jqueryTooltip.show(100).css('display','block');}, foodle_delay); // Show foodle_tooltip with delay as long as the string isn't empty.
  },
  function() { // Mouse out
    $('html,body').css('cursor',''); // No specific cursor any more
    clearTimeout(foodle_timeout); // Eliminate the timeout to avoid foodle_tooltip to be shown after mouse out
    foodle_jqueryTooltip.hide(100); // Hide foodle_tooltip without delay
    foodle_delay = foodle_delay_default; // Back to default
    foodle_d_y = foodle_d_y_default; // Back to default
    foodle_d_x = foodle_d_x_default; // Back to default
  }).mousemove(function(e) { // Mouse moving
    var $ = jQuery;
    var _t = e.pageY + foodle_d_y;
    var _l = e.pageX + foodle_d_x;
    foodle_jqueryTooltip.css({ 'top':_t, 'left':_l });
  })

  if ( $('[foodle_tooltip]').attr('foodle_tooltip_touch') == 'true' ) {
    // Action for touchscreens
    $('[foodle_tooltip]').on({
      touch : function(e) { // Touched
        $('[foodle_tooltip]').unbind('mousedown');
        $('[foodle_tooltip]').unbind('hover');
        $('[foodle_tooltip]').unbind('mousemove');
        $('html,body').css('cursor','help'); // Change the cursor as wanted
        var foodle_this = $(this);
        if ( foodle_this.attr('foodle_tooltip_delay') ) foodle_delay = foodle_this.attr('foodle_tooltip_delay'); // Set delay, if provided through the element
        if ( foodle_this.attr('foodle_tooltip_dy') ) foodle_d_y = foodle_this.attr('foodle_tooltip_dy') * 1; // Set vertical distance, if provided through the element
        if ( foodle_this.attr('foodle_tooltip_dx') ) foodle_d_x = foodle_this.attr('foodle_tooltip_dx') * 1; // Set horizontal distance, if provided through the element
        var foodle_id = foodle_this.attr('foodle_tooltip');
        foodle_jqueryTooltip.html(foodle_tooltip); // Define the foodle_tooltip
        var _t = e.pageY + foodle_d_y;
        var _l = e.pageX + foodle_d_x;
        foodle_jqueryTooltip.css({ 'top':_t, 'left':_l }); // Define location of the foodle_com_tooltip
        if ( foodle_id != '' ) foodle_timeout = setTimeout( function(){foodle_jqueryTooltip.show(100).css('display','block');}, foodle_delay); // Show foodle_com_tooltip with delay as long as the string isn't empty.
      },
      focusout : function() { // Focus out
        $('html,body').css('cursor',''); // No specific cursor any more
        clearTimeout(foodle_timeout); // Eliminate the timeout to avoid foodle_com_tooltip to be shown after mouse out
        foodle_jqueryTooltip.hide(100); // Hide foodle_com_tooltip without delay
        foodle_delay = foodle_delay_default; // back to default
        foodle_d_y = foodle_d_y_default; // back to default
        foodle_d_x = foodle_d_x_default; // back to default
      }
    })
  } else {
    // Action just for buttons
    $('[foodle_tooltip]').mousedown(function(e) { // to avoid cursor conflicts in case it is a button
      $('html,body').css('cursor',''); // No specific cursor any more
        clearTimeout(foodle_timeout); // Eliminate the timeout to avoid foodle_tooltip to be shown after mouse out
      foodle_jqueryTooltip.hide(100); // Hide foodle_tooltip without delay
      foodle_delay = foodle_delay_default; // back to default
      foodle_d_y = foodle_d_y_default; // back to default
      foodle_d_x = foodle_d_x_default; // back to default
    });
  }

    // Tooltip Warnings
    var foodle_jqueryTtwarning = $('<div id="foodle_jqueryTtwarning"></div>');
    $('body').append(foodle_jqueryTtwarning);
    $('[foodle_ttwarning]').hover(function(e) { // Mouse in
      var foodle_this = $(this);
      if ( foodle_this.attr('foodle_ttwarning_delay') ) foodle_delay_w = foodle_this.attr('foodle_ttwarning_delay'); // Set delay, if provided through the element
      if ( foodle_this.attr('foodle_ttwarning_dy') ) foodle_d_y_w = foodle_this.attr('foodle_ttwarning_dy') * 1; // Set vertical distance, if provided through the element
      if ( foodle_this.attr('foodle_ttwarning_dx') ) foodle_d_x_w = foodle_this.attr('foodle_ttwarning_dx') * 1; // Set horizontal distance, if provided through the element
      var foodle_ttwarning = foodle_this.attr('foodle_ttwarning');
      foodle_jqueryTtwarning.html(foodle_ttwarning); // Define the foodle_ttwarning
      var _t = e.pageY + foodle_d_y_w;
      var _l = e.pageX + foodle_d_x_w;
      foodle_jqueryTtwarning.css({ 'top':_t, 'left':_l }); // Define location of the foodle_ttwarning
      if ( foodle_ttwarning != '' ) foodle_timeout_w = setTimeout( function(){foodle_jqueryTtwarning.show(100).css('display','block');}, foodle_delay_w); // Show foodle_ttwarning with delay as long as the string isn't empty.
    },
    function() { // Mouse out
      clearTimeout(foodle_timeout_w); // Eliminate the timeout to avoid foodle_ttwarning to be shown after mouse out
      foodle_jqueryTtwarning.hide(100); // Hide foodle_ttwarning without delay
      foodle_delay_w = foodle_delay_w_default; // back to default
      foodle_d_y_w = foodle_d_y_w_default; // back to default
      foodle_d_x_w = foodle_d_x_w_default; // back to default
    }).mousemove(function(e) { // Mouse moving
      var $ = jQuery;
      var _t = e.pageY + foodle_d_y_w;
      var _l = e.pageX + foodle_d_x_w;
      foodle_jqueryTtwarning.css({ 'top':_t, 'left':_l });
    });
  
};

