<?php  

/*
Plugin Name:  Automatically Open All External Links In A New Tab
Description:  <p>Automatically makes all exteran links open in a new tab so your traffic can stay on your site.This will save you so much time as you will not have to do this manually everytime you add a link to your site. It also eliminates all room human error.<p>
Version:      1.2
Author:       Dacod Magagula
Author URI:   https://dacod.co.za/
Plugin URI:   https://www.dacod.co.za/
Tested up to: 5.2.2
*/


function openexteranlinksinanewtab(){

echo "<script>
window.onload = function(){

  var anchors = document.getElementsByTagName('a');
  for (var i=0; i<anchors.length; i++){

    console.log(window.location.hostname);

  if(!((anchors[i].href.indexOf(window.location.hostname) >= 0) || anchors[i].href=='#'' || anchors[i].href=='javascript:void(0)'' || anchors[i].href[0]=='/'' || anchors[i].href[0]=='.'')){

   anchors[i].setAttribute('target', '_blank');

  }
    
  }

}

</script>";
}



add_action( 'wp_head', 'openexteranlinksinanewtab' );
