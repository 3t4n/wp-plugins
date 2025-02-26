/**
* Version:     1.0.0
* Author:      Keivan Kamali
* copyright :  © 2024 Keivan Kamali all rights reserved
*/


wb3d_setupdata.vscrollslider=function(obm){
      obm.modules['vscrollslider']=1;

      obm.setupeffect.vscrollslider=function(html){
            jQuery('#vscrollslider_selectmenu').append(html);
      };
      obm.removeeffect.vscrollslider=function(eff){
            jQuery('#vscrollslider_selectmenu option[value="'+eff+'"]').remove();
      };
      obm.checkeffect.vscrollslider=function(eff,B,y){
            var flag=0;
            if(B['handle_'+y]==eff){
                  flag=1;
            }
            return flag;
      };


      obm.createobj.vscrollslider=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){

            var p='position:absolute;';
            var c='';
            var ext2='';
            ext2='<div id="wb3df-'+idm+'"  style="'+p+'top:0px;left:0px; height:auto;width:300px;">';

            if(level==0){
                  c=' class="wb3d_draggable" ';
            }

            var textx='';
            if(level==0){
                  textx=wb3d_set_textx(idm);
            }

            var txt='<div '+c+' id="wb3dg-'+idm+'" style="'+p+'">'+textx+ext2;

            if(B['overflow1_'+y]==1){
                  txt+='<div id="wb3de-'+idm+'" style="overflow:hidden">';
            }
            else{
                  txt+='<div id="wb3de-'+idm+'" >';
            }

            if(B['img_'+y]!=''){
                  txt+='<img id="wb3de1-'+idm+'-2" src="'+B["img_"+y]+'"  style=" width:100%;height:100%;position:absolute;top:0px;left:0px;z-index:-1;"/>';
            }

            txt+='<div id="wb3df-'+idm+'-2" style="overflow:hidden;;position:absolute;" >';

            if(B['img2_'+y]!=''){
                  txt+='<img id="wb3de-'+idm+'-2" src="'+B["img2_"+y]+'"  style=" width:100%;height:100%;position:absolute;top:0px;left:0px;z-index:1;"/>';
            }
            else{
                  txt+='<div id="wb3de-'+idm+'-2" style="width:100%;height:100%;position:absolute;top:0px;left:0px;z-index:1;"/></div >';
            }

            txt+='</div >';
            txt+='</div >';
            txt+='</div>';
            txt+='</div>';
            jQuery(tmpdivid).append(txt);
            obm.bk_create_layer[l]=-1;
            obm.bk_create_layer0[l]=-1;
            wb3d_reset_obj_xy3(l);
      };



      obm.addon.wb3d_vscrollslider_run=function(sn,obm,frm,B,eff,wslide,yy,md,w0 ,yy_0,md0,id1,id_l,type_L,wh,ids,idg,cu,level){

            var J=obm.dataslide[sn][ obm.los[sn+'-'+wslide] ][0];
            var ay=1;
            var p=1;
            var paternId,paternId2,ms;
            if(J.scv==1){
                  p=ay;
            }

            if(level==0){
                  ids=cu+'_'+wslide;
                  paternId=ids+'-'+yy;
                  paternId2=paternId+'-'+md;
            }
            else{
                  ids=cu+'_'+w0+'-'+yy_0+'-'+md0+'-'+wslide;
                  paternId=ids+'-'+yy;
                  paternId2=paternId+'-'+md;
            }
            idg=cu+'_'+idg;
            var e2=B['sizey_'+obm.d+'-'+md]*obm.wh_h[id1];

            if(level==0){
                  ms=obm.setting[sn]['vmaxsc-'+obm.d];
            }
            else{
                  ms=obm. scrollMaxY[idg];
            }

            if(obm.down_id2==paternId&&obm.lockscrollY[ids]!=1&&obm.lockscrollXY[ids]!=1&&obm.scrollstatus!=1){

                  if(level!=0){
                        var sn3=obm.sn[cu+'-0'];
                        var F3=obm.dataslide[sn3][ obm.los[sn3+'-'+w0] ][obm.lo_l[sn3+'-'+w0+'-'+yy_0]];
                        if(F3['vs_'+obm.d  ]==1){
                              return;
                        }
                  }
                  obm.vscroll[idg]=Math.round(obm.es1_y[paternId2]/e2*ms);
                  if(level==0){
                        var x=wb3d_find_x_scroll(idg,obm.vscroll[idg]);
                        x=x.x;
                        obm.vscrollM[idg]=obm.vscroll[idg]-x;
                  }
            }

            if(obm.bk_vscroll_id2[id1]!=obm.vscroll[idg]+'-'+ms+'-'+obm.wh_h[id1]+'-'+obm.wh_w[id1]||obm.chenge_details_obj[id1]!=1){
                  obm.bk_vscroll_id2[id1]=obm.vscroll[idg]+'-'+ms+'-'+obm.wh_h[id1]+'-'+obm.wh_w[id1];

                  obm.ide2[id1].style.width =( B['sizex2_'+obm.d+'-'+md]*obm.wh_w[id1] )+ 'px';
                  var h=B['sizey2_'+obm.d+'-'+md]*obm.wh_h[id1];

                  obm.ide2[id1].style.height =( h )+ 'px';
                  var w1=B['sizex_'+obm.d+'-'+md]*obm.wh_w[id1];
                  if(document.getElementById('wb3de1-'+id1+'-2')!=null){
                        document.getElementById('wb3de1-'+id1+'-2').style.borderRadius=obm.ide[id1].style.borderRadius;
                  }
                  if(ms==0){
                        ms=1;
                  }
                  var t=(((e2)/ms)*obm.vscroll[idg])-h/2;
                  var w2=(w1-B['sizex2_'+obm.d+'-'+md]*obm.wh_w[id1])/2;
                  obm.ide2[id1].style.left =(w2)+ 'px';
                  obm.ide2[id1].style.top =(t)+ 'px';
                  frm=0;
                  if(obm.bk_f[id_l+'-2']!=frm){
                        obm.chenge_details_obj[obm.wb3d_id[cu+'_'+paternId2]+'-2']=0;
                  }
                  obm.size1[id1+'-2']=7;
                  wb3d_set_scroll_ui(obm,level,idg);			
                  wb3d_set_style(sn,obm,frm,B,B['handle_'+md],wslide,yy+'-2',md,w0 ,yy_0,md0,    obm.wb3d_id[paternId2]+'-2',id_l+'-2','layer2',0,0,0,         ids,0,idg,level);
            }
      };



      obm.removeobj.vscrollslider=function(K,idm,y){
            jQuery('#wb3dg-'+idm).empty();
            jQuery('#wb3dg-'+idm).remove();
            wb3d_delete_func_event(idm);
            delete K['type_obj-'+y];
            return 0;
      };

      obm.setnewvalue.vscrollslider=function(){
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#vscrollslider_div').css('display','');
            jQuery('#vscrollslider_div').removeClass("wb3d_displaynone");
            jQuery('#vscrollslider_upload_link1').val('');
            jQuery('#vscrollslider_upload_link2').val('');
            jQuery('#vscrollslider_selectmenu').val(100);
            jQuery('#vscrollslider_upload_pic1').attr('src','');
            jQuery('#vscrollslider_upload_pic2').attr('src','');
            jQuery('#vscrollslider_overflow1').prop('checked', false);
      };

		
      obm.setvalue.vscrollslider=function(i,T,K){
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#vscrollslider_div').css('display','');
            jQuery('#vscrollslider_div').removeClass("wb3d_displaynone");
            jQuery('#vscrollslider_upload_link1').val(K['img_'+i]);
            jQuery('#vscrollslider_upload_link2').val(K['img2_'+i]);
            jQuery('#vscrollslider_upload_pic1').attr('src',K['img_'+i]);
            jQuery('#vscrollslider_upload_pic2').attr('src',K['img2_'+i]);
            jQuery('#vscrollslider_selectmenu').val(K['handle_'+i]);
            if(K['overflow1_'+i]==1){
                  jQuery('#vscrollslider_overflow1').prop('checked', true);
            }
            else{
                  jQuery('#vscrollslider_overflow1').prop('checked', false);
            }
      };


      obm.savedata.vscrollslider=function(zz,z,i,t,T,F,flag,cx,cy,ax,ay){

            for(var j=0;j<4;j++){
                  if(flag!=1){
                        cy=j;
                        cx=j;
                        ax=1;
                        ay=1;
                  }
                  zz[z][i]['sizex_'+cx+'-'+t]=F['sizex_'+cy+'-'+t]/ax;
                  zz[z][i]['sizey_'+cx+'-'+t]=F['sizey_'+cy+'-'+t]/ay;
                  zz[z][i]['sizex2_'+cx+'-'+t]=F['sizex2_'+cy+'-'+t]/ax;
                  zz[z][i]['sizey2_'+cx+'-'+t]=F['sizey2_'+cy+'-'+t]/ay;
            }

            zz[z][i]['img_'+t]=F['img_'+t];
            zz[z][i]['img2_'+t]=F['img2_'+t];
            zz[z][i]['type_'+t]='vscrollslider';
            zz[z][i]['handle_'+t]=F['handle_'+t];
            zz[z][i]['overflow1_'+t]=F['overflow1_'+t];

      };


      jQuery('#vscrollslider_submit').click(function(){

            var sn=obm.sn['0-0'];
            var cu=0;
            var i,idm,K,tmpdivid;
            if(jQuery('#vscrollslider_selectmenu').val()==""||jQuery('#vscrollslider_selectmenu').val()==null){
                  alert(jQuery('#alert_selectEffect').text())
                  return
            }
            if(obm.new_layer!=0){
                  wb3d_new_layerB();
                  K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[cu]] ][obm.lo_l[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]];
                  i=obm.i;
                  idm=obm.wb3d_id['0_'+obm.activeslide[cu]+'-'+obm.s_l+'-'+i];
                  obm.new_layer=0;
            }
            else{
                  i=obm.i;
                  if(obm.s_l==-1||obm.s_o==-1){
                        alert(jQuery('#wb3d_id_alert1').text());
                        return;
                  }

                  K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[cu]] ][obm.lo_l[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]];
                  idm=obm.wb3d_id['0_'+obm.activeslide[cu]+'-'+obm.s_l+'-'+i];

                  obm.removeobj.vscrollslider(K,idm,i);
                  jQuery('.wb3d_panel').css('display','none');
                  jQuery('#textmenu2').css('display','none');

            }

            wb3d_get_vscrollslider(K,i,obm);
            jQuery('.wb3d_panel').css('display','none');
            var idmm='0_'+obm.activeslide[cu]+'-'+obm.s_l;
            obm.bk_create_layer[idmm]=0;
            obm.bk_create_layer0[idmm]=0;
            obm.bk_id[idmm]=-1;
            if(obm.U_P[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]!=0){
                  tmpdivid='#wb3de-'+obm.wb3d_id['0_'+obm.activeslide[cu]+'-'+obm.U_P[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]];
            }
            else{
                  tmpdivid='#wb3dh-'+obm.wb3d_id[cu+'_'+obm.activeslide[cu]];
            }

            for(var cx=0;cx<4;cx++){
                  if(K['sizey_'+cx+'-'+i]==undefined){
                        K['sizey_'+cx+'-'+i]=200;
                  }
                  if(K['sizex_'+cx+'-'+i]==undefined){
                        K['sizex_'+cx+'-'+i]=30;
                  }
            }
            for(cx=0;cx<4;cx++){
                  if(K['sizey2_'+cx+'-'+i]==undefined){
                        K['sizey2_'+cx+'-'+i]=50;
                  }
                  if(K['sizex2_'+cx+'-'+i]==undefined){
                        K['sizex2_'+cx+'-'+i]=50;
                  }
            }
            obm.createobj.vscrollslider(sn,idm,K,tmpdivid,obm,i,0,idmm,obm.activeslide[cu],cu,0);
            obm.bk_vscroll_id2[idm]=-1;
            jQuery('#textmenu2').css('display','none');
      });



      wb3d_vscrollslider_resize=function (id){


            jQuery('#wb3df-'+id+'-2' ).resizable({handles: 's,se,e',

                  start:function(event,ui){

                        var id1=this.id.split('-')[1];
                        var id=obm.wb3d_ids[id1];
                        id=id.split('_')[1]; 
                        id=id.split('-'); 
                        obm.selected_slide=id[0];
                        obm.s_l=id[1];
                        obm.s_o=id[2];

                  },
                  resize: function( event, ui ) {

                        var sn=obm.sn['0-0'];
                        var id1=this.id.split('-')[1];
                        var id=obm.wb3d_ids[id1];
                        id=id.split('_')[1]; 
                        id=id.split('-'); 
                        var fx=id[0];
                        var ex=id[1];
                        var bc=id[2];
                        var B=obm.dataslide[sn][obm.los[sn+'-'+fx]][obm.lo_l[sn+'-'+fx+'-'+ex]];
                        var eff=B['EB_'+obm.d];
                        var frm=obm.pixel_frm[sn+'-'+eff+'-'+obm.framenum['0_'+fx+'-'+ex]];
                        if(wb3d_check_scale(obm,fx,ex,bc,B,eff,frm)==1){
                              return ;
                        }

                        var c=jQuery('#wb3df-'+id1+'-2').width();
                        var d=jQuery('#wb3df-'+id1+'-2').height();
                        B['sizex2_'+obm.d+'-'+bc]=c;
                        B['sizey2_'+obm.d+'-'+bc]=d;

                        obm.chenge_details_obj[id1+'-2']=-1;
                        obm.bk_vscroll_id2[id1]=-1;

                  },
                  stop: function( event, ui ) {

                        var id1=this.id.split('-')[1];
                        var id=obm.wb3d_ids[id1];
                        id=id.split('-');
                        setTimeout(function(){
                        obm.putimagecanvas();
                        obm.chenge_details_obj[id1+'-2']=-1;
                        obm.bk_vscroll_id2[id1]=-1;
                        },300);
                  } 
            });

            jQuery('#wb3de-'+id ).resizable({handles: 's,e,se',

                  start:function(event,ui){
                        var id1=this.id.split('-')[1];
                        var id=obm.wb3d_ids[id1];
                        id=id.split('_')[1]; 
                        id=id.split('-'); 
                        obm.selected_slide=id[0];
                        obm.s_l=id[1];
                        obm.s_o=id[2];

                  },
                  resize: function( event, ui ) {

                        var sn=obm.sn['0-0'];
                        var id1=this.id.split('-')[1];
                        var id=obm.wb3d_ids[id1];
                        id=id.split('_')[1]; 
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

                        var c=jQuery('#wb3de-'+id1).width();
                        var d=jQuery('#wb3de-'+id1).height();
                        B['sizex_'+obm.d+'-'+bc]=c;
                        B['sizey_'+obm.d+'-'+bc]=d;

                        obm.chenge_details_obj[id1]=0;
                        obm.bk_vscroll_id2[id1]=-1;
                        obm.putimagecanvas();

                  },
                  stop: function( event, ui ) {

                        var id1=this.id.split('-')[1];
                        var id=obm.wb3d_ids[id1];
                        id=id.split('-'); 
                        setTimeout(function(){
                        obm.putimagecanvas();
                        obm.chenge_details_obj[id1]=-1;
                        obm.bk_vscroll_id2[id1]=-1;
                        },300);
                  }  
            });
      };


      obm.setupobj.vscrollslider=function(obm,idm,T,B,wslide,name,y,sn,flag,level){

            obm.size1[idm]=1;
            obm.mousedown_obj[idm]=function (e,id,F,md,x){
                  obm.w_sc='vs';
                  obm.bk_mouse=obm.by;
                  obm.move_scroll_y++;
                  obm.offset_0 = obm.ide2[id].offsetTop;
            };
            obm.event_obj[idm]=function (id,obm){
                  id=id.split('-')[1];
                  document.getElementById('wb3df-'+id+'-2').onmousedown = function(e) {
                        var x=wb3d_check_tag(e,this);
                        obm.scrollstatus=1;
                        obm.mouseSliderScroll=1;
                        if(x.flag==0||x.flag==undefined){
                              return;
                        }
                        jQuery('.wb3d_draggable'). draggable( 'disable' );
                        jQuery('.wb3d_draggable_a'). draggable( 'disable' );
                  };
            };
            obm.idc[idm+'-2']=document.getElementById('wb3df-'+idm+'-2');
            obm.idd[idm+'-2']=document.getElementById('wb3df-'+idm+'-2');
            obm.ide[idm+'-2']=document.getElementById('wb3de-'+idm+'-2');
            obm.ide2[idm]=document.getElementById('wb3df-'+idm+'-2');
            obm.show_obj[idm]=3;
            wb3d_set_bk(idm+'-2',obm);

            if(level==0){
                  wb3d_drag_obj('#wb3dg-'+idm);
                  wb3d_vscrollslider_resize(idm);
            }

            wb3d_events('wb3dg-'+idm,obm);
      };

      function wb3d_get_vscrollslider(K,i,obm){
            K['type_obj-'+i  ]='vscrollslider';
            K['img_'+i]=jQuery('#vscrollslider_upload_link1').val();
            K['img2_'+i]=jQuery('#vscrollslider_upload_link2').val();
            K['handle_'+i]=jQuery('#vscrollslider_selectmenu').val();
            if(jQuery('#vscrollslider_overflow1').is(':checked')){
                  K['overflow1_'+i  ]=1;
            }
            else{
                  K['overflow1_'+i  ]=0;
            }
            for(var j=0;j<4;j++){
                  K['P_s'+j]=2;
            }
      }




      jQuery('#vscrollslider_upload_link1').keyup(function(){
            jQuery('#vscrollslider_upload_pic1').attr('src',jQuery('#vscrollslider_upload_link1').val());
      });
      jQuery('#vscrollslider_upload_link2').keyup(function(){
            jQuery('#vscrollslider_upload_pic2').attr('src',jQuery('#vscrollslider_upload_link2').val());
      });

      jQuery('#vscrollslider_upload_button1').click(function(){

            event.preventDefault();
            var frame;
            // Create a new media frame
            frame = wp.media({
            title: 'Select or Upload Media Of Your Chosen Persuasion',
            button: {
            text: 'Use this media'
            },
            library: { 
            type: 'image' // limits the frame to show only images
            },
            multiple: false  // Set to true to allow multiple files to be selected
            });
            frame.on( 'select', function() {
            var attachment = frame.state().get('selection').first().toJSON();
            var imgurl =attachment.url;

            jQuery('#vscrollslider_upload_pic1').attr('src',imgurl);
            jQuery('#vscrollslider_upload_link1').val(imgurl);

            });

            if ( frame ) {
                  frame.open();
                  return;
            }
      });


      jQuery('#vscrollslider_upload_button2').click(function(){
            event.preventDefault();
            var frame;
            // Create a new media frame
            frame = wp.media({
            title: 'Select or Upload Media Of Your Chosen Persuasion',
            button: {
            text: 'Use this media'
            },
            library: { 
            type: 'image' // limits the frame to show only images
            },
            multiple: false  // Set to true to allow multiple files to be selected
            });
            frame.on( 'select', function() {
                  var attachment = frame.state().get('selection').first().toJSON();
                  var imgurl =attachment.url;

                  jQuery('#vscrollslider_upload_pic2').attr('src',imgurl);
                  jQuery('#vscrollslider_upload_link2').val(imgurl);

            });

            if ( frame ) {
                  frame.open();
                  return;
            }
      });



      jQuery('#vscrollslider_close2').click(function(){
            jQuery('.wb3d_panel').css('display','none');
      });

};