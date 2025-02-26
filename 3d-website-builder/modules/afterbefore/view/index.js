/**
* Version:     1.0.0
* Author:      Keivan Kamali
*/
wb3d_setupdata.afterbefore=function(obm){

      obm.setupobj.afterbefore=function(obm,idm,T,B,wslide,name,y,sn,flag,level){

            obm.size1[idm]=1;
            obm.newsize[idm]=0;
            obm.mousemove_obj[idm]=function (a,b,c,d,e,x){
                  wb3d_afterbefore_mousemove2(a,b,c,d,e,x);
            };
            obm.show_obj[idm]=3;
            wb3d_events('wb3dg-'+idm,obm);
      };


      obm.createobj.afterbefore=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){
            var p='position:absolute;';
            var tags1=wb3d_set_tag(B,y);
            var tag1=tags1.tag1;
            var tag2=tags1.tag2;
            var ext2='<div id="wb3df-'+idm+'" style="'+p+'top:0px;left:0px; height:auto;width:300px;">';
            var txt='<div id="wb3dg-'+idm+'"  style="'+p+'overflow:hidden;">'+ext2;
            txt+='<'+tag1+' id="wb3de-'+idm+'"  style="z-index:11;'+p+'top:0px;left:0px;overflow:hidden;">';
            txt+='<img id="wb3d20-'+idm+'" src="'+B["image1_"+y]+'" style=" width:100%; height:100%; '+p+'top:0px;left:0px;z-index:1;"/>';
            if(B['ver_'+y]===1){
                  txt+='<div  id="wb3d21-'+idm+'" style="height:100%;width:50%;'+p+'top:0px;left:0px;z-index:2;overflow:hidden;border-right:1px solid #fff;">';
                  txt+='<img  id="wb3d22-'+idm+'" src="'+B["image2_"+y]+'" style="height:100%;width:200%;'+p+'top:0px;left:0px;"/>';
                  txt+='</div>';
            }
            else{
                  txt+='<div  id="wb3d21-'+idm+'" style="height:50%;width:100%;'+p+'top:0px;left:0px;z-index:2;overflow:hidden;border-bottom:1px solid #fff;">';
                  txt+='<img  id="wb3d22-'+idm+'" src="'+B["image2_"+y]+'" style="height:11px;height:200%;width:100%;'+p+'top:0px;left:0px;"/>';
                  txt+='</div>';
            }
            txt+='</'+tag2+'></div></div>';
            document.getElementById(tmpdivid).insertAdjacentHTML('beforeend',txt);
            obm.bk_create_layer[l]=-1;
            wb3d_reset_obj_xy3(l);
      };

      wb3d_afterbefore_mousemove2=function (a,b,c,d,e,x){

            var F=x.F;
            var modd=x.modd;

            var px=obm.es1_x[x.idm];
            var py=obm.es1_y[x.idm];

            var sy=x.F['sizey_'+obm.d+'-'+x.modd]*obm.wh_h[x.id1];
            var sx= x.F['sizex_'+obm.d+'-'+x.modd]*obm.wh_w[x.id1];

            if(py>0.99*sy){
                  py=sy;
            }
            else if(py<0.01*sy){
                  py=0;
            }
            if(px>0.99*sx){
                  px=sx;
            }
            else if(px<0.01*sx){
                  px=0;
            }

            x=px;
            var y=py;

            if(F['ver_'+modd]!=1){
                  document.getElementById('wb3d21-'+b).style.height=(y)+'px';
                  document.getElementById('wb3d22-'+b).style.height=(sy)+'px';
            }
            else{
                  document.getElementById('wb3d21-'+b).style.width=(x)+'px';
                  document.getElementById('wb3d22-'+b).style.width=(sx)+'px';
            }
      };
};

