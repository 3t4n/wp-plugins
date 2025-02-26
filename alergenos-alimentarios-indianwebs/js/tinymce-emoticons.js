// TinyMCE Emoticons plugin

// send html to the editor


 function send_wp_editor(html)

 {

     var win = window.dialogArguments || opener || parent || top;

     win.send_to_editor(html);

     // alternatively direct tinyMCE command for insert

     // tinyMCE.execCommand("mceInsertContent", false, html);

 }

 function insert_link(html_link)

 {

     if ((typeof tinyMCE != "undefined") && ( edt = tinyMCE.getInstanceById('content') ) && !edt.isHidden() )

     {

         var sel = edt.selection.getSel();

         if (sel)

         {

             var link = '<a href="' + html_link + '" >' + sel + '</a>';

             send_wp_editor(link);

         }

     }

 }



 // insert image to the editor

 function insert_image(src, title) {

     //var size = document.getElementById('img_size').value;

     var img = '<a href="#" class="tooltip-top" data-tooltip="'+ title +'"><img src="' + src + '" hspace="5" border="0" /></a>';

     send_wp_editor(img);



 }



jQuery(document).ready(function($)

{

var i;

var doc_height = $(document).height();

var post_area = $('.postarea').position();

var post_area_top = '';

if(post_area != null)

post_area_top = post_area.top;

//console.log(post_area.top);

//var update_height = $('.updated').height();

//var notice_height = $('#notice').height();

//alert(update_height);

var popup_top = post_area_top - 65;

//if(update_height != null) popup_top += update_height + 25;

//if(notice_height != null) popup_top += notice_height + 25;


/***************************************/
/* FAMILIA 1 DE ALERGENOS ALIMENTARIOS */
/***************************************/

var popup = "<div class='emoticons-popup' style='width: 286px; height: 120px; padding: 5px; background: #ddd; background: rgba(230,230,230,.9); -moz-box-shadow: 0 0 10px #999; -webkit-box-shadow: 0 0 10px #999; box-shadow: 0 0 10px #999; position: absolute; left: 332px; top:"+popup_top+"px; z-index: 99999999; display: none; overflow: auto;'>";

popup += "<a href='#' title='Altramuces' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-1/altramuces.png\",\"Altramuces\");'><img src='"+tinyEmoSettings.tinyEmo_url+"images/familia-1/altramuces.png' /></a>";

popup += "<a href='#' title='Apio' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-1/apio.png\",\"Apio\");'><img src='"+tinyEmoSettings.tinyEmo_url+"images/familia-1/apio.png' /></a>";

popup += "<a href='#' title='Cacahuetes' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-1/cacahuetes.png\",\"Cacahuetes\");'><img src='"+tinyEmoSettings.tinyEmo_url+"images/familia-1/cacahuetes.png' /></a>";

popup += "<a href='#' title='Contiene Gluten' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-1/contiene-gluten.png\",\"Contiene Gluten\");'><img src='"+tinyEmoSettings.tinyEmo_url+"images/familia-1/contiene-gluten.png' /></a>";

popup += "<a href='#' title='Crustaceos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-1/crustaceos.png\",\"Crustaceos\");'><img src='"+tinyEmoSettings.tinyEmo_url+"images/familia-1/crustaceos.png' /></a>";

popup += "<a href='#' title='Dioxido de azufre y sulfitos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-1/dioxido-de-azufre-y-sulfitos.png\",\"Dioxido de Azufre y Sulfitos\");'><img src='"+tinyEmoSettings.tinyEmo_url+"images/familia-1/dioxido-de-azufre-y-sulfitos.png' /></a>";

popup += "<a href='#' title='Frutos de Cascara' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-1/frutos-de-cascara.png\",\"Frutos de Cascara\");'><img src='"+tinyEmoSettings.tinyEmo_url+"images/familia-1/frutos-de-cascara.png' /></a>";

popup += "<a href='#' title='Granos de Sesamo' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-1/granos-de-sesamo.png\",\"Granos de Sesamo\");'><img src='"+tinyEmoSettings.tinyEmo_url+"images/familia-1/granos-de-sesamo.png' /></a>";

popup += "<a href='#' title='Huevos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-1/huevos.png\",\"Huevos\");'><img src='"+tinyEmoSettings.tinyEmo_url+"images/familia-1/huevos.png' /></a>";

popup += "<a href='#' title='Lacteos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-1/lacteos.png\",\"Lacteos\");'><img src='"+tinyEmoSettings.tinyEmo_url+"images/familia-1/lacteos.png' /></a>";

popup += "<a href='#' title='Moluscos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-1/moluscos.png\",\"Moluscos\");'><img src='"+tinyEmoSettings.tinyEmo_url+"images/familia-1/moluscos.png' /></a>";

popup += "<a href='#' title='Mostaza' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-1/mostaza.png\",\"Mostaza\");'><img src='"+tinyEmoSettings.tinyEmo_url+"images/familia-1/mostaza.png' /></a>";

popup += "<a href='#' title='Pescado' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-1/pescado.png\",\"Pescado\");'><img src='"+tinyEmoSettings.tinyEmo_url+"images/familia-1/pescado.png' /></a>";

popup += "<a href='#' title='Soja' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-1/soja.png\",\"Soja\");'><img src='"+tinyEmoSettings.tinyEmo_url+"images/familia-1/soja.png' /></a>";

popup += "</div>";


/***************************************/
/* FAMILIA 2 DE ALERGENOS ALIMENTARIOS */
/***************************************/


var popup2 = "<div class='emoticons-popup' style='width: 306px; height: 120px; padding: 5px; background: #ddd; background: rgba(230,230,230,.9); -moz-box-shadow: 0 0 10px #999; -webkit-box-shadow: 0 0 10px #999; box-shadow: 0 0 10px #999; position: absolute; left: 332px; top:"+popup_top+"px; z-index: 99999999; display: none; overflow: auto;'>";

popup2 += "<a href='#' title='Altramuces' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-2/altramuces.png\",\"Altramuces\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-2/altramuces.png' /></a>";

popup2 += "<a href='#' title='Apio' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-2/apio.png\",\"Apio\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-2/apio.png' /></a>";

popup2 += "<a href='#' title='Cacahuetes' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-2/cacahuetes.png\",\"Cacahuetes\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-2/cacahuetes.png' /></a>";

popup2 += "<a href='#' title='Contiene Gluten' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-2/contiene-gluten.png\",\"Contiene Gluten\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-2/contiene-gluten.png' /></a>";

popup2 += "<a href='#' title='Crustaceos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-2/crustaceos.png\",\"Crustaceos\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-2/crustaceos.png' /></a>";

popup2 += "<a href='#' title='Dioxido de azufre y sulfitos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-2/dioxido-de-azufre-y-sulfitos.png\",\"Dioxido de Azufre y Sulfitos\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-2/dioxido-de-azufre-y-sulfitos.png' /></a>";

popup2 += "<a href='#' title='Frutos de Cascara' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-2/frutos-de-cascara.png\",\"Frutos de Cascara\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-2/frutos-de-cascara.png' /></a>";

popup2 += "<a href='#' title='Granos de Sesamo' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-2/granos-de-sesamo.png\",\"Granos de Sesamo\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-2/granos-de-sesamo.png' /></a>";

popup2 += "<a href='#' title='Huevos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-2/huevos.png\",\"Huevos\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-2/huevos.png' /></a>";

popup2 += "<a href='#' title='Lacteos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-2/lacteos.png\",\"Lacteos\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-2/lacteos.png' /></a>";

popup2 += "<a href='#' title='Moluscos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-2/moluscos.png\",\"Moluscos\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-2/moluscos.png' /></a>";

popup2 += "<a href='#' title='Mostaza' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-2/mostaza.png\",\"Mostaza\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-2/mostaza.png' /></a>";

popup2 += "<a href='#' title='Pescado' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-2/pescado.png\",\"Pescado\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-2/pescado.png' /></a>";

popup2 += "<a href='#' title='Soja' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-2/soja.png\",\"Soja\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-2/soja.png' /></a>";

popup2 += "</div>";



/***************************************/
/* FAMILIA 3 DE ALERGENOS ALIMENTARIOS */
/***************************************/


var popup3 = "<div class='emoticons-popup' style='width: 272px; height: 120px; padding: 5px; background: #ddd; background: rgba(230,230,230,.9); -moz-box-shadow: 0 0 10px #999; -webkit-box-shadow: 0 0 10px #999; box-shadow: 0 0 10px #999; position: absolute; left: 343px; top:"+popup_top+"px; z-index: 99999999; display: none; overflow: auto;'>";

popup3 += "<a href='#' title='Altramuces' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-3/altramuces.jpg\",\"Altramuces\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-3/altramuces.jpg' /></a>";

popup3 += "<a href='#' title='Apio' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-3/apio.jpg\",\"Apio\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-3/apio.jpg' /></a>";

popup3 += "<a href='#' title='Cacahuetes' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-3/cacahuetes.jpg\",\"Cacahuetes\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-3/cacahuetes.jpg' /></a>";

popup3 += "<a href='#' title='Contiene Gluten' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-3/contiene-gluten.jpg\",\"Contiene Gluten\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-3/contiene-gluten.jpg' /></a>";

popup3 += "<a href='#' title='Crustaceos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-3/crustaceos.jpg\",\"Crustaceos\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-3/crustaceos.jpg' /></a>";

popup3 += "<a href='#' title='Dioxido de azufre y sulfitos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-3/dioxido-de-azufre-y-sulfitos.jpg\",\"Dioxido de Azufre y Sulfitos\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-3/dioxido-de-azufre-y-sulfitos.jpg' /></a>";

popup3 += "<a href='#' title='Frutos de Cascara' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-3/frutos-de-cascara.jpg\",\"Frutos de Cascara\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-3/frutos-de-cascara.jpg' /></a>";

popup3 += "<a href='#' title='Granos de Sesamo' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-3/granos-de-sesamo.jpg\",\"Granos de Sesamo\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-3/granos-de-sesamo.jpg' /></a>";

popup3 += "<a href='#' title='Huevos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-3/huevos.jpg\",\"Huevos\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-3/huevos.jpg' /></a>";

popup3 += "<a href='#' title='Lacteos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-3/lacteos.jpg\",\"Lacteos\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-3/lacteos.jpg' /></a>";

popup3 += "<a href='#' title='Moluscos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-3/moluscos.jpg\",\"Moluscos\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-3/moluscos.jpg' /></a>";

popup3 += "<a href='#' title='Mostaza' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-3/mostaza.jpg\",\"Mostaza\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-3/mostaza.jpg' /></a>";

popup3 += "<a href='#' title='Pescado' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-3/Pescado.jpg\",\"Pescado\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-3/Pescado.jpg' /></a>";

popup3 += "<a href='#' title='Soja' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-3/soja.jpg\",\"Soja\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-3/soja.jpg' /></a>";

popup3 += "</div>";


/***************************************/
/* FAMILIA 4 DE ALERGENOS ALIMENTARIOS */
/***************************************/


var popup4 = "<div class='emoticons-popup' style='width: 272px; height: 120px; padding: 5px; background: #ddd; background: rgba(230,230,230,.9); -moz-box-shadow: 0 0 10px #999; -webkit-box-shadow: 0 0 10px #999; box-shadow: 0 0 10px #999; position: absolute; left: 343px; top:"+popup_top+"px; z-index: 99999999; display: none; overflow: auto;'>";

popup4 += "<a href='#' title='Altramuces' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-4/altramuces.jpg\",\"Altramuces\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-4/altramuces.jpg' /></a>";

popup4 += "<a href='#' title='Apio' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-4/apio.jpg\",\"Apio\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-4/apio.jpg' /></a>";

popup4 += "<a href='#' title='Cacahuetes' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-4/cacahuetes.jpg\",\"Cacahuetes\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-4/cacahuetes.jpg' /></a>";

popup4 += "<a href='#' title='Contiene Gluten' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-4/contiene-gluten.jpg\",\"Contiene Gluten\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-4/contiene-gluten.jpg' /></a>";

popup4 += "<a href='#' title='Crustaceos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-4/crustaceos.jpg\",\"Crustaceos\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-4/crustaceos.jpg' /></a>";

popup4 += "<a href='#' title='Dioxido de azufre y sulfitos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-4/dioxido-de-azufre-y-sulfitos.jpg\",\"Dioxido de Azufre y Sulfitos\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-4/dioxido-de-azufre-y-sulfitos.jpg' /></a>";

popup4 += "<a href='#' title='Frutos de Cascara' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-4/frutos-de-cascara.jpg\",\"Frutos de Cascara\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-4/frutos-de-cascara.jpg' /></a>";

popup4 += "<a href='#' title='Granos de Sesamo' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-4/granos-de-sesamo.jpg\",\"Granos de Sesamo\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-4/granos-de-sesamo.jpg' /></a>";

popup4 += "<a href='#' title='Huevos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-4/huevos.jpg\",\"Huevos\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-4/huevos.jpg' /></a>";

popup4 += "<a href='#' title='Lacteos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-4/lacteos.jpg\",\"Lacteos\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-4/lacteos.jpg' /></a>";

popup4 += "<a href='#' title='Moluscos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-4/moluscos.jpg\",\"Moluscos\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-4/moluscos.jpg' /></a>";

popup4 += "<a href='#' title='Mostaza' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-4/mostaza.jpg\",\"Mostaza\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-4/mostaza.jpg' /></a>";

popup4 += "<a href='#' title='Pescado' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-4/Pescado.jpg\",\"Pescado\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-4/Pescado.jpg' /></a>";

popup4 += "<a href='#' title='Soja' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-4/soja.jpg\",\"Soja\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-4/soja.jpg' /></a>";

popup4 += "</div>";

/***************************************/
/* FAMILIA 5 DE ALERGENOS ALIMENTARIOS */
/***************************************/


var popup5 = "<div class='emoticons-popup' style='width: 306px; height: 120px; padding: 5px; background: #ddd; background: rgba(230,230,230,.9); -moz-box-shadow: 0 0 10px #999; -webkit-box-shadow: 0 0 10px #999; box-shadow: 0 0 10px #999; position: absolute; left: 332px; top:"+popup_top+"px; z-index: 99999999; display: none; overflow: auto;'>";

popup5 += "<a href='#' title='Altramuces' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-5/altramuces.png\",\"Altramuces\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-5/altramuces.png' /></a>";

popup5 += "<a href='#' title='Apio' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-5/apio.png\",\"Apio\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-5/apio.png' /></a>";

popup5 += "<a href='#' title='Cacahuetes' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-5/cacahuetes.png\",\"Cacahuetes\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-5/cacahuetes.png' /></a>";

popup5 += "<a href='#' title='Contiene Gluten' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-5/contiene-gluten.png\",\"Contiene Gluten\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-5/contiene-gluten.png' /></a>";

popup5 += "<a href='#' title='Crustaceos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-5/crustaceos.png\",\"Crustaceos\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-5/crustaceos.png' /></a>";

popup5 += "<a href='#' title='Dioxido de azufre y sulfitos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-5/dioxido-de-azufre-y-sulfitos.png\",\"Dioxido de Azufre y Sulfitos\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-5/dioxido-de-azufre-y-sulfitos.png' /></a>";

popup5 += "<a href='#' title='Frutos de Cascara' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-5/frutos-de-cascara.png\",\"Frutos de Cascara\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-5/frutos-de-cascara.png' /></a>";

popup5 += "<a href='#' title='Granos de Sesamo' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-5/granos-de-sesamo.png\",\"Granos de Sesamo\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-5/granos-de-sesamo.png' /></a>";

popup5 += "<a href='#' title='Huevos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-5/huevos.png\",\"Huevos\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-5/huevos.png' /></a>";

popup5 += "<a href='#' title='Lacteos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-5/lacteos.png\",\"Lacteos\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-5/lacteos.png' /></a>";

popup5 += "<a href='#' title='Moluscos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-5/moluscos.png\",\"Moluscos\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-5/moluscos.png' /></a>";

popup5 += "<a href='#' title='Mostaza' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-5/mostaza.png\",\"Mostaza\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-5/mostaza.png' /></a>";

popup5 += "<a href='#' title='Pescado' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-5/pescado.png\",\"Pescado\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-5/pescado.png' /></a>";

popup5 += "<a href='#' title='Soja' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-5/soja.png\",\"Soja\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-5/soja.png' /></a>";

popup5 += "</div>";


/***************************************/
/* FAMILIA 6 DE ALERGENOS ALIMENTARIOS */
/***************************************/


var popup6 = "<div class='emoticons-popup' style='width: 306px; height: 120px; padding: 5px; background: #ddd; background: rgba(230,230,230,.9); -moz-box-shadow: 0 0 10px #999; -webkit-box-shadow: 0 0 10px #999; box-shadow: 0 0 10px #999; position: absolute; left: 332px; top:"+popup_top+"px; z-index: 99999999; display: none; overflow: auto;'>";

popup6 += "<a href='#' title='Altramuces' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-6/altramuces.png\",\"Altramuces\");'><img style='margin-right: 10px; margin-bottom: 5px;' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-6/altramuces.png' /></a>";

popup6 += "<a href='#' title='Apio' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-6/apio.png\",\"Apio\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-6/apio.png' /></a>";

popup6 += "<a href='#' title='Cacahuetes' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-6/cacahuetes.png\",\"Cacahuetes\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-6/cacahuetes.png' /></a>";

popup6 += "<a href='#' title='Contiene Gluten' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-6/contiene-gluten.png\",\"Contiene Gluten\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-6/contiene-gluten.png' /></a>";

popup6 += "<a href='#' title='Crustaceos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-6/crustaceos.png\",\"Crustaceos\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-6/crustaceos.png' /></a>";

popup6 += "<a href='#' title='Dioxido de azufre y sulfitos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-6/dioxido-de-azufre-y-sulfitos.png\",\"Dioxido de Azufre y Sulfitos\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-6/dioxido-de-azufre-y-sulfitos.png' /></a>";

popup6 += "<a href='#' title='Frutos de Cascara' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-6/frutos-de-cascara.png\",\"Frutos de Cascara\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-6/frutos-de-cascara.png' /></a>";

popup6 += "<a href='#' title='Granos de Sesamo' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-6/granos-de-sesamo.png\",\"Granos de Sesamo\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-6/granos-de-sesamo.png' /></a>";

popup6 += "<a href='#' title='Huevos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-6/huevos.png\",\"Huevos\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-6/huevos.png' /></a>";

popup6 += "<a href='#' title='Lacteos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-6/lacteos.png\",\"Lacteos\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-6/lacteos.png' /></a>";

popup6 += "<a href='#' title='Moluscos' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-6/moluscos.png\",\"Moluscos\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-6/moluscos.png' /></a>";

popup6 += "<a href='#' title='Mostaza' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-6/mostaza.png\",\"Mostaza\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-6/mostaza.png' /></a>";

popup6 += "<a href='#' title='Pescado' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-6/pescado.png\",\"Pescado\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-6/pescado.png' /></a>";

popup6 += "<a href='#' title='Soja' onclick='insert_image(tinyEmoSettings.tinyEmo_url+\"images/familia-6/soja.png\",\"Soja\");'><img style='margin-right: 10px; margin-bottom: 5px' src='"+tinyEmoSettings.tinyEmo_url+"images/familia-6/soja.png' /></a>";

popup6 += "</div>";


if(tinyEmoSettings.select_option == 'familia-1')

$('#wpcontent #poststuff #post-body').append(popup);

if(tinyEmoSettings.select_option == 'familia-2')

$('#wpcontent #poststuff #post-body').append(popup2);

if(tinyEmoSettings.select_option == 'familia-3')

$('#wpcontent #poststuff #post-body').append(popup3);

if(tinyEmoSettings.select_option == 'familia-4')

$('#wpcontent #poststuff #post-body').append(popup4);

if(tinyEmoSettings.select_option == 'familia-5')

$('#wpcontent #poststuff #post-body').append(popup5);

if(tinyEmoSettings.select_option == 'familia-6')

$('#wpcontent #poststuff #post-body').append(popup6);

$('html').click(function(e) {

    var clicked = $(e.target).attr('class');

//var clicked2 = $(e.target).parent().attr('class');

     console.log(clicked);

//console.log(clicked2);

   if((clicked != 'mce-ico mce-i-none') && (clicked != 'mceIcon') && clicked != 'mCSB_dragger_bar'){

   $('.emoticons-popup').hide();

      i=1;

   }

      });



$(document).on("click", ".mce_btnTinyEmo img.mceIcon, .mce-btnTinyEmo button",function(){ 

//console.log(i);   

if(i==0){

   $('.emoticons-popup').hide();

   i=1;

   }

   else{

    $('.emoticons-popup').show();

    i=0;

   }

   //$('.emoticons-popup').show();

  });



$("#tinyemo-options a").click(function(){

$("#tinyemo-options a").removeClass("active");

$(this).addClass("active");

var opt_value = $(this).attr('alt');

$("#tinyemo-options #option-value").attr('value',opt_value);

});

});



		(function($){

        var scroll_visible = false;

        $(window).load(function(){

				/* custom scrollbar fn call */

                   $(".mce_btnTinyEmo, .mce-btnTinyEmo").live("click",function(){

                if(scroll_visible != true){

                $(".emoticons-popup").mCustomScrollbar({

					scrollInertia:150

                });

                scroll_visible = true;

                }

                });

                });

                })(jQuery);