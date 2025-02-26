/**
* Version:     1.0.0
* Author:      Keivan Kamali
*/
wb3d_setupdata.screans=function(obm){
      obm.screans_enter=[];
      obm.screans_bk=[];

      obm.createobj.screans=function(sn,idm,B,tmpdivid,obm,y,flag,l,wslide,cu,level){

            var tags1=wb3d_set_tag(B,y);
            var tag1=tags1.tag1;
            var tag2=tags1.tag2;
            var p='position:absolute;';
            var ext2='<div id="wb3df-'+idm+'"  style="'+p+'top:0px;left:0px; height:auto;width:300px;">';
            var txt='<div id="wb3dg-'+idm+'" style="'+p+'overflow:hidden;">'+ext2;
            txt+='<'+tag1+' id="wb3de-'+idm+'" style="overflow:hidden;" >';//
            txt+='<img id="wb3d0-'+idm+'" src="'+wb3d.wb3d_plagin_URL+'/images/1.png" style="position:absolute;z-index:1;width:100%;height:100%" />'; 
            txt+='<img id="wb3d1-'+idm+'" src="'+wb3d.wb3d_plagin_URL+'/images/2.png" style="position:absolute;z-index:1;width:100%;height:100%" />'; 
            txt+='<img id="wb3d2-'+idm+'" src="'+wb3d.wb3d_plagin_URL+'/images/3.png" style="position:absolute;z-index:1;width:100%;height:100%" />'; 
            txt+='<img id="wb3d3-'+idm+'" src="'+wb3d.wb3d_plagin_URL+'/images/4.png" style="position:absolute;z-index:1;width:100%;height:100%" />'; 
            txt+='</'+tag2+' ></div></div>';
            document.getElementById(tmpdivid).insertAdjacentHTML('beforeend',txt);
            obm.bk_create_layer[l]=-1;
            wb3d_reset_obj_xy3(l);
      };



      obm.addon.wb3d_screans_run=function(sn,obm,frm,B,eff,wslide,yy,md,w0 ,yy_0,md0,id1,id_l,type_L,wh,ids,idg,cu,level){

            if(obm.screans_bk[id1]!=obm.d){
                  document.getElementById('wb3d0-'+id1).style.display="none";
                  document.getElementById('wb3d1-'+id1).style.display="none";
                  document.getElementById('wb3d2-'+id1).style.display="none";
                  document.getElementById('wb3d3-'+id1).style.display="none";
                  document.getElementById('wb3d'+obm.d+'-'+id1).style.display="";
                  obm.screans_bk[id1]=obm.d;
            }
      };

      obm.setupobj.screans=function(obm,idm,T,B,wslide,name,y,sn,flag,level){
            obm.size1[idm]=1;
            obm.screans_enter[idm]=-1;
            obm.show_obj[idm]=3;
            wb3d_events('wb3dg-'+idm,obm);
      };


};