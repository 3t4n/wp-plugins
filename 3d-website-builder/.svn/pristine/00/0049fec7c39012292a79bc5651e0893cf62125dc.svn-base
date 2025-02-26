/**
* Version:     1.0.0
* Author:      Keivan Kamali
* copyright :  © 2024 Keivan Kamali all rights reserved
*/
wb3d_setupdata.ajaxwb3d=function(obm){
      obm.ajaxwb3d_reset=[];
      obm.ajaxwb3d_Breset=[];
      obm.createobj.ajaxwb3d=function(sn,idm,B,tmpdivid,obm,y,flag,ind,wslide,cu,level){
            var p='position:absolute;';
            var T=B['type_obj-'+y];
            obm.size1[idm]=1;
            var sl;
            if(flag===0||(flag===1&&B['ajax_'+y  ]===1)){

                  wb3d_set_bk(idm,obm);
                  var sn2=B['slider_'+y];
                  obm.slidnum[sn2]=obm.setting[sn2].num;
                  var b=0;
                  var obj_=y;

                  for(p=0;p<obm.slidnum[sn2];p++){
                        var aa=obm.dataslide[sn2][p];
                        var ff=aa[0].slide_of_location;
                        obm.slide_of_location[sn2+'-'+p]=ff;
                        obm.layers[sn2+'-'+ff]=aa[0].layer;

                        obm.activeslide[cu+'_'+idm]=obm.slide_of_location[sn2+'-'+0];
                        var cf=cu+'_'+wslide+'-'+ind+'-'+obj_+'-'+ff;
                        obm.slide_time[cf]=parseInt(aa[0].maxtime*25);
                        obm.los[sn2+'-'+ff]=p;


                        if(obm.wb3d_id_org[cf]===undefined){
                              sl=wb3d_create_id(cf,obm);
                        }
                        else{
                              sl=obm.wb3d_id[cf];
                        }

                        obm.bk_dis_slide[cf]=-1;

                        wb3d_create_slider(sl,'wb3de-'+idm,sn2,y,B,obm,cu,1);
                        obm.wb3d_ids_org[sl]=obm.wb3d_ids[sl];


                        for(var i=0;i< obm.layers[sn2+'-'+ff];i++){
                              b++;
                              wb3d_createlayer(cu,ff,i,aa,'load_db',0,1,sn2,wslide,ind,obj_,obm,1  );
                              var l1=obm.la_l[sn2+'-'+ff+'-'+i];
                              var K=obm.dataslide[sn2][obm.los[sn2+'-'+ff]][obm.lo_l[sn2+'-'+ff+'-'+l1]];

                              for(var r=0;r<K.layer_obj;r++){
                                    if(K['type_'+K['obj_num_'+r]]!='wb3d'){
                                          sl=cf+'-'+l1;
                                          var id=wb3d_create_id(sl+'-'+K['obj_num_'+r],obm);
                                          if(obm.U_P[sn2+'-'+ff+'-'+l1]!=0){
                                                tmpdivid='wb3de-'+obm.wb3d_id[cf+'-'+obm.U_P[sn2+'-'+ff+'-'+l1]];
                                          }
                                          else{
                                                tmpdivid='wb3dh-'+obm.wb3d_id[cf];
                                          }

                                          T=K[ 'type_obj-'+K['obj_num_'+r]];
                                          var sf=T.split('_');

                                          if(sf[1]!=undefined){
                                                obm.createobj[sf[0]](sn2,id,K,tmpdivid,obm,K['obj_num_'+r],2,cf+'-'+l1,ff,cu,1);
                                          }
                                          else{
                                                obm.createobj[T](sn2,id,K,tmpdivid,obm,K['obj_num_'+r],2,cf+'-'+l1,ff,cu,1);
                                          }
                                          wb3d_set_bk(id,obm,sl);
                                    }
                              }
                        }

                        if(obm.number_effect_compile[sn2]===obm.number_effect_name[sn2]){
                              obm.bk_create_layer[cu+'_'+wslide+'-'+ind+'-'+obj_]=-1;
                              obm.bk_create_layer[cu+'_'+wslide+'-'+ind]=-1;
                              obm.bk_id[cu+'_'+wslide+'-'+ind]=-1;
                              if(B['ajax_'+obj_  ]===1){
                                    B['ajax_'+obj_  ]=11;
                              }
                              obm.ajaxwb3d_ajax_flag[sn]=2;
                              obm.putimagecanvas();
                        }
                  }
            }
            obm.flag_bl2[0+'_'+idm]=0;
      };


      obm.addon.wb3d_ajaxwb3d_stop=function(sn,obm,frm,B,eff,wslide,yy,md,wslide_0 ,yy_0,md0,id1,id_l,type_L,wh,ids,idg,cu,level){
            idg='0_'+id1;
            if(obm.ajaxwb3d_reset[idg]!=1&&B['reset_'+md]==1){

                  wb3d_ajaxwb3d_c(obm,B['slider_'+md],wslide,yy,md,obm.activeslide[idg],B,md,idg,obm.slide_of_location[B['slider_'+md]+'-0'],cu,5);
                  if(obm.change_status[idg]===1){
                        var sx=obm.setting[B['slider_'+md]]['w_'+obm.d];
                        var sy=obm.setting[B['slider_'+md]]['h_'+obm.d];
                        wb3d_pre_change(obm,B['slider_'+md], cu+'_'+wslide+'-'+yy+'-'+md,obm.ajaxwb3d_preslide[idg],obm.ajaxwb3d_nextslide[idg],sx*obm.wb3d_ax[idg],sy*obm.wb3d_ay[idg],idg,cu,1,B,md,'none');
                        wb3d_ajaxwb3d_run_sub_layer(B,wslide,yy,md,obm.gs,obm,id1,cu);                  
                  }
            }

      }
      obm.addon.wb3d_ajaxwb3d_run=function(sn,obm,frm,B,eff,wslide,yy,md,wslide_0 ,yy_0,md0,id1,id_l,type_L,wh,ids,idg,cu,level){
            var gs;
            if(obm.ajaxwb3d_run1[id1]!=1){
                  obm.ajaxwb3d_run1[id1]=1;
                  var tmpdivid='wb3dh-'+obm.wb3d_id[cu+'_'+obm.activeslide[cu]];
                  if(B['ajax_'+md  ]===1){
                        wb3d_ajaxwb3d_ajax(B,id1,B,tmpdivid,obm,md,B['slider_'+md],wslide,yy,md,1,cu);
                  }
            }

            if(obm.ajaxwb3d_run2[id1]!=1&&obm.bk_create_layer[cu+'_'+wslide+'-'+yy+'-'+md]===1&&obm.ajaxwb3d_run1[id1]===1){

                  obm.ajaxwb3d_run2[id1]=1;
                  obm.flag_bl2[cu+'_'+id1]=0;
                  wb3d_reset_obj_xy3(id1);
                  gs=obm.gs;
                  obm.event_slide_change[id1]=-1;
                  wb3d_ajaxwb3d_run_sub_layer(B,wslide,yy,md,gs,obm,id1,cu);

                  obm.event_slide_change[id1]=-1;
                  wb3d_ajaxwb3d_run_sub_layer(B,wslide,yy,md,gs,obm,id1,cu);
                  wb3d_reset_data_slider_sub(obm,B,0,id1,0,wslide,yy,md,sn)

            }


            if(obm.ajaxwb3d_run2[id1]===1){
                  gs=obm.gs;
                  obm.event_slide_change[id1]=-1;
                  wb3d_ajaxwb3d_run_sub_layer(B,wslide,yy,md,gs,obm,id1,cu);
                  obm.ajaxwb3d_reset['0_'+id1]=0;
            }
      };
      obm.ajaxwb3d_vscroll_c=[];
      obm.ajaxwb3d_vscroll_p=[];
      obm.ajaxwb3d_ajax_flag=[];
      obm.ajaxwb3d_nextslide=[];
      obm.ajaxwb3d_preslide=[];



      function wb3d_ajaxwb3d_run_sub_layer(B,wslide,yy,md,gs,obm,r_idg,cu){

            var idg=cu+'_'+r_idg;
            var sn1=B['slider_'+md];
            var ac_s=obm.activeslide[idg];
            gs=obm.gs;
            var ye,wh;
            var x=cu+'_'+wslide+'-'+yy+'-'+md;
            if(B['P_s'+obm.d]!=0){
                  wh=obm.wb3d_ax[cu+'_0'];
                  if(wh>obm.wb3d_ay[cu+'_0']){
                        wh=obm.wb3d_ay[cu+'_0'];
                  }
            }
            if(B['type_obj-'+md  ]===undefined){
                  return;
            }
            if(B['vs_'+md  ]===1){

                  if(obm.ajaxwb3d_vscroll_p[x]!=obm.vscroll[cu+'_0']){
                        obm.ajaxwb3d_vscroll_p[x]=obm.vscroll[cu+'_0'];
                        var v=obm.vscroll[cu+'_0']-obm.vscrollS[idg];

                        if(v<=0||v===undefined||isNaN(v)){
                              obm.vscroll[idg]=0;
                        }
                        else if(v>obm. scrollMaxY[idg]){
                              obm.vscroll[idg]=obm. scrollMaxY[idg];
                        }
                        else{
                              obm.vscroll[idg]=v;
                        }

                        obm.ajaxwb3d_vscroll_c[x]=obm.vscroll[idg];

                  }
            }
            if(obm.change_status[idg]===1&&B['vs_'+md  ]===0){
                  var sx=obm.setting[B['slider_'+md]]['w_'+obm.d];
                  var sy=obm.setting[B['slider_'+md]]['h_'+obm.d];
                  wb3d_pre_change(obm,sn1, cu+'_'+wslide+'-'+yy+'-'+md,obm.ajaxwb3d_preslide[idg],obm.ajaxwb3d_nextslide[idg],sx*obm.wb3d_ax[idg],sy*obm.wb3d_ay[idg],idg,cu,1,B,md);
            }
            else if(obm.framenum[x+'-'+obm.activeslide[idg]]===obm.slide_time[x+'-'+obm.activeslide[idg]]&&B['vs_'+md  ]===0&&obm.slidnum[sn1]>1){
                  wb3d_ajaxwb3d_c(obm,sn1,wslide,yy,md,ac_s,B,md,idg,-1,cu);
            }
            else if(obm.activeslide[idg]===ac_s){
                  obm.framenum[x+'-'+obm.activeslide[idg]]++;
            }
            if(obm.bk_dis_slide[x+'-'+ac_s]!=1){
                  document.getElementById('wb3dh-'+obm.wb3d_id[x+'-'+ac_s]).style.display='block';
                  obm.bk_dis_slide[x+'-'+ac_s]=1;
            }

            for(var p=0;p<=obm.slidnum[sn1];p++){

                  if(p===obm.slidnum[sn1]){
                        if(B['ajax_'+md ]!=1){
                              wb3d_set_scrollMaxY2(obm,idg,1,cu,sn1);
                        }
                        return;
                  }

                  var ff=obm.dataslide[sn1][p][0].slide_of_location;
                  if(obm.setup[idg+'-'+ff]!=1||ac_s===ff){
                        ac_s=ff;
                        obm.setup[idg+'-'+ff]=1;
                  }
                  else{
                        continue;
                  }

                  if(obm.bk_responsive[idg]!=obm.wh_w[r_idg]+'_'+obm.wh_h[r_idg]){
                        wb3d_ajaxwb3d_first_run(r_idg,obm,sn1,B,wslide,yy,md,cu,wh);
                        obm.bk_responsive[idg]=obm.wh_w[r_idg]+'_'+obm.wh_h[r_idg];
                  }

                  for(var c=0;c<obm.static_c[sn1];c++){
                        if(ac_s!=obm.static_s[sn1][c]){
                              ye=obm.static_y[sn1][c];
                              wb3d_ajaxwb3d_run_sub_layer2(B,wslide,yy,md,gs,obm,wh,r_idg,sn1,obm.static_s[sn1][c],ye,x,cu,1);
                        }
                  }
                  for(ye=1;ye<obm.layers[sn1+'-'+ac_s ];ye++){
                        wb3d_ajaxwb3d_run_sub_layer2(B,wslide,yy,md,gs,obm,wh,r_idg,sn1,ac_s,ye,x,cu,0);
                  }

            }
      }

      function wb3d_ajaxwb3d_run_sub_layer2(B,wslide,yy,md,gs,obm,wh,r_idg,sn1,ac_s,ye,x,cu,static1){
            var idg=cu+'_'+r_idg;
            var ys=obm.la_l[sn1+'-'+ac_s+'-'+ye];
            var C=obm.dataslide[sn1][ obm.los[sn1+'-'+ac_s] ][ye];
            var ids=x+'-'+ac_s;
            var eff=C['EB_'+obm.d];
            var md0=0;
            var id_l=x+'-'+ac_s+'-'+ys;
            var frm=0;
            if(eff!=-1){
                  frm=obm.pixel_frm[sn1+'-'+eff+'-'+obm.framenum[id_l]];
            }
            var y1=obm.scY1[id_l];
            var y2=obm.scY2[id_l];

            var run=1;
            if(y1===undefined){
                  run=0;
            }


            var flag=1;
            if(C['C_'+obm.d]*25>obm.framenum[ids]){
                  flag=0;
            }
            else if(C['F_'+obm.d]*25<obm.framenum[ids]){
                  flag=0;
            }
            else if(obm.vscroll[idg]<y1){
                  flag=0;
            }
            else if(obm.vscroll[idg]>y2){
                  flag=0;
            }

            var flag3=1;

            if(static1===1){
                  flag=1;
            }
            if(eff!=-1){
                  var obj=obm.gs[sn1][eff];
                  if( obj.E[0][21]!=0){

                        if(obm.id_pre_stop[id_l]!=frm){

                              if(obj.E[21][frm]>0&&obm.id_stop[id_l]!=1){
                                    obm.id_time_stop[id_l]=obj.E[21][frm]*2.5;
                                    obm.id_stop[id_l]=1;
                                    flag3=0;
                                    obm.id_bk_pre_stop[id_l]=frm;
                              }

                              else if(obm.id_stop[id_l]===1&&obm.id_time_stop[id_l]>0){
                                    obm.id_time_stop[id_l]--;
                                    flag3=0;
                              }
                              else if(obm.id_stop[id_l]===1&&obm.id_time_stop[id_l]<=0){
                                    obm.id_stop[id_l]=0;
                                    obm.id_pre_stop[id_l]=obm.id_bk_pre_stop[id_l];
                              }
                              else{
                                    obm.id_pre_stop[id_l]=-2;
                              }
                        }
                  }
                  if(flag===1&&flag3===1){
                        frm=wb3d_set_frame(sn1,eff,ids+'-'+ys,obm.vscroll[idg],1,obm,C,C['T_E'+obm.d],C['repeat'+obm.d]);
                  }


                  if(obj.E[0][26]!=0){
                        md0=obj.E[26][frm];
                  }
            }


            var id1=x+'-'+ac_s+'-'+ys+'-'+md0;

            if(flag===1){
                  if(obm.bk_flag[obm.wb3d_id[id1]]!=1){
                        obm.bk_flag[obm.wb3d_id[id1]]=1;
                        obm.chenge_display[obm.wb3d_id[id1]]=-1;
                  }
            }
            else if(obm.bk_flag[obm.wb3d_id[id1]]!=0){
                  obm.bk_flag[obm.wb3d_id[id1]]=0;
                  obm.chenge_display[obm.wb3d_id[id1]]=-1;
            }


            if(obm.bk_f[id_l]!=frm){
                  obm.chenge_details_obj[obm.wb3d_id[id1]]=0;
                  obm.chenge_details_obj2[obm.wb3d_id[id1]]=0;
            }

            if(obm.bk_mode[id_l]!=md0){
                  obm.chenge_display[obm.wb3d_id[id1]]=-1;
            }

            if(C[ 'type_'+md0]!='wb3d'){
                  wb3d_set_style(sn1,obm,frm,C,eff,ac_s,ys,md0,wslide,yy,md,obm.wb3d_id[id1],id_l,'layer',run,id1,flag,ids,flag3,r_idg,1);
            }
      }

      function wb3d_ajaxwb3d_first_run(r_idg,obm,sn1,B,wslide,yy,md,cu,wh){

            var snc,t,ff;
            var idg=cu+'_'+r_idg;
            var x=(B['sizex_'+obm.d+'-'+md]/obm.setting[sn1]['w_'+obm.d])*obm.wh_w[r_idg];
            var y=(B['sizey_'+obm.d+'-'+md]/obm.setting[sn1]['h_'+obm.d])*obm.wh_h[r_idg];
            obm.wb3d_ax[idg]=x;
            obm.wb3d_ay[idg]=y;
            obm.wh3[idg]=y;
            for(var p=0;p<obm.slidnum[sn1];p++){
                  ff=obm.dataslide[sn1][p][0].slide_of_location;
                  if(obm.setting[sn1].colortype!=1){
                        t=obm.setting[obm.sn[cu+'-0']]['c'+obm.sColortable]; 
                        snc=obm.sn[cu+'-0'];
                  }
                  else{
                        t=obm.setting[sn1]['c'+obm.sColortable]; 
                        snc=sn1;
                  }
                  var c= snc+'-'+t+'-'+obm.dataslide[sn1][obm.los[sn1+'-'+ff]][0].slide_r;
                  document.getElementById('wb3dh-'+obm.wb3d_id[cu+'_'+wslide+'-'+yy+'-'+md+'-'+ff]).style.backgroundColor ='rgba('+obm.r[c]+','+obm.g[c]+','+obm.b[c]+','+(obm.a[c]/255)+')';

            }
      }


      function wb3d_ajaxwb3d_ajax(B,idm,K,tmpdivid,obm,i,s,wslide,ne,obj,flag,cu){


            if(obm.ajaxwb3d_ajax_flag[s]===1&&obm.setting[s]===undefined){
                  setTimeout(function(){
                        wb3d_ajaxwb3d_ajax(B,idm,K,tmpdivid,obm,i,s,wslide,ne,obj,flag,cu);
                  },  30 );
                  return;
            }
            var sn=obm.sn['0-0'];
            obm.ajaxwb3d_ajax_flag[s]=1;
            obm.runfirst[idm]=1;
            if(obm.setting[s]===undefined){
                  obm.setting[sn]['slider_load_'+s]=1;

                  var ajaxurl=wb3d.wb3d_ADMIN_URL+'admin-ajax.php';

                  var xhr = new XMLHttpRequest();

                  xhr.open('POST', ajaxurl+ '?action=wb3d_get_sub_slider_data', true);


                  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                  xhr.onreadystatechange = function() {
                        if (this.readyState === 4 && this.status === 200) {

                              var c=JSON.parse(this.responseText); 
                              for(var v=1;v<1000;v++){
                                    if(obm.data_slide[cu][v]===undefined){
                                          break;
                                    }
                              }

                              obm.data_slide[cu][v]=c;
                              wb3d_compilesliderX(c.id_ves,v,cu);

                              for(var j=0;j<obm.setting[c.id_ves].num;j++){
                                    var f=obm.dataslide[c.id_ves][j][0].slide_of_location;
                                    obm.dataslide[c.id_ves][j][0]['los_'+f]=j;
                                    obm.los[c.id_ves+'-'+f]=j;
                              }

                              obm.createobj.ajaxwb3d(sn,idm,K,tmpdivid,obm,i,flag,ne,wslide,cu,0);
                              wb3d_ajaxwb3d_check_effect_compile2(c.id_ves,obm,cu+'_'+wslide+'-'+ne,obj,K);

                        }
                  };

                  xhr.send('id_ves='+s+'&wb3d_nonce='+wb3d.wb3d_nonce);
            }
            else{

                  obm.createobj.ajaxwb3d(sn,idm,K,tmpdivid,obm,i,flag,ne,wslide,cu,0);
                  obm.bk_create_layer[cu+'_'+wslide+'-'+ne+'-'+obj]=-1;
                  obm.bk_create_layer[cu+'_'+wslide+'-'+ne]=-1;
                  obm.bk_id[cu+'_'+wslide+'-'+ne]=-1;
                  K['type_obj-'+obj  ]='ajaxwb3d';
                  K['type_'+obj  ]='wb3d';
                  wb3d_ajaxwb3d_check_effect_compile2(s,obm,cu+'_'+wslide+'-'+ne,obj,K);
            }

      }

      obm.setupobj.ajaxwb3d=function(obm,idm,T,B,wslide,ne,y,sn,flag,level){

            obm.size1[idm]=1;
            var cu=obm.wb3d_ids[idm].split('_')[0];
            obm.event_slide_change[idm]=-1;
            obm.show_obj[idm]=3;
            wb3d_scroll_event(idm,obm,'wb3dg-'+idm);
            wb3d_events('wb3dg-'+idm,obm );
            document.getElementById('wb3d_waiting'+idm).style.display='none';
            tmp=obm.all_slider[B['slider_'+y]];

            var sn2=B['slider_'+y];
            obm.set_end1[cu+'_'+wslide+'-'+ne+'-'+y]=0;

            obm.change_status[cu+'_'+idm]=0;
            obm.slidnum[sn2]=obm.setting[sn2].num;
            wslide=obm.activeslide[cu];

            for(var p=0;p<obm.slidnum[sn2];p++){
                  var ind=ne;
                  var obj_=y;
                  var ff=obm.dataslide[sn2][p][0].slide_of_location;
                  var ids=cu+'_'+wslide+'-'+ne+'-'+y+'-'+ff;
                  obm.bk_play[ids+'-'+0]='play';
                  obm.slide_of_location[sn2+'-'+p]=ff;
                  obm.framenum[ids]=-1;
                  var idsn0=ids+'-'+0;
                  obm.framenum[idsn0]=0;
                  obm.layers[sn2+'-'+ff]=obm.dataslide[sn2][p][0].layer;
                  obm.activeslide[cu+'_'+idm]=obm.slide_of_location[sn2+'-'+0];
                  obm.slide_time[ids]=parseInt(obm.dataslide[sn2][p][0].maxtime*25);
                  obm.los[sn2+'-'+ff]=p;
                  var id1=obm.wb3d_id[ids];
                  obm.bk_p_scx[id1]=0;
                  obm.bk_p_scy[id1]=0;
                  obm.bk_p_r[id1]=0;
                  obm.bk_p_rx[id1]=0;
                  obm.bk_p_ry[id1]=0;
                  obm.bk_p_skx[id1]=0;
                  obm.bk_p_sky[id1]=0;
                  obm.ide[id1]=document.getElementById('wb3dh-'+id1)
                  obm.idd[id1]=document.getElementById('wb3dh-'+id1)
                  obm.idc[id1]=document.getElementById('wb3dh-'+id1)

                  if(B['overflow_'+y]===1){
                        obm.idc[id1].style.overflow='hidden';
                        obm.ide[id1].style.overflow='hidden';            
                  }
                  else{
                        obm.idc[id1].style.overflow='';
                        obm.ide[id1].style.overflow=''; 
                  }
                  wb3d_create_slider(obm.wb3d_id[ids],'patern',sn2,y,B,obm,cu,1);
                  var aa=obm.dataslide[sn2][p];
                  obm.layers[sn2+'-'+ff]=aa[0].layer;
                  for(i=0;i< obm.layers[sn2+'-'+ff];i++){
                        if(flag!=1){
                              wb3d_createlayer(cu,ff,i,aa,'load_db',0,1,sn2,wslide,ind,obj_,obm,0  );
                        }
                        obm.true_frm[ids+'-'+obm.la_l[sn2+'-'+ff+'-'+i]]=0;
                  }
            }
      };


      wb3d_ajaxwb3d_check_effect_compile2=function(sn,obm,l,obj,B){
            if(obm.number_effect_compile[sn]===obm.number_effect_name[sn]){
                  obm.bk_create_layer[l+'-'+obj]=-1;
                  obm.bk_create_layer[l]=-1;
                  obm.bk_id[l]=-1;
                  B['type_obj-'+obj  ]='ajaxwb3d';
                  B['type_'+obj  ]='wb3d';
                  obm.ajaxwb3d_ajax_flag[sn]=2;

                  if(B['ajax_'+obj ]===1){
                        B['ajax_'+obj  ]=11;
                        wb3d_reset_obj_xy3(l);
                  }

            }
            else{
                  setTimeout(function(){
                        wb3d_ajaxwb3d_check_effect_compile2(sn,obm,l,obj,B);
                  },80);
                  return;
            }
      };
};



