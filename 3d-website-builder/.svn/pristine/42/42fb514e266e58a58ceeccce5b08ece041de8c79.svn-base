/**
* Author URI:  https://3dwebsitebuilder.com/
* copyright :  © 2024 Keivan Kamali all rights reserved
*/

wb3d_setupdata.imgsvg=function(obm){

      obm.imgsvg_path=[];
      obm.imgsvg_run_first=[];
      obm.imgsvg_run=[];

      obm.addon.wb3d_imgsvg_run=function(sn,obm,frm,B,eff,wslide,yy,md,w0 ,yy_0,md0,id1,id_l,type_L,wh,ids,idg,cu,level){

            if(obm.imgsvg_run_first[id1]!=1){

                  var text="";
                  
                  var text3="";
                  if(B['rotate_'+md]==1){
                        text="animation: wb3d_imgsvg "+B['time_'+md]+"s linear infinite;";     
                  }
                  if(B['click_'+md]==0){
                        text3=' id="wb3dsvg-'+id1+'" ';
                  }

                  var src1=B['img1_'+md];
                  var txt='<svg '+text3+' width="100%" height="100%" style="background-size:100% 100%;width:100%;height:100%;" >';
                  txt+='<clipPath id="wb3dclip-'+id1+'" style="'+text+'">';
                  txt+='<path  id="wb3dpath-'+id1+'" style="position:absolute;left:0px;"';
                  txt+='  />';
                  txt+='</clipPath>';
                  txt+='<image id="wb3dimg23-'+id1+'" xlink:href="'+src1+'" clip-path="url(#wb3dclip-'+id1+')"  height="100%"  width="100%" >';
                  txt+='</image>';
                  txt+='</svg>';
                  document.getElementById("wb3de-"+id1).innerHTML +=txt;
                  
                  obm.imgsvg_run_first[id1]=1;
            }

            if(obm.imgsvg_path[id1]!=B['t_x_'+obm.d]+'-'+B['t_y_'+obm.d]+'-'+obm.chenge_details_obj[id1]+'-'+obm.wh_w[id1]+'-'+obm.wh_h[id1]){
                  obm.imgsvg_path[id1]=B['t_x_'+obm.d]+'-'+B['t_y_'+obm.d]+'-'+obm.chenge_details_obj[id1]+'-'+obm.wh_w[id1]+'-'+obm.wh_h[id1];
                  var ws=0;

                  var obj=obm.gs[sn][B['eff_'+md]];
                  var deltaX=(obj.X2[0]-obj.X1[0]);
                  var deltaY=(obj.Y2[0]-obj.Y1[0]);
                  var sizex=B['sizex_'+obm.d+'-'+md]*obm.wh_w[id1];
                  var sizey=B['sizey_'+obm.d+'-'+md]*obm.wh_h[id1];
                  var sizex0=B['sizex0_'+md];
                  var sizey0=B['sizey0_'+md];

                  if(obm.imgsvg_run[id1]!=obm.wh_w[id1]+'-'+obm.wh_h[id1]+'-'+sizey+'-'+sizex){
                        obm.imgsvg_run[id1]=obm.wh_w[id1]+'-'+obm.wh_h[id1]+'-'+sizey+'-'+sizex;

                        obm.bk_width[id1]=sizex;
                        obm.bk_width[id_l]=sizex;

                        obm.bk_height[id1]=sizey;
                        obm.bk_height[id_l]=sizey;

                        obm.idd[id1].style.width =(sizex)+'px';
                        obm.idc[id1].style.width =(sizex)+'px';
                        obm.ide[id1].style.width =(sizex0)+'px';



                        obm.idd[id1].style.height =(sizey)+'px';
                        obm.idc[id1].style.height =(sizey)+'px';
                        obm.ide[id1].style.height =(sizey0)+'px';
                        document.getElementById("wb3dimg23-"+id1).style.width =(sizex0)+'px';
                        document.getElementById("wb3dimg23-"+id1).style.height =(sizey0)+'px';

                        var n=obm.wh_w[id1]-obm.wh_h[id1]
                        n=(obm.wh_h[id1]/obm.wh_w[id1])
                        n=sizey/sizey0;
                        var nx=sizex/sizex0;
                        obm.scaleY[id1]=1/n;
                        obm.scaleY[id1]='scale('+(nx)+','+(n)+')';
                        obm.chenge_details_obj[id1]=-1;
                        obm.chenge_details_obj2[id1]=-1;
                        obm.bk_scr[id1]=-1;

                  }


                  deltaX=Math.abs(sizex0/deltaX);
                  deltaY=Math.abs(sizey0/deltaY);


                  var originx=50;
                  var originy=50;  

                  if(obj.E[0][11]!=0){
                        originx=obj.E[11][0];
                  }
                  if(obj.E[0][12]!=0){
                        originy=obj.E[12][0];
                  }

                  var text2=0+"% "+0+"%";    

                  document.getElementById('wb3dclip-'+id1).style.transformOrigin=text2;

                  var tx=B['t_x_'+obm.d]/100*deltaX;
                  var ty=B['t_y_'+obm.d]/100*deltaY;

                  var x=B['x_'+md]-obj.X1[0];
                  var y=B['y_'+md]-obj.Y1[0];

                  var d="M ";
                  while(ws<obm.t_p[sn+'-'+B['eff_'+md]]){

                        if(ws==0){
                              d+=(obj.fxx[ws]+x)*tx+","+(obj.fyy[ws]+y)*ty+" ";
                        }
                        if(obj.fxx[(ws)+'-T']=='line'){
                              d+='L '+(obj.fxx[ws+1]+x)*tx+','+(obj.fyy[ws+1]+y)*ty+' ';
                              ws+=2;
                        }
                        else if(obj.fxx[(ws)+'-T']=='Curved'){
                              d+='Q '+(obj.fxx[ws+2]+x)*tx+','+(obj.fyy[ws+2]+y)*ty+' ';
                              d+=((obj.fxx[ws+1]+x)*tx+','+(obj.fyy[ws+1]+y)*ty)+' ';
                              ws+=3;
                        }
                        else if(obj.fxx[(ws)+'-T']=='stop'){
                              d+='L '+(obj.fxx[ws]+x)*tx+','+(obj.fyy[ws]+y)*ty+' ';
                              ws++;
                        }
                  }
                  document.getElementById('wb3dpath-'+id1).setAttribute("d",  d+' z');
            }
      };



      obm.setupobj.imgsvg=function(obm,idm,T,B,wslide,name,y,sn,flag,level){

            obm.size1[idm]=7;
            obm.event_obj[idm]=function (){
            };

            obm.imgsvg_run_first[idm]=-1;
            obm.imgsvg_path[idm]=-1;
            obm.show_obj[idm]=3;
            obm.scaleX[idm]=1;

            wb3d_events('wb3dg-'+idm,obm);
      };

      obm.createobj.imgsvg=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){

            var p='position:absolute;';
            var ext2='<div  id="wb3df-'+idm+'" style="'+p+'top:0px;left:0px; height:auto;width:300px;">';
            var textx='';

            var txt='<div id="wb3dg-'+idm+'" style="'+p+'">'+ext2;
            txt+='<div id="wb3de-'+idm+'" style="overflow:hidden;position:absolute">';
            txt+='</div></div></div>';
            document.getElementById(tmpdivid).innerHTML +=txt;

            obm.bk_create_layer[l]=-1;
            obm.bk_create_layer0[l]=-1;
            wb3d_reset_obj_xy3(l);

      };
      // obm.createobj.imgsvg=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){

      //       var p='position:absolute;';
      //       var tags1=wb3d_set_tag(B,y);
      //       var tag1=tags1.tag1;
      //       var tag2=tags1.tag2;
      //       var ext2='<div id="wb3df-'+idm+'" style="'+p+'top:0px;left:0px; height:auto;width:300px;">';
      //       var txt='<div id="wb3dg-'+idm+'" style="'+p+'overflow:hidden">'+ext2;
      //       txt+='<'+tag1+' id="wb3de-'+idm+'" style="overflow:hidden;position:absolute" >';
      //       txt+='</'+tag2+'></div></div>';
      //       document.getElementById(tmpdivid).innerHTML +=txt;
      //       obm.bk_create_layer[l]=-1;
      //       wb3d_reset_obj_xy3(l);
      // };

};