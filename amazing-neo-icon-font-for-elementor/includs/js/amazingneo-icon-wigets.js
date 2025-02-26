// JavaScript Document
/*Toggle*/
jQuery(document).ready(function(){
  /*Open*/
  jQuery(".toggle-icon").click(function(){
jQuery("#open", this).toggleClass("icon-hide");
jQuery("#close", this).toggleClass("icon-open iconi-close");
  });
});


