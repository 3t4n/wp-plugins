/**
* Version:     1.0.0
* Author:      Keivan Kamali
*/
wb3d_setupdata.audio=function(obm){

      obm.createobj.audio=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){

            var p='position:absolute;';
            var ext2='<div id="wb3df-'+idm+'" style="'+p+'top:0px;left:0px; height:auto;width:300px;">';
            var txt='<div id="wb3dg-'+idm+'" style="'+p+'overflow:hidden;">'+ext2;
            var download=' ';
            if(B['download-'+y]!=1){
                  download='controlsList="nodownload"';
            }
            else{
                  download=' ';
            }

            var tags1=wb3d_set_tag(B,y);
            var tag1=tags1.tag1;
            var tag2=tags1.tag2;
            var src1=B['audio_'+y];
            txt+='<'+tag1+' id="wb3de-'+idm+'"   >';
            txt+='<audio  controls  '+download+' onload=""  id="wb3d2-'+idm+'" src="'+src1+'"  style=" width:100%;height:100%;position:absolute;top:0px;left:0px;z-index:1;"></audio>';
            txt+='</'+tag2+' >';
            txt+='</div>';
            txt+='</div>';

            document.getElementById(tmpdivid).insertAdjacentHTML('beforeend',txt);
            obm.bk_create_layer[l]=-1;
            wb3d_reset_obj_xy3(l);
      };


      obm.setupobj.audio=function(obm,idm,T,B,wslide,name,y,sn,flag,level){
            obm.size1[idm]=1;
            obm.newsize[idm]=0;
            obm.show_obj[idm]=3;
            wb3d_events('wb3dg-'+idm,obm);
      };

};

