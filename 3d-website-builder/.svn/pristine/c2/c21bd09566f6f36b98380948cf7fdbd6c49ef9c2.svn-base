/**
* Version:     1.0.0
* Author:      Keivan Kamali
*/
wb3d_setupdata.afterbefore=function(obm){
      obm.modules['afterbefore']=1;
      obm.createobj.afterbefore=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){

            var p='position:absolute;';
            var ext2='<div id="wb3df-'+idm+'" style="'+p+'top:0px;left:0px; height:auto;width:300px;">';
            var textx='';
            if(level===0){
                  textx=wb3d_set_textx(idm);
            }

            var txt='<div id="wb3dg-'+idm+'"  style="'+p+'">'+textx+ext2;
            txt+='<div id="wb3de-'+idm+'"  style="z-index:11;'+p+'top:0px;left:0px;overflow:hidden;">';
            txt+='<img id="wb3d20-'+idm+'" src="'+B["image1_"+y]+'" style=" width:100%; height:100%; '+p+'top:0px;left:0px;z-index:1;"/>';

            if(B['ver_'+y]===1){
                  txt+='<div  id="wb3d21-'+idm+'" style="height:100%;width:50%;'+p+'top:0px;left:0px;z-index:2;overflow:hidden;border-right:1px solid #fff;">';
                  txt+='<img  id="wb3d22-'+idm+'" src="'+B["image2_"+y]+'" style="height:100%;width:200%;'+p+'top:0px;left:0px;"/>';
                  txt+='</div>';
            }
            else{
                  txt+='<div  id="wb3d21-'+idm+'" style="height:50%;width:100%;'+p+'top:0px;left:0px;z-index:2;overflow:hidden;border-bottom:1px solid #fff;">';
                  txt+='<img  id="wb3d22-'+idm+'" src="'+B["image2_"+y]+'" style="height:11px;height:200%;width:100%;'+p+'top:0px;left:0px;"/>';
                  txt+='</div>';
            }

            txt+='</div></div></div>';

            jQuery(tmpdivid).append(txt);
            obm.bk_create_layer[l]=-1;
            obm.bk_create_layer0[l]=-1;
            wb3d_reset_obj_xy3(l);

      };


      obm.removeobj.afterbefore=function(K,idm,y){
            jQuery('#wb3dg-'+idm).empty();
            jQuery('#wb3dg-'+idm).remove();
            wb3d_delete_func_event(idm);
            delete K['type_obj-'+y];
            return 0;
      };

      obm.setnewvalue.afterbefore=function(){
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#afterbefore_div').removeClass("wb3d_displaynone");
            jQuery('#afterbefore_div').css('display','');
            jQuery('#afterbefore_upload_link1').val('');
            jQuery('#afterbefore_upload_link2').val('');
            jQuery('#afterbefore_vertical').val(0);
            jQuery('#afterbefore_upload_afterbefore1').attr('src','');
            jQuery('#afterbefore_upload_afterbefore2').attr('src','');
      };


    
      obm.setvalue.afterbefore=function(i,T,K){
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#afterbefore_div').removeClass("wb3d_displaynone");
            jQuery('#afterbefore_div').css('display','');
            jQuery('#afterbefore_upload_link1').val(K['image1_'+i]);
            jQuery('#afterbefore_upload_link2').val(K['image2_'+i]);
            jQuery('#afterbefore_vertical').val(K['ver_'+i]);
            jQuery('#afterbefore_upload_afterbefore1').attr('src',K['image1_'+i]);
            jQuery('#afterbefore_upload_afterbefore2').attr('src',K['image2_'+i]);
      };

      wb3d_afterbefore_resize=function (id){

            jQuery('#wb3df-'+id ).resizable({handles: 's,e,se',

                  start:function(event,ui){

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
                        B['sizex_'+obm.d+'-'+bc]=ui.size.width;
                        B['sizey_'+obm.d+'-'+bc]=ui.size.height;

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

      jQuery('#afterbefore_submit').click(function(){

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
                        obm.removeobj.afterbefore(K,idm,i);
                        jQuery('.wb3d_panel').css('display','none');
                        jQuery('#textmenu2').css('display','none');
                  }
            }

            wb3d_get_afterbefore(K,i,obm);
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#textmenu2').css('display','none');
            if(obm.U_P[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]!=0){
                  tmpdivid='#wb3de-'+obm.wb3d_id['0_'+obm.activeslide[cu]+'-'+obm.U_P[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]];
            }
            else{
                  tmpdivid='#wb3dh-'+obm.wb3d_id[cu+'_'+obm.activeslide[cu]];
            }

            obm.createobj.afterbefore(sn,idm,K,tmpdivid,obm,i,0,idmm,obm.activeslide[cu],cu,0);

            var idmm=cu+'_'+obm.activeslide[cu]+'-'+obm.s_l;
            obm.bk_create_layer[idmm]=-1;
            obm.bk_create_layer0[idmm]=-1;

      });

      wb3d_afterbefore_mousemove2=function (a,b,c,d,e,x){

            var F=x.F;
            var modd=x.modd;

            var px=obm.es1_x[x.idm];
            var py=obm.es1_y[x.idm];

            var sy=x.F['sizey_'+obm.d+'-'+x.modd]*obm.wh_h[x.id1];
            var sx= x.F['sizex_'+obm.d+'-'+x.modd]*obm.wh_w[x.id1];

            if(py>0.98*sy){
                  py=sy;
            }
            else if(py<0.01*sy){
                  py=0;
            }

            if(px>0.98*sx){
                  px=sx;
            }
            else if(px<0.01*sx){
                  px=0;
            }

            x=px;
            var y=py;

            if(F['ver_'+modd]!=1){
                  document.getElementById('wb3d21-'+b).style.height=(y)+'px';
                  document.getElementById('wb3d22-'+b).style.height=(sy)+'px';
            }
            else{
                  document.getElementById('wb3d21-'+b).style.width=(x)+'px';
                  document.getElementById('wb3d22-'+b).style.width=(sx)+'px';
            }

      };

      obm.savedata.afterbefore=function(zz,z,i,t,T,F,flag,cx,cy,ax,ay){

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

            zz[z][i]['image1_'+t]=F['image1_'+t];
            zz[z][i]['image2_'+t]=F['image2_'+t];
            zz[z][i]['ver_'+t]=F['ver_'+t];

      };

      obm.setupobj.afterbefore=function(obm,idm,T,B,wslide,name,y,sn,flag,level){

            obm.size1[idm]=1;
            obm.newsize[idm]=0;
            obm.mousemove_obj[idm]=function (a,b,c,d,e,x){
                  wb3d_afterbefore_mousemove2(a,b,c,d,e,x);
            };
            obm.show_obj[idm]=3;
            if(level===0){
                  wb3d_drag_obj('#wb3dg-'+idm);
                  wb3d_afterbefore_resize(idm);
            }

            wb3d_events('wb3dg-'+idm,obm);
      };

      function wb3d_get_afterbefore(K,i,obm){
            K['type_obj-'+i  ]='afterbefore';
            K['image1_'+i]=jQuery('#afterbefore_upload_link1').val();
            K['image2_'+i]=jQuery('#afterbefore_upload_link2').val();
            K['ver_'+i]=Number(jQuery('#afterbefore_vertical').val());
            for(var cx=0;cx<4;cx++){
                  if(K['sizey_'+cx+'-'+i]==undefined){
                        K['sizey_'+cx+'-'+i]=200;
                  }
                  if(K['sizex_'+cx+'-'+i]==undefined){
                        K['sizex_'+cx+'-'+i]=300;
                  }
            }
      }

      jQuery('#afterbefore_upload_link1').keyup(function(){
            jQuery('#afterbefore_upload_afterbefore1').attr('src',jQuery('#afterbefore_upload_link1').val());
      });
      jQuery('#afterbefore_upload_link2').keyup(function(){
            jQuery('#afterbefore_upload_afterbefore2').attr('src',jQuery('#afterbefore_upload_link2').val());
      });

      jQuery('#afterbefore_upload_button1').click(function(){

            event.preventDefault();
            var frame;
            // Create a new media frame
            frame = wp.media({
            title: 'Select or Upload Media Of Your Chosen Persuasion',
            button: {
                  text: 'Use this media'
            },
            library: { 
                  type: 'image' 
            },
            multiple: false  
            });

            frame.on( 'select', function() {
            var attachment = frame.state().get('selection').first().toJSON();
            jQuery('#afterbefore_upload_afterbefore1').attr('src',attachment.url);
            jQuery('#afterbefore_upload_link1').val(attachment.url);

            });

            if ( frame ) {
            frame.open();
            return;
            }

      });


      jQuery('#afterbefore_upload_button2').click(function(){

            event.preventDefault();
            var frame;
            frame = wp.media({
            title: 'Select or Upload Media Of Your Chosen Persuasion',
            button: {
                  text: 'Use this media'
            },
            library: { 
                  type: 'image'
            },
            multiple: false  
            });
            frame.on( 'select', function() {
                  var attachment = frame.state().get('selection').first().toJSON();
                  jQuery('#afterbefore_upload_afterbefore2').attr('src',attachment.url);
                  jQuery('#afterbefore_upload_link2').val(attachment.url);
            });

            if ( frame ) {
                  frame.open();
                  return;
            }
      });

      jQuery('#afterbefore_close2').click(function(){
            jQuery('.wb3d_panel').css('display','none');
      });

};