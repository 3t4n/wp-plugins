/**
* Author URI:  https://3dwebsitebuilder.com/
* Author : Keivan Kamali
*/

// Run for all layer in Slide
wb3d_start_frame=function(obm,flag){

	var cu=obm.cu;
	var st,y,yy;
	var sn=obm.sn[cu+'-0'];
	if(obm.click1!=0){
		obm.click2=obm.click1;
      }
	obm.click1=0;
	if(obm.down_id!=0){
		obm.down_id2=obm.down_id;
      }
	obm.down_id=0;
	obm.bk_tab2[cu+'_'+obm.activeslide[cu]]=obm.bk_tab[cu+'_'+obm.activeslide[cu]];

	if(obm.es1_key!=-1){
		obm.es1_key2=obm.es1_key;
		obm.es1_key=-1;
	}

	obm.time++;
	if(obm.drag_slide===1){
            return;
      }
		
      obm.framenum[obm.cu+'_'+obm.activeslide[cu]]++;
      st=1;
      obm.mlayer[5]=0;
      obm.mlayer[4]=0;
      obm.mlayer[2]=0;

	for(y=1;y<=obm.layers[sn+'-'+obm.activeslide[cu]]-1;y++){
            yy=obm.la_l[sn+'-'+obm.activeslide[cu]+'-'+y];
            wb3d_run_main(obm.activeslide[cu],yy,y,obm,flag,st,cu,sn);	
	}

      if(obm.mlayer[5]==1){
            obm.mlayer[3]=0;
            obm.mlayer[0]=0;
            obm.mlayer[1]=0;
      }
      else if(obm.mlayer[3]==0){
            obm.mlayer[3]=1;
            obm.mlayer[0]=0;
            obm.mlayer[1]=0;
      }
      else if(obm.mlayer[4]==1){
            obm.mlayer[0]=0;
            obm.mlayer[1]=0;
      }
      else if(obm.mlayer[1]!=1){
            obm.mlayer[1]=1;
            obm.mlayer[0]=0;
      }
      else if(obm.mlayer[2]==1){
            obm.mlayer[0]=0;
      }
      else{
            obm.mlayer[0]=1;
      }      

	obm.click2=0;
	obm.down_id2=0;
	obm.bk_key=obm.es1_key2;
	obm.es1_key2=-1;
	obm.bk_ta=obm.es1_Tab;
	obm.bk_tab3[obm.cu+'_'+obm.activeslide[cu]]=obm.bk_tab2[obm.cu+'_'+obm.activeslide[cu]];
	if(wb3d.flag==='main'){
		wb3d_drawcanvas();
      }
      if(obm.flag_bl2['0_0']<3){
	wb3d_set_scrollMaxY(obm,obm.cu+'_0',0,obm.cu,sn); 
      }
	return 0;     
};

