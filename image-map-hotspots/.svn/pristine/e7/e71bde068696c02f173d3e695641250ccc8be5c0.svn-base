<?php
if (!defined('ABSPATH'))
   exit;

?>
<div class="imh-6310">
   <div class="imh-6310-row imh-6310-row-plugins imh-6310-row-plugins-video">
      <h1 class="imh-6310-imhart-all-plugins">Plugins Reference Video</h1>
   </div>
</div>

<script>
   jQuery.getJSON('https://demo.tcsesoft.com/plugins/imh.php', function(data) {
      let htmlCode = '';
      for(let i = 0; i < data.length; i++) {         
         htmlCode += `
         <div class="imh-6310-help-section">         
            <div class="imh-6310-imhart-plugins-video">
            <i class="fas fa-film"></i><a href="${data[i].url}" target="_blank">${data[i].title}</a>
            </div>
         </div>`;
      }
      jQuery('.imh-6310-imhart-all-plugins').after(htmlCode);
   });
</script>
<style>
.imh-6310-row-plugins-video{
   background: #ffffff;
   padding: 10px;
   width: calc(100% - 20px) !important;
}
h1.imh-6310-imhart-all-plugins {  
    color: chocolate !important;  
    margin-left: 30px; 
}
.imh-6310-help-section{
   width: 100%;
   display: inline;
   float: left;
   margin: 8px 30px;
   font-size: 14px;
}
.imh-6310-imhart-plugins-video{
   background-color: transparent;
}
.imh-6310-imhart-plugins-video i{
   float: left;
   padding-right: 5px;
   font-size: 21px;
   color: #009097;
}
.imh-6310-imhart-plugins-video a {
    text-decoration: none;
    float: left;
    margin: 0;
    padding: 0;
    color: #2c2e1d94;
    font-weight: 600;
 
}
.imh-6310-imhart-plugins-video a:hover {
    color: #027f85;
}

</style>