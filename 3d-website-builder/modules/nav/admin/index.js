/**
* Version:     1.0.0
* Author:      Keivan Kamali
* copyright :  © 2024 Keivan Kamali all rights reserved
*/
wb3d_setupdata.nav=function(obm){
      obm.modules['nav']=1;

      obm.nav_enter=[];
      obm.nav_run1=[];
      obm.nav_run2=[];

      obm.createobj.nav=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){
            var p='position:absolute;';
            var ext2='<div id="wb3df-'+idm+'"  style="'+p+'top:0px;left:0px; height:auto;width:300px;">';
            var textx='';
            if(level===0){
                  textx=wb3d_set_textx(idm);
            }
            var txt='<div id="wb3dg-'+idm+'" style="'+p+'">'+textx+ext2;
            txt+='<div id="wb3de-'+idm+'"  style="overflow:hidden;position:absolute" >';
            for(var i=0;i<obm.setting[sn].num;i++){
                  txt+='<div class="wb3d_nav pointer" id="wb3dr-'+idm+'-'+i+'" style="overflow:hidden;border-radius:50%;position:absolute"></div>';
            }
            txt+='</div ></div></div>';
            jQuery(tmpdivid).append(txt);
            obm.bk_create_layer[l]=-1;
            obm.bk_create_layer0[l]=-1;
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

            if(obm.nav_run1[id1]!=obm.wh_h[id1]){

                  var padding;
                  obm.nav_run1[id1]=obm.wh_h[id1];

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


	obm.removeobj.nav=function(K,idm,y){
		jQuery('#wb3dg-'+idm).empty();
		jQuery('#wb3dg-'+idm).remove();
		wb3d_delete_func_event(idm);
		delete K['type_obj-'+y];
		return 0;
	};


      obm.setnewvalue.nav=function(){
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#nav_div').css('display','');
            jQuery('#nav_div').removeClass("wb3d_displaynone");
            jQuery('#nav_ver').val(0);
            jQuery('#nav_padding').val(5);
      };

	

      obm.setvalue.nav=function(i,T,K){
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#nav_div').css('display','');
            jQuery('#nav_div').removeClass("wb3d_displaynone");
            jQuery('#nav_ver').val(K['ver_'+i]);
            jQuery('#nav_padding').val(K['padding_'+i]);
      };


      obm.savedata.nav=function(zz,z,i,t,T,F,flag,cx,cy,ax,ay){
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
            zz[z][i]['ver_'+t]=F['ver_'+t];
            zz[z][i]['padding_'+t]=F['padding_'+t]/ax;
      };


      jQuery('#nav_submit').click(function(){

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
                        obm.removeobj.nav(K,idm,i);
                        jQuery('.wb3d_panel').css('display','none');
                        jQuery('#textmenu2').css('display','none');
                  }
            }
            wb3d_get_nav(K,i,obm);
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#textmenu2').css('display','none');
            if(obm.U_P[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]!=0){
                  tmpdivid='#wb3de-'+obm.wb3d_id['0_'+obm.activeslide[cu]+'-'+obm.U_P[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]];
            }
            else{
                  tmpdivid='#wb3dh-'+obm.wb3d_id[cu+'_'+obm.activeslide[cu]];
            }
            obm.createobj.nav(sn,idm,K,tmpdivid,obm,i,0,idmm,obm.activeslide[cu],cu,0);
            var idmm=cu+'_'+obm.activeslide[cu]+'-'+obm.s_l;
            obm.bk_create_layer[idmm]=-1;
            obm.bk_create_layer0[idmm]=-1;

      });


      wb3d_nav_resize=function (id,t){

            jQuery('#wb3df-'+id ).resizable({handles: t,

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
                        var B=obm.dataslide[sn][obm.los[sn+'-'+fx]][obm.lo_l[sn+'-'+fx+'-'+ex]];
                        obm.nav_bkpadding=B['padding_'+obm.d];
                        obm.nav_bkw=ui.size.width;
                        obm.nav_bkh=ui.size.height;

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

                        var x=ui.size.width/obm.nav_bkw;
                        var y=ui.size.height/obm.nav_bkh;

                        if( B['ver_'+obm.d]===0){
                              if( x===1){
                                    return;
                              }
                              else{
                              B['padding_'+obm.d]=(obm.nav_bkpadding*x);
                              }
                        }

                        if( B['ver_'+obm.d]===1){
                              if( y===1){
                                    return;
                              }
                              else{
                                    B['padding_'+obm.d]=(obm.nav_bkpadding*y);
                              }
                        }
                        obm.nav_run1[id1]=-1;
                        wb3d_change_resize_data(obm,id1);
                  },
                  stop: function( event, ui ) {
                        var id1=this.id.split('-')[1];
                        setTimeout(function(){
                        obm.nav_run1[id1]=-1;
                        obm.nav_run2[id1]=-1;
                        wb3d_change_resize_data(obm,id1);
                        },300);
                  }  
            });
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
                        setTimeout((function(obm,i,jQuery,x, idm, sn, wb3d_ajaxwb3d_c, B) {
                              x[i].onclick = function(){
                                    var cu=obm.wb3d_ids[idm].split('_')[0];
                                    var id=obm.wb3d_ids[idm].split('_')[1].split('-');
                                    var idg=obm.wb3d_id[cu+'_'+id[0]+'-'+id[1]+'-'+id[2]];
                                    var num=obm.slide_of_location[sn+'-'+this.id.split('-')[2]];
                                    if(obm.change_status[cu+'_'+idg]!=1){
                                          wb3d_ajaxwb3d_c(obm,sn,id[0],id[1],id[2],id[3],B,-2,cu+'_'+idg,num,cu,0);
                                    }
                              };
                        }).bind(null, obm,i,jQuery,x, idm, sn, wb3d_ajaxwb3d_c, B), 0);
                  }
            }
            B['num_'+y]=obm.slidnum[sn];
            obm.show_obj[idm]=3;
            if(level===0){
                  wb3d_drag_obj('#wb3dg-'+idm);
                  if( B['ver_'+obm.d]===0){
                        wb3d_nav_resize(idm,'e');
                  }
                  else{
                        wb3d_nav_resize(idm,'s');
                  }
            }
            wb3d_events('wb3dg-'+idm,obm);
      };


      function wb3d_get_nav(K,i,obm){
            K['type_obj-'+i  ]='nav';
            K['ver_'+i]=Number(jQuery('#nav_ver').val());
            K['padding_'+i]=parseInt(jQuery('#nav_padding').val());
            for(var cx=0;cx<4;cx++){
                  if(K['sizey_'+cx+'-'+i]==undefined){
                        K['sizey_'+cx+'-'+i]=200;
                  }
                  if(K['sizex_'+cx+'-'+i]==undefined){
                        K['sizex_'+cx+'-'+i]=300;
                  }
            }
      }

      jQuery('#nav_close2').click(function(){
            jQuery('.wb3d_panel').css('display','none');
      });

};