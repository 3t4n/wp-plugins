/**
* Version:     1.0.0
* Author:      Keivan Kamali
* copyright :  © 2024 Keivan Kamali all rights reserved
*/
wb3d_setupdata.emptytag=function(obm){
      obm.emptytag_enter=[];
      obm.removeobj.emptytag=function(K,idm,y){
            jQuery('#wb3dg-'+idm).empty();
            jQuery('#wb3dg-'+idm).remove();
            wb3d_delete_func_event(idm);
            delete K['type_obj-'+y];
            return 0;
      };

      obm.createobj.emptytag=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){
            var p='position:absolute;';
            var ext2='<div id="wb3df-'+idm+'"  style="'+p+'top:0px;left:0px; height:auto;width:300px;">';
            var textx='';
            if(level===0){
                  textx=wb3d_set_textx(idm);
            }
            var txt='<div id="wb3dg-'+idm+'" style="'+p+'">'+textx+ext2;
            txt+='<div id="wb3de-'+idm+'"  style="overflow:hidden" >';
            // txt+='<img src="'+(wb3d.wb3d_plagin_URL)+'/modules/emptytag/images/image.jpg" style="width:100%;height:100%;">';
            txt+='</div ></div></div>';
            jQuery(tmpdivid).append(txt);
            obm.bk_create_layer[l]=-1;
            obm.bk_create_layer0[l]=-1;
            wb3d_reset_obj_xy3(l);
      };

      obm.setnewvalue.emptytag=function(){
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#emptytag_div').css('display','');
            jQuery('#emptytag_div').removeClass("wb3d_displaynone");
      };

      obm.setvalue.emptytag=function(i,T,K){
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#emptytag_div').css('display','');
            jQuery('#emptytag_div').removeClass("wb3d_displaynone");
      };


      obm.savedata.emptytag=function(zz,z,i,t,T,F,flag,cx,cy,ax,ay){

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

      };


      jQuery('#emptytag_submit').click(function(){

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
                        obm.removeobj.emptytag(K,idm,i);
                        jQuery('.wb3d_panel').css('display','none');
                        jQuery('#textmenu2').css('display','none');
                  }
            }

            wb3d_get_emptytag(K,i,obm);
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#textmenu2').css('display','none');
            if(obm.U_P[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]!=0){
                  tmpdivid='#wb3de-'+obm.wb3d_id['0_'+obm.activeslide[cu]+'-'+obm.U_P[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]];
            }
            else{
                  tmpdivid='#wb3dh-'+obm.wb3d_id[cu+'_'+obm.activeslide[cu]];
            }

            obm.createobj.emptytag(sn,idm,K,tmpdivid,obm,i,0,idmm,obm.activeslide[cu],cu,0);
            var idmm=cu+'_'+obm.activeslide[cu]+'-'+obm.s_l;
            obm.bk_create_layer[idmm]=-1;
            obm.bk_create_layer0[idmm]=-1;
      });



      wb3d_emptytag_resize=function (id){

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

      obm.setupobj.emptytag=function(obm,idm,T,B,wslide,name,y,sn,flag,level){
            obm.size1[idm]=1;
            obm.emptytag_enter[idm]=-1;
            obm.show_obj[idm]=3;
            if(level===0){
                  wb3d_drag_obj('#wb3dg-'+idm);
                  wb3d_emptytag_resize(idm);
            }
            wb3d_events('wb3dg-'+idm,obm);
      };

      function wb3d_get_emptytag(K,i,obm){
            K['type_obj-'+i  ]='emptytag';
            for(var cx=0;cx<4;cx++){
                  if(K['sizey_'+cx+'-'+i]==undefined){
                        K['sizey_'+cx+'-'+i]=200;
                  }
                  if(K['sizex_'+cx+'-'+i]==undefined){
                        K['sizex_'+cx+'-'+i]=300;
                  }
            }
      }
      jQuery('#emptytag_close2').click(function(){
            jQuery('.wb3d_panel').css('display','none');
      });
};