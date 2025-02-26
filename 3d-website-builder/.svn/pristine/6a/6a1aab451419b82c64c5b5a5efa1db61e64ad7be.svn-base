/**
* Version:     1.0.0
* Author:      Keivan Kamali
*/
wb3d_setupdata.button2=function(obm){
      obm.button2_data=[];
      obm.button2_run=[];
      obm.button2_style='left';

      obm.createobj.button2=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){
            var p='position:absolute;';
            var ext2='<div  id="wb3df-'+idm+'" style="'+p+'top:0px;left:0px; height:auto;width:300px;">';
            var txt='<div id="wb3dg-'+idm+'" style="'+p+'overflow:hidden;">'+ext2;
            var tags1=wb3d_set_tag(B,y);
            var tag1=tags1.tag1;
            var tag2=tags1.tag2;
            var style1='style="overflow:hidden;height:auto;width:auto;'+p+'"';
            txt+='<'+tag1+' id="wb3de-'+idm+'" '+style1+'>'+B["text_"+y]+'</'+tag2+'>';
            txt+='</div>';
            txt+='</div>';
            document.getElementById(tmpdivid).insertAdjacentHTML('beforeend',txt);
            obm.bk_create_layer[l]=-1;
            wb3d_reset_obj_xy3(l);

      };

      obm.addon.wb3d_button2_run=function(sn,obm,frm,B,eff,wslide,yy,md,w0 ,yy_0,md0,id1,id_l,type_L,wh,ids,idg,cu,level){

            if(obm.button2_run[id1]!=obm.txt1[id1]+'-'+obm.txt2[id1]+'-'+obm.txt3[id1]+'-'+obm.chenge_details_obj[id1]){
                  var MyRoot = document.querySelector(':root');
                  MyRoot.style.setProperty('--wb3d_button2_color1-'+id1, obm.txt1[id1]);
                  MyRoot.style.setProperty('--wb3d_button2_color2-'+id1, obm.txt2[id1]);
                  MyRoot.style.setProperty('--wb3d_button2_color3-'+id1, obm.txt3[id1]);
                  MyRoot.style.setProperty('--wb3d_button2_height-'+id1, ((obm.bk_height[id1]+1)/2)+'px');
                  obm.button2_run[id1]=obm.txt1[id1]+'-'+obm.txt2[id1]+'-'+obm.txt3[id1]+'-'+obm.chenge_details_obj[id1];
            }
      };

      obm.setupobj.button2=function(obm,idm,T,B,wslide,name,y,sn,flag,level){
            obm.size1[idm]=2;
            obm.newsize[idm]=2;
            obm.bg[idm]=1;
            obm.bshadow[idm]=1;
            obm.show_obj[idm]=3;
            obm.button2_run[idm]=-1;
            wb3d_checkstyle(idm);
            wb3d_button2_setstyle(idm,obm);
            wb3d_events('wb3dg-'+idm,obm);
      };


      function wb3d_button2_setstyle(id,obm){
            var keyFrames = ':root{'+
                  '--wb3d_button2_color1-'+id+': #270b46;'+
                  '--wb3d_button2_color2-'+id+': #0f0;'+
                  '--wb3d_button2_color3-'+id+': #00f;'+
                  '--wb3d_button2_height-'+id+': 30;'+
            '}'+
            '#wb3de-'+id+'{'+
                  'background: var(--wb3d_button2_color1-'+id+');'+
                  'color: var(--wb3d_button2_color2-'+id+');'+
            '}'+
            '#wb3de-'+id+':hover{'+
                  '-webkit-transition: .5s;'+
                  'transition: .7s;'+
                  'box-shadow:inset 0 0 0 var(--wb3d_button2_height-'+id+') var(--wb3d_button2_color3-'+id+');'+
            '}';
            document.getElementById('wb3d_style_'+id).innerHTML = keyFrames;
      }

};