/**
* Author URI:  https://3dwebsitebuilder.com/
* Author : Keivan Kamali
*/
function wb3d_load_event_function(obm){
      var max;
      if(wb3d.flag==='main'){
            max=1;
      }
      else{
            max=obm.cunter;
      }
      document.addEventListener('mousedown', function(e){
            obm.scrollstatus=1;
      });
      wb3d_ontouchend_mouseup_document=function(e){
            if(wb3d.flag==='main'){
                  jQuery('#pointer_value_xy').addClass('wb3d_displaynone');
                  jQuery('#slider_p1').css('opacity', '.1');
                  jQuery('#slider_k1').css('box-shadow', 'none');
            }
            obm.mouseup=1;
            obm.mouseSliderScroll=0;
            obm.down_id=0;
            obm.es_mousedown=-1;
            obm.w_sc=0;
            obm.mus=0;
            obm.li_MouseDown=-1;
            obm.scrollstatus=0;
            obm.touchstart=0;
            obm.scrollbar_status=0;
            obm.es1_charStr=-1;
            obm.scrollbar_status=0;
            obm.scroll_num_id=0;
            obm.drag_slide=-1;
      
            if(wb3d.flag==='main'){
                  jQuery('.wb3d_draggable'). draggable();
                  jQuery('.wb3d_draggable'). draggable( 'enable' );

                  jQuery('.wb3d_draggable_a'). draggable();
                  jQuery('.wb3d_draggable_a'). draggable('enable');

                  if(jQuery('#drag'). css('border')==='2px solid rgb(0, 0, 255)'&&obm.lock_canvas===0){
                        jQuery('.wb3d_draggable_s'). draggable();
                        jQuery('.wb3d_draggable_s'). draggable('enable');
                  }
            }


            wb3d_reset_drag_func();
            obm.idmm=-1;
            obm.idm=-1;
            obm.idmm=-1;
            obm.es_mousedown3=-1;
            obm.es_mousedown4=-2;
            obm.putimagecanvas();
            setTimeout(function(){
                  obm.putimagecanvas();
            },1000);            
      };
      wb3d_ontouchstart_onmousedown=function(e,a_this,x){
            var p,f;
            obm.es_mousedown3=x.id1;
            obm.es_mousedown4=x.idg;
            obm.scroll_down=x.id;
            obm.level=x.level;
            obm.scroll_sn=x.sn;
            obm.scroll_level=x.level;
            obm.scroll_cu=x.cu;
            var id=x.id;
            obm.w_sc=0;
            obm.bk_frm[x.idmm]=obm.framenum[x.idmm];
            obm.bk_frm[x.idgm]=obm.framenum[x.idgm];
            obm.idmm=x.idmm;
            obm.idm=x.idm;
            obm.down_id=obm.idmm;
            obm.mousedown[x.idmm]=1;
            var rect =a_this.getBoundingClientRect();
            x.x= Number((e.clientX - rect.left));
            x.y=Number((e.clientY - rect.top));
            obm.es1_x[obm.idm]=x.x;
            obm.es1_y[obm.idm]=x.y;
            if(obm.mousedown_obj[x.id1]!=undefined){
                  obm.mousedown_obj[x.id1](e,x.id1,x.F,x.modd,x);
            }
            obm.mouse_downX[obm.idmm]=obm.bx;
            obm.mouse_downY[obm.idmm]=obm.by;
            obm.es1_changeX[id]=0;
            obm.es1_changeY[id]=0;
            if(x.level!=0){
                  obm.scroll_num_id=x.sn;
            }
            wb3d_set_click(x,x.id);
            obm.idmm=x.idmm;
            obm.es_mousedownB=x.F;
            var F=x.F;
            var idmm=x.idmm;

            if(F['T_E'+obm.d]===10){
                  wb3d_inheritance_click(idmm,obm);
            }

            if(x.level===0){
                  if(obm.U_P[x.sn+'-'+x.id[0]+'-'+x.id[1]]!=0){

                        p=obm.U_P[x.sn+'-'+x.id[0]+'-'+x.id[1]].split('-')[0];
                        f=obm.dataslide[x.sn][obm.los[x.sn+'-'+x.id[0]]][  obm.lo_l[x.sn+'-'+x.id[0]+'-'+p]];

                        idmm=x.cu+'_'+x.s+'-'+p;
                        if(f['T_E'+obm.d]===10){
                              wb3d_inheritance_click(idmm,obm);
                        }
                  }
            }
            else{

                  if(obm.U_P[x.sn+'-'+x.id[3]+'-'+x.id[4]]!=0){
                        p=obm.U_P[x.sn+'-'+x.id[3]+'-'+x.id[4]].split('-')[0];
                        f=obm.dataslide[x.sn][obm.los[x.sn+'-'+x.id[3]]][  obm.lo_l[x.sn+'-'+x.id[3]+'-'+p]];
                        idmm=x.s+'-'+p;
                        if(f['T_E'+obm.d]===10){
                              wb3d_inheritance_click(idmm,obm);
                        }
                  }
                  F=x.F0;
                  idmm=x.idgm;
                  if(F['T_E'+obm.d]===10){
                        wb3d_inheritance_click(idmm,obm);
                  }
            }

            
            obm.set_border=-1;
            if(F.selectable===0){
                  return false;
            }
            else {
                  return true;
            }
      };

      for(var cu=0;cu<obm.cunter;cu++){
            document.getElementById('wb3dh_'+cu).onmouseleave = function(e) {
            obm.bx=0;
            obm.by=0;
      };
      if(wb3d.flag==='main'){
            jQuery('#wb3dh_'+cu).click(function(e){wb3d_clickmaincanvas(e,this);});
            jQuery('#wb3dh_'+cu).mousedown(function(e){wb3d_mousedownmaincanvas(e,this);});
            jQuery('#wb3dh_'+cu).mouseup(function(e){wb3d_mouseupmaincanvas(e);});
            document.getElementById('pointer_value_xy').onmousemove = function(e) {
                  wb3d_labelMove();
            };

      }

      document.getElementById('wb3dh_'+cu).onmousemove = function(e) {
            wb3d_handleMouseMove(e);
            if(wb3d.flag==='main'){
                  wb3d_labelMove();
            }
      };

      wb3d_labelMove=function (){
            if(wb3d.flag==='main'){
                  document.getElementById('pointer_value_xy').innerHTML='x1 : '+~~obm.xpositionrightclick+',y1 : '+~~obm.ypositionrightclick+' ----- x2 : '+~~obm.bx+',y2 : '+~~obm.by;
                  document.getElementById('pointer_value_xy').style.left=(obm.bx+10)+'px';
                  document.getElementById('pointer_value_xy').style.top=(obm.by-5)+'px';
            }
      };


      wb3d_handleMouseMove=function (event,x,y){
            if(event!=1){
                  x=event.clientX;
                  y=event.clientY;
                  var  canvxy = document.getElementById('wb3dh_0');
                  var r = canvxy.getBoundingClientRect();
                  obm.bx = Number(x - r.left);
                  obm.by = Number(y - r.top);
            }
            else{
                  obm.bx = x;
                  obm.by = y;
            }

            if(obm.scrollstatus===1){
                  wb3d_onMove_scrollbar();
            }
            if(obm.painttools==='Curved'&&obm.mouse_down_canvas===1&&obm.startCurved===3){
                  obm.bentx = obm.bx-obm.left;
                  obm.benty =obm.by-obm.top;
            }

            if(wb3d.flag==='demo'){
                  if(obm.es_mousedown3!=-1||obm.es_mousedown4!=-2){
                        x=obm.bx-obm.mouse_downX[obm.idmm];
                        y=obm.by-obm.mouse_downY[obm.idmm];

                        if(obm.es_mousedown4!=-2){
                              if(obm.idg===obm.es_mousedown4){
                                    obm.es1_changeY[obm.idgm]=y;
                                    obm.es1_changeX[obm.idgm]=x;
                              }
                        }

                        var B=obm.es_mousedownB;

                        if(obm.es_mousedown3!=-1){
                              if(B['T_E'+obm.d]>=6&&B['T_E'+obm.d]<=9){
                                    obm.es1_changeX[obm.idmm]=x;
                                    obm.es1_changeY[obm.idmm]=y;
                              }
                        }
                  }
            }
            else if(wb3d.flag!='view'){
            }
      };
}

wb3d_check_tag=function (e,b,flag){
      var x={};
      x.flag=0;
      var tg=0;

      if(e.target.id===undefined||e.target.id===''){
            return x;
      }

      var id0=e.target.id.split('-')[1];
      var id1=b.id.split('-')[1];
      var cu=obm.wb3d_ids[id1].split('_')[0];
      if(cu!=obm.cu){
            return x;
      }

      tg=obm.wb3d_ids[id0].split('_')[1];
      var id=obm.wb3d_ids[id1].split('_')[1];

      if(tg===undefined||id===undefined||id!=tg){
            x.flag=0;
      }
      else{
            x.flag=1;
      }

      if(x.flag===0){
            return x;
      }

      x.id1=id1;
      x.id=id;
      x.cu=cu;
      x.id=x.id.split('-');
      x.sn=obm.sn[cu+'-0'];
      var sn=x.sn;
      x.F= obm.dataslide[sn][obm.los[sn+'-'+x.id[0]]][  obm.lo_l[sn+'-'+x.id[0]+'-'+x.id[1]]];
      x.F0=x.F;

      if(flag!=1){
            if(x.id[2]===undefined){
                  obm.hover_slide=x.id[0];
            }
            else if(x.F['type_'+x.id[2]]==='wb3d'){
                  obm.mouseenter[cu+'_'+x.id[0]+'-'+x.id[1]]=1;
                  obm.hover_slide=x.id[0]+'-'+x.id[1]+'-'+x.id[2]+'-'+obm.activeslide[cu+'_'+obm.wb3d_id[obm.cu+'_'+x.id[0]+'-'+x.id[1]+'-'+x.id[2]]];
            }
            else	if(x.id[3]===undefined){
                  obm.hover_slide=x.id[0];
            }
            else{
                  obm.mouseenter[cu+'_'+x.id[0]+'-'+x.id[1]]=1;
                  obm.hover_slide=x.id[0]+'-'+x.id[1]+'-'+x.id[2]+'-'+obm.activeslide[cu+'_'+obm.wb3d_id[obm.cu+'_'+x.id[0]+'-'+x.id[1]+'-'+x.id[2]]];
            }
      }
      x.eff=x.F['EB_'+obm.d];
      if(x.id[4]===undefined){
            x.level=0;
            x.s=x.id[0];
            x.idmm=cu+'_'+x.id[0]+'-'+x.id[1];
            x.idm=x.idmm+'-'+x.id[2];
            x.modd=x.id[2];
            x.idg=-1;
            x.idgm=-1;
      }
      else{
            x.sn=x.F['slider_'+x.id[2]];
            x.level=1;
            x.s=cu+'_'+x.id[0]+'-'+x.id[1]+'-'+x.id[2]+'-'+x.id[3];
            x.idmm=x.s+'-'+x.id[4];
            x.idgm=cu+'_'+x.id[0]+'-'+x.id[1];
            x.idm=x.idmm+'-'+x.id[5];
            x.idg=obm.wb3d_id[cu+'_'+x.id[0]+'-'+x.id[1]+'-'+x.id[2]];
            x.modd=x.id[5];
            x.F= obm.dataslide[x.sn][obm.los[x.sn+'-'+x.id[3]]][  obm.lo_l[x.sn+'-'+x.id[3]+'-'+x.id[4]]];
      }

      obm.rsn=x.sn;
      obm.idmm=x.idmm;
      obm.idg=x.idg;
      obm.idgm=x.idgm;
      obm.F=x.F;
      obm.F0=x.F0;
      obm.idm=x.idm;
      obm.id1=x.id1;
      obm.es_mousedownB=x.F;
      obm.set_border=-1;
      return x;
};

	wb3d_set_click=function(x,id){

		if( x.F.l_type===9 ){
			obm.bk_tab[x.cu+'_'+x.s]=x.F.tab;
			obm.chenge_details_obj2=[];
			obm.chenge_display=[];
		}
		var cu=x.cu;
		if(wb3d.flag==='main'&&obm.lock_effect===0){
			obm.previous_openingeffectselect =jQuery('#openingeffectselect').val();
                  if(wb3d.wb3d_pro2==1){
      			if(obm.previous_openingeffectselect!='-1'){
      				wb3d_remove_selectet_effect_token(obm.previous_openingeffectselect,obm);
                        }
                  }
 
			jQuery('#openingeffectselect').val(obm.F0['EB_'+obm.d]);
                  if(wb3d.wb3d_pro2==1){
      			if(obm.F0['EB_'+obm.d]!='-1'){
      				wb3d_create_selected_effect_token(obm.F0['EB_'+obm.d],obm);
                        }
                  }
			obm.previous_openingeffectselect = obm.F0['EB_'+obm.d];
		}
		if(wb3d.flag==='main'){
			wb3d_valueset(obm);
            }
		if(obm.activeslide[cu]===(x.id[0])){
			obm.activeslide[cu]=(x.id[0]);
			obm.s_l=x.id[1];
			obm.s_o=x.id[2];
			if(wb3d.flag==='main'){
				wb3d_set_slide_value(obm.activeslide[cu],0,obm);
                  }
		}
		else{
			obm.s_l=-1;
			obm.s_o=-1;
		}
		var cc=x.F.click_type;
            var  canvxy,target,y;
      
		if(cc===10){

                  var idmm=x.cu+'_'+x.id[0]+'-'+x.F.click_link;

                  var mode=obm.bk_mode[idmm];
                  if(obm.bk_mode[idmm]===undefined||obm.bk_mode[idmm]===-1){
                        mode=x.F['obj_num_'+0];
                  }

                  if(wb3d.flag==='main'&&x.level===0){
                        return;
                  }

                  var idg=x.cu+'_0';
                  

                  if(x.level===0){
                        canvxy = document.getElementById('wb3de-'+obm.wb3d_id[x.cu+'_'+x.id[0]+'-'+x.F.click_link+'-'+mode]);
                        var r = canvxy.getBoundingClientRect();
                        target=r.top+document.documentElement.scrollTop;
                        if(target<0){
                              target=0;
                        }
                        if(target>obm. scrollMaxY[x.cu+'_0']){
                              target=obm. scrollMaxY[x.cu+'_0'];
                        }
                        target=wb3d_scroll_check_sub(target);
                  }
                  else{
				if(x.F0['vs_'+x.id[2]]===1){
					return;
                        }

                        canvxy = document.getElementById('wb3dg-'+obm.wb3d_id[x.cu+'_'+x.id[0]+'-'+x.id[1]+'-'+x.id[2]+'-'+x.id[3]+'-'+x.F.click_link+'-'+mode]);
                        target=parseInt(canvxy.offsetTop)+parseInt(obm.try[x.cu+'_'+x.id[0]+'-'+x.id[1]+'-'+x.id[2]+'-'+x.id[3]+'-'+x.F.click_link])+obm.vscroll[cu+'_'+x.idg];
                        if(target<0){
                              target=0;
                        }
                        else  if(target>obm. scrollMaxY[x.cu+'_'+x.idg]){
                              target=obm. scrollMaxY[x.cu+'_'+x.idg];
                        }
                        idg=x.cu+'_'+x.idg;
                  }

                  if(obm.lockwheel!=1){
                        obm.lockwheel=1;
                        wb3d_set_scroll_wheel(obm,x.cu,idg,obm.setting[x.sn].wheel_s,target,x.level,x.sn,parseInt(obm. scrollMaxY[cu+'_0'])+obm.MaXvscroll,0,1);
                  }
            }
            if(cc===2&&x.level===1){
                  y=x.idmm.split('_')[1];
                  y=y.split('-');
                  wb3d_ajaxwb3d_c(obm,x.sn,y[0],y[1],y[2],y[3],x.F,-2,cu+'_'+x.idg,x.F.click_link,x.cu,1);
            }
		if((cc===3||cc===4)&&x.level===1){
                  y=x.idmm.split('_')[1];
                  y=y.split('-');
                  var num=-1;
                  if(cc===4){
                        num=-2;
                  }
                  wb3d_ajaxwb3d_c(obm,x.sn,y[0],y[1],y[2],y[3],x.F,-2,cu+'_'+x.idg,num,x.cu,1);
            }

            if(cc>=11&&cc<=20){
                  cc-=11;
                  obm.sColortable=cc;
                  if(wb3d.flag!='main'){
                        localStorage.setItem('lStorage_colortable', cc);
                  }
                  wb3d_set_colortable();
                  wb3d_reset_data_slider(obm.activeslide[obm.cu],0,1);
            }
      };

      function wb3d_scroll_check_sub(target){
            var xw=0;
            var flag_PY=[];
            for(var i=0;i<200;i++){
                  if(obm.wb3d[i]===undefined){
                        break;
                  }
                  else {
                        var idg2=obm.wb3d[i];
                        if(obm.wb3dB[i]['vs_'+obm.wb3dY[i] ]!=1||flag_PY[obm.wb3dB[i]['PY2_'+obm.d  ]]==1){
                        }
                        else if((target)>=obm.vscrollS[idg2]-xw){
                                    xw+=obm. scrollMaxY[idg2];
                                    flag_PY[obm.wb3dB[i]['PY2_'+obm.d  ]]=1;
                        }
                  }
            }
            target=(target)+xw;
            return target;
      }

      wb3d_mousedownmaincanvas=function(event,a){

            var openvalueselect=jQuery('#openingeffectselect').val();
            if(wb3d.flag==='main'){
                  jQuery('#pointer_value_xy').removeClass('wb3d_displaynone');
            }
            var sn=obm.sn['0-0'];
            if(openvalueselect===-1||openvalueselect===undefined){
                  return;
            }
            var obj=obm.gs[sn][openvalueselect];
            var wb3dh= document.getElementById('wb3dh_0');
            var r = wb3dh.getBoundingClientRect();
            obm.xpositionrightclick = Number(event.clientX - r.left);
            obm.ypositionrightclick = Number(event.clientY - r.top);
            obm.bx = Number(event.clientX - r.left);
            obm.by = Number(event.clientY - r.top);
            wb3d_labelMove();

            if((obm.painttools==='Curved'&&obm.startCurved===0)||obm.painttools==='straight'){
                  if(obm.d_c_effect==='dis_c_effect'||obj.max_p===0){
                        obm.mousexendCurved1=obm.xpositionrightclick-obm.left;
                        obm.mouseyendCurved1=obm.ypositionrightclick-obm.top;
                  }
                  else  if(obj.max_p!=0){
                        obm.mousexendCurved1=obm.endpointx[sn+'-'+openvalueselect];
                        obm.mouseyendCurved1=obm.endpointy[sn+'-'+openvalueselect];
                  }
            }

            if(obm.painttools==='stop') {
            }

            if(obm.painttools==='Curved'&&obm.startCurved===0){
                  obm.startCurved=1;
            }

            if(obm.painttools==='Curved'&&obm.startCurved===22){
                  obm.startCurved=3;
                  obm.bentx=(obm.mousexendCurved1+obm.mousexendCurved2)/2;
                  obm.benty=(obm.mouseyendCurved1+obm.mouseyendCurved2)/2;
            }

            obm.mouse_down_canvas=1;
      };


	//////////////upp///////////////////
	wb3d_mouseupmaincanvas=function(event){

		var sn=obm.sn['0-0'];
		var e,r;
		obm.mouse_down_canvas=0;
		obm.scrollbar_status=0;
		var openvalueselect=jQuery('#openingeffectselect').val();
		if(openvalueselect===-1){
			return;
            }
		var obj=obm.gs[sn][openvalueselect];
		var wb3dh= document.getElementById('wb3dh_0');
		r = wb3dh.getBoundingClientRect();
		var mousexfirst=obm.xpositionrightclick;
		var mouseyfirst=obm.ypositionrightclick;
		obm.xpositionrightclick = Number(event.clientX - r.left);
		obm.ypositionrightclick = Number(event.clientY - r.top);
		var xpp = obm.xpositionrightclick;
		var ypp = obm.ypositionrightclick;

            if(wb3d.wb3d_pro2==1){

      		if((obm.painttools==='Curved'&&obm.startCurved===1)||obm.painttools==='straight'){
      			obm.mousexendCurved2=xpp-obm.left;
      			obm.mouseyendCurved2=ypp-obm.top;
      		}
      		if(obm.painttools==='Curved'&&obm.startCurved===1){
      			obm.bentx=(obm.mousexendCurved1+obm.mousexendCurved2)/2;
      			obm.benty=(obm.mouseyendCurved1+obm.mouseyendCurved2)/2;
      			obm.startCurved=22;
      		}

      		if(obm.painttools==='Curved'&&obm.startCurved===3){
      			obm.startCurved=0;
      			e=obm.t_p[sn+'-'+openvalueselect];
      			obj.fxx[e+'-T']='Curved';
      			obj.fxx[(e+1)+'-T']='Curved';
      			obj.fxx[(e+2)+'-T']='Curved';
      			obj.fxx[e+'-g']=obj.max_p;
      			obj.fxx[(e)]=obm.mousexendCurved1;
      			obj.fyy[(e)]=obm.mouseyendCurved1;
      			obj.fxx[(e+1)]=obm.mousexendCurved2;
      			obj.fyy[(e+1)]=obm.mouseyendCurved2;
      			obj.fxx[(e+2)]=obm.bentx;
      			obj.fyy[(e+2)]=obm.benty;
      			obj.fxx[e+'-M']=obm.bentx+obm.left;
      			obj.fyy[e+'-M']=obm.benty+obm.top;
      			obm.t_p[sn+'-'+openvalueselect]+=3;
      			wb3d_bezier2(0.01,obj.fxx[(e)],obj.fyy[(e)], obj.fxx[(e+2)],obj.fyy[(e+2)], obj.fxx[(e+1)],obj.fyy[(e+1)],openvalueselect,1,sn,obj,obm);
      			obm.blz=0;
      		}



      		if(obm.painttools==='straight'){
      			e=obm.t_p[sn+'-'+openvalueselect];
      			if( Math.abs(mousexfirst-xpp)>=3||Math.abs(mouseyfirst-ypp)>=3){
      				if(obm.d_c_effect==='dis_c_effect'||obj.max_p===0){
      					obj.fxx[(e)]=mousexfirst-obm.left;
      					obj.fyy[(e)]=mouseyfirst-obm.top;
      				}
      				else{
      					obj.fxx[(e)]=obm.endpointx[sn+'-'+openvalueselect];
      					obj.fyy[(e)]=obm.endpointy[sn+'-'+openvalueselect];
      				}
      				obm.endpointx[sn+'-'+openvalueselect]= obm.xpositionrightclick-obm.left;
      				obm.endpointy[sn+'-'+openvalueselect]= obm.ypositionrightclick-obm.top;
      				obj.fxx[e+'-T']='line';
      				obj.fxx[(e+1)+'-T']='line';
      				obj.fxx[e+'-g']=obj.max_p;
      				obj.fxx[(e+1)]=xpp-obm.left;
      				obj.fyy[(e+1)]=ypp-obm.top;
      				obm.t_p[sn+'-'+openvalueselect]+=2;
      				wb3d_linexy(obj.fxx[e],obj.fyy[e],obj.fxx[(e+1)],obj.fyy[(e+1)],openvalueselect,1,sn,obj,obm);
      			}
      		}

                  else if(obm.painttools==='stop'){
                        e=obm.t_p[sn+'-'+openvalueselect];
                        obj.fxx[e+'-T']='stop';

                        if(obm.d_c_effect==='dis_c_effect'||obj.max_p===0){
                              obj.fxx[(e)]=mousexfirst-obm.left;
                              obj.fyy[(e)]=mouseyfirst-obm.top;
                        }
                        else{
                              obj.fxx[(e)]=obm.endpointx[sn+'-'+openvalueselect];
                              obj.fyy[(e)]=obm.endpointy[sn+'-'+openvalueselect];
                        }

                        r=Number(jQuery('#stop_spinner').val());
                        obj.fxx[e+'-N']=r;
                        obm.endpointx[sn+'-'+openvalueselect]=obj.fxx[e];
                        obm.endpointy[sn+'-'+openvalueselect]=obj.fyy[e];
                        if(r<1){
                              r=1;
                        }
                        obj.fxx[e+'-g']=obj.max_p;
                        for(var v=0;v<r;v++){
                              wb3d_xy(obm.xpositionrightclick-obm.left,obm.ypositionrightclick-obm.top,obj.max_p,openvalueselect,sn,obj,obm);
                              wb3d_set_values(openvalueselect,obj.max_p,0,obj);
                              obj.max_p++;
                        }
                        obm.t_p[sn+'-'+openvalueselect]++;
                  }//stop
                  if(wb3d.flag==='main'){
                        wb3d_saveeffectframerat(openvalueselect,sn,obm.gs[sn][openvalueselect],obm);
                        obm.db_effect[sn][openvalueselect]=wb3d_save_effect(obm,openvalueselect,0,1);
                        obm.gs[sn][openvalueselect]=new wb3d_compile_effect(obm.db_effect[sn][openvalueselect],sn,obm,1);
                        wb3d_saveeffectframerat(openvalueselect,sn,obm.gs[sn][openvalueselect],obm);
                  }
            }
            obm.chenge_details_obj=[];
            obm.mousestatuse=0;
            obm.putimagecanvas();
      };
	wb3d_clickmaincanvas=function(event,a){
		if(event.target.id===''||event.target.id===undefined||event.target.id.split('maincanvas-')[1]===undefined||a.id==='undefined'){
			return 0;
            }
		if(event.target.id.split('-')[0]===undefined){
			return 0;
            }
		var id=event.target.id.split('-')[1];
		if(id!=a.id.split('-')[1]){
			return;
            }
		event = event || window.event;// IE-ism
		var wb3dh= document.getElementById('wb3dh_0');
		var r = wb3dh.getBoundingClientRect();
		obm.xpositionrightclick = Number(event.clientX - r.left);
		obm.ypositionrightclick = Number(event.clientY - r.top);
		wb3d_set_disable();
	};

      document.ontouchend  = function(e) {
            wb3d_ontouchend_mouseup_document();
      };
	document.addEventListener('mouseup', function(e){
            wb3d_ontouchend_mouseup_document(e);
	});


	wb3d_reset_drag_func=function (event) {
            var ax,ay;
            if(obm.level===0){
                  ax=obm.wb3d_ax[obm.cu+'_0'];
                  ay=obm.wb3d_ax[obm.cu+'_0'];
            }
            else{
                  ax=obm.wb3d_ax[obm.cu+'_'+obm.idg];
                  ay=obm.wb3d_ay[obm.cu+'_'+obm.idg];
            }
            obm.idmm=-1;
            obm.idm=-1;
            obm.idmm=-1;
            obm.es_mousedown3=-1;
            obm.es_mousedown4=-2;
	};

	function wb3d_set_scroll_wheel(obm,cu,id,step,target,level,sn,bk_ms,delta,flag){
            var idg=id;
            var t=target-obm.vscroll[id];
            var t1=(wb3d_balance(t*step,obm));
            if(t===0||obm.scrollstatus===1&&flag!=1){
                  setTimeout(function(){
                  if(level===0){
                        x=wb3d_find_scroll(id,bk_ms,0,sn,0,cu+'_0');
                  }
                  obm.lockwheel=0;
                  },100);
                  return;
            }
            obm.vscroll[id]+=t1;
            x=wb3d_find_scroll(id,bk_ms,0,sn,0,cu+'_0');
            var x=0;
            wb3d_set_scroll_ui(obm,level,idg);
            setTimeout(function(){
                  wb3d_set_scroll_wheel(obm,cu,id,step,Math.round(target),level,sn,bk_ms,delta,flag);				
            },10);
      }

      function wb3d_jump_scroll(obm,sn,cu,delta,ms,idg,level,bk_sn,bk_ms){
            var j;
            var v=obm.vscroll[idg];
            if(delta<0&&v!=ms){         
                  if(obm.lockwheel!=1){
                        obm.lockwheel=1;
                         j=wb3d_find_m_scroll(obm,sn,cu,delta,ms,idg,level,bk_sn,bk_ms);
                        wb3d_set_scroll_wheel(obm,cu,idg,obm.setting[sn].wheel_s,j,level,bk_sn,bk_ms,delta);
                  }
            }
            else  if(delta>0&&v!=0){

                  if(obm.lockwheel!=1){
                        obm.lockwheel=1;
                        j=wb3d_find_m_scroll(obm,sn,cu,delta,ms,idg,level,bk_sn,bk_ms);
                        wb3d_set_scroll_wheel(obm,cu,idg,obm.setting[sn].wheel_s,j,level,bk_sn,bk_ms,delta);
                  }

            }
      }

	wb3d_wheel2=function (event,delta) {
            var target,t1;
            obm.lock_scroll_w_h=1;
            obm.timer_scroll_w_h=250;
            wb3d_timer_scroll_lock_w_h();

            if(obm.lockwheel===1){
                  if (event.preventDefault){
                       event.preventDefault(); 
                  }
                  event.returnValue = false;
                  event.stopPropagation();
                  return;
            }

            var cu=obm.cu; 
            var ms,F,sn,x,fl,idg;
            if(delta!=-1&&delta!=1){
                  if (event.wheelDelta) {
                        delta = event.wheelDelta / 120;
                  }
                  else if (event.detail) {
                        delta = -event.detail / 3;
                  }
            }
            var d=obm.d;
            if(obm.hover_slide===-1){
                  obm.hover_slide=obm.activeslide[cu]+'-';
            }
            sn=obm.sn[cu+'-0'];
            var bk_sn=obm.sn[cu+'-0'];
            var idc=obm.hover_slide.split('-');
            var id=cu+'_'+obm.activeslide[cu];
            var bk_id=cu+'_'+obm.activeslide[cu];

            F=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[cu]] ][0];
            if(wb3d.flag==='main'){
                  ms=parseInt(obm.setting[sn]['vmaxsc-'+d]);
            }
            else{
                  ms=parseInt(obm. scrollMaxY[cu+'_0'])+obm.MaXvscroll;
            }
            var bk_ms=ms;
            obm.first=obm.vscrollM['0_0'];
            if(isNaN(obm.vscroll['0_0'])||isNaN(obm.vscrollM['0_0'])){
                  t1=document.body.scrollTop;
                  if((isNaN(t1)||t1===0)&&document.documentElement.scrollTop>0){
                        t1=document.documentElement.scrollTop;
                  }
                  t1=parseInt(t1)+2;
                  target=wb3d_scroll_check_sub(t1);
                  obm.vscroll['0_0']=target; 
                  obm.vscrollM['0_0']=t1;   
                  // alert("Error");
            }
            if(idc[2]===undefined){
                  idg=cu+'_0';
                  if(obm.setting[sn].wheel_c===1&&wb3d.flag!='main'){
                        if((delta<0&&obm.vscroll[cu+'_0']!=ms)||(delta>0&&obm.vscroll[cu+'_0']!=0)){
                              wb3d_jump_scroll(obm,sn,cu,delta,ms,cu+'_0',0,bk_sn,bk_ms);
                        }
                  }
                  x=wb3d_find_scroll(id,ms,delta,sn,0,cu+'_0');
                  if (event.preventDefault){
                       event.preventDefault(); 
                  }    
                  event.preventDefault();
                  event.returnValue = false;
                  event.stopPropagation();
                  return;
            }
		else{//level 1
                  F=obm.dataslide[sn][ obm.los[sn+'-'+idc[0]] ][obm.lo_l[sn+'-'+idc[0]+'-'+idc[1]] ];
                  sn=F['slider_'+idc[2]];
                  var id1=obm.hover_slide.split('-');
                  idg=cu+'_'+obm.wb3d_id[cu+'_'+id1[0]+'-'+id1[1]+'-'+id1[2]];

                  if(isNaN(obm.vscroll[idg])||isNaN(obm.vscrollM[idg])){
                        obm.vscroll[idg]=0; 
                        obm.vscrollM[idg]=0;   
                  }
                  id=cu+'_'+id1[0]+'-'+id1[1]+'-'+id1[2]+'-'+obm.activeslide[idg];
                  ms=obm. scrollMaxY[idg] ;
                  if(obm.change_status[idg]===1){
                        if (event.preventDefault){
                              event.preventDefault();
                        } 
                              
                        event.returnValue = false;
                        event.stopPropagation();
                        return;
                  }

                  else if(F['sc_'+idc[2]  ]===1){
                        if(delta<0){
                              fl=-1;
                        }
                        else{
                              fl=-2;
                        }
                        var r=wb3d_ajaxwb3d_c(obm,sn,id1[0],id1[1],id1[2],id1[3],F,id1[2],idg,fl,cu,1);
                        if(r===1){
                              if (event.preventDefault){
                                    event.preventDefault();
                              }  
                              event.returnValue = false;
                              event.stopPropagation();
                              return;		
                        }
                  }



                  if((delta<0&&obm.vscroll[idg]<obm. scrollMaxY[idg])||(delta>0&&obm.vscroll[idg]!=0)){
                        if(F['vs_'+idc[2]  ]===0){
                              if(obm.setting[sn].wheel_c!=1||(obm.setting[sn].wheel_c===1&&wb3d.flag==='main')){
                                    x=wb3d_find_scroll(id,ms,delta,sn,1,idg);
                              }
                              else{
                                    wb3d_jump_scroll(obm,sn,cu,delta,obm. scrollMaxY[idg] ,idg,1,bk_sn,bk_ms);
                              }
                              if (event.preventDefault){
                                    event.preventDefault();
                              } 
                                    
                              event.returnValue = false;
                              event.stopPropagation();
                              return;
                        }

                  }
                  if(obm.setting[bk_sn].wheel_c===1&&wb3d.flag!='main'){
                        wb3d_jump_scroll(obm,bk_sn,cu,delta,bk_ms,'0_0',0,bk_sn,bk_ms);
                  }
                  else{
                        x=wb3d_find_scroll(bk_id,bk_ms,delta,bk_sn,0,cu+'_0');
                  }
                  if (event.preventDefault){ 
                        event.preventDefault();
                  }
                  event.returnValue = false;
            }

            event.stopPropagation();

      }; //End Of wb3d_wheel2

      if(wb3d.flag!='main'){

            document.addEventListener('touchstart', function(e){
			var touchobj = e.touches[0]; 
                  obm.starty = parseInt(touchobj.clientY);   
			obm.startx = parseInt(touchobj.clientX);   
			obm.touchstart_scroll=obm.vscroll[0+'_'+0];
            }, { passive: false });
            
            document.addEventListener('touchend', function(e){

            }, { passive: false });

            document.addEventListener('touchmove', function(e) {
                  var flag=0;
                  var sn=obm.sn['0-0'];
                  var touchobj = e.changedTouches[0]; 

                  var endy = parseInt(touchobj.clientY);
                  var endx = parseInt(touchobj.clientX);

                  obm.disty = endy - obm.starty;
                  obm.distx = endy - obm.startx;
 

                  if(obm.mouseSliderScroll===1){
                        e.stopPropagation();
                        wb3d_handleMouseMove(1,endx,endy);
                        e.preventDefault();
                        return;
                  }

                  else if(obm.setting[sn].touch===1){
                        return
                  }

                  else {
				e.stopPropagation();
				e.preventDefault();

				obm.vscroll[0+'_'+0]=obm.touchstart_scroll-(obm.disty);
				var max=parseInt(obm. scrollMaxY[0+'_0'])+obm.MaXvscroll
				if(obm.vscroll[0+'_'+0]<0){
					obm.vscroll[0+'_'+0]=0;
				}
				else if(obm.vscroll[0+'_'+0]>max){
					obm.vscroll[0+'_'+0]=max
				}

				x=wb3d_find_x_scroll(0+'_'+0,obm.vscroll[0+'_'+0]);
				x=x.x;

				obm.vscrollM[0+'_'+0]	=obm.vscroll[0+'_'+0]-x;

                        return
                  }
                  
            }, { passive: false });

            document.addEventListener('wheel', function(e) {
                  e.preventDefault();
                  obm.hover_slide=obm.activeslide[0]+'-';
                  wb3d_wheel2(e);
            }, { passive: false });
            document.addEventListener('mousewheel', function(e) {
                  e.preventDefault();
                  obm.hover_slide=obm.activeslide[0]+'-';
                  wb3d_wheel2(e);
            }, { passive: false });
            document.addEventListener('DOMMouseScroll', function(e) {
                  e.preventDefault();
                  obm.hover_slide=obm.activeslide[0]+'-';
                  wb3d_wheel2(e);
            }, { passive: false });
            document.addEventListener('onmousewheel', function(e) {
                  e.preventDefault();
                  obm.hover_slide=obm.activeslide[0]+'-';
                  wb3d_wheel2(e);
            });
      }

      function wb3d_find_m_scroll(obm,sn,cu,delta,ms,idg,level,bk_sn,bk_ms){
            var scroll2;
            var c=parseInt(obm.setting[sn]['h_'+obm.d]*obm.wb3d_ay[idg]);  
            var scroll,tmp;      
            if(obm.deltaY[0]===undefined){
                  obm.deltaY[0]=0;
            }
            tmp=parseInt(obm.deltaY[0]%c);

            if(delta<0){
                  scroll=obm.vscroll[idg]+c;
                  if(scroll>=ms){
                        return ms;
                  }
            }
            else{
                  scroll=parseInt(obm.vscroll[idg]);
            }

            var x=0;
            var f=0;
            var g,b;
            x=wb3d_find_x_scroll(idg,scroll);
            f=x.f;
            x=x.x;

            if(delta<0){
                  if(f==0){

                        if(scroll-tmp<0){
                              scroll=tmp;
                        }
                        else{

                              scroll2=scroll-tmp;
                              scroll2=parseInt(scroll2/c);
                              scroll=scroll2*c+tmp;
                        }
                  }
                  else if(f==1){
                        scroll2=scroll-tmp-x;
                        scroll2=parseInt(scroll2/c);
                        scroll=scroll2*c+tmp+x;
                  }
            }
            else{
                  if(f==0){
                        g=scroll-tmp;
                        if(g<0){
                              return 0;
                        }

                        b=(g)%c;
                        if(b>0){
                              scroll=scroll-b;
                        }
                        else if(b==0){
                              scroll-=c;
                        }
                  }
                  else if(f==2){

                        g=scroll-tmp;
                        if(g<0)
                              return 0;

                        b=(g)%c;
                        if(b>0){
                              scroll=scroll-b;
                        }
                        else if(b==0){
                              scroll-=c;
                        }
                  }
                  else if(f==1){
                        g=scroll-tmp;
                        if(g<0)
                              return 0;
                        g-=x;

                        b=(g)%c;
                        if(b>0){
                              scroll=scroll-b;
                        }
                        else if(b==0){
                              scroll=scroll-c;
                        }
                  }
            }
            if(scroll<0){
                  return 0;
            }
            else{
                  return scroll;
            }
      }
	function wb3d_find_scroll(id,ms,delta,sn,level,idg){
            var max_scroll= ms;
            var scroll,n,x,i;
            scroll=obm.vscroll[idg];
            scroll-=obm.setting[sn].wheel*delta;
            if(scroll<=0){
                  scroll=0;
            }
            else if(scroll>max_scroll ){
                  scroll=max_scroll ;
            }

            id=idg;
            scroll=parseInt(scroll);
            obm.vscroll[idg]=parseInt(scroll);

            if(level===0){
                  for(n=0;n<obm.cunter;n++){
                        obm.vscroll[n+'_0']=parseInt(scroll);
                  }
            }
            x=0;
            if(level===0){
                  x=wb3d_find_x_scroll(idg,scroll);
                  x=x.x;

                  obm.vscrollM[idg]	=scroll-x;
                  var B=obm.dataslide[sn][ obm.los[sn+'-'+obm.activeslide[obm.cu]] ][0];
                  if(wb3d.flag==='main'){
                        for(i=1;i<=B['bl_'+obm.d ];i++){
                              jQuery("#wb3d_block_"+i).css("top",(B['blt_'+i+'-'+obm.d]-obm.vscrollM['0_0'])+'px');
                        }
                  }

                  if(level===0){
                        for(n=0;n<obm.cunter;n++){
                              obm.vscrollM[n+'_0']=scroll-x;
                        }
                  }
            }

            wb3d_set_scroll_ui(obm,level,idg);

      }

      wb3d_find_x_scroll=function(idg,scroll){
            var x=0;
            var f=0;
            var y={};
            var flag_PY=[];
                  for(var i=0;i<200;i++){
                        if(obm.wb3d[i]===undefined){
                              break;
                        }
                        else {
                              var idg2=obm.wb3d[i];
                              if(obm.wb3dB[i]['vs_'+obm.wb3dY[i]  ]!=1||flag_PY[obm.wb3dB[i]['PY2_'+obm.d  ]]==1){
                              }
                              else if(scroll>=obm.vscrollS[idg2]+obm. scrollMaxY[idg2]){
                                    x+=obm. scrollMaxY[idg2];
                                    f=1;
                                    flag_PY[obm.wb3dB[i]['PY2_'+obm.d  ]]=1;
                              }
                              else if(scroll>=obm.vscrollS[idg2]&&scroll<=obm.vscrollS[idg2]+obm. scrollMaxY[idg2]){
                                    x+=(scroll-obm.vscrollS[idg2]);
                                    f=2;
                                    flag_PY[obm.wb3dB[i]['PY2_'+obm.d  ]]=1;
                              }
                        }
                  }
            y.x=x;
            y.f=f;
            return y;
      };
}//wb3d_load_event_function

