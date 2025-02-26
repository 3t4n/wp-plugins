/**
* Author URI:  https://3dwebsitebuilder.com/
* Author : Keivan Kamali
*/

// Close Fullscreen 
jQuery('#wb3d_fullscrean').click(function(){
	jQuery('#wb3d_fullscrean_img').attr('src','');
	jQuery('#wb3d_fullscrean').css('display','none');
});


jQuery('#wb3ddemom').click(function(){
      if (confirm(jQuery('#wb3d_prodemo').text()) == true) {
            var anchor = document.createElement('a');
            anchor.href = 'https://3dwebsitebuilder.com/price';
            anchor.target="_blank";
            anchor.click();
      }
});
jQuery('#wb3ddemomb').click(function(){
      if (confirm(jQuery('#wb3d_prodemo').text()) == true) {
            var anchor = document.createElement('a');
            anchor.href = 'https://3dwebsitebuilder.com/price';
            anchor.target="_blank";
            anchor.click();
      }
});
jQuery('#div_pressKey').css("display","none");
jQuery('#div_gettime3').css("display","none");
jQuery('#div_gettime4').css("display","none");
jQuery('#div_gettime5').css("display","none");
jQuery('#div_distance').css("display","none");
jQuery('#div_pressKey2').css("display","none");
jQuery('#div_pressKey2_b').css("display","none");
jQuery('#div_pressKey2_c').css("display","none");
jQuery('#p_getttoken_numX').css("display","none");
jQuery('#p_getact_link').css("display","none");
jQuery('#p_token_effect').css("display","none");
jQuery('#p_token_effect2').css("display","none");
jQuery('#p_token_effect3').css("display","none");
jQuery('#neweffect_empty').css("display","none");
jQuery('.editeffect_label').css("display","none");
jQuery('#getttoken3').css("display","none");
jQuery('.editeffect').removeClass("wb3d_displaynone");
jQuery('.editeffect').css("display","none");
jQuery('.container-fluid').removeClass("wb3d_displaynone");
jQuery('.editeObj').removeClass("wb3d_displaynone");
jQuery('.editeObj').css("display","none");




// Set Scroll Handle (Left Menu)
function wb3d_scroll_tab_leftmenu(flag, obm){


      jQuery('#wb3d_panel').removeClass("wb3d_displaynone");
      var h1,h2,x;
      obm.tab_leftmenu=flag;

      if(obm.tab_leftmenu==='object_menu'){
            h1=jQuery('#object_menu').height();
            h2=jQuery('#div_layerc').height();
            x=0;
      }
      else  if(obm.tab_leftmenu==='object2_menu'){
            h1=jQuery('#slide_menu').height();
            h2=jQuery('#object2_menu_sub').height()+100;
            x=0;
      }
      else  if(obm.tab_leftmenu==='setting2_menu'){
            h2=jQuery('#setting2_menu').height();
            h1=jQuery('#div_setting2_menu').height();
            x=0;
      }
      else  if(obm.tab_leftmenu==='element_menu'){
            h1=jQuery('#element_menu').height();
            h2=jQuery('#div_element_menu').height()+80;
            x=0;
      }
      else if(obm.tab_leftmenu==='slide_menu'||obm.tab_leftmenu=='div_layers_menu'){
            h1=jQuery('#slide_menu').height();
            h2=jQuery('#layers_menu3').height()+250;
            x=0;
      }
      else if(obm.tab_leftmenu==='effect_menu'){
            h1=jQuery('#effect_menu').height();
            h2=jQuery('#div_effect_menu').height();
            x=0;
      }
      else{
            return;
      }

      var scr=h2-h1+x;
      if(scr<0){
            scr=0;
      }
      x=(h1*h1)/(h1+scr);
      jQuery('#slider_h1').height(x);
      var z=Number(h1-x);
      if(z<1){
            z=1;
      }
      z=scr/z;
      obm.z_scroll_leftmenu=z;
}


