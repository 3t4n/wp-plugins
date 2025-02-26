/**
* Author URI:  https://3dwebsitebuilder.com/
* Author : Keivan Kamali
*/


if(wb3d.flag!='view'){
      var element =  document.getElementById('wpcontent');
      if (typeof(element) != 'undefined' && element != null){
            document.getElementById('wpcontent').style.margin='0';
            document.getElementById('wpcontent').style.padding='0';
            document.getElementsByTagName('body')[0].style.top='0';
            document.getElementsByTagName('body')[0].style.padding='0';
            document.getElementsByTagName('body')[0].style.height='auto';
            document.getElementsByTagName('html')[0].style.height='auto';
            document.getElementsByTagName('html')[0].style.overflowY='auto';
            document.getElementById('wpbody').style.top='0px';
            document.getElementById('wpbody').style.left='0px';
            document.getElementById('wpbody-content').style.padding='0px';
      }
}
if(document.getElementById('wb3d_fullscrean'))
document.getElementById('wb3d_fullscrean').addEventListener('click',function(){
      document.getElementById('wb3d_fullscrean_img').style.display='';
      document.getElementById('wb3d_fullscrean').style.display='none';
});
if(document.getElementById('divscrolltop2')!=undefined){
      document.getElementById('divscrolltop2').classList.remove("wb3d_displaynone");
}
if(document.getElementById('divsize_w_h')!=undefined){
      document.getElementById('divsize_w_h').classList.remove("wb3d_displaynone");
}
if(document.getElementById('divStatus')!=undefined){
      document.getElementById('divStatus').classList.remove("wb3d_displaynone");
}
if(document.getElementById('wb3d_fullscrean2')!=undefined){
      document.getElementById('wb3d_fullscrean2').classList.remove("wb3d_displaynone");
}


      // change Inputs (when Scroll or Range Slider change)
wb3d_set_tag=function (B,y){  
      var tags={};
      var tag1='div';
      var tag2='div';

      if(B['w_tag_'+y]!=undefined){
            tag1=B['w_tag_'+y];
            tag2=B['w_tag_'+y];
      }

      if(B.click_type===0){
            tag1='a';
            tag2='a';
            tag1+=' href="'+B.click_link+'" ';
            if(B.click_newpage>1){
                  tag1+=' target="_self" ';
            }
            else{
                  tag1+=' target="_blank" ';
            }
            if(B.click_newpage===1||B.click_newpage===3){
                  tag1+=' rel="nofollow noopener" ';
            }
            else{
                  tag1+=' rel="noopener" ';
            }
      }

      var i, j;
      for(var h=0;h<4;h++){
            i='T_E'.h;
            j='l_type';
      }
      if(B.pointer==1){
            tag1+=' class="wb3d_pointer" ';
      }

      tags.tag1=tag1;
      tags.tag2=tag2;
      return tags;
};

