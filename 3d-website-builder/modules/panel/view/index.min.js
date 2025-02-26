/**
* Version:     1.0.0
* Author:      Keivan Kamali
*/
wb3d_setupdata.panel=function(e){e.createobj.panel=function(a,b,c,f,g,h,k,d,l,m,n){a='<div id="wb3dg-'+b+'" style="position:absolute;"><div id="wb3df-'+(b+'" style="position:absolute;top:0px;left:0px; height:auto;width:300px;">');c=wb3d_set_tag(c,h);a=a+("<"+c.tag1+' id="wb3de-'+b+'" style="position:absolute;top:0px;left:0px; height:100%;width:100%;"></')+(c.tag2+" ></div></div>");document.getElementById(f).insertAdjacentHTML("beforeend",a);g.bk_create_layer[d]=-1;wb3d_reset_obj_xy3(d)};
e.addon.wb3d_panel_run=function(a,b,c,f,g,h,k,d,l,m,n,p,q,r,t,u,v,w,x){};e.setupobj.panel=function(a,b,c,f,g,h,k,d,l,m){a.size1[b]=1;a.show_obj[b]=3;a.panelLock[b]=1;wb3d_events("wb3dg-"+b,a)}};