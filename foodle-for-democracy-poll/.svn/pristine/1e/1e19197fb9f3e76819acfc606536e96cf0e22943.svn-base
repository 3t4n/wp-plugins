/*
 * Author: Michael Finkenberger
 * @since V2.5.3.0
 * Last change in plugin version: V2.5.10.1 (removed two function parameters and added 'number_of_unexpected_voters' for improved error visualization)
 * Date: 12.02.2024
 * Tested with the latest plugin version
*/



var $ = jQuery;

var foodle_bar_graph_animation_delay = 400;
var foodle_bar_graph_animation_speed = 1500;
var foodle_bar_graph_animation_stop = foodle_bar_graph_animation_speed + 500;

if ( ! $().foodle_adjust_bar_graph ) $.fn.foodle_adjust_bar_graph = function( foodle_vote_rate, foodle_additional_text = "", foodle_users_concerned = -1, number_of_unexpected_voters = -1 ) {
  if ( ( foodle_vote_rate > 100 ) || ( ! ( number_of_unexpected_voters == 0 ) ) ) {
    if ( ! ( foodle_additional_text == '' ) ) foodle_graph_text = '<span style="color:red">&#x26A0;</span>&nbsp;&nbsp;' + foodle_additional_text;
    this.parent().find("span.foodle-votes-txt-percent").html( foodle_graph_text );
    setTimeout(() => { this.animate({ width: "0%" }, foodle_bar_graph_animation_speed); }, foodle_bar_graph_animation_delay), "linear";
    setTimeout(() => { this.stop(); }, foodle_bar_graph_animation_stop);
  } else if ( foodle_users_concerned == 0 ) { 
    if ( ! ( foodle_additional_text == '' ) ) foodle_graph_text = '<span style="color:red">&quest;</span>&nbsp;&nbsp;' + foodle_additional_text;
    this.parent().find("span.foodle-votes-txt-percent").html( foodle_graph_text );
    setTimeout(() => { this.animate({ width: "0%" }, foodle_bar_graph_animation_speed); }, foodle_bar_graph_animation_delay), "linear";
    setTimeout(() => { this.stop(); }, foodle_bar_graph_animation_stop);
  } else {
    if ( ! ( foodle_additional_text == '' ) ) foodle_additional_text = '&nbsp;&nbsp;' + foodle_additional_text;
    this.parent().find("span.foodle-votes-txt-percent").html( foodle_vote_rate + "%" + foodle_additional_text );
    setTimeout(() => { this.animate({ width: foodle_vote_rate + "%" }, foodle_bar_graph_animation_speed); }, foodle_bar_graph_animation_delay), "linear";
    setTimeout(() => { this.stop(); }, foodle_bar_graph_animation_stop);
  }
  return this;
};

