/**
* Author URI:  https://3dwebsitebuilder.com/
* copyright :  © 2024 Keivan Kamali all rights reserved
*/
wb3d_setupdata.imgsvg=function(obm){
      obm.modules['imgsvg']=1;

      obm.imgsvg_path=[];
      obm.imgsvg_run_first=[];
      obm.imgsvg_run=[];


      obm.setupeffect.imgsvg=function(html){
            jQuery('#imgsvg_eff').append(html);
      };
      obm.removeeffect.imgsvg=function(eff){
            jQuery('#imgsvg_eff option[value="'+eff+'"]').remove();
      };
      obm.checkeffect.imgsvg=function(eff,B,y){
            var flag=0;
            if(B['eff_'+y]==eff){
            flag=1;
            }
            return flag;
      };

      obm.removeobj.imgsvg=function(K,idm,y){
            jQuery('#wb3dg-'+idm).empty();
            jQuery('#wb3dg-'+idm).remove();
            delete K['type_obj-'+y];
            delete K['img1_'+y];
            wb3d_delete_func_event(idm);
      };


      obm.setnewvalue.imgsvg=function(){
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#imgsvg_div').css('display','');
            jQuery('#imgsvg_div').removeClass("wb3d_displaynone");
            jQuery('#imgsvg_upload_link1').val('');
            jQuery('#imgsvg_upload_img1').attr('src','');
            jQuery('#imgsvg_x').val(0);
            jQuery('#imgsvg_y').val(0);
            jQuery('#imgsvg_speed').val(2);
            jQuery('#imgsvg_click').val(0);
            jQuery('#imgsvg_rotate').val(0);
      };

      obm.setvalue.imgsvg=function(i,T,K){

            jQuery('.wb3d_panel').css('display','none');
            jQuery('#imgsvg_div').css('display','');
            jQuery('#imgsvg_div').removeClass("wb3d_displaynone");
            jQuery('#imgsvg_upload_link1').val(K['img1_'+i]);
            jQuery('#imgsvg_upload_img1').attr('src',K['img1_'+i]);
            jQuery('#imgsvg_x').val(K['x_'+i]);
            jQuery('#imgsvg_y').val(K['y_'+i]);
            jQuery('#imgsvg_eff').val(K['eff_'+i]);
            jQuery('#imgsvg_speed').val(K['time_'+i]);
            jQuery('#imgsvg_click').val(K['click_'+i]);
            jQuery('#imgsvg_rotate').val(K['rotate_'+i]);

      };


      obm.addon.wb3d_imgsvg_run=function(sn,obm,frm,B,eff,wslide,yy,md,w0 ,yy_0,md0,id1,id_l,type_L,wh,ids,idg,cu,level){

            if(obm.imgsvg_run_first[id1]!=1){

                  var text="";
                  
                  var text3="";
                  if(B['rotate_'+md]==1){
                        text="animation: wb3d_imgsvg "+B['time_'+md]+"s linear infinite;";     
                  }
                  if(B['click_'+md]==0){
                        text3=' id="wb3dsvg-'+id1+'" ';
                  }

                  var src1=B['img1_'+md];
                  var txt='<svg '+text3+' width="100%" height="100%" style="background-size:100% 100%;width:100%;height:100%;" >';
                  txt+='<clipPath id="wb3dclip-'+id1+'" style="'+text+'">';
                  txt+='<path  id="wb3dpath-'+id1+'" style="position:absolute;left:0px;"';
                  txt+='  />';
                  txt+='</clipPath>';
                  txt+='<image id="wb3dimg23-'+id1+'" xlink:href="'+src1+'" clip-path="url(#wb3dclip-'+id1+')"  height="100%"  width="100%" >';
                  txt+='</image>';
                  txt+='</svg>';
                  document.getElementById("wb3de-"+id1).innerHTML +=txt;
                  
                  obm.imgsvg_run_first[id1]=1;
            }

            if(obm.imgsvg_path[id1]!=B['t_x_'+obm.d]+'-'+B['t_y_'+obm.d]+'-'+obm.chenge_details_obj[id1]+'-'+obm.wh_w[id1]+'-'+obm.wh_h[id1]){
                  obm.imgsvg_path[id1]=B['t_x_'+obm.d]+'-'+B['t_y_'+obm.d]+'-'+obm.chenge_details_obj[id1]+'-'+obm.wh_w[id1]+'-'+obm.wh_h[id1];
                  var ws=0;

                  var obj=obm.gs[sn][B['eff_'+md]];
                  var deltaX=(obj.X2[0]-obj.X1[0]);
                  var deltaY=(obj.Y2[0]-obj.Y1[0]);
                  var sizex=B['sizex_'+obm.d+'-'+md]*obm.wh_w[id1];
                  var sizey=B['sizey_'+obm.d+'-'+md]*obm.wh_h[id1];
                  var sizex0=B['sizex0_'+md];
                  var sizey0=B['sizey0_'+md];

                  if(obm.imgsvg_run[id1]!=obm.wh_w[id1]+'-'+obm.wh_h[id1]+'-'+sizey+'-'+sizex){
                        obm.imgsvg_run[id1]=obm.wh_w[id1]+'-'+obm.wh_h[id1]+'-'+sizey+'-'+sizex;

                        obm.bk_width[id1]=sizex;
                        obm.bk_width[id_l]=sizex;

                        obm.bk_height[id1]=sizey;
                        obm.bk_height[id_l]=sizey;

                        obm.idd[id1].style.width =(sizex)+'px';
                        obm.idc[id1].style.width =(sizex)+'px';
                        obm.ide[id1].style.width =(sizex0)+'px';



                        obm.idd[id1].style.height =(sizey)+'px';
                        obm.idc[id1].style.height =(sizey)+'px';
                        obm.ide[id1].style.height =(sizey0)+'px';

                        var n=obm.wh_w[id1]-obm.wh_h[id1]
                        n=(obm.wh_h[id1]/obm.wh_w[id1])
                        n=sizey/sizey0;
                        var nx=sizex/sizex0;
                        obm.scaleY[id1]=1/n;
                        obm.scaleY[id1]='scale('+(nx)+','+(n)+')';
                        obm.chenge_details_obj[id1]=-1;
                        obm.chenge_details_obj2[id1]=-1;
                        obm.bk_scr[id1]=-1;

                  }


                  deltaX=Math.abs(sizex0/deltaX);
                  deltaY=Math.abs(sizey0/deltaY);


                  var originx=50;
                  var originy=50;  

                  if(obj.E[0][11]!=0){
                        originx=obj.E[11][0];
                  }
                  if(obj.E[0][12]!=0){
                        originy=obj.E[12][0];
                  }

                  var text2=0+"% "+0+"%";    

                  document.getElementById('wb3dclip-'+id1).style.transformOrigin=text2;

                  var tx=B['t_x_'+obm.d]/100*deltaX;
                  var ty=B['t_y_'+obm.d]/100*deltaY;

                  var x=B['x_'+md]-obj.X1[0];
                  var y=B['y_'+md]-obj.Y1[0];

                  var d="M ";
                  while(ws<obm.t_p[sn+'-'+B['eff_'+md]]){

                        if(ws==0){
                              d+=(obj.fxx[ws]+x)*tx+","+(obj.fyy[ws]+y)*ty+" ";
                        }
                        if(obj.fxx[(ws)+'-T']=='line'){
                              d+='L '+(obj.fxx[ws+1]+x)*tx+','+(obj.fyy[ws+1]+y)*ty+' ';
                              ws+=2;
                        }
                        else if(obj.fxx[(ws)+'-T']=='Curved'){
                              d+='Q '+(obj.fxx[ws+2]+x)*tx+','+(obj.fyy[ws+2]+y)*ty+' ';
                              d+=((obj.fxx[ws+1]+x)*tx+','+(obj.fyy[ws+1]+y)*ty)+' ';
                              ws+=3;
                        }
                        else if(obj.fxx[(ws)+'-T']=='stop'){
                              d+='L '+(obj.fxx[ws]+x)*tx+','+(obj.fyy[ws]+y)*ty+' ';
                              ws++;
                        }
                  }
                  document.getElementById('wb3dpath-'+id1).setAttribute("d",  d+' z');
            }
      };


      obm.savedata.imgsvg=function(zz,z,i,t,T,F,flag,cx,cy,ax,ay){
			
            for(var j=0;j<4;j++){
                  if(flag!=1){
                        cy=j;
                        cx=j;
                        ax=1;
                        ay=1;
                  }
                  zz[z][i]['sizex0_'+t]=F['sizex0_'+t];
                  zz[z][i]['sizey0_'+t]=F['sizey0_'+t];
                  zz[z][i]['sizex_'+cx+'-'+t]=F['sizex_'+cy+'-'+t]/ax;
                  zz[z][i]['sizey_'+cx+'-'+t]=F['sizey_'+cy+'-'+t]/ay;
            }
            zz[z][i]['img1_'+t]=F['img1_'+t];
            zz[z][i]['x_'+t]=F['x_'+t];
            zz[z][i]['y_'+t]=F['y_'+t];
            zz[z][i]['time_'+t]=F['time_'+t];
            zz[z][i]['click_'+t]=F['click_'+t];
            zz[z][i]['rotate_'+t]=F['rotate_'+t];
            zz[z][i]['eff_'+t]=F['eff_'+t];
	};

    
      jQuery('#imgsvg_submit').click(function(){
            var cu=0;
            var tmpdivid;
            var sn=obm.sn['0-0'];
            var i,idm,K;
            if(jQuery('#imgsvg_eff').val()==null||jQuery('#imgsvg_eff').val()==undefined){
                  alert(jQuery('#alert_selectEffect').text());
                  return;
            }
            
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
                        obm.removeobj.imgsvg(K,idm,i);
                  }
            }

            wb3d_get_imgsvg(K,i,obm);
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#textmenu2').css('display','none');



            if(obm.U_P[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]!=0){
                  tmpdivid='#wb3de-'+obm.wb3d_id['0_'+obm.activeslide[cu]+'-'+obm.U_P[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]];
            }
            else{
                  tmpdivid='#wb3dh-'+obm.wb3d_id[cu+'_'+obm.activeslide[cu]];
            }

            var img = new Image();
            img.onload = function() {
                  var x=this.width;
                  var y=this.height;
                  for(var cx=0;cx<4;cx++){
                        if(K['sizey0_'+cx+'-'+i]===undefined){
                              K['sizey0_'+i]=y;
                              K['sizey_'+cx+'-'+i]=y;
                        }
                        if(K['sizex0_'+cx+'-'+i]===undefined){
                              K['sizex0_'+i]=x;
                              K['sizex_'+cx+'-'+i]=x;
                        }
                  }
                  var idmm=cu+'_'+obm.activeslide[cu]+'-'+obm.s_l;
                  obm.bk_create_layer[idmm]=-1;
                  obm.bk_create_layer0[idmm]=-1;
                  obm.createobj.imgsvg(sn,idm,K,tmpdivid,obm,i,0,idmm,obm.activeslide[cu],cu,0);
            };
            img.onerror = function() {
                  for(var cx=0;cx<4;cx++){
                        if(K['sizey0_'+cx+'-'+i]===undefined){
                              K['sizey0_'+i]=200;
                              K['sizey_'+cx+'-'+i]=200;
                        }
                        if(K['sizex0_'+cx+'-'+i]===undefined){
                              K['sizex0_'+i]=300;
                              K['sizex_'+cx+'-'+i]=300;
                        }
                  }
                  obm.createobj.imgsvg(sn,idm,K,tmpdivid,obm,i,0,idmm,obm.activeslide[cu],cu,0);

                  var idmm=cu+'_'+obm.activeslide[cu]+'-'+obm.s_l;
                  obm.bk_create_layer[idmm]=-1;
                  obm.bk_create_layer0[idmm]=-1;
            };
            img.src = K['img1_'+i];
      });


      wb3d_imgsvg_resize=function (id){

            jQuery('#wb3df-'+id ).resizable({handles: 's,es,e',

                  start:function(event,ui){
                        var sn=obm.sn['0-0'];
                        var id1=Number(this.id.split('-')[1]);
                        var cu=0;
                        var id=obm.wb3d_ids[id1];
                        cu=id.split('_')[0]; 
                        id=id.split('_')[1]; 
                        id=id.split('-'); 
                        var fx=id[0];
                        var ex=id[1];
                        var bc=id[2];

                        var B=obm.dataslide[sn][obm.los[sn+'-'+fx]][obm.lo_l[sn+'-'+fx+'-'+ex]];
                        if(B.lock===1){
                              return;
                        }
                        var eff=B['EA_'+obm.d];
                        var frm=obm.pixel_frm[sn+'-'+eff+'-'+obm.framenum['0_'+fx+'-'+ex]];
                        if(wb3d_check_scale(obm,fx,ex,bc,B,eff,frm)===1){
                              return ;                     
                        }

                        obm.tmpsizex=ui.size.width;
                        obm.tmpsizey=ui.size.height;
                  },
                  resize: function( event, ui ) {
                        var sn=obm.sn['0-0'];
                        var id1=Number(this.id.split('-')[1]);
                        var cu=0;
                        var id=obm.wb3d_ids[id1];
                        cu=id.split('_')[0]; 
                        id=id.split('_')[1]; 
                        id=id.split('-'); 
                        var fx=id[0];
                        var ex=id[1];
                        var bc=id[2];

                        var B=obm.dataslide[sn][obm.los[sn+'-'+fx]][obm.lo_l[sn+'-'+fx+'-'+ex]];
                        if(B.lock===1){
                              return;
                        }
                        var eff=B['EA_'+obm.d];
                        var frm=obm.pixel_frm[sn+'-'+eff+'-'+obm.framenum['0_'+fx+'-'+ex]];
                        if(wb3d_check_scale(obm,fx,ex,bc,B,eff,frm)===1){
                              return ;                     
                        }

                        B['sizex_'+obm.d+'-'+bc]=ui.size.width;
                        B['sizey_'+obm.d+'-'+bc]=ui.size.height
                        obm.chenge_details_obj[id1]=0;
                        obm.bk_change_sizew[id1]=-1;
                        obm.bk_change_sizeh[id1]=-1;
                        obm.imgsvg_run[id1]=-1;
                        obm.putimagecanvas();

                  },
                  stop: function( event, ui ) {
                        var id1=Number(this.id.split('-')[1]);
                        setTimeout(function(){
                        obm.putimagecanvas();
                        obm.chenge_details_obj[id1]=-1;
                        obm.bk_change_sizew[id1]=-1;
                        obm.bk_change_sizeh[id1]=-1;
                        obm.imgsvg_run[id1]=-1;
                        },100);
                  } 
            });
      };


      obm.setupobj.imgsvg=function(obm,idm,T,B,wslide,name,y,sn,flag,level){


            obm.size1[idm]=7;

            obm.event_obj[idm]=function (){
            };

            obm.imgsvg_run_first[idm]=-1;
            obm.imgsvg_path[idm]=-1;
            obm.imgsvg_run[idm]=-1;
            obm.scaleX[idm]=1;
	
      		obm.show_obj[idm]=3;

            if(level===0){
                  wb3d_drag_obj('#wb3dg-'+idm);
                  wb3d_imgsvg_resize(idm);
            }

            wb3d_events('wb3dg-'+idm,obm);
      };


      obm.createobj.imgsvg=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){

            var p='position:absolute;';
            var ext2='<div  id="wb3df-'+idm+'" style="'+p+'top:0px;left:0px; height:auto;width:300px;">';
            var textx='';
            if(level===0){
                  textx=wb3d_set_textx(idm);
            }

            var txt='<div id="wb3dg-'+idm+'" style="'+p+'">'+textx+ext2;
		txt+='<div id="wb3de-'+idm+'" style="overflow:hidden;position:absolute">';
            txt+='</div></div></div>';
            jQuery(tmpdivid).append(txt);

            obm.bk_create_layer[l]=-1;
            obm.bk_create_layer0[l]=-1;
            wb3d_reset_obj_xy3(l);

      };



      function wb3d_get_imgsvg(K,i,obm){

            K['type_obj-'+i  ]='imgsvg';
            K['img1_'+i]=jQuery('#imgsvg_upload_link1').val();
            K['x_'+i]=Number(jQuery('#imgsvg_x').val());
            K['y_'+i]=Number(jQuery('#imgsvg_y').val());
            K['eff_'+i]=jQuery('#imgsvg_eff').val();
            K['time_'+i]=jQuery('#imgsvg_speed').val();
            K['click_'+i]=jQuery('#imgsvg_click').val();
            K['rotate_'+i]=jQuery('#imgsvg_rotate').val();

      }



      jQuery('#imgsvg_upload_link1').keyup(function(){
      	jQuery('#imgsvg_upload_img1').attr('src',jQuery('#imgsvg_upload_link1').val());
      });

      jQuery('#imgsvg_upload_button1').click(function(){

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
      		var imgurl =attachment.url;
      		jQuery('#imgsvg_upload_img1').attr('src',imgurl);
      		jQuery('#imgsvg_upload_link1').val(imgurl);

      	});

      	if ( frame ) {
      		frame.open();
      		return;
      	}

      });


      jQuery('#imgsvg_close2').click(function(){
      	jQuery('.wb3d_panel').css('display','none');
      });

}; 