/**
* Author URI:  https://3dwebsitebuilder.com/
* Author : Keivan Kamali
*/
wb3d_setupdata.img=function(obm){

      obm.img_enter=[];
      obm.img_run_first=[];
      obm.img_img2=[];

      obm.removeobj.img=function(K,idm,y){
            jQuery('#wb3dg-'+idm).empty();
            jQuery('#wb3dg-'+idm).remove();
            delete K['type_obj-'+y];
            delete K['img1_'+y];
            delete K['img2_'+y];
            wb3d_delete_func_event(idm);
      };


      obm.setnewvalue.img=function(){
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#img_div').css('display','');
            jQuery('#img_div').removeClass("wb3d_displaynone");
            jQuery('#img_upload_link1').val('');
            jQuery('#img_upload_link2').val('');
            jQuery('#img_upload_img1').attr('src','');
            jQuery('#img_upload_img2').attr('src','');
            jQuery('#img_title').val('');
            jQuery('#img_alt').val('');
      };

      obm.setvalue.img=function(i,T,K){

            jQuery('.wb3d_panel').css('display','none');
            jQuery('#img_div').css('display','');
            jQuery('#img_div').removeClass("wb3d_displaynone");
            jQuery('#img_upload_link1').val(K['img1_'+i]);
            jQuery('#img_upload_link2').val(K['img2_'+i]);
            jQuery('#img_upload_img1').attr('src',K['img1_'+i]);
            jQuery('#img_upload_img2').attr('src',K['img2_'+i]);

            if(K['zoom-'+i]===1){
            	jQuery('#img_zoom_input').prop('checked', true);
            }
            else{
            	jQuery('#img_zoom_input').prop('checked', false);
            }


            if(K['full-'+i]===1){
            	jQuery('#img_full_input').prop('checked', true);
            }
            else{
            	jQuery('#img_full_input').prop('checked', false);
            }

            jQuery('#img_title').val(K['title_'+i]);
            jQuery('#img_alt').val(K['alt_'+i]);

      };


      obm.addon.wb3d_img_run=function(sn,obm,frm,B,eff,wslide,yy,md,w0 ,yy_0,md0,id1,id_l,type_L,wh,ids,idg,cu,level){

            if(obm.img_run_first[id1]!=1){
                  if(B['img1_'+md]!=B['img2_'+md]&&B['img2_'+md]!=''){
                        document.getElementById('wb3dimg-'+id1).src=B['img2_'+md];
                  }
                  obm.img_run_first[id1]=1;
            }

            if(obm.img_img2[id1]!=1){
                  if(B['img1_'+md]!=B['img2_'+md]&&B['img2_'+md]!=''){
                        if(document.getElementById('wb3dimg23-'+id1)!=null){
                              if(document.getElementById('wb3dimg23-'+id1).src!=B['img2_'+md]){
                                    document.getElementById('wb3dimg23-'+id1).src=B['img2_'+md];
                                    obm.img_img2[id1]=1;
                              }
                        }
                  }
            }
      };


      obm.savedata.img=function(zz,z,i,t,T,F,flag,cx,cy,ax,ay){
			
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
            zz[z][i]['full-'+t]=F['full-'+t];
            zz[z][i]['zoom-'+t]=F['zoom-'+t];
            zz[z][i]['img1_'+t]=F['img1_'+t];
            zz[z][i]['img2_'+t]=F['img2_'+t];
            zz[z][i]['title_'+t]=F['title_'+t];
            zz[z][i]['alt_'+t]=F['alt_'+t];
	};


      jQuery('#img_submit').click(function(){
            var cu=0;
            var tmpdivid;
            var sn=obm.sn['0-0'];
            var i,idm,K;
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
                        obm.removeobj.img(K,idm,i);
                  }
            }

            wb3d_get_img(K,i,obm);
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
                  	if(K['sizey_'+cx+'-'+i]===undefined){
                        	K['sizey_'+cx+'-'+i]=y;
                  	}
                        if(K['sizex_'+cx+'-'+i]===undefined){
                        	K['sizex_'+cx+'-'+i]=x;
                        }
                  }
                  var idmm=cu+'_'+obm.activeslide[cu]+'-'+obm.s_l;
                  obm.bk_create_layer[idmm]=-1;
                  obm.bk_create_layer0[idmm]=-1;
                  obm.createobj.img(sn,idm,K,tmpdivid,obm,i,0,idmm,obm.activeslide[cu],cu,0);
            };
            img.onerror = function() {
                  for(var cx=0;cx<4;cx++){
                  	if(K['sizey_'+cx+'-'+i]===undefined){
                        	K['sizey_'+cx+'-'+i]=200;
                  	}
                        if(K['sizex_'+cx+'-'+i]===undefined){
                        	K['sizex_'+cx+'-'+i]=300;
                        }
                  }
                  obm.createobj.img(sn,idm,K,tmpdivid,obm,i,0,idmm,obm.activeslide[cu],cu,0);

                  var idmm=cu+'_'+obm.activeslide[cu]+'-'+obm.s_l;
                  obm.bk_create_layer[idmm]=-1;
                  obm.bk_create_layer0[idmm]=-1;
            };
            img.src = K['img1_'+i];
      });


      wb3d_img_resize=function (id){

            jQuery('#wb3df-'+id ).resizable({handles: 's,e,se',

                  start:function(event,ui){

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
                        B['sizey_'+obm.d+'-'+bc]=ui.size.height;
                        obm.chenge_details_obj[id1]=0;
                        obm.bk_change_sizew[id1]=-1;
                        obm.bk_change_sizeh[id1]=-1;
                        obm.putimagecanvas();

                  },
                  stop: function( event, ui ) {
                        var id1=Number(this.id.split('-')[1]);
                        setTimeout(function(){
                        obm.putimagecanvas();
                        obm.chenge_details_obj[id1]=-1;
                        obm.bk_change_sizew[id1]=-1;
                        obm.bk_change_sizeh[id1]=-1;
                        },100);
                  } 
            });
      };


      obm.setupobj.img=function(obm,idm,T,B,wslide,name,y,sn,flag,level){


            obm.size1[idm]=1;
            obm.img_enter[idm]=-1;

            obm.mouseenter_obj[idm]=function (e,id,K,i){

                  if(obm.img_enter[id]!=1&&K['zoom-'+i]===1){
                        var src=jQuery('#wb3dimg-'+id).attr('src');
                        var title=' title="'+K['title_'+i]+'" ';
                        var alt=' alt="'+K['alt_'+i]+'" ';

                        var txt='<div id="wb3dg3-'+id+'" style="overflow:hidden;position:absolute;width:100%;height:100%;" >';
                        txt+='<img '+title+alt+' id="wb3dimg23-'+id+'" src="'+src+'" style=" width:100%;height:100%;position:absolute;top:0px;left:0px;z-index:100;"/></div>';
                        jQuery('#wb3de-'+id).append(txt);
                        obm.img_enter[id]=1;
                        obm.chenge_details_obj[id]=-1;
                        jQuery('#wb3dimg-'+id).css('display',"none") ;
                  }
                  else if(obm.img_enter[id]===1){
                        jQuery('#wb3dg3-'+id).css('display',"") ;
                        jQuery('#wb3dimg-'+id).css('display',"none") ;
                        jQuery('#wb3dimg23-'+id).css('width',document.getElementById('wb3dg3-'+id).offsetWidth); 
                        jQuery('#wb3dimg23-'+id).css('height',document.getElementById('wb3dg3-'+id).offsetHeight) ;
                  }
            };




            obm.mouseleave_obj[idm]=function (e,id,F,modd){

                  if(obm.img_enter[id]===1){
                        jQuery('#wb3dimg23-'+id).css('top','0px'); 
                        jQuery('#wb3dimg23-'+id).css('left','0px'); 
                        jQuery('#wb3dimg23-'+id).css('width',document.getElementById('wb3dg3-'+id).offsetWidth); 
                        jQuery('#wb3dimg23-'+id).css('height',document.getElementById('wb3dg3-'+id).offsetHeight); 
                        jQuery('#wb3dg3-'+id).css('display',"none") ;
                        jQuery('#wb3dimg-'+id).css('display',"") ;
                  }
            };
            obm.event_obj[idm]=function (){
            };

            obm.mousemove_obj[idm]=function (e,id1,F,modd,sn){

                  if(obm.img_enter[id1]===1){

                        var a=document.getElementById('wb3dg-'+id1);
                        var w0=document.getElementById('wb3df-'+id1).offsetWidth;
                        var h0=document.getElementById('wb3df-'+id1).offsetHeight;

                        jQuery('#wb3dimg23-'+id1).css('width',w0*3);
                        jQuery('#wb3dimg23-'+id1).css('height',h0*3);

                        var id=obm.wb3d_ids[id1];
                        var frm,eff;
                        var cu=id.split('_')[0];
                        id=id.split('_')[1];

                        if(obm.cu!=cu){
                              return;
                        }
                        id=id.split('-');

                        var fx=id[0];
                        var ex=id[1];
                        var bc=id[2];

                        var fg=id[3];
                        var fh=id[4];
                        var tx,ty;

                        sn=obm.sn[cu+'-0'];
                        var B=obm.dataslide[sn][obm.los[sn+'-'+fx]][obm.lo_l[sn+'-'+fx+'-'+ex]];
                        if(id[3]===undefined){
                              id=fx+'-'+ex+'-'+bc;
                              eff=B['EA_'+obm.d];
                              frm=obm.pixel_frm[sn+'-'+eff+'-'+obm.framenum[cu+'_'+fx+'-'+ex]];
                        }
                        else{
                              sn=B['slider_'+modd];
                              B=obm.dataslide[sn][obm.los[sn+'-'+fg]][obm.lo_l[sn+'-'+fg+'-'+fh]];
                              id=cu+'_'+fx+'-'+ex+'-'+bc+'-'+fg+'-'+fh;
                              eff=B['EA_'+obm.d];
                              frm=obm.pixel_frm[sn+'-'+eff+'-'+obm.framenum[id]];
                        }

                        tx=1;
                        ty=1;
                        if(eff!=-1){
                              var gs=obm.gs;

                              if(gs[sn][eff].E[0][17]!=0){
                                    tx=gs[sn][eff].E[17][frm]/1000;
                              }
                              if(gs[sn][eff].E[0][18]!=0){
                                    ty=gs[0][eff].E[18][frm]/1000;
                              }
                        }

                        var rect =a.getBoundingClientRect();
                        var x =e.clientX - rect.left;
                        var y = e.clientY - rect.top;
                        var w=x-((x/w0)*w0*3);
                        var h=y-((y/h0)*h0*3);
                        document.getElementById('wb3dimg23-'+id1).style.left=(w/tx)+'px';
                        document.getElementById('wb3dimg23-'+id1).style.top=(h/ty)+'px';
                  }
            };


	
      	obm.show_obj[idm]=3;
            if(document.getElementById('wb3dfullscrean-'+idm)!=null){
                  document.getElementById('wb3dfullscrean-'+idm).addEventListener('click', function(){
                        var x=document.getElementById('wb3dimg-'+this.id.split('-')[1]).src;
                        document.getElementById('wb3d_fullscrean_img').src=x;
                        document.getElementById('wb3d_fullscrean').style.display='flex';
                  });
            }

            if(level===0){
                  wb3d_drag_obj('#wb3dg-'+idm);
                  wb3d_img_resize(idm);
            }

            wb3d_events('wb3dg-'+idm,obm);
      };


      obm.createobj.img=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){

            var p='position:absolute;';
            var ext2='<div  id="wb3df-'+idm+'" style="'+p+'top:0px;left:0px; height:auto;width:300px;">';
            var textx='';
            if(level===0){
                  textx=wb3d_set_textx(idm);
            }

            var txt='<div id="wb3dg-'+idm+'" style="'+p+'">'+textx+ext2;

            if(B['full-'+y]){
                  txt+='<div id="wb3dfullscrean-'+idm+'" class="pointer imgbuttom"  style="background-image: url('+wb3d.wb3d_plagin_URL+'/includes/img/images/full.png);background-size: 100% 100%;position:absolute;top:5px;left:5px;z-index:110;width:14px;height:14px"></div>';   
            }

            var src1=B['img1_'+y];
            var title=' title="'+B['title_'+y]+'" ';
            var alt=' alt="'+B['alt_'+y]+'" ';

            txt+='<div id="wb3de-'+idm+'" style="overflow:hidden;position:absolute">';
            txt+='<img '+title+alt+' id="wb3dimg-'+idm+'" src="'+src1+'"  style=" width:100%;height:100%;position:absolute;top:0px;left:0px;z-index:1;"/>';
            txt+='</div></div></div>';
            jQuery(tmpdivid).append(txt);

            obm.bk_create_layer[l]=-1;
            obm.bk_create_layer0[l]=-1;
            wb3d_reset_obj_xy3(l);

      };



      function wb3d_get_img(K,i,obm){

            K['type_obj-'+i  ]='img';

            if(jQuery('#img_full_input').is(':checked')){
                  K['full-'+i  ]=1;
            }
            else{
                  K['full-'+i  ]=0;
            }


            if(jQuery('#img_zoom_input').is(':checked')){
                  K['zoom-'+i  ]=1;
            }
            else{
                  K['zoom-'+i  ]=0;
            }

            K['img1_'+i]=jQuery('#img_upload_link1').val();
            K['img2_'+i]=jQuery('#img_upload_link2').val();
            K['title_'+i]=jQuery('#img_title').val();
            K['alt_'+i]=jQuery('#img_alt').val();

      }



      jQuery('#img_upload_link1').keyup(function(){
      	jQuery('#img_upload_img1').attr('src',jQuery('#img_upload_link1').val());
      });

      jQuery('#img_upload_link2').keyup(function(){
      	jQuery('#img_upload_img2').attr('src',jQuery('#img_upload_link2').val());
      });

      jQuery('#img_upload_button1').click(function(){

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
      		jQuery('#img_upload_img1').attr('src',imgurl);
      		jQuery('#img_upload_link1').val(imgurl);

      	});

      	if ( frame ) {
      		frame.open();
      		return;
      	}

      });


      jQuery('#img_upload_button2').click(function(){

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
      		// Get media attachment details 
      		var attachment = frame.state().get('selection').first().toJSON();
      		var imgurl =attachment.url;
      		jQuery('#img_upload_img2').attr('src',imgurl);
      		jQuery('#img_upload_link2').val(imgurl);
      	});

      	if ( frame ) {
      		frame.open();
      		return;
      	}
      });


      jQuery('#img_close2').click(function(){
      	jQuery('.wb3d_panel').css('display','none');
      });

}; 