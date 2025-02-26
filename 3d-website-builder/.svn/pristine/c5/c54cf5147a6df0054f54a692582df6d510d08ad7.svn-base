/**
* Version:     1.0.0
* Author:      Keivan Kamali
*/

wb3d_setupdata.text=function(obm){
      obm.text_data=[];
      obm.text_style='left';

      obm.createobj.text=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){

            var p='position:absolute;';
            var ext2='<div id="wb3df-'+idm+'"    style="'+p+'top:0px;left:0px; height:auto;width:300px;">';
            var txt='<div id="wb3dg-'+idm+'" style="'+p+'overflow:hidden;">'+ext2;
            var value=B['text_'+y];
            var style1='style="overflow:hidden;height:auto;width:auto;'+p+'"';
            var tags1=wb3d_set_tag(B,y);
            var tag1=tags1.tag1;
            var tag2=tags1.tag2;

            txt+='<'+tag1+' id="wb3de-'+idm+'" '+style1+'>'+value+'</'+tag2+'>';
            txt+='</div>';
            txt+='</div>';
            document.getElementById(tmpdivid).insertAdjacentHTML('beforeend',txt);
            obm.bk_create_layer[l]=-1;
            wb3d_reset_obj_xy3(l);
      };




      obm.setupobj.text=function(obm,idm,T,B,wslide,name,y,sn,flag,level){
            obm.size1[idm]=2;
            obm.newsize[idm]=2;
            obm.show_obj[idm]=3;
            wb3d_events('wb3dg-'+idm,obm);
      };
};