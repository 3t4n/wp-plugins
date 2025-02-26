/**
* Version:     1.0.0
* Author:      Keivan Kamali
*/

wb3d_setupdata.panel=function(obm){


      obm.createobj.panel=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){
            var p='position:absolute;';
            var ext2='<div id="wb3df-'+idm+'" style="'+p+'top:0px;left:0px; height:auto;width:300px;">';
            var txt='<div id="wb3dg-'+idm+'" style="'+p+'">'+ext2;
            var tags1=wb3d_set_tag(B,y);
            var tag1=tags1.tag1;
            var tag2=tags1.tag2;
            txt+='<'+tag1+' id="wb3de-'+idm+'" style="'+p+'top:0px;left:0px; height:100%;width:100%;">';
            txt+='</'+tag2+' ></div></div>';
            document.getElementById(tmpdivid).insertAdjacentHTML('beforeend',txt);
            obm.bk_create_layer[l]=-1;
            wb3d_reset_obj_xy3(l);
      };



      obm.addon.wb3d_panel_run=function(sn,obm,frm,B,eff,wslide,yy,md,w0 ,yy_0,md0,id1,id_l,type_L,wh,ids,idg,cu,level){
            var w,h;
      };

      obm.setupobj.panel=function(obm,idm,T,B,wslide,name,y,sn,flag,level){
            obm.size1[idm]=1;
            obm.show_obj[idm]=3;
            obm.panelLock[idm]=1;
            wb3d_events('wb3dg-'+idm,obm);
      };

};