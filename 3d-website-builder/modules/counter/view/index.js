/**
* Version:     1.0.0
* Author:      Keivan Kamali
*/
wb3d_setupdata.counter=function(obm){
      obm.counter_data=[];
      obm.counter_run=[];
      obm.counter_stop=[];

      obm.createobj.counter=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){
            var p='position:absolute;';
            var ext2='<div id="wb3df-'+idm+'" style="'+p+'top:0px;left:0px; height:auto;width:300px;">';
            var txt='<div id="wb3dg-'+idm+'" style="'+p+'overflow:hidden;">'+ext2;
            var style1='style="overflow:hidden;;height:auto;width:auto;'+p+'"';
            var tags1=wb3d_set_tag(B,y);
            var tag1=tags1.tag1;
            var tag2=tags1.tag2;
            txt+='<'+tag1+' id="wb3de-'+idm+'" '+style1+'>0</'+tag2+'>';
            txt+='</div>';
            txt+='</div>';
            document.getElementById(tmpdivid).insertAdjacentHTML('beforeend',txt);
            obm.bk_create_layer[l]=-1;
            wb3d_reset_obj_xy3(l);
      };


      obm.addon.wb3d_counter_stop=function(sn,obm,frm,B,eff,wslide,yy,md,w0 ,yy_0,md0,id1,id_l,type_L,wh,ids,idg,cu,level){

            if(obm.counter_data[id1]!=obm.counter_stop[id1]){

                  if(obm.counter_run[id1]!=obm.txt1[id1]+'-'+obm.txt2[id1]+'-'+obm.txt3[id1]){
                        var MyRoot = document.querySelector(':root');
                        MyRoot.style.setProperty('--wb3d_counter_color1-'+id1, obm.txt1[id1]);
                        MyRoot.style.setProperty('--wb3d_counter_color2-'+id1, obm.txt2[id1]);
                        MyRoot.style.setProperty('--wb3d_counter_color3-'+id1, obm.txt3[id1]);
                        obm.counter_run[id1]=obm.txt1[id1]+'-'+obm.txt2[id1]+'-'+obm.txt3[id1];
                  }

                  if(B['reset_'+md]==1){     
                        obm.counter_data[id1]=0;
                        obm.counter_stop[id1]=0;
                        document.getElementById('wb3de-'+id1).innerHTML = Math.floor(obm.counter_data[id1])+''+B['atext_'+md];
                        obm.bk_change_sizew[id1]=-1;
                        wb3d_set_width_height(obm,B,sn,id_l,id1,'layer',wslide,yy,md,eff,frm,ids,idg,level,cu);
                  }

            }
      };


      obm.addon.wb3d_counter_run=function(sn,obm,frm,B,eff,wslide,yy,md,w0 ,yy_0,md0,id1,id_l,type_L,wh,ids,idg,cu,level){

            if(obm.counter_run[id1]!=obm.txt1[id1]+'-'+obm.txt2[id1]+'-'+obm.txt3[id1]){
                  var MyRoot = document.querySelector(':root');
                  MyRoot.style.setProperty('--wb3d_counter_color1-'+id1, obm.txt1[id1]);
                  MyRoot.style.setProperty('--wb3d_counter_color2-'+id1, obm.txt2[id1]);
                  MyRoot.style.setProperty('--wb3d_counter_color3-'+id1, obm.txt3[id1]);
                  obm.counter_run[id1]=obm.txt1[id1]+'-'+obm.txt2[id1]+'-'+obm.txt3[id1];
            }
            if(B['num_'+md]>obm.counter_data[id1]){
                  var x=B['num_'+md]/(B['time_'+md]*25);
                  obm.counter_data[id1]+=x;
                  if(obm.counter_data[id1]>B['num_'+md]){
                        obm.counter_data[id1]=B['num_'+md];
                  }
                  document.getElementById('wb3de-'+id1).innerHTML = Math.floor(obm.counter_data[id1])+''+B['atext_'+md];
                  obm.bk_change_sizew[id1]=-1;
                  wb3d_set_width_height(obm,B,sn,id_l,id1,'layer',wslide,yy,md,eff,frm,ids,idg,level,cu);
            }
      };

      obm.setupobj.counter=function(obm,idm,T,B,wslide,name,y,sn,flag,level){
            obm.size1[idm]=2;
            obm.newsize[idm]=2;
            obm.bg[idm]=1;
            obm.counter_run[idm]=-1;
            obm.counter_data[idm]=0;
            wb3d_checkstyle(idm);
            wb3d_counter_setstyle(idm);
            obm.show_obj[idm]=3;
            wb3d_events('wb3dg-'+idm,obm);
      };

      function wb3d_counter_setstyle(id){

            var keyFrames = ':root{'+
                  '--wb3d_counter_color1-'+id+': #270b46;'+
                  '--wb3d_counter_color2-'+id+': #0f0;'+
                  '--wb3d_counter_color3-'+id+': #0f0;'+
            '}'+
            '#wb3de-'+id+'{'+
                  'background: var(--wb3d_counter_color1-'+id+');'+
                  'color: var(--wb3d_counter_color2-'+id+');'+
            '}'+
            '#wb3de-'+id+':hover{'+
                  'background:none;'+
                  'background-color: var(--wb3d_counter_color3-'+id+');'+
            '}';
            document.getElementById('wb3d_style_'+id).innerHTML = keyFrames;
      }
};