function wb3d_create_event_slide(obm,wslide,sn,cu,level){

	obm.vesid[obm.wb3d_ids[wslide]].addEventListener('mousedown', function(e){

		if(e.target.id===''||e.target.id===undefined){
			return 0;
            }
		var tg=obm.wb3d_ids[e.target.id.split('-')[1]];
		var id=obm.wb3d_ids[this.id.split('-')[1]];
		if(tg===undefined||id===undefined){
			return 0;
            }	
		var cu=id.split('_')[0];
		id=id.split('_')[1];
		tg=tg.split('_')[1];
		if(cu!=obm.cu){
			return;
            }
		id=id+'-';
		tg=tg+'-';

		if(tg===undefined||id===undefined||id!=tg){
			return 0;
            }

		id=id.split('-');
		if(wb3d.flag==='main'){
			jQuery('#layers_object').empty();
		}

		if(id[3]!=undefined){
			obm.activeslide[cu]=id[0];
			obm.s_l=id[1];
			obm.s_o=id[2];
			obm.idmm=cu+'_'+id[0]+'-'+id[1];
			obm.set_border=-1;
			obm.putimagecanvas();
			if(wb3d.flag==='main'){
				wb3d_valueset(obm);
				wb3d_set_slide_value(id[0],0,obm);
			}	
		}
		else{
			obm.s_l=-1;
			obm.s_o=-1;
			if(wb3d.flag==='main'){
				jQuery(' .move').css('display','none');
				jQuery('.ves_li').css('border','1px solid black');
				wb3d_set_disable();
				wb3d_set_slide_value(id[0],0,obm);
			}
		}
	});

	if(level!=0){
      	document.getElementById('wb3dh-'+wslide).onmouseleave = function(e) {
      		if(e.target.id===''){
      			return 0;
                  }
      		var tg=obm.wb3d_ids[e.target.id.split('-')[1]];
      		var id1=obm.wb3d_ids[this.id.split('-')[1]];
      		var cu=id1.split('_')[0];
      		var id=id1.split('_')[1];
      		tg=tg.split('_')[1];
      		id=id.split('-');
      		tg=tg.split('-');
      		if(obm.cu!=cu){
      			return;
                  }
      		if (id[0]+'-'+id[1]+'-'+id[2]+'-'+id[3] != tg[0]+'-'+tg[1]+'-'+tg[2]+'-'+tg[3] ){
      			return;
      		}
                  obm.onslidemousemove=-1;

      		obm.mouseenter[cu+'_'+id[0]+'-'+id[1]]=0;
      	};
      }

	if(level===0){
            document.getElementById('wb3dh-'+wslide).onmousedown = function(e) {
                  if(e.target.id===''||e.target.id===undefined){
                        return 0;
                  }
                  var tg=obm.wb3d_ids[e.target.id.split('-')[1]];
                  var id=obm.wb3d_ids[this.id.split('-')[1]];

                  if(tg===undefined||id===undefined){
                        return 0;
                  }
                  id=id.split('_')[1];
                  tg=tg.split('_')[1];
                  if (id != tg){
                        return;
                  }
                  id=id.split('-');


                  if(id[3]!=undefined){
                        var sn=obm.sn[cu+'-0'];

                        var f=obm.dataslide[sn][obm.los[sn+'-'+id[0]]][  obm.lo_l[sn+'-'+id[0]+'-'+id[1]]];
                        if(f['T_E'+obm.d]===10){
                              wb3d_inheritance_click(obm.cu+'_'+id[0]+'-'+id[1],obm);
                        }
                  }
		};
      }

	if(level===0){
            document.getElementById('wb3dh-'+wslide).onmouseleave = function(e) {
            if(e.target.id===''||e.target.id===undefined){
                  return 0;
            }
            var tg=obm.wb3d_ids[e.target.id.split('-')[1]];
            var id=obm.wb3d_ids[this.id.split('-')[1]];

            if(tg===undefined||id===undefined){
                  return 0;
            }

            id=id.split('_')[1];
            tg=tg.split('_')[1];
            if (id != tg){
                  return;
            }
            obm.mouselayerselect=1;
            obm.mouseenter[obm.cu]=-1;
		};
      }

      if(wb3d.flag==='main'&&level===0){
      	document.getElementById('maincanvas-'+wslide).onmouseover  = function(e) {
      		if(e.target.id===''||e.target.id===undefined){
      			return 0;
                  }
      		var tg=obm.wb3d_ids[e.target.id.split('-')[1]];
      		var id=obm.wb3d_ids[this.id.split('-')[1]];
      		var cu=id.split('_')[0];
      		id=id.split('_')[1];
      		tg=tg.split('_')[1];
      		if (id != tg){
      			return;
      		}
      		obm.mouselayerselect=1;
      		obm.mouseenter[cu]=obm.wb3d_ids[this.id.split('maincanvas-')[1]];
      	};
      }

	document.getElementById('wb3dh-'+wslide).onmouseover  = function(e) {

            if(e.target.id===''||e.target.id===undefined){
                  return 0;
            }
            var tg=obm.wb3d_ids[e.target.id.split('-')[1]];
            var id=obm.wb3d_ids[this.id.split('-')[1]];
            var cu=id.split('_')[0];

            if(tg===undefined||id===undefined){
                  return 0;
            }
            id=id.split('_')[1];
            tg=tg.split('_')[1];
            if(id!=tg){
                  return 0;
            }
            obm.mouselayerselect=1;
            
            obm.mouseenter[cu]=obm.wb3d_ids[this.id.split('maincanvas-')[1]];

            id=id+'-';
            id=id.split('-');
            if(id[2]===undefined){
                  obm.hover_slide=obm.activeslide[cu];
                  obm.onslidemousemove=-1;
            }
            else{
                  obm.mouseenter[cu+'_'+id[0]+'-'+id[1]]=1;
                  obm.hover_slide=id[0]+'-'+id[1]+'-'+id[2]+'-'+id[3];
                  obm.onslidemousemove=obm.wb3d_ids[this.id.split('-')[1]];
            }
	};
	if(wb3d.flag==='main'&&level===0){
		obm.canvasArray[obm.wb3d_ids[wslide]]= document.getElementById('maincanvas-'+wslide);
	     obm.ctxarray[obm.wb3d_ids[wslide]]=  obm.canvasArray[obm.wb3d_ids[wslide]].getContext('2d');
	}
}//wb3d_create_event_slide


