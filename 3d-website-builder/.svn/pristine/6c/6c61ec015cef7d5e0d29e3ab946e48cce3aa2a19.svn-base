/**
* Version:     1.0.0
* Author:      Keivan Kamali
*/
wb3d_setupdata.screans=function(obm){
      obm.modules['screans']=1;
      obm.screans_enter=[];
      obm.screans_bk=[];
      obm.createobj.screans=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){
            var p='position:absolute;';
            var ext2='<div id="wb3df-'+idm+'"  style="'+p+'top:0px;left:0px; height:auto;width:300px;">';
            var textx='';
            if(level===0){
                  textx=wb3d_set_textx(idm);
            }
            var txt='<div id="wb3dg-'+idm+'" style="'+p+'">'+textx+ext2;
            txt+='<div id="wb3de-'+idm+'"  style="overflow:hidden" >';//
            txt+='<img id="wb3d0-'+idm+'" src="'+wb3d.wb3d_plagin_URL+'/images/1.png" style="position:absolute;z-index:1;width:100%;height:100%" />'; 
            txt+='<img id="wb3d1-'+idm+'" src="'+wb3d.wb3d_plagin_URL+'/images/2.png" style="position:absolute;z-index:1;width:100%;height:100%" />'; 
            txt+='<img id="wb3d2-'+idm+'" src="'+wb3d.wb3d_plagin_URL+'/images/3.png" style="position:absolute;z-index:1;width:100%;height:100%" />'; 
            txt+='<img id="wb3d3-'+idm+'" src="'+wb3d.wb3d_plagin_URL+'/images/4.png" style="position:absolute;z-index:1;width:100%;height:100%" />'; 
            txt+='</div ></div></div>';
            jQuery(tmpdivid).append(txt);
            obm.bk_create_layer[l]=-1;
            obm.bk_create_layer0[l]=-1;
            wb3d_reset_obj_xy3(l);
      };



      obm.addon.wb3d_screans_run=function(sn,obm,frm,B,eff,wslide,yy,md,w0 ,yy_0,md0,id1,id_l,type_L,wh,ids,idg,cu,level){
            if(obm.screans_bk[id1]!=obm.d){
                  document.getElementById('wb3d0-'+id1).style.display="none";
                  document.getElementById('wb3d1-'+id1).style.display="none";
                  document.getElementById('wb3d2-'+id1).style.display="none";
                  document.getElementById('wb3d3-'+id1).style.display="none";
                  document.getElementById('wb3d'+obm.d+'-'+id1).style.display="";
                  obm.screans_bk[id1]=obm.d;
            }
      };


      obm.removeobj.screans=function(K,idm,y){
            jQuery('#wb3dg-'+idm).empty();
            jQuery('#wb3dg-'+idm).remove();
            wb3d_delete_func_event(idm);
            delete K['type_obj-'+y];
            return 0;
      };

      obm.setnewvalue.screans=function(){
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#screans_div').css('display','');
            jQuery('#screans_div').removeClass("wb3d_displaynone");
      };

      obm.setvalue.screans=function(i,T,K){
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#screans_div').css('display','');
            jQuery('#screans_div').removeClass("wb3d_displaynone");
      };


      obm.savedata.screans=function(zz,z,i,t,T,F,flag,cx,cy,ax,ay){

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
            zz[z][i]['screans_'+t]=F['screans_'+t];

      };


      jQuery('#screans_submit').click(function(){

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
                        obm.removeobj.screans(K,idm,i);
                        jQuery('.wb3d_panel').css('display','none');
                        jQuery('#textmenu2').css('display','none');
                  }
            }

            wb3d_get_screans(K,i,obm);
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#textmenu2').css('display','none');
            if(obm.U_P[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]!=0){
                  tmpdivid='#wb3de-'+obm.wb3d_id['0_'+obm.activeslide[cu]+'-'+obm.U_P[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]];
            }
            else{
                  tmpdivid='#wb3dh-'+obm.wb3d_id[cu+'_'+obm.activeslide[cu]];
            }
            obm.createobj.screans(sn,idm,K,tmpdivid,obm,i,0,idmm,obm.activeslide[cu],cu,0);
            var idmm=cu+'_'+obm.activeslide[cu]+'-'+obm.s_l;
            obm.bk_create_layer[idmm]=-1;
            obm.bk_create_layer0[idmm]=-1;

      });



      wb3d_screans_resize=function (id){

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


      obm.setupobj.screans=function(obm,idm,T,B,wslide,name,y,sn,flag,level){
            obm.size1[idm]=1;
            obm.screans_enter[idm]=-1;

            obm.show_obj[idm]=3;

            if(level===0){
                  wb3d_drag_obj('#wb3dg-'+idm);
                  wb3d_screans_resize(idm);
            }
            wb3d_events('wb3dg-'+idm,obm);
      };


      function wb3d_get_screans(K,i,obm){
            K['type_obj-'+i  ]='screans';
            for(var cx=0;cx<4;cx++){
                  if(K['sizey_'+cx+'-'+i]==undefined){
                        K['sizey_'+cx+'-'+i]=70;
                  }
                  if(K['sizex_'+cx+'-'+i]==undefined){
                        K['sizex_'+cx+'-'+i]=70;
                  }
            }
      }

      jQuery('#screans_close2').click(function(){
            jQuery('.wb3d_panel').css('display','none');
      });
};