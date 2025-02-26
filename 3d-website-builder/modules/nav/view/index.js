/**
* Version:     1.0.0
* Author:      Keivan Kamali
* copyright :  © 2024 Keivan Kamali all rights reserved
*/
wb3d_setupdata.nav=function(obm){
      obm.nav_enter=[];
      obm.nav_run1=[];
      obm.nav_run2=[];

      obm.createobj.nav=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){

            var tags1=wb3d_set_tag(B,y);
            var tag1=tags1.tag1;
            var tag2=tags1.tag2;
            var p='position:absolute;';
            var ext2='<div id="wb3df-'+idm+'"  style="'+p+'top:0px;left:0px; height:auto;width:300px;">';
            var txt='<div id="wb3dg-'+idm+'" style="'+p+'overflow:hidden;">'+ext2;
            txt+='<'+tag1+' id="wb3de-'+idm+'" style="'+p+'">';
            for(var i=0;i<obm.setting[sn].num;i++){
                  txt+='<div class="wb3d_nav wb3d_pointer" id="wb3dr-'+idm+'-'+i+'" style="overflow:hidden;border-radius:50%;position:absolute"></div>';
            }
            txt+='</'+tag2+' ></div></div>';
            document.getElementById(tmpdivid).insertAdjacentHTML('beforeend',txt);
            obm.bk_create_layer[l]=-1;
            wb3d_reset_obj_xy3(l);
      };



      obm.addon.wb3d_nav_run=function(sn,obm,frm,B,eff,wslide,yy,md,w0 ,yy_0,md0,id1,id_l,type_L,wh,ids,idg,cu,level){
            if(level!=0){
                  idg=cu+'_'+idg;
            }
            var  x,i,border,w,h,t;
            if(obm.nav_run2[id1]!=obm.txt1[id1]+'-'+obm.txt2[id1]+'-'+obm.txt3[id1]+'-'+obm.activeslide[idg]){
                  
                  var MyRoot = document.querySelector(':root');
                  border=(B['padding_'+md]/2*obm.wh_h[id1])+'px solid '+obm.txt2[id1];

                  wb3d_checkstyle(id1);
                  wb3d_nav_setstyle0(id1+'-0',obm,id1);

                  for(i=0;i<B['num_'+md];i++){
                        MyRoot.style.setProperty('--wb3d_nav_color1-'+id1+'-'+i, obm.txt1[id1]);
                        MyRoot.style.setProperty('--wb3d_nav_color2-'+id1+'-'+i, obm.txt2[id1]);
                        MyRoot.style.setProperty('--wb3d_nav_color3-'+id1+'-'+i, obm.txt3[id1]);
                        if(obm.slide_of_location[sn+'-'+i]!=obm.activeslide[idg]){
                              x='var(--wb3d_nav_color1-'+id1+'-'+i+')';
                        }
                        else{
                              x='var(--wb3d_nav_color3-'+id1+'-'+i+')';
                        }
                        wb3d_nav_setstyle(id1+'-'+i,obm,id1,x,border);
                  }

                  obm.nav_run2[id1]=obm.txt1[id1]+'-'+obm.txt2[id1]+'-'+obm.txt3[id1]+'-'+obm.activeslide[idg];
            }

            if(obm.nav_run1[id1]!=obm.wh_h[id1]+'-'+obm.activeslide[idg]){

                  var padding;
                  obm.nav_run1[id1]=obm.wh_h[id1]+'-'+obm.activeslide[idg];

                  padding=(B['padding_'+md]*obm.wh_h[id1])+'px';

                  if(B['ver_'+md]===1){
                        obm.ide[id1].style.whiteSpace ='normal';
                        for(i=0;i<obm.slidnum[sn];i++){
                              t=((i)*((B['padding_'+md]*obm.wh_h[id1]*4)))+B['padding_'+md]*obm.wh_h[id1];
                              document.getElementById('wb3dr-'+id1+'-'+i).style.top=(t)+'px';
                              document.getElementById('wb3dr-'+id1+'-'+i).style.left=(B['padding_'+md]*obm.wh_h[id1])+'px';
                              document.getElementById('wb3dr-'+id1+'-'+i).style.padding=padding;
                        }
                        h=(obm.slidnum[sn]*(B['padding_'+md]*obm.wh_h[id1]*4))+(B['padding_'+md]*obm.wh_h[id1]);
                        w=B['padding_'+md]*obm.wh_h[id1]*5;
                  }
                  else{
                        obm.ide[id1].style.whiteSpace ='nowrap';
                        for(i=0;i<obm.slidnum[sn];i++){
                              t=((i)*((B['padding_'+md]*obm.wh_h[id1]*4)))+B['padding_'+md]*obm.wh_h[id1];
                              document.getElementById('wb3dr-'+id1+'-'+i).style.left=(t)+'px';
                              document.getElementById('wb3dr-'+id1+'-'+i).style.top=(B['padding_'+md]*obm.wh_h[id1])+'px';
                              document.getElementById('wb3dr-'+id1+'-'+i).style.padding=padding;
                        }

                        w=(obm.slidnum[sn]*(B['padding_'+md]*obm.wh_h[id1]*4))+(B['padding_'+md]*obm.wh_h[id1]);
                        h=B['padding_'+md]*obm.wh_h[id1]*5;
                  }

                  obm.ide[id1].style.width=w+"px";
                  obm.idc[id1].style.width=w+"px";
                  obm.idd[id1].style.width=w+"px";

                  obm.idc[id1].style.height=h+"px";
                  obm.idd[id1].style.height=h+"px";
                  obm.ide[id1].style.height=h+"px";

                  obm.bk_width[id1]=w;
                  obm.bk_width[id_l]=w;

                  obm.bk_height[id1]=h;
                  obm.bk_height[id_l]=h;

                  if(level===0&&wb3d.flag==='main'){
                        B['sizex_'+obm.d+'-'+md]=w;
                        B['sizey_'+obm.d+'-'+md]=h;
                  }
            }
      };


      function wb3d_nav_setstyle0(id,obm,id1){
            var keyFrames = ':root{'+
            '--wb3d_nav_color1-'+id+': #270b46;'+
            '--wb3d_nav_color2-'+id+': #0f0;'+
            '--wb3d_nav_color3-'+id+': #00f;'+
            '}';
            document.getElementById('wb3d_style_'+id1).insertAdjacentHTML('beforeend',keyFrames);
      }
      function wb3d_nav_setstyle(id,obm,id1,x,y){
            var keyFrames = '#wb3dr-'+id+'{'+
            'background: '+x+';'+
            'border: '+y+';'+
            '}'+
            '#wb3dr-'+id+':hover{'+
            'background-color: var(--wb3d_nav_color3-'+id+');'+
            '}';
            document.getElementById('wb3d_style_'+id1).insertAdjacentHTML('beforeend',keyFrames);
      }


      obm.setupobj.nav=function(obm,idm,T,B,wslide,name,y,sn,flag,level){
            obm.size1[idm]=9;
            obm.nav_enter[idm]=-1;
            obm.nav_run1[idm]=-1;
            obm.bg[idm]=1;
            obm.nav_run2[idm]=-1;
            wb3d_checkstyle(idm);
            var x=document.getElementsByClassName("wb3d_nav");
            if(level===1){
                  for (var i=0; i < x.length; i++) {
                        setTimeout((function(obm,i,x, idm, sn, wb3d_ajaxwb3d_c, B) {
                              x[i].onclick = function(){
                                    var cu=obm.wb3d_ids[idm].split('_')[0];
                                    var id=obm.wb3d_ids[idm].split('_')[1].split('-');
                                    var idg=obm.wb3d_id[cu+'_'+id[0]+'-'+id[1]+'-'+id[2]];
                                    var num=obm.slide_of_location[sn+'-'+this.id.split('-')[2]];
                                    wb3d_ajaxwb3d_c(obm,sn,id[0],id[1],id[2],id[3],B,-2,cu+'_'+idg,num,cu,0);
                              };
                        }).bind(null, obm,i,x, idm, sn, wb3d_ajaxwb3d_c, B), 0);
                  }
            }
            B['num_'+y]=obm.slidnum[sn];
            obm.show_obj[idm]=3;
            wb3d_events('wb3dg-'+idm,obm);
      };
};