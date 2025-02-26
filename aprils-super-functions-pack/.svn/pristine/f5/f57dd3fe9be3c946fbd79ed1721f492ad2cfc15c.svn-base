/* 
 * jquery.ahscform.js
 * Author: April Hodge Silver
 * Author URI: http://springthistle.com
 * Description: Used for the cforms contact form to 'pre-choose' the recipient from the dropdown
 * Notes: recipient field *must* be the *first field* in the form
 */

function gup( name ) {
  name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
  var regexS = "[\\?&]"+name+"=([^&#]*)";
  var regex = new RegExp( regexS );
  var results = regex.exec( window.location.href );
  if( results == null )
    return "";
  else
    return results[1];
}

function isNumeric(input) {
	return !isNaN(parseFloat(input)) && isFinite(input);
}

function pre_choose_recipient(formid) {
	if (!formid) var formid = '';
	var person = gup('person'); 
	person = person.replace(/%20/g,' ');
	person = person.replace(/_/g,' ');

	if (!isNumeric(person))
		num = jQuery("#cf"+formid+"_field_1 option:contains('"+person+"')").val();
	else
		num = person;

	jQuery("#cf"+formid+"_field_1").val(num);
}