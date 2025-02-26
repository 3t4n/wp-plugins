/**
* Author URI:  https://3dwebsitebuilder.com/
* Author : Keivan Kamali
*/

wb3d_setupdata.img=function(obm){

      obm.img_enter=[];
      obm.img_run_first=[];
      obm.img_img2=[];
      obm.addon.wb3d_img_run=function(sn,obm,frm,B,eff,wslide,yy,md,w0 ,yy_0,md0,id1,id_l,type_L,wh,ids,idg,cu,level){

            if(obm.img_run_first[id1]!=1){
                  if(B['img1_'+md]!=B['img2_'+md]&&B['img2_'+md]!=''){
                        document.getElementById('wb3dimg-'+id1).src=B['img2_'+md];
                  }
                  obm.img_run_first[id1]=1;
            }

            if(obm.img_img2[id1]!=1){
                  if(B['img1_'+md]!=B['img2_'+md]&&B['img2_'+md]!=''){
                        if(document.getElementById('wb3dimg23-'+id1)!=null){
                              if(document.getElementById('wb3dimg23-'+id1).src!=B['img2_'+md]){
                                    document.getElementById('wb3dimg23-'+id1).src=B['img2_'+md];
                                    obm.img_img2[id1]=1;
                              }
                        }
                  }
            }
      };

	
      wb3d_img_mouseenter2=function (e,id,K,i){

            if(obm.img_enter[id]!=1&&K['zoom-'+i]===1){
                  var title=' title="'+K['title_'+i]+'" ';
                  var alt=' alt="'+K['alt_'+i]+'" ';
                  var src=document.getElementById('wb3dimg-'+id).src;
                  var txt='<div id="wb3dg3-'+id+'" style="overflow:hidden;position:absolute;width:100%;height:100%;" >';
                  txt+='<img '+title+alt+' id="wb3dimg23-'+id+'" src="'+src+'" style=" width:100%;height:100%;position:absolute;top:0px;left:0px;z-index:100;"/></div>';
                  document.getElementById('wb3de-'+id).innerHTML +=txt;
                  document.getElementById('wb3dimg-'+id).style.display ='none';
                  obm.img_enter[id]=1;
                  obm.chenge_details_obj[id]=-1;
            }
            else if(obm.img_enter[id]===1){
                  document.getElementById('wb3dg3-'+id).style.display ='';
                  document.getElementById('wb3dimg-'+id).style.display ='none';
                  document.getElementById('wb3dimg23-'+id).style.width=document.getElementById('wb3dg3-'+id).offsetWidth+'px';
                  document.getElementById('wb3dimg23-'+id).style.height=document.getElementById('wb3dg3-'+id).offsetHeight+'px';

            }
      };


      wb3d_img_mouseout2=function (e,id,F,modd){
            if(obm.img_enter[id]===1){
                  document.getElementById('wb3dimg23-'+id).style.top='0px';
                  document.getElementById('wb3dimg23-'+id).style.left='0px';
                  document.getElementById('wb3dimg23-'+id).style.width=document.getElementById('wb3dg3-'+id).offsetWidth+'px';
                  document.getElementById('wb3dimg23-'+id).style.height=document.getElementById('wb3dg3-'+id).offsetHeight+'px';
                  document.getElementById('wb3dg3-'+id).style.display ='none';
                  document.getElementById('wb3dimg-'+id).style.display ='';
            }
      };



	
      wb3d_img_mousemove2=function (e,id1,F,modd,sn){

            if(obm.img_enter[id1]===1){
                  var a=document.getElementById('wb3dg-'+id1);
                  var w0=document.getElementById('wb3df-'+id1).offsetWidth;
                  var h0=document.getElementById('wb3df-'+id1).offsetHeight;
                  document.getElementById('wb3dimg23-'+id1).style.width=(w0*3)+'px';
                  document.getElementById('wb3dimg23-'+id1).style.height=(h0*3)+'px';

                  var id=obm.wb3d_ids[id1];
                  var cu=id.split('_')[0];
                  id=id.split('_')[1];
                  var tx,ty,eff,frm;

                  if(obm.cu!=cu){
                        return;
                  }
                  id=id.split('-');

                  var fx=id[0];
                  var ex=id[1];
                  var bc=id[2];

                  var fg=id[3];
                  var fh=id[4];

                  sn=obm.sn[cu+'-0'];
                  var B=obm.dataslide[sn][obm.los[sn+'-'+fx]][obm.lo_l[sn+'-'+fx+'-'+ex]];
                  if(id[3]===undefined){
                        id=fx+'-'+ex+'-'+bc;
                        eff=B['EA_'+obm.d];
                        frm=obm.pixel_frm[sn+'-'+eff+'-'+obm.framenum[cu+'_'+fx+'-'+ex]];
                  }
                  else{
                        sn=B['slider_'+modd];
                        B=obm.dataslide[sn][obm.los[sn+'-'+fg]][obm.lo_l[sn+'-'+fg+'-'+fh]];
                        id=cu+'_'+fx+'-'+ex+'-'+bc+'-'+fg+'-'+fh;
                        eff=B['EA_'+obm.d];
                        frm=obm.pixel_frm[sn+'-'+eff+'-'+obm.framenum[id]];
                  }


                  tx=1;
                  ty=1;
                  if(eff!=-1){
                        var gs=obm.gs;

                        if(gs[sn][eff].E[0][17]!=0){
                              tx=gs[sn][eff].E[17][frm]/1000;
                        }
                        if(gs[sn][eff].E[0][18]!=0){
                              ty=gs[0][eff].E[18][frm]/1000;
                        }
                  }


                  var rect =a.getBoundingClientRect();
                  var x =e.clientX - rect.left;
                  var y = e.clientY - rect.top;
                  var w=x-((x/w0)*w0*3);
                  var h=y-((y/h0)*h0*3);
                  document.getElementById('wb3dimg23-'+id1).style.left=(w/tx)+'px';
                  document.getElementById('wb3dimg23-'+id1).style.top=(h/ty)+'px';
            }
      };


      obm.setupobj.img=function(obm,idm,T,B,wslide,name,y,sn,flag,level){

            obm.size1[idm]=1;
            obm.img_enter[idm]=-1;
            obm.img_img2[idm]=-1;
            obm.mouseenter_obj[idm]=function (e,id,K,i){
                  wb3d_img_mouseenter2(e,id,K,i);
            };
            obm.mouseleave_obj[idm]=function (e,id,F,modd){
                  wb3d_img_mouseout2(e,id,F,modd);
            };
            obm.mousemove_obj[idm]=function (e,id1,F,modd,sn){
                  wb3d_img_mousemove2(e,id1,F,modd,sn);
            };
            obm.show_obj[idm]=3;
            if(document.getElementById('wb3dfullscrean-'+idm)!=null)
                  document.getElementById('wb3dfullscrean-'+idm).addEventListener('click', function(){
                  var x=document.getElementById('wb3dimg-'+this.id.split('-')[1]).src;
                  document.getElementById('wb3d_fullscrean_img').src=x;
                  document.getElementById('wb3d_fullscrean').style.display='flex';
            });

            wb3d_events('wb3dg-'+idm,obm);
      };


      obm.createobj.img=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){

            var p='position:absolute;';
            var tags1=wb3d_set_tag(B,y);
            var tag1=tags1.tag1;
            var tag2=tags1.tag2;
            var ext2='<div id="wb3df-'+idm+'" style="'+p+'top:0px;left:0px; height:auto;width:300px;">';
            var txt='<div id="wb3dg-'+idm+'" style="'+p+'overflow:hidden">'+ext2;
            if(B['full-'+y]){
                  txt+='<div id="wb3dfullscrean-'+idm+'" class="pointer imgbuttom"  style="background-image: url('+wb3d.wb3d_plagin_URL+'/includes/img/images/full.png);background-size: 100% 100%;position:absolute;top:5px;left:5px;z-index:110;width:14px;height:14px"></div>';   
            }

            var src1=B['img1_'+y];

            var title=' title="'+B['title_'+y]+'" ';
            var alt=' alt="'+B['alt_'+y]+'" ';

            txt+='<'+tag1+' id="wb3de-'+idm+'" style="overflow:hidden;position:absolute" >';
            txt+='<img '+title+alt+' id="wb3dimg-'+idm+'" src="'+src1+'"  style=" width:100%;height:100%;position:absolute;top:0px;left:0px;z-index:1;"/>';
            txt+='</'+tag2+'></div></div>';
            document.getElementById(tmpdivid).innerHTML +=txt;
            obm.bk_create_layer[l]=-1;
            wb3d_reset_obj_xy3(l);
      };

};