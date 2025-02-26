/**
* Version:     1.0.0
* Author:      Keivan Kamali
*/
wb3d_setupdata.counter=function(obm){
      obm.modules['counter']=1;
      obm.counter_data=[];
      obm.counter_run=[];
      obm.counter_stop=[];

      obm.createobj.counter=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){
            var p='position:absolute;';
            var ext2='<div id="wb3df-'+idm+'" style="'+p+'top:0px;left:0px; height:auto;width:300px">';
            var textx='';
            if(level===0){
                  textx=wb3d_set_textx(idm);
            }
            var txt='<div id="wb3dg-'+idm+'" style="'+p+'">'+textx+ext2;
            var style1='style="overflow:hidden;;height:auto;width:auto;'+p+'"';
            txt+='<div id="wb3de-'+idm+'" '+style1+'>0</div>';
            txt+='</div>';
            txt+='</div>';
            jQuery(tmpdivid).append(txt);
            obm.bk_create_layer[l]=-1;
            obm.bk_create_layer0[l]=-1;
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
                  if(obm.counter_data[id1]>B['num_'+md])
                  obm.counter_data[id1]=B['num_'+md];
                  document.getElementById('wb3de-'+id1).innerHTML = Math.floor(obm.counter_data[id1])+''+B['atext_'+md];
                  obm.bk_change_sizew[id1]=-1;
                  wb3d_set_width_height(obm,B,sn,id_l,id1,'layer',wslide,yy,md,eff,frm,ids,idg,level,cu);
            }
      };

      obm.removeobj.counter=function(K,idm,y){
            jQuery('#wb3dg-'+idm).empty();
            jQuery('#wb3dg-'+idm).remove();
            wb3d_delete_func_event(idm);
            delete K['type_obj-'+y];
            delete K['font'+y];
            return 0;
      };


      obm.setnewvalue.counter=function(){
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#counter_div').css('display','');
            jQuery('#counter_reset').prop('checked', false);
            jQuery('#counter_div').removeClass("wb3d_displaynone");
            jQuery('#counter_fontname').val('Arial');
            jQuery('#counter_left').click();
            jQuery('#counter_decoration').val('none');
            jQuery('#counter_top_padding').val(10);
            jQuery('#counter_right_padding').val(20);
            jQuery('#counter_bottom_padding').val(10);
            jQuery('#counter_left_padding').val(20);
            jQuery('#counter_fontsize').val(17);
            jQuery('#counter_fontweight').val(100);
            jQuery('#counter_line_height').val(1);
            wb3d_counter_set_demo();
      };



      obm.setvalue.counter=function(i,T,K){
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#counter_div').css('display','');
            jQuery('#counter_div').removeClass("wb3d_displaynone");
            if(K['reset_'+i]===1){
                  jQuery('#counter_reset').prop('checked', true);
            }
            else{
                  jQuery('#counter_reset').prop('checked', false);
            }
            jQuery('#counter_fontname').val(K['fname_'+i]);
            jQuery('#counter_decoration').val(K['decoration_'+i]);
            var p1=obm.d+'-'+i;
            jQuery('#counter_top_padding').val(K['tp_'+p1]);
            jQuery('#counter_right_padding').val(K['rp_'+p1]);
            jQuery('#counter_bottom_padding').val(K['bp_'+p1]);
            jQuery('#counter_left_padding').val(K['lp_'+p1]);
            jQuery('#counter_fontsize').val(K['fs_'+p1]);
            jQuery('#counter_fontweight').val(K['fweight_'+i]);
            jQuery('#counter_line_height').val(K['lheight_'+i]);
            jQuery('#counter_text').val(K['num_'+i]);
            jQuery('#counter_atext').val(K['atext_'+i]);
            jQuery('#counter_time').val(K['time_'+i]);
            if(K['fname_'+i]===undefined){
                  jQuery('#counter_fontname').val('Arial');
                  jQuery('#counter_decoration').val('none');
                  jQuery('#counter_top_padding').val(10);
                  jQuery('#counter_right_padding').val(20);
                  jQuery('#counter_bottom_padding').val(10);
                  jQuery('#counter_left_padding').val(20);
                  jQuery('#counter_fontsize').val(17);
                  jQuery('#counter_fontweight').val(100);
                  jQuery('#counter_line_height').val(1);
            }
            wb3d_counter_set_demo();
      };





      wb3d_counter_set_demo=function (){
            jQuery( '#counter_demo2' ).text(jQuery('#counter_text').val());
            jQuery( '#counter_demo2' ).css('font-family',jQuery('#counter_fontname').val());
            jQuery( '#counter_demo2' ).css('text-decoration',jQuery('#counter_decoration').val());
            jQuery( '#counter_demo2' ).css('line-height',jQuery('#counter_line_height').val());
            jQuery( '#counter_demo2' ).css('font-weight',jQuery('#counter_fontweight').val());
            jQuery( '#counter_demo2' ).css('font-size',jQuery('#counter_fontsize').val()+'px');
            jQuery( '#counter_demo2' ).css('padding-top',jQuery('#counter_top_padding').val()+'px');
            jQuery( '#counter_demo2' ).css('padding-right',jQuery('#counter_right_padding').val()+'px');
            jQuery( '#counter_demo2' ).css('padding-bottom',jQuery('#counter_bottom_padding').val()+'px');
            jQuery( '#counter_demo2' ).css('padding-left',jQuery('#counter_left_padding').val()+'px');
      };


      wb3d_counter_resize=function(id){
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


      jQuery('#counter_submit').click(function(){

            var cu=obm.cu;
            var sn=obm.sn['0-0'];
            var K,i,idm,tmpdivid;
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
                        obm.removeobj.counter(K,idm,i);
                        jQuery('.wb3d_panel').css('display','none');
                        jQuery('#textmenu2').css('display','none');
                  }
            }

            wb3d_get_counter(K,i,obm);
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#textmenu2').css('display','none');
            if(obm.U_P[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]!=0){
                  tmpdivid='#wb3de-'+obm.wb3d_id['0_'+obm.activeslide[cu]+'-'+obm.U_P[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]];
            }
            else{
                  tmpdivid='#wb3dh-'+obm.wb3d_id[cu+'_'+obm.activeslide[cu]];
            }
            obm.createobj.counter(sn,idm,K,tmpdivid,obm,i,0,idmm,obm.activeslide[cu],cu,0);
            var idmm=cu+'_'+obm.activeslide[cu]+'-'+obm.s_l;
            obm.bk_create_layer[idmm]=-1;
            obm.bk_create_layer0[idmm]=-1;
      });


      obm.savedata.counter=function(zz,z,i,t,T,F,flag,cx,cy,ax,ay){
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
            zz[z][i]['reset_'+t]=F['reset_'+t];
            zz[z][i]['atext_'+t]=F['atext_'+t];
            zz[z][i]['decoration_'+t]=F['decoration_'+t];
            zz[z][i]['lheight_'+t]=F['lheight_'+t];
            zz[z][i]['fname_'+t]=F['fname_'+t];
            zz[z][i]['fweight_'+t]=F['fweight_'+t];
            zz[z][i]['num_'+t]=F['num_'+t];
            zz[z][i]['time_'+t]=F['time_'+t];
      };

      obm.setupobj.counter=function(obm,idm,T,B,wslide,name,y,sn,flag,level){
            obm.size1[idm]=2;
            obm.newsize[idm]=2;
            obm.bg[idm]=1;
            obm.counter_run[idm]=-1;
            obm.counter_data[idm]=0;
            obm.counter_stop[idm]=-1;
            wb3d_checkstyle(idm);
            wb3d_counter_setstyle(idm);
            obm.show_obj[idm]=3;
            if(level===0){
                  wb3d_counter_resize(idm,'e');
                  wb3d_drag_obj('#wb3dg-'+idm);
            }
            wb3d_events('wb3dg-'+idm,obm);
      };


      function wb3d_get_counter(K,i,obm){
            var cu=0;
            var idm=obm.wb3d_id[obm.activeslide[cu]+'-'+obm.s_l+'-'+i];
            K['type_obj-'+i  ]='counter';
            obm.size1[idm]=2;
            obm.newsize[idm]=2;
            obm.bg[idm]=1;

            if(jQuery('#counter_reset').is(':checked')){
                  K['reset_'+i  ]=1;
            }
            else{
                  K['reset_'+i  ]=0;
            }

            K['fname_'+i]=jQuery('#counter_fontname').val();
            K['font'+i]=1;
            K['fweight_'+i]=jQuery('#counter_fontweight').val();
            K['lheight_'+i]=jQuery('#counter_line_height').val();
            K['num_'+i]=parseInt(jQuery('#counter_text').val());
            K['atext_'+i]=jQuery('#counter_atext').val();
            K['time_'+i]=parseInt(jQuery('#counter_time').val());
            K['decoration_'+i]=jQuery('#counter_decoration').val();       

            for(var n=0;n<4;n++){
                  var p1=n+'-'+i;
                  if(K['sizex_'+p1]==undefined){
                        K['sizex_'+p1]=300;
                  }

                  if(K['tp_'+p1]===undefined||n===obm.d){
                        K['tp_'+p1]=parseInt(jQuery('#counter_top_padding').val());
                  }
                  if(K['rp_'+p1]===undefined||n===obm.d){
                        K['rp_'+p1]=parseInt(jQuery('#counter_right_padding').val());
                  }

                  if(K['bp_'+p1]===undefined||n===obm.d){
                        K['bp_'+p1]=parseInt(jQuery('#counter_bottom_padding').val());
                  }

                  if(K['lp_'+p1]===undefined||n===obm.d){
                        K['lp_'+p1]=parseInt(jQuery('#counter_left_padding').val());
                  }

                  if(K['fs_'+p1]===undefined||n===obm.d){
                        K['fs_'+p1]=parseInt(jQuery('#counter_fontsize').val());
                  }
            }
      }

      jQuery('#counter_fontsize').change(function(){
            wb3d_counter_fontsize(this.value);
      });
      function wb3d_counter_fontsize(a){
            jQuery( '#counter_demo2' ).css('font-size',a+'px');
      }

      jQuery('#counter_line_height').change(function(){
            wb3d_counter_line_height(this.value);
      });
      function wb3d_counter_line_height(a){
            jQuery( '#counter_demo2' ).css('line-height',a);
      }

      jQuery('#counter_fontweight').change(function(){
            wb3d_counter_fontweight(this.value);
      });
      function wb3d_counter_fontweight(a){
            jQuery( '#counter_demo2' ).css('font-weight',a);
      }

      jQuery('#counter_top_padding').change(function(){
            wb3d_counter_top_padding(this.value);
      });
      function wb3d_counter_top_padding(a){
            jQuery( '#counter_demo2' ).css('padding-top',a+'px');
      }

      jQuery('#counter_right_padding').change(function(){
            wb3d_counter_right_padding(this.value);
      });
      function wb3d_counter_right_padding(a){
            jQuery( '#counter_demo2' ).css('padding-right',a+'px');
      }

      jQuery('#counter_bottom_padding').change(function(){
            wb3d_counter_bottom_padding(this.value);
      });
      function wb3d_counter_bottom_padding(a){
            jQuery( '#counter_demo2' ).css('padding-bottom',a+'px');
      }

      jQuery('#counter_left_padding').change(function(){
            wb3d_counter_left_padding(this.value);
      });
      function wb3d_counter_left_padding(a){
            jQuery( '#counter_demo2' ).css('padding-left',a+'px');
      }

      jQuery('#counter_decoration').change(function(){
            wb3d_counter_decoration(this.value);
      });
      function wb3d_counter_decoration(a){
            jQuery( '#counter_demo2' ).css('text-decoration',a);
      }


      jQuery('#counter_close2').click(function(){
            jQuery('.wb3d_panel').css('display','none');
      });

      jQuery('#counter_text').keyup(function(){
            jQuery( '#counter_demo2' ).text(jQuery('#counter_text').val());
      });


      jQuery('#counter_fontname').keyup(function(){
            jQuery('#wb3d_fontfamily_sample').css("display","");
            obm.fontfamily=this.id;
            jQuery( '#counter_demo2' ).css('font-family',jQuery('#counter_fontname').val());
      });


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