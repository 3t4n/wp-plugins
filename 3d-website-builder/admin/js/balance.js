/**
* Author URI:  https://3dwebsitebuilder.com/
* Author : Keivan Kamali
*/
// Soft Scroll
wb3d_balance=function(x,obm){
	var e=0;
	if(x>0){
		if(x<=8){
			e=1;
            }
		else if(x>=8&&x<=25){
			e=2;
            }
		else if(x>=25&&x<=35){
			e=3;
            }
		else if(x>=35&&x<=80){
			e=4;
            }
		else if(x>=80&&x<=150){
			e=5;
            }
		else if(x>=150&&x<=400){
			e=9;
            }
		else if(x>=400&&x<=700){
			e=15;
            }
		else if(x>=700&&x<=1400){
			e=20;
            }
		else if(x>=1400&&x<=3000){
			e=50;
            }
		else if(x>=3000&&x<=6000){
			e=90;
            }
		else if(x>=6000){
			e=130;
            }
	}
	else if(x<0){

		if(x>=-8){
			e=-1;
            }
		else if(x<=-8&&x>=-25){
			e=-2;
            }
		else if(x<=-25&&x>=-35){
			e=-3;
            }
		else if(x<=-35&&x>=-80){
			e=-4;
            }
		else if(x<=-80&&x>=-150){
			e=-5;
            }
		else if(x<=-150&&x>=-400){
			e=-9;
            }
		else if(x<=-400&&x>=-700){
			e=-15;
            }
		else if(x<=-700&&x>=-1400){
			e=-20;
            }
		else if(x<=-1400&&x>=-3000){
			e=-50;
            }
		else if(x<=-3000&&x>=-6000){
			e=-90;
            }
		else if(x<=-6000){
			e=-130;
            }
	}
	return e;
};



// Parallex 
wb3d_parallax1=function(B,obm,type,num,id1,bx,by,x,y,sx,sy,idg,id_l){
  
	var Q=0;
	var G=0;
	var s=0;
	var ppp;

	var X=parseInt((bx-(x+(obm.bk_width[id1]/2)))/sx*num);
	var Y=parseInt((by-(y+(obm.bk_height[id1]/2)))/sy*num);

	if(type===1){
		Q=obm.bk_p_x[id_l];
		s=(wb3d_balance( (X-obm.bk_p_x[id_l]),obm ));
		obm.bk_p_x[id_l]+=s;	
		G=obm.bk_p_x[id_l];
	}
	else if(type===2){
		Q=obm.bk_p_y[id_l];
		s=(wb3d_balance( (Y-obm.bk_p_y[id_l]),obm ));
		if(s>=-1&&s<=1){
			s=0;
            }
		obm.bk_p_y[id_l]+=s;
		G=obm.bk_p_y[id_l];
	}
	/////////////////////////////////////////////rotate////////////////////////////////////////////////////////
	else if(type===8||type===9){
		if(type===8){
			ppp=X;
            }
		else{
			ppp=Y;
            }
		Q=obm.bk_p_r[id_l];
		obm.bk_p_r[id_l]+=wb3d_balance( (ppp-obm.bk_p_r[id_l]),obm );
		G=obm.bk_p_r[id_l];
	}
	/////////////////////////////////////////////rotatex////////////////////////////////////////////////////////
	else  if(type===11||type===12){
		if(type===11){
			ppp=X;
            }
		else{
                  ppp=Y;
            } 
			
		Q=obm.bk_p_rx[id_l];
		obm.bk_p_rx[id_l]+=wb3d_balance( (ppp-obm.bk_p_rx[id_l]),obm );
		G=obm.bk_p_rx[id_l];
	}
	/////////////////////////////////////////////rotatey////////////////////////////////////////////////////////
	else if(type===14||type===15){
		if(type===14){
			ppp=X;
            }
		else{
                  ppp=Y;
            } 
			
		Q=obm.bk_p_ry[id_l];
		obm.bk_p_ry[id_l]+=wb3d_balance( (ppp-obm.bk_p_ry[id_l]),obm );
		G=obm.bk_p_ry[id_l];
	}
	/////////////////////////////////////////////scaleX////////////////////////////////////////////////////////
	else if(type===17||type===18){
		X=Math.abs(X);
		Y=Math.abs(Y);
		if(num<0){
			X*=-1;
			Y*=-1;
		}
		if(type===17){
			ppp=X;
            }
		else{
                  ppp=Y;
            } 
			
		Q=obm.bk_p_scx[id_l];
		obm.bk_p_scx[id_l]+=wb3d_balance( (ppp-obm.bk_p_scx[id_l]),obm );
		G=obm.bk_p_scx[id_l];
	}
	/////////////////////////////////////////////scaleY////////////////////////////////////////////////////////
	else if(type===20||type===21){

            X=Math.abs(X);
            Y=Math.abs(Y);

		if(num<0){
			X*=-1;
			Y*=-1;
		}

		if(type===20){
			ppp=X;
            }
		else {
			ppp=Y;
            }

		Q=obm.bk_p_scy[id_l];
		obm.bk_p_scy[id_l]+=wb3d_balance( (ppp-obm.bk_p_scy[id_l]),obm );
		G=obm.bk_p_scy[id_l];
	}
	/////////////////////////////////////////////////skewx/////////////////////////////////////////////////////
	else if(type===26||type===27){
		if(type===26){
			ppp=X;
            }
		else {
			ppp=Y;
            }

		Q=obm.bk_p_skx[id_l];
		obm.bk_p_skx[id_l]+=wb3d_balance( (ppp-obm.bk_p_skx[id_l]),obm );
		G=obm.bk_p_skx[id_l];
	}
	////////////////////////////////////////////////skewy////////////////////////////////////////////////////////
	else if(type===29||type===30){
		if(type===29){
			ppp=X;
            }
		else {
			ppp=Y;
            }
		Q=obm.bk_p_sky[id_l];
		obm.bk_p_sky[id_l]+=wb3d_balance( (ppp-obm.bk_p_sky[id_l]),obm );
		G=obm.bk_p_sky[id_l];
	}

	if(Q!=G){
		obm.chenge_details_obj[id1]=0;
		
	}
};