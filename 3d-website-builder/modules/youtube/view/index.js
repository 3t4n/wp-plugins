/**
* Version:     1.0.0
* Author:      Keivan Kamali
*/
wb3d_setupdata.youtube=function(obm){

      var tag = document.createElement('script');
      tag.src = "//www.youtube.com/player_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      
      obm.youtube_player=[];
      obm.addon.wb3d_youtube_run=function(sn,obm,frm,B,eff,wslide,yy,md,w0 ,yy_0,md0,id1,id_l,type_L,wh,ids,idg,cu,level){
            if(obm.runfirst[id1]!=2){
                  wb3d_youtube_check(B,md,sn,id1,obm);
            }
      };

      obm.createobj.youtube=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){
            var p='position:absolute;';
            var ext2='<div id="wb3df-'+idm+'" style="'+p+'top:0px;left:0px; height:auto;width:300px;">';
            var tags1=wb3d_set_tag(B,y);
            var tag1=tags1.tag1;
            var tag2=tags1.tag2;
            var txt='<div id="wb3dg-'+idm+'" style="'+p+'overflow:hidden;">'+ext2;
            txt+='<'+tag1+' id="wb3de-'+idm+'" style="overflow:hidden">';
            txt+='<video id="video-'+idm+'"  style=" width:100%;height:100%;position:absolute;top:0px;left:0px;z-index:1;"></video>';
            txt+='</'+tag2+' >';
            txt+='</div>';
            txt+='</div>';
            document.getElementById(tmpdivid).insertAdjacentHTML('beforeend',txt);
            obm.bk_create_layer[l]=-1;
            wb3d_reset_obj_xy3(l);
      };


      function wb3d_youtube_check(B,y,sn,idm,obm) {

            if( !((typeof YT !== 'undefined') && YT && YT.Player) ) {
                  setTimeout(function(){
                        wb3d_youtube_check(B,y,sn,idm,obm);
                  },100);
            }

            else{
                  if(obm.runfirst[idm]!=2){
                        wb3d_youtube_set (B,sn,y,idm,obm);
                        obm.runfirst[idm]=2;
                  }
            }
      }    






      function   wb3d_youtube_set (A,sn,i,idm,obm){
            if((typeof YT !== 'undefined') && YT && YT.Player){
                  obm.youtube_player[idm] = new YT.Player(('video-'+idm), {
                        height: '380',
                        width: '280',

                        videoId:A['id_'+i],
                        playerVars: { 'disablekb':0,'start':0 ,'html5':1,'fs':1,'controls':1,'modestbranding':0,'autohide':0,'autoplay':0},
                        events: {
                        },
                  });
            }
      } 


      obm.setupobj.youtube=function(obm,idm,T,B,wslide,name,y,sn,flag,level){
            obm.size1[idm]=1;
            obm.runfirst[idm]=-1;
            obm.show_obj[idm]=3;
            wb3d_events('wb3dg-'+idm,obm);
      };
};