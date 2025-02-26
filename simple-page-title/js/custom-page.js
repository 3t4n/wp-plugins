/*
Theme Name : Simple Page Title
file Name  : Custom-page.js
Version    : 2.0
Author     : Saurabh Jain
Website    : https://github.com/Saurabh-developer/Simple-Page-Title
*/

/*
 * Please Dont change the js and update the js files.
 */

jQuery(document).ready(function($){
   $('#tab_simple li a').click( function(event){
   	    event.preventDefault();
        var title = $(this).attr('href');
        $('#tab_simple li').removeClass('active');
        $(this).parent().addClass('active');
        $('.tab-content-title').find('.tab-pane').hide();
        $('.tab-content-title').find('#'+title).show();
   });
});