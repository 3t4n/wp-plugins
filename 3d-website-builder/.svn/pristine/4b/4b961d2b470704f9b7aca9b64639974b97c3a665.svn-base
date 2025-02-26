/**
* Version:     1.0.0
* Author:      Keivan Kamali
*/

wb3d_setupdata.vimeo=function(obm){

      obm.vimeo_player=[];
      obm.runfirst=[];
      
      var tag = document.createElement('script');
      tag.src = "https://player.vimeo.com/api/player.js";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      obm.createobj.vimeo=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){

            var p='position:absolute;';
            var ext2='<div id="wb3df-'+idm+'" style="'+p+'top:0px;left:0px; height:auto;width:300px;">';
            var tags1=wb3d_set_tag(B,y);
            var tag1=tags1.tag1;
            var tag2=tags1.tag2;
            var txt='<div id="wb3dg-'+idm+'" style="'+p+'overflow:hidden;">'+ext2;
            txt+='<'+tag1+' id="wb3de-'+idm+'" style="overflow:hidden">';
            txt+='<div class="wb3d_vimeo" id="video-'+idm+'"  style=" width:100%;height:100%;position:absolute;top:0px;left:0px;z-index:12;"></div>';
            txt+='</'+tag2+'>';
            txt+='</div>';
            txt+='</div>';
            document.getElementById(tmpdivid).insertAdjacentHTML('beforeend',txt);
            obm.bk_create_layer[l]=-1;
            wb3d_reset_obj_xy3(l);

      };

      obm.addon.wb3d_vimeo_run=function(sn,obm,frm,B,eff,wslide,yy,md,w0 ,yy_0,md0,id1,id_l,type_L,wh,ids,idg,cu,level){
            if(obm.runfirst[id1]!=2){
                  wb3d_vimeo_check(B,md,sn,id1,obm);
                  obm.runfirst[id1]=2;
            }
      };

      function wb3d_vimeo_check(B,y,sn,idm,obm) {

            if( !((typeof Vimeo !== 'undefined') && Vimeo && Vimeo.Player) ) {
                  setTimeout(function(){
                        wb3d_vimeo_check(B,y,sn,idm,obm);
                  },120);
            }

            else{
                  setTimeout(function(){
                        wb3d_vimeo_set (B,sn,y,idm,obm);
                  },0);
            }
      }    


      function  wb3d_vimeo_set (A,sn,i,idm,obm){

            var   option = {
            id: A['id_'+i],
            controls:1,
            };

            obm.vimeo_player[idm] = new Vimeo.Player(('video-'+idm), option);

            obm.vimeo_player[idm].loadVideo(A['id_'+i]).then(function(id) {

            }).catch(function(error) {

            });
      } 

      obm.setupobj.vimeo=function(obm,idm,T,B,wslide,name,y,sn,flag,level){
            obm.size1[idm]=1;
            obm.newsize[idm]=0;
            obm.runfirst[idm]=-1;
            obm.show_obj[idm]=3;
            wb3d_events('wb3dg-'+idm,obm);
      };
};