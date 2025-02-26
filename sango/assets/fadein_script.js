// JavaScript Document

$(function(){
   $(window).on('load',function(){
     $(".loading-anime-wrap").delay(1500).fadeOut('slow');
   });
   function loaderClose(){
     $(".loading-anime-wrap").fadeOut('slow');
   }
   setTimeout(loaderClose,3000);
});