function wb3d_ajaxwb3d_c(obm,sn1,wslide,yy,md,ac_s,B,md3,idg,num,cu,fl){
      var n,snc,t,l;

      if(obm.slidnum[sn1]===1){
            return 0;
      }

      if(obm.change_status[idg]===1&&fl!=5){
            return;
      }

      l=obm.los[sn1+'-'+obm.activeslide[idg] ];

      if(fl===1&&l===obm.slidnum[sn1]-1&&num===-1){
            return 0;
      }
      else if(fl===1&&l===0&&num===-2){
            return 0;
      }

      if(num===-1){
            l++;
            l=l%obm.slidnum[sn1];
            n=obm.slide_of_location[sn1+'-'+l];
      }
      else if(num===-2){
            l--;
            if(l===-1)
                  l=obm.slidnum[sn1]-1;
            n=obm.slide_of_location[sn1+'-'+l];
      }
      else if(obm.los[sn1+'-'+num ]!=undefined){
            n=num;
      }
      else{ 
            return 0;
      }
      if(num===obm.activeslide[idg]){
            return 0;
      }

      if(obm.setting[sn1].colortype!=1){
            t=obm.setting[obm.sn[cu+'-0']]['c'+obm.sColortable]; 
            snc=obm.sn[cu+'-0'];
      }
      else{
            t=obm.setting[sn1]['c'+obm.sColortable]; 
            snc=sn1;
      }

      var c= snc+'-'+t+'-'+obm.dataslide[sn1][obm.los[sn1+'-'+n]][0].slide_r;
      obm.event_slide_change[idg]=n;
      document.getElementById('wb3dh-'+obm.wb3d_id[cu+'_'+wslide+'-'+yy+'-'+md+'-'+n]).style.backgroundColor ='rgba('+obm.r[c]+','+obm.g[c]+','+obm.b[c]+','+(obm.a[c]/255)+')';

      obm.framenum[cu+'_'+wslide+'-'+yy+'-'+md+'-'+obm.activeslide[idg]]=0;

      obm.change_status[idg]=1;

      obm.ajaxwb3d_nextslide[idg]=n;
      obm.ajaxwb3d_preslide[idg]=obm.activeslide[idg];
      obm.activeslide[idg]=n;

      obm.reset=cu+'_'+wslide+'-'+yy;
      var sn=obm.sn['0-0'];
      var B=obm.dataslide[sn][ obm.los[sn+'-'+wslide] ][obm.lo_l[sn+'-'+wslide+'-'+yy] ];
      wb3d_reset_data_slider_sub (obm,B,0,obm.wb3d_id[cu+'_'+wslide+'-'+yy+'-'+md],cu,wslide,yy,md);

      return 1;

}
