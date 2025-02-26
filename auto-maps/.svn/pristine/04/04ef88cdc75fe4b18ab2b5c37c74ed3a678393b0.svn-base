 jQuery(document).ready(function($){
        $("address").each(function(){
            var aembed ="<iframe";
            var aw = $(this).attr("data-width");
            var ah = $(this).attr("data-height");
           if(aw !== undefined && ah !== undefined ){
           if(aw !== undefined ){
               aembed += " width='"+aw+"'";
           }else{
               aembed += " width='100%'";
           }
            if(ah !== undefined){
                aembed += " height='"+ah+"'";
            }else{
                aembed += " height='100%'";
            }

                aembed += " frameborder='0' scrolling='no'  marginheight='0' marginwidth='0'   src='https://maps.google.com/maps?&amp;q="+ encodeURIComponent( $(this).text() ) +"&amp;output=embed'></iframe>";
               $(this).html(aembed);
        }
        });
    });