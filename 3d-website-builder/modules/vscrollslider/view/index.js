/**
* Version:     1.0.0
* Author:      Keivan Kamali
* copyright :  © 2024 Keivan Kamali all rights reserved
*/


wb3d_setupdata.vscrollslider=function(obm){


      obm.createobj.vscrollslider=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){
            var p='position:absolute;';
            var ext2='';
            ext2='<div id="wb3df-'+idm+'"  style="'+p+'top:0px;left:0px; height:auto;width:300px;">';
            var tags1=wb3d_set_tag(B,y);
            var tag1=tags1.tag1;
            var tag2=tags1.tag2;
            var txt='<div id="wb3dg-'+idm+'" style="'+p+'">'+ext2;
            if(B['overflow1_'+y]==1){
                  txt+='<'+tag1+' id="wb3de-'+idm+'" style="overflow:hidden">';
            }
            else{
                  txt+='<'+tag1+' id="wb3de-'+idm+'" >';
            }
            if(B['img_'+y]!=''){
                  txt+='<img id="wb3de1-'+idm+'-2" src="'+B["img_"+y]+'"  style=" width:100%;height:100%;position:absolute;top:0px;left:0px;z-index:-1;"/>';
            }

            txt+='<div id="wb3df-'+idm+'-2" style="overflow:hidden;;position:absolute;" >';

            if(B['img2_'+y]!=''){
                  txt+='<img id="wb3de-'+idm+'-2" src="'+B["img2_"+y]+'"  style=" width:100%;height:100%;position:absolute;top:0px;left:0px;z-index:1;"/>';
            }
            else{
                  txt+='<div id="wb3de-'+idm+'-2" style="width:100%;height:100%;position:absolute;top:0px;left:0px;z-index:1;"/></div >';
            }

            txt+='</div >';
            txt+='</'+tag2+' >';
            txt+='</div>';
            txt+='</div>';
            document.getElementById(tmpdivid).insertAdjacentHTML('beforeend',txt);
            obm.bk_create_layer[l]=-1;
            wb3d_reset_obj_xy3(l);
      };



      obm.addon.wb3d_vscrollslider_run=function(sn,obm,frm,B,eff,wslide,yy,md,w0 ,yy_0,md0,id1,id_l,type_L,wh,ids,idgs,cu,level){

            var J=obm.dataslide[sn][ obm.los[sn+'-'+w0] ][0];
            var ay=1;
            var p=1;
            var paternId,paternId2,ms;
            if(J.scv==1){
                  p=ay;
            }
            if(level==0){
                  ids=cu+'_'+wslide;
                  paternId=ids+'-'+yy;
                  paternId2=paternId+'-'+md;
                  wh=obm.wh2;
                  wh=obm.wh_h[id1];
            }
            else{
                  ids=cu+'_'+w0+'-'+yy_0+'-'+md0+'-'+wslide;
                  paternId=ids+'-'+yy;
                  paternId2=paternId+'-'+md;
            }
            var idg=cu+'_'+idgs;
            var e2=B['sizey_'+obm.d+'-'+md]*obm.wh_h[id1];

            if(level==0){
                  ms=obm. scrollMaxY[idg]+obm.MaXvscroll;
            }
            else{
                  ms=obm. scrollMaxY[idg];
            }

            if(obm.down_id2==paternId&&obm.scrollstatus!=1){
                  if(level!=0){
                        var sn3=obm.sn[cu+'-0'];
                        var F3=obm.dataslide[sn3][ obm.los[sn3+'-'+w0] ][obm.lo_l[sn3+'-'+w0+'-'+yy_0]];

                        if(F3['vs_'+md0  ]==1){
                              return;
                        }
                  }
                  // obm.vscroll[idg]=parseInt(Math.round(obm.es1_y[paternId2]/e2*ms));
                  if(level==0){
                        var x=wb3d_find_x_scroll(idg,obm.vscroll[idg]);
                        x=x.x;
                        // obm.vscrollM[idg]=obm.vscroll[idg]-x;
                  }

            }

            if(obm.bk_vscroll_id2[id1]!=obm.vscroll[idg]+'-'+ms+'-'+obm.wh_w[id1]+'-'+obm.wh_h[id1]||obm.chenge_details_obj[id1]!=1){
                  obm.bk_vscroll_id2[id1]=obm.vscroll[idg]+'-'+ms+'-'+obm.wh_w[id1]+'-'+obm.wh_h[id1];

                  obm.ide2[id1].style.width =( B['sizex2_'+obm.d+'-'+md]*obm.wh_w[id1] )+ 'px';
                  var h=B['sizey2_'+obm.d+'-'+md]*obm.wh_h[id1];
                  obm.ide2[id1].style.height =( h )+ 'px';
                  var w1=B['sizex_'+obm.d+'-'+md]*obm.wh_w[id1];

                  if(document.getElementById('wb3de1-'+id1+'-2')!=null){
                        document.getElementById('wb3de1-'+id1+'-2').style.borderRadius=obm.ide[id1].style.borderRadius;
                        document.getElementById('wb3de1-'+id1+'-2').onmousedown  = function() {
                              mouseIsDown=true;            
                              return false;
                        };
                       document.getElementById('wb3de1-'+id1+'-2').onmouseup  = function() {
                              mouseIsDown=false;
                        };
                  }

                  if(document.getElementById('wb3de-'+id1+'-2')!=null){
                        document.getElementById('wb3de-'+id1+'-2').style.borderRadius=obm.ide[id1].style.borderRadius;
                        document.getElementById('wb3de-'+id1+'-2').onmousedown  = function() {
                              mouseIsDown=true;            
                              return false;
                        };
                       document.getElementById('wb3de-'+id1+'-2').onmouseup = function() {
                              mouseIsDown=false;
                        };
                  }
                  var t=(((e2)/ms)*obm.vscroll[idg])-h/2;
                  var w2=(w1-B['sizex2_'+obm.d+'-'+md]*obm.wh_w[id1])/2;
                  obm.ide2[id1].style.left =(w2)+ 'px';
                  obm.ide2[id1].style.top =(t)+ 'px';
                  frm=0;
                  if(obm.bk_f[id_l+'-2']!=frm){
                        obm.chenge_details_obj[obm.wb3d_id[cu+'_'+paternId2]+'-2']=0;
                  }
                  obm.size1[id1+'-2']=7;
                  wb3d_set_scroll_ui(obm,level,idg);		
                  wb3d_set_style(sn,obm,frm,B,B['handle_'+md],wslide,yy+'-2',md,w0 ,yy_0,md0,    obm.wb3d_id[paternId2]+'-2',id_l+'-2','layer2',0,0,0,         ids,0,idgs,level);
            }
      };


	
      obm.setupobj.vscrollslider=function(obm,idm,T,B,wslide,name,y,sn,flag,level){

            obm.size1[idm]=1;

            obm.mousedown_obj[idm]=function (e,id,F,md,x){
                  obm.w_sc='vs';
                  obm.move_scroll_y++;
                  obm.offset_0 = obm.ide2[id].offsetTop;
            };

            obm.event_obj[idm]=function (id,obm){
                  id=id.split('-')[1];
                  document.getElementById('wb3df-'+id+'-2').ontouchstart  = function(e) {
                        var touchobj = e.changedTouches[0]; 
                        var endx = parseInt(touchobj.clientX);
                        var endy = parseInt(touchobj.clientY);
                        obm.touchstart=1;
                        obm.disty = endy - obm.starty;
                        obm.distx = endx - obm.startx;
                        var t1=document.body.scrollTop;
                        if((isNaN(t1)||t1==0)&&document.documentElement.scrollTop>0){
                              t1=document.documentElement.scrollTop;
                        }
                        obm.bk_mouse=obm.by-t1;
                        obm.bk_mouse=endy;
                        wb3d_handleMouseMove(1,endx,endy);
                        obm.scrollstatus=1;
                        obm.mouseSliderScroll=1;
                  }
                  document.getElementById('wb3df-'+id+'-2').onmousedown = function(e) {
                        obm.scrollstatus=1;
                        obm.mouseSliderScroll=1;
                        var t1=document.body.scrollTop;
                        if((isNaN(t1)||t1==0)&&document.documentElement.scrollTop>0){
                              t1=document.documentElement.scrollTop;
                        }

                        if(obm.touchstart!=1){
                              obm.bk_mouse=obm.by-t1;
                        }
                  };
            };

            obm.idc[idm+'-2']=document.getElementById('wb3df-'+idm+'-2');
            obm.idd[idm+'-2']=document.getElementById('wb3df-'+idm+'-2');
            obm.ide[idm+'-2']=document.getElementById('wb3de-'+idm+'-2');
            obm.ide2[idm]=document.getElementById('wb3df-'+idm+'-2');
            obm.show_obj[idm]=3;
            wb3d_set_bk(idm+'-2',obm);
            wb3d_events('wb3dg-'+idm,obm);
      };
};