<?php
if (!defined('ABSPATH'))
   exit;

?>
<div class="afaq-6310">
   <div class="afaq-6310-row afaq-6310-row-plugins">
      <h1 class="afaq-6310-afaqart-all-plugins">Plugins Reference Video</h1>
   </div>
</div>

<script>
   jQuery.getJSON('https://demo.tcsesoft.com/plugins/afaq.php', function(data) {
      let htmlCode = '';
      for(let i = 0; i < data.length; i++) {         
         htmlCode += `
         <div class="afaq-6310-help-section">         
            <div class="afaq-6310-afaqart-plugins-video">
            <i class="fas fa-film"></i><a href="${data[i].url}" target="_blank">${data[i].title}</a>
            </div>
         </div>`;
      }
      jQuery('.afaq-6310-afaqart-all-plugins').after(htmlCode);
   });
</script>
<style>
h1.afaq-6310-afaqart-all-plugins {  
    color: chocolate !important; 
    
}
.afaq-6310-help-section{
   width: 100%;
   display: inline;
   float: left;
   margin: 8px 30px;
   font-size: 14px;
}
.afaq-6310-afaqart-plugins-video{
   background-color: transparent;
}
.afaq-6310-afaqart-plugins-video i{
   float: left;
   padding-right: 5px;
   font-size: 21px;
   color: #009097;
}
.afaq-6310-afaqart-plugins-video a {
    text-decoration: none;
    float: left;
    margin: 0;
    padding: 0;
    color: #2c2e1d94;
    font-weight: 600;
 
}
.afaq-6310-afaqart-plugins-video a:hover {
    color: #027f85;
}

</style>