function wb3d_functionsjs_load(v){wb3d_set_wb3d_sub_scroll_data=function(e,t,d,_,l,o,n,a){var i,s=_+"_"+d;0==e.U_P[a+"-"+l+"-"+o]?t["PY2_"+e.d]=t["PY_"+e.d]:(o=e.U_P[a+"-"+l+"-"+o].split("-"),o=e.dataslide[a][e.los[a+"-"+l]][e.lo_l[a+"-"+l+"-"+o[0]]],t["PY2_"+e.d]=o["PY_"+e.d]),1==t["reverse_"+n]?e.ajaxwb3d_reverse[s]=1:e.ajaxwb3d_reverse[s]=0,e.vscroll[s]=0,e.deltaflag["v-"+t["slider_"+n]]=1;var r=[],b=[],c=[],w=0,u=0;if(void 0===e.wb3d[0])e.wb3d[0]=s,e.wb3dB[0]=t,e.wb3dY[0]=n,r[0]=s,b[0]=t,c[0]=n,void 0===e.scrollMaxY[e.wb3d[0]]&&(e.scrollMaxY[e.wb3d[0]]=0);else for(i=0;i<300&&(void 0===e.scrollMaxY[e.wb3d[i]]&&(e.scrollMaxY[e.wb3d[i]]=0),void 0!==e.wb3d[i]||1!==u);i++){if(void 0===e.wb3d[i]&&0===u){r[w]=s,b[w]=t,c[w]=n;break}e.wb3dB[i]["PY2_"+e.d]-e.wb3dB[i]["mt"+e.d+"_"+n]*e.setting[a]["h_"+e.d]/100>t["PY2_"+e.d]-t["mt"+e.d+"_"+n]*e.setting[a]["h_"+e.d]/100&&0===u?(r[w]=s,b[w]=t,c[w]=n,r[++w]=e.wb3d[i],b[w]=e.wb3dB[i],c[w]=e.wb3dY[i],w++,u=1):(r[w]=e.wb3d[i],b[w]=e.wb3dB[i],c[w]=e.wb3dY[i],w++)}for(delete e.wb3d,delete e.wb3dB,delete e.wb3dY,e.wb3d=[],e.wb3dB=[],e.wb3dY=[],i=0;i<300&&void 0!==b[i];i++)e.wb3d[i]=r[i],e.wb3dB[i]=b[i],e.wb3dY[i]=c[i]},wb3d_reset_data_slider_sub=function(e,t,d,_,l,o,n,a,i,s){var r,b,c,w,u=t["slider_"+a],m="0_0";if(1===t["WO"+e.d]?e.wh_w[_]=e.wb3d_ay[m]:e.wh_w[_]=e.wb3d_ax[m],1===t["HO"+e.d]?e.wh_h[_]=e.wb3d_ay[m]:e.wh_h[_]=e.wb3d_ax[m],1!=t["ajax_"+a]){e.wb3d_ax["0_"+_]=t["sizex_"+e.d+"-"+a]/e.setting[u]["w_"+e.d]*e.wh_w[_],e.wb3d_ay["0_"+_]=t["sizey_"+e.d+"-"+a]/e.setting[u]["h_"+e.d]*e.wh_h[_];for(var v=e.wb3d_ay["0_"+_]-e.wb3d_ax["0_"+_],f=0;f<e.setting[u].num;f++){var h=l+"_"+o+"-"+n+"-"+a+"-"+e.dataslide[u][f][0].slide_of_location;if(1!=s){for(var g=0;g<65e3;g++)delete e.private[h+"-"+g],delete e.public[g];e.vscroll[l+"_"+_]=0,e.vscrollM[l+"_"+_]=0,e.h2[h]=0,e.w2[h]=0,e.framenum[h+"-0"]=0,e.framenum[h]=0,e.bk_play[h+"-0"]="play"}var p=l+"_"+e.wb3d_id[l+"_"+o+"-"+n+"-"+a];e.flag_bl2[p]=0,e.max_top[p]=0;var y=e.dataslide[u][f][0];for(y["bl_"+e.d]=0,r=1;r<e.dataslide[u][f][0].layer;r++){b=h+"-"+e.dataslide[u][f][r].ind,null==e.bk_top3[b]&&(e.bk_top3[b]=0),c=e.dataslide[u][f][r];for(var x=0;x<c.layer_obj;x++)"panel"===c["type_obj-"+(a=c["obj_num_"+x])]&&1==c["relative_"+a]&&(e.check_relative=1,0==c["HO"+e.d]&&(v=0),wb3d_setPanel_position(y,c,h,v*c["sizey_"+e.d+"-"+a],e.wb3d_id[b+"-"+a],b,1))}for(e.flag_bl2["0_"+_]=0,r=1;r<e.dataslide[u][f][0].layer;r++){b=h+"-"+e.dataslide[u][f][r].ind,c=e.dataslide[u][f][r],1!=s&&(e.framenum[b]=0,(e.true_frm[b]=0)===c["T_E"+e.d]?e.bk_pluse[b]=1:e.bk_pluse[b]=0),e.try2[b]=0,e.trx2[b]=0,e.trx[b]=0,e.try[b]=0,e.trx[b]=0,e.maxtime[b]=100,e.hover_id[b]=0,e.hover_id2[b]=0,e.mouseenter[b]=-1;for(var k=0;k<4;k++)c["EB_"+k]=c["EA_"+k];for(var B=0;B<c.layer_obj;B++)w=c["obj_num_"+B],_=e.wb3d_id[b+"-"+w],e.w[_]=0,e.h[_]=0,e.w[b+"-"+t["obj_num_"+B]]=0,wb3d_set_bk(_,e,b)}}}},wb3d_reset_obj_xy3=function(e){var t;v.flag_bl2["0_0"]=0,v.bk_t_l=[],v.bk_t_l2=[],void 0!==e&&(t=0,null!=(e=(e=e.toString()).split("-"))[3]&&(t=v.wb3d_id[e[0]+"-"+e[1]+"-"+e[2]],v.flag_bl2["0_"+t]=0))},window.addEventListener("scroll",function(e){!function(){var e,t=0;if(1!==v.lockwheel&&1!==v.lock_scroll_w_h){e=document.body.scrollTop,(isNaN(e)||0===e)&&0<document.documentElement.scrollTop&&(e=document.documentElement.scrollTop);var d=v.sn[v.cu+"-0"],_=v.setting[d]["vmaxsc-"+v.d];(d=document.getElementById("wb3dh_0").getBoundingClientRect()).top,(t=+t/v.wb3d_ay[v.cu+"_0"])<0&&(t=0),_<t&&(t=_);for(var l=0,o=[],n=0;n<200&&void 0!==v.wb3d[n];n++){var a=v.wb3d[n];1!=v.wb3dB[n]["vs_"+v.wb3dY[n]]||1==o[v.wb3dB[n]["PY2_"+v.d]]||~~e>=v.vscrollS[a]-l&&(l+=v.scrollMaxY[a],o[v.wb3dB[n]["PY2_"+v.d]]=1)}for(var i=0;i<v.cunter;i++)1!=v.lock_scroll&&(v.vscroll[i+"_0"]=~~e+l,v.vscrollM[i+"_0"]=~~e);v.t1=e,v.putimagecanvas(),1!=v.canvas&&(v.canvas=1,setTimeout(function(){v.putimagecanvas(),v.canvas=0},100))}}()}),document.body.style.overflowX="hidden",wb3d_set_scroll_ui=function(e,t,d){1!=t&&(e.timer_scroll=0,1!=e.lock_scroll&&(e.lock_scroll=1,wb3d_timer_scroll_lock()),1!=e.resizepage&&window.scrollTo(0,e.vscrollM[d]),"view"!=wb3d.flag&&jQuery("#spinnertop").val(e.vscroll[d]))},wb3d_timer_scroll_lock_w_h=function(){if(v.timer_scroll_w_h-=25,v.timer_scroll_w_h<=0)return v.timer_scroll_w_h=0,void(v.lock_scroll_w_h=0);setTimeout(function(){wb3d_timer_scroll_lock_w_h()},25)},wb3d_timer_scroll_lock=function(){v.timer_scroll-=25,v.timer_scroll<=0?v.lock_scroll=0:setTimeout(function(){wb3d_timer_scroll_lock()},25)},window.addEventListener("resize",function(){var e=window.innerWidth,t=window.innerHeight;(v.bk_innerWidth!=e||v.bk_innerHeight!=t&&"demo"==wb3d.flag)&&wb3d_change_screen_size()}),wb3d_change_screen_size=function(){var e=window.innerWidth,t=window.innerHeight;v.bk_innerWidth=e,v.bk_innerHeight=t,v.check_relative=0,v.resizepage=1,wb3d_reset_obj_xy(),1===v.setting[v.sn["0-0"]].scroll&&(document.getElementsByTagName("html")[0].className+=" wb3d_hide_scrollbar");var d=v.sn["0-0"],_=document.getElementById("wb3d_0").offsetWidth;v.touch=0,1==v.setting[v.sn["0-0"]].touch&&(v.touch=1),1==v.setting[v.sn["0-0"]].fullwidth&&(_=e);for(var l,o=t,n=0,a=_/o,i=Math.abs(v.setting[d].w_0/v.setting[d].h_0-a),s=0,r=1;r<4;r++)s=v.setting[d]["w_"+r]/v.setting[d]["h_"+r],Math.abs(s-a)<i&&(i=Math.abs(s-a),n=r);v.d=n,o=_/(v.setting[d]["w_"+n]/v.setting[d]["h_"+n]),v.wb3d_ax["0_0"]=_/v.setting[d]["w_"+n],v.wb3d_ay["0_0"]=t/v.setting[d]["h_"+n],v.x=_,v.y=o,1==v.setting[v.sn["0-0"]].fullwidth&&(document.getElementById("wb3dh_0").style.width=v.setting[d]["w_"+v.d]*v.wb3d_ax["0_0"]+"px",l=(e-document.getElementById("wb3d_0").offsetWidth)/2,document.getElementById("wb3dh_0").style.left=-l+"px"),document.getElementById("wb3dh_0").style.height=o+"px",document.getElementById("wb3d_0").style.height=o+"px",s=document.getElementById("wb3dh_0").getBoundingClientRect(),l=document.body.scrollTop,(isNaN(l)||0===l)&&0<document.documentElement.scrollTop&&(l=document.documentElement.scrollTop),o=document.body.scrollLeft,(isNaN(o)||0===o)&&0<document.documentElement.scrollLeft&&(o=document.documentElement.scrollLeft),v.deltaY[0]=l+s.top,v.deltaX=o+s.left,wb3d_reset_data_slider(-1,-1,0),v.cu=0,"view"!=wb3d.flag&&(document.getElementById("size_w_h").value=(e/t).toFixed(2),document.getElementById("Status").value=++n),v.putimagecanvas(),setTimeout(function(){v.putimagecanvas()},330),v.resizepage=0},wb3d_setObj_position=function(e,t,d,_,l){for(var o=v.bk_top3[_]=0;o<e["bl_"+v.d]&&v.panelY[d+"-"+o]<t["PY_"+v.d];o++)v.bk_top3[_]+=v.panelTy[d+"-"+o]},wb3d_setPanel_position=function(e,t,d,_,l,o,n){var a=[],i=[],s=[],r=[],b=0,c=0,w=0;if(0==e["bl_"+v.d])a[0]=t["PY_"+v.d],i[0]=_,r[s[0]=l]=0,w=1;else{for(c=0;c<e["bl_"+v.d];c++)t["PY_"+v.d]<v.panelY[d+"-"+c]&&0==w?(a[b]=t["PY_"+v.d],i[b]=_,r[s[b]=l]=b,i[++b]=v.panelTy[d+"-"+c],a[b]=v.panelY[d+"-"+c],s[b]=v.panelId[d+"-"+c],r[v.panelId[d+"-"+c]]=b,w=1):(a[b]=v.panelY[d+"-"+c],i[b]=v.panelTy[d+"-"+c],s[b]=v.panelId[d+"-"+c],r[v.panelId[d+"-"+c]]=b),b++;0==w&&(a[b]=t["PY_"+v.d],i[b]=_,r[s[b]=l]=b)}for(e["bl_"+v.d]++,c=0;c<e["bl_"+v.d];c++)v.panelY[d+"-"+c]=a[c],v.panelTy[d+"-"+c]=i[c],v.panelId[d+"-"+c]=s[c],v.panelId2[s[c]]=d+"-"+c},wb3d_reset_data_slider=function(e,t,d){var _,l,o,n,a,i,s=v.cu,r=v.sn[s+"-0"];v.scrollMaxY[s+"_0"]=0,v.flag_bl2[s+"_0"]=0,v.wb3d=[],v.wb3dB=[],v.wb3dY=[],null==v.vscroll[s+"_0"]&&(v.vscroll[s+"_0"]=0,v.vscrollM[s+"_0"]=0);var b=v.slide_of_location[r+"-0"];if(1!=d)for(u=v.framenum[s+"_"+b]=0;u<65e3;u++)delete v.private[b+"-"+u],delete v.public[u];if(e==b||null==e||-1==e){1!=t&&(v.h2[s+"_"+b]=0,v.w2[s+"_"+b]=0,v.bk_play[s+"_"+b+"-0"]="play"),document.getElementById("wb3dh-"+v.wb3d_id[s+"_"+b]).style.width=v.setting[r]["w_"+v.d]*v.wb3d_ax[s+"_0"]+"px";var c=v.dataslide[r][v.los[r+"-"+b]][0];c["bl_"+v.d]=0,v.max_top["0_0"]=0;for(var w=v.wb3d_ay["0_0"]-v.wb3d_ax["0_0"],u=1;u<v.layers[r+"-"+b];u++)for(a=s+"_"+b+"-"+(o=v.la_l[r+"-"+b+"-"+u]),null==v.bk_top3[a]&&(v.bk_top3[a]=0),n=v.dataslide[r][v.los[r+"-"+b]][u],i=0;i<n.layer_obj;i++)"panel"===n["type_obj-"+(_=n["obj_num_"+i])]&&1==n["relative_"+_]&&(v.check_relative=1,0==n["HO"+v.d]&&(w=0),wb3d_setPanel_position(c,n,s+"_"+b,w*n["sizey_"+v.d+"-"+_],v.wb3d_id[s+"_"+b+"-"+o+"-"+_],a,0));for(u=1;u<v.layers[r+"-"+b];u++){o=v.la_l[r+"-"+b+"-"+u],1!=d&&(v.framenum[s+"_"+b+"-"+o]=0,v.true_frm[s+"_"+b+"-"+o]=0),0===(n=v.dataslide[r][v.los[r+"-"+b]][u])["T_E"+v.d]?v.bk_pluse[s+"_"+b+"-"+o]=1:v.bk_pluse[s+"_"+b+"-"+o]=0,a=s+"_"+b+"-"+o,v.try2[a]=0,v.trx2[a]=0,v.trx[a]=0,v.try[a]=0,v.trx[a]=0,v.maxtime[a]=100,v.hover_id[a]=0,v.hover_id2[a]=0,v.mouseenter[a]=-1;for(var m=0;m<4;m++)n["EB_"+m]=n["EA_"+m];for(i=0;i<n.layer_obj;i++)_=n["obj_num_"+i],l=v.wb3d_id[s+"_"+b+"-"+o+"-"+_],v.w[l]=0,v.h[l]=0,v.h[8]=0,wb3d_set_bk(l,v,s+"_"+b+"-"+o),v.w[s+"_"+b+"-"+o+"-"+n["obj_num_"+i]]=0,1<=n["P_s"+v.d]&&(document.getElementById("wb3dg-"+v.wb3d_id[s+"_"+b+"-"+o+"-"+n["obj_num_"+i]]).style.position="fixed"),"wb3d"===n["type_"+_]&&(wb3d_set_wb3d_sub_scroll_data(v,n,l,s,b,o,_,r),wb3d_reset_data_slider_sub(v,n,0,l,s,b,o,_,r,d))}v.cu=s,1==v.check_relative&&wb3d_start_frame(v,0),wb3d_start_frame(v,0),"view"==wb3d.flag&&(document.getElementById("wb3d_waiting").style.display="none")}},wb3d_checkstyle=function(e){e="wb3d_style_"+e;var t=document.getElementById(e);null!=t&&(t.innerHTML=""),null===t&&((t=document.createElement("style")).type="text/css",t.id=e,document.getElementsByTagName("head")[0].appendChild(t))},wb3d_set_colortable=function(){var e=v.cu,t=v.activeslide[e],d=v.sn[e+"-0"],d=d+"-"+v.setting[d]["c"+v.sColortable]+"-"+v.color1[d+"-"+t],d="rgba("+v.r[d]+","+v.g[d]+","+v.b[d]+",1)";document.getElementById("wb3dh-"+v.wb3d_id[e+"_"+t]).style.backgroundColor=d,v.bk_Tcolor[e+"_"+t]=d,v.chenge_details_obj2=[],v.chenge_details_obj=[],v.bk_responsive=[]},wb3d_html_create_slider=function(e,t,d,_){t='<div id="wb3dh-'+t+'" style=" width:100%;height:100%; top:0px;position:absolute;z-index:10;display:none" >';t+="</div>",document.getElementById(d).insertAdjacentHTML("beforeend",t)}}