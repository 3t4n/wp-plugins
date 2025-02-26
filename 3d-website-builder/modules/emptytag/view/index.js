/**
* Version:     1.0.0
* Author:      Keivan Kamali
* copyright :  © 2024 Keivan Kamali all rights reserved
*/
wb3d_setupdata.emptytag=function(obm){
      obm.emptytag_enter=[];


      obm.createobj.emptytag=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){
            var p='position:absolute;';
            var ext2='<div id="wb3df-'+idm+'"  style="'+p+'top:0px;left:0px; height:auto;width:300px;">';
            var textx='';
            if(level===0){
                  textx=wb3d_set_textx(idm);
            }
            var txt='<div id="wb3dg-'+idm+'" style="'+p+'">'+textx+ext2;
            txt+='<div id="wb3de-'+idm+'"  style="overflow:hidden" >';
            // txt+='<img src="'+(wb3d.wb3d_plagin_URL)+'/modules/emptytag/images/image.jpg" style="width:100%;height:100%;">';
            txt+='</div ></div></div>';
            document.getElementById(tmpdivid).insertAdjacentHTML('beforeend',txt);
            obm.bk_create_layer[l]=-1;
            obm.bk_create_layer0[l]=-1;
            wb3d_reset_obj_xy3(l);
      };




      obm.setupobj.emptytag=function(obm,idm,T,B,wslide,name,y,sn,flag,level){
            obm.size1[idm]=1;
            obm.emptytag_enter[idm]=-1;
            obm.show_obj[idm]=3;
            wb3d_events('wb3dg-'+idm,obm);
      };

};