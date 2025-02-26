/**
* Version:     1.0.0
* Author:      Keivan Kamali
*/
wb3d_setupdata.typewriter=function(obm){
      obm.modules['typewriter']=1;
      obm.typewriter_index=0;
      obm.typewriter_num=0;

      obm.createobj.typewriter=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){
            var p='position:absolute;';
            var ext2='<div  id="wb3df-'+idm+'" style="'+p+'top:0px;left:0px; height:auto;width:300px;">';
            var textx='';
            if(level===0){
                  textx=wb3d_set_textx(idm);
            }
            var txt='<div id="wb3dg-'+idm+'" style="'+p+'">'+textx+ext2;
            var style1='style="overflow:hidden;height:auto;width:auto;'+p+'"';
            txt+='<div id="wb3de-'+idm+'" '+style1+'>'+B["text_"+y]+'</div>';
            txt+='</div>';
            txt+='</div>';
            jQuery(tmpdivid).append(txt);
            obm.bk_create_layer[l]=-1;
            obm.bk_create_layer0[l]=-1;
            wb3d_reset_obj_xy3(l);
      };




      obm.addon.wb3d_typewriter_run=function(sn,obm,frm,B,eff,wslide,yy,md,w0 ,yy_0,md0,id1,id_l,type_L,wh,ids,idg,cu,level){
            if(obm.time%(10-B['sp_'+md])===0){
                  if(level===0){
                        ids=wslide;
                  }
                  else{
                        ids=w0+'-'+yy_0+'-'+md0+'-'+wslide+'-'+yy;
                  }
                  if(obm.typewriter_index<obm.typewriter_data[obm.typewriter_num].length&&obm.typewriter_flag!=1){
                        obm.typewriter_index++;
                        if(B['ltr'+md]=="Ltr")
                              obm.ide[id1].innerHTML ='typewriter'+'<span class="wb3d_typewriter">|</span>';
                        else
                              obm.ide[id1].innerHTML ='<span class="wb3d_typewriter">|</span>'+'typewriter';
                        obm.bk_change_sizew[id1]=-1;
                        obm.bk_change_sizeh[id1]=-1;
                        wb3d_set_width_height(obm,B,sn,id_l,id1,'layer',wslide,yy,md,eff,frm,ids,idg,level,cu);
                        wb3d_set_top_left(obm,B,sn,id_l,id1,'layer',wslide,yy,md,ids,level,cu,'0_'+idg,0)
                  }

                  else if(obm.typewriter_index>=obm.typewriter_data[obm.typewriter_num].length+B['delay_'+md]||obm.typewriter_flag===1){
                        obm.typewriter_flag=1;

                        if(obm.typewriter_index<=obm.typewriter_data[obm.typewriter_num].length){
                              obm.bk_change_sizew[id1]=-1;
                              obm.bk_change_sizeh[id1]=-1;
                              if(B['ltr'+md]=="Ltr")
                                    obm.ide[id1].innerHTML ='typewriter'+'<span class="wb3d_typewriter">|</span>';
                              else
                                    obm.ide[id1].innerHTML ='<span class="wb3d_typewriter">|</span>'+'typewriter';
                              wb3d_set_width_height(obm,B,sn,id_l,id1,'layer',wslide,yy,md,eff,frm,ids,idg,level,cu);
                              wb3d_set_top_left(obm,B,sn,id_l,id1,'layer',wslide,yy,md,ids,level,cu,'0_'+idg,0)
                        }

                        obm.typewriter_index--;
                        if(obm.typewriter_index===0){
                              obm.typewriter_flag=0;
                              obm.typewriter_num++;
                              if(obm.typewriter_num>=obm.typewriter_data.length){
                                    obm.typewriter_num=0;
                              }
                        }

                  }
                  else{
                        obm.typewriter_index++;
                  }

            }
      };


      obm.removeobj.typewriter=function(K,idm,y){
            jQuery('#wb3dg-'+idm).empty();
            jQuery('#wb3dg-'+idm).remove();
            wb3d_delete_func_event(idm);
            delete K['type_obj-'+y];
            delete K['font'+y];
            return 0;
      };

      obm.setnewvalue.typewriter=function(){
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#typewriter_div').css('display','');
            jQuery('#typewriter_div').removeClass("wb3d_displaynone");
            jQuery('#typewriter_fontname').val('Arial');
            jQuery('#typewriter_left').click();
            jQuery('#typewriter_text').val('text 1,text 2,text 3');
            jQuery('#typewriter_tag').val('div');     
            jQuery('#typewriter_type_line').val('Ltr');
            jQuery('#typewriter_decoration').val('none');
            jQuery('#typewriter_top_padding').val(10);
            jQuery('#typewriter_right_padding').val(20);
            jQuery('#typewriter_bottom_padding').val(10);
            jQuery('#typewriter_left_padding').val(20);
            jQuery('#typewriter_fontsize').val(17);
            jQuery('#typewriter_fontweight').val(100);
            jQuery('#typewriter_line_height').val(1);
            wb3d_typewriter_set_demo();
      };

    
      obm.setvalue.typewriter=function(i,T,K){
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#typewriter_div').css('display','');
            jQuery('#typewriter_div').removeClass("wb3d_displaynone");
            jQuery('#typewriter_fontname').val(K['fname_'+i]);
            jQuery('#typewriter_tag').val(K['w_tag_'+i]);        
            jQuery('#typewriter_type_line').val(K['ltr'+i]);
            jQuery('#typewriter_decoration').val(K['decoration_'+i]);
            jQuery('#typewriter_speed1').val(K['sp_'+i]);
            jQuery('#typewriter_delay').val(K['delay_'+i]);

            var p1=obm.d+'-'+i;
            jQuery('#typewriter_top_padding').val(K['tp_'+p1]);
            jQuery('#typewriter_right_padding').val(K['rp_'+p1]);
            jQuery('#typewriter_bottom_padding').val(K['bp_'+p1]);
            jQuery('#typewriter_left_padding').val(K['lp_'+p1]);
            jQuery('#typewriter_fontsize').val(K['fs_'+p1]);
            jQuery('#typewriter_fontweight').val(K['fweight_'+i]);
            jQuery('#typewriter_line_height').val(K['lheight_'+i]);
            if(K['fname_'+i]===undefined){
            jQuery('#typewriter_fontname').val('Arial');
            jQuery('#typewriter_tag').val('div');        
            jQuery('#typewriter_type_line').val('Ltr');
            jQuery('#typewriter_decoration').val('none');
            jQuery('#typewriter_top_padding').val(10);
            jQuery('#typewriter_right_padding').val(20);
            jQuery('#typewriter_bottom_padding').val(10);
            jQuery('#typewriter_left_padding').val(20);
            jQuery('#typewriter_fontsize').val(17);
            jQuery('#typewriter_fontweight').val(100);
            jQuery('#typewriter_line_height').val(1);
            }
            jQuery('#typewriter_text').val(K['text_'+i]);
            wb3d_typewriter_set_demo();
      };





      wb3d_typewriter_set_demo=function (){
            jQuery( '#typewriter_demo2' ).text(jQuery('#typewriter_text').val());
            jQuery( '#typewriter_demo2' ).css('font-family',jQuery('#typewriter_fontname').val());
            jQuery( '#typewriter_demo2' ).css('text-decoration',jQuery('#typewriter_decoration').val());
            jQuery( '#typewriter_demo2' ).css('line-height',jQuery('#typewriter_line_height').val());
            jQuery( '#typewriter_demo2' ).css('font-weight',jQuery('#typewriter_fontweight').val());
            jQuery( '#typewriter_demo2' ).css('font-size',jQuery('#typewriter_fontsize').val()+'px');
            jQuery( '#typewriter_demo2' ).css('padding-top',jQuery('#typewriter_top_padding').val()+'px');
            jQuery( '#typewriter_demo2' ).css('padding-right',jQuery('#typewriter_right_padding').val()+'px');
            jQuery( '#typewriter_demo2' ).css('padding-bottom',jQuery('#typewriter_bottom_padding').val()+'px');
            jQuery( '#typewriter_demo2' ).css('padding-left',jQuery('#typewriter_left_padding').val()+'px');
            jQuery( '#typewriter_demo2' ).css('white-space',jQuery('#typewriter_type_line').val());
      };


      wb3d_typewriter_resize=function(id){
            jQuery('#wb3df-'+id ).resizable({handles: 'e',

                  start:function(event,ui){
                        var sn=obm.sn['0-0'];
                        var cu=0;
                        var id1=this.id.split('-')[1];
                        var id=obm.wb3d_ids[id1];
                        cu=id.split('_')[0]; 
                        id=id.split('_')[1]; 
                        id=id.split('-'); 
                        var fx=id[0];
                        var ex=id[1];
                        var bc=id[2];
                        var B=obm.dataslide[sn][obm.los[sn+'-'+fx]][obm.lo_l[sn+'-'+fx+'-'+ex]];
                        obm.bk_s=ui.size.width;
                        obm.bk_fontsize=B['fs_'+obm.d+'-'+bc];
                        obm.bk_rp=B['rp_'+obm.d+'-'+bc];
                        obm.bk_lp=B['lp_'+obm.d+'-'+bc];
                        obm.bk_tp=B['tp_'+obm.d+'-'+bc];
                        obm.bk_bp=B['bp_'+obm.d+'-'+bc];
                  },
                  resize: function( event, ui ) {
                        var sn=obm.sn['0-0'];
                        var cu=0;
                        var id1=this.id.split('-')[1];
                        var id=obm.wb3d_ids[id1];
                        cu=id.split('_')[0]; 
                        id=id.split('_')[1]; 
                        id=id.split('-'); 
                        var fx=id[0];
                        var ex=id[1];
                        var bc=id[2];
                        var B=obm.dataslide[sn][obm.los[sn+'-'+fx]][obm.lo_l[sn+'-'+fx+'-'+ex]];
                        var eff=B['EB_'+obm.d];
                        var frm=obm.pixel_frm[sn+'-'+eff+'-'+obm.framenum['0_'+fx+'-'+ex]];
                        if(wb3d_check_scale(obm,fx,ex,bc,B,eff,frm)===1){
                              return ;   
                        }

                        var y1=ui.size.width/obm.bk_s;

                        y1=1;

                        B['fs_'+obm.d+'-'+bc]=obm.bk_fontsize*y1;
                        B['rp_'+obm.d+'-'+bc]=obm.bk_rp*y1;
                        B['lp_'+obm.d+'-'+bc]=obm.bk_lp*y1;
                        B['tp_'+obm.d+'-'+bc]=obm.bk_tp*y1;
                        B['bp_'+obm.d+'-'+bc]=obm.bk_bp*y1;

                        wb3d_change_resize_data(obm,id1);
                  },
                  stop: function( event, ui ) {
                        var id1=this.id.split('-')[1];
                        setTimeout(function(){
                        wb3d_change_resize_data(obm,id1);
                        },300);
                  }   
            });
      };

      jQuery('#typewriter_submit').click(function(){

            var cu=obm.cu;
            var sn=obm.sn['0-0'];
            var i,idm,K,tmpdivid;
            if(obm.new_layer!=0){
                  wb3d_new_layerB();
                  K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[cu]] ][obm.lo_l[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]];
                  i=obm.i;
                  idm=obm.wb3d_id[cu+'_'+obm.activeslide[cu]+'-'+obm.s_l+'-'+i];
                  obm.new_layer=0;
            }
            else{
                  i=obm.i;
                  if(obm.s_l===-1||obm.s_o===-1){
                        alert(jQuery('#wb3d_id_alert1').text());
                        return;
                  }

                  K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[cu]] ][obm.lo_l[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]];
                  idm=obm.wb3d_id[cu+'_'+obm.activeslide[cu]+'-'+obm.s_l+'-'+i];

                  if(obm.new_layer===0){
                        obm.removeobj.typewriter(K,idm,i);
                        jQuery('.wb3d_panel').css('display','none');
                        jQuery('#textmenu2').css('display','none');
                  }
            }

            wb3d_get_typewriter(K,i,obm);
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#textmenu2').css('display','none');
            if(obm.U_P[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]!=0){
                  tmpdivid='#wb3de-'+obm.wb3d_id['0_'+obm.activeslide[cu]+'-'+obm.U_P[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]];
            }
            else{
                  tmpdivid='#wb3dh-'+obm.wb3d_id[cu+'_'+obm.activeslide[cu]];
            }
            obm.createobj.typewriter(sn,idm,K,tmpdivid,obm,i,0,idmm,obm.activeslide[cu],cu,0);
            var idmm=cu+'_'+obm.activeslide[cu]+'-'+obm.s_l;
            obm.bk_create_layer[idmm]=-1;
            obm.bk_create_layer0[idmm]=-1;
      });


      obm.savedata.typewriter=function(zz,z,i,t,T,F,flag,cx,cy,ax,ay){

            for(var j=0;j<4;j++){
                  if(flag!=1){
                        cy=j;
                        cx=j;
                        ax=1;
                        ay=1;
                  }
                  zz[z][i]['sizex_'+cx+'-'+t]=F['sizex_'+cy+'-'+t]/ax;
                  zz[z][i]['sizey_'+cx+'-'+t]=F['sizey_'+cy+'-'+t]/ay;
                  zz[z][i]['fs_'+cx+'-'+t]=F['fs_'+cy+'-'+t]/ax;
                  zz[z][i]['tp_'+cx+'-'+t]=F['tp_'+cy+'-'+t]/ax;
                  zz[z][i]['rp_'+cx+'-'+t]=F['rp_'+cy+'-'+t]/ax;
                  zz[z][i]['bp_'+cx+'-'+t]=F['bp_'+cy+'-'+t]/ax;
                  zz[z][i]['lp_'+cx+'-'+t]=F['lp_'+cy+'-'+t]/ax;
            }
            zz[z][i]['font'+t]=1;
            zz[z][i]['decoration_'+t]=F['decoration_'+t];
            zz[z][i]['lheight_'+t]=F['lheight_'+t];
            zz[z][i]['ltr'+t]=F['ltr'+t];
            zz[z][i]['delay_'+t]=F['delay_'+t];
            zz[z][i]['sp_'+t]=F['sp_'+t];

            zz[z][i]['fname_'+t]=F['fname_'+t];
            zz[z][i]['fweight_'+t]=F['fweight_'+t];
            zz[z][i]['w_tag_'+t]=F['w_tag_'+t];
            zz[z][i]['text_'+t]=F['text_'+t];
      };





      obm.setupobj.typewriter=function(obm,idm,T,B,wslide,name,y,sn,flag,level){
            obm.size1[idm]=2;
            obm.newsize[idm]=2;
            obm.typewriter_data=B['text_'+y].split(',');
            obm.show_obj[idm]=3;
            if(level===0){

                  wb3d_typewriter_resize(idm,'e');
                  
                  wb3d_drag_obj('#wb3dg-'+idm);
            }
            wb3d_events('wb3dg-'+idm,obm);
      };


      function wb3d_get_typewriter(K,i,obm){
            var cu=0;
            var idm=obm.wb3d_id[obm.activeslide[cu]+'-'+obm.s_l+'-'+i];
            K['type_obj-'+i  ]='typewriter';
            obm.size1[idm]=2;
            obm.newsize[idm]=2;
            K['text_'+i]=jQuery('#typewriter_text').val();
            K['fname_'+i]=jQuery('#typewriter_fontname').val();
            K['font'+i]=1;
            K['fweight_'+i]=jQuery('#typewriter_fontweight').val();
            K['lheight_'+i]=jQuery('#typewriter_line_height').val();
            K['ltr'+i]=jQuery('#typewriter_type_line').val();
            K['decoration_'+i]=jQuery('#typewriter_decoration').val();
            K['sp_'+i]=jQuery('#typewriter_speed1').val();
            K['delay_'+i]=parseInt(jQuery('#typewriter_delay').val());

            if(jQuery('#typewriter_tag').val() ===''){
                  K['w_tag_'+i]='div' ; 
            }
            else {     
                  K['w_tag_'+i]=jQuery('#typewriter_tag').val();  
            }      

            for(var n=0;n<4;n++){
                  var p1=n+'-'+i;
                  if(K['sizex_'+p1]==undefined){
                        K['sizex_'+p1]=300;
                  }

                  if(K['tp_'+p1]===undefined||n===obm.d){
                        K['tp_'+p1]=parseInt(jQuery('#typewriter_top_padding').val());
                  }
                  if(K['rp_'+p1]===undefined||n===obm.d){
                        K['rp_'+p1]=parseInt(jQuery('#typewriter_right_padding').val());
                  }

                  if(K['bp_'+p1]===undefined||n===obm.d){
                        K['bp_'+p1]=parseInt(jQuery('#typewriter_bottom_padding').val());
                  }

                  if(K['lp_'+p1]===undefined||n===obm.d){
                        K['lp_'+p1]=parseInt(jQuery('#typewriter_left_padding').val());
                  }

                  if(K['fs_'+p1]===undefined||n===obm.d){
                        K['fs_'+p1]=parseInt(jQuery('#typewriter_fontsize').val());
                  }
            }
      }

      jQuery('#typewriter_fontsize').change(function(){
            wb3d_typewriter_fontsize(this.value);
      });
      function wb3d_typewriter_fontsize(a){
            jQuery( '#typewriter_demo2' ).css('font-size',a+'px');
      }

      jQuery('#typewriter_line_height').change(function(){
            wb3d_typewriter_line_height(this.value);
      });
      function wb3d_typewriter_line_height(a){
            jQuery( '#typewriter_demo2' ).css('line-height',a);
      }

      jQuery('#typewriter_fontweight').change(function(){
            wb3d_typewriter_fontweight(this.value);
      });
      function wb3d_typewriter_fontweight(a){
            jQuery( '#typewriter_demo2' ).css('font-weight',a);
      }

      jQuery('#typewriter_top_padding').change(function(){
            wb3d_typewriter_top_padding(this.value);
      });
      function wb3d_typewriter_top_padding(a){
            jQuery( '#typewriter_demo2' ).css('padding-top',a+'px');
      }

      jQuery('#typewriter_right_padding').change(function(){
            wb3d_typewriter_right_padding(this.value);
      });
      function wb3d_typewriter_right_padding(a){
            jQuery( '#typewriter_demo2' ).css('padding-right',a+'px');
      }

      jQuery('#typewriter_bottom_padding').change(function(){
            wb3d_typewriter_bottom_padding(this.value);
      });
      function wb3d_typewriter_bottom_padding(a){
            jQuery( '#typewriter_demo2' ).css('padding-bottom',a+'px');
      }

      jQuery('#typewriter_left_padding').change(function(){
            wb3d_typewriter_left_padding(this.value);
      });
      function wb3d_typewriter_left_padding(a){
            jQuery( '#typewriter_demo2' ).css('padding-left',a+'px');
      }

      jQuery('#typewriter_decoration').change(function(){
            wb3d_typewriter_decoration(this.value);
      });
      function wb3d_typewriter_decoration(a){
            jQuery( '#typewriter_demo2' ).css('text-decoration',a);
      }






      jQuery('#typewriter_close2').click(function(){
            jQuery('.wb3d_panel').css('display','none');
      });

      jQuery('#typewriter_type_line').change(function(){
            jQuery('#typewriter_demo2').css('white-space',jQuery('#typewriter_type_line').val());
      });

      jQuery('#typewriter_text').keyup(function(){
            jQuery( '#typewriter_demo2' ).text(jQuery('#typewriter_text').val());
      });


      jQuery('#typewriter_fontname').keyup(function(){
            jQuery('#wb3d_fontfamily_sample').css("display","");
            obm.fontfamily=this.id;
            jQuery( '#typewriter_demo2' ).css('font-family',jQuery('#typewriter_fontname').val());
      });


};