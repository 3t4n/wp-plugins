/*
 * Author: Michael Finkenberger
 * @since V1.1.0.0
 * Last change in plugin version: V1.1.0.0
 * Date: 14.04.2021
 * Tested with the latest plugin version
*/

var $ = jQuery;



$(document).ready( function() {
  // add radio function to democracy poll
  foodle_radio();
});

function foodle_radio() { // will as well be called from filters 'dem_vote_screen' (and 'dem_result_screen')
  $.each( $('.dem__checkbox_label'), function( i, foodle_checkbox_label){
    var foodle_this = $(foodle_checkbox_label);
    mf_label_html = foodle_this.html();
    mf_search = mf_label_html.search('••'); // Amswers starting with two bulls will allways be considered as radio selectable for mixed polls
    if ( mf_search != -1 ) {
      foodle_this.removeClass('dem__checkbox_label');
      foodle_this.addClass('dem__radio_label');
      mf_label_html = mf_label_html.split('checkbox').join('radio');
      mf_label_html = mf_label_html.replace('••', '');
      foodle_this.html(mf_label_html);
    }
  });
  $('.dem__radio').attr('name','answer_ids_radio[]');
}



function foodle_change_demCollectAnsw () {
  $.fn.demCollectAnsw = function(){
    var $ = jQuery;
    var $form = this.closest( "form" )
    var $answers = $form.find( "[type=checkbox],[type=radio],[type=text]" )
    var userText = $form.find( "[type=text]" ).val()    // changed from original '$form.find( userAnswer ).val()'
    var answ = []
    var $checkbox = $answers.filter( "[type=checkbox]:checked" )

    // multiple
    if( $checkbox.length > 0 ){
      $checkbox.each( function(){
        answ.push( $( this ).val() )
      } )
      // and mixed                                        // added to original for mixed polls
      var str = $answers.filter( "[type=radio]:checked" ) // added to original for mixed polls
      if( str.length )                                    // added to original for mixed polls
        answ.push( str.val() )                            // added to original for mixed polls
    }
    // single
    else {
      var str = $answers.filter( "[type=radio]:checked" )
      if( str.length )
        answ.push( str.val() )
    }

    // user_added
    if( userText ){
      answ.push( userText )
    }

    answ = answ.join( "~" )

    return answ ? answ : ""
  }
}