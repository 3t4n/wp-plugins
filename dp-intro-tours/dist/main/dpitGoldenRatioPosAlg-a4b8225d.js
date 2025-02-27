/*!
 * 
 * Intro Tour Tutorial
 * 
 * @author [object Object]
 * @version 6.5.3
 * @link http://www.gnu.org/licenses/gpl-2.0.txt
 * @license GPL-2.0+
 * 
 * Copyright (c) 2024 [object Object]
 * 
 * This plugin is released under GPL-2.0+ license to be included in wordpres.org plugin repository
 * 
 * Compiled with the help of https://wpack.io
 * A zero setup Webpack Bundler Script for WordPress
 */
(window.wpackiodpIntroToursmainJsonp=window.wpackiodpIntroToursmainJsonp||[]).push([[20],{39:function(t,e,i){"use strict";i.r(e);var o=i(4),s=i(6),l=i(7);const r=(t,e,i)=>{let o=t.width/e.width,s=t.height/e.height;return i?o-s:s-o},h=(t,e,i,o,s,l,r)=>{let h=Math.sign(t)<0;e&&(h=i);let n=[0,0];switch(r.base){case"left":n=h?[o.left,s.left]:[s.left,l.left];break;case"right":n=h?[s.right,o.right]:[l.right,s.right];break;case"top":n=h?[o.top,s.top]:[s.top,l.top];break;case"bottom":n=h?[s.bottom,o.bottom]:[l.bottom,s.bottom]}return Math.floor((h?-1:1)*(n[1]-n[0])/2)},n=(t,e,i,l,r,h,n)=>{if(h){if(l.width-t<n)return!1;const s={...l};if(i.style.width=Object(o.u)(l.width-t)+"px","left"===r.base){const t=$(i).outerWidth(!1);t!==s.width&&(i.style.left=Object(o.d)(l.left-(t-s.width)-e.left)+"px")}switch(r.align){case"middle":{const t=$(i).outerHeight(!1);t!==s.height&&(i.style.top=Object(o.h)((e.height-t)/2)+"px");break}case"bottom":{const t=$(i).outerHeight(!1);t!==s.height&&(i.style.top=Object(o.h)(l.bottom-t+1-e.top)+"px");break}}}else{if(l.width+t<n)return!1;const h=l.height,a=l.width,u=Object(s.d)(i,"left",0);i.style.width=Object(o.u)(l.width+t)+"px";const c=$(i).outerWidth(!1),f=c-a;if(a!==c&&("center"===r.align?i.style.left=Object(o.u)(u-f/2)+"px":"right"===r.align&&(i.style.left=Object(o.u)(l.left-f-e.left)+"px")),"top"===r.base){const t=$(i).outerHeight(!1);t!==h&&(i.style.top=Object(o.h)(l.top-(t-h)-e.top)+"px")}}return!0},a=(t,e,i,o,s)=>(o&&(e?console.log("[dpit] GOLDEN RATIO:",`success (by ${i} iterations)`):console.log("[dpit] GOLDEN RATIO: "+s,"iterations: "+i)),{wasPosAdjusted:e,isOverHeight:t}),u=(t,e,i,o,s,l)=>(e.setAttribute("style",t),o--,a(i,o>0,o,s,l)),c=t=>{let e=t.getAttribute("style");return null!==e&&("object"==typeof e&&(e=e.cssText),e)};e.default=function(t,e,i,o,s,f,b,d,g){let p=arguments.length>9&&void 0!==arguments[9]?arguments[9]:10;const w=e.height>s.height,O=["left","right"].includes(o.base);let m=0,y=c(i),j={...e},x=null,v=w,M=null,k=null,$=r(j,s,O);for(;m<p;){let e=!1;if(!v)if(k){const t=Math.abs(k)-Math.abs($);e=Math.abs($)<=.1||t<=.05}else e=Math.abs($)<=.03;if(e)return a(v,m>0,m,g,"was not needed");const p=h($,v,O,f,j,0===m?t:j,o);m++;let H=!1;if(p&&n(p,t,i,j,o,O,d)){j=l.default.fromElement(i,b);const t=s;var A;if(!(j&&j.left>=t.left-1&&j.right<=t.right+1))return u(y,i,null!==(A=M)&&void 0!==A?A:w,m,g,"out of win");H=!0}var T,E;if(!H||x&&l.default.isEqual(x,j))return u(y,i,null!==(T=M)&&void 0!==T?T:w,m,g,"no effect");if(v=j.height>s.height,k=$,$=r(j,s,O),k&&!v&&Math.abs($)>Math.abs(k))return u(y,i,null!==(E=M)&&void 0!==E?E:w,m,g,"worse feature");y=c(i),x={...j},M=v}return a(w,!1,m,g,"too many iterations")}}}]);
//# sourceMappingURL=dpitGoldenRatioPosAlg-a4b8225d.js.map