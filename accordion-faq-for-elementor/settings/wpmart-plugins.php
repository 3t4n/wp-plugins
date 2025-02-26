<?php
if (!defined('ABSPATH'))
   exit;

?>
<div class="afaq-6310">
   <div class="afaq-6310-row afaq-6310-row-plugins">
      <h1 class="afaq-6310-wpmart-all-plugins">WpMart Plugins</h1>
   </div>
</div>

<script>
   jQuery.getJSON('https://demo.tcsesoft.com/plugins/', function(data) {
      let htmlCode = '';
      for(let i = 0; i < data.length; i++) {
         htmlCode += `
         <div class="afaq-6310-col-3">
            <div class="afaq-6310-wpmart-plugins">
               <a href="${data[i].url}" target="_blank">
                  <img src="${data[i].image}" alt="${data[i].title}" class="afaq-image-responsive">
                  <p>${data[i].title}</p>
               </a>
            </div>
         </div>`;
      }
      jQuery('.afaq-6310-wpmart-all-plugins').after(htmlCode);
   });
</script>