/**
* Version:     1.0.0
* Author:      Keivan Kamali
*/

wb3d_setupdata.panel=function(obm){
      obm.modules['panel']=1;

      obm.createobj.panel=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){
            var p='position:absolute;';
            var ov='';
            if(B['overflow1_'+y]===1){
                  ov='overflow:hidden;';
            }
            var ext2='<div id="wb3df-'+idm+'" style="'+p+'top:0px;left:0px; height:auto;width:300px;">';
            var textx='';
            if(level===0){
                  textx=wb3d_set_textx(idm);
            }
            var txt='<div id="wb3dg-'+idm+'" style="'+p+'">'+textx+ext2;
            if(B['relative_'+y]===2){
                  txt='<div id="wb3dg-'+idm+'" style="position:relative">'+textx+ext2;
            }
            txt+='<div class="wb3d_pointer" style="position: absolute;top: -15px;left: 0px;z-index:5">';
            txt+='<img id="lock_panel-'+idm+'" class="imgbuttom pointer img40" style="position:absolute;left:20px; width: 15px;height: 15px;" src="'+wb3d.wb3d_plagin_images_URL+'lock.png">';
            txt+='</div>';
            txt+='<div id="wb3de-'+idm+'" style="'+p+ov+'top:0px;left:0px; height:100%;width:100%;">';
            txt+='</div ></div></div>';
            jQuery(tmpdivid).append(txt);
            obm.bk_create_layer[l]=-1;
            obm.bk_create_layer0[l]=-1;
            wb3d_reset_obj_xy3(l);
      };

      obm.removeobj.panel=function(K,idm,y){
            jQuery('#wb3dg-'+idm).empty();
            jQuery('#wb3dg-'+idm).remove();
            wb3d_delete_func_event(idm);
            delete K['type_obj-'+y];
            delete K['type_'+y];
            return 0;
      };

      obm.setnewvalue.panel=function(){
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#panel_div').css('display','');
            jQuery('#panel_div').removeClass("wb3d_displaynone");
            jQuery('#panel_overflow1').prop('checked', false);
            jQuery('#panel_input_height').prop('checked', false);
            jQuery('#panel_input_relative').prop('checked', false);
            jQuery('#panel_input_relative2').prop('checked', false);
            jQuery('#panel_input_buttom').val(0);
            jQuery('#panel_input_margin').val(0);
      };
  
  
      obm.setvalue.panel=function(i,T,K){

            jQuery('.wb3d_panel').css('display','none');
            jQuery('#panel_div').css('display','');
            jQuery('#panel_div').removeClass("wb3d_displaynone");

            if(K['overflow1_'+i]===1){
                  jQuery('#panel_overflow1').prop('checked', true);
            }
            else{
                  jQuery('#panel_overflow1').prop('checked', false);
            }

            if(K['auto_height_'+i]===1){
                  jQuery('#panel_input_height').prop('checked', true);
            }
            else{
                  jQuery('#panel_input_height').prop('checked', false);
            }

            if(K['relative_'+i]==2){
                  jQuery('#panel_input_margin').prop( 'disabled', false );
                  jQuery('#panel_input_relative2').prop( 'disabled', false );
                  jQuery('#panel_input_relative').prop( 'disabled', true );
                  jQuery('#panel_input_relative2').prop('checked', true);
                  jQuery('#panel_input_relative').prop('checked', false);
            }
            else if(K['relative_'+i]==1){
                  jQuery('#panel_input_margin').prop( 'disabled', true );
                  jQuery('#panel_input_relative2').prop( 'disabled', true );
                  jQuery('#panel_input_relative').prop( 'disabled', false );
                  jQuery('#panel_input_relative2').prop('checked', false);
                  jQuery('#panel_input_relative').prop('checked', true);
            }
            else{
                  jQuery('#panel_input_margin').prop( 'disabled', true );
                  jQuery('#panel_input_relative2').prop( 'disabled', false );
                  jQuery('#panel_input_relative').prop( 'disabled', false );
                  jQuery('#panel_input_relative2').prop('checked', false);
                  jQuery('#panel_input_relative').prop('checked', false);
            }
            jQuery('#panel_input_buttom').val(K['buttom_'+i]);
            jQuery('#panel_input_margin').val(K['margin_'+i]);

      };


      wb3d_panel_event2=function (idm){

            jQuery('#lock_panel-'+idm).click(function(){
                  var id=this.id.split('lock_panel-')[1];
                  if(obm.panelLock[id]===0){
                        obm.panelLock[id]=1;
                        jQuery('#lock_panel-'+id).attr('src',wb3d.wb3d_plagin_images_URL+'lock.png');
                  }
                  else{
                        obm.panelLock[id]=0;
                        jQuery('#lock_panel-'+id).attr('src',wb3d.wb3d_plagin_images_URL+'unlock.png');
                  }
            });
            jQuery('#wb3de-'+idm).on( "dropover", function( event, ui ) {

            	jQuery('#wb3de-'+idm).css("border","2px solid blue");
            } );
            jQuery('#wb3de-'+idm).on( "dropout", function( event, ui ) {

            	jQuery('#wb3de-'+idm).css("border","0px solid blue");
            } );
            jQuery('#wb3de-'+idm).droppable({
            	// // hoverClass: "wb3d_drophover",
            	// over: function( event, ui ) {
            	// 	alert("FFF")
            	// },
                  drop: function(event, ui) { 
                        var sn=obm.sn['0-0'];
                        var id=ui.draggable.attr('id');
                        if(id.split('_')[1]==='div'||id.split('-')[1]===undefined||obm.wb3d_ids[id.split('-')[1]]===undefined){
                              return;
                        }

                        var idc=obm.wb3d_ids[id.split('-')[1]].split('_')[1].split('-');
                        var idp=obm.wb3d_ids[this.id.split('-')[1]].split('_')[1].split('-');

                        id=this.id.split('wb3de-')[1];
                        if(obm.panelLock[id]===1){
                              return 0;
                        }

                        var w=idp[1]+'-'+idp[2];
                        if(obm.U_P[sn+'-'+idc[0]+'-'+idc[1]]==0&&idc[1]!=undefined){
                              var F=obm.dataslide[sn][ obm.los[sn+'-'+idc[0]] ][obm.lo_l[sn+'-'+idc[0]+'-'+idc[1]]] ; 
                              for(var v=0;v<4;v++){
                                    F['PX_'+v]=20;
                                    F['PY_'+v]=20;
                              }

                              
                              obm.act_drop=1;
                              setTimeout(function(){
                                    obm.act_drop=0;
                              },1400);
                              set_new_position(sn,idc[0],idc[1],idp[1],idp[2],obm);
                              for(var r=0;r<F.layer_obj;r++){
                                    var t= F['obj_num_'+r];
                                    var T=F[ 'type_obj-'+t];
                                    if(obm.addon['wb3d_'+T+'_drop']!=undefined){
                                          obm.addon['wb3d_'+T+'_drop'](F,obm.wb3d_id['0_'+idc[0]+'-'+idc[1]+'-'+t],t,idc,idp);
                                    }
                                    jQuery('#wb3dg-'+obm.wb3d_id['0_'+idc[0]+'-'+idc[1]+'-'+t]).detach().appendTo('#wb3de-'+obm.wb3d_id['0_'+idp[0]+'-'+idp[1]+'-'+idp[2]]);
                                    obm.chenge_details_obj[obm.wb3d_id['0_'+idc[0]+'-'+idc[1]+'-'+t]]=-1;
                                    obm.chenge_details_obj[obm.wb3d_id['0_'+idp[0]+'-'+idp[1]+'-'+idp[2]]]=-1;
                              }
                        }
                  },
            });

            jQuery('#wb3de-'+idm).on( 'dropout', function( event, ui ) {

            });
      };


      obm.savedata.panel=function(zz,z,i,t,T,F,flag,cx,cy,ax,ay){

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
            zz[z][i]['overflow1_'+t]=F['overflow1_'+t];
            zz[z][i]['auto_height_'+t]=F['auto_height_'+t];
            zz[z][i]['relative_'+t]=F['relative_'+t];
            zz[z][i]['buttom_'+t]=F['buttom_'+t];
            zz[z][i]['margin_'+t]=F['margin_'+t];
            zz[z][i]['type_'+t]='panel';

      };

      wb3d_panel_resize=function (id){

            jQuery('#wb3df-'+id ).resizable({handles: 's,e,se',

                  start:function(event,ui){
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
                        },1000);
                  }  
            });
      };



      jQuery('#panel_submit').click(function(){
            var sn=obm.sn['0-0'];
            var cu=0;
            var flag_panel=0;
            var i,idm,K,tmpdivid;
            if(obm.new_layer!=0){
                  wb3d_new_layerB();
                  K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[cu]] ][obm.lo_l[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]];
                  i=obm.i;
                  idm=obm.wb3d_id['0_'+obm.activeslide[cu]+'-'+obm.s_l+'-'+i];
                  obm.new_layer=0;
            }
            else{

                  i=obm.i;
                  if(obm.s_l===-1||obm.s_o===-1){
                        alert(jQuery('#wb3d_id_alert1').text());
                        return;
                  }

                  K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[cu]] ][obm.lo_l[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]];
                  idm=obm.wb3d_id['0_'+obm.activeslide[cu]+'-'+obm.s_l+'-'+i];

                  flag_panel=1;
            }

            wb3d_get_panel(K,i,obm);
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#textmenu2').css('display','none');
            idm=obm.wb3d_id['0_'+obm.activeslide[cu]+'-'+obm.s_l+'-'+i];

            var idmm='0_'+obm.activeslide[cu]+'-'+obm.s_l;
            obm.bk_create_layer[idmm]=-1;
            obm.bk_create_layer0[idmm]=-1;
            obm.bk_id[idmm]=-1;

            if(obm.U_P[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]!=0){
                  tmpdivid='#wb3de-'+obm.wb3d_id['0_'+obm.activeslide[cu]+'-'+obm.U_P[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]];
            }
            else{
                  tmpdivid='#wb3dh-'+obm.wb3d_id[cu+'_'+obm.activeslide[cu]];
            }
            if(flag_panel===0){
                  obm.createobj.panel(sn,idm,K,tmpdivid,obm,i,0,idmm,obm.activeslide[cu],cu,0);
            }
            else{
                  if(K['overflow1_'+i  ]===1){
                        jQuery('#wb3de-'+idm).css('overflow','hidden');
                  }
                  else{
                        jQuery('#wb3de-'+idm).css('overflow','');
                  }
                  if(K['relative_'+i  ]==2){

                        jQuery('#wb3dg-'+idm).css('position','relative');
                        
                        jQuery('#wb3dg-'+idm).removeClass("wb3d_absolute");
                        jQuery('#wb3dg-'+idm). draggable( 'disable' );
                        jQuery('#wb3dg-'+idm). css( 'top',"" );
                        jQuery('#wb3dg-'+idm). css( 'left',"" );
                  }
                  else{
                        jQuery('#wb3dg-'+idm).css('position','absolute');
                        jQuery('#wb3dg-'+idm). draggable();
                        jQuery('#wb3dg-'+idm). draggable( 'enable' );
                        jQuery('#wb3dg-'+idm). css( 'margin-top',"0px" );
                  }
            }
            obm.flag_bl2['0_0']=0;
            obm.bk_t_l[idm]=-1;
            obm.bk_t_l2[idm]=-1;
            obm.bk_change_sizew[idm]=-1;
            obm.bk_change_sizeh[idm]=-1;
            obm.chenge_details_obj[idm]=-1;
            wb3d_set_slide_value(obm.activeslide[obm.cu],1,obm);
      });


      obm.setupobj.panel=function(obm,idm,T,B,wslide,name,y,sn,flag,level){
            obm.size1[idm]=1;
            obm.show_obj[idm]=3;
            obm.panelLock[idm]=1;
            wb3d_panel_event2(idm);
            if(level===0){
                  if(B['relative_'+y]!=2){
                        wb3d_drag_obj('#wb3dg-'+idm);
                  }
                  wb3d_panel_resize(idm);
            }
            wb3d_events('wb3dg-'+idm,obm);
      };

      function wb3d_get_panel(K,i,obm){

            K['type_obj-'+i  ]='panel';
            K['type_'+i  ]='panel';

            for(var cx=0;cx<4;cx++){
                  if(K['sizey_'+cx+'-'+i]==undefined){
                        K['sizey_'+cx+'-'+i]=280;
                  }
                  if(K['sizex_'+cx+'-'+i]==undefined){
                        K['sizex_'+cx+'-'+i]=380;
                  }
                  
            }

            if(jQuery('#panel_overflow1').is(':checked')){
                  K['overflow1_'+i  ]=1;
            }
            else{
                  K['overflow1_'+i  ]=0;
            }

            if(jQuery('#panel_input_height').is(':checked')){
                   K['auto_height_'+i  ]=1;
            }
            else{
                   K['auto_height_'+i  ]=0;
            }
            K['relative_'+i  ]=0;
            if(jQuery('#panel_input_relative').is(':checked')){
                   K['relative_'+i  ]=1;
            }

            if(jQuery('#panel_input_relative2').is(':checked')){
                   K['relative_'+i  ]=2;
            }

            K['buttom_'+i]=Number(jQuery('#panel_input_buttom').val());
            K['margin_'+i]=Number(jQuery('#panel_input_margin').val());
      }



      jQuery('#panel_close2').click(function(){
            jQuery('.wb3d_panel').css('display','none');
      });

      jQuery('#panel_input_relative2').change(function() {
            if(jQuery('#panel_input_relative2').is(':checked')){
                  jQuery('#panel_input_relative').prop('checked', false);
                  jQuery('#panel_input_margin').prop( 'disabled', false );
                  jQuery('#panel_input_relative').prop( 'disabled', true );
            }
            else{
                  jQuery('#panel_input_relative').prop( 'disabled', false );
                  jQuery('#panel_input_margin').prop( 'disabled', true );
            }

      });

      jQuery('#panel_input_relative').change(function() {
            if(jQuery('#panel_input_relative').is(':checked')){
                  jQuery('#panel_input_relative2').prop('checked', false);
                  jQuery('#panel_input_margin').prop( 'disabled', true );
                  jQuery('#panel_input_relative2').prop( 'disabled', true );
            }
            else
                  jQuery('#panel_input_relative2').prop( 'disabled', false );
      });


      function set_new_position(sn,slide,first,second,second_obj,obm){

            var lc=obm.lo_l[sn+'-'+slide+'-'+first];
            var lp=obm.lo_l[sn+'-'+slide+'-'+second];

            jQuery('#sortable'+slide).empty();
            jQuery('#sortable'+slide).remove();
            var b,i,t,idt,idp,j,x,y,z,break1;

            if(lc<lp){

                  idt=obm.dataslide[sn][ obm.los[sn+'-'+slide] ][(lc)];
                  idp=JSON.parse(JSON.stringify(idt));
                  obm.dataslide[sn][ obm.los[sn+'-'+slide] ][lc]=JSON.parse(JSON.stringify(obm.dataslide[sn][ obm.los[sn+'-'+slide] ][lp]));
                  obm.dataslide[sn][ obm.los[sn+'-'+slide] ][lp]=idp;
                  obm.dataslide[sn][obm.los[sn+'-'+slide]   ][lc ].loc=lp;
                  obm.dataslide[sn][obm.los[sn+'-'+slide]   ][lp ].loc=lc;
                  obm.la_l[sn+'-'+slide+'-'+lp]=first;
                  obm.la_l[sn+'-'+slide+'-'+lc]=second;
                  obm.lo_l[sn+'-'+slide+'-'+first]=lp;
                  obm.lo_l[sn+'-'+slide+'-'+second]=lc;
                  t=lc;
                  lc=lp;
                  lp=t;

            }

            idt=obm.dataslide[sn][ obm.los[sn+'-'+slide] ][(lc)];
            idp=JSON.parse(JSON.stringify(idt));
            j=0;
            x=[];
            x[j]=JSON.parse(JSON.stringify(idt));
            j++;
            break1=0;
            for(i=lc+1;i<obm.layers[sn+'-'+slide];i++){
                  for(b=1;b<=lc;b++){
                        if(obm.U_P[sn+'-'+slide+'-'+obm.la_l[sn+'-'+slide+'-'+b] ]===obm.U_P[sn+'-'+slide+'-'+obm.la_l[sn+'-'+slide+'-'+i] ]){
                              break1=1;
                              break;
                        }
                  }

                  if(break1===0){
                        t=obm.dataslide[sn][ obm.los[sn+'-'+slide] ][(i)];
                        x[j]=JSON.parse(JSON.stringify(t));
                        j++;
                  }
                  else{
                        break;
                  }
            }

            y=0;
            z=[];
            break1=0;


            for(i=0;i<lc-lp-1;i++){
                  obm.dataslide[sn][ obm.los[sn+'-'+slide] ][(lc-i+j-1)]=JSON.parse(JSON.stringify(obm.dataslide[sn][ obm.los[sn+'-'+slide] ][(lc-i-1)]));  
                  obm.dataslide[sn][obm.los[sn+'-'+slide]   ][(lc-i+j-1) ].loc=(lc-i+j-1);
                  obm.la_l[sn+'-'+slide+'-'+(lc-i+j-1)]=obm.dataslide[sn][obm.los[sn+'-'+slide]   ][(lc-i-1) ].ind;
                  obm.lo_l[sn+'-'+slide+'-'+obm.la_l[sn+'-'+slide+'-'+(lc-i+j-1)]]=(lc-i+j-1);
            }


            for(i=0;i<j;i++){
                  obm.dataslide[sn][ obm.los[sn+'-'+slide] ][(lp+1+i)]=JSON.parse(JSON.stringify(x[(i)]));    
                  obm.dataslide[sn][obm.los[sn+'-'+slide]   ][(lp+1+i) ].loc=(lp+1+i);
                  obm.la_l[sn+'-'+slide+'-'+(lp+1+i)]=obm.dataslide[sn][obm.los[sn+'-'+slide]   ][(lp+1+i) ].ind;
                  obm.lo_l[sn+'-'+slide+'-'+obm.la_l[sn+'-'+slide+'-'+(lp+1+i)]]=(lp+1+i);
            }

            obm.U_P[sn+'-'+slide+'-'+first]=second+'-'+second_obj;
            obm.dataslide[sn][ obm.los[sn+'-'+slide] ][(lp+1)].U_P=obm.U_P[sn+'-'+slide+'-'+first];

            for( i=0;i<obm.layers[sn+'-'+slide];i++){
                  wb3d_create_layer_panel(sn,slide,obm.la_l[sn+'-'+slide+'-'+i],i,obm);
            }
      }

};