// Run layers
function  wb3d_run_main(w,yy,R,obm,flag5,st,cu,sn){
	var modd=0;
	var B=obm.dataslide[sn][obm.los[sn+'-'+w]][R];
	var eff=B['EB_'+obm.d];
	var frm=0;
	if(eff!=-1){
      	var frm=obm.pixel_frm[sn+'-'+eff+'-'+obm.framenum[cu+'_'+w+'-'+yy]];
	}

	var id_l=cu+'_'+w+'-'+yy;
      var y1=obm.scY1[id_l];
      var flag=1;
      flag5=0;
      var run=1;


      if(y1===undefined||isNaN(y1)){
            run=0;
      }
		 
      if(B['C_'+obm.d]*25>obm.framenum[cu+'_'+w]){
            flag=0;
            flag5=1;
      }
      else if(B['F_'+obm.d]*25<obm.framenum[cu+'_'+w]){
            flag=0;
            flag5=2;
      }
      else if(obm.vscroll[cu+'_0']<y1){
            flag=0;
            flag5=3;
      }
      else if(obm.vscroll[cu+'_0']>obm.scY2[id_l]){
            flag=0;
            flag5=4;
      }
     
	var stop=1;
	if(wb3d.wb3d_pro2==1&&eff!=-1){
		var obj=obm.gs[sn][eff];
		if(obm.RangeSlider_val>-1&&obm.s_l===yy&&wb3d.flag==='main'){
			obm.ex_frm=Math.round((obm.RangeSlider_val/100)*(obj.max_p-1));
		}
		else{
			obm.ex_frm=-1; 
		}
		if( obj.E[0][21]!=0){
			if(obm.id_pre_stop[id_l]!=frm){
				if(obj.E[21][frm]>0&&obm.id_stop[id_l]!=1){
					obm.id_time_stop[id_l]=obj.E[21][frm]*2.5;
					obm.id_stop[id_l]=1;
					stop=0;
					obm.id_bk_pre_stop[id_l]=frm;
				}
				else if(obm.id_stop[id_l]===1&&obm.id_time_stop[id_l]>0){
					obm.id_time_stop[id_l]--;
					stop=0;
				}
				else if(obm.id_stop[id_l]===1&&obm.id_time_stop[id_l]<=0){
					obm.id_stop[id_l]=0;
					obm.id_pre_stop[id_l]=obm.id_bk_pre_stop[id_l];
				}
				else{
					obm.id_pre_stop[id_l]=-2;
	                  }
			}
		}
	}

	if(flag===1){
		obm.sc_t_fl[id_l]=1;
      }
	else{
		obm.sc_t_fl[id_l]=0;
	}
	if(wb3d.wb3d_pro2==1&&eff!=-1){	
		if(obm.sc_t_fl[id_l]===1&&stop===1){
			if( !(obm.ex_frm<=0&&obm.bk_play[obm.cu+'_'+obm.activeslide[cu]+'-'+0]!='play'&&wb3d.flag==='main')){
	                  frm=wb3d_set_frame(sn,eff,(cu+'_'+w+'-'+yy),obm.vscroll[cu+'_0']-y1,st,obm,B,B['T_E'+obm.d],B['repeat'+obm.d]);
	            }    	
		}
	      if( obm.ex_frm!=-1&&wb3d.flag==='main'){ 
	            frm=obm.ex_frm;
	      }

		if(obj.E[0][26]!=0){
			modd=obj.E[26][frm];
	      }
	}

	var ids=cu+'_'+w+'-'+yy+'-'+modd;
	var id1=obm.wb3d_id[ids];

	if(obm.sc_t_fl[id_l]===1){
		if(obm.bk_flag[obm.wb3d_id[ids]]!=1){
			obm.bk_flag[obm.wb3d_id[ids]]=1;
			obm.chenge_display[obm.wb3d_id[ids]]=-1;
		}
	}
	else if(obm.bk_flag[obm.wb3d_id[ids]]!=0){
		obm.bk_flag[obm.wb3d_id[ids]]=0;
		obm.chenge_display[obm.wb3d_id[ids]]=-1;
	}

	if(obm.bk_f[id_l]!=frm){
		obm.chenge_details_obj[id1]=0;
		obm.chenge_details_obj2[id1]=0;
	}

	if(obm.bk_mode[id_l]!=modd){
		obm.chenge_display[id1]=-1;
		obm.bk_change_sizew[id1]=-1;
		obm.bk_change_sizeh[id1]=-1;
	}

      if(B['P_s'+obm.d]!=0){
            obm.sc_t_fl[id_l]=1;
      }

	wb3d_set_style(sn,obm,frm,B,eff,w,yy,modd,w,yy,modd,id1,id_l,'layer',run,ids,obm.sc_t_fl[id_l],cu+'_'+w,stop,0,0);

	if(flag===0){
      	if(obm.sc_t_fl[id_l]===1){
      		if((obm.framenum[cu+'_'+w+'-'+yy]===0||B['slow'+obm.d]!=1)&&(obm.vscroll[cu+'_0']<y1)){
                        obm.sc_t_fl[id_l]=0;
                  }
      		else if((obm.framenum[cu+'_'+w+'-'+yy]===(obj.max_f-1)||B['slow'+obm.d]!=1)&&(obm.vscroll[cu+'_0']>obm.scY2[id_l])){
                        obm.sc_t_fl[id_l]=0;
                  }
      	}
	}

	/////////////////////////////////border////////////////////////////     
	if(wb3d.flag==='main'){
		wb3d_set_border(obm,id1,obm.bk_width[id1]/obm.bk_tx[id1],obm.bk_height[id1]/obm.bk_ty[id1],B,id_l);
	}
	else{
		obm.set_border=-1;
      }
}

