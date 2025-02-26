/**
* Author URI:  https://3dwebsitebuilder.com/
* Author : Keivan Kamali
*/

function wb3d_create_layer0(obm,sn,B,wslide,yy,l,idg,level,cu){

      obm.try2[l]=0;
      obm.trx2[l]=0;
      obm.try[l]=0;
      obm.trx[l]=0;
      obm.maxtime[l]=100;
      obm.hover_id[l]=0;
      obm.hover_id2[l]=0;
      obm.mouseenter[l]=-1;

      for(var r=0;r<B.layer_obj;r++){

            if( !(level!=0&&B['type_'+B['obj_num_'+r]  ]==='wb3d')  ){
                  var idm=obm.wb3d_id[l+'-'+B['obj_num_'+r]];
                  obm.idc[idm]=document.getElementById('wb3dg-'+idm);
                  obm.idd[idm]=document.getElementById('wb3df-'+idm);
                  obm.ide[idm]=document.getElementById('wb3de-'+idm);
                  if(r>0&&wb3d.flag=='main')
                  	obm.idc[idm].style.display='none';
            }
      }
}
function wb3d_create_layer(obm,sn,B,wslide,yy,l,idg,level,cu){

	obm.bk_create_layer[l]=1;
	var flag=0;
	var x;

	for(var r=0;r<B.layer_obj;r++){

		if( !(level!=0&&B['type_'+B['obj_num_'+r]  ]==='wb3d')  ){

			if(B['ajax_'+B['obj_num_'+r]]!=1){
				var idm=obm.wb3d_id[l+'-'+B['obj_num_'+r]];

				if(B['type_'+B['obj_num_'+r]  ]==='wb3d'&&B['ajax_'+B['obj_num_'+r]]!=0){
					flag=1;
                        }
				var T=B[ 'type_obj-'+B['obj_num_'+r] ];
				var sf=T.split('_');
		

				if(sf[1]!=undefined){
					x = sf[0];
                        }
				else{
					x = T;
                        }

				obm.setupobj[x](obm,idm,T,B,wslide,yy,B['obj_num_'+r],sn,flag,level);
				wb3d_set_bk(idm,obm,l);
				if(B.l_type===2){
					if(level===0){
					}
					else{
						document.getElementById('wb3dg-'+idg).appendChild(document.getElementById('wb3dg-'+idm)); 
					}
				}
				obm.bk_create_layer[l+'-'+B['obj_num_'+r]]=1;
				obm.val['speed-'+l+'-'+B['obj_num_'+r] ]=1;
			}
		}
	}
}// create_layer0
																	