function wb3d_functionsjs_load(obm){

      jQuery('.myColorPicker').colorPickerByGiro({
            preview: '.myColorPicker-preview'
      });
      jQuery('.cpBG').css("opacity",1);
      jQuery('.cpBG').css("display","none");
      jQuery('.cpBG').draggable();
      jQuery('.form-control').bind('input', function() {
            wb3d_get_color();
      });

      jQuery('#maindiv_g').click(function(){
                  if (confirm(jQuery('#wb3d_install_pro').text()) == true) {
                        obm.flagE=1;
                        wb3d_Save_All_Data(obm,2);
                  }
      });
      jQuery('#maindiv_g2').click(function(){
            if (confirm(jQuery('#wb3d_install_pro').text()) == true) {
                  obm.flagE=1;
                  wb3d_Save_All_Data(obm,2);
            }
      });



	// Add New new Layer Object
	jQuery('#new_layers_object').click(function(){
            if(obm.s_l===-1){
                  alert(jQuery('#wb3d_id_alert1').text());
                  return;
            }
            jQuery('.wb3d_panel').css('display','none');
            jQuery('#textmenu2').css('display','');
            obm.new_layer=2;
	});


	// Add New Layer 
      // jQuery('#add_new_layer').click(function(){
            // obm.new_layer=1;
            // jQuery('.wb3d_panel').css('display','none');
            // jQuery('#textmenu2').css('display','');
      // });


	wb3d_new_layerB=function(flag){
            var K,id,j;
            var sn=obm.sn['0-0'];
            if(typeof(wb3d_remove_all_effect_token) === "function"){
                  wb3d_remove_all_effect_token(obm.activeslide[obm.cu],obm);
            }
            
            obm.dataslide[sn][obm.los[sn+'-'+obm.activeslide[obm.cu]]   ][obm.layers[sn+'-'+obm.activeslide[obm.cu]]]={};

            if(obm.new_layer===1){
                  for(j=1;j<=obm.layers[sn+'-'+obm.activeslide[obm.cu]];j++){
                        if(jQuery('#li-'+obm.activeslide[obm.cu]+'-'+j).length===0){
                              break;
                        }
                  }
                  obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+j]=obm.layers[sn+'-'+obm.activeslide[obm.cu]];
                  obm.la_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.layers[sn+'-'+obm.activeslide[obm.cu]]]=j.toString();
                  K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.layers[sn+'-'+obm.activeslide[obm.cu]]];
                  K.ind=j;
                  K.loc=obm.layers[sn+'-'+obm.activeslide[obm.cu]];
                  obm.s_l=j.toString();
                  obm.s_o=0;
                  obm.i=0;
                  K.layer_obj=0;
                  wb3d_set_new_layer(obm.activeslide[obm.cu],j,obm.layers[sn+'-'+obm.activeslide[obm.cu]]);
                  K.obj_num_0=0;
                  wb3d_createlayer(0,obm.activeslide[obm.cu],(obm.layers[sn+'-'+obm.activeslide[obm.cu]]-1),obm.dataslide[sn][obm.los[sn+'-'+obm.activeslide[obm.cu]]   ],'new',obm.effect_of_location[sn+'-'+0],0,sn,0,0,0,obm);    

            }
            else if(obm.new_layer===2){
                  K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
                  id=-1;
                  for(var i=0;i<=K.layer_obj;i++){
                        id=-1;
                        for(j=0;j<K.layer_obj;j++){
                              if(K['obj_num_'+j]===i){
                                    id=i;
                                    break;
                              }       
                        }
                        if(id===-1){
                              break;
                        }
                  }
                  obm.s_o=i;
                  obm.i=i;
                  K['obj_num_'+K.layer_obj]=obm.s_o;
                  K.layer_obj++;
            }
            wb3d_create_id('0_'+obm.activeslide[obm.cu]+'-'+obm.s_l+'-'+obm.s_o,obm);
            var idmm='0_'+obm.activeslide[obm.cu]+'-'+obm.s_l;
            obm.bk_create_layer[idmm]=1;
            wb3d_new_layerC(flag);
      };

      wb3d_new_layerC=function(flag){ 
            setTimeout(function(){
                  if(typeof(wb3d_create_all_layer_token) === "function"){
                        wb3d_create_all_layer_token(obm.activeslide[obm.cu],obm);
                  }
                  if(flag!=1){
                        wb3d_set_slide_value(obm.activeslide[obm.cu],1,obm);
                  }
                  obm.putimagecanvas();
            },1200);
            wb3d_scroll_tab_leftmenu('div_layers_menu',obm);
      };


      wb3d_delete_func_event=function(idm){
            delete obm.mouseenter_obj[idm];
            delete obm.mousedown_obj[idm];
            delete obm.mouseleave_obj[idm];
            delete obm.mousemove_obj[idm];
            delete obm.mouseup_obj[idm];
            delete obm.event_obj[idm];
      };



      //Up Button
      jQuery('#up').mousedown(function(){
            obm.drag_slide=1;
            if(obm.top>=-99998){
                  obm.tr=1;
                  obm.zr=1;
                  obm.top-=obm.tr;
                  obm.down=0-obm.top;
                  // jQuery('#uptext').val(obm.top);
                  // jQuery('#downtext').val(obm.down);
                  obm.mouseup=0;
                  wb3d_up();
            }
      });



      //function Up Button
      function wb3d_up(){
            if(obm.top-obm.tr>=-99999){
                  if(obm.zr>7){
                        obm.top-=obm.tr;
                  }
                  obm.zr++;
                  obm.down=0-obm.top;
                  if(obm.zr%25===0){
                        obm.tr*=3;
                  }
            }
            else{
                  obm.top=-99999;
                  obm.down=0-obm.top;
            }
            // jQuery('#uptext').val(obm.top);
            // jQuery('#downtext').val(obm.down);
            obm.putimagecanvas();
            if(obm.mouseup===1){
                  return 0;
            }
            else{
                  setTimeout(wb3d_up,40);
            }
      }


      //Down Button
      jQuery('#down').mousedown(function(){
            obm.drag_slide=1;
            if(obm.top<=99998){
                  obm.tr=1;
                  obm.zr=1;
                  obm.top+=obm.tr;
                  obm.down=0-obm.top;
                  // jQuery('#uptext').val(obm.top);
                  // jQuery('#downtext').val(obm.down);
                  obm.mouseup=0;
                  wb3d_down();
            }
      });


      //Left Button
      jQuery('#left').mousedown(function(){
            obm.drag_slide=1;
            if(obm.left>=-99998){
                  obm.tr=1;
                  obm.zr=1;
                  obm.left-=obm.tr;
                  obm.down=-obm.left;
                  obm.mouseup=0;
                  // jQuery('#lefttext').val(obm.left);
                  // jQuery('#righttext').val(obm.right);
                  wb3d_left();
            }
      });


      //Right Button
      jQuery('#right').mousedown(function(){
            obm.drag_slide=1;
            if(obm.left<=9998){
                  obm.tr=1;
                  obm.zr=1;
                  obm.left+=obm.tr;
                  obm.right=-obm.left;
                  obm.mouseup=0;
                  // jQuery('#lefttext').val(obm.left);
                  // jQuery('#righttext').val(obm.right);
                  wb3d_right();
            }
      });



      //function Down Button
      function wb3d_down(){
            if(obm.top+obm.tr<=99999){
                  if(obm.zr>7){
                        obm.top+=obm.tr;
                  }
                  obm.zr++;
                  obm.down=0-obm.top;
                  if(obm.zr%25===0){
                        obm.tr*=3;
                  }
            }
            else{
                  obm.top=99999;
                  obm.down=0-obm.top;
            }

            // jQuery('#uptext').val(obm.top);
            // jQuery('#downtext').val(obm.down);
            obm.putimagecanvas();
            if(obm.mouseup===1){
                  return 0;
            }
            else{
                  setTimeout(wb3d_down,40);
            }
      }



      //function Left Button
      function wb3d_left(){
            if(obm.left-obm.tr>=-99999){
                  if(obm.zr>7){
                        obm.left-=obm.tr;
                  }
                  obm.zr++;
                  obm.right=0-obm.left;
                  if(obm.zr%25===0){
                        obm.tr*=3;
                  }
            }
            else{
                  obm.left=-99999;
                  obm.right=0-obm.left;
            } 
            // jQuery('#lefttext').val(obm.left);
            // jQuery('#righttext').val(obm.right);
            obm.putimagecanvas();
            if(obm.mouseup===1){
                  return 0;
            }
            else{
                  setTimeout(wb3d_left,40);
            }
      }

      //function Right Button
      function wb3d_right(){
            if(obm.left+obm.tr<=9999){
                  if(obm.zr>7){
                        obm.left+=Number(obm.tr);
                  }
                  obm.zr++;
                  obm.right=Number(0)-Number(obm.left);
                  if(obm.zr%25===0){
                        obm.tr*=3;
                  }
            }
            else{
                  obm.left=9999;
                  obm.right=Number(0)-Number(obm.left);
            }   
            // jQuery('#lefttext').val(obm.left);
            // jQuery('#righttext').val(obm.right);
            obm.putimagecanvas();
            if(obm.mouseup===1){
                  return 0;
            }
            else{
                  setTimeout(wb3d_right,40);
            }
      }

      //Reset Button
      jQuery('#reset').click(function(){
            // jQuery('#uptext').val(0);
            // jQuery('#downtext').val(0);
            // jQuery('#lefttext').val(0);
            // jQuery('#righttext').val(0);
            obm.left=0;
            obm.top=0;
            obm.mouseup=1;
            obm.putimagecanvas();
      });
	jQuery('.wb3d_tab').css('display','none'); 
	jQuery('#slide_menu').css('display',''); 

      // Tab Objects B
      jQuery('#tab_object2').click(function(e) {
            textmenuhide2();
            obm.new_layer=0;
            // jQuery('#div_layerc').css('display','none'); 
            jQuery('#div_layers_menu').css('display','none'); 
            jQuery('#object_menu').css('display','none'); 
            jQuery('#layers_menu').css('display','none'); 

            jQuery('#tab_object2').css('background-color','#8fa0ed');
            jQuery('#tab_layers').css('background-color','#a3cbf3');
            // jQuery('#tab_update').css('display','none'); 
            
            // jQuery('#object2_menu_sub').css('display','');
            jQuery('#object2_menu').css('display','');
            // jQuery('#es_menu').css('background-color','#9087b7');
            // jQuery('#Menu_left').css('background-color','#9087b7');
            wb3d_scroll_tab_leftmenu('object2_menu',obm);
      });

      // Tab Layer
      jQuery('#tab_layers').click(function(e) {
            textmenuhide2();
            obm.new_layer=0;
            // jQuery('#div_layerc').css('display','none');
           jQuery('#object2_menu').css('display','none');
           jQuery('#object_menu').css('display','none');
            jQuery('#layers_menu').css('display','');
            jQuery('#div_layers_menu').css('display',''); 

            jQuery('#tab_layers').css('background-color','#8fa0ed');
            jQuery('#tab_object2').css('background-color','#a3cbf3');
            // jQuery('#tab_update').css('display','none'); 
            // jQuery('#es_menu').css('background-color','#0093a4');
            // jQuery('#Menu_left').css('background-color','#0093a4');
            wb3d_scroll_tab_leftmenu('div_layers_menu',obm);
      });


      // Tab Slide
      jQuery('#tab_setting2').click(function(e) {
            textmenuhide2();
            obm.new_layer=0;
            jQuery('.wb3d_tab').css('display','none');
            // jQuery('#es_menu').css('background-color','#a6abbc');
            // jQuery('#tab_update').css('display','none'); 
            // jQuery('#Menu_left').css('background-color','#a6abbc');
            jQuery('#div_setting2_menu').css('display','');
            wb3d_scroll_tab_leftmenu('setting2_menu',obm);

            jQuery('#tab_setting2').css('background-color','#aab9ff');
            jQuery('#tab_element').css('background-color','#a3cbf3');
            jQuery('#tab_effect').css('background-color','#a3cbf3');
            jQuery('#tab_slide').css('background-color','#a3cbf3');
      });

      // Tab Slide
      jQuery('#tab_slide').click(function(e) {
            textmenuhide2();
            obm.new_layer=0;
            jQuery('.wb3d_tab').css('display','none');
            // jQuery('#tab_update').css('display','none'); 
            
            jQuery('#tab_slide').css('background-color','#aab9ff');
            jQuery('#tab_element').css('background-color','#a3cbf3');
            jQuery('#tab_effect').css('background-color','#a3cbf3');
            jQuery('#tab_setting2').css('background-color','#a3cbf3');

            jQuery('#tab_layers').css('background-color','#8fa0ed');
            jQuery('#tab_object2').css('background-color','#a3cbf3');


           jQuery('#object2_menu').css('display','none');
           jQuery('#object_menu').css('display','none');
            jQuery('#layers_menu').css('display','');
            jQuery('#div_layers_menu').css('display',''); 

            // jQuery('#es_menu').css('background-color','#a6abbc');
            // jQuery('#Menu_left').css('background-color','#a6abbc');
            jQuery('#slide_menu').css('display','');
            wb3d_scroll_tab_leftmenu('slide_menu',obm);
            jQuery('#tab_layers').click();
      });

      // Tab Slide
      jQuery('#tab_effect').click(function(e) {
            jQuery('.wb3d_tab').css('display','none');
            textmenuhide2();
            obm.new_layer=0;
            // jQuery('#es_menu').css('background-color','#a6abbc');
            // jQuery('#tab_update').css('display','none'); 
            jQuery('#tab_effect').css('background-color','#aab9ff');
            jQuery('#tab_element').css('background-color','#a3cbf3');
            jQuery('#tab_slide').css('background-color','#a3cbf3');
            jQuery('#tab_setting2').css('background-color','#a3cbf3');

            jQuery('#div_effect_menu').css('display',''); 

            // jQuery('#Menu_left').css('background-color','#a6abbc');
            jQuery('#effect_menu').css('display','');
            wb3d_scroll_tab_leftmenu('effect_menu',obm);
      });

      // Tab Slide
      jQuery('#tab_element').click(function(e) {
            textmenuhide2();
            obm.new_layer=0;
            jQuery('.wb3d_tab').css('display','none');
            // jQuery('#es_menu').css('background-color','#a6abbc');
            // jQuery('#tab_element').css('background-color','#aab9ff');
            // jQuery('#tab_update').css('display','none'); 
            // jQuery('#Menu_left').css('background-color','#a6abbc');
            // jQuery('#element_menu').css('display','');
            jQuery('#tab_element').css('background-color','#aab9ff');
            jQuery('#tab_setting2').css('background-color','#a3cbf3');
            jQuery('#tab_effect').css('background-color','#a3cbf3');
            jQuery('#tab_slide').css('background-color','#a3cbf3');

            jQuery('#element_menu').css('display','');
            wb3d_scroll_tab_leftmenu('element_menu',obm);
      });


      jQuery("#canvas_relative").change(function(){
            wb3d_change_canvas(Number(this.value));
      });
      
      jQuery("#inactive").change(function(){
            if(jQuery('#inactive').is(':checked')===true){
                  obm.inactiveRange=1;
            }
            else{
                  obm.inactiveRange=0;                  
            }
      });
      jQuery("#canvas_relative").keyup(function(){
            wb3d_change_canvas(Number(this.value));
      });


      wb3d_change_canvas=function(){
            obm.maxcanvas=Number(jQuery('#canvas_relative').val());
            obm.putimagecanvas();
      };

      jQuery('#canvas_checkbox').change(function(){
            var r,g,b,a;
            var sn=obm.sn['0-0'];
            r=obm.setting[sn].r1;
            g=obm.setting[sn].g1;
            b=obm.setting[sn].b1;
            a=obm.setting[sn].a1;
            obm.canvascheckbox=0;
            obm.chenge_display=[];
            obm.chenge_details_obj=[];
            obm.chenge_details_obj2=[];
            if(jQuery('#canvas_checkbox').is(':checked')===true){
                  obm.canvascheckbox=1;
            }
            setTimeout(function(){
                  obm.putimagecanvas();
            },200);
      });

      //change Layer effect
      jQuery('#effect_0').change(function(){
            var id=obm.d;
            var sn=obm.sn['0-0'];
            var F=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            if(typeof(wb3d_remove_all_effect_token) === "function"){
                  wb3d_remove_all_effect_token(obm.activeslide[obm.cu],obm);
            }
            var eff=jQuery('#effect_0').val();
            if(eff==-1){
                  F['EA_'+id]=eff;
                  F['EB_'+id]=F['EA_'+id];
                  return;
            }
            var obj=obm.gs[sn][eff];
            if(obj.max_p!=0){
                  F['EA_'+id]=eff;
                  F['EB_'+id]=F['EA_'+id];
                  if(typeof(wb3d_create_all_layer_token) === "function"){
                        wb3d_create_all_layer_token(obm.activeslide[obm.cu],obm);
                  }
                  obm.chenge_details_obj=[];
                  
            }
            else{
                  alert(jQuery('#alert_emptyEffect').text());
                  jQuery('#effect_0').val(F['EA_'+id]);
            }

            obm.bk_radius=[];
            obm.chenge_details_obj=[];
            obm.chenge_details_obj2=[];
            obm.bk_border=[];
            obm.bk_change_sizew=[];
            obm.bk_change_sizeh=[];
            obm.bk_bg=[];
            obm.bk_shadow_box=[];
            obm.bk_tshadow=[];
            obm.bk_transform1=[];
            obm.bk_transform2=[];
            obm.bk_color=[];
            obm.bk_border=[];
            obm.bk_letterspacing=[];
            obm.bk_op=[];
            obm.bk_classobj=[];
            obm.bk_zindex=[];
            obm.putimagecanvas();
      });


      //change Move on Effect Status
      jQuery('#noxy').change(function(){
            var id=obm.d;
            var sn=obm.sn['0-0'];
            var F=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            F['noxy'+id]=Number(jQuery('#noxy').val());
            obm.chenge_details_obj=[];
            obm.putimagecanvas();
      });


      jQuery('input[type=radio][name=es_mode]').change(function() {
            obm.canvas3=Number(this.value);
            obm.putimagecanvas();
      });

      jQuery("#x_right_menu").change(function(){
            wb3d_set_x_obj(Number(this.value));
      });
      jQuery("#x_right_menu").keyup(function(){
            wb3d_set_x_obj(Number(this.value));
      });


      //Change Left Object
      wb3d_set_x_obj=function(x){
            var sn=obm.sn['0-0'];
            obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]]['PX_'+obm.d]=Number(x);
            obm.bk_vscroll_id1=[];
            obm.chenge_details_obj=[];
            obm.chenge_details_obj2=[];
            wb3d_reset_obj_xy3();
            obm.putimagecanvas();
      };


      jQuery("#y_right_menu").change(function(){
            wb3d_set_y_obj(Number(this.value));
      });
      jQuery("#y_right_menu").keyup(function(){
            wb3d_set_y_obj(Number(this.value));
      });


      //Change Left Object
      wb3d_set_y_obj=function(x){
            var sn=obm.sn['0-0'];
            obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]]['PY_'+obm.d]=Number(x);
            obm.bk_vscroll_id1=[];
            obm.chenge_details_obj=[];
            obm.chenge_details_obj2=[];
            wb3d_reset_obj_xy3();
            obm.putimagecanvas();
      };


      jQuery("#w_right_menu").change(function(){
            wb3d_set_w_obj(Number(this.value));
      });
      jQuery("#w_right_menu").keyup(function(){
            wb3d_set_w_obj(Number(this.value));
      });

      //Change Object Width
      wb3d_set_w_obj=function(x){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K['sizex_'+obm.d+'-'+obm.s_o]=Number(x);
            setTimeout(function(){
                  obm.bk_vscroll_id2=[];
                  obm.bk_vscroll_id1=[];
                  obm.chenge_details_obj2=[];
                  obm.chenge_details_obj=[];
                  obm.bk_transform2=[];
                  obm.bk_responsive=[];
                  wb3d_reset_data_slider();
            },200);
            obm.putimagecanvas();
      };


      jQuery("#h_right_menu").change(function(){
            wb3d_set_h_obj(Number(this.value));
      });
      jQuery("#h_right_menu").keyup(function(){
            wb3d_set_h_obj(Number(this.value));
      });



      //Change Object Height
      wb3d_set_h_obj=function (y){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K['sizey_'+obm.d+'-'+obm.s_o]=Number(y);
            setTimeout(function(){
                  obm.bk_vscroll_id2=[];
                  obm.bk_vscroll_id1=[];
                  obm.chenge_details_obj2=[];
                  obm.chenge_details_obj=[];
                  obm.bk_transform2=[];
                  obm.bk_responsive=[];
                  wb3d_reset_data_slider();
            },200);
            obm.putimagecanvas();
      };


      jQuery("#wheel").change(function(){
            wb3d_wheel(Number(this.value));
      });
      jQuery("#wheel").keyup(function(){
            wb3d_wheel(Number(this.value));
      });


      //Set wheel step
      wb3d_wheel=function(x){
            var sn=obm.sn['0-0'];
            obm.setting[sn].wheel=Number(x);
      };



      jQuery("#wheel_speed").change(function(){
            wb3d_wheel(Number(this.value));
      });
      jQuery("#wheel_speed").keyup(function(){
            wb3d_wheel(Number(this.value));
      });



      //Set Speed step
      wb3d_speed=function(x){
            var sn=obm.sn['0-0'];
            obm.setting[sn].wheel_s=Number(x);
      };


      wb3d_set_firs_value_sub_layers=function(B,fx,ex,bc){
            var w,h;
            if(B['type_'+bc]==='wb3d'){
                  var sn1=B['slider_'+bc];
                  for(var i=0;i<obm.slidnum[sn1];i++){
                        var slide=obm.slide_of_location[sn1+'-'+i];
                        w=document.getElementById('wb3de-'+obm.wb3d_id['0_'+fx+'-'+ex+'-'+bc]).offsetWidth;
                        h=document.getElementById('wb3de-'+obm.wb3d_id['0_'+fx+'-'+ex+'-'+bc]).offsetHeiht;
                        document.getElementById('wb3dh-'+obm.wb3d_id['0_'+fx+'-'+ex+'-'+bc+'-'+slide]).style.width=w+'px';
                        document.getElementById('wb3dh-'+obm.wb3d_id['0_'+fx+'-'+ex+'-'+bc+'-'+slide]).style.height=h+'px';
                        wb3d_set_bk(obm.wb3d_id['0_'+fx+'-'+ex+'-'+bc+'-'+slide],obm,'0_'+fx+'-'+ex+'-'+bc+'-'+slide);
                        for(var cc=1;cc<=obm.layers[sn1+'-'+slide]-1;cc++){  
                              var yy=obm.la_l[sn1+'-'+slide+'-'+cc];
                              var C=obm.dataslide[sn1][obm.los[sn1+'-'+slide]][obm.lo_l[sn1+'-'+slide+'-'+yy]];
                              for(var r=0;r<C.layer_obj;r++){
                                    var t= C['obj_num_'+r];
                                    wb3d_set_bk(obm.wb3d_id['0_'+fx+'-'+ex+'-'+bc+'-'+slide+'-'+yy+'-'+t],obm,'0_'+fx+'-'+ex+'-'+bc+'-'+slide+'-'+yy);
                              }
                        }
                  }
            }
      };


      jQuery("#f_right_menu").change(function(){
            wb3d_set_f_obj(Number(this.value));
      });
      jQuery("#f_right_menu").keyup(function(){
            wb3d_set_f_obj(Number(this.value));
      });

      //Change Object Font-size 
      wb3d_set_f_obj=function(x){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K['fs_'+obm.d+'-'+obm.s_o]=x;
            K['bkfs_'+obm.d+'-'+obm.s_o]=x;
            obm.chenge_details_obj=[];
            obm.putimagecanvas();
      };


      jQuery("#start_after").change(function(){
            wb3d_set_start(Number(this.value));
      });
      jQuery("#start_after").keyup(function(){
            wb3d_set_start(Number(this.value));
      });


      //Start Layer After x (Time)
      wb3d_set_start=function(x){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K['C_'+obm.d]=Number(x);
      };


      jQuery("#end_To").change(function(){
            wb3d_set_end(Number(this.value));
      });
      jQuery("#end_To").keyup(function(){
            wb3d_set_end(Number(this.value));
      });

      //Stop Layer After x (Time)
      wb3d_set_end=function(x){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K['F_'+obm.d]=Number(x);
      };


      jQuery('#reset_run_after_v_scroll').click(function(){
            var sn=obm.sn['0-0'];
            jQuery('#run_after_v_scroll').val(0);
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K['B_'+obm.d]=0;
            wb3d_reset_obj_xy();
      });

      jQuery('#start_run_after_v_scroll').click(function(){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K['B_'+obm.d]=(K['PY2_'+obm.d]-obm.vscrollM['0_0'])/obm.setting[sn]['h_'+obm.d];
            if(obm.vscrollM['0_0']===0){
                  K['B_'+obm.d]=0;   
            }
            jQuery('#run_after_v_scroll').val(K['B_'+obm.d]);
            wb3d_reset_obj_xy();
      });



      jQuery('#reset2_run_after_v_scroll').click(function(){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K['E_'+obm.d]=-100;
            jQuery('#run_to_v_scroll').val(-100);
            wb3d_reset_obj_xy();
      });

      jQuery('#end_run_after_v_scroll').click(function(){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K['E_'+obm.d]=(K['PY2_'+obm.d]-obm.vscrollM['0_0'])/obm.setting[sn]['h_'+obm.d];
            jQuery('#run_to_v_scroll').val(K['E_'+obm.d]);
            wb3d_reset_obj_xy();
      });

      jQuery("#reset_scroll").change(function(){
            wb3d_scroll_reset(Number(this.value));
      });
      jQuery("#reset_scroll").keyup(function(){
            wb3d_scroll_reset(Number(this.value));
      });

      wb3d_scroll_reset=function(x){
            var sn=obm.sn['0-0'];
            obm.setting[sn].reset=Number(x);
      };

      jQuery("#reset_scroll2").change(function(){
            wb3d_scroll_reset2(Number(this.value));
      });
      jQuery("#reset_scroll2").keyup(function(){
            wb3d_scroll_reset2(Number(this.value));
      });

      wb3d_scroll_reset2=function(x){
            var sn=obm.sn['0-0'];
            obm.setting[sn].reset2=Number(x);
      };

      jQuery("#sizex_right_menu").change(function(){
            wb3d_set_t_x(Number(this.value));
      });
      jQuery("#sizex_right_menu").keyup(function(){
            wb3d_set_t_x(Number(this.value));
      });

      //Change TX effect  Of Layers
      wb3d_set_t_x=function(x){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K['t_x_'+obm.d]=x*100;
            for(var r=0;r<K.layer_obj;r++){
                  var t= K['obj_num_'+r];
                  var id=obm.wb3d_id['0_'+obm.activeslide[obm.cu]+'-'+obm.s_l+'-'+t];
                  wb3d_set_bk(id,obm,'0_'+obm.activeslide[obm.cu]+'-'+obm.s_l);
            }
            obm.putimagecanvas();
      };


      jQuery("#sizey_right_menu").change(function(){
            wb3d_set_t_y(Number(this.value));
      });
      jQuery("#sizey_right_menu").keyup(function(){
            wb3d_set_t_y(Number(this.value));
      });

      //Change TY effect  Of Layers
      wb3d_set_t_y=function(y){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K['t_y_'+obm.d]=y*100; 
            for(var r=0;r<K.layer_obj;r++){
                  var t= K['obj_num_'+r];
                  var id=obm.wb3d_id['0_'+obm.activeslide[obm.cu]+'-'+obm.s_l+'-'+t];
                  wb3d_set_bk(id,obm,'0_'+obm.activeslide[obm.cu]+'-'+obm.s_l);
            }
            obm.putimagecanvas();
      };

      // ease Effect Speed
      jQuery('#select_auto_slow').change(function(){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K['slow'+obm.d]=Number(this.value);
            obm.putimagecanvas();
      });



      //Repeat Effect
      jQuery('#select_auto_repeat').change(function(){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            if(Number(jQuery('#select_auto_repeat').val())===1){
                  jQuery('#select_auto_slow').val(0);
                  jQuery('#select_auto_slow').prop('disabled', 'disabled');
                  K['slow'+obm.d]=0;
            }
            else if(Number(jQuery('#selecttimeorscroll').val())!=0){
                  jQuery('#select_auto_slow').removeAttr('disabled');
            }

            K['repeat'+obm.d]=Number(this.value);
            K['slow'+obm.d]=Number( jQuery('#select_auto_slow').val());
      });



      //Type Effect
      jQuery('#selecttimeorscroll').on('change', function(event) {
            var sn=obm.sn['0-0'];
            var x=Number(jQuery('#selecttimeorscroll').val());
            if( x===5|| x===10|| x===11){
                  jQuery('#select_auto_repeat').prop('disabled', 'disabled');
                  jQuery('#select_auto_slow').prop('disabled', 'disabled');
            }
            else if( x>=6&&x<=9){
                  jQuery('#select_auto_repeat').prop('disabled', 'disabled');
                  jQuery('#select_auto_slow').removeAttr('disabled');
            }
            else if(x===0){
                  jQuery('#select_auto_repeat').removeAttr('disabled');
                  jQuery('#select_auto_slow').prop('disabled', 'disabled');
            }
            else{
                  jQuery('#select_auto_repeat').removeAttr('disabled');
                  jQuery('#select_auto_slow').removeAttr('disabled');
            }
            jQuery('#select_auto_slow').val(0);
            jQuery('#select_auto_repeat').val(0);
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K['T_E'+obm.d]=Number(this.value);
            if(K['T_E'+obm.d]===0){
                  obm.bk_pluse['0_'+obm.activeslide[obm.cu]+'-'+obm.s_l]=1;
            }
            else{
                  obm.bk_pluse['0_'+obm.activeslide[obm.cu]+'-'+obm.s_l]=0;
            }
            K['slow'+obm.d]=0;
            K['repeat'+obm.d]=0;
            obm.framenum['0_'+obm.activeslide[obm.cu]+'-'+obm.s_l]=0;
            for(var r=0;r<K.layer_obj;r++){
                  var t= K['obj_num_'+r];
                  var id=obm.wb3d_id['0_'+obm.activeslide[obm.cu]+'-'+obm.s_l+'-'+t];
                  wb3d_set_bk(id,obm,'0_'+obm.activeslide[obm.cu]+'-'+obm.s_l);
            }
            obm.es1_changeX=[];
            obm.es1_changeY=[];
      });

      jQuery('#show_demo').click(function(){

      });
      jQuery('#colormenu_import').click(function(){
            jQuery('#file_colormenu').click();
      });


      jQuery('#file_colormenu').on('change', function(evt) {
            var sn=obm.sn['0-0'];
            var file = event.target.files[0];
            JSZip.loadAsync(file).then(function(content) {
                  // if you return a promise in a 'then', you will chain the two promises
                  return content.files['color_tables.txt'].async('text');
            }).then(function (txt) {
                  var x=jQuery.parseJSON(txt);
                  x[0]=jQuery.parseJSON(x[0]);

                  jQuery('#allcolormenu').empty();
                  for(var i=0;i<10;i++){
                        obm.setting[sn]['c'+i]=x[0][i];
                        wb3d_set_color_tables(obm,obm.setting[sn]['c'+i]);
                  }
                  wb3d_compilecolor(jQuery.parseJSON(x[1]),sn,obm,0);
                  wb3d_set_colortable();
                  obm.chenge_details_obj2=[];
                  obm.chenge_details_obj=[];

                  jQuery( '#allcolormenu').sortable({
                        stop: function( event, ui ) {
                              var sortedIDs = jQuery('#allcolormenu' ).sortable('toArray', {attribute: 'id'});
                              for(var is=0;is<10;is++){
                                    obm.setting[sn]['c'+is]=Number(sortedIDs[is].split('bodycolormenu')[1]);
                              }
                              wb3d_set_colortable();
                              obm.resize=1;
                              obm.chenge_details_obj2=[];
                              obm.chenge_details_obj=[];
                        }
                  });
            });
      });


      jQuery('#colormenu_export').click(function(){
            var sn=obm.sn['0-0'];
            var i;
            var w=[];
            for(i=0;i<10;i++){
                  w[i]= obm.setting[sn]['c'+i];
            }
            w[0]=JSON.stringify(w);
            var colorm=[];

            for(var j=0;j<=9;j++){
                  var color7=[];
                  for(i=0;i<obm.max_color[sn+'-'+j];i++){
                        color7[i*4+2]=obm.r[sn+'-'+j+'-'+i];
                        color7[i*4+1+2]=obm.g[sn+'-'+j+'-'+i];
                        color7[i*4+2+2]=obm.b[sn+'-'+j+'-'+i];
                        color7[i*4+3+2]=obm.a[sn+'-'+j+'-'+i];
                  }
                  color7[0]=Number(obm.max_color[sn+'-'+j]/256);
                  color7[1]=Number(obm.max_color[sn+'-'+j]%256);
                  colorm[j]=wb3d_toHexString(color7);
            }

            w[1] =JSON.stringify(colorm);
            w =JSON.stringify(w);

            var zip = new JSZip();
            zip.file('color_tables.txt', w);

            zip.generateAsync({type:'blob'})
            .then(function(content) {
                  // see FileSaver.js
                  saveAs(content, 'color_tables.zip');
            });
      });//export


      //parallex
      jQuery('#select_parallex').change(function(){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K['P_'+obm.d]=Number(jQuery('#select_parallex').val());
            for(var r=0;r<K.layer_obj;r++){
                  var t= K['obj_num_'+r];
                  var id=obm.wb3d_id['0_'+obm.activeslide[obm.cu]+'-'+obm.s_l+'-'+t];
                  wb3d_set_bk(id,obm,'0_'+obm.activeslide[obm.cu]+'-'+obm.s_l);
            }
      });




      jQuery("#parallax_spinner1").change(function(){
      	wb3d_parallax_value1(Number(this.value));
      });
      jQuery("#parallax_spinner1").keyup(function(){
      	wb3d_parallax_value1(Number(this.value));
      });


      // parallex Value 1
      wb3d_parallax_value1=function (x){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K['Ps1_'+obm.d]=Number(x);
            for(var r=0;r<K.layer_obj;r++){
                  var t= K['obj_num_'+r];
                  var id=obm.wb3d_id['0_'+obm.activeslide[obm.cu]+'-'+obm.s_l+'-'+t];
                  wb3d_set_bk(id,obm,'0_'+obm.activeslide[obm.cu]+'-'+obm.s_l);
            }
            obm.putimagecanvas() ;
      };


      jQuery("#parallax_spinner2").change(function(){
            wb3d_parallax_value2(Number(this.value));
      });
      jQuery("#parallax_spinner2").keyup(function(){
            wb3d_parallax_value2(Number(this.value));
      });

      // parallex Value 2
      wb3d_parallax_value2=function (x){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K['Ps2_'+obm.d]=Number(x);
            for(var r=0;r<K.layer_obj;r++){
                  var t= K['obj_num_'+r];
                  var id=obm.wb3d_id['0_'+obm.activeslide[obm.cu]+'-'+obm.s_l+'-'+t];
                  wb3d_set_bk(id,obm,'0_'+obm.activeslide[obm.cu]+'-'+obm.s_l);
            }
            obm.putimagecanvas(); 
      };


      //Type Parallax 1
      jQuery('#parallax_selectmenu1').change(function(){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K['P1_'+obm.d]=Number(jQuery('#parallax_selectmenu1').val());
            for(var r=0;r<K.layer_obj;r++){
                  var t= K['obj_num_'+r];
                  var id=obm.wb3d_id['0_'+obm.activeslide[obm.cu]+'-'+obm.s_l+'-'+t];
                  wb3d_set_bk(id,obm,'0_'+obm.activeslide[obm.cu]+'-'+obm.s_l);
            }
      });



      //Type Parallax 2
      jQuery('#parallax_selectmenu2').change(function(){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K['P2_'+obm.d]=Number(jQuery('#parallax_selectmenu2').val());
            for(var r=0;r<K.layer_obj;r++){
                  var t= K['obj_num_'+r];
                  var id=obm.wb3d_id['0_'+obm.activeslide[obm.cu]+'-'+obm.s_l+'-'+t];
                  wb3d_set_bk(id,obm,'0_'+obm.activeslide[obm.cu]+'-'+obm.s_l);
            }
      });


      // Delete Desktop Icon
      jQuery('#let_status_0_close').click(function(){
            var id=this.id.split('_')[2];
            wb3d_func_let_status(id,0);
      });



      // Delete Laptop Icon
      jQuery('#let_status_1_close').click(function(){
            var id=this.id.split('_')[2];
            wb3d_func_let_status(id,0);
      });



      // Delete Tablet Icon
      jQuery('#let_status_2_close').click(function(){
            var id=this.id.split('_')[2];
            wb3d_func_let_status(id,0);
      });

      // Delete Mobile Icon
      jQuery('#let_status_3_close').click(function(){
            var id=this.id.split('_')[2];
            wb3d_func_let_status(id,0);
      });


      //Add Desktop Status
      jQuery('#let_status0').click(function(){
            var id=this.id.split('let_status')[1];
            wb3d_func_let_status(id,1);
      });



      //Add Laptop Status
      jQuery('#let_status1').click(function(){
            var id=this.id.split('let_status')[1];
            wb3d_func_let_status(id,1);
      });

      //Add Tablet Status
      jQuery('#let_status2').click(function(){
            var id=this.id.split('let_status')[1];
            wb3d_func_let_status(id,1);
      });



      //Add Mobile Status
      jQuery('#let_status3').click(function(){
            var id=this.id.split('let_status')[1];
            wb3d_func_let_status(id,1);
      });


      //Add Desktop/Laptop/Tablet/Mobile Status
      wb3d_func_let_status=function (id,flag){
            var sn=obm.sn['0-0'];
            jQuery('#let_status').empty();
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            if(K===undefined){
                  return;
            }
            K['S_'+id]=flag;
            var tmp='Desktop';
            for(var i=0;i<4;i++){
                  if(i===1){
                        tmp='Laptop';
                  }
                  else  if(i===2){
                        tmp='Tablet';
                  }
                  else if(i===3){
                        tmp='Mobile';
                  }
                  if(K['S_'+i]===1){
                        var txt='<div class="wb3d_status" >'+tmp+'<img class="pointer img40" id="let_status_'+i+'_close" src="'+wb3d.wb3d_plagin_images_URL+'close4.png" ><div>';
                        jQuery('#let_status').append(txt);
                        setTimeout((function(wb3d_func_let_status,i,jQuery) {
                              jQuery('#let_status_'+i+'_close').click(function(){
                                    var id=this.id.split('_')[2];
                                    wb3d_func_let_status(id,0);
                              });
                        }).bind(null, wb3d_func_let_status,i,jQuery), 0);
                  }
            }
      };


      //change tags size  after change screen size
      wb3d_change_screen_size=function (){
            var ml,tx,x,y;
            var sn=obm.sn['0-0'];
            obm.deltaY[obm.cu]=0;
            obm.deltaX=0;
            for(var i=0;i<4;i++){
                  x=Number( jQuery( '#width_'+i+'_spiner' ).val());
                  y=Number( jQuery( '#height_'+i+'_spiner' ).val());

                  obm.setting[sn]['w_'+i]=x;
                  obm.setting[sn]['h_'+i]=y;
            }

            x=Number( jQuery( '#width_'+obm.d+'_spiner' ).val());
            y=Number( jQuery( '#height_'+obm.d+'_spiner' ).val());
            if(obm.Menu_left===1){
                  ml=280;
            }
            else{
                  ml=0;
            }

            var x_window= jQuery(window).width(); // New width

            y+=obm.setting[sn]['vmaxsc-'+obm.d];
            tx=(x_window-ml-1040)/2;
            if(tx<0){
            	if(wb3d.rtl!=1)
                  jQuery('#allfieldset').css('left','0px');
              else
                  jQuery('#allfieldset').css('right','0px');
            }
            else{
                  if(wb3d.rtl!=1)
                        jQuery('#allfieldset').css('left',tx+'px');
                  else
                        jQuery('#allfieldset').css('right',tx+'px');
            }
            tx=(x_window-ml-440)/2;
            // if(tx<0){
            //       jQuery('#div_colorTable').css('left','0px');
            // }
            // else{
            //       if(wb3d.rtl!=1)
            //             jQuery('#div_colorTable').css('left',tx+'px');
            //       else
            //             jQuery('#div_colorTable').css('right',tx+'px');
            // }
            tx=(x_window-ml-992)/2;
            if(tx<0){
                  jQuery('#edit_panel').css('left','0px');
            }
            else{
                  if(wb3d.rtl!=1)
                        jQuery('#edit_panel').css('left',tx+'px');
                  else
                        jQuery('#edit_panel').css('right',tx+'px');
            }
            tx=(x_window-ml-x-40-10)/2;
            if(tx<0){
            	if(wb3d.rtl!=1)
                  jQuery('#maindiv').css('left','0px');
              else
                  jQuery('#maindiv').css('right','0px');
            }
            else{
                  if(wb3d.rtl!=1)
                        jQuery('#maindiv').css('left',tx+'px');
                  else
                        jQuery('#maindiv').css('right',tx+'px');
            }
            tx=(x_window-ml-20);
            // if(tx<x+40){
                  // jQuery('#divbiger').css('width', (tx-40)+'px');
                  // jQuery('#maindiv').css('width', (tx)+'px');
            // }
            // else{
                  jQuery('#divbiger').css('width', (x+3)+'px');
                  jQuery('#maindiv').css('width', (x+40)+'px');
                  jQuery('#after_start').css('width', (x+48)+'px');
            // }
            // tx=(x_window-ml-1010-20)/2;
            // if(tx<0){
            //       jQuery('#div-44').css('left','0px');
            // }
            // else{
            //       if(wb3d.rtl!=1)
            //             jQuery('#div-44').css('left',tx+'px');
            //       else
            //             jQuery('#div-44').css('right',tx+'px');
            // }

            jQuery('#start_sub').css('width',(x_window-ml)+'px');
            jQuery('#divtop').css('width', (x+5)+'px');
            jQuery('#wb3dh').css('width', x);
            jQuery('#wb3dh').css('height', y);
            jQuery('#divbiger').css('height', y+60);
            jQuery('#divb').css('height', y);
            jQuery('#divb').css('width', x+2);
            jQuery('#maindiv').css('height',y+165);
            jQuery('#divleft').css('height', y+20);
            // var tt=jQuery('#maindiv').height()+35;
            // jQuery('#div-44').css('top', tt+'px');
            if(obm.loadslides===0){
                  obm.putimagecanvas();
            }
            var x=jQuery('#label_width_1_X0').text()+' = ';
            jQuery('#label_width_0_X').text(x+(jQuery('#width_0_spiner').val()/jQuery('#height_0_spiner').val()).toFixed(2));
            jQuery('#label_width_1_X').text(x+(jQuery('#width_1_spiner').val()/jQuery('#height_1_spiner').val()).toFixed(2));
            jQuery('#label_width_2_X').text(x+(jQuery('#width_2_spiner').val()/jQuery('#height_2_spiner').val()).toFixed(2));
            jQuery('#label_width_3_X').text(x+(jQuery('#width_3_spiner').val()/jQuery('#height_3_spiner').val()).toFixed(2));
      };




      for(var i=0;i<4;i++){
            setTimeout((function(wb3d_change_screen_size,i,jQuery) {
                  jQuery("#height_"+i+"_spiner").change(function(){
                        wb3d_change_screen_size(Number(this.value));
                  });
                  jQuery("#height_"+i+"_spiner").keyup(function(){
                        wb3d_change_screen_size(Number(this.value));
                  });

                  jQuery("#width_"+i+"_spiner").change(function(){
                        wb3d_change_screen_size(Number(this.value));
                  });
                  jQuery("#width_"+i+"_spiner").keyup(function(){
                        wb3d_change_screen_size(Number(this.value));
                  });
            }).bind(null, wb3d_change_screen_size,i,jQuery), 0);

      }

      jQuery("#tab_number").change(function(){
            wb3d_change_tab(Number(this.value));
      });
      // Change to Tab Type
      wb3d_change_tab=function (){
            var sn=obm.sn['0-0'];
            var B=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            if( B.l_type>=9 ){
                  B.tab=Number(jQuery('#tab_number').val());
            }
      };



      //  Show/Hide Left Menu
      jQuery('#Menu_left').click(  function(){
            var left='';
            var right='';
            if(obm.Menu_left===1){
                  var x=Number((jQuery('#start_sub').css('width')).split('px')[0]);
                  jQuery('#start_sub').css('width',(x+280)+'px');
                  if(wb3d.rtl!=1)
                        left='-=280'
                  else
                        right='-=280'
                  jQuery('#es_menu').animate({
                        left: left,
                        right: right,
                        }, 75, function() {
                        // Animation complete.
                        wb3d_change_screen_size(obm);
                  });


                  jQuery('#start_sub').animate({
                        left: left,
                        right: right,
                  }, 75, function() {
                        // Animation complete.
                        wb3d_change_screen_size(obm);
                  });
                  obm.Menu_left=0 ;
            }

            else{
                  if(wb3d.rtl!=1)
                        left='+=280'
                  else
                        right='+=280'
                  jQuery('#es_menu').animate({
                        left: left,
                        right: right,
                  }, 75, function() {
                  // Animation complete.
                  wb3d_change_screen_size(obm);
                  });
                  jQuery('#start_sub').animate({
                        left: left,
                        right: right,
                  }, 75, function() {
                  // Animation complete.
                  wb3d_change_screen_size(obm);
                  });
                  obm.Menu_left=1;
            }
      });



      window.addEventListener('resize', function(){
            wb3d_change_screen_size();
      });



      // Set Delete/Setting Button (for Objects)
      function wb3d_closeset(y){
            var sn=obm.sn['0-0'];

            //Delete Object 
            jQuery('#closeobj-'+y).click(function(){
                  var  x=this.id.split('-');
                  var r,idm;

                  if (confirm(jQuery('#alert_confirm3').text())) {

                        var K=obm.dataslide[sn][ obm.los[sn+'-'+x[1]] ][obm.lo_l[sn+'-'+x[1]+'-'+x[2]]];
                        for(r=0;r<K.layer_obj;r++){
                              if(Number(x[3])===Number(K['obj_num_'+r])){
                                    break;
                              }
                        }
                        for(;r<K.layer_obj-1;r++){
                              K['obj_num_'+r]=K['obj_num_'+(r+1)];
                        }
                        idm=obm.wb3d_id['0_'+x[1]+'-'+x[2]+'-'+x[3]];
                        obm.removeobj[K['type_obj-'+x[3]]] (K,idm,x[3]);
                        K.layer_obj--;
                        obm.s_l=-1;
                        obm.s_o=-1;
                        obm.set_border=-1;
                        wb3d_set_disable();
                        wb3d_set_slide_value(obm.activeslide[obm.cu],1,obm);
                  }
            });


            //Change Object Type
            jQuery('#sett-'+y).click(function(){
                  var x=this.id;
                  obm.new_layer=0;
                  var sn=obm.sn['0-0'];			
                  var x1 = x.split('-')[1];
                  var x2 = x.split('-')[2];
                  var x3 = x.split('-')[3];
                  obm.i=x3;
                  var K=obm.dataslide[sn][ obm.los[sn+'-'+x1] ][obm.lo_l[sn+'-'+x1+'-'+x2]];
                  wb3d_change_obj_click(x1,x2,x3,K);
            });


            function wb3d_change_obj_click(x1,x2,x3,K){
                  jQuery('#textmenu').css('display','');
                  jQuery('#change_obj_table').text('Change obj '+x3);
                  var T=K[ 'type_obj-'+x3];
                  if(T!=undefined)
                  obm.setvalue[T](x3,T,K);
                  return;
            }
      }//End Of wb3d_closeset

      // Stop Timer Slider
      jQuery( '#stop_slide' ).click(function(){
            obm.framenum['0_'+obm.activeslide[obm.cu]]=0;
            wb3d_reset_data_slider();
      });


      // Check All Object
      wb3d_check_addon_open=function (x){
            var flag=0;
            var r,t;
            var sn=obm.sn['0-0'];
            for(var b0=0;b0<obm.slidnum[sn];b0++){
                  var s0=obm.slide_of_location[sn+'-'+b0];
                  for(var i=1;i<obm.layers[sn+'-'+s0];i++){
                        var ii=obm.la_l[sn+'-'+s0+'-'+i];
                        var F=obm.dataslide[sn][ obm.los[sn+'-'+s0] ][i];
                        for(r=0;r<F.layer_obj;r++){
                              t= F['obj_num_'+r];
                              if(F[ 'type_obj-'+t]===x||F[ 'type_obj-'+t].split('_')[0]===x){
                                    flag=ii;
                              }

                              if(F[ 'type_'+t]==='wb3d'){
                                    var sn1=F['slider_'+t];

                                    for(var b=0;b<obm.slidnum[sn1];b++){
                                          var s=obm.slide_of_location[sn1+'-'+b];
                                          for(var ib=1;ib<obm.layers[sn1+'-'+s];ib++){
                                                var H=obm.dataslide[sn1][ obm.los[sn1+'-'+s] ][ib];
                                                for(r=0;r<H.layer_obj;r++){
                                                      t= H['obj_num_'+r];
                                                      if(H[ 'type_obj-'+t]===x||H[ 'type_obj-'+t].split('_')[0]===x){
                                                            flag=ii;
                                                      }
                                                }
                                          }
                                    }
                              }
                        }
                  }
            }
            return flag;
      };//End Of wb3d_reset_data_slider


      // Reset All Object
      wb3d_reset_data_slider=function (s,flag,flag2){
            var sn=obm.sn['0-0'];
            var cu=obm.cu;
            wb3d_reset_obj_xy();
            var t,id;
            obm.flag_bl2[cu+'_0']=0;
            if(flag2!=1){
                  obm.framenum[cu+'_'+s]=0;
            }
            if(s==undefined){
                  s=obm.activeslide[obm.cu];
            }

            if(flag!=1){
                  obm.h2[cu+'_'+s]=0;
                  obm.w2[cu+'_'+s]=0;
                  obm.bk_play[cu+'_'+s+'-'+0]='play';
            }



            for(var i=1;i<obm.layers[sn+'-'+s];i++){
                  var ii=obm.la_l[sn+'-'+s+'-'+i];
                  if(flag2!=1){
                        obm.framenum[cu+'_'+s+'-'+ii]=0;
                        obm.true_frm[cu+'_'+s+'-'+ii]=0;
                  }

                  var F=obm.dataslide[sn][ obm.los[sn+'-'+s] ][i];

                  if(F['T_E'+obm.d]===0){
                        obm.bk_pluse[cu+'_'+s+'-'+ii]=1;
                  }
                  else{
                        obm.bk_pluse[cu+'_'+s+'-'+ii]=0;
                  }
                  var l=cu+'_'+s+'-'+ii;
                  obm.try2[l]=0;
                  obm.trx2[l]=0;
                  obm.trx[l]=0;
                  obm.try[l]=0;
                  obm.trx[l]=0;
                  obm.maxtime[l]=100;
                  obm.hover_id[l]=0;
                  obm.hover_id2[l]=0;
                  obm.mouseenter[l]=-1;
                  for(var m=0;m<4;m++){
                        F['EB_'+m]=F['EA_'+m];
                  }
                  for(var r=0;r<F.layer_obj;r++){
                        t= F['obj_num_'+r];
                        id=obm.wb3d_id[cu+'_'+s+'-'+ii+'-'+t];
                        obm.w[id]=0;
                        obm.h[id]=0;
                        wb3d_set_bk(id,obm,cu+'_'+s+'-'+ii);
                        obm.w[cu+'_'+s+'-'+ii+'-'+F['obj_num_'+r] ]=0;
                        if(F[ 'type_'+t]==='wb3d'&&F['ajax_'+t]!=1){
                              obm.flag_bl2[cu+'_'+obm.wb3d_id[cu+'_'+s+'-'+ii+'-'+t]]=0;
                              wb3d_reset_data_slider_sub(obm,F,0,id,cu,s,ii,t,flag2);

                        }
                  }
            }
         
            return;

      };//End Of wb3d_reset_data_slider

            wb3d_reset_obj_xy3=function (id){  
                  obm.flag_bl2['0_0']=0;
                  obm.scrollstatus=-1;
                  obm.bk_t_l=[];
                  obm.bk_t_l2=[];
                  if(id===undefined)
                        return;
                  id=id.toString();
                               id=id.split('-');
                  var x=0;
                  if(id[3]!=undefined){
                        x=obm.wb3d_id[id[0]+'-'+id[1]+'-'+id[2]];
                        obm.flag_bl2[0+'_'+x]=0;
                  }
            };


      wb3d_setObj_position=function (F1,F,s,l,id1){

            obm.bk_top3[l]=0;
            for(var i=0;i<F1['bl_'+obm.d ];i++){
                  if(obm.panelY[s+'-'+i]<F['PY_'+obm.d]){
                        obm.bk_top3[l]+=obm.panelTy[s+'-'+i];
                  }
                  else
                        break;
            }


      };

      wb3d_setPanel_position=function (F1,F,s,sy,id1,l,level){

            var py=[];
            var ty=[];
            var id=[];
            var id2=[];
            var index=0;
            var flag=0;
            var i=0;
            if(F1['bl_'+obm.d ]==0){
                  py[0]=F['PY_'+obm.d];
                  ty[0]=sy;
                  id[0]=id1;
                  id2[id1]=0;
                  flag=1;
            }
            else{
                  for(i=0;i<F1['bl_'+obm.d ];i++){
                        if(F['PY_'+obm.d]<obm.panelY[s+'-'+i]&&flag==0){
                              py[index]=F['PY_'+obm.d];
                              ty[index]=sy;
                              id[index]=id1;
                              id2[id1]=index;
                              index++;
                              ty[index]=obm.panelTy[s+'-'+i];
                              py[index]=obm.panelY[s+'-'+i];
                              id[index]=obm.panelId[s+'-'+i];
                              id2[obm.panelId[s+'-'+i]]=index;
                              flag=1;
                              index++;
                        }
                        else{
                              py[index]=obm.panelY[s+'-'+i];
                              ty[index]=obm.panelTy[s+'-'+i];
                              id[index]=obm.panelId[s+'-'+i];
                              id2[obm.panelId[s+'-'+i]]=index;
                              index++;
                        }
                  }
                  if(flag==0){
                        py[index]=F['PY_'+obm.d];
                        ty[index]=sy;    
                        id[index]=id1;  
                        id2[id1]=index;    
                  }
            }

            F1['bl_'+obm.d ]++;

            for(i=0;i<F1['bl_'+obm.d ];i++){
                  obm.panelY[s+'-'+i]=py[i];
                  obm.panelTy[s+'-'+i]=ty[i];
                  obm.panelId[s+'-'+i]=id[i];
                  obm.panelId2[id[i]]=s+'-'+i;
            }
      };


      wb3d_reset_data_slider_sub=function (obm,F,flag,id,cu,s,ii,t,flag2){
            var sn1=F['slider_'+t];
            var t2,sl,id2;
            var idg='0_0';

            if(F['WO'+obm.d]===1){
                  obm.wh_w[id]=obm.wb3d_ay[idg];
            }
            else{
                  obm.wh_w[id]=obm.wb3d_ax[idg];
            }


            if(F['HO'+obm.d]===1){
                  obm.wh_h[id]=obm.wb3d_ay[idg];
            }
            else{
                  obm.wh_h[id]=obm.wb3d_ax[idg];
            }
            obm.wb3d_ax['0_'+id]=(F['sizex_'+obm.d+'-'+t]/obm.setting[sn1]['w_'+obm.d])*obm.wh_w[id];
            obm.wb3d_ay['0_'+id]=(F['sizey_'+obm.d+'-'+t]/obm.setting[sn1]['h_'+obm.d])*obm.wh_h[id];
            var tx=obm.wb3d_ay['0_'+id]-obm.wb3d_ax['0_'+id];
            if(F['ajax_'+t]!=1){
                  for(var b=0;b<obm.setting[sn1].num;b++){

                        var s2=obm.dataslide[sn1][b][0].slide_of_location;
                        sl=cu+'_'+s+'-'+ii+'-'+t+'-'+s2;
                        obm.vscroll[cu+'_'+id]=0;
                        obm.vscrollM[cu+'_'+id]=0;
                        obm.h2[sl]=0;
                        obm.w2[sl]=0;
                        if(flag2!=1){
                              obm.framenum[sl+'-'+0]=0;
                              obm.framenum[sl]=0;
                        }
                        obm.bk_play[sl+'-'+0]='play';
                        var idg2=cu+'_'+obm.wb3d_id[cu+'_'+s+'-'+ii+'-'+t];
                        				        obm.flag_bl2[idg2]=0;
                        obm.max_top[idg2]=0;
                        var H1=obm.dataslide[sn1][ b ][0];

                        H1['bl_'+obm.d ]=0;
                        for(var ib=1;ib<obm.dataslide[sn1][b][0].layer;ib++){
                              var lb=obm.dataslide[sn1][b][ib].ind;
                              if(flag2!=1){
                                    obm.framenum[sl+'-'+lb]=0;
                                    obm.true_frm[sl+'-'+lb]=0;
                              }
                              var H=obm.dataslide[sn1][ b ][ib];

                              if(H['T_E'+obm.d]===0){
                                    obm.bk_pluse[sl+'-'+lb]=1;
                              }
                              else{
                                    obm.bk_pluse[sl+'-'+lb]=0;
                              }
                              var l=sl+'-'+lb;

                              if(obm.bk_top3[l]==undefined){      
                                    obm.bk_top3[l]=0;
                              }

                              obm.try2[l]=0;
                              obm.trx2[l]=0;
                              obm.trx[l]=0;
                              obm.try[l]=0;
                              obm.trx[l]=0;
                              obm.maxtime[l]=100;
                              obm.hover_id[l]=0;
                              obm.hover_id2[l]=0;
                              obm.mouseenter[l]=-1;

                              for(var m=0;m<4;m++){
                                    H['EB_'+m]=H['EA_'+m];
                              }

                              for(var p=0;p<H.layer_obj;p++){
                                    t2= H['obj_num_'+p];
                                    id2=obm.wb3d_id[sl+'-'+lb+'-'+t2];
                                     obm.w[id2]=0;
                                    obm.h[id2]=0;


                                    if(H[ 'type_obj-'+t2]==='panel'&&H['relative_'+t2]==1){

                                          if(H['HO'+obm.d]==0){
                                                tx=0;
                                          }
                                          wb3d_setPanel_position(H1,H,sl,tx*H['sizey_'+obm.d+'-'+t2],obm.wb3d_id[l+'-'+t2],l,1);
                                    }

                                    obm.w[sl+'-'+lb+'-'+F['obj_num_'+p] ]=0;
                                    wb3d_set_bk(id,obm,sl+'-'+lb);
                              }
                        }
                  }
            }
      };
						

      wb3d_timer_scroll_lock=function(){
            obm.timer_scroll-=25;
            if(obm.timer_scroll<=0){
                  obm.lock_scroll=0;
                  obm.putimagecanvas();
                  return;
            }
            setTimeout(function(){
                  wb3d_timer_scroll_lock();
            },25);
      };

      // Disable All UI (Left Menu)
      wb3d_set_disable=function (){
            jQuery('#effect_0').prop('disabled', true);
            jQuery('#noxy').prop('disabled', true);
            jQuery('#x_right_menu').prop('disabled', true);
            jQuery('#y_right_menu').prop('disabled', true);
            jQuery('#w_right_menu').prop('disabled', true);
            jQuery('#h_right_menu').prop('disabled', true);
            jQuery('#f_right_menu').prop('disabled', true);
            jQuery('#run_after_v_scroll').prop('disabled', true);
            jQuery('#start_after').prop('disabled', true);
            jQuery('#run_to_v_scroll').prop('disabled', true);
            jQuery('#end_To').prop('disabled', true);
            jQuery('#align_left').prop('disabled', true);
            jQuery('#width_res').prop('disabled', true);
            jQuery('#height_res').prop('disabled', true);
            jQuery('#show_in_range').prop('disabled', true);
            jQuery('#align_top').prop('disabled', true);
            jQuery('#sizex_right_menu').prop('disabled', true);
            jQuery('#sizey_right_menu').prop('disabled', true);
            jQuery('#select_position').prop('disabled', true);
            jQuery('#selecttimeorscroll').prop('disabled', true);
            jQuery('#select_auto_repeat').prop('disabled', true);
            jQuery('#select_auto_slow').prop('disabled', true);
            jQuery('#select_parallex').prop('disabled', true);
            jQuery('#select_parallex_type').prop('disabled', true);
            jQuery('#parallax_selectmenu1').prop('disabled', true);
            jQuery('#parallax_selectmenu2').prop('disabled', true);
            jQuery('#parallax_spinner1').prop('disabled', true);
            jQuery('#parallax_spinner2').prop('disabled', true);
            jQuery('#pers_type').prop('disabled', true);
            jQuery('#layer_type').prop('disabled', true);
            jQuery('#tab_number').prop('disabled', true);
            jQuery('#click-type').prop('disabled', true);
            jQuery('#click-link').prop('disabled', true);
            jQuery('#click-newpage').prop('disabled', true);
            jQuery('#act_event').prop('disabled', true);
            jQuery('#layer_reset').prop('disabled', true);
            jQuery('#layer_pointer').prop('disabled', true);
            jQuery('#layer_selectable').prop('disabled', true);
            jQuery('#layer_sizefunc').prop('disabled', true);
            jQuery('#layer_overflow').prop('disabled', true);
            jQuery('#layer_overflow2').prop('disabled', true);
      };



      // Enable All UI (Left Menu)
      wb3d_set_enable=function (){
            jQuery('#align_left').prop('disabled', false);
            jQuery('#width_res').prop('disabled', false);
            jQuery('#effect_0').prop('disabled', false);
            jQuery('#noxy').prop('disabled', false);
            jQuery('#x_right_menu').prop('disabled', false);
            jQuery('#y_right_menu').prop('disabled', false);
            jQuery('#w_right_menu').prop('disabled', false);
            jQuery('#h_right_menu').prop('disabled', false);
            jQuery('#f_right_menu').prop('disabled', false);
            jQuery('#start_after').prop('disabled', false);
            jQuery('#end_To').prop('disabled', false);
            jQuery('#show_in_range').prop('disabled', false);
            jQuery('#height_res').prop('disabled', false);
            jQuery('#align_top').prop('disabled', false);
            jQuery('#sizex_right_menu').prop('disabled', false);
            jQuery('#sizey_right_menu').prop('disabled', false);
            jQuery('#select_position').prop('disabled', false);
            jQuery('#selecttimeorscroll').prop('disabled', false);
            jQuery('#select_auto_repeat').prop('disabled', false);
            jQuery('#select_auto_slow').prop('disabled', false);
            jQuery('#select_parallex').prop('disabled', false);
            jQuery('#select_parallex_type').prop('disabled', false);
            jQuery('#parallax_selectmenu1').prop('disabled', false);
            jQuery('#parallax_selectmenu2').prop('disabled', false);
            jQuery('#parallax_spinner1').prop('disabled', false);
            jQuery('#parallax_spinner2').prop('disabled', false);
            jQuery('#pers_type').prop('disabled', false);
            jQuery('#layer_type').prop('disabled', false);
            jQuery('#tab_number').prop('disabled', false);
            jQuery('#click-type').prop('disabled', false);
            jQuery('#act_event').prop('disabled', false);
            jQuery('#layer_reset').prop('disabled', false);
            jQuery('#layer_pointer').prop('disabled', false);
            jQuery('#layer_selectable').prop('disabled', false);
            jQuery('#layer_sizefunc').prop('disabled', false);
            jQuery('#layer_overflow').prop('disabled', false);
            jQuery('#layer_overflow2').prop('disabled', false);
      };//End of wb3d_set_enable

  	wb3d_set_disable();

      //Change Layer Type
      jQuery('#layer_type').change(function(){
            var sn=obm.sn['0-0'];
            var old_type=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]].l_type;
            obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]].l_type=Number(jQuery('#layer_type').val());
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            for(var r=0;r<K.layer_obj;r++){
                  var obj= K['obj_num_'+r];
                  var new_type=K.l_type;
                  var l=obm.activeslide[obm.cu]+'-'+obm.s_l;
                  wb3d_set_bk(obm.wb3d_id['0_'+l+'-'+obj],obm,'0_'+l);
                  if(old_type===2&&(new_type===0||new_type>=9)){
                  }
                  else if(old_type!=2&&new_type===2&&obm.U_P[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]===0){
                        alert(jQuery('#alert_staticlayer').text());
                  }
                  else if(old_type!=2&&new_type===2&&obm.U_P[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]!=0){
                        alert(jQuery('#alert_notstaticlayer').text());
                        K.l_type=old_type;
                        jQuery('#layer_type').val(K.l_type);
                  }
                  if(new_type>=9&&new_type<=11){
                        jQuery('#tab_number').prop( 'disabled', false );
                  }
                  else{
                        jQuery('#tab_number').prop( 'disabled', true );
                  }
            }

            obm.chenge_display=[];
            obm.chenge_details_obj=[];
            obm.chenge_details_obj2=[];
      });


      // change Inputs (when Scroll or Range Slider change)
      wb3d_set_scroll_ui=function (obm,level,idg){
            if(level===0){
                  jQuery( '#spinnertop').val(obm.vscroll[idg]);
            }
            obm.putimagecanvas();
      };//End Of wb3d_set_scroll_ui

      wb3d_timer_scroll_lock_w_h=function(){
            obm.timer_scroll_w_h-=25;
            if(obm.timer_scroll_w_h<=0){
                  obm.timer_scroll_w_h=0;
                  obm.lock_scroll_w_h=0;
            return;
            }
            setTimeout(function(){
                  wb3d_timer_scroll_lock_w_h();
            },25);
      };


      //Add Style tag to head
      wb3d_checkstyle=function (id){
            id= 'wb3d_style_'+id ;
            var a=document.getElementById(id);
            if(a!=null){
                  jQuery('#'+id).empty();
            }
            if(a===null){
                  var text = document.createElement('style');
                  text.type='text/css';
                  text.id = id;
                  document.getElementsByTagName('head')[0].appendChild(text);
                  a=document.getElementById(id);
            }
      };


      wb3d_change_resize_data=function(obm,id){
            obm.chenge_details_obj[id]=-1;
            obm.chenge_details_obj2[id]=-1;
            obm.bk_change_sizew[id]=-1;
            obm.bk_change_sizeh[id]=-1;
            obm.bk_origin[id]=-1;
            obm.bk_transform1[id]=-1;
            obm.idc[id].style.perspectiveOrigin='';
            obm.idc[id].style.transformStyle='';
            obm.idd[id].style.transformStyle='';
            obm.ide[id].style.transformStyle='';
            obm.idc[id].style.perspective ='';
            obm.idd[id].style.transform=' rotateX(0deg) rotate(0deg) ';
            obm.ide[id].style.transform=' rotateX(0deg) rotate(0deg) ';
            obm.bk_transform1[id]=1;
            obm.putimagecanvas();
            setTimeout(function(){
                  obm.chenge_details_obj[id]=-1;
                  obm.chenge_details_obj2[id]=-1;
                  obm.bk_change_sizew[id]=-1;
                  obm.bk_change_sizeh[id]=-1;
                  obm.bk_origin[id]=-1;

                  obm.idc[id].style.perspectiveOrigin='';
                  obm.idc[id].style.transformStyle='';
                  obm.idd[id].style.transformStyle='';
                  obm.ide[id].style.transformStyle='';
                  obm.idc[id].style.perspective ='';
                  obm.idd[id].style.transform=' rotateX(0deg) rotate(0deg) ';
                  obm.ide[id].style.transform=' rotateX(0deg) rotate(0deg) ';
                  obm.bk_transform1[id]=-1;
                  obm.bk_transform2[id]=-1;
                  obm.putimagecanvas();
            },600);
      };


      //Show Border (Selected Layer)
      wb3d_set_border=function(obm,id1,a,b,B,idm){

            if(obm.set_border===obm.cu+'_'+id1+'-'+a+'-'+b+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l){
                  return;
            }
            obm.set_border=obm.cu+'_'+id1+'-'+a+'-'+b+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l;
            jQuery(' .move').css('display','none');
            jQuery('.ves_li').css('border','1px solid black');
            jQuery('#li-'+obm.activeslide[obm.cu]+'-'+obm.s_l).css('border','1px solid red');
            jQuery('#wb3dg-'+obm.wb3d_id[obm.cu+'_'+obm.activeslide[obm.cu]+'-'+obm.s_l+'-'+obm.s_o]+' .move').css('display','');
            jQuery('#wb3de-'+obm.wb3d_id[obm.cu+'_'+obm.activeslide[obm.cu]+'-'+obm.s_l+'-'+obm.s_o]+' .move').css('display','none');
            jQuery('#r_t-'+id1).css('left', a+'px');
            jQuery('#r_t-'+id1).css('top', (-20)+'px');
            // jQuery('#r_m-'+id1).css('left', a);
            // jQuery('#r_m-'+id1).css('top', (b/2-10)+'px');
            jQuery('#r_u-'+id1).css('left', a);
            jQuery('#r_u-'+id1).css('top', b);
            // jQuery('#m_t-'+id1).css('left', a/2-10);
            // jQuery('#m_t-'+id1).css('top', -20);
            // jQuery('#m_u-'+id1).css('left', a/2-10);
            // jQuery('#m_u-'+id1).css('top', b);
            // jQuery('#l_m-'+id1).css('left', -20);
            // jQuery('#l_m-'+id1).css('top', b/2-10);
            jQuery('#l_u-'+id1).css('left', -20);
            jQuery('#l_u-'+id1).css('top', b);
            jQuery('#l_t-'+id1).css('left', -20);
            jQuery('#l_t-'+id1).css('top',-20);
      };// End Of wb3d_set_border



      function wb3d_scr_cal(B,i){
            var scr=0;
            var ids='0_'+obm.activeslide[obm.cu];

            if(B['P_s'+obm.d]===0&&i!=0){
                  scr=scr-obm.vscrollM[ids];
            }
            else if(B['P_s'+obm.d]!=0&&i===0){
                  scr=obm.vscrollM[ids];
            }
            B['PY_'+obm.d]-=scr;
            obm.bk_t_l=[];
            obm.bk_vscroll_id1=[];
      }

      // Select Position 
      jQuery('#select_position').change(function(){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            var i=K['P_s'+obm.d];
            K['P_s'+obm.d]=Number(this.value);
            wb3d_scr_cal(K,i);
            if(K['P_s'+obm.d]===0){
                  jQuery('#align_top').val(0);
                  K['A_t'+obm.d]=0;
            }
            obm.putimagecanvas();
	});


      // Set Variable For New Layer
      function wb3d_set_new_layer(wslide,ind,dlnum){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+wslide] ][dlnum];
            jQuery('#layers_object').empty();
            K.layer_obj++;
            K.U_P=0;
            obm.U_P[sn+'-'+wslide+'-'+ind]=0;
            K.show=1;
            K.lock=0;
            for(var kg=0;kg<4;kg++){
                  K['PX_'+kg]=50+dlnum*3;
                  K['PY_'+kg]=50+dlnum*3+obm.vscrollM['0_0'];
                  K['S_'+kg]=1;
                  K['F_M'+kg]=0;
                  K['A_l'+kg]=0;
                  K['WO'+kg]=0;
                  K['HO'+kg]=0;
                  K['hide_'+kg]=0;
                  K['A_t'+kg]=0;
                  K['t_x_'+kg]=100;
                  K['t_y_'+kg]=100;
                  K['B_'+kg]=0;
                  K['C_'+kg]=0;
                  K['E_'+kg]=-100;
                  K['F_'+kg]=999999;
                  K['EA_'+kg]=-1;
                  K['EB_'+kg]=-1;
                  K['noxy'+kg]=0;
                  K['drag'+kg]=0;
                  K['P_'+kg]=0;
                  K['Pp_'+kg]=1;
                  K['P1_'+kg]=0;
                  K['P2_'+kg]=0;
                  K['Ps1_'+kg]=0;
                  K['Ps2_'+kg]=0;
                  K['P_s'+kg]=0;
                  K['repeat'+kg]=0;
                  K['slow'+kg]=0;
                  K['T_E'+kg]=5;
            }

            K.pers=0;
            obm.layers[sn+'-'+wslide]++;
            K.click_type=-1;
            K.click_newpage=0;
            obm.framenum['0_'+wslide+'-'+ind]=0;
            K.l_type=0;
            K.act=0;
            K.reset=0;
            K.pointer=0;
            K.selectable=0;
            K.sizefunc=0;
            K.overflow=1;
            K.overflow2=1;
      } // End of wb3d_set_new_layer


      jQuery('#wheel_checkbox').change(function(){
            var sn=obm.sn['0-0'];
            if(jQuery('#wheel_checkbox').is(':checked')){
                  obm.setting[sn].wheel_c=1;
            }
            else{
                  obm.setting[sn].wheel_c=0;
            }
            wb3d_setui();
      });


      jQuery('#display_scroll').change(function(){
            var sn=obm.sn['0-0'];
            if(jQuery('#display_scroll').is(':checked')){
                  obm.setting[sn].scroll=1;
            }
            else{
                  obm.setting[sn].scroll=0;
            }
            wb3d_setui();
      });


      
      // Load Setting Menu Of layer
      function wb3d_load_objects ( y1,y,A,obm) {
            var url;

            var text='<div id="div1-'+y+'-'+y1+'" style="float:left; width:135px;height:65px;overflow:hidden; float:left;position:relative; border: 3px solid black;border-radius:17px; " >';
            text+='<img  src="'+wb3d.wb3d_plagin_images_URL+'set.png" id="sett-'+y+'-'+y1+'" style="width:25px;height:25px;position:absolute;top:30px;left:99px;z-index:10" />';
            text+='<div  style="position:absolute;top:0px;left:0px;display:inline-block;padding:3px;z-index: 9;border-radius:50%;background-color: #fff;">'+y1+'</div>';
            text+='<div class="pointer" style="position:absolute;top:-3px;left:102px;z-index:10">';
            text+='<img  src="'+wb3d.wb3d_plagin_images_URL+'close3.png" id="closeobj-'+y+'-'+y1+'" style="width:20px;height:20px;margin-left:1px;" /></div>';
            text+='</div>';
            jQuery('#layers_object').append(text);
            var T=A[ 'type_obj-'+y1];
            if(T==='img')
                  url=wb3d.wb3d_plagin_URL+'includes/'+T.split('_')[0]+'/images/image.jpg';
            else if(obm.modules[T]==1)
                  url=wb3d.wb3d_plagin_URL+'modules/'+T.split('_')[0]+'/images/image.jpg';
            else
                  url=wb3d.wb3d_plagin_Pro_URL+'modules/'+T.split('_')[0]+'/images/image.jpg';
            text='<img src="'+url+'" style="width:90px;height:48px;top:9px;left:16px;position:absolute;border-radius: 5px;" />';
            jQuery('#div1-'+y+'-'+y1).append(text);
            wb3d_closeset(y+'-'+y1);
      }// End Of imgload




      // Drow Effect
      wb3d_drawcanvas=function(){

            var cont880,left2,top2,left,top;
            if(obm.bk['0_'+obm.activeslide[obm.cu]]!=Math.ceil(obm.framenum['0_'+obm.activeslide[obm.cu]]/25)){
                  jQuery('#spinnerplay').val(Math.ceil(obm.framenum['0_'+obm.activeslide[obm.cu]]/25));
                  obm.bk['0_'+obm.activeslide[obm.cu]]=Math.ceil(obm.framenum['0_'+obm.activeslide[obm.cu]]/25);
            }

            if(obm.mouse_down_canvas===1||obm.startCurved>0||obm.painttools==='stop'){
                  obm.putimagecanvas();
            }

            for(var b=0;b<2;b++){
                  if(b===0){
                        cont880=obm.ctxarray['0_'+obm.activeslide[obm.cu]];
                        top=obm.top;
                        left=obm.left;
                        top2=0;
                        left2=0;
                  }
                  else{
                        cont880=obm.ctxarray_m;
                        top=0;
                        left=0;
                        top2=-obm.top;
                        left2=-obm.left;
                  }

                  if(obm.painttools==='straight'&&obm.mouse_down_canvas===1){
                        cont880.moveTo(obm.mousexendCurved1-left2,obm.mouseyendCurved1-top2);
                        cont880.lineWidth = 5;
                        cont880.strokeStyle = '#fff'; 
                        cont880.lineTo(obm.bx-left, obm.by-top);
                        cont880.stroke();
                        cont880.closePath();   
                  }
                  if((obm.startCurved===22)&&obm.painttools==='Curved'){
                        cont880.moveTo(obm.mousexendCurved1-left2,obm.mouseyendCurved1-top2);
                        cont880.lineWidth =  5;
                        cont880.strokeStyle = '#ff0'; 
                        cont880.lineTo(obm.mousexendCurved2-left2,obm.mouseyendCurved2-top2);
                        cont880.stroke();
                        cont880.closePath();
                  }
                  if((obm.startCurved===1)&&obm.painttools==='Curved'&&obm.mouse_down_canvas===1){
                        cont880.moveTo(obm.mousexendCurved1-left2,obm.mouseyendCurved1-top2);
                        cont880.lineWidth =  5;
                        cont880.strokeStyle = '#0f0'; 
                        cont880.lineTo(obm.bx-left, obm.by-top);
                        cont880.stroke();
                        cont880.closePath();
                  }

                  if(obm.painttools==='Curved'&&obm.mouse_down_canvas===1&&obm.startCurved===3)
                  {
                        cont880.beginPath();
                        cont880.strokeStyle = '#f00'; 
                        cont880.lineWidth = 5;
                        cont880.bezierCurveTo(obm.mousexendCurved1-left2, obm.mouseyendCurved1-top2, obm.bentx-left2, obm.benty-top2, obm.mousexendCurved2-left2, obm.mouseyendCurved2-top2);
                        cont880.stroke(); 
                  }
                  if(obm.painttools==='stop'){
                        var stopimg2=document.getElementById('stopimg2');
                        cont880.drawImage(stopimg2,obm.bx-12-left,obm.by-24-top,24,24);
                  }
            }
      }; //End Of wb3d_drawcanvas Function






      jQuery('#wb3d_download_addon').click(function(){
      //       if(wb3d.wb3d_pro!=1){
                  alert(jQuery("#alert_modules").text());
      //             return;
      //       }
            // else{
            // 	//If pro version install
            	// wb3d_pro_install_new_modules();
            // }
	});

      //textmenu2 close  button
      jQuery('#textmenuclose2').click(function(){
            textmenuhide2();
            obm.new_layer=0;
      });

      // Hide textmenu2
      function textmenuhide2 (){
            jQuery( '#textmenu2' ).css('display','none' );
      }

      // save button
      jQuery('#save_all').click(function(){
            obm.statussave=1;
            wb3d_Save_All_Data(obm);
            obm.statussave=0; 
      });


      // Select Menu Type Event
      jQuery('#send_when').change(function(){
            jQuery('#div_gettime3').css('display','none');
            jQuery('#div_gettime4').css('display','none');
            jQuery('#div_gettime5').css('display','none');
            jQuery('#div_pressKey').css('display','none');
            jQuery('#div_distance').css('display','none');
            var e = document.getElementById("send_when");
            var s=0;
            if(e.options[e.selectedIndex].getAttribute('data-wb3d')!=null){
                  s=e.options[e.selectedIndex].getAttribute('data-wb3d').split(' ');
                  for(i=0;i<s.length;i++){
                        jQuery('#'+s[i]).css('display','');
                  }
            }
      }); //End of Select Menu Type Event

      // Select Menu Type Act
      jQuery('#get_type_token').change(function(){
            jQuery('#p_getact_link').css('display','none');
            jQuery('#p_getttoken_numX').css('display','none');
            jQuery('#p_token_effect').css('display','none');
            jQuery('#p_token_effect2').css('display','none');
            jQuery('#p_token_effect3').css('display','none');
            jQuery('#getttoken3').css('display','none');
            var e = document.getElementById("get_type_token");
            var s=0;
            if(e.options[e.selectedIndex].getAttribute('data-wb3d')!=null){
                  s=e.options[e.selectedIndex].getAttribute('data-wb3d').split(' ');
                  for(i=0;i<s.length;i++){
                        jQuery('#'+s[i]).css('display','');
                  }
            }
      }); //End of Select Menu Type Act




      // Event scroll (Layer Menu)
      jQuery('#slide_menu').on( 'scroll', function(){
            if(obm.mouse_slider_h1===-1){
                  var t=jQuery('#layers_menu').scrollTop();
                  t=t/obm.z_scroll_leftmenu;
                  jQuery('#slider_h1').css('top',t+'px');
            }
      });



      // Event scroll (Object Menu)
      jQuery('#object_menu').on( 'scroll', function(){
            if(obm.mouse_slider_h1===-1){
                  var t=jQuery('#object_menu').scrollTop();
                  t=t/obm.z_scroll_leftmenu;
                  jQuery('#slider_h1').css('top',t+'px');
            }
      });



      // Event scroll (Object B Menu)
      jQuery('#object2_menu').on( 'scroll', function(){
            if(obm.mouse_slider_h1===-1){
                  var t=jQuery('#object2_menu').scrollTop();
                  t=t/obm.z_scroll_leftmenu;
                  jQuery('#slider_h1').css('top',t+'px');
            }
      });


      // Event scroll (Slider Menu)
      jQuery('#slide_menu').on( 'scroll', function(){
            if(obm.mouse_slider_h1===-1){
                  var t=jQuery('#slide_menu').scrollTop();
                  t=t/obm.z_scroll_leftmenu;
                  jQuery('#slider_h1').css('top',t+'px');
            }
      });

      // Event scroll (Slider Menu)
      jQuery('#div_setting2_menu').on( 'scroll', function(){
            if(obm.mouse_slider_h1===-1){
                  var t=jQuery('#div_setting2_menu').scrollTop();
                  t=t/obm.z_scroll_leftmenu;
                  jQuery('#slider_h1').css('top',t+'px');
            }
      });

      // Event scroll (Slider Menu)
      jQuery('#effect_menu').on( 'scroll', function(){
            if(obm.mouse_slider_h1===-1){
                  var t=jQuery('#effect_menu').scrollTop();
                  t=t/obm.z_scroll_leftmenu;
                  jQuery('#slider_h1').css('top',t+'px');
            }
      });

      // Event scroll (Slider Menu)
      jQuery('#element_menu').on( 'scroll', function(){
            if(obm.mouse_slider_h1===-1){
                  var t=jQuery('#element_menu').scrollTop();
                  t=t/obm.z_scroll_leftmenu;
                  jQuery('#slider_h1').css('top',t+'px');
            }
      });

