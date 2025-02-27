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
(window.wpackiodpIntroToursmainJsonp=window.wpackiodpIntroToursmainJsonp||[]).push([[11],{34:function(t,s,e){"use strict";e.r(s),e.d(s,"default",(function(){return o}));var i=e(3),a=e(1);class o{constructor(t){Object(i.a)(this,"addClassSafe",t=>{if(!this.element.classList.contains(t)){const s=$(this.element),e=s.offset();this.element.classList.add(t);const i=s.offset();let a=!1;Math.abs(i.top-e.top)>1&&(this.attrsBkp.top=this.element.style.top,a=!0),Math.abs(i.left-e.left)>1&&(this.attrsBkp.left=this.element.style.left,a=!0),a&&s.offset(e)}}),this.element=t;const s=getComputedStyle(t).getPropertyValue("position");this.analysis={isSticky:"sticky"===s,isFixed:"fixed"===s,hasAltPosition:["fixed","sticky","absolute"].includes(s)}}process(){this.attrsBkp={},this.element.classList.add(a.CLASSES_CORE.target),this.analysis.hasAltPosition&&this.addClassSafe(a.CLASSES_CORE.relativePosition)}destroy(){this.element.classList.remove(a.CLASSES_CORE.target),this.removeClassSafe(a.CLASSES_CORE.relativePosition)}removeClassSafe(t){this.element.classList.contains(t)&&this.element.classList.remove(t),this.attrsBkp&&Object.keys(this.attrsBkp).forEach(t=>{this.element.setAttribute(t,this.attrsBkp[t])})}}}}]);
//# sourceMappingURL=DpitTarget-9b8142f3.js.map