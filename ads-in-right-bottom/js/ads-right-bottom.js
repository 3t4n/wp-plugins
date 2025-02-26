/*<![CDATA[*/

function zxcHideShow(zxccls,zxcnu,zxcdays){
 var zxcobjs=zxctElsByClass(zxccls);
 var zxcv='';
 for (var zxc0=0;zxc0<zxcobjs.length;zxc0++){
  if (zxc0!=zxcnu) zxcobjs[zxc0].style.display='none';
  else zxcobjs[zxc0].style.display=zxcStyleValue(zxcobjs[zxc0],'display')=='none'?'block':'none';
  zxcv+=zxcobjs[zxc0].style.display+':'
 }
 zxcCreateCookie(zxccls,zxcv,zxcdays);
}

function zxctElsByClass(zxccls,zxcp,zxctag) {
 zxcp=zxcp||document;
 zxcp=typeof(zxcp)=='object'?zxcp:document.getElementById(zxcp);
 zxctag=zxctag||'*';
 for (var zxcels=zxcp.getElementsByTagName(zxctag),zxcreg=new RegExp('\\b'+zxccls+'\\b'),zxcary=[],zxc0=0;zxc0<zxcels.length;zxc0++){
  if (zxcreg.test(zxcels[zxc0].className)) zxcary.push(zxcels[zxc0]);
 }
 return zxcary;
}

function zxcStyleValue(zxcobj,zxcp){
 if (zxcobj.style[zxcp.replace(/-/g,'')]) return zxcobj.style[zxcp.replace(/-/g,'')];
 if (zxcobj.currentStyle) return zxcobj.currentStyle[zxcp.replace(/-/g,'')];
 return document.defaultView.getComputedStyle(zxcobj,null).getPropertyValue(zxcp.toLowerCase());
}

function zxcCreateCookie(zxcnme,zxcv,zxcdays){
 document.cookie=zxcnme+'='+zxcv+';expires='+new Date(new Date().getTime()+zxcdays*86400000).toGMTString();+';path=/';
}

function zxcReadCookie(zxcnme){
 zxcnme+='=';
 var zxcsplit = document.cookie.split(';');
 for(var zxc0=0;zxc0<zxcsplit.length;zxc0++) {
  var zxcs=zxcsplit[zxc0];
  while (zxcs.charAt(0)==' ') zxcs=zxcs.substring(1,zxcs.length);
  if (zxcs.indexOf(zxcnme)==0) return zxcs.substring(zxcnme.length,zxcs.length);
 }
 return null;
}

function zxcRestore(zxccls){
 var zxcv=zxcReadCookie(zxccls);
 if (zxcv){
  zxcv=zxcv.split(':');
  var zxcobjs=zxctElsByClass(zxccls);
  for (var zxc0=0;zxc0<zxcobjs.length;zxc0++){
   zxcobjs[zxc0].style.display=zxcv[zxc0];
  }
 }
}
/*]]>*/