function wb3d_scroll_event(id,obm,parent){
      obm.wheel[id]=document.getElementById(parent);
      obm.wheel[id].addEventListener('wheel', wb3d_wheel2);
      obm.wheel[id].addEventListener('mousewheel', wb3d_wheel2);
      obm.wheel[id].addEventListener('DOMMouseScroll', wb3d_wheel2);
      obm.wheel[id].addEventListener('onmousewheel', wb3d_wheel2);	
}
function wb3d_functions_event(obm){
	window.onfocus = function () { 
		obm.es1_Tab = 1; 
	}; 

	window.onblur = function () { 
		obm.es1_Tab = 0; 
	}; 

	document.onkeypress=function(event){
		if(wb3d.flag==='main'){
			jQuery('#es_pressKey').val(event.key);
			jQuery('#es_pressKey2').val(event.key);
			jQuery('#es_pressKey2_c').val(event.key);
			jQuery('#es_pressKey2_b').val(event.key);
		}
		obm.es1_key=Number(event.charCode);
		obm.tmp_es1_charStr=Number(event.charCode);
	};


	if(wb3d.flag==='main'){
      	window.onresize = function(){
      		wb3d_scroll_tab_leftmenu(obm.tab_leftmenu,obm);
      	};
      }


}//end wb3d_functions_event

