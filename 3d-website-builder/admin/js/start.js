/**
* Author URI:  https://3dwebsitebuilder.com/
* Author : Keivan Kamali
*/

function wb3d_pre_change(obm,sn,id1,bkslide,slide,sx,sy,idg,cu,level,B,modd,xi){
	if(obm.change_status[idg]===1&&(obm.set_end1[id1]===0)&&bkslide!=-1){
		wb3d_change_slide(obm,sn,id1,bkslide,slide,sx,sy,idg,cu,level,B,modd,xi);
      }
	else if(obm.change_status[idg]===1&&obm.set_end1[id1]===1){
		obm.change_status[idg]=0;
		obm.set_end1[id1]=0;
		obm.framenum[id1+'-'+slide]=-1;
		obm.framenum[id1+'-'+bkslide]=-1;
		obm.putimagecanvas();
	}
}

//////////////////////////////////////////

function wb3d_start_change_slide(obm,sn,id1,i,j,B,modd,idg,cu,level){

      var ax=obm.ax;
      var ay=obm.ay;
      var w_i,h_i,c;

      ax=obm.wb3d_ax[idg];
      ay=obm.wb3d_ay[idg];
      w_i=obm.setting[B['slider_'+modd]]['w_'+obm.d]*ax;
      h_i=obm.setting[B['slider_'+modd]]['h_'+obm.d]*ay;	
      var aj=obm.dataslide[sn][obm.los[sn+'-'+j]][0];
      var ds=obm.d;
      var xi=aj['E_'+ds];
      c=id1+'-';
      obm.tsa=0;
      obm.tsn=0;
      obm.loc_x_activeslide[id1]=0;

      if(i===-1){
            return;
      }
	obm.vesid[c+j].style.transformOrigin = '50% 50%';
	obm.vesid[c+j].style.msTransformOrigin = '50% 50%';
	obm.vesid[c+i].style.transformOrigin = '50% 50%';
	obm.vesid[c+i].style.msTransformOrigin = '50% 50%';
	obm.vesid[c+i].style.transformStyle='preserve-3d';
	obm.vesid[c+j].style.transformStyle='preserve-3d';
	obm.vesid[c+j].style.display = 'block';
      document.getElementById('wb3de-'+obm.wb3d_id[id1]).style.transformStyle='preserve-3d';
      document.getElementById('wb3df-'+obm.wb3d_id[id1]).style.perspective='600px';
      obm.vesid[c+j].style.transform = '';
      obm.vesid[c+i].style.transform = '';
      obm.vesid[c+i].style.opacity = '1';
      obm.vesid[c+j].style.opacity = '1';
      obm.vesid[c+i].style.width = (w_i)+'px';
      obm.vesid[c+j].style.width = (w_i)+'px';
      obm.vesid[c+i].style.height = (h_i)+'px';
      obm.vesid[c+j].style.height = (h_i)+'px';
      obm.vesid[c+j].style.zIndex  = '7';	
      obm.vesid[c+i].style.zIndex  = '8';
 
      if(xi==='3dbox_top'||xi==='3dbox_bottom'||xi==='rotatex'||xi==='rotatey'){

            if(xi==='rotatex'||xi==='rotatey'){
                  h_i=h_i/2;
            }
            document.getElementById('wb3de-'+obm.wb3d_id[id1]).style.transform='translateZ(-'+(h_i)+'px)';
      }
      else if(xi==='3dbox_right'||xi==='3dbox_left'){
            document.getElementById('wb3de-'+obm.wb3d_id[id1]).style.transform='translateZ(-'+(w_i)+'px)';
      }
}