// jQuery('#wb3d_addon_img2' ).draggable({ revert: "invalid" });
// jQuery('#wb3d_addon_img2' ).draggable({  });
// jQuery('#wb3d_addon_img2'). draggable( 'enable' );
// jQuery('#wb3d_addon_img2' ).css("position","fixed");
      // jQuery('#wb3d_addon_img2').draggable();;
      jQuery('#slider_h1').draggable({
            axis: 'y',
            containment: '#slider_p1',
            start: function(event) {
                  jQuery('#slider_h1').draggable('option', 'axis', 'y');
                  obm.mouse_slider_h1=1;
            }, 
            drag: function(event, ui) {
                  var dragged= ui.helper;
                  var l1= dragged.position();
                  var t=obm.z_scroll_leftmenu*l1.top;
                  // div_setting2_menu
                
                  if(obm.tab_leftmenu=="setting2_menu")
                        jQuery('#div_setting2_menu').scrollTop (t);
                  else
                        jQuery('#'+obm.tab_leftmenu).scrollTop (t);
            },
            stop: function(event, ui) {
                  obm.mouse_slider_h1=-1;
            },
      });


      jQuery('#slider_k1').draggable({
            axis: 'y',
            containment: '#slider_parent',
            start: function(event) {
                  jQuery('#slider_k1').draggable('option', 'axis', 'y');
            }, 
            drag: function(event, ui) {
                  var dragged= ui.helper;
                  var l1= dragged.position();
                  obm.RangeSlider_val=Number(l1.top/4);
                  if(obm.RangeSlider_val<=0){
                        obm.RangeSlider_val=-1;
                        jQuery('#slider_k1').css('background-color', '#0f0');
                  }
                  else{
                        jQuery('#slider_k1').css('background-color', 'rgb(20, 70, 14)');
                  }

            },
            stop: function(event, ui) {
                  if(obm.RangeSlider_val<=0){
                        obm.RangeSlider_val=-1;
                        jQuery('#slider_k1').css('background-color', '#0f0');
                  }
                  else{
                        jQuery('#slider_k1').css('background-color', 'rgb(20, 70, 14)');
                  }
            },
      });



      jQuery('#slider_k1').mousedown(function(){
            jQuery('#slider_k1').css('box-shadow', '0px 0px 8px 3px rgba(8,110,20,1)');
      });


      jQuery('#slider_p1').mouseover(function(){
            jQuery('#slider_p1').css('opacity', '1');
      });


      jQuery('#slider_p1').mouseout(function(){
            jQuery('#slider_p1').css('opacity', '.5');
      });

      jQuery('#search_modules').keyup( function(event) {
                        jQuery("#addonsm div[tag-data!='"+this.value.toLowerCase()+"']" ).css("display","none");
                        jQuery("#addonsm2 div[tag-data!='"+this.value.toLowerCase()+"']" ).css("display","none");
                        jQuery("#addonsm div[tag-data*='"+this.value.toLowerCase()+"']" ).css("display","inline-block");
                        jQuery("#addonsm2 div[tag-data*='"+this.value.toLowerCase()+"']" ).css("display","inline-block");
                        if(this.value==""){
                              jQuery("#addonsm div" ).css("display","inline-block");
                              jQuery("#addonsm2 div" ).css("display","inline-block");
                        }
                        if(wb3d.wb3d_pro!=1){
                              jQuery("#wb3ddemom" ).css("display","");
                        }
      });
      jQuery('#search_modules2').keyup( function(event) {
                        jQuery("#addonsmb div[tag-data!='"+this.value.toLowerCase()+"']" ).css("display","none");
                        jQuery("#addonsm2b div[tag-data!='"+this.value.toLowerCase()+"']" ).css("display","none");
                        jQuery("#addonsmb div[tag-data*='"+this.value.toLowerCase()+"']" ).css("display","inline-block");
                        jQuery("#addonsm2b div[tag-data*='"+this.value.toLowerCase()+"']" ).css("display","inline-block");
                        if(this.value==""){
                              jQuery("#addonsmb div" ).css("display","inline-block");
                              jQuery("#addonsm2b div" ).css("display","inline-block");
                        }
                        if(wb3d.wb3d_pro!=1){
                              jQuery("#wb3ddemomb" ).css("display","");
                        }
      });



      // Set Css And Html in Css Tab And Html Tab
      wb3d_set_css_html=function(sn,cu){


            jQuery('#wb3d_classtext').val(obm.css[sn]);
            jQuery('#wb3d_classtext_label').text(jQuery('#wb3d_classtext_label').text()+' : .wb3d_'+obm.data_slide[cu][0].id_ves+'_class_1{  .... }');
            jQuery('#wb3d_classtext_label').click(function(){
                  jQuery('#wb3d_classtext').val(jQuery('#wb3d_classtext').val()+'\n.wb3d_'+obm.data_slide[cu][0].id_ves+'_class_1{  .... }')
            })


            jQuery('#wb3d_classtext').keyup( function(event) {
                  var x=this.value;
                  document.getElementById('wb3d_style_'+obm.data_slide[cu][0].id_ves).innerHTML=x;
            });
            jQuery('#wb3d_classtext').bind('input', function () {
                  var x=this.value;
                  document.getElementById('wb3d_style_'+obm.data_slide[cu][0].id_ves).innerHTML=x;
            });
      }; // End Of set_css_html


      jQuery("#scroll_desktop").change(function(){
            wb3d_scroll(Number(this.value));
      });
      jQuery("#scroll_desktop").keyup(function(){
            wb3d_scroll(Number(this.value));
      });

      // Set vertical Scroll value
      wb3d_scroll=function(i){
            var sn=obm.sn['0-0'];
            var K=obm.setting[sn];
            K['vmaxsc-'+obm.d]=Number(i);
            wb3d_reset_data_slider();
            wb3d_change_screen_size();
            obm.putimagecanvas();
      };


      jQuery("#slide_time").change(function(){
            wb3d_slide_time(Number(this.value));
      });
      jQuery("#slide_time").keyup(function(){
            wb3d_slide_time(Number(this.value));
      });

      //Slide Time
      wb3d_slide_time=function(i){
            var sn=obm.sn['0-0'];
            obm.slide_time[sn+'-'+obm.activeslide[obm.cu]]=Number(i);
      };



      // Set Setting menu And Top Menu value
      wb3d_setui=function(){
            var r,g,b,a;
            var sn=obm.sn['0-0'];
            r=obm.setting[sn].r1;
            g=obm.setting[sn].g1;
            b=obm.setting[sn].b1;
            a=obm.setting[sn].a1;
            jQuery('#color_bk_slider_A').css('background-color','rgba('+r+','+g+','+b+','+(a/255)+')');
            jQuery('#maincanvas').css('background-color','rgba('+r+','+g+','+b+','+(a/255)+')');
            jQuery('#height_0_spiner').val(Number(obm.setting[sn].h_0));
            jQuery('#height_1_spiner').val(Number(obm.setting[sn].h_1));
            jQuery('#height_2_spiner').val(Number(obm.setting[sn].h_2));
            jQuery('#height_3_spiner').val(Number(obm.setting[sn].h_3));
            jQuery('#width_0_spiner').val(Number(obm.setting[sn].w_0));
            jQuery('#width_1_spiner').val(Number(obm.setting[sn].w_1));
            jQuery('#width_2_spiner').val(Number(obm.setting[sn].w_2));
            jQuery('#width_3_spiner').val(Number(obm.setting[sn].w_3));

            jQuery('#wheel').val(obm.setting[sn].wheel);
            jQuery('#wheel_speed').val(obm.setting[sn].wheel_s);

            if(obm.setting[sn].wheel_c===1){
                  jQuery( '#wheel_checkbox' ).prop('checked', true);
            }
            else{
                  jQuery( '#wheel_checkbox' ).prop('checked', false);
            }


            if(obm.setting[sn].scroll===0){
                  jQuery( '#display_scroll' ).prop('checked', false);
            }
            else{
                  jQuery( '#display_scroll' ).prop('checked', true);
            }



            if(jQuery('#wheel_checkbox').is(':checked')){
                  jQuery('#wheel_speed').css( 'display', '' );
                  jQuery('#wheel').css( 'display', 'none' );
                  jQuery('#wheel_speed_label').css( 'display', '' );
                  jQuery('#wheel_label').css( 'display', 'none' );
            }
            else{
                  jQuery('#wheel_speed').css( 'display', 'none' );
                  jQuery('#wheel').css( 'display', '' );
                  jQuery('#wheel_speed_label').css( 'display', 'none' );
                  jQuery('#wheel_label').css( 'display', '' );
            }
      };// End of wb3d_setui

      jQuery('.sp-choose').click(function(){
            wb3d_get_color();	
      });

      wb3d_get_color=function(){
            var c;
            var t=jQuery('.form-control').val().split('rgba(');
            if(t===undefined){
                  return;
            }

            if(t.length>1){
                  c=t[1].split(')')[0];
            }
            else{
                  c=t[0].split(')')[0];
                  c=c.split('rgb(')[1];
            }

            if(c===undefined){
                  return;
            }

            c=c.split(',');

            if(c[3]===undefined){
                  c[3]=1;
            }



            var r=c[0];
            var g=c[1];
            var b=c[2];
            var a=parseInt(c[3]*255);

            var i;
            var sn=obm.sn['0-0'];
            if(obm.Palette===undefined){
                  obm.Palette='E-1';
            }

            var eff=jQuery('#openingeffectselect').val();

            if(obm.Palette==='color_bk_slider'){
                  obm.setting[sn].r1=r;
                  obm.setting[sn].g1=g;
                  obm.setting[sn].b1=b;
                  obm.setting[sn].a1=a;
            }
            else if(obm.Palette.split('-')[0]==='E'){
                  var id1=obm.Palette.split('-')[1];

                  i=obm.location_of_effect[sn+'-'+eff];
                  i*=8;
                  if(id1==='1'){
                        obm.effect_color[sn][i]=r;
                        obm.effect_color[sn][i+1]=g ;
                        obm.effect_color[sn][i+2]=b ;
                        obm.effect_color[sn][i+3]=a ;
                        c='rgba('+obm.effect_color[sn][i]+','+obm.effect_color[sn][i+1]+','+obm.effect_color[sn][i+2]+','+obm.effect_color[sn][i+3]/255+')';
                        jQuery('#demo_layer_color_A').css('background-color',c);
                  }
                  else{
                        obm.effect_color[sn][i+4]=r;
                        obm.effect_color[sn][i+5]=g ;
                        obm.effect_color[sn][i+6]=b ;
                        obm.effect_color[sn][i+7]=a ;
                        c='rgba('+obm.effect_color[sn][i+4]+','+obm.effect_color[sn][i+5]+','+obm.effect_color[sn][i+6]+','+obm.effect_color[sn][i+7]/255+')';
                        jQuery('#demo_layer_color_B').css('background-color',c);
                  }
            }
            else{
                  i=obm.Palette.split('-')[1];
                  var u=obm.Palette.split('-')[2];
                  obm.r[sn+'-'+i+'-'+u]=r;
                  obm.g[sn+'-'+i+'-'+u]=g ;
                  obm.b[sn+'-'+i+'-'+u]=b ;
                  obm.a[sn+'-'+i+'-'+u]=a ;
                  obm.color_loading='rgba('+obm.r[sn+'-'+i+'-'+u]+','+obm.g[sn+'-'+i+'-'+u]+','+obm.b[sn+'-'+i+'-'+u]+','+obm.a[sn+'-'+i+'-'+u]+')';
                  jQuery('#'+obm.Palette+' div').css('background-color','rgba('+obm.r[sn+'-'+i+'-'+u]+','+obm.g[sn+'-'+i+'-'+u]+','+obm.b[sn+'-'+i+'-'+u]+','+(obm.a[sn+'-'+i+'-'+u]/255)+')');
            }



            if(obm.documenttimer300!=1){
                  obm.documenttimer300=1;

                  setTimeout(function(){
                        if(typeof(wb3d_saveeffectframerat) === "function"&&eff!=-1){
                              wb3d_saveeffectframerat(eff,sn,obm.gs[sn][eff],obm);
                        }
                        wb3d_setui();
                        wb3d_set_slide_value(obm.activeslide[obm.cu],0,obm);
                        wb3d_set_colortable();
                        obm.putimagecanvas();
                        obm.chenge_details_obj2=[];
                        obm.chenge_details_obj=[];
                        obm.bk_responsive=[];
                        obm.documenttimer300=-1;
                  },300);
            }
      };


      wb3d_drag_slide=function(id){
            jQuery('.wb3d_draggable_s').draggable({
                  start: function (event, ui) {
                        obm.drag_slide=1;
                  },
                  drag:function( event, ui ) {
                        var id=this.id.split('-')[1];
                        obm.left=jQuery('#wb3dh-'+id).position().left;
                        obm.top=jQuery('#wb3dh-'+id).position().top;
                        obm.putimagecanvas();
                        // jQuery('#uptext').val(obm.top);
                        // jQuery('#downtext').val(-obm.top);
                        // jQuery('#lefttext').val(obm.left);
                        // jQuery('#righttext').val(-obm.left);
                  },
                  stop:function( event, ui ) {
                        var id=this.id.split('-')[1];
                        obm.left=jQuery('#wb3dh-'+id).position().left;
                        obm.top=jQuery('#wb3dh-'+id).position().top;
                        obm.drag_slide=-1;
                        obm.putimagecanvas();
                  } 
            });
      };

      wb3d_check_scale=function(obm,fx,ex,bc,B,eff,frm){
            var gs=obm.gs;
            var sn=obm.sn['0-0'];
            var tx,ty,tx2,ty2;

            if(typeof(wb3d_remove_selectet_effect_token)!= "function"||eff==-1){
                  return 0;
            }

            if(gs[sn][eff].E[0][17]!=0){
                  tx=gs[sn][eff].E[17][frm]/100;
            }
            else{
                  tx=1;
            }

            if(gs[sn][eff].E[0][18]!=0){
                  ty=gs[sn][eff].E[18][frm]/100;
            }
            else{
                  ty=1;
            }

            if(gs[sn][eff].E[0][19]!=0){
                  tx2=gs[sn][eff].E[19][frm]/100;
            }
            else{
                  tx2=1;
            }

            if(gs[sn][eff].E[0][20]!=0){
                  ty2=gs[sn][eff].E[20][frm]/100;
            }
            else{
                  ty2=1;
            }

            if(ty!=1||tx!=1||ty2!=1||tx2!=1){
                  alert(jQuery('#alert_scale').text());
                  return 1;
            }
            return 0;
      };



      wb3d_set_wb3d_sub_scroll_data=function(obm){
            obm.wb3d=[];
            obm.wb3dB=[];
            obm.wb3dY=[];         
            var sn=obm.sn['0-0'];
            var i,F;
            var s=obm.activeslide[0];
            for(var is=1;is<obm.layers[sn+'-'+s];is++){
                  var ii=obm.la_l[sn+'-'+s+'-'+is];
                  F=obm.dataslide[sn][ obm.los[sn+'-'+s] ][is];

         
                  for(var r=0;r<F.layer_obj;r++){
                        t= F['obj_num_'+r];

                        if(F[ 'type_'+t]==='wb3d'){
                              var    idm=obm.wb3d_id['0_'+s+'-'+ii+'-'+t];
                              var idg='0_'+idm;
                              var wslide=s;
                              var ne=ii;
                              var B=F;
                              var y=t;

                              if(obm.U_P[sn+'-'+wslide+'-'+ne]==0){
                                    B['PY2_'+obm.d]=B['PY_'+obm.d];

                              }
                              else{
                                    var id=obm.U_P[sn+'-'+wslide+'-'+ne].split('-');
                                    F=obm.dataslide[sn][obm.los[sn+'-'+wslide]][  obm.lo_l[sn+'-'+wslide+'-'+id[0]]];
                                    B['PY2_'+obm.d]=F['PY_'+obm.d];
                              }
                              if(B['reverse_'+y]==1){
                                    obm.ajaxwb3d_reverse[idg]=1;
                              }
                              else{
                                    obm.ajaxwb3d_reverse[idg]=0;
                              }

                              obm.vscroll[idg]=0;

                              obm.deltaflag['v-'+B['slider_'+y]]=1;

                              var tmp=[];
                              var tmpB=[];
                              var tmpY=[];

                              var j=0;

                              var fl=0;
                              if(obm.wb3d[0]===undefined){
                                    obm.wb3d[0]=idg;
                                    obm.wb3dB[0]=B;
                                    obm.wb3dY[0]=y;
                                    tmp[0]=idg;
                                    tmpB[0]=B;
                                    tmpY[0]=y;
                              }
                              else{
                                    for(i=0;i<300;i++){
                                          if(obm.wb3d[i]===undefined&&fl===1){
                                                break;
                                          }
                                          else if(obm.wb3d[i]===undefined&&fl===0){
                                                tmp[j]=idg;
                                                tmpB[j]=B;
                                                tmpY[j]=y;
                                                break;
                                          }

                                          else{

                                                if(obm.wb3dB[i]['PY2_'+obm.d]-(obm.wb3dB[i]['mt'+obm.d+'_'+y]*obm.setting[sn]['h_'+obm.d]/100)>B['PY2_'+obm.d]-(B['mt'+obm.d+'_'+y]*obm.setting[sn]['h_'+obm.d]/100)&&fl===0){

                                                      tmp[j]=idg;

                                                      tmpB[j]=B;
                                                      tmpY[j]=y;
                                                      j++;

                                                      tmp[j]=obm.wb3d[i];

                                                      tmpB[j]=obm.wb3dB[i];
                                                      tmpY[j]=obm.wb3dY[i];
                                                      j++;
                                                      fl=1;
                                                }
                                                else{
                                                      tmp[j]=obm.wb3d[i];
                                                      tmpB[j]=obm.wb3dB[i];
                                                      tmpY[j]=obm.wb3dY[i];
                                                      j++;
                                                }
                                          }
                                    }
                              }

                              delete obm.wb3d;
                              delete obm.wb3dB;
                              delete obm.wb3dY;
                              obm.wb3d=[];
                              obm.wb3dB=[];
                              obm.wb3dY=[];

                              for(i=0;i<300;i++){

                                    if(tmpB[i]===undefined){
                                          break;
                                    }

                                    obm.wb3d[i]=tmp[i];
                                    obm.wb3dB[i]=tmpB[i];
                                    obm.wb3dY[i]=tmpY[i];

                              }
                        }
                  }
            }
      };

      //  dragable Function for layer
      wb3d_drag_obj=function(id,tmp,flag){

            jQuery(id).draggable({
                  start: function (event, ui) {
                        obm.act_drop=0;
                        var id=this.id.split('-')[1];
                        id=obm.wb3d_ids[id].split('_')[1];
                        id=id.split('-');
                        var fx=Number(id[0]);
                        var ex=id[1];
                        var bc=id[2];
                        var id1=obm.wb3d_id['0_'+fx+'-'+ex+'-'+bc];
                                     
                        var currTrans = jQuery('#wb3dg-'+obm.wb3d_id['0_'+fx+'-'+ex+'-'+bc]).css('transform').split(/[()]/)[1];
                        if(currTrans!=undefined){
                              obm.translateX = currTrans.split(',')[4];
                              obm.translateY = currTrans.split(',')[5];                              
                        }
                        else{
                              obm.translateX=0;
                              obm.translateY=0;
                        }


                        if(obm.translateX ===undefined){
                              obm.translateX=0;
                        }

                        if(obm.translateY ===undefined){
                              obm.translateY=0;
                        }
                        obm.tmpidmm=obm.activeslide[obm.cu]+'-'+obm.s_l;
                        jQuery('#wb3dg-'+id1).css('transform','translate(0px,0px) ');
                        obm.tmp_x=jQuery('#wb3dg-'+id1).position().left;
                        obm.tmp_y=jQuery('#wb3dg-'+id1).position().top;
                        obm.drag_m=1;
                  },
                  stop:function( event, ui ) {
                        var sn=obm.sn['0-0'];
                        var id1=this.id.split('-')[1];
                        var id=obm.wb3d_ids[id1].split('_')[1];
                        id=id.split('-'); 
                        var fx=Number(id[0]);
                        var ex=id[1];
                        var bc=id[2];

                        if(fx!=obm.activeslide[obm.cu]){
                              obm.chenge_details_obj[id1]=-2;
                              obm.chenge_details_obj2[id1]=-2;
                              obm.bk_transform2[id1]=-1;
                              obm.bk_vscroll_id1[id1]=-1;
                              obm.bk_t_l[id1]=-1;
                              return;
                        }

                        var F=obm.dataslide[sn][ obm.los[sn+'-'+fx] ][obm.lo_l[sn+'-'+fx+'-'+ex]  ];

                        if(F.lock!=1){

                              id=fx+'-'+ex+'-'+bc;
                              var x=ui.position.left;
                              var y=ui.position.top;
                              if(isNaN(F['PX_'+obm.d])===true||F['PX_'+obm.d]===null){
                                    F['PX_'+obm.d]=0;
                              }
                              if(isNaN(F['PY_'+obm.d])===true||F['PY_'+obm.d]===null){
                                    F['PY_'+obm.d]=0;
                              }

                              if(obm.act_drop!=1){
                                    F['PX_'+obm.d]+=(x-obm.translateX-obm.tmp_x);
                                    F['PY_'+obm.d]+=(y-obm.translateY-obm.tmp_y);
                              }
                              else{
                                    F['PX_'+obm.d]=20;
                                    F['PY_'+obm.d]=20;
                              }
                        }
                        obm.chenge_details_obj=[];
                        obm.chenge_details_obj2[id1]=-1;
                        obm.bk_transform2[id1]=-1;
                        obm.bk_t_l[id1]=-1;
                        obm.bk_t_l2[id1]=-1;
                        obm.flag_bl2['0_0']=0;
                        obm.bk_vscroll_id1[id1]=-1;
                        setTimeout(function(){
                              obm.putimagecanvas();
                              wb3d_set_slide_value(obm.activeslide[obm.cu],1,obm);
                        },200);
                  } 
            });
      };


      // Tags for Selected Layer
      wb3d_set_textx=function (idm){  
            var textx='';
            var p='position:absolute;';
            var c1='<img class="move" src="'+wb3d.wb3d_plagin_images_URL+'au.png" id="l_t-'+idm+'" style="'+p;
            var c2='<img class="move" src="'+wb3d.wb3d_plagin_images_URL+'au.png" id="l_u-'+idm+'" style="'+p;
            // var c3='<img class="move" src="'+wb3d.wb3d_plagin_images_URL+'au.png" id="l_m-'+idm+'" style="'+p;
            // var c4='<img class="move" src="'+wb3d.wb3d_plagin_images_URL+'au.png" id="m_u-'+idm+'" style="'+p;
            // var c5='<img class="move" src="'+wb3d.wb3d_plagin_images_URL+'au.png" id="m_t-'+idm+'" style="'+p;
            var c6='<img class="move" src="'+wb3d.wb3d_plagin_images_URL+'au.png" id="r_t-'+idm+'" style="'+p;
            var c7='<img class="move" src="'+wb3d.wb3d_plagin_images_URL+'au.png" id="r_u-'+idm+'" style="'+p;

            var cp='<img title="Edit Content" class="pen wb3d_pointer" src="'+wb3d.wb3d_plagin_images_URL+'pen.png" id="pen-'+idm+'" style="'+p;
            var cc='<img title="Edit Layer" class="pen2 wb3d_pointer" src="'+wb3d.wb3d_plagin_images_URL+'pen2.png" id="pen2-'+idm+'" style="'+p;
            // var c8='<img class="move" src="'+wb3d.wb3d_plagin_images_URL+'au.png" id="r_m-'+idm+'" style="'+p;
            var d='border:1px black solid;width:20px;height:20px;display:none"/>';

            var dp='background-color: #ccc;width:20px;height:20px;"/>';
            var dc='background-color: #ccc;width:20px;height:20px;"/>';



            textx=c1+d;
            textx+=c2+d;
            // textx+=c3+d;
            // textx+=c4+d;
            // textx+=c5+d;
            textx+=c6+d;
            textx+=c7+d;

            textx+=cp+dp;
            textx+=cc+dc;
            // textx+=c8+d;
            return textx;
      };


      //Show color Menu
      wb3d_showflat=function(){
            jQuery('.cpBG').css("display","");
      };

      jQuery('#demo_layer_color_1').click(function(){
            wb3d_showflat();
            obm.Palette='E-1';
      }); 

      jQuery('#demo_layer_color_2').click(function(){
            wb3d_showflat();
            obm.Palette='E-2';
      }) ;


      jQuery('#label_copy_laptop').click(function(){
            if (confirm(jQuery('#alert_confirm4').text())) {
                  wb3d_copy_1_to_2(0);
                  wb3d_change_screen_size();
                  wb3d_reset_data_slider(obm.activeslide[obm.cu]);
                  obm.framenum['0_'+obm.activeslide[obm.cu]+'-'+0]=0;
                  wb3d_reset_data_slider(obm.activeslide[obm.cu]);
                  obm.chenge_details_obj2=[];
                  obm.chenge_details_obj=[];
                  obm.bk_responsive=[];
                  var sn=obm.sn['0-0'];
                  var K=obm.setting[sn];
                  K['vmaxsc-'+1]=K['vmaxsc-'+0];
                  wb3d_change_screen_size();
            }
      });

      jQuery('#label_copy_laptop2').click(function(){
            if (confirm(jQuery('#alert_confirm5').text())) {
                  wb3d_copy_1_to_2(1);
                  wb3d_change_screen_size();
                  wb3d_reset_data_slider(obm.activeslide[obm.cu]);
                  obm.framenum['0_'+obm.activeslide[obm.cu]+'-'+0]=0;
                  wb3d_reset_data_slider(obm.activeslide[obm.cu]);
                  obm.chenge_details_obj2=[];
                  obm.chenge_details_obj=[];
                  obm.bk_responsive=[];
                  var sn=obm.sn['0-0'];
                  var K=obm.setting[sn];
                  K['vmaxsc-'+1]=K['vmaxsc-'+0];
                  wb3d_change_screen_size();
            }
      });




      jQuery('#label_copy_tablet').click(function(){
            if (confirm(jQuery('#alert_confirm6').text())) {
                  wb3d_copy_2_to_3(0);
                  wb3d_change_screen_size();
                  wb3d_reset_data_slider(obm.activeslide[obm.cu]);
                  obm.framenum['0_'+obm.activeslide[obm.cu]+'-'+0]=0;
                  wb3d_reset_data_slider(obm.activeslide[obm.cu]);
                  obm.chenge_details_obj2=[];
                  obm.chenge_details_obj=[];
                  obm.bk_responsive=[];
                  var sn=obm.sn['0-0'];
                  var K=obm.setting[sn];
                  K['vmaxsc-'+2]=K['vmaxsc-'+1];
                  wb3d_change_screen_size();
            }
      });
      jQuery('#label_copy_tablet2').click(function(){
            if (confirm(jQuery('#alert_confirm7').text())) {
                  wb3d_copy_2_to_3(1);
                  wb3d_change_screen_size();
                  wb3d_reset_data_slider(obm.activeslide[obm.cu]);
                  obm.framenum['0_'+obm.activeslide[obm.cu]+'-'+0]=0;
                  wb3d_reset_data_slider(obm.activeslide[obm.cu]);
                  obm.chenge_details_obj2=[];
                  obm.chenge_details_obj=[];
                  obm.bk_responsive=[];
                  var sn=obm.sn['0-0'];
                  var K=obm.setting[sn];
                  K['vmaxsc-'+2]=K['vmaxsc-'+1];
                  wb3d_change_screen_size();
            }
      });





      jQuery('#label_copy_mobile').click(function(){
            if (confirm(jQuery('#alert_confirm8').text())) {
                  wb3d_copy_3_to_4(0);
                  wb3d_change_screen_size();
                  wb3d_reset_data_slider(obm.activeslide[obm.cu]);
                  obm.framenum['0_'+obm.activeslide[obm.cu]+'-'+0]=0;
                  wb3d_reset_data_slider(obm.activeslide[obm.cu]);
                  obm.chenge_details_obj2=[];
                  obm.chenge_details_obj=[];
                  obm.bk_responsive=[];
                  var sn=obm.sn['0-0'];
                  var K=obm.setting[sn];
                  K['vmaxsc-'+3]=K['vmaxsc-'+2];
                  wb3d_change_screen_size();
            }
      });

      jQuery('#label_copy_mobile2').click(function(){
            if (confirm(jQuery('#alert_confirm9').text())) {
                  wb3d_copy_3_to_4(1);
                  wb3d_change_screen_size();
                  wb3d_reset_data_slider(obm.activeslide[obm.cu]);
                  obm.framenum['0_'+obm.activeslide[obm.cu]+'-'+0]=0;
                  wb3d_reset_data_slider(obm.activeslide[obm.cu]);
                  obm.chenge_details_obj2=[];
                  obm.chenge_details_obj=[];
                  obm.bk_responsive=[];
                  var sn=obm.sn['0-0'];
                  var K=obm.setting[sn];
                  K['vmaxsc-'+3]=K['vmaxsc-'+2];
                  wb3d_change_screen_size();
            }
      });

      function wb3d_copy_1_to_2(flag2){
                  var sn=obm.sn['0-0'];
                  var flag=1;
                  var cx=1;
                  var cy=0;
                  var g=1;
                  var h=0;
                  var ax=obm.setting[sn].w_0/obm.setting[sn].w_1;
                  var ay=obm.setting[sn].h_0/obm.setting[sn].h_1;

                  wb3d_copy_n_to_n(flag2,sn,flag,cx,cy,g,h,ax,ay);
      }
      function wb3d_copy_2_to_3(flag2){
                  var sn=obm.sn['0-0'];
                  var flag=1;
                  var cx=2;
                  var cy=1;
                  var g=2;
                  var h=1;
                  var ax=obm.setting[sn].w_1/obm.setting[sn].w_2;
                  var ay=obm.setting[sn].h_1/obm.setting[sn].h_2;
                  wb3d_copy_n_to_n(flag2,sn,flag,cx,cy,g,h,ax,ay);
      }
      function wb3d_copy_3_to_4(flag2){
            var sn=obm.sn['0-0'];
            var flag=1;
            var cx=3;
            var cy=2;
            var g=3;
            var h=2;
            var ax=obm.setting[sn].w_2/obm.setting[sn].w_3;
            var ay=obm.setting[sn].h_2/obm.setting[sn].h_3;
            wb3d_copy_n_to_n(flag2,sn,flag,cx,cy,g,h,ax,ay);
      }

      function wb3d_copy_n_to_n(flag2,sn,flag,cx,cy,g,h,ax,ay){
            var s=obm.activeslide[0];
            for(i=1;i<obm.layers[sn+'-'+s];i++){
                  var F=obm.dataslide[sn][ obm.los[sn+'-'+s] ][i];
                  var zz=obm.dataslide[sn];
                  var z=obm.los[sn+'-'+s];
                  var l=obm.la_l[sn+'-'+s+'-'+i];
                  F['t_x_'+g]=F['t_x_'+h];
                  F['t_y_'+g]=F['t_y_'+h];   
                  if(obm.U_P[sn+'-'+s+'-'+l]!=0&&flag2==1){
                        F['PX_'+g]=F['PX_'+h];
                        F['PY_'+g]=F['PY_'+h];                              
                  }
                  else{
                        F['PX_'+g]=F['PX_'+h]/ax;
                        F['PY_'+g]=F['PY_'+h]/ay;
                        if(F['noxy'+h]==0){
                              F['t_x_'+g]=F['t_x_'+h]/ax;
                              F['t_y_'+g]=F['t_y_'+h]/ay;
                        }
                  }

                  F['B_'+g]=F['B_'+h];
                  F['E_'+g]=F['E_'+h];
                  
                  F['S_'+g]=F['S_'+h];
                  F['F_M'+g]=F['F_M'+h];
                  F['A_l'+g]=F['A_l'+h];
                  F['WO'+g]=F['WO'+h];
                  F['HO'+g]=F['HO'+h];
                  F['hide_'+g]=F['hide_'+h];
                  F['A_t'+g]=F['A_t'+h];
                  F['C_'+g]=F['C_'+h];
                  F['F_'+g]=F['F_'+h];
                  F['EA_'+g]=F['EA_'+h];
                  F['EB_'+g]=F['EB_'+h];
                  F['noxy'+g]=F['noxy'+h];
                  F['drag'+g]=F['drag'+h];
                  F['P_'+g]=F['P_'+h];
                  F['Pp_'+g]=F['Pp_'+h];
                  F['P1_'+g]=F['P1_'+h];
                  F['P2_'+g]=F['P2_'+h];
                  F['Ps1_'+g]=F['Ps1_'+h];
                  F['Ps2_'+g]=F['Ps2_'+h];
                  F['P_s'+g]=F['P_s'+h];
                  F['repeat'+g]=F['repeat'+h];
                  F['slow'+g]=F['slow'+h];
                  F['T_E'+g]=F['T_E'+h];

                  for(var r=0;r<F.layer_obj;r++){
                        t= F['obj_num_'+r];
                        var T=F[ 'type_obj-'+t];
                        if(obm.U_P[sn+'-'+s+'-'+l]!=0&&flag2==1){
                              obm.savedata[T](zz,z,i,t,T,F,flag,cx,cy,1,1,flag2);
                        }
                        else{
                              obm.savedata[T](zz,z,i,t,T,F,flag,cx,cy,ax,ay,flag2);
                        }
                  }
            }
            wb3d_reset_data_slider();
      }
      jQuery('#textmenu2').css('display','none');
      jQuery('#colormenu').css('display','none');
      jQuery('#wheel_speed_label').css('display','none');
      jQuery('#wheel_speed').css('display','none');
      jQuery('#wheel_label2').css('display','none');
      jQuery('#wb3d_fontfamily_sample').css('display','none');
      jQuery('#wb3d_fontfamily_sample').css('z-index',99999999);
      jQuery('.content_b').css('display','none');
      jQuery('#div_setting').css('display','');

      // // Tab Random
      // jQuery('#tab_replace').click(function(){
      //       jQuery('.tab_b').css('top','5px');
      //       jQuery('#tab_replace').css('top','12px');
      //       jQuery('.content_b').css('display','none');
      //       jQuery('#div_random').css('display','');
      // });

      // Tab Setting
      jQuery('#tab_setting').click(function(){
            jQuery('.tab_b').css('top','5px');
            jQuery('#tab_setting').css('top','12px');
            jQuery('.content_b').css('display','none');
            jQuery('#div_setting').css('display','');
      });

      // Tab Css
      // jQuery('#tab_css').click(function(){
      //       jQuery('.tab_b').css('top','5px');
      //       jQuery('#tab_css').css('top','12px');
      //       jQuery('.content_b').css('display','none');
      //       jQuery('#div_tab_css').css('display','');
      // });


      jQuery( '.editeffect' ).draggable({ containment: '#start_sub', scroll: false });
      // jQuery( '#textmenu2' ).draggable({ containment: '#start_sub', scroll: true });
      jQuery( '#colormenu' ).draggable({ containment: '#start_sub', scroll: false });
      jQuery('#div_LayerColors').draggable();


      // Set Slide/Layer Value
      wb3d_set_slide_value=function  (ii,flag,obm){
            wb3d_setui();
            var j,K;
            jQuery('#layers_object').empty();
            var sn=obm.sn['0-0'];
            obm.activeslide[obm.cu]=ii;
            var B=obm.dataslide[sn][obm.los[sn+'-'+ii]];
            B[0].slide_r=obm.color1[sn+'-'+obm.activeslide[obm.cu]];
            // jQuery('#select_layer').empty();
            var txt='<option value="-1">None</option>';
            for(j=1;j<=obm.layers[sn+'-'+obm.activeslide[obm.cu]]-1;j++){
                  var c=obm.la_l[sn+'-'+obm.activeslide[obm.cu]+'-'+j];
                  txt+= '<option value="'+c+'">'+c+'</option>';
            }
            // jQuery('#select_layer').append(txt);
            // jQuery('#select_layer').val(obm.s_l);
            jQuery('#color_slide').val((obm.color1[sn+'-'+ii])) ;
            var F=obm.dataslide[sn][ obm.los[sn+'-'+ii] ][0];
            var S=obm.dataslide[sn][ obm.los[sn+'-'+ii] ][0];
            jQuery('#block_relative').val(Number(F['bl_'+obm.d]));
            if(obm.s_l===-1){
                  // jQuery('#select_layer').val(-1);
            }
            else if(obm.s_l!=-1){

                  wb3d_set_enable();
                  K=obm.dataslide[sn][ obm.los[sn+'-'+ii] ][obm.lo_l[sn+'-'+ii+'-'+obm.s_l]];
                  jQuery('#effect_0').val(K['EA_'+obm.d]);
                  jQuery('#noxy').val(K['noxy'+obm.d]);
                  jQuery( '#run_after_v_scroll' ).val(K['B_'+obm.d]);
                  jQuery( '#run_to_v_scroll' ).val(K['E_'+obm.d]);
                  jQuery('#click-newpage').val(K.click_newpage);
                  jQuery('#act_event').val(K.act);
                  jQuery('#layer_reset').val(K.reset);
                  jQuery('#layer_pointer').val(K.pointer);
                  jQuery('#layer_selectable').val(K.selectable);
                  jQuery('#layer_sizefunc').val(K.sizefunc);
                  jQuery('#layer_overflow').val(K.overflow);
                  jQuery('#layer_overflow2').val(K.overflow2);

                  jQuery('#click-link').val(K.click_link);
                  jQuery('#layer_type').val( K.l_type); 

                  if((K.l_type>=9&&K.l_type<=11)||K.l_type===13){
                        jQuery('#tab_number').prop( 'disabled', false );
                        jQuery('#tab_number').val( K.tab);
                  } 
                  else{
                        jQuery('#tab_number').prop( 'disabled', true );
                        jQuery('#tab_number').val( 0);
                  }
                  jQuery('#select_parallex').val(K['P_'+obm.d]);
                  jQuery('#parallax_selectmenu1').val(K['P1_'+obm.d]);
                  jQuery('#parallax_selectmenu2').val(K['P2_'+obm.d]);
                  jQuery('#parallax_spinner1').val(K['Ps1_'+obm.d]);
                  jQuery('#parallax_spinner2').val(K['Ps2_'+obm.d]);
                  jQuery('#layers_object').empty();

                  for(j=0;j<K.layer_obj;j++){
                        wb3d_load_objects(K['obj_num_'+j],(ii+'-'+obm.s_l),K,obm);
                  }
                  wb3d_func_let_status(5,1);
                  var tmpclick=B[obm.lo_l[sn+'-'+ii+'-'+obm.s_l]].click_type;
                  jQuery('#click-type').val(tmpclick) ;

                  if(tmpclick===9||tmpclick===10||tmpclick===5||tmpclick===6){
                        jQuery('#click-link').prop('disabled', false);
                  }
                  else if(tmpclick===21){
                        jQuery('#click-link').prop('disabled', false);
                  }
                  else if(tmpclick===0){
                        jQuery('#click-link').prop('disabled', false);
                        jQuery('#click-newpage').prop('disabled', false);
                  }
                  else{
                        jQuery('#click-link').prop('disabled', 'disabled');
                        jQuery('#click-newpage').prop('disabled', 'disabled');
                  }


                  jQuery('#sizex_right_menu').val(B[obm.lo_l[sn+'-'+ii+'-'+obm.s_l]]['t_x_'+obm.d]/100);
                  jQuery('#sizey_right_menu').val( B[obm.lo_l[sn+'-'+ii+'-'+obm.s_l]]['t_y_'+obm.d]/100); 
                  jQuery('#start_after').val( K['C_'+obm.d]); 
                  jQuery('#end_To').val( K['F_'+obm.d]); 
                  K=obm.dataslide[sn][ obm.los[sn+'-'+ii] ][obm.lo_l[sn+'-'+ii+'-'+obm.s_l]];
                  jQuery('#select_auto_repeat').val(K['repeat'+obm.d]);
                  jQuery('#select_auto_slow').val( K['slow'+obm.d]);
                  jQuery('#selecttimeorscroll').val(K['T_E'+obm.d]);

                  if(K['T_E'+obm.d]===5||K['T_E'+obm.d]===10||K['T_E'+obm.d]===11){
                        jQuery('#select_auto_repeat').prop('disabled', 'disabled');
                        jQuery('#select_auto_slow').prop('disabled', 'disabled');
                  }
                  else if(K['T_E'+obm.d]>=6&&K['T_E'+obm.d]<=9){
                        jQuery('#select_auto_repeat').prop('disabled', 'disabled');
                        jQuery('#select_auto_slow').removeAttr('disabled');
                  }
                  else if(K['T_E'+obm.d]===0){
                        jQuery('#select_auto_repeat').removeAttr('disabled');
                        jQuery('#select_auto_slow').prop('disabled', 'disabled');
                  }
                  else{
                        jQuery('#select_auto_repeat').removeAttr('disabled');
                        jQuery('#select_auto_slow').removeAttr('disabled');
                  }

                  jQuery('#select_position').val(K['P_s'+obm.d]);
                  jQuery('#show_in_range').val(K['hide_'+obm.d]);
                  jQuery('#align_left').val(K['A_l'+obm.d]);
                  jQuery('#align_top').val(K['A_t'+obm.d]);
                  jQuery('#width_res').val(K['WO'+obm.d]);
                  jQuery('#height_res').val(K['HO'+obm.d]);
                  jQuery('#pers_type').val(K.pers);
                  jQuery('#x_right_menu').val(Number(K['PX_'+obm.d]));
                  jQuery('#y_right_menu').val(Number(K['PY_'+obm.d]));

                  if(K['font'+obm.s_o]!=1){
                        jQuery('#f_right_menu').prop('disabled', true);
                        jQuery('#w_right_menu').prop('disabled', false);
                        jQuery('#h_right_menu').prop('disabled', false);
                        jQuery('#h_right_menu').val(K['sizey_'+obm.d+'-'+obm.s_o]);
                        jQuery('#w_right_menu').val(K['sizex_'+obm.d+'-'+obm.s_o]);
                  }
                  else{

                        if(K['type_line_'+obm.s_o]==='normal'){
                              jQuery('#f_right_menu').prop('disabled', false);
                              jQuery('#h_right_menu').prop('disabled', true);
                              jQuery('#w_right_menu').prop('disabled', false);
                              jQuery('#f_right_menu').val(Number( K['fs_'+obm.d+'-'+obm.s_o]));
                              jQuery('#w_right_menu').val(K['sizex_'+obm.d+'-'+obm.s_o]);
                        }
                        else{
                              jQuery('#w_right_menu').prop('disabled', true);
                              jQuery('#h_right_menu').prop('disabled', true);
                              jQuery('#f_right_menu').prop('disabled', false);
                              jQuery('#f_right_menu').val(Number( K['fs_'+obm.d+'-'+obm.s_o]));
                        }
                  }
            } 

            var tmp=(obm.slidnum[sn]*122);
            jQuery('#divtitleslide2').width(tmp);
            jQuery('#scrollid1-1').width(tmp);   
            jQuery('#slide_select_1').val(S['E_'+obm.d]);
            jQuery('#slide_cursor').val(S.cursor);
            jQuery('#colortype').val(obm.setting[sn].colortype);
            jQuery('#touch').val(obm.setting[sn].touch);
            jQuery('#fullwidth').val(obm.setting[sn].fullwidth);
            jQuery('#reset_scroll').val(obm.setting[sn].reset);
            jQuery('#reset_scroll2').val(obm.setting[sn].reset2);
            jQuery('#colortable_to').val(obm.setting[sn].maxColorTable);
            jQuery( '#slide_time' ).val(obm.slide_time[sn+'-'+ii]);
            jQuery( '#scroll_desktop' ).val(obm.setting[sn]['vmaxsc-'+obm.d]);
      };//End Of wb3d_set_slide_value

      jQuery("#color_slide").change(function(){
            wb3d_change_slide_color(Number(this.value));
      });
      jQuery("#color_slide").keyup(function(){
            wb3d_change_slide_color(Number(this.value));
      });
      // change Slide color
      wb3d_change_slide_color=function (i){
            var sn=obm.sn['0-0'];
            obm.color1[sn+'-'+obm.activeslide[obm.cu]]=Number(i);
            wb3d_set_colortable();
            wb3d_set_slide_value(obm.activeslide[obm.cu],0,obm);
      };


      wb3d_set_colortable=function(){
            var sn=obm.sn['0-0'];
            var t=obm.setting[sn]['c'+obm.sColortable] ;
            var c= sn+'-'+t+'-'+obm.color1[sn+'-'+obm.activeslide[obm.cu]];
            c='rgba('+obm.r[c]+','+obm.g[c]+','+obm.b[c]+',1)';
            for(var t1=0;t1<10;t1++){
                  jQuery('#colorTable'+t1).css('border','0px solid #00f');
            }

            jQuery('#colorTable'+obm.sColortable ).css('border','2px solid #00f');
            jQuery('#wb3dh-'+obm.wb3d_id['0_'+obm.activeslide[obm.cu]]).css('background-color',c);
            jQuery('#wb3dh-'+obm.wb3d_id['0_'+obm.activeslide[obm.cu]]).css('z-index',10);
            obm.bk_Tcolor['0_'+obm.activeslide[obm.cu]]=c;
            obm.chenge_details_obj2=[];
            obm.chenge_details_obj=[];
            obm.bk_responsive=[];
      };



      // Select Main Color
      for(var t=0;t<10;t++){
            setTimeout((function(obm,t,jQuery,wb3d_set_colortable) {
                  jQuery('#colorTable'+t).click(function(){
                        obm.sColortable=Number(this.id.split('colorTable')[1]);
                        wb3d_set_colortable();
                  });
            }).bind(null, obm,t,jQuery,wb3d_set_colortable), 0);
      }



      jQuery('#scrollid1').scroll(function() {
            var xscroll = jQuery('#scrollid1').scrollLeft();
            jQuery('#scrollid2').scrollLeft(xscroll);
      });

      jQuery('#scrollid2').scroll(function() {
            var xscroll = jQuery('#scrollid2').scrollLeft();
            jQuery('#scrollid1').scrollLeft(xscroll);
      });




      jQuery('#tab_number').prop( 'disabled', true );

      // Link Follow Type
      jQuery('#click-newpage').change(function(){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K.click_newpage=Number(jQuery('#click-newpage').val());
      });

      // Act/Event
      jQuery('#act_event').change(function(){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K.act=Number(jQuery('#act_event').val());
      });

      // Reset
      jQuery('#layer_reset').change(function(){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K.reset=Number(jQuery('#layer_reset').val());
      });

      // Reset
      jQuery('#layer_pointer').change(function(){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K.pointer=Number(jQuery('#layer_pointer').val());
      });

      // Selectable
      jQuery('#layer_selectable').change(function(){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K.selectable=Number(jQuery('#layer_selectable').val());
      });

      // Size Function
      jQuery('#layer_sizefunc').change(function(){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K.sizefunc=Number(jQuery('#layer_sizefunc').val());
            obm.chenge_details_obj=[];
            obm.chenge_details_obj2=[];
            obm.bk_change_sizew=[];
            obm.bk_change_sizeh=[];
            obm.set_border=-1;
      });

            // Overflow1
      jQuery('#layer_overflow').change(function(){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K.overflow=Number(jQuery('#layer_overflow').val());
            obm.chenge_details_obj=[];
            obm.chenge_details_obj2=[];
            obm.bk_change_sizew=[];
            obm.bk_change_sizeh=[];
            obm.set_border=-1;
      });


            // Overflow2
      jQuery('#layer_overflow2').change(function(){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K.overflow2=Number(jQuery('#layer_overflow2').val());
            for(var r=0;r<K.layer_obj;r++){
                  var sl=obm.activeslide[obm.cu]+'-'+obm.s_l;
                  id=wb3d_create_id('0_'+sl+'-'+K['obj_num_'+r],obm);
                  if(K.overflow2==0)
                  	jQuery('#wb3de-'+id).css("overflow","hidden");
            	else
                  	jQuery('#wb3de-'+id).css("overflow","");
            }
            obm.chenge_details_obj=[];
            obm.chenge_details_obj2=[];
            obm.bk_change_sizew=[];
            obm.bk_change_sizeh=[];
            obm.set_border=-1;
      });

      // Link
      jQuery('#click-link').keyup(function(){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K.click_link=jQuery('#click-link').val();
      });


      // Click Type
      jQuery('#click-type').change(function(){
            var sn=obm.sn['0-0'];
            if(obm.s_l!=-1&&obm.activeslide[obm.cu]!=-1){
                  var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
                  K.click_type=Number(jQuery('#click-type').val());
                  jQuery('#click-link').removeAttr('disabled');
                  jQuery('#click-newpage').removeAttr('disabled');
                  jQuery('#click-newpage').val(K.click_newpage);
                  jQuery('#click-link').val(K.click_link); 
                  if( K.click_type===-1 ){
                        jQuery('#click-link').attr('disabled', 'disabled');
                        jQuery('#click-newpage').attr('disabled', 'disabled');
                  }
                  else if( K.click_type===1||K.click_type===21||K.click_type===0 ){
                  }
                  else if( K.click_type===2||K.click_type===10||K.click_type===9||K.click_type===5||K.click_type===6){
                        jQuery('#click-newpage').attr('disabled', 'disabled');
                  }
                  else {
                        jQuery('#click-newpage').attr('disabled', 'disabled');
                        jQuery('#click-link').attr('disabled', 'disabled');
                  }
            }
      });



      // Perspective Type
      jQuery('#pers_type').change(function(){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K.pers=Number(jQuery('#pers_type').val()); 
            wb3d_update_when_effect_change(jQuery('#openingeffectselect').val());
            obm.chenge_details_obj=[];
            obm.bk_transform1=[];
            obm.bk_transform2=[];
      });


      // Show Object
      jQuery('#show_in_range').change(function(){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K['hide_'+obm.d]=Number(jQuery('#show_in_range').val());
            obm.bk_display=[];
            obm.chenge_display=[];
            obm.chenge_details_obj=[];
            obm.chenge_details_obj2=[];
      });

      // Align Left
      jQuery('#align_left').change(function(){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K['A_l'+obm.d]=Number(jQuery('#align_left').val()); 
            wb3d_set_slide_value(obm.activeslide[obm.cu],0,obm);
      });
      // Align Top
      jQuery('#align_top').change(function(){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K['A_t'+obm.d]=Number(jQuery('#align_top').val()); 
            wb3d_set_slide_value(obm.activeslide[obm.cu],0,obm);
      });

      jQuery("#width_res").change(function(){
            wb3d_width_res(Number(this.value));
      });


      wb3d_width_res=function(x){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K['WO'+obm.d]=Number(x);
      };


      jQuery("#height_res").change(function(){
            wb3d_height_res(Number(this.value));
      });
      wb3d_height_res=function(x){
            var sn=obm.sn['0-0'];
            var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
            K['HO'+obm.d]=Number(x);
      };

      // Edit Effect (Color Table)
      jQuery('#color_table').click(function(){
            wb3d_color_table();
      });


      //Show Color Table
      function wb3d_color_table(){
            jQuery( '#colormenu' ).css('display','' );
            jQuery('#allcolormenu').css('display','');
      }

      //Hide Color Table
      jQuery('#colormenuclose').click(function(){
            jQuery( '#colormenu' ).css('display','none' );
      });

      // Color Tables
      wb3d_set_color_tables=function(obm,is){
            if(is==0||wb3d.wb3d_pro==1){
                  var txt='<div id="bodycolormenu'+is+'" class="color_table">';
            }
            else{
                  var txt='<div id="bodycolormenu'+is+'" class="color_table wb3d_displaynone">';
            }
            txt+='<img class="pointer" src="'+wb3d.wb3d_plagin_images_URL+(is+1)+'.png" style="position: absolute;top: 0px;left:2px;width: 30px;height: 30px;border-radius:15px">';
            txt+='<img class="pointer" src="'+wb3d.wb3d_plagin_images_URL+'add3.png" id="add_color_in_table_'+is+'" style="position: absolute;top: 35px;left:2px;width: 30px;height: 30px;">';
            txt+='<img class="pointer" src="'+wb3d.wb3d_plagin_images_URL+'close4.png" id="delete_color_in_table_'+is+'" style="position: absolute;top: 65px;left:2px;width: 30px;height: 30px;">';
            txt+='</div>';

            jQuery( '#allcolormenu').append(txt);

            jQuery('#add_color_in_table_'+is).click(function(){
                  var x=this.id.split('_')[4];
                  var sn=obm.sn['0-0'];
                  if(obm.max_color[sn+'-'+x]<65000){
                        var text='<div id="p_colormenu-'+x+'-'+obm.max_color[sn+'-'+x]+'" style="width:70px;height: 38px; border: 0px solid blue;float: right;margin-right:15px">';
                        text+='<div class="pointer" id="colormenu-'+x+'-'+obm.max_color[sn+'-'+x]+'" style="float: left;margin:0 0 0 10px;width:24px;height:24px;background-image: url('+wb3d.wb3d_plagin_images_URL+'tr.jpg);position: relative;border-radius: 50%;overflow:hidden;">';
                        text+='<div style="position: absolute;width:24px;height: 24px;top: 0px;left: 0px;background-color: #fff;"></div></div>';
                        text+='<label  style="float: right;margin:10px 15px0 0 15px">'+(obm.max_color[sn+'-'+x])+'</label>';
                        text+='</div>';
                        jQuery('#bodycolormenu'+x).append(text);

                        jQuery('#colormenu-'+x+'-'+obm.max_color[sn+'-'+x]).click(function(){
                              var id=this.id.split('-')[2];
                              var x=this.id.split('-')[1];
                              obm.Palette='colormenu-'+x+'-'+id;
                              wb3d_showflat();
                        });
                        obm.r[sn+'-'+x+'-'+obm.max_color[sn+'-'+x]]=255;
                        obm.g[sn+'-'+x+'-'+obm.max_color[sn+'-'+x]]=255;
                        obm.b[sn+'-'+x+'-'+obm.max_color[sn+'-'+x]]=255;
                        obm.a[sn+'-'+x+'-'+obm.max_color[sn+'-'+x]]=255;

                        obm.Palette='colormenu-'+obm.max_color[sn+'-'+x];
                        obm.color_loading='rgba('+obm.r[sn+'-'+x+'-'+obm.Palette]+','+obm.g[sn+'-'+x+'-'+obm.Palette]+','+obm.b[sn+'-'+x+'-'+obm.Palette]+','+obm.a[sn+'-'+x+'-'+obm.Palette]+')';                     
                        jQuery('#colormenu-'+x+'-'+obm.max_color[sn+'-'+x]+' div').css('background-color',obm.color_loading);
                        obm.max_color[sn+'-'+x]++;
                  }
            });

            //Delete Color
            jQuery('#delete_color_in_table_'+is).click(function(){
                  var x=this.id.split('_')[4];
                  var sn=obm.sn['0-0'];
                  if(obm.max_color[sn+'-'+x]>1){
                        obm.max_color[sn+'-'+x]--;
                        jQuery('#p_colormenu-'+x+'-'+obm.max_color[sn+'-'+x]).empty();
                        jQuery('#p_colormenu-'+x+'-'+obm.max_color[sn+'-'+x]).remove();
                  }
                  else{
                        alert(jQuery('#alert_color').text());
                  }
            });
      };//end of wb3d_set_color_tables

      // Select Event
      jQuery('#token_name').change(function(){
            var x=Number(this.value);
            jQuery('#div_distance2').css('display','none');
            jQuery('#div_channel').css('display','none');
            jQuery('#div_gettime').css('display','none');
            jQuery('#div_gettime2').css('display','none');
            jQuery('#div_pressKey2').css('display','none');
            jQuery('#div_reverse2').css('display','none');

            if(x===0){
                  jQuery('#div_channel').css('display','');
            }
            else if(x>=39){
                  jQuery('#div_gettime').css('display','none');
                  jQuery('#div_gettime2').css('display','none');
                  jQuery('#div_distance2').css('display','');
                  jQuery('#div_reverse2').css('display','');
            }
            else if(x===23||x===25){
                  jQuery('#div_gettime').css('display','');
                  jQuery('#div_gettime2').css('display','');
            }
            else if(x===24||x===26){
                  jQuery('#div_gettime').css('display','');
            }
            else if(x===17||x===19){
                  jQuery('#div_pressKey2').css('display','');
            }
      });

      // Select Event 2
      jQuery('#token_name_b').change(function(){
            var x=Number(this.value);
            jQuery('#div_distance3').css('display','none');
            jQuery('#div_channel_b').css('display','none');
            jQuery('#div_gettime_b').css('display','none');
            jQuery('#div_gettime2_b').css('display','none');
            jQuery('#div_pressKey2_b').css('display','none');
            jQuery('#div_reverse3').css('display','none');

            if(x===0){
                  jQuery('#div_channel_b').css('display','');
            }
            else if(x>=39){
                  jQuery('#div_gettime_b').css('display','none');
                  jQuery('#div_gettime2_b').css('display','none');
                  jQuery('#div_distance3').css('display','');
                  jQuery('#div_reverse3').css('display','');
            }
            else if(x===23||x===25){
                  jQuery('#div_gettime_b').css('display','');
                  jQuery('#div_gettime2_b').css('display','');
            }
            else if(x===24||x===26){
                  jQuery('#div_gettime_b').css('display','');
            }
            else if(x===17||x===19){
                  jQuery('#div_pressKey2_b').css('display','');
            }
      });

      // Select Event 3
      jQuery('#token_name_c').change(function(){
            var x=Number(this.value);
            jQuery('#div_distance4').css('display','none');
            jQuery('#div_channel_c').css('display','none');
            jQuery('#div_gettime_c').css('display','none');
            jQuery('#div_gettime2_c').css('display','none');
            jQuery('#div_pressKey2_c').css('display','none');
            jQuery('#div_reverse4').css('display','none');

            if(x===0){
                  jQuery('#div_channel_c').css('display','');
            }
            else if(x>=39){
                  jQuery('#div_gettime_c').css('display','none');
                  jQuery('#div_gettime2_c').css('display','none');
                  jQuery('#div_distance4').css('display','');
                  jQuery('#div_reverse4').css('display','');
            }
            else if(x===23||x===25){
                  jQuery('#div_gettime2_c').css('display','');
                  jQuery('#div_gettime_c').css('display','');
            }
            else if(x===24||x===26){
                  jQuery('#div_gettime_c').css('display','');
            }
            else if(x===17||x===19){
                  jQuery('#div_pressKey2_c').css('display','');
            }
      });

	// jQuery('#maindiv_A').draggable();
	// jQuery('#maindiv_E').draggable();



      var fontCheck = [
            // Windows 10
            '"Arial"', '"Arial Black"', '"Bahnschrift"', '"Calibri"', '"Cambria"', '"Cambria Math"', '"Candara"', '"Comic Sans MS"', '"Consolas"', '"Constantia"', '"Corbel"', '"Courier New"', '"Ebrima"', '"Franklin Gothic Medium"', '"Gabriola"', '"Gadugi"', '"Georgia"', '"HoloLens MDL2 Assets"', '"Impact"', '"Ink Free"', '"Javanese Text"', '"Leelawadee UI"', '"Lucida Console"', '"Lucida Sans Unicode"', '"Malgun Gothic"', '"Marlett"', '"Microsoft Himalaya"', '"Microsoft JhengHei"', '"Microsoft New Tai Lue"', '"Microsoft PhagsPa"', '"Microsoft Sans Serif"', '"Microsoft Tai Le"', '"Microsoft YaHei"', '"Microsoft Yi Baiti"', '"MingLiU-ExtB"', '"Mongolian Baiti"', '"MS Gothic"', '"MV Boli"', '"Myanmar Text"', '"Nirmala UI"', '"Palatino Linotype"', '"Segoe MDL2 Assets"', '"Segoe Print"', '"Segoe Script"', '"Segoe UI"', '"Segoe UI Historic"', '"Segoe UI Emoji"', '"Segoe UI Symbol"', '"SimSun"', '"Sitka"', '"Sylfaen"', '"Symbol"', '"Tahoma"', '"Times New Roman"', '"Trebuchet MS"', '"Verdana"', '"Webdings"', '"Wingdings"', '"Yu Gothic"',
            // macOS
            '"American Typewriter"', '"Andale Mono"', '"Arial"', '"Arial Black"', '"Arial Narrow"', '"Arial Rounded MT Bold"', '"Arial Unicode MS"', '"Avenir"', '"Avenir Next"', '"Avenir Next Condensed"', '"Baskerville"', '"Big Caslon"', '"Bodoni 72"', '"Bodoni 72 Oldstyle"', '"Bodoni 72 Smallcaps"', '"Bradley Hand"', '"Brush Script MT"', '"Chalkboard"', '"Chalkboard SE"', '"Chalkduster"', '"Charter"', '"Cochin"', '"Comic Sans MS"', '"Copperplate"', '"Courier"', '"Courier New"', '"Didot"', '"DIN Alternate"', '"DIN Condensed"', '"Futura"', '"Geneva"', '"Georgia"', '"Gill Sans"', '"Helvetica"', '"Helvetica Neue"', '"Herculanum"', '"Hoefler Text"', '"Impact"', '"Lucida Grande"', '"Luminari"', '"Marker Felt"', '"Menlo"', '"Microsoft Sans Serif"', '"Monaco"', '"Noteworthy"', '"Optima"', '"Palatino"', '"Papyrus"', '"Phosphate"', '"Rockwell"', '"Savoye LET"', '"SignPainter"', '"Skia"', '"Snell Roundhand"', '"Tahoma"', '"Times"', '"Times New Roman"', '"Trattatello"', '"Trebuchet MS"', '"Verdana"', '"Zapfino"',
      ];

      document.fonts.ready.then(function () {
            var fontAvailable = new Set();
            for (var i=0;i<fontCheck.length;i++) {
                  if (document.fonts.check("12px "+fontCheck[i])) {
                        fontAvailable.add(fontCheck[i]);
                        var txt='<div id="wb3d_fontfamily_'+i+'" class="wb3d_pointer wb3d_fontfamily" style="font-family:'+(fontCheck[i].split('"')[1])+'">'+(fontCheck[i].split('"')[1])+'</div>';
                        jQuery( '#wb3d_fontfamily_sample' ).append(txt);
                        setTimeout((function(obm,i,jQuery) {
                              jQuery('#wb3d_fontfamily_'+i).click(function(){
                                    jQuery('#'+obm.fontfamily).val(this.innerHTML);
                                    jQuery( '#'+obm.fontfamily.split('_')[0]+'_demo2' ).css('font-family',jQuery('#'+obm.fontfamily.split('_')[0]+'_fontname').val());
                                    if(obm.fontfamily.split('_')[0]==='liquidbutton1')
                                          wb3d_liquidbutton1_set_demo();
                              });
                        }).bind(null, obm,i,jQuery), 0);
                  }
            }

      });


      jQuery('#wb3d_fontfamily_close').click(function(){
            jQuery('#wb3d_fontfamily_sample').css("display","none");
      });




      // //Select Layer
      // jQuery('#select_layer').change(function(){
      //       var sn=obm.sn['0-0'];
      //       jQuery('#layers_object').empty();
      //       if(Number(jQuery('#select_layer').val())===-1){
      //             obm.s_l=-1;
      //             obm.s_o=-1;
      //             jQuery('#maincanvas-1').click();
      //       }
      //       else{
      //             obm.s_l=jQuery('#select_layer').val();
      //             var K=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][obm.lo_l[sn+'-'+obm.activeslide[obm.cu]+'-'+obm.s_l]];
      //             obm.s_o= K.obj_num_0;
      //       }

      //       wb3d_set_slide_value(obm.activeslide[obm.cu],0,obm);
      //       jQuery(' .move').css('display','none');
      //       jQuery('.ves_li').css('border','1px solid black');
      //       obm.set_border=-1;
      // });

      jQuery('#color_bk_slider').click(function(){
            wb3d_showflat();
            obm.Palette='color_bk_slider';
      });

      //change Effect
      jQuery('#openingeffectselect').on('focus', function () {
            obm.previous_openingeffectselect = this.value;
      }).change(function() {
            

            // Do something with the previous value after the change
            if(obm.previous_openingeffectselect!=-1){
                  if(typeof(wb3d_remove_selectet_effect_token) === "function"){
                        wb3d_remove_selectet_effect_token(obm.previous_openingeffectselect,obm);
                  }
            }
            var current = Number(this.value);
            if(current!=-1){
                  if(typeof(wb3d_remove_selectet_effect_token) === "function"){
                        wb3d_create_selected_effect_token(current,obm);
                  }
            }
            // Make sure the previous value is updated
            obm.previous_openingeffectselect = current;
            wb3d_valueset(obm,obm.sn['0-0']);
            obm.putimagecanvas();
            jQuery('#selecteffect').val(jQuery('#openingeffectselect').val());
            jQuery('#selecteffect2').val(jQuery('#openingeffectselect').val());
            jQuery('#spinnerstart').val(0);
      });


      //Copy Slide
      wb3d_click_demo_duplicate=function (object){
            var cu=0;
            var sn=obm.sn['0-0'];
            var id,tmpdivid;
            if (confirm(jQuery('#alert_confirm10').text())) {
                  id=object.id.split('-')[1];
                  var i=0;
                  for(;i<10000;i++){
                        if(jQuery('#demoslide-'+i).length===0){
                              break;
                        }
                  }
                  obm.los[sn+'-'+i]=obm.slidnum[sn];
                  var tmp1=JSON.stringify(obm.dataslide[sn][ obm.los[sn+'-'+id]]);
                  obm.dataslide[sn][ obm.los[sn+'-'+i]]=JSON.parse(tmp1);
                  obm.dataslide[sn][obm.los[sn+'-'+i]][0].slide_of_location=i.toString();
                  obm.slide_of_location[sn+'-'+obm.los[sn+'-'+i]]=i.toString();
                  obm.dataslide[sn][obm.los[sn+'-'+i]][0]['los_'+i]=obm.los[sn+'-'+i];
                  obm.color1[sn+'-'+i]=obm.color1[sn+'-'+id];
                  obm.slide_time[sn+'-'+i]=obm.slide_time[sn+'-'+id];
                  obm.bk['0_'+i]=-1;
                  obm.framenum['0_'+i]=0;
                  wb3d_create_id(cu+'_'+i,obm);
                  wb3d_addslide(i,sn,obm,0,1,cu);
                  var tmp=(obm.slidnum[sn]*122);               
                  jQuery('#divtitleslide2').width(tmp);
                  jQuery('#scrollid1-1').width(tmp);
                  obm.layers[sn+'-'+i]=obm.layers[sn+'-'+id];
                  var aa=obm.dataslide[sn][obm.los[sn+'-'+i]];
                  for(var g=0;g< obm.layers[sn+'-'+i];g++){
                        obm.la_l[sn+'-'+i+'-'+g]=obm.la_l[sn+'-'+id+'-'+g];
                        var l=obm.la_l[sn+'-'+i+'-'+g];
                        obm.lo_l[sn+'-'+i+'-'+l]=g;
                        obm.U_P[sn+'-'+i+'-'+l]=obm.U_P[sn+'-'+id+'-'+l];
                        wb3d_createlayer(0,i,g,aa,'load_db',0,0,sn,0,0,0,obm  );
                        var l1=obm.la_l[sn+'-'+i+'-'+g];
                        var K=obm.dataslide[sn][obm.los[sn+'-'+i]][obm.lo_l[sn+'-'+i+'-'+l1]];
                        for(var r=0;r<K.layer_obj;r++){
                        var sl=i+'-'+l1;
                        id=wb3d_create_id('0_'+sl+'-'+K['obj_num_'+r],obm);
                        if(obm.U_P[sn+'-'+i+'-'+l1]!=0){
                              tmpdivid='#wb3de-'+obm.wb3d_id['0_'+i+'-'+obm.U_P[sn+'-'+i+'-'+l1]];
                        }
                        else{
                              tmpdivid='#wb3dh-'+obm.wb3d_id['0_'+i];
                        }
                        obm.createobj[K[ 'type_obj-'+K['obj_num_'+r]]](sn,id,K,tmpdivid,obm,K['obj_num_'+r],0,l1,i,0,0);
                        wb3d_set_bk(id,obm);
                        obm.bk_create_layer[cu+'_'+i+'-'+l1]=-1;
                        }
                  }
                  obm.putimagecanvas();
            }
      };




      // Delete Slide
      wb3d_clickdemodelete=function (object){
            var sn=obm.sn['0-0'];
            if(obm.slidnum[sn]===1){
                  alert(jQuery('#alert_slide').text());
            }
            else{ 
                  var id=object.id.split('-')[1];
                  if(id===obm.activeslide[obm.cu]){
                        alert(jQuery('#alert_slide2').text());
                        return 0;
                  }

                  if (confirm(jQuery('#alert_confirm1').text())) {
                        for(var i=1;i<obm.layers[sn+'-'+id];i++){
                              var ii=obm.la_l[sn+'-'+id+'-'+i];
                              var B=obm.dataslide[sn][obm.los[sn+'-'+id] ];
                              var K=B[  obm.lo_l[sn+'-'+id+'-'+ii] ];
                              for(var w=0;w<K.layer_obj;w++){
                                    var o=K['obj_num_'+w];
                                    obm.removeobj[K['type_obj-'+o]](K,obm.wb3d_id['0_'+id+'-'+ii+'-'+o],o);
                              }
                        }

                        for(var t=obm.los[sn+'-'+id];t<obm.slidnum[sn]-1;t++){
                              obm.dataslide[sn][ t ]=JSON.parse(JSON.stringify(obm.dataslide[sn][ t+1 ]));
                              obm.los[sn+'-'+obm.slide_of_location[sn+'-'+(t+1)] ]=t;
                              obm.dataslide[sn][ t ][0].slide_of_location=obm.slide_of_location[sn+'-'+(t+1)];
                              obm.dataslide[sn][t][0]['los_'+obm.slide_of_location[sn+'-'+(t+1)] ]=t;
                              obm.slide_of_location[sn+'-'+t]=obm.slide_of_location[sn+'-'+(t+1)];
                        }

                        delete obm.wb3d_ids[obm.wb3d_id['0_'+id]];
                        delete obm.wb3d_ids_org[obm.wb3d_id['0_'+id]];
                        delete obm.wb3d_id_org['0_'+id];
                        delete obm.wb3d_id['0_'+id];

                        obm.slide_of_location[sn] = jQuery('#divtitleslide2 .ui-state-default').map(function(i) { return  this.id; }).get();
                        jQuery('#demoslide-'+id).empty();
                        jQuery('#demoslide-'+id).remove();
                        jQuery('#sortable'+id).empty();
                        jQuery('#sortable'+id).remove();
                        jQuery('#slide-option-'+id).empty();
                        jQuery('#slide-option-'+id).remove();
                        jQuery('#wb3dh-'+obm.wb3d_id['0_'+id]).empty();
                        jQuery('#wb3dh-'+obm.wb3d_id['0_'+id]).remove();
                        obm.slidnum[sn]--;
                        obm.setting[sn].num=obm.slidnum[sn];
                        obm.layers[sn+'-'+id]=0;
                        obm.putimagecanvas();
                  }
            }
      };



      // Select Slide
      wb3d_clickdemoslide=function (object,x){
            if(typeof(wb3d_remove_selectet_effect_token) === "function"){
                  wb3d_remove_selectet_effect_token(jQuery('#openingeffectselect').val(),obm);
                  wb3d_remove_all_effect_token(obm.activeslide[cu],obm);
            }
            var cu=0;
            jQuery(' .move').css('display','none');
            jQuery('.ves_li').css('border','1px solid black');
            jQuery('.slide_c').css('border','none');
            wb3d_set_disable();
            obm.bk_ws=obm.activeslide[obm.cu];
            obm.d=object.id.split('-')[0].split('demo')[1];
            obm.set_border=-1;
            obm.s_l=-1;
            obm.framenum[cu+'_'+obm.activeslide[obm.cu]+'-'+0]=0;
            obm.framenum['0_'+obm.activeslide[obm.cu]]=0;
            obm.activeslide[obm.cu]=object.id.split('-')[1];
            obm.framenum[cu+'_'+obm.activeslide[obm.cu]+'-'+0]=0;
            obm.framenum['0_'+obm.activeslide[obm.cu]]=0;
            wb3d_change_screen_size();
            obm.cl_status=object.id.split('-')[0];
            wb3d_showslide ( obm.bk_ws , obm.activeslide[obm.cu],obm );
            jQuery('#wb3dh-'+wb3d_create_id('0_'+obm.bk_ws,obm)).css('display','none');
            jQuery('#wb3dh-'+wb3d_create_id('0_'+obm.activeslide[obm.cu],obm)).css('display','');
            wb3d_set_slide_value(obm.activeslide[obm.cu],0,obm);
            wb3d_set_colortable();
            wb3d_reset_data_slider(obm.activeslide[obm.cu]);
            obm.putimagecanvas();
      };

      jQuery('#lock_effect').click(function(){
            var images = jQuery('#lock_effect').attr('src');
            var pre=images.split('images/')[0];
            if(obm.lock_effect===1){
                  jQuery('#lock_effect').attr('src',pre+'images/'+'unlock.png');
                  obm.lock_effect=0;
            }
            else{
                  jQuery('#lock_effect').attr('src',pre+'images/'+'lock.png');
                  obm.lock_effect=1;
            }
      });


      jQuery('#lock_canvas').click(function(){
            var images = jQuery('#lock_canvas').attr('src');
            var pre=images.split('images/')[0];
            if(obm.lock_canvas===1){
                  jQuery('#lock_canvas').attr('src',pre+'images/'+'unlock.png');
                  obm.lock_canvas=0;
                  jQuery('.wb3d_draggable_s'). draggable();
                  jQuery('.wb3d_draggable_s'). draggable( 'enable' );
            }
            else{
                  jQuery('#lock_canvas').attr('src',pre+'images/'+'lock.png');
                  jQuery('.wb3d_draggable_s'). draggable( 'disable' );
                  obm.lock_canvas=1;
            }
      });

      jQuery( '#wb3d_replace' ).click(function(){
            wb3d_Save_All_Data(obm,'refresh2');
      });


      // Add Slide
      function wb3d_add_slide(){
            var sn=obm.sn['0-0'];
            var cu=obm.cu;
            var i=0;
            for(;i<10000;i++){
                  if(jQuery('#demoslide-'+i).length===0){
                        break;
                  }
            }

            obm.los[sn+'-'+i ]=obm.slidnum[sn];
            i=i.toString();
            var tmp1=JSON.stringify(obm.dataslide['new']);
            obm.dataslide[sn][ obm.los[sn+'-'+i]]=JSON.parse(tmp1);
            obm.color1[sn+'-'+i]=2;
            obm.dataslide[sn][obm.slidnum[sn]][0].slide_of_location=i.toString();
            obm.dataslide[sn][obm.los[sn+'-'+i ]][0]['los_'+i]=obm.slidnum[sn];
            obm.slide_of_location[sn+'-'+obm.slidnum[sn]]=i;
            obm.setting[sn].num=obm.slidnum[sn]+1;
            obm.dataslide[sn][obm.slidnum[sn]][0].layer=1;
            obm.slide_time[sn+'-'+i]=10;
            wb3d_addslide(i,sn,obm,0,1,cu);
            obm.bk_play['0_'+i+'-'+0]='play';
            obm.framenum['0_'+i]=0;
            wb3d_create_id(0+'_'+i,obm);
            obm.layers[sn+'-'+i]=1;
            obm.la_l[sn+'-'+i+'-'+0]='0';
            obm.lo_l[sn+'-'+i+'-'+0]=0;
            var tmp=(obm.slidnum[sn]*122);
            jQuery('#divtitleslide2').width(tmp);
            jQuery('#scrollid1-1').width(tmp);         
            wb3d_createlayer(0,i,0,obm.dataslide[sn][ obm.los[sn+'-'+i] ],'new',0,0,sn,0,0,0,obm);
            obm.canvasArray['0_'+i]=document.getElementById('maincanvas-'+wb3d_create_id(0+'_'+i,obm));
            obm.ctxarray['0_'+i]=obm.canvasArray['0_'+i].getContext('2d');
            obm.vesid['0_'+i]=document.getElementById('maincanvas-'+wb3d_create_id(0+'_'+i,obm));
      }


      jQuery('#addslide').click(function(){
            wb3d_add_slide();
      });


      wb3d_valueset=function(obm,sn){
            sn=obm.sn['0-0'];
            var eff=jQuery('#openingeffectselect').val();
            var i=obm.location_of_effect[sn+'-'+eff];
            i*=8;
            jQuery('#demo_layer_color_A').css('background-color','rgba('+obm.effect_color[sn][i]+','+obm.effect_color[sn][i+1]+','+obm.effect_color[sn][i+2]+','+obm.effect_color[sn][i+3]/255+')');
            jQuery('#demo_layer_color_B').css('background-color','rgba('+obm.effect_color[sn][i+4]+','+obm.effect_color[sn][i+5]+','+obm.effect_color[sn][i+6]+','+obm.effect_color[sn][i+7]/255+')');
      };


      //Show Slide 
      wb3d_showslide=function (bkwslide,wslide,obm){
            if( obm.loadslides===0){
                  if(typeof(wb3d_remove_all_effect_token) === "function"){
                        wb3d_remove_all_effect_token(bkwslide,obm);
                        wb3d_remove_all_effect_token(wslide,obm);
                        wb3d_create_all_layer_token(wslide,obm);
                  }
            }

            obm.bk_ws=bkwslide;
            obm.activeslide[obm.cu]=wslide;
            jQuery('#demo0-'+obm.bk_ws).css('border', 'solid 0px blue');
            jQuery('#demo1-'+obm.bk_ws).css('border', '');
            jQuery('#demo2-'+obm.bk_ws).css('border', '');
            jQuery('#demo3-'+obm.bk_ws).css('border', '');
            jQuery('#demoslide-'+obm.bk_ws).css('margin', '10px 2px 5px 2px');

            if(typeof(obm.cl_status)==='undefined'){
                  obm.d=0;
                  jQuery('#demo0-'+obm.activeslide[obm.cu]).css('border', 'solid 2px rgb(209 56 189)');
                  jQuery('#demoslide-'+obm.activeslide[obm.cu]).css('margin', '20px 2px -0px 2px'); 
                  wb3d_change_screen_size(obm);
            } 
            else if(obm.cl_status==='demo0'){
                  obm.d=0;
                  jQuery('#demo0-'+obm.activeslide[obm.cu]).css('border', 'solid 2px rgb(209 56 189)');
                  jQuery('#demoslide-'+obm.activeslide[obm.cu]).css('margin', '20px 2px -0px 2px');
                  wb3d_change_screen_size(obm);
            }
            else if(obm.cl_status==='demo1'){
                  obm.d=1;
                  jQuery('#demo1-'+obm.activeslide[obm.cu]).css('border', 'solid 2px rgb(209 56 189)');
                  jQuery('#demoslide-'+obm.activeslide[obm.cu]).css('margin', '20px 2px -0px 2px');
                  wb3d_change_screen_size(obm) ;
            }
            else if(obm.cl_status==='demo2'){
                  obm.d=2;
                  jQuery('#demo2-'+obm.activeslide[obm.cu]).css('border', 'solid 2px rgb(209 56 189)');
                  jQuery('#demoslide-'+obm.activeslide[obm.cu]).css('margin', '20px 2px -0px 2px'); 
                  wb3d_change_screen_size(obm);
            }
            else if(obm.cl_status==='demo3'){
                  obm.d=3;
                  jQuery('#demo3-'+obm.activeslide[obm.cu]).css('border', 'solid 2px rgb(209 56 189)');
                  jQuery('#demoslide-'+obm.activeslide[obm.cu]).css('margin', '20px 2px -0px 2px'); 
                  wb3d_change_screen_size(obm);
            }

            jQuery('.sortlist-slide').css('display', 'none');
            jQuery('#slide-option-'+obm.activeslide[obm.cu]).css('display', 'inline-block');  
      };

      // Change Slide Effect 1
      jQuery('#slide_select_1').change(function() {
            var sn=obm.sn['0-0'];
            var aa=obm.dataslide[sn][obm.los[sn+'-'+obm.activeslide[obm.cu]]];
            aa[0]['E_'+obm.d]=this.value;
            wb3d_set_slide_value(obm.activeslide[obm.cu],0,obm);
      });

      // Change Slide cursor
      jQuery('#slide_cursor').change(function() {
            var sn=obm.sn['0-0'];
            var aa=obm.dataslide[sn][obm.los[sn+'-'+obm.activeslide[obm.cu]]];
            aa[0].cursor=Number(this.value);
            wb3d_set_slide_value(obm.activeslide[obm.cu],0,obm);
      });


      // Set  Layer Button in Left Menu
      wb3d_click_layer_panel=function (wslide,st,obm){

            jQuery('#li-'+wslide+'-'+st).mousedown(function(){
                  var id=this.id.split('-');
                  var modd;
                  var sn=obm.sn['0-0'];
                  var id1=this.id.split('-')[1];
                  var id2=this.id.split('-')[2];
                  if(id2===0){
                        return;
                  }
                  obm.es1_firstPointX=event.clientX;
                  obm.es1_changeX[obm.idmm]=0;
                  obm.li_MouseDown=id[1]+'-'+id[2];

                  var F=obm.dataslide[sn][ obm.los[sn+'-'+id1] ][obm.lo_l[sn+'-'+id1+'-'+id2]]  ;
                  var eff=F['EA_'+obm.d];
                  var frm=obm.pixel_frm[sn+'-'+eff+'-'+obm.framenum[obm.activeslide[obm.cu]+'-'+id2]];
                  modd=0;
                  if(typeof(wb3d_remove_selectet_effect_token) === "function"&&eff!=-1){
                        if(obm.gs[sn][eff].E[0][26]!=0){
                              modd=obm.gs[sn][eff].E[26][frm];
                        }
                        wb3d_remove_selectet_effect_token(jQuery('#openingeffectselect').val(),obm);
                  }

                  jQuery('#openingeffectselect').val(eff);
                  if(typeof(wb3d_create_selected_effect_token) === "function"){
                        wb3d_create_selected_effect_token(jQuery('#openingeffectselect').val(),obm);
                  }
                  if(obm.s_l!=-1){
                        jQuery('#li-'+obm.activeslide[obm.cu]+'-'+obm.s_l).css('border','1px solid black');
                  }

                  obm.s_o=modd;
                  obm.s_l=id2;
                  obm.activeslide[obm.cu]=id1;
                  jQuery('#li-'+obm.activeslide[obm.cu]+'-'+obm.s_l).css('border','1px solid red');
                  wb3d_set_slide_value(obm.activeslide[obm.cu],0,obm);

            });

            // Mouse Up
            jQuery('#li-'+wslide+'-'+st).mouseup(function(e){
                  obm.idmm=-1;
            });

            // Click On See Button
            jQuery('#see-'+wslide+'-'+st).click(function(){
                  var id2=this.id.split('-')[1];
                  var id3=this.id.split('-')[2];
                  var sn=obm.sn['0-0'];
                  var B=obm.dataslide[sn][obm.los[sn+'-'+id2]][obm.lo_l[sn+'-'+id2+'-'+id3] ];
                  if(B.show===0){
                        jQuery('#see-'+id2+'-'+id3).css('background-image','url('+wb3d.wb3d_plagin_images_URL+'/see.jpg)');
                        B.show=1;
                  }
                  else {
                        jQuery('#see-'+id2+'-'+id3).css('background-image','url('+wb3d.wb3d_plagin_images_URL+'/nosee.jpg)');
                        B.show=0;
                  }

                  for(var r=0;r<B.layer_obj;r++){
                        var obj= B['obj_num_'+r];
                        obm.chenge_display[obm.wb3d_id['0_'+id2+'-'+id3+'-'+obj]]=-1;
                  }
                  obm.bk_shadow_box=[];
                  obm.bk_tshadow=[];

                  obm.chenge_display=[];
                  obm.bk_change_sizew=[];
                  obm.bk_change_sizeh=[];
                  obm.chenge_details_obj=[];
                  obm.chenge_details_obj2=[];
                  obm.putimagecanvas();
            });

            // Click On lock Button
            jQuery('#lock-'+wslide+'-'+st).click(function(){
                  var id2=this.id.split('-')[1];
                  var id3=this.id.split('-')[2];
                  var sn=obm.sn['0-0'];
                  var B=obm.dataslide[sn][obm.los[sn+'-'+id2]][obm.lo_l[sn+'-'+id2+'-'+id3] ];
                  if(B.lock===0||B.lock===undefined){
                        jQuery('#lock-'+id2+'-'+id3).css('background-image','url('+wb3d.wb3d_plagin_images_URL+'/lock.png)');
                        B.lock=1;
                  }
                  else {
                        jQuery('#lock-'+id2+'-'+id3).css('background-image','url('+wb3d.wb3d_plagin_images_URL+'/unlock.png)');
                        B.lock=0;
                  }
                  obm.putimagecanvas();
            });


            // Copy Layer
            if(st!='0'){
                  jQuery('#copy_layer-'+wslide+'-'+st).click(function(event){
                        var sn=obm.sn['0-0'];
                        var w;
                        if (confirm(jQuery('#alert_confirm11').text())) {
                              var id=this.id.split('-');
                              var s=Number(id[1]);
                              obm.wi=[];
                              obm.la=[];
                              var l1=id[2];
                              var li=obm.lo_l[sn+'-'+s+'-'+l1];
                              for(var i=li;i<obm.layers[sn+'-'+s];i++){
                                    var l=obm.la_l[sn+'-'+s+'-'+i];
                                    for(var j=1;j<=obm.layers[sn+'-'+s];j++){
                                          if(jQuery('#li-'+s+'-'+j).length===0){
                                                break;
                                          }
                                    }
                                    if((obm.U_P[sn+'-'+s+'-'+l]===0||obm.U_P[sn+'-'+s+'-'+l]===obm.U_P[sn+'-'+s+'-'+l1])&&i!=li){
                                          return;
                                    }
                                    else{
                                          obm.la[l]=j;
                                          if(obm.U_P[sn+'-'+s+'-'+l]===0){
                                                w=0;
                                          }
                                          else{
                                                w=obm.la[obm.U_P[sn+'-'+s+'-'+l].split('-')[0]]+'-'+obm.U_P[sn+'-'+s+'-'+l].split('-')[1];
                                          }
                                          wb3d_copy_layer(s,l,j,w,obm);
                                    }
                              }
                        }
                        wb3d_set_slide_value(obm.activeslide[obm.cu],1,obm);
                        obm. putimagecanvas();
                  });
            }


            // Delete Layer
            if(st!='0'){
                  jQuery('#picclose-'+wslide+'-'+st).click(function(event){
                        var ex=this.id.split('-');
                        var wslide=Number(ex[1]);
                        var ddd=Number(ex[2]);
                        var j;
                        var sn=obm.sn['0-0'];
                        if (confirm(jQuery('#alert_confirm12').text())) {
                              var B=obm.dataslide[sn][obm.los[sn+'-'+wslide]   ];
                              if(typeof(wb3d_remove_all_effect_token) === "function"){
                                    wb3d_remove_all_effect_token(wslide,obm);
                              }
                              var li=obm.lo_l[sn+'-'+wslide+'-'+ddd];

                              var C=B[  obm.lo_l[sn+'-'+wslide+'-'+ddd] ];
                              C.pers=0;
                              C.click_newpage=0;
                              C.act=0;
                              C.reset=0;
                              C.pointer=0;
                              C.selectable=0;
                              C.sizefunc=0;
                              C.overflow=1;
                              C.overflow2=1;
                              C.click_link='';
                              C.l_type=0; 
                              var num=0;

                              var flag=1;

                              for(var i=li;i<obm.layers[sn+'-'+wslide];i++){
                                    var ls=obm.la_l[sn+'-'+wslide+'-'+i];
                                    flag=0;
                                    if(obm.U_P[sn+'-'+wslide+'-'+ls]===0&&i!=li){
                                          break;
                                    }
                                    var K=B[  obm.lo_l[sn+'-'+wslide+'-'+ls] ];
                                    num++;
                                    jQuery('#li-'+wslide+'-'+ls).empty();
                                    jQuery('#li-'+wslide+'-'+ls).remove(); 
                                    obm.U_P[sn+'-'+wslide+'-'+ls]=0;
                                    for(var w=0;w<K.layer_obj;w++){
                                          var x=K['obj_num_'+w];
                                          obm.removeobj[K['type_obj-'+x]](K,obm.wb3d_id['0_'+wslide+'-'+ls+'-'+x],x);
                                          delete obm.wb3d_id_org['0_'+wslide+'-'+ls+'-'+x];
                                          delete obm.wb3d_id['0_'+wslide+'-'+ls+'-'+x];
                                    }
                              }
                              for(j=li; j<obm.layers[sn+'-'+wslide]-num;j++){
                                    var tmp1=JSON.stringify(B[(j+num)]);
                                    B[j]=JSON.parse(tmp1);
                              }
                              for(j=li; j<obm.layers[sn+'-'+wslide]-num;j++){
                                    obm.la_l[sn+'-'+wslide+'-'+j]=obm.la_l[sn+'-'+wslide+'-'+(j+num)];
                                    obm.lo_l[sn+'-'+wslide+'-'+obm.la_l[sn+'-'+wslide+'-'+j]]=j;  
                                    B[j].loc=j;
                              }

                              jQuery('#sortable'+wslide).sortable(); 
                              obm.layers[sn+'-'+wslide]-=num;
                              if(typeof(wb3d_create_all_layer_token) === "function"){
                                    wb3d_create_all_layer_token(wslide,obm);
                              }

                              if(obm.s_l!=-1){
                                    obm.s_l=-1;
                                    obm.s_o=-1;
                              }
                              wb3d_set_disable();
                              obm.putimagecanvas();
                        }
                        wb3d_set_slide_value(obm.activeslide[obm.cu],0,obm);
                        wb3d_scroll_tab_leftmenu('div_layers_menu',obm);
                  });
            }
      }; //End Of wb3d_click_layer_panel


      // Create Slide tags
      wb3d_html_create_slider=function(sn,wslide,parent,level){
            var cl2;
            var p='position:absolute;';
            var z='transform-style: preserve-3d;';
            if(level===0){
                  cl2='class="wb3d_draggable_s" ';
            }
            else{
                  cl2=' ';
            }
            var dis='';
            var text='<div '+cl2+' id="wb3dh-'+wslide+'" style="'+z+dis+' width:100%;height:100%; top:0px;'+p+'z-index:10;display:none;" >';
            if(level===0){
                  text+='<canvas id="maincanvas-'+wslide+'"  style="'+p+'left: 0px;top: 0px;"></canvas>';
            }
            text+='</div>';
            jQuery('#'+parent).append(text); 
      };
} //End Of wb3d_functionsjs_load