function wb3d_events(id,obm ) {
      var level3=obm.wb3d_ids[id.split('-')[1]].split('-');
      document.getElementById(id).onmousemove = function(e) {
            if(obm.mouseSliderScroll===1){
                  return;
            }
            var x=wb3d_check_tag(e,this);
            if(x.flag===0||x.flag===undefined){
                  return;
            }
            obm.onmousemovelayer=x.idmm;
            var rect =this.getBoundingClientRect();
            x.x=e.clientX - rect.left;
            x.y=e.clientY - rect.top;
            obm.es1_x[x.idm]=x.x;
            obm.es1_y[x.idm]=x.y;
            if(x.level===1){
                  obm.onslidemousemove=x.s;
            }

            if(obm.mousemove_obj[x.id1]!=undefined){
                  obm.mousemove_obj[x.id1](e,x.id1,x.F,x.modd,x.sn,x);
            }
      };
      if(wb3d.flag==='main'&&level3[4]==undefined){
            jQuery("#pen-"+id.split('-')[1]).click(function(){
                  jQuery('.wb3d_panel').css("display","none");
                  jQuery('#tab_slide').click();
                  jQuery('#tab_object2').click();
            });
            jQuery("#pen2-"+id.split('-')[1]).click(function(){
                  jQuery('.wb3d_panel').css("display","none");
                  jQuery('#tab_slide').click();
                  jQuery('#tab_object2').click();
                  var id=obm.wb3d_ids[this.id.split('pen2-')[1]];
                  id=id.split('_')[1];
                  jQuery('#sett-'+id).click();
            });
            document.getElementById("pen-"+id.split('-')[1]).style.display="none";
            document.getElementById("pen2-"+id.split('-')[1]).style.display="none";
      }
      document.getElementById(id).onmouseenter = function(e) {
            if(obm.mouseSliderScroll===1){
                  return;
            }
            var x=wb3d_check_tag(e,this);
            if(x.flag===0||x.flag===undefined){
                  return;
            }
            if(wb3d.flag==='main'&&level3[4]==undefined){
                  document.getElementById("pen-"+x.id1).style.display="";
                  document.getElementById("pen2-"+x.id1).style.display="";
            }
            obm.mouseenter[x.idmm]=1;
            obm.onmousemovelayer=x.idmm;
            obm.hover_id[x.idmm]=1;
            if(obm.F['T_E'+obm.d]===11){
                  obm.bk_pluse[x.idmm]=1;
            }
            if(x.level===1){
                  obm.onslidemousemove=x.s;
            }

            var cc=x.F.click_type;
            if(cc===5){
                  obm.move_scroll_x++;
            }
            else  if(cc===6){
                  obm.move_scroll_y++;
            }
            if(obm.mouseenter_obj[x.id1]!=undefined){
                  obm.mouseenter_obj[x.id1](e,x.id1,x.F,x.modd,this);
            }
            e.stopPropagation();
      };
	document.getElementById(id).onmouseleave = function(e) {
            if(obm.mouseSliderScroll===1){
                  return;
            }
            var x=wb3d_check_tag(e,this,1);
            if(x.flag===0||x.flag===undefined){
                  return;
            }
            if(wb3d.flag==='main'&&level3[4]==undefined){
                  document.getElementById("pen-"+x.id1).style.display="none";
                  document.getElementById("pen2-"+x.id1).style.display="none";
            }
            obm.mouseenter[x.idmm]=-1;
            obm.onmousemovelayer=-1;
            if(obm.F['T_E'+obm.d]===11){
                  obm.bk_pluse[x.idmm]=-1;
            }

            if(obm.F['T_E'+obm.d]===11){
                  obm.bk_pluse[x.idmm]=-1;
            }
            if(obm.mouseleave_obj[x.id1]!=undefined)
                  obm.mouseleave_obj[x.id1](e,x.id1,0,0);
            e.stopPropagation();
      };

      document.getElementById(id).ontouchend  = function(e) {
            var x=wb3d_check_tag(e,this);
            if(x.flag===0||x.flag===undefined){
                  return;
            }
            obm.click1=x.idmm;
            obm.mouseenter[x.idmm]=1;
            obm.hover_id[x.idmm]=1;

            obm.es_mousedown=-1;
            obm.down_id=0;
            if(obm.mouseup_obj[x.id1]!=undefined){
                  obm.mouseup_obj[x.id1](e,x.id1);
            }
            obm.mousedown[x.idmm]=0;

      };

	document.getElementById(id).onmouseup = function(e) {
            var x=wb3d_check_tag(e,this);
            if(x.flag===0||x.flag===undefined){
                  return;
            }
            obm.click1=x.idmm;
            obm.mouseenter[x.idmm]=1;
            obm.hover_id[x.idmm]=1;

            obm.es_mousedown=-1;
            obm.down_id=0;
            if(obm.mouseup_obj[x.id1]!=undefined){
                  obm.mouseup_obj[x.id1](e,x.id1);
            }
            obm.mousedown[x.idmm]=0;
	};


      document.getElementById(id).ontouchstart  = function(e) {
       

            var x=wb3d_check_tag(e,this);
            if(x.flag===0||x.flag===undefined){
                  return 1;
            }
            wb3d_ontouchstart_onmousedown(e,this,x);
            return true;
      };
	document.getElementById(id).onmousedown = function(e) {

            var x=wb3d_check_tag(e,this);

            if(x.flag===0||x.flag===undefined){
                  return 1;
            }
            return wb3d_ontouchstart_onmousedown(e,this,x);
      };
      if(obm.event_obj[id.split('-')[1]]!=undefined){
            obm.event_obj[id.split('-')[1]](id,obm);
      }
}//wb3d_events

function wb3d_inheritance_click(idmm,obm){
      if(obm.bk_pluse[idmm]===1){
            obm.bk_pluse[idmm]=-1;
      }
      else if(obm.bk_pluse[idmm]===-1){
            obm.bk_pluse[idmm]=1;
      }
      else if(obm.framenum[idmm]===0){
            obm.bk_pluse[idmm]=1;
      }
      else{
            obm.bk_pluse[idmm]=-1;
      }

}