function wb3d_setend1_func(obm,sn,id1,i,j,z,cu,level){
      var c;
      c=id1+'-';
      if( (obm.loc_x_activeslide[id1]>=z) ){
            obm.vesid[c+i].style.left='0px';
            obm.vesid[c+i].style.top='0px';
            obm.vesid[c+j].style.left='0px';
            obm.vesid[c+j].style.top='0px';
            obm.vesid[c+j].style.transform = '';
            obm.vesid[c+i].style.transform = '';
            obm.set_end1[id1]=1;
            obm.bk['change_slide_t_l'+id1]=0;
            obm.vesid[c+i].style.display = 'none';
            document.getElementById('wb3df-'+obm.wb3d_id[id1]).style.perspective='';			
            document.getElementById('wb3dg-'+obm.wb3d_id[id1]).style.perspective='';			
            document.getElementById('wb3de-'+obm.wb3d_id[id1]).style.transform='';
            document.getElementById('wb3df-'+obm.wb3d_id[id1]).style.transform='';
            delete obm.loc_x_activeslide[id1];
      }
}
function wb3d_change_slide(obm,sn,id1,i,j,w_i,h_i,idg,cu,level,B,modd,xi){
      var x,y,c,ax,ay,x1,x2,y1,y2,obj,frm;

      if(obm.loc_x_activeslide[id1]===undefined){
            wb3d_start_change_slide(obm,sn,id1,i,j,B,modd,idg,cu,level);
      }
      obm.loc_x_activeslide[id1]+=20;
      if(level!=0){
            ax=obm.wb3d_ax[idg];
            ay=obm.wb3d_ay[idg];
      }
      c=id1+'-';
      var ds=obm.d;
      var aj=obm.dataslide[sn][obm.los[sn+'-'+j]][0];
      if(xi===undefined){
            xi=aj['E_'+ds];
      }


      if(xi==='to right'){	
            x1=w_i*(obm.loc_x_activeslide[id1]-obm.tsa)/1000;
            obm.vesid[c+i].style.left =(x1-1)+'px';
            x2=-w_i+w_i*(obm.loc_x_activeslide[id1]-obm.tsn)/1000;
            obm.vesid[c+j].style.left =x2+'px';
            wb3d_setend1_func(obm,sn,id1,i,j,1000,cu,level);
      }

      else if(xi==='to left'){
            x1=-w_i*(obm.loc_x_activeslide[id1]-obm.tsa)/1000;
            obm.vesid[c+i].style.left =(x1+1)+'px';
            x2=w_i-w_i*(obm.loc_x_activeslide[id1]-obm.tsn)/1000;
            obm.vesid[c+j].style.left =x2+'px';
            wb3d_setend1_func(obm,sn,id1,i,j,1000,cu,level);
      }
	else if(xi==='to top'){
		x=-h_i*(obm.loc_x_activeslide[id1]-obm.tsa)/1000;
		if(obm.loc_x_activeslide[id1]>=obm.tsa&&obm.loc_x_activeslide[id1]<1001+obm.tsa){
			obm.vesid[c+i].style.top =x+'px';
			x=h_i-h_i*(obm.loc_x_activeslide[id1]-obm.tsn)/1000;
			obm.vesid[c+j].style.top =x+'px';
		}
		wb3d_setend1_func(obm,sn,id1,i,j,1000,cu,level);
	}
	else if(xi==='to bottom'){
		x=h_i*(obm.loc_x_activeslide[id1]-obm.tsa)/1000;
		if(obm.loc_x_activeslide[id1]>=obm.tsa&&obm.loc_x_activeslide[id1]<1001+obm.tsa){
			obm.vesid[c+i].style.top =x+'px';
			x=-h_i+h_i*(obm.loc_x_activeslide[id1]-obm.tsn)/1000;
			obm.vesid[c+j].style.top =x+'px';
		}
		wb3d_setend1_func(obm,sn,id1,i,j,1000,cu,level);
	}
	else if(xi==='rotatex'){
            if(obm.loc_x_activeslide[id1]<=180){
                  obm.vesid[c+j].style.display  = 'none';
                  obm.vesid[c+i].style.transform = 'rotateX('+((obm.loc_x_activeslide[id1]-obm.tsa)/2)+'deg) ';
            }

            else{
                  obm.vesid[c+j].style.transform = 'rotateX('+((360+obm.loc_x_activeslide[id1]-obm.tsa)/2)+'deg) ';
                  obm.vesid[c+i].style.display  = 'none';
                  obm.vesid[c+j].style.display  = '';
            }
            wb3d_setend1_func(obm,sn,id1,i,j,360,cu,level);
	}
	else if(xi==='rotatey'){
            if(obm.loc_x_activeslide[id1]<=180){
                  obm.vesid[c+j].style.display  = 'none';
                  obm.vesid[c+i].style.transform = 'rotateY('+((obm.loc_x_activeslide[id1]-obm.tsa)/2)+'deg) ';
            }

            else{
                  obm.vesid[c+j].style.transform = 'rotateY('+((360+obm.loc_x_activeslide[id1]-obm.tsa)/2)+'deg) ';
                  obm.vesid[c+i].style.display  = 'none';
                  obm.vesid[c+j].style.display  = '';
            }
            wb3d_setend1_func(obm,sn,id1,i,j,360,cu,level);
	}
	else if(xi==='3dbox_top'){
            if(obm.loc_x_activeslide[id1]>370){
                  obm.vesid[c+i].style.zIndex  = '6';	
            }
            obm.vesid[c+i].style.transform = 'rotateX('+(obm.loc_x_activeslide[id1]/6)+'deg) translateZ('+(h_i/2)+'px)';
            obm.vesid[c+j].style.transform ='rotateX('+(270+obm.loc_x_activeslide[id1]/6)+'deg) translateZ('+(h_i/2)+'px) ' ;
            wb3d_setend1_func(obm,sn,id1,i,j,540,cu,level);
	}
	else if(xi==='3dbox_bottom'){
		if(obm.loc_x_activeslide[id1]>370){
			obm.vesid[c+i].style.zIndex  = '6';	
            }
		obm.vesid[c+i].style.transform = 'rotateX('+(-obm.loc_x_activeslide[id1]/6)+'deg) translateZ('+(h_i/2)+'px)';
		obm.vesid[c+j].style.transform ='rotateX('+(90-obm.loc_x_activeslide[id1]/6)+'deg) translateZ('+(h_i/2)+'px) ' ;
		wb3d_setend1_func(obm,sn,id1,i,j,540,cu,level);
	}
	else if(xi==='3dbox_right'){
		if(obm.loc_x_activeslide[id1]>370){
			obm.vesid[c+i].style.zIndex  = '6';
            }
		obm.vesid[c+i].style.transform = 'rotateY('+(obm.loc_x_activeslide[id1]/6)+'deg) translateZ('+(w_i/2)+'px)';
		obm.vesid[c+j].style.transform ='rotateY('+(270+obm.loc_x_activeslide[id1]/6)+'deg) translateZ('+(w_i/2)+'px) ' ;	
		wb3d_setend1_func(obm,sn,id1,i,j,540,cu,level);
	}
	else if(xi==='3dbox_left'){
		if(obm.loc_x_activeslide[id1]>370){
			obm.vesid[c+i].style.zIndex  = '6';	
            }
		obm.vesid[c+i].style.transform = 'rotateY('+(-obm.loc_x_activeslide[id1]/6)+'deg) translateZ('+(w_i/2)+'px)';
		obm.vesid[c+j].style.transform ='rotateY('+(90-obm.loc_x_activeslide[id1]/6)+'deg) translateZ('+(w_i/2)+'px) ' ;
		wb3d_setend1_func(obm,sn,id1,i,j,540,cu,level);
	}
	else if(xi==='width'){
		x=w_i-w_i*(obm.loc_x_activeslide[id1]-obm.tsa)/500;
		x1=w_i*(obm.loc_x_activeslide[id1]-obm.tsa)/1000;
		if(obm.loc_x_activeslide[id1]>=obm.tsa&&obm.loc_x_activeslide[id1]<1001+obm.tsa){
			obm.vesid[c+i].style.left = (x1)+'px';
			obm.vesid[c+i].style.width = (x)+'px';
		}
		wb3d_setend1_func(obm,sn,id1,i,j,500,cu,level);
	}
	else if(xi==='height'){
		x=h_i-h_i*(obm.loc_x_activeslide[id1]-obm.tsa)/500;
		x1=h_i*(obm.loc_x_activeslide[id1]-obm.tsa)/1000;
		if(obm.loc_x_activeslide[id1]>=obm.tsa&&obm.loc_x_activeslide[id1]<1001+obm.tsa){
			obm.vesid[c+i].style.top = (x1)+'px';
			obm.vesid[c+i].style.height = (x)+'px';
		}
		wb3d_setend1_func(obm,sn,id1,i,j,500,cu,level);
	}
	else if(xi==='height_width'){
		x2=w_i-w_i*(obm.loc_x_activeslide[id1]-obm.tsa)/500;
		x1=w_i*(obm.loc_x_activeslide[id1]-obm.tsa)/1000;
		y2=h_i-h_i*(obm.loc_x_activeslide[id1]-obm.tsa)/500;
		y1=h_i*(obm.loc_x_activeslide[id1]-obm.tsa)/1000;
		if(obm.loc_x_activeslide[id1]>=obm.tsa&&obm.loc_x_activeslide[id1]<1001+obm.tsa){
			obm.vesid[c+i].style.top = (y1)+'px';
			obm.vesid[c+i].style.left = (x1)+'px';
			obm.vesid[c+i].style.height = (y2)+'px';
			obm.vesid[c+i].style.width = (x2)+'px';
		}
		wb3d_setend1_func(obm,sn,id1,i,j,500,cu,level);
	}
	else if(xi==='bottom_right'){
		x=w_i*(obm.loc_x_activeslide[id1]-obm.tsa)/1000;
		y=h_i*(obm.loc_x_activeslide[id1]-obm.tsa)/1000;
		obm.vesid[c+i].style.top = (y)+'px';
		obm.vesid[c+i].style.left = (x)+'px';
		x=-w_i+(w_i*obm.loc_x_activeslide[id1]/1000);
		y=-h_i+(h_i*obm.loc_x_activeslide[id1]/1000);
		obm.vesid[c+j].style.top = (y)+'px';
		obm.vesid[c+j].style.left = (x)+'px';
		wb3d_setend1_func(obm,sn,id1,i,j,1000,cu,level);
	}
	else if(xi==='top_left'){
		x=-w_i*(obm.loc_x_activeslide[id1]-obm.tsa)/1000;
		y=-h_i*(obm.loc_x_activeslide[id1]-obm.tsa)/1000;
		obm.vesid[c+i].style.top = (y)+'px';
		obm.vesid[c+i].style.left = (x)+'px';
		x=w_i-(w_i*obm.loc_x_activeslide[id1]/1000);
		y=h_i-(h_i*obm.loc_x_activeslide[id1]/1000);
		obm.vesid[c+j].style.top = (y)+'px';
		obm.vesid[c+j].style.left = (x)+'px';
		wb3d_setend1_func(obm,sn,id1,i,j,1000,cu,level);
	}
	else if(xi==='none'){
		wb3d_setend1_func(obm,sn,id1,i,j,10,cu,level);
            obm.ajaxwb3d_reset[idg]=1;
	}
	else if(xi==='fade'){
		obm.vesid[c+i].style.opacity= 1-(obm.loc_x_activeslide[id1]-obm.tsa)/1000;
		obm.vesid[c+j].style.opacity=((obm.loc_x_activeslide[id1]-obm.tsn)/1000);
		wb3d_setend1_func(obm,sn,id1,i,j,1000,cu,level);
	}
	else {
		
		if(obm.loc_x_activeslide[id1]<=20){
			obj=obm.gs[sn][xi];
			x=(obj.fX[0]-obj.fX[obj.max_p-1]);
			y=(obj.fY[0]-obj.fY[obj.max_p-1]);
			if(level!=0){
				x=x*ax;
				y=y*ay;
			}
			obm.vesid[c+j].style.transformOrigin = '0% 0%';
			obm.vesid[c+j].style.left = x+'px';
			obm.vesid[c+j].style.top =  y+'px';
			obm.vesid[c+j].style.zIndex  = '8';	
			obm.vesid[c+i].style.zIndex  = '7';
			obm.bk_height[obm.wb3d_id[c+j]]=h_i;
			obm.bk_width[obm.wb3d_id[c+j]]=w_i;
			obm.bk_origin[obm.wb3d_id[c+j]]=-1;
			obm.change_slide[id1]=0;
		}
		else{
			obm.change_slide[id1]++;
            }
		var id22=obm.wb3d_id[c+j];

		if(obm.change_slide[id1]>=obm.gs[sn][xi].max_f){
			frm=obm.pixel_frm[sn+'-'+xi+'-'+(obm.gs[sn][xi].max_f-1)]  ;             
            }
		else{
			frm=obm.pixel_frm[sn+'-'+xi+'-'+obm.change_slide[id1]	];  
            }
		obj=obm.gs[sn][xi];
		var tx=1;
		var ty=1;
		if(wb3d.wb3d_pro2==1){
			if(obj.E[0][17]!=0){
				tx=obj.E[17][frm]/100;
	            }
			if(obj.E[0][18]!=0){
				ty=obj.E[18][frm]/100;
	            }
	      }
		obm.bk_ty[id22]=tx;
		obm.bk_tx[id22]=ty;
		obm.chenge_display[id22]=1;
		obm.chenge_details_obj[id22]=-1;
		obm.chenge_details_obj2[id22]=-1;
		wb3d_set_style(sn,obm,frm,    0,xi,0,0,0,            0 ,0,0,       id22,         id22,'slide',0,0,0,0,0,idg,0,0);                
		if(obm.change_slide[id1]>(obm.gs[sn][xi].max_f)){
			wb3d_setend1_func(obm,sn,id1,i,j,10,cu,level);
		}
	}
}