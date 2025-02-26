var gBox = {   
    width:null,
    height:null,
    align:'center',
    textAlign:'left',
    getScrollY: function(){
      var scrOfY = 0;
      if( typeof( window.pageYOffset ) == 'number' ) {
        //Netscape compliant
        scrOfY = window.pageYOffset;
       
      } else if( document.body && ( document.body.scrollLeft || document.body.scrollTop ) ) {
        //DOM compliant
        scrOfY = document.body.scrollTop;
       
      } else if( document.documentElement && ( document.documentElement.scrollLeft || document.documentElement.scrollTop ) ) {
        //IE6 standards compliant mode
        scrOfY = document.documentElement.scrollTop;
       
      }
      return  scrOfY ;
    },
    close: function(){
    
      if(gBox.contentID){
     
        gBox.contentID.style.display='none';
      
        gBox.parentID.appendChild(gBox.contentID);
        
      }
      if(!!gBox.bg && !!gBox.bg.parentNode){gBox.bg.parentNode.removeChild(gBox.bg);}
      if(!!gBox.content && !!!!gBox.content.parentNode){gBox.content.parentNode.removeChild(gBox.content);}
     
    }, 
    bg:null,
    content:null,
    parentID:null,
    contentID:null,
    openID:function(xID){
      if(!!gBox.bg){gBox.close();}
   
      gBox.bg = document.createElement('DIV');
        
      gBox.bg.style.position='absolute';
      gBox.bg.style.top='0px';
      gBox.bg.style.left='0px';
     
      gBox.bg.style.backgroundColor='#000000';
      gBox.bg.style.zIndex ='10';
      gBox.bg.id='gBoxOpacityBackground';
      gBox.bg.style.filter='alpha(opacity=40)'; 
      gBox.bg.style.opacity='0.4'; 
      gBox.bg.onclick=function(){
        gBox.close();      
      }
      document.body.appendChild(gBox.bg);
      
      gBox.content = document.createElement('DIV');
      gBox.content.borderRadius = '3px'; // standard 
      gBox.content.MozBorderRadius = '3px'; // Mozilla 
      gBox.content.WebkitBorderRadius = '3px'; // WebKit 


      gBox.content.id='gBoxOpacityContent';
      gBox.content.style.position='absolute';
      if(!!gBox.width){
          gBox.content.style.width=gBox.width;
      }else{gBox.content.style.width='97%';}
      if(!!gBox.height){
          gBox.content.style.height=gBox.height;
      }
      gBox.content.style.display='none';
      gBox.content.style.zIndex ='110';
      gBox.content.innerHTML='<DIV style="width:99%;height:100%;background:transparent;">'+	
                '<table align="center" cellspacing="0" cellpadding="0" ><tr width="100%">'+	
                  '<td align="'+gBox.align+'" width="100%" style="text-align:'+gBox.textAlign+';padding:5px;color:#444444;font-size:12px;font-family:Arial;" id="gBoxContentINNER" ></td>'+
                '</tr></table>'+
              '</DIV>';
      document.body.appendChild(gBox.content);      
    
      gBox.parentID = document.getElementById(xID).parentNode;
      gBox.contentID = document.getElementById(xID);
      document.getElementById('gBoxContentINNER').appendChild(gBox.contentID);
      document.getElementById(xID).style.display='';
      jQuery(document).ready(function(){
          gBox.bg.style.width=jQuery(document).width()+'px';
          gBox.bg.style.height=jQuery(document).height()+'px';
        

       
        var contentWidth = jQuery('#gBoxOpacityContent').css('width').replace('px','');
        var contentHeight = jQuery('#gBoxOpacityContent').css('height').replace('px','');
        contentWidth = parseFloat(contentWidth);
        contentHeight = parseFloat(contentHeight);
        
       
        gBox.content.style.top=((((jQuery(document).height()-contentHeight))/2))+'px';        
        gBox.content.style.left=(((jQuery(document).width()-contentWidth))/2)+'px';              
       
   
        
        jQuery(window).resize(function() {
          gBox.bg.style.left='0px';
          gBox.bg.style.top='0px';
          gBox.bg.style.height=(jQuery(document).outerHeight(true))+'px';
          gBox.bg.style.width= (jQuery(document).outerWidth())+'px';
       
          var contentWidth = jQuery('#gBoxOpacityContent').css('width').replace('px','');
          var contentHeight = jQuery('#gBoxOpacityContent').css('height').replace('px',''); 
          contentWidth = parseFloat(contentWidth);
          contentHeight = parseFloat(contentHeight);
        
        
            gBox.content.style.top=((((jQuery(document).height()-contentHeight))/2))+'px';
        
            gBox.content.style.left=(((jQuery(document).width()-contentWidth))/2)+'px';    
        });

        
        gBox.content.style.display='';   
      });      
                         
    }
  };