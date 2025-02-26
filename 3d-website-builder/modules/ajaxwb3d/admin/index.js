/**
* Version:     1.0.0
* Author:      Keivan Kamali
* copyright :  © 2024 Keivan Kamali all rights reserved
*/
wb3d_setupdata.ajaxwb3d=function(obm){
      obm.modules['ajaxwb3d']=1;
      obm.addon.wb3d_ajaxwb3d_run=function(sn,obm,frm,B,eff,wslide,yy,md,wslide_0 ,yy_0,md0,id1,id_l,type_L,wh,ids,idg,cu,level){
            var gs;
            if(obm.ajaxwb3d_run1[id1]!=1){
                  obm.ajaxwb3d_run1[id1]=1;
                  var tmpdivid='wb3dh-'+obm.wb3d_id[cu+'_'+obm.activeslide[cu]];
                  if(B['ajax_'+md  ]==1){
                        wb3d_ajaxwb3d_ajax(B,id1,B,tmpdivid,obm,md,B['slider_'+md],wslide,yy,md,1,cu);
                  }
            }

            if(obm.ajaxwb3d_run2[id1]!=1&&obm.bk_create_layer[cu+'_'+wslide+'-'+yy+'-'+md]==1&&obm.ajaxwb3d_run1[id1]==1){

                  obm.ajaxwb3d_run2[id1]=1;
                  obm.flag_bl2[cu+'_'+id1]=0;
                  wb3d_reset_obj_xy3(id1);


                  gs=obm.gs;
                  obm.event_slide_change[id1]=-1;
                  wb3d_ajaxwb3d_run_sub_layer(B,wslide,yy,md,gs,obm,id1,cu);

                  obm.event_slide_change[id1]=-1;
                  wb3d_ajaxwb3d_run_sub_layer(B,wslide,yy,md,gs,obm,id1,cu);

            }


            if(obm.ajaxwb3d_run2[id1]==1){
                  gs=obm.gs;
                  obm.event_slide_change[id1]=-1;
                  wb3d_ajaxwb3d_run_sub_layer(B,wslide,yy,md,gs,obm,id1,cu);
            }

      };

      obm.createobj.ajaxwb3d=function(sn,idm,B,tmpdivid,obm,y,flag,ind,wslide,cu,level){
            var sl,i;
            var p='position:absolute;';
            var T=B['type_obj-'+y];
            obm.size1[idm]=1;
            var ext2='<div  id="wb3df-'+idm+'"  style="'+p+'top:0px;left:0px; height:auto;width:300px;overflow:hidden;">';

            var textx='';
            if(level==0){
                  textx=wb3d_set_textx(idm);
            }

            var txt='<div class="wb3d_draggable_a" id="wb3dg-'+idm+'" style="'+p+'white-space: nowrap;">'+textx+ext2;
            txt+='<div id="wb3de-'+idm+'" >';


            txt+='<div class="wb3d_waiting" id="wb3d_waiting-'+idm+'" >';
            txt+='<div class="wb3d_waiting3" id="wb3d_waiting3-'+idm+'" >';
            txt+='<img src="'+wb3d.wb3d_plagin_images_URL+'1.gif">';
            txt+='</div>';
            txt+='</div>';


            txt+='</div ></div></div>';

            if(flag==0||(flag==1&&B['ajax_'+y  ]==1)){

                  if(flag!=1){
                        jQuery(tmpdivid).append(txt);
                  }

                  wb3d_set_bk(idm,obm);
                  var sn2=B['slider_'+y];
                  obm.slidnum[sn2]=obm.setting[sn2].num;
                  var b=0;
                  var obj_=y;

                  for(p=0;p<obm.slidnum[sn2];p++){
                        var aa=obm.dataslide[sn2][p];
                        var ff=aa[0].slide_of_location;
                        obm.slide_of_location[sn2+'-'+p]=ff;
                        obm.bk_dis_slide=[];
                        obm.layers[sn2+'-'+ff]=aa[0].layer;

                        obm.activeslide[cu+'_'+idm]=obm.slide_of_location[sn2+'-'+0];
                        var cf=cu+'_'+wslide+'-'+ind+'-'+obj_+'-'+ff;
                        obm.slide_time[cf]=parseInt(aa[0].maxtime*25);
                        obm.los[sn2+'-'+ff]=p;

                        if(obm.wb3d_id_org[cf]==undefined){
                              sl=wb3d_create_id(cf,obm);
                        }
                        else{
                              sl=obm.wb3d_id[cf];
                        }

                        obm.bk_dis_slide[cf]=-1;
                        wb3d_create_slider(sl,'wb3de-'+idm,sn2,y,B,obm,cu,1,p);
                        obm.wb3d_ids_org[sl]=obm.wb3d_ids[sl];

                        for(i=0;i< obm.layers[sn2+'-'+ff];i++){
                              b++;
                              wb3d_createlayer(cu,ff,i,aa,'load_db',0,1,sn2,wslide,ind,obj_,obm,1  );
                              var l1=obm.la_l[sn2+'-'+ff+'-'+i];
                              var K=obm.dataslide[sn2][obm.los[sn2+'-'+ff]][obm.lo_l[sn2+'-'+ff+'-'+l1]];

                              for(var r=0;r<K.layer_obj;r++){

                                    if(K['type_'+K['obj_num_'+r]]!='wb3d'){
                                          sl=cf+'-'+l1;

                                          var id=wb3d_create_id(sl+'-'+K['obj_num_'+r],obm);
                                          if(obm.U_P[sn2+'-'+ff+'-'+l1]!=0){
                                                tmpdivid='#wb3de-'+obm.wb3d_id[cf+'-'+obm.U_P[sn2+'-'+ff+'-'+l1]];
                                          }
                                          else{
                                                tmpdivid='#wb3dh-'+obm.wb3d_id[cf];
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
                        wb3d_ajaxwb3d_check_effect_compile2(sn2,obm,cu+'_'+wslide+'-'+ind,obj_,B);
                  }
            }
            obm.flag_bl2[0+'_'+idm]=0;
      };
      obm.removeobj.ajaxwb3d=function(K,idm,y){
            
            var j=0;
            var sn2=K['slider_'+y];
            var x,x2;
            obm.ajaxwb3d_run1[idm]=-1;
            obm.ajaxwb3d_run2[idm]=-1;
            jQuery('#wb3dg-'+idm).empty();
            jQuery('#wb3dg-'+idm).remove();
            delete K['type_obj-'+y];
            delete K['type_'+y];
            wb3d_delete_func_event(idm);
            var l1=obm.wb3d_ids[idm];
            var lb=l1.split('-');
            obm.bk_create_layer[lb[0]+'-'+lb[1]]=-1;
            obm.bk_create_layer0[lb[0]+'-'+lb[1]]=-1;
            K['ajax_'+y  ]=0;
            for(var p=0;p<obm.slidnum[sn2];p++){
                  var ff=obm.slide_of_location[sn2+'-'+p];
                  x=l1+'-'+ff;
                  delete obm.wb3d_ids[obm.wb3d_id[x]];
                  delete obm.wb3d_ids_org[obm.wb3d_id[x]];
                  delete obm.wb3d_id_org[x];
                  delete obm.wb3d_id[x];

                  for(j=1;j< obm.layers[sn2+'-'+ff];j++){
                        var y2=obm.la_l[sn2+'-'+ff+'-'+j];
                        var D=obm.dataslide[sn2][obm.los[sn2+'-'+ff]][j];
                        obm.bk_top3[x+'-'+y2]=0;
                        for(var r=0;r<D.layer_obj;r++){
                              x2=l1+'-'+ff+'-'+y2+'-'+D['obj_num_'+r];
                              if(obm.wb3d_id[x2]!=undefined){
                                    delete obm.wb3d_ids[obm.wb3d_id[x2]];
                                    delete obm.wb3d_ids_org[obm.wb3d_id[x2]];
                                    delete obm.wb3d_id_org[x2];
                                    delete obm.wb3d_id[x2];
                              }
                        }
                  }
            } 
            wb3d_set_wb3d_sub_scroll_data(obm);
            return 0;
      };

      obm.setnewvalue.ajaxwb3d=function(){
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#ajaxwb3d_div').css('display','');
            jQuery('#ajaxwb3d_div').removeClass("wb3d_displaynone");
            jQuery('#ajaxwb3d_checkbox_ajax').prop('checked', false);
            jQuery('#ajaxwb3d_checkbox_reverse').prop('checked', false);
            jQuery('#ajaxwb3d_checkbox_overflow').prop('checked', false);
            jQuery('#ajaxwb3d_checkbox_reset').prop('checked', false);
            jQuery('#ajaxwb3d_active_vscroll').prop('checked', false);
            jQuery('#ajaxwb3d_checkbox_change_slide').prop('checked', false);
            jQuery('#ajaxwb3d_active_vscroll_mt').val(0);
            jQuery('#ajaxwb3d_active_vscroll_mt2').val(0);
            jQuery('#ajaxwb3d_active_vscroll_mt3').val(0);
            jQuery('#ajaxwb3d_active_vscroll_mt4').val(0);
            jQuery('#ajaxwb3d_active_vscroll_mt').prop( 'disabled', true );
            jQuery('#ajaxwb3d_active_vscroll_mt2').prop( 'disabled', true );
            jQuery('#ajaxwb3d_active_vscroll_mt3').prop( 'disabled', true );
            jQuery('#ajaxwb3d_active_vscroll_mt4').prop( 'disabled', true );
            jQuery('#ajaxwb3d_checkbox_change_slide').prop( 'disabled', false );
            jQuery('#ajaxwb3d_active_vscroll').prop( 'disabled', false );
      };
	
      obm.setvalue.ajaxwb3d=function(i,T,K){
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#ajaxwb3d_div').css('display','');
            jQuery('#ajaxwb3d_div').removeClass("wb3d_displaynone");

            if(K['ajax_'+i]==1||K['ajax_'+i]==11){
                  jQuery('#ajaxwb3d_checkbox_ajax').prop('checked', true);
            }
            else{
                  jQuery('#ajaxwb3d_checkbox_ajax').prop('checked', false);
            }
            if(K['reverse_'+i]==1){
                  jQuery('#ajaxwb3d_checkbox_reverse').prop('checked', true);
            }
            else{
                  jQuery('#ajaxwb3d_checkbox_reverse').prop('checked', false);
            }
            if(K['overflow_'+i]==1){
                  jQuery('#ajaxwb3d_checkbox_overflow').prop('checked', true);
            }
            else{
                  jQuery('#ajaxwb3d_checkbox_overflow').prop('checked', false);
            }
            if(K['reset_'+i]==1){
                  jQuery('#ajaxwb3d_checkbox_reset').prop('checked', true);
            }
            else{
                  jQuery('#ajaxwb3d_checkbox_reset').prop('checked', false);
            }
            if(K['sc_'+i]==1){
                  jQuery('#ajaxwb3d_checkbox_change_slide').prop('checked', true);
                  jQuery('#ajaxwb3d_active_vscroll').prop( 'disabled', true );
            }
            else{
                  jQuery('#ajaxwb3d_checkbox_change_slide').prop('checked', false);
                  jQuery('#ajaxwb3d_active_vscroll').prop( 'disabled', false );
            }



            jQuery('#ajaxwb3d_id').val(K['slider_'+i]);
            jQuery('#ajaxwb3d_active_vscroll_mt').val(K['mt0_'+i]);
            jQuery('#ajaxwb3d_active_vscroll_mt2').val(K['mt1_'+i]);
            jQuery('#ajaxwb3d_active_vscroll_mt3').val(K['mt2_'+i]);
            jQuery('#ajaxwb3d_active_vscroll_mt4').val(K['mt3_'+i]);



            if(K['vs_'+i  ]==1){
                  jQuery('#ajaxwb3d_active_vscroll').prop('checked', true);
                  jQuery('#ajaxwb3d_checkbox_change_slide').prop( 'disabled', true );
                  jQuery('#ajaxwb3d_active_vscroll_mt').prop( 'disabled', false );
                  jQuery('#ajaxwb3d_active_vscroll_mt2').prop( 'disabled', false );
                  jQuery('#ajaxwb3d_active_vscroll_mt3').prop( 'disabled', false );
                  jQuery('#ajaxwb3d_active_vscroll_mt4').prop( 'disabled', false );
            }

            else{
                  jQuery('#ajaxwb3d_active_vscroll').prop('checked', false);
                  jQuery('#ajaxwb3d_checkbox_change_slide').prop( 'disabled', false );
                  jQuery('#ajaxwb3d_active_vscroll_mt').prop( 'disabled', true );
                  jQuery('#ajaxwb3d_active_vscroll_mt2').prop( 'disabled', true );
                  jQuery('#ajaxwb3d_active_vscroll_mt3').prop( 'disabled', true );
                  jQuery('#ajaxwb3d_active_vscroll_mt4').prop( 'disabled', true );
            }
      };
      obm.ajaxwb3d_vscroll_c=[];
      obm.ajaxwb3d_vscroll_p=[];
      obm.ajaxwb3d_ajax_flag=[];
      obm.ajaxwb3d_nextslide=[];
      obm.ajaxwb3d_preslide=[];
      obm.runfirst3=[];

	var txt='';
	txt+='<option value="-1">None</option>';

	for(var i=0;i<obm.data_slide[0][0].sub.length;i++){
		var subid=obm.data_slide[0][0].sub[i].id_ves;
		var subname=obm.data_slide[0][0].sub[i].name;

		if(subid!=obm.jQuery_GET.id){
			txt+='<option value="'+subid+'">'+subid+' : '+subname+'</option>';
            }
	}
	jQuery('#ajaxwb3d_id').append(txt);

      wb3d_ajaxwb3d_resize=function(id){

            jQuery('#wb3df-'+id ).resizable({handles: 'e,s,se',

                  start:function(event,ui){
                        var sn=obm.sn['0-0'];
                        var id1=this.id.split('-')[1];
                        var id=obm.wb3d_ids[id1].split('_')[1];
                        id=id.split('-');
                        var fx=id[0];
                        var ex=id[1];
                        var bc=id[2];
                        var B=obm.dataslide[sn][obm.los[sn+'-'+fx]][obm.lo_l[sn+'-'+fx+'-'+ex]];
                        obm.ajaxwb3d_tmpx=B['sizex_'+obm.d+'-'+bc];
                        obm.ajaxwb3d_tmpy=B['sizey_'+obm.d+'-'+bc];
                  },
                  resize: function( event, ui ) {
                        obm.bl=[];
                        obm.maxblh1=[];
                        obm.flag_bl=[];
                        obm.bk_top3=[];
                        obm.flag_bl2=[];
                        obm.maxblh1=[];
                        obm.maxblh2=[];
                        obm.max_top=[];
                        obm.scY1=[];
                        obm.scY2=[];
                        var sn=obm.sn['0-0'];
                        var id1=this.id.split('-')[1];
                        var id2;
                        var id=obm.wb3d_ids[id1].split('_')[1];
                        id=id.split('-');
                        var fx=id[0];
                        var ex=id[1];
                        var bc=id[2];
                        var B=obm.dataslide[sn][obm.los[sn+'-'+fx]][obm.lo_l[sn+'-'+fx+'-'+ex]];
                        var eff=B['EA_'+obm.d];
                        var frm=obm.pixel_frm[sn+'-'+eff+'-'+obm.framenum['0_'+fx+'-'+ex]];
                        if(wb3d_check_scale(obm,fx,ex,bc,B,eff,frm)==1){
                              return ;
                        }

                        B['sizex_'+obm.d+'-'+bc]=ui.size.width;
                        B['sizey_'+obm.d+'-'+bc]=ui.size.height;

                        obm.chenge_details_obj[id1]=0;
                        obm.chenge_details_obj2[id1]=0;
                        obm.bk_change_sizew[id1]=-1;
                        obm.bk_change_sizeh[id1]=-1;
                        obm.putimagecanvas();

                        var sn1=B['slider_'+bc];

                        for( i=0;i<obm.slidnum[sn1];i++){

                              var slide=obm.slide_of_location[sn1+'-'+i];
                              wb3d_set_bk(obm.wb3d_id['0_'+fx+'-'+ex+'-'+bc+'-'+slide],obm,fx+'-'+ex+'-'+bc+'-'+slide);
                              document.getElementById('wb3dh-'+obm.wb3d_id['0_'+fx+'-'+ex+'-'+bc+'-'+slide]).style.width=ui.size.width+'px';
                              document.getElementById('wb3dh-'+obm.wb3d_id['0_'+fx+'-'+ex+'-'+bc+'-'+slide]).style.height=ui.size.height+'px';

                              for(var cc=1;cc<=obm.layers[sn1+'-'+slide]-1;cc++){  
                                    var yy=obm.la_l[sn1+'-'+slide+'-'+cc];
                                    var C=obm.dataslide[sn1][obm.los[sn1+'-'+slide]][obm.lo_l[sn1+'-'+slide+'-'+yy]];
                                    for(var r=0;r<C.layer_obj;r++){
                                          var t= C['obj_num_'+r];
                                          id2=obm.wb3d_id['0_'+fx+'-'+ex+'-'+bc+'-'+slide+'-'+yy+'-'+t];
                                          wb3d_set_bk(id2,obm,fx+'-'+ex+'-'+bc+'-'+slide+'-'+yy);
                                          obm.chenge_details_obj[id2]=-1;
                                          obm.chenge_details_obj2[id2]=-1;
                                          obm.bk_change_sizew[id2]=-1;
                                          obm.bk_change_sizeh[id2]=-1;
                                    }
                              }
                        }
                        obm.bk_responsive=[];
                        obm.putimagecanvas();
                  },
                  stop: function( event, ui ) {
                        var cu=0;
                        setTimeout(function(){
                              obm.bk_vscroll_id2=[];
                              obm.bk_vscroll_id1=[];
                              obm.chenge_details_obj2=[];
                              obm.chenge_details_obj=[];
                              obm.bk_transform2=[];
                              obm.bk_responsive=[];
                              wb3d_reset_data_slider();

                              obm.putimagecanvas();
                              wb3d_set_slide_value(obm.activeslide[cu],1,obm);
                        },200);
                  }  
            });
      };


      jQuery('#ajaxwb3d_submit').click(function(){
            var tmpdivid;
            if(jQuery('#ajaxwb3d_id').val()=='-1'){
                  alert(jQuery('#ajaxwb3d_id_alert1').text());
                  return;
            }
            var cu=0;
            var sn=obm.sn['0-0'];
            var i,idm,K,j;	
            i=obm.i;	
            if(obm.new_layer==0){
                  j=obm.s_l;
            }
            if(obm.new_layer==1){
                  for(j=1;j<=obm.layers[sn+'-'+obm.activeslide[obm.cu]];j++){
                        if(jQuery('#li-'+obm.activeslide[obm.cu]+'-'+j).length==0){
                              break;
                        }
                  }
                  j=j.toString();
                  idm=wb3d_create_id('0_'+obm.activeslide[obm.cu]+'-'+j+'-'+i,obm);
                  if(obm.U_P[sn+'-'+obm.activeslide[cu]+'-'+j]==undefined){
                        obm.U_P[sn+'-'+obm.activeslide[cu]+'-'+j]=0;
                  }
            }
            K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            if(obm.new_layer==2){
                  
                  
                  var id=-1;
                  for(var i=0;i<=K.layer_obj;i++){
                        id=-1;
                        for(j=0;j<K.layer_obj;j++){
                              if(K['obj_num_'+j]==i){
                                    id=i;
                                    break;
                              }       
                        }
                        if(id==-1){
                              break;
                        }
                  }
                  j=obm.s_l;
                  if(j==-1||i==-1){
                        alert(jQuery('#wb3d_id_alert1').text());
                        return;
                  }
                  
                  idm=wb3d_create_id('0_'+obm.activeslide[obm.cu]+'-'+j+'-'+i,obm);
            }


            jQuery('.wb3d_panel').css('display','none');
            jQuery('#textmenu2').css('display','none');
            if(obm.U_P[sn+'-'+obm.activeslide[cu]+'-'+j]!=0){
                  tmpdivid='#wb3de-'+obm.wb3d_id['0_'+obm.activeslide[cu]+'-'+obm.U_P[sn+'-'+obm.activeslide[cu]+'-'+j]];
            }
            else{
                  tmpdivid='#wb3dh-'+obm.wb3d_id[cu+'_'+obm.activeslide[cu]];
            }
            obm.runfirst[idm]=-1;
            wb3d_ajaxwb3d_ajax(K,idm,K,tmpdivid,obm,i,jQuery('#ajaxwb3d_id').val(),obm.activeslide[cu],j,obm.s_o,0,0);
      });


      // Reset All Object
      wb3d_check_addon_type=function (obm,sn1){
            var flag=0;
            for(var j=0;j<obm.open_addon[sn1].length;j++){
                  flag=0;
                  for(var i=0;i<obm.open_addons.length;i++){
                        if(obm.open_addons[i]==obm.open_addon[sn1][j]){
                              flag=1;
                              break;
                        }
                  }
                  if(flag==0){
                        return obm.open_addon[sn1][j];
                  }
            }
            return 0;
      };
      function wb3d_ajaxwb3d_ajax(B,idm,K,tmpdivid,obm,i,s,wslide,ne,obj,flag,cu){
            if(obm.ajaxwb3d_ajax_flag[s]==1&&obm.setting[s]==undefined){
                  setTimeout(function(){
                        wb3d_ajaxwb3d_ajax(B,idm,K,tmpdivid,obm,i,s,wslide,ne,obj,flag,cu);
                  },  100 );
                  return;

            }
            var sn=obm.sn['0-0'];
            var i;
            obm.ajaxwb3d_ajax_flag[s]=1;
            obm.runfirst[idm]=1;

            if(obm.setting[s]==undefined){
                  obm.setting[sn]['slider_load_'+s]=1;

                  var ajaxurl=wb3d.wb3d_ADMIN_URL+'admin-ajax.php';
                  var xhr = new XMLHttpRequest();
                  xhr.open('POST', ajaxurl+ '?action=wb3d_get_sub_slider_data', true);
                  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                  xhr.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                              var c=JSON.parse(this.responseText); 
                              for(var v=1;v<1000;v++){
                                    if(obm.data_slide[cu][v]==undefined){
                                          break;
                                    }
                              }

                              obm.data_slide[cu][v]=c;
                              obm.open_addon[c.id_ves]=c.open_addons;
                              var rg=wb3d_check_addon_type(obm,c.id_ves);
                              if(rg!=0){
                                    alert(jQuery('#ajaxwb3d_id_alert2').text()+' : '+rg);
                                    delete obm.data_slide[cu][v];
                                    obm.ajaxwb3d_ajax_flag[c.id_ves]=-1;
                                    return;
                              }

                              wb3d_compilesliderX(c.id_ves,v,cu);
                              for(var j=0;j<obm.setting[c.id_ves].num;j++){
                                    var f=obm.dataslide[c.id_ves][j][0].slide_of_location;
                                    obm.dataslide[c.id_ves][j][0]['los_'+f]=j;
                                    obm.los[c.id_ves+'-'+f]=j;
                              }
                              if(obm.new_layer!=0){
                                    wb3d_new_layerB(1);
                                    K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[cu]] ][obm.lo_l[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]];
                                    i=obm.i;
                                    idm=obm.wb3d_id['0_'+obm.activeslide[cu]+'-'+obm.s_l+'-'+i];
                              }
                              if(obm.new_layer==0&&flag!=1){
                                    i=obm.i;
                                    idm=obm.wb3d_id['0_'+obm.activeslide[cu]+'-'+obm.s_l+'-'+i];
                                    obm.removeobj.ajaxwb3d(K,idm,i);
                              }
                              jQuery('.wb3d_panel').css('display','none');
                              jQuery('#textmenu2').css('display','none');

                              if(flag!=1){
                                    wb3d_get_ajaxwb3d(K,i,obm);
                              }
                              obm.createobj.ajaxwb3d(sn,idm,K,tmpdivid,obm,i,flag,ne,wslide,cu,0);
                              wb3d_ajaxwb3d_check_effect_compile2(c.id_ves,obm,cu+'_'+wslide+'-'+ne,obj,K);
                        }
                  };

                  xhr.send('id_ves='+s+'&wb3d_nonce='+wb3d.wb3d_nonce);
            }
            else{
                  var rg=wb3d_check_addon_type(obm,s);
                  if(rg!=0){
                        alert(jQuery('#ajaxwb3d_id_alert2').text()+' : '+rg);
                        return;
                  }
                  if(obm.new_layer!=0){
                        wb3d_new_layerB(1);
                        K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[cu]] ][obm.lo_l[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]];
                        i=obm.i;
                       
                  }

                  if(obm.new_layer==0&&flag!=1){
                        i=obm.i;
                        idm=obm.wb3d_id['0_'+obm.activeslide[cu]+'-'+obm.s_l+'-'+i];
                        obm.removeobj.ajaxwb3d(K,idm,i);
                        jQuery('.wb3d_panel').css('display','none');
                        jQuery('#textmenu2').css('display','none');
                  }

                  if(flag!=1){
                        wb3d_get_ajaxwb3d(K,i,obm);
                  }

                  idm=wb3d_create_id('0_'+obm.activeslide[obm.cu]+'-'+obm.s_l+'-'+i,obm);
                  obm.createobj.ajaxwb3d(sn,idm,K,tmpdivid,obm,i,flag,ne,wslide,cu,0);

                  obm.bk_create_layer[cu+'_'+wslide+'-'+ne+'-'+obj]=-1;
                  obm.bk_create_layer[cu+'_'+wslide+'-'+ne]=-1;
                  obm.bk_create_layer0[cu+'_'+wslide+'-'+ne+'-'+obj]=-1;
                  obm.bk_create_layer0[cu+'_'+wslide+'-'+ne]=-1;
                  obm.bk_id[cu+'_'+wslide+'-'+ne]=-1;
                  K['type_obj-'+obj  ]='ajaxwb3d';
                  K['type_'+obj  ]='wb3d';
                  wb3d_set_slide_value(obm.activeslide[cu],0,obm);
            }

      }



      function wb3d_ajaxwb3d_run_sub_layer(B,wslide,yy,md,gs,obm,r_idg,cu){
            var idg=cu+'_'+r_idg;
            var sn1=B['slider_'+md];
            var ac_s=obm.activeslide[idg];
            gs=obm.gs;
            var ye;
            var x=cu+'_'+wslide+'-'+yy+'-'+md;

            if(B['type_obj-'+md  ]==undefined){
                  return;
            }

            if(B['vs_'+md  ]==1){
                  if(obm.ajaxwb3d_vscroll_p[x]!=obm.vscroll[cu+'_0']){
                        obm.ajaxwb3d_vscroll_p[x]=obm.vscroll[cu+'_0'];
                        var v=obm.vscroll[cu+'_0']-obm.vscrollS[idg];

                        if(v<=0||v==undefined||isNaN(v)){
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

            if(obm.change_status[idg]==1&&B['vs_'+md  ]==0){
                  var sx=obm.setting[B['slider_'+md]]['w_'+obm.d];
                  var sy=obm.setting[B['slider_'+md]]['h_'+obm.d];
                  wb3d_pre_change(obm,sn1, cu+'_'+wslide+'-'+yy+'-'+md,obm.ajaxwb3d_preslide[idg],obm.ajaxwb3d_nextslide[idg],sx*obm.wb3d_ax[idg],sy*obm.wb3d_ay[idg],idg,cu,1,B,md);
            }
            else if(obm.framenum[x+'-'+obm.activeslide[idg]]==obm.slide_time[x+'-'+obm.activeslide[idg]]&&B['vs_'+md  ]==0){
                  wb3d_ajaxwb3d_c(obm,sn1,wslide,yy,md,ac_s,B,md,idg,-1,cu);
            }
            else if(obm.activeslide[idg]==ac_s){
                  obm.framenum[x+'-'+obm.activeslide[idg]]++;
            }
            if(obm.bk_dis_slide[x+'-'+ac_s]!=1){
                  jQuery('#wb3dh-'+obm.wb3d_id[x+'-'+ac_s]).css('display','block');
                  obm.bk_dis_slide[x+'-'+ac_s]=1;
            }

            for(var p=0;p<=obm.slidnum[sn1];p++){

                  if(p==obm.slidnum[sn1]){
                        if(B['ajax_'+md ]!=1){
                              wb3d_set_scrollMaxY2(obm,idg,1,cu,sn1,B);
                        }
                        return;
                  }

                  var ff=obm.dataslide[sn1][p][0].slide_of_location;
                  if(obm.setup[idg+'-'+ff]!=1||ac_s==ff){
                        ac_s=ff;
                        obm.setup[idg+'-'+ff]=1;
                  }
                  else{
                        continue;
                  }
                  if(obm.bk_responsive[idg]!=obm.wh_w[r_idg]+'_'+obm.wh_h[r_idg]){
                        wb3d_ajaxwb3d_first_run(r_idg,obm,sn1,B,wslide,yy,md,cu);
                        obm.bk_responsive[idg]=obm.wh_w[r_idg]+'_'+obm.wh_h[r_idg];
                  }

                  for(var c=0;c<obm.static_c[sn1];c++){
                        if(ac_s!=obm.static_s[sn1][c]){
                              ye=obm.static_y[sn1][c];
                              wb3d_ajaxwb3d_run_sub_layer2(B,wslide,yy,md,gs,obm,obm.wb3d_ax[idg],obm.wb3d_ay[idg],r_idg,sn1,obm.static_s[sn1][c],ye,x,cu,1);
                        }
                  }
                  for(ye=1;ye<obm.layers[sn1+'-'+ac_s ];ye++){
                        wb3d_ajaxwb3d_run_sub_layer2(B,wslide,yy,md,gs,obm,obm.wb3d_ax[idg],obm.wb3d_ay[idg],r_idg,sn1,ac_s,ye,x,cu,0);
                  }

            }
      }

      function wb3d_ajaxwb3d_run_sub_layer2(B,wslide,yy,md,gs,obm,ax,ay,r_idg,sn1,ac_s,ye,x,cu,static){

            var idg=cu+'_'+r_idg;
            var ys=obm.la_l[sn1+'-'+ac_s+'-'+ye];
            var C=obm.dataslide[sn1][ obm.los[sn1+'-'+ac_s] ][ye];
            var ids=x+'-'+ac_s;
            var eff=C['EB_'+obm.d];
            var md0=0;
            var id_l=x+'-'+ac_s+'-'+ys;
            var frm=0;
            if(eff!=-1){
                  var frm=obm.pixel_frm[sn1+'-'+eff+'-'+obm.framenum[id_l]];
            }
            
            var y1=obm.scY1[id_l];
            var y2=obm.scY2[id_l];

            var run=1;
            if(y1==undefined){
                  run=0;
            }

            var flag=1;

            if(C['C_'+obm.d]*25>obm.framenum[ids]||C['F_'+obm.d]*25<obm.framenum[ids]){
                  flag=0;
            }

            if(obm.vscroll[idg]<y1){
                  flag=0;
            }

            if(obm.vscroll[idg]>y2){
                  flag=0;
            }
            if(static==1){
                  flag=1;
            }

            var flag3=1;

            if(eff!=-1){
                  var obj=obm.gs[sn1][eff];
                  if( obj.E[0][21]!=0){

                        if(obm.id_pre_stop[id_l]!=frm&&B['T_E'+obm.d]==0){

                              if(obj.E[21][frm]>0&&obm.id_stop[id_l]!=1){
                                    obm.id_time_stop[id_l]=obj.E[21][frm]*2.5;
                                    obm.id_stop[id_l]=1;
                                    flag3=0;
                                    obm.id_bk_pre_stop[id_l]=frm;
                              }

                              else if(obm.id_stop[id_l]==1&&obm.id_time_stop[id_l]>0){
                                    obm.id_time_stop[id_l]--;
                                    flag3=0;
                              }
                              else if(obm.id_stop[id_l]==1&&obm.id_time_stop[id_l]<=0){
                                    obm.id_stop[id_l]=0;
                                    obm.id_pre_stop[id_l]=obm.id_bk_pre_stop[id_l];
                              }
                              else{
                                    obm.id_pre_stop[id_l]=-2;
                              }
                        }
                  }

                  if(flag==1&&flag3==1){
                        frm=wb3d_set_frame(sn1,eff,ids+'-'+ys,obm.vscroll[idg],1,obm,C,C['T_E'+obm.d],C['repeat'+obm.d]);
                  }


                  if(obj.E[0][26]!=0){
                        md0=obj.E[26][frm];
                  }
            }




            var id1=x+'-'+ac_s+'-'+ys+'-'+md0;

            if(flag==1){
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

      function wb3d_ajaxwb3d_first_run(r_idg,obm,sn1,B,wslide,yy,md,cu){
            var idg=cu+'_'+r_idg;
            var x=B['sizex_'+obm.d+'-'+md]/obm.setting[sn1]['w_'+obm.d];
            var y=B['sizey_'+obm.d+'-'+md]/obm.setting[sn1]['h_'+obm.d];
            obm.wb3d_ax[idg]=x;
            obm.wb3d_ay[idg]=y;
            var snc,t;
            obm.wh3[idg]=y;
            for(var p=0;p<obm.slidnum[sn1];p++){
                  var ff=obm.dataslide[sn1][p][0].slide_of_location;

                  if(obm.setting[sn1].colortype!=1){
                        t=obm.setting[obm.sn[cu+'-0']]['c'+obm.sColortable]; 
                        snc=obm.sn[cu+'-0'];
                  }
                  else{
                        t=obm.setting[sn1]['c'+obm.sColortable]; 
                        snc=sn1;
                  }
                  var c= snc+'-'+t+'-'+obm.dataslide[sn1][obm.los[sn1+'-'+ff]][0].slide_r;

                  jQuery('#wb3dh-'+obm.wb3d_id[cu+'_'+wslide+'-'+yy+'-'+md+'-'+ff]).css('background-color','rgba('+obm.r[c]+','+obm.g[c]+','+obm.b[c]+','+(obm.a[c]/255)+')');

            }
      }
      obm.savedata.ajaxwb3d=function(zz,z,i,t,T,F,flag,cx,cy,ax,ay){
            for(var j=0;j<4;j++){
                  if(flag!=1){
                        cy=j;
                        cx=j;
                        ax=1;
                        ay=1;
                  }
                  zz[z][i]['sizex_'+cx+'-'+t]=F['sizex_'+cy+'-'+t]/ax;
                  zz[z][i]['sizey_'+cx+'-'+t]=F['sizey_'+cy+'-'+t]/ay;
            }
            zz[z][i]['slider_'+t]=F['slider_'+t];
            if(F['mt0_'+t]==undefined){
                  zz[z][i]['mt0_'+t]=20;
                  zz[z][i]['mt1_'+t]=20;
                  zz[z][i]['mt2_'+t]=20;
                  zz[z][i]['mt3_'+t]=20;
            }
            else{
                  zz[z][i]['mt0_'+t]=F['mt0_'+t];
                  zz[z][i]['mt1_'+t]=F['mt1_'+t];
                  zz[z][i]['mt2_'+t]=F['mt2_'+t];
                  zz[z][i]['mt3_'+t]=F['mt3_'+t];
            }

            zz[z][i]['type_'+t]='wb3d';

            if(F['ajax_'+t]>0){
                  zz[z][i]['ajax_'+t]=1;
            }
            else{
                  zz[z][i]['ajax_'+t]=0;
            }
            zz[z][i]['reverse_'+t]=F['reverse_'+t];
            zz[z][i]['overflow_'+t]=F['overflow_'+t];

            if(F['reset_'+t]==undefined)
                  zz[z][i]['reset_'+t]=0;
            else
                  zz[z][i]['reset_'+t]=F['reset_'+t];

            zz[z][i]['sc_'+t]=F['sc_'+t];
            zz[z][i]['v0_'+t]=F['v0_'+t];
            zz[z][i]['v1_'+t]=F['v1_'+t];
            zz[z][i]['v2_'+t]=F['v2_'+t];
            zz[z][i]['v3_'+t]=F['v3_'+t];
            zz[z][i]['vs_'+t]=F['vs_'+t];
      };

      obm.setupobj.ajaxwb3d=function(obm,idm,T,B,wslide,ne,y,sn,flag,level){
            obm.size1[idm]=1;
            var ids;
            var cu=obm.wb3d_ids[idm].split('_')[0];
            obm.event_slide_change[idm]=-1;
            obm.show_obj[idm]=3;
            wb3d_scroll_event(idm,obm,'wb3dg-'+idm);
            wb3d_events('wb3dg-'+idm,obm );
            document.getElementById('wb3d_waiting-'+idm).style.display='none';
            if(level==0){
                  wb3d_drag_obj('#wb3dg-'+idm);
                  wb3d_ajaxwb3d_resize(idm);
            }

            if(obm.U_P[sn+'-'+wslide+'-'+ne]==0){
                  B['PY2_'+obm.d]=B['PY_'+obm.d];

            }
            else{
                  var id=obm.U_P[sn+'-'+wslide+'-'+ne].split('-');
                  var F=obm.dataslide[sn][obm.los[sn+'-'+wslide]][  obm.lo_l[sn+'-'+wslide+'-'+id[0]]]
                  B['PY2_'+obm.d]=F['PY_'+obm.d];
            }

            var idg=cu+'_'+idm;
            var i;
            obm.vscroll[idg]=0;
            obm.deltaflag['v-'+B['slider_'+y]]=1;

            wb3d_set_wb3d_sub_scroll_data(obm)

            tmp=obm.all_slider[B['slider_'+y]];
            var sn2=B['slider_'+y];
            obm.set_end1[cu+'_'+wslide+'-'+ne+'-'+y]=0;
            obm.change_status[idm]=0;
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
                  wb3d_create_id(ids,obm);
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
                  wb3d_create_slider(id1,'patern',sn2,y,B,obm,cu,1,p);
                  var aa=obm.dataslide[sn2][p];
                  obm.layers[sn2+'-'+ff]=aa[0].layer;
                  for(i=0;i< obm.layers[sn2+'-'+ff];i++){
                        if(flag!=1){
                              wb3d_createlayer(cu,ff,i,aa,'load_db',0,1,sn2,wslide,ind,obj_,obm,0,idm  );
                        }
                        obm.true_frm[ids+'-'+obm.la_l[sn2+'-'+ff+'-'+i]]=0;
                  }
            }
      };

      jQuery('#ajaxwb3d_checkbox_change_slide').change(function(){

            if(jQuery('#ajaxwb3d_checkbox_change_slide').is(':checked')){
                  jQuery('#ajaxwb3d_active_vscroll').prop( 'disabled', true );
            }
            else{
                  jQuery('#ajaxwb3d_active_vscroll').prop( 'disabled', false );
            }
      });

      jQuery('#ajaxwb3d_active_vscroll').change(function(){

            if(jQuery('#ajaxwb3d_active_vscroll').is(':checked')){
                  jQuery('#ajaxwb3d_checkbox_change_slide').prop( 'disabled', true );
                  jQuery('#ajaxwb3d_active_vscroll_mt').prop( 'disabled', false );
                  jQuery('#ajaxwb3d_active_vscroll_mt2').prop( 'disabled', false );
                  jQuery('#ajaxwb3d_active_vscroll_mt3').prop( 'disabled', false );
                  jQuery('#ajaxwb3d_active_vscroll_mt4').prop( 'disabled', false );
            }
            else{
                  jQuery('#ajaxwb3d_checkbox_change_slide').prop( 'disabled', false );
                  jQuery('#ajaxwb3d_active_vscroll_mt').prop( 'disabled', true );
                  jQuery('#ajaxwb3d_active_vscroll_mt2').prop( 'disabled', true );
                  jQuery('#ajaxwb3d_active_vscroll_mt3').prop( 'disabled', true );
                  jQuery('#ajaxwb3d_active_vscroll_mt4').prop( 'disabled', true );
            }
      });

      function wb3d_get_ajaxwb3d(K,i,obm){

            for(var cx=0;cx<4;cx++){
                  if(K['sizey_'+cx+'-'+i]==undefined){
                        K['sizey_'+cx+'-'+i]=230;
                  }
                  if(K['sizex_'+cx+'-'+i]==undefined){
                        K['sizex_'+cx+'-'+i]=480;
                  }
            }
            K['slider_'+i]=jQuery('#ajaxwb3d_id').val();
            K['mt0_'+i]=Number(jQuery('#ajaxwb3d_active_vscroll_mt').val());
            K['mt1_'+i]=Number(jQuery('#ajaxwb3d_active_vscroll_mt2').val());
            K['mt2_'+i]=Number(jQuery('#ajaxwb3d_active_vscroll_mt3').val());
            K['mt3_'+i]=Number(jQuery('#ajaxwb3d_active_vscroll_mt4').val());

            if(jQuery('#ajaxwb3d_checkbox_ajax').is(':checked')){
                  K['ajax_'+i  ]=1;
            }
            else{
                  K['ajax_'+i  ]=0;
            }
            if(jQuery('#ajaxwb3d_checkbox_reverse').is(':checked')){
                  K['reverse_'+i  ]=1;
            }
            else{
                  K['reverse_'+i  ]=0;
            }
            if(jQuery('#ajaxwb3d_checkbox_overflow').is(':checked')){
                  K['overflow_'+i  ]=1;
            }
            else{
                  K['overflow_'+i  ]=0;
            }
            if(jQuery('#ajaxwb3d_checkbox_reset').is(':checked')){
                  K['reset_'+i  ]=1;
            }
            else{
                  K['reset_'+i  ]=0;
            }
            if(jQuery('#ajaxwb3d_checkbox_change_slide').is(':checked')){
                  K['sc_'+i  ]=1;
            }
            else{
                  K['sc_'+i  ]=0;
            }

            if(jQuery('#ajaxwb3d_active_vscroll').is(':checked')){
                  K['vs_'+i  ]=1;
            }
            else{
                  K['vs_'+i  ]=0;
            }

            K['v0_'+i  ]=parseInt(jQuery('#ajaxwb3d_vscroll_from0').val());
            K['v1_'+i  ]=parseInt(jQuery('#ajaxwb3d_vscroll_from1').val());
            K['v2_'+i  ]=parseInt(jQuery('#ajaxwb3d_vscroll_from2').val());
            K['v3_'+i  ]=parseInt(jQuery('#ajaxwb3d_vscroll_from3').val());

      }


      wb3d_ajaxwb3d_check_effect_compile2=function(sn,obm,l,obj,B){

            if(obm.number_effect_compile[sn]==obm.number_effect_name[sn]){
                  obm.bk_create_layer[l+'-'+obj]=-1;
                  obm.bk_create_layer[l]=-1;
                  obm.bk_create_layer0[l+'-'+obj]=-1;
                  obm.bk_create_layer0[l]=-1;
                  obm.bk_id[l]=-1;
                  B['type_obj-'+obj  ]='ajaxwb3d';
                  B['type_'+obj  ]='wb3d';
                  obm.ajaxwb3d_ajax_flag[sn]=2;
                  wb3d_set_slide_value(obm.activeslide[0],0,obm);
                  wb3d_reset_data_slider();
                  wb3d_reset_obj_xy();
                  obm.flag_bl2['0_2']=0;
                  obm.bk_responsive=[];

                  setTimeout(function(){
                        obm.putimagecanvas();
                  },1300);
                  if(B['ajax_'+obj ]==1){
                        B['ajax_'+obj  ]=11;
                  }

            }
            else{
                  setTimeout(function(){
                        wb3d_ajaxwb3d_check_effect_compile2(sn,obm,l,obj,B);
                  },80);
                  return;
            }
      };


      jQuery('#ajaxwb3d_close2').click(function(){
            jQuery('.wb3d_panel').css('display','none');
      });

};

function wb3d_ajaxwb3d_c(obm,sn1,wslide,yy,md,ac_s,B,md2,idg,num,cu,fl){
      var n,snc,t;

      if(obm.slidnum[sn1]==1){
            return 0;
      }
      var l=obm.los[sn1+'-'+obm.activeslide[idg] ];

      if(fl==1&&l==obm.slidnum[sn1]-1&&num==-1){
            return 0;
      }
      else if(fl==1&&l==0&&num==-2){
            return 0;
      }
      if(num==-1){
            l=obm.los[sn1+'-'+obm.activeslide[idg] ];
            l++;
            l=l%obm.slidnum[sn1];
            n=obm.slide_of_location[sn1+'-'+l];
      }
      else if(num==-2){
            l--;
            if(l==-1)
            l=obm.slidnum[sn1]-1;
            n=obm.slide_of_location[sn1+'-'+l];
      }
      else if(obm.los[sn1+'-'+num ]!=undefined){
            n=num;
      }
      else{ 
            return 0;
      }

      if(num==obm.activeslide[idg]){
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
      jQuery('#wb3dh-'+obm.wb3d_id[cu+'_'+wslide+'-'+yy+'-'+md+'-'+n]).css('background-color','rgba('+obm.r[c]+','+obm.g[c]+','+obm.b[c]+','+(obm.a[c]/255)+')');
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