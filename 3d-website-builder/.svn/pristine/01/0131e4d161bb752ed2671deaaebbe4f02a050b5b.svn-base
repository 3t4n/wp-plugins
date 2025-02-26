/**
* Version:     1.0.0
* Author:      Keivan Kamali
*/
wb3d_setupdata.button1=function(obm){
      obm.button1_data=[];
      obm.button1_run=[];
      obm.button1_style='left';

      obm.createobj.button1=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){
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

      obm.addon.wb3d_button1_run=function(sn,obm,frm,B,eff,wslide,yy,md,w0 ,yy_0,md0,id1,id_l,type_L,wh,ids,idg,cu,level){
            if(obm.button1_run[id1]!=obm.txt1[id1]+'-'+obm.txt2[id1]+'-'+obm.txt3[id1]+'-'+obm.chenge_details_obj[id1]){
                  var MyRoot = document.querySelector(':root');
                  MyRoot.style.setProperty('--wb3d_button1_color1-'+id1, obm.txt1[id1]);
                  MyRoot.style.setProperty('--wb3d_button1_color2-'+id1, obm.txt2[id1]);
                  MyRoot.style.setProperty('--wb3d_button1_color3-'+id1, obm.txt3[id1]);
                  obm.button1_run[id1]=obm.txt1[id1]+'-'+obm.txt2[id1]+'-'+obm.txt3[id1]+'-'+obm.chenge_details_obj[id1];
            }
      };

      obm.setupobj.button1=function(obm,idm,T,B,wslide,name,y,sn,flag,level){
            obm.size1[idm]=2;
            obm.newsize[idm]=2;
            obm.bg[idm]=1;
            obm.show_obj[idm]=3;
            obm.button1_run[idm]=-1;
            wb3d_checkstyle(idm);
            wb3d_button1_setstyle(idm);
            wb3d_events('wb3dg-'+idm,obm);
      };


      function wb3d_button1_setstyle(id,obm){

            var keyFrames = ':root{'+
                  '--wb3d_button1_color1-'+id+': #270b46;'+
                  '--wb3d_button1_color2-'+id+': #0f0;'+
                  '--wb3d_button1_color3-'+id+': #00f;'+
            '}'+
            '#wb3de-'+id+'{'+
                  'background: var(--wb3d_button1_color1-'+id+');'+
                  'color: var(--wb3d_button1_color2-'+id+');'+
            '}'+
            '#wb3de-'+id+':hover{'+
                  'background:none;'+
                  'background-color: var(--wb3d_button1_color3-'+id+');'+
            '}';
            document.getElementById('wb3d_style_'+id).innerHTML = keyFrames;
      }
};