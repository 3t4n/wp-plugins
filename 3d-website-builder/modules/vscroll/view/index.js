/**
* Version:     1.0.0
* Author:      Keivan Kamali
*/


wb3d_setupdata.vscroll=function(obm){


      obm.createobj.vscroll=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){
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
            txt+='</'+tag2+'>';
            txt+='</div>';
            txt+='</div>';
            document.getElementById(tmpdivid).insertAdjacentHTML('beforeend',txt);
            obm.bk_create_layer[l]=-1;
            wb3d_reset_obj_xy3(l);
      };



      obm.addon.wb3d_vscroll_run=function(sn,obm,frm,B,eff,wslide,yy,md,w0 ,yy_0,md0,id1,id_l,type_L,wh,ids,idg,cu,level){
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
                  wh=obm.wb3d_ay[obm.cu+'_0'];
                  wh=obm.wh_h[id1];
            }
            else{
                  ids=cu+'_'+w0+'-'+yy_0+'-'+md0+'-'+wslide;
                  paternId=ids+'-'+yy;
                  paternId2=paternId+'-'+md;
                  wh=obm.wh_h[id1];
            }
            idg=cu+'_'+idg;
            var e2=B['sizey_'+obm.d+'-'+md]*obm.wh_h[id1];

            if(level==0){
                  ms=obm. scrollMaxY[idg]+obm.MaXvscroll;
            }
            else{
                  ms=obm. scrollMaxY[idg];
            }


            if(obm.down_id2==paternId&&obm.lockscrollY[ids]!=1&&obm.lockscrollXY[ids]!=1&&obm.scrollstatus!=1){
                  if(level!=0){
                        var sn3=obm.sn[cu+'-0'];
                        var F3=obm.dataslide[sn3][ obm.los[sn3+'-'+w0] ][obm.lo_l[sn3+'-'+w0+'-'+yy_0]];
                        if(F3['vs_'+obm.d  ]==1){
                              return;
                        }
                  }
                  obm.vscroll[idg]=parseInt(Math.round(obm.es1_y[paternId2]/e2*ms));
                  if(level==0){
                        var x=wb3d_find_x_scroll(idg,obm.vscroll[idg]);
                        x=x.x;
                        obm.vscrollM[idg]=obm.vscroll[idg]-x;
                  }
            }
            var t;
            if(obm.bk_vscroll_id2[id1]!=obm.vscroll[idg]+'-'+ms+'-'+obm.wh_w[id1]+'-'+obm.wh_h[id1]||obm.chenge_details_obj[id1]!=1){
                  obm.bk_vscroll_id2[id1]=obm.vscroll[idg]+'-'+ms+'-'+obm.wh_w[id1]+'-'+obm.wh_h[id1];
                  obm.ide2[id1].style.width =( B['sizex2_'+obm.d+'-'+md]*obm.wh_w[id1] )+ 'px';
                  var w1=B['sizex_'+obm.d+'-'+md]*obm.wh_w[id1];
                  var x2=(ms)+(B['sizey_'+obm.d+'-'+md]*obm.wh_h[id1]);
                  var h=(e2 * e2) / x2;
                  obm.ide2[id1].style.height =( h )+ 'px';
                  if(level==0){
                        t=obm.vscroll[idg]/(ms/(e2-h));
                  }
                  else{
                        t=obm.vscroll[idg]/(ms/(e2-h));
                  }
                  var w2=(w1-B['sizex2_'+obm.d+'-'+md]*obm.wh_w[id1])/2;
                  obm.ide2[id1].style.left =(w2)+ 'px';
                  obm.ide2[id1].style.top =(t)+ 'px';
                  if(document.getElementById('wb3de1-'+id1+'-2')!=null){
                        document.getElementById('wb3de1-'+id1+'-2').style.borderRadius=obm.ide[id1].style.borderRadius;
                  }
                  frm=0;
                  if(obm.bk_f[id_l+'-2']!=frm){
                        obm.chenge_details_obj[obm.wb3d_id[cu+'_'+paternId2]+'-2']=0;
                  }
                  obm.size1[id1+'-2']=7;
                  wb3d_set_scroll_ui(obm,level,idg);
                  wb3d_set_style(sn,obm,frm,B,B['handle_'+md],wslide,yy+'-2',md,w0 ,yy_0,md0,    obm.wb3d_id[paternId2]+'-2',id_l+'-2','layer2',0,0,0,         ids,0,idg,level);
            }
      };

	
      obm.setupobj.vscroll=function(obm,idm,T,B,wslide,name,y,sn,flag,level){
            obm.size1[idm]=1;
            obm.mousedown_obj[idm]=function (e,id,F,md,x){
                  obm.w_sc='v';
                  var t1=document.body.scrollTop;
                  if((isNaN(t1)||t1==0)&&document.documentElement.scrollTop>0){
                        t1=document.documentElement.scrollTop;
                  }
                  obm.bk_mouse=obm.by-t1;
                  obm.move_scroll_y++;
                  obm.offset_0 = obm.ide2[id].offsetTop;
            };
            obm.event_obj[idm]=function (id,obm){
                  id=id.split('-')[1];
                  document.getElementById('wb3df-'+id+'-2').ontouchstart  = function(e) {
                        obm.scrollstatus=1;
                        obm.mouseSliderScroll=1;
                  };
                  document.getElementById('wb3df-'+id+'-2').onmousedown = function(e) {
                        obm.scrollstatus=1;
                        obm.mouseSliderScroll=1;
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
