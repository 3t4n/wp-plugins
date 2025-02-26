/**
* Version:     1.0.0
* Author:      Keivan Kamali
*/

wb3d_setupdata.video=function(obm){

      obm.createobj.video=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){
            var p='position:absolute;';
            var ext2='<div  id="wb3df-'+idm+'" style="'+p+'top:0px;left:0px; height:auto;width:300px;">';

            var tags1=wb3d_set_tag(B,y);
            var tag1=tags1.tag1;
            var tag2=tags1.tag2;
            var txt='<div id="wb3dg-'+idm+'" style="'+p+'overflow:hidden;">'+ext2;

            var mute,download,control,loop,poster;
            if(B['mute-'+y]===1){
                  mute=' muted ';
            }
            else{
                  mute=' ';
            }

            if(B['download-'+y]!=1){
                  download='controlsList="nodownload"';
            }
            else{
                  download=' ';
            }


            if(B['control-'+y]===1){
                  control=' controls ';
            }
            else{
                  control=' ';
            }

            if(B['loop-'+y]===1){
                  loop=' loop ';
            }
            else{
                  loop=' ';
            }

            if(B['image_'+y]!=''){
                  poster=' poster="'+B["image_"+y]+'" ';
            }
            else{
                  poster=" ";
            }

            var src1=B['video_'+y];
            txt+='<'+tag1+' id="wb3de-'+idm+'" style="overflow:hidden">';
            txt+='<video preload="auto" '+poster+mute+download+control+loop+'  id="wb3d2-'+idm+'" src="'+src1+'"  style=" width:100%;height:100%;position:absolute;top:0px;left:0px;z-index:1;"></video>';
            txt+='</'+tag2+'>';
            txt+='</div>';
            txt+='</div>';
            document.getElementById(tmpdivid).insertAdjacentHTML('beforeend',txt);
            obm.bk_create_layer[l]=-1;
            wb3d_reset_obj_xy3(l);
      };


      obm.setupobj.video=function(obm,idm,T,B,wslide,name,y,sn,flag,level){
            obm.size1[idm]=1;
            obm.newsize[idm]=0;
            obm.show_obj[idm]=3;
            wb3d_events('wb3dg-'+idm,obm);
      };
};