function wb3d_set_style(sn,obm,frm,B,eff,wslide,yy,modd,wslide_0 ,yy_0,mode_0,id1,id_l,type_L,flag,id2,flag2,ids,flag3,idg,level,end){

      var cu=obm.cu;
      var obj=obm.gs[sn][eff];

            if(B['type_obj-'+modd  ]===undefined&&type_L!='slide') {
            if(obm.idc[obm.bk_id[id_l]]!=undefined){
                  obm.idc[obm.bk_id[id_l]].style.display='none';
                  obm.chenge_display[obm.bk_id[id_l]]=-1;
                  obm.bk_mode[obm.bk_id[id_l]]=-1;
            }
            return ;
      }


      if(type_L==='layer'){
            if(obm.bk_create_layer[id_l]===0){
                  return;
            }
            else{
                  if(obm.bk_create_layer0[id_l]!=1){
                        wb3d_create_layer0(obm,sn,B,wslide,yy,id_l,idg,level,cu);
                        obm.bk_create_layer0[id_l]=1;
                  }
                  if(obm.bk_create_layer[id_l]!=1){
                        wb3d_create_layer(obm,sn,B,wslide,yy,id_l,idg,level,cu);
                        obm.bk_create_layer[id_l]=1;
                  }
            }
      }


      var scr=0;
      var x;
      var K=obm.dataslide[sn][ obm.los[sn+'-'+wslide] ][0];

	if(type_L==='layer'){
		if(obm.mouseenter[id_l]!=-1){
			x=Number(B.click_link);
			
			if(B.click_type===5){  

			}
			if(B.click_type===6){
				if(x>K['vmaxsc-'+obm.d]){
					x=K['vmaxsc-'+obm.d];
                        }
				else if(x<0){
					x=K['vmaxsc-'+obm.d];
                        }

				if(obm.vscroll[ids]!=x){
					obm.vscroll[ids]=obm.vscroll[ids]-wb3d_balance(obm.vscroll[ids]-x,obm);
				}
			}
		}

            if(obm.chenge_details_obj[id1]!=1){
                        wb3d_set_pre_width_height(obm,B,sn,id_l,id1,'layer',wslide,yy,modd,eff,frm,ids,idg,level,cu);		
            }

            if(wb3d.flag==='main'){
                  if(obm.bk_vscroll_id2[id1]===undefined){
                        obm.bk_vscroll_id2[id1]=0;
                  }

                  if(obm.bk_vscroll_id1[id1]===undefined){
                        obm.bk_vscroll_id1[id1]=0;
                  }
            }	
	}
      var angle,originx,originy,sx,sy,tZ,skX,skY,tr,scale,rr,type1,tx,ty;
      var rtx,rty,pers_originx,pers_originy,C,snc,t,idg2;
      var T=B[ 'type_obj-'+modd];


	if(obm.chenge_details_obj[id1]!=1||B['P_'+obm.d]>=1||obm.chenge_display[id1]!=1||obm.bk_scr[id1]!=obm.vscroll[cu+'_'+idg]+'_'+obm. scrollMaxY[cu+'_'+idg]){

      	if(level===0||obm.setting[sn].colortype!=1){
      		C=obm.setting[obm.sn[cu+'-0']]['c'+obm.sColortable]; 
            }
      	else{
      		C=obm.setting[sn]['c'+obm.sColortable]; 
            }


      	if(level===0||obm.setting[sn].colortype!=1){
      		snc=obm.sn[cu+'-0'];
            }
      	else{
                  snc=sn; 
            }
            var ex=0; 
		var ey=0;

		// Pro version's code
		if(wb3d.wb3d_pro2==1&&eff!=-1){			
			var ex=obj.d_x[frm]; 
			var ey=obj.d_y[frm];
		}
		var flp=1;

		if(B['P_'+obm.d]>=1&&obm.parallex===1){
                  x=obm.bk_left2[id_l];
                  var y=obm.bk_top2[id_l];
                  obm.bx1=obm.bx;
                  obm.by1=obm.by;
                  sx=obm.setting[sn]['w_'+obm.d]*obm.wb3d_ax[cu+'_0'];
                  sy=obm.setting[sn]['h_'+obm.d]*obm.wb3d_ay[cu+'_0'];
				
                  if(obm.bx1===0||obm.by1===0){
                        flp=0;
                  }

			if(flp===1){
				if(B['P1_'+obm.d]!=0){
                              wb3d_parallax1(B,obm,B['P1_'+obm.d],B['Ps1_'+obm.d],id1,obm.bx1,obm.by1,x,y,sx,sy,cu+'_'+idg,id_l);
                        }
				if(B['P2_'+obm.d]!=0){
					wb3d_parallax1(B,obm,B['P2_'+obm.d],B['Ps2_'+obm.d],id1,obm.bx1,obm.by1,x,y,sx,sy,cu+'_'+idg,id_l);
                        }
			}
		}


		if(type_L==='slide'){
                  obm.trx[id_l]=ex*obm.wb3d_ax[idg];
                  obm.try[id_l]=ey*obm.wb3d_ay[idg];
		}
		else if((B.l_type>=11)&&wb3d.flag!='main'){
                  if(B.l_type<=12){
                        obm.trx[id_l]=obm.bx+2-obm.bk_top3["B"+id_l];
                        obm.try[id_l]=obm.by+2-obm.bk_top3["A"+id_l];                              
                  }
                  else{
                        obm.trx[id_l]=obm.bx-2-obm.bk_top3["B"+id_l]-B['sizex_'+obm.d+'-'+modd]*obm.wh_w[id1];
                        obm.try[id_l]=obm.by-2-obm.bk_top3["A"+id_l]-B['sizey_'+obm.d+'-'+modd]*obm.wh_h[id1];
                  }


			if(level!=0){

				var left_parent=obm.trx[cu+'_'+wslide_0+'-'+yy_0]+obm.bk_left2[cu+'_'+wslide_0+'-'+yy_0];
				var top_parent=obm.try[cu+'_'+wslide_0+'-'+yy_0]+obm.bk_top2[cu+'_'+wslide_0+'-'+yy_0];
				obm.trx[id_l]-=left_parent;
				obm.try[id_l]-=top_parent;
			}
			obm.chenge_details_obj[id1]=-1;
		}
		else if(obm.chenge_details_obj[id1]!=1){
			if(B['noxy'+obm.d]===1){
				ex=0;
				ey=0;
			}
			ex=ex*B['t_x_'+obm.d]/100;
			ey=ey*B['t_y_'+obm.d]/100;
			obm.try[id_l]=ey+obm.bk_p_y[id_l];
			obm.trx[id_l]=ex+obm.bk_p_x[id_l];
			obm.trx[id_l]*=obm.wb3d_ax[cu+'_'+idg];
			obm.try[id_l]*=obm.wb3d_ay[cu+'_'+idg];
                  obm.trx[id_l]+=obm.trx2[id_l];
                  obm.try[id_l]+=obm.try2[id_l];
		}

  ///////////////////////parallax//////////////////////


            if(obm.chenge_details_obj[id1]!=1||obm.bk_scr[id1]!=obm.vscroll[cu+'_'+idg]+'_'+obm. scrollMaxY[cu+'_'+idg]){

                  obm.bk_scr[id1]=obm.vscroll[cu+'_'+idg]+'_'+obm. scrollMaxY[cu+'_'+idg];
                  scr=0;

                  if(obm.U_P[sn+'-'+wslide+'-'+yy]===0&&wb3d.flag==='main'&&level===0){
                        idg2=0;
                        if(B['P_s'+obm.d]===0){
                              scr=-obm.vscrollM[cu+'_'+idg];
                        }
                  }
                  else if(obm.U_P[sn+'-'+wslide+'-'+yy]===0&&level!=0){
                        if(obm.ajaxwb3d_reverse[cu+'_'+idg]===1){
                              scr=obm. scrollMaxY[cu+'_'+idg]-obm.vscroll[cu+'_'+idg];
                        }
                        else{
                              scr=obm.vscroll[cu+'_'+idg];                                    
                        }

                        if(B['P_s'+obm.d]===0){
                              scr=-scr;
                        }
                        else{
                              scr=0;
                        }
                        idg2=0;
                  }
                  if(B.l_type==2)
                  	scr=0;
			tx=1;
			ty=1;
                  if(wb3d.wb3d_pro2==1&&eff!=-1){
				if(obj.E[0][22]===0){
					angle=0;
	                  }
				else{
					angle=obj.E[22][frm];
	                  }
				if(obj.E[0][23]===0){
					rtx=0;
				}
				else{
					rtx=obj.E[23][frm];
				}

				if(obj.E[0][24]===0){
					rty=0;
				}
				else{
					rty=obj.E[24][frm];
				}

				if(obj.E[0][25]===0){
					tZ=0;
				}
				else{
					tZ=obj.E[25][frm]*obm.wh_w[id1];
				}

				if(obj.E[0][3]===0){
					skX=0;
				}
				else{
					skX=obj.E[3][frm];
				}
				if(obj.E[0][4]===0){
					skY=0;
				}
				else{
					skY=obj.E[4][frm];
				}

				if(obj.E[0][17]!=0){
				      tx=obj.E[17][frm]/100;
				}

				if(obj.E[0][18]!=0){
				      ty=obj.E[18][frm]/100;
				}

            	}
            	else{
            		angle=0;
            		rtx=0;
            		rty=0;
            		tZ=0;
            		skX=0;
            		skY=0;

            	}

			angle=angle+obm.bk_p_r[id_l]; 
			rtx=rtx+obm.bk_p_rx[id_l];
			rty=rty+obm.bk_p_ry[id_l]; 
                  obm.bk_ty[id1]=ty;
                  obm.bk_tx[id1]=tx;


                  tZ=' translateZ('+tZ+'px) ';
                  angle=' rotate('+angle+'deg) ';
                  rtx=' rotateX('+rtx+'deg) ';
                  rty=' rotateY('+rty+'deg) ';

                  skX=' skew('+(skX+obm.bk_p_skx[id_l])+'deg,'+(skY+obm.bk_p_sky[id_l])+'deg) ' ;

                  if(B.change_XY===1||type_L==='layer2'){
                        obm.trx[id_l]=0;
                        obm.try[id_l]=0;
                  }

                  tr=' translate('+(obm.trx[id_l])+'px,'+(obm.try[id_l]+scr)+'px) ';
                  var scale2=' scale('+(1)+','+(1)+') ';
                  if(obm.scaleX[id1]!=1){

	                  if(((1+obm.bk_p_scx[id_l]*obm.bk_f_scx[id1]/100)*obm.bk_tx[id1])===1&&((1+obm.bk_p_scy[id_l]*obm.bk_f_scy[id1]/100)*obm.bk_ty[id1])===1){
	                        scale='';
	                  }
	                  else {
	                        scale=' scale('+((1+obm.bk_p_scx[id_l]*obm.bk_f_scx[id1]/100)*obm.bk_tx[id1])+','+((1+obm.bk_p_scy[id_l]*obm.bk_f_scy[id1]/100)*obm.bk_ty[id1])+') ';
	                  }
	            }
	            else{
	            	scale2= obm.scaleY[id1];
	            }

                  if(type_L==='slide'){
                        obm.idc[id_l].style.transform=tZ+tr+scale+angle+rtx+rty+skX;
                  }
			else{
				
				if(B.pers===0){
					if(obm.bk_transform1[id1]!=1){
						obm.idc[id1].style.perspectiveOrigin='';
						obm.idc[id1].style.transformStyle='';
						obm.idd[id1].style.transformStyle='';
						obm.ide[id1].style.transformStyle='';
						obm.idc[id1].style.perspective ='';
						obm.idd[id1].style.transform=' rotateX(0deg) rotate(0deg) ';
						obm.ide[id1].style.transform=' rotateX(0deg) rotate(0deg) ';
						obm.idc[id1].style.transform=' rotateX(0deg) rotate(0deg) ';
						obm.bk_transform1[id1]=1;
					}

					if(obm.bk_transform2[id1]!=tZ+tr+skX+angle+rtx+rty+scale){
						if(B['relative_'+modd  ]!=2){
							obm.idc[id1].style.transform =tZ+tr+skX+angle+rtx+rty+scale;
							obm.bk_transform2[id1]=tZ+tr+skX+angle+rtx+rty+scale;
						}
					}
				}
				else{//object
					if(obm.bk_transform1[id1]!=1){

						obm.idc[id1].style.transformStyle='flat';
						
						if(B.pers===2){
							obm.idd[id1].style.transformStyle='preserve-3d';
							obm.ide[id1].style.transformStyle='preserve-3d';
						}
						else{
                                          obm.idd[id1].style.transformStyle='flat';
                                          obm.ide[id1].style.transformStyle='flat';
						}
						obm.idc[id1].style.perspective ='1000px';
						obm.bk_transform1[id1]=1;
					}
					if(obm.bk_transform2[id1]!=tZ+tr+skX+angle+rtx+rty+scale+'-'+B.pers){
						if(B['relative_'+modd  ]!=2){
							obm.idc[id1].style.transform =tZ+tr+scale+'rotate(0deg) rotateX(0deg) ';
							obm.idd[id1].style.transform =skX+angle+rtx+rty;
							obm.bk_transform2[id1]=tZ+tr+skX+angle+rtx+rty+scale+'-'+B.pers;
						}
					}
				}
				if(obm.scaleX[id1]==1)
					obm.ide[id1].style.transform =scale2+'rotate(0deg) rotateX(0deg) ';
			}
		}
////////////////////////////////////////////chenge_details_obj2///////////////////////////////////////////////

            if(obm.chenge_details_obj2[id1]!=1){
                  var c0,c1,c2,c3,c4,c5,c6,c7,c8,gg,bb,aa,opacity,txt_bg,type,tmp,txt,h,Z;      
                  Z=10;
			opacity=1;
                  if(level===0||obm.setting[sn].colortype!=1){
                        C=obm.setting[obm.sn[cu+'-0']]['c'+obm.sColortable]; 
                  }
                  else{
                        C=obm.setting[sn]['c'+obm.sColortable]; 
                  }
                  if(level===0||obm.setting[sn].colortype!=1){
                        snc=obm.sn[cu+'-0'];
                  }
                  else{
                        snc=sn; 
                  }

			var txt1='';
			var txt2='';
			var txt3='';
			var txt4='';
			c1=1;
			c2=2;
			c3=3;
                  if(wb3d.wb3d_pro2==1&&eff!=-1){
				if(obj.E[0][14]===0){
	                  }
				else{
					c1=obj.E[14][frm]; 
	                  }

				if(obj.E[0][15]===0){
	                  }
				else{
					c2=obj.E[15][frm]; 
	                  }
				if(obj.E[0][16]===0){
	                  }
				else{
					c3=obj.E[16][frm]; 
	                  }
	            }

			if(c1!=0){
				rr=obm.r[snc+'-'+C+'-'+c1];
				gg=obm.g[snc+'-'+C+'-'+c1];
				bb=obm.b[snc+'-'+C+'-'+c1];
				aa=obm.a[snc+'-'+C+'-'+c1]/255;    
				txt1='rgba('+rr+','+gg+','+bb+','+aa+')';
			}
			else{
				txt1='transparent';
                  }
                  txt_bg=txt1;
			obm.txt1[id1]=txt1;

			if(c2!=0){
				rr=obm.r[snc+'-'+C+'-'+c2];
				gg=obm.g[snc+'-'+C+'-'+c2];
				bb=obm.b[snc+'-'+C+'-'+c2];
				aa=obm.a[snc+'-'+C+'-'+c2]/255;     
				txt2='rgba('+rr+','+gg+','+bb+','+aa+')';
			}
			else{
				txt2='transparent';
                  }
			obm.txt2[id1]=txt2;
			if(obm.bk_color[id1]!=txt2&&type_L!='slide'){
				obm.ide[id1].style.color=txt2;
				obm.bk_color[id1]=txt2;
			}


			if(c3!=0){
				rr=obm.r[snc+'-'+C+'-'+c3];
				gg=obm.g[snc+'-'+C+'-'+c3];
				bb=obm.b[snc+'-'+C+'-'+c3];
				aa=obm.a[snc+'-'+C+'-'+c3]/255;                          
				txt3='rgba('+rr+','+gg+','+bb+','+aa+')';
			}
			else{
				txt3='transparent';
                  }
			obm.txt3[id1]=txt3;

	            if(wb3d.wb3d_pro2==1&&eff!=-1){


				//gradient
				if(obj.E[0][34]!=0&&obj.E[34][frm]>0) {

					var g1=obj.C[1][frm];
					var p1=obj.P[1][frm]-101;
					var z=obj.G[0][frm];
					c1=obm.r[snc+'-'+C+'-'+g1]+','+obm.g[snc+'-'+C+'-'+ g1]+','+obm.b[snc+'-'+C+'-'+ g1]+','+(obm.a[snc+'-'+C+'-'+ g1]/255);


					if(obj.G[1][frm]===1&&z!=-1){
						type='linear-gradient('+z+'deg,';
	                        }
					else if(obj.G[1][frm]===1){
						type='linear-gradient(';
	                        }
					else if(obj.G[1][frm]===2){
						type='radial-gradient(circle,';
	                        }

					txt4+=type+'rgba('+c1+')';
					if(p1>-101){
						txt4+=' '+p1+'%';
	                        }


					for(var f=2;f<=obj.E[34][frm];f++){
						g1=obj.C[f][frm];
						p1=obj.P[f][frm]-101;

						txt4+=',rgba('+obm.r[snc+'-'+C+'-'+g1]+','+obm.g[snc+'-'+C+'-'+ g1]+','+obm.b[snc+'-'+C+'-'+ g1]+','+(obm.a[snc+'-'+C+'-'+ g1]/255)+')';
						if(p1>-101){
							txt4+=' '+p1+'%';
	                              }
					}
					txt4+=')';
				}

				if(obm.bg[id1]!=1){
					if(obj.E[0][34]!=0&&obj.E[34][frm]>0) {
						txt_bg=txt4;
	                        }
					else if(txt1!='transparent'  )  {
						txt_bg=txt1;
					}
					else {
						txt_bg='none';  
					}
	                  }



				h=1;
				tmp='px';
				c0=obj.E[27][frm];
				if(c0>0 ) {
					c1=obj.E2[0][frm]*obm.wh_w[id1];
					c2=obj.E2[1][frm]*obm.wh_w[id1];
					c3=obj.E2[2][frm]*obm.wh_w[id1];                    
					c4=obj.E2[3][frm]*obm.wh_w[id1];
					c5=obj.E2[4][frm];

					rr=obm.r[snc+'-'+C+'-'+c5];
					gg=obm.g[snc+'-'+C+'-'+c5];
					bb=obm.b[snc+'-'+C+'-'+c5];
					aa=obm.a[snc+'-'+C+'-'+c5]/255;        
					var color=' rgba('+rr+','+gg+','+bb+','+aa+')';

	                        if(c0===1){
	                              type1='dotted';
	                        }
	                        else  if(c0===2){
	                              type1='dashed';
	                        }
	                        else  if(c0===3){
	                              type1='solid';
	                        }
	                        else  if(c0===4){
	                              type1='double';
	                        }
	                        else  if(c0===5){
	                              type1='groove';
	                        }
	                        else  if(c0===6){
	                              type1='ridge';
	                        }
	                        else  if(c0===7){
	                              type1='inset';
	                        }
	                        else  if(c0===8){
	                              type1='outset';
	                        }


					if(obm.bk_border[id1]!=(c1+c2+c3+c4+type1+color)&&obm.l_border[id1]!=1){
						obm.ide[id1].style.borderTop=c1+tmp+' '+type1+color;
						obm.ide[id1].style.borderRight =c2+tmp+' '+type1+color;
						obm.ide[id1].style.borderBottom =c3+tmp+' '+type1+color;
						obm.ide[id1].style.borderLeft =c4+tmp+' '+type1+color;
						obm.bk_border[id1]=c1+c2+c3+c4+type1+color;
						obm.bkborder1[id1]=c1;
						obm.bkborder2[id1]=c2;
						obm.bkborder3[id1]=c3;
						obm.bkborder4[id1]=c4;
					}
				}

				else if(obm.bk_border[id1]!=0&&obm.l_border[id1]!=1){ 
	                        obm.ide[id1].style.border='none';
	                        obm.bk_border[id1]=0;
	                        obm.bkborder1[id1]=0;
	                        obm.bkborder2[id1]=0;
	                        obm.bkborder3[id1]=0;
	                        obm.bkborder4[id1]=0;
				}


				txt='';
				tmp='px';
				if(obj.E[0][31]!=0){
					var max_shadow_box=obj.E[31][frm];
					for(h=1;h<=max_shadow_box;h++){
						if(h>1){
							txt+=',';
	                              }

						c1=obj.S1[h][frm]*obm.wh_w[id1];
						c2=obj.S2[h][frm]*obm.wh_w[id1];
						c3=obj.S3[h][frm]*obm.wh_w[id1];
						c4=obj.S4[h][frm]*obm.wh_w[id1];
						c5=obj.S5[h][frm];
						c6=obj.S6[h][frm];
						rr=obm.r[snc+'-'+C+'-'+c5];
						gg=obm.g[snc+'-'+C+'-'+c5];
						bb=obm.b[snc+'-'+C+'-'+c5];
						aa=obm.a[snc+'-'+C+'-'+c5]/255;      

						if(c6===1){
							c6='inset ';
	                              }
						else{
							c6=' ';
	                              }
						txt+=(c6+c1+tmp+' '+c2+tmp+' '+c3+tmp+' '+c4+tmp+' rgba('+rr+','+gg+','+bb+','+aa+')' )  ;  
					}
	               
		                  if(obj.E[31][frm]>0&&obm.bk_shadow_box[id1]!=txt&&type_L!='slide' ){

		                        if(obm.bshadow[id1]!=1){
		                              obm.ide[id1].style.boxShadow =txt;
		                        }
		                        obm.bk_shadow_box[id1]=txt;

		                  } 
		            }

				if((obj.E[0][31]===0||obj.E[31][frm]===0)&&type_L!='slide'){
					if(obm.bk_shadow_box[id1]!='none') {
						obm.ide[id1].style.boxShadow ='none';
						obm.bk_shadow_box[id1]='none';
					}
				}


				///////////////////////////////////////////////////////shadow_text///////////////////////////////////////////////////

				txt='';
				tmp='px';
				if(obj.E[0][32]!=0){
					var max=obj.E[32][frm];

					for(h=1;h<=max;h++){
						if(h>1){
							txt+=',';
	                              }

						c1=obj.S7[h][frm]*obm.wh_w[id1];
						c2=obj.S8[h][frm]*obm.wh_w[id1];
						c3=obj.S9[h][frm]*obm.wh_w[id1];
						c4=obj.S10[h][frm];

						rr=obm.r[snc+'-'+C+'-'+c4];
						gg=obm.g[snc+'-'+C+'-'+c4];
						bb=obm.b[snc+'-'+C+'-'+c4];
						aa=obm.a[snc+'-'+C+'-'+c4]/255;        

						txt+=(c1+tmp+' '+c2+tmp+' '+c3+tmp+' rgba('+rr+','+gg+','+bb+','+aa+')' )  ;  
					}

					if(obj.E[32][frm]>0&&obm.bk_tshadow[id1]!=txt&&type_L!='slide') {
						obm.ide[id1].style.textShadow =txt;
						obm.bk_tshadow[id1]=txt;
					} 
				}
				if(obj.E[32][frm]===0||obj.E[0][32]===0&&type_L!='slide') 
				{
					if(obm.bk_tshadow[id1]!='none'){
						obm.bk_tshadow[id1]='none';
						obm.ide[id1].style.textShadow ='none';
					}
				}
	      

	      ///////////////////////////////////////////////Leter spacing////////////////////////////////////

	                  var letterspacing='normal';
				if(obj.E[0][6]!=0){
	                        letterspacing=(obj.E[6][frm]*obm.wh_w[id1])+'px';
	                        if(obj.E[6][frm]===0){
	                              letterspacing='normal';
	                        }
	                  }

				if(obm.bk_letterspacing[id1]!=letterspacing&&type_L!='slide'){
					obm.idc[id1].style.letterSpacing  =letterspacing;
					wb3d_set_width_height(obm,B,sn,id_l,id1,'layer',wslide,yy,modd,eff,frm,ids,idg,level,cu);
					obm.bk_letterspacing[id1]=letterspacing;
				}
   		  //////////////////////////////////////////z-index//////////////////////////////////

				if(obj.E[0][13]===0){
					Z=10;
	                  }
				else{
					Z=obj.E[13][frm];
	                  }

	        ///////////////////////////////////////////////opacity////////////////////////////////////

				if(obj.E[0][2]===0){
					opacity=1;
	                  }
				else{
					opacity=obj.E[2][frm]/255;
	                  }
////////////////////////////////////////////////////radius//////////////////////////////////////
	                  var tmpr;
				tmp='%';
				c1=0;
				c2=0;
				c3=0;
				c4=0;
				c5=0;
				c6=0;
				c7=0;
				c8=0;

				if(obj.E[0][33]!=0){
					t=5;

					if(obj.E[33][frm]>=3){
						t=9;
	                        }

					if(obj.E[33][frm]===3||obj.E[33][frm]===1){
						tmp='%';
	                        }
					else{
						tmp='px';
	                        }

					c1=obj.R[1][frm];
					c2=obj.R[2][frm];
					c3=obj.R[3][frm];
					c4=obj.R[4][frm];

					if(t===9){
						c5=obj.R[5][frm];
						c6=obj.R[6][frm];
						c7=obj.R[7][frm];
						c8=obj.R[8][frm];                 
					}
	        

					tmpr=c1+tmp+' '+c2+tmp+' '+c3+tmp+' '+c4+tmp;

					if(t===9){             
						tmpr+=' / '+c5+tmp+' '+c6+tmp+' '+c7+tmp+' '+c8+tmp;
	                        }
	                  }
	                  else{
	                        tmpr='';
	                  }
				if(obm.bk_radius[id1]!=tmpr&&type_L!='slide'){                         
					obm.idd[id1].style.borderRadius  =tmpr;
					obm.ide[id1].style.borderRadius  =tmpr;
					obm.bk_radius[id1]=tmpr;
				}

				if(obj.E[0][8]!=0){
					if(obm.bk_classobj[id1]!=obj.E[8][frm]&&type_L!='slide'){

						if(obj.E[8][frm]>0&&(obj.E[0][8]!=0)){
							obm.ide[id1].classList.remove('wb3d_'+sn+'_class_'+obm.bk_classobj[id1]);
							obm.ide[id1].classList.add('wb3d_'+sn+'_class_'+obj.E[8][frm]);
						}
						else{
							obm.ide[id1].classList.remove('wb3d_'+sn+'_class_'+obm.bk_classobj[id1]);
						}
						obm.bk_classobj[id1]=obj.E[8][frm];
					}
	                  }
			}


                  if(B.l_type===10&&obm.bk_tab[ids]!=B.tab){
                        opacity=0.01;
                        Z=-1;
                  }
			if((B.l_type<=10)&&type_L!='slide'){
				if(obm.bk_zindex[id1]!=Z){
					obm.idc[id1].style.zIndex   =Z;
					obm.bk_zindex[id1]=Z;
				}	
			}
			else if(B.l_type>=11){
				Z=10000;
				if(obm.bk_zindex[id1]!=Z){
					obm.idc[id1].style.zIndex   =Z;
					obm.bk_zindex[id1]=Z;
				}
			}

			

			if(obm.bk_op[id1]!=opacity&&type_L!='slide'){
				obm.idc[id1].style.opacity  =opacity;
				if(opacity===0||obm.bk_op[id1]===0){
					obm.chenge_display[id1]=-1;
				}
				obm.bk_op[id1]=opacity;
			}

			if((obm.bk_bg[id1]!=txt_bg)&&obm.bg[id1]!=1&&type_L!='slide'){
				if(B['type_'+modd  ]!='wb3d'){
					obm.ide[id1].style.background =txt_bg;
                        }
				obm.bk_bg[id1]=txt_bg;
			}
		}




            if(wb3d.flag!='main'&&K.cursor===1&&obm.cursor[ids]!=1){
                  obm.cursor[ids]=1;
                  if(level===1){
                        document.getElementById('wb3dh-'+obm.wb3d_id[ids]).style.cursor = 'none';
                  }
                  else{
                        document.body.style.cursor = 'none';
                  }
            }
		if(B['relative_'+modd  ]==2){

		}
		else if(wb3d.flag!='main'&&B.l_type>=11){

                  if(level!=0){

                        if(obm.onslidemousemove!=ids) {
                              if(obm.bk_display[id1]!=0){
                                    obm.idc[id1].style.display   ='none';    
                                    obm.bk_display[id1]=0 ;                                    
                              }

                              obm.bk_dis[id1]=1;
                              obm.mlayer[ids]=0;
                        }
                        else if(obm.onmousemovelayer!=(ids+'-'+B.tab)&&(B.l_type===11||B.l_type===13)) {
                              if(obm.bk_display[id1]!=0){
                                    obm.idc[id1].style.display='none';
                                    obm.bk_display[id1]=0; 
                              }
                        }
                        else if(obm.onmousemovelayer===(ids+'-'+B.tab)&&(B.l_type===11||B.l_type===13)){
                              if(obm.bk_display[id1]!=1){
                                    obm.ide[id1].style.display   ='inline-block';
                                    obm.idc[id1].style.display   ='inline-block';
                                    obm.ide[id1].classList.remove("wb3d_displaynone");
                                    obm.bk_display[id1]=1;

                              }
                               obm.mlayer[5]=1;
                        }
                        else if(obm.mlayer[3]==1&&(B.l_type===12||B.l_type===14)){//slide
                              if(obm.bk_display[id1]!=1){
                                    obm.ide[id1].style.display='inline-block';
                                    obm.idc[id1].style.display='inline-block';
                                    obm.ide[id1].classList.remove("wb3d_displaynone");
                                    obm.bk_display[id1]=1;
                              }
                              obm.mlayer[4]=1;
                        }
                        else if(B.l_type===12||B.l_type===14){
                              if(obm.bk_display[id1]!=0){
                                    obm.idc[id1].style.display   ='none';
                                    obm.bk_display[id1]=0;
                              }
                        }
                  }
                  else{

                         if(obm.onmousemovelayer!=(ids+'-'+B.tab)&&(B.l_type===11||B.l_type===13)) {
                              if(obm.bk_display[id1]!=0){
                                    obm.idc[id1].style.display='none';
                                    obm.bk_display[id1]=0; 
                              }
                        }
                        else if(obm.mlayer[1]==1&&obm.onmousemovelayer==(ids+'-'+B.tab)&&(B.l_type===11||B.l_type===13)){
                              if(obm.bk_display[id1]!=1){
                                    obm.ide[id1].style.display   ='inline-block';
                                    obm.idc[id1].style.display   ='inline-block';
                                    obm.ide[id1].classList.remove("wb3d_displaynone");
                                    obm.bk_display[id1]=1;

                              }
                               obm.mlayer[2]=1;
                        }
                        else if(obm.mlayer[0]==1&&(B.l_type==12||B.l_type===14)){//slide
                              if(obm.bk_display[id1]!=1){
                                    obm.ide[id1].style.display='inline-block';
                                    obm.idc[id1].style.display='inline-block';
                                    obm.ide[id1].classList.remove("wb3d_displaynone");
                                    obm.bk_display[id1]=1;
                              }
                        }
                        else if(B.l_type===12||B.l_type===14){
                              if(obm.bk_display[id1]!=0){
                                    obm.idc[id1].style.display   ='none';
                                    obm.bk_display[id1]=0;
                              }
                        }
                  }
                  obm.bk_display[id1]=-1;
		}
		else if(obm.chenge_display[id1]!=1){
                  var dis;

			dis=1;
			if(wb3d.flag==='main'){	

				if(B.show===0||B['hide_'+obm.d]===1&&obm.bk_flag[id1]===0){
					dis=0;
                        }
			}
			else{
				if(obm.show_obj[id1]<=1){
					dis=0;
                        }
				else{
					dis=1;
                        }

				if((B['hide_'+obm.d]===1&&flag2===0)){
					dis=0;
				}
				if(B.show===0){
					dis=0;
                        }

				if(B['S_'+obm.d]===0){
					dis=0;
                        }
			}

			if(B['P_s'+obm.d]===1&&level===0&&obm.cunter>1){
				dis=0;
                  }
			if(obm.canvascheckbox===1){
				dis=0;
                  }
			
			if(dis===1){
				if(obm.bk_id[id_l]!=undefined&&obm.bk_id[id_l]!=-1){
					obm.idc[obm.bk_id[id_l]].style.display   ='none';
				
				}
                        obm.ide[id1].classList.remove("wb3d_displaynone");
                        obm.ide[id1].style.display   ='inline-block';
				obm.idc[id1].style.display   ='inline-block';
				obm.bk_change_sizew[id1]=-1;
				obm.bk_change_sizeh[id1]=-1;
				wb3d_set_width_height(obm,B,sn,id_l,id1,type_L,wslide,yy,modd,eff,frm,ids,idg,level,cu);
			}
			else if(dis===0){
				obm.idc[id1].style.display   ='none';
				if(obm.bk_id[id_l]!=undefined&&obm.bk_id[id_l]!=-1){
					obm.idc[obm.bk_id[id_l]].style.display   ='none';
                        }
			}
			obm.bk_display[id1]=dis;
			obm.bk_display2[id_l]=dis;
			obm.chenge_display[id1]=1;
		}
	}

	if(obm.chenge_details_obj[id1]!=1){
			wb3d_set_width_height(obm,B,sn,id_l,id1,'layer',wslide,yy,modd,eff,frm,ids,idg,level,cu);
      }

	if(obm.U_P[sn+'-'+wslide+'-'+yy]!=0){
		if(obm.bk_width[id_l]+obm.bk_left2[id_l]+obm.trx[id_l]>obm.wp[obm.wb3d_id[ids+'-'+obm.U_P[sn+'-'+wslide+'-'+yy]]] ){
			obm.wp[obm.wb3d_id[ids+'-'+obm.U_P[sn+'-'+wslide+'-'+yy]] ]=obm.bk_width[id_l]+obm.bk_left2[id_l]+obm.trx[id_l];
            }

		if(obm.bk_height[id_l]+obm.bk_top2[id_l]+obm.try[id_l]>obm.hp[obm.wb3d_id[ids+'-'+obm.U_P[sn+'-'+wslide+'-'+yy]] ]){
			obm.hp[obm.wb3d_id[ids+'-'+obm.U_P[sn+'-'+wslide+'-'+yy] ]]=obm.bk_height[id_l]+obm.bk_top2[id_l]+obm.try[id_l];
		}
	}

      if(obm.inactiveRange===1){
            flag=1;
            flag2=1;
      }
      if(flag===1){
            if(type_L!='layer2'){
            	if(flag2!=0){
            		if(obm.addon['wb3d_'+T+'_run']!=undefined){
            			obm.addon['wb3d_'+T+'_run'](sn,obm,frm,B,eff,wslide,yy,modd,wslide_0 ,yy_0,mode_0,id1,id_l,type_L,obm.wh_w[id1],ids,idg,cu,level);
            		}
            	}
                  else{
                        if(obm.addon['wb3d_'+T+'_stop']!=undefined){
                                    obm.addon['wb3d_'+T+'_stop'](sn,obm,frm,B,eff,wslide,yy,modd,wslide_0 ,yy_0,mode_0,id1,id_l,type_L,obm.wh_w[id1],ids,idg,cu,level);
                        }
                  }
            }
      }
	

      if(obm.chenge_details_obj[id1]!=1){
  
            wb3d_set_width_height(obm,B,sn,id_l,id1,'layer',wslide,yy,modd,eff,frm,ids,idg,level,cu);
		
      	if(wb3d.wb3d_pro2==1&&eff!=-1){

	            if(obj.E[0][9]===0){
	                  pers_originx=50;
	            }
	            else{
	                  pers_originx=obj.E[9][frm];
	            }

	            if(obj.E[0][10]===0){
	                  pers_originy=50;
	            }
	            else{
	                  pers_originy=obj.E[10][frm];
	            }
	            obm.idc[id1].style.perspectiveOrigin=pers_originx+'% '+pers_originy+'%';


	            if(obj.E[0][11]===0){
	                  originx=50;
	            }
	            else{
	                  originx=obj.E[11][frm];
	            }

	            if(obj.E[0][12]===0){
	                  originy=50;
	            }
	            else{
	                  originy=obj.E[12][frm];
	            }

	            if(obm.bk_origin[id1]!=originx+'_'+originy&&type_L!='slide'){
	                  obm.idc[id1].style.transformOrigin   =originx+'% '+originy+'%';
	                  obm.idd[id1].style.transformOrigin   =originx+'% '+originy+'%';
	                  	obm.ide[id1].style.transformOrigin   =originx+'% '+originy+'%';
	                  	
	                  obm.bk_origin[id1]=originx+'_'+originy;
	            }
	      }
	      if(obm.scaleX[id1]==1)
              	obm.ide[id1].style.transformOrigin   =0+'% '+0+'%';
      }
      if(type_L!='slide'){
            if(obm.flag_bl2[cu+'_'+idg]<2){
                  wb3d_set_top_left(obm,B,sn,id_l,id1,type_L,wslide,yy,modd,ids,level,cu,'0_'+idg,end);
            }
      }
      if(B.act===1&&wb3d.flag!='main'&&type_L==='layer'){
            wb3d_event_func(level,sn,obm,frm,B,eff,wslide,yy,modd,wslide_0 ,yy_0,mode_0,id1,id_l,ids,idg);
            wb3d_act_func(level,sn,obm,frm,B,eff,wslide,yy,modd,wslide_0 ,yy_0,mode_0,id1,id_l,ids,idg);
      }

      obm.bk_id[id_l]=id1;
      obm.bk_f[id_l]=frm;
      if(obm.mouseenter[id_l]===1){
            obm.bk_e[id_l]=1;
      }
      else{
            obm.bk_e[id_l]=0;
      }

      if(obm.down_id2===id_l){
            obm.bk_d[id_l]=1;
      }
      else{
            obm.bk_d[id_l]=0;
      }


      if(obm.reset!=id_l){
            obm.bk_mode[id_l]=modd;
            obm.chenge_details_obj[id1]=1;
            obm.chenge_details_obj2[id1]=1;
      }
      else{
            obm.reset=-1;
      }
      if(B.reset===1){
            if(obm.vscroll[obm.cu+'_'+idg]<=obm.scY1[id_l]-obm.setting[sn].reset||obm.vscroll[obm.cu+'_'+idg]>=obm.scY2[id_l]+parseInt(obm.setting[sn].reset2)){
                  if(obm.bk_f[id_l]!=0){
                        obm.bk_f[id_l]=0;
                        frm=0;
                        obm.bk_transform1[id1]=-1;
                        obm.bk_transform2[id1]=-1;
                        obm.chenge_details_obj[id1]=-1;
                        obm.chenge_details_obj2[id1]=-1;
                        obm.framenum[id_l]=0;
                        obm.pixel_frm[sn+'-'+eff+'-'+0]=0;
                        wb3d_set_style(sn,obm,frm,B,eff,wslide,yy,modd,wslide_0 ,yy_0,mode_0,id1,id_l,type_L,flag,id2,flag2,ids,flag3,idg,level,end);
                  }
            }
      }
}