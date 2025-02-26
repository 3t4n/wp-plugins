/**
* Version:     1.0.0
* Author:      Keivan Kamali
*/

wb3d_setupdata.video=function(obm){
      obm.modules['video']=1;
      obm.createobj.video=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){
            var p='position:absolute;';
            var ext2='<div id="wb3df-'+idm+'" style="'+p+'top:0px;left:0px; height:auto;width:300px;">';
            var textx='';
            if(level===0){
                  textx=wb3d_set_textx(idm);
            }
            var txt='<div id="wb3dg-'+idm+'" style="'+p+'">'+textx+ext2;
            var mute,download,control,loop,poster;
            if(B['mute-'+y]===1){
                  mute=' muted ';
            }
            else{
                  mute=' ';
            }

            if(B['download-'+y]!=1){
                  download='controlsList="nodownload"';
            }
            else{
                  download=' ';
            }


            if(B['control-'+y]===1){
                  control=' controls ';
            }
            else{
                  control=' ';
            }

            if(B['loop-'+y]===1){
                  loop=' loop ';
            }
            else{
                  loop=' ';
            }

            if(B['image_'+y]!=''){
                  poster=' poster="'+B["image_"+y]+'" ';
            }
            else{
                  poster=' ';
            }

            var src1=B['video_'+y];
            txt+='<div id="wb3de-'+idm+'" style="overflow:hidden">';
            txt+='<video '+poster+mute+download+control+loop+'  id="wb3d2-'+idm+'" src="'+src1+'"  preload="auto" style=" width:100%;height:100%;position:absolute;top:0px;left:0px;z-index:1;"></video>';
            txt+='</div>';
            txt+='</div>';
            txt+='</div>';
            jQuery(tmpdivid).append(txt);
            obm.bk_create_layer[l]=-1;
            obm.bk_create_layer0[l]=-1;
            wb3d_reset_obj_xy3(l);

      };

      obm.removeobj.video=function(K,idm,y){
            jQuery('#wb3dg-'+idm).empty();
            jQuery('#wb3dg-'+idm).remove();
            wb3d_delete_func_event(idm);
            delete K['type_obj-'+y];
            return 0;
      };
		
      obm.setnewvalue.video=function(){
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#video_div').css('display','');
            jQuery('#video_div').removeClass("wb3d_displaynone");
            jQuery('#video_mute_input').prop('checked', false);
            jQuery('#video_loop_input').prop('checked', false);
            jQuery('#video_download_input').prop('checked', false);
            jQuery('#video_control_input').prop('checked', false);
            jQuery('#video_upload_link1').val('');
            jQuery('#video_upload_link2').val('');
            jQuery('#video_upload_image2').attr('src','');
      };


	
      obm.setvalue.video=function(i,T,K){
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#video_div').css('display','');
            jQuery('#video_div').removeClass("wb3d_displaynone");

            if(K['mute-'+i]===1){
                  jQuery('#video_mute_input').prop('checked', true);
            }
            else{
                  jQuery('#video_mute_input').prop('checked', false);
            }


            if(K['loop-'+i]===1){
                  jQuery('#video_loop_input').prop('checked', true);
            }
            else{
                  jQuery('#video_loop_input').prop('checked', false);
            }

            if(K['download-'+i]===1){
                  jQuery('#video_download_input').prop('checked', true);
            }
            else{
                  jQuery('#video_download_input').prop('checked', false);
            }


            if(K['control-'+i]===1){
                  jQuery('#video_control_input').prop('checked', true);
            }
            else{
                  jQuery('#video_control_input').prop('checked', false);
            }

            jQuery('#video_upload_link1').val(K['video_'+i]);
            jQuery('#video_upload_link2').val(K['image_'+i]);
            jQuery('#video_upload_image2').attr('src',K['image_'+i]);
      };






      wb3d_video_resize=function (id){

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
                        wb3d_change_resize_data(obm,id1);
                  },
                  stop: function( event, ui ) {
                        var id1=this.id.split('-')[1];
                        setTimeout(function(){
                              wb3d_change_resize_data(obm,id1);
                        },100);
                  }  
            });

      };

      jQuery('#video_submit').click(function(){


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
                        obm.removeobj.video(K,idm,i);
                        jQuery('.wb3d_panel').css('display','none');
                        jQuery('#textmenu2').css('display','none');
                  }
            }

            wb3d_get_video(K,i,obm);
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#textmenu2').css('display','none');
            if(obm.U_P[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]!=0){
                  tmpdivid='#wb3de-'+obm.wb3d_id['0_'+obm.activeslide[cu]+'-'+obm.U_P[sn+'-'+obm.activeslide[cu]+'-'+obm.s_l]];
            }
            else{
                  tmpdivid='#wb3dh-'+obm.wb3d_id[cu+'_'+obm.activeslide[cu]];
            }

            obm.createobj.video(sn,idm,K,tmpdivid,obm,i,0,idmm,obm.activeslide[cu],cu,0);
            var idmm=cu+'_'+obm.activeslide[cu]+'-'+obm.s_l;
            obm.bk_create_layer[idmm]=-1;
            obm.bk_create_layer0[idmm]=-1;
      });



      obm.savedata.video=function(zz,z,i,t,T,F,flag,cx,cy,ax,ay){
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

            zz[z][i]['loop-'+t]=F['loop-'+t];
            zz[z][i]['download-'+t]=F['download-'+t];
            zz[z][i]['control-'+t]=F['control-'+t];
            zz[z][i]['mute-'+t]=F['mute-'+t];
            zz[z][i]['video_'+t]=F['video_'+t];
            zz[z][i]['image_'+t]=F['image_'+t];
      };


      obm.setupobj.video=function(obm,idm,T,B,wslide,name,y,sn,flag,level){

            obm.size1[idm]=1;
            obm.newsize[idm]=0;
            obm.show_obj[idm]=3;

            if(level===0){
                  wb3d_drag_obj('#wb3dg-'+idm);
                  wb3d_video_resize(idm);
            }

            wb3d_events('wb3dg-'+idm,obm);
      };



      function wb3d_get_video(K,i,obm){


            K['type_obj-'+i  ]='video';

            for(var cx=0;cx<4;cx++){
                  if(K['sizey_'+cx+'-'+i]==undefined){
                        K['sizey_'+cx+'-'+i]=200;
                  }
                  if(K['sizex_'+cx+'-'+i]==undefined){
                        K['sizex_'+cx+'-'+i]=300;
                  }
            }


            K['video_'+i]=jQuery('#video_upload_link1').val();
            K['image_'+i]=jQuery('#video_upload_link2').val();

            if(jQuery('#video_loop_input').is(':checked')){
                  K['loop-'+i  ]=1;
            }
            else{
                  K['loop-'+i  ]=0;
            }

            if(jQuery('#video_mute_input').is(':checked')){
                  K['mute-'+i  ]=1;
            }
            else{
                  K['mute-'+i  ]=0;
            }

            if(jQuery('#video_download_input').is(':checked')){
                  K['download-'+i  ]=1;
            }
            else{
                  K['download-'+i  ]=0;
            }


            if(jQuery('#video_control_input').is(':checked')){
                  K['control-'+i  ]=1;
            }
            else{
                  K['control-'+i  ]=0;
            }
      }



      jQuery('#video_upload_link2').keyup(function(){
            jQuery('#video_upload_image2').attr('src',jQuery('#video_upload_link2').val());
      });

      jQuery('#video_upload_button1').click(function(){

            event.preventDefault();
            var frame;

            // Create a new media frame
            frame = wp.media({
            title: 'Select or Upload Media Of Your Chosen Persuasion',
            button: {
            text: 'Use this media'
            },
            library: { 
            type: 'video' // limits the frame to show only images
            },
            multiple: false  // Set to true to allow multiple files to be selected
            });

            frame.on( 'select', function() {
            // Get media attachment details from the frame state
            var attachment = frame.state().get('selection').first().toJSON();
            // var imgurl ='..'+attachment.url.split(es_site_url)[1];
            jQuery('#video_upload_link1').val(attachment.url);

            });

            if ( frame ) {
                  frame.open();
                  return;
            }
      });


      jQuery('#video_upload_image').click(function(){

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
                  // Get media attachment details from the frame state
                  var attachment = frame.state().get('selection').first().toJSON();

                  var imgurl =attachment.url;
                  jQuery('#video_upload_image2').attr('src',imgurl);
                  jQuery('#video_upload_link2').val(imgurl);

            });

            if ( frame ) {
                  frame.open();
                  return;
            }

      });
      jQuery('#video_close2').click(function(){
            jQuery('.wb3d_panel').css('display','none');
      });
};