function wb3d_set_pre_width_height(_,t,d,i,e,h,l,w,b,s,a,n,o,g,c){o=c+"_"+o;1===t["WO"+_.d]?_.wh_w[e]=_.wb3d_ay[o]:_.wh_w[e]=_.wb3d_ax[o],1===t["HO"+_.d]?_.wh_h[e]=_.wb3d_ay[o]:_.wh_h[e]=_.wb3d_ax[o],(o=t=1)==wb3d.wb3d_pro2&&-1!=s&&(s=_.gs[d][s],-1!=a&&(0!==s.E[0][19]&&(t=s.E[19][a]/100),0!==s.E[0][20]&&(o=s.E[20][a]/100))),_.bk_rh[e]==o&&_.bk_rw[e]==t||(_.bk_rh[e]=o,_.bk_rw[e]=t,_.bk_change_sizew[e]=-1,_.bk_change_sizeh[e]=-1)}function wb3d_set_width_height(_,t,d,i,e,h,l,w,b,s,a,n,o,g,c){var f,p,r,k=_.bk_rw[e],x=_.bk_rh[e];if("layer"==h)if(1===_.size1[e]||void 0===_.size1[e])f=t["sizex_"+_.d+"-"+b]*_.wh_w[e],p=t["sizey_"+_.d+"-"+b]*_.wh_h[e],_.bk_change_sizew[e]!=f+"-"+k+"-"+_.wh_w[e]&&(_.bk_change_sizew[e]=f+"-"+k+"-"+_.wh_w[e],null!=_.idc[e]&&(2==t["relative_"+b]&&(f=_.setting[d]["w_"+_.d]*_.wh_w[e],_.idc[e].style.marginTop=t["margin_"+b]*_.wh_h[e]+"px"),_.ide[e].style.width=f+"px",f=1!=t.sizefunc?_.ide[e].offsetWidth:(r=_.ide[e].getBoundingClientRect()).width,_.idc[e].style.width=f*k+"px",_.idd[e].style.width=f+"px",_.bk_width[e]=f,_.bk_width[i]=f)),_.bk_change_sizeh[e]!=p+"-"+x+"-"+_.wh_h[e]+"-"+_.h[e]&&(_.bk_change_sizeh[e]=p+"-"+x+"-"+_.wh_h[e]+"-"+_.h[e],null!=_.idc[e]&&(0!=_.h[e]?_.ide[e].style.height=_.h[e]+"px":_.ide[e].style.height=p+"px",p=1!=t.sizefunc?_.ide[e].offsetHeight:(r=_.ide[e].getBoundingClientRect()).height,_.idc[e].style.height=p*x+"px",_.idd[e].style.height=p+"px",_.bk_height[e]=p,_.bk_height[i]=p));else if(1<=_.size1[e]&&_.size1[e]<4){if(_.bk_change_sizew[e]!=k+"-"+_.wh_h[e]){_.bk_change_sizew[e]=k+"-"+_.wh_h[e];var y=t["lp_"+_.d+"-"+b],P=t["rp_"+_.d+"-"+b],h=t["tp_"+_.d+"-"+b],d=t["bp_"+_.d+"-"+b];y*=_.wh_h[e],P*=_.wh_h[e];d=(h*=_.wh_h[e])+"px "+P+"px "+(d*=_.wh_h[e])+"px "+y+"px";2===_.newsize[e]&&1!=_.lborder[e]&&(_.ide[e].style.padding=d),1!=_.lh[e]&&null!=t["lheight_"+b]&&(_.ide[e].style.lineHeight=t["lheight_"+b]),null!=t["tline_"+b]?_.ide[e].style.whiteSpace=t["tline_"+b]:_.ide[e].style.whiteSpace="nowrap",null!=t["fweight_"+b]&&(_.ide[e].style.fontWeight=t["fweight_"+b]),null!=t["fname_"+b]&&(_.ide[e].style.fontFamily=t["fname_"+b]),null!=t["talign_"+b]&&(_.ide[e].style.textAlign=t["talign_"+b]),null!=t["decoration_"+b]&&(_.ide[e].style.textDecoration=t["decoration_"+b]),_.ide[e].style.fontSize=t["fs_"+_.d+"-"+b]*_.wh_h[e]+"px";for(var Y=_.ide[e].getElementsByTagName("*"),u=0;u<Y.length;u++)Y[u].style.fontSize=t["fs_"+_.d+"-"+b]*_.wh_h[e]+"px";"normal"!=t["tline_"+b]?(_.ide[e].style.width="auto",1!=t.sizefunc?(f=_.ide[e].offsetWidth,p=_.ide[e].offsetHeight):(r=_.ide[e].getBoundingClientRect(),p=r.height,f=r.width),_.idd[e].style.width=f*k+"px",_.idc[e].style.width=f*k+"px",_.idd[e].style.height=p*x+"px",_.idc[e].style.height=p*x+"px",_.bk_width[e]=f,_.bk_height[e]=p,_.bk_width[i]=f,_.bk_height[i]=p,t["sizey_"+_.d+"-"+b]=p/_.wh_h[e],0==g&&"main"===wb3d.flag&&(t["sizex_"+_.d+"-"+b]=f,t["sizey_"+_.d+"-"+b]=p)):(f=t["sizex_"+_.d+"-"+b]*_.wh_w[e],_.ide[e].style.width=f+"px",f+=y+P,p=1!=t.sizefunc?_.ide[e].offsetHeight:(r=_.ide[e].getBoundingClientRect()).height,_.idd[e].style.width=f*k+"px",_.idc[e].style.width=f*k+"px",_.idd[e].style.height=p*x+"px",_.idc[e].style.height=p*x+"px",setTimeout(function(){_.idd[e].style.height=p*x+"px",_.idc[e].style.height=p*x+"px"},3040),_.bk_width[e]=f*_.bk_tx[e],_.bk_height[e]=p*_.bk_ty[e],_.bk_width[i]=f*k*_.bk_tx[e],_.bk_height[i]=p*x*_.bk_ty[e],t["sizey_"+_.d+"-"+b]=p/_.wh_h[e])}}else 7!=_.size1[e]&&(f=t["sizex_"+_.d+"-"+b]*_.wh_w[e],p=t["sizey_"+_.d+"-"+b]*_.wh_h[e],_.bk_width[e]=f,_.bk_width[i]=f,_.bk_height[e]=p,_.bk_height[i]=p)}function wb3d_set_top_left(_,t,d,i,e,h,l,w,b,s,a,n,o,g){if(1!=g&&12!==_.size1[e]&&"layer2"!==h){var c,f;_.tl_l[e]=_.wb3d_ax[o],_.tl_t[e]=_.wb3d_ax[o],1<=t["P_s"+_.d]&&(_.tl_t[e]=_.wb3d_ay[o]);var p,r,k,x,y,P,Y,u,m,z,M=t["PX_"+_.d],v=t["PY_"+_.d],g=1;if(0==_.U_P[d+"-"+l+"-"+w]||null==_.U_P[d+"-"+l+"-"+w]?(g=0,t["PY2_"+_.d]=t["PY_"+_.d]):(P=_.U_P[d+"-"+l+"-"+w].split("-")[0],y=_.U_P[d+"-"+l+"-"+w].split("-")[1],z=_.dataslide[d][_.los[d+"-"+l]][_.lo_l[d+"-"+l+"-"+P]],t["PY2_"+_.d]=z["PY_"+_.d]+t["PY_"+_.d],k=(f=0==a?i.split("-")[0]+"-"+P:(f=i.split("-"))[0]+"-"+f[1]+"-"+f[2]+"-"+f[3]+"-"+P,_.wb3d_id[f+"-"+y])),"main"===wb3d.flag&&0===a?(p=M,r=v):(P=t["A_l"+_.d],Y=t["A_t"+_.d],0===P?p=M*_.tl_l[e]:0==g?1===P?(x=_.setting[d]["w_"+_.d]/2-(t["PX_"+_.d]+t["sizex_"+_.d+"-"+b]/2),p=0==t["P_s"+_.d]?_.setting[d]["w_"+_.d]*_.wb3d_ax[o]/2-x*_.wb3d_ax[o]-_.bk_width[i]/2:window.innerWidth/2-x*window.innerWidth/_.setting[d]["w_"+_.d]-_.bk_width[i]/2):2===P&&(x=_.setting[d]["w_"+_.d]-(t["PX_"+_.d]+t["sizex_"+_.d+"-"+b]),p=0==t["P_s"+_.d]?_.setting[d]["w_"+_.d]*_.wb3d_ax[o]-x*_.wb3d_ax[o]-_.bk_width[i]:window.innerWidth-x*window.innerWidth/_.setting[d]["w_"+_.d]-_.bk_width[i]):1===P?(x=z["sizex_"+_.d+"-"+y]/2-(t["PX_"+_.d]+t["sizex_"+_.d+"-"+b]/2),p=_.bk_width[f]/2-x*_.wh_w[k]-_.bk_width[i]/2):2===P&&(x=z["sizex_"+_.d+"-"+y]-(t["PX_"+_.d]+t["sizex_"+_.d+"-"+b]),p=_.bk_width[f]-x*_.wh_w[k]-_.bk_width[i]),0===Y||0==g&&0==t["P_s"+_.d]?(r=v*_.tl_t[e],1==g&&0!=a&&(r=v*_.wh_h[k])):0==g?1===Y?(x=_.setting[d]["h_"+_.d]/2-(t["PY_"+_.d]+t["sizey_"+_.d+"-"+b]/2),r=_.setting[d]["h_"+_.d]*_.wb3d_ay[o]/2-x*_.wb3d_ay[o]-_.bk_height[i]/2):2===Y&&(x=_.setting[d]["h_"+_.d]-(t["PY_"+_.d]+t["sizey_"+_.d+"-"+b]),r=_.setting[d]["h_"+_.d]*_.wb3d_ay[o]-x*_.wb3d_ay[o]-_.bk_height[i]):1===Y?(x=z["sizey_"+_.d+"-"+y]/2-(t["PY_"+_.d]+t["sizey_"+_.d+"-"+b]/2),r=_.bk_height[f]/2-x*_.wh_h[k]-_.bk_height[i]/2):2===Y&&(x=z["sizey_"+_.d+"-"+y]-(t["PY_"+_.d]+t["sizey_"+_.d+"-"+b]),r=_.bk_height[f]-x*_.wh_h[k]-_.bk_height[i])),x=0,"main"===wb3d.flag&&0===a&&(_.bk_top3[i]=0),1!=_.flag_bl2[o]||"main"===wb3d.flag&&0===a||1==_.flag_bl2[e]||0==t["P_s"+_.d]&&0==_.U_P[d+"-"+l+"-"+w]&&(u=_.dataslide[d][_.los[d+"-"+l]][0],wb3d_setObj_position(u,t,s,i,e),_.flag_bl2[e]=1),Y=0===a&&"main"!=wb3d.flag?_.deltaY[_.cu]:0,y=0!=a?_.setting[d]["h_"+_.d]*_.wh3[o]:_.setting[d]["h_"+_.d]*_.wb3d_ay[o],k=1-t["B_"+_.d],x=1-t["E_"+_.d],0!=t["P_s"+_.d]?(_.scY1[i]=Math.ceil(k*y+Y),_.scY2[i]=Math.ceil(x*y+Y)):(u=y*k-y,k=_.bk_top3["A"+i]+u+Y,1==g&&(k=_.bk_top3["A"+f]+k),_.scY1[i]=Math.ceil(k+wb3d_set_scr_objs(_,t["PY2_"+_.d],e,1)),u=y*x-y,k=_.bk_top3["A"+i]+u+Y,1==g&&(k=_.bk_top3["A"+f]+k),_.scY2[i]=Math.ceil(k+wb3d_set_scr_objs(_,t["PY2_"+_.d]-t["E_"+_.d]*y,e,2))),0===t["B_"+_.d]&&(_.scY1[i]=0),_.bk_t_l[e]!=p+"-"+r+"-"+_.bk_top3[i])if(null!=_.idc[e])if("mouse"!=h&&"slide"!=h)if("wb3d"===t["type_"+b]&&("main"!=wb3d.flag?0==_.U_P[d+"-"+l+"-"+w]?_.top0wb3d[n+"_"+e]=r+_.bk_top3[i]+Y:(m=_.U_P[d+"-"+l+"-"+w].split("-"),z=_.dataslide[d][_.los[d+"-"+l]][_.lo_l[d+"-"+l+"-"+m[0]]],_.top0wb3d[n+"_"+e]=_.bk_top3["A0_"+l+"-"+m[0]]):_.top0wb3d[n+"_"+e]=t["PY2_"+_.d]),_.bk_t_l2[e]!=p+"-"+r+"-"+Math.ceil(_.bk_top3[i])){for(var B=0;B<t.layer_obj;B++)c=t["obj_num_"+B],e=_.wb3d_id[i+"-"+c],2!=t["relative_"+c]&&(_.idc[e].style.left=p+"px","main"===wb3d.flag&&0===a?_.idc[e].style.top=r+"px":_.idc[e].style.top=Math.ceil(r+Math.ceil(_.bk_top3[i]))+"px"),_.bk_top2[i]=r+_.bk_top3[i],_.bk_left2[i]=p,_.bk_t_l2[e]=p+"-"+r+"-"+Math.ceil(_.bk_top3[i]);_.bk_top3["A"+i]=Math.ceil(r+Math.ceil(_.bk_top3[i])),_.bk_top3["B"+i]=p}0!=_.flag_bl2[o]||"main"===wb3d.flag&&0==a?1!=_.flag_bl2[o]||"main"===wb3d.flag&&0==a||0===_.U_P[d+"-"+l+"-"+w]&&0===t["P_s"+_.d]&&_.bk_top2[i]+_.bk_height[i]>_.max_top[o]&&(_.max_top[o]=_.bk_top2[i]+_.bk_height[i]):0!=_.U_P[d+"-"+l+"-"+w]&&(z=_.U_P[d+"-"+l+"-"+w].split("-")[0],m=_.U_P[d+"-"+l+"-"+w].split("-")[1],0!==_.U_P[d+"-"+l+"-"+z]||1==(n=_.dataslide[d][_.los[d+"-"+l]][_.lo_l[d+"-"+l+"-"+z]])["auto_height_"+m]&&_.bk_height[i]+_.bk_top2[i]+n["buttom_"+m]>_.h[_.wb3d_id[s+"-"+_.U_P[d+"-"+l+"-"+w]]]&&(_.chenge_details_obj[_.wb3d_id[s+"-"+_.U_P[d+"-"+l+"-"+w]]]=-1,_.h[_.wb3d_id[s+"-"+_.U_P[d+"-"+l+"-"+w]]]=_.bk_height[i]+_.bk_top2[i]+n["buttom_"+m],z=_.wb3d_ay[o]-_.wb3d_ax[o],z=_.h[_.wb3d_id[s+"-"+_.U_P[d+"-"+l+"-"+w]]]-_.wb3d_ax[o]*n["sizey_"+_.d+"-"+m],_.panelTy[_.panelId2[_.wb3d_id[s+"-"+_.U_P[d+"-"+l+"-"+w]]]]=z))}}function wb3d_set_scrollMaxY(_,t,d,i,e){var h,l,w,b;if(_.flag_bl2[t]++,0===d){if("main"!=wb3d.flag){document.getElementById("wb3dh_0").offsetHeight<_.max_top[t]&&(document.getElementById("wb3dh_0").style.height=_.max_top[t]+"px","main"!=wb3d.flag&&(document.getElementById("wb3d_0").style.height=_.max_top[t]+"px"));var s=document.body,d=document.documentElement,s=Math.max(s.scrollHeight,s.offsetHeight,d.clientHeight,d.scrollHeight,d.offsetHeight),d=window.innerHeight;if(_.scrollMaxY[t]=s-d,0<i)for(var a=0;a<i;a++)_.scrollMaxY[a+"_0"]=_.scrollMaxY[t]}else _.scrollMaxY[t]=0;_.MaXvscroll=0;var n,o=[];if("main"!=wb3d.flag)for(h=0;h<300&&void 0!==_.wb3d[h];h++)1===_.wb3dB[h]["vs_"+_.wb3dY[h]]&&null!=_.scrollMaxY[_.wb3d[h]]&&1!=o[_.wb3dB[h]["PY2_"+_.d]]&&(_.MaXvscroll+=_.scrollMaxY[_.wb3d[h]]),o[_.wb3dB[h]["PY2_"+_.d]]=1;for(_.bk_vscroll_id1=[],_.bk_vscroll_id2=[],b=0,n="main"!=wb3d.flag?window.innerHeight:_.setting[e]["h_"+_.d],o=[],l=0;l<300&&void(b=w=0)!==_.wb3d[l];l++)for(1==_.wb3dB[l]["vs_"+_.wb3dY[l]]&&(b=Math.ceil(_.wb3dB[l]["mt"+_.d+"_"+_.wb3dY[l]]/100*n)),h=0;h<300;h++){if(void 0===_.wb3d[h]||_.wb3d[h]===_.wb3d[l]){void 0===o[_.wb3dB[h]["PY2_"+_.d]]?_.vscrollS[_.wb3d[l]]=Math.ceil(_.top0wb3d[_.wb3d[l]])-b+w+_.deltaY[0]:_.vscrollS[_.wb3d[l]]=Math.ceil(_.top0wb3d[_.wb3d[l]])-b+w+_.deltaY[0]-o[_.wb3dB[h]["PY2_"+_.d]];break}1==_.wb3dB[h]["vs_"+_.wb3dY[h]]&&(w+=Math.ceil(_.scrollMaxY[_.wb3d[h]]),o[_.wb3dB[h]["PY2_"+_.d]]=Math.ceil(_.scrollMaxY[_.wb3d[h]]))}}}function wb3d_set_scrollMaxY2(_,t,d,i,e,h){_.flag_bl2[t]<=1&&(_.flag_bl2[t]++,e=_.setting[e]["h_"+_.d]*_.wb3d_ay[t],_.scrollMaxY[t]=Math.ceil(_.max_top[t]-e),_.scrollMaxY[t]<0&&(_.scrollMaxY[t]=0),0!=d&&(_.vscroll[t]=0,_.vscrollM[t]=0),_.flag_bl2["0_0"]=0)}wb3d_set_scr_objs=function(_,t,d,i){for(var e=0,h=[],l=0;l<300;l++){if(void 0===_.wb3d[l])return e;if(_.wb3dB[l]["PY2_"+_.d]>t)return e;if(_.wb3dB[l]["PY2_"+_.d]==t&&1==i)return e;1===_.wb3dB[l]["vs_"+_.wb3dY[l]]&&null==h[_.wb3dB[l]["PY2_"+_.d]]&&(e+=Math.ceil(_.scrollMaxY[_.wb3d[l]]),h[_.wb3dB[l]["PY2_"+_.d]]=1)}return e};